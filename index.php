<?php
include('server/database.php');
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate" />
    <meta http-equiv="Content-Language" content="en_US" /> 
  <title>RU Travel</title>
  <link rel="icon" type="image/png" href="favicon.png" />
  <link href="app/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="app/js/jquery.min.js"></script>
  <script src="app/js/bootstrap.min.js"></script>
  <link href="app/css/global.css" rel="stylesheet">
  <script src="app/lib/angular.min.js"></script>
  <script src="app/lib/angular-route.min.js"></script>
  <script src="app/routing/routes.js"></script>
  <script src="app/controllers/authenticate.js"></script>
  <script src="app/controllers/plans.js"></script>
  
  <style>
  </style>
 </head>
 <body ng-app="app">
     <?php
   if(!isset($_SESSION["Email"]))
   { ?>
 <div class="container-fluid mt-4" ng-controller="auth-controller">
    <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
        <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
        {{alertMessage}}
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header font-weight-bold">{{authTitle}}</div>
                <div class="card-body">
                    <form method="post" ng-submit="submitLogin()" ng-show="login">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" ng-model="loginData.email" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="password" ng-model="loginData.password"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="submit" name="login" class="btn auth-button full-width" value="Login" />
                            </div>
                            <div class="col-12 text-center  mt-3">
                                <p>Don't have an account? <span class="link-text" ng-click="showRegister()">Sign
                                        Up</span>
                                </p>
                            </div>
                        </div>
                    </form>
                    <form method="post" ng-submit="submitRegister()" ng-show="!login">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" name="firstName" ng-model="registerData.firstName"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" name="lastName" ng-model="registerData.lastName"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" ng-model="registerData.email"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="password" ng-model="registerData.password"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" name="address" ng-model="registerData.address"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phoneNumber" ng-model="registerData.phoneNumber"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <input type="submit" name="register" class="btn auth-button full-width"
                                    value="Register" />
                            </div>
                            <div class="col-12 text-center mt-3">
                                <p>Already have an account? <span class="link-text" ng-click="showLogin()">Sign
                                        In</span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   <?php
   }
   else
   {
   ?>
   <header ng-include="'views/header.php'"></header>
    <main ng-view></main>
   <?php
   }
   ?>

 </body>
</html>
