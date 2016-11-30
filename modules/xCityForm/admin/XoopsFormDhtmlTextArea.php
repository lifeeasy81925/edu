<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$content="請輸入內容";
$form->addElement(new XoopsFormDhtmlTextArea ("請輸入內容", "content", $content));
$main = $form->render();
?>
