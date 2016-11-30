<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2008-07-14
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //

//---基本設定---//
//模組名稱
$modversion['name'] = _MI_TADMENU_NAME;
//模組版次
$modversion['version']	= '1.2';
//模組作者
$modversion['author'] = _MI_TADMENU_AUTHOR;
//模組說明
$modversion['description'] = _MI_TADMENU_DESC;
//模組授權者
$modversion['credits']	= _MI_TADMENU_CREDITS;
//模組版權
$modversion['license']		= "GPL see LICENSE";
//模組是否為官方發佈1，非官方2
$modversion['official']		= 2;
//模組圖示
$modversion['image']		= "images/logo.png";
//模組目錄名稱
$modversion['dirname']		= "tad_menu";

//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "tad_menu";

//---管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---使用者主選單設定---//
$modversion['hasMain'] = '0';


//---啟動後台管理界面選單---//
$modversion['system_menu'] = 1;
//---樣板設定---//

//---區塊設定---//
$modversion['blocks'][1]['file'] = "tad_menu.php";
$modversion['blocks'][1]['name'] = _MI_TADMENU_BNAME1;
$modversion['blocks'][1]['description'] = _MI_TADMENU_BDESC1;
$modversion['blocks'][1]['show_func'] = "tad_menu";
$modversion['blocks'][1]['template'] = "tad_menu.html";


?>