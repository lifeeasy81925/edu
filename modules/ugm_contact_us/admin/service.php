<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作
// 製作日期：2009-02-28
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include "../../../include/cp_header.php";
include "../function.php";

/*-----------function區--------------*/
//
//ugm_cu_service編輯表單
function ugm_cu_service_form($service_sn=""){
	global $xoopsDB;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
	//include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");

	//抓取預設值
	if(!empty($service_sn)){
		$DBV=get_ugm_cu_service($service_sn);
	}else{
		$DBV=array();
	}

	//預設值設定
	
	$service_sn=(!isset($DBV['service_sn']))?"":$DBV['service_sn'];
	$service_name=(!isset($DBV['service_name']))?"":$DBV['service_name'];

	$op=(empty($service_sn))?"insert_ugm_cu_service":"update_ugm_cu_service";
	//$op="replace_ugm_cu_service";
	
	$main="
	<link type='text/css' rel='stylesheet' href='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/style/validator.css'>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/jquery_last.js' type='text/javascript'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidator.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidatorRegex.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/DateTimeMask.js' language='javascript' type='text/javascript'></script>
	<script type='text/javascript'>
	$(document).ready(function(){
	$.formValidator.initConfig({formid:'myForm',onerror:function(msg){alert(msg)}});
	
  

	//「服務項目」欄位檢查
	$('#service_name').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_UGMCONTACUS_SERVICE_NAME)."',
		onfocus:'".sprintf(_MD_INPUT_VALIDATOR_MIN,'1')."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_UGMCONTACUS_SERVICE_NAME)."'
	});
	});
	</script>
	<script defer='defer' src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/datepicker/WdatePicker.js' type='text/javascript'></script>
	
	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
	<table class='form_tbl'>
  

	<!--服務項目-->
	<tr><td class='title' nowrap>"._MA_UGMCONTACUS_SERVICE_NAME."</td>
	<td class='col'><input type='text' name='service_name' size='20' value='{$service_name}' id='service_name'></td><td class='col'><div id='service_nameTip'></div></td></tr>
	<tr><td class='bar' colspan='3'>
	<input type='hidden' name='op' value='{$op}'>
	<input type='hidden' name='service_sn' value='{$service_sn}'>
	<input type='submit' value='"._MA_SAVE."'></td></tr>
	</table>
	</form>";

	//raised,corners,inset
	$main=div_3d(_MA_INPUT_FORM,$main,"raised");
  
	return $main;
}

//新增資料到ugm_cu_service中
function insert_ugm_cu_service(){
	global $xoopsDB;
	$sql = "insert into ".$xoopsDB->prefix("ugm_cu_service")." (`service_name`) values('{$_POST['service_name']}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	
	//取得最後新增資料的流水編號
	$service_sn=$xoopsDB->getInsertId();
	return $service_sn;
}

