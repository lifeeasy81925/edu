<?php
//�ޤJTadTools���禡�w
if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php")){
 redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";
include_once "function_block.php";

//�H�y�������o�Y��tad_faq_cate���
function get_tad_faq_cate($fcsn=""){
  global $xoopsDB;
  if(empty($fcsn))return;
  $sql = "select * from ".$xoopsDB->prefix("tad_faq_cate")." where fcsn='$fcsn'";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $data=$xoopsDB->fetchArray($result);
  return $data;
}

//�H�y�������o�Y��tad_faq_content���
function get_tad_faq_content($fqsn=""){
  global $xoopsDB;
  if(empty($fqsn))return;
  $sql = "select * from ".$xoopsDB->prefix("tad_faq_content")." where fqsn='$fqsn'";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $data=$xoopsDB->fetchArray($result);
  return $data;
}


//�s�W��ƨ�tad_faq_cate��
function insert_tad_faq_cate($new_title=""){
  global $xoopsDB;

  $myts = MyTextSanitizer::getInstance();
  $title=$new_title?$myts->addSlashes($new_title):$myts->addSlashes($_POST['title']);
  $_POST['description']=$myts->addSlashes($_POST['description']);

  $sql = "insert into ".$xoopsDB->prefix("tad_faq_cate")." (`of_fcsn`,`title`,`description`,`sort`,`cate_pic`) values('{$_POST['of_fcsn']}','{$title}','{$_POST['description']}','{$_POST['sort']}','{$_POST['cate_pic']}')";
  $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  //���o�̫�s�W��ƪ��y���s��
  $fcsn=$xoopsDB->getInsertId();

  $faq_read=empty($_POST['faq_read'])?array(1,2,3):$_POST['faq_read'];
  $faq_edit=empty($_POST['faq_edit'])?array(1):$_POST['faq_edit'];

  //�g�J�v��
  saveItem_Permissions($faq_read, $fcsn, 'faq_read');
  saveItem_Permissions($faq_edit, $fcsn, 'faq_edit');
  return $fcsn;
}


//�x�s�v��
function saveItem_Permissions($groups, $itemid, $perm_name) {
  global $xoopsModule;
  $module_id = $xoopsModule->getVar('mid');
  $gperm_handler =& xoops_gethandler('groupperm');

  // First, if the permissions are already there, delete them
  $gperm_handler->deleteByModule($module_id, $perm_name, $itemid);

  // Save the new permissions
  if (count($groups) > 0) {
    foreach ($groups as $group_id) {
      $gperm_handler->addRight($perm_name, $itemid, $group_id, $module_id);
    }
  }
}


//�ˬd���L�v��
function check_power($kind="faq_read",$fcsn=""){
    global $xoopsUser,$xoopsModule,$isAdmin;

    //���o�ثe�ϥΪ̪��s�սs��
    if($xoopsUser) {
      $uid=$xoopsUser->getVar('uid');
      $groups=$xoopsUser->getGroups();
    }else{
      $uid=0;
      $groups = XOOPS_GROUP_ANONYMOUS;
    }

    //if(!$isAdmin ) return false;

    //���o�Ҳսs��
    $module_id = $xoopsModule->getVar('mid');

    //���o�s���v���\��
    $gperm_handler =& xoops_gethandler('groupperm');

    //�v�����ؽs��
    $perm_itemid = intval($fcsn);
    //�̾ڸӸs�լO�_����v�����ئ��ϥ��v���P�_ �A�����P���B�z

    if(empty($fcsn)){
      if($kind=="faq_read"){
        return true;
      }else{
        if($isAdmin) return true;
      }
    }else{
      if($gperm_handler->checkRight($kind, $fcsn, $groups, $module_id) or $isAdmin) return true;
    }

    return false;
}


//�P�_�Y���O���������[�ݩεo���s�� $mode=name or id
function get_cate_enable_group($kind="",$fcsn="",$mode="id"){
  global $xoopsDB,$xoopsUser,$xoopsModule,$isAdmin;
  $module_id = $xoopsModule->getVar('mid');

  $sql = "select a.gperm_groupid,b.name from ".$xoopsDB->prefix("group_permission")." as a left join ".$xoopsDB->prefix("groups")." as b on a.gperm_groupid=b.groupid where a.gperm_modid='$module_id' and a.gperm_name='$kind' and a.gperm_itemid='{$fcsn}'";

  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  while(list($gperm_groupid,$name)=$xoopsDB->fetchRow($result)){
    $ok_group[]=$mode=='name'?$name:$gperm_groupid;
  }

  return $ok_group;
}
?>
