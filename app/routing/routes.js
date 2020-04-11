var app = angular.module('app', ['ngRoute', 'ui.bootstrap']);
app.config(['$routeProvider', function($routeProvider){
    $routeProvider
    .when('/home',{
        templateUrl: 'views/home.php'
    })
    .when('/admin',{
        templateUrl: 'views/admin/admin.php',
    })
    .when('/plans',{
        templateUrl: 'views/user/plans.php'
    })
    .when('/orders',{
        templateUrl: 'views/user/orders.php'
    })
    .when('/about',{
        templateUrl: 'views/user/about.php'
    })
    .otherwise({
        redirectTo:'/home'
    })
}]);
app.controller('app-controller', function($rootScope){
    $rootScope.toastOptions = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
})
app.controller('header-controller', function ($scope, $location) {
    $scope.isActive = function (viewLocation) { 
        console.log(viewLocation);
        console.log($location.path());
        
        return viewLocation === $location.path();
    };
})
