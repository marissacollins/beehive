//Keep things modular so if you have the same variable names from different places it doesnt cause problems
(function () { 
    'use strict'; //checking for syntax issues
    angular
    .module('ng-admin') //Binds all of the angular modules into one
    .controller('BeeController', BeeController) //definition of controller
    .controller('ModalController', ModalController)
    .controller('ModalInstController', ModalInstController);


    //injecting external functions into the controller
	BeeController.$inject = ['BeeServices',
    '$scope',
    '$rootScope',
    '$routeParams',
    '$log',
    '$location',
    '$q',
	'Notification'
    ];
	ModalController.$inject = [
      '$log',
      '$uibModal',
	  '$location',
	  'BeeServices'
    ];
	ModalInstController.$inject = [
      '$log',
      '$uibModalInstance',
      '$window',
      'Notification',
      'BeeServices'
    ];

	
	//Controllers connect the html and the webapp 
		//Controller pulls the latest values from the database, for "Your Hive" page
			function BeeController(BeeServices, $scope, $rootScope, $routeParams, $log, $location, $q, Notification) {
			/* jshint validthis: true */
			var vmbee = this;
			vmbee.getBeeHives = getBeeHives;
			//Latest outside temperature
			vmbee.getLatestOutsideTemp = getLatestOutsideTemp;
			vmbee.outsidetemp = [];
			//Latest Hive Temperature
			vmbee.getLatestHiveTemp = getLatestHiveTemp;
			vmbee.hivetemp = [];
			//Latest hive humidity
			vmbee.getLatestHiveHumidity = getLatestHiveHumidity;
			vmbee.hivehumidity = [];
			//Latest hive weight
			vmbee.getLatestHiveWeight = getLatestHiveWeight;
			vmbee.HiveWeightStatus = [];
			//Latest light value
			vmbee.getLatestLight = getLatestLight;
			vmbee.light = [];
			//Latest bee population count
			vmbee.getLatestBeePopulation = getLatestBeePopulation;
			vmbee.populations = [];
			//Latest frequency status
			vmbee.getLatestBeeFreq = getLatestBeeFreq;
			vmbee.beeFreqStatus = [];
			//List of hives
			vmbee.getHiveList = getHiveList;
			vmbee.hiveIdList =[];
			//React to selecting hiveIdList
			vmbee.selectedHiveId = 'All';
			vmbee.selectedHiveName = 'All';
			vmbee.doHiveSelect = doHiveSelect;
			
        vmbee.setGridHiveOptions = setGridHiveOptions;
        vmbee.highlightFilteredHeader = highlightFilteredHeader;
        vmbee.limit = 0;
        vmbee.limits = [10,20,50,100,200,500,5000];
        vmbee.gridHiveOptions={};

		//load the data for the initial display
        activate();

		//Functions to actually retrieve the latest values
        function activate() {
            $log.debug('about activate bee ');
            setGridHiveOptions();
            $q.all([
					getBeeHives().then(
					function () {
						$log.debug('activated Beehive view');
					}, 
					function(error) {
                    $log.debug('Caught an error getting hivelist, going to notify:', error); 
                    Notification.error({message: error, delay: 5000});
						return ($q.reject(error));
					}),	
					getHiveList().then(
					function () {
						$log.debug('hivelist returned');
					}, 
					function(error) {
                    $log.debug('Caught an error getting hivelist, going to notify:', error); 
                    Notification.error({message: error, delay: 5000});
						return ($q.reject(error));
					}),	
				//Latest	
                    getLatestOutsideTemp().then(function () {
                        $log.debug('got latestoutsidetemp');

                    }, function(error) {
                        vmbee.outsidetemp=[];
                             return ($q.reject(error));
                    }),	
					 getLatestHiveTemp().then(function () {
                        $log.debug('got latesthivetemp');

                    }, function(error) {
                        vmbee.hivetemp=[];
                             return ($q.reject(error));
                    }),
					 getLatestHiveHumidity().then(function () {
                        $log.debug('got latesthivehumidity');

                    }, function(error) {
                        vmbee.hivehumidity=[];
                             return ($q.reject(error));
                    }),
					 getLatestHiveWeight().then(function () {
                        $log.debug('got latesthiveweight');

                    }, function(error) {
                        vmbee.HiveWeightStatus=[];
                             return ($q.reject(error));
                    }),
					 getLatestLight().then(function () {
                        $log.debug('got latestlight');

                    }, function(error) {
                        vmbee.light=[];
                             return ($q.reject(error));
                    }),
					 getLatestBeePopulation().then(function () {
                        $log.debug('got latestbeepopulation');

                    }, function(error) {
                        vmbee.populations=[];
                             return ($q.reject(error));
                    }),
					 getLatestBeeFreq().then(function () {
                        $log.debug('got latestbeefrequency');

                    }, function(error) {
                        vmbee.beeFreqStatus=[];
                             return ($q.reject(error));
                    }),
					

                ])
                .then(function() {
                         $log.debug('all data returned');
                     });
        }
		function doHiveSelect() {
			$log.debug('doHiveSelect',vmbee.HiveIdList, vmbee.selectedHiveId);
			//set it in services so we can get it in another controller
			BeeServices.setHiveId(vmbee.selectedHiveId, vmbee.selectedHiveName);
			
			for(var i=0,len=vmbee.HiveIdList.length; i< len; i++) {
				$log.debug('doHiveSelect loop',vmbee.HiveIdList[i], vmbee.selectedHiveId);				
				if (vmbee.HiveIdList[i].hiveid == vmbee.selectedHiveId) {
					$log.debug('found hivename',vmbee.HiveIdList[i].name);
					vmbee.selectedHiveName = vmbee.HiveIdList[i].name;
				}
			}
			//set it in services so we can get it in another controller
			BeeServices.setHiveId(vmbee.selectedHiveId, vmbee.selectedHiveName);
			
			var themsg = "you selected: " + vmbee.selectedHiveId + ' - ' + vmbee.selectedHiveName + ', now do something with it';
			Notification.info({message: themsg, delay: 5000});
			activate();
		}
		//Get Latest functions
        function getHiveList() {
            var thepath = '../v1/hivelist';
            return BeeServices.getHiveList(thepath).then(function (data) {
                $log.debug('getHiveList returned data');
                $log.debug(data.data);
                    vmbee.HiveIdList = data.HiveIdList;
                    return;
			},
			function (error) {
                    $log.debug('Caught an error getting hivelist, going to notify:', error); 
                    Notification.error({message: error, delay: 5000});
                    return ($q.reject(error));
            });
        }
		
        function getBeeHives() {
            var thepath = '../v1/bees';
            return BeeServices.getAllBeehives(thepath).then(function (data) {
                $log.debug('getAllBeehives returned data');
                $log.debug(data.data);
                    vmbee.gridHiveOptions.data = data.HivesList;

                    return vmbee.gridHiveOptions.data;
            });
        }
        function getLatestOutsideTemp() {
            var thepath = '../v1/outsidetemp';
            var thepath = encodeURI('../v1/outsidetemp?thelimit=1' );
                
            return BeeServices.getOutsideTemp(thepath).then(function (data) {
                $log.debug('getLatestOutsideTemp returned data');
                $log.debug(data);
                    vmbee.outsidetemp = data.OutsideTempList;
                    return;
            });
        }
		function getLatestHiveTemp() {
            var thepath = '../v1/hivetemp';
            var thepath = encodeURI('../v1/hivetemp?thelimit=1&thehive=' + vmbee.selectedHiveId );
                
            return BeeServices.getHiveTemp(thepath).then(function (data) {
                $log.debug('getLatestHiveTemp returned data');
                $log.debug(data);
                    vmbee.hivetemp = data.HiveTempList;

                    return;
            });
        }
		function getLatestHiveHumidity() {
            var thepath = '../v1/hivehumidity';
            var thepath = encodeURI('../v1/hivehumidity?thelimit=1&thehive=' + vmbee.selectedHiveId );
                
            return BeeServices.getHiveHumidity(thepath).then(function (data) {
                $log.debug('getLatestHiveHumidity returned data');
                $log.debug(data);
                    vmbee.hivehumidity = data.HiveHumidityList;
                    return;
            });
        }
		function getLatestHiveWeight() {
            var thepath = '../v1/HiveWeightStatus';
            var thepath = encodeURI('../v1/HiveWeightStatus?thelimit=1&thehive=' + vmbee.selectedHiveId );
                
            return BeeServices.getHiveWeight(thepath).then(function (data) {
                $log.debug('getLatestHiveWeightStatus returned data');
                $log.debug(data);
                    vmbee.HiveWeightStatus = data.HiveWeightStatusList;
                    return;
            });
        }		
		function getLatestLight() {
            var thepath = '../v1/light';
            var thepath = encodeURI('../v1/light?thelimit=1&thehive=' + vmbee.selectedHiveId );
                
            return BeeServices.getLight(thepath).then(function (data) {
                $log.debug('getLatestLight returned data');
                $log.debug(data);
                    vmbee.light = data.LightList;
                    return;
            });
        }
		function getLatestBeePopulation() {
            var thepath = '../v1/populations';
            var thepath = encodeURI('../v1/populations?thelimit=1&thehive=' + vmbee.selectedHiveId );
                
            return BeeServices.getPopulation(thepath).then(function (data) {
                $log.debug('getLatestPopulation returned data');
                $log.debug(data);
                    vmbee.populations = data.PopulationList;
                    return;
            });
        }
		function getLatestBeeFreq() {
            var thepath = '../v1/beeFreqStatus';
            var thepath = encodeURI('../v1/beeFreqStatus?thelimit=1&thehive=' + vmbee.selectedHiveId );
                
            return BeeServices.getBeeFrequency(thepath).then(function (data) {
                $log.debug('getLatestBeeFreq returned data');
                $log.debug(data);
                    vmbee.beeFreqStatus = data.BeeFreqStatusList;
                    return;
            });
        }
   

   function highlightFilteredHeader(row, rowRenderIndex, col, colRenderIndex) {
            if (col.filters[0].term) {
                return 'header-filtered';
            } else {
                return '';
            }
        }
   function setGridHiveOptions() {

            vmbee.gridHiveOptions = {
                enableFiltering: true,
                paginationPageSizes: vmbee.limits,
                paginationPageSize: 10,
            columnDefs: [
                // default
//`id`, `name`, `datetime`, `temp`, `weight`, `humidity`
                {
                    field: 'id',
                    enableCellEdit: true,
                    enableFiltering: true
                }, {
                    field: 'name',
                    enableCellEdit: false,
                    enableFiltering: false
                }, {
                    field: 'datetime',
                    enableCellEdit: false,
                    enableFiltering: false
                }, {
                    field: 'temp',
                    enableCellEdit: false,
                    enableFiltering: false
                }, {
                    field: 'weight',
                    enableCellEdit: false,
                    enableFiltering: false
                }, {
                    field: 'humidity`',
                    enableCellEdit: false,
                    enableFiltering: false
                }
                ],

                //rowHeight: 15,
                showGridFooter: true,
                enableColumnResizing: true,
                appScopeProvider: vmbee,

                onRegisterApi: function(gridApi) {
                    $log.debug('vm gridapi onRegisterApi');
                     vmbee.gridHiveApi = gridApi;

     /*               gridApi.selection.on.rowSelectionChanged($scope,function(row){
                        var msg = 'grid row selected ' + row.entity;
                        $log.debug(msg);

                        var selectedStudentarr = vmbee.gridHiveApi.selection.getSelectedRows();
                        $log.debug('selected', selectedStudentarr);
                        setSelectedArray(selectedStudentarr);
                        
                    });
     */
    /*                    gridApi.selection.on.rowSelectionChangedBatch($scope, function(rows) {
                            $log.debug("grid batch");  
                            var selectedStudentarr = vmbee.gridHiveApi.selection.getSelectedRows();
                            $log.debug('batch selected', selectedStudentarr);
                            setSelectedArray(selectedStudentarr);

                    });
     */               gridApi.edit.on.afterCellEdit($scope, 
                            function(rowEntity, colDef, newValue, oldValue) {
                        $log.debug('rowEntity');
                        $log.debug(rowEntity);
                        //Alert to show what info about the edit is available
                        $log.debug('Column: ' + colDef.name  + 
                            ' newValue: ' + newValue + ' oldValue: ' + oldValue    );
                        if (newValue != oldValue) {
                            //updateEvent(colDef,newValue,rowEntity);       
                        }
                    });

                    }
            };

            $log.debug('setgridHiveOptions Options:', vmbee.gridHiveOptions);

        }        
 
 
	}
			function ModalController( $log, $uibModal, $location, BeeServices) {
    /* jshint validthis: true */
    var vmotemp = this;
    
    vmotemp.animationsEnabled = true;
    vmotemp.openmodal = openmodal;
    vmotemp.modalInstance = undefined;
    $log.debug('ModalController entered ');


    function openmodal(themodal) {
		$log.debug('openmodal entered', themodal);
	  BeeServices.setmodal(themodal);
	  
      vmotemp.modalInstance = $uibModal.open({
        animation: vmotemp.animationsEnabled,
        templateUrl: 'modal.html',
        controller: 'ModalInstController as vminst',
        size: 'lg',
        resolve: {
          classname: function () {
              $log.debug('return from open');
            return ;
          }
        }
      });
      vmotemp.modalInstance.result.then(function (dta) {
          console.log('search modalInstance result :', dta);
      }, function () {
          $log.info('Modal dismissed at: ' + new Date());
      });

    }
    
  }
			function ModalInstController( $log, $uibModalInstance, $window, Notification, BeeServices) {
   
   /* jshint validthis: true */
    var vminst = this;
    console.log('modal inst entered');
    console.log(vminst);

    vminst.close = close;
	vminst.themodal = '';
	
		//Controller to pull the last 10 data points for the individual pages
			//Outside Temp range
			vminst.getOutsideTempRange = getOutsideTempRange;
			vminst.otemprange = [];
			//Hive Temp range
			vminst.getHiveTempRange = getHiveTempRange;
			vminst.htemprange = [];
			//Hive humidity range
			vminst.getHiveHumidityRange = getHiveHumidityRange;
			vminst.humidityrange = [];
			//Hive weight range
			vminst.getWeightStatusRange = getWeightStatusRange;
			vminst.weightrange = [];
			//Light range
			vminst.getLightRange = getLightRange;
			vminst.luxrange= [];
			//Population count range
			vminst.getPopCountRange = getPopCountRange;
			vminst.countrange = [];
			//Frequency range
			vminst.getFreqStatusRange = getFreqStatusRange;
			vminst.frequencyrange = [];

			vminst.graphid = 'x';
			vminst.graphlabel = 'y';
			vminst.grapharray = 'z';
			vminst.legendcontainer = 'xx';
			
			//the service lets you communicate between different controllers
			vminst.themodal = BeeServices.getmodal();
			vminst.selectedHiveId = BeeServices.getHiveId();
			vminst.selectedHiveName = BeeServices.getHiveName();
			
		$log.debug('eval switch against:', vminst.themodal);
		switch(vminst.themodal) {
			case 'outsidetemp':
				getOutsideTempRange().then(function () {
					$log.debug('got OutsideTempRange');
				  //Outside Temp Range
					$log.debug('before graph',vminst.otemprange);
					var otemparray = [];
					for (var i=0,len=vminst.otemprange.length; i<len; i++) {
						var d2 = [];
						var tt = mysqlGmtStrToJSLocal(vminst.otemprange[i].datetime);
						$log.debug('date conversion',vminst.otemprange[i].datetime, tt);
						d2[0] = tt;
						d2[1] = vminst.otemprange[i].temp;
						otemparray.push(d2);
					}	
						$log.debug('outsidetemp array',otemparray);
						vminst.graphid = 'OutsideTempSpline';
						vminst.graphlabel = 'Outside Temperature';
						vminst.grapharray = otemparray;
						vminst.legendcontainer = 'OutsideTempLegend';
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);
				});
				break;
			case 'hivetemp':
					getHiveTempRange().then(function () {
                        $log.debug('got HiveTempRange');
						//Hive Temp Range
						$log.debug('before graph',vminst.htemprange);
						var htemparray = [];
						for (var i=0,len=vminst.htemprange.length; i<len; i++) {
							var d2 = [];
							var tt = mysqlGmtStrToJSLocal(vminst.htemprange[i].datetime);
							$log.debug('date conversion',vminst.htemprange[i].datetime, tt);
							d2[0] = tt;
							d2[1] = vminst.htemprange[i].temp;
							htemparray.push(d2);
						}
						$log.debug('hivetemp array',htemparray);
						vminst.graphid = 'HiveTempSpline';
						vminst.graphlabel = 'Hive Temperature';
						vminst.grapharray = htemparray;
						vminst.legendcontainer = 'HiveTempLegend';
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);

                    });
				break;
			case 'hivehumidity':
					getHiveHumidityRange().then(function () {
                        $log.debug('got HiveHumidityRange');
						//Hive Humidity Range
						$log.debug('before graph', vminst.humidityrange)
						var humidityarray = [];
						for (var i=0, len=vminst.humidityrange.length; i<len; i++) {
							var d2 = [];
							var tt = mysqlGmtStrToJSLocal(vminst.humidityrange[i].datetime);
							$log.debug('date conversion',vminst.humidityrange[i].datetime, tt);
							d2[0] = tt;
							d2[1] = vminst.humidityrange[i].humidity;
							humidityarray.push(d2);
						}
						$log.debug('humidity array' ,humidityarray);
						vminst.graphid = 'HumiditySpline';
						vminst.graphlabel = 'Humidity';
						vminst.grapharray = humidityarray;
						vminst.legendcontainer = 'HumidityLegend';
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);

                    });
				break;
			case 'weightstatus':
					getWeightStatusRange().then(function () {
                        $log.debug('got WeightStatusRange');
						//Hive Weight Range
						$log.debug('before graph', vminst.weightrange)
						var weightarray = [];
						for (var i=0, len=vminst.weightrange.length; i<len; i++) {
							var d2 = [];
							var tt = mysqlGmtStrToJSLocal(vminst.weightrange[i].datetime);
							$log.debug('date conversion',vminst.weightrange[i].datetime, tt);
							d2[0] = tt;
							d2[1] = vminst.weightrange[i].weight;
							weightarray.push(d2);
						}
						$log.debug('weight array' ,weightarray);
				//		graphid = 'LightSpline';
				//		graphlabel = 'Light';
				//		grapharray = lightarray;
				//		legendcontainer = 'LightLegend';
				//		getGraph(graphid, graphlabel, grapharray, legendcontainer);

                    });
				break;
			case 'light':
					getLightRange().then(function () {
                        $log.debug('got lightrange');
						//Light Range
						$log.debug('before graph', vminst.luxrange)
						var lightarray = [];
						for (var i=0, len=vminst.luxrange.length; i<len; i++) {
							var d2 = [];
							var tt = mysqlGmtStrToJSLocal(vminst.luxrange[i].datetime);
							$log.debug('date conversion',vminst.luxrange[i].datetime, tt);
							d2[0] = tt;
							d2[1] = vminst.luxrange[i].lux;
							lightarray.push(d2);
						}
						$log.debug('light array' ,lightarray);
						vminst.graphid = 'LightSpline';
						vminst.graphlabel = 'Light';
						vminst.grapharray = lightarray;
						vminst.legendcontainer = 'LightLegend';
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);

                    });
				break;
			case 'population':
					getPopCountRange().then(function () {
                        $log.debug('got popcountrange');
						//Population Count Range
						$log.debug('before graph', vminst.countrange)
						var populationarray = [];
						for (var i=0, len=vminst.countrange.length; i<len; i++) {
							var d2 = [];
							var tt = mysqlGmtStrToJSLocal(vminst.countrange[i].datetime);
							$log.debug('date conversion',vminst.countrange[i].datetime, tt);
							d2[0] = tt;
							d2[1] = vminst.countrange[i].count;
							populationarray.push(d2);
						}
						$log.debug('population array' ,populationarray);
						vminst.graphid = 'PopulationSpline';
						vminst.graphlabel = 'Population';
						vminst.grapharray = populationarray;
						vminst.legendcontainer = 'PopulationLegend';
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);

                    });
				break;
			case 'frequencyStatus':
					getFreqStatusRange().then(function () {
                        $log.debug('got FreqStatusRange');
						//Frequency Status Range
						$log.debug('before graph', vminst.frequencyrange)
						var freqarray = [];
						for (var i=0, len=vminst.frequencyrange.length; i<len; i++) {
							var d2 = [];
							var tt = mysqlGmtStrToJSLocal(vminst.frequencyrange[i].datetime);
							$log.debug('date conversion',vminst.frequencyrange[i].datetime, tt);
							d2[0] = tt;
							d2[1] = vminst.frequencyrange[i].frequencyStatus;
							freqarray.push(d2);
						}
						$log.debug('frequency array' ,freqarray);						
						//graphid = 'x';
						//graphlabel = 'y';
						//grapharray = freqarray;
						//legendcontainer = 'xx';
						//getGraph(graphid, graphlabel, grapharray, legendcontainer);

                    });
				break;
			default:
					$log.debug('modal not recognized',vminst.themodal);
		}	
	
				//Ranges
    
    function close() {
      $uibModalInstance.dismiss('cancel');
    }

	function mysqlGmtStrToJSDate(str) {

        var t = str.split(/[- :]/);

        // Apply each element to the Date function
        return new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);

    }

    function mysqlGmtStrToJSLocal(str) {
        // first create str to Date object
        var g = mysqlGmtStrToJSDate(str);
        // 
        return new Date(g.getTime() - ( g.getTimezoneOffset() * 60000 ));
    }
		
	function getGraph(graphid, graphlabel, grapharray, legendcontainer) {

		$log.debug('getGraph entered', graphid, graphlabel, grapharray, legendcontainer);

		setTimeout(function(){
			try {
				//BEGIN LINE CHART SPLINE
					/*How to put 3 lines on a graph
						//var d2_1 = [["Jan", 181],["Feb", 184],["Mar", 189],["Apr", 180],["May", 190],["Jun", 183],["Jul", 185],["Aug", 188],["Sep", 202]];
						//var d2_2 = [["Jan", 165],["Feb", 172],["Mar", 175],["Apr", 176],["May", 164],["Jun", 171],["Jul", 175],["Aug", 180],["Sep", 181]];
						//var d2_3 = [["Jan", 128],["Feb", 131],["Mar", 140],["Apr", 150],["May", 140],["Jun", 144],["Jul", 146],["Aug", 155],["Sep", 158]];
					*/
				$.plot('#' + graphid, [{
					data: grapharray,
					label: graphlabel,
					color: "#2ecc71"
			  /* Additional how to code 
			  },{
			  //      data: d2_2,
			  //      label: "Adults",
			  //      color: "#e74c3c"
			  //  },{
			  //      data: d2_3,
			  //      label: "Blackbelts",
			  //      color: "#2980b9" */
				}], {   
					series: {
						lines: {
							show: !1
						},
						splines: {
							show: !0,
							tension: 0.4,
							lineWidth: 2,
							fill: 0
						},
						points: {
							show: true,
							radius: 4
						}
					},
					grid: {
						borderColor: "green",
						borderWidth: 0,
						hoverable: true,
						margin: 10,
						minBorderMargin: 10
					},
					tooltip: !0,
					tooltipOpts: {
						content: "%x : %y",
						defaultTheme: false
					},
//					xaxis: {
//						tickColor: "#fafafa",
//						mode: "categories"
//					},
					xaxis: {
						mode: "time",
						timeformat: "%m/%d %H:%M"
					},
					yaxis: {
						tickColor: "#fafafa"
					},
					shadowSize: 0,
					highlightColor: "green",
					legend: {         
						backgroundOpacity: 0.5,
						noColumns: 1,
						container: '#' + legendcontainer,
						labelBoxBorderColor: "white",
				 //       backgroundColor: "green",   
						position: "ne"
					}

				});
			 } catch(e) {
			console.log(e.message, "from", e.stack);
			// You can send data to your server
			// sendError(data);
			//throw e;
			}

		});
		
	}


		//Get range functions
		function getOutsideTempRange ()	{
            var thepath = '../v1/outsidetemp';
            var thepath = encodeURI('../v1/outsidetemp?thelimit=10' );
                
            return BeeServices.getOutsideTemp(thepath).then(function (data) {
                $log.debug('getOutsideTempRange returned data');
                $log.debug(data);
                    vminst.otemprange = data.OutsideTempList;
                    return;
            });
        }
		function getHiveTempRange (){
            var thepath = '../v1/hivetemp';
            var thepath = encodeURI('../v1/hivetemp?thelimit=10&thehive=' + vminst.selectedHiveId  );
                
            return BeeServices.getHiveTemp(thepath).then(function (data) {
                $log.debug('getHiveTempRange returned data');
                $log.debug(data);
                    vminst.htemprange = data.HiveTempList;

                    return;
            });
        }
		function getHiveHumidityRange (){
            var thepath = '../v1/hivehumidity';
            var thepath = encodeURI('../v1/hivehumidity?thelimit=10&thehive=' + vminst.selectedHiveId  );
                
            return BeeServices.getHiveHumidity(thepath).then(function (data) {
                $log.debug('getLatestHiveHumidity returned data');
                $log.debug(data);
                    vminst.humidityrange = data.HiveHumidityList;
                    return;
            });
        }
		function getWeightStatusRange (){
            var thepath = '../v1/HiveWeightStatus';
            var thepath = encodeURI('../v1/HiveWeightStatus?thelimit=10&thehive=' + vminst.selectedHiveId );
                
            return BeeServices.getHiveWeight(thepath).then(function (data) {
                $log.debug('getHiveWeight returned data');
                $log.debug(data);
                    vminst.weightrange = data.HiveWeightStatusList;
                    return;
            });
        }	
		function getLightRange (){
            var thepath = '../v1/light';
            var thepath = encodeURI('../v1/light?thelimit=10&thehive=' + vminst.selectedHiveId  );
                
            return BeeServices.getLight(thepath).then(function (data) {
                $log.debug('getLightRange returned data');
                $log.debug(data);
                    vminst.luxrange = data.LightList;
                    return;
            });
        }
		function getPopCountRange (){
            var thepath = '../v1/populations';
            var thepath = encodeURI('../v1/populations?thelimit=10&thehive=' + vminst.selectedHiveId  );
                
            return BeeServices.getPopulation(thepath).then(function (data) {
                $log.debug('getPopCountRange returned data');
                $log.debug(data);
                    vminst.countrange = data.PopulationList;
                    return;
            });
        }
		function getFreqStatusRange (){
            var thepath = '../v1/beeFreqStatus';
            var thepath = encodeURI('../v1/beeFreqStatus?thelimit=10&thehive=' + vminst.selectedHiveId);
                
            return BeeServices.getBeeFrequency(thepath).then(function (data) {
                $log.debug('getFreqStatusRangereturned data');
                $log.debug(data);
                    vminst.frequencyrange = data.BeeFreqStatusList;
                    return;
            });
        }
				
  }
})();
