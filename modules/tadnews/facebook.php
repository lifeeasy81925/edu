<?php
include "../../mainfile.php";

//取得目前使用者的所屬群組
if($xoopsUser){
	$User_Groups=$xoopsUser->getGroups();
}else{
	$User_Groups=array();
}

//找出所有分類
$sql="select ncsn,nc_title,enable_group,enable_post_group,cate_pic from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1'";

$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],10, mysql_error()."<br>$sql");

$cates_enable_post_group[]="";

while(list($ncsn,$nc_title,$enable_group,$enable_post_group,$cate_pic)=$xoopsDB->fetchRow($result)){
  //只有可讀的分類才納入
	$cate_read_poewr=chk_cate_power($ncsn,$User_Groups,$enable_group,"read");
	if($cate_read_poewr){
		$ncsn_ok[]=$ncsn; //權限內可觀看群組
		$cates[$ncsn]=$nc_title;
		$cates_enable_post_group[$ncsn]=$enable_post_group;
		$cates_enable_group[$ncsn]=$enable_group;
		$cates_pic[$ncsn]=$cate_pic;
	}

}


$ok_cate=implode(",",$ncsn_ok);

//假如沒有指定觀看分類
$where_cate=(empty($ok_cate))?"and ncsn='0'":"and (ncsn in($ok_cate) or ncsn='0')";
$today=date("Y-m-d H:i:s");
$sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' $where_cate and start_day < '$today' and (end_day > '$today' or end_day='0000-00-00 00:00:00')  order by always_top desc , start_day desc limit 0,6";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

$all_news='<div id="fb-root"></div><script src="http://connect.facebook.net/zh_TW/all.js#appId=189441632170&xfbml=1"></script>';
while($news=$xoopsDB->fetchArray($result)){

	foreach($news as $k=>$v){
		$$k=$v;
	}

	//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
	$news_read_poewr=chk_news_power($enable_group,$User_Groups);
	if(!$news_read_poewr){
		continue;
	}

	//新聞資訊列
	$end_day=($end_day=="0000-00-00 00:00:00")?"":"~ ".$end_day;

    $uid_name=XoopsUser::getUnameFromId($uid,1);
    $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;

	$news_title=(empty($news_title))?_MD_TADNEWS_NO_TITLE:$news_title;
	$cate_name=(empty($cates[$ncsn]))?_MD_TADNEWS_NO_CATE:$cates[$ncsn];

	$post_date=substr($start_day,0,10);
	$today_pic=get_news_pic($always_top,$start_day);


	$g_txt=txt_to_group_name($enable_group,_MA_TADNEW_ALL_OK);


  $all_news.="<fb:comments href=\"www.tad0616.net/modules/tadnews/index.php?nsn=$nsn\" num_posts=\"10\" width=\"700\"></fb:comments>";


}



echo $all_news;


//判斷本文之所屬分類是否允許該用戶之所屬群組觀看或發佈
function chk_cate_power($ncsn="",$User_Groups="",$enable_group="",$kind="read"){
	global $xoopsDB,$xoopsUser;

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

//判斷本文是否允許該用戶之所屬群組觀看或發佈
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

	//置頂圖示
function get_news_pic($always_top="",$post_date=""){
	$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":get_today_pic($post_date);
	return $always_top_pic;
}

//今日文章
function get_today_pic($post_date=""){
	$today_pic=(date("Y-m-d")==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";
	return $today_pic;
}

//把字串換成群組
function txt_to_group_name($enable_group="",$default_txt="",$syb="<br />"){
	$groups_array=get_all_groups();
	if(empty($enable_group)){
    $g_txt=$default_txt;
	}else{
	  $gs=explode(",",$enable_group);
	  $g_txt="";
	  foreach($gs as $gid){
    	$g_txt.=$groups_array[$gid]."{$syb}";
		}
	}
	return $g_txt;
}

//取得所有群組
function get_all_groups(){
	global $xoopsDB;
	$sql = "select groupid,name from ".$xoopsDB->prefix("groups")."";
	$result = $xoopsDB->query($sql);
	while(list($groupid,$name)=$xoopsDB->fetchRow($result)){
		$data[$groupid]=$name;
	}
	return $data;
}
?>
