<?php
/**
 * Extended User Profile
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         profile
 * @since           2.3.0
 * @author          Jan Pedersen
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: user.php 3749 2009-10-17 14:23:04Z trabis $
 */

$xoopsOption['pagetype'] = 'user';
include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'header.php';

$op = 'main';

if (isset($_POST['op'])) {
    $op = trim($_POST['op']);
} else if (isset($_GET['op'])) {
    $op = trim($_GET['op']);
}

if ( $op == 'main' ) {
    if (!$GLOBALS['xoopsUser']) {
        $xoopsOption['template_main'] = 'profile_userform.html';
        include $GLOBALS['xoops']->path('header.php');

        $GLOBALS['xoopsTpl']->assign('lang_login', _LOGIN);
        $GLOBALS['xoopsTpl']->assign('lang_username', _USERNAME);
        xoops_load('XoopsFormCaptcha');
        $cpatcha = new XoopsFormCaptcha('','',false);
        $user_captcha=$cpatcha->render();
        $GLOBALS['xoopsTpl']->assign('user_captcha', $user_captcha);

        if (isset($_GET['xoops_redirect'])) {
            $GLOBALS['xoopsTpl']->assign('redirect_page', htmlspecialchars(trim($_GET['xoops_redirect']), ENT_QUOTES));
        }
        if ($GLOBALS['xoopsConfig']['usercookie']) {
            $GLOBALS['xoopsTpl']->assign('lang_rememberme', _US_REMEMBERME);
        }

        $GLOBALS['xoopsTpl']->assign('lang_password', _PASSWORD);
        // GLOBALS['xoopsTpl']->assign('lang_notregister', _US_NOTREGISTERED);   // 關掉註冊新帳號
        // $GLOBALS['xoopsTpl']->assign('lang_lostpassword', _US_LOSTPASSWORD);  // 取回密碼四個字
        // $GLOBALS['xoopsTpl']->assign('lang_noproblem', _US_NOPROBLEM);        // 取回密碼說明
        // $GLOBALS['xoopsTpl']->assign('lang_youremail', _US_YOUREMAIL);        // 您的電子郵件這幾個字
        // $GLOBALS['xoopsTpl']->assign('lang_sendpassword', _US_SENDPASSWORD);  // 傳送密碼這幾個字(但無法移除按鈕)
        $GLOBALS['xoopsTpl']->assign('mailpasswd_token', $GLOBALS['xoopsSecurity']->createToken());

		echo "<img src='/edu/images/warning.png' height='30px' align='absbottom' />";
		echo "<font size='+2'> 密碼輸入錯誤！</font><p>";
		echo "<p><hr><p>";
		echo "<font size='+2'>您可以試試：</font><p>";
		echo "<a href='/edu/index.php'><img src='/edu/images/epa_logo.png' height='60px' align='middle' />";
		echo "<font size='+2'> 1. <b>回首頁再次登入。</b></font></a><p>";
		echo "<a href='/edu/modules/xAllForm/find_password.php'><img src='/edu/images/password.png' height='60px' align='middle' />";
		echo "<font size='+2'> 2. <b>忘記密碼。</b></font></a><p>";

        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footer.php';

        exit();
    }
    if (!empty($_GET['xoops_redirect'])) {

        $redirect = trim($_GET['xoops_redirect']);
        $isExternal = false;
        if ($pos = strpos($redirect, '://')) {
            $xoopsLocation = substr( XOOPS_URL, strpos( XOOPS_URL, '://' ) + 3);
            if (strcasecmp(substr($redirect, $pos + 3, strlen($xoopsLocation)), $xoopsLocation)) {
                $isExternal = true;
            }
        }
        if (!$isExternal) {
            header('Location: ' . $redirect);
            exit();
        }
    }

    header('Location: ./userinfo.php?uid=' . $GLOBALS['xoopsUser']->getVar('uid'));
    exit();
}

if ($op == 'login') {
    xoops_load('XoopsCaptcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember',false);
    if (! $xoopsCaptcha->verify()) {
      $mseeage = '驗證碼錯誤';
      redirect_header(XOOPS_URL . '/modules/profile/captcha_wrong.php', 1, $message);  // 告知使用者打錯驗證碼了，不要只有重整頁面
    }
    include_once $GLOBALS['xoops']->path('include/checklogin.php');
    exit();
}

if ($op == 'logout') {
    $message = '';
	// Regenerate a new session id and destroy old session
    $GLOBALS["sess_handler"]->regenerate_id(true);
    $_SESSION = array();
    session_destroy();
    setcookie($GLOBALS['xoopsConfig']['usercookie'], 0, -1, '/', XOOPS_COOKIE_DOMAIN, 0);
    setcookie($GLOBALS['xoopsConfig']['usercookie'], 0, - 1, '/');
    // clear entry from online users table
    if (is_object($GLOBALS['xoopsUser'])) {
        $online_handler =& xoops_gethandler('online');
        $online_handler->destroy($GLOBALS['xoopsUser']->getVar('uid'));
    }
    $message = _US_LOGGEDOUT . '<br />' . _US_THANKYOUFORVISIT;
    redirect_header(XOOPS_URL . '/', 1, $message);
    exit();
}

if ($op == 'actv') {
    $id = intval($_GET['id']);
    $actkey = trim($_GET['actkey']);
    redirect_header("activate.php?op=actv&amp;id={$id}&amp;actkey={$actkey}", 1, '');
    exit();
}

if ($op == 'delete') {
    $config_handler =& xoops_gethandler('config');
    $GLOBALS['xoopsConfigUser'] = $config_handler->getConfigsByCat(XOOPS_CONF_USER);
    if (!$GLOBALS['xoopsUser'] || $GLOBALS['xoopsConfigUser']['self_delete'] != 1) {
        redirect_header(XOOPS_URL . '/', 5, _US_NOPERMISS);
        exit();
    } else {
        $groups = $GLOBALS['xoopsUser']->getGroups();
        if (in_array(XOOPS_GROUP_ADMIN, $groups)){
            // users in the webmasters group may not be deleted
            redirect_header(XOOPS_URL . '/', 5, _US_ADMINNO);
            exit();
        }
        $ok = !isset($_POST['ok']) ? 0 : intval($_POST['ok']);
        if ($ok != 1) {
            include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'header.php';
            xoops_confirm(array('op' => 'delete', 'ok' => 1), 'user.php', _US_SURETODEL . '<br/>' . _US_REMOVEINFO);
            include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footer.php';
        } else {
            $del_uid = $GLOBALS['xoopsUser']->getVar("uid");
            $member_handler =& xoops_gethandler('member');
            if (false != $member_handler->deleteUser($GLOBALS['xoopsUser'])) {
                $online_handler =& xoops_gethandler('online');
                $online_handler->destroy($del_uid);
                xoops_notification_deletebyuser($del_uid);
                redirect_header(XOOPS_URL . '/', 5, _US_BEENDELED);
            }
            redirect_header(XOOPS_URL . '/', 5, _US_NOPERMISS);
        }
        exit();
    }
}
?>