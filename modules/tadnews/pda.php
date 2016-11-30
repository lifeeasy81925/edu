<?php
/*-----------引入檔案區--------------*/
if(file_exists("mainfile.php")){
  include_once "mainfile.php";
}elseif("../../mainfile.php"){
  include_once "../../mainfile.php";
}
include_once XOOPS_ROOT_PATH."/modules/tadnews/up_file.php";

include_once XOOPS_ROOT_PATH."/modules/tadnews/language/{$xoopsConfig['language']}/main.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/function.php";

/*-----------function區--------------*/

//滑動新聞
function tadnews_slidernews_show_m(){
  global $xoopsDB,$xoopsUser;

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
    if(!chk_cate_power($ncsn,$User_Groups)){
      continue;
    }
    $ncsn_ok[]=$ncsn;
    $cates[$ncsn]=$nc_title;
  }

  $ok_cate=implode(",",$ncsn_ok);
  $where_cate=(empty($ok_cate))?"and ncsn='0'":"and (ncsn in($ok_cate) or ncsn='0')";

  $sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' $where_cate and start_day < '{$today}' and (end_day > '{$today}' or end_day='0000-00-00 00:00:00') order by  `always_top` desc , start_day desc";

  $result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());

  $i=1;
  $n=0;
  while($all_news=$xoopsDB->fetchArray($result)){
    foreach($all_news as $k=>$v){
      $$k=$v;
    }

    if(!empty($ncsn) and !in_array($ncsn,$ncsn_ok))continue;

    //判斷本文之所屬分類是否允許該用戶之所屬群組觀看
    if(!chk_cate_power($ncsn,$User_Groups)){
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

    //$tadnews_files=get_tadnews_files($nsn);

    if(empty($news_title)){
      $news_title=_MB_TADNEWS_NO_TITLE;
    }

    $image=get_news_doc_pic_m("news_pic",$nsn,"big","",true);

    //$title=$news_title;
    $title=xoops_substr(strip_tags($news_title), 0, 90);
    $pi=($i%2)?"1":"2";
    $slider_image=empty($image)?"class/slider/demo{$pi}.jpg":$image;
    $slider_image_all.="<div><a href='{$_SERVER['PHP_SELF']}?nsn={$nsn}'><img src='$slider_image' width='320' height='210' /></a><h2>$title</h2></div>
              ";
    $nav.="<a class='touchslider-nav-item' href='#'>$nsn</a>
              ";
    $i++;
    $n++;
    //大於8則新聞跳出迴圈
    if($n>=8)break;
  }
    $main="
    <style>
    .slider_touch {
      margin: 0px auto;
      padding: 0px;
      width: 320px;
    }
    .slider_in {
      margin: -15px;
    }
    .paging-container {
      position: absolute;
      margin-top:-35px;
      z-index: 70;
      float: left;
      left: 50%;
    }
    .paging-container div {
      left: -50%;
      float: left;
      position: relative;
    }
    .paging-container a {
      background: url('class/slider/bullet.png') repeat scroll left top transparent;
      color: transparent;
      float: left;
      height: 15px;
      margin-left: 3px;
      position: relative;
      text-indent: -4000px;
      width: 15px;
    }
    .paging-container a:hover {
      background-position: 0 50%;
    }
    .paging-container a.touchslider-nav-item-current {
      background-position: 0 100%;
    }
    .touchslider h2 {
      background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
      color: #FFFFFF;
      font-size: 19px;
      height: 50px;
      left: 0;
      line-height: 23px;
      overflow: hidden;
      margin: 140px 0 0;
      padding: 0 5px 20px;
      position: absolute;
      /*text-align: center;*/
      text-shadow: 0 1px 0 rgba(0, 0, 0, 0.9);
      top: 0;
      width: 310px;
      z-index: 10;
    }
    </style>
    <script src='class/slider/jquery.touchslider.min.js' type='text/javascript'></script>
    <script>
    jQuery(function($) {
      $('.touchslider').touchSlider({
        next: '.touchslider-next',
        pagination: '.touchslider-nav-item',
        currentClass: 'touchslider-nav-item-current',
        prev: '.touchslider-prev',
        mouseTouch: true,
        autoplay: true
      });
    });
    </script>
    <div class='slider_touch'>
      <div class='slider_in'>
        <div class='touchslider' style='width:100%'>
          <div class='touchslider-viewport' style='width:320px;overflow:hidden;height:225px'>
            <div>
              $slider_image_all
            </div>
          </div>
          <div class='paging-container'>
            <div>
              $nav
            </div>
        </div>
        </div>
      </div>
    </div>
    ";

  return $main;
}

