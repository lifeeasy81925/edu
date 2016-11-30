<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: archive.php,v 1.1 2008/04/10 05:31:02 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "header.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/up_file.php";

if(!empty($_POST['date'])){
	$all=archive($_POST['date']);
  echo $all;
  exit;
}


$xoopsOption['template_main'] = "archive_tpl.html";
/*-----------function區--------------*/

//列出月份
function month_list(){
	global $xoopsDB;
	$sql = "select min(start_day),max(start_day) from ".$xoopsDB->prefix("tad_news")." where enable='1'";

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($min,$max)=$xoopsDB->fetchRow($result);

	$now=date("Y-m",strtotime($max));
	$end=date("Y-m",strtotime($min));

  $main="
  <script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/jquery/jquery.js'></script>
	<script type='text/javascript'>

	$(document).ready(function(){
    view_archive('{$now}');
  });
  
  function view_archive(chk_date){
		$.ajax({
			type: 'POST',
			url: '{$_SERVER['PHP_SELF']}',
			data: 'date=' + chk_date,
			success: function(msg){
				$('#msg_results').html(msg);
			}
		});
	}
	</script>
	<form>
	<div style='text-align:center;margin-bottom:10px;'>
	"._MD_TADNEW_ARCHIVE."
	<!--a href=\"javascript: onClick='view_archive(this.value)'\"><img src='images/left.png' align='absmiddle' hspace=4></a-->
	
	<select size=1 onClick='view_archive(this.value)'>
	<option value='{$now}'>".str_replace("-",""._MD_TADNEW_YEAR." ",$now)._MD_TADNEW_MONTH."
  </option>";

  $i=1;
	if($end!=$now){
		while($date!=$end){
	    $date=date("Y-m",strtotime("{$now}-01 -{$i} months"));
	    $main.="<option value='{$date}'>".str_replace("-",""._MD_TADNEW_YEAR." ",$date)._MD_TADNEW_MONTH."</option>";
	    $i++;
		}
	}
	$main.="</select>
		<!--a href=\"javascript: onClick='view_archive(this.value)'\"><img src='images/right.png' align='absmiddle' hspace=4></a-->
	</div>
	
	<div id='msg_results'></div>
	</form>";

	$main=div_3d("",$main,"corners","width:100%");

	return $main;
}


//分月新聞
function archive($date=""){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption;


	$sql = "select a.nsn,a.ncsn,a.news_title,a.start_day,a.enable_group,a.passwd,a.uid,b.not_news,a.have_read_group from ".$xoopsDB->prefix("tad_news")." as a left join ".$xoopsDB->prefix("tad_news_cate")." as b on a.ncsn=b.ncsn where a.enable='1' and a.start_day like '{$date}%' order by a.start_day desc";
	
	//return $sql;
	
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  $date_title=to_utf8(str_replace("-",""._MD_TADNEW_YEAR." ",$date)._MD_TADNEW_MONTH._MA_TADNEW_NEWS_TITLE);

	$all_news="
	<table id='tbl' style='width:100%'>
	<tr><th>$date_title</th></tr>";

	while(list($nsn,$ncsn,$news_title,$start_day,$enable_group,$passwd,$uid,$not_news,$have_read_group)=$xoopsDB->fetchRow($result)){

		if($not_news=="1")continue;

    $need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";

		//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
		if(!read_power_chk($ncsn,$enable_group)){
			continue;
		}

		if(empty($news_title)){
			$news_title=_MD_TADNEWS_NO_TITLE;
		}
		
  	$uid_name=XoopsUser::getUnameFromId($uid,1);
    if(empty($uid_name)){
      $uid_name=XoopsUser::getUnameFromId($uid,0);
    }
    $files=get_news_files($nsn,"filename");
		//$files=(empty($passwd))?show_files("nsn",$nsn,true,"filename"):"";
		if(!empty($files)){
      $files="<div style='border:1px solid #cfcfcf;background-color:#fcfcfc;'>$files</div>";
    }

    $news_title=to_utf8($news_title);
    
		$all_news.="<tr><td>
    {$need_sign}<a href='index.php?nsn={$nsn}' style='font-size:11pt;font-weight:normal;'>{$news_title}</a> <span style='font-size:12px;color:#66CCCC'><br />({$uid_name}@{$start_day})</span>
    $files
    </td></tr>";
	}

	$all_news.="</table>";

  //$data=div_3d(_MD_TADNEW_ARCHIVE,$all_news,"corners");

	return $all_news;
}

/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){


	default:
	$main=month_list();
	break;
}


/*-----------秀出結果區--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='module.css' />") ;
$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
