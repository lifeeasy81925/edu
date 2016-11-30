<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: newspaper.php,v 1.3 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "admin_header.php";

/*-----------function區--------------*/


//找出現有電子報
function newspaper_set_table($sel_nps_sn=""){
  global $xoopsDB;
  $option="";
  //找出現有設定組
  $sql = "select nps_sn,title from ".$xoopsDB->prefix("tad_news_paper_setup")."";
  $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  while(list($nps_sn,$title)=$xoopsDB->fetchRow($result)){
    if($sel_nps_sn==$nps_sn){
      $selected="selected";
      $ptitle=$title;
    }else{
      $selected="";
    }
    $option.="<option value='{$nps_sn}' $selected>$title</option>";
  }
  
  if(empty($option)){
    $main=open_newspaper();
    return $main;
  }
  
  
  $sql = "select a.npsn,a.number,b.title,a.np_date from ".$xoopsDB->prefix("tad_news_paper")." as a ,".$xoopsDB->prefix("tad_news_paper_setup")." as b where a.nps_sn=b.nps_sn and b.nps_sn='{$sel_nps_sn}' order by a.np_date desc";

  $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $total=$xoopsDB->getRowsNum($result);

  $main="
  <script>
  function delete_tad_newspaper_set(){
    var sure = window.confirm('"._MD_TADNEW_SURE_DEL."');
    if (!sure)        return;
    location.href=\"{$_SERVER['PHP_SELF']}?op=del_newspaper_set&nps_sn={$sel_nps_sn}\";
  }
  function delete_tad_newspaper(npsn){
    var sure = window.confirm('"._MD_TADNEW_SURE_DEL."');
    if (!sure)        return;
    location.href=\"{$_SERVER['PHP_SELF']}?op=del_newspaper&npsn=\" + npsn;
  }
  </script>

  <div style='margin:10px;'>
  <select name='nps_sn' id='nps_sn' onChange=\"window.location.href='{$_SERVER['PHP_SELF']}?nps_sn='+this.value \"><option value=''>"._MA_TADNEW_NP_OPTION."</option>$option</select>
  ";
  
  //刪除按鈕
  if(!empty($sel_nps_sn) and empty($total)){
    $main.="
    <input type='button' value='"._MA_TADNEW_NP_DEL.$ptitle."'  onClick='delete_tad_newspaper_set()' style='background-color:red;color:white;'>";
  }elseif(!empty($sel_nps_sn)){
    $main.=sprintf(_MA_TADNEW_NP_DEL_DESC,$total);
  }

  //修改按鈕
  if(!empty($sel_nps_sn)){
    $main.="
    <input type='button' value='"._MA_TADNEW_NP_MODIFY."' onClick=\"location.href='{$_SERVER['PHP_SELF']}?op=modify&nps_sn=$sel_nps_sn'\" style='background-color:#F8F8F8;'>
    
    <input type='button' value='"._MA_TADNEW_NP_EMAIL."' onClick=\"location.href='{$_SERVER['PHP_SELF']}?op=newspaper_email&nps_sn=$sel_nps_sn'\" style='background-color: #CCFF99;'>

    <input type='button' value='"._MA_TADNEW_NP_SELECT."' onClick=\"location.href='{$_SERVER['PHP_SELF']}?op=add_newspaper&nps_sn=$sel_nps_sn'\" style='background-color:yellow;'>";
  }


  $main.="
  </div>
  <table id='tbl' style='width:100%'>
  <tr><th>"._MA_TADNEW_NP_TITLE."</th><th>"._MA_TADNEW_NP_DATE."</th><th>"._MA_TADNEW_FUNCTION."</th></tr>";


  while(list($allnpsn,$number,$title,$np_date)=$xoopsDB->fetchRow($result)){
      $main.="<tr><td><a href='../newspaper.php?npsn={$allnpsn}'>{$title}".sprintf(_MA_TADNEW_NP_NUMBER_INPUT,$number)."</a></td><td>{$np_date}</td><td><a href='newspaper.php?op=edit_newspaper&npsn={$allnpsn}'>"._MA_TADNEW_EDIT."</a> | <a href=\"javascript:delete_tad_newspaper($allnpsn);\">"._MA_TADNEW_DEL."</a> | <a href='newspaper.php?op=sendmail_log&npsn={$allnpsn}'>"._MD_TADNEW_SEND_LOG."</a> | <a href='newspaper.php?op=sendmail&npsn={$allnpsn}'>"._MD_TADNEW_SEND_NOW."</a></td></tr>";
  }
  $main.="</table>";

  $create="<div style='margin:10px;'><input type='button' value='"._MA_TADNEW_NP_CREATE."'  onClick=\"window.location.href='{$_SERVER['PHP_SELF']}?mode=create'\"></div>";
  $main=div_3d(_MA_TADNEW_NP_LIST,$main,"corners","",$create);


  return $main;
}