function list_tadnews($ncsn=''){
	global $xoopsDB,$xoopsUser,$xoopsOption,$xoopsTpl,$isAdmin,$xoopsModuleConfig;
  //取得目前使用者的所屬群組
  if($xoopsUser){
  	$User_Groups=$xoopsUser->getGroups();
  }else{
  	$User_Groups=array();
  }

  $and_ncsn=empty($ncsn)?"":"and `ncsn`='{$ncsn}'";

  //找出所有分類
  $sql="select ncsn,nc_title,enable_group,enable_post_group,cate_pic from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1' $and_ncsn";

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
$sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' $where_cate and start_day < '$today' and (end_day > '$today' or end_day='0000-00-00 00:00:00')  order by always_top desc , start_day desc";

//getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
$PageBar=getPageBar_mobile($sql,20,5);
$bar=$PageBar['bar'];
$sql=$PageBar['sql'];

$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

$all_news="";
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

	/*$news_content=strip_tags($news_content);
	$content=xoops_substr($news_content , 0 , 100 , "...");*/

	$g_txt=txt_to_group_name($enable_group,_MA_TADNEW_ALL_OK);

  $prefix_tag=mk_prefix_tag($prefix_tag);

  $pic=get_news_doc_pic_m("news_pic",$nsn,"thumb","height:80px;width:80px");
  $pic_thumb=(empty($pic))?"":"{$pic}";
  $all_news.=(empty($and_ncsn))?"
  <li><a href='{$_SERVER['PHP_SELF']}?nsn={$nsn}'>
  {$pic_thumb}
  <h3 style='white-space:normal;'>{$news_title}</h3>
  <p>$post_date | $cate_name</p>
  <span class='ui-li-count'>$counter</span>
  </a></li>":"
  <li><a href='{$_SERVER['PHP_SELF']}?nsn={$nsn}&ncsn={$ncsn}'>
  {$pic_thumb}
  <h3 style='white-space:normal;'>{$news_title}</h3>
  <p>$post_date | $cate_name</p>
  <span class='ui-li-count'>$counter</span>
  </a></li>";
}
$slider=tadnews_slidernews_show_m();
$all_news="
<script>
  $(document).ready(function() {
    $('.navigation').hide();
    m_remove();
    $('#more').click(function(){
      $('#more img').show();
      get_list();
    });

    function get_list() {
      var link=($('.next').attr('href'));
        $.get(
           link,
           function(data) {
            $('.navigation').remove();
            next_data=$(data).find('.listview li');
            nav=$(data).find('.navigation');
            $('#page_0 #content ul').append(next_data).listview('refresh');
            $('#page_0 #content').append(nav).trigger('create');
            $('.navigation').hide();
            $('#more img').hide();
            m_remove();
           }
        );
    }

    function m_remove() {
      var link=($('.next').attr('href'));
      if (link.length < 4) {
        $('#more').remove();
      }
    }

 });
</script>
$slider
<ul data-role='listview' data-filter='true' data-filter-placeholder='Headline search' class='listview'>$all_news</ul></br>
<div style='margin-top:20px'><a href='#' data-role='button' id='more' data-corners='false'><img src='images/loading.gif' width='16' height='16' style='display:none;vertical-align:middle;'> Read More...</a></div>
<div style='clear:both;text-align:center;padding:8px;' class='navigation'>$bar</div>";

return $all_news;
}

//取得新聞封面圖片檔案
  function get_news_doc_pic_m($col_name="",$col_sn="",$mode="big",$style="db",$only_url=false){
    global $xoopsDB,$xoopsUser,$xoopsModule;

    $sql = "select * from ".$xoopsDB->prefix("tadnews_files_center")." where `col_name`='{$col_name}' and `col_sn`='{$col_sn}' order by sort";

    $result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
    while($all=$xoopsDB->fetchArray($result)){
      //以下會產生這些變數： $files_sn, $col_name, $col_sn, $sort, $kind, $file_name, $file_type, $file_size, $description
      foreach($all as $k=>$v){
        $$k=$v;
      }

      $style=($style=='db')?$description:$style;
      if(empty($style) and !$only_url)return;

      if($mode!="big"){
        if($only_url){
          return XOOPS_URL."/uploads/tadnews/image/.thumbs/{$file_name}";
        }else{
          return "<img style='{$style}' src='".XOOPS_URL."/uploads/tadnews/image/.thumbs/{$file_name}'>";
        }
      }else{
        if($only_url){
          return XOOPS_URL."/uploads/tadnews/image/{$file_name}";
        }else{
          return "<img style='{$style}' src='".XOOPS_URL."/uploads/tadnews/image/{$file_name}'>";
        }
      }
    }
    return ;
  }

