<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: post.php,v 1.2 2008/06/25 06:36:09 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------�ޤJ�ɮװ�--------------*/
include_once "header.php";
include_once "post_function.php";
$xoopsOption['template_main'] = "post_tpl.html";
/*-----------function��--------------*/
if(empty($xoopsUser))redirect_header("index.php",3, _MD_TADNEW_NO_POST_POWER);

/*-----------����ʧ@�P�_��----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];
$nsn = (!isset($_REQUEST['nsn']))? "":intval($_REQUEST['nsn']);
$ncsn = (!isset($_REQUEST['ncsn']))? "":intval($_REQUEST['ncsn']);

switch($op){

	//�s�W���
	case "insert_tad_news":
	$nsn=insert_tad_news();
	break;
	
	//��J���
	case "tad_news_form";
	$main=tad_news_form($nsn);
	//$main.=list_tad_news(1);
	break;
		
	//��s���
	case "update_tad_news";
	update_tad_news($nsn);
	break;
	

	
	default:
	$main=tad_news_form($nsn,$ncsn);
	break;
}


/*-----------�q�X���G��--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='module.css' />") ;
$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
