<?php
include_once "../../../mainfile.php";

if($_POST['op']=="GO"){
  start_update5();
}

$ver="1.2.3 -> 1.2.4";
$title=_MA_TADNEW_AUTOUPDATE5;
$ok=update_chk5();


function update_chk5(){
	global $xoopsDB;
	$sql="select count(`enable_post_group`) from ".$xoopsDB->prefix("tad_news_cate");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}



function start_update5(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_news_cate")." ADD `enable_post_group` VARCHAR( 255 ) NOT NULL AFTER `enable_group`";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());

	header("location:{$_SERVER["HTTP_REFERER"]}");
	exit;
}
?>
