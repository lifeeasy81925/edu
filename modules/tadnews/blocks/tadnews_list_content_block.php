<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: tadnews_content_block.php,v 1.4 2008/06/25 06:36:39 tad Exp $
// ------------------------------------------------------------------------- //
include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";

//區塊主函式 (顯示新聞內容)
function tadnews_list_content_block_show($options){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption;

	chk_always_top();
	
	$num=$options[0];
  $start=empty($options[6])?0:intval($options[6]);
  
  $now=date("Y-m-d",xoops_getUserTimestamp(time()));
  $today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));
  
	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}
	/*
	$sql="select ncsn,nc_title from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	while(list($ncsn,$nc_title)=$xoopsDB->fetchRow($result)){
		//判斷本文之所屬分類是否允許該用戶之所屬群組觀看
		if(!block_chk_cate_power($ncsn,$User_Groups)){
			continue;
		}
		$ncsn_ok[]=$ncsn;
		$cates[$ncsn]=$nc_title;
	}


 	$ok_cate=implode(",",$ncsn_ok);
	$where_cate=(empty($ok_cate))?"and ncsn='0'":"and (ncsn in($ok_cate) or ncsn='0')";
	*/
	
	$show_ncsn=$options[7];
	if(empty($show_ncsn)){
		$sql="select ncsn from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1' order by sort";
		$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br />$sql");
		while(list($ncsn)=$xoopsDB->fetchRow($result)){		//判斷本文之所屬分類是否允許該用戶之所屬群組觀看
      //判斷本文之所屬分類是否允許該用戶之所屬群組觀看
      if(block_chk_cate_power($ncsn,$User_Groups))	  $ncsn_arr[]=$ncsn;
		}
		$show_ncsn=implode(",",$ncsn_arr);
		if(empty($show_ncsn)){
			return "";
		}
	}

	$sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' and ncsn in({$show_ncsn})  and start_day < '{$today}' and (end_day > '{$today}' or end_day='0000-00-00 00:00:00') order by  `always_top` desc , start_day desc limit {$start} , {$num}";

	$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());

	
	$i=2;
	while($all_news=$xoopsDB->fetchArray($result)){
	  foreach($all_news as $k=>$v){
			$$k=$v;
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
		

    $tadnews_files=get_tadnews_files($nsn);
  
    $uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;
		
		$post_date=substr($start_day,0,10);
		
		$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";

		$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;
		

    if(empty($news_title)){
      $news_title=_MB_TADNEWS_NO_TITLE;
    }
    if(!empty($options[3])){
      $news_title=xoops_substr($news_title , 0 , $options[3] , "...");
    }

    $pic=$none='';
    if($options[4]=='1'){
      $pic=get_news_doc_pic("news_pic",$nsn,"thumb",$options[5]);
      $none="list-style-type:none;";
    }
    
    $need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";
    
    if(!empty($options[1])){
      $news_content=strip_tags($news_content);
      $style=(empty($options[2]))?"":"style='{$options[2]}'";
      //支援xlanguage
      if(function_exists('xlanguage_ml')){
        $news_content=xlanguage_ml($news_content);
      }
      $content="<div $style>".xoops_substr($news_content , 0 , $options[1] , "...")."</div>";
    }else{
      $content="";
    }
    $prefix_tag=mk_prefix_tag($prefix_tag);
    
		$block_li.="<li style='{$none}margin-bottom:10px;padding-bottom:3px;border-bottom:1px dotted gray;'>{$pic}{$prefix_tag}{$need_sign}{$always_top_pic} <a href=\"".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}\">$news_title</a>{$tadnews_files}
    {$content}<div style='clear:both;'></div></li>\n";
		
	}
	
	if(empty($block_li))return;

  $block="<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadnews/module.css' />\n<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadnews/reset.css' />
  <ul>
    $block_li
  </ul>
  <div align='right' style='font-size:11px;'><a href='".XOOPS_URL."/modules/tadnews/'>[more...]</a></div>";

	return $block;
}

//區塊編輯函式
function tadnews_list_content_block_edit($options){

  $options4_1=($options[4]=="1")?"checked":"";
  $options4_0=($options[4]=="0")?"checked":"";

  $option=block_news_cate($options[7]);

	$form="{$option['js']}
	<table>
	<tr><th>
	"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM0."
	</th><td>
	<INPUT type='text' name='options[0]' value='{$options[0]}' size=6>
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM1."
	</th><td>
	<INPUT type='text' name='options[1]' value='{$options[1]}' size=6>"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM1_DESC."
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM2."
	</th><td>
	<textarea name='options[2]' style='width:400px;height:40px;font-family:Arial;font-size:13px;'>{$options[2]}</textarea>
	<div>ex: <span style='color:#0066CC;font-size:11px;'>color:gray;font-size:11px;margin-top:3px;line-height:150%;</span></div>
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM3."
	</th><td>
	<INPUT type='text' name='options[3]' value='{$options[3]}' size=6>"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM3_DESC."
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM4."
	</th><td>
	<INPUT type='radio' name='options[4]' value='1' $options4_1>"._YES."
	<INPUT type='radio' name='options[4]' value='0' $options4_0>"._NO."
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM5."
	</th><td>
	<textarea name='options[5]' style='width:400px;height:40px;font-family:Arial;font-size:13px;'>{$options[5]}</textarea>
	<div>ex: <span style='color:#0066CC;font-size:11px;'>width:60px;height:30px;float:left;border:1px solid #9999CC;margin:0px 4px 4px 0px;</span></div>
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_START_FROM."
	</th><td>
	<INPUT type='text' name='options[6]' value='{$options[6]}' size=6>
  </td></tr>
	<tr><th>"._MB_TADNEWS_CATE_NEWS_EDIT_BITEM0."</th><td>{$option['form']}
	<INPUT type='hidden' name='options[7]' id='bb' value='{$options[7]}'></td></tr>
	</table>
	";
	return $form;
}

?>
