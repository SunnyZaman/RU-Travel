var app = angular.module('app');
app.controller('orders-controller', function ($scope, $http) {
    $scope.loadOrders = function () {
        $http.get("server/places/invoices/fetch.php")
            .then(function (response) {
                console.log("Response: ", response.data);
                $scope.orders = response.data;
            }, function (error) {
                console.error(error);
            });
    }
})