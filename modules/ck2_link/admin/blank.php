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
//
function f1(){
	global $xoopsDB;
	$main="Hi~ admin~";
  return $main;
}

//
function f2(){
	$main="";
	return $main;
}


/*-----------����ʧ@�P�_��----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];

switch($op){
	/*---�P�_�ʧ@�жK�b�U��---*/
	
	case "f2":
	f2();
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	default:
	$main=f1();
	break;
	
	/*---�P�_�ʧ@�жK�b�W��---*/
}

/*-----------�q�X���G��--------------*/
xoops_cp_header();
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo menu_interface();
echo $main;
xoops_cp_footer();

?>