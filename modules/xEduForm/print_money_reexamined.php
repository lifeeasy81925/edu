<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
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
經費申請退回修正資料之學校<br>
<? 
/*$result_element= mysql_query('select edu_school.*, 100element_point.* from edu_school INNER JOIN 100element_point ON 
					edu_school.account=100element_point.account ;');//二個表格合併語法 */
/*result_element=mysql_query("SELECT edu_school.* ,100element_point.*,school_checkdate.* FROM edu_school INNER JOIN 
				(100element_point INNER JOIN school_checkdate ON 100element_point.account=school_checkdate.account) ON 
				edu_school.account=100element_point.account;");//三個表格合併語法*/
//讀取國小審核不通過資料
/*  $result_element = mysql_query("SELECT edu_school.* ,100element_examine_education.*,school_checkdate.* FROM edu_school INNER JOIN 
				(100element_examine_education INNER JOIN school_checkdate ON 100element_examine_education.account=school_checkdate.account) ON 
				edu_school.account=100element_examine_education.account;");*/
	$result_element = mysql_query("SELECT edu_school.* ,100element_examine_education.a1_p,100element_examine_education.a2_p,100element_examine_education.a3_p,
				100element_examine_education.a4_p,100element_examine_education.a5_p,100element_examine_education.a6_p,100element_examine_education.a7_p,
				100element_examine_education.a8_p,school_checkdate.post_date FROM edu_school INNER JOIN 
				(100element_examine_education INNER JOIN school_checkdate ON 100element_examine_education.account=school_checkdate.account) ON 
				edu_school.account=100element_examine_education.account;");
	echo "國小學校名冊";
?>
<script type="text/javascript" src="./datepicker/jquery.js"></script>
 <link rel="stylesheet" href="./datepicker/ui.datepicker.css" type="text/css" media="screen"/>
 <script src="./datepicker/jquery.js"></script>
 <script src="./datepicker/ui.datepicker.js" type="text/javascript" charset="utf-8"></script>	
 <script type="text/javascript" charset="utf-8">
	jQuery(function($){
      	$('#textfield').datepicker({dateFormat: 'yy-mm-dd', showOn: 'both', 
      		buttonImageOnly: true, buttonImage: './datepicker/calendar.gif'});
			});
 </script>
<table width="500" border="1">
    <td>縣市別</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>須修正項目</td>
	<td>學校最後更新日期</td>
<?
	while($row = mysql_fetch_row($result_element))
        {
		$date = $row[13]; //postDate
		if($row[5] == "2" || $row[6] == "2" || $row[7] == "2" ||$row[8] == "2" ||$row[9] == "2" ||$row[10] == "2" ||$row[11] == "2" ||$row[12] == "2"){
	echo "<tr>";
		echo "<td>";//縣市別
			echo "$row[1]";//縣市名稱
		echo '</td>';
		echo '<td>';
			echo "<a href="."government_exmained2.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo "$row[2]";//學校名稱
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
		echo '<td>';//更新日期
			echo '<input name="."textfield"." type="."text"." size="."12"." maxlegth="."12"." readonly="."readonly"." id="."textfield"." value=';
			echo $date;
			echo ">";
		echo "</td>";
  echo "</tr>";
  }
  }
?>

</table>
<!--合計校數：<? //echo $total_1; ?>校<p> -->
<?      
	echo "<br>"."國中學校名冊";   
?>
<table width="500" border="1">
    <td>縣市別</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>須修正項目</td>
	<td>學校最後更新日期</td>
<?	
//$result_junior= mysql_query('select edu_school.*, 100junior_point.* from edu_school INNER JOIN 100iunior_point ON edu_school.account=100junior_point.account;');
//	$total_2 = $xoopsDB -> getRowsNum($result_junior);
//讀取國中審核不通過資料
  $result_junior = mysql_query("SELECT edu_school.* ,100junior_examine_education.a1_p,100junior_examine_education.a2_p,100junior_examine_education.a3_p
				,100junior_examine_education.a4_p,100junior_examine_education.a5_p,100junior_examine_education.a6_p,100junior_examine_education.a7_p
				,100junior_examine_education.a8_p,school_checkdate.post_date FROM edu_school INNER JOIN 
				(100junior_examine_education INNER JOIN school_checkdate ON 100junior_examine_education.account=school_checkdate.account) ON 
				edu_school.account=100junior_examine_education.account;");	
 while($row = mysql_fetch_row($result_junior))
        {
		$date = $row[13]; //postDate
		if($row[5] == "2" || $row[6] == "2" || $row[7] == "2" ||$row[8] == "2" ||$row[9] == "2" ||$row[10] == "2" ||$row[11] == "2" ||$row[12] == "2"){
	echo "<tr>";
		echo "<td>";//縣市別
			echo "$row[1]";//縣市名稱
		echo '</td>';
		echo '<td>';
			echo "<a href="."government_exmained2.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo '<td>';
      		echo "$row[2]";//學校名稱
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
		echo '<td>';//更新日期
			echo '<input name="."textfield"." type="."text"." size="."12"." maxlegth="."12"." readonly="."readonly"." id="."textfield"." value=';
			echo $date;
			echo ">";
		echo "</td>";
  echo "</tr>";
  }
  }
?> 
</table><br>
<!--SCRIPT開始--> <!--webbot bot="HTMLMarkup" StartSpan --> 
<SCRIPT Language="Javascript"> 
function printit(){ 
if (NS) { 
window.print() ; 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 
      </script> 
      <SCRIPT Language="Javascript"> 
var NS = (navigator.appName == "Netscape"); 
var VERSION = parseInt(navigator.appVersion); 
if (VERSION > 3) { 
document.write('<form><input type=button value="列印本頁" name="Print" onClick="printit()"></form>'); 
} 
      </script> 
  <!--webbot BOT="HTMLMarkup" endspan --> <!--SCRIPT結束-->

<?
include "../../footer.php";
?>