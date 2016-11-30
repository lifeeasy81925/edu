<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormLabel("說明", "此為發布新聞的頁面"));
$main = $form->render();
?>
