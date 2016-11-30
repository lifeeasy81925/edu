<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2008-03-25
// $Id: tad_cbox_block.php,v 1.1 2008/05/14 01:25:35 tad Exp $
// ------------------------------------------------------------------------- //

//區塊主函式 (會產生一個即時留言簿區塊)
function tad_cbox_b_show_1($options){
	global $xoopsUser;
	
  //引入TadTools的jquery
  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/jquery.php")){
  redirect_header("index.php",3, _TAD_NEED_TADTOOLS);
  }
  include_once XOOPS_ROOT_PATH."/modules/tadtools/jquery.php";
  $jquery_path = get_jquery();

	$_SESSION['cbox_show_num']=$options[0];
	$_SESSION['talk_width']=$options[1];
	$_SESSION['cbox_root_msg_color']=$options[4];
	
	$modhandler = &xoops_gethandler('module');
  $xoopsModule = &$modhandler->getByDirname("tad_cbox");
  $config_handler =& xoops_gethandler('config');
  $xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
  

  $post_height=$options[3];

	
	//檢查是否在「不需檢查的群組中」
  if($xoopsUser){
    $no_chk=false;
    $group=$xoopsUser->getGroups();
    foreach($group as $g){
      if(in_array($g,$xoopsModuleConfig['no_need_chk'])){
        $no_chk=true;
			}
		}
	}else{
    $no_chk=in_array(3,$xoopsModuleConfig['no_need_chk']);
	}
	
	
  if($xoopsModuleConfig['security_images']=='1' and !$no_chk){
    $post_height+=30;
	}

  $css=str_replace("{X_SITEURL}",XOOPS_URL,$options[7]);
	$css=str_replace("%7BX_SITEURL%7D",XOOPS_URL,$css);
  
  
  if(!empty($options[5])){
    $str=explode("\n",$options[5]);
    $headline="";
    foreach($str as $show_str){
			if(empty($show_str))continue;
			$headline.="<div class='headline'>{$show_str}</div>";
		}
		
    $txt="
		<style>
			#tad_cbox_scrollup {
			position: relative;
			overflow: hidden;
			height: {$options[6]}px;
			width: {$options[1]}px;
			{$css}
		}
		.headline {
			position: absolute;
			top: 210px;
			left: 5px;
			height: 195px;
			width:190px;
		}
		</style>
		$jquery_path
		<script>
		 var headline_count;
		 var headline_interval;
		 var old_headline = 0;
		 var current_headline = 0;

		 \$(document).ready(function(){
		   headline_count = \$(\"div.headline\").size();
		   \$(\"div.headline:eq(\"+current_headline+\")\").css('top','5px');

		   headline_interval = setInterval(headline_rotate,5000); //time in milliseconds
		   \$('#tad_cbox_scrollup').hover(function() {
		     clearInterval(headline_interval);
		   }, function() {
		     headline_interval = setInterval(headline_rotate,5000); //time in milliseconds
		     headline_rotate();
		   });
		 });

		 function headline_rotate() {
		   current_headline = (old_headline + 1) % headline_count;
		   \$(\"div.headline:eq(\" + old_headline + \")\").animate({top: -205},\"slow\", function() {
		     \$(this).css('top','210px');
		   });
		   \$(\"div.headline:eq(\" + current_headline + \")\").show().animate({top: 5},\"slow\");
		   old_headline = current_headline;
		 }
		</script>
		<div id='tad_cbox_scrollup'>
		  <div style='margin:0px 10px;'>
			$headline
			</div>
		</div>";
	}else{
		$txt="";
	}
    
	$block="
	$txt
	<div align='center' id='cboxdiv'>
<iframe frameborder='0' width='{$options[1]}' height='{$options[2]}' src='".XOOPS_URL."/modules/tad_cbox/index.php?mode=box&twh={$options[1]}' marginheight='2' marginwidth='2' scrolling='auto' allowtransparency='yes' name='cboxmain' style='border:#ababab 1px solid;' id='cboxmain'></iframe><br/>
<iframe frameborder='0' width='{$options[1]}' height='{$post_height}' src='".XOOPS_URL."/modules/tad_cbox/post.php' marginheight='2' marginwidth='2' scrolling='no' allowtransparency='yes' name='cboxform' style='border:#ababab 1px solid;border-top:0px' id='cboxform'></iframe>
<p style='text-align:right;'><a href='".XOOPS_URL."/modules/tad_cbox/index.php'>"._MB_TADCBOX_TAD_CBOX_VIEW_ALL."</a></div>
</p>";
	return $block;
}

//區塊編輯函式
function tad_cbox_b_edit($options){

	$opt1=($options[4]=="one")?"checked":"";
	$opt2=($options[4]=="two")?"checked":"";
	$opt3=($options[4]=="three")?"checked":"";
	$opt4=($options[4]=="four")?"checked":"";

/*
	if(empty($options[7])){
		$options[7]="background-image:url({X_SITEURL}/modules/tad_cbox/images/bg.gif);
background-repeat: no-repeat;
color:white;";
	}
	*/
	
	$form="
	<table style='width:auto;'>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM0."</th><td><INPUT type='text' name='options[0]' value='{$options[0]}' size=5></td></tr>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM1."</th><td><INPUT type='text' name='options[1]' value='{$options[1]}' size=5></td></tr>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM2."</th><td><INPUT type='text' name='options[2]' value='{$options[2]}' size=5></td></tr>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM3."</th><td><INPUT type='text' name='options[3]' value='{$options[3]}' size=5></td></tr>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM4."</th><td>
	<INPUT type='radio' name='options[4]' value='one' $opt1>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM4_OPT1."
	<INPUT type='radio' name='options[4]' value='two' $opt2>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM4_OPT2."
	<INPUT type='radio' name='options[4]' value='three' $opt3>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM4_OPT3."
	<INPUT type='radio' name='options[4]' value='four' $opt4>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM4_OPT4."</td></tr>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM5."</th><td><textarea name='options[5]' cols=40 rows=4>{$options[5]}</textarea><br>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM5_txt."</td></tr>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM6."</th><td><INPUT type='text' name='options[6]' value='{$options[6]}' size=5></td></tr>
	<tr><th>"._MB_TADCBOX_TAD_CBOX_B_EDIT_BITEM7."</th><td><textarea name='options[7]'cols=40 rows=2>{$options[7]}</textarea><br>ex:<br>background-image:url({X_SITEURL}/modules/tad_cbox/images/bg.gif);<br>
background-repeat: no-repeat;<br>
color:white;<br>
padding:10px;</td></tr>
	</table>
	";
	return $form;
}



?>
