<?php

class database{
	private $databaseHost;
	private $databaseUser;
	private $databasePass;
	private $dbo;
	
	public function __construct() {
       @set_exception_handler(array($this, 'exception_handler'));
       //throw new Exception('DOH!!');
   }
	
	public function load($host,$name,$pass,$persistent){
		//@set_exception_handler(array(this,'exception_handler'));
		//throw new Exception('DOH!!');
		$databaseHost = $host;
		$databaseName = $name;
		$databasePass = $pass;
		
		$dbo = new PDO($host,$name,$pass,array(
			PDO::ATTR_PERSISTENT => $persistent
			));
		
		echo "test";
	}
									 
	public function exception_handler($exception){
		echo "Uncaught exception ". $exception->getMessage(). "\n";
		die();
	}
	
}
?>
