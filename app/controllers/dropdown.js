var app = angular.module('app');
app.controller('dropdown-controller', function ($scope, $http) {
    $scope.loadPlaces = function(){  
        $http.get("server/places/fetch.php")
        .then(function (response) {
            console.log("Response: ", response);
            var places = response.data;
            var continents = [], countries = [], cities= [], placeTypes = [];
            places.forEach(place=>{
                continents.push(place.Continent);
                countries.push(place.Country);
                cities.push(place.City);
                placeTypes.push(place.PlaceType)
            })
            $scope.continents =[...new Set(continents)];
            $scope.countries =[...new Set(countries)];
            $scope.cities =[...new Set(cities)];
            $scope.placeTypes =[...new Set(placeTypes)];
        }, function (error) {
            console.error(error);
        }); 

        $scope.changeCountry = function(selected){
            $scope.countries = $scope.continents.filter(continent => continent.Continent ==selected);
       }  
   } 
})