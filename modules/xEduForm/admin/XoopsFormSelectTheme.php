<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$theme="default";
$form->addElement(new XoopsFormSelectTheme ("請選擇佈景", "theme", $theme,3));
$main = $form->render();
?>
