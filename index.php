<?php
include('database.php');

//index.php

session_start();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>RU Travel</title>
  <link href="assets/bootstrap.min.css" rel="stylesheet">
  <script src="app/lib/angular.min.js"></script>
  <script src="app/app.js"></script>
  <style>
  </style>
 </head>
 <body>
     <?php
   if(!isset($_SESSION["email"]))
   {
       ?>
       <div ng-app="app" ng-controller="app-controller" class="container">
   <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
    <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
    {{alertMessage}}
   </div>

   <div class="panel panel-default" ng-show="login_form">
    <div class="panel-heading">
     <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitLogin()">
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="loginData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="loginData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="login" class="btn btn-primary" value="Login" />
       <br />
       <input type="button" name="register_link" class="btn btn-primary btn-link" ng-click="showRegister()" value="Register" />
      </div>
     </form>
    </div>
   </div>

   <div class="panel panel-default" ng-show="register_form">
    <div class="panel-heading">
     <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Enter Your First Name</label>
       <input type="text" name="firstName" ng-model="registerData.firstName" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Last Name</label>
       <input type="text" name="lastName" ng-model="registerData.lastName" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="registerData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Address</label>
       <input type="text" name="address" ng-model="registerData.address" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Phone Number</label>
       <input type="text" name="phoneNumber" ng-model="registerData.phoneNumber" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="register" class="btn btn-primary" value="Register" />
       <br />
       <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" />
      </div>
     </form>
    </div>
   </div>
   </div>
   <?php
   }
   else
   {
   ?>
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Welcome to system</h3>
    </div>
    <div class="panel-body">
     <h1>Welcome - <?php echo $_SESSION["name"];?></h1>
     <a href="logout.php">Logout</a>
    </div>
   </div>
   <?php
   }
   ?>

 </body>
</html>
