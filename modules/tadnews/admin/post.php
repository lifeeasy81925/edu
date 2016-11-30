<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: post.php,v 1.2 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "admin_header.php";
include_once "../post_function.php";

/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){

	//新增資料
	case "insert_tad_news":
	$nsn=insert_tad_news();
	break;
	
	//輸入表格
	case "tad_news_form";
	$main=tad_news_form($_GET['nsn']);
	//$main.=list_tad_news(1);
	break;
		
	//更新資料
	case "update_tad_news";
	update_tad_news($_POST['nsn']);
	header("location: ../index.php?nsn={$_POST['nsn']}");
	break;
	

	default:
	$nsn=(empty($_GET['nsn']))?"":$_GET['nsn'];
	$main=tad_news_form($nsn);
	//$main=list_tad_news(1);
	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
admin_toolbar(1);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();

?>
