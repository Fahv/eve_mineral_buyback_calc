<?php
require_once("src/fileIO.php");

$mineral_prices_file = new FileIO();

$mineral_prices_file->init($_SERVER['DOCUMENT_ROOT']."/eve/mineralPrices.txt",MODE::Read,false);

/** 
 * Time
 * Trit 34
 * Pye 35
 * Mex 36
 * Iso 37
 * Noc 38
 * Zyd 39
 * Meg 40
 * Mor 11399
 */
 
 $your_array = explode("\n", $mineral_prices_file->getContent());
 
 echo "<pre>";
 var_dump($your_array);
 echo "</pre>";
 
 

?>
