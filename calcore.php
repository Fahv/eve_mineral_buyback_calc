<?php
require_once("src/fileIO.php");
require_once("src/prices.php");

function notZero($val){
	return ($val == 0);
}

$mineral_prices = new Prices();
$mineral_prices->init(false);
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
  echo "Last update: ".$mineral_prices->getTime()." <br />
 Trit Price: ".$mineral_prices->getTrit()."<br />
 Pye Price: ".$mineral_prices->getPye()."<br />
 Mex Price: ".$mineral_prices->getMex()."<br />
 Iso Price: ".$mineral_prices->getIso()."<br />
 Noc Price: ".$mineral_prices->getNoc()."<br />
 Zyd Price: ".$mineral_prices->getZyd()."<br />
 Meg Price: ".$mineral_prices->getMeg()."<br />
 Mor Price: ".$mineral_prices->getMor()."<br />";
 
 $curTime = time();
 
echo "Current time: $curTime <br /> Next Update: ".($mineral_prices->getTime()+(1* 60 * 60))."<br />";

// (1* 60 * 60)
// 1 Hour 60 Minutes 60 Seconds

if(($mineral_prices->getTime() +  (1* 60 * 60)) < $curTime){
	echo "<br />Need to update prices<br/>";
	$mineral_prices->updatePrices();
}

echo "<h3>What you are selling to the corp</h3><br/>";
echo "<table border='1'><tr><td>Name</td><td>Units</td><td>Price Per Unit or per batch</td><td>Total</td></tr>";

$inputArray = $_POST;		//So I don't screw up $_POST;
//array_filter($inputArray);
$inputArray = array_filter($inputArray);
$totalPrice;

if (array_key_exists('veld1', $inputArray)) {
    echo "<tr><td>Veldspar</td><td>".$inputArray['veld1']."</td><td>".(1000*$mineral_prices->getTrit())."</td><td>".round(($inputArray['veld1']/333)*(1000*$mineral_prices->getTrit()),2)."</td></tr>";
}
if (array_key_exists('veld2', $inputArray)) {
    echo "<tr><td>Concentrated Veldspar</td><td>".$inputArray['veld2']."</td><td>".(1050*$mineral_prices->getTrit())."</td><td>".round(($inputArray['veld2']/333)*(1050*$mineral_prices->getTrit()),2)."</td></tr>";
}
if (array_key_exists('veld3', $inputArray)) {
    echo "<tr><td>Dense Veldspar</td><td>".$inputArray['veld3']."</td><td>".(1100*$mineral_prices->getTrit())."</td><td>".round(($inputArray['veld3']/333)*(1100*$mineral_prices->getTrit()),2)."</td></tr>";
}