//選擇佈景
function newspaper_themes($themes=""){

  if (is_dir(_TADNEWS_NSP_THEMES_PATH)) {
    if ($dh = opendir(_TADNEWS_NSP_THEMES_PATH)) {
      $select="<select name='themes'>";
      while (($file = readdir($dh)) !== false) {
        if($file=="." or $file=="..")continue;
        if(is_dir(_TADNEWS_NSP_THEMES_PATH."/".$file)){
          $selected=($themes==$file)?"selected":"";
            $select.="<option value='$file' $selected>$file</option>";
          }
      }
      $select.="</select>";
      closedir($dh);
    }
  }
  return $select;
}



//建立電子報
function open_newspaper($nps_sn=""){
  global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;

  //修改模式
  $hidden=(empty($nps_sn))?"":"<input type='hidden' name='nps_sn' value='{$nps_sn}'>";
  //取得主題資料
  $set=(empty($nps_sn))?array():get_newspaper_set($nps_sn);
  //取得使用之佈景
  $nps_theme=newspaper_themes($set['themes']);

  $np_title=(empty($nps_sn))?"$xoopsConfig[sitename]"._MA_TADNEW_NP:$set['title'];

  $author=$xoopsUser->getVar('uname');

  $head=(empty($nps_sn) or empty($set['head']))?sprintf(_MA_TADNEW_NP_HEAD_CONTENT,$xoopsConfig['sitename'],XOOPS_URL):$set['head'];

  $foot=(empty($nps_sn) or empty($set['foot']))?sprintf(_MA_TADNEW_NP_FOOT_CONTENT,$author,XOOPS_URL,$xoopsConfig['sitename'],$xoopsConfig['sitename'],$xoopsConfig['adminmail'],$xoopsConfig['adminmail'],XOOPS_URL,XOOPS_URL):$set['foot'];




  $main="
  <table class='form_tbl'>
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
  <tr><td class='title'>"._MA_TADNEW_NP_THEMES."</td><td>{$nps_theme}</td></tr>
  <tr><td class='title' style='width:150px'>"._MA_TADNEW_NP_TITLE."</td><td style='width:650px'>
  <input type='input' name='title' style='width:100%' value='{$np_title}'></td></tr>
  <tr><td class='title'>"._MA_TADNEW_NP_CONTENT_HEAD."</td><td><textarea name='head' style='width:100%;height:80px;'>$head</textarea></td></tr>
  <tr><td class='title'>"._MA_TADNEW_NP_CONTENT_FOOT."</td><td><textarea name='foot' style='width:100%;height:150px;'>$foot</textarea></td></tr>
  <tr><td class='bar' colspan=2>
  $hidden
  <input type='hidden' name='op' value='save_newspaper_set'>
  <input type='submit' value='"._MA_TADNEW_NP_SUBMIT."'></td><td></tr>
  </form>
  </table>";


  $main=div_3d(_MA_TADNEW_NP_STEP1,$main,"corners");


  return $main;
}


//儲存電子報設定
function save_newspaper_set($nps_sn=""){
  global $xoopsDB,$xoopsUser;
  $myts =& MyTextSanitizer::getInstance();
  $title=$myts->addSlashes($_POST['title']);
  $head=$myts->addSlashes($_POST['head']);
  $foot=$myts->addSlashes($_POST['foot']);
  $themes=$myts->addSlashes($_POST['themes']);
  
  if(empty($nps_sn)){
    $sql = "insert into ".$xoopsDB->prefix("tad_news_paper_setup")." (title,head,foot,themes,status) values('{$title}','{$head}','{$foot}','{$themes}','1')";
  }else{
    $sql = "update ".$xoopsDB->prefix("tad_news_paper_setup")." set title='{$title}',head='{$head}',foot='{$foot}',themes='{$themes}' where nps_sn='{$nps_sn}'";
  }

  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  //取得最後新增資料的流水編號
  $nps_sn=(empty($nps_sn))?$xoopsDB->getInsertId():$nps_sn;

  return $nps_sn;
}


