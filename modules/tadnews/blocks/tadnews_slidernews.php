<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: tadnews_newspaper_list.php,v 1.1 2008/04/10 05:29:56 tad Exp $
// ------------------------------------------------------------------------- //

//區塊主函式 (滑動新聞)
function tadnews_slidernews_show($options){
	global $xoopsDB,$xoopsUser;
	
  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/lofslidernews.php")){
  	redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
  include_once XOOPS_ROOT_PATH."/modules/tadtools/lofslidernews.php";

	include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";


	chk_always_top();


  $now=date("Y-m-d",xoops_getUserTimestamp(time()));
  $today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));

	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}

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

	$sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' $where_cate and start_day < '{$today}' and (end_day > '{$today}' or end_day='0000-00-00 00:00:00') order by  `always_top` desc , start_day desc";

	$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());


  $lofslidernews=new lofslidernews($options[0],$options[1],$options[3]);

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


    $tadnews_files=get_tadnews_files($nsn);

    $uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;

		$post_date=substr($start_day,0,10);

		$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";

		$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;


    if(empty($news_title)){
      $news_title=_MB_TADNEWS_NO_TITLE;
    }

    $image=get_news_doc_pic("news_pic",$nsn,"big","",true);

    $need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";

    //支援xlanguage
    if(function_exists('xlanguage_ml')){
      $news_content=xlanguage_ml($news_content);
    }
    
    $prefix_tag=mk_prefix_tag($prefix_tag);
    $title=$news_title;
    $lofslidernews->add_content($nsn,$title,$news_content,$image,$start_day,XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}");
    $n++;
    if($n>=$options[2])break;
	}

	$block=$lofslidernews->render();

	return $block;
}

//區塊編輯函式
function tadnews_slidernews_edit($options){


	$form="
	<table style='width:auto;'>
	<tr><th>
	"._MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM0."
	</th><td>
	<INPUT type='text' name='options[0]' value='{$options[0]}' size=6>px
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM1."
	</th><td>
	<INPUT type='text' name='options[1]' value='{$options[1]}' size=6>px
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM2."
	</th><td>
	<INPUT type='text' name='options[2]' value='{$options[2]}' size=6>
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM3."
	</th><td>
	<INPUT type='text' name='options[3]' value='{$options[3]}' size=6>
  </td></tr>
	</table>
	";
	return $form;
}

?>