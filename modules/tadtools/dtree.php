<?php
/*
$home['sn']=$home_sn;
$home['title']=$home_title;
$home['url']=$home_url;

$title_arr[$sn]=$title;
$cate_arr[$sn]=$of_sn;
$url_arr[$sn]=$url;
*/
include_once "tadtools_header.php";


class dtree{
  var $name;
  var $title_arr;
  var $cate_arr;
  var $url_arr;
  var $home;

  //�غc���
  function dTree($name="",$home="",$title_arr="",$cate_arr="",$url_arr=""){
    $this->name=$name;
    $this->title_opt=$title_arr;
    $this->cate_opt=$cate_arr;
    $this->url_opt=$url_arr;
    $this->home=$home;
  }

  //���Ϳ��
  function render($fontsize="12px"){
    if(empty($this->home)){
      $opt="{$this->name}.add(0,-1,'','javascript: void(0);');\n";
    }else{
      $opt="{$this->name}.add({$this->home['sn']},-1,'{$this->home['title']}','{$this->home['url']}');\n";
    }

    foreach($this->title_opt as $ncsn => $title){
      $opt.="{$this->name}.add($ncsn , {$this->cate_opt[$ncsn]} , '{$title}' , '{$this->url_opt[$ncsn]}');\n";
    }

    $dtree="";
    if(!defined("_TAD_HAVE_DTREE")){
      $dtree="<link rel='StyleSheet' href='".TADTOOLS_URL."/dtree/dtree.css' type='text/css' />
      <script type='text/javascript' src='".TADTOOLS_URL."/dtree/dtree.php'></script>";

      define("_TAD_HAVE_DTREE",true);
    }
    $dtree.="
    <style>
      .dtree {
        font-size: {$fontsize};
      }
    </style>

    <div id='tree_{$this->name}'></div>
    <script type='text/javascript' defer='defer'>
      {$this->name} = new dTree('{$this->name}');
      {$this->name}.config.useCookies=true;
      {$opt}
      document.getElementById('tree_{$this->name}').innerHTML={$this->name};
    </script>

    <a href='javascript: {$this->name}.openAll();' style='font-size:11px;'>"._TAD_EXPAND_ALL."</a> | <a href='javascript: {$this->name}.closeAll();' style='font-size:11px;'>"._TAD_CONTACT_ALL."</a>
    ";
    return $dtree;
  }
}
?>
