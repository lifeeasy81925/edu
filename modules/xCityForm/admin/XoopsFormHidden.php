<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormHidden ("news_sn", $news_sn));
$main = $form->render();
?>
