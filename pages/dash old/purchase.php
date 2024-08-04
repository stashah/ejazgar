<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$name = $mydata['pid'];

$sql = "SELECT SUM(purqty*purprice) AS TOTALPUR, PM,ym, PYEAR 
FROM (SELECT *,EXTRACT(YEAR_MONTH FROM purdate) AS YM, DATE_FORMAT(purdate, '%M %Y') AS PM,YEAR(purdate) AS PYEAR FROM purchase AS nt)  nt 
WHERE pyear=$name 
GROUP BY Pm  
ORDER BY `ym`  ASC";
$resultl = $conn->query($sql);
$output = '';
$arrayoutput = array();
while ($rowl = $resultl->fetch_assoc()) {
    


    $item = array(
    
    'totalpur'            => $rowl["TOTALPUR"],
    'PM'                    => $rowl["PM"],
    'PYEAR'                 => $rowl["PYEAR"]


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