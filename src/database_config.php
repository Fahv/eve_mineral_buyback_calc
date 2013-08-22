<?php
include_once("database.php");



$db = new database();

$host = "";
$name = "";	//UserName
$pass = "";	//Password


$db->load($host,$name,$pass,FALSE);

?>
