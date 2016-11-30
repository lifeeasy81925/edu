<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormButtonTray ("", "回首頁", 'button', 'onClick="location.href=\'index.php\'"',true));
$main = $form->render();
?>