//列出所有ugm_cu_service資料
function list_ugm_cu_service($show_function=1){
	global $xoopsDB,$xoopsModule;
	$MDIR=$xoopsModule->getVar('dirname');
	$sql = "select * from ".$xoopsDB->prefix("ugm_cu_service")."";

	//PageBar(資料數, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$total=$xoopsDB->getRowsNum($result);

	$navbar = new PageBar($total, 20, 10);
	$mybar = $navbar->makeBar();
	$bar= sprintf(_BP_TOOLBAR,$mybar['total'],$mybar['current'])."{$mybar['left']}{$mybar['center']}{$mybar['right']}";
	$sql.=$mybar['sql'];

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	
	$function_title=($show_function)?"<th>"._BP_FUNCTION."</th>":"";
	
	//刪除確認的JS
	$data="
	<script>
	function delete_ugm_cu_service_func(service_sn){
		var sure = window.confirm('"._BP_DEL_CHK."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=delete_ugm_cu_service&service_sn=\" + service_sn;
	}
	</script>
	
	<table summary='list_table' id='tbl' style='width:100%;'>
	<tr>
	<th>"._MA_UGMCONTACUS_SERVICE_SN."</th>
	<th>"._MA_UGMCONTACUS_SERVICE_NAME."</th>
	$function_title</tr>
	<tbody>";
	
	while($all=$xoopsDB->fetchArray($result)){
	  //以下會產生這些變數： $service_sn,$service_name
    foreach($all as $k=>$v){
      $$k=$v;
    }
    
		$fun=($show_function)?"
		<td>
		<a href='{$_SERVER['PHP_SELF']}?op=ugm_cu_service_form&service_sn=$service_sn'><img src='".XOOPS_URL."/modules/{$MDIR}/images/edit.gif' alt='"._BP_EDIT."'></a>
		<a href=\"javascript:delete_ugm_cu_service_func($service_sn);\"><img src='".XOOPS_URL."/modules/{$MDIR}/images/del.gif' alt='"._BP_DEL."'></a>
		</td>":"";
		
		$data.="<tr>
		<td>{$service_sn}</td>
		<td>{$service_name}</td>
		$fun
		</tr>";
	}
	
	$data.="
	<tr>
	<td colspan=3 class='bar'>
	<a href='{$_SERVER['PHP_SELF']}?op=ugm_cu_service_form'><img src='".XOOPS_URL."/modules/{$MDIR}/images/add.gif' alt='"._BP_ADD."' align='right'></a>
	{$bar}</td></tr>
	</tbody>
	</table>";
	
	//raised,corners,inset
	$main=div_3d("",$data,"corners");
	
	return $main;
}


//以流水號取得某筆ugm_cu_service資料
function get_ugm_cu_service($service_sn=""){
	global $xoopsDB;
	if(empty($service_sn))return;
	$sql = "select * from ".$xoopsDB->prefix("ugm_cu_service")." where service_sn='$service_sn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//更新ugm_cu_service某一筆資料
function update_ugm_cu_service($service_sn=""){
	global $xoopsDB;
	$sql = "update ".$xoopsDB->prefix("ugm_cu_service")." set  `service_name` = '{$_POST['service_name']}' where service_sn='$service_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $service_sn;
}

//刪除ugm_cu_service某筆資料資料
function delete_ugm_cu_service($service_sn=""){
	global $xoopsDB;
	$sql = "delete from ".$xoopsDB->prefix("ugm_cu_service")." where service_sn='$service_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}

//以流水號秀出某筆ugm_cu_service資料內容
function show_one_ugm_cu_service($service_sn=""){
	global $xoopsDB,$xoopsModule;
	if(empty($service_sn)){
		return;
	}else{
		$service_sn=intval($service_sn);
	}
	$sql = "select * from ".$xoopsDB->prefix("ugm_cu_service")." where service_sn='{$service_sn}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$all=$xoopsDB->fetchArray($result);
	
	//以下會產生這些變數： $service_sn,$service_name
	foreach($all as $k=>$v){
		$$k=$v;
	}
  
	$data="
	<table summary='list_table' id='tbl'>
	<tr><th>"._MA_UGMCONTACUS_SERVICE_SN."</th><td>{$service_sn}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_SERVICE_NAME."</th><td>{$service_name}</td></tr>
	</table>";
	
	//raised,corners,inset
	$main=div_3d("",$data,"corners");
	
	return $main;
}


/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){
	//替換資料
	case "replace_ugm_cu_service":
	replace_ugm_cu_service();
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//新增資料
	case "insert_ugm_cu_service":
	insert_ugm_cu_service();
	header("location: {$_SERVER['PHP_SELF']}");
	break;
	//輸入表格
	case "ugm_cu_service_form":
	$main=ugm_cu_service_form($_GET['service_sn']);
	break;
	
	//刪除資料
	case "delete_ugm_cu_service":
	delete_ugm_cu_service($_GET['service_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;
	
	//更新資料
	case "update_ugm_cu_service":
	update_ugm_cu_service($_POST['service_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;
  
  //預設動作
	default:
	if(empty($_GET['service_sn'])){
		$main=list_ugm_cu_service();
		//$main.=ugm_cu_service_form($_GET['service_sn']);
	}else{
		//$main=show_one_ugm_cu_service($_GET['service_sn']);
		$main=ugm_cu_service_form($_GET['service_sn']);
	}
	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo menu_interface();
echo $main;
xoops_cp_footer();

?>
