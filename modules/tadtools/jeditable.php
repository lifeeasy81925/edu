<?php
include_once "tadtools_header.php";
include_once "jquery.php";


class jeditable{
  var $cols;
  var $show_jquery;

	//�غc���
	function jeditable($show_jquery=true){
    $this->show_jquery=$show_jquery;
	}

  //�]�w��r��� $submitdata="{'sn':$the_sn}
  function setTextCol($selector,$file,$width='100%',$height='12px',$submitdata="",$tooltip=""){
    $submitdata_set=(empty($submitdata))?"":"submitdata:$submitdata,";
    $this->cols[]="
    $('$selector').editable('$file', {
      type : 'text',
      indicator : 'Saving...',
      width: '$width',
      height: '$height',
      $submitdata_set
      onblur:'submit',
      event: 'click',
      placeholder : '{$tooltip}'
    });";
  }

  //�]�w�j�q��r��� $submitdata="{'sn':$the_sn}
  function setTextAreaCol($selector,$file,$width='100%',$height='12px',$submitdata="",$tooltip=""){
    $submitdata_set=(empty($submitdata))?"":"submitdata:$submitdata,";
    $this->cols[]="
    $('$selector').editable('$file', {
      type : 'textarea',
      indicator : 'Saving...',
      width: '$width',
      height: '$height',
      $submitdata_set
      onblur:'submit',
      event: 'click',
      placeholder : '{$tooltip}'
    });";
  }

  //�]�w�U����� $submitdata="{'sn':$the_sn},$data="{'�k��':'�k��' , '�k��':'�k��'}";
  function setSelectCol($selector,$file,$data='',$submitdata="",$tooltip=""){
    $submitdata_set=(empty($submitdata))?"":"submitdata:$submitdata,";
    $this->cols[]="
    $('$selector').editable('$file', {
      type : 'select',
      indicator : 'Saving...',
      data   : \"{$data}\",
      $submitdata_set
      onblur:'submit',
      event: 'click',
      placeholder : '{$tooltip}'
    });";
  }


	//���͸��|�u��
	function render(){
    if(is_array($this->cols)){
      $all_col=implode("\n",$this->cols);
    }
    $jquery=($this->show_jquery)?get_jquery():"";

    $main="
    $jquery
    <script src='".TADTOOLS_URL."/jeditable/jquery.jeditable.mini.js' type='text/javascript' language='JavaScript'></script>
    <script type='text/javascript'>
     $(document).ready(function()
     {
       $all_col
     })
    </script>";
    return $main;
  }
}
?>
