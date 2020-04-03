<?php
include('../connection.php');
$register_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$validation_error = '';
$isAdmin = 0;
if(empty($register_data['firstName']))
{
 $error[] = 'First Name is Required';
}
else
{
 $firstName = $register_data['firstName'];
}
if(empty($register_data['lastName']))
{
 $error[] = 'Last Name is Required';
}
else
{
 $lastName = $register_data['lastName'];
}
if(empty($register_data['email']))
{
 $error[] = 'Email is Required';
}
else
{
 if(!filter_var($register_data['email'], FILTER_VALIDATE_EMAIL))
 {
  $error[] = 'Invalid Email Format';
 }
 else
 {
  $email = $register_data['email'];
 }
}

if(empty($register_data['password']))
{
 $error[] = 'Password is Required';
}
else
{
 $password = password_hash($register_data['password'], PASSWORD_DEFAULT);
}
if(empty($register_data['address']))
{
 $error[] = 'Address is Required';
}
else
{
 $address= $register_data['address'];
}
if(empty($register_data['phoneNumber']))
{
 $error[] = 'Phone Number is Required';
}
else
{
 $phoneNumber = $register_data['phoneNumber'];
}
if(empty($error))
{
 $query = "INSERT INTO RUTravelUsers(FirstName, LastName, Email, UserPassword, Telephone, UserAddress, isAdmin)VALUES('".$firstName."', '".$lastName."', '".$email."', '".$password."', '".$phoneNumber."', '".$address."', '".$isAdmin."')";
 $conn->query($query);
  $message = 'Registration Completed';
}
else
{
 $validation_error = implode(", ", $error);
}

$output = array(
 'error'  => $validation_error,
 'message' => $message
);

echo json_encode($output);


?>