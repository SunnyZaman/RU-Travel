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
    $scope.openUserModal = function(action, user){
        var data = null;
        if(action==='edit'){
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
            if(response){
                console.log("reloading users...");
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

        }).catch(function (reason) {
            console.log("Modal dismissed with reason: ", reason);
        });
    }
})
