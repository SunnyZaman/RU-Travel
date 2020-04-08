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
// if($continent !=='' || $country !=='' || $city !=='' || $placeType !=='' || $minPrice !==null || $maxPrice !==null){
    // $query .= " WHERE";
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
    // }
// if($search_data===null){
//     $search_data = "HELLLLO"
// }
// if(!empty($search_data['continent']) && !empty($search_data['country']) && !empty($search_data['city']) && !empty($search_data['placeType']) &&
// !empty($search_data['minPrice']) && !empty($search_data['maxPrice'])){
//     $query
// }
// if(!empty($search_data['continent']))
// {
//  $continentSearch = $search_data['continent']+;
// }

// if(!empty($search_data['country']))
// {
//  $continentSearch = $search_data['continent'];
// }
//  $query = "SELECT * FROM RUTravelPlaces ORDER BY Continent ASC";  
//  $result = $conn->query($query);
//    if($result->num_rows > 0) {
//        while($row = $result->fetch_assoc()){
//         $output[] = $row;  
//    }
// }

?>