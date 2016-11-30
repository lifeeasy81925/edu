<?php
/**
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * _LANGCODE    tw
 * _CHARSET     Big5
 * @version     $Id: blocksadmin.php 4256 2010-02-01 05:36:43Z beckmi $
 * @translator	�I��U�q���u�@�� http://ck2tw.net/
 */

// Navigation
define( "_AM_SYSTEM_BLOCKS_ADMIN", "�϶��޲z" );
define( "_AM_SYSTEM_BLOCKS_MANAGMENT", "�޲z" );
define( "_AM_SYSTEM_BLOCKS_ADDBLOCK", "�s�W�϶�" );
define( "_AM_SYSTEM_BLOCKS_EDITBLOCK", "�s��϶�" );
define( "_AM_SYSTEM_BLOCKS_CLONEBLOCK", "�ƻs�϶�" );

// Forms
define( "_AM_SYSTEM_BLOCKS_CUSTOM", "�ۭq�϶�" );
define( "_AM_SYSTEM_BLOCKS_TYPES", "�Ҧ�����" );
define( "_AM_SYSTEM_BLOCKS_GENERATOR", "�϶����ݼҲաG");
define( "_AM_SYSTEM_BLOCKS_GROUP", "�s��");
define( "_AM_SYSTEM_BLOCKS_SVISIBLEIN", "��ܩ�");
define( "_AM_SYSTEM_BLOCKS_DISPLAY", "��ܰ϶�" );
define( "_AM_SYSTEM_BLOCKS_HIDE", "���ð϶� " );
define( "_AM_SYSTEM_BLOCKS_CLONE", "�ƻs");
define( "_AM_SYSTEM_BLOCKS_SIDELEFT", "��");
define( "_AM_SYSTEM_BLOCKS_SIDETOPLEFT", "�W��");
define( "_AM_SYSTEM_BLOCKS_SIDETOPCENTER", "�W��");
define( "_AM_SYSTEM_BLOCKS_SIDETOPRIGHT", "�W�k");
define( "_AM_SYSTEM_BLOCKS_SIDERIGHT", "�k");
define( "_AM_SYSTEM_BLOCKS_SIDEBOTTOMLEFT", "�U��");
define( "_AM_SYSTEM_BLOCKS_SIDEBOTTOMCENTER", "�U��");
define( "_AM_SYSTEM_BLOCKS_SIDEBOTTOMRIGHT", "�U�k");
define( "_AM_SYSTEM_BLOCKS_ADD", "�s�W�϶�");
define( "_AM_SYSTEM_BLOCKS_MANAGE", "�޲z�϶�");
define( "_AM_SYSTEM_BLOCKS_NAME", "�W��" );
define( "_AM_SYSTEM_BLOCKS_TYPE", "�϶�����" );
define( "_AM_SYSTEM_BLOCKS_SBLEFT", "��t�϶� - ����" );
define( "_AM_SYSTEM_BLOCKS_SBRIGHT", "��t�϶� - �k��" );
define( "_AM_SYSTEM_BLOCKS_CBLEFT", "�����϶� - ��" );
define( "_AM_SYSTEM_BLOCKS_CBRIGHT", "�����϶� - �k" );
define( "_AM_SYSTEM_BLOCKS_CBCENTER", "�����϶� - ��" );
define( "_AM_SYSTEM_BLOCKS_CBBOTTOMLEFT", "�����϶� - ����" );
define( "_AM_SYSTEM_BLOCKS_CBBOTTOMRIGHT", "�����϶� - ���k" );
define( "_AM_SYSTEM_BLOCKS_CBBOTTOM", "�����϶� - ����" );
define( "_AM_SYSTEM_BLOCKS_WEIGHT", "����" );
define( "_AM_SYSTEM_BLOCKS_VISIBLE", "����ܱҥΡH" );
define( "_AM_SYSTEM_BLOCKS_VISIBLEIN", "��ܩ�" );
define( "_AM_SYSTEM_BLOCKS_TOPPAGE", "����");
define( "_AM_SYSTEM_BLOCKS_ALLPAGES", "��������");
define( "_AM_SYSTEM_BLOCKS_UNASSIGNED", "�����w");
define( "_AM_SYSTEM_BLOCKS_TITLE", "���D" );
define( "_AM_SYSTEM_BLOCKS_CONTENT", "���e" );
define( "_AM_SYSTEM_BLOCKS_USEFULTAGS", "�i�μ��ҡG" );
define( "_AM_SYSTEM_BLOCKS_BLOCKTAG1", "%s �N�|�C�L�X %s" );
define( "_AM_SYSTEM_BLOCKS_CTYPE", "���e����" );
define( "_AM_SYSTEM_BLOCKS_HTML", "HTML" );
define( "_AM_SYSTEM_BLOCKS_PHP", "PHP�}��" );
define( "_AM_SYSTEM_BLOCKS_AFWSMILE", "�۰ʮ榡�]�ҥΪ��ϡ^" );
define( "_AM_SYSTEM_BLOCKS_AFNOSMILE", "�۰ʮ榡�]�������ϡ^" );
define( "_AM_SYSTEM_BLOCKS_BCACHETIME", "�֨��ɶ�");
define( "_AM_SYSTEM_BLOCKS_CUSTOMHTML", "�ۭq�϶��]HTML�^" );
define( "_AM_SYSTEM_BLOCKS_CUSTOMPHP", "�ۭq�϶��]PHP�^" );
define( "_AM_SYSTEM_BLOCKS_CUSTOMSMILE", "�ۭq�϶��]�۰ʮ榡 + ���ϡ^" );
define( "_AM_SYSTEM_BLOCKS_CUSTOMNOSMILE", "�ۭq�϶��]�۰ʮ榡�^" );
define( "_AM_SYSTEM_BLOCKS_EDITTPL", "�s��˪O");
define( "_AM_SYSTEM_BLOCKS_OPTIONS", "�ﶵ" );
define( "_AM_SYSTEM_BLOCKS_DRAG", "�԰ʩαƧǰ϶�" );

