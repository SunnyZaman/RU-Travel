<?php
include('../../connection.php');
$placeData = json_decode(file_get_contents("php://input"), true);

$message = '';
$updated = false;
if(!empty($placeData['currentAttraction']))
{
 $currentAttraction = $placeData['currentAttraction'];
}
if(!empty($placeData['continent']))
{
 $continent = $placeData['continent'];
}
if(!empty($placeData['country']))
{
 $country = $placeData['country'];
}
if(!empty($placeData['city']))
{
  $city = $placeData['city'];
}
if(!empty($placeData['placeType']))
{
 $placeType= $placeData['placeType'];
}
if(!empty($placeData['attraction']))
{
 $attraction = $placeData['attraction'];
}
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
