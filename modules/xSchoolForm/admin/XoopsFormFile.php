<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormFile ("上傳附檔", "files", 2048));
$main = $form->render();
?>
