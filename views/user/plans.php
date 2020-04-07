<?php
session_start();
include('../../app/routing/route-guards/user-guard.php');
if($_SESSION['isAdmin']==='0') : ?>
   <div class="container-fluid mt-4" ng-controller="plans-controller">
<div ng-controller="dropdown-controller" ng-init="loadPlaces()">
<div class="form-row">
        <div class="form-group col-xs-12 col-md-3">
        <label for="continent">Continent:</label>
            <select name="continent" id="continent" class="form-control" ng-model="continent" >
        <option value="">Select Continent</option>
        <option ng-repeat="continent in continents" value="{{continent}}">{{continent}}</option>  

    </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="country">Country:</label>
            <select name="country" id="country" class="form-control" ng-model="country">
            <option value="">Select Country</option>
            <option ng-repeat="country in countries" value="{{country}}">{{country}}</option>  

            </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="city">City:</label>
            <select  name="city" id="city" class="form-control" ng-model="city">
            <option value="">Select City</option>
            <option ng-repeat="city in cities" value="{{city}}" >{{city}}</option>  

            </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="place">Place:</label>
            <select  name="place" id="place" class="form-control"  ng-model="placeType">
            <option value="">Select Place</option>
            <option ng-repeat="placeType in placeTypes" value="{{placeType}}" >{{placeType}}</option>  

            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-xs-12 col-md-4">
        <label for="popularPlaces">Popular Places:</label>
            <select name="popularPlaces" id="popularPlaces" class="form-control">
                 <option value="">Select Popular Place</option>
            </select>
        </div>
</div>
</div>
</div>
<?php endif; ?>
