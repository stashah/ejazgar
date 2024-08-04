<?php
session_start();
require '../../assets/db.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$saldate = $mydata['saldate'];
$product_id = $mydata['product_id'];
$salid = $mydata['salid'];
$acctype = $mydata['acctype'];
$action = $mydata['action'];

if($salid != "" && $product_id !=""){

    $sql = "UPDATE sale SET`salqty`= 0, remarks='R' WHERE `saleid`='".$salid."' AND `productid`=".$product_id." AND `saldate` = '".$saldate."'";
    if ($conn->query($sql) == TRUE) {
        $item_array = array(
			'count' => 1,
			'output' => 'Returned Successfully..'
		);
		echo json_encode($item_array);
    } else {
        $item_array = array(
			'count' => 0,
			'output' => "Can not return"
		);
		echo json_encode($item_array);
    }

}
else
{
	$item_array = array(
			'count' => 0,
			'output' => 'Select valid data...'
		);
		echo json_encode($item_array);
}

?>