//自動抓數字
function get_max_number($nps_sn=""){
        global $xoopsDB;
        $sql = "select max(`number`) from ".$xoopsDB->prefix("tad_news_paper")." where nps_sn='{$nps_sn}'";
        $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
        list($number)=$xoopsDB->fetchRow($result);
        $max_number=(empty($number))?1:$number+1;
        return $max_number;
}

//選擇電子報內容
function add_newspaper($nps_sn=""){
  global $xoopsDB,$xoopsModule,$xoopsUser;

  $cates=get_all_news_cate();

  $sql = "select * from ".$xoopsDB->prefix("tad_news")." where enable='1' order by start_day desc";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  $opt="";
  while(list($nsn,$ncsn,$news_title,$news_content,$start_day,$end_day,$enable,$uid,$passwd,$enable_group)=$xoopsDB->fetchRow($result)){
    $opt.="<option value=\"$nsn\">[{$nsn}][ {$cates[$ncsn]} ] {$news_title}</option>";
  }


  $newspaper_set=get_newspaper_set($nps_sn);

  //自動抓數字
  $number=get_max_number($nps_sn);

  $main="
	<script type=\"text/javascript\" src=\"../class/tmt_core.js\"></script>
	<script type=\"text/javascript\" src=\"../class/tmt_spry_linkedselect.js\"></script>
	<script type=\"text/javascript\">
	function getOptions()
	  {
	  var x=document.getElementById(\"destination\");
	  txt=\"\";
	  for (i=0;i<x.length;i++)
	    {
	    txt=txt + \",\" + x.options[i].value;
	    }
	  document.getElementById(\"all_news\").value=txt;
	  }
	</script>
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
  
  <table class='form_tbl' style='width:auto'>
    <tr><td class='title' style='width:100px'>"._MA_TADNEW_NP_NUMBER."</td><td colspan=3>
    {$newspaper_set['title']}".sprintf(_MA_TADNEW_NP_NUMBER_INPUT,"<input type='input' name='number' value='{$number}' size=2>")."
    </td></tr>
		<tr><td class='title'>"._MA_TADNEW_NP_CONTENT."</td>
		<td style='vertical-align:top;'>
			<select name=\"repository\" id=\"repository\" size=\"12\" multiple=\"multiple\"	tmt:linkedselect=\"true\" style='width: 300px;'>
			$opt
			</select>
		</td>
		<td style='vertical-align:middle'>
		<button type=\"button\" onclick=\"tmt.spry.linkedselect.util.moveOptions('repository', 'destination');getOptions();\"><img src=\"../images/right.png\"></button><br>
		<button type=\"button\" onclick=\"tmt.spry.linkedselect.util.moveOptions('destination' , 'repository');getOptions();\"><img src=\"../images/left.png\"></button><br><br>

<button type=\"button\" onclick=\"tmt.spry.linkedselect.util.moveOptionUp('destination');getOptions();\"><img src=\"../images/up.png\"></button><br>
		<button type=\"button\" onclick=\"tmt.spry.linkedselect.util.moveOptionDown('destination');getOptions();\"><img src=\"../images/down.png\"></button>
		</td>
		<td style='vertical-align:top;'>
			<select id=\"destination\" size=\"12\" multiple=\"multiple\" tmt:linkedselect=\"true\" style='width: 300px;'>
			$opt2
			</select>
		</td>
	</tr>
	<tr><td colspan=4>
    <input type='hidden' name='op' value='save_newspaper'>
    <input type='hidden' name='nps_sn' value='{$nps_sn}'>
    <input type='hidden' name='all_news' id='all_news'>
    <input type='submit' value='"._MA_TADNEW_NP_SUBMIT."'>
    </td></tr>
	</table>

  </form>
  ";

  $main=div_3d(_MA_TADNEW_NP_STEP2,$main);
  return $main;
}

//儲存電子報內容
function save_newspaper(){
  global $xoopsDB,$xoopsUser;
  $all_news=substr($_POST['all_news'],1);

  $sql = "insert into ".$xoopsDB->prefix("tad_news_paper")." (`nps_sn`, `number`, `nsn_array`, `np_date`) values('{$_POST['nps_sn']}','{$_POST['number']}','{$all_news}',now())";
  $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  //取得最後新增資料的流水編號
  $npsn=$xoopsDB->getInsertId();

  return $npsn;
}



//【步驟三】編輯電子報
function edit_newspaper($npsn=""){
  global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsModuleConfig;
  $cates=get_all_news_cate();
  $newspaper=get_newspaper($npsn);
  $newspaper_set=get_newspaper_set($newspaper['nps_sn']);

  if(empty($newspaper['np_content'])){

   $html="";
   if(empty($newspaper['nsn_array'])){
     $news="limit 0,10";
   }else{
     $news="where nsn in({$newspaper['nsn_array']}) order by find_in_set(nsn,'{$newspaper['nsn_array']}');";
   }
   $sql = "select * from ".$xoopsDB->prefix("tad_news")." $news";

   $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3,  mysql_error());
   while(list($nsn,$ncsn,$news_title,$news_content,$start_day,$end_day,$enable,$uid,$passwd,$enable_group)=$xoopsDB->fetchRow($result)){

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
      $news_content=$content[0].$more;
      $html.="<h3 class='TadNewsPaper_title'>"._MA_TADNEW_NP_TITLE_L."{$cates[$ncsn]}"._MA_TADNEW_NP_TITLE_R."<a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}' target='_blank'>{$news_title}</a></h3>
      <div class='TadNewsPaper_content'>$news_content</div>
      <hr class='TadNewsPaper_hr'>";
   }
   //$html.="{$newspaper_set['foot']}";
 }else{
   $html=$newspaper['np_content'];
 }
 
  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/fck.php")){
    redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
  }
  include_once XOOPS_ROOT_PATH."/modules/tadtools/fck.php";
  $fck=new FCKEditor264("tadnews","np_content",$html);
	$fck->setHeight(600);
	$editor=$fck->render();

  $main="
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
  <table class='form_tbl' style='width:800px'>
  <tr><td colspan=2>$editor</td></tr>
  <tr><td class='bar' colspan=2>
  <input type='hidden' name='npsn' value='{$npsn}'>
  <input type='hidden' name='op' value='save_all'>
        <input type='submit' value='"._MA_TADNEW_NP_SUBMIT."'></td><td>
  </table>

  </form>";

  $main=div_3d(_MA_TADNEW_NP_STEP3,$main);
  return $main;
}

