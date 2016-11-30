<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$post_date=time();
$form->addElement(new XoopsFormDateTime ("選擇發布時間", "post_date", 15, $post_date, true));
$main = $form->render();
?>
