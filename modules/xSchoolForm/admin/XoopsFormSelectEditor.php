<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$editor="ckeditor";
$form->addElement(new XoopsFormSelectEditor (&$form, "editor", $editor));
$main = $form->render();
?>