//儲存所有內容
function save_all($npsn=""){
  global $xoopsDB,$xoopsUser;

  $sql = "update ".$xoopsDB->prefix("tad_news_paper")." set np_content='{$_POST['np_content']}' where npsn='{$npsn}'";
  $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  return $npsn;
}

//寄信表單
function sendmail_form($npsn=""){
  global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig,$xoopsModuleConfig;
  $newspaper=get_newspaper($npsn);

  //取得郵寄名單
  $sql = "select email from ".$xoopsDB->prefix("tad_news_paper_email")." where nps_sn='{$newspaper['nps_sn']}'";
  $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $total=$xoopsDB->getRowsNum($result);

  while(list($email)=$xoopsDB->fetchRow($result)){
    if(empty($email))continue;
    $emailArr[]=$email;
  }
  
  //取得已寄名單
	$sql = "select * from ".$xoopsDB->prefix("tad_news_paper_send_log")." where `npsn`='$npsn' order by send_time";
 	$result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
 	while($all=$xoopsDB->fetchArray($result)){
	  //以下會產生這些變數： $npsn, $email, $send_time, $log
    foreach($all as $k=>$v){
      $$k=$v;
    }
    $mailData[$email]="<td>$send_time</td><td>$log</td>";
  }
 	
 	$log="
  <script>
		function delete_tad_news_email_func(email){
			var sure = window.confirm('"._MD_TADNEW_SURE_DEL."');
			if (!sure)	return;
			location.href=\"{$_SERVER['PHP_SELF']}?op=delete_tad_news_email_npsn&npsn={$npsn}&nps_sn={$newspaper['nps_sn']}&email=\" + email;
		}
	</script>
    <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
    <table class='line'>";
  $nn=1;
 	foreach($emailArr as $email){

    $tr1=($nn%2)?"<tr>":"";
    $tr2=($nn%2)?"":"</tr>";
    $checked=empty($mailData[$email])?"checked":"";
    $data=empty($mailData[$email])?"<td>"._MD_TADNEW_NEVER_SEND."</td><td><a href=\"javascript:delete_tad_news_email_func('$email');\">"._MA_TADNEW_DEL."</a></td>":$mailData[$email];
    $log.="{$tr1}<td>
    <input type='checkbox' name='mail_array[]' value='$email' $checked>
    $email
    </td>$data
    {$tr2}";
    $nn++;
  }
  $log.="
  <tr><td colspan=6>
    <input type='hidden' name='op' value='send_now'>
    <p align='center'><input type='submit' value='"._MD_TADNEW_SEND_NOW."'></p></td></tr>
  </table>
  
    <input type='hidden' name='npsn' value='{$npsn}'>
  </form>";

  $main=sprintf(_MD_TADNEW_MAIL_LIST,$total)."<br>$log";
  $main=div_3d(_MA_TADNEW_NP_STEP4,$main);

  $main.="<iframe src='{$_SERVER['PHP_SELF']}?op=preview&npsn={$npsn}' style='width:800px;height:480px;border:1px solid gray;clear:both'>{$newspaper['np_content']}</iframe>";
  return $main;
}


