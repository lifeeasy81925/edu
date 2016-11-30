<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-03-25
// $Id: xoops_version.php,v 1.2 2008/05/14 01:24:52 tad Exp $
// ------------------------------------------------------------------------- //

//---�򥻳]�w---//
//�ҲզW��
$modversion['name'] = _MI_TADCBOX_NAME;
//�Ҳժ���
$modversion['version']	= '2.0';
//�Ҳէ@��
$modversion['author'] = _MI_TADCBOX_AUTHOR;
//�Ҳջ���
$modversion['description'] = _MI_TADCBOX_DESC;
//�Ҳձ��v��
$modversion['credits']	= _MI_TADCBOX_CREDITS;
//�Ҳժ��v
$modversion['license']		= "GPL see LICENSE";
//�ҲլO�_���x��o�G1�A�D�x��2
$modversion['official']		= 0;
//�Ҳչϥ�
$modversion['image']		= "images/logo.png";
//�Ҳեؿ��W��
$modversion['dirname']		= "tad_cbox";

//---��ƪ�[�c---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "tad_cbox";

//---�޲z�����]�w---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---�ϥΪ̥D���]�w---//
$modversion['hasMain'] = 1;

//---�Ұʫ�x�޲z�ɭ����---//
$modversion['system_menu'] = 1;

//---�˪O�]�w---//

$modversion['templates'][1]['file'] = 'index_tpl.html';
$modversion['templates'][1]['description'] = _MI_TADCBOX_TEMPLATE_DESC1;
//---�϶��]�w---//
$modversion['blocks'][1]['file'] = "tad_cbox_block.php";
$modversion['blocks'][1]['name'] = _MI_TADCBOX_BNAME1;
$modversion['blocks'][1]['description'] = _MI_TADCBOX_BDESC1;
$modversion['blocks'][1]['show_func'] = "tad_cbox_b_show_1";
$modversion['blocks'][1]['template'] = "tad_cbox_block.html";
$modversion['blocks'][1]['edit_func'] = "tad_cbox_b_edit";
$modversion['blocks'][1]['options'] = "20|190|300|110|one|"._MI_TADCBOX_OPT1."|90|background-image:url({X_SITEURL}/modules/tad_cbox/images/bg.gif);\nbackground-repeat: no-repeat;\ncolor:white;";

//---���n�]�w---//
$modversion['config'][0]['name']	= 'need_login';
$modversion['config'][0]['title']	= '_MI_TADCBOX_NEED_LOGIN';
$modversion['config'][0]['description']	= '_MI_TADCBOX_NEED_LOGIN_DESC';
$modversion['config'][0]['formtype']	= 'yesno';
$modversion['config'][0]['valuetype']	= 'int';
$modversion['config'][0]['default']	= 0;

$modversion['config'][1]['name']	= 'auto_id';
$modversion['config'][1]['title']	= '_MI_TADCBOX_AUTO_ID';
$modversion['config'][1]['description']	= '_MI_TADCBOX_AUTO_ID_DESC';
$modversion['config'][1]['formtype']	= 'yesno';
$modversion['config'][1]['valuetype']	= 'int';
$modversion['config'][1]['default']	= '1';

$modversion['config'][2]['name']	= 'input_min';
$modversion['config'][2]['title']	= '_MI_TADCBOX_INPUT_MIN';
$modversion['config'][2]['description']	= '_MI_TADCBOX_INPUT_MIN_DESC';
$modversion['config'][2]['formtype']	= 'textbox';
$modversion['config'][2]['valuetype']	= 'int';
$modversion['config'][2]['default']	= 4;

$modversion['config'][3]['name']	= 'input_max';
$modversion['config'][3]['title']	= '_MI_TADCBOX_INPUT_MAX';
$modversion['config'][3]['description']	= '_MI_TADCBOX_INPUT_MAX_DESC';
$modversion['config'][3]['formtype']	= 'textbox';
$modversion['config'][3]['valuetype']	= 'int';
$modversion['config'][3]['default']	= 200;

$modversion['config'][4]['name']	= 'allow_html';
$modversion['config'][4]['title']	= '_MI_TADCBOX_ALLOW_HTML';
$modversion['config'][4]['description']	= '_MI_TADCBOX_ALLOW_HTML_DESC';
$modversion['config'][4]['formtype']	= 'yesno';
$modversion['config'][4]['valuetype']	= 'int';
$modversion['config'][4]['default']	= 0;

$modversion['config'][5]['name']	= 'security_images';
$modversion['config'][5]['title']	= '_MI_TADCBOX_SECURITY_IMAGES';
$modversion['config'][5]['description']	= '_MI_TADCBOX_SECURITY_IMAGES_DESC';
$modversion['config'][5]['formtype']	= 'yesno';
$modversion['config'][5]['valuetype']	= 'int';
$modversion['config'][5]['default']	= 0;

$modversion['config'][6]['name']	= 'no_need_chk';
$modversion['config'][6]['title']	= '_MI_TADCBOX_NO_NEED_CHK';
$modversion['config'][6]['description']	= '_MI_TADCBOX_NO_NEED_CHK_DESC';
$modversion['config'][6]['formtype']	= 'group_multi';
$modversion['config'][6]['valuetype']	= 'array';


$modversion['config'][7]['name']	= 'col1_color';
$modversion['config'][7]['title']	= '_MI_TADCBOX_COL1_COLOR';
$modversion['config'][7]['description']	= '_MI_TADCBOX_COL1_COLOR_DESC';
$modversion['config'][7]['formtype']	= 'textbox';
$modversion['config'][7]['valuetype']	= 'text';
$modversion['config'][7]['default']	= '#000000';

$modversion['config'][8]['name']	= 'col1_bgcolor';
$modversion['config'][8]['title']	= '_MI_TADCBOX_COL1_BGCOLOR';
$modversion['config'][8]['description']	= '_MI_TADCBOX_COL1_BGCOLOR_DESC';
$modversion['config'][8]['formtype']	= 'textbox';
$modversion['config'][8]['valuetype']	= 'text';
$modversion['config'][8]['default']	= '#FFFFFF';

$modversion['config'][9]['name']	= 'col2_color';
$modversion['config'][9]['title']	= '_MI_TADCBOX_COL2_COLOR';
$modversion['config'][9]['description']	= '_MI_TADCBOX_COL2_COLOR_DESC';
$modversion['config'][9]['formtype']	= 'textbox';
$modversion['config'][9]['valuetype']	= 'text';
$modversion['config'][9]['default']	= '#000000';

$modversion['config'][10]['name']	= 'col2_bgcolor';
$modversion['config'][10]['title']	= '_MI_TADCBOX_COL2_BGCOLOR';
$modversion['config'][10]['description']	= '_MI_TADCBOX_COL2_BGCOLOR_DESC';
$modversion['config'][10]['formtype']	= 'textbox';
$modversion['config'][10]['valuetype']	= 'text';
$modversion['config'][10]['default']	= '#EDF3F7';

$modversion['config'][11]['name']	= 'smile_num';
$modversion['config'][11]['title']	= '_MI_TADCBOX_SMILE_NUM';
$modversion['config'][11]['description']	= '_MI_TADCBOX_SMILE_NUM_DESC';
$modversion['config'][11]['formtype']	= 'textbox';
$modversion['config'][11]['valuetype']	= 'int';
$modversion['config'][11]['default']	= 5;
?>
