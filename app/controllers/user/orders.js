var app = angular.module('app');
app.controller('orders-controller', function ($scope, $http) {
    $scope.loadOrders = function () {
        $scope.orders =[];
        $http.get("server/places/invoices/fetch.php")
            .then(function (response) {
                if(response.data!=="null"){
                $scope.orders = response.data;
                }
            }, function (error) {
                console.error(error);
            });
    }
})