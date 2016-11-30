<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_index.php'">
<?
include "./connect_city_ex.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<br>退回【指標】修正資料之學校<br>
<? 
//讀取國小國中審核不通過資料
	$result = mysql_query("SELECT 102schooldata.account,102schooldata.type,102schooldata.cityname,102schooldata.school,102schooldata.a198,
		102schooldata.a199,102schooldata.a200,102schooldata.a201,102schooldata.a202,102schooldata.a203
		school_checkdate.*, edu_users.email FROM 102schooldata INNER JOIN 
		(school_checkdate INNER JOIN edu_users ON school_checkdate.account=edu_users.uname) ON 
		102schooldata.account=school_checkdate.account;");//三個表格合併語法

	//echo "國小學校名冊";
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>須修正項目</td>
    <td>個別通知</td>
	<td>審查委員</td>
<?
	while($row = mysql_fetch_row($result))
        {
  		$date = $row[12]; //EndDate
		$email_s= $row[17];//E-Mail
		if($row[2] == "$cityname"){
	//	if($row[1] == "1"){
		if($row[4] == "2" || $row[5] == "2" || $row[6] == "2" ||$row[7] == "2" ||$row[8] == "2" ||$row[9] == "2"){
		echo "<tr>";
		echo '<td>';
			echo "<a href="."102government_exmained.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo $row[2].$row[3];//學校名稱
		echo "</td>";
		echo '<td>';//須修正項目
		if($row[4] == '2' ){echo "指標一";}
		if($row[5] == '2' ){echo "指標二,";}
		if($row[6] == '2' ){echo "指標三,";}
		if($row[7] == '2' ){echo "指標四,";}
		if($row[8] == '2' ){echo "指標五,";}
		if($row[9] == '2' ){echo "指標六,";}
		echo "</td>";
		echo "<td>";//個別通知
		echo "<a href="."mail_school.php?id="."$row[0]"."&p1="."$row[4]"."&p2="."$row[5]"."&p3="."$row[6]"."&p4="."$row[7]"."&p5="."$row[8]".
			"&p6="."$row[9]"." target="."_self".">"."開放重報及通知"."</a>";//學校代碼
		echo '</td>';
		echo '<td>';
		echo $row[15];
		echo '</td>';
		echo '</tr>';
  }
  }
 // }
  }
?>
</table>
<?      
	//echo "<br>"."國中學校名冊";   
?>
<!--
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>須修正項目</td>
    <td>個別通知</td>
	<td>審查委員</td>
	-->
<?	
/*
while($row = mysql_fetch_row($result))
        {
  		$date = $row[12]; //EndDate
		$email_s= $row[17];//E-Mail
		if($row[2] == "$cityname"){
		if($row[1] == "2"){
		if($row[4] == "2" || $row[5] == "2" || $row[6] == "2" ||$row[7] == "2" ||$row[8] == "2" ||$row[9] == "2"){
		echo "<tr>";
		echo '<td>';
			echo "<a href="."102government_exmained.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo $row[2].$row[3];//學校名稱
		echo "</td>";
		echo '<td>';//須修正項目
		if($row[4] == '2' ){echo "指標一";}
		if($row[5] == '2' ){echo "指標二,";}
		if($row[6] == '2' ){echo "指標三,";}
		if($row[7] == '2' ){echo "指標四,";}
		if($row[8] == '2' ){echo "指標五,";}
		if($row[9] == '2' ){echo "指標六,";}
		echo "</td>";
		echo "<td>";//個別通知
		echo "<a href="."mail_school.php?id="."$row[0]"."&p1="."$row[4]"."&p2="."$row[5]"."&p3="."$row[6]"."&p4="."$row[7]"."&p5="."$row[8]".
			"&p6="."$row[9]"." target="."_self".">"."開放重報及通知"."</a>";//學校代碼
		echo '</td>';
		echo '<td>';
		echo $row[15];
		echo '</td>';
		echo '</tr>';
  }
  }
  }
  } */
?> 
<!--  </table>  -->
<?
include "../../footer.php";
?>