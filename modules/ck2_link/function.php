<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //
//引入TadTools的函式庫
if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php")){
 redirect_header("index.php",3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";


//取得所有ck2_link_cate分類選單的選項（模式=of_menu or menu,目前分類編號,目前分類的所屬編號）
function get_ck2_link_cate_options($mode='of_menu',$default_kinds_sn="0",$default_of_kinds_sn="0",$start_search_sn="0",$level=0){
	global $xoopsDB,$xoopsModule;
	$sql = "select cate_sn,cate_title from ".$xoopsDB->prefix("ck2_link_cate")." where of_cate_sn='{$start_search_sn}' order by cate_sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	$prefix=str_repeat("&nbsp;&nbsp;",$level);
	$level++;

	$main="";
	while(list($cate_sn,$cate_title)=$xoopsDB->fetchRow($result)){
	  if($mode=="of_menu"){
			$selected=($cate_sn==$default_of_kinds_sn)?"selected=selected":"";
			$selected.=($cate_sn==$default_kinds_sn)?"disabled=disabled":"";
	  }else{
  		$selected=($cate_sn==$default_kinds_sn)?"selected=selected":"";
  	}
		$main.="<option value=$cate_sn $selected>{$prefix}{$cate_title}</option>";
		$main.=get_ck2_link_cate_options($mode,$default_kinds_sn,$default_of_kinds_sn,$cate_sn,$level);

	}
	return $main;
}



//取得ck2_link_cate所有資料陣列
function get_ck2_link_cate_all(){
	global $xoopsDB;
	$sql = "select * from ".$xoopsDB->prefix("ck2_link_cate");
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	while($data=$xoopsDB->fetchArray($result)){
		$cate_sn=$data['cate_sn'];
		$data_arr[$cate_sn]=$data;
	}
	return $data_arr;
}


/********************* 預設函數 *********************/
//圓角文字框
function div_3d($title="",$main="",$kind="raised",$style=""){
	$main="<table style='width:auto;{$style}'><tr><td>
	<div class='{$kind}'>
	<h1>$title</h1>
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