//立即寄出
function send_now($npsn=""){
  global $xoopsConfig,$xoopsUser,$xoopsDB;

  $mail_array=$_POST['mail_array'];

  $xoopsMailer =& getMailer();
  $xoopsMailer->multimailer->ContentType="text/html";

  $newspaper=get_newspaper($npsn);
  $newspaper_set=get_newspaper_set($newspaper['nps_sn']);
  $subject=$newspaper_set['title'] . sprintf(_MA_TADNEW_NP_NUMBER_INPUT,$newspaper['number']);

  $content=preview_newspaper($npsn);
  $content=str_replace("src=\"/","src=\"".XOOPS_URL."/",$content);

  $headers="";
  $xoopsMailer->addHeaders("MIME-Version: 1.0");

	$xoopsMailer->setFromEmail($xoopsUser->getVar("email", "E"));
	$xoopsMailer->setFromName($xoopsUser->getVar("uname", "E"));

  //$xoopsMailer->setSubject($subject);
  //$xoopsMailer->setBody($content);

  foreach($mail_array as $email){
    if(empty($email))continue;
    if($xoopsMailer->sendMail($email, $subject, $content)){
      $sql="replace into ".$xoopsDB->prefix("tad_news_paper_send_log")." (npsn,email,send_time,log) values('{$npsn}','{$email}',now(), 'success')";
      $xoopsDB->queryF($sql);
    }else{
      $sql="replace into ".$xoopsDB->prefix("tad_news_paper_send_log")." (npsn,email,send_time,log) values('{$npsn}','{$email}',now(),'fail')";
      $xoopsDB->queryF($sql);
    }
  }
}

//刪除電子報
function del_newspaper($npsn=""){
  global $xoopsDB;

  $sql = "delete from ".$xoopsDB->prefix("tad_news_paper")." where npsn='{$npsn}'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

}

//刪除電子報設定組
function del_newspaper_set($nps_sn=""){
  global $xoopsDB;

  $sql = "delete from ".$xoopsDB->prefix("tad_news_paper_setup")." where nps_sn='{$nps_sn}'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

}

