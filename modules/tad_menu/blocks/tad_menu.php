<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-07-14
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //

//�϶��D�禡 (���϶�)
function tad_menu($options){
  include_once XOOPS_ROOT_PATH."/modules/tad_menu/function_block.php";
	$block=mk_menu();
	return $block;
}



?>