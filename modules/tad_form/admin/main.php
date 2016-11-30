<?php
/*-----------�ޤJ�ɮװ�--------------*/
$xoopsOption['template_main'] = "tad_form_adm_main.html";
include_once "header.php";
include_once "../function.php";

/*-----------function��--------------*/
//�C�X�Ҧ�tad_form_main���
function list_tad_form_main(){
  global $xoopsDB,$xoopsTpl;

  $sql = "select * from ".$xoopsDB->prefix("tad_form_main")." order by post_date desc";

  //getPageBar($��sql�y�k, �C����ܴX�����, �̦h��ܴX�ӭ��ƿﶵ);
  $PageBar=getPageBar($sql,20,10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];

  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  $sign_mems=get_form_count();
  $cols_num=get_form_col_count();
  $i=0;
  $form="";
  while($all=$xoopsDB->fetchArray($result)){
    foreach($all as $k=>$v){
      $$k=$v;
    }

    $pic=($enable=='1')?"001_06.gif":"001_05.gif";
    $enable_tool=($enable=='1')?"<a href='main.php?op=set_form_status&ofsn=$ofsn&enable=0'><img src='../images/$pic' align='absmiddle' hspace=6 alt='"._MA_TADFORM_COL_ENABLE."' title='"._MA_TADFORM_COL_ENABLE."'></a>":"<a href='main.php?op=set_form_status&ofsn=$ofsn&enable=1'><img src='../images/$pic' align='absmiddle' hspace=6 alt='"._MA_TADFORM_COL_ACTIVE."' title='"._MA_TADFORM_COL_ACTIVE."'></a>";
    $multi_sign_pic=($multi_sign=='1')?"<img src='../images/report_check.png' align='absmiddle' hspace=6 alt='"._MA_TADFORM_MULTI_SIGN."' title='"._MA_TADFORM_MULTI_SIGN."'>":"";
    $show_result_pic=($show_result=='1')?"<img src='../images/report.png' align='absmiddle' hspace=6 alt='"._MA_TADFORM_SHOW_RESULT."' title='"._MA_TADFORM_SHOW_RESULT."'>":"";

    $start_date=date("Y-m-d",xoops_getUserTimestamp(strtotime($start_date)));
    $end_date=date("Y-m-d",xoops_getUserTimestamp(strtotime($end_date)));

    $start_date=substr($start_date,0,10);
    $end_date=substr($end_date,0,10);

    $counter=(empty($sign_mems[$ofsn]))?"0":$sign_mems[$ofsn];


    $form[$i]['ofsn']=$ofsn;
    $form[$i]['enable_tool']=$enable_tool;
    $form[$i]['title']=$title;
    $form[$i]['counter']=sprintf(_MA_TADFORM_SIGN_MEMS,$counter);
    $form[$i]['start_date']=$start_date;
    $form[$i]['end_date']=$end_date;
    $form[$i]['cols_num']=$cols_num[$ofsn];
    $form[$i]['multi_sign_pic']=$multi_sign_pic;
    $form[$i]['show_result_pic']=$show_result_pic;
    $i++;
  }
  if(empty($form))header('location:add.php');

  $xoopsTpl->assign( "form" , $form);
  $xoopsTpl->assign( "bar" , $bar);
}


//�ˬd����H��
function get_form_count(){
  global $xoopsDB;
  $sql = "select ofsn,count(*) from ".$xoopsDB->prefix("tad_form_fill")." group by ofsn";
  $result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $counter="";
  while(list($ofsn,$count)=$xoopsDB->fetchRow($result)){
    $counter[$ofsn]=$count;
  }
  return $counter;
}



//�ˬd����D��
function get_form_col_count(){
  global $xoopsDB;
  $sql = "select ofsn,count(*) from ".$xoopsDB->prefix("tad_form_col")." group by ofsn";
  $result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $counter="";
  while(list($ofsn,$count)=$xoopsDB->fetchRow($result)){
    $counter[$ofsn]=$count;
  }
  return $counter;
}

