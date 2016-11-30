<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定
?>

<p>

<a href="/edu/index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b>忘記密碼</b>

<p>
<hr>
<p>

忘記密碼了嗎？需要協助嗎？<p>
讓我們來幫忙您吧！<p>
<p>

<form action="find_password2.php" method="post" name="form1">
	<img src="/edu/images/lock.png" align="absmiddle" />
	請輸入學校代碼：
	<input type="text" name="schoolid" size="10">　<input type="submit" value="　送 出　" name="submit"><p>
<form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
　　<input type="radio" name="radio" value="a" checked>我只是忘記密碼而已。<p>
　　<input type="radio" name="radio" value="b">我們學校換承辦人了。<p>	
*/
?>