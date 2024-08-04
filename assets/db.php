<?php

session_start();



$shop = $_SESSION["logindetailsshop"]["shop"];





$db_host = "sql213.infinityfree.com";
$db_user = "if0_34969300";
$db_password = "PpQCRRBbXkj1C";



if($shop == 1){
 $db_name = "if0_34969300_ejazshop1";
}else if ($shop == 2){
 $db_name = "if0_34969300_ejazshop2";
}

 

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if($conn->connect_error){
die("Connection Failed");
}

?>
