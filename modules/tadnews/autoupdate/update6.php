<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update6();
}

$ver="1.2.4 -> 1.2.5";
$title=_MA_TADNEW_AUTOUPDATE6;
$ok=update_chk6();


function update_chk6(){
	global $xoopsDB;
	$sql="select count(`themes`) from ".$xoopsDB->prefix("tad_news_paper_setup");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function start_update6(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_news_paper_setup")." ADD `themes` VARCHAR( 255 ) NOT NULL AFTER `foot`";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());

	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}

?>
