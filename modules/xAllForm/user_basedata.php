<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/connect_city.php";
	include "../../function/connect_edu.php";
	include "/../function/config_for_106.php";  // 本年度基本設定

	session_start();
	$id = $xoopsUser->getVar('uname');

	$sql = 	" SELECT edu_users.name      ".
			"      , edu_users.user_msnm ".
			"      , edu_users.user_from ".
			"      , edu_users.user_occ  ".
			"      , edu_users.email     ".
			"      , edu_users.user_icq  ".
			"      , edu_users.user_aim  ".
			"      , edu_users.user_yim  ".
			"      , edu_users.bio       ".
			"   FROM edu_users           ".
			"  WHERE uname = '$id'       ";

    $result = mysql_query($sql) or die('MySQL query error');

	while($row = mysql_fetch_row($result))
	{
		$name     = $row[0];  // 預設名稱
		$org      = $row[1];  // 學校/機關
		$worker   = $row[2];  // 使用者/承辦人
		$position = $row[3];  // 單位及職稱
		$email    = $row[4];  // email
		$tel      = $row[5];  // 電話
		$fax      = $row[6];  // 傳真備用
		$mobile   = $row[7];  // 手機
		$remarks  = $row[8];  // 備註
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
<b>會員管理 - 會員資料</b>
<p>

<form action="user_basedata1.php" method="post" name="form">
	<table border="3">
		<tr height="40px"><td align="center">帳號</td><td><?=$id;?></td></tr>
		<tr height="40px"><td align="center">預設名稱</td><td><?=$name;?></td></tr>
		<tr height="40px"><td align="center">學校/機關</td><td><input     type="text" name="org"      value="<?=$org;?>"></td></tr>
		<tr height="40px"><td align="center">承辦人/使用者</td><td><input type="text" name="worker"   value="<?=$worker;?>"></td></tr>
		<tr height="40px"><td align="center">單位及職稱</td><td><input    type="text" name="position" value="<?=$position;?>"><font size="-1">（例：總務處-總務主任）</font></td></tr>
		<tr height="40px"><td align="center">電子信箱</td><td><input      type="text" name="email"    value="<?=$email;?>"></td></tr>
		<tr height="40px"><td align="center">聯絡電話</td><td><input      type="text" name="tel"      value="<?=$tel;?>"></td></tr>
		<tr height="40px"><td align="center">傳真/備用</td><td><input     type="text" name="fax"      value="<?=$fax;?>"></td></tr>
		<tr height="40px"><td align="center">行動電話</td><td><input      type="text" name="mobile"   value="<?=$mobile;?>"></td></tr>
		<tr height="40px"><td align="center">備註</td><td><textarea name="remarks" cols="30" rows="2" ><?=$remarks;?></textarea></td></tr>
	</table>
	<p>
	<input type="submit" value="　送 出　" name="submit" onClick="js:update()"><p>

	<script>
		function update()
		{
			<?/*
				$sql2 = " UPDATE edu_users                        ".
						"    SET edu_users.user_msnm = '$org      ".
						"      , edu_users.user_from = '$worker   ".
						"      , edu_users.user_occ  = '$position ".
						"      , edu_users.email     = '$email    ".
						"      , edu_users.user_icq  = '$tel      ".
						"      , edu_users.user_aim  = '$fax      ".
						"      , edu_users.user_yim  = '$mobile   ".
						"      , edu_users.bio       = '$remarks  ".
						"  WHERE uname               = '$id'      ";
				$result2 = mysql_query($sql2) or die('MySQL query error');*/
			?>
			//alert("OK");
		}
	</script>
	
</form>



<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>