<?php
include('../../connection.php');
$review_data = json_decode(file_get_contents("php://input"), true);
$message = '';
$inserted = false;
$name = $review_data['name'];
$email = $review_data['email'];
$description = $review_data['description'];
$title = $review_data['title'];
$date = $review_data['date'];
 $rating= $review_data['rating'];
 $attraction = $review_data['attraction'];
 $query = "INSERT INTO RUTravelReviews(ReviewerName, ReviewerEmail, ReviewDescription, ReviewTitle, ReviewDate, ReviewRating, Attraction)VALUES('".$name."', '".$email."', '".$description."', '".$title."', '".$date."', ".$rating.", '".$attraction."')";
 if ($conn->query($query) === TRUE){
  $inserted = true;
   $message = 'Added new review';
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