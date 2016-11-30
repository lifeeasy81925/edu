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

//ck2_link_cate�s����
function ck2_link_cate_form($cate_sn=""){
	global $xoopsDB,$xoopsUser;
	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
	//include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");

	//����w�]��
	if(!empty($cate_sn)){
		$DBV=get_ck2_link_cate($cate_sn);
	}else{
		$DBV=array();
	}

	//�w�]�ȳ]�w


	//�]�w�ucate_sn�v���w�]��
	$cate_sn=(!isset($DBV['cate_sn']))?"":$DBV['cate_sn'];

	//�]�w�uof_cate_sn�v���w�]��
	$of_cate_sn=(!isset($DBV['of_cate_sn']))?"":$DBV['of_cate_sn'];

	//�]�w�ucate_title�v���w�]��
	$cate_title=(!isset($DBV['cate_title']))?"":$DBV['cate_title'];

	//�]�w�ucate_sort�v���w�]��
	$cate_sort=(!isset($DBV['cate_sort']))?ck2_link_cate_max_sort():$DBV['cate_sort'];

	$op=(empty($cate_sn))?"insert_ck2_link_cate":"update_ck2_link_cate";
	//$op="replace_ck2_link_cate";

	$main="
	<link type='text/css' rel='stylesheet' href='".XOOPS_URL."/modules/ck2_link/class/formValidator/style/validator.css'>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/jquery_last.js' type='text/javascript'></script>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/formValidator.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/formValidatorRegex.js' type='text/javascript' charset='UTF-8'></script>
	<script src='".XOOPS_URL."/modules/ck2_link/class/formValidator/DateTimeMask.js' language='javascript' type='text/javascript'></script>
	<script type='text/javascript'>
	$(document).ready(function(){
	$.formValidator.initConfig({formid:'myForm',onerror:function(msg){alert(msg)}});



	//�u�������D�v����ˬd
	$('#cate_title').formValidator({
		onshow:'".sprintf(_MD_INPUT_VALIDATOR,_MA_CK2LINK_CATE_TITLE)."',
		onfocus:'".sprintf(_MD_INPUT_VALIDATOR_CHK,'1','255')."',
		oncorrect:'OK!'
	}).inputValidator({
		min:1,
		max:255,
		onerror:'".sprintf(_MD_INPUT_VALIDATOR_ERROR,_MA_CK2LINK_CATE_TITLE)."'
	});
	});
	</script>
	<script defer='defer' src='".XOOPS_URL."/modules/ck2_link/class/formValidator/datepicker/WdatePicker.js' type='text/javascript'></script>

	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>
	<table class='form_tbl'>


	<!--����-->
	<input type='hidden' name='cate_sn' value='{$cate_sn}'>

	<!--������-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_OF_CATE_SN."</td>
	<td class='col'><select name='of_cate_sn' size=1>
		<option value='' ".chk($of_cate_sn,'','1','selected')."></option>
		".get_ck2_link_cate_options('of_menu',$cate_sn,$of_cate_sn)."
	</select></td><td class='col'><div id='of_cate_snTip'></div></td></tr>

	<!--�������D-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_CATE_TITLE."</td>
	<td class='col'><input type='text' name='cate_title' size='20' value='{$cate_title}' id='cate_title'></td><td class='col'><div id='cate_titleTip'></div></td></tr>

	<!--�����Ƨ�-->
	<tr><td class='title' nowrap>"._MA_CK2LINK_CATE_SORT."</td>
	<td class='col'><input type='text' name='cate_sort' size='3' value='{$cate_sort}' id='cate_sort'></td><td class='col'><div id='cate_sortTip'></div></td></tr>
	<tr><td class='bar' colspan='3'>
	<input type='hidden' name='op' value='{$op}'>
	<input type='submit' value='"._MA_SAVE."'></td></tr>
	</table>
	</form>";

	//raised,corners,inset
	$main=div_3d(_MA_INPUT_FORM,$main,"raised");

	return $main;
}


//�۰ʨ��ock2_link_cate���̷s�Ƨ�
function ck2_link_cate_max_sort(){
	global $xoopsDB;
	$sql = "select max(`cate_sort`) from ".$xoopsDB->prefix("ck2_link_cate");
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}


