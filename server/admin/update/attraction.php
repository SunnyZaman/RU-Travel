
<?php
include('../../connection.php');
$attraction_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$updated = false;
 $currentAttraction = $attraction_data['currentAttraction'];
$image = $attraction_data['image'];
$description = $attraction_data['description'];
$address = $attraction_data['address'];
$price = $attraction_data['price'];
 $latitude= $attraction_data['latitude'];
 $longitude = $attraction_data['longitude'];
 $rating = $attraction_data['rating'];
 $attraction = $attraction_data['attraction'];
$query = "UPDATE RUTravelAttractions SET AttractionImage='".$image."', AttractionAddress='".$address."', AttractionDescription='".$description."', Price=".$price.", Latitude=".$latitude.", Longitude=".$longitude.", RatingTotal=".$rating.", Attraction='".$attraction."' WHERE Attraction='".$currentAttraction."'";
 if ($conn->query($query) === TRUE){
  $updated = true;
   $message = 'Attraction Updated';
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
