/**
 * Created by programmist on 12.04.2016.
 */
angular.module('mainCtrl', []).controller('mainController', function($scope, $http, Cont) {
        // object to hold all the data for the new cont form
        $scope.contData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the conts first and bind it to the $scope.conts object
        // use the function we created in our service
        // GET ALL contS ==============
        Cont.get()
            .success(function(data) {
                $scope.conts = data;
                $scope.loading = false;
            });



    });
