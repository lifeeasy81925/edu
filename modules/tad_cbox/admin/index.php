<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-03-25
// $Id: index.php,v 1.1 2008/05/14 01:25:12 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------�ޤJ�ɮװ�--------------*/
include_once "../../../include/cp_header.php";
include_once "../function.php";

/*-----------function��--------------*/

//�C�X�Ҧ�tad_cbox���
function list_tad_cbox(){
	global $xoopsDB,$xoopsModule,$xoopsUser;
	$MDIR=$xoopsModule->getVar('dirname');
	$sql = "select * from ".$xoopsDB->prefix("tad_cbox")." order by post_date desc";
	
	//getPageBar($��sql�y�k, �C����ܴX�����, �̦h��ܴX�ӭ��ƿﶵ);
   $PageBar=getPageBar($sql,20,10);
   $bar=$PageBar['bar'];
   $sql=$PageBar['sql'];
	
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());


	//�P�_�O�_��ӼҲզ��޲z�v���A  �Y�ť�
  if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
  }else{
    $isAdmin=false;

	}

  $cbox_root_msg_color=(empty($_SESSION['cbox_root_msg_color']))?"two":$_SESSION['cbox_root_msg_color'];

  if($isAdmin){
		$del_js="
		<script>
		function delete_tad_cbox_func(sn){
			var sure = window.confirm('"._BP_DEL_CHK."');
			if (!sure)	return;
			location.href=\"{$_SERVER['PHP_SELF']}?mode={$_GET['mode']}&op=delete_tad_cbox&sn=\" + sn;
		}
		</script>";
	}else{
    $del_js="";
	}

	$data="
	$del_js
	<div class='cbox'>
	<table id='cbox_show_tbl'>
	<tr><td class=bar>$bar</td></tr>";
	$i=2;

	while(list($sn,$publisher,$msg,$post_date,$ip,$only_root,$root_msg)=$xoopsDB->fetchRow($result)){
	  $bgcss=($i%2)?"cbox_msg_color1":"cbox_msg_color2";
	  
	  $post_date=date("Y-m-d H:i:s",xoops_getUserTimestamp(strtotime($post_date)));

	  if($only_root=='1' and !$isAdmin){
			$msg="<font class='lock_msg'>"._MA_TADCBOX_LOCK_MSG."</font>";
		}

    $tool=($isAdmin)?"<img src='".XOOPS_URL."/modules/tad_cbox/images/del2.gif' width=12 height=12 align=bottom hspace=2 onClick=\"delete_tad_cbox_func($sn)\">":"";

		$msg=str_replace("[s","<img src='".XOOPS_URL."/modules/tad_cbox/images/smiles/s",$msg);
		$msg=str_replace(".gif]",".gif' hspace=2 align='absmiddle'>",$msg);

		if(!empty($root_msg)){
      $root_msg=str_replace("[s","<img src='".XOOPS_URL."/modules/tad_cbox/images/smiles/s",$root_msg);
			$root_msg=str_replace(".gif]",".gif' hspace=2 align='absmiddle'>",$root_msg);

		  $root="<div id='cbox_container'><div class='{$cbox_root_msg_color}'>
			<b class='tl'><b class='tr'></b></b>
			<p>{$root_msg}</p>
			<b class='bl'></b><b class='br'><b class='point'></b></b>
			</div></div>";
		}else{
			$root="";
		}



		$data.="<tr>
		<td class='{$bgcss}'>
		<div class='cbox_date'><font class='cbox_ip'>{$ip}</font> | {$post_date} {$tool}</div> {$root}
		<div class='cbox_publisher'>{$publisher}</div>: {$msg}</td>
		</tr>";
		$i++;
	}
	$data.="
	<tr><td class=bar>$bar</td></tr>
	</table></div>";
	return $data;
}




/*-----------����ʧ@�P�_��----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){
	//�R�����
	case "delete_tad_cbox";
	delete_tad_cbox($_GET['sn']);
	header("location: {$_SERVER['PHP_SELF']}?mode={$_GET['mode']}");
	break;

	default:
	$main=list_tad_cbox();
	break;
}

/*-----------�q�X���G��--------------*/
xoops_cp_header();
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />
<link rel='stylesheet' type='text/css' media='screen' href='../module.php' />";
admin_toolbar(0);
echo $main;
xoops_cp_footer();

?>
