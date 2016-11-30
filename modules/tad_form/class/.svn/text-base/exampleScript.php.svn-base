<?php

include_once("createZip.inc.php");
$createZip = new createZip;  

$createZip -> addDirectory("dir/");

$fileContents = file_get_contents("img.jpg");  
$createZip -> addFile($fileContents, "dir/img.jpg");  


$fileName = "archive.zip";
$fd = fopen ($fileName, "wb");
$out = fwrite ($fd, $createZip -> getZippedfile());
fclose ($fd);

$createZip -> forceDownload($fileName);
@unlink($fileName);
?>


