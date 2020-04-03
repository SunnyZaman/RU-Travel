<?php
    $servername = "webdev.scs.ryerson.ca";
    $username = "sjzaman";
    $password = "GETEBgOsyR";
    $database ="sjzaman";
    // Create connection
    $conn = new mysqli("localhost", $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>