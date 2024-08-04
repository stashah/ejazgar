<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['id'];

// Retrieve Specific Product Data
$sql = "SELECT * FROM products WHERE pname like '%{$id}%' OR pid like '%{$id}%'";

$result = $conn->query($sql);
//$row = $result->fetch_assoc();
if($result->num_rows >0){
	$output = array();
	while ($row = $result->fetch_assoc()) {
        $output[] = $row;        
    }
}
            
  echo json_encode($output);

?>