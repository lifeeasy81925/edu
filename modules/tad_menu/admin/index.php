<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2008-07-14
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "header_admin.php";

/*-----------function區--------------*/
//tad_menu編輯表單
function tad_menu_form($of_level="0",$menuid=""){
	global $xoopsDB;

	//抓取預設值
	if(!empty($menuid)){
		$DBV=get_tad_menu($menuid);
	}else{
		$DBV=array();
	}

	//預設值設定

	$menuid=(!isset($DBV['menuid']))?$menuid:$DBV['menuid'];
	$of_level=(!isset($DBV['of_level']))?$of_level:$DBV['of_level'];
	$position=(!isset($DBV['position']))?get_max_sort($of_level):$DBV['position'];
	$itemname=(!isset($DBV['itemname']))?"":$DBV['itemname'];
	$itemurl=(!isset($DBV['itemurl']))?"":$DBV['itemurl'];
	$membersonly=(!isset($DBV['membersonly']))?"":$DBV['membersonly'];
	$status=(!isset($DBV['status']))?"":$DBV['status'];

	$op=(empty($menuid))?"insert_tad_menu":"update_tad_menu";
	//$op="replace_tad_menu";
	$main="
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
	<input type='text' name='position' size='3' value='{$position}'>
	";
	
	if(!empty($menuid)){
		$main.="<select name='of_level'>
		<option value=''>"._MA_TADMENU_ROOT."</option>
		".get_tad_all_menu("","",$of_level,$menuid,"1")."</select>";
		$size=15;
		$url_size=30;
	}else{
    $main.="<input type='hidden' name='of_level' value='{$of_level}'>";
		$size=20;
		$url_size=40;
	}
	
	$main.="
	"._MA_TADMENU_ITEMNAME."<input type='text' name='itemname' size='{$size}' value='{$itemname}'>
	"._MA_TADMENU_ITEMURL."
	<input type='text' name='itemurl' size='{$url_size}' value='{$itemurl}'>
	
	<input type='hidden' name='menuid' value='{$menuid}'>
	<input type='hidden' name='op' value='{$op}'>
  <input type='submit' value='"._MA_SAVE."'>
  </form>";



	return $main;
}

