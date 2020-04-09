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
    .otherwise({
        redirectTo:'/home'
    })
}]);