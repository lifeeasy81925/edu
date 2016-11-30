<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: archive.php,v 1.1 2008/04/10 05:31:02 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "header.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/up_file.php";
include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";
$xoopsOption['template_main'] = "archive_tpl.html";

/*-----------function區--------------*/

//嵌入語法表單
function embed_form(){
	global $xoopsDB;
	
	$defOptions=array(1=>'start_day' , 'news_title' ,'uid', 'ncsn' , 'counter');
	$ShowColArr=array("start_day"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_1,"news_title"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_2,"uid"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_3,"ncsn"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_4,"counter"=>_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_5);


  $show_col="";

  for($i=1;$i<=5;$i++){
    $allOption="<option value='hide'>"._MB_TADNEW_TADNEWS_HIDE."</option>\n";
    foreach($ShowColArr as $col_name=>$col_title){
      if(empty($options[$i])){
        $options[$i]=$defOptions[$i];
      }

      $selected=($options[$i]==$col_name)?"selected":"";

      $allOption.="<option value='$col_name' $selected>$col_title</option>\n";
    }
    $show_col.="
  	<select id='options{$i}' class='span2 cols'>
  	$allOption
  	</select>";
  }


  $option=block_news_cate();
  $jquery_path=get_jquery();
  $main="
  $jquery_path
  <script type='text/javascript'>
  $(document).ready(function(){
    $('#show_num').change(function(){
      $('.num').html($('#show_num').val());
    });

    $('#set_width').change(function(){
      $('.width').html($('#set_width').val());
    });
    
    $('.cols').change(function(){
       var b = [];
      $('.cols').each(function(){
         b.push($(this).val());
      });
      $('.allcols').text(b.join(','));
    });
    
    $('.bbv').change(function(){
       var a = [];
      $('.bbv:checked').each(function(){
         a.push($(this).val());
      });
      $('.ncsn').text(a.join(','));
    });
  });

  </script>
	<form>
  	<table>
  	<tr><th>
  	"._MB_TADNEWS_TABLE_CONTENT_WIDTH."
  	</th><td>
  	<INPUT type='text' id='set_width' value='100%' class='span2'> ex. <span style='color:#6633FF;'>100%</span> or <span style='color:#6633FF;'>640px</span>
    </td></tr>
  	<tr><th>
  	"._MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM0."
  	</th><td>
  	<INPUT type='text' id='show_num' value='10' class='span1'>
    </td></tr>

  	<tr><th>"._MB_TADNEWS_TABLE_CONTENT_BLOCK_COL_SET."</th><td>
    $show_col
    </td></tr>

  	<tr><th>"._MB_TADNEWS_CATE_NEWS_EDIT_BITEM0."</th><td>{$option['form']}
  	</td></tr>
  	</table>
	</form>";

  $result="<div style='line-height:180%;'>&lt;link rel=\"stylesheet\" type=\"text/css\" href=\"".XOOPS_URL."/xoops.css\" /&gt;<br>
&lt;link rel=\"stylesheet\" type=\"text/css\" href=\"http://www.tad0616.net/modules/tadtools/bootstrap/css/bootstrap.min.css\" /&gt;<br>
&lt;script type=\"text/javascript\" src=\"".XOOPS_URL."/modules/tadtools/jquery/jquery.js\"&gt;&lt;/script&gt;<br>
&lt;div id=\"tadnews\" style=\"width:<span class='width' style='color:#6633FF;'>100%</span>;\"&gt;&lt;/div&gt;<br>
&lt;script language=\"javascript\" src=\"".XOOPS_URL."/modules/tadnews/ajax.php?op=js&num=<span class='num' style='color:red;'>10</span>&show_col=<span class='allcols' style='color:blue;'>start_day,news_title,uid,ncsn,counter</span>&show_ncsn=<span class='ncsn' style='color:green;'>all</span>\" defer=\"defer\"&gt;&lt;/script&gt;</div>";

	$result=div_3d("",$result,"corners","width:100%");

	return $main.$result;
}



/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){


	default:
	$main=embed_form();
	break;
}


/*-----------秀出結果區--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='module.css' />") ;
$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
