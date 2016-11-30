<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: index.php,v 1.4 2008/06/25 06:36:09 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "header.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/up_file.php";
/*-----------function區--------------*/


//列出所有tad_news資料
function list_tad_all_news($the_ncsn=""){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption,$xoopsModuleConfig;

  //高亮度語法
	$syntaxhighlighter_code="";
  if(file_exists(TADTOOLS_PATH."/syntaxhighlighter.php")){
    include_once TADTOOLS_PATH."/syntaxhighlighter.php";
    $syntaxhighlighter= new syntaxhighlighter();
    $syntaxhighlighter_code=$syntaxhighlighter->render();
  }
  
	$xoopsOption['template_main'] = "list_tpl.html";

	$tadnews=new tadnews();
	$tadnews->set_show_num($xoopsModuleConfig['show_num']);

	if($the_ncsn>0){
		$tadnews->set_view_ncsn($the_ncsn);
		$tadnews->set_show_mode($xoopsModuleConfig['cate_show_mode']);
	}else{
		$tadnews->set_show_mode($xoopsModuleConfig['show_mode']);
		$tadnews->set_news_kind("news");
	}
	$data=$tadnews->get_news();

	return $syntaxhighlighter_code.$data;
}



//列出所有tad_news資料
function list_tad_cate_news($show_ncsn=0,$the_level=0){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption,$xoopsModuleConfig;

	$xoopsOption['template_main'] = "list_tpl.html";

	$tadnews=new tadnews();
	$tadnews->set_news_kind("news");
	$tadnews->set_show_mode($xoopsModuleConfig['show_mode']);
	$tadnews->set_show_num($xoopsModuleConfig['show_num']);
	$all_news=$tadnews->get_cate_news();
	
	return $all_news;
}



