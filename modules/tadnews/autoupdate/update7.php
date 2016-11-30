<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update7();
}

$ver="1.2.5 -> 1.2.6";
$title=_MA_TADNEW_AUTOUPDATE7;
$ok=update_chk7();


function update_chk7(){
	global $xoopsDB;
	$sql="select count(`prefix_tag`) from ".$xoopsDB->prefix("tad_news");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function start_update7(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_news")." ADD `prefix_tag` VARCHAR( 255 ) NOT NULL ,
ADD `always_top` ENUM( '0', '1' ) NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());

	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}

?>