//顯示單一新聞
function show_news($nsn="",$m_ncsn=""){
	global $xoopsUser,$xoopsOption,$xoopsTpl,$isAdmin,$xoopsModuleConfig;

	//取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}

	$today=date("Y-m-d H:i:s");
	$news=get_tad_news_m($nsn);

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
      $main=pda_news_format($nsn,$news['news_title'],$news_content,$fun,$fun,$news['prefix_tag'],$uid,$ncsn,$cate,$news['start_day'],"",$news['have_read_group']);
			return $main;
		}else{
			$_SESSION['have_pass'][]=$nsn;
		}
	}


	$fun="";

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

/*		//高亮度語法
  if(!file_exists(TADTOOLS_PATH."/syntaxhighlighter.php")){
   redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
  include_once TADTOOLS_PATH."/syntaxhighlighter.php";
  $syntaxhighlighter= new syntaxhighlighter();
  $syntaxhighlighter_code=$syntaxhighlighter->render();
*/

  $files=get_news_files_m($nsn);

	$nsnsort=(empty($m_ncsn))?news_sort($nsn):news_sort($nsn,$ncsn);
	$link_ncsn=(empty($m_ncsn))?"":"&ncsn=$ncsn";

	$back_news="";
	if(!empty($nsnsort['back']['nsn'])){
	 //支援xlanguage
    if(function_exists('xlanguage_ml')){
      $nsnsort['back']['title']=xlanguage_ml($nsnsort['back']['title']);
    }
    $title=xoops_substr($nsnsort['back']['title'], 0, 30);
    $date=substr($nsnsort['back']['date'],5);
    $back_news="<a href='{$_SERVER['PHP_SELF']}?nsn={$nsnsort['back']['nsn']}{$link_ncsn}' class='nav' data-icon='arrow-u'>$title</a>";
  }

	$next_news="";
	if(!empty($nsnsort['next']['nsn'])){
	      //支援xlanguage
      if(function_exists('xlanguage_ml')){
        $nsnsort['next']['title']=xlanguage_ml($nsnsort['next']['title']);
      }

    $title=xoops_substr($nsnsort['next']['title'], 0, 30);
    $date=substr($nsnsort['next']['date'],5);
    $next_news="<a href='{$_SERVER['PHP_SELF']}?nsn={$nsnsort['next']['nsn']}{$link_ncsn}' class='nav' data-icon='arrow-d'>$title</a>";
  }



  $style="
  <style>
  #clean_news {
    border: 1px solid #CFCFCF;
    margin: 0px;
    background-image: none;
    padding:0px;
    border-radius: 5px;
    /*font-size:3em;*/
  }
  .nav{
    /*font-size:3em;*/
  }
  #news_head{
    margin:0px;
    padding:8px 8px 0px;
    background-color: #FCFCFC;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }
  #clean_news a{
    font-weight:normal;
    border:none;
  }
  #news_title{
    margin: 0px 0px 10px 0px;
    width: 100%;
    background-color: transparent;
  }
  #news_title a{
    font-weight: bolder;
    border: none;
    color:rgb(153,0,0);
  }
  #news_toolbar{
    border:none;
    margin:2px 4px 6px 10px;
  }
  #news_info{
    border:none;
    margin:2px 4px 6px 10px;
    color:gray;
    font-size: 80%;
  }
  #news_content {
    font-weight: normal;
    line-height: 1.5em;
    margin: 10px auto;
    overflow: hidden;
    width: 98%;
    word-wrap: break-word;
  }
  #news_content table{
    table-layout: fixed;
    width: 100%;
    word-wrap: break-word;
    border-collapse:collapse;
  }
  #news_content p {
    margin-top:10px;
    margin-bottom:10px;
  }
  #news_content h1{
    font-size: 140%;
  }
  #news_content h2{
    font-size: 120%;
  }
  #news_content h3{
    font-size: 100%;
  }
  #news_content img {
    max-width: 99%;
    overflow: hidden;
  }
  .t1 {
    border-top-width: 1px;
    border-left-width: 1px;
    border-top-style: solid;
    border-left-style: solid;
    border-top-color: #666;
    border-left-color: #666;
  }
  .t1 td {
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-right-style: solid;
    border-bottom-style: solid;
    border-right-color: #666;
    border-bottom-color: #666;
    padding: 2px;
  }
  .ui-navbar li:last-child .ui-btn, .ui-navbar .ui-grid-duo .ui-block-b .ui-btn {
    border-right-width: 1px;
    margin-right: 0;
  }
  .ui-navbar li .ui-btn:last-child {
    border-right-width: 1px;
    margin-right: 0;
  }
  .fb-comments, .fb-comments iframe[style], .fb-comments span {
    width: 100% !important;
  }
  .news_img {
    float: right;
    margin: 5px;
  }
  .tadnews_text_shadow {
    text-shadow: 0px 1px 1px #333333;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
  }
  </style>
