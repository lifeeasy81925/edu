<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='education_index.php'">
您搜尋的校名為"<? echo $_POST["tbxname"]; ?>"<br>
國小學校名冊
  <table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>縣市名稱</td>
    <td>詳細</td>
<?
$schoolname = $_POST["tbxname"];
  $sql_element = "SELECT account, school, city FROM 100element_basedata where  school like '%$schoolname%';";//國小資料
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element))
        {
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[1]";//學校名稱
		echo "</td>";
		echo "<td>";
			echo "$row[2]";//縣市
		echo "</td>";
		echo "<td>";
		 	echo "<a href="."government_exmained_2.php?id=$row[0]"." target="."_self".">"."連結"."</a>";//連結
		echo "</td>";
  echo "</tr>";
  }
?> 
</table>
    
	<br>國中學校名冊
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>縣市名稱</td>
    <td>詳細</td>
<?	
	$sql_junior = "SELECT account, school, city FROM 100junior_basedata where  school like '%$schoolname%';";//國中資料
	$result_junior = mysql_query($sql_junior);
	while($row = mysql_fetch_row($result_junior))
        {
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[1]";//學校名稱
		echo "</td>";
		echo "<td>";
			echo "$row[2]";//縣市
		echo "</td>";
		echo "<td>";
		 	echo "<a href="."government_exmained_2.php?id=$row[0]"." target="."_self".">"."連結"."</a>";//連結
		echo "</td>";
 		echo "</tr>";
		}
?> 
</table>

<?php
include "../../footer.php";
?>