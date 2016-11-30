<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: cate.php,v 1.3 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "admin_header.php";
include_once "admin_function.php";

/*-----------function區--------------*/
//tad_news_cate編輯表單
function tad_news_cate_form($ncsn=""){
	global $xoopsDB;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");

	//抓取預設值
	if(!empty($ncsn)){
		$DBV=get_tad_news_cate($ncsn);
	}else{
		$DBV=array();
	}

	//預設值設定
	
	$ncsn=(!isset($DBV['ncsn']))?"":$DBV['ncsn'];
	$of_ncsn=(!isset($DBV['of_ncsn']))?"":$DBV['of_ncsn'];
	$nc_title=(!isset($DBV['nc_title']))?"":$DBV['nc_title'];
	$sort=(!isset($DBV['sort']))?get_max_sort():$DBV['sort'];
	$enable_group=(!isset($DBV['enable_group']))?"":explode(",",$DBV['enable_group']);
	$enable_post_group=(!isset($DBV['enable_post_group']))?"":explode(",",$DBV['enable_post_group']);
	$not_news=(!isset($DBV['not_news']))?"":$DBV['not_news'];
	$cate_pic=(!isset($DBV['cate_pic']))?"":$DBV['cate_pic'];
	$pic=(empty($cate_pic))?"../images/no_cover.png":_TADNEWS_CATE_URL."/{$cate_pic}";
	
	$op=(empty($ncsn))?"insert_tad_news_cate":"update_tad_news_cate";
	//$op="replace_tad_news_cate";
	
	$cate_select=get_tad_news_cate_option(0,0,$of_ncsn,$ncsn,"1","0");
	
	$SelectGroup_name = new XoopsFormSelectGroup("", "enable_group", false,$enable_group, 3, true);
	$SelectGroup_name->addOption("", _MA_TADNEW_ALL_OK, false);
	
	$enable_group = $SelectGroup_name->render();
	
	$SelectGroup_name = new XoopsFormSelectGroup("", "enable_post_group", false,$enable_post_group, 3, true);
	//$SelectGroup_name->addOption("", _MA_TADNEW_ALL_OK, false);
	$enable_post_group = $SelectGroup_name->render();
	
	$list_tad_news_cate=list_tad_news_cate(0);
	
	$main="
	<script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/jquery/jquery.js'></script>
	<script type='text/javascript'>
	$(document).ready(function() {
		$('#adv_form').hide();
		$('#show_adv_form').click(function() {
			if ($('#adv_form').is(':visible')) {
	       $('#adv_form').slideUp();
			} else{
	       $('#adv_form').slideDown();
			}
		});
	});
	</script>
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
  <table class='form_tbl' style='width:100%;'>

	<tr><td class='title'>"._MA_TADNEW_PARENT_CATE."</td>
	<td class='col'><select name='of_ncsn' size=1>
		$cate_select
	</select>
  "._MA_TADNEW_CATE_SORT."
  <input type='text' name='sort' size='2' value='{$sort}'>
	</td></tr>
	
	<tr><td class='title'>"._MA_TADNEW_CATE_TITLE."</td>
	<td class='col'><input type='text' name='nc_title' size='20' value='{$nc_title}'>
	<input type='button' id='show_adv_form' value='"._MA_TADNEW_CATE_ADV."'></td></tr>
	<tr><td colspan=4>

	<div id='adv_form'>
	<table class='form_tbl'>
	<tr><td class='title'>"._MA_TADNEW_CATE_PIC."</td>
	<td class='col'><input type='file' name='cate_pic'></td></tr>
	
	<tr><td class='title'>"._MA_TADNEW_CAN_READ_CATE_GROUP."<br />"._MA_TADNEW_CAN_READ_CATE_GROUP_TXT."</td>
	<td class='col'>$enable_group</td></tr>
	<tr><td class='title'>"._MA_TADNEW_CAN_POST_CATE_GROUP."<br />"._MA_TADNEW_CAN_POST_CATE_GROUP_TXT."</td>
	<td class='col'>$enable_post_group</td></tr>
	</table>
	</div>
	</td></tr>
  <tr><td class='bar' colspan='2'>
  <input type='hidden' name='not_news' value='0'>
	<input type='hidden' name='ncsn' value='{$ncsn}'>
  <input type='hidden' name='op' value='{$op}'>
  <input type='submit' value='"._MA_TADNEW_SAVE_CATE."'></td></tr>
  </table>
  </form>
	$list_tad_news_cate";

  $thumb_pic=(empty($nc_title))?"":"<img src='{$pic}' width=50 align=absmiddle hspace=4 alt='{$nc_title}' title='{$nc_title}'>";
  
  $title=$thumb_pic._MA_TADNEW_ADD_CATE;
  
  $main=div_3d($title,$main,"corners");
	return $main;
}

//轉換分類類型
function change_kind($ncsn="",$not_news=""){
	global $xoopsDB,$xoopsModuleConfig;
	$cate_org=get_tad_news_cate($ncsn);
	
	//先找看看底下有無分類，若有將其父分類變成原分類之父分類
	$sql = "update ".$xoopsDB->prefix("tad_news_cate")."  set  of_ncsn = '{$cate_org['of_ncsn']}' where of_ncsn='$ncsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_DB_UPDATE_ERROR1."<br>$sql");
	
	
  $sql = "update ".$xoopsDB->prefix("tad_news_cate")." set  of_ncsn = '',not_news='{$not_news}' where ncsn='$ncsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_DB_UPDATE_ERROR1."<br>$sql");
 if($not_news==1){
	header("location: page.php");
 }else{
	header("location: cate.php");
 }
}
/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];
$ncsn = (!isset($_REQUEST['ncsn']))? "":intval($_REQUEST['ncsn']);
$to_ncsn = (!isset($_REQUEST['to_ncsn']))? "":intval($_REQUEST['to_ncsn']);
$not_news = (!isset($_REQUEST['not_news']))? "":intval($_REQUEST['not_news']);

switch($op){

	//新增資料
	case "insert_tad_news_cate":
	$ncsn=insert_tad_news_cate();
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//更新資料
	case "update_tad_news_cate";
	update_tad_news_cate($ncsn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//刪除資料
	case "delete_tad_news_cate";
	delete_tad_news_cate($ncsn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//搬移資料表單
	case "move":
	$main=news_move($ncsn);
	break;

	//搬移資料
	case "move_to":
	move_to_cate($ncsn,$to_ncsn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//分類類型互轉
	case "change_kind":
	change_kind($ncsn,$not_news);
	break;
	
	
	default:
	$main=tad_news_cate_form($ncsn);
	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
admin_toolbar(2);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();

?>
