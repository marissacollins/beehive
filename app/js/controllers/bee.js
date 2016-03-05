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
    '$location'
    ];

    function BeeController(BeeServices, $scope, $rootScope, $routeParams, $log, $location) {
        /* jshint validthis: true */
        var vmbee = this;
        vmbee.getBeeHives = getBeeHives;
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
            
            return getBeeHives().then(function () {
                $log.debug('activated Beehive view');

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

})();
