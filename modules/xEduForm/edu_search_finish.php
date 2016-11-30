<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
//$username = $xoopsUser->getVar('uname');
global $xoopsDB;
	$class = $_POST["class"];//傳回國中小的值

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
 $p1 = $_POST["checkbox24"];//指標一
 $p2 = $_POST["checkbox25"];//指標二
 $p3 = $_POST["checkbox26"];//指標三
 $p4 = $_POST["checkbox27"];//指標四
 $p5 = $_POST["checkbox28"];//指標五
 $p6 = $_POST["checkbox29"];//指標六
 $m1 = $_POST["checkbox30"];//經常門
 $m2 = $_POST["checkbox31"];//資本門
 $sa1_1 = $_POST["checkbox32"];//1-1
 $sa1_2 = $_POST["checkbox33"];//1-2
 $sa2_1 = $_POST["checkbox34"];//2-1
 $sa2_2 = $_POST["checkbox35"];//2-2
 $sa2_3 = $_POST["checkbox36"];//2-3
 $sa3_1 = $_POST["checkbox37"];//3-1經常門
 $sa4_1 = $_POST["checkbox38"];//4-1學生宿舍經常門
 $sa4_2 = $_POST["checkbox39"];//4-3教師宿舍經常門
 $sa5_1 = $_POST["checkbox40"];//5-1經常門
 $sa6_1 = $_POST["checkbox41"];//6-1經常門
 $sa7_1 = $_POST["checkbox42"];//7-1
 $sa7_2 = $_POST["checkbox43"];//7-2
 $sa7_3 = $_POST["checkbox44"];//7-3
 $sa8_1 = $_POST["checkbox45"];//8-1
 $sa8_2 = $_POST["checkbox46"];//8-2
 $sa8_3 = $_POST["checkbox47"];//8-3
 $sa3_2 = $_POST["checkbox48"];//3-2資本門
 $sa4_3 = $_POST["checkbox49"];//4-2學生宿舍資本門
 $sa4_4 = $_POST["checkbox50"];//4-4教師宿舍資本門
 $sa5_2 = $_POST["checkbox51"];//5-2資本門
 $sa6_2 = $_POST["checkbox52"];//6-2資本門
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
教育部核定經費多條件式綜合查詢 
<table border="1" cellpadding="0" cellspacing="0">
   <tr>
    <td rowspan="2" nowrap="nowrap">學校編號</td>
    <td rowspan="2" nowrap="nowrap">學校名稱</td>
	<?
    if($p1 == '1') {echo "<td rowspan="."2"." nowrap="."nowrap".">指<br>標<br>一</td>";}
    if($p2 == '1') {echo "<td rowspan="."2"." nowrap="."nowrap".">指<br>標<br>二</td>";}
    if($p3 == '1') {echo "<td rowspan="."2"." nowrap="."nowrap".">指<br>標<br>三</td>";}
    if($p4 == '1') {echo "<td rowspan="."2"." nowrap="."nowrap".">指<br>標<br>四</td>";}
    if($p5 == '1') {echo "<td rowspan="."2"." nowrap="."nowrap".">指<br>標<br>五</td>";}
    if($p6 == '1') {echo "<td rowspan="."2"." nowrap="."nowrap".">指<br>標<br>六</td>";}
    if($sa1_1 == '1'&& $sa1_2 == '1'){echo "<td colspan="."2".">1.推展親職教育活動</td>";}
		elseif($sa1_1 == '1'){echo "<td colspan="."1".">1.推展親職教育活動</td>";}
		elseif($sa1_2 == '1'){echo "<td colspan="."1".">1.推展親職教育活動</td>";}
		else{}
    if($sa2_1 == '1'&& $sa2_2 == '1'&& $sa2_3 == '1'){echo "<td colspan="."3".">2.原住民及離島地區學習輔導</td>";}
		elseif($sa2_1 == '1'&& $sa2_2 == '1'){echo "<td colspan="."2".">2.原住民及離島地區學習輔導</td>";}
		elseif($sa2_2 == '1'&& $sa2_3 == '1'){echo "<td colspan="."2".">2.原住民及離島地區學習輔導</td>";}
		elseif($sa2_1 == '1'&& $sa2_3 == '1'){echo "<td colspan="."2".">2.原住民及離島地區學習輔導</td>";}
		elseif($sa2_1 == '1'){echo "<td colspan="."1".">2.原住民及離島地區學習輔導</td>";}
		elseif($sa2_2 == '1'){echo "<td colspan="."1".">2.原住民及離島地區學習輔導</td>";}
		elseif($sa2_3 == '1'){echo "<td colspan="."1".">2.原住民及離島地區學習輔導</td>";}
		else{}
    if($sa3_1 == '1'&&$sa3_2 == '1'){echo "<td colspan="."2".">3.發展教育特色</td>";}
		elseif($sa3_1 == '1'){echo "<td colspan="."1".">3.發展教育特色</td>";}
		elseif($sa3_2 == '1'){echo "<td colspan="."1".">3.發展教育特色</td>";}
		else{}
	if($sa4_1 == '1'&&$sa4_2 == '1'&&$sa4_3 == '1'&&$sa4_4 == '1'){echo "<td colspan="."4".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_1 == '1'&& $sa4_2 == '1'&& $sa4_3 == '1'){echo "<td colspan="."3".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_1 == '1'&& $sa4_2 == '1'&$ $sa4_4 == '1'){echo "<td colspan="."3".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_1 == '1'&& $sa4_3 == '1'&$ $sa4_4 == '1'){echo "<td colspan="."3".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_2 == '1'&& $sa4_3 == '1'&& $sa4_4 == '1'){echo "<td colspan="."3".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_1 == '1'&& $sa4_2 == '1'){echo "<td colspan="."2".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_1 == '1'&& $sa4_3 == '1'){echo "<td colspan="."2".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_1 == '1'&& $sa4_4 == '1'){echo "<td colspan="."2".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_2 == '1'&& $sa4_3 == '1'){echo "<td colspan="."2".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_2 == '1'&& $sa4_4 == '1'){echo "<td colspan="."2".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_3 == '1'&& $sa4_4 == '1'){echo "<td colspan="."2".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_1 == '1'){echo "<td colspan="."1".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_2 == '1'){echo "<td colspan="."1".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_3 == '1'){echo "<td colspan="."1".">4.修繕離島或偏遠地區師生宿舍</td>";}
		elseif($sa4_4 == '1'){echo "<td colspan="."1".">4.修繕離島或偏遠地區師生宿舍</td>";}
		else{}
    if($sa5_1 == '1'&&$sa5_2 == '1'){echo "<td colspan="."2".">5.充實學校基本設備</td>";}
		elseif($sa5_1 == '1'){echo "<td colspan="."1".">5.充實學校基本設備</td>";}
		elseif($sa5_2 == '1'){echo "<td colspan="."1".">5.充實學校基本設備</td>";}
		else{}
    if($sa6_1 == '1'&&$sa6_2 == '1'){echo "<td colspan="."2".">6.發展原住民特色充實設備</td>";}
		elseif($sa6_1 == '1'){echo "<td colspan="."1".">6.發展原住民特色充實設備</td>";}
		elseif($sa6_2 == '1'){echo "<td colspan="."1".">6.發展原住民特色充實設備</td>";}
		else{}
    if($sa7_1 == '1'&&$sa7_2 == '1'&&$sa7_3 == '1'){echo "<td colspan="."3".">7.補助交通不便學校交通車</td>";}
		elseif($sa7_1 == '1'&& $sa7_2 == '1'){echo "<td colspan="."2".">7.補助交通不便學校交通車</td>";}
		elseif($sa7_2 == '1'&& $sa7_3 == '1'){echo "<td colspan="."2".">7.補助交通不便學校交通車</td>";}
		elseif($sa7_1 == '1'&& $sa7_3 == '1'){echo "<td colspan="."2".">7.補助交通不便學校交通車</td>";}
		elseif($sa7_1 == '1'){echo "<td colspan="."1".">7.補助交通不便學校交通車</td>";}
		elseif($sa7_2 == '1'){echo "<td colspan="."1".">7.補助交通不便學校交通車</td>";}
		elseif($sa7_3 == '1'){echo "<td colspan="."1".">7.補助交通不便學校交通車</td>";}
		else{}
    if($sa8_1 == '1'&&$sa8_2 == '1'&&$sa8_3 == '1'){echo "<td colspan="."3".">8.整修學校社區化活動場所</td>";}
		elseif($sa8_1 == '1'&& $sa8_2 == '1'){echo "<td colspan="."2".">8.整修學校社區化活動場所</td>";}
		elseif($sa8_2 == '1'&& $sa8_3 == '1'){echo "<td colspan="."2".">8.整修學校社區化活動場所</td>";}
		elseif($sa8_1 == '1'&& $sa8_3 == '1'){echo "<td colspan="."2".">8.整修學校社區化活動場所</td>";}
		elseif($sa8_1 == '1'){echo "<td colspan="."1".">8.整修學校社區化活動場所</td>";}
		elseif($sa8_2 == '1'){echo "<td colspan="."1".">8.整修學校社區化活動場所</td>";}
		elseif($sa8_3 == '1'){echo "<td colspan="."1".">8.整修學校社區化活動場所</td>";}
		else{}
	?>
    <td rowspan="2" align="center" nowrap="nowrap">各校總合</td>
  </tr>
  <tr>
    <?
	if($sa1_1 == '1'){echo "<td rowspan="."1"." align="."center".">親職教育活動</td>";}
    if($sa1_2 == '1'){echo "<td rowspan="."1"." align="."center".">目標學生家庭訪視輔導</td>";}
    if($sa2_1 == '1'){echo "<td rowspan="."1"." align="."center".">課後學習輔導</td>";}
    if($sa2_2 == '1'){echo "<td rowspan="."1"." align="."center".">寒暑假學習輔導</td>";}
    if($sa2_3 == '1'){echo "<td rowspan="."1"." align="."center".">住校生夜間學校輔導 </td>";}
    if($sa3_1 == '1'){echo "<td rowspan="."1"." align="."center".">發展特色經常門</td>";}
    if($sa3_2 == '1'){echo "<td rowspan="."1"." align="."center".">發展特色資本門</td>";}
    if($sa4_1 == '1'){echo "<td rowspan="."1"." align="."center".">學生宿舍經常門</td>";}
    if($sa4_2 == '1'){echo "<td rowspan="."1"." align="."center".">教師宿舍宿舍經常門</td>";}
	if($sa4_3 == '1'){echo "<td rowspan="."1"." align="."center".">學生宿舍資本門</td>";}
    if($sa4_4 == '1'){echo "<td rowspan="."1"." align="."center".">教師宿舍資本門</td>";}
    if($sa5_1 == '1'){echo "<td rowspan="."1"." align="."center".">充實設備經常門</td>";}
    if($sa5_2 == '1'){echo "<td rowspan="."1"." align="."center".">充實設備資本門</td>";}
    if($sa6_1 == '1'){echo "<td rowspan="."1"." align="."center".">原住民特色經常門</td>";}
    if($sa6_2 == '1'){echo "<td rowspan="."1"." align="."center".">原住民特色資本門</td>";}
    if($sa7_1 == '1'){echo "<td rowspan="."1"." align="."center".">租車費</td>";}
    if($sa7_2 == '1'){echo "<td rowspan="."1"." align="."center".">交通費</td>";}
    if($sa7_3 == '1'){echo "<td rowspan="."1"." align="."center".">購交通車費</td>";}
    if($sa8_1 == '1'){echo "<td rowspan="."1"." align="."center".">綜合球場</td>";}
    if($sa8_2 == '1'){echo "<td rowspan="."1"." align="."center".">小型集會風雨教室</td>";}
    if($sa8_3 == '1'){echo "<td rowspan="."1"." align="."center".">運動場</td>";}
	?>
  </tr>
  <tr></tr>
