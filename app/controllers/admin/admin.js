var app = angular.module('app');
app.controller('admin-controller', function ($scope, $location) {
    $scope.initializeData = function () {

    }
    $scope.isActive = function (viewLocation) {
        return viewLocation === $location.hash();
    };
})
app.controller('admin-users-controller', function ($scope, $http, $uibModal, $rootScope) {
    $scope.loadUsers = function () {
        console.log("Loading users...");
        $scope.getUsers();
    }
    $scope.getUsers = function () {
        $http({
            method: "POST",
            url: "server/admin/fetch/users.php"
        })
            .then(function (response) {
                console.log("Response: ", response.data);
                $scope.users = response.data;

            }, function (error) {
                console.error(error);
            });
    }
    $scope.openUserModal = function (action, user) {
        var data = null;
        if (action === 'edit') {
            data = user;
        }
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: 'views/admin/modals/user.html',
            controller: 'user-modal-controller',
            backdrop: 'static',
            size: 'lg',
            resolve: {
                data: function () {
                    return data;
                }
            }
        });
        modalInstance.result.then(function (response) {
            if (response) {
                console.log("reloading users...");
                $scope.getUsers();
            }

        }).catch(function (reason) {
            console.log("Modal dismissed with reason: ", reason);
        });
    }
    $scope.deleteUser = function (id) {

        if (confirm("Are you sure you want to remove User?")) {
            var data = { table: "RUTravelUsers", id: id, value: "User" };
            $http({
                method: "POST",
                url: "server/admin/delete.php",
                data: data
            }).then(function (response) {
                console.log(response);

                var toast = "success";
                if (!response.data.deleted) {
                    toast = "error";
                }
                toastr.options = $rootScope.toastOptions;
                toastr[toast](response.data.message);
                if (response.data.deleted) {
                    $scope.getUsers();
                }
            }, function (error) {
                console.error(error);
            });
        }
    }
})
