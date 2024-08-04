<?php

session_start();
//require '../../assets/db.php';
//$data = stripslashes(file_get_contents("php://input"));
//$mydata = json_decode($data,true);

if(isset($_POST["product_id"])){
	 $order_table='';
	$message ='';
	if($_POST["action"] == "add")
	{
		 if(isset($_SESSION["shopping_cart"])){
			 $is_available = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values){
				if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]){
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity']+ $_POST["product_quantity"];
					
					$_SESSION["shopping_cart"][$keys]['product_price'] = $_POST["product_price"];
					$_SESSION["shopping_cart"][$keys]['vnam'] = $_POST["vnam"];
					$_SESSION["shopping_cart"][$keys]['dt'] = $_POST["dt"];
					$_SESSION["shopping_cart"][$keys]['purid'] = $_POST["purid"];

				}
			}
			if($is_available < 1){
				$item_array = array(
					'product_id' 		=> $_POST["product_id"],
					'product_name' 		=> $_POST["product_name"],
					'product_price' 	=> $_POST["product_price"],
					'product_quantity'	=> $_POST["product_quantity"],
					'dt'				=> $_POST["dt"],
					
					'vnam'				=> $_POST["vnam"],
					'purid'				=> $_POST["purid"]
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else{
			$item_array = array(
				'product_id' 		=> $_POST["product_id"],
				'product_name' 		=> $_POST["product_name"],
				'product_price' 	=> $_POST["product_price"],
				'product_quantity'	=> $_POST["product_quantity"],
				'dt'				=> $_POST["dt"],
				
				'vnam'				=> $_POST["vnam"],
				'purid'				=> $_POST["purid"]
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
	}
	if($_POST["action"] == "remove"){
			
			 foreach($_SESSION["shopping_cart"] as $keys => $values){
				if($values["product_id"] == $_POST["product_id"]){
					unset($_SESSION["shopping_cart"][$keys]);
					
				}
			}
		}
				
		 $order_table .= '
			<table  class="table table-light">
			<thead>
				<tr >
					<th>Purc. ID</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Cash Price</th>
				    <th>Total</th>
					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
		';
		// ok till here
		if(!empty($_SESSION["shopping_cart"])){
			
			 $total = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values){
				$order_table .= '
				<tr >
					<td>'.$values["purid"].'</td>
					<td>'.$values["product_name"].'</td>
					<td>'.$values["product_quantity"].'</td>
					<td align="right">Rs. '.number_format($values["product_price"],2).'</td>
					<td align="right">Rs. '.number_format($values["product_quantity"]* $values["product_price"], 2).'</td>
					
					<td><button name="delete" style="color:red" class="btn mdi-24px btn-rounded btn-sm btn-icon delete mdi mdi-delete-forever" id="'.$values["product_id"].'"></button></td>
				</tr>
				';
				$total = $total + ($values["product_quantity"] * $values["product_price"]);
			}
			$order_table .= '</tbody>
			<tfoot>
				<tr>
					<th></th>
					<th >Total</th>
					<th></th>
					<th></th>
					<th align="right" font-weight="bold">Rs. '.number_format($total,2).'</th>
					<th></th>
				</tr> 
			</tfoot>
			'; 
		}
		$order_table .= '</table>';
		
		 $output = array(
			'order_table' => $order_table,
			'cart_item'		=> count($_SESSION["shopping_cart"])
		); 
		echo json_encode($output);   
}

 

?>