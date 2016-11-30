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
//ugm_contact_us編輯表單
function ugm_contact_us_form($cu_sn=""){
	global $xoopsDB;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
	//include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");

	//抓取預設值
	if(!empty($cu_sn)){
		$DBV=get_ugm_contact_us($cu_sn);
	}else{
		$DBV=array();
	}

	//預設值設定

	$cu_sn=(!isset($DBV['cu_sn']))?"":$DBV['cu_sn'];
	$cu_condition=(!isset($DBV['cu_condition']))?"":$DBV['cu_condition'];
	$cu_name=(!isset($DBV['cu_name']))?"":$DBV['cu_name'];
	$cu_mail=(!isset($DBV['cu_mail']))?"":$DBV['cu_mail'];
	$cu_tel=(!isset($DBV['cu_tel']))?"":$DBV['cu_tel'];
	$cu_mobile=(!isset($DBV['cu_mobile']))?"":$DBV['cu_mobile'];
	$cu_time=(!isset($DBV['cu_time']))?"":$DBV['cu_time'];
	$cu_service=(!isset($DBV['cu_service']))?"":$DBV['cu_service'];
	$cu_content=(!isset($DBV['cu_content']))?"":$DBV['cu_content'];
	$cu_completion_date=(!isset($DBV['cu_completion_date']))?"":$DBV['cu_completion_date'];
	$cu_post_date=(!isset($DBV['cu_post_date']))?"":$DBV['cu_post_date'];

	$op=(empty($cu_sn))?"insert_ugm_contact_us":"update_ugm_contact_us";
	//$op="replace_ugm_contact_us";

	$main="
	<link type='text/css' rel='stylesheet' href='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/style/validator.css'>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/jquery_last.js' type='text/javascript'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidator.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidatorRegex.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/DateTimeMask.js' language='javascript' type='text/javascript'></script>
	<script type='text/javascript'>
	$(document).ready(function(){
	$.formValidator.initConfig({formid:'myForm',onerror:function(msg){alert(msg)}});



	//「處理狀態」欄位檢查
	$('#cu_condition').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_UGMCONTACUS_CU_CONDITION)."',
		onfocus:'".sprintf(_MD_INPUT_VALIDATOR_CHK,'1','3')."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		max:3,
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_UGMCONTACUS_CU_CONDITION)."'
	});
	});
	</script>
	<script defer='defer' src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/datepicker/WdatePicker.js' type='text/javascript'></script>

	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
	<table class='form_tbl'>


	<!--流水號-->
	<input type='hidden' name='cu_sn' value='{$cu_sn}'>

	<!--處理狀態-->
	<tr><td class='title' nowrap>"._MA_UGMCONTACUS_CU_CONDITION."</td>
	<td class='col'><select name='cu_condition' size=1>
		<option value='0' ".chk($cu_condition,'0','1','selected').">0</option>
		<option value='1' ".chk($cu_condition,'1','1','selected').">1</option>
		<option value='2' ".chk($cu_condition,'2','1','selected').">2</option>
	</select></td><td class='col'><div id='cu_conditionTip'></div></td></tr>

	<!--姓名-->
	<tr><td class='title' nowrap>"._MA_UGMCONTACUS_CU_NAME."</td>
	<td class='col'><input type='text' name='cu_name' size='20' value='{$cu_name}' id='cu_name'></td><td class='col'><div id='cu_nameTip'></div></td></tr>
	<tr><td class='bar' colspan='3'>
	<input type='hidden' name='op' value='{$op}'>
	<input type='submit' value='"._MA_SAVE."'></td></tr>
	</table>
	</form>";

	//raised,corners,inset
	$main=div_3d(_MA_INPUT_FORM,$main,"raised");

	return $main;
}



