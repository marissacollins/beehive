//anon function
(function () { 
    'use strict'; //checking for syntax issues
    angular
    .module('ng-bee') //Binds all of the angular modules into one
    .controller('UploadController', UploadController);
	
	 //injecting external functions into the controller
	UploadController.$inject = ['BeeServices',
    '$scope',
    '$log',
	'Notification'
    ];
	
	function UploadController(BeeServices, $scope, $log, Notification) {
			/* jshint validthis: true */
			var vmbee = this;
			//React to selecting hiveIdList
			vmbee.selectedHiveId = 'All';
			vmbee.selectedHiveName = 'All';
			vmbee.doHiveSelect = doHiveSelect;
			vmbee.getHiveList = getHiveList;
			
			activate();

			function activate() {
				$log.debug('about activate bee ');
				getHiveList().then(
				function () {
					$log.debug('hivelist returned');
				}, 
				function(error) {
				$log.debug('Caught an error getting hivelist, going to notify:', error); 
				Notification.error({message: error, delay: 5000});
					return ($q.reject(error));
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
			
			var themsg = "You selected Hive " + vmbee.selectedHiveId + ' for upload.';
			Notification.info({message: themsg, delay: 5000});
			//activate();
			
		}
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
			
	}
})();