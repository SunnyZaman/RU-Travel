<?php
session_start();
include('../../app/routing/route-guards/user-guard.php');
if($_SESSION['isAdmin']==='0') : ?>
   <div class="container-fluid mt-4" ng-controller="plans-controller">
<div ng-controller="dropdown-controller" ng-init="loadPlaces()">
<div class="form-row">
        <div class="form-group col-xs-12 col-md-3">
        <label for="continent">Continent:</label>
            <select name="continent" id="continent" class="form-control" ng-model="continent" ng-change="changeCountry()" >
        <option value="">Select Continent</option>
        <option ng-repeat="place in places" value="{{place.Continent}}">{{place.Continent}}</option>  

    </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="country">Country:</label>
            <select name="country" id="country" class="form-control">
            <option value="">Select Country</option>
            </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="city">City:</label>
            <select  name="city" id="city" class="form-control">
            <option value="">Select City</option>
            </select>
        </div>
        <div class="form-group col-xs-12 col-md-3">
        <label for="place">Place:</label>
            <select  name="place" id="place" class="form-control">
            <option value="">Select Place</option>
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