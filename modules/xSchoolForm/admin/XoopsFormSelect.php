<?php
$select = new XoopsFormSelect ("所屬分類", "kind", "最新消息",3);
//加入單一選項
$select->addOption("心得分享", "心得分享");
//加入多個選項
$options["好康報報"]="好康報報";
$options["最新消息"]="最新消息";
$select->addOptionArray($options);

$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$form->addElement($select);
$main = $form->render();
?>
