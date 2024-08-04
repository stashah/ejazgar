<?php
require '../../assets/db.php';

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$action = $mydata['action'];

if($action == 'datewise'){

    $saldate = $mydata["sid"];

    $name = $mydata['sid'];

$sql = "SELECT s.saleid,s.productid,s.salqty,s.salprice,s.purprice,s.saldate,s.custid,s.account,s.remarks,p.pname,c.custname, DATE_FORMAT(s.saldate, '%d-%M-%Y') as fdate FROM `sale` s JOIN products p  ON s.productid=p.pid left join customer c on s.custid=c.custid WHERE saldate='$name' order by s.account desc ";
$resultl = $conn->query($sql);
$output = '';
$arrayoutput = array();
while ($rowl = $resultl->fetch_assoc()) {
    


    $item = array(
    'saldate'           =>$rowl["saldate"],
    'saleid'            => $rowl["saleid"],
    'pname'                    => $rowl["pname"],
    'qty'                 => $rowl["salqty"],
    'price'                 => $rowl["salprice"],
    'purprice'              => $rowl['purprice'],
    'custid'                => $rowl["custid"],
    'account'           => $rowl["account"],
    'fdate'             => $rowl["fdate"],
    'customer'          =>  $rowl["custname"],
    'remark'            => $rowl["remarks"]


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
    

}else if($action == 'datew'){


$name = $mydata['sid'];

$sql = "SELECT * 
FROM    (SELECT SUM(`salqty`*`salprice`) as dailysal,SUM(`salqty`*`salprice`) - SUM(`salqty`*`purprice`) as dailyprofit, DATE_FORMAT(saldate, '%d %M %Y') as sdate,saldate,DATE_FORMAT(saldate, '%M %Y') as my,EXTRACT(YEAR_MONTH FROM saldate) AS YMSAL 
FROM sale 
GROUP by `saldate` ) S
WHERE YMSAL=$name order by saldate";
$resultl = $conn->query($sql);
$output = '';
$arrayoutput = array();
while ($rowl = $resultl->fetch_assoc()) {
    


    $item = array(
    
    'DAILYSAL'            => $rowl["dailysal"],
    'SALDATE'                    => $rowl["sdate"],
    'YMSAL'                 => $rowl["YMSAL"],
    'month'                 => $rowl["my"],
    'sdate'                 => $rowl['saldate'],
    'dailyprofit'           => $rowl['dailyprofit']


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
}

?>