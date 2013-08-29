<?php
require_once("fileIO.php");

$mineral_prices_file = new FileIO();

$mineral_prices_file->init($_SERVER['DOCUMENT_ROOT']."/eve/mineralPrices.txt",MODE::WriteBeginPlus,false);

$json_request = "http://api.eve-marketdata.com/api/item_prices2.json?char_name=demo&type_ids=34,35,36,37,38,39,40,11399&solarsystem_ids=30000142&buysell=s";


$json_pull_url = new FileIO();

$json_pull_url->init($json_request,MODE::Read,true);

$json = json_decode($json_pull_url->getContent(),true);

//echo $json[typeID];
//echo "<pre>";
//var_dump($json['emd']);
//echo "</pre>";
$a = array();
$i =0;
$currentTime = $json['emd']['currentTime'];


foreach($json['emd']['result'] as $result){
	//echo "<pre>";
	//var_dump($result);
	//echo "</pre>";
	$price = round($result['row']['price'],2);
	array_push($a,$price);
	echo $result['row']['typeID']." ".$price."<br />";
}
echo "<pre>";
var_dump($a);
$b = array();
foreach ($a as $val){
	$percent = $val*.1;
	array_push($b,round($val-$percent,2));
}
var_dump($b);


$mineral_prices_file->write($currentTime."\n");
foreach($b as $val){
	$mineral_prices_file->write($val."\n");
}
echo "</pre>";

?>
