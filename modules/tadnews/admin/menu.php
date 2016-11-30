<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: menu.php,v 1.2 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

$adminmenu[0]['title'] = _MI_TADNEW_ADMENU1;
$adminmenu[0]['link'] = "admin/index.php";
$adminmenu[0]['icon'] = "images/folder_txt.png";

$adminmenu[1]['title'] = _MI_TADNEW_ADMENU2;
$adminmenu[1]['link'] = "admin/post.php";
$adminmenu[1]['icon'] = "images/package_editors.png";

$adminmenu[2]['title'] = _MI_TADNEW_ADMENU3;
$adminmenu[2]['link'] = "admin/cate.php";
$adminmenu[2]['icon'] = "images/view_detailed.png";

$adminmenu[4]['title'] = _MI_TADNEW_ADMENU5;
$adminmenu[4]['link'] = "admin/newspaper.php";
$adminmenu[4]['icon'] = "images/news_subscribe.png";

$modhandler = &xoops_gethandler('module');
$newsxoopsModule = &$modhandler->getByDirname("news");
if($newsxoopsModule){
	$adminmenu[3]['title'] = _MI_TADNEW_ADMENU4;
	$adminmenu[3]['link'] = "admin/import.php";
	$adminmenu[3]['icon'] = "images/nfs_mount.png";
}

$adminmenu[6]['title'] = _MI_TADNEW_ADMENU7;
$adminmenu[6]['link'] = "admin/page.php";
$adminmenu[6]['icon'] = "images/document.png";


$adminmenu[7]['title'] = _MI_TADNEW_ADMENU8;
$adminmenu[7]['link'] = "admin/tag.php";
$adminmenu[7]['icon'] = "images/tag.png";

/*
$adminmenu[5]['title'] = _MI_TADNEW_ADMENU6;
$adminmenu[5]['link'] = "admin/update.php";
$adminmenu[5]['icon'] = "images/reload.png";
*/
?>