//�R��tad_form_main�Y����Ƹ��
function delete_tad_form_main($ofsn=""){
  global $xoopsDB;
  //����X�����ǤH��F
  $sql = "select ssn from ".$xoopsDB->prefix("tad_form_fill")." where ofsn='$ofsn'";
  $result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  while(list($ssn)=$xoopsDB->fetchRow($result)){

    //�R�F������e
    $sql = "delete from ".$xoopsDB->prefix("tad_form_value")." where ssn='$ssn'";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

    //�R�F��g�H���
    $sql = "delete from ".$xoopsDB->prefix("tad_form_fill")." where ssn='$ssn'";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  }

  //�R�����
  $sql = "delete from ".$xoopsDB->prefix("tad_form_col")." where ofsn='$ofsn'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  //�̫�R���ݨ�
  $sql = "delete from ".$xoopsDB->prefix("tad_form_main")." where ofsn='$ofsn'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}



//�ƻs�ݨ�
function copy_form($ofsn=""){
  global $xoopsDB;

  //Ū�X�즳���
  $sql = "select `title`, `start_date`, `end_date`, `content`, `uid`, `post_date`, `enable`, `sign_group`, `kind`, `adm_email`, `captcha`, `show_result`, `view_result_group`, `multi_sign` from ".$xoopsDB->prefix("tad_form_main")." where ofsn='$ofsn'";
  $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  list($title,$start_date,$end_date,$content,$uid,$post_date,$enable,$sign_group, $kind, $adm_email, $captcha, $show_result, $view_result_group, $multi_sign)=$xoopsDB->fetchRow($result);

  $now=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));

  //�g�J�s�ݨ�
    $sql = "insert into ".$xoopsDB->prefix("tad_form_main")." (`title`,`start_date`,`end_date`,`content`,`uid`,`post_date`,`enable`,`sign_group`, `kind`, `adm_email`, `captcha`, `show_result`, `view_result_group`, `multi_sign`) values('copy_{$title}','{$start_date}','{$end_date}','{$content}','{$uid}','{$now}','0','{$sign_group}','{$kind}','{$adm_email}','{$captcha}','{$show_result}','{$view_result_group}','{$multi_sign}')";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  //���o�̫�s�W��ƪ��y���s��
  $new_ofsn=$xoopsDB->getInsertId();

  //Ū�X�ﶵ
  $sql = "select `title`, `descript`, `kind`, `size`, `val`, `chk`, `func`, `sort` ,`public` from ".$xoopsDB->prefix("tad_form_col")." where ofsn='$ofsn'";
  $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  while(list($title,$descript,$kind,$size,$val,$chk,$func,$sort,$public)=$xoopsDB->fetchRow($result)){
    //�g�J�ﶵ
    $sql = "insert into ".$xoopsDB->prefix("tad_form_col")." (`ofsn`,`title`,`descript`,`kind`,`size`,`val`,`chk`,`func`,`sort`,`public`) values('{$new_ofsn}','{$title}','{$descript}','{$kind}','{$size}','{$val}','{$chk}','{$func}','{$sort}','{$public}')";
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  }
}



/*-----------����ʧ@�P�_��----------*/
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];
$ofsn = (!isset($_REQUEST['ofsn']))? "":intval($_REQUEST['ofsn']);

switch($op){

  case "excel":
  download_excel($ofsn);
  exit;
  break;


  //��J���
  case "tad_form_main_form";
  $main=tad_form_main_form($ofsn);
  break;

  //�R�����
  case "delete_tad_form_main";
  delete_tad_form_main($ofsn);
  header("location: {$_SERVER['PHP_SELF']}");
  break;

  //�ܧ󪬺A���
  case "set_form_status";
  set_form_status($ofsn,$_GET['enable']);
  header("location: {$_SERVER['PHP_SELF']}");
  break;


  //�ƻs�ݨ�
  case "copy";
  copy_form($ofsn);
  header("location: {$_SERVER['PHP_SELF']}");
  break;


  //�w�]�ʧ@
  default:
  list_tad_form_main();
  break;

}

/*-----------�q�X���G��--------------*/
include_once 'footer.php';
?>