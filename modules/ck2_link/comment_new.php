<?php
include '../../mainfile.php';
$com_itemid = isset($_GET['com_itemid']) ? intval($_GET['com_itemid']) : 0;

if ($com_itemid > 0) {
  $sql="select `link_title`,`link_desc` from ".$xoopsDB->prefix("ck2_link")." where `link_sn`='{$com_itemid}'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($link_title,$link_desc)=$xoopsDB->fetchRow($result);
	$com_replytext=nl2br($link_desc);
}

$com_replytitle = "RE:{$link_title}";
include XOOPS_ROOT_PATH.'/include/comment_new.php';
?>
