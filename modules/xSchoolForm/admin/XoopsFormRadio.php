<?php
$radio=new XoopsFormRadio ("編輯狀態", "status", "wait", '&nbsp;&nbsp;');
//加入單一選項
$radio->addOption("writing", "草稿");
//加入多個選項
$options["wait"]="待審核";
$options["ok"]="公開";
$radio->addOptionArray($options);

$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement($radio);
$main = $form->render();
?>
