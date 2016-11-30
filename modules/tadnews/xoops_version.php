<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: xoops_version.php,v 1.5 2008/07/03 07:15:50 tad Exp $
// ------------------------------------------------------------------------- //

//---基本設定---//
//模組名稱
$modversion['name'] = _MI_TADNEW_NAME;
//模組版次
$modversion['version']	= '2.3';
//模組作者
$modversion['author'] = 'tad';
//模組說明
$modversion['description'] = _MI_TADNEW_DESC;
//模組授權者
$modversion['credits']	= "tad";
//模組版權
$modversion['license']		= "GPL see LICENSE";
//模組是否為官方發佈1，非官方2
$modversion['official']		= '2.3';
//模組圖示
$modversion['image']		= "images/logo.png";
//模組目錄名稱
$modversion['dirname']		= "tadnews";

//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "tad_news";
$modversion['tables'][2] = "tad_news_cate";
$modversion['tables'][3] = "tadnews_files_center";
$modversion['tables'][4] = "tad_news_paper";
$modversion['tables'][5] = "tad_news_paper_setup";
$modversion['tables'][6] = "tad_news_paper_email";
$modversion['tables'][7] = "tad_news_sign";
$modversion['tables'][8] = "tad_news_paper_send_log";
$modversion['tables'][9] = "tad_news_tags";
$modversion['tables'][10] = "tadnews_rank";



//---啟動後台管理界面選單---//
$modversion['system_menu'] = 1;

//---管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---使用者主選單設定---//
$modversion['hasMain'] = 1;

global $xoopsModuleConfig;
if($xoopsModuleConfig['show_submenu']=='1'){
  if($xoopsUser){
    $modversion['sub'][1]['name'] = _MI_TADNEW_ADMENU2;
    $modversion['sub'][1]['url'] = "post.php";
  }
  if($xoopsModuleConfig['use_archive']=='1'){
    $modversion['sub'][2]['name'] = _MD_TADNEW_ARCHIVE;
    $modversion['sub'][2]['url'] = "archive.php";
  }
  if($xoopsModuleConfig['use_newspaper']=='1'){
    $modversion['sub'][3]['name'] = _MD_TADNEW_NEWSPAPER;
    $modversion['sub'][3]['url'] = "newspaper.php";
  }
}

$modversion['onInstall'] = "include/onInstall.php";
$modversion['onUpdate'] = "include/onUpdate.php";
$modversion['onUninstall'] = "include/onUninstall.php";


//---樣板設定---//
$modversion['templates'][1]['file'] = 'list_tpl.html';
$modversion['templates'][1]['description'] = _MI_TADNEW_TEMPLATE_DESC1;
$modversion['templates'][2]['file'] = 'news_tpl.html';
$modversion['templates'][2]['description'] = _MI_TADNEW_TEMPLATE_DESC2;
$modversion['templates'][3]['file'] = 'tadnews_rss.html';
$modversion['templates'][3]['description'] = _MI_TADNEW_TEMPLATE_DESC3;
$modversion['templates'][4]['file'] = 'post_tpl.html';
$modversion['templates'][4]['description'] = _MI_TADNEW_TEMPLATE_DESC4;
$modversion['templates'][5]['file'] = 'archive_tpl.html';
$modversion['templates'][5]['description'] = _MI_TADNEW_TEMPLATE_DESC5;
$modversion['templates'][6]['file'] = 'page_tpl.html';
$modversion['templates'][6]['description'] = _MI_TADNEW_TEMPLATE_DESC6;


//---評論設定---//
$modversion['hasComments'] = 1;
$modversion['comments']['pageName'] = 'index.php';
$modversion['comments']['itemName'] = 'nsn';

//---搜尋設定---//
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.php";
$modversion['search']['func'] = "tadnews_search";

//---區塊設定---//
$modversion['blocks'][1]['file'] = "tadnews_cate.php";
$modversion['blocks'][1]['name'] = _MI_TADNEW_BNAME1;
$modversion['blocks'][1]['description'] = _MI_TADNEW_BDESC1;
$modversion['blocks'][1]['show_func'] = "tadnews_cate_show";
$modversion['blocks'][1]['template'] = "tadnews_cate.html";

