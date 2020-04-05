<?php 
session_start();
if($_SESSION['isAdmin']==='1') : ?>
    <div class="container-fluid mt-2" ng-include="'views/admin/admin.php'"></div>
<?php elseif($_SESSION['isAdmin']==='0') : ?>
    <div class="container-fluid mt-2" ng-include="'views/user/plans.php'"></div>
 <?php endif; ?>