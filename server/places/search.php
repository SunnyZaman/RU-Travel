<?php
include('../connection.php');
$search_data = json_decode(file_get_contents("php://input"), true);
$continent = $search_data['continent'];
$country = $search_data['country'];
$city = $search_data['city'];
$placeType = $search_data['placeType'];
$minPrice =  $search_data['minPrice'];
$maxPrice =  $search_data['maxPrice'];
$query = "SELECT * FROM RUTravelPlaces INNER JOIN RUTravelAttractions USING (Attraction)";
$where = array();
$conditions = '';
    if($continent !== ''){
        $where[] = "Continent='".$continent."'";
    }
    if($country !== ''){
        $where[] = "Country='".$country."'";
    }
    if($city !== ''){
        $where[] = "City='".$city."'";
    }
    if($placeType !== ''){
        $where[] = "PlaceType='".$placeType."'";
    }
    if($minPrice !== null && $maxPrice !==null){
        $where[] = "Price BETWEEN '".$minPrice."' AND '".$maxPrice."'";
    }
    else{
        if($minPrice !== null){
            $where[] = "Price>='".$minPrice."'";
        }
        else if($maxPrice !== null){
            $where[] = "Price<='".$maxPrice."'";
        }
    }
    if (!empty($where)){
        $conditions = ' WHERE '. implode(' AND ', $where);
    }
    $query .= $conditions.";";
    $output = array();
    $result = $conn->query($query);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $output[] = $row;  
        }
    }
    echo json_encode($output);
?>