$modversion['blocks'][2]['file'] = "tadnews_content_block.php";
$modversion['blocks'][2]['name'] = _MI_TADNEW_BNAME2;
$modversion['blocks'][2]['description'] = _MI_TADNEW_BDESC2;
$modversion['blocks'][2]['show_func'] = "tadnews_content_block_show";
$modversion['blocks'][2]['template'] = "tadnews_content_block.html";
$modversion['blocks'][2]['edit_func'] = "tadnews_content_block_edit";
$modversion['blocks'][2]['options'] = "1|100%|vertical|0|font-size:13px;line-height:140%;text-align:justify;|width:214px;display:block;margin:3px;|0|0";

$modversion['blocks'][3]['file'] = "tadnews_re_block.php";
$modversion['blocks'][3]['name'] = _MI_TADNEW_BNAME3;
$modversion['blocks'][3]['description'] = _MI_TADNEW_BDESC3;
$modversion['blocks'][3]['show_func'] = "tadnews_b_show_3";
$modversion['blocks'][3]['template'] = "tadnews_re_block.html";
$modversion['blocks'][3]['edit_func'] = "tadnews_re_edit";
$modversion['blocks'][3]['options'] = "10|160";


$modversion['blocks'][4]['file'] = "tadnews_newspaper.php";
$modversion['blocks'][4]['name'] = _MI_TADNEW_BNAME4;
$modversion['blocks'][4]['description'] = _MI_TADNEW_BDESC4;
$modversion['blocks'][4]['show_func'] = "tadnews_newspaper";
$modversion['blocks'][4]['template'] = "tadnews_newspaper.html";

$modversion['blocks'][5]['file'] = "tadnews_newspaper_list.php";
$modversion['blocks'][5]['name'] = _MI_TADNEW_BNAME5;
$modversion['blocks'][5]['description'] = _MI_TADNEW_BDESC5;
$modversion['blocks'][5]['show_func'] = "tadnews_newspaper_list";
$modversion['blocks'][5]['template'] = "tadnews_newspaper_list.html";
$modversion['blocks'][5]['edit_func'] = "tadnews_newspaper_list_edit";
$modversion['blocks'][5]['options'] = "10";

$modversion['blocks'][6]['file'] = "tadnews_cate_news.php";
$modversion['blocks'][6]['name'] = _MI_TADNEW_BNAME6;
$modversion['blocks'][6]['description'] = _MI_TADNEW_BDESC6;
$modversion['blocks'][6]['show_func'] = "tadnews_cate_news";
$modversion['blocks'][6]['template'] = "tadnews_cate_news.html";
$modversion['blocks'][6]['edit_func'] = "tadnews_cate_news_edit";
$modversion['blocks'][6]['options'] = "|10|1|0|100|color:gray;font-size:11px;margin-top:3px;line-height:150%;";

$modversion['blocks'][7]['file'] = "tadnews_page.php";
$modversion['blocks'][7]['name'] = _MI_TADNEW_BNAME7;
$modversion['blocks'][7]['description'] = _MI_TADNEW_BDESC7;
$modversion['blocks'][7]['show_func'] = "tadnews_page";
$modversion['blocks'][7]['template'] = "tadnews_page.html";
$modversion['blocks'][7]['edit_func'] = "tadnews_page_edit";
$modversion['blocks'][7]['options'] = "|160";

$modversion['blocks'][8]['file'] = "tadnews_focus_news.php";
$modversion['blocks'][8]['name'] = _MI_TADNEW_BNAME8;
$modversion['blocks'][8]['description'] = _MI_TADNEW_BDESC8;
$modversion['blocks'][8]['show_func'] = "tadnews_focus_news";
$modversion['blocks'][8]['template'] = "tadnews_focus_news.html";
$modversion['blocks'][8]['edit_func'] = "tadnews_focus_news_edit";
$modversion['blocks'][8]['options'] = "|1";

$modversion['blocks'][9]['file'] = "tadnews_my_page.php";
$modversion['blocks'][9]['name'] = _MI_TADNEW_BNAME9;
$modversion['blocks'][9]['description'] = _MI_TADNEW_BDESC9;
$modversion['blocks'][9]['show_func'] = "tadnews_my_page";
$modversion['blocks'][9]['template'] = "tadnews_my_page.html";
$modversion['blocks'][9]['edit_func'] = "tadnews_my_page_edit";
$modversion['blocks'][9]['options'] = "";

