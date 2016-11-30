<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update4();
}

$ver="1.2 -> 1.2.1";
$title=_MA_TADNEW_AUTOUPDATE4;

$ok=update_chk4();

function update_chk4(){
	global $xoopsDB;
	return true;
	
	$sql="select count(`counter`) from ".$xoopsDB->prefix("tad_news_files");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}



function start_update4(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_news_files")." ADD `counter` SMALLINT UNSIGNED NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());

	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}
?>
