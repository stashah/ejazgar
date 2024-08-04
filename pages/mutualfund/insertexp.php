<?php
session_start();
require '../../assets/db.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);




$amountpaid = $mydata['amountpaid'];
$dt = $mydata['dt'];
$detail = $mydata['detail'];

if( $amountpaid !=0 && $amountpaid !=0 && $detail != ""){



	$sqlcashpaid = "INSERT INTO `mutualfundexpense`(`mfexdetail`, `mfexamount`, `mfexdate`) VALUES";
	$sqlcashpaid .= "('".$detail."'," . $amountpaid . ",'" . $dt . "')";
			if ($conn->query($sqlcashpaid) == TRUE) {
				$item_array = array(
					'count' => 1,
					'output' => 'Trasnsaction completed successfully...'
				);
				echo json_encode($item_array);
			} else {
				$item_array = array(
					'count' => 0,
					'output' => 'Error in executions...'
				);
				echo json_encode($item_array);
			}
	
}
else
{
	$item_array = array(
			'count' => 0,
			'output' => 'Fill all the fields....'
		);
		echo json_encode($item_array);
}

?>

