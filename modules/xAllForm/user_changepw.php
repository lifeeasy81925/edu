<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/connect_city.php";
	include "../../function/connect_edu.php";
	include "/../function/config_for_106.php";  // 本年度基本設定

	session_start();
	$id = $xoopsUser->getVar('uname');

	$sql = 	" SELECT edu_users.pass      ".
			"   FROM edu_users           ".
			"  WHERE uname = '$id'       ";

    $result = mysql_query($sql) or die('MySQL query error');

	while($row = mysql_fetch_row($result))
	{
		$pass = $row[0];  // 預設名稱
	}
?>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

<a href="/edu/modules/xAllForm/user_basedata.php">
	<img src="/edu/images/button/b_data.png" align="absbottom" height="35px"
	     onmouseout="this.src='/edu/images/button/b_data.png'"
	     onmouseover="this.src='/edu/images/button/b_data_on.png'">
</a>

<a href="/edu/modules/xAllForm/user_changepw.php">
	<img src="/edu/images/button/b_pass.png" align="absbottom" height="35px"
	     onmouseout="this.src='/edu/images/button/b_pass.png'"
	     onmouseover="this.src='/edu/images/button/b_pass_on.png'">
</a>

<p>
<hr>
<p>

<p>
<b>會員管理 - 修改密碼</b>
<p>

<form action="user_changepw1.php" method="post" name="form">
	請輸入舊密碼：<input type="password" name="oldpass" value="<?=$oldpass;?>"><p>
	請輸入新密碼：<input type="password" name="newpass1" value="<?=$newpass1;?>"><p>
	再次輸入新密碼：<input type="password" name="newpass2" value="<?=$newpass2;?>"><p>
	<input type="hidden" name="pass" value="<?=$pass;?>">
	<input type="submit" value="　修改密碼　" name="submit" onClick="js:update()"><p>	
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>