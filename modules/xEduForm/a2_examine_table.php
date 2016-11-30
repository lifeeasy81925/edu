<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<!--<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">-->
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_list_1.php?id=2'">
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$edu = $row[1];
	$eduman = $row[2];
	$examine = $row[3];
	$eduno = $row[4];
}
//$city = $_SESSION['id'];
$city = $_GET["id"];
echo $username;
echo $edu;
echo $eduman;
//include "./checkdate.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? echo $city."_";?>補助項目二：原住民及離島地區學校辦理學習輔導<br /><br />
已申請學校列表：國小
<table width="500" border="1">
	<td align="center">序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>縣市初審金額</td>
    <td>複審結果</td>
<?
//合併二資料表再籂選
$sql_element = "select * from 100element_examine_money ,100element_examine_education  where 100element_examine_money.account=100element_examine_education.account and 100element_examine_money.school like '%$city%' order by 100element_examine_money.account;";
$result_element = mysql_query($sql_element);
$serial = 0;
while($row = mysql_fetch_row($result_element)){
	$total_city = $row[3]+$row[4]+$row[5]; //縣市審核金額
	$exam_money_1 = $row[47];
	$exam_money_2 = $row[48];
	$exam_money_3 = $row[49];
	$total_edu = $exam_money_1 + $exam_money_2 + $exam_money_3;	//教育部審核金額
	$pass = $row[77];	//教育部審核狀態
	if($total_city > '0'){
		$serial++;
		echo "<tr>";
		echo "<td align='center'>".$serial."</td>";	//序號
		echo "<td>";
		echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      	echo "$row[17]";//學校名稱
		echo "</td>";
		echo "<td>";
		echo "NT$".number_format($total_city);	//縣市初審金額	
		echo "</td>";
		echo "<td>";
		if($total_edu == '0' && $pass == '0'){
		 	echo "<a href="."examine_allowance2.php?id=$row[0]"." target="."_self".">"."待審核"."</a>";//預算審核
			echo "("."NT$".number_format($total_edu).")";
		}elseif($total_edu >= '0' && $pass == '1'){
			echo "<a href="."examine_allowance2.php?id=$row[0]"." target="."_self".">"."已審畢"."</a>";//預算審核
			echo '<img src='.'"../../images/ok2.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_edu).")";
		}else{ //非待審核 且 非已審畢 作為退件處理
			echo "<a href="."examine_allowance2.php?id=$row[0]"." target="."_self".">"."退件"."</a>";//預算審核
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_edu).")";
		}
		echo "</td>";
		echo "</tr>";
	}
}
?> 
</table>
<br>
已申請學校列表：國中
<table width="500" border="1">
	<td align="center">序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>縣市初審金額</td>
    <td>複審結果</td>
<?	
//合併二資料表再籂選
$sql_junior = "select * from 100junior_examine_money ,100junior_examine_education  where 100junior_examine_money.account=100junior_examine_education.account and 100junior_examine_money.school like '%$city%' order by 100junior_examine_money.account;";
$result_junior = mysql_query($sql_junior);
$serial = 0;
while($row = mysql_fetch_row($result_junior)){
	$total_city = $row[3]+$row[4]+$row[5]; //縣市審核金額
	$exam_money_1 = $row[47];
	$exam_money_2 = $row[48];
	$exam_money_3 = $row[49];
	$total_edu = $exam_money_1 + $exam_money_2 + $exam_money_3;;	//教育部審核金額
	$pass = $row[77];	//教育部審核狀態
	if($total_city > '0'){
		$serial++;
		echo "<tr>";
		echo "<td align='center'>".$serial."</td>";	//序號
		echo "<td>";
		echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      	echo "$row[17]";//學校名稱
		echo "</td>";
		echo "<td>";
		echo "NT$".number_format($total_city);	//縣市初審金額	
		echo "</td>";
		echo "<td>";
		if($total_edu == '0' && $pass == '0'){
		 	echo "<a href="."examine_allowance2.php?id=$row[0]"." target="."_self".">"."待審核"."</a>";//預算審核
			echo "("."NT$".number_format($total_edu).")";
		}elseif($total_edu >= '0' && $pass == '1'){
			echo "<a href="."examine_allowance2.php?id=$row[0]"." target="."_self".">"."已審畢"."</a>";//預算審核
			echo '<img src='.'"../../images/ok2.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_edu).")";
		}else{ //非待審核 且 非已審畢 作為退件處理
			echo "<a href="."examine_allowance2.php?id=$row[0]"." target="."_self".">"."退件"."</a>";//預算審核
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_edu).")";
		}
		echo "</td>";
		echo "</tr>";
	}
}
?> 
</table>
<?php
include "../../footer.php";
?>