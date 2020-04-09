<?php
include('../../connection.php');
$data = json_decode(file_get_contents("php://input"), true);
$attraction = $data['attraction'];
$query = "SELECT * FROM RUTravelReviews WHERE Attraction='".$attraction."'";
$result = $conn->query($query);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $output[] = $row;  
    }
}
echo json_encode($output);
?>