<?php
require '../../assets/db.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['id'];
//Deleting Data
if(!empty($id)){
	$sql = "DELETE FROM products WHERE pid='{$id}'";
	if($conn->query($sql)== TRUE){
		echo "1";
	}else{
		echo "0";
	}
}
?>