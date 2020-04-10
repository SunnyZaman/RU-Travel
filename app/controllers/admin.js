var app = angular.module('app');
app.controller('admin-controller', function ($scope, $location) {
    $scope.initializeData = function () {
       
    }
    $scope.isActive = function (viewLocation) { 
        console.log(viewLocation);
        console.log($location.hash());
        
        return viewLocation === $location.hash();
    };
})