<?php
//�϶��D�禡 (�|�C�X�Ҧ��`�����D������)
function tad_faq_show($options){
  global $xoopsDB;
  include_once XOOPS_ROOT_PATH."/modules/tad_faq/function_block.php";

  $read_power=chk_faq_cate_power('faq_read');

  $counter=get_cate_count();

  $sql = "select * from ".$xoopsDB->prefix("tad_faq_cate")." order by sort";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  $block="";
  $i=0;
  while(list($fcsn,$of_fcsn,$title,$description,$sort,$cate_pic)=$xoopsDB->fetchRow($result)){
    if(!in_array($fcsn, $read_power))continue;

    $num=(empty($counter[$fcsn]))?0:$counter[$fcsn];

    $block[$i]['title']=$title;
    $block[$i]['fcsn']=$fcsn;
    $block[$i]['num']=sprintf(_MB_TADFAQ_FAQ_NUM,$num);
    $i++;

  }

  return $block;
}



?>