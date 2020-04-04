<?php
include('../connection.php');
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        RU Travel
      </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item" ng-if="!admin">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION["FirstName"]. ' ' .$_SESSION["LastName"];?>
          </a>
          <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="server/auth/logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>