";

	$all=pda_news_format($news['nsn'],$news['news_title'],$news['news_content'],$fun,$fun,$news['prefix_tag'],$news['uid'],$ncsn,$cate,$news['start_day'],$files,$have_read_group,$have_read_chk);

  $home="<a href='{$_SERVER['PHP_SELF']}' class='nav'>&#x21E7;"._MD_TADNEW_TO_MOD."</a>";

  $nav="<div data-role='navbar' data-iconpos='left' style='margin-top:10px;margin-bottom:20px'>
  <ul>
	 <li>$back_news</li>
	 <li>$next_news</li>
   </ul>
  </div>";

  $facebook_comments=facebook_comments($xoopsModuleConfig['facebook_comments_width'],'index.php');

	$main=$style.$syntaxhighlighter_code.$all.$nav.$facebook_comments;

	add_counter($nsn);

	return $main;
}


//新聞頁面
function pda_news_format($nsn="",$title="",$news_content="",$fun="",$fun2="",$prefix_tag="",$uid="",$ncsn="",$cate="",$start_day="",$files="",$have_read_group="",$have_read_chk="",$style=""){

  $uid_name=XoopsUser::getUnameFromId($uid,1);
  $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;

  $sign_bg=(!empty($have_read_group))?"style='background-image:url(".XOOPS_URL."/modules/tadnews/images/sign_bg.png);background-position: right top;background-repeat: no-repeat;'":"";

  $prefix_tag=mk_prefix_tag($prefix_tag);

  $push="<div style='background-color:#E4E4E4;text-align:center;padding:5px'>
  <a title='add to Twitter' href='http://twitter.com/home/?status=http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}' target='_blank'><img src='images/social/social_twitter.png' alt='add to Twitter' width='32' height='32' title='add to Twitter' align='absmiddle'></a>
  <a title='add to Plurk' href='http://www.plurk.com/?qualifier=shares&amp;status=http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}' target='_blank'><img src='images/social/social_plurk.png' alt='add to Plurk' width='32' height='32' title='add to Plurk' align='absmiddle'></a>
  <a title='add to FaceBook' href='http://www.facebook.com/share.php?u=http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}' target='_blank'><img src='images/social/social_facebook.png' alt='add to FaceBook' width='32' height='32' title='add to FaceBook' align='absmiddle'></a>
  <a title='add to Google Plus' href='https://plus.google.com/share?url=http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}' target='_blank'><img src='images/social/social_google.png' alt='add to Google Plus' width='32' height='32' title='add to Google Plus' align='absmiddle'></a>
  <a href='mailto:?subject={$title}&body=http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}' target='_blank'><img src='images/social/social_email.png' alt='email to Friends' width='32' height='32' align='absmiddle'></a>
  </div>
  <div style='clear:both;'></div>";

  $pic=get_news_doc_pic_m("news_pic",$nsn,"big","height:120px;width:120px");

  $news_content=str_replace("<p>--summary--</p>","",$news_content);
  $news_content=str_replace("--summary--","",$news_content);
  $news_content=strip_tags($news_content,'<div><table><tr><td><br><a><p><img><ul><ol><li>');
  $news_content=preg_replace('/(<[^>]+) style=".*?"/i', '$1', $news_content);
  $news_content=preg_replace('/(<[^>]+) width=".*?"/i', '$1', $news_content);

  $news=get_tad_news($nsn);
  $counter=$news[counter];

  $post_date=substr($start_day,0,10);

  $main="
  <script type='text/javascript'>
  $('div[data-role=\"page\"]').live('pagebeforeshow',function(){
  $('#page_{$nsn} #news_content table').addClass('t1');
  $('#page_{$nsn} #news_content table tr').filter(':even').css('background-color','rgb(230,230,230)');
  $('#page_{$nsn} #news_content [href]').attr('rel','external');
  });
  </script>
  <div id='clean_news' style='{$style}'>
    <div id='news_head' $sign_bg>
       <div id='news_title'>{$prefix_tag} <a href='{$_SERVER['PHP_SELF']}?nsn={$nsn}'>{$title}</a></div>
       <div id='news_info'>
       {$uid_name} - {$cate} | {$post_date} | "._MD_TADNEW_HOT."{$counter}
       </div>
    </div>

    <div id='news_content'><div class='news_img'>{$pic}</div>{$news_content}</div>
    $have_read_chk
    $files
    <div style='clear:both;height:10px;'></div>
    <div id='news_toolbar'>{$fun2}</div>
	$push
  </div>
  <div style='clear:both;'></div>";
	return $main;
}

