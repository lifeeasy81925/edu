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
<br>
<? 
$result_element= mysql_query('select edu_school.*, 100element_upload_name.* from edu_school INNER JOIN 100element_upload_name ON edu_school.account=100element_upload_name.account ;');
	$total_1 = $xoopsDB -> getRowsNum($result_element);
	echo "<br>".$city."未填報完成國小學校列表";
?>
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標彙整表</td>
		<td>申請補助彙整表</td>
<?
$count_e = 0;
while($row = mysql_fetch_row($result_element)) {
	if($row[1] == "$city"){
		if($row[43] == "" || $row[44] == ""){
			$count_e ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			echo "$row[0]";//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱
			echo "</td>";
			echo "<td>";
			if ($row[43] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[43];}//檔案一
			echo "</td>";
			echo "<td>";
			if ($row[44] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[44]."' target='_new'>".$row[44];}//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
 }
?>
</table>
國小校數：<font color=blue><? echo $count_e; ?></font>校<br />
<?      
$result_junior= mysql_query('select edu_school.*, 100junior_upload_name.* from edu_school INNER JOIN 100junior_upload_name ON edu_school.account=100junior_upload_name.account ;');
	$total_2 = $xoopsDB -> getRowsNum($result_junior);
	echo "<br>".$city."未填報完成國中學校列表";   
?>
<table border="1" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td>序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>指標彙整表</td>
    <td>申請補助彙整表</td>
    <?
$count_j = 0;
while($row = mysql_fetch_row($result_junior)) {
	if($row[1] == "$city"){
		if($row[43] == "" || $row[44] == ""){
			$count_j ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_j;//序號
			echo "</td>";
			echo "<td>";
			echo "$row[0]";//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱
			echo "</td>";
			echo "<td>";
			if ($row[43] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[43];}//檔案一
			echo "</td>";
			echo "<td>";
			if ($row[44] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[44];}//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
 }
?>
  </tr>
</table>
 國中校數：<font color=blue><? echo $count_j; ?></font>校<p> 
合計校數：<font color=blue><? echo $count_e + $count_j; ?></font>校<p>
<?
include "../../footer.php";
?>