<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: tadnews_content_block.php,v 1.4 2008/06/25 06:36:39 tad Exp $
// ------------------------------------------------------------------------- //

//區塊主函式 (顯示新聞內容)
function tadnews_focus_news($options){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption;
	
	if(empty($options[0]))return "";

	include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";

	$cates=block_get_all_cate();
	$today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));
	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}
	
	
	$sql = "select a.nsn,a.ncsn,a.news_title,a.news_content,a.start_day,a.end_day,a.enable,a.uid,a.passwd,a.enable_group,a.counter,a.prefix_tag,a.always_top,have_read_group from ".$xoopsDB->prefix("tad_news")." as a left join ".$xoopsDB->prefix("tad_news_cate")." as b on a.ncsn=b.ncsn where a.nsn='{$options[0]}'";
	
	$result = $xoopsDB->query($sql);
	$block="<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadnews/module.css' />";
	list($nsn,$ncsn,$news_title,$news_content,$start_day,$end_day,$enable,$uid,$passwd,$enable_group,$counter,$prefix_tag,$always_top,$have_read_group)=$xoopsDB->fetchRow($result);
	if(!block_chk_cate_power($ncsn,$User_Groups)){
		return ;
	}
		
	//判斷本文是否允許該用戶之所屬群組觀看
	if(!empty($enable_group)){
		$ok=false;
		$news_enable_group=explode(",",$enable_group);
		foreach($User_Groups as $gid){
			if(in_array($gid,$news_enable_group)){
				$ok=true;
			}
		}
		if(!$ok)continue;
	}
		
		
	$post_date=substr($start_day,0,10);
	$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";

	$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;


	$fun=block_admin_tool($uid,$nsn,$counter);
	$end_day=($end_day=="0000-00-00 00:00:00")?"":"~ ".$end_day;
	
	if(!empty($passwd) and !in_array($nsn,$_SESSION['have_pass'])){
		$news_content="<form action='".XOOPS_URL."/modules/tadnews/index.php' method='post'><img src='".XOOPS_URL."/modules/tadnews/images/lock.png' align='absmiddle' hspace=4 alt='lock.png'>"._MB_TADNEW_NEWS_NEED_PASSWD."
		<input type='hidden' name='nsn' value='{$nsn}'>
		<input type='password' name='tadnews_passwd'>
		<input type='submit'>
		</form>";
	}else{
		//$files=b_get_news_files($nsn,0);
		$news_content.=$files;

    if(eregi("--summary--",$news_content)){
      //支援xlanguage
      if(function_exists('xlanguage_ml')){
        $news_content=xlanguage_ml($news_content);
      }
		  $news_content=str_replace("<p>--summary--</p>","--summary--",$news_content);
      $content=explode("--summary--",$news_content);
		}else{
			$content=explode("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>",$news_content);
		}
		
		
		
		$more=(empty($content[1]))?"":"<p><a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>"._MB_TADNEW_MORE."...</a></p>";
		$news_content=$content[0].$more;
	}
	

	$block=block_news_format($nsn,$news_title,$news_content,$fun,"",$prefix_tag,$uid,$ncsn,$cates[$ncsn],"$start_day $end_day","",$have_read_group,"","border:{$options[1]}px;");

	return $block;
}

//區塊編輯函式
function tadnews_focus_news_edit($options){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption;
	$cates=block_get_all_cate();
	$today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));

	$sql = "select a.nsn,a.ncsn,a.news_title,a.passwd,b.not_news from ".$xoopsDB->prefix("tad_news")." as a left join ".$xoopsDB->prefix("tad_news_cate")." as b on a.ncsn=b.ncsn where a.enable='1' and a.start_day < '{$today}' and (a.end_day > '{$today}' or a.end_day='0000-00-00 00:00:00')  order by a.start_day desc";

	$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());
  $option="<select name='options[0]'>";
	while(list($nsn,$ncsn,$news_title,$passwd,$not_news)=$xoopsDB->fetchRow($result)){
	  if($not_news=='1')continue;
		$selected=($options[0]==$nsn)?"selected":"";
		$cate=(empty($cates[$ncsn]))?_MB_TADNEWS_NO_CATE:$cates[$ncsn];
		$option.="<option value='$nsn' $selected>[{$cate}] $news_title</option>";
	}
	$option.="</select>";
	
	$checked1=($options[1]==1)?"checked":"";
	$checked0=($options[1]==0)?"checked":"";

	$form="<table style='width:auto;'>
	<tr><th>1.</th><th>"._MB_TADNEW_TADNEWS_FOCUS_EDIT_BITEM0."</th><td>$option</td></tr>
	<tr><th>2.</th><th>"._MB_TADNEW_TADNEWS_FOCUS_EDIT_BITEM1."</th><td>
	<input type='radio' name='options[1]' value='1' $checked1>"._MB_TADNEW_TADNEWS_YES."
	<input type='radio' name='options[1]' value='0' $checked0>"._MB_TADNEW_TADNEWS_NO."
	</td></tr></table>";
	return $form;
}


