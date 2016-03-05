(function () {
    'use strict';

    angular
        .module('ng-admin')

    .controller('BeeController', BeeController);
    BeeController.$inject = ['BeeServices',
    '$scope',
    '$rootScope',
    '$routeParams',
    '$log',
    '$location',
    '$q'
    ];

    function BeeController(BeeServices, $scope, $rootScope, $routeParams, $log, $location, $q) {
        /* jshint validthis: true */
        var vmbee = this;
        vmbee.getBeeHives = getBeeHives;
        vmbee.getOutsideTemp = getOutsideTemp;
        vmbee.outsidetemp = [];

        vmbee.setGridHiveOptions = setGridHiveOptions;
        vmbee.highlightFilteredHeader = highlightFilteredHeader;
        vmbee.limit = 0;
        vmbee.limits = [10,20,50,100,200,500,5000];
        vmbee.gridHiveOptions={};

        
/*
        vmbee.getStudent = getStudent;
        vmbee.idpresent = idpresent;
        vmbee.getAllZips = getAllZips;
        vmbee.getStudentLists = getStudentLists;
        vmbee.getRankList = getRankList;
        vmbee.updateStudent = updateStudent;
        vmbee.students = [];
        vmbee.genders = [];
        vmbee.zipList = [];
        vmbee.concat = '';
        vmbee.ContactTypeList = [];
        vmbee.CurrentRankList = [];
        vmbee.CurrentReikiRankList = [];
        vmbee.StudentSchoolList = [];
        vmbee.GuiSizeList = [];
        vmbee.ShirtSizeList = [];
        vmbee.BeltSizeList = [];
        vmbee.instructorTitleList = [];
        vmbee.getBirthday = getBirthday;
        vmbee.dateopen = dateopen;
        vmbee.students.pictureurldecache = undefined;
        vmbee.EventName = '';
        vmbee.age = age;

        vmbee.menu_h = $('#sidebar').height();
        vmbee.setHeight = setHeight;
        vmbee.path = '../v1/bees/' + $routeParams.id;
        vmbee.zippath = '../v1/zips';
        vmbee.id = $routeParams.id;

        vmbee.sListPath = '../v1/studentlists';
        vmbee.rankListPath = '../v1/ranklist';

        $log.debug('Routeparam is:');
        $log.debug($routeParams.id);

        vmbee.status = {
            opened: false
        };

        setLists();
        getAllZips();
        getStudentLists();
        getRankList();
        */
        activate();

/*        function idpresent() {
            return vmbee.id > 0;
        }
        
        function dateopen($event) {
            vmbee.status.opened = true;
        }
*/
        function activate() {
            $log.debug('about activate bee ');
            setGridHiveOptions();

           $q.all([
                    getBeeHives().then(function () {
                        $log.debug('activated Beehive view');

                    }, function(error) {
                             return ($q.reject(error));
                    }),
                    getOutsideTemp().then(function () {
                        $log.debug('got outsidetemp');

                    }, function(error) {
                        vmbee.outsidetemp=[];
                             return ($q.reject(error));
                    })
                ])
                .then(function() {
                         $log.debug('all data returned');
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

        function getOutsideTemp() {
            var thepath = '../v1/outsidetemp';
            var thepath = encodeURI('../v1/outsidetemp?thelimit=1' );
                
            return BeeServices.getOutsideTemp(thepath).then(function (data) {
                $log.debug('getOutsideTemp returned data');
                $log.debug(data);
                    vmbee.outsidetemp = data.OutsideTempList;

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
        /*
        function getBirthday(bday) {
            $log.debug('bday');
            $log.debug(bday);
            return new Date(bday);
        }
        function age(bdate) {
            var birth = new Date(bdate);
            var curr  = new Date();
            var diff = curr.getTime() - birth.getTime();
            return Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));
        }


        function getStudent() {
            return BeeServices.getStudent(vmbee.path).then(function (data) {
                $log.debug('getStudent returned data');
                $log.debug(data.data);
                //BeeServices.setTheStudent(data.data);
                vmbee.students = data.data;
                return vmbee.students;
            });
        }

        function updateStudent() {
            $log.debug('about updateStudent ', vmbee.students);
            return BeeServices.updateStudent(vmbee.path, vmbee.students).then(function (data) {
                $log.debug('updateStudent returned data: goto', vmbee.path);
                $log.debug(data.data);
                vmbee.students = data.data;
                getStudent();
            });
        }

        function getAllZips() {
            return BeeServices.getAllZips(vmbee.zippath).then(function (data) {
                $log.debug('getAllZips returned data');
                $log.debug(data.data);
                vmbee.zipList = data.data;

                return vmbee.zipList;
            });
        }

        function getStudentLists() {
            return BeeServices.getStudentLists(vmbee.sListPath).then(function (data) {
                $log.debug('getStudentLists returned data');
                $log.debug(data.data);
                vmbee.StudentList = data.data;

                return vmbee.StudentList;
            });
        }

        function getRankList() {
            return BeeServices.getRankList(vmbee.rankListPath).then(function (data) {
                $log.debug('getRankList returned data');
                $log.debug(data.data);
                vmbee.RankList = data.data;

                return vmbee.RankList;
            });
        }

        function setHeight() {
            $('#form-layouts-editstudent ul.nav-pills li a').live('click', function () {
                $log.debug('set height');
                var tab_id = $(this).attr('href');
                var tab_h = $(tab_id).height();
                if (tab_h < vmbee.menu_h) {
                    $(tab_id).css('height', '960px');
                }
            });
        }

        function setLists() {
            vmbee.genders = {
    availableOptions: [
      {id: 'Female', name: 'Female'},
      {id: 'Male', name: 'Male'}
    ],
   };
           // vmbee.genders = {id:'Female', id:'Male'};
        }

  */
	}
	
    setTimeout(function(){
        var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',');

		//lookup flot and sparkline
		//http://www.flotcharts.org/
		//http://omnipotent.net/jquery.sparkline/#s-about
		
        try {

        //BEGIN LINE CHART SPLINE
        var d2_1 = [["Jan", 181],["Feb", 184],["Mar", 189],["Apr", 180],["May", 190],["Jun", 183],["Jul", 185],["Aug", 188],["Sep", 202]];
        var d2_2 = [["Jan", 165],["Feb", 172],["Mar", 175],["Apr", 176],["May", 164],["Jun", 171],["Jul", 175],["Aug", 180],["Sep", 181]];
        var d2_3 = [["Jan", 128],["Feb", 131],["Mar", 140],["Apr", 150],["May", 140],["Jun", 144],["Jul", 146],["Aug", 155],["Sep", 158]];

        $.plot("#line-chart-spline", [{
            data: d2_1,
            label: "Children",
            color: "#2ecc71"
        },{
            data: d2_2,
            label: "Adults",
            color: "#e74c3c"
        },{
            data: d2_3,
            label: "Blackbelts",
            color: "#2980b9"
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
                    show: !0,
                    radius: 4
                }
            },
            grid: {
                borderColor: "#ffffff",
                borderWidth: 1,
                hoverable: !0
            },
            tooltip: !0,
            tooltipOpts: {
                content: "%x : %y",
                defaultTheme: false
            },
            xaxis: {
                tickColor: "#fafafa",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#fafafa"
            },
            shadowSize: 0
        });
        //END LINE CHART SPLINE
            
        //BEGIN CHART TRAFFIC SOURCES
        var d6_1 = [39];
        var d6_2 = [41];
        var d6_3 = [20];
        $.plot('#traffice-sources-chart', [{
            data: d6_1,
            label: "Ages 4-7",
            color: "#e74c3c"
        },
            {
                data: d6_2,
                label: "Ages 8-12",
                color: "#2ecc71"
            },
            {
                data: d6_3,
                label: "Ages 13-17",
                color: "#3498db"
            }], {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
        //END CHART TRAFFIC SOURCES

        //BEGIN CHART NEW CUSTOMER
        var d7 = [["Jan", 200],["Feb", 178],["Mar", 130],["Apr", 150],["May", 220],["Jun", 320]];
        $.plot("#new-customer-chart", [{
            data: d7,
            color: "#01b6ad"
        }], {
            series: {
                bars: {
                    align: "center",
                    lineWidth: 0,
                    show: !0,
                    barWidth: 0.6,
                    fill: 0.9
                }
            },
            grid: {
                borderColor: "#fafafa",
                borderWidth: 1,
                hoverable: !0
            },
            tooltip: !0,
            tooltipOpts: {
                content: "%x : %y",
                defaultTheme: false
            },
            xaxis: {
                tickColor: "#fafafa",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#fafafa"
            },
            shadowSize: 0
        });
        //END CHART NEW CUSTOMER

        //BEGIN CHART DOWNLOAD UPLOAD
        var d8_1 = [["Jan", 80],["Feb", 76],["Mar", 110],["Apr", 90],["May", 123],["Jun", 150],["Jul", 170]];
        var d8_2 = [["Jan", 70],["Feb", 49],["Mar", 70],["Apr", 60],["May", 86],["Jun", 100],["Jul", 150]];
        $.plot("#internet-speed-chart", [{
            data: d8_1,
            label: "Adults",
            color: "#c0392b"
        },{
            data: d8_2,
            label: "Children",
            color: "#2ecc71"
        }], {
            series: {
                lines: {
                    show: !1
                },
                splines: {
                    show: !0,
                    tension: 0.4,
                    lineWidth: 2,
                    fill: 0.8
                },
                points: {
                    show: !0,
                    radius: 4
                }
            },
            grid: {
                borderColor: "#fafafa",
                borderWidth: 1,
                hoverable: !0
            },
            tooltip: !0,
            tooltipOpts: {
                content: "%x : %y",
                defaultTheme: false
            },
            xaxis: {
                tickColor: "#fafafa",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#fafafa"
            },
            shadowSize: 0
        });
        //END CHART DOWNLOAD UPLOAD

        

        //BEGIN AREA CHART SPLINE
        var d9_1 = [["Jan", 67],["Feb", 91],["Mar", 36],["Apr", 150],["May", 28],["Jun", 123],["Jul", 38]];
        var d9_2 = [["Jan", 59],["Feb", 49],["Mar", 45],["Apr", 94],["May", 76],["Jun", 22],["Jul", 31]];
        $.plot("#area-chart-spline-db", [{
            data: d9_1,
            label: "Adults",
            color: "#ffce54"
        },{
            data: d9_2,
            label: "Children",
            color: "#B33F93"
        }], {
            series: {
                lines: {
                    show: !1
                },
                splines: {
                    show: !0,
                    tension: 0.4,
                    lineWidth: 2,
                    fill: 0.8
                },
                points: {
                    show: !0,
                    radius: 4
                }
            },
            grid: {
                borderColor: "#fafafa",
                borderWidth: 1,
                hoverable: !0
            },
            tooltip: !0,
            tooltipOpts: {
                content: "%x : %y",
                defaultTheme: true
            },
            xaxis: {
                tickColor: "#fafafa",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#fafafa"
            },
            shadowSize: 0
        });
        //END AREA CHART SPLINE

		 } catch(e) {
                console.log(e.message, "from", e.stack);
                // You can send data to your server
                // sendError(data);
                //throw e;
        }
		
    },500);
  
    

})();
