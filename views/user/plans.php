<?php
session_start();
include('../../app/routing/route-guards/user-guard.php');
if($_SESSION['isAdmin']==='0') : ?>
   <div class="container-fluid mt-4" ng-controller="plans-controller" ng-init="loadPlaces()">
<form method="get" ng-submit="search()">
<div class="form-row">
        <div class="form-group col-xs-12 col-md-3">
        <label for="continent">Continent:</label>
            <select name="continent" id="continent" class="form-control" ng-model="searchData.continent" >
        <option value="">Select Continent</option>
        <option ng-repeat="continent in continents" value="{{continent}}">{{continent}}</option>  

    </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="country">Country:</label>
            <select name="country" id="country" class="form-control" ng-model="searchData.country">
            <option value="">Select Country</option>
            <option ng-repeat="country in countries" value="{{country}}">{{country}}</option>  

            </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="city">City:</label>
            <select  name="city" id="city" class="form-control" ng-model="searchData.city">
            <option value="">Select City</option>
            <option ng-repeat="city in cities" value="{{city}}" >{{city}}</option>  

            </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="place">Place:</label>
            <select  name="place" id="place" class="form-control" ng-model="searchData.placeType">
            <option value="">Select Place</option>
            <option ng-repeat="placeType in placeTypes" value="{{placeType}}" >{{placeType}}</option>  

            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-xs-12 col-md-4">
        <label for="popularPlaces">Price Range:</label>
        <div class="input-group">
        <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="number" min="0" max="{{maxPrice}}" name="minPrice" id="minPrice" class="form-control" ng-model="searchData.minPrice" placeholder="Min Price">
            <div class="input-group-prepend input-group-append">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
            </div>
                <input type="number" min="{{minPrice}}" name="maxPrice" id="maxPrice" class="form-control" ng-model="searchData.maxPrice" placeholder="Max Price">
        </div>
        </div>
        <div class="form-group col-xs-12 col-md-8 align-self-end">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search buttonIcon"></i>Search</button>
            </div>
     </div>
    </form>
<section ng-if="searched">
<div ng-switch="results.length>0">
<div ng-switch-when="true" >
<h1 class="table-title"> Search Results</h1>
<p class="font-weight-light font-italic float-left">Select one or two places then click the view plans button</p>
<button type="button" ng-click="viewPlans()" ng-disabled="disableView" class="btn btn-info float-right">View Plans</button>
    <table class="table table-striped">
    <tr>
        <th>Selected</th>
        <th>Attraction</th>
        <th>City</th>
        <th>Country</th>
        <th>Continent</th>
        <th>Place</th>
        <th>Price</th>
    </tr>
    <tr ng-repeat="(key, value) in results">
        <td><input type="checkbox" ng-model="value.isSelected" ng-disabled="value.disabled" ng-checked="value.isSelected"></td>
        <td>{{ value.Attraction }}</td>
        <td>{{ value.City }}</td>
        <td>{{ value.Country }}</td>
        <td>{{ value.Continent }}</td>
        <td>{{ value.PlaceType }}</td>
        <td>{{ value.Price | currency:'$' }}</td>
    </tr>
    </table>
    </div>
    <p ng-switch-when="false" class="font-weight-bold">No Results</p>
    </div>
    </section>
    <section ng-if="!searched && showPlans">
    <h1 class="table-title"> Search Results</h1>
<button type="button" ng-click="generateInvoice()" class="btn btn-info float-right">Generate Invoice</button>
    <div class="table-container">
    <table class="table table-striped text-center plans-table">
    <tr>
    <th></th>
    <td><img ng-src="assets/images/{{selected[0].AttractionImage}}" width="350" height="300"/></td>
    <td ng-if="comparison"><img ng-src="assets/images/{{selected[1].AttractionImage}}" width="350" height="300"/></td>
    </tr>
    <tr>
        <th>Attraction</th>
        <td>{{selected[0].Attraction}}</td>
        <td ng-if="comparison">{{selected[1].Attraction}}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{selected[0].AttractionDescription}}</td>
        <td ng-if="comparison">{{selected[1].AttractionDescription}}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{selected[0].AttractionAddress}}</td>
        <td ng-if="comparison">{{selected[1].AttractionAddress}}</td>
    </tr>
    <tr>
        <th>City</th>
        <td>{{selected[0].City}}</td>
        <td ng-if="comparison">{{selected[1].City}}</td>
    </tr>
    <tr>
        <th>Country</th>
        <td>{{selected[0].Country}}</td>
        <td ng-if="comparison">{{selected[1].Country}}</td>
    </tr>
    <tr>
        <th>Continent</th>
        <td>{{selected[0].Continent}}</td>
        <td ng-if="comparison">{{selected[1].Continent}}</td>
    </tr>
    <tr>
        <th>Place</th>
        <td>{{selected[0].PlaceType}}</td>
        <td ng-if="comparison">{{selected[1].PlaceType}}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{selected[0].Price | currency:'$'}}</td>
        <td ng-if="comparison">{{selected[1].Price | currency:'$'}}</td>
    </tr>
    <tr>
        <th>Rating</th>
        <td>{{selected[0].RatingTotal | number : 2}}/5.00</td>
        <td ng-if="comparison">{{selected[1].RatingTotal | number : 2}}/5.00</td>
    </tr>
    <tr>
        <th></th>
        <td><button type="button" ng-click="viewReview(selected[0])" class="btn btn-primary">View Reviews</button></td>
        <td ng-if="comparison"><button type="button" ng-click="viewReview(selected[1])" class="btn btn-primary">View Reviews</button></td>
    </tr>
        
    </table>
</div>
    </section>
    <section ng-if="comparison && !searched && showPlans" ng-init="getDistance()">
        <h2 class="map-title">Distance</h2>
        <p>The distance between {{selected[0].Attraction}} and {{selected[1].Attraction}} is <span class="font-weight-bold">{{distance | number : 2}} km</span>.
        <div class="p-b-20">
            <div id="mapId"></div>
        </div>
    </section>

</div>
<?php endif; ?>
