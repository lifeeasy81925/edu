<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: tadnews_content_block.php,v 1.4 2008/06/25 06:36:39 tad Exp $
// ------------------------------------------------------------------------- //

//區塊主函式 (顯示新聞內容)
function tadnews_content_block_show($options){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption;

	include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";

  //高亮度語法
	$syntaxhighlighter_code="";
  if(file_exists(XOOPS_ROOT_PATH."/modules/tadtools/syntaxhighlighter.php")){
    include_once XOOPS_ROOT_PATH."/modules/tadtools/syntaxhighlighter.php";
    $syntaxhighlighter= new syntaxhighlighter();
    $syntaxhighlighter_code=$syntaxhighlighter->render();
  }
  
  $modhandler = &xoops_gethandler('module');
  $xoopsModule = &$modhandler->getByDirname("tadnews");
  $config_handler =& xoops_gethandler('config');
  $xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
  
  if($xoopsModuleConfig['use_star_rating']=='1'){
    include_once XOOPS_ROOT_PATH."/modules/tadtools/star_rating.php";
    $rating=new rating("tadnews","10",'show','simple');
  }
  
  
	chk_always_top();

	$num=$options[0];
  $start=empty($options[7])?0:intval($options[7]);

  $now=date("Y-m-d",xoops_getUserTimestamp(time()));
  $today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));

	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}
	//$del_js=b_del_tadnews_js();

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

	$top_order="";

	$ok_cate=implode(",",$ncsn_ok);
	$where_cate=(empty($ok_cate))?"and ncsn='0'":"and (ncsn in($ok_cate) or ncsn='0')";

	$sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' $where_cate and start_day < '{$today}' and (end_day > '{$today}' or end_day='0000-00-00 00:00:00') order by `always_top` desc , start_day desc limit {$start} , {$num}";

	$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());

	$i=2;
	$n=0;
	while($all_news=$xoopsDB->fetchArray($result)){
	  foreach($all_news as $k=>$v){
			$$k=$v;
		}
		if(!empty($ncsn) and !in_array($ncsn,$ncsn_ok))continue;
		//判斷本文之所屬分類是否允許該用戶之所屬群組觀看
		if(!block_chk_cate_power($ncsn,$User_Groups)){
			continue;
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

		$uid_name=XoopsUser::getUnameFromId($uid,0);

		$post_date=substr($start_day,0,10);
		$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";

		$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;


    if(empty($news_title)){
      $news_title=_MB_TADNEWS_NO_TITLE;
    }
    
    if(!empty($options[6])){
      $news_title=xoops_substr($news_title, 0, $options[6]);
    }
    
    
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
			//$news_content.=$files;

      if($options[3]==0){
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
			}else{
        $news_content=str_replace("<p>--summary--</p>","",$news_content);
        $news_content=str_replace("--summary--","",$news_content);
        $news_content=strip_tags($news_content);
        $news_content=str_replace("&nbsp;","",$news_content);
				$news_content=xoops_substr($news_content, 0, $options[3],"...(<a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>"._MB_TADNEW_SHOW_ALL."</a>)");
			}

		}

    $pic=get_news_doc_pic("news_pic",$nsn,"big", $options[5]);
    $news_content=$pic.$news_content;

    $uid_name=XoopsUser::getUnameFromId($uid,1);
    if(empty($uid_name)){
      $uid_name=XoopsUser::getUnameFromId($uid,0);
    }

    if($options[2]=="horizontal"){
      $display="display:block;float:left;margin:2px;";
    }else{
      $display="display:block;";
    }

    $sign_bg=(!empty($have_read_group))?"style='background-image:url(".XOOPS_URL."/modules/tadnews/images/sign_bg.png);background-position: right top;background-repeat: no-repeat;'":"";
    
    $prefix_tag=mk_prefix_tag($prefix_tag);
    $tadnews_files=get_tadnews_files($nsn);

    if($xoopsModuleConfig['use_star_rating']=='1'){
      $rating->add_rating("nsn",$nsn);
    }


    $page[$n]['sign_bg']=$sign_bg;
    $page[$n]['fun2']=$fun2;
    $page[$n]['npsn']=$npsn;
    $page[$n]['cate']=$cates[$ncsn];
    $page[$n]['start_day']=substr($start_day,0,10);
    $page[$n]['news_content']=$news_content;
    $page[$n]['prefix_tag']=$prefix_tag;
    $page[$n]['nsn']=$nsn;
    $page[$n]['title']=$news_title;
    $page[$n]['files']=$tadnews_files;
    $page[$n]['fun']=$fun;
    $page[$n]['uid_name']=$uid_name;
    $page[$n]['uid']=$uid;
    $page[$n]['width']=$options[1];
    $page[$n]['display']=$display;
    $page[$n]['font_style']=$options[4];
    if($xoopsModuleConfig['use_star_rating']=='1'){
      $page[$n]['star']="<div id='rating_nsn_{$nsn}'></div>";
    }else{
      $page[$n]['star']="";
    }
		$n++;
	}

	$rating_js=$rating->render();
	$block['page']=$page;
	$block['rating_js']=$rating_js;
	$block['syntaxhighlighter_code']=$syntaxhighlighter_code;
	return $block;
}

//區塊編輯函式
function tadnews_content_block_edit($options){
  $vertical=($options[2]=="vertical")?"checked":"";
  $horizontal=($options[2]=="horizontal")?"checked":"";
	$form="
	<table>
	<tr><th>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM0."
	</th><td>
	<INPUT type='text' name='options[0]' value='{$options[0]}' size=6>
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM1."
	</th><td>
	<INPUT type='text' name='options[1]' value='{$options[1]}' size=12>
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM2."
	</th><td>
	<INPUT type='radio' name='options[2]' value='vertical' $vertical>"._MB_TADNEW_CONTENT_BLOCK_EDIT_BITEM2_VAL1."
	<INPUT type='radio' name='options[2]' value='horizontal' $horizontal>"._MB_TADNEW_CONTENT_BLOCK_EDIT_BITEM2_VAL2."
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM3."
	</th><td>
	<INPUT type='text' name='options[3]' value='{$options[3]}' size=6>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM3_DESC."
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM4."
	</th><td>
	<textarea name='options[4]' style='width:400px;height:40px;font-family:Arial;font-size:13px;'>{$options[4]}</textarea>
	<div>ex: <span style='color:#0066CC;font-size:11px;'>font-size:11pt;line-height:150%;text-align:justify;color:#303030;</span></div>
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM5."
	</th><td>
	<textarea name='options[5]' style='width:400px;height:40px;font-family:Arial;font-size:13px;'>{$options[5]}</textarea>
	<div>ex: <span style='color:#0066CC;font-size:11px;'>width:210px;height:100px;border:1px solid gray;margin:0px auto 3px;float:left;margin:4px;</span></div>
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM6."
	</th><td>
	<INPUT type='text' name='options[6]' value='{$options[6]}' size=6>
	"._MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM6_DESC."
  </td></tr>
	<tr><th>
	"._MB_TADNEW_TADNEWS_START_FROM."
	</th><td>
	<INPUT type='text' name='options[7]' value='{$options[7]}' size=6>
  </td></tr>
	</table>";
	return $form;
}

?>
