<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement(new XoopsFormPassword("請設定文章密碼", "news_passwd", "15", "20"));
$main = $form->render();
?>
