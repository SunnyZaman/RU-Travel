<?php
session_start();
include('../../app/routing/route-guards/user-guard.php');
if($_SESSION['isAdmin']==='0') : ?>
   <div class="container-fluid mt-4" ng-controller="about-controller" ng-init="loadAbout()">
    <div class="form-row">
        <div class="col-xs-12 col-md-4" ng-repeat="(key, value) in team">
            <div class="card text-center">
                <div class="card-header">
                    <h5 class="card-title">{{value.Name}}</h5>
                </div>
                <div class="card-body text-center">
                    <img ng-src="{{value.Picture}}" width="250" height="250"/>
                </div>
                <div class="card-footer text-muted">
                <p class="card-text about-text">{{value.Role}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
