<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_city_ex.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<hr>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_index.php'">
退回【經費】修正資料之學校<br>
<? 
/*$result_element = mysql_query('select edu_school.*, 100element_point.* from edu_school INNER JOIN 100element_point ON 
				edu_school.account=100element_point.account ;');//二個表格合併語法 */
/*result_element = mysql_query("SELECT edu_school.* ,100element_point.*,school_checkdate.* FROM edu_school INNER JOIN 
				(100element_point INNER JOIN school_checkdate ON 100element_point.account=school_checkdate.account) ON 
				edu_school.account=100element_point.account;");//三個表格合併語法*/
/*$result_element = mysql_query("SELECT edu_school.* ,100element_examine_money.*,school_checkdate.* FROM edu_school INNER JOIN 
				(100element_examine_money INNER JOIN school_checkdate ON 100element_examine_money.account=school_checkdate.account) ON 
				edu_school.account=100element_examine_money.account;");//三個表格合併語法*/
/*$result_element = mysql_query("SELECT edu_school.* ,100element_examine_money.a1_p,100element_examine_money.a2_p,100element_examine_money.a3_p,
				100element_examine_money.a4_p,100element_examine_money.a5_p,100element_examine_money.a6_p,100element_examine_money.a7_p,100element_examine_money.a8_p,
				school_checkdate.*,edu_users.email FROM edu_school INNER JOIN (100element_examine_money INNER JOIN ( school_checkdate INNER JOIN edu_users ON 
				school_checkdate.account=edu_users.uname) ON 100element_examine_money.account=school_checkdate.account) ON edu_school.account=100element_examine_money.account;");
				//四個表格合併語法*/
				
//讀取國小國中審核不通過資料
	$result = mysql_query("SELECT 102schooldata.account,102schooldata.type,102schooldata.cityname,102schooldata.school,102schooldata.a192,
				102schooldata.a193,102schooldata.a194,102schooldata.a195,102schooldata.a196,102schooldata.a197,102schooldata.a198,
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
		$date = $row[13]; //EndDate
		$email_s= $row[23];//送出受審學校承辦人mail
		if($row[2] == "$cityname"){
	//區分國中小學	if($row[1] == "1"){
		if($row[4] == "2" || $row[5] == "2" || $row[6] == "2" ||$row[7] == "2" ||$row[8] == "2" ||$row[9] == "2" ||$row[10] == "2" ){
		echo "<tr>";
		echo '<td>';
			echo "<a href="."102_city_examined.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo $row[2].$row[3];//學校名稱
		echo "</td>";
		echo '<td>';//須修正項目
		if($row[4] == '2' ){echo "＊補助項目一";}
		if($row[5] == '2' ){echo "＊補助項目二";}
		if($row[6] == '2' ){echo "＊補助項目三";}
		if($row[7] == '2' ){echo "＊補助項目四";}
		if($row[8] == '2' ){echo "＊補助項目五";}
		if($row[9] == '2' ){echo "＊補助項目六";}
		if($row[10] == '2' ){echo "＊補助項目七";}
	
		echo "</td>";
		echo "<td>";//個別通知
		echo "<a href="."mail_school.php?id="."$row[0]"."&a1="."$row[4]"."&a2="."$row[5]"."&a3="."$row[6]"."&a4="."$row[7]".
			"&a5="."$row[8]"."&a6="."$row[9]"."&a7="."$row[10]"." target="."_self".">"."開放重報及通知"."</a>";//學校代碼
		echo '</td>';
		echo '<td>';
		//顯示須修正項目之初審委員代號
		if($row[4] == '2' ){echo $row[16].'-';}
		if($row[5] == '2' ){echo $row[17].'-';}
		if($row[6] == '2' ){echo $row[18].'-';}
		if($row[7] == '2' ){echo $row[19].'-';}
		if($row[8] == '2' ){echo $row[20].'-';}
		if($row[9] == '2' ){echo $row[21].'-';}
		if($row[10] == '2' ){echo $row[22];}
		echo '</td>';
		echo '</tr>';
  }
  }
//  }
  }
?>
</table>
<br>
<?
include "../../footer.php";
?>