<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: function.php,v 1.5 2008/07/03 07:15:41 tad Exp $
// ------------------------------------------------------------------------- //

include_once "block_function.php";

//引入TadTools的函式庫
if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php")){
  redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";

define("_SEPARTE","<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>");
define("_SEPARTE2","--summary--");
define("_TADNEWS_FILE_DIR",XOOPS_ROOT_PATH."/uploads/tadnews");
define("_TADNEWS_UP_FILE_PATH",XOOPS_ROOT_PATH."/uploads/tadnews/file");
define("_TADNEWS_UP_FILE_URL",XOOPS_URL."/uploads/tadnews/file");
define("_TADNEWS_NSP_THEMES_PATH",XOOPS_ROOT_PATH."/uploads/tadnews/themes");
define("_TADNEWS_NSP_THEMES_URL",XOOPS_URL."/uploads/tadnews/themes");
define("_TADNEWS_CATE_DIR",XOOPS_ROOT_PATH."/uploads/tadnews/cate");
define("_TADNEWS_CATE_URL",XOOPS_URL."/uploads/tadnews/cate");

define("_TAD_NEWS_ERROR_LEVEL",1);

include_once XOOPS_ROOT_PATH."/modules/tadnews/class/tadnews.php";

//自動取得新排序
function get_max_sort($of_ncsn=""){
	global $xoopsDB,$xoopsModule;
	$sql = "select max(sort) from ".$xoopsDB->prefix("tad_news_cate")." where of_ncsn='$of_ncsn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}


//錯誤顯示方式
function show_error($sql=""){
	if(_TAD_NEWS_ERROR_LEVEL==1){
		return mysql_error().$sql;
	}elseif(_TAD_NEWS_ERROR_LEVEL==2){
		return mysql_error();
	}elseif(_TAD_NEWS_ERROR_LEVEL==3){
		return "sql error";
	}
	return;
}

//檢查置頂時間
function chk_always_top(){
	global $xoopsDB,$xoopsUser;
  $now=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));
	$sql="update ".$xoopsDB->prefix("tad_news")." set always_top='0' WHERE always_top_date <='{$now}' and always_top_date!='0000-00-00 00:00:00'";
	$xoopsDB->queryF($sql);
}





//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
function read_power_chk($ncsn="",$enable_group=""){
	global $xoopsDB,$xoopsUser;

	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}

	//判斷本文之所屬分類是否允許該用戶之所屬群組觀看
	if(!chk_cate_power($ncsn,$User_Groups)){
		return false;
	}

	//判斷本文是否允許該用戶之所屬群組觀看
	if(!chk_news_power($enable_group,$User_Groups)){
		return false;
	}

	return true;
}
	
//判斷本文是否該用戶需簽收
function have_read_chk($have_read_group="",$nsn=""){
	global $xoopsDB,$xoopsUser;

	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
		$uid=$xoopsUser->getVar('uid');
	}else{
     //未登入者什麼也不秀出來
		return;
	}

	if(!empty($have_read_group)){

		$have_read_group_arr=explode(",",$have_read_group);

		foreach($User_Groups as $gid){

			if(in_array($gid,$have_read_group_arr)){
         $time=chk_sign_status($uid,$nsn);
         if(!empty($time)){
           $main="<div style='width:80%;margin:8px auto;border:1px solid #404040;padding:10px;background-color:#FFFF99;text-align:center;'>".sprintf(_MD_TADNEW_SIGN_OK,$time)."</div>";
         }else{
           $main="
           <form action='index.php' method='post'>
           <div style='width:80%;margin:8px auto;padding:10px;background-color:#F9F9F9;text-align:center;'>
           <input type='hidden' name='nsn' value='$nsn'>
           <input type='hidden' name='uid' value='$uid'>
           <input type='hidden' name='op' value='have_read'>
           <input type='submit' value='"._MD_TADNEW_I_HAVE_READ."'>
           </div>
           </form>";
         }
         return $main;
			}
		}
	}
	
   //不需簽收
	return;
}


