<?php

function b_user_login_show()
{
    global $xoopsUser, $xoopsConfig;
    if (!$xoopsUser) {
        xoops_load('XoopsFormCaptcha');
        $cpatcha = new XoopsFormCaptcha('','',false);
        $user_captcha=$cpatcha->render(); 
        $block = array();
        $block['lang_username'] = _USERNAME;
        $block['unamevalue'] = "";
        $block['lang_password'] = _PASSWORD;
        $block['lang_login'] = _LOGIN;
        $block['lang_lostpass'] = _MB_SYSTEM_LPASS;
        $block['lang_registernow'] = _MB_SYSTEM_RNOW;
        $block['user_captcha'] = $user_captcha;
        //$block['lang_rememberme'] = _MB_SYSTEM_REMEMBERME;
        if ($xoopsConfig['use_ssl'] == 1 && $xoopsConfig['sslloginlink'] != '') {
           $block['sslloginlink'] = "<a href=\"javascript:openWithSelfMain('".$xoopsConfig['sslloginlink']."', 'ssllogin', 300, 200);\">"._MB_SYSTEM_SECURE."</a>";
        } elseif ($xoopsConfig['usercookie']) {
           $block['lang_rememberme'] = _MB_SYSTEM_REMEMBERME;
        }
        return $block;
    }
    return false;
}






?>