if (array_key_exists('scor1', $inputArray)) {
    echo "<tr><td>Scordite</td><td>".$inputArray['scor1']."</td><td>".(833*$mineral_prices->getTrit()+416*$mineral_prices->getPye())."</td><td>".round(($inputArray['scor1']/333)*(833*$mineral_prices->getTrit()+416*$mineral_prices->getPye()),2)."</td></tr>";
}
if (array_key_exists('scor2', $inputArray)) {
	$per = (875*$mineral_prices->getTrit()+437*$mineral_prices->getPye());
	$total = round(($inputArray['scor2']/333)*$per,2);
	$totalPrice += $total;
    echo "<tr><td>Condensed Scordite</td><td>".$inputArray['scor2']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('scor3', $inputArray)) {
	$per = (916*$mineral_prices->getTrit()+458*$mineral_prices->getPye());
	$total = round(($inputArray['scor3']/333)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Massive Scordite</td><td>".$inputArray['scor3']."</td><td>$per</td><td>$total</td></tr>";
}

if (array_key_exists('omb1', $inputArray)) {
	$per = (307*$mineral_prices->getTrit()+123*$mineral_prices->getPye()+307*$mineral_prices->getIso());
	$total = round(($inputArray['omb1']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Omber</td><td>".$inputArray['omb1']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('omb2', $inputArray)) {
	$per = (322*$mineral_prices->getTrit()+129*$mineral_prices->getPye()+322*$mineral_prices->getIso());
	$total = round(($inputArray['omb2']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Silvery Omber</td><td>".$inputArray['omb2']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('omb3', $inputArray)) {
	$per = (338*$mineral_prices->getTrit()+135*$mineral_prices->getPye()+338*$mineral_prices->getIso());
	$total = round(($inputArray['omb3']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Golden Omber</td><td>".$inputArray['omb3']."</td><td>$per</td><td>$total</td></tr>";
}

if (array_key_exists('jasp1', $inputArray)) {
	$per = (259*$mineral_prices->getTrit()+259*$mineral_prices->getPye()+518*$mineral_prices->getMex()+259*$mineral_prices->getNoc()+8*$mineral_prices->getZyd());
	$total = round(($inputArray['jasp1']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Jaspet</td><td>".$inputArray['jasp1']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('jasp2', $inputArray)) {
	$per = (272*$mineral_prices->getTrit()+272*$mineral_prices->getPye()+544*$mineral_prices->getMex()+272*$mineral_prices->getNoc()+8*$mineral_prices->getZyd());
	$total = round(($inputArray['jasp2']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Pure Jaspet</td><td>".$inputArray['jasp2']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('jasp3', $inputArray)) {
	$per = (285*$mineral_prices->getTrit()+285*$mineral_prices->getPye()+570*$mineral_prices->getMex()+285*$mineral_prices->getNoc()+9*$mineral_prices->getZyd());
	$total = round(($inputArray['jasp3']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Pristine Jaspet</td><td>".$inputArray['jasp3']."</td><td>$per</td><td>$total</td></tr>";
}

if (array_key_exists('hemo1', $inputArray)) {
	$per = (212*$mineral_prices->getTrit()+212*$mineral_prices->getIso()+424*$mineral_prices->getNoc()+28*$mineral_prices->getZyd());
	$total = round(($inputArray['hemo1']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Hemorphite</td><td>".$inputArray['hemo1']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('hemo2', $inputArray)) {
	$per = (223*$mineral_prices->getTrit()+223*$mineral_prices->getIso()+445*$mineral_prices->getNoc()+29*$mineral_prices->getZyd());
	$total = round(($inputArray['hemo2']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Vivid Hemorphite</td><td>".$inputArray['hemo2']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('hemo3', $inputArray)) {
	$per = (233*$mineral_prices->getTrit()+233*$mineral_prices->getIso()+466*$mineral_prices->getNoc()+31*$mineral_prices->getZyd());
	$total = round(($inputArray['hemo3']/500)*$per,2);
	$totalPrice += $total;
	echo "<tr><td>Radiant Hemorphite</td><td>".$inputArray['hemo3']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('trit', $inputArray)) {
	$per = $mineral_prices->getTrit();
	$total = round(($inputArray['trit']*$mineral_prices->getTrit()),2);
	$totalPrice += $total;
	echo "<tr><td>Trit</td><td>".$inputArray['trit']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('pye', $inputArray)) {
	$per = $mineral_prices->getPye();
	$total = round(($inputArray['pye']*$mineral_prices->getPye()),2);
	$totalPrice += $total;
    echo "<tr><td>Pye</td><td>".$inputArray['pye']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('mex', $inputArray)) {
	$per = $mineral_prices->getMex();
	$total = round(($inputArray['mex']*$mineral_prices->getMex()),2);
	$totalPrice += $total;
    echo "<tr><td>Mex</td><td>".$inputArray['mex']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('iso', $inputArray)) {
	$per = $mineral_prices->getIso();
	$total = round(($inputArray['iso']*$mineral_prices->getIso()),2);
	$totalPrice += $total;
    echo "<tr><td>Iso</td><td>".$inputArray['iso']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('noc', $inputArray)) {
	$per = $mineral_prices->getNoc();
	$total = round(($inputArray['noc']*$mineral_prices->getNoc()),2);
	$totalPrice += $total;
	echo "<tr><td>Noc</td><td>".$inputArray['noc']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('zyd', $inputArray)) {
	$per = $mineral_prices->getZyd();
	$total = round(($inputArray['zyd']*$mineral_prices->getZyd()),2);
	$totalPrice += $total;
    echo "<tr><td>Zyd</td><td>".$inputArray['zyd']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('mex', $inputArray)) {
	$per = $mineral_prices->getMex();
	$total = round(($inputArray['mex']*$mineral_prices->getMex()),2);
	$totalPrice += $total;
    echo "<tr><td>Mex</td><td>".$inputArray['mex']."</td><td>$per</td><td>$total</td></tr>";
}
if (array_key_exists('mor', $inputArray)) {
	$per = $mineral_prices->getMor();
	$total = round(($inputArray['mor']*$mineral_prices->getMor()),2);
	$totalPrice += $total;
	echo "<tr><td>Mor</td><td>".$inputArray['mor']."</td><td>$per</td><td>$total</td></tr>";
}
echo "</table>";

echo "The total price is ".number_format($totalPrice)." isk";
?>
