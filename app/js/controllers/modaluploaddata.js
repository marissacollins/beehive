(function () {
  'use strict';

  angular
    .module('ng-bee')
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

    activate();

    function activate() {
      console.log("fileselect hive");
    }

    function ok() {
      console.log('hit ok');
	    $uibModalInstance.close();

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
		  BeeServices.uploadData("../v1/uploadData?filename=" + vmbeefileupload.beefile + "&hiveid=" + hiveid);
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