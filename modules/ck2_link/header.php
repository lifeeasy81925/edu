<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

include "../../mainfile.php";
include "function.php";



$interface_menu[_MD_CK2LINK_SMNAME1]="index.php";

//�P�_�O�_��ӼҲզ��޲z�v��

$isAdmin=false;
if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
}

if($isAdmin){
    $interface_menu[_TO_ADMIN_PAGE]="admin/index.php";
}

?>
