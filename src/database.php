<?php
class database{
	
	private $databaseHost;
	private $databaseUser;
	private $databasePass;
	private $dbo;
	
	public function __construct() {
       @set_exception_handler(array($this, 'exception_handler'));
       $this->dbo = null;
	}
	
	public function loadDB($type,$host,$dbname,$name,$pass,$persistent){
		$this->databaseHost = $type.":host=".$host.";dbname=".$dbname;
		$this->databaseUserName = $name;
		$this->databasePass = $pass;
		
		$this->dbo = new PDO($this->databaseHost,$this->databaseUserName,$this->databasePass,array(
			PDO::ATTR_PERSISTENT => $persistent
			));
	}
	
	public function InitDB(){
		$sql = 'CREATE TABLE IF NOT EXISTS table_Mineral ( 
		Tri DECIMAL(10,2), 
		Prye DECIMAL(10,2), 
		Mex DECIMAL(10,2), 
		Iso DECIMAL(10,2), 
		Noc DECIMAL(10,2), 
		Zyd DECIMAL(10,2), 
		Meg DECIMAL(10,2), 
		Mor DECIMAL(10,2));';
		
			
		//echo $this->dbo;	
				
		$this->dbo->exec($sql);
		
		//echo "Created table with ".$count;
		
	}
		
	public function updateTable($table,$column,$columnValue,$where,$whereValue){
		$sql = 'UPDATE '.$table.' 
			SET '.$column.'='.$columnValue.'
			WHERE '.$where.'='.$whereValue.';';
			
		$stmt = $this->dbo->prepare($sql);
		$stmt->execute();
	}
	
	public function insertInto($table,$column,$columnValue,){
		$sql = 'UPDATE '.$table.' 
			SET '.$column.'='.$columnValue.'
			WHERE '.$where.'='.$whereValue.';';
			
		$stmt = $this->dbo->prepare($sql);
		$stmt->execute();
	}
									 
	public function exception_handler($exception){
		echo "Uncaught exception ". $exception->getMessage(). "\n";
		die();
	}
	
	
	public function closeConnection(){
		$this->dbo = null;
	}
}
?>
