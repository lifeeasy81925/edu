<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------�ޤJ�ɮװ�--------------*/
include "../../../include/cp_header.php";
include "../function.php";

/*-----------function��--------------*/
//ck2_link�s����
function ck2_link_form($link_sn=""){
	global $xoopsDB,$xoopsUser;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
	//include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");

	//����w�]��
	if(!empty($link_sn)){
		$DBV=get_ck2_link($link_sn);
	}else{
		$DBV=array();
	}

	//�w�]�ȳ]�w


	//�]�w�ulink_sn�v���w�]��
	$link_sn=(!isset($DBV['link_sn']))?"":$DBV['link_sn'];

	//�]�w�ucate_sn�v���w�]��
	$cate_sn=(!isset($DBV['cate_sn']))?"":$DBV['cate_sn'];

	//�]�w�ulink_title�v���w�]��
	$link_title=(!isset($DBV['link_title']))?"":$DBV['link_title'];

	//�]�w�ulink_url�v���w�]��
	$link_url=(!isset($DBV['link_url']))?"":$DBV['link_url'];

	//�]�w�ulink_desc�v���w�]��
	$link_desc=(!isset($DBV['link_desc']))?"":$DBV['link_desc'];

	//�]�w�ulink_sort�v���w�]��
	$link_sort=(!isset($DBV['link_sort']))?ck2_link_max_sort():$DBV['link_sort'];

	//�]�w�ulink_counter�v���w�]��
	$link_counter=(!isset($DBV['link_counter']))?"":$DBV['link_counter'];

	//�]�w�uunable_date�v���w�]��
	$unable_date=(!isset($DBV['unable_date']))?"":$DBV['unable_date'];

	//�]�w�uuid�v���w�]��
	$user_uid=($xoopsUser)?"$xoopsUser->getVar('uid')":"";
	$uid=(!isset($DBV['uid']))?$user_uid:$DBV['uid'];

	//�]�w�upost_date�v���w�]��
	$post_date=(!isset($DBV['post_date']))?date("Y-m-d H:i:s"):$DBV['post_date'];

	//�]�w�uenable�v���w�]��
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



	//�u�����W�١v����ˬd
	$('#link_title').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_CK2LINK_LINK_TITLE)."',
		onfocus:'".sprintf(_MD_INPUT_VALIDATOR_CHK,'1','255')."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		max:255,
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_CK2LINK_LINK_TITLE)."'
	});

	//�u�������}�v����ˬd
	$('#link_url').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_CK2LINK_LINK_URL)."',
		onfocus:'".sprintf(_MD_INPUT_VALIDATOR_CHK,'1','255')."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		max:255,
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_CK2LINK_LINK_URL)."'
	});

	//�u�U�[��v����ˬd
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


	<!--�s���s��-->
	<input type='hidden' name='link_sn' value='{$link_sn}'>

	<!--����-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_CATE_SN."</td>
	<td class='col'><select name='cate_sn' size=1>
		<option value='' ".chk($cate_sn,'','1','selected')."></option>
		".get_ck2_link_cate_options('menu',$cate_sn)."
	</select></td><td class='col'><div id='cate_snTip'></div></td></tr>

	<!--�����W��-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_TITLE."</td>
	<td class='col'><input type='text' name='link_title' size='40' value='{$link_title}' id='link_title'></td><td class='col'><div id='link_titleTip'></div></td></tr>

	<!--�������}-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_URL."</td>
	<td class='col'><input type='text' name='link_url' size='40' value='{$link_url}' id='link_url'></td><td class='col'><div id='link_urlTip'></div></td></tr>";


  include_once XOOPS_ROOT_PATH."/modules/tadtools/fck.php";
  $fck=new FCKEditor264("ck2_link","link_desc",$link_desc);
  $fck->setHeight(400);
  $link_desc_editor=$fck->render();

	$main.="
	<!--��������-->
