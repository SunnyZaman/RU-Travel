<?php
include('../../connection.php');
$placeData = json_decode(file_get_contents("php://input"), true);

$message = '';
$updated = false;
 $currentAttraction = $placeData['currentAttraction'];
 $continent = $placeData['continent'];
 $country = $placeData['country'];
  $city = $placeData['city'];
 $placeType= $placeData['placeType'];
 $attraction = $placeData['attraction'];
$query = "UPDATE RUTravelPlaces SET Continent='".$continent."', Country='".$country."', City='".$city."', PlaceType='".$placeType."', Attraction='".$attraction."' WHERE Attraction='".$currentAttraction."'";
 if ($conn->query($query) === TRUE){
  $updated = true;
   $message = 'Place Updated';
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
