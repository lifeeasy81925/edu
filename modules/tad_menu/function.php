<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-07-14
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //
//�ޤJTadTools���禡�w
if(!file_exists(TADTOOLS_PATH."/tad_function.php")){
 redirect_header("index.php",3, _TAD_NEED_TADTOOLS);
}
include_once TADTOOLS_PATH."/tad_function.php";
include_once "function_block.php";

/********************* �w�]��� *********************/
//�ꨤ��r��
function div_3d($title="",$main="",$kind="raised",$style="",$other=''){
	$main="<table style='width:auto;{$style}'><tr><td>
	<div class='{$kind}'>
	<h1>$title</h1>
	$other
	<b class='b1'></b><b class='b2'></b><b class='b3'></b><b class='b4'></b>
	<div class='boxcontent'>
 	$main
	</div>
	<b class='b4b'></b><b class='b3b'></b><b class='b2b'></b><b class='b1b'></b>
	</div>
	</td></tr></table>";
	return $main;
}



?>