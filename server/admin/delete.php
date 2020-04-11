<?php
include('../connection.php');
$data = json_decode(file_get_contents("php://input"), true);

$message = '';
$deleted = false;
if(!empty($data['value']))
{
 $value = $data['value'];
}
if(!empty($data['table']))
{
 $table = $data['table'];
}
if(!empty($data['id']))
{
 $id = $data['id'];
}
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
