<?php
include('../../connection.php');
session_start();
$review_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$name =  $_SESSION["FirstName"]. " ".  $_SESSION["LastName"];
$email =  $_SESSION["Email"];
 $title = $review_data['title'];
 $rating = $review_data['rating'];
 $description = $review_data['description'];
 $date = $review_data['date'];
 $attraction = $review_data['attraction'];
$newRating = $review_data['newRating'];
 $query = "INSERT INTO RUTravelReviews(ReviewerName, ReviewerEmail, ReviewDescription, ReviewTitle, ReviewDate, ReviewRating, Attraction)VALUES('".$name."', '".$email."', '".$description."', '".$title."', '".$date."', ".$rating.", '".$attraction."');";
 $conn->query($query);
 $query = "UPDATE RUTravelAttractions SET RatingTotal=".$newRating." WHERE Attraction='".$attraction."'";
 $conn->query($query);
  $message = 'Review Created';
$output = array(
 'message' => $message
);

echo json_encode($output);

?>