function mk_prefix_tag($prefix_tag){
  //<font color='#0066FF'>[釋出]</font>
  if(empty($prefix_tag))return;
  $prefix_tag=str_replace("[","",$prefix_tag);
  $prefix_tag=str_replace("]","",$prefix_tag);
  $prefix_tag=str_replace("color='","class='tadnews_text_shadow' style='margin:2px 4px;padding:2px 4px;color:white;background-color:",$prefix_tag);
  return $prefix_tag;
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

//以流水號取得某筆tad_news資料
function get_tad_news_m($nsn="",$uid_chk=false){
	global $xoopsDB,$xoopsUser,$xoopsModule;
	if(empty($nsn))return;

	$sql = "select * from ".$xoopsDB->prefix("tad_news")." where nsn='$nsn'";
	$result = $xoopsDB->query($sql) or redirect_header("index.php",3,mysql_error());
	$data=$xoopsDB->fetchArray($result);

  //$news_content=strip_tags($data['news_content']);
	//$data['news_description']=xoops_substr($news_content, 0, 300);

	if($uid_chk){
	  if(empty($xoopsUser)) redirect_header("index.php",3,_MA_TADNEW_NO_ADMIN_POWER);
		$module_id = $xoopsModule->getVar('mid');
	  $isAdmin=$xoopsUser->isAdmin($module_id);
		$uid=$xoopsUser->getVar('uid');
	  if(!$isAdmin and $uid!=$data['uid']){
       redirect_header("index.php",3,_MA_TADNEW_NO_ADMIN_POWER);
		}
  }

	return $data;
}

//計數器
function add_counter($nsn){
	global $xoopsDB;

	$sql = "update ".$xoopsDB->prefix("tad_news")." set  counter = counter + 1 where nsn='$nsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return $nsn;
}

//新增自訂分頁物件mobile
  function getPageBar_mobile($sql="",$show_num=20,$page_list=10,$to_page="",$url_other=""){
    global $xoopsDB;
  	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],10, mysql_error()."<br>$sql");
  	$total=$xoopsDB->getRowsNum($result);

  	$navbar = new PageBar_mobile($total, $show_num, $page_list);
    if(!empty($to_page)){
      $navbar->set_to_page($to_page);
    }

    if(!empty($url_other)){
      $navbar->set_url_other($url_other);
    }
  	$mybar = $navbar->makeBar();
  	//$main['bar']="<div data-role='controlgroup' data-type='horizontal'>{$mybar['left']}{$mybar['center']}{$mybar['right']}</div>";
    $main['bar']="<div data-role='controlgroup' data-type='horizontal'>{$mybar['left']}{$mybar['right']}</div>";
  	$main['sql']=$sql.$mybar['sql'];
  	$main['total']=$total;

  	return $main;
  }