//列出所有ugm_contact_us資料
function list_ugm_contact_us($show_function=1){
	global $xoopsDB,$xoopsModule;
	$MDIR=$xoopsModule->getVar('dirname');
	$sql = "select * from ".$xoopsDB->prefix("ugm_contact_us")." order by cu_condition ";

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
	function delete_ugm_contact_us_func(cu_sn){
		var sure = window.confirm('"._BP_DEL_CHK."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=delete_ugm_contact_us&cu_sn=\" + cu_sn;
	}
	</script>
  <p>"._MA_UGMCONTACUS_GOOGLE_SITES.XOOPS_URL."/modules/ugm_contact_us/ugm_contact_us.xml</p>
	<p>iframeURL：".XOOPS_URL."/modules/ugm_contact_us/ugm_contact_us.php</p>
	<table summary='list_table' id='tbl' style='width:100%;'>
	<tr>
	<th>"._MA_UGMCONTACUS_CU_CONDITION."</th>
	<th>"._MA_UGMCONTACUS_CU_NAME."</th>
	<th>"._MA_UGMCONTACUS_CU_TIME."</th>
	<th>"._MA_UGMCONTACUS_CU_SERVICE."</th>
	<th>"._MA_UGMCONTACUS_CU_COMPLETION_DATE."</th>
	<th>"._MA_UGMCONTACUS_CU_POST_DATE."</th>
	$function_title</tr>
	<tbody>";

	while($all=$xoopsDB->fetchArray($result)){
	  //以下會產生這些變數： $cu_sn,$cu_condition,$cu_name,$cu_mail,$cu_tel,$cu_mobile,$cu_time,$cu_service,$cu_content,$cu_completion_date,$cu_post_date
    foreach($all as $k=>$v){
      $$k=$v;
    }
    $cu_condition=show_cu_condition($cu_condition);
		$fun=($show_function)?"
		<td>
		<a href='{$_SERVER['PHP_SELF']}?op=show_one_ugm_contact_us&cu_sn=$cu_sn'><img src='".XOOPS_URL."/modules/{$MDIR}/images/manage.gif' alt='"._BP_MANAGE."'></a>
		<a href=\"javascript:delete_ugm_contact_us_func($cu_sn);\"><img src='".XOOPS_URL."/modules/{$MDIR}/images/del.gif' alt='"._BP_DEL."'></a>
		</td>":"";

		$data.="<tr>
		<td>{$cu_condition}</td>
		<td>{$cu_name}</td>
		<td>{$cu_time}</td>
		<td>{$cu_service}</td>
		<td>{$cu_completion_date}</td>
		<td>{$cu_post_date}</td>
		$fun
		</tr>";
	}

	$data.="
	<tr>
	<td colspan=12 class='bar'>
	
	{$bar}</td></tr>
	</tbody>
	</table>";

	//raised,corners,inset
	$main=div_3d("",$data,"corners");

	return $main;
}


function update_ugm_contact_us($cu_sn=""){
	global $xoopsDB;
	
  if($_POST['cu_condition']==_MA_COMPLETE){
	 $cu_condition=2;
	}
	elseif($_POST['cu_condition']==_MA_SEND){
	 $cu_condition=1;
  }else{
    $cu_condition=0;
  }
	
	$sql = "update ".$xoopsDB->prefix("ugm_contact_us")." set  `cu_condition` = $cu_condition where cu_sn='$cu_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return ;
}

//以流水號秀出某筆ugm_contact_us資料內容
function show_one_ugm_contact_us($cu_sn=""){
	global $xoopsDB,$xoopsModule;
	if(empty($cu_sn)){
		return;
	}else{
		$cu_sn=intval($cu_sn);
	}
	//$data=ugm_cu_solution_form();
	
	
	$sql = "select * from ".$xoopsDB->prefix("ugm_contact_us")." where cu_sn='{$cu_sn}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$all=$xoopsDB->fetchArray($result);

	//以下會產生這些變數： $cu_sn,$cu_condition,$cu_name,$cu_mail,$cu_tel,$cu_mobile,$cu_time,$cu_service,$cu_content,$cu_completion_date,$cu_post_date
	foreach($all as $k=>$v){
		$$k=$v;
	}
	//預設值設定

	$cu_condition=show_cu_condition($cu_condition);

	$data.="
	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
	<input type='hidden' name='cu_sn' value='{$cu_sn}'>
	<input type='hidden' name='op' value='insert_ugm_cu_solution'>
	<input type='submit' name='cu_condition' value='"._MA_COMPLETE."'>
	<table summary='list_table' id='tbl'>
	<tr><th>"._MA_UGMCONTACUS_SOLUTION_TITLE."</th><td><input type='text' name='solution_title' size='40'>&nbsp;<input type='submit' name='cu_condition' value='"._MA_SEND."'></td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_CONDITION."</th><td>{$cu_condition}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_NAME."</th><td>{$cu_name}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_MAIL."</th><td>{$cu_mail}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_TEL."</th><td>{$cu_tel}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_MOBILE."</th><td>{$cu_mobile}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_TIME."</th><td>{$cu_time}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_SERVICE."</th><td>{$cu_service}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_CONTENT."</th><td>{$cu_content}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_COMPLETION_DATE."</th><td>{$cu_completion_date}</td></tr>
	<tr><th>"._MA_UGMCONTACUS_CU_POST_DATE."</th><td>{$cu_post_date}</td></tr>";
	//$sql=$result=$all=$k=$v="";
	
	
	$sql = "select * from ".$xoopsDB->prefix("ugm_cu_solution ")." where cu_sn='{$cu_sn}' order by solution_date DESC";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	//$all=$xoopsDB->fetchArray($result);
  $rows = $xoopsDB->getRowsNum($result);
  if(!$rows==""){
    $data.="<tr><th>處理日期</th><th>處理事項</th></tr><br />";
    
    while($all=$xoopsDB->fetchArray($result)){
    	//以下會產生這些變數： $cu_sn,$solution_title,$solution_date
    	foreach($all as $k=>$v){
  		$$k=$v;
  		
  	  }
  	  $data.="<tr><td>{$solution_date}</td><td>{$solution_title}</td></tr><br />";
  		
  	}
	
  }
  $data.="</table></form>";
 
  
	//raised,corners,inset
	//$main=div_3d("",$data,"corners");
  
	return $data;
}
//以流水號取得某筆ugm_contact_us資料
function get_ugm_contact_us($cu_sn=""){
	global $xoopsDB;
	if(empty($cu_sn))return;
	$sql = "select * from ".$xoopsDB->prefix("ugm_contact_us")." where cu_sn='$cu_sn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}
//ugm_cu_solution編輯表單
function ugm_cu_solution_form($cu_sn=""){
	global $xoopsDB;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
	//include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");

	//抓取預設值
	if(!empty($cu_sn
)){
		$DBV=get_ugm_cu_solution($cu_sn
);
	}else{
		$DBV=array();
	}

	//預設值設定
	
	$cu_sn=(!isset($DBV['cu_sn']))?"":$DBV['cu_sn'];
	$solution_title=(!isset($DBV['solution_title']))?"":$DBV['solution_title'];
	$solution_date=(!isset($DBV['solution_date']))?"":$DBV['solution_date'];

	$op=(empty($cu_sn
))?"insert_ugm_cu_solution":"update_ugm_cu_solution";
	//$op="replace_ugm_cu_solution";
	
	$main="
	<link type='text/css' rel='stylesheet' href='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/style/validator.css'>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/jquery_last.js' type='text/javascript'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidator.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidatorRegex.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/DateTimeMask.js' language='javascript' type='text/javascript'></script>
	<script type='text/javascript'>
	$(document).ready(function(){
	$.formValidator.initConfig({formid:'myForm',onerror:function(msg){alert(msg)}});
	
  

	//「處理事項」欄位檢查
	$('#solution_title').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_UGMCONTACUS_SOLUTION_TITLE)."',
		onfocus:'"._MD_INPUT_VALIDATOR_NEED."',
		oncorrect:'OK!'
	}).inputValidator({
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_UGMCONTACUS_SOLUTION_TITLE)."'
	});
	});
	</script>
	<script defer='defer' src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/datepicker/WdatePicker.js' type='text/javascript'></script>
	
	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
	<table class='form_tbl'>
  

	<!--聯絡流水號-->
	<input type='hidden' name='cu_sn' value='{$cu_sn}'>

	<!--處理事項-->
	<tr><td class='title' nowrap>"._MA_UGMCONTACUS_SOLUTION_TITLE."</td>
	<td class='col'><input type='text' name='solution_title' size='20' value='{$solution_title}' id='solution_title'></td><td class='col'><div id='solution_titleTip'></div></td></tr>
	<tr><td class='bar' colspan='3'>
	<input type='hidden' name='op' value='{$op}'>
	<input type='submit' value='"._MA_SAVE."'></td></tr>
	</table>
	</form>";

	//raised,corners,inset
	//$main=div_3d(_MA_INPUT_FORM,$main,"raised");
  
	return $main;
}
//新增資料到ugm_cu_solution中
function insert_ugm_cu_solution(){
	global $xoopsDB;
	$sql = "insert into ".$xoopsDB->prefix("ugm_cu_solution")." (`cu_sn`,`solution_title`,`solution_date`) values('{$_POST['cu_sn']}','{$_POST['solution_title']}',now())";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());	
	return ;
}
//轉換處理狀態
function show_cu_condition($cu_condition=""){
  if($cu_condition==2){
	  $cu_condition=_MA_UGMCONTACUS_CU_CONDITION_2;
	}
	elseif($cu_condition==1){
	  $cu_condition=_MA_UGMCONTACUS_CU_CONDITION_1;
  }else{
    $cu_condition=_MA_UGMCONTACUS_CU_CONDITION_0;
  }
  return $cu_condition;

}

