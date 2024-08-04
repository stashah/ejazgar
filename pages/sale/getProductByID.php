<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['pid'];

// Retrieve Specific Product Data
$sql = "SELECT * FROM products WHERE pid='{$id}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//Returning Json format data as response to Ajax Call
echo json_encode($row);


?>