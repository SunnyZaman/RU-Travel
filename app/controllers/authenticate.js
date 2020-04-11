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
        console.log($scope.registerData);
        
        $http({
            method: "POST",
            url: "server/auth/register.php",
            data: $scope.registerData
        }).then(function (response) {
            console.log("Response: ", response);
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