<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_DESC."</td>
	<td class='col' colspan='2'>$link_desc_editor<div id='link_descTip'></div></td></tr>

	<!--�Ƨ�-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_LINK_SORT."</td>
	<td class='col'><input type='text' name='link_sort' size='3' value='{$link_sort}' id='link_sort'></td><td class='col'><div id='link_sortTip'></div></td></tr>

	<!--�U�[��-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_UNABLE_DATE."</td>
	<td class='col'><input type='text' name='unable_date' size='10' value='{$unable_date}' id='unable_date'></td><td class='col'><div id='unable_dateTip'></div></td></tr>

	<!--�O�_���-->
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


//�۰ʨ��ock2_link���̷s�Ƨ�
function ck2_link_max_sort(){
	global $xoopsDB;
	$sql = "select max(`link_sort`) from ".$xoopsDB->prefix("ck2_link");
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}

//�s�W��ƨ�ck2_link��
function insert_ck2_link(){
	global $xoopsDB,$xoopsUser;

	//���o�ϥΪ̽s��
	$uid=($xoopsUser)?$xoopsUser->getVar('uid'):"";

	$sql = "insert into ".$xoopsDB->prefix("ck2_link")."
	(`cate_sn` , `link_title` , `link_url` , `link_desc` , `link_sort` , `link_counter` , `unable_date` , `uid` , `post_date` , `enable`)
	values('{$_POST['cate_sn']}' , '{$_POST['link_title']}' , '{$_POST['link_url']}' , '{$_POST['link_desc']}' , '{$_POST['link_sort']}' , '{$_POST['link_counter']}' , '{$_POST['unable_date']}' , '{$uid}' , now() , '{$_POST['enable']}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	//���o�̫�s�W��ƪ��y���s��
	$link_sn=$xoopsDB->getInsertId();
	return $link_sn;
}

//�C�X�Ҧ�ck2_link���
function list_ck2_link($show_function=1){
	global $xoopsDB,$xoopsModule;

	//���ock2_link_cate��ư}�C�]$cate[$cate_sn]['cate_title']�^
	$cate=get_ck2_link_cate_all();
	
	$MDIR=$xoopsModule->getVar('dirname');
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")."";


	//getPageBar($��sql�y�k, �C����ܴX�����, �̦h��ܴX�ӭ��ƿﶵ);
  $PageBar=getPageBar($sql,20,10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];
  $total=$PageBar['total'];

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	$function_title=($show_function)?"<th>"._BP_FUNCTION."</th>":"";

	//�R���T�{��JS
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
	  //�H�U�|���ͳo���ܼơG $link_sn , $cate_sn , $link_title , $link_url , $link_desc , $link_sort , $link_counter , $unable_date , $uid , $post_date , $enable
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


//�H�y�������o�Y��ck2_link���
function get_ck2_link($link_sn=""){
	global $xoopsDB;
	if(empty($link_sn))return;
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")." where link_sn='$link_sn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//��sck2_link�Y�@�����
function update_ck2_link($link_sn=""){
	global $xoopsDB,$xoopsUser;

	//���o�ϥΪ̽s��
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

//�R��ck2_link�Y����Ƹ��
function delete_ck2_link($link_sn=""){
	global $xoopsDB;
	$sql = "delete from ".$xoopsDB->prefix("ck2_link")." where link_sn='$link_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}

//�H�y�����q�X�Y��ck2_link��Ƥ��e
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

	//�H�U�|���ͳo���ܼơG $link_sn , $cate_sn , $link_title , $link_url , $link_desc , $link_sort , $link_counter , $unable_date , $uid , $post_date , $enable
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




/*-----------����ʧ@�P�_��----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];

switch($op){
	/*---�P�_�ʧ@�жK�b�U��---*/

	//��s���
	case "update_ck2_link":
	update_ck2_link($_POST['link_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//�s�W���
	case "insert_ck2_link":
	insert_ck2_link();
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//��J���
	case "ck2_link_form":
	$main=ck2_link_form($_GET['link_sn']);
	break;

	//�R�����
	case "delete_ck2_link":
	delete_ck2_link($_GET['link_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//�w�]�ʧ@
	default:
	if(empty($_GET['link_sn'])){
		$main=list_ck2_link();
		//$main.=ck2_link_form($_GET['link_sn']);
	}else{
		$main=show_one_ck2_link($_GET['link_sn']);
	}
	break;


	/*---�P�_�ʧ@�жK�b�W��---*/
}

/*-----------�q�X���G��--------------*/
xoops_cp_header();
admin_toolbar(0);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();
?>
