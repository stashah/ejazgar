<?php

require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['id'];

$item_array = "";



$sqll = 'SELECT * FROM customer';

$resultl = $conn->query($sqll);
$output = '';
$arrayoutput = array();
while ($rowl = $resultl->fetch_assoc()) {
        


        $item_array = array(
            
            $rowl["custname"],
            $rowl["custid"]          


        );
        $arrayoutput[]  = $item_array;
    
}



echo json_encode($arrayoutput);



