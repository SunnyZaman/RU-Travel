<?php
session_start();
include('../../app/routing/route-guards/admin-guard.php');
if($_SESSION['isAdmin']==='1') : ?>
 <div class="container-fluid mt-4" ng-controller="admin-controller" ng-init="initializeData()">
<h1 class="admin-title">Welcome to Admin Mode</h1>
<p class="font-weight-light font-italic float-left">Here you can 
    <span class="text-success">Add</span>, <span class="text-danger">Delete</span>, and 
    <span class="text-primary">Edit</span> data from various tables</p>
</div>
</div><?php endif; ?>