//判斷本文之所屬分類是否允許該用戶之所屬群組觀看或發佈
function chk_cate_power($ncsn="",$User_Groups="",$kind="read"){
	global $xoopsDB,$xoopsUser;

	$cate=get_tad_news_cate($ncsn);
	$enable_group=($kind=="post")?$cate['enable_post_group']:$cate['enable_group'];


	if(!empty($enable_group)){
		$ok=false;
		$cate_enable_group=explode(",",$enable_group);
		if(in_array("",$cate_enable_group)){
      return true;
		}

		foreach($User_Groups as $gid){
			if(in_array($gid,$cate_enable_group)){
				return true;
			}
		}
	}else{
		return true;
	}
	return false;
}

//判斷本文是否允許該用戶之所屬群組觀看或發佈
function chk_news_power($enable_group="",$User_Groups=""){
	global $xoopsDB,$xoopsUser;

	if(empty($enable_group))return true;

	$news_enable_group=explode(",",$enable_group);
	foreach($User_Groups as $gid){
		if(in_array($gid,$news_enable_group)){
			return true;
		}
	}

	return false;
}

//解析分類的設定檔
function get_setup($setup=""){
	if(empty($setup))return "";
	$set=explode(";",$setup);
	foreach($set as $s){
		$ss=explode("=",$s);
		$key=$ss[0];
		$val=$ss[1];
		$all[$key]=$val;
	}
	return $all;
}

//圓角文字框
function div_3d($title="",$main="",$kind="raised",$style="",$other=""){

  	$main="<table style='width:auto;{$style}'><tr><td>
  	<div class='{$kind}'>
  	<h1>$title</h1>
  	$other
  	<b class='b1'></b><b class='b2'></b><b class='b3'></b><b class='b4'></b>
  	<div class='boxcontent'>
   	$main
  	</div>
  	<b class='b4b'></b><b class='b3b'></b><b class='b2b'></b><b class='b1b'></b>
  	</div>
  	</td></tr></table>";

	return $main;
}

//新聞頁面
function news_format($nsn="",$title="",$news_content="",$fun="",$fun2="",$prefix_tag="",$uid="",$ncsn="",$cate="",$start_day="",$files="",$have_read_group="",$have_read_chk="",$style=""){
  global $xoopsModuleConfig;

  $uid_name=XoopsUser::getUnameFromId($uid,1);
  $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;

  $sign_bg=(!empty($have_read_group))?"style='background-image:url(".XOOPS_URL."/modules/tadnews/images/sign_bg.png);background-position: right top;background-repeat: no-repeat;'":"";

  $prefix_tag=mk_prefix_tag($prefix_tag);

  if($xoopsModuleConfig['use_star_rating']=='1'){
    $show=empty($_GET['nsn'])?"show":"";
    include_once XOOPS_ROOT_PATH."/modules/tadtools/star_rating.php";
    $rating=new rating("tadnews","10",$show,"simple");
    $rating->add_rating("nsn",$nsn);
  	$star_rating=$rating->render();
  	$star_rating.="<div id='rating_nsn_{$nsn}'></div><div id='rating_result_nsn_{$nsn}'></div>";
	}

	$pic=get_news_doc_pic("news_pic",$nsn,"big","db");
	
  $main="
  <div id='clean_news' style='{$style}'>
    <div id='news_head' $sign_bg>
       <div id='news_title'>{$prefix_tag} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>{$title}</a></div>
       <div id='news_toolbar'>$fun</div>
       <div id='news_info'>
       <div style='float:right;margin-right:10px;'>$star_rating</div>
       <a href='".XOOPS_URL."/userinfo.php?uid={$uid}'>{$uid_name}</a> - <a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}'>{$cate}</a> | {$start_day}
       </div>
    </div>

    <div id='news_content'>{$pic}{$news_content}</div>
    $have_read_chk
    $files
    <div style='clear:both;height:10px;'></div>
    <div id='news_toolbar'>{$fun2}</div>
  </div>
  <div style='clear:both;'></div>";
	return $main;
}


