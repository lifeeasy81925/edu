<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作
// 製作日期：2009-02-28
// $Id:$
// ------------------------------------------------------------------------- //

//區塊主函式 (聯絡我們表單(ugm_contact_us_b1))
function ugm_contact_us_b1($options){
	$block="";
	return $block;
}

//?s禡
function ugm_contact_us_b1_edit($options){
	$chked0_0=($options[0]=="0")?"checked":"";
	$chked0_1=($options[0]=="1")?"checked":"";
	$chked0_2=($options[0]=="2")?"checked":"";
	$chked0_3=($options[0]=="3")?"checked":"";

	$form="
	"._MB_UGMCONTACUS_UGM_CONTACT_US_B1_EDIT_BITEM0."
	<INPUT type='checkbox' $chked0_0 name='options[0]' value='0'>0
	<INPUT type='checkbox' $chked0_1 name='options[0]' value='1'>1
	<INPUT type='checkbox' $chked0_2 name='options[0]' value='2'>2
	<INPUT type='checkbox' $chked0_3 name='options[0]' value='3'>3
	";
	return $form;
}

?>