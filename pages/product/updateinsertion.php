<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$id = $mydata['id'];
$name = $mydata['name'];
$categ = $mydata['categ'];

if(!empty($name) &&  !empty($categ)){

$sql = "UPDATE products SET pname='$name', cid=$categ WHERE pid=$id";
if($conn->query($sql) == TRUE){
	echo "Product Updated Successfully";
}else{
	echo $sql;
}
	
}else{
	echo "Fill All Fields";
}

?>