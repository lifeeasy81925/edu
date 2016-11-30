<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update3();
}

$ver="1.1 -> 1.2";
$title=_MA_TADNEW_AUTOUPDATE3;
$ok=update_chk3();

function update_chk3(){
	global $xoopsDB;
	$sql="select count(*) from ".$xoopsDB->prefix("tad_news_paper_setup");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;

	$sql="select count(*) from ".$xoopsDB->prefix("tad_news_paper");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;

	$sql="select count(*) from ".$xoopsDB->prefix("tad_news_paper_email");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	
	
	return true;
}

function start_update3(){
	global $xoopsDB;
	$sql="CREATE TABLE IF NOT EXISTS ".$xoopsDB->prefix("tad_news_paper_setup")." (
	`nps_sn` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`title` VARCHAR( 255 ) NOT NULL ,
	`head` TEXT NOT NULL ,
	`foot` TEXT NOT NULL ,
	`status` ENUM( '1', '0' ) NOT NULL
	);
	";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,10, $sql);



	$sql="
	CREATE TABLE IF NOT EXISTS ".$xoopsDB->prefix("tad_news_paper")." (
	`npsn` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`nps_sn` MEDIUMINT UNSIGNED NOT NULL ,
	`number` SMALLINT UNSIGNED NOT NULL ,
	`nsn_array` TEXT NOT NULL ,
	`np_content` TEXT NOT NULL ,
	`np_date` DATETIME NOT NULL
	);
	";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,10, $sql);



	$sql="
	CREATE TABLE IF NOT EXISTS ".$xoopsDB->prefix("tad_news_paper_email")." (
	  `nps_sn` smallint(6) NOT NULL,
	  `email` varchar(255) NOT NULL,
	  `order_date` datetime NOT NULL,
	  PRIMARY KEY  (`nps_sn`,`email`)
	);
	";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,10, $sql);



	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}
?>
