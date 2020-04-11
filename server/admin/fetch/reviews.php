<?php
include('../../connection.php');
$query = "SELECT * FROM RUTravelReviews ORDER BY ReviewerName ASC";
$result = $conn->query($query);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $output[] = $row;  
    }
}
echo json_encode($output);
?>