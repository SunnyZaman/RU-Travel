var app = angular.module('app');
// Users
app.controller('user-modal-controller', function ($scope, $uibModalInstance, data, $http, $rootScope) {
    if (data !== null) {
        $scope.action = "Edit";
        $scope.submitType = "Save";
        $scope.userData = {
            firstName: data.FirstName,
            lastName: data.LastName,
            email: data.Email,
            currentEmail: data.Email,
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
                $http({
                    method: "POST",
                    url: "server/admin/update/user.php",
                    data: $scope.userData
                }).then(function (response) {
                    console.log("Response: ", response);
                    var toast = "success";
                    if (!response.data.updated) {
                        toast = "error";
                    }
                    toastr.options = $rootScope.toastOptions;
                    toastr[toast](response.data.message);
                    if (response.data.updated) {
                        $uibModalInstance.close(response.data.updated);
                    }
                }, function (error) {
                    console.error(error);
                });
                break;
            case "Add":
                $http({
                    method: "POST",
                    url: "server/auth/register.php",
                    data: $scope.userData
                }).then(function (response) {
                    console.log("Response: ", response);
                    var toast = "success";
                    if (!response.data.registered) {
                        toast = "error";
                    }
                    toastr.options = $rootScope.toastOptions;
                    toastr[toast](response.data.message);
                    if (response.data.registered) {
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
// Places
app.controller('place-modal-controller', function ($scope, $uibModalInstance, data, $http, $rootScope) {
    if (data !== null) {
        $scope.action = "Edit";
        $scope.submitType = "Save";
        $scope.placeData = {
            continent: data.Continent,
            country: data.Country,
            city: data.City,
            placeType: data.PlaceType,
            attraction: data.Attraction,
            currentAttraction: data.Attraction
        }
    }
    else {
        $scope.action = "Add";
        $scope.submitType = "Add";
    }
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    }
    $scope.submitPlace = function () {
        switch ($scope.action) {
            case "Edit":
                $http({
                    method: "POST",
                    url: "server/admin/update/place.php",
                    data: $scope.placeData
                }).then(function (response) {
                    console.log("Response: ", response);
                    var toast = "success";
                    if (!response.data.updated) {
                        toast = "error";
                    }
                    toastr.options = $rootScope.toastOptions;
                    toastr[toast](response.data.message);
                    if (response.data.updated) {
                        $uibModalInstance.close(response.data.updated);
                    }
                }, function (error) {
                    console.error(error);
                });
                break;
            case "Add":
                $http({
                    method: "POST",
                    url: "server/admin/insert/place.php",
                    data: $scope.placeData
                }).then(function (response) {
                    console.log("Response: ", response);
                    var toast = "success";
                    if (!response.data.inserted) {
                        toast = "error";
                    }
                    toastr.options = $rootScope.toastOptions;
                    toastr[toast](response.data.message);
                    if (response.data.inserted) {
                        $uibModalInstance.close(response.data.inserted);
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