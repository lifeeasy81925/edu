<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: tadnews_re_block.php,v 1.2 2008/05/14 01:31:48 tad Exp $
// ------------------------------------------------------------------------- //

//�϶��D�禡 (�C�X�̷s���s�D����)
function tadnews_b_show_3($options){
	global $xoopsDB;
	$modhandler = &xoops_gethandler('module');
  $xoopsModule = &$modhandler->getByDirname("tadnews");
	$com_modid=$xoopsModule->getVar('mid');
	$sql = "select com_id,com_text,com_itemid,com_uid from ".$xoopsDB->prefix("xoopscomments")." where com_modid='$com_modid' order by com_modified desc limit 0,{$options[0]}";
	//die($sql);
	$result = $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$block="";
	$block['width']=$options[1];
	$myts =& MyTextSanitizer::getInstance();
	while(list($com_id,$txt,$nsn,$uid)=$xoopsDB->fetchRow($result)){
    $txt=strip_tags($txt);
    //�䴩xlanguage
    if(function_exists('xlanguage_ml')){
      $txt=xlanguage_ml($txt);
    }
    $txt=xoops_substr($txt , 0 , $options[1] , "...");
	$uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;
		$re['uid']=$uid;
		$re['uid_name']=$uid_name;
		$re['nsn']=$nsn;
		$re['com_id']=$com_id;
		$re['txt']=$txt;
		$block['re'][$com_id] = $re;
	}
	return $block;
}

//�϶��s��禡
function tadnews_re_edit($options){

	$form="<table style='width:auto;'>
	<tr><th>1.</th><th>"._MB_TADNEW_TADNEWS_RE_EDIT_BITEM0."</th><td><INPUT type='text' name='options[0]' value='{$options[0]}' size=3></td></tr>
	<tr><th>2.</th><th>"._MB_TADNEW_TADNEWS_RE_EDIT_BITEM1."</th><td><INPUT type='text' name='options[1]' value='{$options[1]}' size=3></td></tr>
	</table>
	";
	return $form;
}


?>