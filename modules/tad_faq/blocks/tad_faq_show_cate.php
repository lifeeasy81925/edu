<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2008-07-02
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //

//區塊主函式 (會列出所有常見問題的分類)
function tad_faq_show_cate($options){
	global $xoopsDB,$xoopsModule,$xoopsModuleConfig;
  $sql = "select fcsn,count(*) from ".$xoopsDB->prefix("tad_faq_content")." where enable='1' group by fcsn ";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	while(list($fcsn,$count)=$xoopsDB->fetchRow($result)){
	  $counter[$fcsn]=$count;
	}

	$sql = "select * from ".$xoopsDB->prefix("tad_faq_cate")." order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	$data="<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tad_faq/module.css' />";
	$i=3;
	while(list($fcsn,$of_fcsn,$title,$description,$sort,$cate_pic)=$xoopsDB->fetchRow($result)){
		if($i%3==1){
			$img='001_58.gif';
		}elseif($i%3==2){
			$img='001_59.gif';
		}else{
			$img='001_60.gif';
		}
		$num=(empty($counter[$fcsn]))?0:$counter[$fcsn];
		$data.="<div class='faq_title'><span class='counter'>".sprintf(_MB_TADFAQ_FAQ_NUM,$num)."</span><a href='".XOOPS_URL."/modules/tad_faq/index.php?fcsn=$fcsn'><img src='".XOOPS_URL."/modules/tad_faq/images/{$img}' align='absmiddle' hspace=6 alt='$title'>$title</a></div>";
		$i++;
	}



	$data=tad_faq_show_cate_div_3d($options[0],$data,"corners","width:100%","1");
	$block= $data;

	return $block;
}

function tad_faq_show_cate_edit($options){
  $block=_MB_TADFAQ_BLOCK_TITLE." <input type='text' name='options[0]' value='{$options[0]}'>";
	return $block;
}

//圓角文字框
function tad_faq_show_cate_div_3d($title="",$main="",$kind="raised",$style="",$show_toolbar="0"){
	global $interface_menu;
	//$toolbar=($show_toolbar=='1')?toolbar($interface_menu):"";

	$main="<table style='width:auto;{$style}'><tr><td>
	<div class='{$kind}'>
	<div style='float:right;'>$toolbar</div><h1>$title</h1>
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
