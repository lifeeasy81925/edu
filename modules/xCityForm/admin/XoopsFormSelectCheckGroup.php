<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$group=array(1,2);
$form->addElement(new XoopsFormSelectCheckGroup ("可見群組", "group", $group));
$main = $form->render();
?>
