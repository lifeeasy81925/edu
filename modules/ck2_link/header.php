<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

include "../../mainfile.php";
include "function.php";



$interface_menu[_MD_CK2LINK_SMNAME1]="index.php";

//判斷是否對該模組有管理權限

$isAdmin=false;
if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
}

if($isAdmin){
    $interface_menu[_TO_ADMIN_PAGE]="admin/index.php";
}

?>