if(!function_exists("block_get_all_cate")){
	//取得所有類別標題
	function block_get_all_cate(){
		global $xoopsDB;
		$sql = "select ncsn,nc_title from ".$xoopsDB->prefix("tad_news_cate")." order by sort";
		$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

		while(list($ncsn,$nc_title)=$xoopsDB->fetchRow($result)){
			$data[$ncsn]=$nc_title;
		}
		return $data;
	}
}

if(!function_exists("block_chk_cate_power")){
	//判斷本文之所屬分類是否允許該用戶之所屬群組觀看
	function block_chk_cate_power($ncsn="",$User_Groups=array()){
		$cate=block_get_tad_news_cate($ncsn);
		$enable_group=$cate['enable_group'];
		if(!empty($enable_group)){
			$ok=false;
			$cate_enable_group=explode(",",$enable_group);
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
}

if(!function_exists("block_get_tad_news_cate")){
	//以流水號取得某筆tad_news_cate資料
	function block_get_tad_news_cate($ncsn=""){
		global $xoopsDB;
		if(empty($ncsn))return;
		$sql = "select * from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='$ncsn'";
		$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());
		$data=$xoopsDB->fetchArray($result);
		return $data;
	}
}


if(!function_exists("block_admin_tool")){
	//編輯工具
	function block_admin_tool($uid,$nsn,$counter=""){
		global $xoopsUser,$xoopsModule;

		if($xoopsUser){
			$uuid=$xoopsUser->getVar('uid');
			$modhandler = &xoops_gethandler('module');
		  $xoopsModule = &$modhandler->getByDirname("tadnews");
			$module_id = $xoopsModule->getVar('mid');
	    $isAdmin=$xoopsUser->isAdmin($module_id);
		}else{
			$uuid="";
			$isAdmin="";
		}

		//不是本人或網管就不秀出工具
		if($uid!=$uuid and !$isAdmin)return "";


		$fun="<div>
		<a href='".XOOPS_URL."/modules/tadnews/post.php'>"._MB_TADNEW_ADD."</a> |
		<a href='".XOOPS_URL."/modules/tadnews/post.php?op=tad_news_form&nsn=$nsn'>"._MB_TADNEW_EDIT."</a> |
		<a href=\"javascript:delete_tad_news_func($nsn);\">"._MB_TADNEW_DEL."</a> |
		"._MB_TADNEW_HOT."{$counter}
		</div>";
		return $fun;
	}
}

if(!function_exists("block_news_format")){
  function block_news_format($nsn="",$title="",$news_content="",$fun="",$fun2="",$prefix_tag="",$uid="",$ncsn="",$cate="",$start_day="",$files="",$have_read_group="",$have_read_chk="",$style=""){
    
	$uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;
    $sign_bg=(!empty($have_read_group))?"style='background-image:url(".XOOPS_URL."/modules/tadnews/images/sign_bg.png);background-position: right top;background-repeat: no-repeat;'":"";

    $prefix_tag=mk_prefix_tag($prefix_tag);
    $main="
    <div id='clean_news' style='{$style}'>
      <div id='news_head' $sign_bg>
         <div id='news_title'>{$prefix_tag} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>{$title}</a></div>
         <div id='news_toolbar'>$fun</div>
         <div id='news_info'>
         <a href='".XOOPS_URL."/userinfo.php?uid={$uid}'>{$uid_name}</a> - <a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}'>{$cate}</a> | {$start_day}
         </div>
      </div>

      <div id='news_content'>{$news_content}</div>
      $have_read_chk
      $files
      <div style='clear:both;height:10px;'></div>
      <div id='news_toolbar'>{$fun2}</div>
    </div>
    <div style='clear:both;'></div>";
  	return $main;
  }
}
?>
