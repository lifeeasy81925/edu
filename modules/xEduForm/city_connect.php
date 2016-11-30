<?php session_start();
    $username = $_SESSION['username'];
    $school = $_SESSION['school'];
	$class = $_SESSION['class'];
?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "school";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "ntcuedu";

//對資料庫連線
if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");

//資料庫連線採UTF8
mysql_query("SET NAMES utf8");

//選擇資料庫
if(!@mysql_select_db($db_name))
        die("無法使用資料庫");
?> 
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
$id = $_POST['id'];
$pw = $_POST['pw'];
//echo $id;


//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $id == 'city' && $pw == 'city')
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $id;
        echo '登入成功!';
			echo '<meta http-equiv=REFRESH CONTENT=1;url=city_index.php>';

}
else
{
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=city_login.php>';
}
?>

