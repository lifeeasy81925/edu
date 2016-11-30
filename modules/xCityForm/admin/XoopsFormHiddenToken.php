<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormHiddenToken ("XOOPS_TOKEN"));
$main = $form->render();
?>
