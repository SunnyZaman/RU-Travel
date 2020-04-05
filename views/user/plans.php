<?php
session_start();
include('../../app/routing/route-guards/user-guard.php');
if($_SESSION['isAdmin']==='0') : ?>
<h1>User</h1>
<?php endif; ?>