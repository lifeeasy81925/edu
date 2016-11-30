<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: tadnews_content_block.php,v 1.4 2008/06/25 06:36:39 tad Exp $
// ------------------------------------------------------------------------- //
include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";

//區塊主函式 (顯示新聞內容)
function tadnews_table_content_block_show($options){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption;

	//引入TadTools的jquery
  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/jquery.php")){
   redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
  }
  include_once XOOPS_ROOT_PATH."/modules/tadtools/jquery.php";
  $jquery_path=get_jquery();
  
	$block="
  $jquery_path
  <script type='text/javascript'>
  $(document).ready(function(){
    var p=0;
    $.post('".XOOPS_URL."/modules/tadnews/ajax.php', { num: '{$options[0]}', p: p , show_button:'{$options[1]}',  'cell[]': ['{$options[2]}', '{$options[3]}', '{$options[4]}', '{$options[5]}', '{$options[6]}'],start_from:'{$options[7]}',show_ncsn: '{$options[8]}'},
    function(data) {
    $('#msg_results').html(data);
    });
  });

  function view_content(p){
    $.post('".XOOPS_URL."/modules/tadnews/ajax.php', { num: '{$options[0]}', p: p , show_button:'{$options[1]}',  'cell[]': ['{$options[2]}', '{$options[3]}', '{$options[4]}', '{$options[5]}', '{$options[6]}'],start_from:'{$options[7]}',show_ncsn: '{$options[8]}'},
    function(data) {
    $('#msg_results').html(data);
    });
	}
		
  </script>
  <div>
    <div id='msg_results'></div>
  </div>
  ";


	return $block;
}

//區塊編輯函式
function tadnews_table_content_block_edit($options){
	$chked1_0=($options[1]=="1")?"checked":"";
	$chked1_1=($options[1]=="0")?"checked":"";
	
	$defOptions=array(2=>'start_day' , 'news_title' ,'uid', 'ncsn' , 'counter');
	$ShowColArr=array("start_day"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_1,"news_title"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_2,"uid"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_3,"ncsn"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_4,"counter"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_5);
  $SetColTitle=array(2=>_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM2 , _MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM3 , _MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM4 , _MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM5, _MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM6);

  $show_col="";
	
  for($i=2;$i<=6;$i++){
    $allOption="<option value='hide'>"._MB_TADNEW_TADNEWS_HIDE."</option>\n";
    foreach($ShowColArr as $col_name=>$col_title){
      if(empty($options[$i])){
        $options[$i]=$defOptions[$i];
      }

      $selected=($options[$i]==$col_name)?"selected":"";

      $allOption.="<option value='$col_name' $selected>$col_title</option>\n";
    }
    $show_col.="
    <tr><th style='width:100px;'>
  	{$SetColTitle[$i]}
  	</th><td>
  	<select name='options[{$i}]'>
  	$allOption
  	</select>
    </td></tr>";
  }


  $option=block_news_cate($options[8]);

	$form="{$option['js']}
	<table>
	<tr><th>
	"._MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM0."
	</th><td>
	<INPUT type='text' name='options[0]' value='{$options[0]}'>
  </td></tr>
	<tr><th>
	"._MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM1."
	</th><td>
	<INPUT type='radio' $chked1_0 name='options[1]' value='1'>"._YES."
	<INPUT type='radio' $chked1_1 name='options[1]' value='0'>"._NO."
  </td></tr>
  $show_col
	<tr><th>
	"._MB_TADNEW_TADNEWS_START_FROM."
	</th><td>
	<INPUT type='text' name='options[7]' value='{$options[7]}' size=6>
  </td></tr>
	<tr><th>"._MB_TADNEWS_CATE_NEWS_EDIT_BITEM0."</th><td>{$option['form']}
	<INPUT type='hidden' name='options[8]' id='bb' value='{$options[8]}'></td></tr>
	</table>
	";
	return $form;
}
?>
