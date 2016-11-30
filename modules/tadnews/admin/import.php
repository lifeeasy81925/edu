<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: import.php,v 1.2 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "admin_header.php";

/*-----------function區--------------*/

$module_handler = &xoops_gethandler('module');
$news = &$module_handler->getByDirname('news');
if(!empty($news)){
	$mid=$news->getVar("mid");
	$version=$news->getVar("version");

	$module_handler2 = &xoops_gethandler('module');
	$tadnews = &$module_handler->getByDirname('tadnews');
	$tadnews_mid=$tadnews->getVar("mid");
}

//檢查有無安裝新聞區模組
function chk_news_mod($version){
	global $xoopsDB;
  
  if(empty($version)){
    $main=_MA_TADNEW_NO_NEWSMOD;
	}else{
    $main=sprintf(_MA_TADNEW_HAVE_NEWSMOD,$version);
    $main.="<form action='{$_SERVER['PHP_SELF']}' method='post'>
    <center>
		<p><input type='submit' value='"._MA_TADNEW_IMPORT."'></p>
		<table id='tbl'>
		<tr><th>"._MA_TADNEW_IMPORT_CATE."</th></tr>";
    $main.=chk_cate();
    $main.="</table>
		<input type='hidden' name='op' value='import'>
		<p><input type='submit' value='"._MA_TADNEW_IMPORT."'></p>
		</center>
		</form>";
	}
	$main=div_3d("",$main,"corners");
  
  return $main;
}

//檢查分類
function chk_cate($topic_pid="",$left=0){
	global $xoopsDB;
	
	if(!empty($topic_pid))$left+=14;
	
	$sql="select topic_id,topic_pid,topic_title from ".$xoopsDB->prefix("topics")." where topic_pid='{$topic_pid}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	
	$main="";
	
	while(list($topic_id,$topic_pid,$topic_title)=$xoopsDB->fetchRow($result)){
		$main.="<tr class='even'><td style='padding-left:{$left}px'><input type='checkbox' name='cate[$topic_pid][$topic_id]' checked=checked value='{$topic_title} '><b>$topic_title</b></td></tr>";
		$main.=chk_stories($topic_id,$left);
		$main.=chk_cate($topic_id,$left);
	}
	
	return $main;
}




//檢查文章
function chk_stories($topicid ="",$left=0){
	global $xoopsDB;
	
	$left+=14;

	$sql="select storyid,title  from ".$xoopsDB->prefix("stories")." where topicid ='{$topicid}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$main="";
	while(list($storyid,$title)=$xoopsDB->fetchRow($result)){
		$main.="<tr><td style='padding-left:{$left}px'><input type='checkbox' name='stories[$topicid][]' value='{$storyid}' checked=checked>$title</td></tr>";
	}
	return $main;
}

//進行類別匯入
function import($topic_pid=0,$new_topic_pid=0){
	global $xoopsDB;
	//匯入分類
  foreach($_POST['cate'][$topic_pid] as $topic_id=>$topic_title){

		$sql="insert into ".$xoopsDB->prefix("tad_news_cate")." (`of_ncsn`, `nc_title`, `enable_group`, `sort`) values('{$new_topic_pid}', '{$topic_title}', '', '')";
		if($xoopsDB->query($sql)){
			$sub_new_topic_pid=$xoopsDB->getInsertId();

			//匯入文章
			import_stories($topic_id,$sub_new_topic_pid);

	    import($topic_id,$sub_new_topic_pid);
    }
	}
}


//進行文章匯入
/*
nsn=storyid
ncsn=topicid
news_title=title
news_content=hometext.bodytext
start_day=published
enable=expired

uid=uid
counter=counter

end_day=
passwd=
enable_group=
*/
function import_stories($topicid=0,$new_topic_pid=0){
	global $xoopsDB;

	$myts =& MyTextSanitizer::getInstance();
	
	foreach($_POST['stories'][$topicid] as $storyid){
		//找出勾選的內容
		$sql="SELECT `storyid`, `uid`, `title`, `published`, `expired`, `nohtml`, `nosmiley`, `hometext`, `bodytext`, `counter`, `topicid` FROM ".$xoopsDB->prefix("stories")." WHERE `storyid` ='{$storyid}'";
		$result = $xoopsDB->query($sql);

		list($storyid,$uid,$title,$published,$expired,$nohtml,$nosmiley,$hometext,$bodytext,$counter,$topicid)=$xoopsDB->fetchRow($result);
	  $news_content=$hometext.$bodytext;
	  
	  $myts =& MyTextSanitizer::getInstance();
  	$news_content=$myts->addSlashes($news_content);
  	$title=$myts->addSlashes($title);

	  //bbcode 轉換
		$news_content=$myts->makeTareaData4Show($news_content,1,1,1);
		
	  $published=date("Y-m-d H:i:s",$published);
	  $enable=(empty($expired))?"1":"0";

		$sql="insert into ".$xoopsDB->prefix("tad_news")." (`ncsn`, `news_title`, `news_content`, `start_day`, `end_day`, `enable`, `uid`, `passwd`, `enable_group`, `counter`) values('{$new_topic_pid}', '{$title} ', '{$news_content} ', '{$published}', '', '{$enable}', '{$uid}', '', '', '{$counter}')";
		if($xoopsDB->queryF($sql)){
			$new_nsn=$xoopsDB->getInsertId();
			//匯入評論
			import_common($storyid,$new_nsn);
		}
	}
}


function import_common($storyid="",$new_nsn=""){
	global $xoopsDB,$mid,$tadnews_mid;
  
	$sql="update ".$xoopsDB->prefix("xoopscomments")." set com_modid='{$tadnews_mid}',com_itemid='{$new_nsn}' where com_modid='{$mid}' and com_itemid='{$storyid}'";
	$xoopsDB->query($sql);
}

/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){


	//刪除資料
	case "import";
	import();
	header("location: index.php");
	break;
	
	default:
	$main=chk_news_mod($version);
	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
admin_toolbar(3);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();

?>
