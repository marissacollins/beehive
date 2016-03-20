//anon function
(function () { 
    'use strict'; //checking for syntax issues
    angular
    .module('ng-admin') //Binds all of the angular modules into one
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
			
	}
})();