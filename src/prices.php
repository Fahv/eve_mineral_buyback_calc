<?php
require_once("fileIO.php");

class Prices{
	private $time;
	private $trit;
	private $pye;
	private $mex;
	private $iso;
	private $noc;
	private $zyd;
	private $meg;
	private $mor;
	private $debug;
	
	

	private function loadPrices(){
		$mineral_prices_file = new FileIO();
		$mineral_prices_file->init($_SERVER['DOCUMENT_ROOT']."/eve/mineralPrices.txt",MODE::Read,false);
		$mineral_prices_array = explode("\n", $mineral_prices_file->getContent());
		$this->time = $mineral_prices_array[0];
		$this->trit= $mineral_prices_array[1];
		$this->pye= $mineral_prices_array[2];
		$this->mex= $mineral_prices_array[3];
		$this->iso= $mineral_prices_array[4];
		$this->noc= $mineral_prices_array[5];
		$this->zyd= $mineral_prices_array[6];
		$this->meg= $mineral_prices_array[7];
		$this->mor= $mineral_prices_array[8];
		$mineral_prices_file->close();
	}
	public function init($debug){
		$this->debug = $debug;
		$this->loadPrices();
	}	
	public function updatePrices(){
		$mineral_prices_file = new FileIO();

		$mineral_prices_file->init($_SERVER['DOCUMENT_ROOT']."/eve/mineralPrices.txt",MODE::WriteBeginPlus,false);

		$json_request = "http://api.eve-marketdata.com/api/item_prices2.json?char_name=demo&type_ids=34,35,36,37,38,39,40,11399&solarsystem_ids=30000142&buysell=s";


		$json_pull_url = new FileIO();

		$json_pull_url->init($json_request,MODE::Read,true);

		$json = json_decode($json_pull_url->getContent(),true);
		
		$a = array();
		$i =0;
		$currentTime = time();
		
		foreach($json['emd']['result'] as $result){
			$price = round($result['row']['price'],2);
			array_push($a,$price);
			if($this->debug){
				echo $result['row']['typeID']." ".$price."<br />";
			}
		}
		if($this->debug){
			echo "<pre>";
			var_dump($a);
		}
		$b = array();
		foreach ($a as $val){
			$percent = $val*.1;
			array_push($b,round($val-$percent,2));
		}
		if($this->debug){
			var_dump($b);
		}


		$mineral_prices_file->write($currentTime."\n");
		foreach($b as $val){
			$mineral_prices_file->write($val."\n");
		}
		if($this->debug){
			echo "</pre>";
		}
		$mineral_prices_file->close();
		$this->loadPrices();
	}
	
	public function getTime(){
		return $this->time;
	}
	public function getTrit(){
		return $this->trit;
	}
	public function getPye(){
		return $this->pye;
	}
	public function getMex(){
		return $this->mex;
	}
	public function getIso(){
		return $this->iso;
	}
	public function getNoc(){
		return $this->noc;
	}
	public function getZyd(){
		return $this->zyd;
	}
	public function getMeg(){
		return $this->meg;
	}
	public function getMor(){
		return $this->mor;
	}
	
}
?>
