<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include "../../../include/cp_header.php";
include "../function.php";

/*-----------function區--------------*/
//ck2_link編輯表單
function ck2_link_form($link_sn=""){
	global $xoopsDB,$xoopsUser;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
	//include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");

	//抓取預設值
	if(!empty($link_sn)){
		$DBV=get_ck2_link($link_sn);
	}else{
		$DBV=array();
	}

	//預設值設定


	//設定「link_sn」欄位預設值
	$link_sn=(!isset($DBV['link_sn']))?"":$DBV['link_sn'];

	//設定「cate_sn」欄位預設值
	$cate_sn=(!isset($DBV['cate_sn']))?"":$DBV['cate_sn'];

	//設定「link_title」欄位預設值
	$link_title=(!isset($DBV['link_title']))?"":$DBV['link_title'];

	//設定「link_url」欄位預設值
	$link_url=(!isset($DBV['link_url']))?"":$DBV['link_url'];

	//設定「link_desc」欄位預設值
	$link_desc=(!isset($DBV['link_desc']))?"":$DBV['link_desc'];

	//設定「link_sort」欄位預設值
	$link_sort=(!isset($DBV['link_sort']))?ck2_link_max_sort():$DBV['link_sort'];

	//設定「link_counter」欄位預設值
	$link_counter=(!isset($DBV['link_counter']))?"":$DBV['link_counter'];

	//設定「unable_date」欄位預設值
	$unable_date=(!isset($DBV['unable_date']))?"":$DBV['unable_date'];

	//設定「uid」欄位預設值
	$user_uid=($xoopsUser)?"$xoopsUser->getVar('uid')":"";
	$uid=(!isset($DBV['uid']))?$user_uid:$DBV['uid'];

	//設定「post_date」欄位預設值
	$post_date=(!isset($DBV['post_date']))?date("Y-m-d H:i:s"):$DBV['post_date'];

	//設定「enable」欄位預設值
	$enable=(!isset($DBV['enable']))?"":$DBV['enable'];

	$op=(empty($link_sn))?"insert_ck2_link":"update_ck2_link";
	//$op="replace_ck2_link";

	$main="
	<link type='text/css' rel='stylesheet' href='".XOOPS_URL."/modules/ck2_link/class/formValidator/style/validator.css'>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/jquery_last.js' type='text/javascript'></script>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/formValidator.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/formValidatorRegex.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/DateTimeMask.js' language='javascript' type='text/javascript'></script>
	<script type='text/javascript'>
	$(document).ready(function(){
	$.formValidator.initConfig({formid:'myForm',onerror:function(msg){alert(msg)}});



	//「網站名稱」欄位檢查
	$('#link_title').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_CK2LINK_LINK_TITLE)."',
		onfocus:'".sprintf(_MD_INPUT_VALIDATOR_CHK,'1','255')."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		max:255,
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_CK2LINK_LINK_TITLE)."'
	});

	//「網站網址」欄位檢查
	$('#link_url').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_CK2LINK_LINK_URL)."',
		onfocus:'".sprintf(_MD_INPUT_VALIDATOR_CHK,'1','255')."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		max:255,
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_CK2LINK_LINK_URL)."'
	});

	//「下架日」欄位檢查
	$('#unable_date').focus(function(){
		WdatePicker({
			skin:'whyGreen',
			oncleared:function(){\$(this).blur();},
			onpicked:function(){\$(this).blur();}
		})
	});
	});
	</script>
	<script defer='defer' src='".XOOPS_URL."/modules/ck2_link/class/formValidator/datepicker/WdatePicker.js' type='text/javascript'></script>

	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
	<table class='form_tbl'>


	<!--連結編號-->
	<input type='hidden' name='link_sn' value='{$link_sn}'>

	<!--分類-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_CATE_SN."</td>
	<td class='col'><select name='cate_sn' size=1>
		<option value='' ".chk($cate_sn,'','1','selected')."></option>
		".get_ck2_link_cate_options('menu',$cate_sn)."
	</select></td><td class='col'><div id='cate_snTip'></div></td></tr>

	<!--網站名稱-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_TITLE."</td>
	<td class='col'><input type='text' name='link_title' size='40' value='{$link_title}' id='link_title'></td><td class='col'><div id='link_titleTip'></div></td></tr>

	<!--網站網址-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_URL."</td>
	<td class='col'><input type='text' name='link_url' size='40' value='{$link_url}' id='link_url'></td><td class='col'><div id='link_urlTip'></div></td></tr>";


  include_once XOOPS_ROOT_PATH."/modules/tadtools/fck.php";
  $fck=new FCKEditor264("ck2_link","link_desc",$link_desc);
  $fck->setHeight(400);
  $link_desc_editor=$fck->render();

	$main.="
	<!--網站說明-->
