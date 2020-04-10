<?php
session_start();
include('../../app/routing/route-guards/user-guard.php');
if($_SESSION['isAdmin']==='0') : ?>
   <div class="container-fluid mt-4" ng-controller="orders-controller" ng-init="loadOrders()">
   <div ng-switch="orders.length>0">
<div ng-switch-when="true" >
<h1 class="table-title">Order History</h1>
    <table class="table table-striped">
    <tr>
        <th>Package</th>
        <th>Destination</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Total</th>
    </tr>
    <tr ng-repeat="(key, value) in orders">
        <td>{{ value.Package }}</td>
        <td>{{ value.Destination }}</td>
        <td>{{ value.Quantity }}</td>
        <td>{{ value.Subtotal }}</td>
        <td>{{ value.Total }}</td>
    </tr>
    </table>
    </div>
    <p ng-switch-when="false" class="font-weight-bold">No Orders</p>
    </div>
</div>

<?php endif; ?>
