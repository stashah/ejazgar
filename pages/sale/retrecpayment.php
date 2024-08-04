<?php
session_start();
require '../../assets/db.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$id = $mydata["id"];
$custid = $mydata['c_id'];
$salid = $mydata['saleid'];
$ldate = $mydata['ldate'];
$action = $mydata['action'];

if($custid != "" && $salid !="" && $ldate != ""){

    $sql = "DELETE FROM `customeraccount` WHERE `id`=".$id." AND `salid`='".$salid."'  AND `custid`=".$custid."  AND `paymentdate`='".$ldate."'";
    if ($conn->query($sql) == TRUE) {
        $item_array = array(
			'count' => 1,
			'output' => "Deleted successfully"
		);
		echo json_encode($item_array);
    } else {
        $item_array = array(
			'count' => 0,
			'output' => "Can not Delete"
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

