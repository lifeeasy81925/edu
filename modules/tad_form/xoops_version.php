<?php
$modversion = array();

//---�Ҳհ򥻸�T---//
$modversion['name'] = _MI_TADFORM_NAME;
$modversion['version'] = 3.00;
$modversion['description'] = _MI_TADFORM_DESC;
$modversion['author'] = _MI_TADFORM_AUTHOR;
$modversion['credits'] = _MI_TADFORM_CREDITS;
$modversion['help'] = 'page=help';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image'] = "images/logo_{$xoopsConfig['language']}.png";
$modversion['dirname'] = basename(dirname(__FILE__));

//---�Ҳժ��A��T---//
$modversion['release_date'] = '2013/11/13';
$modversion['module_website_url'] = 'http://tad0616.net/';
$modversion['module_website_name'] = _MI_TAD_WEB;
$modversion['module_status'] = 'release';
$modversion['author_website_url'] = 'http://tad0616.net/';
$modversion['author_website_name'] = _MI_TAD_WEB;
$modversion['min_php']=5.2;
$modversion['min_xoops']='2.5';

//---paypal��T---//
$modversion ['paypal'] = array();
$modversion ['paypal']['business'] = 'tad0616@gmail.com';
$modversion ['paypal']['item_name'] = 'Donation : ' . _MI_TAD_WEB;
$modversion ['paypal']['amount'] = 0;
$modversion ['paypal']['currency_code'] = 'USD';

//---��ƪ�[�c---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "tad_form_col";
$modversion['tables'][2] = "tad_form_fill";
$modversion['tables'][3] = "tad_form_main";
$modversion['tables'][4] = "tad_form_value";


//---�Ұʫ�x�޲z�ɭ����---//
$modversion['system_menu'] = 1;

//---�w�˳]�w---//
$modversion['onInstall'] = "include/onInstall.php";
$modversion['onUpdate'] = "include/onUpdate.php";
$modversion['onUninstall'] = "include/onUninstall.php";


//---�޲z�����]�w---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---�ϥΪ̥D���]�w---//
$modversion['hasMain'] = 1;


//---�˪O�]�w---//
$modversion['templates'] = array();
$i=1;
$modversion['templates'][$i]['file'] = 'tad_form_index.html';
$modversion['templates'][$i]['description'] = 'tad_form_index.html';
$i++;
$modversion['templates'][$i]['file'] = 'tad_form_adm_main.html';
$modversion['templates'][$i]['description'] = 'tad_form_adm_main.html';
$i++;
$modversion['templates'][$i]['file'] = 'tad_form_adm_mail.html';
$modversion['templates'][$i]['description'] = 'tad_form_adm_mail.html';
$i++;
$modversion['templates'][$i]['file'] = 'tad_form_adm_result.html';
$modversion['templates'][$i]['description'] = 'tad_form_adm_result.html';
$i++;
$modversion['templates'][$i]['file'] = 'tad_form_adm_add.html';
$modversion['templates'][$i]['description'] = 'tad_form_adm_add.html';
$i++;
$modversion['templates'][$i]['file'] = 'tad_form_report.html';
$modversion['templates'][$i]['description'] = 'tad_form_report.html';


//---�϶��]�w---//
$modversion['blocks'] = array();
$modversion['blocks'][1]['file'] = "tad_form.php";
$modversion['blocks'][1]['name'] = _MI_TADFORM_BNAME1;
$modversion['blocks'][1]['description'] = _MI_TADFORM_BDESC1;
$modversion['blocks'][1]['show_func'] = "tad_form";
$modversion['blocks'][1]['template'] = "tad_form.html";

$modversion['blocks'][2]['file'] = "tad_one_form.php";
$modversion['blocks'][2]['name'] = _MI_TADFORM_BNAME2;
$modversion['blocks'][2]['description'] = _MI_TADFORM_BDESC2;
$modversion['blocks'][2]['show_func'] = "tad_one_form";
$modversion['blocks'][2]['template'] = "tad_one_form.html";
$modversion['blocks'][2]['edit_func'] = "tad_one_form_edit";
$modversion['blocks'][2]['options'] = "";
?>
