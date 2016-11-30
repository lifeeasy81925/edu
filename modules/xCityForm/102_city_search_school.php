<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
?>
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
您搜尋的縣市為"<? echo $_POST["tbxname"]; ?>"<br>
學校名冊
  <table width="500" border="1">
    <tr>
    <td align="center">序號</td>
    <td align="center">學校代碼</td>
    <td align="center">學校名稱</td>
    <td align="center">縣市名稱</td>
    <td align="center">詳細</td>
<?
$serial=0;
$cityname = $_POST["tbxname"];
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
		echo "$row[1]";//縣市
	echo "</td>";
	echo "<td>";
		echo "<a href="."102print_edu_examined.php?id=$row[0]"." target="."_self".">"."連結"."</a>";//連結
	echo "</td>";
	echo "</tr>";
}
?> 
</table>
    
<?php
include "../../footer.php";
?>