/**
 * Created by programmist on 12.04.2016.
 */
angular.module('mainCtrl', []).controller('mainController', function($scope, $http, Cont, $log) {
        // object to hold all the data for the new cont form
        $scope.contData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        $scope.currentPage = 0;
        $scope.totalItems = 0;
        $scope.maxSize = 5;
        $scope.itemsPerPage = 10;
    // get all the conts first and bind it to the $scope.conts object
        // use the function we created in our service
        // GET ALL contS ==============
        $scope.getConts = function (page) {
            Cont.get($scope.currentPage)
                .then(function (res) {
                    $scope.conts = res.data.data;
                    $scope.totalItems = res.data.total;
                    $scope.currentPage = res.data.current_page;
                    $scope.loading = false;
                    $log.log('$scope.totalItems '+$scope.totalItems);
                },function(data){})
        };

        $scope.$watch('currentPage', function() {
            $scope.getConts($scope.currentPage);
        });
        $scope.pageChanged = function() {
            $log.log('Page changed to: ' + $scope.currentPage);
        };

    });
