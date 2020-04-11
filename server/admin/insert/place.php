<?php
include('../../connection.php');
$place_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$inserted = false;
 $continent = $place_data['continent'];
 $country = $place_data['country'];
  $city = $place_data['city'];
 $placeType= $place_data['placeType'];
 $attraction = $place_data['attraction'];
 $query = "INSERT INTO RUTravelPlaces(Continent, Country, City, PlaceType, Attraction)VALUES('".$continent."', '".$country."', '".$city."', '".$placeType."', '".$attraction."')";
 if ($conn->query($query) === TRUE){
  $inserted = true;
   $message = 'Added new place';
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