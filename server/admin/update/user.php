<?php
include('../../connection.php');
$userData = json_decode(file_get_contents("php://input"), true);

$message = '';
$updated = false;
if(!empty($userData['currentEmail']))
{
 $currentEmail = $userData['currentEmail'];
}
if(!empty($userData['firstName']))
{
 $firstName = $userData['firstName'];
}
if(!empty($userData['lastName']))
{
 $lastName = $userData['lastName'];
}
if(!empty($userData['email']))
{
  $email = $userData['email'];
}
if(!empty($userData['address']))
{
 $address= $userData['address'];
}
if(!empty($userData['phoneNumber']))
{
 $phoneNumber = $userData['phoneNumber'];
}
$query = "UPDATE RUTravelUsers SET FirstName='".$firstName."', LastName='".$lastName."', Email='".$email."', Telephone='".$phoneNumber."', UserAddress='".$address."' WHERE Email='".$currentEmail."'";
 if ($conn->query($query) === TRUE){
  $updated = true;
   $message = 'User Updated';
  }
  else{
        //   $message = "Error creating table: " . $conn->error;
    $message = "Error: Email already in use";
}

$output = array(
  'updated' => $updated,
 'message' => $message
);

echo json_encode($output);
?>
