<?php

final class MODE{
	const Read = "r";
	const ReadPlus = "r+";
	const WriteBegin = "w";
	const WriteBeginPlus = "w+";
	const WriteEnd = "a";
	const WriteEndPlus ="a+";
	
	private function __construct() {
		
	}
}

class FileIO{
	private $fileName;
	private $file;
	private	$fileSize;
	private $fileContent;
	
	public function init($fileName,$mode){
		$this->fileName = $_SERVER['DOCUMENT_ROOT'].$fileName;
		
		$this->file = fopen($this->fileName,$mode);
		if($this->file == false){
			echo "error opening file";
			die;
		}
		$this->clearCache();
		$this->fileSize = filesize($this->fileName);
		
		$this->fileContent = fread($this->file,$this->fileSize);
	}
	
	public function read(){
		rewind($this->file);
		if($this->file){
			$this->fileContent = fread($this->file,$this->fileSize);
			if($this->fileContent == false)
			{
				echo "Error Reading File";
			}
		} else{
			echo "Error Reading File";
		}		
	}
	
	public function write($content){
		if($this->file){
			$written = fwrite($this->file,$content);
			$this->clearCache();
			$this->fileSize = filesize($this->fileName);
			return $written;
		}
	}
	
	public function close(){
		fclose($this->file);
	}
	
	public function getContent(){
		return $this->fileContent;
	}
	public function getFileSize(){
		return $this->fileSize;
	}
	private function clearCache(){
		clearstatcache();
	}
	
}
?>
