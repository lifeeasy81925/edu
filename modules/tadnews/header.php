<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: header.php,v 1.1 2008/04/10 05:31:02 tad Exp $
// ------------------------------------------------------------------------- //

include_once "../../mainfile.php";

if($xoopsModuleConfig['use_pda']=='1'){
  if(file_exists(XOOPS_ROOT_PATH."/modules/tadtools/mobile_device_detect.php")){
    include_once XOOPS_ROOT_PATH."/modules/tadtools/mobile_device_detect.php";
    mobile_device_detect(true,false,true,true,true,true,true,'pda.php',false);
  }
}

include_once "function.php";

if ($xoopsUser) {
	$module_id = $xoopsModule->getVar('mid');
	$isAdmin=$xoopsUser->isAdmin($module_id);
}else{
  $isAdmin=false;
}

$interface_menu[_MD_TADNEW_NAME]="index.php";
if($xoopsModuleConfig['use_archive']=='1')  $interface_menu[_MD_TADNEW_ARCHIVE]="archive.php";
if($xoopsModuleConfig['use_newspaper']=='1')  $interface_menu[_MD_TADNEW_NEWSPAPER]="newspaper.php";
if($xoopsModuleConfig['use_embed']=='1')  $interface_menu[_MD_TADNEW_EMBED]="embed.php";


$p=chk_cate_post_power();
if(sizeof($p)>0 and $xoopsUser){
  $and_ncsn=empty($_REQUEST['ncsn'])?"":"?ncsn={$_REQUEST['ncsn']}";
	$interface_menu[_MD_TADNEW_POST]="post.php{$and_ncsn}";
}

if($isAdmin){
  $interface_menu[_MD_TADNEW_TO_ADMIN]="admin/index.php";
}

?>
