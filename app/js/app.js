(function () {
    'use strict';
    angular
        .module('ng-bee', [
        'ui.grid',
        'ui.utils',
   //     'ui.mask',
        'ngRoute',
        'ui.bootstrap',
        'ui-notification',
  //      'lvl.directives.dragdrop',
        'toggle-switch',
        'ngMessages',
  //      'ngCookies',
        'ui.grid.pagination',
        'ui.grid.cellNav',
        'ui.grid.edit',
        'ui.grid.autoResize',
        'ui.grid.selection',
'ui.grid.resizeColumns', 
'ui.grid.pinning', 
'ui.grid.moveColumns',
'ui.grid.exporter',
'ui.grid.importer', 
'ui.grid.grouping' ,       
'ui.grid.saveState' ,
        'ui.select',
   //             'iso.directives',
                'ngSanitize',
    'angularFileUpload',
  //  'akoenig.deckgrid'
        ])

    // allow DI for use in controllers, unit tests for lodash
    .constant('_', window._)
    .config(function(NotificationProvider) {
        NotificationProvider.setOptions({
            delay: 10000,
            startTop: 20,
            startRight: 10,
            verticalSpacing: 20,
            horizontalSpacing: 20,
            positionX: 'center',
            positionY: 'top'
        });
    })

    // use in views, ng-repeat="x in _.range(3)"
    .run(function ($rootScope) {
            $rootScope._ = window._;
        })
        .config(logConfig)
        .config(routeConfig)
        
    .run(function($rootScope, $location, $route, $routeParams) {
        console.log('locationpath',$location.path());
        console.log('$routeParams',$routeParams);

      $rootScope.$on('$routeChangeSuccess', function () {
            console.log('$routeChangeSuccess');
        console.log('routecurrent',$route.current);
      });
    })
    
    // Initialize the application
    .run(['$location', function AppRun($location) {
        //  debugger; // -->> here i debug the $location object to see what angular see's as URL
        console.log('$location setting in app');
        console.log($location);

    }]);
    
    $(document).ready(function() {
        console.log('fixing for drag-drop');
        jQuery.event.props.push('dataTransfer'); //prevent conflict with drag-drop
        console.log(jQuery.event.props);
    });
    
    logConfig.$inject = ['$logProvider'];
    routeConfig.$inject = ['$routeProvider', '$locationProvider'];
    //    flowConfig.$inject = ['flowFactoryProvider'];


    function logConfig($logProvider) {
        $logProvider.debugEnabled(true);
    }

    function routeConfig($routeProvider, $locationProvider) {
        console.log('enter routeConfig');
        //marissa this is the part that connects the menu to a page 
        $routeProvider
            .when('/', {
                templateUrl: 'templates/states/main.html'
            })
           .when('/hive', {
                templateUrl: 'templates/states/youHive.html'
            })
           .when('/bees', {
                templateUrl: 'templates/states/bee.html'
            })
           .when('/about', {
                templateUrl: 'templates/states/about.html'
            })
           .when('/help', {
                templateUrl: 'templates/states/help.html'
            })
			.when('/uploaddata', {
                templateUrl: 'templates/states/uploaddata.html'
            })
            .when('/bees/id/:id', {
                templateUrl: 'templates/states/bee.html'
            })
            .otherwise({
                redirectTo: '/'
            });
        $locationProvider.html5Mode(false);
        //    $locationProvider.hashPrefix('!');
    }
})();
