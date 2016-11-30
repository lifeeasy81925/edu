<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: page.php,v 1.1 2008/06/25 06:35:22 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include "header.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/up_file.php";
/*-----------function區--------------*/



//顯示單一新聞
function show_page($nsn="",$news=array(),$cates=array(),$set=array()){
	global $xoopsUser,$xoopsOption;

	
	$xoopsOption['template_main'] = "page_tpl.html";


	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}

	$today=date("Y-m-d H:i:s");

	if($news['enable']=='0'){
		return _MD_TADNEW_HIDDEN;
	}

	if($news['end_day']!='0000-00-00 00:00:00' and $today > $news['end_day']){
		return _MD_TADNEW_OVERDUE;
	}


	$enable_group=$news['enable_group'];

	//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
	if(!read_power_chk($news['ncsn'],$enable_group)){
		redirect_header($_SERVER['PHP_SELF'],3, _MD_TADNEW_NOT_GROUP);
	}


	//高亮度語法
  if(!file_exists(TADTOOLS_PATH."/syntaxhighlighter.php")){
   redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
  include_once TADTOOLS_PATH."/syntaxhighlighter.php";
  $syntaxhighlighter= new syntaxhighlighter();
  $syntaxhighlighter_code=$syntaxhighlighter->render();




	$ncsn=$news['ncsn'];
	$cate=$cates['nc_title'];
	$uid_name=XoopsUser::getUnameFromId($news['uid'],0);

	if(!empty($news['passwd'])){
		$tadnews_passw=(isset($_POST['tadnews_passwd']))?$_POST['tadnews_passwd']:"";


		
		if($tadnews_passw != $news['passwd'] and !in_array($nsn,$_SESSION['have_pass'])){
			$main="<div class=\"tadnews_inset\">
		<b class=\"b1\"></b><b class=\"b2\"></b><b class=\"b3\"></b><b class=\"b4\"></b>
		<div class=\"boxcontent\">
			<h1>{$news['prefix_tag']} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$news['nsn']}'>{$news['news_title']}</a></h1>
			<div id='news_toolbar'>$fun</div>
			<div id='news_info'><a href='".XOOPS_URL."/userinfo.php?uid={$uid}'>{$uid_name}</a> - <a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}'>{$cate}</a> | {$news['start_day']}</div>
			<p>
			<div id='news_content'>
			<form action='".XOOPS_URL."/modules/tadnews/index.php' method='post'><img src='images/lock.png' align='absmiddle' hspace=4 alt='lock.png'>"._MD_TADNEW_NEWS_NEED_PASSWD."
			<input type='hidden' name='nsn' value='{$nsn}'>
			<input type='password' name='tadnews_passwd'>
			<input type='submit'>
			</form>
			</div>
			</p>
		</div>
		<b class=\"b4b\"></b><b class=\"b3b\"></b><b class=\"b2b\"></b><b class=\"b1b\"></b>
		</div>";
			return $main;
		}else{
			$_SESSION['have_pass'][]=$nsn;
		}
	}


	$fun=admin_tool($news['uid'],$nsn,$news['counter']);

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
	//$files=get_news_files($nsn,0);
	$files=show_files("nsn",$nsn,true);


	$title=($set['title']=='1')?"<h1>{$news['prefix_tag']} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$news['nsn']}'>{$news['news_title']}</a></h1>
	<div id='page_tool'>
	<div id='news_toolbar'>$fun</div>
	<div id='news_info'><a href='".XOOPS_URL."/userinfo.php?uid={$news['uid']}'>{$uid_name}</a> - <a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}'>{$cate}</a> | {$news['start_day']}</div></div>":"";

	if($set['3d']=='1'){
		$main=$syntaxhighlighter.$del_js."<div class=\"tadnews_inset\">
		<b class=\"b1\"></b><b class=\"b2\"></b><b class=\"b3\"></b><b class=\"b4\"></b>
		<div class=\"boxcontent\">
			$title
			<p>
			<div id='page_content'>{$news['news_content']}</div>
			$files
			<div style='clear:both'></div>
			<div id='news_toolbar'>{$fun}</div>
			</p>

		</div>
		<b class=\"b4b\"></b><b class=\"b3b\"></b><b class=\"b2b\"></b><b class=\"b1b\"></b>
		</div>";
	}else{
		$main=$syntaxhighlighter_code.$del_js."
		<div class=\"boxcontent\">
			$title
			<p>
			<div id='page_content'>{$news['news_content']}</div>
			$files
			<div style='clear:both'></div>
			<div id='news_toolbar'>{$fun}</div>
			</p>

		</div>
		";
	}
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
function admin_tool($uid,$nsn,$counter=""){
	global $xoopsUser,$xoopsModuleConfig;
	if($xoopsUser){
		$uuid=$xoopsUser->getVar('uid');
	}else{
		$uuid="";
	}


	$admin_fun=($uid==$uuid)?"
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


/*-----------執行動作判斷區----------*/
$_REQUEST['op']=(empty($_REQUEST['op']))?"":$_REQUEST['op'];

$nsn=(isset($_REQUEST['nsn']))?intval($_REQUEST['nsn']) : 0;
$ncsn=(isset($_REQUEST['ncsn']))?intval($_REQUEST['ncsn']) : 0;
$fsn=(isset($_REQUEST['fsn']))?intval($_REQUEST['fsn']) : 0;

switch($_REQUEST['op']){
	//刪除資料
	case "delete_tad_news";
	delete_tad_news($nsn);
	header("location: ".$_SERVER['PHP_SELF']);
	break;



	default:
	if(!empty($nsn)){
	  $news=get_tad_news($nsn);
		$cates=get_tad_news_cate($news['ncsn']);
	  $set=get_setup($cates['setup']);
  
		$main=show_page($nsn,$news,$cates,$set);
	}else{
		header("location:index.php?nsn={$nsn}");
	}

	break;
}

/*-----------秀出結果區--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='alternate' type='application/rss+xml' title='".$xoopsModule->getVar('name')."' href='".XOOPS_URL."/modules/".$xoopsModule->getVar('dirname')."/rss.php?ncsn=".$_GET['ncsn']."' /><link rel='stylesheet' type='text/css' media='screen' href='module.css' />") ;
if(!empty($nsn) and $set['tool']==0){
	$xoopsTpl->assign( "toolbar" ,"") ;
}else{
	$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
}

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

}
$xoopsTpl->assign( "content" , $main) ;

if($set['comm']=='1') include_once XOOPS_ROOT_PATH.'/include/comment_view.php';

include_once XOOPS_ROOT_PATH.'/footer.php';

?>
