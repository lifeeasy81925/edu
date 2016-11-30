<?php
/*
if(!file_exists(XOOPS_ROOT_PATH."/fancybox.php")){
   redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
include_once XOOPS_ROOT_PATH."/fancybox.php";
$fancybox=new fancybox('.edit_dropdown');
$fancybox_code=$fancybox->render();
$xoopsTpl->assign('fancybox_code',$fancybox_code);
�[�b�s�����Gclass="edit_dropdown" rel="group"�]�ϡ^ data-fancybox-type="iframe"�]HTML�^
*/
include_once "tadtools_header.php";


class fancybox{
  var $name;
  var $width;
  var $height;

  //�غc���
  function fancybox($name="",$width='90%',$height='100%'){
    //$this->name=randStr();
    $this->name=$name;
    $this->width=$width;
    $this->height=$height;
  }

  //���ͻy�k
  function render(){
    $fancybox="";
    if(!defined("_TAD_HAVE_FANCYBOX")){
      $fancybox="
      <script type='text/javascript' src='".TADTOOLS_URL."/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js'></script>
      <script type='text/javascript' language='javascript' src='".TADTOOLS_URL."/fancyBox/source/jquery.fancybox.js?v=2.1.4'></script>
      <link rel='stylesheet' href='".TADTOOLS_URL."/fancyBox/source/jquery.fancybox.css?v=2.1.4' type='text/css' media='screen' />
      <link rel='stylesheet' type='text/css' href='".TADTOOLS_URL."/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5' />
      <script type='text/javascript' src='".TADTOOLS_URL."/fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5'></script>
      <link rel='stylesheet' type='text/css' href='".TADTOOLS_URL."/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7' />
      <script type='text/javascript' src='".TADTOOLS_URL."/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7'></script>
      <script type='text/javascript' src='".TADTOOLS_URL."/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.5'></script>
      ";

      define("_TAD_HAVE_FANCYBOX",true);
    }


    $fancybox.="
    <script type='text/javascript'>
    $(document).ready(function(){
      $('{$this->name}').fancybox({
        fitToView : true,
        width   : '{$this->width}',
        height    : '{$this->height}',
        autoSize  : true,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none',
        afterClose  :function () {
          window.location.reload();
        }
      });
    });
    </script>
    ";
    return $fancybox;
  }
}
?>
