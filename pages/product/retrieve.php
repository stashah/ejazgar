<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);


// Retrieve Specific Product Data
$sql = 'SELECT * FROM categories_ls WHERE cid='{$cid};
$result = $conn -> query($sql);


//Returning Json format data as response to Ajax Call
echo("Hello");


?>