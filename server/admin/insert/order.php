<?php
include('../../connection.php');
$order_data = json_decode(file_get_contents("php://input"), true);
$message = '';
$inserted = false;
$package = $order_data['package'];
$destination = $order_data['destination'];
$quantity = $order_data['quantity'];
$subtotal = $order_data['subtotal'];
$total= $order_data['total'];
$email = $order_data['email'];
 $query = "INSERT INTO RUTravelInvoices(Package, Destination, Quantity, Subtotal, Total, Email)VALUES('".$package."', '".$destination."', '".$quantity."', '".$subtotal."', '".$total."', '".$email."')";
 if ($conn->query($query) === TRUE){
  $inserted = true;
   $message = 'Added new order';
  }
  else{
    $message = "Error: " . $conn->error;
}

$output = array(
  'inserted' => $inserted,
 'message' => $message
);

echo json_encode($output);


?>