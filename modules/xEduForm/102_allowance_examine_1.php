<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='education_index.php'">
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$edu = $row[1];		//cityid,帳號
	$eduman = $row[2];	//縣市名稱
	$examine = $row[3];	//身分別, 1縣市, 2教育部
	$eduno = $row[4];	//縣市編號
	$exam_1 = $row[5];	//補助項目一
	$exam_2 = $row[6];	//補助項目二
	$exam_3 = $row[7];	//補助項目三
	$exam_4 = $row[8];	//補助項目四
	$exam_5 = $row[9];	//補助項目五
	$exam_6 = $row[10];	//補助項目六
	$exam_7 = $row[11];	//補助項目七
	//$exam_8 = $row[12];	//補助項目八			
}
echo $username."_";
echo $edu."_";
echo $eduman;

/*
//	$result_e_a_1 = mysql_query($sql_e_a_1);
//	$result_e_a_2 = mysql_query($sql_e_a_2);
//	$row1=$xoopsDB -> fetchArray($result_e_a_1);
//	$row2=$xoopsDB -> fetchArray($result_e_a_2);

//加總全國教育部審核金額	
$sql = "select  *  from 100education_money ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$city_no = $row[0];
	$city_name = $row[1];
	$a1_1=$row[2];
	$a1_2=$row[3];
	$a2_1=$row[4];
	$a2_2=$row[5];
	$a2_3=$row[6];
	$a3=$row[7];
	$a4_1=$row[8];
	$a4_2=$row[9];
	$a5=$row[10];
	$a6=$row[11];
	$a7_1=$row[12];
	$a7_2=$row[13];
	$a7_3=$row[14];
	$a8_1=$row[15];
	$a8_2=$row[16];
 	$a8_3=$row[17];
	$total = $row[18];
	$a3_1=$row[19];
	$a3_2=$row[20];
	$a3_1_1=$row[21];
	$a3_1_2=$row[22];
	$a3_2_1=$row[23];
	$a3_2_2=$row[24];
	$a4_1_1=$row[25];
	$a4_1_2=$row[26];
	$a4_2_1=$row[27];
	$a4_2_2=$row[28];
	$a5_1=$row[29];
	$a5_2=$row[30];
	$a6_1=$row[31];
	$a6_2=$row[32];

	//累計審核金額		
	$p1_1=$p1_1+$a1_1;
	$p1_2=$p1_2+$a1_2;
	$p2_1=$p2_1+$a2_1;
	$p2_2=$p2_2+$a2_2;
	$p2_3=$p2_3+$a2_3;
	$p3_1=$p3_1_1+$a3_2_1;
	$p3_2=$p3_1_2+$a3_2_2;
	$p4_1=$p4_1_1+$a4_2_1;
	$p4_2=$p4_1_2+$a4_2_2;
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
	$total_a1 = $p1_1 + $p1_2;
	$total_a2 = $p2_1 + $p2_2 + $p2_3;
	$total_a3 = $p3_1 + $p3_2;
	$total_a4 = $p4_1 + $p4_2;
	$total_a5 = $p5_1 + $p5_2;
	$total_a6 = $p6_1 + $p6_2;
	$total_a7 = $p7_1 + $p7_2 + $p7_3;
	$total_a8 = $p8_1 + $p8_2 + $p8_3;
	$total_all = $total_a1 + $total_a2 + $total_a3 + $total_a4 + $total_a5 + $total_a6 + $total_a7 + $total_a8;
*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<?php
//if($exam_1 == '1'){echo "<a href="."city_list_2.php?id=1"." target="."_blank".">"."補助項目一,親職教育"."</a>".'<br>'.'<br>';}

if($exam_1 == '1'){
echo "<a href="."102_city_list_1.php?id=1"." target=_self>"."補助項目一：推展親職教育活動"."</a>";
//echo "<br>---（已核定經常門：".number_format($total_a1)."元；總計新臺幣：".number_format($total_a1). "元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_2 == '1'){
echo "<a href="."102_city_list_1.php?id=2"." target=_self>"."補助項目二：補助學校發展教育特色"."</a>";
//echo "<br>---（已核定經常門：".number_format($total_a2)."元；總計新臺幣：".number_format($total_a2)."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_3 == '1'){
echo "<a href="."102_city_list_1.php?id=3"." target=_self>"."補助項目三：修繕離島或偏遠地區師生宿舍"."</a>";
//echo "<br>---（已核定經常門：".number_format($p3_1)."元；資本門：".number_format($p3_2)."元；總計新臺幣：".number_format($total_a3)."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_4 == '1'){
echo "<a href="."102_city_list_1.php?id=4"." target=_self>"."補助項目四：充實學校基本教學設備"."</a>";
//echo "<br>---（已核定經常門：".number_format($p4_1)."元；資本門：".number_format($p4_2)."元；總計新臺幣：".number_format($total_a4). "元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_5 == '1'){
echo "<a href="."102_city_list_1.php?id=5"." target=_self>"."補助項目五：發展原住民教育文化特色及充實設備器材"."</a>";
//echo "<br>---（已核定經常門：".number_format($p5_1)."元；資本門：".number_format($p5_2)."元；總計新臺幣：".number_format($total_a5)."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_6 == '1'){
echo "<a href="."102_city_list_1.php?id=6"." target=_self>"."補助項目六：補助交通不便地區學校交通車"."</a>";
//echo "<br>---（已核定經常門：".number_format($p6_1)."元；資本門：".number_format($p6_2)."元；總計新臺幣：".number_format($total_a6)."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_7 == '1'){
echo "<a href="."102_city_list_1.php?id=7"." target=_self>"."補助項目七：整修學校社區化活動場所"."</a>";
//echo "<br>---（已核定經常門：".number_format($p7_1+$p7_2)."元；資本門：".number_format($p7_3)."元；總計新臺幣：".number_format($total_a7)."元整）<br>";
echo "<hr>";
}
echo "<p>";

?>
<!--
<div align="left" style="background-color:#FC9">
已核准總經費為新臺幣：<? echo number_format($total_all);?>　元整。</div>
-->
<?php
include "../../footer.php";
?>