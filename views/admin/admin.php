<?php
session_start();
if($_SESSION["isAdmin"]==="0")
   {
    $message = "You do not have access to this page. You will be redirected";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='index.php'</script>";
   }
?>
<h1>Admin</h1>