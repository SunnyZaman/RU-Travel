<?php
include('../connection.php');
session_start();
$login_data = json_decode(file_get_contents("php://input"),true);

$validation_error = '';

if(empty($login_data['email']))
{
 $error[] = 'Email is Required';
}
else
{
 if(!filter_var($login_data['email'], FILTER_VALIDATE_EMAIL))
 {
  $error[] = 'Invalid Email';
 }
 else
 {
  $email = $login_data['email'];
 }
}

if(empty($login_data['password']))
{
 $error[] = 'Password is Required';
}

if(empty($error))
{
 $query = "SELECT * FROM RUTravelUsers WHERE Email = '".$email."'";
 $result = $conn->query($query);
   if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()){
           if(password_verify($login_data['password'], $row["UserPassword"]))
           {
               $_SESSION["Email"] = $row["Email"];
        }
    else
    {
     $validation_error = 'Invalid Password';
    }
   }
  }
  else
  {
   $validation_error = 'Invalid Email';
  }
 }
else
{
 $validation_error = implode(", ", $error);
}

$output = array(
 'error' => $validation_error
);

echo json_encode($output);

?>