$modversion['blocks'][10]['file'] = "tadnews_list_content_block.php";
$modversion['blocks'][10]['name'] = _MI_TADNEW_BNAME10;
$modversion['blocks'][10]['description'] = _MI_TADNEW_BDESC10;
$modversion['blocks'][10]['show_func'] = "tadnews_list_content_block_show";
$modversion['blocks'][10]['template'] = "tadnews_list_content_block.html";
$modversion['blocks'][10]['edit_func'] = "tadnews_list_content_block_edit";
$modversion['blocks'][10]['options'] = "5|100|color:gray;font-size:11px;margin-top:3px;line-height:150%;|0|1|width:60px;height:30px;float:left;border:1px solid #9999CC;margin:0px 4px 4px 0px;|0";


$modversion['blocks'][11]['file'] = "tadnews_table_content_block.php";
$modversion['blocks'][11]['name'] = _MI_TADNEW_BNAME11;
$modversion['blocks'][11]['description'] = _MI_TADNEW_BDESC11;
$modversion['blocks'][11]['show_func'] = "tadnews_table_content_block_show";
$modversion['blocks'][11]['template'] = "tadnews_table_content_block.html";
$modversion['blocks'][11]['edit_func'] = "tadnews_table_content_block_edit";
$modversion['blocks'][11]['options'] = "6|1|start_day|news_title|uid|ncsn|counter|0";


$modversion['blocks'][12]['file'] = "tadnews_qrcode.php";
$modversion['blocks'][12]['name'] = _MI_TADNEW_BNAME12;
$modversion['blocks'][12]['description'] = _MI_TADNEW_BDESC12;
$modversion['blocks'][12]['show_func'] = "tadnews_qrcode_show";
$modversion['blocks'][12]['template'] = "tadnews_qrcode.html";


$modversion['blocks'][13]['file'] = "tadnews_slidernews.php";
$modversion['blocks'][13]['name'] = _MI_TADNEW_BNAME13;
$modversion['blocks'][13]['description'] = _MI_TADNEW_BDESC13;
$modversion['blocks'][13]['show_func'] = "tadnews_slidernews_show";
$modversion['blocks'][13]['template'] = "tadnews_slidernews.html";
$modversion['blocks'][13]['edit_func'] = "tadnews_slidernews_edit";
$modversion['blocks'][13]['options'] = "670|250|5|90";

$modversion['blocks'][14]['file'] = "tadnews_slidernews2.php";
$modversion['blocks'][14]['name'] = _MI_TADNEW_BNAME14;
$modversion['blocks'][14]['description'] = _MI_TADNEW_BDESC14;
$modversion['blocks'][14]['show_func'] = "tadnews_slidernews2_show";
$modversion['blocks'][14]['template'] = "tadnews_slidernews2.html";
$modversion['blocks'][14]['edit_func'] = "tadnews_slidernews2_edit";
$modversion['blocks'][14]['options'] = "5|90|ResponsiveSlides";

//---偏好設定---//
$modversion['config'][1]['name'] = 'show_num';
$modversion['config'][1]['title'] = '_MI_TADNEW_TITLE1';
$modversion['config'][1]['description'] = '_MI_TADNEW_DESC1';
$modversion['config'][1]['formtype'] = 'textbox';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 10;

$modversion['config'][4]['name'] = 'show_mode';
$modversion['config'][4]['title'] = '_MI_TADNEW_SHOW_MODE';
$modversion['config'][4]['description'] = '_MI_TADNEW_SHOW_MODE_DESC';
$modversion['config'][4]['formtype'] = 'select';
$modversion['config'][4]['valuetype'] = 'text';
$modversion['config'][4]['default'] = "summary";
$modversion['config'][4]['options']	= array('_MI_TADNEW_SHOW_MODE_OPT1' => 'summary','_MI_TADNEW_SHOW_MODE_OPT2' => 'list','_MI_TADNEW_SHOW_MODE_OPT3' => 'cate');