//顯示單一新聞
function show_news($nsn=""){
	global $xoopsUser,$xoopsOption,$xoopsTpl,$isAdmin,$xoopsModuleConfig;

	
	$xoopsOption['template_main'] = "news_tpl.html";
	
	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}
	
	$today=date("Y-m-d H:i:s");
	$news=get_tad_news($nsn);
	
	if($news['enable']=='0'){
		return _MD_TADNEW_HIDDEN;
	}

	if(empty($news['nsn'])){
		redirect_header($_SERVER['PHP_SELF'],3, _MD_TADNEW_HIDDEN);
	}

	$enable_group=$news['enable_group'];
	$have_read_group=$news['have_read_group'];
	
	//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
	if(!read_power_chk($news['ncsn'],$enable_group)){
		redirect_header($_SERVER['PHP_SELF'],3, _MD_TADNEW_NOT_GROUP);
	}

	$have_read_chk=have_read_chk($have_read_group,$nsn);

	$cates=get_all_news_cate();
	$ncsn=$news['ncsn'];
	$cate=$cates[$ncsn];
	$uid=$news['uid'];
	$uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;
	//$xoopsTpl->assign( "xoops_pagetitle" , $news['news_title']) ;
	
	if(!empty($news['passwd'])){
		$tadnews_passw=(isset($_POST['tadnews_passwd']))?$_POST['tadnews_passwd']:"";
		if($tadnews_passw != $news['passwd'] and !in_array($nsn,$_SESSION['have_pass'])){
      $news_content="<form action='".XOOPS_URL."/modules/tadnews/index.php' method='post'><img src='images/lock.png' align='absmiddle' hspace=4 alt='lock.png'>"._MD_TADNEW_NEWS_NEED_PASSWD."
			<input type='hidden' name='nsn' value='{$nsn}'>
			<input type='password' name='tadnews_passwd'>
			<input type='submit'>
			</form>";
      $main=news_format($nsn,$news['news_title'],$news_content,$fun,$fun,$news['prefix_tag'],$uid,$ncsn,$cate,$news['start_day'],"",$news['have_read_group']);
			return $main;
		}else{
			$_SESSION['have_pass'][]=$nsn;
		}
	}
	

	
	$fun=admin_tool($news['uid'],$nsn,$news['counter'],$news['have_read_group']);

	
	if($_GET['bb']=='1'){
		$myts =& MyTextSanitizer::getInstance();
		$news['news_content']=$myts->makeTareaData4Show($news['news_content'],1,1,1);
	}else{
    //支援xlanguage
    if(function_exists('xlanguage_ml')){
      $news['news_content']=xlanguage_ml($news['news_content']);
    }
		$news['news_content']=str_replace(_SEPARTE,"",$news['news_content']);
		$news['news_content']=str_replace(_SEPARTE2,"",$news['news_content']);
	}
	
	
	$del_js=del_js();
	
	//高亮度語法
	$syntaxhighlighter_code="";
  if(file_exists(TADTOOLS_PATH."/syntaxhighlighter.php")){
    include_once TADTOOLS_PATH."/syntaxhighlighter.php";
    $syntaxhighlighter= new syntaxhighlighter();
    $syntaxhighlighter_code=$syntaxhighlighter->render();
  }

  $files=get_news_files($nsn);
  
	$nsnsort=news_sort($nsn);
	
	$back_news="";
	if(!empty($nsnsort['back']['nsn'])){
	 //支援xlanguage
    if(function_exists('xlanguage_ml')){
      $nsnsort['back']['title']=xlanguage_ml($nsnsort['back']['title']);
    }
    $title=xoops_substr($nsnsort['back']['title'], 0, 30);
    $date=substr($nsnsort['back']['date'],5);
    $back_news="<a href='index.php?nsn={$nsnsort['back']['nsn']}'><img src='images/left.png' hspace=2 align='absmiddle' alt='"._TADNEWS_BLOCK_NEW."' title='"._TADNEWS_BLOCK_NEW."'>{$date} {$title}</a>";
  }
	
	$next_news="";
	if(!empty($nsnsort['next']['nsn'])){
	      //支援xlanguage
      if(function_exists('xlanguage_ml')){
        $nsnsort['next']['title']=xlanguage_ml($nsnsort['next']['title']);
      }
      
    $title=xoops_substr($nsnsort['next']['title'], 0, 30);
    $date=substr($nsnsort['next']['date'],5);
    $next_news="<a href='index.php?nsn={$nsnsort['next']['nsn']}'>{$date} {$title}<img src='images/right.png' hspace=2 align='absmiddle' alt='"._TADNEWS_BLOCK_OLD."' title='"._TADNEWS_BLOCK_OLD."'></a>";
  }


	$all=news_format($news['nsn'],$news['news_title'],$news['news_content'],$fun,$fun,$news['prefix_tag'],$news['uid'],$ncsn,$cate,$news['start_day'],$files,$have_read_group,$have_read_chk);
	
	$facebook_comments=facebook_comments($xoopsModuleConfig['facebook_comments_width']);
	$push=push_url($xoopsModuleConfig['use_social_tools']);
	
	$nav="<p style='width:100%;'>
   <div style='float:left;text-align:left;'>$back_news</div>
   <div style='float:right;text-align:right;'>$next_news</div>
   </p>
   <div style='clear:both;'></div>";

	
	$main=$syntaxhighlighter_code.$del_js.$all.$push.$nav.$facebook_comments;
	
	add_counter($nsn);
	
	return $main;
}


//計數器
function add_counter($nsn){
	global $xoopsDB;
	
	$sql = "update ".$xoopsDB->prefix("tad_news")." set  counter = counter + 1 where nsn='$nsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $nsn;	
}

