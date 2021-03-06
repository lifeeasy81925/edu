<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作(www.ugm.com.tw)(tawan158@gmail.com)
// 製作日期：2009-02-28
// 修改日期：1.2->2009-08-21
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------引入檔案區----------------------------------------------------- */
include "header.php";
//============================================================================
/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){
	//新增資料
	case "insert_ugm_contact_us":
	$main=insert_ugm_contact_us();
	redirect_header(XOOPS_URL."/modules/ugm_contact_us/{$_SERVER['PHP_SELF']}", 1, _MA_SEND_MESSAGE);
	//header("location: {$_SERVER['PHP_SELF']}");
	break;
	//預設動作
	default:
	$main=ugm_contact_us_form();
	break;

}	

/*-----------     秀出結果區         --------------*/


echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='zh-tw' xml:lang='zh-tw'>
<head>
 <meta http-equiv='content-type' content='text/html; charset=UTF-8' />
</head>
<body>
<div style='width:700px'>
{$main}
</div>
</body>
</html>

";


/*-----------     function區                                    --------------*/
//ugm_contact_us編輯表單
function ugm_contact_us_form(){
	global $xoopsDB,$xoopsModuleConfig;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
	$DBV=array();

	//預設值設定
	
	$cu_sn="";
	$cu_condition="";
	$cu_name="";
	$cu_mail="";
	$cu_tel="";
	$cu_mobile="";
	$cu_time="";
	$cu_service="";
	$cu_content="";
	$cu_completion_date="";
	$op="insert_ugm_contact_us";
  $ugm_contact_us_info=nl2br($xoopsModuleConfig['ugm_contact_us_info']);
	$ugm_contact_us_info=(empty($xoopsModuleConfig['ugm_contact_us_info']))?"":
  "<tr><th scope='row' colspan='3'>{$ugm_contact_us_info}</th></tr>";
  $ugm_contact_us_css=(!empty($xoopsModuleConfig['ugm_contact_us_css']))?$xoopsModuleConfig['ugm_contact_us_css']:"#ugm_contact_us_table th{padding: 5px;font-size: 12px;text-align: center;background: #CCCCFF none;color: Black;}
#ugm_contact_us_table td{background-color: #eee;}
#ugm_contact_us_table span{color: Red;}
#ugm_contact_us_table th,#book_detail td{border:1px solid #b8b8b8;border-top:0px;border-left:0px}
#ugm_contact_us_table textarea{width:100%;}
#ugm_contact_us_table table{width:100%}
";
  //-------google
  $ugm_contact_us_jquery="<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/jquery_last.js' type='text/javascript'></script>";
  
	$main="
	<style>
  <!--
  {$ugm_contact_us_css}
	-->
  </style>
	<script type='text/javascript'>
  function focusColor(i){
  	i.style.borderColor='#7F9DB9';
  	i.style.backgroundColor='#FFFFFF';
  }
  function blurColor(i){
  	i.style.borderColor='#CCCCCC';
  	i.style.backgroundColor='#F3F3F3';
  }
  </script>
	<link type='text/css' rel='stylesheet' href='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/style/validator.css'>
	{$ugm_contact_us_jquery}
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidator.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/formValidatorRegex.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/DateTimeMask.js' language='javascript' type='text/javascript'></script>
	<script type='text/javascript'>
	$(document).ready(function(){
	$.formValidator.initConfig({formid:'ugm_contact_us_table',onerror:function(msg){alert(msg)}});

	$('#cu_name').formValidator({
		onshow:'"._MD_INPUT_VALIDATOR_MUST."',
		onfocus:'"._MD_INPUT_VALIDATOR_NEED."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		onerror:'"._MD_INPUT_VALIDATOR_NEED."'
	});

	$('#cu_mail').formValidator({
		onshow:'"._MD_INPUT_VALIDATOR_MUST."',
		onfocus:'"._MD_INPUT_VALIDATOR_NEED."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		onerror:'"._MD_INPUT_VALIDATOR_NEED."'
	});

	$('#cu_tel').formValidator({
		onshow:'"._MD_INPUT_VALIDATOR_MUST."',
		onfocus:'"._MD_INPUT_VALIDATOR_NEED."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		onerror:'"._MD_INPUT_VALIDATOR_NEED."'
	});

	$('#cu_completion_date').focus(function(){
		WdatePicker({
			skin:'whyGreen',
			oncleared:function(){\$(this).blur();},
			onpicked:function(){\$(this).blur();}
		})
	}).formValidator({
		onshow:'"._MD_INPUT_VALIDATOR_MUST."',
		onfocus:'"._MD_INPUT_VALIDATOR_NEED."',
		oncorrect:'OK!'
	}).inputValidator({
		min:'0000-00-00',
		type:'value',
		onerror:'"._MD_INPUT_VALIDATOR_NEED."'
	});
	});
	</script>
	<script defer='defer' src='".XOOPS_URL."/modules/ugm_contact_us/class/formValidator/datepicker/WdatePicker.js' type='text/javascript'></script>
	<form action='{$_SERVER['PHP_SELF']}' method='post' id='ugm_contact_us_table' enctype='multipart/form-data'>
	<table summary="._MD_UGMCONTACUS_SUMMARY." border='0' cellpadding='3' cellspacing='3'>
	<input type='hidden' name='cu_sn' value='{$cu_sn}'>
	{$ugm_contact_us_info}
	<tr>
    <th scope='row' class='must'><label for='name'>"._MA_UGMCONTACUS_CU_NAME."</label></th>
	  <td><input type='text' name='cu_name' size='30' value='{$cu_name}' id='cu_name' class='text1' onfocus='focusColor(this)' onblur='blurColor(this)'></td>
	  <td class='text4'><div id='cu_nameTip'></div></td>
  </tr>
	<tr>
    <th scope='row' class='must'><label for='cu_mail'>"._MA_UGMCONTACUS_CU_MAIL."</label></th>
  	<td><input type='text' name='cu_mail' size='30' value='{$cu_mail}' id='cu_mail' class='text1' onfocus='focusColor(this)' onblur='blurColor(this)'></td>
  	<td class='text4'><div id='cu_mailTip'></div></td>
  </tr>
	<tr>
    <th scope='row' class='must'><label for='cu_tel'>"._MA_UGMCONTACUS_CU_TEL."</label></th>
  	<td><input type='text' name='cu_tel' size='30' value='{$cu_tel}' id='cu_tel' class='text1' onfocus='focusColor(this)' onblur='blurColor(this)'></td>
  	<td class='text4'><div id='cu_telTip'></div></td>
  </tr>
	<tr>
    <th scope='row'> <label for='cu_mobile'>"._MA_UGMCONTACUS_CU_MOBILE."</label></th>
  	<td class='col'><input type='text' name='cu_mobile' size='30' value='{$cu_mobile}' id='cu_mobile' class='text1' onfocus='focusColor(this)' onblur='blurColor(this)'></td>
  	<td class='text4'>&nbsp;</td>
  </tr>
	<tr>
    <th scope='row'> <label for='cu_time'>"._MA_UGMCONTACUS_CU_TIME."</label></th>
  	<td class='col'><input type='text' name='cu_time' size='30' value='{$cu_time}' id='cu_time' class='text1' onfocus='focusColor(this)' onblur='blurColor(this)'></td>
  	<td class='text4'>&nbsp;</td>
  </tr>";
	$cu_service_arr=get_ugm_cu_service();
	$main.="
  <tr>
    <th scope='row'><label for='cu_service'>"._MA_UGMCONTACUS_CU_SERVICE."</label></th>
  	<td>{$cu_service_arr}</td>
  	<td class='text4'>&nbsp;</td>
  </tr>
	<tr>
    <th scope='row'> <label for='cu_content'>"._MA_UGMCONTACUS_CU_CONTENT."</label></th>
  	<td ><textarea name='cu_content' cols='50' rows=8 id='cu_content' class='text1' onfocus='focusColor(this)' onblur='blurColor(this)'>{$cu_content}</textarea></td>
  	<td class='text4'>&nbsp;</td>
  </tr>
	<tr>
    <th scope='row' class='must'> <label for='cu_completion_date'>"._MA_UGMCONTACUS_CU_COMPLETION_DATE."</label></th>
  	<td class='col'><input type='text' name='cu_completion_date' size='20' value='{$cu_completion_date}' id='cu_completion_date' class='text1' onfocus='focusColor(this)' onblur='blurColor(this)'></td>
  	<td class='text4'><div id='cu_completion_dateTip'></div></td>
  </tr>
  <tr><th scope='row' colspan='3'><input type='submit' name='submit' value='"._MA_SEND."' /></th></tr>
	<input type='hidden' name='op' value='{$op}'>
	</table>
	</form>
  ";
	return $main;
}

