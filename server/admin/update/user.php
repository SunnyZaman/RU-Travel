<?php
include('../../connection.php');
$userData = json_decode(file_get_contents("php://input"), true);

$message = '';
$updated = false;
 $currentEmail = $userData['currentEmail'];
 $firstName = $userData['firstName'];
 $lastName = $userData['lastName'];
  $email = $userData['email'];
 $address= $userData['address'];
 $phoneNumber = $userData['phoneNumber'];
$query = "UPDATE RUTravelUsers SET FirstName='".$firstName."', LastName='".$lastName."', Email='".$email."', Telephone='".$phoneNumber."', UserAddress='".$address."' WHERE Email='".$currentEmail."'";
 if ($conn->query($query) === TRUE){
  $updated = true;
   $message = 'User Updated';
  }
  else{
    $message = "Error: Email already in use";
}

$output = array(
  'updated' => $updated,
 'message' => $message
);

echo json_encode($output);
?>
