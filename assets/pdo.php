<?php 
$dsn  = 'mysql:host=sql213.infinityfree.com; dbname=if0_34969300_ejazshop1';
$username='if0_34969300';
$password='PpQCRRBbXkj1C';
$options = [];
try{
	$connection = new PDO($dsn, $username, $password, $options);

}catch (PDOException $e){

}
?>