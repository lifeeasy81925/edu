<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

//�϶��D�禡 (�̷s���˦n��(ck2_link_list))
function ck2_link_list($options){
	global $xoopsDB;

	//���Ѥ��
	$today=date("Y-m-d");
	$sql = "select link_sn,link_title,link_url from ".$xoopsDB->prefix("ck2_link")."
					where enable='1' and
								(unable_date='0000-00-00' or unable_date >='$today')
					order by rand() limit 0,{$options[0]}
					";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	$data="
	<div style='width:170px;margin-top:6px;border:0px solid gray;'>";

	while($all=$xoopsDB->fetchArray($result)){
    foreach($all as $k=>$v){
      $$k=$v;
    }

		if($options[1]=="yes"){
			$data.="
			<div style='text-align:center;margin:2px 0px 8px;'>
				<a href='".XOOPS_URL."/modules/ck2_link/view.php?op=go&link_sn={$link_sn}' target='_blank'>
			  	<img src='http://capture.heartrails.com/200x200/cool?{$link_url}'>
				</a><br>
				<a href='".XOOPS_URL."/modules/ck2_link/view.php?op=go&link_sn={$link_sn}' target='_blank'>{$link_title}</a>
			</div>";
		}else{
			$data.="
			<div><a href='".XOOPS_URL."/modules/ck2_link/view.php?op=go&link_sn={$link_sn}' target='_blank'>{$link_title}</a></div>";
		}
	}

	$data.="
	</div><p style='clear:both;'></p>";
	
	$block=$data;
	return $block;
}

//?s��
function ck2_link_list_edit($options){
	$chked1_0=($options[1]=="yes")?"checked":"";
	$chked1_1=($options[1]=="no")?"checked":"";

	$form="
	"._MB_CK2LINK_CK2_LINK_LIST_EDIT_BITEM0."
	<INPUT type='text' name='options[0]' value='{$options[0]}'>
	<br>
	"._MB_CK2LINK_CK2_LINK_LIST_EDIT_BITEM1."
	<INPUT type='radio' $chked1_0 name='options[1]' value='yes'>yes
	<INPUT type='radio' $chked1_1 name='options[1]' value='no'>no
	";
	return $form;
}

?>
