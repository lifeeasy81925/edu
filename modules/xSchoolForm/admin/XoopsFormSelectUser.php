<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$uid=array(1,3);
$form->addElement(new XoopsFormSelectUser ("請選擇可編輯者", "uid", false, $uid, 3, true));
$main = $form->render();
?>