//自動取得新排序
function get_max_sort($of_level=""){
	global $xoopsDB,$xoopsModule;
	$sql = "select max(position) from ".$xoopsDB->prefix("tad_menu")." where of_level='$of_level'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}


//新增資料到tad_menu中
function insert_tad_menu(){
	global $xoopsDB;
	$sql = "insert into ".$xoopsDB->prefix("tad_menu")." (`of_level`,`position`,`itemname`,`itemurl`,`membersonly`,`status`) values('{$_POST['of_level']}','{$_POST['position']}','{$_POST['itemname']}','{$_POST['itemurl']}','0','1')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	//取得最後新增資料的流水編號
	$menuid=$xoopsDB->getInsertId();
	return $menuid;
}

//列出所有tad_menu資料
function list_tad_menu($add_of_level="",$menuid=""){
	global $xoopsDB,$xoopsModule;
	$MDIR=$xoopsModule->getVar('dirname');


	$all=get_tad_level_menu("","",$menuid,"",$add_of_level);
	

	
	if($_GET['op']=="add_tad_menu" or $_GET['op']=="modify_tad_menu" or empty($all)){
		$form1= $form2 = $form3="";
		if($add_of_level==0 and $_GET['op']=="add_tad_menu"){
      $col_left=4;
			$option="<tr><td style='padding-left:{$col_left}px;' colspan=2;>".tad_menu_form($add_of_level)."</td></tr>";
		}
	}else{
		$form1="<form action='{$_SERVER['PHP_SELF']}' method='post'>";
		$form2="</form>";
		$form3="<input type='hidden' name='op' value='save_sort'>
  	<input type='submit' value='"._MA_TADMENU_SAVE_SORT."'></td>";
	}


	$all=(empty($all))?"<tr><td colspan=2>".tad_menu_form()."</td></tr>":$all;
	
	$data="
	<script>
	function delete_tad_menu_func(menuid){
		var sure = window.confirm('"._BP_DEL_CHK."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=delete_tad_menu&menuid=\" + menuid;
	}
	</script>
  $form1
	<table id='tbl' style='width:100%;'>
	<tr>
	<th>"._MA_TADMENU_POSITION."/"._MA_TADMENU_ITEMNAME."</th>
	<th>"._BP_FUNCTION."</th></tr>
	<tbody>
	<tr><td><a href='index.php?op=add_tad_menu&of_level=0'><img src='../images/001_01.gif' align='absmiddle' alt='".sprintf(_MA_TADMENU_ADDITEM,_MA_TADMENU_ROOT)."' title='".sprintf(_MA_TADMENU_ADDITEM,_MA_TADMENU_ROOT)."'></a> ".sprintf(_MA_TADMENU_ADDITEM,_MA_TADMENU_ROOT)."</td><td></tr></tr>
	$all
	$option
	<tr><td colspan=2 class='bar'>
	{$form3}</td></tr>
	</tbody>
	</table>
	$form2";

	$data=div_3d(_MA_INPUT_FORM,$data,"corners",'',"<a href='index.php?op=import' style='float:right;border:1px solid gray;background-color:white;padding:4px 6px;color:#990000;margin:6px;font-size:11pt;font-weight:normal;'>"._MA_TADMENU_IMPORT_MENU."</a><br style='clear:both;'/>");
	return $data;
}


//取得分類項目
function get_tad_level_menu($of_level=0,$level=0,$v="",$this_menuid="",$add_of_level="0"){
	global $xoopsDB,$xoopsUser,$xoopsModule;

	$left=$level*30;
	$font_size=16-($level*2);
	$level+=1;


  $left=(empty($left))?4:$left;

	$option="";
	$sql = "select `menuid`,`of_level`,`itemname`,`position`,`itemurl` from ".$xoopsDB->prefix("tad_menu")." where of_level='{$of_level}'  order by position";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($menuid,$of_level,$itemname,$position,$itemurl)=$xoopsDB->fetchRow($result)){

		$item=(empty($itemurl))?$itemname:"<a href='{$itemurl}'>$itemname</a>";
		
		$add_img=($level>=3)?"":"<a href='index.php?op=add_tad_menu&of_level={$menuid}'><img src='../images/001_01.gif' align='absmiddle' alt='".sprintf(_MA_TADMENU_ADDITEM,$itemname)."' title='".sprintf(_MA_TADMENU_ADDITEM,$itemname)."'></a>";
		
		if($_GET['op']=="modify_tad_menu" and $menuid==$v){
      $item=tad_menu_form("",$menuid);
	    $content="<td style='padding-left:{$left}px;' colspan=2>$item</td>";
		}else{
	    $content="<td style='padding-left:{$left}px;'><input type='text' name='sort[$menuid]' size=2 value='{$position}'>
			<span style='font-size:{$font_size}px;'>{$item}</span>
			$add_img
			</td>
			<td align='right'>
			<a href='{$_SERVER['PHP_SELF']}?op=modify_tad_menu&menuid=$menuid'>"._BP_EDIT."</a>
			<a href=\"javascript:delete_tad_menu_func($menuid);\">"._BP_DEL."</a></td>";
		}
		


		$option.="<tr>$content</tr>";

		
		
		$option.=get_tad_level_menu($menuid,$level,$v,$this_menuid,$add_of_level);

		if($add_of_level==$menuid){
		  $col_left=$level*30;
			$option.="<tr><td style='padding-left:{$col_left}px;' colspan=2;>".tad_menu_form($add_of_level)."</td></tr>";
		}
	}
	return $option;
}



//以流水號取得某筆tad_menu資料
function get_tad_menu($menuid=""){
	global $xoopsDB;
	if(empty($menuid))return;
	$sql = "select * from ".$xoopsDB->prefix("tad_menu")." where menuid='$menuid'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//更新tad_menu某一筆資料
function update_tad_menu($menuid=""){
	global $xoopsDB;
	$sql = "update ".$xoopsDB->prefix("tad_menu")." set  `of_level` = '{$_POST['of_level']}', `position` = '{$_POST['position']}', `itemname` = '{$_POST['itemname']}', `itemurl` = '{$_POST['itemurl']}', `membersonly` = '0', `status` = '1' where menuid='$menuid'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $menuid;
}

//刪除tad_menu某筆資料資料
function delete_tad_menu($menuid=""){
	global $xoopsDB;
	$sql = "delete from ".$xoopsDB->prefix("tad_menu")." where menuid='$menuid'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}


//取得分類下拉選單
function get_tad_all_menu($of_level=0,$level=0,$v="",$this_menuid="",$no_self="1"){
	global $xoopsDB,$xoopsUser,$xoopsModule;
	
 if($level>=2)return;

	//$left=$level*10;
	$blank=str_repeat("&nbsp;",$level*3);
	$level+=1;


	$option="";
	$sql = "select `menuid`,`of_level`,`itemname` from ".$xoopsDB->prefix("tad_menu")." where of_level='{$of_level}'  order by position";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($menuid,$of_level,$itemname)=$xoopsDB->fetchRow($result)){

	  if($no_self=='1' and $this_menuid==$menuid)continue;
		$selected=($v==$menuid)?"selected":"";
		$color=($level=='1')?"#330033":"#990099";
		$option.="<option value='{$menuid}' style=color:{$color};' $selected>{$blank}{$itemname}</option>";
		$option.=get_tad_all_menu($menuid,$level,$v,$this_menuid,$no_self);
	}
	return $option;
}

//儲存排序
function save_sort(){
	global $xoopsDB;
	foreach($_POST['sort'] as $menuid=>$position){
		$sql= "update ".$xoopsDB->prefix("tad_menu")." set  `position` = '{$position}' where menuid='{$menuid}'";
		$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	}
}


//自動匯入
function auto_import(){
	global $xoopsDB,$xoopsUser,$xoopsModule;

	$position=get_max_sort(0);
  $sql = "insert into ".$xoopsDB->prefix("tad_menu")." (`of_level`,`position`,`itemname`,`itemurl`,`membersonly`,`status`) values(0,'{$position}','"._MA_TADMENU_WEB_MENU."','','0','1')";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	//取得最後新增資料的流水編號
	$of_level=$xoopsDB->getInsertId();
	
	
	$sql = "select name,dirname from ".$xoopsDB->prefix("modules")." where isactive='1' and hasmain='1' order by weight";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($name,$dirname)=$xoopsDB->fetchRow($result)){
	 $position=get_max_sort($of_level);
    $sql = "insert into ".$xoopsDB->prefix("tad_menu")." (`of_level`,`position`,`itemname`,`itemurl`,`membersonly`,`status`) values('{$of_level}','{$position}','{$name}','".XOOPS_URL."/modules/{$dirname}/','0','1')";
  	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  }

	return;
}


/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];
$menuid = (!isset($_REQUEST['menuid']))? "":intval($_REQUEST['menuid']);
$of_level = (!isset($_REQUEST['of_level']))? "":intval($_REQUEST['of_level']);

switch($op){

	//更新資料
	case "update_tad_menu":
	update_tad_menu($menuid);
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//新增資料
	case "insert_tad_menu":
	insert_tad_menu();
	header("location: {$_SERVER['PHP_SELF']}");
	break;
	

	//刪除資料
	case "delete_tad_menu":
	delete_tad_menu($menuid);
	header("location: {$_SERVER['PHP_SELF']}");
	break;
	

	//新增項目
	case "add_tad_menu";
	$main=list_tad_menu($of_level,$menuid);
	break;
	
	//儲存排序
	case "save_sort":
	save_sort();
	header("location: {$_SERVER['PHP_SELF']}");
	break;

	//修改項目
	case "modify_tad_menu":
	$main=list_tad_menu($of_level,$menuid);
	break;
	

	//修改項目
	case "import":
	auto_import();
	header("location: {$_SERVER['PHP_SELF']}");
	break;


	//預設動作
	default:
	$main=mk_menu();
	$main.=list_tad_menu();
	break;


}

/*-----------秀出結果區--------------*/
module_admin_footer($main,1);
?>