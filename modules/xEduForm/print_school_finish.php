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
$result_element= mysql_query('select edu_school.*, 100element_upload_name.* from edu_school INNER JOIN 100element_upload_name ON edu_school.account=100element_upload_name.account ;');
	$total_1 = $xoopsDB -> getRowsNum($result_element);
	if($class == '1') echo '已填報完成(國小)之學校名冊';
	if($class == '2') echo '未填報完成(國小)之學校名冊';
?>
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標彙整表</td>
		<td>申請補助彙整表</td>
<?
$count_e = 0;
if($class == '1'){
while($row = mysql_fetch_row($result_element)) {
	if($row[1] == $ntpc ||$row[1] == $tp ||$row[1] == $tyc ||$row[1] == $hcc ||$row[1] == $hcs ||$row[1] == $mlc ||$row[1] == $tc ||$row[1] == $ntct ||$row[1] == $chc ||$row[1] == $ylc ||$row[1] == $cyc ||$row[1] == $cys ||$row[1] == $tn ||$row[1] == $kh ||$row[1] == $ptc ||$row[1] == $ttct ||$row[1] == $hlc ||$row[1] == $ilc ||$row[1] == $phc ||$row[1] == $km ||$row[1] == $matsu ||$row[1] == $kl){
		if($row[43] != "" && $row[44] != ""){
			$count_e ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			//echo "$row[0]";//學校代碼
			echo "<a href="."government_exmained_2.php?id=$row[0]"." target="."_blank".">"."$row[0]"."</a>";//連結
			echo "</td>";
    		echo "<td>";
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[43];//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[44]."' target='_new'>".$row[44];//檔案二
			echo "</td>";
			echo "</tr>";
		}
		}
	}
 }
 	else{
	while($row = mysql_fetch_row($result_element)) {
	if($row[1] == $ntpc ||$row[1] == $tp ||$row[1] == $tyc ||$row[1] == $hcc ||$row[1] == $hcs ||$row[1] == $mlc ||$row[1] == $tc ||$row[1] == $ntct ||$row[1] == $chc ||$row[1] == $ylc ||$row[1] == $cyc ||$row[1] == $cys ||$row[1] == $tn ||$row[1] == $kh ||$row[1] == $ptc ||$row[1] == $ttct ||$row[1] == $hlc ||$row[1] == $ilc ||$row[1] == $phc ||$row[1] == $km ||$row[1] == $matsu ||$row[1] == $kl){
		if($row[43] == "" || $row[44] == ""){
			$count_e ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			echo "<a href="."government_exmained_2.php?id=$row[0]"." target="."_blank".">"."$row[0]"."</a>";//連結//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱
			echo "</td>";
			echo "<td>";
			if ($row[43] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[43];}//檔案一
			echo "</td>";
			echo "<td>";
			if ($row[44] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[44];}//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
 }
 }
?>
</table>
國小校數：<font color=blue><? echo $count_e; ?></font>校<br /><br />
<?      
$result_junior= mysql_query("select edu_school.*, 100junior_upload_name.* from edu_school INNER JOIN 100junior_upload_name ON edu_school.account=100junior_upload_name.account");
	$total_2 = $xoopsDB -> getRowsNum($result_junior);
	if($class == '1' ) echo "已填報完成(國中)之學校名冊";
	if($class == '2' ) echo "未填報完成(國中)之學校名冊";  
?>
<table border="1" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td>序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>指標彙整表</td>
    <td>申請補助彙整表</td>
    <?
$count_j = 0;
if($class == '1'){
while($row = mysql_fetch_row($result_junior)) {
	if($row[1] == $ntpc ||$row[1] == $tp ||$row[1] == $tyc ||$row[1] == $hcc ||$row[1] == $hcs ||$row[1] == $mlc ||$row[1] == $tc ||$row[1] == $ntct ||$row[1] == $chc ||$row[1] == $ylc ||$row[1] == $cyc ||$row[1] == $cys ||$row[1] == $tn ||$row[1] == $kh ||$row[1] == $ptc ||$row[1] == $ttct ||$row[1] == $hlc ||$row[1] == $ilc ||$row[1] == $phc ||$row[1] == $km ||$row[1] == $matsu ||$row[1] == $kl){
		if($row[43] != "" && $row[44] != ""){
			$count_j ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_j;//序號
			echo "</td>";
			echo "<td>";
			echo "<a href="."government_exmained_2.php?id=$row[0]"." target="."_blank".">"."$row[0]"."</a>";//連結//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[43];//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[44]."' target='_new'>".$row[44];//檔案二
			echo "</td>";
			echo "</tr>";
		}
		}
	}
 }
 else{
	while($row = mysql_fetch_row($result_junior)) {
	if($row[1] == $ntpc ||$row[1] == $tp ||$row[1] == $tyc ||$row[1] == $hcc ||$row[1] == $hcs ||$row[1] == $mlc ||$row[1] == $tc ||$row[1] == $ntct ||$row[1] == $chc ||$row[1] == $ylc ||$row[1] == $cyc ||$row[1] == $cys ||$row[1] == $tn ||$row[1] == $kh ||$row[1] == $ptc ||$row[1] == $ttct ||$row[1] == $hlc ||$row[1] == $ilc ||$row[1] == $phc ||$row[1] == $km ||$row[1] == $matsu ||$row[1] == $kl){
		if($row[43] == "" || $row[44] == ""){
			$count_j ++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_j;//序號
			echo "</td>";
			echo "<td>";
			echo "<a href="."government_exmained_2.php?id=$row[0]"." target="."_blank".">"."$row[0]"."</a>";//連結//學校代碼
			echo "</td>";
    		echo "<td>";
      		echo str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱
			echo "</td>";
			echo "<td>";
			if ($row[43] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[43];}//檔案一
			echo "</td>";
			echo "<td>";
			if ($row[44] == ""){echo "未上傳";} else {echo "<a href='../xSchoolForm/upload/101/".$row[0]."/".$row[43]."' target='_new'>".$row[44];}//檔案二
			echo "</td>";
			echo "</tr>";
		}
	}
 }
 }
?>
  </tr>
</table>
 國中校數：<font color=blue><? echo $count_j; ?></font>校<p> 
合計校數：<font color=blue><? echo $count_e + $count_j; ?></font>校<p>
<?
include "../../footer.php";
?>