<?php
session_start();
include('../../app/routing/route-guards/user-guard.php');
if($_SESSION['isAdmin']==='0') : ?>
   <div class="container-fluid mt-4" ng-controller="plans-controller" ng-init="loadPlaces()">
<form method="post" ng-submit="search()">
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
    <div id="mapId"></div>

</div>
<?php endif; ?>
