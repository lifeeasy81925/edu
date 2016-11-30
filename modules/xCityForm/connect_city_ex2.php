<?php
session_start(); 
$username = $xoopsUser->getVar('uname');
$email = $xoopsUser->getVar('email');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
/*
while($row = mysql_fetch_row($result_city)) {
	$cityname = $row[1];//縣市名
	$cityman = $row[2];//承辦人姓名
	$examine = $row[3];//區別教育部2,縣市1
	$cityno = $row[4];//縣市代碼,>1有管理權限
}
*/
?>