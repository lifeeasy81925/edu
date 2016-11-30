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
            $edu = $row[1];
			$eduman = $row[2];
			$examine = $row[3];
			$eduno = $row[4];
			$exam_1 = $row[5];//補助項目一
			$exam_2 = $row[6];//補助項目二
			$exam_3 = $row[7];//補助項目三
			$exam_4 = $row[8];//補助項目四
			$exam_5 = $row[9];//補助項目五
			$exam_6 = $row[10];//補助項目六
			$exam_7 = $row[11];//補助項目七
			$exam_8 = $row[12];//補助項目八
}
$city = $_GET["id"];
echo $username;
echo $edu;
echo $eduman."<p>";
//	$result_e_a_1 = mysql_query($sql_e_a_1);
//	$result_e_a_2 = mysql_query($sql_e_a_2);
//	$row1=$xoopsDB -> fetchArray($result_e_a_1);
//	$row2=$xoopsDB -> fetchArray($result_e_a_2);
/*
  //補助金額-		
	$sql = "select  *  from 100education_money ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
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
				 $a6_1=$row[21];
				 $a6_2=$row[22];
//累計核定金額		
				 $p1_1=$p1_1+$row[2];
				 $p1_2=$p1_2+$row[3];
				 $p2_1=$p2_1+$row[4];
				 $p2_2=$p2_2+$row[5];
				 $p2_3=$p2_3+$row[6];
				 $p3_1=$p3_1+$row[19];
				 $p3_2=$p3_2+$row[20];
				 $p4_1=$p4_1+$row[8];
				 $p4_2=$p4_2+$row[9];
				 $p5=$p5+$row[10];
				 $p6_1=$p6_1+$row[21];
				 $p6_2=$p6_2+$row[22];
				 $p7_1=$p7_1+$row[12];
				 $p7_2=$p7_2+$row[13];
				 $p7_3=$p7_3+$row[14];
				 $p8_1=$p8_1+$row[15];
				 $p8_2=$p8_2+$row[16];
 				 $p8_3=$p8_3+$row[17];													
	}
	$total_a1 = $p1_1 + $p1_2;
	$total_a2 = $p2_1+ $p2_2 + $p2_3;
	$total_a3 = $p3_1+ $p3_2;
	$total_a4 = $p4_1+ $p4_2;
	$total_a5 = $p5;
	$total_a6 = $p6_1+ $p6_2;
	$total_a7 = $p7_1+ $p7_2 + $p7_3;
	$total_a8 = $p8_1+ $p8_2 + $p8_3;
	$total_all = $p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1+$p4_2+$p5+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;
//	echo $total_a1;
//	echo $total_all;
*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<b>審核縣市：<? echo $city;?></b><br />
<hr />
<p>
<?php
//if($exam_1 == '1'){echo "<a href="."city_list_2.php?id=1"." target="."_blank".">"."補助項目一,親職教育"."</a>".'<br>'.'<br>';}

if($exam_1 == '1'){
echo "<a href="."a1_examine_table.php?id=$city"." target=_self>"."補助項目一【親職教育】"."</a>";
//echo "<br>---（已核定經常門：". $total_a1."元；總計新臺幣：". $total_a1. "元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_2 == '1'){
echo "<a href="."a2_examine_table.php?id=$city"." target=_self>"."補助項目二【學生學習輔導】"."</a>";
//echo "<br>---（已核定經常門：". $total_a2."元；總計新臺幣：". $total_a2."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_3 == '1'){
echo "<a href="."a3_examine_table.php?id=$city"." target=_self>"."補助項目三【學校申請發展特色】"."</a>";
//echo "<br>---（已核定經常門：". $p3_1."元；資本門：". $p3_2."元；總計新臺幣：". $total_a3."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_4 == '1'){
echo "<a href="."a4_examine_table.php?id=$city"." target=_self>"."補助項目四【師生宿舍】"."</a>";
//echo "<br>---（已核定經常門：". $total_a4."元；總計新臺幣：". $total_a4. "元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_5 == '1'){
echo "<a href="."a5_examine_table.php?id=$city"." target=_self>"."補助項目五【充實學校基本設備】"."</a>";
//echo "<br>---（已核定資本門：". $total_a5."元；總計新臺幣：". $total_a5."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_6 == '1'){
echo "<a href="."a6_examine_table.php?id=$city"." target=_self>"."補助項目六【發展原住民文化特色及充實設備器材】"."</a>";
//echo "<br>---（已核定經常門：". $p6_1."元；資本門：". $p6_2."元；總計新臺幣：". $total_a6."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_7 == '1'){
echo "<a href="."a7_examine_table.php?id=$city"." target=_self>"."補助項目七【學校交通車】"."</a>";
//echo "<br>---（已核定經常門：". $total_a7."元；總計新臺幣：". $total_a7."元整）<br>";
echo "<hr>";
}
echo "<p>";
if($exam_8 == '1'){
echo "<a href="."a8_examine_table.php?id=$city"." target=_self>"."補助項目八【整修學校社區化活動場所】"."</a>";
//echo "<br>---（已核定經常門：". $total_a8."元；總計新臺幣：". $total_a8."元整）<br>";
echo "<hr>";
}
?>
<!--
<div align="left" style="background-color:#FC9">
已核准總經費為新臺幣：<? echo $total_all;?>　元整。</div>
<p>
-->
<?php
include "../../footer.php";
?>