<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: index.php,v 1.3 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------�ޤJ�ɮװ�--------------*/
include_once "admin_header.php";
include_once "admin_function.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/up_file.php";
/*-----------function��--------------*/


/*-----------����ʧ@�P�_��----------*/
$op = (empty($_REQUEST['op']))? "":$_REQUEST['op'];
$ncsn = (empty($_REQUEST['ncsn']))? "":intval($_REQUEST['ncsn']);
$nsn = (empty($_REQUEST['nsn']))? "":intval($_REQUEST['nsn']);
$show_uid = (empty($_REQUEST['show_uid']))? "":$_REQUEST['show_uid'];

switch($op){

	//�R�����
	case "delete_tad_news":
	delete_tad_news($nsn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//�妸�޲z
	case "batch":
	if($_POST['act']=="move_news"){
    move_news($_POST['nsn_arr'],$ncsn);
  }elseif($_POST['act']=="del_news"){
    del_news($_POST['nsn_arr']);
  }
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	default:
	$main=list_tad_news($ncsn,"news",$show_uid);
	break;
}

/*-----------�q�X���G��--------------*/
xoops_cp_header();
admin_toolbar(0);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();

?>
