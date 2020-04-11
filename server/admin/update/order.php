
<?php
include('../../connection.php');
$order_data = json_decode(file_get_contents("php://input"), true);
$message = '';
$updated = false;
$id = $order_data['id'];
$package = $order_data['package'];
$destination = $order_data['destination'];
$quantity = $order_data['quantity'];
$subtotal = $order_data['subtotal'];
$total= $order_data['total'];
$email = $order_data['email']; 
$query = "UPDATE RUTravelInvoices SET Package='".$package."', Destination='".$destination."', Quantity='".$quantity."', Subtotal='".$subtotal."', Total='".$total."', Email='".$email."' WHERE Id='".$id."'";
 if ($conn->query($query) === TRUE){
  $updated = true;
   $message = 'Order Updated';
  }
  else{
     $message = "Error: " . $conn->error;
}

$output = array(
  'updated' => $updated,
 'message' => $message
);

echo json_encode($output);
?>
