var app = angular.module('app');
app.controller('plans-controller', function ($scope, $http) {
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
   $scope.search = function () {
    console.log($scope.searchData);
   } 



   var mymap = L.map('mapId').setView([0, 0], 1);
   L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=YlMbPiXpZfvSpnbcKkXL',{
       attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
   }).addTo(mymap)

})