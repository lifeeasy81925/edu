<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$content="請輸入內容";
$form->addElement(new XoopsFormTextArea ("新聞內容", "content", $content, 5, 50));
$main = $form->render();
?>