//身份查核
function chk_who($author_id=""){
	global $xoopsDB,$xoopsUser,$xoopsModule;
	if(empty($xoopsUser))return false;

  $module_id = $xoopsModule->getVar('mid');
  $isAdmin=$xoopsUser->isAdmin($module_id);
  if($isAdmin)return true;

	$uid=$xoopsUser->getVar('uid');
  if($uid==$author_id) return true;

  return false;
}


//取得電子報設定資料
function get_newspaper_set($nps_sn=""){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;
	$sql = "select * from ".$xoopsDB->prefix("tad_news_paper_setup")." where nps_sn='{$nps_sn}'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得電子報資料
function get_newspaper($npsn=""){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;
	$sql = "select * from ".$xoopsDB->prefix("tad_news_paper")." where npsn='{$npsn}'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}


//預覽電子報
function preview_newspaper($npsn=""){
	global $xoopsDB;
	if(empty($npsn))return;
	$np=get_newspaper($npsn);
	$sql = "select title,head,foot,themes from ".$xoopsDB->prefix("tad_news_paper_setup")." where nps_sn='{$np['nps_sn']}'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($title,$head,$foot,$themes)=$xoopsDB->fetchRow($result);

	$head=str_replace('{N}',$np['number'],$head);
	$head=str_replace('{D}',substr($np['np_date'],0,10),$head);

	$filename = _TADNEWS_NSP_THEMES_PATH."/{$themes}/index.html";
	$handle = fopen($filename, "rb");
	$contents = '';
	while (!feof($handle)) {
	  $contents .= fread($handle, 8192);
	}
	fclose($handle);
	$main=str_replace("{TNP_THEME}",_TADNEWS_NSP_THEMES_URL."/{$themes}/",$contents);
	$main=str_replace("{TNP_CSS}","<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadnews/module.css' />",$main);
	$main=str_replace("{TNP_TITLE}",$title,$main);
	$char=_CHARSET;
	$main=str_replace("{TNP_CODE}",$char,$main);
	$main=str_replace("{TNP_HEAD}",$head,$main);
	$main=str_replace("{TNP_FOOT}",$foot,$main);
	$main=str_replace("{TNP_URL}",XOOPS_URL."/modules/tadnews/newspaper.php?npsn={$npsn}",$main);
	$main=str_replace("{TNP_CONTENT}",$np['np_content'],$main);
	return $main;
}




//取得所有類別標題
function get_all_news_cate(){
	global $xoopsDB;
	$sql = "select ncsn,nc_title from ".$xoopsDB->prefix("tad_news_cate")." order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($ncsn,$nc_title)=$xoopsDB->fetchRow($result)){
		$data[$ncsn]=$nc_title;
	}
	return $data;
}

//取得所有群組
function get_all_groups(){
	global $xoopsDB;
	$sql = "select groupid,name from ".$xoopsDB->prefix("groups")."";
	$result = $xoopsDB->query($sql);
	while(list($groupid,$name)=$xoopsDB->fetchRow($result)){
		$data[$groupid]=$name;
	}
	return $data;
}


//把字串換成群組
function txt_to_group_name($enable_group="",$default_txt="",$syb="<br />"){
	$groups_array=get_all_groups();
	if(empty($enable_group)){
    $g_txt=$default_txt;
	}else{
	  $gs=explode(",",$enable_group);
	  $g_txt="";
	  foreach($gs as $gid){
    	$g_txt.=$groups_array[$gid]."{$syb}";
		}
	}
	return $g_txt;
}





//刪除tad_news某筆資料資料
function delete_tad_news($nsn=""){
	global $xoopsDB,$xoopsUser,$xoopsModule;

	//確認有管理員或本人才能管理
	$news=get_tad_news($nsn);
	if(!chk_who($news['uid'])){
		redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_NO_ADMIN_POWER);
	}
	
	$sql = "delete from ".$xoopsDB->prefix("tad_news")." where nsn='$nsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	
	//刪除檔案
	del_files("","nsn",$nsn);
}


