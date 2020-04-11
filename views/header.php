<?php
include('../connection.php');
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" ng-controller="header-controller">
    <a class="navbar-brand" href="#">
        <img src="favicon.png" width="30" height="35" class="d-inline-block align-top" alt="">
        <span class="underline">RU Travel</span>
      </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
      <ul class="navbar-nav">
      <?php if($_SESSION['isAdmin']==='0') : ?>
        <li class="nav-item" ng-class="{ active: isActive('/') || isActive('/home') || isActive('/plans')}">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item" ng-class="{ active: isActive('/about')}">
          <a class="nav-link" href="#!/about">About</a>
        </li>
        <li class="nav-item" ng-class="{ active: isActive('/orders')}">
          <a class="nav-link" href="#!/orders">Orders</a>
        </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION["FirstName"]. ' ' .$_SESSION["LastName"];?>
          </a>
          <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="server/auth/logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>