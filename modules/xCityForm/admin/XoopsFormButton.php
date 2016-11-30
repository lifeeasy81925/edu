<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormButton ("", "", "送出", "submit"));
$main = $form->render();
?>
