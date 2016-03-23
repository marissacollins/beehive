(function () {
  'use strict';

  angular
    .module('ng-admin')
    .controller('ModalUploadController', ModalUploadController)
    .controller('ModalUploadInstanceController', ModalUploadInstanceController)
    .controller('FileUploadController', FileUploadController);


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

    FileUploadController.$inject = [
    '$scope',
    '$log',
    'FileUploader',
    'BeeServices'
    ];


  function ModalUploadController($scope,  $log, $uibModal) {
    /* jshint validthis: true */
    var vmfilemodal = this;

    vmfilemodal.animationsEnabled = true;

    vmfilemodal.openpick = openpick;
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
    
}

  function ModalUploadInstanceController($scope, $log, $uibModalInstance, uploadfile, BeeServices, $route) {
    /* jshint validthis: true */
    var vmfileselect = this;
    vmfileselect.ok = ok;
    vmfileselect.cancel = cancel;
    vmfileselect.uploadfile = uploadfile;

    vmfileselect.uploadfilelist = [];
    vmfileselect.uploadpath = '';
    vmfileselect.okuploadfile = '';


    activate();

    function activate() {
      console.log("fileselect hive");
      console.log(vmfileselect.hive);
    }

    function ok() {
      console.log('hit ok');
      console.log('got file for ok:', vmfileselect.okuploadfile);
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
	    $uibModalInstance.close(vmfileselect.okuploadfile);

	  }

	
    function cancel() {
      $uibModalInstance.dismiss('cancel');
    }

  }
 
  function FileUploadController($scope, $log, FileUploader, BeeServices) {
        /* jshint validthis: true */
        var vmbeefileupload = this;
		vmbeefileupload.beefile = '';

        vmbeefileupload.uploader = new FileUploader({
            url: '../v1/upload.php'
        });
        // FILTERS

		vmbeefileupload.uploader.filters.push({
            name: 'customFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                return this.queue.length < 10;
            }
        });
		
        // CALLBACKS

      vmbeefileupload.uploader.onSuccessItem = function (fileItem, response, status, headers) {
            console.info('onSuccessItem', fileItem, response, status, headers);
          vmbeefileupload.beefile = fileItem.file.name;
		  var hiveid = BeeServices.getHiveId();
		  BeeServices.updateAudio("../v1/updateAudio?filename=" + vmbeefileupload.beefile + "&hiveid=" + hiveid);
        };
        vmbeefileupload.uploader.onErrorItem = function (fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
        };
        vmbeefileupload.uploader.onCancelItem = function (fileItem, response, status, headers) {
            console.info('onCancelItem', fileItem, response, status, headers);
        };
		vmbeefileupload.uploader.onCompleteAll = function() {
            console.info('onCompleteAll');
        };		
        console.info('uploader', vmbeefileupload.uploader);

    }
 })();