<?php
/**
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * _LANGCODE    tw
 * _CHARSET     Big5
 * @version     $Id: users.php 4091 2010-01-05 17:02:11Z forxoops $
 * @translator	�I��U�q���u�@�� http://ck2tw.net/
 */

// Navigation
define("_AM_SYSTEM_USERS_NAV_MAIN","�|���޲z");
define("_AM_SYSTEM_USERS_NAV_ADVANCED_SEARCH","�i���j�M");
define("_AM_SYSTEM_USERS_NAV_ADD_USER","�s�W�|��");
define("_AM_SYSTEM_USERS_NAV_EDIT_USER","�s��|��");
define("_AM_SYSTEM_USERS_NAV_DELETE_USER","�R���|��");

// Tips
define("_AM_SYSTEM_USERS_NAV_TIPS","
<ul>
<li>�޲z�����|��</li>
</ul>");

// Main
define("_AM_SYSTEM_USERS_USER","�|��");
define("_AM_SYSTEM_USERS_ADMIN","�޲z��");
define("_AM_SYSTEM_USERS_UID","Uid�s��");
define("_AM_SYSTEM_USERS_STATUS","���A");
define("_AM_SYSTEM_USERS_NAME","�m�W");
define("_AM_SYSTEM_USERS_UNAME","�b��");
define("_AM_SYSTEM_USERS_EMAIL","Email");
define("_AM_SYSTEM_USERS_EDIT_GROUPS","�s��s��");
define("_AM_SYSTEM_USERS_REG_DATE","���U���");
define("_AM_SYSTEM_USERS_LAST_LOGIN","�̫�n�J");
define("_AM_SYSTEM_USERS_POSTS","����/�峹");
define("_AM_SYSTEM_USERS_LEVEL","����");
define("_AM_SYSTEM_USERS_ACTION","�ʧ@");
define("_AM_SYSTEM_USERS_FINDUS","�M��|��");
define("_AM_SYSTEM_USERS_AVATAR","�Y��");
define("_AM_SYSTEM_USERS_REALNAME","�u��m�W");
define("_AM_SYSTEM_USERS_REGDATE","���U���");
define("_AM_SYSTEM_USERS_PM","�����T��");
define("_AM_SYSTEM_USERS_URL","���}");
define("_AM_SYSTEM_USERS_PREVIOUS","�W��");
define("_AM_SYSTEM_USERS_NEXT","�U��");
define("_AM_SYSTEM_USERS_USERSFOUND","��� %s �ӷ|��");
define("_AM_SYSTEM_USERS_ACTUS", "�����|���ơG%s");
define("_AM_SYSTEM_USERS_INACTUS", "���ҥαb���|���ơG%s");
define("_AM_SYSTEM_USERS_NOFOUND","�䤣��|��");
define("_AM_SYSTEM_USERS_ICQ","ICQ ���X");
define("_AM_SYSTEM_USERS_AIM","AIM �s��");
define("_AM_SYSTEM_USERS_YIM","Yahoo �Y�ɳq�s��");
define("_AM_SYSTEM_USERS_FACEBOOK","Facebook �s��"); //TODO
define("_AM_SYSTEM_USERS_SKYPE","Skype �s��"); //TODO
define("_AM_SYSTEM_USERS_MSNM","MSN�s��");
define("_AM_SYSTEM_USERS_TIMEZONE","�ɰ�");
define("_AM_SYSTEM_USERS_SHOWSIG","�`�O�q�X�ڪ�ñ�W��");
define("_AM_SYSTEM_USERS_CDISPLAYMODE","���קe�{�Ҧ�");
define("_AM_SYSTEM_USERS_CSORTORDER","���ױƧǨ̾�");
define("_AM_SYSTEM_USERS_EXTRAINFO","��L��T");
define("_AM_SYSTEM_USERS_LOCATION","�Ӧ�");
define("_AM_SYSTEM_USERS_OCCUPATION","¾�~");
define("_AM_SYSTEM_USERS_INTEREST","����R�n");
define("_AM_SYSTEM_USERS_URLC","�ӤH����");
define("_AM_SYSTEM_USERS_LOCATIONC","��m");
define("_AM_SYSTEM_USERS_OCCUPATIONC","¾�~");
define("_AM_SYSTEM_USERS_INTERESTC","����");
define("_AM_SYSTEM_USERS_LASTLOGMORE","�̫�n�J�w�W�L <span style='color:#ff0000;'>X</span> ��");
define("_AM_SYSTEM_USERS_LASTLOGLESS","�̫�n�J�b <span style='color:#ff0000;'>X</span> �Ѥ�");
define("_AM_SYSTEM_USERS_REGMORE","�[�J����w�W�L <span style='color:#ff0000;'>X</span> ��");
define("_AM_SYSTEM_USERS_REGLESS","�[�J����b <span style='color:#ff0000;'>X</span> �Ѥ�");
define("_AM_SYSTEM_USERS_POSTSMORE","�o��峹�Ƥj�� <span style='color:#ff0000;'>X</span> �g");
define("_AM_SYSTEM_USERS_POSTSLESS","�o��峹�Ƥp�� <span style='color:#ff0000;'>X</span> �g");
define("_AM_SYSTEM_USERS_SORT","�Ƨ�");
define("_AM_SYSTEM_USERS_ORDER","�Ƨ�");
define("_AM_SYSTEM_USERS_LASTLOGIN","�̫�n�J���");
define("_AM_SYSTEM_USERS_ASC","���W�Ƨ�");
define("_AM_SYSTEM_USERS_DESC","����Ƨ�");
define("_AM_SYSTEM_USERS_LIMIT","�C���q�X�|����");
define("_AM_SYSTEM_USERS_RESULTS", "�j�M���G");
define("_AM_SYSTEM_USERS_SHOWMAILOK", "�|���������");
define("_AM_SYSTEM_USERS_MAILOK","�@�N����Email");
define("_AM_SYSTEM_USERS_MAILNG","���@�N����Email���|��");
define("_AM_SYSTEM_USERS_SHOWTYPE", "�|���������");
define("_AM_SYSTEM_USERS_ACTIVE","�ȥ����|��");
define("_AM_SYSTEM_USERS_INACTIVE","�ȩ|���ҥαb���|��");
define("_AM_SYSTEM_USERS_BOTH", "�Ҧ��|��");
define("_AM_SYSTEM_USERS_SENDMAIL", "�H�oEmail");
define("_AM_SYSTEM_USERS_ADD2GROUP", "�s�W�|���� %s �s��");
define("_AM_SYSTEM_USERS_GROUPS", "�s��");
define("_AM_SYSTEM_USERS_ADD_GROUPS", "�s�W�s��");
define("_AM_SYSTEM_USERS_DELETE_GROUPS", "�R���s��");
define("_AM_SYSTEM_USERS_AYSYWTDU","�z�T�w�n�R���b��<strong>%s</strong>�ܡH");
define("_AM_SYSTEM_USERS_BYTHIS","�N�û��R���o�ӱb������T�C");
define("_AM_SYSTEM_USERS_YES","�O");
define("_AM_SYSTEM_USERS_NO","�_");
define("_AM_SYSTEM_USERS_YMCACF","�z���ݶ�g�������C");
define("_AM_SYSTEM_USERS_CNRNU","�L�k���U�s�|���C");
define("_AM_SYSTEM_USERS_EDEUSER","�ק�b��");
define("_AM_SYSTEM_USERS_NICKNAME","�ʺ�");
define("_AM_SYSTEM_USERS_MODIFYUSER","�s��b��");
define("_AM_SYSTEM_USERS_DELUSER","�R���b��");
define("_AM_SYSTEM_USERS_GO","�e�X");
define("_AM_SYSTEM_USERS_ADDUSER","�s�W�b��");
define("_AM_SYSTEM_USERS_OPTION","�ﶵ");
define("_AM_SYSTEM_USERS_THEME","�G��");
define("_AM_SYSTEM_USERS_AOUTVTEAD","���\���}�o�ӹq�l�l��");
define("_AM_SYSTEM_USERS_RANK","����");
define("_AM_SYSTEM_USERS_NSRA","�����w�S����");
define("_AM_SYSTEM_USERS_NSRID","�b��Ʈw���S���S����");
define("_AM_SYSTEM_USERS_ACCESSLEV","����");
define("_AM_SYSTEM_USERS_SIGNATURE","ñ�W");
define("_AM_SYSTEM_USERS_PASSWORD","�K�X");
define("_AM_SYSTEM_USERS_INDICATECOF","* ������ﶵ");
define("_AM_SYSTEM_USERS_NOTACTIVE","�o�ӱb���|���ҰʡA�z�n�Ұʳo�ӱb���ܡH");
define("_AM_SYSTEM_USERS_UPDATEUSER","��s�b��");
define("_AM_SYSTEM_USERS_USERINFO","�b����T");
define("_AM_SYSTEM_USERS_USERID","�|��ID");
define("_AM_SYSTEM_USERS_RETYPEPD","�T�{�K�X");
define("_AM_SYSTEM_USERS_CHANGEONLY","�]�Ȧ��ѭק�ɦA�T�{�Ρ^");
define("_AM_SYSTEM_USERS_SYNCHRONIZE","���p�o���");
define("_AM_SYSTEM_USERS_USERDONEXIT","�|�����s�b�I");
define("_AM_SYSTEM_USERS_STNPDNM","��p�A�⦸��J���s�K�X���šA�Э��s�A�դ@���C");
define("_AM_SYSTEM_USERS_CNUUSER","�L�k��s�|���C");
define("_AM_SYSTEM_USERS_CNGUSERID","�L�k���o�|���b���C");
define("_AM_SYSTEM_USERS_NOUSERS","����w�n�s�誺�|���C");
define("_AM_SYSTEM_USERS_CNRNU2","�s�|������s�W��p�U�s�դ��G%s�C");
define("_AM_SYSTEM_USERS_SEARCH","�j�M");
define("_AM_SYSTEM_USERS_SEARCH_USER","�j�M�|��");
define("_AM_SYSTEM_USERS_ADVANCED_SEARCH","�i���j�M");
define("_AM_SYSTEM_USERS_EDIT","�s��|��");
define("_AM_SYSTEM_USERS_DEL","�R���|��");
define("_AM_SYSTEM_USERS_DELETE","�R��");
define("_AM_SYSTEM_USERS_SUBMIT","�e�X");
define("_AM_SYSTEM_USERS_PURGE","�M��");
define("_AM_SYSTEM_USERS_ADD","�s�W�|��");
define("_AM_SYSTEM_USERS_VIEW","�[�ݷ|����T");
define("_AM_SYSTEM_USERS_NO_FOUND","�䤣��|��");
define("_AM_SYSTEM_USERS_NOT_CONNECT","�q���s�u");
define("_AM_SYSTEM_USERS_FORM_SURE_DEL","�R���|���G%s");
define("_AM_SYSTEM_USERS_FORM_SURE_DEL2","�R��");
define("_AM_SYSTEM_USERS_NO_SUPP", "�L�k�R���|���G%s <br />");
define("_AM_SYSTEM_USERS_NO_ADMINSUPP", "�޲z���L�k�Q�R���G %s <br />");
define("_AM_SYSTEM_USERS_ERROR", "���~�G<br /><br /> %s");
define("_AM_SYSTEM_USERS_ALLGROUP", "�Ҧ��s��");
define("_AM_SYSTEM_USERS_ALLUSER", "�Ҧ��|��");
define("_AM_SYSTEM_USERS_ACTIVEUSER", "�Ȥw�Ұʷ|��");
define("_AM_SYSTEM_USERS_INACTIVEUSER", "�ȩ|���Ұʷ|��");

// Error
define("_AM_SYSTEM_USERS_PSEUDO_ERROR","�|���W�١u%s�v�w�s�b");
define("_AM_SYSTEM_USERS_MAIL_ERROR","�|��Email�u%s�v�w�s�b");

//2.5.4
define("_AM_SYSTEM_USERS_ACCEPT_EMAIL","�����Ӧۺ޲z�����H��");