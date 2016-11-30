<?php
$file = $_GET[file]; //接受get參數
$file_name = "ring (".$file.").docx"; //組成檔名
$file_path = "./temp"; //相對路徑
$file_size = filesize($file_path); //傳回文件大小
header("Content-Type:text/html;charset=utf-8"); //header宣告
header("Content-Disposition: attachment; filename=\"$file_name\"");
readfile($file_path.$file_name); //讀檔
?>