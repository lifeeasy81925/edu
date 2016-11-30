<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
?>

<p>

<a href="/edu/modules/xEduForm/106/history_data.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/history.png" align="absmiddle" height="20px"> 歷史資料查詢區 / <b>102年度 學校需求彙整表</b>

<p>
<hr>
<p>

您搜尋的校名為"<? echo $_POST["tbxname"]; ?>"<br>
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
$schoolname = $_POST["tbxname"];
$sql_element = "SELECT account, cityname, district, school FROM 102schooldata where  school like '%$schoolname%';";
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