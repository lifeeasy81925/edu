<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='allowance_examine.php'">
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)){
	$city = $row[1];
	$cityman = $row[2];
	$examine = $row[3];
}
echo $username;
echo $city;
echo $cityman;
include "./checkdate.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
補助項目六：發展原住民文化特色及充實設備器材<br /><br />
已申請學校列表：國小
<table width="500" border="1">
	<td align="center">序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請補助金額</td>
    <td>初審結果</td>
<?
$sql_element = "select * from 100element_money ,100element_examine_money  where 100element_money.account=100element_examine_money.account and 100element_money.school like '%$city%'; ";
$result_element = mysql_query($sql_element);
$serial = 0;
while($row = mysql_fetch_row($result_element)){
	$total = $row[28] + $row[29];
	$exam_money_1 = $row[62];
	$exam_money_2 = $row[63];
	$total_city = $exam_money_1 + $exam_money_2;
	$pass = $row[71];
	if($total > '0'){
		$serial++;
		echo "<tr>";
		echo "<td align='center'>".$serial."</td>";
		echo "<td>";
		echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
		echo "$row[17]";//學校名稱
		echo "</td>";
		echo "<td>";
		echo "NT$".number_format($total);//申請總合	
		echo "</td>";
		echo "<td>";
		if($total_city == '0' && $pass == '0'){
		 	echo "<a href="."examine_allowance6.php?id=$row[0]"." target="."_self".">"."待審核"."</a>";
			echo "("."NT$".number_format($total_city).")";
		}elseif($total_city >= '0' && $pass == '1'){
			echo "<a href="."examine_allowance6.php?id=$row[0]"." target="."_self".">"."已審畢"."</a>";
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_city).")";
		}else{
			echo "<a href="."examine_allowance6.php?id=$row[0]"." target="."_self".">"."退件"."</a>";
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_city).")";
		}
		echo "</td>";
		echo "</tr>";
	}
}
?> 
</table>
<br />
已申請學校列表：國中
<table width="500" border="1">
	<td align="center">序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請補助金額</td>
    <td>初審結果</td>
<?
$sql_junior = "select * from 100junior_money ,100junior_examine_money  where 100junior_money.account=100junior_examine_money.account and 100junior_money.school like '%$city%'; ";
$result_junior = mysql_query($sql_junior);
$serial = 0;
while($row = mysql_fetch_row($result_junior)){
	$total = $row[28] + $row[29];
	$exam_money_1 = $row[62];
	$exam_money_2 = $row[63];
	$total_city = $exam_money_1 + $exam_money_2;
	$pass = $row[71];
	if($total > '0'){
		$serial++;
		echo "<tr>";
		echo "<td align='center'>".$serial."</td>";
		echo "<td>";
		echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
		echo "$row[17]";//學校名稱
		echo "</td>";
		echo "<td>";
		echo "NT$".number_format($total);//申請總合	
		echo "</td>";
		echo "<td>";
		if($total_city == '0' && $pass == '0'){
		 	echo "<a href="."examine_allowance6.php?id=$row[0]"." target="."_self".">"."待審核"."</a>";
			echo "("."NT$".number_format($total_city).")";
		}elseif($total_city >= '0' && $pass == '1'){
			echo "<a href="."examine_allowance6.php?id=$row[0]"." target="."_self".">"."已審畢"."</a>";
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_city).")";
		}else{
			echo "<a href="."examine_allowance6.php?id=$row[0]"." target="."_self".">"."退件"."</a>";
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_city).")";
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