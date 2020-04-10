<?php
include('../../connection.php');
session_start();
$invoice_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$email =  $_SESSION["Email"];
if(!empty($invoice_data['package']))
{
 $package = $invoice_data['package'];
}
if(!empty($invoice_data['destination']))
{
 $destination = $invoice_data['destination'];
}
if(!empty($invoice_data['quantity']))
{
 $quantity = $invoice_data['quantity'];
}
if(!empty($invoice_data['subtotal']))
{
 $subtotal = $invoice_data['subtotal'];
}
if(!empty($invoice_data['total']))
{
 $total = $invoice_data['total'];
}
 $query = "INSERT INTO RUTravelInvoices(Package, Destination, Quantity, Subtotal, Total, Email)VALUES('".$package."', '".$destination."', '".$quantity."', '".$subtotal."', '".$total."', '".$email."');";
 $conn->query($query);
$output = array(
 'message' => $message
);

echo json_encode($output);

?>