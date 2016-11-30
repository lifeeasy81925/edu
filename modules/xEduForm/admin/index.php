<?php
include "../../../include/cp_header.php";
include "form_arr.php";

$demo="
<script type='text/javascript' src='../class/syntaxhighlighter/scripts/shCore.js'></script>
<script type='text/javascript' src='../class/syntaxhighlighter/scripts/shBrushPhp.js'></script>
<link type='text/css' rel='stylesheet' href='../class/syntaxhighlighter/styles/shCore.css'/>
<link type='text/css' rel='stylesheet' href='../class/syntaxhighlighter/styles/shThemeDefault.css'/>
<script type='text/javascript'>
	SyntaxHighlighter.config.clipboardSwf = '../class/syntaxhighlighter/scripts/clipboard.swf';
	SyntaxHighlighter.all();
</script>
<table><tr><td valign='top' style='width:260px;'><ol>";
foreach($form_arr as $i=>$form_name){
    $css=($form_name==$_GET['form'])?"style='background-color:#FFFF66'":"";
    $demo.="<li $css><a href='index.php?form={$form_name}'>{$form_name} 範例</a></li>";
}

$demo.="</ol>";

if(!empty($_GET['form'])){

    include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
    include "{$_GET['form']}.php";
    $file_content = file_get_contents("{$_GET['form']}.php", true);
    $file_content = str_replace("<?php","<?php\ninclude \"../../../include/cp_header.php\";\ninclude_once(XOOPS_ROOT_PATH.\"/class/xoopsformloader.php\");\n",$file_content);
    $file_content = str_replace("?>","\nxoops_cp_header();\necho \$main;\nxoops_cp_footer();\n?>",$file_content);

    $code=htmlspecialchars($file_content);
    $demo.="</td><td valign='top'>$main<p><pre class='brush:php;'>$code</pre></p>";
}

$demo.="</td></tr></table>";


xoops_cp_header();
echo $demo;
xoops_cp_footer();
?>
