<?php
include_once "tadtools_header.php";

class My97DatePicker{

	//�غc���
	function My97DatePicker(){
	
	}

	//���ͤ��
	function render(){
		$cal="<script type='text/javascript' src='".TADTOOLS_URL."/My97DatePicker/WdatePicker.php'></script>";
    return $cal;
  }
}
?>
