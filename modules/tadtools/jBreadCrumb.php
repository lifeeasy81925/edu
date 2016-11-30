<?php
include_once "tadtools_header.php";
include_once "jquery.php";


class jBreadCrumb{
  var $path;
  var $show_jquery;
  
	//�غc���
	function jBreadCrumb($path=array(),$show_jquery=true){
    $this->path=$path;
    $this->show_jquery=$show_jquery;
	}

  //�]�w���|�u��
  function setPath($path=array()){
    $this->path=$path;
  }

	//���͸��|�u��
	function render(){
    if(is_array($this->path)){
      $opt="";
      foreach($this->path as $title=>$url){
        if(empty($title))continue;
        $opt.="<li><a href='$url'>$title</a></li>\n";
      }
    }
    $jquery=($this->show_jquery)?get_jquery():"";
	
    $main="
    <link rel='stylesheet' href='".TADTOOLS_URL."/jBreadCrumb/Styles/BreadCrumb.css' type='text/css'>
    $jquery
    <script src='".TADTOOLS_URL."/jBreadCrumb/js/jquery.easing.1.3.js' type='text/javascript' language='JavaScript'></script>
    <script src='".TADTOOLS_URL."/jBreadCrumb/js/jquery.jBreadCrumb.1.1.js' type='text/javascript' language='JavaScript'></script>
    <script type='text/javascript'>
     $(document).ready(function()
     {
         $('#breadCrumb').jBreadCrumb();
     })
    </script>
    <div id='breadCrumb' class='breadCrumb module'>
     <ul>
       $opt
     </ul>
    </div>";
    return $main;
  }
}
?>