<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_DESC."</td>
	<td class='col' colspan='2'>$link_desc_editor<div id='link_descTip'></div></td></tr>

	<!--排序-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_SORT."</td>
	<td class='col'><input type='text' name='link_sort' size='3' value='{$link_sort}' id='link_sort'></td><td class='col'><div id='link_sortTip'></div></td></tr>

	<!--下架日-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_UNABLE_DATE."</td>
	<td class='col'><input type='text' name='unable_date' size='10' value='{$unable_date}' id='unable_date'></td><td class='col'><div id='unable_dateTip'></div></td></tr>

	<!--是否顯示-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_ENABLE."</td>
	<td class='col'>
	<input type='radio' name='enable' id='enable' value='1' ".chk($enable,'1','1').">"._MA_CK2LINK_ENABLE_1."
	<input type='radio' name='enable' id='enable' value='0' ".chk($enable,'0').">"._MA_CK2LINK_ENABLE_0."
	</td><td class='col'><div id='enableTip'></div></td></tr>
	<tr><td class='bar' colspan='3'>
	<input type='hidden' name='op' value='{$op}'>
	<input type='submit' value='"._MA_SAVE."'></td></tr>
	</table>
	</form>";

	//raised,corners,inset
	$main=div_3d(_MA_INPUT_FORM,$main,"raised");

	return $main;
}


//自動取得ck2_link的最新排序
function ck2_link_max_sort(){
	global $xoopsDB;
	$sql = "select max(`link_sort`) from ".$xoopsDB->prefix("ck2_link");
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}

