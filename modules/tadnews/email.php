<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: email.php,v 1.2 2008/05/14 01:31:48 tad Exp $
// ------------------------------------------------------------------------- //
/*-----------�ޤJ�ɮװ�--------------*/
include "header.php";
/*-----------function��--------------*/

//�s��u��
function update_mail(){
	global $xoopsDB,$xoopsUser;
	$newspaper_set=get_newspaper_set($_POST['nps_sn']);
	
	if(empty($_POST['newspaper_email']) or !check_email_mx($_POST['newspaper_email'])){
    redirect_header(XOOPS_URL,3, sprintf(_MA_TADNEW_ERROR_EMAIL,$_POST['newspaper_email']));
    return;
	}
	
	if($_POST['mode']=="add"){
		$sql = "replace into ".$xoopsDB->prefix("tad_news_paper_email")." (nps_sn,email,order_date) values('{$_POST['nps_sn']}','{$_POST['newspaper_email']}',now())";
		$xoopsDB->query($sql) or redirect_header(XOOPS_URL,3, sprintf(_MA_TADNEW_ORDER_ERROR,$newspaper_set['title']));
	  redirect_header(XOOPS_URL,3, sprintf(_MA_TADNEW_ORDER_SUCCESS,$newspaper_set['title']));
  }elseif($_POST['mode']=="del"){
		$sql = "delete from ".$xoopsDB->prefix("tad_news_paper_email")." where email='{$_POST['newspaper_email']}'";
		$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3, sprintf(_MA_TADNEW_DEL_ERROR,$newspaper_set['title']));
	  redirect_header(XOOPS_URL,3, sprintf(_MA_TADNEW_DEL_SUCCESS,$newspaper_set['title']));
	}
	return $sql;
}

//�ˬdEmail
function check_email_mx($email) {
	if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) ||
		(preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) {
		return true;
		//$host = explode('@', $email);
		//if(checkdnsrr($host[1].'.', 'MX') ) return true;
		//if(checkdnsrr($host[1].'.', 'A') ) return true;
		//if(checkdnsrr($host[1].'.', 'CNAME') ) return true;
	}
	return false;
}

//�ˬd DNS
if (!function_exists('checkdnsrr')) {
	function checkdnsrr($host, $type = '') {
		if(!empty($host)) {
			if($type == '') $type = "MX";
			@exec("nslookup -type=$type $host", $output);
			while(list($k, $line) = each($output)) {
				if(eregi("^$host", $line)) {
					return true;
				}
			}
			return false;
		}
	}
}

/*-----------����ʧ@�P�_��----------*/
$_REQUEST['op']=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
switch($_REQUEST['op']){

	default:
	$main=update_mail();
	break;
}

/*-----------�q�X���G��--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='alternate' type='application/rss+xml' title='".$xoopsModule->getVar('name')."' href='".XOOPS_URL."/modules/".$xoopsModule->getVar('dirname')."/rss.php?ncsn=".$_GET['ncsn']."' /><link rel='stylesheet' type='text/css' media='screen' href='module.css' />") ;

$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/include/comment_view.php';
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
