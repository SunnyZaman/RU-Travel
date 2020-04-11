<?php
include('../connection.php');
$register_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$registered = false;
$isAdmin = 0;
 $firstName = $register_data['firstName'];
 $lastName = $register_data['lastName'];
  $email = $register_data['email'];
 $password = password_hash($register_data['password'], PASSWORD_DEFAULT);
 $address= $register_data['address'];
 $phoneNumber = $register_data['phoneNumber'];
 $query = "INSERT INTO RUTravelUsers(FirstName, LastName, Email, UserPassword, Telephone, UserAddress, isAdmin)VALUES('".$firstName."', '".$lastName."', '".$email."', '".$password."', '".$phoneNumber."', '".$address."', '".$isAdmin."')";
 if ($conn->query($query) === TRUE){
  $registered = true;
   $message = 'Registration Completed';
  }
  else{
    $message = "Error: Email already in use";
    // $message = "Error creating table: " . $conn->error;
}

$output = array(
  'registered' => $registered,
 'message' => $message
);

echo json_encode($output);


?>