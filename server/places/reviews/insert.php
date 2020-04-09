<?php
include('../../connection.php');
session_start();
$review_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$name =  $_SESSION["FirstName"]. " ".  $_SESSION["LastName"];
$email =  $_SESSION["Email"];
if(!empty($review_data['title']))
{
 $title = $review_data['title'];
}
if(!empty($review_data['rating']))
{
 $rating = $review_data['rating'];
}
if(!empty($review_data['description']))
{
 $description = $review_data['description'];
}
if(!empty($review_data['date']))
{
 $date = $review_data['date'];
}
if(!empty($review_data['attraction']))
{
 $attraction = $review_data['attraction'];
}
 $query = "INSERT INTO RUTravelReviews(ReviewerName, ReviewerEmail, ReviewDescription, ReviewTitle, ReviewDate, ReviewRating, Attraction)VALUES('".$name."', '".$email."', '".$description."', '".$title."', '".$date."', ".$rating.", '".$attraction."');";
 $conn->query($query);
  $message = 'Review Created';
$output = array(
 'message' => $message
);

echo json_encode($output);

?>