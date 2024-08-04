<?php


function getcusttotalsale($id)
{
    require '../../assets/db.php';
    $sql = "SELECT SUM(`salqty`*`salprice`) AS totalpur FROM `sale` WHERE custid=$id and account=1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
    return $row['totalpur'];
}
function getcustpaidamount($id)
{
    require '../../assets/db.php';
    $sql = "SELECT sum(`amount`) totalpaid FROM `customeraccount` WHERE `custid`=$id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
    return $row['totalpaid'];
}

function custcashaccountbal($id)
{
    require '../../assets/db.php';
    $sql = "SELECT sum(`amount`) totalcash FROM `cashaccount` WHERE `custid`=$id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
    return $row['totalcash'];
}

$pid=0;
function getproductname($pid)
{
    $pid = $pid;
    $id = (int)$pid;
    if($id != 0 ||$id > 0 ){
        require '../../assets/db.php';
        $sql = "SELECT * FROM products WHERE pid=".$id;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc(); 
        return $row['pname'];
        
    }else {
        return $pid;
       
    }
}
?>


