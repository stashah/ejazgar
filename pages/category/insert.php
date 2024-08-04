<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$name = $mydata['name'];

if(!empty($name)){

$sql = "INSERT INTO categories(cname) values ('$name') ON DUPLICATE KEY UPDATE cname='$name'";
if($conn->query($sql) == TRUE){
	echo "Category Updated Successfully";
}else{
	echo "Unable to Update Category";
}
	
}else{
	echo "Fill All Fields";
}

?>