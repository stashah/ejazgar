<?php
session_start();
require '../../assets/db.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$purdate = $mydata['saldate'];
$product_id = $mydata['product_id'];
$purid = $mydata['salid'];

$action = $mydata['action'];

if($purid != "" && $product_id !=""){

    $sql = "UPDATE purchase SET`purqty`= 0, remarks='R' WHERE `purchaseid`='".$purid."' AND `productid`=".$product_id." AND `purdate` = '".$purdate."'";
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

