<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------�ޤJ�ɮװ�--------------*/
include "header.php";
$xoopsOption['template_main'] = "view_tpl.html";
/*-----------function��--------------*/

//�H�y�����q�X�Y��ck2_link��Ƥ��e
function show_one_ck2_link($link_sn=""){
	global $xoopsDB,$xoopsModule;
	if(empty($link_sn)){
		return;
	}else{
		$link_sn=intval($link_sn);
	}
	
	//�s�W�p�ƾ�
	add_ck2_link_counter($link_sn);
	
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")." where link_sn='{$link_sn}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$all=$xoopsDB->fetchArray($result);

	//�H�U�|���ͳo���ܼơG $link_sn , $cate_sn , $link_title , $link_url , $link_desc , $link_sort , $link_counter , $unable_date , $uid , $post_date , $enable
	foreach($all as $k=>$v){
		$$k=$v;
	}
	
	if($_REQUEST['op']=="go")header("location:{$link_url}");

	$data="
	<table summary='list_table' id='tbl'>
	<tr><td rowspan=6><a href='{$link_url}' target='_blank'>
		  	<img src='http://capture.heartrails.com/200x200/cool?{$link_url}'>
			</a></td>
	<th>"._MA_CK2LINK_CATE_SN."</th><td>{$cate_sn}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_TITLE."</th><td>{$link_title}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_URL."</th><td><a href='$link_url' target='_blank'>{$link_url}</a></td></tr>
	<tr><th>"._MA_CK2LINK_LINK_DESC."</th><td>{$link_desc}</td></tr>
	<tr><th>"._MA_CK2LINK_LINK_COUNTER."</th><td>{$link_counter}</td></tr>
	<tr><th>"._MA_CK2LINK_POST_DATE."</th><td>{$post_date}</td></tr>
	</table>";

	//raised,corners,inset
	$main=div_3d($link_title,$data,"corners");

	return $main;
}


//�s�Wck2_link�p�ƾ�
function add_ck2_link_counter($link_sn=''){
	global $xoopsDB,$xoopsModule;
	$sql = "update ".$xoopsDB->prefix("ck2_link")." set `link_counter`=`link_counter`+1 where `link_sn`='{$link_sn}'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}


/*-----------����ʧ@�P�_��----------*/
if(empty($_GET['link_sn'])){
	header("location:index.php");
}else{
	$link_sn=intval($_GET['link_sn']);
	$main=show_one_ck2_link($link_sn);
}


/*-----------�q�X���G��--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/ck2_link/module.css' />") ;
$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/include/comment_view.php';
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
