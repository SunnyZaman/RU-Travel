<?php
session_start();
include('../../app/routing/route-guards/admin-guard.php');
if($_SESSION['isAdmin']==='1') : ?>
 <div class="container-fluid mt-4" ng-controller="admin-controller" ng-init="initializeData()">
 <section>
<h1 class="admin-title">Welcome to Admin Mode</h1>
<p class="font-weight-light font-italic">Here you can 
    <span class="text-success">Add</span>, <span class="text-danger">Delete</span>, and 
    <span class="text-primary">Edit</span> data from various tables</p>
</section>
    <section>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link" ng-class="{ active: isActive('users')}" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users">Users</a>
    <a class="nav-item nav-link" ng-class="{ active: isActive('places')}" id="places-tab" data-toggle="tab" href="#places" role="tab" aria-controls="places">Places</a>
    <a class="nav-item nav-link" ng-class="{ active: isActive('attractions')}" id="attractions-tab" data-toggle="tab" href="#attractions" role="tab" aria-controls="attractions">Attractions</a>
    <a class="nav-item nav-link" ng-class="{ active: isActive('reviews')}" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews</a>
    <a class="nav-item nav-link" ng-class="{ active: isActive('orders')}" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders">Orders</a>

  </div>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane" ng-class="{ active: isActive('users')}" id="users" role="tabpanel" aria-labelledby="users-tab">users</div>
  <div class="tab-pane" ng-class="{ active: isActive('places')}" id="places" role="tabpanel" aria-labelledby="places-tab">places.</div>
  <div class="tab-pane" ng-class="{ active: isActive('attractions')}" id="attractions" role="tabpanel" aria-labelledby="attractions-tab">..attractions.</div>
  <div class="tab-pane" ng-class="{ active: isActive('reviews')}" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">..reviews.</div>
  <div class="tab-pane" ng-class="{ active: isActive('orders')}" id="orders" role="tabpanel" aria-labelledby="orders-tab">..orders.</div>

</div>
</section>


</div>
</div><?php endif; ?>