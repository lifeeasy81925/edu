<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------�ޤJ�ɮװ�--------------*/
include "header.php";
$xoopsOption['template_main'] = "index_tpl.html";

/*-----------function��--------------*/

//�C�X�Ҧ�ck2_link���
function list_ck2_link($show_function=1){
	global $xoopsDB,$xoopsModule,$xoopsModuleConfig;
	
	$MDIR=$xoopsModule->getVar('dirname');
	//���Ѥ��
	$today=date("Y-m-d");
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")."
					where enable='1' and
								(unable_date='0000-00-00' or unable_date >='$today')
					order by link_sort
					";

	
	//getPageBar($��sql�y�k, �C����ܴX�����, �̦h��ܴX�ӭ��ƿﶵ);
  $PageBar=getPageBar($sql,$xoopsModuleConfig['show_num'],10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];
  $total=$PageBar['total'];

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());


	//�R���T�{��JS
	$data="";

	while($all=$xoopsDB->fetchArray($result)){
	  //�H�U�|���ͳo���ܼơG $link_sn , $cate_sn , $link_title , $link_url , $link_desc , $link_sort , $link_counter , $unable_date , $uid , $post_date , $enable
    foreach($all as $k=>$v){
      $$k=$v;
    }


		$data.="
		<div style='float:left;text-align:center;margin:2px;width:200px;height:230px;'>
			<a href='view.php?link_sn={$link_sn}'>
		  	<img src='http://capture.heartrails.com/200x200/cool?{$link_url}'>
			</a><br>
			<a href='{$link_url}' target='_blank'>{$link_title}</a>
		</div>";
	}

	$data.="
	<p style='clear:both;text-align:center;margin:10px;background-color:#F0F0F0'>{$bar}</p>";

	//raised,corners,inset
	$main=div_3d("",$data,"corners");

	return $main;
}



/*-----------����ʧ@�P�_��----------*/
$main=list_ck2_link(0);

/*-----------�q�X���G��--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/ck2_link/module.css' />") ;
$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
