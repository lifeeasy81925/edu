<?php
$checkbox = new XoopsFormCheckBox ("新聞屬性", "new_type", "hot");
//加入單一選項
$checkbox->addOption("new", "最新");
//加入多個選項
$options["hot"]="最熱門";
$options["fun"]="最有趣";
$checkbox->addOptionArray($options); 

$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement($checkbox);
$main = $form->render();
?>
