<?php
include('../../connection.php');
$attraction_data = json_decode(file_get_contents("php://input"), true);
$message = '';
$inserted = false;
$image = $attraction_data['image'];
$description = $attraction_data['description'];
$address = $attraction_data['address'];
$price = $attraction_data['price'];
 $latitude= $attraction_data['latitude'];
 $longitude = $attraction_data['longitude'];
 $rating = $attraction_data['rating'];
 $attraction = $attraction_data['attraction'];
 $query = "INSERT INTO RUTravelAttractions(AttractionImage, AttractionAddress, AttractionDescription, Price, Latitude, Longitude, RatingTotal, Attraction)VALUES('".$image."', '".$address."', '".$description."', ".$price.", ".$latitude.", ".$longitude.", ".$rating.", '".$attraction."')";
 if ($conn->query($query) === TRUE){
  $inserted = true;
   $message = 'Added new attraction';
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