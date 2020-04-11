var app = angular.module('app');
app.controller('admin-controller', function ($scope, $location) {
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
        $scope.users = [];
        $http({
            method: "POST",
            url: "server/admin/fetch/users.php"
        })
            .then(function (response) {
                if(response.data!=="null"){
                $scope.users = response.data;
                }
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

app.controller('admin-places-controller', function ($scope, $http, $uibModal, $rootScope) {
    $scope.loadPlaces = function () {
        console.log("Loading places...");
        $scope.getPlaces();
    }
    $scope.getPlaces = function () {
        $scope.places = [];
        $http({
            method: "POST",
            url: "server/admin/fetch/places.php"
        })
            .then(function (response) {
                if(response.data!=="null"){
                $scope.places = response.data;
                }
            }, function (error) {
                console.error(error);
            });
    }
    $scope.openPlaceModal = function (action, user) {
        var data = null;
        if (action === 'edit') {
            data = user;
        }
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: 'views/admin/modals/place.html',
            controller: 'place-modal-controller',
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
                $scope.getPlaces();
            }

        }).catch(function (reason) {
            console.log("Modal dismissed with reason: ", reason);
        });
    }
    $scope.deletePlace = function (id) {

        if (confirm("Are you sure you want to remove this Place?")) {
            var data = { table: "RUTravelPlaces", id: id, value: "Place" };
            $http({
                method: "POST",
                url: "server/admin/delete.php",
                data: data
            }).then(function (response) {
                var toast = "success";
                if (!response.data.deleted) {
                    toast = "error";
                }
                toastr.options = $rootScope.toastOptions;
                toastr[toast](response.data.message);
                if (response.data.deleted) {
                    $scope.getPlaces();
                }
            }, function (error) {
                console.error(error);
            });
        }
    }
})

// Attractions
app.controller('admin-attractions-controller', function ($scope, $http, $uibModal, $rootScope) {
    $scope.loadAttractions = function () {
        console.log("Loading attractions...");
        $scope.getAttractions();
    }
    $scope.getAttractions = function () {
        $scope.attractions = [];
        $http({
            method: "POST",
            url: "server/admin/fetch/attractions.php"
        })
            .then(function (response) {
                if(response.data!=="null"){
                $scope.attractions = response.data;
                }
            }, function (error) {
                console.error(error);
            });
    }
    $scope.openAttractionModal = function (action, user) {
        var data = null;
        if (action === 'edit') {
            data = user;
        }
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: 'views/admin/modals/attraction.html',
            controller: 'attraction-modal-controller',
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
                $scope.getAttractions();
            }
        }).catch(function (reason) {
            console.log("Modal dismissed with reason: ", reason);
        });
    }
    $scope.deleteAttraction = function (id) {

        if (confirm("Are you sure you want to remove this Attraction?")) {
            var data = { table: "RUTravelAttractions", id: id, value: "Attraction" };
            $http({
                method: "POST",
                url: "server/admin/delete.php",
                data: data
            }).then(function (response) {
                var toast = "success";
                if (!response.data.deleted) {
                    toast = "error";
                }
                toastr.options = $rootScope.toastOptions;
                toastr[toast](response.data.message);
                if (response.data.deleted) {
                    $scope.getAttractions();
                }
            }, function (error) {
                console.error(error);
            });
        }
    }
})

// Reviews
app.controller('admin-reviews-controller', function ($scope, $http, $uibModal, $rootScope) {
    $scope.loadReviews = function () {
        console.log("Loading reviews...");
        $scope.getReviews();
    }
    $scope.getReviews = function () {
        $scope.reviews = [];
        $http({
            method: "POST",
            url: "server/admin/fetch/reviews.php"
        })
            .then(function (response) {
                if(response.data!=="null"){
                $scope.reviews = response.data;
                }

            }, function (error) {
                console.error(error);
            });
    }
    $scope.openReviewModal = function (action, user) {
        var data = null;
        if (action === 'edit') {
            data = user;
        }
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: 'views/admin/modals/review.html',
            controller: 'review-modal-controller',
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
                $scope.getReviews();
            }
        }).catch(function (reason) {
            console.log("Modal dismissed with reason: ", reason);
        });
    }
    $scope.deleteReview = function (id) {

        if (confirm("Are you sure you want to remove this Review?")) {
            var data = { table: "RUTravelReviews", id: id, value: "Review" };
            $http({
                method: "POST",
                url: "server/admin/delete.php",
                data: data
            }).then(function (response) {
                var toast = "success";
                if (!response.data.deleted) {
                    toast = "error";
                }
                toastr.options = $rootScope.toastOptions;
                toastr[toast](response.data.message);
                if (response.data.deleted) {
                    $scope.getReviews();
                }
            }, function (error) {
                console.error(error);
            });
        }
    }
})
// Orders
app.controller('admin-orders-controller', function ($scope, $http, $uibModal, $rootScope) {
    $scope.loadOrders = function () {
        console.log("Loading orders...");
        $scope.getOrders();
    }
    $scope.getOrders = function () {
        $scope.orders =[];
        $http({
            method: "POST",
            url: "server/admin/fetch/orders.php"
        })
            .then(function (response) {
                if(response.data!=="null"){
                $scope.orders = response.data;
                }

            }, function (error) {
                console.error(error);
            });
    }
    $scope.openOrderModal = function (action, user) {
        var data = null;
        if (action === 'edit') {
            data = user;
        }
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: 'views/admin/modals/order.html',
            controller: 'order-modal-controller',
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
                $scope.getOrders();
            }
        }).catch(function (reason) {
            console.log("Modal dismissed with reason: ", reason);
        });
    }
    $scope.deleteOrder = function (id) {

        if (confirm("Are you sure you want to remove this Order?")) {
            var data = { table: "RUTravelInvoices", id: id, value: "Order" };
            $http({
                method: "POST",
                url: "server/admin/delete.php",
                data: data
            }).then(function (response) {
                var toast = "success";
                if (!response.data.deleted) {
                    toast = "error";
                }
                toastr.options = $rootScope.toastOptions;
                toastr[toast](response.data.message);
                if (response.data.deleted) {
                    $scope.getOrders();
                }
            }, function (error) {
                console.error(error);
            });
        }
    }
})