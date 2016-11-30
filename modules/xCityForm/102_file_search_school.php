<?php
include "../../mainfile.php";
include "../../header.php";

$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result)) {
	$cityid= $row[0];//ID
	$city = $row[1];//縣市名稱
}
	
?>
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
您搜尋的縣市為"<?=$city;?>"<br>
學校名冊
  <table width="500" border="1">
    <tr>
    <td align="center">序號</td>
    <td align="center">學校代碼</td>
    <td align="center">學校名稱</td>
    <td align="center">檔案列表</td>
<?
$serial=0;
$cityname = $city;
$sql_element = "SELECT account, cityname, district, school FROM 102schooldata where  cityname like '%$cityname%';";
$result_element = mysql_query($sql_element);
while($row = mysql_fetch_row($result_element)){
	$serial++;
	echo "<tr>";
	echo "<td align='center'>";
		echo "$serial";
	echo "</td>";
	echo "<td>";
		echo "$row[0]";//學校代碼
	echo "</td>";
	echo "<td>";
		echo "$row[1]$row[2]$row[3]";//學校名稱
	echo "</td>";
	echo "<td>";
		echo "<a href="."102school_upload_file.php?id=$row[0]"." target="."_self".">"."連結"."</a>";//連結
	echo "</td>";
	echo "</tr>";
}
?> 
</table>
    
<?php
include "../../footer.php";
?>