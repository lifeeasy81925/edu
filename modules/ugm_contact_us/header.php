<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作
// 製作日期：2009-02-28
// $Id:$
// ------------------------------------------------------------------------- //

include "../../mainfile.php";
include "function.php";

//?斗?臬撠府璅∠??恣????
$isAdmin=false;
if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
}



$interface_menu[_MD_UGMCONTACUS_SMNAME1]="index.php";


?>