$modversion['config'][8]['name'] = 'cate_show_mode';
$modversion['config'][8]['title'] = '_MI_TADNEW_CATE_SHOW_MODE';
$modversion['config'][8]['description'] = '_MI_TADNEW_CATE_SHOW_MODE_DESC';
$modversion['config'][8]['formtype'] = 'select';
$modversion['config'][8]['valuetype'] = 'text';
$modversion['config'][8]['default'] = "summary";
$modversion['config'][8]['options']	= array('_MI_TADNEW_SHOW_MODE_OPT1' => 'summary','_MI_TADNEW_SHOW_MODE_OPT2' => 'list');

/*
$modversion['config'][5]['name'] = 'prefix_tag';
$modversion['config'][5]['title'] = '_MI_TADNEW_PREFIX_TAG';
$modversion['config'][5]['description'] = '_MI_TADNEW_PREFIX_TAG_DESC';
$modversion['config'][5]['formtype'] = 'textarea';
$modversion['config'][5]['valuetype'] = 'text';
$modversion['config'][5]['default'] = _MI_TADNEW_PREFIX_TAG_VAL;
*/

$modversion['config'][6]['name'] = 'show_bbcode';
$modversion['config'][6]['title'] = '_MI_TADNEW_SHOW_BB';
$modversion['config'][6]['description'] = '_MI_TADNEW_SHOW_BB_DESC';
$modversion['config'][6]['formtype'] = 'yesno';
$modversion['config'][6]['valuetype'] = 'int';
$modversion['config'][6]['default'] = 0;

$modversion['config'][7]['name'] = 'cate_pic_width';
$modversion['config'][7]['title'] = '_MI_TADNEW_CATE_PIC_WIDTH';
$modversion['config'][7]['description'] = '_MI_TADNEW_CATE_PIC_WIDTH_DESC';
$modversion['config'][7]['formtype'] = 'text';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = 100;


$modversion['config'][9]['name'] = 'pic_width';
$modversion['config'][9]['title'] = '_MI_TADNEW_PIC_WIDTH';
$modversion['config'][9]['description'] = '_MI_TADNEW_PIC_WIDTH_DESC';
$modversion['config'][9]['formtype'] = 'text';
$modversion['config'][9]['valuetype'] = 'int';
$modversion['config'][9]['default'] = 550;


$modversion['config'][10]['name'] = 'thumb_width';
$modversion['config'][10]['title'] = '_MI_TADNEW_THUMB_WIDTH';
$modversion['config'][10]['description'] = '_MI_TADNEW_THUMB_WIDTH_DESC';
$modversion['config'][10]['formtype'] = 'text';
$modversion['config'][10]['valuetype'] = 'int';
$modversion['config'][10]['default'] = 120;


$modversion['config'][11]['name'] = 'use_newspaper';
$modversion['config'][11]['title'] = '_MI_TADNEW_USE_NEWSPAPER';
$modversion['config'][11]['description'] = '_MI_TADNEW_USE_NEWSPAPER_DESC';
$modversion['config'][11]['formtype'] = 'yesno';
$modversion['config'][11]['valuetype'] = 'int';
$modversion['config'][11]['default'] = 1;

$modversion['config'][12]['name'] = 'use_archive';
$modversion['config'][12]['title'] = '_MI_TADNEW_USE_USE_ARCHIVE';
$modversion['config'][12]['description'] = '_MI_TADNEW_USE_USE_ARCHIVE_DESC';
$modversion['config'][12]['formtype'] = 'yesno';
$modversion['config'][12]['valuetype'] = 'int';
$modversion['config'][12]['default'] = 1;

$modversion['config'][22]['name'] = 'use_embed';
$modversion['config'][22]['title'] = '_MI_TADNEW_USE_EMBED';
$modversion['config'][22]['description'] = '_MI_TADNEW_USE_EMBED_DESC';
$modversion['config'][22]['formtype'] = 'yesno';
$modversion['config'][22]['valuetype'] = 'int';
$modversion['config'][22]['default'] = 1;

