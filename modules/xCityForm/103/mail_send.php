<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$account = $_POST["account"]; //學校帳號
	$school_year = $_POST["school_year"]; //學年度
	$user_email= $_POST["user_email"]; //收件人
	$new_end_date = $_POST["new_end_date"]; //新的截止日
	$mail_content = $_POST["mail_content"]; //信件內容
	
	$sql = " update time_limit set end_date='$new_end_date 23:59:59' ".
		   " where account = '$account' and school_year = '$school_year'; ";
	mysql_query($sql);	   
	
	
	//信件主旨
	$subject = "=?UTF-8?B?".base64_encode("教育部教育優先區網站通知信件")."?=";
	
	//信件內容
	$content = $mail_content.chr(13).chr(10).'再次提醒:更新資料截止日期為:'.$new_end_date."請速至該網站更新資料,謝謝您!!";
	
	$strfrom = "教育優先區網站-".$cityname."政府教育局";
	
	$headers = "Content-Type:text/html; charset=utf-8\r\n"; //"=?UTF-8?B?".base64_encode(" 會出現亂碼的文字 ")."?="
	$headers .= "From:"."=?UTF-8?B?".base64_encode($strfrom)."?="."\r\n";
	
	mail($user_email, $subject, $content, $headers);
	
	echo "寄信給".$user_email.",寄信成功!!<br>";
	echo "信件內容如下:<br />";
	echo $content."<br />";
	echo "修正截止日期為：".$new_end_date;
	
	echo "<a href=print_money_reexamined.php>回退件審查頁</a>";

?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 