var app = angular.module('app', ['ngRoute']);
app.config(['$routeProvider', function($routeProvider){
    $routeProvider
    .when('/admin',{
        templateUrl: 'views/admin/admin.php',
    })
    .when('/plan',{
        templateUrl: 'views/user/plans.php'
    })
    .otherwise({
        redirectTo:'/plans'
    })
}]);
app.controller('app-controller', function ($scope, $http) {
    $scope.closeMsg = function () {
        $scope.alertMsg = false;
    };
    $scope.authTitle = "Login";
    $scope.login = true;

    $scope.showRegister = function () {
        $scope.authTitle = "Register";
        $scope.login = false;
        $scope.alertMsg = false;
    };

    $scope.showLogin = function () {
        $scope.authTitle = "Login";
        $scope.login = true;
        $scope.alertMsg = false;
    };

    $scope.submitRegister = function () {
        console.log($scope.registerData);
        
        $http({
            method: "POST",
            url: "server/auth/register.php",
            data: $scope.registerData
        }).then(function (response) {
            console.log("Response: ", response);

            $scope.alertMsg = true;
            if (response.data.error != '') {
                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = response.data.error;
            }
            else {
                $scope.alertClass = 'alert-success';
                $scope.alertMessage = response.data.message;
                $scope.registerData = {};
                $scope.authTitle = "Login";
                $scope.login = true;
            }
        }, function (error) {
            console.error(error);
        });
    };

    $scope.submitLogin = function () {
        console.log($scope.loginData);
        $http({
            method: "POST",
            url: "server/auth/login.php",
            data: $scope.loginData
        }).then(function (response) {
            console.log("Response: ", response);
            if (response.data.error != '') {
                $scope.alertMsg = true;
                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = response.data.error;
            }
            else {
                location.reload();
            }
        }, function (error) {
            console.error(error);
        });
    };

});