//編輯工具
function admin_tool($uid,$nsn,$counter="",$have_read_group=""){
	global $xoopsUser,$xoopsModuleConfig,$xoopsModule,$isAdmin;
	if($xoopsUser){
		$uuid=$xoopsUser->getVar('uid');
	}else{
		$uuid=$isAdmin="";
	}

  $have_read_tool="";
  if($isAdmin){
    $num=get_have_read_num($nsn);
    $have_read=(empty($have_read_group))?"":sprintf(_MD_TADNEW_HAVE_READ_NUM,$num);
    $have_read_tool="<a href='index.php?op=list_sign&nsn=$nsn'>$have_read</a> |";
  }

  
	$admin_fun=($uid==$uuid or $isAdmin)?"
	$have_read_tool
	<a href='post.php'>"._MD_TADNEW_ADD."</a> |
	<a href='post.php?op=tad_news_form&nsn=$nsn'>"._MD_TADNEW_EDIT."</a> |
	<a href=\"javascript:delete_tad_news_func($nsn);\">"._MD_TADNEW_DEL."</a> |":"";
	
	
	$bbcode=($xoopsModuleConfig['show_bbcode']=='1')?"<a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}&bb=1'>BBCode</a> |":"";
	
	$fun="<div>
	$admin_fun
	$bbcode
	"._MD_TADNEW_HOT."{$counter}
	</div>";
	
	return $fun;
}


//抓出目前新聞的上下文編號
function news_sort($now_nsn="",$now_ncsn=""){
	global $xoopsDB,$xoopsUser;
  $today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));
  $next_ok=false;

 	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}
	$where_cate=($now_ncsn)?"and ncsn='$now_ncsn'":"";

 
  $sql = "select nsn,news_title,start_day,enable_group,ncsn from ".$xoopsDB->prefix("tad_news")."  where enable='1' $where_cate and start_day < '{$today}' and (end_day > '{$today}' or end_day='0000-00-00 00:00:00') order by start_day desc";


  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, $sql);
  while(list($nsn,$news_title,$start_day,$enable_group,$ncsn)=$xoopsDB->fetchRow($result)){
    if(!read_power_chk($ncsn,$enable_group)){
			continue;
		}
		
		$date=substr($start_day,0,10);
		
		if($next_ok){
      $nsnsort['next']['nsn']=$nsn;
      $nsnsort['next']['title']=$news_title;
      $nsnsort['next']['date']=$date;
      return $nsnsort;
      break;
    }elseif($now_nsn==$nsn){
      $next_ok=true;
    }else{
      $nsnsort['back']['nsn']=$nsn;
      $nsnsort['back']['title']=$news_title;
      $nsnsort['back']['date']=$date;
		}
  }
  return $nsnsort;
}

//已經讀過
function have_read($nsn="",$uid=""){
	global $xoopsDB,$xoopsUser;
  $sql="insert into ".$xoopsDB->prefix("tad_news_sign")." (`nsn`,`uid`,`sign_time`) values('$nsn','$uid',now())";
  $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, $sql);
}

//判斷簽收人數
function get_have_read_num($nsn=""){
	global $xoopsDB,$xoopsUser;
   $sql="select count(*) from ".$xoopsDB->prefix("tad_news_sign")." where nsn='$nsn'";
   $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
   list($count)=$xoopsDB->fetchRow($result);
   return $count;
 }
 
//列出簽收狀況
function list_sign($nsn=""){
	global $xoopsDB,$xoopsUser,$xoopsOption;
	$xoopsOption['template_main'] = "list_tpl.html";
	$news=get_tad_news($nsn);
	
   $sql="select uid,sign_time from ".$xoopsDB->prefix("tad_news_sign")." where nsn='$nsn' order by sign_time";
   $sign="";
   $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
   while(list($uid, $sign_time)=$xoopsDB->fetchRow($result)){
    $uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;
    $sign.="<tr><td><a href='index.php?uid=$uid&op=list_user_sign'>$uid_name</a></td><td>$sign_time</td></tr>";
   }
   
   $main="
    <div id='news_title'><a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>".sprintf(_MD_TADNEW_SIGN_LOG,$news['news_title'])."</a></div>
   <table id='clean_news' style='width:auto'>
   <tr><th>"._MD_TADNEW_UID_NAME."</th><th>"._MD_TADNEW_SIGN_TIME."</th></tr>
    $sign
   </table>";
   
   return $main;
}