//Email 管理
function newspaper_email($nps_sn=""){
  global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;

  //取得郵寄名單
  $sql = "select email,order_date from ".$xoopsDB->prefix("tad_news_paper_email")." where nps_sn='{$nps_sn}' order by email";
  
  $PageBar=getPageBar($sql,30,10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];
  $total=$PageBar['total'];
  
  $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  $main="
  <script>
		function delete_tad_news_email_func(email){
			var sure = window.confirm('"._MD_TADNEW_SURE_DEL."');
			if (!sure)	return;
			location.href=\"{$_SERVER['PHP_SELF']}?op=delete_tad_news_email&nps_sn=$nps_sn&g2p={$_GET['g2p']}&email=\" + email;
		}
	</script>
  <table id='tbl'>
  <tr><td colspan=4>
  $bar
  </td></tr>";
  while(list($email,$order_date)=$xoopsDB->fetchRow($result)){
    if(!empty($_GET['memail']) and $_GET['memail']==$email){
      $main.="<tr><td colspan=4>
      <form action='newspaper.php' method='post'>
      <input type='text' name='new_email' value='$email' style='width:100%;background-color:#FFFF99;color:black;'></td><td>
      <input type='hidden' name='old_email' value='$email'>
      <input type='hidden' name='op' value='update_email'>
      <input type='hidden' name='nps_sn' value='$nps_sn'>
      <input type='hidden' name='g2p' value='{$_GET['g2p']}'>
      <input type='submit' value='"._MA_TADNEW_SAVE_CATE."'>
  		</form>
      </td></tr>";
    }else{
      $ok=(check_email_mx($email))?"ok":"<span style='color:red'>error</span>";
      $main.="<tr><td>$email</td><td>$order_date</td><td>$ok</td><td>
      <a href='newspaper.php?op=newspaper_email&nps_sn=$nps_sn&memail={$email}&g2p={$_GET['g2p']}'>"._MA_TADNEW_EDIT."</a>
  			<a href=\"javascript:delete_tad_news_email_func('$email');\">"._MA_TADNEW_DEL."</a>
      </td></tr>";
    }
  }
  $main.="
  <tr><td colspan=4>
  $bar
  </td></tr>
  <tr><td colspan=4>
  <form action='newspaper.php' method='post'>
  <textarea name='email_import' style='width:400px;height:100px;'></textarea>
  <input type='hidden' name='nps_sn' value='$nps_sn'>
  <input type='hidden' name='op' value='email_import'><br>
  <input type='submit' value='"._MA_TADNEW_NP_EMAIL_IMPORT."'>
  </form>
  </td></tr></table>";
  $main=div_3d(_MA_TADNEW_NP_EMAIL,$main,"corners","",sprintf(_MA_TADNEW_NP_EMAIL_NUM,$total));
  return $main;
}


//檢查Email
function check_email_mx($email) {
    if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) ||
        (preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) {
        $host = explode('@', $email);
        if(checkdnsrr($host[1].'.', 'MX') ) return true;
        if(checkdnsrr($host[1].'.', 'A') ) return true;
        if(checkdnsrr($host[1].'.', 'CNAME') ) return true;
    }
    return false;
}

//檢查 DNS
if (!function_exists('checkdnsrr')) {
    function checkdnsrr($host, $type = '') {
        if(!empty($host)) {
            if($type == '') $type = "MX";
            @exec("nslookup -type=$type $host", $output);
            while(list($k, $line) = each($output)) {
                if(eregi("^$host", $line)) {
                    return true;
                }
            }
            return false;
        }
    }
}

//刪除Email
function delete_tad_news_email($email="",$nps_sn=""){
 global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;

  $email_part=substr($email,0,15);

  $sql = "delete from ".$xoopsDB->prefix("tad_news_paper_email")." where email like '{$email_part}%' and nps_sn='{$nps_sn}'";

  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

}

//更新Email
function update_email($old_email,$new_email,$nps_sn){
 global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;

  $sql = "update ".$xoopsDB->prefix("tad_news_paper_email")." set email='$new_email' where email='$old_email' and nps_sn='{$nps_sn}'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

}


//匯入Email
function email_import($email_import="",$nps_sn=""){
 global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;
  if(empty($email_import))return;
  $email_import=str_replace("\n","",$email_import);
  $email_import=str_replace(" ","",$email_import);
  $emails=explode(",",$email_import);
  foreach($emails as $email){
    $email=trim($email);
    if(!empty($email)){
      $sql = "replace into ".$xoopsDB->prefix("tad_news_paper_email")." (`nps_sn`,`email`,`order_date`) values('$nps_sn','$email',now())";
      $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
    }
  }
}

