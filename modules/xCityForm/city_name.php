<?php session_start(); 
    $username = $_SESSION['loginname'];
    $school = $_SESSION['school'];
	$class = $_SESSION['class'];
?>
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

<? 
	$sql = "SELECT * FROM 100element_basedata";
    $result = mysql_query($sql);

        
?>
<table width="500" border="1">
    <td>縣市代碼</td>
    <td>縣市名稱</td>
    <td>預算總合</td>
<?
 while($row = mysql_fetch_row($result))
        {
	echo "<tr>";
		echo "<td>";
			echo "07";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "<a href="."http://www.yahoo.com.tw"." target="."_blank".">"."彰化縣";//學校名稱
		echo "</td>";
		echo "<td>";
			echo "NT$"."$row[3]";//預算總合	
		echo "</td>";

		echo "<td>";
		echo "</td>";	
  echo "</tr>";
  }
?> 
</table>