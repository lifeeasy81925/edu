<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-07-14
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //

//---�򥻳]�w---//
//�ҲզW��
$modversion['name'] = _MI_TADMENU_NAME;
//�Ҳժ���
$modversion['version']	= '1.2';
//�Ҳէ@��
$modversion['author'] = _MI_TADMENU_AUTHOR;
//�Ҳջ���
$modversion['description'] = _MI_TADMENU_DESC;
//�Ҳձ��v��
$modversion['credits']	= _MI_TADMENU_CREDITS;
//�Ҳժ��v
$modversion['license']		= "GPL see LICENSE";
//�ҲլO�_���x��o�G1�A�D�x��2
$modversion['official']		= 2;
//�Ҳչϥ�
$modversion['image']		= "images/logo.png";
//�Ҳեؿ��W��
$modversion['dirname']		= "tad_menu";

//---��ƪ�[�c---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "tad_menu";

//---�޲z�����]�w---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//---�ϥΪ̥D���]�w---//
$modversion['hasMain'] = '0';


//---�Ұʫ�x�޲z�ɭ����---//
$modversion['system_menu'] = 1;
//---�˪O�]�w---//

//---�϶��]�w---//
$modversion['blocks'][1]['file'] = "tad_menu.php";
$modversion['blocks'][1]['name'] = _MI_TADMENU_BNAME1;
$modversion['blocks'][1]['description'] = _MI_TADMENU_BDESC1;
$modversion['blocks'][1]['show_func'] = "tad_menu";
$modversion['blocks'][1]['template'] = "tad_menu.html";


?>