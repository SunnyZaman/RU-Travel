<?php
include('../connection.php');
$data = json_decode(file_get_contents("php://input"), true);

$message = '';
$deleted = false;
 $value = $data['value'];
 $table = $data['table'];
 $id = $data['id'];
$query = "DELETE FROM ".$table." WHERE Id=".$id;
 if ($conn->query($query) === TRUE){
  $deleted = true;
   $message = "Deleted ".$value ;
  }
  else{
     $message = "Error: " . $conn->error;
}

$output = array(
    'query' => $query,
  'deleted' => $deleted,
 'message' => $message
);

echo json_encode($output);
?>
