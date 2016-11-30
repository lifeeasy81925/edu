<?php
include_once "header.php";
include_once "block_function.php";

$now=date("Y-m-d",xoops_getUserTimestamp(time()));
$today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));

include_once(XOOPS_ROOT_PATH."/modules/tadnews/language/{$xoopsConfig[language]}/blocks.php");

$op=isset($_REQUEST['op'])?$_REQUEST['op']:"";

$show_col='';
if($op=="js"){
  $num=!empty($_GET['num'])?intval($_GET['num']):10;
  $show_button="";
  $start_from=0;
  $show_ncsn=$_GET['show_ncsn'];
  $cols=explode(',',$_GET['show_col']);
  foreach($cols as $col){
    if($col=='' or $col=='hide')continue;
    $show_col[]=$col;
  }
  $outer="table table-striped";
}else{
  $num=(!empty($_POST['num']))?intval($_POST['num']):10;
  $show_button=$_POST['show_button'];
  $start_from=intval($_POST['start_from']);
  $show_ncsn=$_POST['show_ncsn'];
  
  foreach($_POST['cell'] as $col){
    if($col=='' or $col=='hide')continue;
    $show_col[]=$col;
  }
  $outer="outer";
}
if(empty($show_col))$show_col=array('start_day','news_title','uid','ncsn','counter');


$p=(empty($_POST['p']))?0:intval($_POST['p']);
$b=$_POST['p']-1;
$n=$p+1;

$start=$p*$num+$start_from;

if($start <= 0 )$start=0;

//取得目前使用者的所屬群組
if($xoopsUser){
	$User_Groups=$xoopsUser->getGroups();
}else{
	$User_Groups=array();
}

//找出所有分類
$sql="select ncsn,nc_title from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1'";
$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
while(list($ncsn,$nc_title)=$xoopsDB->fetchRow($result)){
	//$ncsn_ok[]=$ncsn;
	$cates[$ncsn]=$nc_title;
}

/*
$ok_cate=implode(",",$ncsn_ok);
$where_cate=(empty($ok_cate))?"and ncsn='0'":"and (ncsn in($ok_cate) or ncsn='0')";
*/

if(empty($show_ncsn) or $show_ncsn=="all"){
	$sql="select ncsn from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1' order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br />$sql");
	while(list($ncsn)=$xoopsDB->fetchRow($result)){
    //判斷本文之所屬分類是否允許該用戶之所屬群組觀看
    if(block_chk_cate_power($ncsn,$User_Groups))	  $ncsn_arr[]=$ncsn;
	}
	$show_ncsn=implode(",",$ncsn_arr);
	if(empty($show_ncsn)){
		return "";
	}
}

$sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' and ncsn in({$show_ncsn}) and start_day < '{$today}' and (end_day > '{$today}' or end_day='0000-00-00 00:00:00') order by  `always_top` desc , start_day desc limit {$start} , {$num}";


$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());
$block="<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadnews/module.css' />";


$tt['start_day']="<th>".to_utf8(_MB_TADNEW_START_DATE)."</th>";
$tt['news_title']="<th>".to_utf8(_MB_TADNEW_NEWS_TITLE)."</th>";
$tt['uid']="<th>".to_utf8(_MB_TADNEW_POSTER)."</th>";
$tt['ncsn']="<th>".to_utf8(_MB_TADNEW_NEWS_CATE)."</th>";
$tt['counter']="<th>".to_utf8(_MB_TADNEW_COUNTER)."</th>";
$blockTitle="";
foreach($show_col as $colname){
  $blockTitle.=$tt[$colname];
}


$block.="<table class='$outer'><tr>{$blockTitle}</tr>";


$i=2;

$total=0;
while($all_news=$xoopsDB->fetchArray($result)){
  foreach($all_news as $k=>$v){
		$$k=to_utf8($v);
	}

  $tadnews_files=get_tadnews_files($nsn);


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
	
	$need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";

	$uid_name=to_utf8(XoopsUser::getUnameFromId($uid,1));
	if(empty($uid_name))$uid_name=to_utf8(XoopsUser::getUnameFromId($uid,0));

	$post_date=substr($start_day,0,10);
	$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";

	$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;

  $prefix_tag=mk_prefix_tag($prefix_tag);

  $start_day="<td>{$post_date}</td>";
  $news_title="<td>{$prefix_tag}{$need_sign}{$always_top_pic} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>$news_title</a>{$tadnews_files}</td>";
  $uid="<td><a href='".XOOPS_URL."/userinfo.php?uid={$uid}'>$uid_name</a></td>";
  $ncsn="<td><a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}'>{$cates[$ncsn]}</a></td>";
  $counter="<td>$counter</td>";


	$style=($i%2)?"odd":"even";
	$block.="<tr class='{$style}'>";
  foreach($show_col as $colname){
    $block.=$$colname;
  }

  $block.="</tr>";
	$i++;
  $total++;
}


$b_button=($b < 0)?"":"<input type='button'  onClick='view_content({$b})' value='".sprintf(_TADNEWS_BLOCK_BACK,$num)."'>";

$n_button=($total < $num)?"":"<input type='button' style='float:right;' onClick='view_content({$n})' value='".sprintf(_TADNEWS_BLOCK_NEXT,$num)."'>";

$button=($show_button)?"{$n_button}{$b_button}":"";

$block.="</table>
$button
<div style='clear:both;'></div>
";


if($_REQUEST['op']=="js"){
  $order   = array("\r\n", "\n", "\r");
  $block = str_replace($order, "", $block);
  echo "document.getElementById('tadnews').innerHTML=\"$block\";";
}else{
  echo $block;
}

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


//以流水號取得某筆tad_news_cate資料
function block_get_tad_news_cate($ncsn=""){
	global $xoopsDB;
	if(empty($ncsn))return;
	$sql = "select * from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='$ncsn'";
	$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}


?>
