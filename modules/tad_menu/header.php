<?php
include_once "common/tool.php";
include_once "function.php";
//判斷是否對該模組有管理權限

$isAdmin=isAdmin();

if($isAdmin){
  $interface_menu[_TO_ADMIN_PAGE]="admin/index.php";
}

$module_menu=toolbar($interface_menu);
$module_css="<link rel='stylesheet' type='text/css' media='screen' href='module.css' />";
?>