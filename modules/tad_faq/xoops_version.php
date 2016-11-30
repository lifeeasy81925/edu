<?php
$modversion = array();

//---�Ҳհ򥻸�T---//
$modversion['name'] = _MI_TADFAQ_NAME;
$modversion['version'] = 2.2;
$modversion['description'] = _MI_TADFAQ_DESC;
$modversion['author'] = _MI_TADFAQ_AUTHOR;
$modversion['credits'] = _MI_TADFAQ_CREDITS;
$modversion['help'] = 'page=help';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image'] = "images/logo_{$xoopsConfig['language']}.png";
$modversion['dirname'] = basename(dirname(__FILE__));

//---�Ҳժ��A��T---//
$modversion['release_date'] = '2014/01/22';
$modversion['module_website_url'] = 'http://tad0616.net/';
$modversion['module_website_name'] = _MI_TAD_WEB;
$modversion['module_status'] = 'release';
$modversion['author_website_url'] = 'http://tad0616.net/';
$modversion['author_website_name'] = _MI_TAD_WEB;
$modversion['min_php']=5.2;
$modversion['min_xoops']='2.5';
$modversion['min_tadtools']='2.02';

//---paypal��T---//
$modversion ['paypal'] = array();
$modversion ['paypal']['business'] = 'tad0616@gmail.com';
$modversion ['paypal']['item_name'] = 'Donation : ' . _MI_TAD_WEB;
$modversion ['paypal']['amount'] = 0;
$modversion ['paypal']['currency_code'] = 'USD';


//---�Ұʫ�x�޲z�ɭ����---//
$modversion['system_menu'] = 1;

//---��ƪ�[�c---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "tad_faq_cate";
$modversion['tables'][2] = "tad_faq_content";


//---�w�˳]�w---//
$modversion['onInstall'] = "include/onInstall.php";
$modversion['onUpdate'] = "include/onUpdate.php";
$modversion['onUninstall'] = "include/onUninstall.php";

//---�j�M�]�w---//
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/tad_faq_search.php";
$modversion['search']['func'] = "tad_faq_search";

//---�޲z�����]�w---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---�ϥΪ̥D���]�w---//
$modversion['hasMain'] = 1;

//---�˪O�]�w---//
$modversion['templates'] = array();
$i=1;
$modversion['templates'][$i]['file'] = 'tad_faq_adm_main.html';
$modversion['templates'][$i]['description'] = 'tad_faq_adm_main.html';
$i++;
$modversion['templates'][$i]['file'] = 'tad_faq_adm_power.html';
$modversion['templates'][$i]['description'] = 'tad_faq_adm_power.html';
$i++;
$modversion['templates'][$i]['file'] = 'tad_faq_index.html';
$modversion['templates'][$i]['description'] = 'tad_faq_index.html';


//---�϶��]�w---//
$modversion['blocks'][1]['file'] = "tad_faq_block.php";
$modversion['blocks'][1]['name'] = _MI_TADFAQ_BNAME1;
$modversion['blocks'][1]['description'] = _MI_TADFAQ_BDESC1;
$modversion['blocks'][1]['show_func'] = "tad_faq_show";
$modversion['blocks'][1]['template'] = "tad_faq_block.html";

//---���n�]�w---//
$modversion['config'][0]['name']	= 'module_title';
$modversion['config'][0]['title']	= '_MI_TADFAQ_MODULE_TITLE';
$modversion['config'][0]['description']	= '_MI_TADFAQ_MODULE_TITLE_DESC';
$modversion['config'][0]['formtype']	= 'textbox';
$modversion['config'][0]['valuetype']	= 'text';
$modversion['config'][0]['default']	= _MI_TADFAQ_MODULE_TITLE_VAL;
?>
