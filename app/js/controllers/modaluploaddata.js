(function () {
  'use strict';

  angular
    .module('ng-admin')
    .controller('ModalUploadController', ModalUploadController)
    .controller('ModalUploadInstanceController', ModalUploadInstanceController);


  ModalUploadController.$inject = [
      '$scope',
      '$log',
      '$uibModal'
    ];
  ModalUploadInstanceController.$inject = [
      '$scope',
      '$log',
      '$uibModalInstance',
      'uploadfile',
      'BeeServices',
      '$route'
    ];

      '$scope',
      '$log',
      '$uibModalInstance',
      'uploadfile',
      'BeeServices',
      'uiGridConstants',
      '$timeout',
      '$route'
    ];


  function ModalUploadController($scope,  $log, $uibModal) {
    /* jshint validthis: true */
    var vmfilemodal = this;

    vmfilemodal.animationsEnabled = true;

    vmfilemodal.openpick = openpick;
    vmfilemodal.opensearch = opensearch;
    vmfilemodal.file = ''; 
    vmfilemodal.modalInstance = undefined;

    function openpick() {

      vmfilemodal.modalInstance = $uibModal.open({
        animation: vmfilemodal.animationsEnabled,
        templateUrl: 'myPickupload.html',
        controller: 'ModalUploadInstanceController as vmfileselect',
        size: 'lg',
        resolve: {
          uploadfile: function () {
            return vmfilemodal.uploadfile;
          }
        }
      });
      vmfilemodal.modalInstance.result.then(function (selectedfile, hive) {
          console.log('pick upload modalInstance result uploadfile:', selectedfile);
        vmfilemodal.uploadfile = selectedfile;
        vmfilemodal.hive = hive;
      }, function () {
        $log.info('Modal dismissed at: ' + new Date());
      });
    }
    

      vmfilemodal.modalInstance = $uibModal.open({
        animation: vmfilemodal.animationsEnabled,
        templateUrl: 'myPicksearch.html',
        controller: 'ModalUploadInstance2Controller as vmfilesearch',
        size: 'lg',
        resolve: {
          uploadfile: function () {
            return vmfilemodal.uploadfile;
          }
        }
      });
      vmfilemodal.modalInstance.result.then(function (selectedfile, hive) {
          console.log('picsearch modalInstance result uploadfile:', selectedfile);
        
        vmfilemodal.uploadfile = selectedfile;
        vmfilemodal.hive = hive;
      }, function () {
        $log.info('Modal dismissed at: ' + new Date());
      });

    }
  }

  function ModalUploadInstanceController($scope, $log, $uibModalInstance, uploadfile, BeeServices, $route) {
    /* jshint validthis: true */
    var vmfileselect = this;
    vmfileselect.ok = ok;
    vmfileselect.cancel = cancel;
    vmfileselect.uploadfile = uploadfile;

    vmfileselect.uploadfilelist = [];
    vmfileselect.uploadpath = '';
    vmfileselect.hive = BeeServices.getTheStudent();
    vmfileselect.okuploadfile = '';


    activate();

    function activate() {
      console.log("fileselect hive");
      console.log(vmfileselect.hive);
    }

    function ok() {
      console.log('hit ok');
      var thisstudent = BeeServices.getTheStudent();
      vmfileselect.okuploadfile = BeeServices.getstudentuploadfile();
      console.log('got file for ok:', vmfileselect.okuploadfile);
      console.log('for hive:' ,thisstudent);
      $uibModalInstance.close(vmfileselect.okuploadfile, thisstudent);
	  vminst.uploadType = "";
	switch(vmfileselect.uploadType)  {
		case 'audiofile':
			vmfileselect.uploadpath = '../v1/updateAudio';
		break;
		case 'lightfile':
			vmfileselect.uploadpath = '../v1/updateLightHistory';
		break;
		case 'populationfile':
			vmfileselect.uploadpath = '../v1/updatePopulation';

		break;
		case 'hivefile':
			vmfileselect.uploadpath = '../v1/updateHive';

		break;
		case 'otempfile':
			vmfileselect.uploadpath = '../v1/updateOutsideTemp';

		break;
		case 'frameweightfile':
			vmfileselect.uploadpath = '../v1/updateFrameWeight';

		break;
		default:
			vmfileselect.uploadpath = '';

		
	}
	  }

	
    function cancel() {
      $uibModalInstance.dismiss('cancel');
    }

  }
 
})();