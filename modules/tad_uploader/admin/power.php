<?php
/*-----------�ޤJ�ɮװ�--------------*/
$xoopsOption['template_main'] = "tad_uploader_adm_power.html";
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

$sql = "select cat_sn,cat_title from ".$xoopsDB->prefix("tad_uploader");
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADUP_DB_ERROR1);
while(list($cat_sn,$cat_title)=$xoopsDB->fetchRow($result)){
	$item_list[$cat_sn]=$cat_title;
}

$perm_desc="";
$formi = new XoopsGroupPermForm("", $module_id, 'catalog',$perm_desc);
foreach ($item_list as $item_id => $item_name) {
	$formi->addItem($item_id, $item_name);
}

$main1=$formi->render();
$xoopsTpl->assign('main1', $main1);


$formi = new XoopsGroupPermForm("", $module_id, 'catalog_up',$perm_desc);
foreach ($item_list as $item_id => $item_name) {
	$formi->addItem($item_id, $item_name);
}

$main2=$formi->render();
$xoopsTpl->assign('main2', $main2);

/*-----------�q�X���G��--------------*/
include_once 'footer.php';
?>