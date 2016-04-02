(function () {
    'use strict';
 
    angular
        .module('ng-bee')
		.controller('AppController', AppController);

    AppController.$inject = ['$scope', 
    ];
	
    function AppController( $scope){
        /* jshint validthis: true */
        var vm = this;
		//look into whether here is the right place for scraping the weather underground based on the hive
		//would need to have hive queries here
		
		$scope.$on('$routeChangeSuccess', function (event, current, previous){
			console.log('routechange in app for success');
			console.log('originalPath', current.originalPath);

		});
    
	}
 
	
})();    