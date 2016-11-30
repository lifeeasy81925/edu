<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$match="";
$form->addElement(new XoopsFormSelectMatchOption ("請選擇", "match", $match,3));
$main = $form->render();
?>
