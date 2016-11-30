<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormRadioYN ("是否發布", "enable", true, "發布", "隱藏"));
$main = $form->render();
?>
