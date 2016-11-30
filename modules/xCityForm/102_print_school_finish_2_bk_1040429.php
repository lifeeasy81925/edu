<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
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
<? echo $city; ?>未填報完成國小學校列表
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標彙整表</td>
		<td>申請補助彙整表</td>
<?
$sql = "select 102school_upload_name.*, 102schooldata.* from 102school_upload_name INNER JOIN 102schooldata ON 102school_upload_name.account=102schooldata.account where `cityname` = '$city'";
$result = $xoopsDB -> query($sql) or die($sql);
$count_e = 0;
while($row = mysql_fetch_row($result)) {
	//echo $row[74].$row[75].$row[76].'<br>';
	if($row[76] == "$city" && $row[75] == '1'){
		if($row[38] == "" || $row[39] == ""){
			$count_e ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			echo "$row[0]";//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo $row[76].$row[78].$row[79];//縮減學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[38]."' target='_new'>".$row[38];//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[39]."' target='_new'>".$row[39];//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
 }
?>
</table>
國小校數：<font color=blue><? echo $count_e; ?></font>校<br />
<p><p>
<? echo $city; ?>未填報完成國中學校列表
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標彙整表</td>
		<td>申請補助彙整表</td>
<?
$sql = "select 102school_upload_name.*, 102schooldata.* from 102school_upload_name INNER JOIN 102schooldata ON 102school_upload_name.account=102schooldata.account where `cityname` = '$city'";
$result = $xoopsDB -> query($sql) or die($sql);
$count_j = 0;
while($row = mysql_fetch_row($result)) {
	//echo $row[74].$row[75].$row[76].'<br>';
	if($row[76] == "$city" && $row[75] == '2'){
		if($row[38] == "" || $row[39] == ""){
			$count_j ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_j;//序號
			echo "</td>";
			echo "<td>";
			echo "$row[0]";//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo $row[76].$row[78].$row[79];//縮減學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[38]."' target='_new'>".$row[38];//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[39]."' target='_new'>".$row[39];//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
 }
?>
</table>
國中校數：<font color=blue><? echo $count_j; ?></font>校<br />
<br />
合計校數：<font color=blue><? echo $count_e + $count_j; ?></font>校<p>
<?
include "../../footer.php";
?>