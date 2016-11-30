<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$school_year    = $_POST["school_year"]; // 學年度
	$account_ary    = $_POST["account"];     // 要更新的學校帳號陣列
	$cityname_ary   = $_POST["cityname"];    // 縣市
	$district_ary   = $_POST["district"];    // 鄉鎮市區
	$schoolname_ary = $_POST["schoolname"];  // 校名
	$user_email_ary = $_POST["user_email"];  // 收件人
	$mail_content   = nl2br($_POST["mail_content"]);  // 信件內容  // nl2br：自動換行

	if($school_year != "" && $account_ary != "")
	{
		for($i = 0; $i < count($account_ary); $i++)
		{
			$account    = $account_ary[$i];			
			$cityname   = $cityname_ary[$i];
			$district   = $district_ary[$i];
			$schoolname = $schoolname_ary[$i];
			$user_email = $user_email_ary[$i];
			
			//信件主旨
			$subject = "=?UTF-8?B?".base64_encode("教育部推動教育優先區計畫填報網站通知信件")."?=";

			//信件內容
			$content =  $account . " " . $cityname . $district . $schoolname . " " . $mail_content;

			//寄件者
			$strfrom  = $cityname . "政府教育局/處";
			$headers  = "Content-Type:text/html; charset=utf-8\r\n"; //"=?UTF-8?B?".base64_encode(" 會出現亂碼的文字 ")."?="
			$headers .= "From:"."=?UTF-8?B?".base64_encode($strfrom)."?="."\r\n";

			mail($user_email, $subject, $content, $headers);
		}
	}
?>

<p>

<table>
	<tr>
		<td>
			<font face='標楷體' size='+2'>
				寄信中．．．<p>
				寄信中，請稍候．．．<p>
				<img src='/edu/images/loading02.gif'><p>
			</font>
		</td>
	</tr>
</table>

<script>
	alert("信件寄送成功！");
	document.location.href="print_money_reexamined.php";
</script>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>