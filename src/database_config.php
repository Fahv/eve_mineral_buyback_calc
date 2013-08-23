<?php
require_once("database.php");



$db = new database();

$type="mysql";			//Database type
$host = "localhost";	//Host
$dbname = "mineral_prices";			//Database name
$name = "root";			//UserName
$pass = "";				//Password


$db->loadDB($type,$host,$dbname,$name,$pass,FALSE);

?>
