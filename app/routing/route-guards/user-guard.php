<?php
session_start();
if($_SESSION["isAdmin"]==="1")
   {
    $message = "You do not have access to this page. You will be redirected";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='index.php'</script>";
   }
?>