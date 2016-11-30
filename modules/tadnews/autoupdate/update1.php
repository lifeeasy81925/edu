<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update1();
}

$ver="1.0 -> 1.1";
$title=_MA_TADNEW_AUTOUPDATE1;
$ok=update_chk1();

function update_chk1(){
	global $xoopsDB;
	return true;
	
	$sql="select count(*) from ".$xoopsDB->prefix("tad_news_files");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}

function start_update1(){
	global $xoopsDB;
	$sql="CREATE TABLE IF NOT EXISTS ".$xoopsDB->prefix("tad_news_files")." (
	`fsn` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`nsn` SMALLINT UNSIGNED NOT NULL ,
	`file_name` VARCHAR( 255 ) NOT NULL ,
	`file_size` VARCHAR( 255 ) NOT NULL ,
	`file_type` VARCHAR( 255 ) NOT NULL ,
	INDEX ( `nsn` )
	)";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());

	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}
?>
