<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-06-25
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //

//�϶��D�禡 (�C���w���լd��)
function tad_one_form($options){
	global $xoopsDB;

	$today=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));
	
	$sql = "select count(*) from ".$xoopsDB->prefix("tad_form_fill")." where ofsn='{$options[0]}'";
	//die($sql);
	$result = $xoopsDB->query($sql);
	list($counter)=$xoopsDB->fetchRow($result);

	$sql = "select * from ".$xoopsDB->prefix("tad_form_main")." where ofsn='{$options[0]}'";
	$result = $xoopsDB->query($sql);

	list($ofsn,$title,$start_date,$end_date,$content,$uid,$post_date,$enable)=$xoopsDB->fetchRow($result);
	
	$start_date=date("Y-m-d",xoops_getUserTimestamp(strtotime($start_date)));
	$end_date=date("Y-m-d",xoops_getUserTimestamp(strtotime($end_date)));
	
	if(date("Y-m-d" , xoops_getUserTimestamp(time())) > $end_date)return "";


	$block['ofsn']=$ofsn;
	$block['title']=$title;
	$block['start_date']=$start_date;
	$block['end_date']=$end_date;
	$block['content']=$content;
	$block['post_date']=$post_date;
	$block['sign_now']=sprintf(_MB_TADFORM_SIGN_NOW,$title,$counter);
	$block['date']=sprintf(_MB_TADFORM_SIGN_DATE,$start_date,$end_date);


	return $block;
}

//�϶��s��禡
function tad_one_form_edit($options){
	global $xoopsDB;
	$today=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));
	$sql = "select * from ".$xoopsDB->prefix("tad_form_main")." where enable='1' and start_date < '{$today}' and end_date > '{$today}'";
	$result = $xoopsDB->query($sql);

	$form=_MB_TADFORM_ONE_FORM_T1."	<select name='options[0]' size=5>";
	while(list($ofsn,$title,$start_date,$end_date,$content,$uid,$post_date,$enable)=$xoopsDB->fetchRow($result)){
	  $selected=($ofsn==$options[0])?"selected":"";
		$form.="<option value='{$ofsn}' $selected>$title</option>\n";
	}
	$form.="</select>";
	return $form;
}


?>
