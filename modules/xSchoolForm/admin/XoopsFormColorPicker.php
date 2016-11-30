<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$color="#FF0000";
$form->addElement(new XoopsFormColorPicker ("選擇標題顏色", "color", $color));
$main = $form->render();
?>
