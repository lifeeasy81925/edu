<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "/../function/connect_edu.php";
	include "/../function/config_for_106.php";  // 本年度基本設定

	$id   = $_POST["schoolid"];

	$sql = 	" SELECT edu_users.uname     ".
			"      , edu_users.name      ".
			"      , edu_users.user_from ".
			"   FROM edu_users           ".
			"  WHERE uname = '$id'       ";

    $result = mysql_query($sql) or die('MySQL query error');

	while($row = mysql_fetch_row($result))
	{
		$name   = $row[1];  // 單位
		$man    = $row[2];  // 承辦人姓名
	}

?>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /><p>

<a href="find_password.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

忘記密碼 / 

<?
	if($id == "" || $name == "")
	{
		echo "<b>查無此帳號</b>";
	}
	else
	{
		echo "<b>驗證資料</b>";
	}
?>

<p>
<hr>
<p>

<div <? if($id == "" || $name == ""){echo "style='display:none;'";} ?>>

	<form action="find_password3.php" method="post" name="form">

		<table border="1">
			<tr height="40px"><td align="center">學校代號</td><td><?=$id;?></td></tr>
			<tr height="40px"><td align="center">學校名稱</td><td><?=$name;?></td></tr>
			<tr height="40px"><td align="center">請輸入(原)承辦人姓名</td><td><input type="text" name="man_check" value="<?=$man_check;?>"></td></tr>
			<tr height="40px"><td align="center">請輸入新密碼寄送E-mail信箱</td><td><input type="text" name="mail" value="<?=$mail;?>"></td></tr>
		</table>
		<p>

		<input type="hidden" value="<?=$id;?>"   name="id">
		<input type="hidden" value="<?=$man;?>"  name="man">
		<input type="submit" value="　寄送新密碼　" name="submit" onClick="return check()"><p>

		<script>
			function check()
			{
				var man_check = document.getElementsByName('man_check')[0].value;
				var mail_new = document.getElementsByName('mail')[0].value;
				
				if("<?=$man;?>" == man_check)
				{
					alert(man_check + "您好，資料驗證成功。");
				}
				else
				{
					alert("對不起，您輸入的承辦人姓名錯誤。如果您是新接承辦人，請輸入原承辦人姓名，以便檢核資料再寄發信密碼。");
					return false;
				}
				
				document.write("<table align='center'>");
				document.write("<tr height='200px'>");
				document.write("<td align='center' valign='bottom'>");
				document.write("<font face='標楷體' size='+5'>");
				document.write("<img src='/edu/images/epa_logo.jpg' height='150px'><p>");
				document.write("驗證資料中，請稍候1分鐘．．．<p>");
				document.write("系統將寄送帳號密碼資料至" + mail_new + "信箱。<p>");
				document.write("<img src='/edu/images/progress.gif' height='150px'><p>");
				document.write("</font>");
				document.write("</td>");
				document.write("</tr>");
				document.write("</table>");
			}
		</script>
	</form>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>