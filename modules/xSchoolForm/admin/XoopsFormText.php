<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$title="請輸入標題";
$form->addElement(new XoopsFormText ("新聞標題", "title", 40, 255,$title));
$main = $form->render();
?>
