<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2008-07-02
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include "../../../include/cp_header.php";
include "../function.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";

/*-----------function區--------------*/

//分類選單
function get_faq_cate_opt($the_fcsn=""){
	global $xoopsDB;
	$opt="";
	$sql = "select fcsn,title from ".$xoopsDB->prefix("tad_faq_cate")." order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	while(list($fcsn,$title)=$xoopsDB->fetchRow($result)){
	  $selected=($the_fcsn==$fcsn)?"selected":"";
	  $opt.="<option value='$fcsn' $selected>$title</option>";
	}
	return $opt;
}


//tad_faq_content編輯表單
function tad_faq_content_form($fqsn=""){
	global $xoopsDB;

	//抓取預設值
	if(!empty($fqsn)){
		$DBV=get_tad_faq_content($fqsn);
	}else{
		$DBV=array();
	}

	//預設值設定

	$fqsn=(!isset($DBV['fqsn']))?"":$DBV['fqsn'];
	$fcsn=(!isset($DBV['fcsn']))?"":$DBV['fcsn'];
	$title=(!isset($DBV['title']))?"":$DBV['title'];
	$sort=(!isset($DBV['sort']))?"":$DBV['sort'];
	$uid=(!isset($DBV['uid']))?"":$DBV['uid'];
	$post_date=(!isset($DBV['post_date']))?"":$DBV['post_date'];
	$content=(!isset($DBV['content']))?"":$DBV['content'];
	$enable=(!isset($DBV['enable']))?"1":$DBV['enable'];
	
	$faq_cate_opt=get_faq_cate_opt($fcsn);

	include(XOOPS_ROOT_PATH."/modules/tad_faq/class/fckeditor/fckeditor.php") ;
	$oFCKeditor = new FCKeditor('content') ;
	$oFCKeditor->BasePath	= XOOPS_URL."/modules/tad_faq/class/fckeditor/" ;
	$oFCKeditor->Config['AutoDetectLanguage']=false;
	$oFCKeditor->Config['DefaultLanguage']		= 'zh' ;
	$oFCKeditor->ToolbarSet ='my';
	$oFCKeditor->Width = '515' ;
	$oFCKeditor->Height = '250' ;
	$oFCKeditor->Value =$content;
	$editor=$oFCKeditor->CreateHtml() ;


	$op=(empty($fqsn))?"insert_tad_faq_content":"update_tad_faq_content";
	//$op="replace_tad_faq_content";
	$main="
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
  <table class='form_tbl'>

	<input type='hidden' name='fqsn' value='{$fqsn}'>
	<tr><td class='title'>"._MA_TADFAQ_CATE_MENU."</td>
	<td class='col'><select name='fcsn' size=1>
	$faq_cate_opt
	</select></td></tr>
	<tr><td class='title'>"._MA_TADFAQ_FAQ_TITLE."</td>
	<td class='col'><input type='text' name='title' size='40' value='{$title}' style='width:100%;'></td></tr>
	<tr><td class='title'>"._MA_TADFAQ_CONTENT."</td>
	<td class='col'>$editor</td></tr>
	<tr><td class='title'>"._MA_TADFAQ_ENABLE."</td>
	<td class='col'>
	<input type='radio' name='enable' value='1' ".chk($enable,'1').">"._MA_TADFAQ_FAQ_ENABLE."
	<input type='radio' name='enable' value='0' ".chk($enable,'0').">"._MA_TADFAQ_FAQ_UNABLE."
	</td></tr>
  <tr><td class='bar' colspan='2'>
  <input type='hidden' name='op' value='{$op}'>
  <input type='submit' value='"._MA_SAVE."'></td></tr>
  </table>
  </form>";

	$main=div_3d(_MA_TADFAQ_ADD_CONTENT,$main);

	return $main;
}

//新增資料到tad_faq_content中
function insert_tad_faq_content(){
	global $xoopsDB,$xoopsUser;
	
	$uid=($xoopsUser)?$xoopsUser->getVar('uid'):"";
	$sort=get_max_faq_sort($_POST['fcsn']);
	
	$sql = "insert into ".$xoopsDB->prefix("tad_faq_content")." (`fcsn`,`title`,`sort`,`uid`,`post_date`,`content`,`enable`) values('{$_POST['fcsn']}','{$_POST['title']}','{$sort}','{$uid}',now(),'{$_POST['content']}','{$_POST['enable']}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	//取得最後新增資料的流水編號
	$fqsn=$xoopsDB->getInsertId();
	return $fqsn;
}


//以流水號取得某筆tad_faq_content資料
function get_tad_faq_content($fqsn=""){
	global $xoopsDB;
	if(empty($fqsn))return;
	$sql = "select * from ".$xoopsDB->prefix("tad_faq_content")." where fqsn='$fqsn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//更新tad_faq_content某一筆資料
function update_tad_faq_content($fqsn=""){
	global $xoopsDB;
	
	$sql = "update ".$xoopsDB->prefix("tad_faq_content")." set  `fcsn` = '{$_POST['fcsn']}', `title` = '{$_POST['title']}', `post_date` = now(), `content` = '{$_POST['content']}', `enable` = '{$_POST['enable']}' where fqsn='$fqsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $fqsn;
}

//自動取得新排序
function get_max_faq_sort($fcsn=""){
	global $xoopsDB,$xoopsModule;
	$sql = "select max(sort) from ".$xoopsDB->prefix("tad_faq_content")." where fcsn='{$fcsn}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}


/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){

	//新增資料
	case "insert_tad_faq_content":
	insert_tad_faq_content();
	header("location: index.php");
	break;

	//輸入表格
	case "tad_faq_content_form";
	$main=tad_faq_content_form($_GET['fqsn']);
	break;

	//更新資料
	case "update_tad_faq_content";
	update_tad_faq_content($_POST['fqsn']);
	header("location: index.php");
	break;
	
	//預設動作
	default:
	$main=tad_faq_content_form($_GET['fqsn']);
	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
loadModuleAdminMenu(1);
echo $main;
xoops_cp_footer();

?>