//新增自訂分頁物件mobile
class PageBar_mobile{
	// 目前所在頁碼
	var $current;
	// 所有的資料數量 (rows)
	var $total;
	// 每頁顯示幾筆資料
	var $limit;
	// 目前在第幾層的頁數選項？
	var $pCurrent;
	// 總共分成幾頁？
	var $pTotal;
	// 每一層最多有幾個頁數選項可供選擇，如：3 = {[1][2][3]}
	var $pLimit;
	var $prev;
	var $next;
	var $prev_layer = ' ';
	var $next_layer = ' ';
	var $first;
	var $last;
	var $bottons = array();
	// 要使用的 URL 頁數參數名？
	var $url_page = "g2p";
	// 要使用的 URL 讀取時間參數名？
	var $url_loadtime = "loadtime";
	// 會使用到的 URL 變數名，給 process_query() 過濾用的。
	var $used_query = array();
	// 目前頁數顏色
	var $act_color = "#990000";
	var $query_str; // 存放 URL 參數列

	function PageBar_mobile($total, $limit, $page_limit){
		$mydirname = basename( dirname( __FILE__ ) ) ;
		$this->prev = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/1leftarrow.gif' alt='"._BP_BACK_PAGE."' align='absmiddle' hspace=3>";
		$this->next = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/1rightarrow.gif' alt='"._BP_NEXT_PAGE."' align='absmiddle' hspace=3>";

		$this->limit = $limit;
		$this->total = $total;
		$this->pLimit = $page_limit;
	}

	function init(){
		$this->used_query = array($this->url_page, $this->url_loadtime);
		$this->query_str = $this->processQuery($this->used_query);
		$this->glue = ($this->query_str == "")?'?':
		'&';
		$this->current = (isset($_GET["$this->url_page"]))? $_GET["$this->url_page"]:
		1;
		$this->pTotal = ceil($this->total / $this->limit);
		$this->pCurrent = ceil($this->current / $this->pLimit);
	}

	//初始設定
	function set($active_color = "none", $buttons = "none"){
		if ($active_color != "none"){
			$this->act_color = $active_color;
		}

		if ($buttons != "none"){
			$this->buttons = $buttons;
			$this->prev = $this->buttons['prev'];
			$this->next = $this->buttons['next'];
			$this->prev_layer = $this->buttons['prev_layer'];
			$this->next_layer = $this->buttons['next_layer'];
			$this->first = $this->buttons['first'];
			$this->last = $this->buttons['last'];
		}
	}

	// 處理 URL 的參數，過濾會使用到的變數名稱
	function processQuery($used_query){
		// 將 URL 字串分離成二維陣列
		$vars = explode("&", $_SERVER['QUERY_STRING']);
		for($i = 0; $i < count($vars); $i++){
			$var[$i] = explode("=", $vars[$i]);
		}

		// 過濾要使用的 URL 變數名稱
		for($i = 0; $i < count($var); $i++){
			for($j = 0; $j < count($used_query); $j++){
				if (isset($var[$i][0]) && $var[$i][0] == $used_query[$j]) $var[$i] = array();
			}
		}

		// 合併變數名與變數值
		for($i = 0; $i < count($var); $i++){
			$vars[$i] = implode("=", $var[$i]);
		}

		// 合併為一完整的 URL 字串
		$processed_query = "";
		for($i = 0; $i < count($vars); $i++){
			$glue = ($processed_query == "")?'?':
			'&';
			// 開頭第一個是 '?' 其餘的才是 '&'
			if ($vars[$i] != "") $processed_query .= $glue.$vars[$i];
		}
		return $processed_query;
	}

	// 製作 sql 的 query 字串 (LIMIT)
	function sqlQuery(){
		$row_start = ($this->current * $this->limit) - $this->limit;
		$sql_query = " LIMIT {$row_start}, {$this->limit}";
		return $sql_query;
	}


	// 製作 bar
	function makeBar($url_page = "none"){
		if ($url_page != "none"){
			$this->url_page = $url_page;
		}
		$this->init();

		// 取得目前時間
		$loadtime = '&loadtime='.time();

		// 取得目前頁框(層)的第一個頁數啟始值，如 6 7 8 9 10 = 6
		$i = ($this->pCurrent * $this->pLimit) - ($this->pLimit - 1);

		$bar_center = "<a href='{$_SERVER['PHP_SELF']}' data-role='button' data-icon='home' rel='external'>HOME</a>";

		// 往前跳一頁
		if ($this->current <= 1){
			$bar_left = "<a href='#' title='BACK' class='prev ui-disabled' data-role='button' data-icon='arrow-u' rel='external'>BACK</a>";
		}	else{
			$i = $this->current-1;
			$bar_left = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}' title='BACK' class='prev' data-role='button' data-icon='arrow-u' rel='external'>BACK</a> ";
		}