//新增資料到ck2_link中
function insert_ck2_link(){
	global $xoopsDB,$xoopsUser;

	//取得使用者編號
	$uid=($xoopsUser)?$xoopsUser->getVar('uid'):"";

	$sql = "insert into ".$xoopsDB->prefix("ck2_link")."
	(`cate_sn` , `link_title` , `link_url` , `link_desc` , `link_sort` , `link_counter` , `unable_date` , `uid` , `post_date` , `enable`)
	values('{$_POST['cate_sn']}' , '{$_POST['link_title']}' , '{$_POST['link_url']}' , '{$_POST['link_desc']}' , '{$_POST['link_sort']}' , '{$_POST['link_counter']}' , '{$_POST['unable_date']}' , '{$uid}' , now() , '{$_POST['enable']}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	//取得最後新增資料的流水編號
	$link_sn=$xoopsDB->getInsertId();
	return $link_sn;
}

//列出所有ck2_link資料
function list_ck2_link($show_function=1){
	global $xoopsDB,$xoopsModule;

	//取得ck2_link_cate資料陣列（$cate[$cate_sn]['cate_title']）
	$cate=get_ck2_link_cate_all();
	
	$MDIR=$xoopsModule->getVar('dirname');
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")."";


	//getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
  $PageBar=getPageBar($sql,20,10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];
  $total=$PageBar['total'];

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	$function_title=($show_function)?"<th>"._BP_FUNCTION."</th>":"";

	//刪除確認的JS
	$data="
	<script>
	function delete_ck2_link_func(link_sn){
		var sure = window.confirm('"._BP_DEL_CHK."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=delete_ck2_link&link_sn=\" + link_sn;
	}
	</script>

	<table summary='list_table' id='tbl' style='width:100%;'>
	<tr>
	<th>"._MA_CK2LINK_CATE_SN."</th>
	<th>"._MA_CK2LINK_LINK_TITLE."</th>
	<th>"._MA_CK2LINK_LINK_URL."</th>
	<th>"._MA_CK2LINK_LINK_SORT."</th>
	<th>"._MA_CK2LINK_LINK_COUNTER."</th>
	<th>"._MA_CK2LINK_UNABLE_DATE."</th>
	<th>"._MA_CK2LINK_ENABLE."</th>
	$function_title</tr>
	<tbody>";

	while($all=$xoopsDB->fetchArray($result)){
	  //以下會產生這些變數： $link_sn , $cate_sn , $link_title , $link_url , $link_desc , $link_sort , $link_counter , $unable_date , $uid , $post_date , $enable
    foreach($all as $k=>$v){
      $$k=$v;
    }

		$fun=($show_function)?"
		<td>
		<a href='{$_SERVER['PHP_SELF']}?op=ck2_link_form&link_sn=$link_sn'><img src='".XOOPS_URL."/modules/{$MDIR}/images/edit.gif' alt='"._BP_EDIT."'></a>
		<a href=\"javascript:delete_ck2_link_func($link_sn);\"><img src='".XOOPS_URL."/modules/{$MDIR}/images/del.gif' alt='"._BP_DEL."'></a>
		</td>":"";

		$data.="<tr>
		<td>{$cate[$cate_sn]['cate_title']}</td>
		<td>{$link_title}</td>
		<td>{$link_url}</td>
		<td>{$link_sort}</td>
		<td>{$link_counter}</td>
		<td>{$unable_date}</td>
		<td>{$enable}</td>
		$fun
		</tr>";
	}

	$data.="
	<tr>
	<td colspan=12 class='bar'>
	<a href='{$_SERVER['PHP_SELF']}?op=ck2_link_form'><img src='".XOOPS_URL."/modules/{$MDIR}/images/add.gif' alt='"._BP_ADD."' align='right'></a>
	{$bar}</td></tr>
	</tbody>
	</table>";

	//raised,corners,inset
	$main=div_3d("",$data,"corners");

	return $main;
}


//以流水號取得某筆ck2_link資料
function get_ck2_link($link_sn=""){
	global $xoopsDB;
	if(empty($link_sn))return;
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")." where link_sn='$link_sn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//更新ck2_link某一筆資料
function update_ck2_link($link_sn=""){
	global $xoopsDB,$xoopsUser;

	//取得使用者編號
	$uid=($xoopsUser)?$xoopsUser->getVar('uid'):"";

	$sql = "update ".$xoopsDB->prefix("ck2_link")." set
	 `cate_sn` = '{$_POST['cate_sn']}' ,
	 `link_title` = '{$_POST['link_title']}' ,
	 `link_url` = '{$_POST['link_url']}' ,
	 `link_desc` = '{$_POST['link_desc']}' ,
	 `link_sort` = '{$_POST['link_sort']}' ,
	 `link_counter` = '{$_POST['link_counter']}' ,
	 `unable_date` = '{$_POST['unable_date']}' ,
	 `uid` = '{$uid}' ,
	 `post_date` = now() ,
	 `enable` = '{$_POST['enable']}'
	where link_sn='$link_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $link_sn;
}

//刪除ck2_link某筆資料資料
function delete_ck2_link($link_sn=""){
	global $xoopsDB;
	$sql = "delete from ".$xoopsDB->prefix("ck2_link")." where link_sn='$link_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}

//以流水號秀出某筆ck2_link資料內容
function show_one_ck2_link($link_sn=""){
	global $xoopsDB,$xoopsModule;
	if(empty($link_sn)){
		return;
	}else{
		$link_sn=intval($link_sn);
	}
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")." where link_sn='{$link_sn}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$all=$xoopsDB->fetchArray($result);

	//以下會產生這些變數： $link_sn , $cate_sn , $link_title , $link_url , $link_desc , $link_sort , $link_counter , $unable_date , $uid , $post_date , $enable
	foreach($all as $k=>$v){
		$$k=$v;
	}

	$data="
	<table summary='list_table' id='tbl'>
	<tr><th>"._MA_CK2LINK_LINK_SN."</th><td>{$link_sn}</td></tr>
	<tr><th>"._MA_CK2LINK_CATE_SN."</th><td>{$cate_sn}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_TITLE."</th><td>{$link_title}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_URL."</th><td>{$link_url}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_DESC."</th><td>{$link_desc}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_SORT."</th><td>{$link_sort}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_COUNTER."</th><td>{$link_counter}</td></tr>
	<tr><th>"._MA_CK2LINK_UNABLE_DATE."</th><td>{$unable_date}</td></tr>
	<tr><th>"._MA_CK2LINK_UID."</th><td>{$uid}</td></tr>
	<tr><th>"._MA_CK2LINK_POST_DATE."</th><td>{$post_date}</td></tr>
	<tr><th>"._MA_CK2LINK_ENABLE."</th><td>{$enable}</td></tr>
	</table>";

	//raised,corners,inset
	$main=div_3d("",$data,"corners");

	return $main;
}




/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];

switch($op){
	/*---判斷動作請貼在下方---*/

	//更新資料
	case "update_ck2_link":
	update_ck2_link($_POST['link_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//新增資料
	case "insert_ck2_link":
	insert_ck2_link();
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//輸入表格
	case "ck2_link_form":
	$main=ck2_link_form($_GET['link_sn']);
	break;

	//刪除資料
	case "delete_ck2_link":
	delete_ck2_link($_GET['link_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//預設動作
	default:
	if(empty($_GET['link_sn'])){
		$main=list_ck2_link();
		//$main.=ck2_link_form($_GET['link_sn']);
	}else{
		$main=show_one_ck2_link($_GET['link_sn']);
	}
	break;


	/*---判斷動作請貼在上方---*/
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
admin_toolbar(0);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();
?>
