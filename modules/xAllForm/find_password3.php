<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "/../function/connect_edu.php";
	include "/../function/config_for_106.php";  // 本年度基本設定

	$id   = $_POST["id"];
	$man  = $_POST["man"];
	$mail = $_POST["mail"];

	$newpass = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

	// 信件

	$subject = "=?UTF-8?B?".base64_encode("教育優先區計畫填報審核網站密碼變更信件")."?=";

	$content = $man . "您好：<p>　　您的帳號：" . $id . "。<p>　　您的新密碼：" . $newpass . "。<p>　　使用新的帳號與密碼初次登入後，請盡速修改，並妥善保管，如有任何疑問，請與我們聯絡，感謝您。<p>教育部國民及學前教育署推動教育優先區計畫<br>承辦單位：國立臺中教育大學<br>網頁維護：資訊助理 江忠霖<br>聯絡電話：04-22183329<br>服務信箱：jiang100@mail.ntcu.edu.tw";

	$strfrom = "教育優先區填報審核網站";

	$headers  = "Content-Type:text/html; charset=utf-8\r\n";
	$headers .= "From:"."=?UTF-8?B?".base64_encode($strfrom)."?="."\r\n";

	mail($mail, $subject, $content, $headers);

	// SQL

	$newpass = md5($newpass);  // MD5加密

	$sql = 	" UPDATE edu_users                   ".
			"    SET edu_users.pass = '$newpass' ".
			"  WHERE uname          = '$id'      ";

    $result = mysql_query($sql) or die('MySQL query error');
?>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /><p>

<a href="/edu/index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

忘記密碼 / 驗證資料 / <b>驗證完成</b>

<p>
<hr>
<p>

您的密碼函信件已成功寄到 <?=$mail;?> 信箱，請到您的信箱收取信件。

<p>
<hr>
<p>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>
