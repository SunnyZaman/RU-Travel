<?php
session_start();
include('../../app/routing/route-guards/admin-guard.php');
if($_SESSION['isAdmin']==='1') : ?>
<h1>Admin</h1>
<?php endif; ?>