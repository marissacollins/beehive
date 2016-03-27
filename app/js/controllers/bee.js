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
	'Notification',
	'uiGridConstants'
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
			function BeeController(BeeServices, $scope, $rootScope, $routeParams, $log, $location, $q, Notification, uiGridConstants) {
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
			//Get Light History
			vmbee.getLight = getLight;
			vmbee.LightList = [];
			//Get Population
			vmbee.getPopulation = getPopulation;
			vmbee.PopulationList = [];
			//Get Outside Temp
			vmbee.getOTemp = getOTemp;
			vmbee.OutsideTempList = [];
			//Get Audio
			vmbee.getAudio = getAudio;
			vmbee.BeeFreqStatusList= [];
			//Get FrameWeight
			vmbee.getFrameWeight = getFrameWeight;
			vmbee.HiveWeightStatusList = [];
			
			//Hive Temperature Alert
			vmbee.hiveTempMaxAlert = hiveTempMaxAlert;
			vmbee.hiveTempAlertAmtMax = 95;
			vmbee.hiveTempMinAlert = hiveTempMinAlert;
			vmbee.hiveTempAlertAmtMin = 90;
			//Hive Humidity Alert
			vmbee.hiveHumidityMaxAlert = hiveHumidityMaxAlert;
			vmbee.hiveHumidityAlertAmtMax = 60;
			vmbee.hiveHumidityMinAlert = hiveHumidityMinAlert;
			vmbee.hiveHumidityAlertAmtMin = 50;
			//Weight Alert
			vmbee.weightAlert = weightAlert;
			vmbee.weightAlertAmt = 60;
			//Population Alert
			/*vmbee.populationMaxAlert = populationMaxAlert;
			vmbee.populationAlertAmtMax = 80000;
			vmbee.populationMinAlert = populationMinAlert;
			vmbee.populationAlertAmtMin = 20000;*/
			
        vmbee.setGridHiveOptions = setGridHiveOptions;
		vmbee.setGridLightHistoryOptions = setGridLightHistoryOptions;
		vmbee.setGridPopulationOptions = setGridPopulationOptions;
		vmbee.setGridOutsideTempOptions = setGridOutsideTempOptions;
		vmbee.setGridAudioOptions = setGridAudioOptions;
		vmbee.setGridFrameWeightOptions = setGridFrameWeightOptions;
		
        vmbee.highlightFilteredHeader = highlightFilteredHeader;
        vmbee.limit = 0;
        vmbee.limits = [10,20,50,100,200,500,5000];
        vmbee.gridHiveOptions={};

		//load the data for the initial display
        activate();

		//hive temp alert function
		function hiveTempMaxAlert(hiveTemptest){
			return hiveTemptest > vmbee.hiveTempAlertAmtMax;
		}
		function hiveTempMinAlert(hiveTemptest){
			return hiveTemptest < vmbee.hiveTempAlertAmtMin;
		}
		//hive humidity alert function
		function hiveHumidityMaxAlert(hiveHumiditytest){
			return hiveHumiditytest > vmbee.hiveHumidityAlertAmtMax;
		}
		function hiveHumidityMinAlert(hiveHumiditytest){
			return hiveHumiditytest < vmbee.hiveHumidityAlertAmtMin;
		}
		//weight alert function
		function weightAlert(weighttest) {
			return weighttest > vmbee.weightAlertAmt;
		}
		//population alert function
		/*function populationMaxAlert(populationtest){
			return populationtest > vmbee.populationAlertAmtMax;
		}
		function populationMinAlert(populationtest){
			return populationtest < vmbee.populationAlertAmtMin;
		}*/
		//Functions to actually retrieve the latest values
        function activate() {
            $log.debug('about activate bee ');
            setGridHiveOptions();
			setGridLightHistoryOptions();
			setGridPopulationOptions();
			setGridOutsideTempOptions();
			setGridAudioOptions();
			setGridFrameWeightOptions();
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
				getLight().then(
				function () {
					$log.debug('getLight returned');
				}, 
				function(error) {
					
				$log.debug('Caught an error getting light, going to notify:', error); 
				Notification.error({message: error, delay: 5000});
					return ($q.reject(error));
				}),
				getPopulation().then(
				function () {
					$log.debug('getPopulation returned');
				}, 
				function(error) {
				$log.debug('Caught an error getting population, going to notify:', error); 
				Notification.error({message: error, delay: 5000});
					return ($q.reject(error));
				}),
				getOTemp().then(
				function () {
					$log.debug('getOTemp returned');
				}, 
				function(error) {
					
				$log.debug('Caught an error getting outsidetemp, going to notify:', error); 
				Notification.error({message: error, delay: 5000});
					return ($q.reject(error));
				}),
				getAudio().then(
				function () {
					$log.debug('getAudio returned');
				}, 
				function(error) {
				$log.debug('Caught an error getting Adui, going to notify:', error); 
				Notification.error({message: error, delay: 5000});
					return ($q.reject(error));
				}),	
				getFrameWeight().then(
				function () {
					$log.debug('getFrameWeight returned');
				}, 
				function(error) {
                    $log.debug('Caught an error getting getFrameWeight, going to notify:', error); 
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
                    })
					

                ])
                .then(function() {
                         $log.debug('all data returned');
                     });
        }
		function doHiveSelect() {
			$log.debug('doHiveSelect',vmbee.HiveIdList, vmbee.selectedHiveId);
			//set it in services so we can get it in another controller
			//? bad ? BeeServices.setHiveId(vmbee.selectedHiveId, vmbee.selectedHiveName);
			
			for(var i=0,len=vmbee.HiveIdList.length; i< len; i++) {
				$log.debug('doHiveSelect loop',vmbee.HiveIdList[i], vmbee.selectedHiveId);				
				if (vmbee.HiveIdList[i].hiveid == vmbee.selectedHiveId) {
					$log.debug('found hivename',vmbee.HiveIdList[i].name);
					vmbee.selectedHiveName = vmbee.HiveIdList[i].name;
				}
			}
			//set it in services so we can get it in another controller
			BeeServices.setHiveId(vmbee.selectedHiveId, vmbee.selectedHiveName);
			
			var themsg = "You have selected: " + vmbee.selectedHiveId + ' - ' + vmbee.selectedHiveName;
			Notification.info({message: themsg, delay: 5000});
			activate();
		}
		//Get Latest functions
        function getHiveList() {
            var thepath = '../v1/hivelist';
            return BeeServices.getHiveList(thepath).then(function (data) {
                $log.debug('getHiveList returned data');
                $log.debug(data);
				var tmp = {
					'hiveid' : 'All',
					'name' : 'All'
				}
                    vmbee.HiveIdList = data.HiveIdList;
					vmbee.HiveIdList.push(tmp);
                    return;
			},
			function (error) {
                    $log.debug('Caught an error getting hivelist, going to notify:', error); 
                    Notification.error({message: error, delay: 5000});
                    return ($q.reject(error));
            });
        }
		function getLight() {
            var thepath = '../v1/light';
            return BeeServices.getLight(thepath).then(function (data) {
                $log.debug('getLight returned data');
                $log.debug(data);
                    vmbee.gridLightHistoryOptions.data = data.LightList;

                    return vmbee.gridLightHistoryOptions.data;
			},
			function (error) {
                    $log.debug('Caught an error getting lightlist, going to notify:', error); 
                    Notification.error({message: error, delay: 5000});
                    return ($q.reject(error));
            });
        }
		function getPopulation() {
            var thepath = '../v1/populations';
            return BeeServices.getPopulation(thepath).then(function (data) {
                $log.debug('getPopulation returned data');
                $log.debug(data);
                    vmbee.gridPopulationOptions.data = data.PopulationList;

                    return vmbee.gridPopulationOptions.data;
			},
			function (error) {
                    $log.debug('Caught an error getting populationlist, going to notify:', error); 
                    Notification.error({message: error, delay: 5000});
                    return ($q.reject(error));
            });
        }
		function getAudio() {
			var thepath = '../v1//beeFreqStatus';
			return BeeServices.getBeeFrequency(thepath).then(function (data) {
				$log.debug('getBeeFrequency returned data');
				$log.debug(data);
					vmbee.gridAudioOptions.data = data.BeeFreqStatusList;
					return vmbee.gridAudioOptions.data;
			},
			function (error) {
					$log.debug('Caught an error getting beefreqstatuslist, going to notify:', error); 
					Notification.error({message: error, delay: 5000});
					return ($q.reject(error));
			});
		}
		function getOTemp() {
			var thepath = '../v1/outsidetemp';
			return BeeServices.getOutsideTemp(thepath).then(function (data) {
				$log.debug('getOutsideTemp returned data');
				$log.debug(data);
					vmbee.gridOutsideTempOptions.data = data.OutsideTempList;
					return vmbee.gridOutsideTempOptions.data;
			},
			function (error) {
					$log.debug('Caught an error getting outsidetemplist, going to notify:', error); 
					Notification.error({message: error, delay: 5000});
					return ($q.reject(error));
			});
		}
		function getFrameWeight() {
			var thepath = '../v1/HiveWeightStatus';
			return BeeServices.getHiveWeight(thepath).then(function (data) {
				$log.debug('getHiveWeight returned data');
				$log.debug(data);
					vmbee.gridFrameWeightOptions.data = data.HiveWeightStatusList;
					return vmbee.gridFrameWeightOptions.data;
			},
			function (error) {
					$log.debug('Caught an error getting HiveWeightStatusList, going to notify:', error); 
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
			},
			function (error) {
                    $log.debug('Caught an error getting hiveoptions, going to notify:', error); 
                    Notification.error({message: error, delay: 5000});
                    return ($q.reject(error));
            
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
					{
						field: 'hiveid',
						enableCellEdit: false,
						enableFiltering: true
					}, {
						field: 'datetime',
						enableCellEdit: false,
						enableFiltering: true,
						type: 'date',
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than',
								  flags: { date: true }							  
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than',
								  flags: { date: true }							  
								}
							  ]
					}, {
						field: 'temp',
						enableCellEdit: false,
						enableFiltering: true,
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than'
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than'
								}
							  ]
					}, {
						field: 'weight',
						enableCellEdit: false,
						enableFiltering: true
					}, {
						field: 'humidity',
						enableCellEdit: false,
						enableFiltering: true,
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than'
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than'
								}
							  ]
					}
					],

					//rowHeight: 15,
					showGridFooter: true,
					enableColumnResizing: true,
					appScopeProvider: vmbee,

					onRegisterApi: function(gridApi) {
						$log.debug('vm gridapi onRegisterApi');
						 vmbee.gridHiveApi = gridApi;

						}
				};

				$log.debug('setgridHiveOptions Options:', vmbee.gridHiveOptions);

			}        
	   function setGridLightHistoryOptions() {

				vmbee.gridLightHistoryOptions = {
					enableFiltering: true,
					paginationPageSizes: vmbee.limits,
					paginationPageSize: 10,
				columnDefs: [
					{
						field: 'hiveid',
						enableCellEdit: false,
						enableFiltering: true
					}, {
						field: 'datetime',
						enableCellEdit: false,
						enableFiltering: true,
						type: 'date',
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than',
								  flags: { date: true }							  
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than',
								  flags: { date: true }							  
								}
							  ]
					}, {
						field: 'lumen',
						enableCellEdit: false,
						enableFiltering: true,
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than'
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than'
								}
							  ]
					}
					],

					//rowHeight: 15,
					showGridFooter: true,
					enableColumnResizing: true,
					appScopeProvider: vmbee,

					onRegisterApi: function(gridApi) {
						$log.debug('vm gridapi onRegisterApi');
						 vmbee.gridLightApi = gridApi;

						}
				};

				$log.debug('setgridHiveOptions Options:', vmbee.gridLightHistoryOptions);

			} 
	   function setGridPopulationOptions() {

				vmbee.gridPopulationOptions = {
					enableFiltering: true,
					paginationPageSizes: vmbee.limits,
					paginationPageSize: 10,
				columnDefs: [
					{
						field: 'hiveid',
						enableCellEdit: false,
						enableFiltering: true
					}, {
						field: 'datetime',
						enableCellEdit: false,
						enableFiltering: true,
						type: 'date',
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than',
								  flags: { date: true }							  
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than',
								  flags: { date: true }							  
								}
							  ]
					}, {
						field: 'count',
						enableCellEdit: false,
						enableFiltering: true,
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than'
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than'
								}
							  ]
					}
					],

					//rowHeight: 15,
					showGridFooter: true,
					enableColumnResizing: true,
					appScopeProvider: vmbee,

					onRegisterApi: function(gridApi) {
						$log.debug('vm gridapi onRegisterApi');
						 vmbee.gridPopulationApi = gridApi;

						}
				};

				$log.debug('setgridPopulationOptions Options:', vmbee.gridPopulationOptions);

			} 
	   function setGridOutsideTempOptions() {

				vmbee.gridOutsideTempOptions = {
					enableFiltering: true,
					paginationPageSizes: vmbee.limits,
					paginationPageSize: 10,
				columnDefs: [
					{
						field: 'datetime',
						enableCellEdit: false,
						enableFiltering: true,
						type: 'date',
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than',
								  flags: { date: true }							  
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than',
								  flags: { date: true }							  
								}
							  ]
					}, {
						field: 'temp',
						enableCellEdit: false,
						enableFiltering: true,
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than'
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than'
								}
							  ]
					}
					],

					//rowHeight: 15,
					showGridFooter: true,
					enableColumnResizing: true,
					appScopeProvider: vmbee,

					onRegisterApi: function(gridApi) {
						$log.debug('vm gridapi onRegisterApi');
						 vmbee.gridOutsideTempApi = gridApi;

						}
				};

				$log.debug('setgridOutsideTempOptions Options:', vmbee.gridOutsideTempOptions);

			} 
	   function setGridAudioOptions() {

				vmbee.gridAudioOptions = {
					enableFiltering: true,
					paginationPageSizes: vmbee.limits,
					paginationPageSize: 10,
				columnDefs: [
					{
						field: 'hiveID',
						enableCellEdit: false,
						enableFiltering: true
					}, {
						field: 'datetime',
						enableCellEdit: false,
						enableFiltering: true,
						type: 'date',
						filters:  [
								{
								  condition: uiGridConstants.filter.GREATER_THAN,
								  placeholder: '> than',
								  flags: { date: true }							  
								},
								{
								  condition: uiGridConstants.filter.LESS_THAN,
								  placeholder: '< than',
								  flags: { date: true }							  
								}
							  ]
					}, {
						field: 'frequencyStatus',
						enableCellEdit: false,
						enableFiltering: true,
					}
					],

					//rowHeight: 15,
					showGridFooter: true,
					enableColumnResizing: true,
					appScopeProvider: vmbee,

					onRegisterApi: function(gridApi) {
						$log.debug('vm gridapi onRegisterApi');
						 vmbee.gridAudioApi = gridApi;

						}
				};

				$log.debug('setgridAudioOptions Options:', vmbee.gridAudioOptions);

			} 
	   function setGridFrameWeightOptions() {

            vmbee.gridFrameWeightOptions = {
                enableFiltering: true,
                paginationPageSizes: vmbee.limits,
                paginationPageSize: 10,
            columnDefs: [
                {
                    field: 'hiveid',
                    enableCellEdit: false,
                    enableFiltering: true
                }, {
                    field: 'datetime',
                    enableCellEdit: false,
                    enableFiltering: true,
					type: 'date',
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                }, {
                    field: 'frameweight1',
					name: 'Frame 1',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweight2',
					name: 'Frame 2',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweight3',
					name: 'Frame 3',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweight4',
					name: 'Frame 4',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweight5',
					name: 'Frame 5',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweight6',
					name: 'Frame 6',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweight7',
					name: 'Frame 7',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweight8',
					name: 'Frame 8',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                },{
                    field: 'frameweightsum',
					name: 'Frame Weight Sum',
                    enableCellEdit: false,
                    enableFiltering: true,
					filters:  [
                            {
                              condition: uiGridConstants.filter.GREATER_THAN,
                              placeholder: '> than',
							  flags: { date: true }							  
                            },
                            {
                              condition: uiGridConstants.filter.LESS_THAN,
                              placeholder: '< than',
							  flags: { date: true }							  
                            }
                          ]
                }
                ],

                //rowHeight: 15,
                showGridFooter: true,
                enableColumnResizing: true,
                appScopeProvider: vmbee,

                onRegisterApi: function(gridApi) {
                    $log.debug('vm gridapi onRegisterApi');
                     vmbee.gridFrameWeightApi = gridApi;

                    }
            };

            $log.debug('setgridFrameWeightOptions Options:', vmbee.gridFrameWeightOptions);

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
			vminst.lumenrange= [];
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
						var dataarr = [];
						vminst.graphid = 'OutsideTempSpline';
						vminst.legendcontainer = 'OutsideTempLegend';
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
					
					
						vminst.graphlabel = 'Outside Temperature';
						vminst.grapharray = otemparray;

						dataarr.push( { data: otemparray, label: vminst.graphlabel,  lines:{show:true}, points:{show:true}} );
						vminst.grapharray = dataarr;
						
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);
				});
				break;
			case 'hivetemp':
					getHiveTempRange().then(function () {
                        $log.debug('got HiveTempRange');
						//Hive Temp Range
						$log.debug('before graph',vminst.htemprange);
						var dataarr = [];
						vminst.graphid = 'HiveTempSpline';
						vminst.legendcontainer = 'HiveTempLegend';
						
						//get list of unique hives
						var uniqhives = _.uniq(vminst.htemprange, false, function(p){return p.hiveid});
						$log.debug('uniq hives',uniqhives);
						
						//loop through hives to match
						for (var uniq=0,ulen=uniqhives.length; uniq<ulen; uniq++) {
							var uhiveid = uniqhives[uniq].hiveid;
							var htemparray = [];
							vminst.graphlabel = 'Hive Temperature for hive:' + uhiveid;

							//$log.debug('hiv',hiveid);
							//sort the data for the hives
							for (var i=0,len=vminst.htemprange.length; i<len; i++) {
								$//log.debug('loop',vminst.htemprange[i].hiveid, hiveid);
								if (vminst.htemprange[i].hiveid == uhiveid) {
									var d2 = [];
									var tt = mysqlGmtStrToJSLocal(vminst.htemprange[i].datetime);
									//$log.debug('date conversion',vminst.htemprange[i].datetime, tt);
									d2[0] = tt;
									d2[1] = vminst.htemprange[i].temp;
									htemparray.push(d2);
									//$log.debug('htemp push',htemparray);
								}
							}
							dataarr.push( { data: htemparray, label: vminst.graphlabel,  lines:{show:true}, points:{show:true}} );
							//$log.debug('darr',dataarr);
						}
						$log.debug('hivetemp array',dataarr);
						vminst.grapharray = dataarr;
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);

                    });
				break;
			case 'hivehumidity':
					getHiveHumidityRange().then(function () {
                        $log.debug('got HiveHumidityRange');
						//Hive Humidity Range
						$log.debug('before graph', vminst.humidityrange)
						var dataarr = [];
						vminst.graphid = 'HumiditySpline';
						vminst.legendcontainer = 'HumidityLegend';
						
						//get list of unique hives
						var uniqhives = _.uniq(vminst.humidityrange, false, function(p){return p.hiveid});
						$log.debug('uniq hives',uniqhives);
						
						//loop through hives to match
						for (var uniq=0,ulen=uniqhives.length; uniq<ulen; uniq++) {
							var uhiveid = uniqhives[uniq].hiveid;
							var humidityarray = [];
							vminst.graphlabel = 'Humidity range for hive:' + uhiveid;
						
						
							//$log.debug('hiv',hiveid);
							//sort the data for the hives
							for (var i=0, len=vminst.humidityrange.length; i<len; i++) {
								//$log.debug('loop',vminst.htemprange[i].hiveid, hiveid);
								if (vminst.humidityrange[i].hiveid == uhiveid) {
									var d2 = [];
									var tt = mysqlGmtStrToJSLocal(vminst.humidityrange[i].datetime);
									//$log.debug('date conversion',vminst.htemprange[i].datetime, tt);
									d2[0] = tt;
									d2[1] = vminst.humidityrange[i].humidity;
									humidityarray.push(d2);
									//$log.debug('htemp push',htemparray);
								}
							}
						
							dataarr.push( { data: humidityarray, label: vminst.graphlabel,  lines:{show:true}, points:{show:true}} );
							//$log.debug('darr',dataarr);
						
						}
						$log.debug('humidity array',dataarr);
						vminst.grapharray = dataarr;
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);

                    });
				break;
			case 'weightstatus':
					getWeightStatusRange().then(function () {
                        $log.debug('got WeightStatusRange');
						//Hive weight Range
						$log.debug('before graph', vminst.weightrange)
						var dataarr1 = [];
						var dataarrsum = [];
						vminst.graphid1 = 'weightSplineFrame1';
						vminst.graphidsum = 'weightSplineSum';
						vminst.legendcontainer1 = 'weightLegend1';
						vminst.legendcontainersum = 'weightLegendsum';
						
						//get list of unique hives
						var uniqhives = _.uniq(vminst.weightrange, false, function(p){return p.hiveid});
						$log.debug('uniq hives',uniqhives);
						
						//loop through hives to match
						for (var uniq=0,ulen=uniqhives.length; uniq<ulen; uniq++) {
							var uhiveid = uniqhives[uniq].hiveid;
							var weightarraysum = [];
							vminst.graphlabelsum = 'frameweight sum range for hive:' + uhiveid;
						
						
							//$log.debug('hiv',hiveid);
							//sort the data for the hives
							for (var i=0, len=vminst.weightrange.length; i<len; i++) {
								//$log.debug('loop',vminst.htemprange[i].hiveid, hiveid);
								if (vminst.weightrange[i].hiveid == uhiveid) {
									var d2sum = [];
									var tt = mysqlGmtStrToJSLocal(vminst.weightrange[i].datetime);
									//$log.debug('date conversion',vminst.htemprange[i].datetime, tt);
									d2sum[0] = tt;
									d2sum[1] = vminst.weightrange[i].frameweightsum;
									weightarraysum.push(d2sum);
									//$log.debug('htemp push',htemparray);
								}
							}
							dataarrsum.push( { data: weightarraysum, label: vminst.graphlabelsum,  lines:{show:true}, points:{show:true}} );
							//$log.debug('darr',dataarr);
						}
						//FRAME WEIGHTS						
						//loop through hives to match
						for (var uniq=0,ulen=uniqhives.length; uniq<ulen; uniq++) {
							var uhiveid = uniqhives[uniq].hiveid;
							var weightarray1 = [];
							var weightarray2 = [];
							var weightarray3 = [];
							var weightarray4 = [];
							var weightarray5 = [];
							var weightarray6 = [];
							var weightarray7 = [];
							var weightarray8 = [];
							vminst.graphlabel1 = 'frameweight1 range for hive:' + uhiveid;
							vminst.graphlabel2 = 'frameweight2 range for hive:' + uhiveid;
							vminst.graphlabel3 = 'frameweight3 range for hive:' + uhiveid;
							vminst.graphlabel4 = 'frameweight4 range for hive:' + uhiveid;
							vminst.graphlabel5 = 'frameweight5 range for hive:' + uhiveid;
							vminst.graphlabel6 = 'frameweight6 range for hive:' + uhiveid;
							vminst.graphlabel7 = 'frameweight7 range for hive:' + uhiveid;
							vminst.graphlabel8 = 'frameweight8 range for hive:' + uhiveid;
						
							//$log.debug('hiv',hiveid);
							//sort the data for the hives
							for (var i=0, len=vminst.weightrange.length; i<len; i++) {
								//$log.debug('loop',vminst.htemprange[i].hiveid, hiveid);
								if (vminst.weightrange[i].hiveid == uhiveid) {
									var d21 = [];
									var d22 = [];
									var d23 = [];
									var d24 = [];
									var d25 = [];
									var d26 = [];
									var d27 = [];
									var d28 = [];
									var tt = mysqlGmtStrToJSLocal(vminst.weightrange[i].datetime);
									//$log.debug('date conversion',vminst.htemprange[i].datetime, tt);
									d21[0] = tt;
									d21[1] = vminst.weightrange[i].frameweight1;
									d22[0] = tt;
									d22[1] = vminst.weightrange[i].frameweight2;
									d23[0] = tt;
									d23[1] = vminst.weightrange[i].frameweight3;
									d24[0] = tt;
									d24[1] = vminst.weightrange[i].frameweight4;
									d25[0] = tt;
									d25[1] = vminst.weightrange[i].frameweight5;
									d26[0] = tt;
									d26[1] = vminst.weightrange[i].frameweight6;
									d27[0] = tt;
									d27[1] = vminst.weightrange[i].frameweight7;
									d28[0] = tt;
									d28[1] = vminst.weightrange[i].frameweight8;
									weightarray1.push(d21);
									weightarray2.push(d22);
									weightarray3.push(d23);
									weightarray4.push(d24);
									weightarray5.push(d25);
									weightarray6.push(d26);
									weightarray7.push(d27);
									weightarray8.push(d28);
									//$log.debug('htemp push',htemparray);
								}
							}
						
							dataarr1.push( { data: weightarray1, label: vminst.graphlabel1,  lines:{show:true}, points:{show:true}} );
							dataarr1.push( { data: weightarray2, label: vminst.graphlabel2,  lines:{show:true}, points:{show:true}} );
							dataarr1.push( { data: weightarray3, label: vminst.graphlabel3,  lines:{show:true}, points:{show:true}} );
							dataarr1.push( { data: weightarray4, label: vminst.graphlabel4,  lines:{show:true}, points:{show:true}} );
							dataarr1.push( { data: weightarray5, label: vminst.graphlabel5,  lines:{show:true}, points:{show:true}} );
							dataarr1.push( { data: weightarray6, label: vminst.graphlabel6,  lines:{show:true}, points:{show:true}} );
							dataarr1.push( { data: weightarray7, label: vminst.graphlabel7,  lines:{show:true}, points:{show:true}} );
							dataarr1.push( { data: weightarray8, label: vminst.graphlabel8,  lines:{show:true}, points:{show:true}} );
							//$log.debug('darr',dataarr);
						
						}

						
						$log.debug('weight array1',dataarr1);
						$log.debug('weight arraysum',dataarrsum);
						vminst.grapharray1 = dataarr1;
						vminst.grapharraysum = dataarrsum;
						getGraph(vminst.graphid1, vminst.graphlabel1, vminst.grapharray1, vminst.legendcontainer1);
						getGraph(vminst.graphidsum, vminst.graphlabelsum, vminst.grapharraysum, vminst.legendcontainersum);

                    });
				break;
			case 'light':
					getLightRange().then(function () {
                        $log.debug('got lightrange');
						//Light Range
						$log.debug('before graph', vminst.lumenrange);
						var dataarr = [];
						vminst.graphid = 'LightSpline';
						vminst.legendcontainer = 'LightLegend';
						
						//get list of unique hives
						var uniqhives = _.uniq(vminst.lumenrange, false, function(p){return p.hiveid});
						$log.debug('uniq hives',uniqhives);
						
						//loop through hives to match
						for (var uniq=0,ulen=uniqhives.length; uniq<ulen; uniq++) {
							var uhiveid = uniqhives[uniq].hiveid;
							var lightarray = [];
							vminst.graphlabel = 'Light Range for hive:' + uhiveid;
						
						//$log.debug('hiv',hiveid);
							//sort the data for the hives
							for (var i=0, len=vminst.lumenrange.length; i<len; i++) {
								$//log.debug('loop',vminst.htemprange[i].hiveid, hiveid);
								if (vminst.lumenrange[i].hiveid == uhiveid) {
									var d2 = [];
									var tt = mysqlGmtStrToJSLocal(vminst.lumenrange[i].datetime);
									//$log.debug('date conversion',vminst.htemprange[i].datetime, tt);
									d2[0] = tt;
									d2[1] = vminst.lumenrange[i].lumen;
									lightarray.push(d2);
									//$log.debug('htemp push',htemparray);
								}	
							}
							dataarr.push( { data: lightarray, label: vminst.graphlabel,  lines:{show:true}, points:{show:true}} );
							//$log.debug('darr',dataarr);
						}	
						$log.debug('light array',dataarr);
						vminst.grapharray = dataarr;
						getGraph(vminst.graphid, vminst.graphlabel, vminst.grapharray, vminst.legendcontainer);
							
                    });
				break;
			case 'population':
					getPopCountRange().then(function () {
                        $log.debug('got popcountrange');
						//Population Count Range
						$log.debug('before graph', vminst.countrange)
						var dataarr = [];
						vminst.graphid = 'PopulationSpline';
						vminst.legendcontainer = 'PopulationLegend';
						
						//get list of unique hives
						var uniqhives = _.uniq(vminst.countrange, false, function(p){return p.hiveid});
						$log.debug('uniq hives',uniqhives);
						
						//loop through hives to match
						for (var uniq=0,ulen=uniqhives.length; uniq<ulen; uniq++) {
							var uhiveid = uniqhives[uniq].hiveid;
							var populationarray = [];
							vminst.graphlabel = 'Hive Population for hive:' + uhiveid;
						
						//$log.debug('hiv',hiveid);
							//sort the data for the hives
							for (var i=0,len=vminst.countrange.length; i<len; i++) {
								$//log.debug('loop',vminst.htemprange[i].hiveid, hiveid);
								if (vminst.countrange[i].hiveid == uhiveid) {
									var d2 = [];
									var tt = mysqlGmtStrToJSLocal(vminst.countrange[i].datetime);
									//$log.debug('date conversion',vminst.htemprange[i].datetime, tt);
									d2[0] = tt;
									d2[1] = vminst.countrange[i].count;
									populationarray.push(d2);
									//$log.debug('htemp push',htemparray);
						
								}
							}
							dataarr.push( { data: populationarray, label: vminst.graphlabel,  lines:{show:true}, points:{show:true}} );
							//$log.debug('darr',dataarr);
						}
						$log.debug('population array',dataarr);
						vminst.grapharray = dataarr;
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
				var data = grapharray;	
							/*		series: {
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
			*/
				var options = {   
					grid: {
						borderColor: "green",
						borderWidth: 0,
						hoverable: true,
						margin: 10,
						minBorderMargin: 10
					},
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
						position: "ne"
					}
				};

				var plot = $.plot('#' + graphid, data, options);
				
					$('#' + graphid).bind("plothover", function (event, pos, item) {


							if (item) {
								var x = item.datapoint[0].toFixed(2),
									y = item.datapoint[1].toFixed(2);

								$("#tooltip").html(item.series.label + " = " + y)
									.css({top: item.pageY+5, left: item.pageX+5})
									.fadeIn(200);
							} else {
								$("#tooltip").hide();
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
                    vminst.lumenrange = data.LightList;
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
