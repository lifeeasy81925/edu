<?php
include "../../mainfile.php";
include "../../header.php";
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_index.php'"><br>
<?
include "./connect_city_ex.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<br>退回【經費】修正資料之學校<br>
<? 
/*$result_element= mysql_query('select edu_school.*, 100element_point.* from edu_school INNER JOIN 100element_point ON 
					edu_school.account=100element_point.account ;');//二個表格合併語法 */
/*result_element=mysql_query("SELECT edu_school.* ,100element_point.*,school_checkdate.* FROM edu_school INNER JOIN 
				(100element_point INNER JOIN school_checkdate ON 100element_point.account=school_checkdate.account) ON 
				edu_school.account=100element_point.account;");//三個表格合併語法*/
/*  $result_element = mysql_query("SELECT edu_school.* ,100element_examine_money.*,school_checkdate.* FROM edu_school INNER JOIN 
				(100element_examine_money INNER JOIN school_checkdate ON 100element_examine_money.account=school_checkdate.account) ON 
				edu_school.account=100element_examine_money.account;");*/
//讀取國小審核不通過資料
  $result_element = mysql_query("SELECT edu_school.* ,100element_examine_money.a1_p,100element_examine_money.a2_p,100element_examine_money.a3_p,
				100element_examine_money.a4_p,100element_examine_money.a5_p,100element_examine_money.a6_p,100element_examine_money.a7_p,100element_examine_money.a8_p,
				school_checkdate.*,edu_users.email FROM edu_school INNER JOIN (100element_examine_money INNER JOIN ( school_checkdate INNER JOIN edu_users ON 
				school_checkdate.account=edu_users.uname) ON 100element_examine_money.account=school_checkdate.account) ON edu_school.account=100element_examine_money.account;");
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
		$date = $row[15]; //EndDate
		$email1= $row[18];//E-Mail

		if($row[1] == "$city"){
		if($row[5] == "2" || $row[6] == "2" || $row[7] == "2" ||$row[8] == "2" ||$row[9] == "2" ||$row[10] == "2" ||$row[11] == "2" ||$row[12] == "2"){
		echo "<tr>";
		echo '<td>';
			echo "<a href="."government_exmained2.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱"$row[2]";//學校名稱
		echo "</td>";
		echo '<td>';//須修正項目
		if($row[5] == '2' ){echo "補助項目一";}
		if($row[6] == '2' ){echo "補助項目二,";}
		if($row[7] == '2' ){echo "補助項目三,";}
		if($row[8] == '2' ){echo "補助項目四,";}
		if($row[9] == '2' ){echo "補助項目五,";}
		if($row[10] == '2' ){echo "補助項目六,";}
		if($row[11] == '2' ){echo "補助項目七,";}
		if($row[12] == '2' ){echo "補助項目八,";}
		echo "</td>";
		echo "<td>";//個別通知
		echo "<a href="."mail_school.php?id="."$row[0]"."&a1="."$row[5]"."&a2="."$row[6]"."&a3="."$row[7]"."&a4="."$row[8]"."&a5="."$row[9]".
			"&a6="."$row[10]"."&a7="."$row[11]"."&a8="."$row[12]"." target="."_self".">"."開放重報及通知"."</a>";//學校代碼
		echo '</td>';
		echo '</tr>';
  }
  }
  }
?>
</table>
<br>
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
//讀取國中審核不通過資料
  $result_junior = mysql_query("SELECT edu_school.* ,100junior_examine_money.a1_p,100junior_examine_money.a2_p,100junior_examine_money.a3_p,100junior_examine_money.a4_p,
				100junior_examine_money.a5_p,100junior_examine_money.a6_p,100junior_examine_money.a7_p,	100junior_examine_money.a8_p,school_checkdate.*,edu_users.email 
				FROM edu_school INNER JOIN (100junior_examine_money INNER JOIN ( school_checkdate INNER JOIN edu_users ON school_checkdate.account=edu_users.uname) ON 
				100junior_examine_money.account=school_checkdate.account) ON edu_school.account=100junior_examine_money.account;");	
 while($row = mysql_fetch_row($result_junior))
        {
		$date = $row[15]; //EndDate
		$email2= $row[18];//E-Mail
		if($row[1] == "$city"){
		if($row[5] == "2" || $row[6] == "2" || $row[7] == "2" ||$row[8] == "2" ||$row[9] == "2" ||$row[10] == "2" ||$row[11] == "2" ||$row[12] == "2"){
		echo "<tr>";
		echo '<td>';
			echo "<a href="."government_exmained2.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱"$row[2]";//學校名稱
		echo "</td>";
		echo '<td>';//須修正項目
		if($row[5] == '2' ){echo "補助項目一";}
		if($row[6] == '2' ){echo "補助項目二,";}
		if($row[7] == '2' ){echo "補助項目三,";}
		if($row[8] == '2' ){echo "補助項目四,";}
		if($row[9] == '2' ){echo "補助項目五,";}
		if($row[10] == '2' ){echo "補助項目六,";}
		if($row[11] == '2' ){echo "補助項目七,";}
		if($row[12] == '2' ){echo "補助項目八,";}
		echo "</td>";
		echo "<td>";//個別通知
		echo "<a href="."mail_school.php?id="."$row[0]"."&a1="."$row[5]"."&a2="."$row[6]"."&a3="."$row[7]"."&a4="."$row[8]"."&a5="."$row[9]".
			"&a6="."$row[10]"."&a7="."$row[11]"."&a8="."$row[12]"." target="."_self".">"."開放重報及通知"."</a>";//學校代碼
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