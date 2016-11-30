<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: rss.php,v 1.4 2008/06/25 06:36:09 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include "header.php";
include_once XOOPS_ROOT_PATH."/class/template.php";
/*-----------function區--------------*/

$ncsn=0;
if(isset($_GET['ncsn'])) {
	$ncsn=intval($_GET['ncsn']);
}
if (function_exists('mb_http_output')) {
	mb_http_output('pass');
}
header("Content-Type:text/xml; charset=utf-8");

$tpl = new XoopsTpl();
$tpl->xoops_setCaching(2);
$tpl->xoops_setCacheTime(10);
if (!$tpl->is_cached('db:tadnews_rss.html')) {
	$xt=get_tad_news_cate($ncsn);
  $xt['nc_title']=(empty($xt['nc_title']))?_MD_TADNEW_ALL_CATE:$xt['nc_title'];
	$sarray=tad_news_array($ncsn);

	if (is_array($sarray)) {
		$sitename = htmlspecialchars($xoopsConfig['sitename'], ENT_QUOTES);
		$slogan = htmlspecialchars($xoopsConfig['slogan'], ENT_QUOTES);
		$tpl->assign('channel_title', to_utf8($sitename)."-".to_utf8($xt['nc_title'], ENT_QUOTES));
		$tpl->assign('channel_link', XOOPS_URL.'/');
		$tpl->assign('channel_desc', to_utf8($slogan));
		$tpl->assign('channel_lastbuild', formatTimestamp(time(), 'rss'));
		$tpl->assign('channel_webmaster', checkEmail($xoopsConfig['adminmail'],true));	// Fed up with spam
		$tpl->assign('channel_editor', checkEmail($xoopsConfig['adminmail'],true));	// Fed up with spam
		$tpl->assign('channel_category', to_utf8($xt['nc_title'], ENT_QUOTES));
		$tpl->assign('channel_generator', 'XOOPS');
		$tpl->assign('channel_language', _LANGCODE);
		$tpl->assign('image_url', XOOPS_URL.'/images/logo.gif');
		$dimention = getimagesize(XOOPS_ROOT_PATH.'/images/logo.gif');
		if (empty($dimention[0])) {
			$width = 88;
		} else {
			$width = ($dimention[0] > 144) ? 144 : $dimention[0];
		}
		if (empty($dimention[1])) {
			$height = 31;
		} else {
			$height = ($dimention[1] > 400) ? 400 : $dimention[1];
		}
		$tpl->assign('image_width', $width);
		$tpl->assign('image_height', $height);
		//$count = $sarray;
		foreach ($sarray as $nsn=>$story) {
			$storytitle = htmlspecialchars($story['news_title'], ENT_QUOTES);
			$description = htmlspecialchars($story['content'], ENT_QUOTES);
			$tpl->append('items', array('title' => to_utf8($storytitle), 'link' => $story['url'], 'guid' => $story['url'], 'pubdate' => formatTimestamp($story['start_day'], 'rss'), 'description' => to_utf8($description)));
		}
	}
}
$tpl->display('db:tadnews_rss.html');


//列出所有tad_news資料
function tad_news_array($the_ncsn=""){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption;

	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}
	
	$now=date("Y-m-d",xoops_getUserTimestamp(time()));
  $today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));

	$sql="select ncsn,nc_title from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	while(list($ncsn,$nc_title)=$xoopsDB->fetchRow($result)){
		$ncsn_ok[]=$ncsn;
		$cates[$ncsn]=$nc_title;
	}
	
  $ok_cate=implode(",",$ncsn_ok);
	if(empty($the_ncsn)){
    $where_cate=(empty($ok_cate))?"":"and (ncsn in($ok_cate) or ncsn='0')";
	}else{
    $where_cate="and ncsn='$the_ncsn'";
	}

	$sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' $where_cate and start_day < '$today' and (end_day > '$today' or end_day='0000-00-00 00:00:00') order by always_top desc , start_day desc";

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while($news=$xoopsDB->fetchArray($result)){

		foreach($news as $k=>$v){
			$$k=$v;
		}
	
		//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
		if(!read_power_chk($ncsn,$enable_group)){
			continue;
		}

		$data[$nsn]['end_day']=strtotime($end_day);

		if(eregi(_SEPARTE2,$news_content)){
	    //支援xlanguage
      if(function_exists('xlanguage_ml')){
        $news_content=xlanguage_ml($news_content);
      }
		  $news_content=str_replace("<p>"._SEPARTE2."</p>",_SEPARTE2,$news_content);
      $content=explode(_SEPARTE2,$news_content);
		}else{
			$content=explode(_SEPARTE,$news_content);
		}
		
		$more=(empty($content[1]))?"":"<p><a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>"._MD_TADNEW_MORE."...</a></p>";
		$data[$nsn]['content']=(!empty($passwd))?_MD_TADNEW_NEWS_NEED_PASSWD:$content[0].$more;

		
		$data[$nsn]['url']=XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}";
		$data[$nsn]['news_title']=$news_title;
		$data[$nsn]['start_day']=strtotime($start_day);
 }

	return $data;
}
?>