//刪除ugm_contact_us某筆資料資料
function delete_ugm_contact_us($cu_sn=""){
	global $xoopsDB;
	$sql = "delete from ".$xoopsDB->prefix("ugm_contact_us")." where cu_sn='$cu_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$sql = "delete from ".$xoopsDB->prefix("ugm_cu_solution")." where cu_sn='$cu_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

}

/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){
	//更新資料
	case "update_ugm_contact_us":
	update_ugm_contact_us($_POST['cu_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;


	//替換資料
	case "replace_ugm_contact_us":
	replace_ugm_contact_us();
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//新增資料
	case "insert_ugm_contact_us":
	insert_ugm_contact_us();
	header("location: {$_SERVER['PHP_SELF']}");
	break;


	case "ugm_contact_us_form":
	$main=ugm_contact_us_form($_GET['cu_sn']);
	break;

	case "show_one_ugm_contact_us":
	$main=show_one_ugm_contact_us($_GET['cu_sn']);
	break;
	
	//新增資料solution
	case "insert_ugm_cu_solution":
	insert_ugm_cu_solution();
	update_ugm_contact_us($_POST['cu_sn']);
	$main=show_one_ugm_contact_us($_POST['cu_sn']);
	break;

	//刪除資料
	case "delete_ugm_contact_us":
	delete_ugm_contact_us($_GET['cu_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//預設動作
	default:
	if(empty($_GET['cu_sn'])){
		$main=list_ugm_contact_us();
		//$main.=ugm_contact_us_form($_GET['cu_sn']);
	}else{
		$main=show_one_ugm_contact_us($_GET['cu_sn']);
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
