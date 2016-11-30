<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$country="TW";
$form->addElement(new XoopsFormSelectCountry ("請選擇國家", "country", $country,3));
$main = $form->render();
?>
