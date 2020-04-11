var app = angular.module('app');
app.controller('user-modal-controller', function ($scope, $uibModalInstance, data, $http, $rootScope) {
    if (data !== null) {
        $scope.action = "Edit";
        $scope.submitType = "Save";
        $scope.userData = {
            firstName: data.FirstName,
            lastName: data.LastName,
            email: data.Email,
            phoneNumber: data.Telephone,
            address: data.UserAddress
        }
    }
    else {
        $scope.action = "Add";
        $scope.submitType = "Add";
    }
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    }
    $scope.submitUser = function () {
        switch ($scope.action) {
            case "Edit":

                break;
            case "Add":
                $http({
                    method: "POST",
                    url: "server/auth/register.php",
                    data: $scope.userData
                }).then(function (response) {
                    console.log("Response: ", response);
                    var toast = "success";
                    if (!response.data.registered){
                        toast="error";
                    }
                    toastr.options = $rootScope.toastOptions;
                    toastr[toast](response.data.message);
                    if (response.data.registered){
                        $uibModalInstance.close(response.data.registered);
                    }
                }, function (error) {
                    console.error(error);
                });
                break;
            default:
                break;
        }
    }
})