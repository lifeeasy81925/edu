<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-06-25
// $Id: function.php,v 1.1 2008/05/14 01:22:08 tad Exp $
// ------------------------------------------------------------------------- //
include_once "../../tadtools/language/{$xoopsConfig['language']}/admin_common.php";

define("_TAD_NEED_TADTOOLS"," �ݭn modules/tadtools�A�i��<a href='http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50' target='_blank'>Tad�Ч���</a>�U���C");

define("_MA_TADFORM_RESULT","�[�ݵ��G");

define("_MA_INPUT_FORM","�]�p�ݨ����");

define("_MA_TADFORM_OFSN","�s��");
define("_MA_TADFORM_TITLE","�ݨ����D");
define("_MA_TADFORM_START_DATE","�}�l���");
define("_MA_TADFORM_END_DATE","�������");
define("_MA_TADFORM_CONTENT","�ݨ�����");
define("_MA_TADFORM_UID","�o�G��");
define("_MA_TADFORM_POST_DATE","�o�G���");
define("_MA_TADFORM_ENABLE","�ҥΪ��A");
define("_MA_TADFORM_ADM_EMAIL","�ݨ��޲zEmail");
define("_MA_TADFORM_EDIT_OPTION","���۽s��ﶵ");

define("_MA_INPUT_COL_FORM","�D�س]�w");
define("_MA_TADFORM_CSN","�y����");
define("_MA_TADFORM_COL_TITLE","���D");
define("_MA_TADFORM_COL_DESCRIPT","���D�y�z");
define("_MA_TADFORM_COL_KIND","�e�{������");
define("_MA_TADFORM_COL_SIZE","�����ס]�οﶵ�^");
define("_MA_TADFORM_COL_VAL","�w�]��");
define("_MA_TADFORM_COL_CHK","�O�_����");
define("_MA_TADFORM_COL_FUNC","�έp�\��");
define("_MA_TADFORM_COL_SORT","�Ƨ�");
define("_MA_TADFORM_COL_TEXT","��r��");
define("_MA_TADFORM_COL_RADIO","��γ��s");
define("_MA_TADFORM_COL_CHECKBOX","��νƿ�s");
define("_MA_TADFORM_COL_SELECT","�U�Կ��");
define("_MA_TADFORM_COL_TEXTAREA","�j�q��r��");
define("_MA_TADFORM_COL_DATE","�����J��");
define("_MA_TADFORM_COL_DATETIME","����Ϯɶ���J��");
define("_MA_TADFORM_COL_SHOW","����ܯ¤�r");
define("_MA_TADFORM_COL_SHOW_NOTE","��Ρu����ܯ¤�r�v�ɡA�бN����ܤ�r��g�b�u���D�y�z�v�Y�i�C");

define("_MA_TADFORM_COL_NO_FUN","����");
define("_MA_TADFORM_COL_SUM","�[�`");
define("_MA_TADFORM_COL_AVG","����");
define("_MA_TADFORM_COL_COUNT","�p��");

define("_MA_TADFORM_COL_END","�x�s�ᤣ�A�s�W��L�D��");
define("_MA_TADFORM_COL_ACTIVE","�ҥ�");
define("_MA_TADFORM_COL_ENABLE","����");
define("_MA_TADFORM_COL_WHO","�����");
define("_MA_TADFORM_ANALYSIS","�έp���R");
define("_MA_TADFORM_ANALYSIS_RESULT","���R���G");
define("_MA_TADFORM_COL_PUBLIC","��ܵ��G�ɨq�X�����");

define("_MA_TADFORM_COL_NOTE","�ﶵ�ХΡu;�v�j�}�C");
define("_MA_TADFORM_SIGN_GROUP","�i��g���s��");
define("_MA_TADFORM_VIEW_RESULT_GROUP","�i�ݵ��G���s��");
define("_MA_TADFORM_MULTI_SIGN","���\�h����g");
define("_MA_TADFORM_ANONYMOUS","�ΦW");
define("_MA_TADFORM_SIGN_MEMS","%s �H��g");
define("_MA_TADFORM_SIGN_DATE","��g���");
define("_MA_TADFORM_OPTIONS","�ݨ��D��");
define("_MA_TADFORM_COPY_FORM","�ƻs");
define("_MA_TADFORM_COL_NUM","�D��");
define("_MA_TADFORM_ADD_COL","�s�W�D��");

define("_MA_TADFORM_FONT1","�s�ө���");
define("_MA_TADFORM_LINK1","�W�s��");
define("_MA_TADFORM_EXCEL_TITLE","�u%s�v��浲�G");
define("_MA_TADFORM_KIND","���γ~");
define("_MA_TADFORM_KIND0","�@��լd���");
define("_MA_TADFORM_KIND1","���W��");
define("_MA_TADFORM_KIND2","�u�W����");
define("_MA_TADFORM_KIND1_TH","���W�����H");
define("_MA_TADFORM_KIND1_OK","����");
define("_MA_TADFORM_UPDATE_RESULT","�x�s");

define("_MA_TADFORM_USE_CAPTCHA","�O�_�ϥ����ҽX�H");
define("_MA_TADFORM_SHOW_RESULT","��ܵ��G�H");
define("_MA_TADFORM_NOT_SHOW","������õL���G�䵲�G�C");

//update.php
define("_MA_TADFORM_AUTOUPDATE","�Ҳդɯ�");
define("_MA_TADFORM_AUTOUPDATE_VER","����");
define("_MA_TADFORM_AUTOUPDATE_DESC","�@��");
define("_MA_TADFORM_AUTOUPDATE_STATUS","��s���p");
define("_MA_TADFORM_AUTOUPDATE_GO","�ߧY��s");
define("_MA_TADFORM_AUTOUPDATE1","�b tad_form_main ��ƪ�s�W kind ���");
define("_MA_TADFORM_AUTOUPDATE2","�b tad_form_fill ��ƪ�s�W result_col ���");

//mail.php
define("_MA_TADFORM_SEND","�H�X");
define("_MA_TADFORM_MAIL_TITLE","�H����D");
define("_MA_TADFORM_MAIL_TITLE_VAL","�u%s�v�q���H");
define("_MA_TADFORM_SEND_OK","�o�e���\�I");
define("_MA_TADFORM_SEND_ERROR","�o�e���ѡI");
define("_MA_TADFORM_MAIL_TEST","�ȴ��ա]�u�W��ܤ��H�e�^");
define("_MA_TADFORM_SEND_TAG","���ҡ]�|�q�X�ӨϥΪ̶񪺵��ס^");
?>