$modversion['config'][13]['name'] = 'show_submenu';
$modversion['config'][13]['title'] = '_MI_TADNEW_SHOW_SUBMENU';
$modversion['config'][13]['description'] = '_MI_TADNEW_SHOW_SUBMENU_DESC';
$modversion['config'][13]['formtype'] = 'yesno';
$modversion['config'][13]['valuetype'] = 'int';
$modversion['config'][13]['default'] = 1;


$modversion['config'][15]['name'] = 'download_after_read';
$modversion['config'][15]['title'] = '_MI_TADNEW_DOWNLOAD_AFTER_READ';
$modversion['config'][15]['description'] = '_MI_TADNEW_DOWNLOAD_AFTER_READ_DESC';
$modversion['config'][15]['formtype'] = 'yesno';
$modversion['config'][15]['valuetype'] = 'int';
$modversion['config'][15]['default'] = 0;


$modversion['config'][16]['name'] = 'creat_cate_group';
$modversion['config'][16]['title'] = '_MI_TADNEW_CREAT_CATE_GROUP';
$modversion['config'][16]['description'] = '_MI_TADNEW_CREAT_CATE_GROUP_DESC';
$modversion['config'][16]['formtype'] = 'group_multi';
$modversion['config'][16]['valuetype'] = 'array';
$modversion['config'][16]['default'] = array(1);

/*
$modversion['config'][17]['name'] = 'use_kcfinder';
$modversion['config'][17]['title'] = '_MI_TADNEW_USE_KCFINDER';
$modversion['config'][17]['description'] = '_MI_TADNEW_USE_KCFINDER_DESC';
$modversion['config'][17]['formtype'] = 'yesno';
$modversion['config'][17]['valuetype'] = 'int';
$modversion['config'][17]['default'] = 0;
*/

$modversion['config'][18]['name'] = 'summary_lengths';
$modversion['config'][18]['title'] = '_MI_TADNEW_SUMMARY_LENGTHS';
$modversion['config'][18]['description'] = '_MI_TADNEW_SUMMARY_LENGTHS_DESC';
$modversion['config'][18]['formtype'] = 'text';
$modversion['config'][18]['valuetype'] = 'int';
$modversion['config'][18]['default'] = 100;

$modversion['config'][19]['name'] = 'facebook_comments_width';
$modversion['config'][19]['title'] = '_MI_FBCOMMENT_TITLE';
$modversion['config'][19]['description'] = '_MI_FBCOMMENT_TITLE_DESC';
$modversion['config'][19]['formtype'] = 'yesno';
$modversion['config'][19]['valuetype'] = 'int';
$modversion['config'][19]['default'] = '1';

$modversion['config'][20]['name'] = 'use_pda';
$modversion['config'][20]['title'] = '_MI_USE_PDA_TITLE';
$modversion['config'][20]['description'] = '_MI_USE_PDA_TITLE_DESC';
$modversion['config'][20]['formtype'] = 'yesno';
$modversion['config'][20]['valuetype'] = 'int';
$modversion['config'][20]['default'] = '1';

$modversion['config'][21]['name'] = 'use_social_tools';
$modversion['config'][21]['title'] = '_MI_SOCIALTOOLS_TITLE';
$modversion['config'][21]['description'] = '_MI_SOCIALTOOLS_TITLE_DESC';
$modversion['config'][21]['formtype'] = 'yesno';
$modversion['config'][21]['valuetype'] = 'int';
$modversion['config'][21]['default'] = '1';


$modversion['config'][21]['name'] = 'use_social_tools';
$modversion['config'][21]['title'] = '_MI_SOCIALTOOLS_TITLE';
$modversion['config'][21]['description'] = '_MI_SOCIALTOOLS_TITLE_DESC';
$modversion['config'][21]['formtype'] = 'yesno';
$modversion['config'][21]['valuetype'] = 'int';
$modversion['config'][21]['default'] = '1';

$modversion['config'][23]['name'] = 'use_star_rating';
$modversion['config'][23]['title'] = '_MI_STAR_RATING_TITLE';
$modversion['config'][23]['description'] = '_MI_STAR_RATING_DESC';
$modversion['config'][23]['formtype'] = 'yesno';
$modversion['config'][23]['valuetype'] = 'int';
$modversion['config'][23]['default'] = '1';
?>
