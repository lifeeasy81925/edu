<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update8();
}

$ver="1.2.7 -> 1.2.8";
$title=_MA_TADNEW_AUTOUPDATE8;
$ok=update_chk8();


function update_chk8(){
	global $xoopsDB;
	$sql="select count(`cate_pic`) from ".$xoopsDB->prefix("tad_news_cate");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function start_update8(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_news_cate")." ADD `cate_pic` VARCHAR( 255 ) NOT NULL ,
ADD `not_news` ENUM('0','1') NOT NULL,ADD `setup` TEXT NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());

	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}
?>
