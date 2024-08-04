<?php

function getrecieveable()
{
    require 'db.php';
    $sql = "SELECT sum(amount) as Recieveable FROM lease_ls";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['Recieveable'];
}
function gettotaladvrec()
{
    require 'db.php';
    $sql =  'SELECT sum(adv) as advance FROM lease_ls';
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['advance'];
    
}
function gettotalinstallmentrec()
{
    require 'db.php';
    $sql = 'SELECT sum(inst_instamount) as installmentssum FROM installments_ls';
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['installmentssum'];
}
function purchasedtoday(){
    $date = date("Y-m-d");
    require 'db.php';
    $sql = "SELECT COALESCE(sum(pur_qty * pur_cp),0) as purtoday FROM purchase_ls WHERE pur_date='{$date}'";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['purtoday'];
}
function purchasedcurrentmonth(){
    $dt = date("Y-m");
    $d1 = date("Y-m-01", strtotime($dt));
    $d2 = date("Y-m-t", strtotime($dt));
    require 'db.php';
    $sql = "SELECT COALESCE(sum(pur_qty * pur_cp),0) as purmonth FROM purchase_ls WHERE pur_date between'{$d1}' and '{$d2}'";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['purmonth'];
}
function purchasedtotal(){
    require 'db.php';
    $sql = "SELECT COALESCE(sum(pur_qty * pur_cp),0) as purtotal FROM purchase_ls";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['purtotal'];
}
// sale reports
function saletoday(){
    $date = date("Y-m-d");
    require 'db.php';
    $sql = "SELECT COALESCE(sum(amount),0) as saletoday FROM lease_ls WHERE lease_date='{$date}'";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['saletoday'];
}
function salecurrentmonth(){
    $dt = date("Y-m");
    $d1 = date("Y-m-01", strtotime($dt));
    $d2 = date("Y-m-t", strtotime($dt));
    require 'db.php';
    $sql = "SELECT COALESCE(sum(pur_qty * pur_cp),0) as purmonth FROM purchase_ls WHERE pur_date between'{$d1}' and '{$d2}'";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['purmonth'];
}
function saletotal(){
    require 'db.php';
    $sql = "SELECT COALESCE(sum(pur_qty * pur_cp),0) as purtotal FROM purchase_ls";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['purtotal'];
}

function getreturnedcashloanbalance($cid){
    $cid = $cid;
    require 'db.php';
    $sql = "SELECT COALESCE(sum(amount),0) as amount FROM cashloanreturned where custid={$cid}";
    $result = $conn->query($sql);
    //$row = $result->fetch_assoc();
    $row = $result->fetch_assoc(); 
    return $row['amount'];
}