		// 往後跳一頁
		if ($this->current >= $this->pTotal){
			$bar_right = "<a href='#' title='NEXT' class='next ui-disabled' data-role='button' data-icon='arrow-d' data-iconpos='right' rel='external'>NEXT</a>";
		}	else{
			$i = $this->current + 1;
			$bar_right = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}' title='NEXT' class='next' data-role='button' data-icon='arrow-d' data-iconpos='right' rel='external'>NEXT</a> ";
		}

		$page_bar['center'] = $bar_center;
		$page_bar['left'] = $bar_left;
		$page_bar['right'] = $bar_right;
		$page_bar['current'] = $this->current;
		$page_bar['total'] = $this->pTotal;
		$page_bar['sql'] = $this->sqlQuery();
		return $page_bar;
	}

}

//取得分類下拉選單
function get_tad_news_cate_option_m($v=""){
	global $xoopsDB;

	//$option="<option>"._MA_TADNEW_NEWS_CATE."</option>";
	$option="<option value='0'>"._MD_TADNEW_ALL_CATE."</option>";
	//$option=="";
	$sql = "select ncsn,nc_title,not_news from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1' order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	while(list($ncsn,$nc_title,$not_news)=$xoopsDB->fetchRow($result)){

		$selected=($v==$ncsn)?"selected":"";
		$option.="<option value='{$ncsn}' $selected>{$nc_title}</option>";
		//$option.=get_tad_news_cate_option($v);
	}
	return $option;
}

//取得附檔或附圖$show_mode=filename、num
function show_files_m($col_name="",$col_sn="",$thumb=false,$show_mode=""){
  global $MDIR;
  if($show_mode==""){

  $all_files="
  <script>
    $( document ).on( 'pageinit', function() {
        $( '.photopopup' ).on({
            popupbeforeposition: function() {
                var maxHeight = $( window ).height() - 60 + \"px\";
                $( '.photopopup img' ).css( 'max-height', maxHeight );
            }
        });
    });
  </script>
  ";
  }else{
    $all_files="";
  }
  $file_arr="";
  $file_arr=get_file($col_name,$col_sn);

  if($file_arr){
    $i=1;
    foreach($file_arr as $files_sn => $file_info){

      if($show_mode=="filename"){
        if($file_info['kind']=="file"){
          $all_files.="<div>({$i}) {$file_info['link']}</div>";
        }else{
          $all_files.="<div>({$i}) {$file_info['url']}</div>";
        }
      }else{
        if($file_info['kind']=="file"){
          $linkto=$file_info['path'];
          $description=$file_info['description'];
          $thumb_pic=XOOPS_URL."/modules/tadtools/multiple-file-upload/downloads.png";
          $rel="href='{$linkto}' target='_blank'";
        }else{
          $linkto=$file_info['path'];
          $description=$file_info['description'];
          $thumb_pic=$file_info['tb_path'];
          $rel="href='#popupPhotoLandscape_$files_sn' data-rel='popup' data-position-to='window'";
        }

        $all_files.="
        <div style='border:0px solid gray;width:110px;min-height:113px;float:left;display:inline;margin:2px;'>
          <a {$rel}>
          <div align='center' style=\"border:1px solid #CFCFCF;width:110px;height:90px;overflow:hidden;margin:2px auto;background-image:url('{$thumb_pic}');background-repeat: no-repeat;background-position: center center;cursor:pointer;\">
          </div>
          </a>
          <div style='text-align:center;line-height:100%;'><a {$rel} style='font-size:11px;font-weight:normal;text-align:left;'>({$i}){$description}</a>
          </div>
        </div>

        <div data-role='popup' id='popupPhotoLandscape_$files_sn' class='photopopup' data-overlay-theme='a' data-corners='false' data-tolerance='30,15' >
        <a href='#' data-rel='back' data-role='button' data-theme='a' data-icon='delete' data-iconpos='notext' class='ui-btn-right'>Close</a>
        <img src='{$linkto}' alt='{$description}'>
        </div>
        ";
      }

      $i++;
    }
  }else{
    $all_files="";
  }
  return $all_files;
}

