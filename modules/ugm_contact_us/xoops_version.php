<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作
// 製作日期：2009-02-28
// $Id:$
// ------------------------------------------------------------------------- //

//---基本設定---//
//模組名稱
$modversion['name'] = _MI_UGMCONTACUS_NAME;
//模組版次
$modversion['version']	= '1.31';
//模組作者
$modversion['author'] = _MI_UGMCONTACUS_AUTHOR;
//模組說明
$modversion['description'] = _MI_UGMCONTACUS_DESC;
//模組授權者
$modversion['credits']	= _MI_UGMCONTACUS_CREDITS;
//模組版權
$modversion['license']		= "GPL see LICENSE";
//模組是否為官方發佈1，非官方2
$modversion['official']		= 2;
//模組圖示
$modversion['image']		= "images/logo.png";
//模組目錄名稱
$modversion['dirname']		= "ugm_contact_us";

//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "ugm_contact_us";
$modversion['tables'][2] = "ugm_cu_service";
$modversion['tables'][3] = "ugm_cu_solution";

//---管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---使用者主選單設定---//
$modversion['hasMain'] = 1;


//---樣板設定---//

$modversion['templates'][1]['file'] = 'index_tpl.html';
$modversion['templates'][1]['description'] = _MI_UGMCONTACUS_TEMPLATE_DESC1;
//---區塊設定---//
$modversion['blocks'][1]['file'] = "ugm_contact_us_b1.php";
$modversion['blocks'][1]['name'] = _MI_UGMCONTACUS_BNAME1;
$modversion['blocks'][1]['description'] = _MI_UGMCONTACUS_BDESC1;
$modversion['blocks'][1]['show_func'] = "ugm_contact_us_b1";
$modversion['blocks'][1]['template'] = "ugm_contact_us_b1.html";
$modversion['blocks'][1]['edit_func'] = "ugm_contact_us_b1_edit";
$modversion['blocks'][1]['options'] = "";

//---偏好設定---//
$modversion['config'][1]['name'] = 'ugm_contact_us_mailTo';
$modversion['config'][1]['title'] = '_MI_MAILTO';
$modversion['config'][1]['description'] = '_MI_MAILTO_DESC';
$modversion['config'][1]['formtype'] = 'textbox';
$modversion['config'][1]['valuetype'] = 'text';
$modversion['config'][1]['default'] = $xoopsConfig[adminmail];
 
$modversion['config'][2]['name'] = 'ugm_contact_us_css';
$modversion['config'][2]['title'] = '_MI_UGMCONTACTUS_CSS';
$modversion['config'][2]['description'] = '_MI_UGMCONTACTUS_CSS_DESC';
$modversion['config'][2]['formtype'] = 'textarea';
$modversion['config'][2]['valuetype'] = 'text';
$modversion['config'][2]['default'] = "#ugm_contact_us_table th{padding: 5px;font-size: 12px;text-align: center;background: #CCCCFF none;color: Black;}
#ugm_contact_us_table td{background-color: #eee;}
#ugm_contact_us_table span{color: Red;}
#ugm_contact_us_table th,#book_detail td{border:1px solid #b8b8b8;border-top:0px;border-left:0px}
#ugm_contact_us_table textarea{width:100%;}
#ugm_contact_us_table table{width:100%}
";

$modversion['config'][3]['name'] = 'ugm_contact_us_info';
$modversion['config'][3]['title'] = '_MI_UGMCONTACTUS_INFO';
$modversion['config'][3]['description'] = '_MI_UGMCONTACTUS_INFO_DESC';
$modversion['config'][3]['formtype'] = 'textarea';
$modversion['config'][3]['valuetype'] = 'text';
$modversion['config'][3]['default'] = ""; 

$modversion['config'][4]['name'] = 'ugm_contact_us_subject';
$modversion['config'][4]['title'] = '_MI_UGMCONTACTUS_SUBJECT';
$modversion['config'][4]['description'] = '_MI_UGMCONTACTUS_SUBJECT_DESC';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'text';
$modversion['config'][4]['default'] = "ugm_contact_us_subject";

$modversion['config'][5]['name'] = 'ugm_contact_us_jquery';
$modversion['config'][5]['title'] = '_MI_UGMCONTACTUS_JQUERY';
$modversion['config'][5]['description'] = '_MI_UGMCONTACTUS_JQUERY_DESC';
$modversion['config'][5]['formtype'] = 'yesno';
$modversion['config'][5]['valuetype'] = 'text';
$modversion['config'][5]['default'] = "1";  
?>
