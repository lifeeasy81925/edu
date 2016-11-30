<?php
/*-----------�ޤJ�ɮװ�--------------*/
include "header.php";
$xoopsOption['template_main'] = "tad_faq_index.html";
include_once XOOPS_ROOT_PATH."/header.php";

/*-----------function��--------------*/


//�C�X�Ҧ�tad_faq_cate���
function list_all(){
  global $xoopsDB,$xoopsModule,$xoopsModuleConfig,$xoopsTpl;

  $edit_power=chk_faq_cate_power('faq_edit');
  $xoopsTpl->assign('edit_power',$edit_power);
  $read_power=chk_faq_cate_power('faq_read');

  $counter=get_cate_count();

  $sql = "select * from ".$xoopsDB->prefix("tad_faq_cate")." order by sort";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  $data="";
  $i=3;
  while(list($fcsn,$of_fcsn,$title,$description,$sort,$cate_pic)=$xoopsDB->fetchRow($result)){
    if(!in_array($fcsn, $read_power))continue;

    if($i%3==1){
      $img='001_58.gif';
    }elseif($i%3==2){
      $img='001_59.gif';
    }else{
      $img='001_60.gif';
    }
    $num=(empty($counter[$fcsn]))?0:$counter[$fcsn];
    $data[$i]['num']=sprintf(_MD_TADFAQ_FAQ_NUM,$num);
    $data[$i]['fcsn']=$fcsn;
    $data[$i]['img']=$img;
    $data[$i]['title']=$title;
    $data[$i]['counter']=$counter[$fcsn];
    $i++;
  }

  $xoopsTpl->assign('now_op','list_all');
  $xoopsTpl->assign('faq',$data);
  $xoopsTpl->assign('module_title',$xoopsModuleConfig['module_title']);
}

//�C�X FAQ �C��
function list_faq($fcsn=""){
  global $xoopsDB,$xoopsUser,$xoopsModule,$xoopsTpl;
  //�v���ˬd
  $faq_read_power=check_power("faq_read",$fcsn);
  $faq_edit_power=check_power("faq_edit",$fcsn);

  //�̾ڸӸs�լO�_����v�����ئ��ϥ��v���P�_ �A�����P���B�z
  if(!$faq_read_power) {
    redirect_header($_SERVER['PHP_SELF'],3,_MD_TADFAQ_NO_ACCESS_POWER);
  }

  $xoopsTpl->assign('fcsn',$fcsn);
  $cate=get_tad_faq_cate($fcsn);
  $now_uid=($xoopsUser)?$xoopsUser->uid():0;

  $sql = "select * from ".$xoopsDB->prefix("tad_faq_content")." where fcsn='$fcsn' order by sort";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $i=1;
  while(list($fqsn,$fcsn,$title,$sort,$uid,$post_date,$content,$enable,$counter)=$xoopsDB->fetchRow($result)){

    $enable_txt=($enable=='1')?_MD_TADFAQ_UNABLE:_MD_TADFAQ_ENABLE;
    $update_enable=($enable=='1')?"0":"1";

    $data[$i]['i']=$i;
    $data[$i]['fqsn']=$fqsn;
    $data[$i]['counter']=$counter;
    $data[$i]['title']=$title;
    $data[$i]['content']=$content;
    $data[$i]['enable']=$enable;
    $data[$i]['post_date']=$post_date;
    $data[$i]['uid']=$uid;
    $data[$i]['update_enable']=$update_enable;
    $data[$i]['enable_txt']=$enable_txt;

    $data[$i]['edit_power']=($faq_edit_power and $now_uid==$uid)?true:false;

    $i++;
  }


  $xoopsTpl->assign('cate_title',$cate['title']);
  $xoopsTpl->assign('now_op','list_faq');
  $xoopsTpl->assign('faq',$data);
  $xoopsTpl->assign('faq_edit_power',$faq_edit_power);
}



