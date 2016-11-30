<?php
include_once XOOPS_ROOT_PATH."/modules/tad_menu/function_block.php";

function smarty_insert_tad_menu(){
  global $xoopsModule;

	$main="<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tad_menu/menu/prodrop2/menu.css' />
	<span class='preload2'></span>
	<ul class='menu2'>
	";
	$main.=get_tad_link();
	$main.="
	</ul>";
	return $main;
}

?>