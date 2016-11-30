<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username';";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$edu = $row[1];
	$eduman = $row[2];
	$examine = $row[3];
	$eduno = $row[4];
}
echo $username."_";
echo $edu."_";
echo $eduman."【檢視縣市申請結果】";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3" nowrap="nowrap" align="center">序號</td>
		<td rowspan="3" nowrap="nowrap" align="center">縣市名稱</td>
		<td colspan="2">1.推展親職教育活動</td>
		<td colspan="3">2.原住民及離島地區學校辦理學習輔導</td>
		<td colspan="2">3.補助學校發展教育特色</td>
		<td colspan="4">4.修繕離島或偏遠地區師生宿舍</td>
		<td colspan="2">5.充實學校基本教學設備</td>
		<td colspan="2">6.發展原住民教育文化特色及充實設備器材</td>
		<td colspan="3">7.補助交通不便學校交通車</td>
		<td colspan="3">8.整修學校社區化活動場所</td>
		<td rowspan="3" align="center">縣市申請金額</td>
	</tr>
	<tr>
		<td rowspan="2" align="center">親職教育活動</td>
		<td rowspan="2" align="center">目標學生家庭訪視輔導</td>
		<td rowspan="2" align="center">課後學習輔導</td>
		<td rowspan="2" align="center">寒暑假學習輔導</td>
		<td rowspan="2" align="center">住校生夜間學校輔導 </td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td colspan="2" align="center">教師宿舍</td>
		<td colspan="2" align="center">學生宿舍</td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center">租車費</td>
		<td rowspan="2" align="center">交通費</td>
		<td rowspan="2" align="center">購交通車費</td>
		<td rowspan="2" align="center">綜合球場</td>
		<td rowspan="2" align="center">小型集會風雨教室</td>
		<td rowspan="2" align="center">運動場</td>
	</tr>
	<tr>
		<td align="center">經常門</td>
		<td align="center">資本門</td>
		<td align="center">經常門</td>
		<td align="center">資本門</td>
	</tr>
<?
//各縣市申請金額
$sql = "select  *  from 100city_money order by id";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$city_serial++;
	$a1_1=$row[2];
	$a1_2=$row[3];
	$a2_1=$row[4];
	$a2_2=$row[5];
	$a2_3=$row[6];
	$a3_1=$row[19];
	$a3_2=$row[20];
	$a4_1=$row[8];
	$a4_2=$row[9];
	$a5=$row[10];
	$a6_1=$row[21];
	$a6_2=$row[22];
	$a7_1=$row[12];
	$a7_2=$row[13];
	$a7_3=$row[14];
	$a8_1=$row[15];
	$a8_2=$row[16];
 	$a8_3=$row[17];
	$total = $row[18];
				 
	echo "<tr height='46'>";
	echo "<td align='center'>";
	echo $city_serial;//序號
	echo "</td>";
	echo "<td align='center'>";
	echo "$row[1]";//縣市名稱
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[2]";//a1_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[3]";//a1_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[4]";//a2_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[5]";//a2_2
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo "$row[6]";//a2_3
	echo "</td>";						
	echo "<td>"."<div align='right'>";
	echo "$row[19]";//a3_1
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo "$row[20]";//a3_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[8]";//a4_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[9]";//a4_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[10]";//a5
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[21]";//a6_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[22]";//a6_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[12]";//a7_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[13]";//a7_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[14]";//a7_3
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[15]";//a8_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[16]";//a8_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[17]";//a8_3
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo "$row[18]";
	echo "</td>";//total
	echo "<td>"."<div align='right'>";

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
?>
	<tr>
		<td height="46">合計</td>
		<td><div align="right"><? echo $p1_1;?></div></td>
		<td><div align="right"><? echo $p1_2;?></div></td>
		<td><div align="right"><? echo $p2_1;?></div></td>
		<td><div align="right"><? echo $p2_2;?></div></td>
		<td><div align="right"><? echo $p2_3;?></div></td>
		<td><div align="right"><? echo $p3_1;?></div></td>
		<td><div align="right"><? echo $p3_2;?></div></td>
		<td><div align="right"><? echo $p4_1;?></div></td>
		<td><div align="right"><? echo $p4_2;?></div></td>
		<td><div align="right"><? echo $p5;?></div></td>
		<td><div align="right"><? echo $p6_1;?></div></td>
		<td><div align="right"><? echo $p6_2;?></div></td>
		<td><div align="right"><? echo $p7_1;?></div></td>
		<td><div align="right"><? echo $p7_2;?></div></td>
		<td><div align="right"><? echo $p7_3;?></div></td>
		<td><div align="right"><? echo $p8_1;?></div></td>
		<td><div align="right"><? echo $p8_2;?></div></td>
		<td><div align="right"><? echo $p8_3;?></div></td>
		<td><div align="right">
		<? echo $p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1+$p4_2+$p5+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;?>
		</div></td>
	</tr>
</table>
<?php include "../xSchoolForm/print_button.php"; ?>