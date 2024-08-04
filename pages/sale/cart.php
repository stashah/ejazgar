<?php

session_start();
//require '../../assets/db.php';
//$data = stripslashes(file_get_contents("php://input"));
//$mydata = json_decode($data,true);

if(isset($_POST["product_id"])){
	 $order_table='';
	$message ='';
	$total = 0;
	if($_POST["action"] == "add")
	{
		 if(isset($_SESSION["shopping_cart_sale"])){
			 $is_available = 0;
			foreach($_SESSION["shopping_cart_sale"] as $keys => $values){
				if($_SESSION["shopping_cart_sale"][$keys]['product_id'] == $_POST["product_id"]){
					$is_available++;
					$_SESSION["shopping_cart_sale"][$keys]['product_quantity'] = $_SESSION["shopping_cart_sale"][$keys]['product_quantity']+ $_POST["product_quantity"];
					$_SESSION["shopping_cart_sale"][$keys]['product_price'] = $_POST["product_price"];
					$_SESSION["shopping_cart_sale"][$keys]['product_ppric'] = $_POST["product_ppric"];
					$_SESSION["shopping_cart_sale"][$keys]['custid'] = $_POST["custid"];
					$_SESSION["shopping_cart_sale"][$keys]['dt'] = $_POST["dt"];
					$_SESSION["shopping_cart_sale"][$keys]['salid'] = $_POST["salid"];
					$_SESSION["shopping_cart_sale"][$keys]['onaccount'] = $_POST["onaccount"];

				}
			}
			if($is_available < 1){
				$item_array = array(
					'product_id' 		=> $_POST["product_id"],
					'product_name' 		=> $_POST["product_name"],
					'product_price' 	=> $_POST["product_price"],
					'product_ppric'		=> $_POST["product_ppric"],
					'product_quantity'	=> $_POST["product_quantity"],
					'dt'				=> $_POST["dt"],	
					'custid'				=> $_POST["custid"],
					'salid'				=> $_POST["salid"],
					'onaccount'			=> $_POST["onaccount"]
				);
				$_SESSION["shopping_cart_sale"][] = $item_array;
			}
		}
		else{
			$item_array = array(
				'product_id' 		=> $_POST["product_id"],
				'product_name' 		=> $_POST["product_name"],
				'product_price' 	=> $_POST["product_price"],
				'product_ppric'		=> $_POST["product_ppric"],
				'product_quantity'	=> $_POST["product_quantity"],
				'dt'				=> $_POST["dt"],				
				'custid'				=> $_POST["custid"],
				'salid'				=> $_POST["salid"],
				'onaccount'			=> $_POST["onaccount"]
			);
			$_SESSION["shopping_cart_sale"][] = $item_array;
		}
	}
	if($_POST["action"] == "remove"){
			
			 foreach($_SESSION["shopping_cart_sale"] as $keys => $values){
				if($values["product_id"] == $_POST["product_id"]){
					unset($_SESSION["shopping_cart_sale"][$keys]);
					
				}
			}
		}
				
		 $order_table .= '
			<table  class="table table-dark">
			<thead>
				<tr >
					<th>Purc. ID</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Cash Price</th>
				    <th>Total</th>	
					<th>On Account </th>				
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
		';
		// ok till here
		if(!empty($_SESSION["shopping_cart_sale"])){
			
			
			foreach($_SESSION["shopping_cart_sale"] as $keys => $values){
				if($values ==1 ){$onacc='Debit';}else{$onacc="Credit";}
				$order_table .= '
				<tr >
					<td>'.$values["salid"].'</td>
					<td>'.$values["product_name"].'</td>
					<td>'.$values["product_quantity"].'</td>
					<td align="right">Rs. '.number_format($values["product_price"],2).'</td>
					<td align="right">Rs. '.number_format($values["product_quantity"]* $values["product_price"], 2).'</td>
					<td>'.$onacc.'</td>
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
					<th></th>
				</tr> 
			</tfoot>
			'; 
		}
		$order_table .= '</table>';
		
		 $output = array(
			'order_table' => $order_table,
			'cart_item'		=> count($_SESSION["shopping_cart_sale"]),
			'carttotalamount' => $total
			
		); 
		echo json_encode($output);   
}

 

?>