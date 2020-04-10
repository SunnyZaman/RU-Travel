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
app.controller('header-controller', function ($scope, $location) {
    $scope.isActive = function (viewLocation) { 
        console.log(viewLocation);
        console.log($location.path());
        
        return viewLocation === $location.path();
    };
})
