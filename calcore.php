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
 //var_dump($your_array);
 echo "</pre>";
 
 $time = $your_array[0];
 $trit= $your_array[1];
 $pye= $your_array[2];
 $mex= $your_array[3];
 $iso= $your_array[4];
 $noc= $your_array[5];
 $zyd= $your_array[6];
 $meg= $your_array[7];
 $mor= $your_array[8];
 echo "Last update: $time <br />
 Trit Price: $trit<br />
 Pye Price: $pye<br />
 Mex Price: $mex<br />
 Iso Price: $iso<br />
 Noc Price: $noc<br />
 Zyd Price: $zyd<br />
 Meg Price: $meg<br />
 Mor Price: $mor<br />";
 
 
echo "Current time : ".date("Y-m-dT");
?>
