<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: tag.php,v 1.3 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "admin_header.php";
include_once "admin_function.php";

/*-----------function區--------------*/
//tad_news_tagss編輯表單
function list_tad_news_tags($def_tag_sn=""){
	global $xoopsDB;
	$all="";
	$sql = "select * from ".$xoopsDB->prefix("tad_news_tags")."";
	$result = $xoopsDB->query($sql) or redirect_header("index.php",3,mysql_error());
	while(list($tag_sn,$tag,$color,$enable)=$xoopsDB->fetchRow($result)){
	  $prefix_tag=mk_prefix_tag($tag_sn);
	  $del=($enable=='1')?"<a href='tag.php?op=stat&enable=0&tag_sn=$tag_sn'>"._MA_TADNEW_TAG_UNABLE."</a>":"<a href='tag.php?op=stat&enable=1&tag_sn=$tag_sn'>"._MA_TADNEW_TAG_ABLE."</a>";
	  $tool="<a href='tag.php?tag_sn=$tag_sn'>"._MA_TADNEW_EDIT."</a> | $del";
	  $enable_txt=($enable=='1')?_YES:_NO;
    $all.=($def_tag_sn==$tag_sn)?"
    <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
    <tr>
      <td>$prefix_tag</td>
      <td><input type='text' name='tag' value='{$tag}' size=10></td>
      <td><input type='text' name='color' value='{$color}' id='color' class='izzyColor' size=10></td>
      <td>
      <input type='radio' name='enable' value='1' ".chk($enable,'1','1').">"._YES."
      <input type='radio' name='enable' value='0' ".chk($enable,'0').">"._NO."</td>
      <td>
    	<input type='hidden' name='tag_sn' value='{$tag_sn}'>
      <input type='hidden' name='op' value='update_tad_news_tags'>
      <input type='submit' value='"._MA_TADNEW_SAVE_CATE."'></td></tr>
      </form>\n":"<tr><td>$prefix_tag</td><td>$tag</td><td>$color</td><td>$enable_txt</td><td>$tool</td></tr>\n";
  }


  $jquery_path=get_jquery(true);
	
	$main="
	$jquery_path
  <script type='text/javascript' src='".XOOPS_URL."/modules/tadnews/class/izzyColor/izzyColor.js' charset='UTF-8'></script>
  <script type=\"text/javascript\">
  var imageUrl='".XOOPS_URL."/modules/tadnews/class/izzyColor/editor_images/color.png'; // optionally, you can change path for images.
  </script>
  <table id='tbl'>
  <tr>
    <th>"._MA_TADNEW_TAG_DEMO."</th>
    <th>"._MA_TADNEW_TAG_TITLE."</th>
    <th>"._MA_TADNEW_TAG_COLOR."</th>
    <th>"._MA_TADNEW_TAG_ENABLE."</th>
    <th>"._MA_TADNEW_TAG_FUNC."</th>
  </tr>
    <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
    <tr>
      <td style='background-color:#CCCCCC'>"._MA_TADNEW_TAG_NEW."</td>
      <td style='background-color:#CCCCCC'><input type='text' name='tag' value='{$tag}' size=10></td>
      <td style='background-color:#CCCCCC'><input type='text' name='color' value='{$color}' id='color2' class='izzyColor' size=10></td>
      <td style='background-color:#CCCCCC'>
      <input type='radio' name='enable' value='1' ".chk($enable,'1','1').">"._YES."
      <input type='radio' name='enable' value='0' ".chk($enable,'0').">"._NO."</td>
      <td style='background-color:#CCCCCC'>
      <input type='hidden' name='op' value='insert_tad_news_tags'>
      <input type='submit' value='"._MA_TADNEW_SAVE_CATE."'></td></tr>
      </form>
	$all
	</table>

	";
  
  $main=div_3d('',$main,"corners");
	return $main;
}

function insert_tad_news_tags(){
	global $xoopsDB;

	$sql = "insert into ".$xoopsDB->prefix("tad_news_tags")."  (`tag` , `color` , `enable`) values('{$_POST['tag']}', '{$_POST['color']}', '{$_POST['enable']}') ";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}

function update_tad_news_tags($tag_sn){
	global $xoopsDB;

	$sql = "update ".$xoopsDB->prefix("tad_news_tags")."  set  tag = '{$_POST['tag']}',color = '{$_POST['color']}',enable = '{$_POST['enable']}' where tag_sn='{$tag_sn}'";

	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}



function tad_news_tags_stat($enable,$tag_sn){
	global $xoopsDB;

	$sql = "update ".$xoopsDB->prefix("tad_news_tags")."  set enable = '{$enable}' where tag_sn='{$tag_sn}'";

	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}
/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];
$tag_sn = (!isset($_REQUEST['tag_sn']))? "":intval($_REQUEST['tag_sn']);

switch($op){

	//新增資料
	case "insert_tad_news_tags":
	$tag_sn=insert_tad_news_tags();
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//更新資料
	case "update_tad_news_tags";
	update_tad_news_tags($tag_sn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//刪除資料
	case "stat";
	tad_news_tags_stat($_GET['enable'],$tag_sn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	

	
	default:
	$main=list_tad_news_tags($tag_sn);
	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
admin_toolbar(7);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();

?>
