<?php
session_start();
require '../../assets/db.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$custid = $mydata['c_id'];
$balid = $mydata['balid'];
$ldate = $mydata['ldate'];
$action = $mydata['action'];

if($custid != "" && $balid !="" && $ldate != ""){

    $sql = "DELETE FROM `cashaccount` WHERE `balid`='".$balid."' AND `custid`=".$custid." AND`ldate`='".$ldate."'";
    if ($conn->query($sql) == TRUE) {
        $item_array = array(
			'count' => 1,
			'output' => 'Deleted Successfully..'
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

