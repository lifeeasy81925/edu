<?php
/*-----------�ޤJ�ɮװ�--------------*/
$xoopsOption['template_main'] = "tad_faq_adm_power.html";
include_once "header.php";
include_once "../function.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";
include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';

/*-----------function��--------------*/
$module_id = $xoopsModule->getVar('mid');

$jquery_path=get_jquery(true);  //TadTools�ޤJjquery ui
$xoopsTpl->assign('jquery_path', $jquery_path);


//����Ҧ���Ƨ�

$sql = "select fcsn,title from ".$xoopsDB->prefix("tad_faq_cate");
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
while(list($fcsn,$title)=$xoopsDB->fetchRow($result)){
	$item_list[$fcsn]=$title;
}

$perm_desc="";
$formi = new XoopsGroupPermForm("", $module_id, 'faq_read',$perm_desc);
foreach ($item_list as $item_id => $item_name) {
	$formi->addItem($item_id, $item_name);
}

$main1=$formi->render();
$xoopsTpl->assign('main1', $main1);


$formi = new XoopsGroupPermForm("", $module_id, 'faq_edit',$perm_desc);
foreach ($item_list as $item_id => $item_name) {
	$formi->addItem($item_id, $item_name);
}

$main2=$formi->render();
$xoopsTpl->assign('main2', $main2);

/*-----------�q�X���G��--------------*/
include_once 'footer.php';
?>
