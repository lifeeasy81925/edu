<?php
	//判斷是否已填mail,姓名
	if($email == '' || $email == 'test@localhost.com' || $email == '請輸入E-Mail' || $email == $username || $user_from == '' )
	{
		echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'您的E-Mail信箱或會員資料未填寫完整，系統將自動轉至會員資料區，請先填寫E-Mail或會員資料。'.'"'.')'.'</script>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=/edu/modules/xAllForm/user_basedata.php>';
	}
	
?>