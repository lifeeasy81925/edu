<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: tadnews_cate_news.php,v 1.1 2008/06/25 06:36:34 tad Exp $
// ------------------------------------------------------------------------- //
include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";

//區塊主函式 (顯示類別新聞)
function tadnews_cate_news($options){
	$block="<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadnews/module.css' />";
	$block.=list_block_cate_news($options[0],$options[1],$options[2],$options[3],$options[4],$options[5]);
	return $block;
}

//區塊編輯函式
function tadnews_cate_news_edit($options){
  $option=block_news_cate($options[0]);

	$form="{$option['js']}
	<table style='width:auto;'>
	<tr><th>1.</th><th>"._MB_TADNEWS_CATE_NEWS_EDIT_BITEM0."</th><td>{$option['form']}
	<INPUT type='hidden' name='options[0]' id='bb' value='{$options[0]}'></td></tr>
	<tr><th>2.</th><th>"._MB_TADNEWS_CATE_NEWS_EDIT_BITEM1."</th><td><INPUT type='text' name='options[1]' value='{$options[1]}' size=3></td></tr>
	<tr><th>3.</th><th>"._MB_TADNEWS_CATE_NEWS_EDIT_BITEM2."</th><td>
  <INPUT type='radio' name='options[2]' value='1' ".chk($options[2],1,"1").">"._YES."
  <INPUT type='radio' name='options[2]' value='0' ".chk($options[2],0).">"._NO."</td></tr>
  <tr><th>4.</th><th>"._MB_TADNEWS_CATE_NEWS_EDIT_BITEM3."</th><td>
  <INPUT type='radio' name='options[3]' value='1' ".chk($options[3],1,"1").">"._YES."
  <INPUT type='radio' name='options[3]' value='0' ".chk($options[3],0).">"._NO."</td></tr>
  <tr><th>5.</th><th>"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM1."</th><td>
	<INPUT type='text' name='options[4]' value='{$options[4]}'></td></tr>
  <tr><th>6.</th><th>"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM2."</th><td>
	<textarea name='options[5]' style='width:400px;height:50px;'>{$options[5]}</textarea>
  </td></tr>
	</table>
	";
	return $form;
}


