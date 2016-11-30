<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB -> prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	list($cityid, $city ) = $xoopsDB -> fetchRow($result);
?>

<a href="city_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/telphone.png" align="absmiddle" /> <b>各校業務承辦人聯絡資料</b>

<p>
<hr>
<p>

<form action="print_schoolman_finish.php" method="post" name="form">
	<font color="blue"><?=$city;?></font> 各校業務承辦人聯絡資料<p>
		<input type="radio" name="class" value="1">僅查詢國小<p>
		<input type="radio" name="class" value="2">僅查詢國中<p>
		<input type="radio" name="class" value="3" checked>全部查詢<p>
	<input type="submit" value="　送 出　" name="submit">
</form>
<? include "../../footer.php"; ?>

<? // <input type="reset" value="清除" name="reset"> ?>