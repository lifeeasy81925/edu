<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

//---�򥻳]�w---//
//�ҲզW��
$modversion['name'] = _MI_CK2LINK_NAME;
//�Ҳժ���
$modversion['version']	= '2.0 RC1';
//�Ҳէ@��
$modversion['author'] = _MI_CK2LINK_AUTHOR;
//�Ҳջ���
$modversion['description'] = _MI_CK2LINK_DESC;
//�Ҳձ��v��
$modversion['credits']	= _MI_CK2LINK_CREDITS;
//�Ҳժ��v
$modversion['license']		= "GPL see LICENSE";
//�ҲլO�_���x��o�G1�A�D�x��2
$modversion['official']		= 2;
//�Ҳչϥ�
$modversion['image']		= "images/logo.png";
//�Ҳեؿ��W��
$modversion['dirname']		= "ck2_link";

//---�Ұʫ�x�޲z�ɭ����---//
$modversion['system_menu'] = 1;


//---��ƪ�[�c---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "ck2_link_cate";
$modversion['tables'][2] = "ck2_link";

//---�޲z�����]�w---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---�ϥΪ̥D���]�w---//
$modversion['hasMain'] = 1;


//---�˪O�]�w---//

$modversion['templates'][1]['file'] = 'index_tpl.html';
$modversion['templates'][1]['description'] = _MI_CK2LINK_TEMPLATE_DESC1;
$modversion['templates'][2]['file'] = 'view_tpl.html';
$modversion['templates'][2]['description'] = 'Template of view.php width Comment';


//---�϶��]�w---//
$modversion['blocks'][1]['file'] = "ck2_link_list.php";
$modversion['blocks'][1]['name'] = _MI_CK2LINK_BNAME1;
$modversion['blocks'][1]['description'] = _MI_CK2LINK_BDESC1;
$modversion['blocks'][1]['show_func'] = "ck2_link_list";
$modversion['blocks'][1]['template'] = "ck2_link_list.html";
$modversion['blocks'][1]['edit_func'] = "ck2_link_list_edit";
$modversion['blocks'][1]['options'] = "5|";

//---���n�]�w---//
$modversion['config'][1]['name']	= 'show_num';
$modversion['config'][1]['title']	= '_MI_CK2LINK_SHOW_NUM';
$modversion['config'][1]['description']	= '_MI_CK2LINK_SHOW_NUM_DESC';
$modversion['config'][1]['formtype']	= 'textbox';
$modversion['config'][1]['valuetype']	= 'int';
$modversion['config'][1]['default']	= '6';

//---�j�M�]�w---//
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/ck2_link_search.php";
$modversion['search']['func'] = "ck2_link_search";

//---���ץ\��---//
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'link_sn';
$modversion['comments']['pageName'] = 'view.php';

?>
