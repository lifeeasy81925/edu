<?php
include "../../mainfile.php";
include "function.php";

$perm_name = 'my_news';
$perm_itemid = intval(2);
if($xoopsUser)
{
	$groups = $xoopsUser->getGroups();
}else{
	$groups = XOOPS_GROUP_ANONYMOUS;
}
$module_id = $xoopsModule->getVar('mid');
$gperm_handler =& xoops_gethandler('groupperm');
if(!$gperm_handler->checkRight($perm_name, $perm_itemid, $groups, $module_id))
{
	 redirect_header("index.php" , 3 , _MD_MYNEWS_NO_CHECK_GPERM);
}

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];
switch ($op)
{
  case "enable":
  news_enable($sn , '1');
  header("location:index.php");
  break;

  default:
  $main = list_news("check");
}

include "../../header.php";
echo $main;
include "../../footer.php";

/**
 * 新聞審核通過
 */
function news_enable($sn="" , $enable="")
{
  global $xoopsDB;

  $sql = "update " . $xoopsDB->prefix('my_news') . " set
          `enable` = '{$enable}'
          where `sn` = '{$sn}'";
  $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  
  $sql = "select title , uid from " . $xoopsDB->prefix('my_news') . " where `sn` = '$sn'";
  $result = $xoopsDB -> query($sql);
  list($title , $uid) = $xoopsDB -> fetchRow($result);
  
  $content="您好：
  <p>
  您的「{$title}」文章已經通過審核，您可以點選下面連結觀看您發表的文章：
  <a href='".XOOPS_URL."/modules/my_news/view.php?sn=$sn'>立即觀看「{$title}」</a>
  </p>";
  mail_to_user("您的文章已審核通過",$content,"uid",$uid,"email","tpl.html");
}

/**
 * 寄信函數
 * @param string $title 信件標題
 * @param string $content 信件內容，可含HTML
 * @param string $to_mode 寄信對象，uid（使用者uid編號）、group（群組編號）、email（單一email）、email_array（Email陣列）
 * @param string $to 寄信對象的值（如uid編號、群組編號或Email...等）
 * @param string $mode 寄發模式，email 或 pm
 * @param string $tpl 樣板檔名稱，需放在語系的mail_template下
 */
function mail_to_user($title,$content="",$to_mode="group",$to="2",$mode="email",$tpl="tpl.html")
{
  global $xoopsConfig , $xoopsModule;
  
  $dirname=$xoopsModule->dirname();
  $xoopsMailer =& getMailer();

  if($mode=="email"){
    $xoopsMailer->useMail();
  }else{
    $xoopsMailer->usePM();
  }

  $xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH."/modules/{$dirname}/language/{$xoopsConfig['language']}/mail_template/");
  $xoopsMailer->setTemplate($tpl);

  $xoopsMailer->assign('CONTENT', $content);

  if($to_mode=="uid"){
    $xoopsMailer->setToUsers(new XoopsUser($to));
  }elseif($to_mode=="group"){
    $member_handler =& xoops_gethandler('member');
    $xoopsMailer->setToGroups($member_handler->getGroup($to));
  }elseif($to_mode=="email"){
    $xoopsMailer->setToEmails($to);
  }elseif($to_mode=="email_array"){
    $xoopsMailer->setToEmails($to);
  }
  
  $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
  $xoopsMailer->setFromName($xoopsConfig['sitename']);
  $xoopsMailer->setSubject($title);
  $xoopsMailer->multimailer->isHTML(true);

  if ( !$xoopsMailer->send(true) ) {
    $error=$xoopsMailer->getErrors(false);
    $error=implode(" ",$error);
    redirect_header('index.php', 3, "送信失敗！{$error}");
  } else {
    redirect_header('index.php', 3, "送信成功！");
  }
}
?> 