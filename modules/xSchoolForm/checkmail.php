<?php
//判斷是否已填mail,姓名

if($email == '' || $email == 'test@localhost.com' || $email == '請輸入E-Mail' || $email == $username || $user_from == '' ){
	echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'您的E-Mail信箱或姓名尚未填寫,系統將自動轉至會員資料區,請先輸入E-Mail或姓名再繼續!'.'"'.')'.'</script>';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=../../user.php>';
}
else{
}
?>