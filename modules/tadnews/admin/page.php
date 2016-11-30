<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: page.php,v 1.1 2008/06/25 06:35:47 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "admin_header.php";
include_once "admin_function.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/up_file.php";
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
	$setup=(!isset($DBV['setup']))?"":$DBV['setup'];
	
	$set=get_setup($setup);
	
	$op=(empty($ncsn))?"insert_tad_news_cate":"update_tad_news_cate";
	//$op="replace_tad_news_cate";
	
	$cate_select=get_tad_news_cate_option(0,0,$of_ncsn,$ncsn,"1","1");
	
	$SelectGroup_name = new XoopsFormSelectGroup("", "enable_group", false,$enable_group, 3, true);
	$SelectGroup_name->addOption("", _MA_TADNEW_ALL_OK, false);
	$enable_group = $SelectGroup_name->render();
	
	$SelectGroup_name = new XoopsFormSelectGroup("", "enable_post_group", false,$enable_post_group, 3, true);
	//$SelectGroup_name->addOption("", _MA_TADNEW_ALL_OK, false);
	$enable_post_group = $SelectGroup_name->render();
	
	$all_cate=list_tad_news_cate(0,"",1);
	
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
  <table class='form_tbl'>
	<tr><td class='title' style='width:100px;'>"._MA_TADNEW_PARENT_CATE."</td>
	<td class='col' style='width:260px;'><select name='of_ncsn' size=1>
		$cate_select
	</select>
  "._MA_TADNEW_CATE_SORT."
  <input type='text' name='sort' size='2' value='{$sort}'>
	</td><td rowspan=4>$all_cate</td></tr>
	
	<tr><td class='title'>"._MA_TADNEW_CATE_TITLE."</td>
	<td class='col'><input type='text' name='nc_title' size='20' value='{$nc_title}'>
	<img src='../images/adv.png' id='show_adv_form' align='absmiddle' title='"._MA_TADNEW_CATE_ADV."' alt='"._MA_TADNEW_CATE_ADV."' width=24 height=24></td></tr>
	<tr><td colspan=4>

	<div id='adv_form'>
	<table class='form_tbl'>
	<tr><td class='title'>"._MA_TADNEW_CATE_PIC."</td>
	<td class='col'><input type='file' name='cate_pic'></td></tr>

	<tr><td class='title'>"._MA_TADNEW_CATE_SHOW_TITLE."</td>
	<td class='col'>
	<input type='radio' name='setup[title]' value='1' ".chk($set['title'],'1','1').">"._MA_TADNEW_CATE_YES."
	<input type='radio' name='setup[title]' value='0' ".chk($set['title'],'0').">"._MA_TADNEW_CATE_NO."
	</td></tr>
	
	<tr><td class='title'>"._MA_TADNEW_CATE_SHOW_3D."</td>
	<td class='col'>
	<input type='radio' name='setup[3d]' value='1' ".chk($set['3d'],'1').">"._MA_TADNEW_CATE_YES."
	<input type='radio' name='setup[3d]' value='0' ".chk($set['3d'],'0','1').">"._MA_TADNEW_CATE_NO."
	</td></tr>

	<tr><td class='title'>"._MA_TADNEW_CATE_SHOW_TOOL."</td>
	<td class='col'>
	<input type='radio' name='setup[tool]' value='1' ".chk($set['tool'],'1').">"._MA_TADNEW_CATE_YES."
	<input type='radio' name='setup[tool]' value='0' ".chk($set['tool'],'0','1').">"._MA_TADNEW_CATE_NO."
	</td></tr>

	<tr><td class='title'>"._MA_TADNEW_CATE_SHOW_COMM."</td>
	<td class='col'>
	<input type='radio' name='setup[comm]' value='1' ".chk($set['comm'],'1').">"._MA_TADNEW_CATE_YES."
	<input type='radio' name='setup[comm]' value='0' ".chk($set['comm'],'0','1').">"._MA_TADNEW_CATE_NO."
	</td></tr>
	
	<tr><td class='title'>"._MA_TADNEW_CAN_READ_CATE_GROUP."<br />"._MA_TADNEW_CAN_READ_CATE_GROUP_TXT."</td>
	<td class='col'>$enable_group</td></tr>
	<tr><td class='title'>"._MA_TADNEW_CAN_POST_CATE_GROUP."<br />"._MA_TADNEW_CAN_POST_CATE_GROUP_TXT."</td>
	<td class='col'>$enable_post_group</td></tr>
	</table>
	</div>
	</td></tr>
  <tr><td class='bar' colspan='2'>
  <input type='hidden' name='not_news' value='1'>
	<input type='hidden' name='ncsn' value='{$ncsn}'>
  <input type='hidden' name='op' value='{$op}'>
  <input type='submit' value='"._MA_TADNEW_SAVE_CATE."'></td></tr>
  </table>
  </form>";
  
  $thumb_pic=(empty($nc_title))?"":"<img src='{$pic}' width=50 align=absmiddle hspace=4 alt='{$nc_title}' title='{$nc_title}'>";
  
  $main=div_3d(_MA_TADNEW_ADD_CATE,$main,"corners","display:inline;float:left");
	return $main;
}



/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];
$ncsn = (!isset($_REQUEST['ncsn']))? "":$_REQUEST['ncsn'];
$to_ncsn = (!isset($_REQUEST['to_ncsn']))? "":intval($_REQUEST['to_ncsn']);
$nsn = (!isset($_REQUEST['nsn']))? "":intval($_REQUEST['nsn']);
$show_uid = (empty($_REQUEST['show_uid']))? "":$_REQUEST['show_uid'];

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
	

	//刪除資料
	case "delete_tad_news";
	delete_tad_news($nsn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	

	//批次管理
	case "batch":
	if($_POST['act']=="move_news"){
    move_news($_POST['nsn_arr'],$ncsn);
  }elseif($_POST['act']=="del_news"){
    del_news($_POST['nsn_arr']);
  }
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	default:
	$main="<table>
	<tr><td style='vertical-align:top;'>".tad_news_cate_form($ncsn)."</td></tr>
  <tr><td style='vertical-align:top;'>".list_tad_news($ncsn,"page",$show_uid)."</td></tr>
	</table>";
	

	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
admin_toolbar(6);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();

?>
