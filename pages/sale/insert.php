<?php
session_start();
require '../../assets/db.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);


$amountpaid = $mydata['amountpaid'];


if(isset($_SESSION["shopping_cart_sale"])){
	$output ='';
	$count = 0;
	$cracc =0;
	$salid = 0;
	$custid = 0;
	$paymentdate = '2000-01-01';
	$onaccount ="";
	if(!empty($_SESSION["shopping_cart_sale"])){
	
		$sql="";
		
		
		 foreach($_SESSION["shopping_cart_sale"] as $keys => $values){

				
				$salid = $values["salid"];
				$custid = $values["custid"];
				$paymentdate = $values["dt"];
				$onaccount = $values["onaccount"];
				$sql = "";
				$sql = "INSERT INTO sale(`saleid`, `productid`, `salqty`, `salprice`, `purprice`, `saldate`, `custid`, `account`) VALUES";
				$sql .= "('".$values["salid"]."','".$values["product_id"]."',".$values["product_quantity"].",".$values["product_price"].",".$values["product_ppric"].",'".$values["dt"]."',".$values["custid"].",".$values["onaccount"].")";
				if($conn->query($sql) == TRUE){
					$count++;
					$output .= "sold to Sale Product";
				}else{
					$output .= "Unable to Sale Product";
				}
					 		
		}
		if ($onaccount == 1) {
			if($amountpaid == 0){}else{
			$sqlcashpaid = "INSERT INTO `customeraccount`( `salid`,paymentdetail, `custid`, `amount`, `paymentdate`) VALUES";
			$sqlcashpaid .= "('" . $salid . "','Cash Paid'," . $custid . "," . $amountpaid . ",'" . $paymentdate . "')";
			if ($conn->query($sqlcashpaid) == TRUE) {
				$cracc = 1;
			} else {
				$cracc = 0;
			}
		}
		}
		else{
			$cracc = 3;
		}
		unset($_SESSION["shopping_cart_sale"]);
		$item_array = array(
					'count' 		=> $count,
					'output' 		=> $output,
					'custaccount' 	=> $cracc					
				);
		echo json_encode($item_array);
	}else{
		$item_array = array(
			'count' => 0,
			'output' => 'Add item to cart'
		);
		echo json_encode($item_array);
	}
}
else
{
	$item_array = array(
			'count' => 0,
			'output' => 'Add item to cart'
		);
		echo json_encode($item_array);
}

?>

