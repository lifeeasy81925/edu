<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$lang="tchinese_utf8";
$form->addElement(new XoopsFormSelectLang ("請選擇語系", "lang", $lang, 3));
$main = $form->render();
?>
