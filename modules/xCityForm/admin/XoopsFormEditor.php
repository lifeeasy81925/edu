<?php
$form = new XoopsThemeForm("編輯新聞","form", $_SERVER['PHP_SELF']);
$content="請輸入內容";
$configs = array(
    'editor'=> 'ckeditor',
    'value' => $content,
    'width' => '550px',
    'height' => '300px'
    );
$form->addElement(new XoopsFormEditor ("編輯內容", "news_content", $configs));
$main = $form->render();
?>
