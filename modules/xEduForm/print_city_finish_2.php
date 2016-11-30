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
	echo "　".$username."　";
	echo $city."　";
	//echo $cityman;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<br /><br />
<? 
$result_city= mysql_query('select * from 100city_upload_name order by 100city_upload_name.eduNo;');
	$total = $xoopsDB -> getRowsNum($result_city);
?>
未審核完成縣市列表
<table border="1" cellpadding="0" cellspacing="0" >
	<tr align="center" style="background-color:#FC9">
		<td>序號</td>
		<td>縣市名稱</td>
		<td>II-2,縣市核定總表</td>
		<td>II-3,指標彙整表</td>
		<td>交通車調查表</td>
		<td>交通車編列相關文件</td>
<?
$count_city = 0;
while($row = mysql_fetch_row($result_city)) {
	if($row[1] == "" || $row[2] == ""){
		$count_city ++;
		echo "<tr>";
		echo "<td align='center'>";
		echo $count_city;//序號
		echo "</td>";
		echo "<td>";
		echo "$row[6]";//縣市名稱
		echo "</td>";
		echo "<td>";
		if ($row[1] ==""){echo "未上傳";}else{echo "<a href='../xCityForm/upload/101/".$row[0]."/".$row[1]."' target='_new'>".$row[6]."_表II-2";}//II-2,縣市核定總表
		echo "</td>";
		echo "<td>";
		if ($row[2] ==""){echo "未上傳";}else{echo "<a href='../xCityForm/upload/101/".$row[0]."/".$row[2]."' target='_new'>".$row[6]."_表II-3";}//II-3,指標彙整表
		echo "</td>";
		echo "<td>";
		if ($row[3] ==""){echo "無";}else{echo "<a href='../xCityForm/upload/101/".$row[0]."/".$row[3]."' target='_new'>".$row[6]."_文件3";}//交通車調查表
		echo "</td>";
		echo "<td>";
		if ($row[4]=="") {echo "無";}else{echo "<a href='../xCityForm/upload/101/".$row[0]."/".$row[4]."' target='_new'>".$row[6]."_文件4";}//交通車編列相關文件
		echo "</td>";
		echo "</tr>";
	}
 }
?>
</table>
<p>未完成審核縣市數：<font color=blue><? echo $count_city; ?></font><br />

<?
include "../../footer.php";
?>