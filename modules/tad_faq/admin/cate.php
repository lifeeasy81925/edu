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
//tad_faq_cate編輯表單
function tad_faq_cate_form($fcsn=""){
	global $xoopsDB;

	//抓取預設值
	if(!empty($fcsn)){
		$DBV=get_tad_faq_cate($fcsn);
	}else{
		$DBV=array();
	}

	//預設值設定

	$fcsn=(!isset($DBV['fcsn']))?"":$DBV['fcsn'];
	$of_fcsn=(!isset($DBV['of_fcsn']))?"":$DBV['of_fcsn'];
	$title=(!isset($DBV['title']))?"":$DBV['title'];
	$description=(!isset($DBV['description']))?"":$DBV['description'];
	$sort=(!isset($DBV['sort']))?get_max_sort():$DBV['sort'];
	$cate_pic=(!isset($DBV['cate_pic']))?"":$DBV['cate_pic'];

	include(XOOPS_ROOT_PATH."/modules/tad_faq/class/fckeditor/fckeditor.php") ;
	$oFCKeditor = new FCKeditor('description') ;
	$oFCKeditor->BasePath	= XOOPS_URL."/modules/tad_faq/class/fckeditor/" ;
	$oFCKeditor->Config['AutoDetectLanguage']=false;
	$oFCKeditor->Config['DefaultLanguage']		= 'zh' ;
	$oFCKeditor->ToolbarSet ='my';
	$oFCKeditor->Width = '515' ;
	$oFCKeditor->Height = '150' ;
	$oFCKeditor->Value =$description;
	$editor=$oFCKeditor->CreateHtml() ;


	$op=(empty($fcsn))?"insert_tad_faq_cate":"update_tad_faq_cate";
	//$op="replace_tad_faq_cate";
	$main="
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
  <table class='form_tbl'>

	<input type='hidden' name='fcsn' value='{$fcsn}'>
	<!--tr><td class='title'>"._MA_TADFAQ_OF_FCSN."</td>
	<td class='col'><select name='of_fcsn' size=1>
		<option value='' ".chk($of_fcsn,'','1','selected')."></option>
	</select></td></tr-->
	<tr><td class='title'>"._MA_TADFAQ_SORT."</td>
	<td class='col'><input type='text' name='sort' size='3' value='{$sort}'></td><td class='title'>"._MA_TADFAQ_TITLE."</td>
	<td class='col'><input type='text' name='title' size='50' value='{$title}'></td></tr>
	<tr>
	<td class='col' colspan=4>$editor</td></tr>
	<!--tr><td class='title'>"._MA_TADFAQ_CATE_PIC."</td>
	<td class='col'><input type='text' name='cate_pic' size='10' value='{$cate_pic}'></td></tr-->
  <tr><td class='bar' colspan='4'>
  <input type='hidden' name='op' value='{$op}'>
  <input type='submit' value='"._MA_SAVE."'></td></tr>
  </table>
  </form>";

	$main=div_3d("",$main,"raised","display:inline;");

	return $main;
}

//新增資料到tad_faq_cate中
function insert_tad_faq_cate(){
	global $xoopsDB;
	$sql = "insert into ".$xoopsDB->prefix("tad_faq_cate")." (`of_fcsn`,`title`,`description`,`sort`,`cate_pic`) values('{$_POST['of_fcsn']}','{$_POST['title']}','{$_POST['description']}','{$_POST['sort']}','{$_POST['cate_pic']}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	//取得最後新增資料的流水編號
	$fcsn=$xoopsDB->getInsertId();
	return $fcsn;
}

//列出所有tad_faq_cate資料
function list_tad_faq_cate($show_function=1){
	global $xoopsDB,$xoopsModule;
	$MDIR=$xoopsModule->getVar('dirname');
	$sql = "select * from ".$xoopsDB->prefix("tad_faq_cate")." order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	$function_title=($show_function)?"<th>"._BP_FUNCTION."</th>":"";

	$data="
	<script>
	function delete_tad_faq_cate_func(fcsn){
		var sure = window.confirm('"._BP_DEL_CHK."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=delete_tad_faq_cate&fcsn=\" + fcsn;
	}
	</script>
	<table id='tbl'>
	<tr>
	<th>"._MA_TADFAQ_SORT."</th>
	<!--th>"._MA_TADFAQ_OF_FCSN."</th-->
	<th>"._MA_TADFAQ_TITLE."</th>
	<!--th>"._MA_TADFAQ_DESCRIPTION."</th-->
	<!--th>"._MA_TADFAQ_CATE_PIC."</th-->
	$function_title</tr>
	<tbody>";
	while(list($fcsn,$of_fcsn,$title,$description,$sort,$cate_pic)=$xoopsDB->fetchRow($result)){
		$fun=($show_function)?"<td>
		<a href='{$_SERVER['PHP_SELF']}?op=tad_faq_cate_form&fcsn=$fcsn'>"._BP_EDIT."</a>
		<a href=\"javascript:delete_tad_faq_cate_func($fcsn);\">"._BP_DEL."</a></td>":"";
		$data.="<tr>
		<td>{$sort}</td>
		<!--td>{$of_fcsn}</td-->
		<td>{$title}</td>
		<!--td>{$description}</td-->
		<!--td>{$cate_pic}</td-->
		$fun</tr>";
	}
	$data.="
	</tbody>
	</table>";
	return $data;
}



//更新tad_faq_cate某一筆資料
function update_tad_faq_cate($fcsn=""){
	global $xoopsDB;
	$sql = "update ".$xoopsDB->prefix("tad_faq_cate")." set  `of_fcsn` = '{$_POST['of_fcsn']}', `title` = '{$_POST['title']}', `description` = '{$_POST['description']}', `sort` = '{$_POST['sort']}', `cate_pic` = '{$_POST['cate_pic']}' where fcsn='$fcsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $fcsn;
}

//刪除tad_faq_cate某筆資料資料
function delete_tad_faq_cate($fcsn=""){
	global $xoopsDB;
	$sql = "delete from ".$xoopsDB->prefix("tad_faq_cate")." where fcsn='$fcsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}

//自動取得新排序
function get_max_sort(){
	global $xoopsDB,$xoopsModule;
	$sql = "select max(sort) from ".$xoopsDB->prefix("tad_faq_cate")." where of_fcsn=''";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}

/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){

	//新增資料
	case "insert_tad_faq_cate":
	insert_tad_faq_cate();
	header("location: {$_SERVER['PHP_SELF']}");
	break;
	
	//輸入表格
	case "tad_faq_cate_form";
	$main=tad_faq_cate_form($_GET['fcsn']);
	break;

	//刪除資料
	case "delete_tad_faq_cate";
	delete_tad_faq_cate($_GET['fcsn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//更新資料
	case "update_tad_faq_cate";
	update_tad_faq_cate($_POST['fcsn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//預設動作
	default:
	$main=div_3d(_MA_TADFAQ_CATE_INPUT_FORM,list_tad_faq_cate(1),"corners","display:inline;float:left;").tad_faq_cate_form($_GET['fcsn']);
	
	break;

}

/*-----------秀出結果區--------------*/
xoops_cp_header();
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
loadModuleAdminMenu(2);
echo $main;
xoops_cp_footer();

?>
