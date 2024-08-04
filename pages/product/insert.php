<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$id = $mydata['id'];
$name = $mydata['name'];
$categ = $mydata['categ'];

if(!empty($name) &&  !empty($categ)){

$sql = "INSERT INTO products(pname, cid) values ('$name',$categ) ON DUPLICATE KEY UPDATE pname='$name', cid = $categ";
if($conn->query($sql) == TRUE){
	echo "Product Updated Successfully";
}else{
	echo $sql;
}
	
}else{
	echo "Fill All Fields";
}

?>