//取得附檔
function get_news_files_m($nsn="",$mode=""){
  global $xoopsUser,$xoopsModuleConfig;
  //取得目前使用者的所屬群組
  if($xoopsUser){
    $reader_uid=$xoopsUser->getVar('uid');
  }else{
    $reader_uid="";
  }
  $files=show_files_m("nsn",$nsn,true,$mode);
  $news=get_tad_news($nsn);
  if($xoopsModuleConfig['download_after_read']=='1' and !empty($news['have_read_group'])){
    $time=chk_sign_status($reader_uid,$nsn);
    if(empty($time) and !empty($files)){
      $files=($mode=="filename")?_MD_TADNEW_DOWNLOAD_AFTER_READ:"<div style='width:80%; margin:8px auto;border:1px solid #404040; padding:10px;background-color:#CCCCFF; text-align:center;'>"._MD_TADNEW_DOWNLOAD_AFTER_READ."</div>";
    }
  }

  return $files;
}


/*-----------執行動作判斷區----------*/
$_REQUEST['op']=(empty($_REQUEST['op']))?"":$_REQUEST['op'];

$nsn=(isset($_REQUEST['nsn']))?intval($_REQUEST['nsn']) : 0;
$ncsn=(isset($_REQUEST['ncsn']))?intval($_REQUEST['ncsn']) : 0;

switch($_REQUEST['op']){


	default:
	if(!empty($nsn)){
		$main=show_news($nsn,$ncsn);
	}else{
		$main=list_tadnews($ncsn);
	}
	break;
}


/*-----------秀出結果區--------------*/
$title=$xoopsModule->getVar('name');
//分類下拉選單
$cate_select=get_tad_news_cate_option_m($ncsn);
//分類
$news=get_tad_news($nsn);
$ncsn=$news['ncsn'];
$cates=get_all_news_cate();
//$cate=$cates[$ncsn];
$cate=(empty($cates[$ncsn]))?"$title":"$title-$cates[$ncsn]";
echo "
<!DOCTYPE HTML>
<html>
<head>
<meta charset='"._CHARSET."'>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;' name='viewport'/>
<meta name='apple-mobile-web-app-capable'content='yes'/>
<title>$cate</title>
<link href='".XOOPS_URL."/modules/tadtools/jquery.mobile/jquery.mobile.css' rel='stylesheet' type='text/css'/>
<script src='".XOOPS_URL."/modules/tadtools/jquery/jquery.js' type='text/javascript'></script>
<!--script>
$(document).bind('mobileinit', function(){
  $.mobile.ajaxEnabled=false;
});
</script-->
<script>
$(document).bind('mobileinit', function()
{
    if (navigator.userAgent.indexOf('Android') != -1)
    {
        $.mobile.ajaxEnabled=false;
        $.mobile.defaultPageTransition = 'none';
        $.mobile.defaultDialogTransition = 'none';
    }
});
</script>
<script src='".XOOPS_URL."/modules/tadtools/jquery.mobile/jquery.mobile.js' type='text/javascript'></script>
</head>
<style>
.ui-btn-right {
  top: -4px !important;
}
.ui-header .ui-title {
  margin: 0.6em 0% 0.8em !important;
}
.ui-bar-b {
  opacity:0.9;
}
input.ui-input-text {
  font-size: 14px;
}
</style>
<body>
<div data-role='page' id='page_{$nsn}'>
  <div data-role='header' data-theme='b' data-position='fixed'>
    <a href='{$_SERVER['PHP_SELF']}' data-icon='home' data-iconpos='notext' data-direction='reverse' class='ui-btn-left' rel='external'>Home</a>
	<h1>$cate</h1>
	<div class='ui-btn-right'>
	  <select onChange=\"window.location.href='{$_SERVER['PHP_SELF']}?ncsn=' + this.value\" data-icon='grid' data-iconpos='notext' data-native-menu='true' data-mini='true' style='padding-top:0px;margin-top:0px'>$cate_select</select>
	</div>
  </div>
  <div data-role='content' id='content'>
	$main
  </div>
	<!--<div data-role='footer'>
		<h4>頁尾</h4>
	</div>-->
</div>
</body>
</html>
";
?>
