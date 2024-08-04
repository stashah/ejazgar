<?php

require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['id'];

$item_array = "";

$instock= 0;

$sqll = 'SELECT * FROM products';

$resultl = $conn->query($sqll);
$output = '';
$arrayoutput = array();
while ($rowl = $resultl->fetch_assoc()) {
        $sqlpprice = 'SELECT purprice as purp FROM `purchase` WHERE `productid` ='.$rowl["pid"] .' limit 1';
        $sqlpqty = 'SELECT sum(purqty) as purqty FROM `purchase` WHERE `productid` ='.$rowl["pid"];
        $sqlsqty = 'SELECT sum(salqty) as salqty FROM `sale` WHERE `productid` ='.$rowl["pid"];

        $resultpprice = $conn->query($sqlpprice);
        $resultpqty = $conn->query($sqlpqty);
        $resultsqty = $conn->query($sqlsqty);

        while( $rowpprice = $resultpprice->fetch_assoc()){
            $purp = $rowpprice['purp'];
           }
       while( $rowpqty = $resultpqty->fetch_assoc()){
        $rpq = $rowpqty['purqty'];
       }
       
       while( $rowsqty = $resultsqty->fetch_assoc()){
        $spq = $rowsqty['salqty'];
       }




        $item_array = array(
            
            $rowl["pname"],
            $rowl["pid"],
            $rpq - $spq,
            $purp

        );
        $arrayoutput[]  = $item_array;
    
}



echo json_encode($arrayoutput);