//列出某人狀況
function list_user_sign($uid=""){
	global $xoopsDB,$xoopsUser,$xoopsOption;
	$xoopsOption['template_main'] = "list_tpl.html";
	$news=get_tad_news($nsn);
	
    $uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;
    
   $sql="select a.nsn,a.sign_time,b.news_title from ".$xoopsDB->prefix("tad_news_sign")." as a left join ".$xoopsDB->prefix("tad_news")." as b on a.nsn=b.nsn where a.uid='$uid' order by a.sign_time desc";
   $sign="";
   $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
   while(list($nsn, $sign_time,$news_title)=$xoopsDB->fetchRow($result)){

    $sign.="<tr><td>[$nsn] <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn=$nsn'>$news_title</a></td><td>$sign_time</td></tr>";
   }

   $main="
    <div id='news_title'><a href='".XOOPS_URL."/userinfo.php?uid={$uid}'>".sprintf(_MD_TADNEW_SIGN_LOG,$uid_name)."</a></div>
   <table id='clean_news' style='width:auto'>
   <tr><th>"._MA_TADNEW_NEWS_TITLE."</th><th>"._MD_TADNEW_SIGN_TIME."</th></tr>
    $sign
   </table>";

   return $main;
}
/*-----------執行動作判斷區----------*/
$_REQUEST['op']=(empty($_REQUEST['op']))?"":$_REQUEST['op'];

$nsn=(isset($_REQUEST['nsn']))?intval($_REQUEST['nsn']) : 0;
$ncsn=(isset($_REQUEST['ncsn']))?intval($_REQUEST['ncsn']) : 0;
$fsn=(isset($_REQUEST['fsn']))?intval($_REQUEST['fsn']) : 0;
$uid=(isset($_REQUEST['uid']))?intval($_REQUEST['uid']) : "";

switch($_REQUEST['op']){
	//刪除資料
	case "delete_tad_news":
	delete_tad_news($nsn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;
	
	//已經閱讀
	case "have_read":
  have_read($nsn,$uid);
	header("location: ".$_SERVER['PHP_SELF']."?nsn=$nsn");
	break;
	
	//列出簽收狀況
	case "list_sign":
	$main=list_sign($nsn);
	break;


	//列出某人狀況
	case "list_user_sign":
	$main=list_user_sign($uid);
	break;
	
	
	default:
	chk_always_top();
	if(!empty($nsn)){
		$main=show_news($nsn);
	}elseif(isset($ncsn)){
		$main=list_tad_all_news($ncsn);
	}else{
		if($xoopsModuleConfig['show_mode']=="cate"){
			$main=list_tad_cate_news();
		}else{
			$main=list_tad_all_news();
		}
	}
	
	break;
}

/*-----------秀出結果區--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='alternate' type='application/rss+xml' title='".$xoopsModule->getVar('name')."' href='".XOOPS_URL."/modules/".$xoopsModule->getVar('dirname')."/rss.php?ncsn={$ncsn}' />\n<link rel='stylesheet' type='text/css' media='screen' href='module.css' />\n<link rel='stylesheet' type='text/css' media='screen' href='reset.css' />") ;
if($_GET['kind']=="page"){
	$xoopsTpl->assign( "toolbar" ,"") ;
}else{
	$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
}

$xoopsTpl->assign( "content" , $main) ;
$xoopsTpl->assign( "nsn" , $nsn) ;

if(!empty($nsn)){

	$news=get_tad_news($nsn);
	$xoopsTpl->assign("xoops_pagetitle",$news['news_title']);

	if (is_object($xoTheme)) {
		$xoTheme->addMeta( 'meta', 'keywords', $news['news_title']);
		$xoTheme->addMeta( 'meta', 'description', $news['news_description']) ;
	} else {
		$xoopsTpl->assign('xoops_meta_keywords','keywords',$news['news_title']);
		$xoopsTpl->assign('xoops_meta_description', $news['news_description']);
	}


  //$pic=get_news_doc_pic("news_pic",$nsn,"thumb",null,true);
	//$xoopsTpl->assign('xoops_module_header', "<meta property='og:image' content='$pic'/>  <meta property='og:title' content='{$news['news_title']}'/>");
}

include_once XOOPS_ROOT_PATH.'/include/comment_view.php';
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
