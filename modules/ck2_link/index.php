<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2009-07-11
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include "header.php";
$xoopsOption['template_main'] = "index_tpl.html";

/*-----------function區--------------*/

//列出所有ck2_link資料
function list_ck2_link($show_function=1){
	global $xoopsDB,$xoopsModule,$xoopsModuleConfig;
	
	$MDIR=$xoopsModule->getVar('dirname');
	//今天日期
	$today=date("Y-m-d");
	$sql = "select * from ".$xoopsDB->prefix("ck2_link")."
					where enable='1' and
								(unable_date='0000-00-00' or unable_date >='$today')
					order by link_sort
					";

	
	//getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
  $PageBar=getPageBar($sql,$xoopsModuleConfig['show_num'],10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];
  $total=$PageBar['total'];

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());


	//刪除確認的JS
	$data="";

	while($all=$xoopsDB->fetchArray($result)){
	  //以下會產生這些變數： $link_sn , $cate_sn , $link_title , $link_url , $link_desc , $link_sort , $link_counter , $unable_date , $uid , $post_date , $enable
    foreach($all as $k=>$v){
      $$k=$v;
    }


		$data.="
		<div style='float:left;text-align:center;margin:2px;width:200px;height:230px;'>
			<a href='view.php?link_sn={$link_sn}'>
		  	<img src='http://capture.heartrails.com/200x200/cool?{$link_url}'>
			</a><br>
			<a href='{$link_url}' target='_blank'>{$link_title}</a>
		</div>";
	}

	$data.="
	<p style='clear:both;text-align:center;margin:10px;background-color:#F0F0F0'>{$bar}</p>";

	//raised,corners,inset
	$main=div_3d("",$data,"corners");

	return $main;
}



/*-----------執行動作判斷區----------*/
$main=list_ck2_link(0);

/*-----------秀出結果區--------------*/
include XOOPS_ROOT_PATH."/header.php";
$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/ck2_link/module.css' />") ;
$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/footer.php';

?>
