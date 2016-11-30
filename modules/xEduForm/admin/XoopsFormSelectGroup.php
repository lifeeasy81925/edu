<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$group=array(1,2);
$form->addElement(new XoopsFormSelectGroup ("選擇可看群組", "group", true, $group, 3, true));
$main = $form->render();
?>
