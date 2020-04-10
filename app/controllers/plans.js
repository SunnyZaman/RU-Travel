var app = angular.module('app');
app.controller('plans-controller', function ($scope, $http, $uibModal) {
    $scope.searchData = { continent: "", country: "", city: "", placeType: "", minPrice: null, maxPrice: null };
    $scope.searched = false;
    $scope.disableView = true;
    $scope.showPlans = false;
    noDuplicates = function (a) {
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
                places.forEach(function (place) {
                    console.log(place);

                    continents.push(place.Continent);
                    countries.push(place.Country);
                    cities.push(place.City);
                    placeTypes.push(place.PlaceType)
                });
                $scope.continents = noDuplicates(continents);
                $scope.countries = noDuplicates(countries);
                $scope.cities = noDuplicates(cities);
                $scope.placeTypes = noDuplicates(placeTypes);
            }, function (error) {
                console.error(error);
            });

        $scope.changeCountry = function (selected) {

            $scope.countries = $scope.continents.filter(function (continent) { return continent.Continent === selected; });
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
                for (var i = 0; i < data.length; i++) {
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

                    $scope.results.forEach(function (item) {
                        console.log("Boom: ", item);

                        if (item.isSelected === false) {
                            item.disabled = true;
                        }

                    });
                }
                else {
                    $scope.results.forEach(function (item) {
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
        if (selected.length === 1) {
            $scope.comparison = false;
        }
        else {
            $scope.comparison = true;
        }
        console.log(selected);

    }

    $scope.generateInvoice = function () {
        var modalInstance = $uibModal.open({
            animation: true,
            templateUrl: 'views/user/modals/invoice.html',
            controller: 'invoice-controller',
            backdrop: 'static',
            size: 'lg',
            resolve: {
                data: function () {
                    return $scope.selected;
                }
            }
        });
        modalInstance.result.then(function (response) {
            console.log("Show toast");
            toastr.options = {
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
            toastr["success"]("Succefully placed order!");

        }).catch(function (reason) {
            console.log("Modal dismissed with reason: ", reason);
        });
    }

    $scope.viewReview = function (selected) {
        $http({
            method: "POST",
            url: "server/places/reviews/fetch.php",
            data: { attraction: selected.Attraction }
        })
            .then(function (response) {
                console.log("Response: ", response.data);
                // var modalInstance = $uibModal.open({
                //     templateUrl: 'views/user/modals/reviews.html',
                //     scope: $scope, //passed current scope to the modal
                //     size: 'lg'
                // });
                var data = { reviews: response.data, attraction: selected.Attraction, totalRating: selected.RatingTotal }
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
                modalInstance.result.then(function (response) {
                    console.log("New total: ", selected.RatingTotal, response);

                    selected.RatingTotal = response;
                });

            }, function (error) {
                console.error(error);
            });
    }

    $scope.getDistance = function () {
        var lat1 = $scope.selected[0].Latitude;
        var long1 = $scope.selected[0].Longitude;
        var lat2 = $scope.selected[1].Latitude;
        var long2 = $scope.selected[1].Longitude;
        var p = 0.017453292519943295;
        var c = Math.cos;
        var a = 0.5 - c((lat2 - lat1) * p) / 2 +
            c(lat1 * p) * c(lat2 * p) *
            (1 - c((long2 - long1) * p)) / 2;
        $scope.distance = 12742 * Math.asin(Math.sqrt(a));
        var lat = ((Number(lat1) + Number(lat2)) / 2);
        var long = ((Number(long1) + Number(long2)) / 2);
        console.log(lat, long);

        var mymap = L.map('mapId').setView([lat, long], 6);
        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=YlMbPiXpZfvSpnbcKkXL', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
        }).addTo(mymap);
        var violetIcon = new L.Icon({
            iconUrl: 'assets/images/markers/violet-marker.png',
            shadowUrl: 'assets/images/markers/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        var goldIcon = new L.Icon({
            iconUrl: 'assets/images/markers/gold-marker.png',
            shadowUrl: 'assets/images/markers/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        var marker1 = L.marker([lat1, long1], { icon: goldIcon }).addTo(mymap);
        marker1.bindPopup($scope.selected[0].Attraction, { autoClose: false }).openPopup();
        var marker2 = L.marker([lat2, long2], { icon: violetIcon }).addTo(mymap);
        marker2.bindPopup($scope.selected[1].Attraction, { autoClose: false }).openPopup();
        var latlong = Array();
        latlong.push(marker1.getLatLng());
        latlong.push(marker2.getLatLng());
        var polyline = L.polyline(latlong, { color: 'red' }).addTo(mymap);
        mymap.fitBounds(polyline.getBounds())

    }

})