//�R��tad_faq_content�Y����Ƹ��
function delete_tad_faq_content($fqsn=""){
  global $xoopsDB;
  $sql = "delete from ".$xoopsDB->prefix("tad_faq_content")." where fqsn='$fqsn'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}




//�Ұʩ�����
function update_status($fqsn="",$enable=""){
  global $xoopsDB;
  $sql = "update ".$xoopsDB->prefix("tad_faq_content")." set enable='{$enable}' where fqsn='$fqsn'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}



//�������
function get_faq_cate_opt($the_fcsn=""){
  global $xoopsDB,$isAdmin;
  $opt="";
  $edit_fcsn=chk_faq_cate_power("faq_edit");
  $sql = "select fcsn,title from ".$xoopsDB->prefix("tad_faq_cate")." order by sort";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  while(list($fcsn,$title)=$xoopsDB->fetchRow($result)){
    $selected=($the_fcsn==$fcsn)?"selected":"";
    if($isAdmin or in_array($fcsn,$edit_fcsn)){
      $opt.="<option value='$fcsn' $selected>$title</option>";
    }
  }
  return $opt;
}


//tad_faq_content�s����
function tad_faq_content_form($fcsn="",$fqsn=""){
  global $xoopsDB,$xoopsTpl;

  //����w�]��
  if(!empty($fqsn)){
    $DBV=get_tad_faq_content($fqsn);
  }else{
    $DBV=array();
  }

  //�w�]�ȳ]�w

  $fqsn=(!isset($DBV['fqsn']))?$fqsn:$DBV['fqsn'];
  $fcsn=(!isset($DBV['fcsn']))?$fcsn:$DBV['fcsn'];
  $title=(!isset($DBV['title']))?"":$DBV['title'];
  $sort=(!isset($DBV['sort']))?"":$DBV['sort'];
  $uid=(!isset($DBV['uid']))?"":$DBV['uid'];
  $post_date=(!isset($DBV['post_date']))?"":$DBV['post_date'];
  $content=(!isset($DBV['content']))?"":$DBV['content'];
  $enable=(!isset($DBV['enable']))?"1":$DBV['enable'];

  $faq_cate_opt=get_faq_cate_opt($fcsn);

  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/fck.php")){
    redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
  include_once XOOPS_ROOT_PATH."/modules/tadtools/fck.php";
  $fck=new FCKEditor264("tad_faq","content",$content);
  $fck->setHeight(250);
  $editor=$fck->render();


  $op=(empty($fqsn))?"insert_tad_faq_content":"update_tad_faq_content";
  //$op="replace_tad_faq_content";

  $xoopsTpl->assign('fqsn',$fqsn);
  $xoopsTpl->assign('faq_cate_opt',$faq_cate_opt);
  $xoopsTpl->assign('title',$title);
  $xoopsTpl->assign('editor',$editor);
  $xoopsTpl->assign('enable',$enable);
  $xoopsTpl->assign('op',$op);
  $xoopsTpl->assign('now_op','tad_faq_content_form');
}

//�s�W��ƨ�tad_faq_content��
function insert_tad_faq_content(){
  global $xoopsDB,$xoopsUser;
  $myts = MyTextSanitizer::getInstance();
  $_POST['new_cate']=$myts->addSlashes($_POST['new_cate']);
  $_POST['title']=$myts->addSlashes($_POST['title']);
  $_POST['content']=$myts->addSlashes($_POST['content']);

  if(!empty($_POST['new_cate'])){
    $fcsn=insert_tad_faq_cate($_POST['new_cate']);
  }else{
    $fcsn=$_POST['fcsn'];
  }
  $uid=($xoopsUser)?$xoopsUser->getVar('uid'):"";
  $sort=get_max_faq_sort($_POST['fcsn']);
  $now=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));
  $sql = "insert into ".$xoopsDB->prefix("tad_faq_content")." (`fcsn`,`title`,`sort`,`uid`,`post_date`,`content`,`enable`) values('{$fcsn}','{$_POST['title']}','{$sort}','{$uid}','{$now}','{$_POST['content']}','{$_POST['enable']}')";
  $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  return $fcsn;
}



//��stad_faq_content�Y�@�����
function update_tad_faq_content($fqsn=""){
  global $xoopsDB;
  $myts = MyTextSanitizer::getInstance();
  $_POST['new_cate']=$myts->addSlashes($_POST['new_cate']);
  $_POST['title']=$myts->addSlashes($_POST['title']);
  $_POST['content']=$myts->addSlashes($_POST['content']);


  if(!empty($_POST['new_cate'])){
    $fcsn=insert_tad_faq_cate($_POST['new_cate']);
  }else{
    $fcsn=$_POST['fcsn'];
  }

  $now=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));
  $sql = "update ".$xoopsDB->prefix("tad_faq_content")." set  `fcsn` = '{$fcsn}', `title` = '{$_POST['title']}', `post_date` = '{$now}', `content` = '{$_POST['content']}', `enable` = '{$_POST['enable']}' where fqsn='$fqsn'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  return $fcsn;
}

//�۰ʨ��o�s�Ƨ�
function get_max_faq_sort($fcsn=""){
  global $xoopsDB,$xoopsModule;
  $sql = "select max(sort) from ".$xoopsDB->prefix("tad_faq_content")." where fcsn='{$fcsn}'";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  list($sort)=$xoopsDB->fetchRow($result);
  return ++$sort;
}


/*-----------����ʧ@�P�_��----------*/
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$fcsn=(empty($_REQUEST['fcsn']))?"":intval($_REQUEST['fcsn']);
$fqsn=(empty($_REQUEST['fqsn']))?"":intval($_REQUEST['fqsn']);

switch($op){

  case "update_status":
  update_status($fqsn,$_GET['enable']);
  header("location: {$_SERVER['PHP_SELF']}?fcsn=$fcsn");
  break;


  //�R�����
  case "delete_tad_faq_content":
  delete_tad_faq_content($fqsn);
  header("location: {$_SERVER['PHP_SELF']}?fcsn=$fcsn");
  break;

  //�s�W���
  case "insert_tad_faq_content":
  $fcsn=insert_tad_faq_content();
  header("location: {$_SERVER['PHP_SELF']}?fcsn=$fcsn");
  break;

  //��s���
  case "update_tad_faq_content":
  $fcsn=update_tad_faq_content($fqsn);
  header("location: {$_SERVER['PHP_SELF']}?fcsn=$fcsn");
  break;

  case "tad_faq_content_form":
  tad_faq_content_form($fcsn,$fqsn);
  break;

  default:
  if(!empty($fcsn)){
    list_faq($fcsn);
  }else{
    list_all();
  }
  break;
}

$xoopsTpl->assign( "toolbar" , toolbar_bootstrap($interface_menu)) ;
$xoopsTpl->assign( "bootstrap" , get_bootstrap()) ;
$xoopsTpl->assign( "jquery" , get_jquery(true)) ;
$xoopsTpl->assign( "isAdmin" , $isAdmin) ;
include_once XOOPS_ROOT_PATH.'/footer.php';
?>
