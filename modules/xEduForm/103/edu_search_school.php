<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	$schoolname = $_POST["schoolname"];
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='education_index.php'">
您搜尋的校名為"<?=$schoolname; ?>"<br />
學校名冊
  <table width="500px" border="1">
    <tr>
    <td align="center">序號</td>
    <td align="center">學校代碼</td>
    <td align="center">學校名稱</td>
    <td align="center">縣市名稱</td>
    <td align="center">詳細</td>
<?
	$serial = 0;
	$sql = " SELECT * ".
		   " FROM schooldata ".
		   " WHERE schoolname like '%$schoolname%' or account = '$schoolname' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
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