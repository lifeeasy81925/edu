<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<?
$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_city = $xoopsDB -> query($sql) or die($sql);
	while($row = mysql_fetch_row($result_city)) {
		$city = $row[1];	//縣市名稱
		$cityman = $row[2]; //身分名稱
		$examine = $row[3]; //1:縣市帳號, 2:教育部帳號
		$cityno = $row[4];	//縣市編號
	}
	echo $username;
	echo $city;
	echo $cityman;
	
	$class = $_POST["class"];//傳回填報與未填報的值

//縣市取回之變數
	$ntpc = $_POST["checkbox2"];//新北市
	$tp = $_POST["checkbox3"];
	$tyc = $_POST["checkbox4"];
	$hcc = $_POST["checkbox5"];
	$hcs = $_POST["checkbox6"];
	$mlc = $_POST["checkbox7"];
	$tc = $_POST["checkbox8"];
	$ntct = $_POST["checkbox9"];
	$chc = $_POST["checkbox10"];
	$ylc = $_POST["checkbox11"];
	$cyc = $_POST["checkbox12"];
	$cys = $_POST["checkbox13"];
	$tn = $_POST["checkbox14"];
	$kh = $_POST["checkbox15"];
	$ptc = $_POST["checkbox16"];
	$ttct = $_POST["checkbox17"];
	$hlc = $_POST["checkbox18"];
	$ilc = $_POST["checkbox19"];
	$kl = $_POST["checkbox20"];
	$phc = $_POST["checkbox21"];
	$km = $_POST["checkbox22"];
	$matsu = $_POST["checkbox23"];//連江縣
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<br>
<? 
$result_element= mysql_query('SELECT
102schooldata.account,
102schooldata.type,
102schooldata.cityname,
102schooldata.district,
102schooldata.school,
102school_upload_name.account,
102school_upload_name.final_1,
102school_upload_name.final_2,
102school_upload_name.final_3,
102school_upload_name.final_4
from 102schooldata INNER JOIN 102school_upload_name ON 102schooldata.account=102school_upload_name.account ;');
//	$total_1 = $xoopsDB -> getRowsNum($result_element);
	if($class == '1') echo '已填報完成之學校名冊';
	if($class == '2') echo '未填報完成之學校名冊';
?>
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標界定調查表</td>
		<td>申請補助彙整表</td>
<?
$count_e = 0;
if($class == '1'){
while($row = mysql_fetch_row($result_element)) {
	//echo $row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[6].$row[7];
	if($row[2] == $ntpc ||$row[2] == $tp ||$row[2] == $tyc ||$row[2] == $hcc ||$row[2] == $hcs ||$row[2] == $mlc ||$row[2] == $tc ||$row[2] == $ntct ||$row[2] == $chc ||$row[2] == $ylc ||$row[2] == $cyc ||$row[2] == $cys ||$row[2] == $tn ||$row[2] == $kh ||$row[2] == $ptc ||$row[2] == $ttct ||$row[2] == $hlc ||$row[2] == $ilc ||$row[2] == $phc ||$row[2] == $km ||$row[2] == $matsu ||$row[2] == $kl){
		//echo $row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[6].$row[7];
		if($row[6] != "" && $row[7] != ""){
			$count_e ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			//echo "$row[0]";//學校代碼
			echo "<a href="."102print_edu_examined.php?id=$row[0]"." target="."_self".">"."$row[0]"."</a>";//連結
			echo "</td>";
    		echo "<td>";
      		echo $row[2].$row[3].$row[4];//學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[6]."' target='_new'>".$row[6];//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[7]."' target='_new'>".$row[7];//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
	}
}else{
	while($row = mysql_fetch_row($result_element)) {
	if($row[2] == $ntpc ||$row[2] == $tp ||$row[2] == $tyc ||$row[2] == $hcc ||$row[2] == $hcs ||$row[2] == $mlc ||$row[2] == $tc ||$row[2] == $ntct ||$row[2] == $chc ||$row[2] == $ylc ||$row[2] == $cyc ||$row[2] == $cys ||$row[2] == $tn ||$row[2] == $kh ||$row[2] == $ptc ||$row[2] == $ttct ||$row[2] == $hlc ||$row[2] == $ilc ||$row[2] == $phc ||$row[2] == $km ||$row[2] == $matsu ||$row[2] == $kl){
		//echo $row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[6].$row[7];
		if($row[6] == "" || $row[7] == ""){
			$count_e ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			echo "<a href="."102print_edu_examined.php?id=$row[0]"." target="."_self".">"."$row[0]"."</a>";//連結//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo $row[2].$row[3].$row[4];//學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[6]."' target='_new'>".$row[6];//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/102/".$row[0]."/".$row[7]."' target='_new'>".$row[7];//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
 }
 }
?>
</table>
校數：<font color=blue><? echo $count_e; ?></font>校<br /><br />

<?
include "../../footer.php";
?>