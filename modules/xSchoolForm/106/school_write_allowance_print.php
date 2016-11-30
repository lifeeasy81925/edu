<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/config_for_106.php";  // 本年度基本設定
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="school_write_allowance.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

申請補助經費 / 填寫經費 / <b>列印表單</b>

<p>
<hr>
<p>

請列印以下兩張表單，經校長核章後，再掃描上傳。<p>

<img src="/edu/images/print.png" align="absmiddle"><a href="print_point_page_new.php?page_from=1" target="_new"> <b><?=$school_year;?>年度指標界定調查表</b></a><p>
<img src="/edu/images/print.png" align="absmiddle"><a href="print_allowance_page.php" target="_new"> <b><?=$school_year;?>年度經費需求彙整表</b></a><p>

<p>

<input type="button" name="Submit" value=" 下一步，前往「步驟3、上傳檢附資料」 " onclick="location.href='school_upload_file.php'" style='height:30px;'>　

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
// include "../../function/button_print.php";  // 列印本頁
<!-- <input type="button" name="Submit" value="前往上傳檔案專區" onclick="location.href='school_upload_file.php'"> -->
<input type="button" name="Submit" value="回首頁" onclick="location.href='../school_index.php'"><p>
*/
?>