<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$action = $mydata['action'];


if ($action == 'payment') {


	$payid = $mydata['payid'];
	$paymentdetails = $mydata['paymentdetails'];
	$custid = $mydata['custid'];
	$amount = $mydata['amount'];
	$pdate = $mydata['pdate'];

	if ($amount == 0) {
		$item_array = array(
			'count' => 0,
			'output' => 'Fill All Fields'

		);
		echo json_encode($item_array);
	} else {
		$sqlcashpaid = "INSERT INTO `customeraccount`( `salid`,paymentdetail, `custid`, `amount`, `paymentdate`) VALUES";
		$sqlcashpaid .= "('" . $payid . "','" . $paymentdetails . "'," . $custid . "," . $amount . ",'" . $pdate . "')";
		if ($conn->query($sqlcashpaid) == TRUE) {
			$item_array = array(
				'count' => 1,
				'output' => 'Payment received..'

			);
			echo json_encode($item_array);
		} else {
			$item_array = array(
				'count' => 0,
				'output' => 'Payment Failed...'

			);
			echo json_encode($item_array);
		}
	}
} else if ($action == "insert") {

	$id =
		$name = $mydata['name'];
	$custmob = $mydata['custmob'];
	$custaddress = $mydata['custaddress'];

	if (!empty($name)) {

		$sql = "INSERT INTO customer(custname, custmobile, custaddress) values ('$name', '$custmob', '$custaddress')";
		if ($conn->query($sql) == TRUE) {
			$item_array = array(
				'count' => 1,
				'output' => 'Customer Added Successfully'
			);
			echo json_encode($item_array);
		} else {
			$item_array = array(
				'count' => 0,
				'output' => 'Unable to Add Customer',
				'custname' => $sql
			);
			echo json_encode($item_array);
		}
	} else {
		$item_array = array(
			'count' => 0,
			'output' => 'Fill All Fields',
			'custname' => $name

		);
		echo json_encode($item_array);
	}
} else if ($action == "update") {

	$custid = $mydata['custid'];
	$name = $mydata['name'];
	$custmob = $mydata['custmob'];
	$custaddress = $mydata['custaddress'];

	if (!empty($name)) {

		$sql = "UPDATE customer SET custname='$name', custmobile='$custmob', custaddress='$custaddress' WHERE custid=$custid";

		if ($conn->query($sql) == TRUE) {
			$item_array = array(
				'count' => 1,
				'output' => 'Customer details updated'
			);
			echo json_encode($item_array);
		} else {
			$item_array = array(
				'count' => 0,
				'output' => 'Unable to update customer details',
				'custname' => $sql
			);
			echo json_encode($item_array);
		}
	} else {
		$item_array = array(
			'count' => 0,
			'output' => 'Fill All Fields',


		);
		echo json_encode($item_array);
	}
}
