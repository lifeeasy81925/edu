<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$account      = $_POST["account"];              // 學校帳號
	$school_year  = $_POST["school_year"];          // 學年度
	$user_email   = $_POST["user_email"];           // 收件人
	$new_end_date = $_POST["new_end_date"];         // 新的截止日
	$mail_content = nl2br($_POST["mail_content"]);  // 信件內容  // nl2br：自動換行

	$sql = " update time_limit set end_date='$new_end_date 23:59:59' ".
		   " where account = '$account' and school_year = '$school_year'; ";
	mysql_query($sql);

	//信件主旨
	$subject = "=?UTF-8?B?".base64_encode("教育部推動教育優先區計畫填報網站通知信件")."?=";

	//信件內容
	$content = $mail_content . "<p><b>提醒您，現已開放貴校填報日期至 " . $new_end_date . " 請盡速至教育優先區網站更新資料，感謝您！</b>";

	//寄件者
	$strfrom  = $cityname . "政府教育局/處";
	$headers = "Content-Type:text/html; charset=utf-8\r\n"; //"=?UTF-8?B?".base64_encode(" 會出現亂碼的文字 ")."?="
	$headers .= "From:"."=?UTF-8?B?".base64_encode($strfrom)."?="."\r\n";

	mail($user_email, $subject, $content, $headers);
?>

<p>

<a href="print_money_reexamined.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

查詢被退件學校名單 / <b>個別延長期限</b>

<p>
<hr>
<p>

已修正學校 <?=$account;?> 填報截止日期為：<?=$new_end_date;?><p>
寄信給 <?=$user_email;?> 成功！<p>
信件內容如下：<p>
<hr>
<?=$content;?>
<hr>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>