<?
// 傳回SQL查詢式的所有紀錄
if($class == '1' ){
			$basedata="100element_examine_education";
			$point="100element_point";
	}
	else{
			$basedata="100junior_examine_education";
			$point="100junior_point";
	}
// $result_element = mysql_query("SELECT edu_school.* ,100element_point.*,school_checkdate.* FROM edu_school INNER JOIN (100element_point INNER JOIN school_checkdate ON 100element_point.account=school_checkdate.account) ON edu_school.account=100element_point.account;");
//$sql = "select  edu_school.account, edu_school.city,".$basedata.".school, ".$basedata.".a1_1, ".$basedata.".a1_2 ,".$basedata.".a2_1,".$basedata.".a2_2,".$basedata.".a2_3,".$basedata.".a3_1,".$basedata.".a3_2,".$basedata.".a4_1,".$basedata.".a4_2,".$basedata.".a5,".$basedata.".a6_1,".$basedata.".a6_2,".$basedata.".a7_1,".$basedata.".a7_2,".$basedata.".a7_3,".$basedata.".a8_1,".$basedata.".a8_2,".$basedata.".a8_3 from edu_school INNER JOIN ".$basedata." ON edu_school.account=".$basedata.".account";
$sql = "select  edu_school.account, edu_school.city,".$basedata.".school, ".$basedata.".a1_1, ".$basedata.".a1_2 ,".$basedata.".a2_1,"
	.$basedata.".a2_2,".$basedata.".a2_3,".$basedata.".a3_1,".$basedata.".a3_2,".$basedata.".a4_1,".$basedata.".a4_2,".$basedata.".a5,"
	.$basedata.".a6_1,".$basedata.".a6_2,".$basedata.".a7_1,".$basedata.".a7_2,".$basedata.".a7_3,".$basedata.".a8_1,".$basedata.".a8_2,"
	.$basedata.".a8_3,".$point.".point1_p,".$point.".point2_p,".$point.".point3_p,".$point.".point4_p,".$point.".point5_p,".$point.".point6_p 
	from edu_school INNER JOIN (".$basedata." INNER JOIN ".$point." ON ".$basedata.".account=".$point.".account) ON 
	edu_school.account=".$basedata.".account";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$school_id=$row[0];
	$city=$row[1];
	$a1_1=$row[3];
	$a1_2=$row[4];
	$a2_1=$row[5];
	$a2_2=$row[6];
	$a2_3=$row[7];
	$a3_1=$row[28];
	$a3_2=$row[29];
	$a4_1=$row[9];
	$a4_2=$row[10];
	$a4_2_1=$row[32];
	$a4_2_2=$row[33];
	$a5_1=$row[42];
	$a5_2=$row[43];
	$a6_1=$row[30];
	$a6_2=$row[31];
	$a7_1=$row[13];
	$a7_2=$row[14];
	$a7_3=$row[15];
	$a8_1=$row[16];
	$a8_2=$row[17];
 	$a8_3=$row[18];
	$point1=$row[44];
	$point2=$row[45];
	$point3=$row[46];
	$point4=$row[47];
	$point5=$row[48];
	$point6=$row[49];
	$school = str_replace("市立","",str_replace("縣立","",$row[2]));//縮減學校名稱
	$total = $a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_1+$a4_2+$a4_2_1+$a4_2_2+$a5_1+$a5_2+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3;
	
	if($city == $tp || $city == $ntpc ||$city == $tyc ||$city == $hcc ||$city == $hcs ||$city == $mlc ||$city == $tc ||$city == $ntct ||
			$city == $chc ||$city == $ylc ||$city == $cyc ||$city == $cys ||$city == $tn ||$city == $kh ||$city == $ptc ||$city == $ttct ||
			$city == $hlc ||$city == $ilc ||$city == $phc ||$city == $km ||$city == $matsu ||$city == $kl){
	$count_s++;
	echo "<tr>";
		echo "<td>";
			echo $school_id;//學校編號
		echo "</td>";
		echo "<td>";
			echo $school;//學校名稱
		echo "</td>";
		
		if($p1 == '1'){
			echo "<td>";
			if($point1 == 1) echo '※';//指標一
			echo "</td>";}
		if($p2 == '1'){
			echo "<td>";
			if($point2 == 1) echo '※';//指標二
			echo "</td>";}
		if($p3 == '1'){
			echo "<td>";
			if($point3 == 1) echo '※';//指標三
			echo "</td>";}
		if($p4 == '1'){
			echo "<td>";
			if($point4 == 1) echo '※';//指標四
			echo "</td>";}
		if($p5 == '1'){
			echo "<td>";
			if($point5 == 1) echo '※';//指標五
			echo "</td>";}
		if($p6 == '1'){
			echo "<td>";
			if($point6 == 1) echo '※';//指標六
			echo "</td>";}
		if($sa1_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a1_1);//$a1_1
			echo "</td>";}
		if($sa1_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a1_2);//$a1_2
			echo "</td>";}
		if($sa2_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a2_1);//$a2_1
			echo "</td>";}
		if($sa2_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a2_2);//$a2_2
			echo "</td>";}
		if($sa2_3 == '1'){
			echo "<td div align='right'>";
			echo number_format($a2_3);//$a2_3
			echo "</td>";}
		if($sa3_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a3_1);//$a3_1
			echo "</td>";}
		if($sa3_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a3_2);//$a3_2
			echo "</td>";}
		if($sa4_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a4_2_1);//$a4_2_1
			echo "</td>";}
		if($sa4_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a4_2_2);//$a4_2_2
			echo "</td>";}
		if($sa4_3 == '1'){
			echo "<td div align='right'>";
			echo number_format($a4_1);//$a4_1
			echo "</td>";}
		if($sa4_4 == '1'){
			echo "<td div align='right'>";
			echo number_format($a4_2);//$a4_2
			echo "</td>";}
		if($sa5_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a5_1);//$a5_1
			echo "</td>";}
		if($sa5_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a5_2);//$a5_2
			echo "</td>";}
		if($sa6_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a6_1);//$a6_1
			echo "</td>";}
		if($sa6_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a6_2);//$a6_2
			echo "</td>";}
		if($sa7_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a7_1);//$a7_1
			echo "</td>";}
		if($sa7_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a7_2);//$a7_2
			echo "</td>";}
		if($sa7_3 == '1'){
			echo "<td div align='right'>";
			echo number_format($a7_3);//$a7_3
			echo "</td>";}
		if($sa8_1 == '1'){
			echo "<td div align='right'>";
			echo number_format($a8_1);//$a8_1
			echo "</td>";}
		if($sa8_2 == '1'){
			echo "<td div align='right'>";
			echo number_format($a8_2);//$a8_2
			echo "</td>";}
		if($sa8_3 == '1'){
			echo "<td div align='right'>";
			echo number_format($a8_3);//$a8_3
			echo "</td>";}
		echo "<td div align="."right".">".number_format($total)."</td>";
		$p1_1=$p1_1+$a1_1;
		$p1_2=$p1_2+$a1_2;
		$p2_1=$p2_1+$a2_1;
		$p2_2=$p2_2+$a2_2;
		$p2_3=$p2_3+$a2_3;
		$p3_1=$p3_1+$a3_1;
		$p3_2=$p3_2+$a3_2;
		$p4_2_1=$p4_2_1+$a4_2_1;
		$p4_2_2=$p4_2_2+$a4_2_2;				 
		$p4_1=$p4_1+$a4_1;
		$p4_2=$p4_2+$a4_2;
		$p5_1=$p5_1+$a5_1;
		$p5_2=$p5_2+$a5_2;
		$p6_1=$p6_1+$a6_1;
		$p6_2=$p6_2+$a6_2;
		$p7_1=$p7_1+$a7_1;
		$p7_2=$p7_2+$a7_2;
		$p7_3=$p7_3+$a7_3;
		$p8_1=$p8_1+$a8_1;
		$p8_2=$p8_2+$a8_2;
 		$p8_3=$p8_3+$a8_3;
}	
}
$total = $p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1+$p4_2+$p4_2_1+$p4_2_2+$p5_1+$p5_2+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;
?>
  <tr>
    <td>全部合計</td>
    <td align="right"><div align="right"><? echo number_format($count_s);?></td>
	<?
	if($p1 == '1') {echo "<td></td>";}
	if($p2 == '1') {echo "<td></td>";}
	if($p3 == '1') {echo "<td></td>";}
	if($p4 == '1') {echo "<td></td>";}
	if($p5 == '1') {echo "<td></td>";}
	if($p6 == '1') {echo "<td></td>";}
    if($sa1_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p1_1)."</td>";}
    if($sa1_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p1_2)."</td>";}
    if($sa2_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p2_1)."</td>";}
    if($sa2_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p2_2)."</td>";}
    if($sa2_3 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p2_3)."</td>";}
    if($sa3_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p3_1)."</td>";}
    if($sa3_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p3_2)."</td>";}
    if($sa4_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p4_2_1)."</td>";}
    if($sa4_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p4_2_2)."</td>";}
    if($sa4_3 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p4_1)."</td>";}
    if($sa4_4 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p4_2)."</td>";}
    if($sa5_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p5_1)."</td>";}
    if($sa5_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p5_2)."</td>";}
    if($sa6_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p6_1)."</td>";}
    if($sa6_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p6_2)."</td>";}
    if($sa7_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p7_1)."</td>";}
    if($sa7_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p7_2)."</td>";}
    if($sa7_3 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p7_3)."</td>";}
    if($sa8_1 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p8_1)."</td>";}
    if($sa8_2 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p8_2)."</td>";}
    if($sa8_3 == '1') {echo "<td align="."right"."><div align="."right".">".number_format($p8_3)."</td>";}
	?>
    <td align="right"><div align="right"><? echo number_format($total);?></td>
  </tr>
