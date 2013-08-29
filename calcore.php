<?php
require_once("src/fileIO.php");

$file = new FileIO();
echo "Init: <br />";
$file->init("/eve/mineralPrices.txt",MODE::ReadPlus);
echo "Inital Read: ".$file->getContent()." filesize: ".$file->getFileSize()."<br />";
echo "Write: ";
echo $file->write("This is a test");
echo "<br />After Write File Size: ".$file->getFileSize()."<br />";
$file->read();
echo "<br /> Read: ".$file->getContent()."<br />";
$file->close();
echo "File Closed: <br />";
?>
