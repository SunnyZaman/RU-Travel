<?php

//register.php

include('connection.php');

$form_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$validation_error = '';
$isAdmin = 0;
if(empty($form_data['firstName']))
{
 $error[] = 'First Name is Required';
}
else
{
 $firstName = $form_data['firstName'];
}
if(empty($form_data['lastName']))
{
 $error[] = 'Last Name is Required';
}
else
{
 $lastName = $form_data['lastName'];
}
if(empty($form_data['email']))
{
 $error[] = 'Email is Required';
}
else
{
 if(!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL))
 {
  $error[] = 'Invalid Email Format';
 }
 else
 {
  $email = $form_data['email'];
 }
}

if(empty($form_data['password']))
{
 $error[] = 'Password is Required';
}
else
{
 $password = password_hash($form_data['password'], PASSWORD_DEFAULT);
}
if(empty($form_data['address']))
{
 $error[] = 'Address is Required';
}
else
{
 $address= $form_data['address'];
}
if(empty($form_data['phoneNumber']))
{
 $error[] = 'Phone Number is Required';
}
else
{
 $phoneNumber = $form_data['phoneNumber'];
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