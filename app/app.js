var app = angular.module('app', []);
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
        $http({
            method: "POST",
            url: "register.php",
            data: $scope.registerData
        }).then(function (response) {
            console.log(response);

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
        $http({
            method: "POST",
            url: "login.php",
            data: $scope.loginData
        }).success(function (data) {
            if (data.error != '') {
                $scope.alertMsg = true;
                $scope.alertClass = 'alert-danger';
                $scope.alertMessage = data.error;
            }
            else {
                location.reload();
            }
        });
    };

});