//�s�W��ƨ�ck2_link_cate��
function insert_ck2_link_cate(){
	global $xoopsDB,$xoopsUser;


	$sql = "insert into ".$xoopsDB->prefix("ck2_link_cate")."
	(`of_cate_sn` , `cate_title` , `cate_sort`)
	values('{$_POST['of_cate_sn']}' , '{$_POST['cate_title']}' , '{$_POST['cate_sort']}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	//���o�̫�s�W��ƪ��y���s��
	$cate_sn=$xoopsDB->getInsertId();
	return $cate_sn;
}

//�C�X�Ҧ�ck2_link_cate���
function list_ck2_link_cate($show_function=1){
	global $xoopsDB,$xoopsModule;
	
	//���ock2_link_cate��ư}�C�]$cate[$cate_sn]['cate_title']�^
	$cate=get_ck2_link_cate_all();
	
	
	$MDIR=$xoopsModule->getVar('dirname');
	$sql = "select * from ".$xoopsDB->prefix("ck2_link_cate")."";


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
	function delete_ck2_link_cate_func(cate_sn){
		var sure = window.confirm('"._BP_DEL_CHK."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=delete_ck2_link_cate&cate_sn=\" + cate_sn;
	}
	</script>

	<table summary='list_table' id='tbl' style='width:100%;'>
	<tr>
	<th>"._MA_CK2LINK_OF_CATE_SN."</th>
	<th>"._MA_CK2LINK_CATE_TITLE."</th>
	<th>"._MA_CK2LINK_CATE_SORT."</th>
	$function_title</tr>
	<tbody>";

	while($all=$xoopsDB->fetchArray($result)){
	  //�H�U�|���ͳo���ܼơG $cate_sn , $of_cate_sn , $cate_title , $cate_sort
    foreach($all as $k=>$v){
      $$k=$v;
    }

		$fun=($show_function)?"
		<td>
		<a href='{$_SERVER['PHP_SELF']}?op=ck2_link_cate_form&cate_sn=$cate_sn'><img src='".XOOPS_URL."/modules/{$MDIR}/images/edit.gif' alt='"._BP_EDIT."'></a>
		<a href=\"javascript:delete_ck2_link_cate_func($cate_sn);\"><img src='".XOOPS_URL."/modules/{$MDIR}/images/del.gif' alt='"._BP_DEL."'></a>
		</td>":"";

		$data.="<tr>
		<td>{$cate[$of_cate_sn]['cate_title']}</td>
		<td>{$cate_title}</td>
		<td>{$cate_sort}</td>
		$fun
		</tr>";
	}

	$data.="
	<tr>
	<td colspan=5 class='bar'>
	<a href='{$_SERVER['PHP_SELF']}?op=ck2_link_cate_form'><img src='".XOOPS_URL."/modules/{$MDIR}/images/add.gif' alt='"._BP_ADD."' align='right'></a>
	{$bar}</td></tr>
	</tbody>
	</table>";

	//raised,corners,inset
	$main=div_3d("",$data,"corners");

	return $main;
}


//�H�y�������o�Y��ck2_link_cate���
function get_ck2_link_cate($cate_sn=""){
	global $xoopsDB;
	if(empty($cate_sn))return;
	$sql = "select * from ".$xoopsDB->prefix("ck2_link_cate")." where cate_sn='$cate_sn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//��sck2_link_cate�Y�@�����
function update_ck2_link_cate($cate_sn=""){
	global $xoopsDB,$xoopsUser;


	$sql = "update ".$xoopsDB->prefix("ck2_link_cate")." set
	 `of_cate_sn` = '{$_POST['of_cate_sn']}' ,
	 `cate_title` = '{$_POST['cate_title']}' ,
	 `cate_sort` = '{$_POST['cate_sort']}'
	where cate_sn='$cate_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $cate_sn;
}

//�R��ck2_link_cate�Y����Ƹ��
function delete_ck2_link_cate($cate_sn=""){
	global $xoopsDB;
	$sql = "delete from ".$xoopsDB->prefix("ck2_link_cate")." where cate_sn='$cate_sn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}

//�H�y�����q�X�Y��ck2_link_cate��Ƥ��e
function show_one_ck2_link_cate($cate_sn=""){
	global $xoopsDB,$xoopsModule;
	if(empty($cate_sn)){
		return;
	}else{
		$cate_sn=intval($cate_sn);
	}
	$sql = "select * from ".$xoopsDB->prefix("ck2_link_cate")." where cate_sn='{$cate_sn}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$all=$xoopsDB->fetchArray($result);

	//�H�U�|���ͳo���ܼơG $cate_sn , $of_cate_sn , $cate_title , $cate_sort
	foreach($all as $k=>$v){
		$$k=$v;
	}

	$data="
	<table summary='list_table' id='tbl'>
	<tr><th>"._MA_CK2LINK_CATE_SN."</th><td>{$cate_sn}</td></tr>
	<tr><th>"._MA_CK2LINK_OF_CATE_SN."</th><td>{$of_cate_sn}</td></tr>
	<tr><th>"._MA_CK2LINK_CATE_TITLE."</th><td>{$cate_title}</td></tr>
	<tr><th>"._MA_CK2LINK_CATE_SORT."</th><td>{$cate_sort}</td></tr>
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
	case "update_ck2_link_cate":
	update_ck2_link_cate($_POST['cate_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//�s�W���
	case "insert_ck2_link_cate":
	insert_ck2_link_cate();
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//��J���
	case "ck2_link_cate_form":
	$main=ck2_link_cate_form($_GET['cate_sn']);
	break;

	//�R�����
	case "delete_ck2_link_cate":
	delete_ck2_link_cate($_GET['cate_sn']);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//�w�]�ʧ@
	default:
	if(empty($_GET['cate_sn'])){
		$main=list_ck2_link_cate();
		//$main.=ck2_link_cate_form($_GET['cate_sn']);
	}else{
		$main=show_one_ck2_link_cate($_GET['cate_sn']);
	}
	break;



	/*---�P�_�ʧ@�жK�b�W��---*/
}

/*-----------�q�X���G��--------------*/
xoops_cp_header();
admin_toolbar(1);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();
?>
