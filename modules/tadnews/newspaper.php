<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: newspaper.php,v 1.2 2008/05/14 01:31:48 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------�ޤJ�ɮװ�--------------*/
include "header.php";
/*-----------function��--------------*/


//�C�Xnewspaper���
function list_newspaper(){
	global $xoopsDB,$xoopsOption;
	$xoopsOption['template_main'] = "list_tpl.html";
	
	$sql = "select a.npsn,a.number,b.title,a.np_date from ".$xoopsDB->prefix("tad_news_paper")." as a ,".$xoopsDB->prefix("tad_news_paper_setup")." as b where a.nps_sn=b.nps_sn and b.status='1' order by a.np_date desc";

  //getPageBar($��sql�y�k, �C����ܴX�����, �̦h��ܴX�ӭ��ƿﶵ);
  $PageBar=getPageBar($sql,10,10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];


	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	$main="<table id='tbl'><tr><th>"._MA_TADNEW_NP_NUMBER."</th><th>"._MA_TADNEW_NP_DATE."</th></tr>";

	while(list($allnpsn,$number,$title,$np_date)=$xoopsDB->fetchRow($result)){
			$main.="<tr><td><a href='".XOOPS_URL."/modules/tadnews/newspaper.php?op=preview&npsn={$allnpsn}' target='_blank'>{$title}".sprintf(_MA_TADNEW_NP_TITLE,$number)."</a></td><td>$np_date</td></tr>";
	}
	
	$main.="<tr><td class='bar' colspan=2>$bar</td></table>";
	
	
	$main=div_3d(_MD_TADNEW_NEWSPAPER,$main,"corners");
	
	return $main;
}


/*-----------����ʧ@�P�_��----------*/
$_REQUEST['op']=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$npsn=(empty($_GET['npsn']))?"":intval($_GET['npsn']);
switch($_REQUEST['op']){

	case "preview":
	$main=preview_newspaper($npsn);
	break;
	
	default:
	$main=list_newspaper();
	break;
}

/*-----------�q�X���G��--------------*/
if($_REQUEST['op']=="preview"){
  echo $main;
}else{
	include XOOPS_ROOT_PATH."/header.php";
	$xoopsTpl->assign('xoops_showrblock', 0);
	$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadnews/module.css' />") ;
	$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
	$xoopsTpl->assign( "content" , $main) ;
	include_once XOOPS_ROOT_PATH.'/footer.php';
}

?>