//刪除的js
function del_js(){
	$js="<script>
	function delete_tad_news_func(nsn){
		var sure = window.confirm('"._MD_TADNEW_SURE_DEL."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=delete_tad_news&nsn=\" + nsn;
	}
	</script>";
	return $js;
}


//以流水號取得某筆tad_news_cate資料
function get_tad_news_cate($ncsn=""){
	global $xoopsDB;
	if(empty($ncsn))return;
	$sql = "select * from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='$ncsn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}




//輸出為UTF8
function to_utf8($buffer=""){
	if(_CHARSET=="UTF-8"){
		return $buffer;
	}else{
  	$buffer=iconv(_CHARSET,"UTF-8",$buffer);
  	return $buffer;
	}
}


//取得附檔
function get_news_files($nsn="",$mode=""){
  global $xoopsUser,$xoopsModuleConfig;
	//取得目前使用者的所屬群組
	if($xoopsUser){
		$reader_uid=$xoopsUser->getVar('uid');
	}else{
		$reader_uid="";
	}
  $files=show_files("nsn",$nsn,true,$mode);
  $news=get_tad_news($nsn);
	if($xoopsModuleConfig['download_after_read']=='1' and !empty($news['have_read_group'])){
    $time=chk_sign_status($reader_uid,$nsn);
    if(empty($time) and !empty($files)){
      $files=($mode=="filename")?_MD_TADNEW_DOWNLOAD_AFTER_READ:"<div style='width:80%; margin:8px auto;border:1px solid #404040; padding:10px;background-color:#CCCCFF; text-align:center;'>"._MD_TADNEW_DOWNLOAD_AFTER_READ."</div>";
    }
  }

  return $files;
}

/********************* 預設函數 *********************/

//取得分類下拉選單
function get_tad_news_cate_option($of_ncsn=0,$level=0,$v="",$this_ncsn="",$no_self="0",$not_news="null"){
	global $xoopsDB,$xoopsUser,$xoopsModule;

	if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
  }else{
    $isAdmin=false;
	}

	$ok_cat=chk_cate_post_power();

	$left=$level*10;
	$level+=1;

	$and_not_news=($not_news!="null")?"and not_news='{$not_news}'":"";


	$option=($of_ncsn or !$isAdmin)?"":"<option value='0'></option>";
	$option=="";
	$sql = "select ncsn,nc_title,not_news from ".$xoopsDB->prefix("tad_news_cate")." where of_ncsn='{$of_ncsn}' $and_not_news order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($ncsn,$nc_title,$not_news)=$xoopsDB->fetchRow($result)){
	
	  if($no_self=='1' and $this_ncsn==$ncsn)continue;
		$selected=($v==$ncsn)?"selected":"";
		$color=($not_news=='1')?"red":"black";
		$option.=(!in_array($ncsn,$ok_cat))?"":"<option value='{$ncsn}' style='padding-left: {$left}px;color:{$color};' $selected>{$nc_title}</option>";
		$option.=get_tad_news_cate_option($ncsn,$level,$v,$this_ncsn,$no_self,$not_news);
	}
	return $option;
}

//判斷目前登入者在哪些類別中有發表的權利
function chk_cate_post_power($kind="post"){
	global $xoopsDB,$xoopsUser,$xoopsModule;
	if(empty($xoopsUser))return false;

  $module_id = $xoopsModule->getVar('mid');
  $isAdmin=$xoopsUser->isAdmin($module_id);
	if($isAdmin){
    $ok_cat[]="";
	}
	$user_array=$xoopsUser->getGroups();

	$col=($kind=="post")?"enable_post_group":"enable_group";

	//非管理員才要檢查
	$where=($isAdmin)?"":"where $col!=''";

	$sql = "select ncsn,{$col} from ".$xoopsDB->prefix("tad_news_cate")." $where";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($ncsn,$power)=$xoopsDB->fetchRow($result)){
	  if($isAdmin){
      $ok_cat[]=$ncsn;
		}else{
			$power_array=explode(",",$power);
			foreach($power_array as $gid){
				if(in_array($gid,$user_array)){
					$ok_cat[]=$ncsn;
					break;
				}
			}
		}
	}
	return $ok_cat;
}

?>
