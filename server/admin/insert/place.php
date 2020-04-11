<?php
include('../../connection.php');
$place_data = json_decode(file_get_contents("php://input"), true);

$message = '';
$inserted = false;
if(!empty($place_data['continent']))
{
 $continent = $place_data['continent'];
}
if(!empty($place_data['country']))
{
 $country = $place_data['country'];
}
if(!empty($place_data['city']))
{
  $city = $place_data['city'];
}

if(!empty($place_data['placeType']))
{
 $placeType= $place_data['placeType'];
}
if(!empty($place_data['attraction']))
{
 $attraction = $place_data['attraction'];
}
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