// Messages
define( "_AM_SYSTEM_BLOCKS_DBUPDATED", _AM_SYSTEM_DBUPDATED );
define( "_AM_SYSTEM_BLOCKS_RUSUREDEL", "�z�T�w�n�R���϶� <div class='bold'>%s</div> �ܡH" );
define( "_AM_SYSTEM_BLOCKS_SYSTEMCANT", "����R���t�ΰ϶��I" );
define( "_AM_SYSTEM_BLOCKS_MODULECANT", "�o�Ӱ϶����ઽ���R���I�Y�z���Q�n�o�Ӱ϶��A�Х����������ҲաC" );


// Tips
define( '_AM_SYSTEM_BLOCKS_TIPS',
'<ul>
<li>�u�n�I�� <img class="tooltip" src="%s" alt="'._AM_SYSTEM_BLOCKS_DRAG.'" title="'._AM_SYSTEM_BLOCKS_DRAG.'" /> �Y�i�z�L��Ԫ��覡���P���ܴ��϶���m�H�ζi��϶��޲z�C</li>
<li>�i�s�W�ۭq�϶��A��J����z�Q�q�b�����W�����e�C</li>
<li>�z�L�I�� <img class="tooltip" width="16" src="%s" alt="'._AM_SYSTEM_BLOCKS_DISPLAY.'" title="'._AM_SYSTEM_BLOCKS_DISPLAY.'"/> �� <img class="tooltip" width="16" src="%s" alt="'._AM_SYSTEM_BLOCKS_HIDE.'" title="'._AM_SYSTEM_BLOCKS_HIDE.'" /> �Y�i�]�w�϶��O�_��ܡC</li>
</ul>' );