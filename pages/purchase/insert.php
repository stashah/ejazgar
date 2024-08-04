<?php
session_start();
require '../../assets/db.php';


if(isset($_SESSION["shopping_cart"])){
	$output ='';
	$count = 0;
	if(!empty($_SESSION["shopping_cart"])){
	
		$sql="";
		
		
		 foreach($_SESSION["shopping_cart"] as $keys => $values){

				
				$purid = $values["purid"];
				$sql = "";
				$sql = "INSERT INTO purchase(purchaseid, productid, purqty, purprice, vendor, purdate) VALUES";
				$sql .= "('".$values["purid"]."','".$values["product_id"]."',".$values["product_quantity"].",".$values["product_price"].",'".$values["vnam"]."','".$values["dt"]."')";
				
				

				 if($conn->query($sql) == TRUE){
					$count++;
					
				}else{
					$output .= "Unable to Update Product";
				}	 		
		} 
		
		unset($_SESSION["shopping_cart"]);
		$item_array = array(
					'count' 		=> $count,
					'output' 		=> $output,
					'purid'		=> $purid
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