//列出所有tad_news資料
function list_block_cate_news($show_ncsn=0,$show_num=5,$show_thumb=1,$show_line=1,$show_summary=0,$summary_css=""){
	global $xoopsDB,$xoopsModule,$xoopsUser;

	if(empty($show_ncsn)){
		$sql="select ncsn from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1' order by sort";
		$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br />$sql");
		while(list($ncsn)=$xoopsDB->fetchRow($result)){
		  $ncsn_arr[]=$ncsn;
		}
		$show_ncsn=implode(",",$ncsn_arr);
		if(empty($show_ncsn)){
			return "";
		}
	}



  //$now=date("Y-m-d");
  $now=date("Y-m-d",xoops_getUserTimestamp(time()));
	//$today=date("Y-m-d H:i:s");
	$today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));

	$sql="select ncsn,nc_title,enable_group,cate_pic from ".$xoopsDB->prefix("tad_news_cate")." where ncsn in({$show_ncsn}) order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br />$sql");
	
	$css=($show_line=="1")?"":"<style>table#tbl td.noline {
	border-bottom:0px solid rgb(192,192,192);
}</style>";

	$all_news="$css<table id='tbl' style='width:100%'>";

	while(list($ncsn,$nc_title,$enable_group,$cate_pic)=$xoopsDB->fetchRow($result)){
		//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
		if(!read_power_chk($ncsn,$enable_group)){
			continue;
		}
		$pic=(empty($cate_pic))?XOOPS_URL."/modules/tadnews/images/no_cover.png":XOOPS_URL."/uploads/tadnews/cate/{$cate_pic}";
		
		$show_pic=($show_thumb=='1')?"<td style='vertical-align:top;width:130px;'><a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}'><img src='{$pic}' align=left hspace=4 alt='{$nc_title}' title='{$nc_title}' class='cate_thumb'></a></td>":"";

    $all_news.="<tr>
    $show_pic
		<td colspan=2><a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn=$ncsn'><img src='".XOOPS_URL."/modules/tadnews/images/icon_more.gif' alt='more' title='more' align=right></a><div class='cate_title'><a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn=$ncsn'>{$nc_title}</a></div>
		<table style='width:100%'>";

		$sql2 = "select nsn,news_title,news_content,start_day,end_day,enable,uid,passwd,enable_group,counter,prefix_tag,always_top,have_read_group from ".$xoopsDB->prefix("tad_news")." where ncsn='{$ncsn}' and enable='1' and start_day < '{$today}' and (end_day > '{$today}' or end_day='0000-00-00 00:00:00') order by always_top desc , start_day desc limit 0,{$show_num}";
		$result2 = $xoopsDB->query($sql2) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
		while(list($nsn,$news_title,$news_content,$start_day,$end_day,$enable,$uid,$passwd,$enable_group,$counter,$prefix_tag,$always_top,$have_read_group)=$xoopsDB->fetchRow($result2)){
  		if(!empty($show_summary)){
        $news_content=strip_tags($news_content);
        $style=(empty($summary_css))?"":"style='{$summary_css}'";
        //支援xlanguage
        if(function_exists('xlanguage_ml')){
          $news_content=xlanguage_ml($news_content);
        }
        $content="<div $style>".xoops_substr($news_content , 0 , $show_summary , "...")."</div>";
      }else{
        $content="";
      }
      $need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";
		
			$end_day=($end_day=="0000-00-00 00:00:00")?"":"~ ".$end_day;
			$uid_name=XoopsUser::getUnameFromId($uid,0);
			$news_title=(empty($news_title))?_MD_TADNEWS_NO_TITLE:$news_title;
			$post_date=substr($start_day,0,10);
			$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";
			$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;
      $prefix_tag=mk_prefix_tag($prefix_tag);
	  	$all_news.="<tr><td style='width:100px;' nowrap class='noline'>$post_date</td><td class='noline'>{$prefix_tag}{$need_sign}{$always_top_pic} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>{$news_title}</a>{$content}</td></tr>";

		}
		$all_news.="</table>
		</td></tr>";

	}

	$all_news.="</table>";

	return $all_news;
}

//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
if(!function_exists("read_power_chk")){
	function read_power_chk($ncsn="",$enable_group=""){
		global $xoopsDB,$xoopsUser;

		//取得目前使用者的所屬群組
		if($xoopsUser){
			$User_Groups=$xoopsUser->getGroups();
		}else{
			$User_Groups=array();
		}

		//判斷本文之所屬分類是否允許該用戶之所屬群組觀看
		if(!chk_cate_power($news['ncsn'],$User_Groups)){
			return false;
		}

		//判斷本文是否允許該用戶之所屬群組觀看
		if(!chk_news_power($enable_group,$User_Groups)){
			return false;
		}

		return true;
	}
}

//判斷本文之所屬分類是否允許該用戶之所屬群組觀看或發佈
if(!function_exists("chk_cate_power")){
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
}

//以流水號取得某筆tad_news_cate資料
if(!function_exists("get_tad_news_cate")){
	function get_tad_news_cate($ncsn=""){
		global $xoopsDB;
		if(empty($ncsn))return;
		$sql = "select * from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='$ncsn'";
		$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
		$data=$xoopsDB->fetchArray($result);
		return $data;
	}
}


//判斷本文是否允許該用戶之所屬群組觀看或發佈
if(!function_exists("chk_news_power")){
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
}

//單選回復原始資料函數
if(!function_exists("chk")){
  function chk($DBV="",$NEED_V="",$defaul="",$return="checked"){
  	if($DBV==$NEED_V){
  		return $return;
  	}elseif(empty($DBV) && $defaul=='1'){
  		return $return;
  	}
  	return "";
  }
}

?>
