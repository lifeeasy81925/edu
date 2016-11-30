<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$configs="";
$form->addElement(new XoopsFormCaptcha ("請輸入驗證碼", 'xoopscaptcha', false, $configs));
$main = $form->render();
?>
