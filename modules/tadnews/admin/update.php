<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: update.php,v 1.2 2008/06/25 06:35:58 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "admin_header.php";

/*-----------function區--------------*/
function update_form(){

  $main="

	<table id='tbl'>
	<tr><th>"._MA_TADNEW_AUTOUPDATE_VER."</th>
	<th>"._MA_TADNEW_AUTOUPDATE_VER."</th>
	<th>"._MA_TADNEW_AUTOUPDATE_STATUS."</th>
	<th>"._MA_TADNEW_AUTOUPDATE_GO."</th>
	</tr>";

  $dir="../autoupdate";
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				if(is_dir("$dir/$file"))continue;
					include_once "$dir/$file";
					
					$ok_text=($ok)?"OK":"---";
					$go_btn=($ok)?"":"<form action='$dir/$file' method='post'><input type='hidden' name='op' value='GO'><input type='submit' value='"._MA_TADNEW_AUTOUPDATE_GO."'></form>";
					
					$main.="<tr><td>{$ver}</td><td>$title</td>
					<td align='center'>$ok_text</td>
					<td align='center'>$go_btn</td></tr>";
					$ok="";
					
				}
			closedir($dh);
		}
	}
  $main.="</table>";
  
  $main=div_3d(_MA_TADNEW_AUTOUPDATE,$main,"corners");

	return $main;
}

function evn_chk(){
  $main="<ul>";
	if(function_exists('iconv')){
		$aa=iconv("Big5", "UTF-8", "test");
		if(empty($aa)){
		  $main.="<li style='color:#FF3366'>"._MA_TADNEW_ICONV_NOT_WORK."";
		}else{
			$main.="<li style='color:#009900'>"._MA_TADNEW_ICONV_OK."</li>";
		}
	}else{
    $main.="<li><span style='color:#FF3366'>"._MA_TADNEW_ICONV_NOT_OK."</span>";
    $main.=(function_exists('mbstring'))?"<span style='color:#009900'>"._MA_TADNEW_MBSTRING_OK."</span>":"<span style='color:#FF3366'>"._MA_TADNEW_MBSTRING_NOT_OK."</span>";
    $main.="</li>";
	}
  $main.="</ul>";
	
	
  $main=div_3d(_MA_TADNEW_EVN_CHK,$main,"corners");
	return $main;
}

/*-----------執行動作判斷區----------*/
$op = (!isset($_REQUEST['op']))? "main":$_REQUEST['op'];

switch($op){

	
	default:
	$main=update_form();
	$main.=evn_chk();
	break;
}

/*-----------秀出結果區--------------*/
xoops_cp_header();
admin_toolbar(5);
echo "<link rel='stylesheet' type='text/css' media='screen' href='../module.css' />";
echo $main;
xoops_cp_footer();

?>
