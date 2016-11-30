<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
include "../xSchoolForm/button_print02.php";
?>
<input type="button" value="關閉本頁" onClick="window.close()">
<?
$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_city = $xoopsDB -> query($sql) or die($sql);
	while($row = mysql_fetch_row($result_city)) {
		$city = $row[1]; //縣市名稱
		$cityman = $row[2]; //身分名稱
		$examine = $row[3]; //1:縣市帳號, 2:教育部帳號
		$cityno = $row[4]; //縣市編號
	}
	echo $username;
	echo $city;
	echo $cityman;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<p>
<div id="print_content">
<? echo $city; ?>學校指標資料異常檢核原因與學校說明列表
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td align="left">序號</td>
		<td align="left">學校代碼</td>
		<td align="left">學校名稱</td>
		<td align="left" bgcolor="#FFCCCC">第1頁(學校資料)警示原因</td>
		<td align="left" bgcolor="#FFCCCC">第1頁(學校資料)學校說明</td>
		<td align="left" bgcolor="#99FFCC">第2頁(教師資料)警示原因</td>
		<td align="left" bgcolor="#99FFCC">第2頁(教師資料)學校說明</td>
		<td align="left" bgcolor="#FFCC99">第3頁(學生資料)警示原因</td>
		<td align="left" bgcolor="#FFCC99">第3頁(學生資料)學校說明</td>
<?
$sql = "select * from 102schooldata where `cityname` = '$city'";
$result = $xoopsDB -> query($sql) or die($sql);
$count_e = 0;
while($row = mysql_fetch_row($result)) {
	//echo $row[74].$row[75].$row[76].'<br>';
	if($row[147]!="" || $row[148]!="" || $row[149]!=""){
		$count_e ++;
		echo "<tr>";
		echo "<td align='center'>";
		echo $count_e;//序號
		echo "</td>";
		echo "<td>";
		echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
    	echo $row[2].$row[4].$row[5];
		echo "</td>";
		echo "<td bgcolor='#FFCCDD'>";
		echo $row[189];
		echo "</td>";
		echo "<td bgcolor='#FFCCDD'>";
		echo $row[147];
		echo "</td>";
		echo "<td bgcolor='#99FFDD'>";
		echo $row[190];
		echo "</td>";
		echo "<td bgcolor='#99FFDD'>";
		echo $row[148];
		echo "</td>";
		echo "<td bgcolor='#FFCCAA'>";
		echo $row[191];
		echo "</td>";
		echo "<td bgcolor='#FFCCAA'>";
		echo $row[149];
		echo "</td>";
		echo "</tr>";
	}
 }
?>
</table>
共計：<font color=blue><? echo $count_e; ?></font>校<br />
</div>
<p>
<?
//include "../../footer.php";
?>