function get_ugm_cu_service(){
	global $xoopsDB;
  $sql = "select `service_name` from ".$xoopsDB->prefix("ugm_cu_service");
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$i=0;
  while($all=$xoopsDB->fetchArray($result)){
	  foreach($all as $k=>$v){
      $$k=$v;
    }
		$option.="<input type='checkbox' name='cu_service[]'  value={$v}  id='cu_service' >{$v} <br />"; 
	}
	return $option;
}
//新增資料到ugm_contact_us中
function insert_ugm_contact_us(){
	global $xoopsDB,$xoopsConfig,$xoopsModuleConfig;
  $cu_service=implode(",",$_POST['cu_service']);
	$sql = "insert into ".$xoopsDB->prefix("ugm_contact_us")." (`cu_condition`,`cu_name`,`cu_mail`,`cu_tel`,`cu_mobile`,`cu_time`,`cu_service`,`cu_content`,`cu_completion_date`,`cu_post_date`) values('{$_POST['cu_condition']}','{$_POST['cu_name']}','{$_POST['cu_mail']}','{$_POST['cu_tel']}','{$_POST['cu_mobile']}','{$_POST['cu_time']}','{$cu_service}','{$_POST['cu_content']}','{$_POST['cu_completion_date']}',now())";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$cu_sn=$xoopsDB->getInsertId();
	//--------------------------------------------------------
	$mailTo = (empty($xoopsModuleConfig['ugm_contact_us_mailTo']))?$xoopsConfig[adminmail]:$xoopsModuleConfig['ugm_contact_us_mailTo']; // 請自行替換有效的收件地址
  $subject = (empty($xoopsModuleConfig['ugm_contact_us_subject']))? "ugm_contact_us_subject":$xoopsModuleConfig['ugm_contact_us_subject'];
  $headers = 'Content-type: text/html; charset="utf-8"' . "\r\n";
  $headers .= "From: {$xoopsConfig[adminmail]}" . "\r\n"; // 請自行替換寄件地址
  $headers .= "CC: tawan158@gmail.com"."\r\n";
  //$headers.= "From: {$_POST['cu_mail']}" . "\r\n"; // 請自行替換寄件地址
  $cu_content=nl2br($_POST['cu_content']);
  $main="
     <table border=1 align='center' cellspacing='0' style='width:600px'>
      <tr><th style='width:150px'>"._MA_UGMCONTACUS_CU_NAME."</th><td >{$_POST['cu_name']}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_MAIL."</th><td>{$_POST['cu_mail']}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_TEL."</th><td>{$_POST['cu_tel']}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_MOBILE."</th><td>{$_POST['cu_mobile']}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_TIME."</th><td>{$_POST['cu_time']}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_SERVICE."</th><td>{$cu_service}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_CONTENT."</th><td>{$cu_content}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_COMPLETION_DATE."</th><td>{$_POST['cu_completion_date']}&nbsp;</td></tr>
      <tr><th>"._MA_UGMCONTACUS_CU_POST_DATE."</th><td>".date("Y-m-d D H:i:s")."&nbsp;</td></tr>
      <tr><th>FROM IP</th><td>{$_SERVER['REMOTE_ADDR']}----cu_sn={$cu_sn}</td></tr>
     </table>
     ";
    mail( $mailTo , $subject, $main, $headers);
	//--------------------------------------------------------
	return $cu_sn;
}


?>
