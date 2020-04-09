<?php
include('../../connection.php');
$attraction = $_POST['attraction'];
$where = array();
$query = "SELECT * FROM RUTravelReviews WHERE Attraction='".$attraction."'";
// if(isset($_POST['first']))
// {
//     $where[] = "Attraction='".$_POST['first']."'";
// }
// if(isset($_POST['second']))
// {
//     $where[] = "Attraction='".$_POST['second']."'";
// }
// if (!empty($where)){
//     $conditions = ' WHERE '. implode(' OR ', $where);
// }
// $query .= $conditions.";";
// $output = array();
$result = $conn->query($query);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $output[] = $row;  
    }
}
echo json_encode($output);
?>