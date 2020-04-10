<?php
include('../../connection.php');
session_start();
$email =  $_SESSION["Email"];
$query = "SELECT * FROM RUTravelInvoices WHERE Email='".$email."'";
$result = $conn->query($query);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $output[] = $row;  
    }
}
echo json_encode($output);
?>