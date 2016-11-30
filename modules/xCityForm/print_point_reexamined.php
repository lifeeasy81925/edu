<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_index.php'">
<?
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
  while($row = mysql_fetch_row($result_city)) {
            $city = $row[1];
			$cityman = $row[2];
			$examine = $row[3];
			$cityno = $row[4];
			}
  echo $username;
  echo $city;
  echo $cityman;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
退回【指標】修正資料之學校<br>
<? 
//$result_element= mysql_query('select edu_school.*, 100element_point.* from edu_school INNER JOIN 100element_point ON edu_school.account=100element_point.account ;');
  $result_element = mysql_query("SELECT edu_school.* ,100element_point.point1_p,100element_point.point2_p,100element_point.point3_p,100element_point.point4_p,
  100element_point.point5_p,100element_point.point6_p,school_checkdate.*, edu_users.email FROM edu_school INNER JOIN (100element_point INNER JOIN 
  ( school_checkdate INNER JOIN edu_users ON school_checkdate.account=edu_users.uname) ON 100element_point.account=school_checkdate.account) ON 
  edu_school.account=100element_point.account;");
	echo "國小學校名冊";
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>須修正項目</td>
    <td>個別通知</td>
<?
	while($row = mysql_fetch_row($result_element))
        {
  		$date = $row[13]; //EndDate
		$email1= $row[16];//E-Mail
		if($row[1] == "$city"){
		if($row[5] == "2" || $row[6] == "2" || $row[7] == "2" ||$row[8] == "2" ||$row[9] == "2" ||$row[10] == "2"){
		echo "<tr>";
		echo '<td>';
			echo "<a href="."government_exmained2.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱"$row[2]";//學校名稱
		echo "</td>";
		echo '<td>';//須修正項目
		if($row[5] == '2' ){echo "指標一";}
		if($row[6] == '2' ){echo "指標二,";}
		if($row[7] == '2' ){echo "指標三,";}
		if($row[8] == '2' ){echo "指標四,";}
		if($row[9] == '2' ){echo "指標五,";}
		if($row[10] == '2' ){echo "指標六,";}
		echo "</td>";
		echo "<td>";//個別通知
		echo "<a href="."mail_school.php?id="."$row[0]"."&p1="."$row[5]"."&p2="."$row[6]"."&p3="."$row[7]"."&p4="."$row[8]"."&p5="."$row[9]".
			"&p6="."$row[10]"." target="."_self".">"."開放重報及通知"."</a>";//學校代碼
		echo '</td>';
		echo '</tr>';
  }
  }
  }
?>
</table>
<?      
	echo "<br>"."國中學校名冊";   
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>須修正項目</td>
    <td>個別通知</td>
<?	
//$result_junior= mysql_query('select edu_school.*, 100junior_point.* from edu_school INNER JOIN 100iunior_point ON edu_school.account=100junior_point.account;');
//	$total_2 = $xoopsDB -> getRowsNum($result_junior);
$result_junior=mysql_query("SELECT edu_school.* ,100junior_point.point1_p,100junior_point.point2_p,100junior_point.point3_p,100junior_point.point4_p,
			100junior_point.point5_p,100junior_point.point6_p,school_checkdate.* FROM edu_school INNER JOIN (100junior_point INNER JOIN 
			( school_checkdate INNER JOIN edu_users ON school_checkdate.account=edu_users.uname) ON 100junior_point.account=school_checkdate.account) ON 
			edu_school.account=100junior_point.account;");
 while($row = mysql_fetch_row($result_junior))
        {
		$date = $row[13]; //EndDate
		$email1= $row[16];//E-Mail
		if($row[1] == "$city"){
		if($row[5] == "2" || $row[6] == "2" || $row[7] == "2" ||$row[8] == "2" ||$row[9] == "2" ||$row[10] == "2"){
		echo "<tr>";
		echo '<td>';
			echo "<a href="."government_examined2.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱"$row[2]";//學校名稱
		echo "</td>";
		echo '<td>';//須修正項目
		if($row[5] == '2' ){echo "指標一,";}
		if($row[6] == '2' ){echo "指標二,";}
		if($row[7] == '2' ){echo "指標三,";}
		if($row[8] == '2' ){echo "指標四,";}
		if($row[9] == '2' ){echo "指標五,";}
		if($row[10] == '2' ){echo "指標六,";}
		echo "</td>";
		echo "<td>";//個別通知
		echo "<a href="."mail_school.php?id="."$row[0]"."&p1="."$row[5]"."&p2="."$row[6]"."&p3="."$row[7]"."&p4="."$row[8]"."&p5="."$row[9]".
			"&p6="."$row[10]"." target="."_self".">"."開放重報及通知"."</a>";//學校代碼
		echo '</td>';
		echo '</tr>';
  }
  }
  }
?> 
</table>
<?
include "../../footer.php";
?>