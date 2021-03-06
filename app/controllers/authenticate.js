var app = angular.module('app');
app.controller('auth-controller', function ($scope, $http, $rootScope) {
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
        
        $http({
            method: "POST",
            url: "server/auth/register.php",
            data: $scope.registerData
        }).then(function (response) {
            var toast = "error";
            if (response.data.registered){
                toast="success";
                $scope.registerData = {};
                $scope.authTitle = "Login";
                $scope.login = true;
            }
            toastr.options = $rootScope.toastOptions;
            toastr[toast](response.data.message);
        }, function (error) {
            console.error(error);
        });
    };

    $scope.submitLogin = function () {
        $http({
            method: "POST",
            url: "server/auth/login.php",
            data: $scope.loginData
        }).then(function (response) {
            if (!response.data.loggedIn) {
            toastr.options = $rootScope.toastOptions;
            toastr["error"](response.data.error);
            }
            else {
                location.reload();
            }
        }, function (error) {
            console.error(error);
        });
    };

});