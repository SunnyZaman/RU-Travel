
<?php
include('../../connection.php');
$review_data = json_decode(file_get_contents("php://input"), true);
$message = '';
$updated = false;
$id = $review_data['id'];
$name = $review_data['name'];
$email = $review_data['email'];
$description = $review_data['description'];
$title = $review_data['title'];
$date = $review_data['date'];
 $rating= $review_data['rating'];
 $attraction = $review_data['attraction']; 
$query = "UPDATE RUTravelReviews SET ReviewerName='".$name."', ReviewerEmail='".$email."', ReviewDescription='".$description."', ReviewTitle='".$title."', ReviewDate='".$date."', ReviewRating=".$rating.", Attraction='".$attraction."' WHERE Id='".$id."'";
 if ($conn->query($query) === TRUE){
  $updated = true;
   $message = 'Review Updated';
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