//秀出郵寄結果
function sendmail_log($npsn=""){
 global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsConfig;

	$sql = "select * from ".$xoopsDB->prefix("tad_news_paper_send_log")." where `npsn`='$npsn' order by send_time";

 	$result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
 	$total=$xoopsDB->getRowsNum($result);
 	if(empty($total))return "<div style='border:1px solid gray;background-color:white;padding:10px;width:200px;text-align:center;margin:10 auto;font-size:16px;'>"._MD_TADNEW_EMPTY_LOG."</div>";
 	
 	$main="<table class='line' style='width:auto;'>";
  $nn=1;
 	while($all=$xoopsDB->fetchArray($result)){

    $tr1=($nn%2)?"<tr>":"";
    $tr2=($nn%2)?"":"</tr>";
	  //以下會產生這些變數： $npsn, $email, $send_time, $log
    foreach($all as $k=>$v){
      $$k=$v;
    }
    $main.="{$tr1}<td>$email</td><td>$send_time</td><td>$log</td>{$tr2}";
    $nn++;
  }
 	$main.="</table>";
 	return $main;
}
/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];
$nps_sn = (!isset($_REQUEST['nps_sn']))? "":intval($_REQUEST['nps_sn']);
$npsn = (!isset($_REQUEST['npsn']))? "":intval($_REQUEST['npsn']);
$g2p = (!isset($_REQUEST['g2p']))? "":intval($_REQUEST['g2p']);

switch($op){

  case "save_newspaper_set":
  $nps_sn=save_newspaper_set($nps_sn);
  header("location: {$_SERVER['PHP_SELF']}?op=add_newspaper&nps_sn={$nps_sn}");
  break;

  //刪除電子報設定組
  case "del_newspaper_set":
  del_newspaper_set($nps_sn);
  header("location: {$_SERVER['PHP_SELF']}");
  break;

  //編輯資料
  case "add_newspaper":
  $main=add_newspaper($nps_sn);
  break;

  case "save_newspaper":
  $npsn=save_newspaper();
  header("location: {$_SERVER['PHP_SELF']}?op=edit_newspaper&npsn={$npsn}");
  break;

  //編輯電子報資料
  case "edit_newspaper":
  $main=edit_newspaper($npsn);
  break;


  case "save_all":
  save_all($npsn);
  header("location: {$_SERVER['PHP_SELF']}?op=sendmail&npsn={$npsn}");
  break;

  //刪除電子報
  case "del_newspaper":
  del_newspaper($npsn);
  header("location: {$_SERVER['PHP_SELF']}");
  break;

  case "sendmail":
  $main=sendmail_form($npsn);
  break;

  case "send_now":
  send_now($npsn);
  header("location: {$_SERVER['PHP_SELF']}?op=sendmail_log&npsn={$npsn}");
  break;
  
  case "sendmail_log":
  $main=sendmail_log($npsn);
  break;

  case "preview":
  $main=preview_newspaper($npsn);
  break;

  case "modify":
  $main=open_newspaper($nps_sn);
  break;

  case "newspaper_email":
  $main=newspaper_email($nps_sn);
  break;
  
  //刪除電子郵件
  case "delete_tad_news_email":
  delete_tad_news_email($_GET['email'],$nps_sn);
  header("location: {$_SERVER['PHP_SELF']}?op=newspaper_email&nps_sn=$nps_sn&g2p={$g2p}");
  break;

  //刪除電子郵件
  case "delete_tad_news_email_npsn":
  delete_tad_news_email($_GET['email'],$nps_sn);
  header("location: {$_SERVER['PHP_SELF']}?op=sendmail&npsn=$npsn");
  break;
  
  //更新電子郵件
  case "update_email":
  update_email($_POST['old_email'],$_POST['new_email'],$nps_sn);
  header("location: {$_SERVER['PHP_SELF']}?op=newspaper_email&nps_sn=$nps_sn&g2p={$g2p}");
  break;
  
  //匯入電子郵件
  case "email_import":
  email_import($_POST['email_import'],$nps_sn);
  header("location: {$_SERVER['PHP_SELF']}?op=newspaper_email&nps_sn=$nps_sn");
  break;
  

  default:
  $main=newspaper_set_table($nps_sn);
  break;
}

/*-----------秀出結果區--------------*/
if($op=="preview"){
  echo $main;
}else{
xoops_cp_header();
admin_toolbar(4);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();
}
?>
