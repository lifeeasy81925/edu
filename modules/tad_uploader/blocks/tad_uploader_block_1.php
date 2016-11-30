<?php

//�϶��D�禡 (�̷s�W�Ǥ��)
function tad_uploader_b_show_1($options){
  global $xoopsDB;

  include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";

  $sql="select a.cfsn,a.cat_sn,a.cf_name,a.cf_desc,a.file_url from ".$xoopsDB->prefix("tad_uploader_file")." as a left join ".$xoopsDB->prefix("tad_uploader")." as b on a.cat_sn=b.cat_sn where b.cat_share='1'  order by a.up_date desc limit 0,{$options[0]}";

  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MB_TADUP_DB_ERROR2);

  $block="";
  $i=0;
  while(list($cfsn,$cat_sn,$cf_name,$cf_desc,$file_url)=$xoopsDB->fetchRow($result)){

    //�̾ڸӸs�լO�_����v�����ئ��ϥ��v���P�_ �A�����P���B�z
    if(!check_up_power("catalog",$cat_sn))  continue;

    $cf_name=empty($cf_name)?get_basename($file_url):$cf_name;

    $link[$i]['title']=empty($cf_desc)?$cf_name:$cf_desc;
    $link[$i]['cfsn']=$cfsn;
    $link[$i]['cat_sn']=$cat_sn;
    $link[$i]['cf_name']=$cf_name;
    $i++;
  }
  $block['link']=$link;
  return $block;
}

//�϶��s��禡
function tad_uploader_b_edit_1($options){

  $form="
  "._MB_TADUP_CATALOG_B_EDIT_1_BITEM0."
  <INPUT type='text' name='options[0]' value='{$options[0]}'>
  ";
  return $form;
}

//�P�O�榡����
function chk_file_pic($file){
  $f=explode(".",$file);
  $n=sizeof($f)-1;
  if(!file_exists(XOOPS_ROOT_PATH."/modules/tad_uploader/images/mime/{$f[$n]}.png"))return "mime.png";
  return "{$f[$n]}.png";
}



if(!function_exists("check_up_power")){
  //�ˬd���L�W���v�Q
  function check_up_power($kind="catalog",$cat_sn=""){
      global $xoopsUser;

      //���o�Ҳսs��
      $modhandler = &xoops_gethandler('module');
      $xoopsModule = &$modhandler->getByDirname("tad_uploader");
      $module_id = $xoopsModule->getVar('mid');



      //���o�ثe�ϥΪ̪��s�սs��
      if($xoopsUser) {
        $groups = $xoopsUser->getGroups();
        $isAdmin=$xoopsUser->isAdmin($module_id);
        $uid=$xoopsUser->getVar('uid');
      }else{
        $groups = XOOPS_GROUP_ANONYMOUS;
        $isAdmin=false;
      }

      //���o�s���v���\��
      $gperm_handler =& xoops_gethandler('groupperm');

      //�v�����ؽs��
      $perm_itemid = intval($cat_sn);
      //�̾ڸӸs�լO�_����v�����ئ��ϥ��v���P�_ �A�����P���B�z
      if(empty($cat_sn)){
        if($kind=="catalog"){
          return true;
        }else{
          if($isAdmin) return true;
        }
      }else{
        if($gperm_handler->checkRight($kind, $cat_sn, $groups, $module_id) or $isAdmin) return true;
      }

      return false;
  }
}
?>
