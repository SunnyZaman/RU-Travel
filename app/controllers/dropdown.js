var app = angular.module('app');
app.controller('dropdown-controller', function ($scope, $http) {
    $scope.loadPlaces = function(){  
        $http.get("server/places/fetch.php")
        .then(function (response) {
            console.log("Response: ", response);
        }, function (error) {
            console.error(error);
        }); 
   } 
})