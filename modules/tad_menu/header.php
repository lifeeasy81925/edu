<?php
include_once "common/tool.php";
include_once "function.php";
//�P�_�O�_��ӼҲզ��޲z�v��

$isAdmin=isAdmin();

if($isAdmin){
  $interface_menu[_TO_ADMIN_PAGE]="admin/index.php";
}

$module_menu=toolbar($interface_menu);
$module_css="<link rel='stylesheet' type='text/css' media='screen' href='module.css' />";
?>