(function () {
    'use strict';
    angular
    .module('ng-admin')
    .factory('BeeServices', BeeServices);
    BeeServices.$inject = ['$http', '$q', '$log'];
	
    function BeeServices( $http, $q, $log ) {
		var themodal = '';
		var thehive = 'All';
		var thename = 'All';
        var service = {
			setmodal: setmodal,
			getmodal: getmodal,
			setHiveId: setHiveId,
			getHiveId: getHiveId,
			getHiveName: getHiveName,
			getHiveList: getHiveList,
            getAllBeehives: getAllBeehives,
            getOutsideTemp: getOutsideTemp,
			getHiveTemp: getHiveTemp,
			getHiveHumidity: getHiveHumidity,
			getHiveWeight: getHiveWeight,
			getLight: getLight,
			getPopulation: getPopulation,
			getBeeFrequency: getBeeFrequency,
			updateAudio: updateAudio,
			updateFrameWeight: updateFrameWeight,
			updateHive: updateHive,
			updateLightHistory: updateLightHistory,
			updateOutsideTemp: updateOutsideTemp,
			updatePopulation: updatePopulation
        };
        return service;

		function setmodal(amodal) {
			$log.debug('BeeServices setmodal entered', amodal);
			themodal = amodal;
		}
		function getmodal() {
			$log.debug('BeeServices getmodal entered', themodal);
			return themodal;
		}
		function setHiveId(ahive, aname) {
			$log.debug('BeeServices setHiveId entered', ahive);
			thehive = ahive;
			thename = aname;
		}
		function getHiveId() {
			$log.debug('BeeServices getHiveId entered', thehive);
			return thehive;
		}		
		function getHiveName() {
			$log.debug('BeeServices getHiveName entered', thename);
			return thename;
		}	
		//Service Functions
        function getHiveList(path) {
            $log.debug('getHiveList service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
        function getAllBeehives(path) {
            $log.debug('getAllBeehives service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
        function getOutsideTemp(path) {
            $log.debug('getOutsideTemp service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
        function getHiveTemp(path) {
            $log.debug('getHiveTemp service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
		function getHiveHumidity(path) {
            $log.debug('getHiveHumidity service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
		function getHiveWeight(path) {
            $log.debug('getHiveWeight service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
		function getLight(path) {
            $log.debug('getLight service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
		function getPopulation(path) {
            $log.debug('getPopulation service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
		function getBeeFrequency(path) {
            $log.debug('getBeeFrequency service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }
		function updateAudio(path, audio){
			$log.debug('updateAudio data before post :' , audio);
			var request = $http({
				method: "POST",
				url: path,
			//    params: {
			//        action: "add"
			//    },
				data: {
					audio: audio
				}
			});
			return( request.then( handleSuccess, handleError ) );
		}
 		function updateFrameWeight(path, frame){
			$log.debug('updateFrameWeight data before post :' , frame);
			var request = $http({
				method: "POST",
				url: path,
			//    params: {
			//        action: "add"
			//    },
				data: {
					frame: frame
				}
			});
			return( request.then( handleSuccess, handleError ) );
		}
 		function updateHive(path, hive){
			$log.debug('updateAudio data before post :' , hive);
			var request = $http({
				method: "POST",
				url: path,
			//    params: {
			//        action: "add"
			//    },
				data: {
					hive: hive
				}
			});
			return( request.then( handleSuccess, handleError ) );
		}
 		function updateLightHistory(path, light){
			$log.debug('updateLightHistory data before post :' , light);
			var request = $http({
				method: "POST",
				url: path,
			//    params: {
			//        action: "add"
			//    },
				data: {
					light: light
				}
			});
			return( request.then( handleSuccess, handleError ) );
		}
 		function updateOutsideTemp(path, otemp){
			$log.debug('updateOutsideTemp data before post :' , otemp);
			var request = $http({
				method: "POST",
				url: path,
			//    params: {
			//        action: "add"
			//    },
				data: {
					otemp: otemp
				}
			});
			return( request.then( handleSuccess, handleError ) );
		}
 		function updatePopulation(path, population){
			$log.debug('updatePopulation data before post :' , population);
			var request = $http({
				method: "POST",
				url: path,
			//    params: {
			//        action: "add"
			//    },
				data: {
					population: population
				}
			});
			return( request.then( handleSuccess, handleError ) );
		}
 /*
     function refreshStudents(input) {
        var params = {input: input};
        return $http.get(
          '../v1/studentnames',
          {params: params}
        ).then(function(response) {
                    $log.debug('refreshStudents service success:');
                    $log.debug(response.data);
          return response.data;
        });
      }

        function getAllStudents(path) {
            $log.debug('getAllStudents service entered');
                    var request = $http({
                        method: "GET",
                        url: path
                    });
                    return( request.then( handleSuccess, handleError ) );
                
        }

 
        function getStudent(path) {
            return $http({method: 'GET', url: path}).
                success(function(data, status, headers, config) {
                    $log.debug('getStudent success:' + path);
                    $log.debug(data);
                    // this callback will be called asynchronously
                    // when the response is available
                    return data;
                }).
                error(function(data, status, headers, config) {
                    $log.debug('getStudent failure:' + path);
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        }


        function createStudent(path, thedata ) {
                    $log.debug('createStudent data before post :' , thedata);
                    var request = $http({
                        method: "POST",
                        url: path,
                    //    params: {
                    //        action: "add"
                    //    },
                        data: {
                            thedata: thedata
                        }
                    });
                    return( request.then( handleSuccess, handleError ) );
        }        
   */     
/*

        function updateStudent(path, students) {
                    $log.debug('updateStudent vm.data before put :' , students);
            return $http({method: 'PUT', url: path, data: students}).
                success(function(data, status, headers, config) {
                    $log.debug('updateStudent success:' + path);
                    $log.debug(data);

                    return data;
                }).
                error(function(data, status, headers, config) {
                    $log.debug('updateStudent failure:' + path);
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        }
        function getAllZips(path) {
            $log.debug('getAllZips entered', path, apikey);
            return $http(
                {
                    method: 'GET', 
                    url: path
//                    headers: {'Authorization': apikey}
                }).
                success(function(data, status, headers, config) {
                    $log.debug('getAllZips success:' + path);
                    $log.debug(data);
                    // this callback will be called asynchronously
                    // when the response is available
                    return data;
                }).
                error(function(data, status, headers, config) {
                    $log.debug('getAllStudents failure:' + path);
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        }

        function getStudentLists(path) {
            return $http({method: 'GET', url: path}).
                success(function(data, status, headers, config) {
                    $log.debug('getStudentLists success:' + path);
                    $log.debug(data);
                    // this callback will be called asynchronously
                    // when the response is available
                    return data;
                }).
                error(function(data, status, headers, config) {
                    $log.debug('getStudentLists failure:' + path);
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        }
        function getRankList(path) {
            return $http({method: 'GET', url: path}).
                success(function(data, status, headers, config) {
                    $log.debug('getRankList success:' + path);
                    $log.debug(data);
                    // this callback will be called asynchronously
                    // when the response is available
                    return data;
                }).
                error(function(data, status, headers, config) {
                    $log.debug('getRankList failure:' + path);
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
        }
*/
// PRIVATE METHODS.
// I transform the error response, unwrapping the application dta from the API response payload.
        function handleError( response ) {
                    // The API response from the server should be returned in a
                    // nomralized format. However, if the request was not handled by the
                    // server (or what not handles properly - ex. server error), then we
                    // may have to normalize it on our end, as best we can.
                    $log.debug('BeeServices failure:', response);
                    if (
                        ! angular.isObject( response.data ) ||
                        ! response.data.message
                        ) {
                        return( $q.reject( "An unknown error occurred." ) );
                    }
                    $log.debug('BeeServices detail:', response.status);
                    var status = response.status;
                    var message = response.data.message;
                    var err = {
                        status: status,
                        message: message
                    };                    
                    // Otherwise, use expected error message.
                    return( $q.reject( err ) );
                }
// I transform the successful response, unwrapping the application data from the API response payload.
        function handleSuccess( response ) {
                    $log.debug(' success:');
                    $log.debug(response.data);
                    return( response.data );
                }

        }
 })();
