<?php
include_once "tadtools_header.php";

class FooTable{

  //建構函數
  function FooTable(){

  }

  //產生語法
  function render($need_jquery=true){
    $jquery=$need_jquery?get_jquery():"";
    $FooTable="
    <link href='".TADTOOLS_URL."/FooTable/css/footable-0.1.css' rel='stylesheet' type='text/css' />
    $jquery
    <script src='".TADTOOLS_URL."/FooTable/js/footable-0.1.js' type='text/javascript'></script>
    <script type='text/javascript'>
      $(function() {
        $('table').footable();
      });
    </script>
    ";
    return $FooTable;
  }
}

/*
if(file_exists(XOOPS_ROOT_PATH."/modules/tadtools/FooTable.php")){
  include_once XOOPS_ROOT_PATH."/modules/tadtools/FooTable.php";

  $FooTable = new FooTable();
  $FooTableJS=$FooTable->render();
}
把 $FooTableJS 加到表格前
table 需加上 class='footable' 以及 <thead></thead>
要加入擴展符號的格子在  th 加上  data-class='expand'
要藏起來的格子在  th 加上  data-hide='phone,tablet' 或 data-hide='phone'
*/
?>
