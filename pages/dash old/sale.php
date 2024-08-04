<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$name = $mydata['sid'];

$sql = "SELECT SUM(salqty*salprice) AS TOTALSAL,SUM(salqty*salprice)- SUM(salqty*purprice) AS PROFIT, PMSAL,ymsal, SYEAR 
FROM (SELECT *,EXTRACT(YEAR_MONTH FROM saldate) AS YMSAL, DATE_FORMAT(saldate, '%M %Y') AS PMSAL,YEAR(saldate) AS SYEAR FROM sale AS nt)  nt 
WHERE syear=$name
GROUP BY PMSAL  
ORDER BY `ymsal`  ASC";
$resultl = $conn->query($sql);
$output = '';
$arrayoutput = array();
while ($rowl = $resultl->fetch_assoc()) {
    


    $item = array(
    
    'TOTALSAL'            => $rowl["TOTALSAL"],
    'PMSAL'                    => $rowl["PMSAL"],
    'SYEAR'                 => $rowl["SYEAR"],
    'YMSAL'                 => $rowl["YMSAL"],
    'PROFIT'                => $rowl["PROFIT"]


);
$arrayoutput[]=$item;

}
/*
$item = array(
    
    'totalpur'            => $sql,
    'PM'        => 'tAHIR'
);
$arrayoutput[]=$item; */

echo json_encode($arrayoutput);


?>