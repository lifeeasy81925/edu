<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$timezone="+8";
$form->addElement(new XoopsFormSelectTimezone ("請選擇時區", "timezone", $timezone,3));
$main = $form->render();
?>
