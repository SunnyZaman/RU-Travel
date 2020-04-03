<?php
include('server/database.php');
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
  <title>RU Travel</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/global.css" rel="stylesheet">
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
 <div ng-app="app" ng-controller="app-controller" class="container-fluid mt-4">
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
                                    <input type="email" name="email" ng-model="loginData.email" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="password" ng-model="loginData.password"
                                        class="form-control" />
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
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" name="lastName" ng-model="registerData.lastName"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" ng-model="registerData.email"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="password" ng-model="registerData.password"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" name="address" ng-model="registerData.address"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input type="tel"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{4}" name="phoneNumber" ng-model="registerData.phoneNumber"
                                        class="form-control" />
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
