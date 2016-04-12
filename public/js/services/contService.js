/**
 * Created by programmist on 12.04.2016.
 */
angular.module('contService', [])
    .factory('Cont', function($http) {
        return {
            // get all the comments
            get: function () {
                return $http.get('/api');
            }
        }
    });