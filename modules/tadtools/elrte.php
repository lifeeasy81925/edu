<?php
include_once "tadtools_header.php";

class elrte{
	var $xoopsDirName;
	var $ColName;
	var $CustomConfigurationsPath;
	var $ToolbarSet="my";
	var $Width='100%';
	var $Height=300;
	var $Value;

	//建構函數
	function elrte($xoopsDirName="",$ColName="",$Value=""){
		$this->xoopsDirName=$xoopsDirName;
		$this->ColName=$ColName;
		$this->Value=$Value;
	}
	
	//設定自定義設定檔
	function setCustomConfigurationsPath($path=""){
		$this->CustomConfigurationsPath=$path;
	}
	
	//設定自定義工具列
	function setToolbarSet($ToolbarSet=""){
		$this->ToolbarSet=$ToolbarSet;
	}
	
	//設定自定義設寬度
	function setWidth($Width=""){
		$this->Width=$Width;
	}
	
	//設定自定義設高度
	function setHeight($Height=""){
		$this->Height=$Height;
	}
	

  
	//產生編輯器
	function render(){
    $_SESSION['xoops_mod_name']=$this->xoopsDirName;

    $content = str_replace('&', '&amp;', $this->Value);
    $content=str_replace('[','&#91;',$content);
    
    $jquery=get_jquery(true);

    $LANGCODE=str_replace("-","_",_LANGCODE);


  	$editor="
    $jquery
    <link rel='stylesheet' href='".XOOPS_URL."/modules/tadtools/css/normalize.css' type='text/css' media='screen' charset='utf-8'>
    <link rel='stylesheet' href='".XOOPS_URL."/modules/tadtools/elrte/css/elrte.min.css' type='text/css' media='screen' charset='utf-8'>
    <script src='".XOOPS_URL."/modules/tadtools/elrte/js/elrte.full.js' type='text/javascript' charset='utf-8'></script>
    <script src='".XOOPS_URL."/modules/tadtools/elrte/js/i18n/elrte.".$LANGCODE.".js' type='text/javascript' charset='utf-8'></script>
    <!-- elFinder CSS (REQUIRED) -->
    <link rel='stylesheet' type='text/css' href='".XOOPS_URL."/modules/tadtools/elFinder/css/elfinder.min.css'>
    <link rel='stylesheet' type='text/css' href='".XOOPS_URL."/modules/tadtools/elFinder/css/theme.css'>
  	<!-- elFinder JS (REQUIRED) -->
    <script src='".XOOPS_URL."/modules/tadtools/elFinder/js/elfinder.min.js'></script>
    <!-- elFinder translation (OPTIONAL) -->
    <script src='".XOOPS_URL."/modules/tadtools/elFinder/js/i18n/elfinder.".$LANGCODE.".js'></script>


    <script type='text/javascript' charset='utf-8'>
        $().ready(function() {
          elRTE.prototype.options.panels.web2pyPanel = ['cut','copy','paste','pastetext','pasteformattext','undo','redo','image','flash','horizontalrule','smiley','link','unlink','insertorderedlist','insertunorderedlist','pagebreak','removeformat'];
          elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel','tables','format','colors','style','alignment','indent'];
 
 
          $('#editor_{$this->ColName}').elrte({
            lang         : '".$LANGCODE."',   // set your language
            styleWithCSS : false,
            height       : {$this->Height},
            toolbar      : 'web2pyToolbar',
            fmOpen : function(callback) {
              $('<div/>').dialogelfinder({
                url : '".XOOPS_URL."/modules/tadtools/elFinder/php/connector.php', // connector URL (REQUIRED)
                lang: '".$LANGCODE."', // elFinder language (OPTIONAL)
                commandsOptions: {
                  getfile : {
                      onlyURL  : true,
                      oncomplete : 'close'
                  }
                },
                getFileCallback: callback
              });
            }
          });
        });
    </script>

    <textarea id='editor_{$this->ColName}' name='{$this->ColName}'>{$content}</textarea>";
    return $editor;
  }

}
?>
