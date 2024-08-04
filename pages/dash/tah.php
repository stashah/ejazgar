<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$name = $_GET['sid'];

$sql = "SELECT custid, saldate as dt, sum(salqty*salprice) as amount,'' as pamount, '' as cf FROM sale where account=1  group by custid
UNION
SELECT custid,ldate as dt, '' as amount,''as pamount, sum(amount) as cf FROM cashaccount group by custid
 
UNION
SELECT custid, paymentdate as dt,'' as amount, sum(amount) as pamount,'' as cf FROM customeraccount group by custid";
$resultl = $conn->query($sql);
$output = '';
$arrayoutput = array();
while ($rowl = $resultl->fetch_assoc()) {
    


   /* $item = array(
    
    'Sale Date'            => $rowl["saldate"],
    'Product ID'                    => $rowl["pid"],
    'SYEAR'                 => $rowl["SYEAR"],
    'YMSAL'                 => $rowl["YMSAL"],
    'PROFIT'                => $rowl["PROFIT"]

     

);
$arrayoutput[]=$item;*/
   $arrayoutput[] = $rowl;
}


echo json_encode($arrayoutput);


?>