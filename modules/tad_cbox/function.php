<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2008-03-25
// $Id: function.php,v 1.1 2008/04/04 07:10:34 tad Exp $
// ------------------------------------------------------------------------- //

//�ޤJTadTools���禡�w
if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php")){
 redirect_header("index.php",3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";

//�R��tad_cbox�Y����Ƹ��
function delete_tad_cbox($sn=""){
	global $xoopsDB,$xoopsUser,$xoopsModule;
	//�P�_�O�_��ӼҲզ��޲z�v���A  �Y�ť�
  if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
  }else{
    $isAdmin=false;

	}
	if($isAdmin){
		$sql = "delete from ".$xoopsDB->prefix("tad_cbox")." where sn='$sn'";
		$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	}
}



/********************* �w�]��� *********************/
//�ꨤ��r��
function div_3d($title="",$main="",$kind="raised",$style=""){
	$main="<table style='width:auto;{$style}'><tr><td>
	<div class='{$kind}'>
	<h1>$title</h1>
	<b class='b1'></b><b class='b2'></b><b class='b3'></b><b class='b4'></b>
	<div class='boxcontent'>
 	$main
	</div>
	<b class='b4b'></b><b class='b3b'></b><b class='b2b'></b><b class='b1b'></b>
	</div>
	</td></tr></table>";
	return $main;
}

if(!function_exists("is_utf8")){
	//�P�_�r��O�_��utf8
	function  is_utf8($str)  {
	    $i=0;
	    $len  =  strlen($str);

	    for($i=0;$i<$len;$i++)  {
	        $sbit  =  ord(substr($str,$i,1));
	        if($sbit  <  128)  {
	            //���r�`���^��r�šA���P�z�|
	        }elseif($sbit  >  191  &&  $sbit  <  224)  {
	            //�Ĥ@�r�`������192~223��utf8������r(��ܸӤ��嬰��2�Ӧr�`�Ҳզ�utf8����r)�A��U�@�Ӥ���r
	            $i++;
	        }elseif($sbit  >  223  &&  $sbit  <  240)  {
	            //�Ĥ@�r�`������223~239��utf8������r(��ܸӤ��嬰��3�Ӧr�`�Ҳզ���utf8����r)�A��U�@�Ӥ���r
	            $i+=2;
	        }elseif($sbit  >  239  &&  $sbit  <  248)  {
	            //�Ĥ@�r�`������240~247��utf8������r(��ܸӤ��嬰��4�Ӧr�`�Ҳզ���utf8����r)�A��U�@�Ӥ���r
	            $i+=3;
	        }else{
	            //�Ĥ@�r�`���D��utf8������r
	            return  0;
	        }
	    }
	    //�ˬd����Ӧr�곣�S����A�N��o�Ӧr��Outf8����r
	    return  1;
	}
}

?>
