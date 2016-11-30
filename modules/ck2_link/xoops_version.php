<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

//---基本設定---//
//模組名稱
$modversion['name'] = _MI_CK2LINK_NAME;
//模組版次
$modversion['version']	= '2.0 RC1';
//模組作者
$modversion['author'] = _MI_CK2LINK_AUTHOR;
//模組說明
$modversion['description'] = _MI_CK2LINK_DESC;
//模組授權者
$modversion['credits']	= _MI_CK2LINK_CREDITS;
//模組版權
$modversion['license']		= "GPL see LICENSE";
//模組是否為官方發佈1，非官方2
$modversion['official']		= 2;
//模組圖示
$modversion['image']		= "images/logo.png";
//模組目錄名稱
$modversion['dirname']		= "ck2_link";

//---啟動後台管理界面選單---//
$modversion['system_menu'] = 1;


//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "ck2_link_cate";
$modversion['tables'][2] = "ck2_link";

//---管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---使用者主選單設定---//
$modversion['hasMain'] = 1;


//---樣板設定---//

$modversion['templates'][1]['file'] = 'index_tpl.html';
$modversion['templates'][1]['description'] = _MI_CK2LINK_TEMPLATE_DESC1;
$modversion['templates'][2]['file'] = 'view_tpl.html';
$modversion['templates'][2]['description'] = 'Template of view.php width Comment';


//---區塊設定---//
$modversion['blocks'][1]['file'] = "ck2_link_list.php";
$modversion['blocks'][1]['name'] = _MI_CK2LINK_BNAME1;
$modversion['blocks'][1]['description'] = _MI_CK2LINK_BDESC1;
$modversion['blocks'][1]['show_func'] = "ck2_link_list";
$modversion['blocks'][1]['template'] = "ck2_link_list.html";
$modversion['blocks'][1]['edit_func'] = "ck2_link_list_edit";
$modversion['blocks'][1]['options'] = "5|";

//---偏好設定---//
$modversion['config'][1]['name']	= 'show_num';
$modversion['config'][1]['title']	= '_MI_CK2LINK_SHOW_NUM';
$modversion['config'][1]['description']	= '_MI_CK2LINK_SHOW_NUM_DESC';
$modversion['config'][1]['formtype']	= 'textbox';
$modversion['config'][1]['valuetype']	= 'int';
$modversion['config'][1]['default']	= '6';

//---搜尋設定---//
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/ck2_link_search.php";
$modversion['search']['func'] = "ck2_link_search";

//---評論功能---//
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'link_sn';
$modversion['comments']['pageName'] = 'view.php';

?>
