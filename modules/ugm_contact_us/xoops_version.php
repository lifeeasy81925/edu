<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� ugm �s�@
// �s�@����G2009-02-28
// $Id:$
// ------------------------------------------------------------------------- //

//---�򥻳]�w---//
//�ҲզW��
$modversion['name'] = _MI_UGMCONTACUS_NAME;
//�Ҳժ���
$modversion['version']	= '1.31';
//�Ҳէ@��
$modversion['author'] = _MI_UGMCONTACUS_AUTHOR;
//�Ҳջ���
$modversion['description'] = _MI_UGMCONTACUS_DESC;
//�Ҳձ��v��
$modversion['credits']	= _MI_UGMCONTACUS_CREDITS;
//�Ҳժ��v
$modversion['license']		= "GPL see LICENSE";
//�ҲլO�_���x��o�G1�A�D�x��2
$modversion['official']		= 2;
//�Ҳչϥ�
$modversion['image']		= "images/logo.png";
//�Ҳեؿ��W��
$modversion['dirname']		= "ugm_contact_us";

//---��ƪ�[�c---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "ugm_contact_us";
$modversion['tables'][2] = "ugm_cu_service";
$modversion['tables'][3] = "ugm_cu_solution";

//---�޲z�����]�w---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---�ϥΪ̥D���]�w---//
$modversion['hasMain'] = 1;


//---�˪O�]�w---//

$modversion['templates'][1]['file'] = 'index_tpl.html';
$modversion['templates'][1]['description'] = _MI_UGMCONTACUS_TEMPLATE_DESC1;
//---�϶��]�w---//
$modversion['blocks'][1]['file'] = "ugm_contact_us_b1.php";
$modversion['blocks'][1]['name'] = _MI_UGMCONTACUS_BNAME1;
$modversion['blocks'][1]['description'] = _MI_UGMCONTACUS_BDESC1;
$modversion['blocks'][1]['show_func'] = "ugm_contact_us_b1";
$modversion['blocks'][1]['template'] = "ugm_contact_us_b1.html";
$modversion['blocks'][1]['edit_func'] = "ugm_contact_us_b1_edit";
$modversion['blocks'][1]['options'] = "";

//---���n�]�w---//
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
