var app = angular.module('app');
app.controller('about-controller', function ($scope, $location) {

    $scope.loadAbout = function () { 
        $scope.team = [
            {
                Name: "Sunny Zaman",
                Role: "CEO & Founder",
                Picture:"assets/images/team/sunny.png"
            },
            {
                Name: "Talha Ahmed",
                Role: "Web Developer",
                Picture:"assets/images/team/talha.png"
            },
            {
                Name: "Don Khalil Alwani",
                Role: "UX Designer",
                Picture:"assets/images/team/don.png"
            }
        ]
    };
})
