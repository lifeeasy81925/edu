<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: tadnews_newspaper.php,v 1.1 2008/04/10 05:29:56 tad Exp $
// ------------------------------------------------------------------------- //

//�϶��D�禡 (�q�l���q�\)
function tadnews_newspaper($options){
	global $xoopsDB,$xoopsUser;
	
	$sql = "select count(*) from ".$xoopsDB->prefix("tad_news_paper_email")."";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($counter)=$xoopsDB->fetchRow($result);
	
	//��X�{���]�w��
	$sql = "select nps_sn,title from ".$xoopsDB->prefix("tad_news_paper_setup")." where status='1'";
	$result=$xoopsDB->query($sql);
	while(list($nps_sn,$title)=$xoopsDB->fetchRow($result)){
		$option.="<option value='{$nps_sn}'>$title</option>";
	}
	if(empty($option)){
    $block=_MB_TADNEW_NO_NEWSPAPER;
	}else{
		$block="
		<form action='".XOOPS_URL."/modules/tadnews/email.php' method='post'>
		<div class='controls'>
	  ".sprintf(_MB_TADNEW_ORDER_COUNT,$counter)."<br>
		"._MB_TADNEW_TITLE."<select name='nps_sn' class='span12'>$option</select><br>
	  "._MB_TADNEW_EMAIL."<input type='text' name='newspaper_email' size=18 class='span12'><br>
	  <input type='radio' name='mode' value='add' checked>"._MB_TADNEW_ORDER."
	  <input type='radio' name='mode' value='del'>"._MB_TADNEW_CANCEL."
	  <input type='submit' value='"._MB_TADNEW_SUBMIT."'>
	  </div>
	</form>";
	}
	return $block;
}

?>