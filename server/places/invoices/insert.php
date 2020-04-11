<?php
include('../../connection.php');
session_start();
$invoice_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$email =  $_SESSION["Email"];
 $package = $invoice_data['package'];
 $destination = $invoice_data['destination'];
 $quantity = $invoice_data['quantity'];
 $subtotal = $invoice_data['subtotal'];
 $total = $invoice_data['total'];
 $query = "INSERT INTO RUTravelInvoices(Package, Destination, Quantity, Subtotal, Total, Email)VALUES('".$package."', '".$destination."', '".$quantity."', '".$subtotal."', '".$total."', '".$email."');";
 $conn->query($query);
$output = array(
 'message' => $message
);

echo json_encode($output);

?>