var app = angular.module('app');
app.controller('plans-controller', function ($scope, $http, $uibModal) {
    $scope.searchData = { continent: "", country: "", city: "", placeType: "", minPrice: null, maxPrice: null };
    $scope.searched = false;
    $scope.disableView = true;
    $scope.showPlans = false;
     noDuplicates = function(a) {
        var temp = {};
        for (var i = 0; i < a.length; i++)
            temp[a[i]] = true;
        var r = [];
        for (var k in temp)
            r.push(k);
        return r;
    }
    $scope.loadPlaces = function () {
        $http.get("server/places/dropdown.php")
            .then(function (response) {
                // console.log("Response: ", response.data);
                var places = response.data;
                var continents = [], countries = [], cities = [], placeTypes = [];
                for(var i = 0; i<places.length; i++){
                    console.log(places[i]);
                    
                    continents.push(places[i].Continent);
                    countries.push(places[i].Country);
                    cities.push(places[i].City);
                    placeTypes.push(places[i].PlaceType)
                }
                $scope.continents = noDuplicates(continents);
                $scope.countries = noDuplicates(countries);
                $scope.cities = noDuplicates(cities);
                $scope.placeTypes = noDuplicates(placeTypes);
            }, function (error) {
                console.error(error);
            });

        $scope.changeCountry = function (selected) {
            
            $scope.countries = $scope.continents.filter(function(continent) { return continent.Continent === selected; });
        }
    }
    $scope.search = function () {
        console.log($scope.searchData);
        $http({
            method: "POST",
            url: "server/places/search.php",
            data: $scope.searchData
        })
            .then(function (response) {
                // console.log("Response: ", response.data);
                $scope.searched = true;
                $scope.results = [];
                var data = response.data;
                for(var i=0; i< data.length; i++){
                    // console.log(data);
                    $scope.results.push(Object.assign(data[i], { isSelected: false }));
                }

            }, function (error) {
                console.error(error);
            });
    }

    //   For checkbox selects
    $scope.$watch(function () {
        return $scope.results;
    },
        function (value) {
            if (value !== undefined) {
                var selected = value.filter(function (item) {
                    return item.isSelected == true;
                });
                console.log("selected items: ", selected);
                
                if (selected.length === 0) {
                    $scope.disableView = true;
                }
                if (selected.length >= 2) {
                    console.log("Greater than 2");
                    console.log($scope.results);

                        $scope.results.forEach(function(item) {
                            console.log("Boom: ", item);
                            
                            if (item.isSelected === false) {
                                item.disabled = true;
                            }
                            
                        });
                }
                else {
                    $scope.results.forEach(function(item) {
                        item.disabled = false;
                        if (selected.length !== 0) {
                        $scope.disableView = false;
                        }
                    })
                }
            }

        }, true);

        $scope.viewPlans = function () {
            $scope.searched = false;
            $scope.showPlans = true;
            var selected = $scope.results.filter(function (item) {
                return item.isSelected == true;
            });
            $scope.selected = selected;
            if(selected.length===1){
                $scope.comparison = false;
            }
            else{
                $scope.comparison = true;
            }
            console.log(selected);
            
        }

        $scope.viewReview = function(selected){
            $http({
                method: "POST",
                url: "server/places/reviews/fetch.php",
                data: { attraction:selected.Attraction}
            })
                .then(function (response) {
                    console.log("Response: ", response.data);
                    // var modalInstance = $uibModal.open({
                    //     templateUrl: 'views/user/modals/reviews.html',
                    //     scope: $scope, //passed current scope to the modal
                    //     size: 'lg'
                    // });
                    var data = {reviews:response.data, attraction:selected.Attraction,totalRating: selected.RatingTotal }
                    var modalInstance = $uibModal.open({
                        animation: true,
                        templateUrl: 'views/user/modals/reviews/reviews.html',
                        controller: 'review-controller',
                        backdrop: 'static',
                        size: 'lg',
                        resolve: {
                            data: function () {
                              return data;
                            }
                          }
                      });
                    modalInstance.result.then(function(response){
                      console.log("Modal opened");
                    });
    
                }, function (error) {
                    console.error(error);
                });
        }
    //    var mymap = L.map('mapId').setView([0, 0], 1);
    //    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=YlMbPiXpZfvSpnbcKkXL',{
    //        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    //    }).addTo(mymap)

})