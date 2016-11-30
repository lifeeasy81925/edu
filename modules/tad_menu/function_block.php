<?php

function mk_menu(){
	$main="<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tad_menu/menu/prodrop2/menu.css' />
	<span class='preload2'></span>
	<ul class='menu2' style='margin:0px;padding:0px;'>";
	$main.=get_tad_link();
	$main.="</ul>";
	return $main;
}


//取得分類下拉選單
function get_tad_link($of_level=0,$level=0,$v="",$this_menuid="",$no_self="1"){
	global $xoopsDB,$xoopsUser,$xoopsModule;

	$option="";
	$sql = "select `menuid`,`of_level`,`itemname`,`position`,`itemurl` from ".$xoopsDB->prefix("tad_menu")." where of_level='{$of_level}'  order by position";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($menuid,$of_level,$itemname,$position,$itemurl)=$xoopsDB->fetchRow($result)){
	  $chk_sub=chk_sub($menuid);
	  if($chk_sub){
		  $down=" class='down'";
		  $a="<!--[if gte IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->";
			$a2="<!--[if lte IE 6]></td></tr></table></a><![endif]-->";
		  $sub_menu=sub_menu($menuid);
		}else{
		  $down=$sub_menu="";
		  $a="</a>";
		  $a2="";
		}
		$option.="<li class='top'><a href='{$itemurl}' id='item{$menuid}' class='top_link'><span $down>{$itemname}</span>{$a}
			{$sub_menu}
		{$a2}
		</li>";
	}
	return $option;
}

//取得子分類下拉選單
function sub_menu($menuid="",$level=1){
	global $xoopsDB,$xoopsUser,$xoopsModule;

	$option=($level=='1')?"<ul class='sub'>\n":"<ul>\n";

	$sql = "select `menuid`,`of_level`,`itemname`,`position`,`itemurl` from ".$xoopsDB->prefix("tad_menu")." where of_level='{$menuid}'  order by position";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($menuid,$of_level,$itemname,$position,$itemurl)=$xoopsDB->fetchRow($result)){

	  $chk_sub=($level=='1')?chk_sub($menuid):"";

	  if($chk_sub){
		  $class=" class='fly'";
		  $a="<!--[if gte IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]-->";
      $a2="\n<!--[if lte IE 6]></td></tr></table></a><![endif]-->";
      $level++;
		  $sub_menu=sub_menu($menuid,$level);
		}else{
		  $class=$a2=$sub_menu="";
		  $a="</a>";
		}

		$option.="\t\t\t\t\t\t<li><a href='{$itemurl}' $class>$itemname{$a}{$sub_menu}{$a2}</li>\n";
	}
	$option.="</ul>\n";
	return $option;
}

//檢查有無子分類
function chk_sub($menuid=""){
	global $xoopsDB,$xoopsUser,$xoopsModule;

	$sql = "select count(*) from ".$xoopsDB->prefix("tad_menu")." where of_level='{$menuid}'  order by position";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	list($count)=$xoopsDB->fetchRow($result);

	return $count;
}

?>
