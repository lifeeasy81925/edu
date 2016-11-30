<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update2();
}

$ver="1.1 -> 1.2";
$title=_MA_TADNEW_AUTOUPDATE2;

$ok=update_chk2();


function update_chk2(){
	global $xoopsDB;
	$sql="select count(`sort`) from ".$xoopsDB->prefix("tad_news_cate");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function start_update2(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_news_cate")." ADD `sort` SMALLINT UNSIGNED NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());

	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}
?>
