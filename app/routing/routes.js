var app = angular.module('app', ['ngRoute']);
app.config(['$routeProvider', function($routeProvider){
    $routeProvider
    .when('/home',{
        templateUrl: 'views/home.php'
    })
    .when('/admin',{
        templateUrl: 'views/admin/admin.php',
    })
    .when('/plan',{
        templateUrl: 'views/user/plans.php'
    })
    .otherwise({
        redirectTo:'/home'
    })
}]);