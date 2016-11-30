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
			$cityno = $row[4];
			}
  echo $username;
  echo $city;
  echo $cityman."【學校申請結果列表】";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<table border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="3" nowrap="nowrap">學校編號</td>
    <td rowspan="3" nowrap="nowrap">　學校名稱　　</td>
    <td colspan="2">1.推展親職教育活動</td>
    <td colspan="3">2.原住民及離島地區學校辦理學習輔導</td>
    <td colspan="2">3.補助學校發展教育特色</td>
    <td colspan="4">4.修繕離島或偏遠地區師生宿舍</td>
    <td colspan="2">5.充實學校基本教學設備</td>
    <td colspan="2">6.發展原住民教育文化特色及充實設備器材</td>
    <td colspan="3">7.補助交通不便學校交通車</td>
    <td colspan="3">8.整修學校社區化活動場所</td>
    <td rowspan="3" align="center">各校總合</td>
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
//補助金額-國小			
$sql_element = "select  *  from 100element_money where school like '%$city%' order by 100element_money.account;";
//$sql_element = "Select 100element_money.*, edu_school.* FROM edu__city INNER JOIN (edu_school INNER JOIN 100element_money ON edu_school.account = 100element_money.account) ON edu_city.userlevel = edu_school.userlevel;";
$result_element = mysql_query($sql_element);
while($row = mysql_fetch_row($result_element)){
	$school_id=$row[0];
	$a1_1=$row[1];
	$a1_2=$row[2];
	$a2_1=$row[3];
	$a2_2=$row[4];
	$a2_3=$row[5];
	$a3_1=$row[26];
	$a3_2=$row[27];
	$a4_1=$row[7];
	$a4_2=$row[8];
	$a4_2_1=$row[30];
	$a4_2_2=$row[31];
//	$a5=$row[9];
	$a5_1=$row[32];
	$a5_2=$row[33];
	$a6_1=$row[28];
	$a6_2=$row[29];
	$a7_1=$row[11];
	$a7_2=$row[12];
	$a7_3=$row[13];
	$a8_1=$row[14];
	$a8_2=$row[15];
 	$a8_3=$row[16];
	//$school = $row[17];
	$school = str_replace("市立","",str_replace("縣立","",$row[17]));//縮減學校名稱
	$total = $a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_1+$a4_2+$a4_2_1+$a4_2_2+$a5_1+$a5_2+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3;
	$count_s++;
				 
	echo "<tr>";
		echo "<td>";
			echo $school_id;//學校編號
		echo "</td>";
		echo "<td>";
			echo $school;//學校名稱
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a1_1);//$a1_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a1_2);//$a1_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a2_1);//$a2_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a2_2);//$a2_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a2_3);//$a2_3
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a3_1);//$a3_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a3_2);//$a3_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_2_1);//$a4_2_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_2_2);//$a4_2_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_1);//$a4_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_2);//$a4_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a5_1);//$a5_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a5_2);//$a5_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a6_1);//$a6_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a6_2);//$a6_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a7_1);//$a7_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a7_2);//$a7_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a7_3);//$a7_3
		echo "</td>";	
		echo "<td div align='right'>";
			echo number_format($a8_1);//$a8_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a8_2);//$a8_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a8_3);//$a8_3
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_2_1+$a4_2_2+$a4_1+$a4_2+$a5_1+$a5_2+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3);
		echo "</td>";
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
?>
<?
//補助金額-國中			
//$sql_junior = "Select 100junior_money.*, edu__school.* FROM edu__city INNER JOIN (edu__school INNER JOIN 100junior_money ON edu__school.account = 100junior_money.account) ON edu__city.userlevel = edu__school.userlevel;";
$sql_junior = "select  *  from 100junior_money where school like '%$city%' order by 100junior_money.account;";
$result_junior = mysql_query($sql_junior);
while($row = mysql_fetch_row($result_junior)){
	$school_id=$row[0];
	$a1_1=$row[1];
	$a1_2=$row[2];
	$a2_1=$row[3];
	$a2_2=$row[4];
	$a2_3=$row[5];
	$a3_1=$row[26];
	$a3_2=$row[27];
	$a4_1=$row[7];
	$a4_2=$row[8];
	$a4_2_1=$row[30];
	$a4_2_2=$row[31];
//	$a5=$row[9];
	$a5_1=$row[32];
	$a5_2=$row[33];
	$a6_1=$row[28];
	$a6_2=$row[29];
	$a7_1=$row[11];
	$a7_2=$row[12];
	$a7_3=$row[13];
	$a8_1=$row[14];
	$a8_2=$row[15];
 	$a8_3=$row[16];
	//$school = $row[17];
	$school = str_replace("市立","",str_replace("縣立","",$row[17]));//縮減學校名稱
	$total = $a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_1+$a4_2+$a4_2_1+$a4_2_2+$a5_1+$a5_2+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3;
	$count_s++;
				 
	echo "<tr>";
		echo "<td>";
			echo $school_id;//學校編號
		echo "</td>";
		echo "<td>";
			echo $school;//學校名稱
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a1_1);//$a1_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a1_2);//$a1_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a2_1);//$a2_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a2_2);//$a2_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a2_3);//$a2_3
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a3_1);//$a3_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a3_2);//$a3_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_2_1);//$a4_2_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_2_2);//$a4_2_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_1);//$a4_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a4_2);//$a4_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a5_1);//$a5_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a5_2);//$a5_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a6_1);//$a6_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a6_2);//$a6_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a7_1);//$a7_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a7_2);//$a7_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a7_3);//$a7_3
		echo "</td>";	
		echo "<td div align='right'>";
			echo number_format($a8_1);//$a8_1
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a8_2);//$a8_2
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a8_3);//$a8_3
		echo "</td>";
		echo "<td div align='right'>";
			echo number_format($a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_2_1+$a4_2_2+$a4_1+$a4_2+$a5_1+$a5_2+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3);
		echo "</td>";
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
	$total = $p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1+$p4_2+$p4_2_1+$p4_2_2+$p5_1+$p5_2+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;
?>
  <tr>
    <td>全部合計</td>
    <td align="right"><div align="right"><? echo number_format($count_s);?></td>
    <td align="right"><div align="right"><? echo number_format($p1_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p1_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p2_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p2_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p2_3);?></td>
    <td align="right"><div align="right"><? echo number_format($p3_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p3_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p4_2_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p4_2_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p4_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p4_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p5_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p5_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p6_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p6_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p7_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p7_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p7_3);?></td>
    <td align="right"><div align="right"><? echo number_format($p8_1);?></td>
    <td align="right"><div align="right"><? echo number_format($p8_2);?></td>
    <td align="right"><div align="right"><? echo number_format($p8_3);?></td>
    <td align="right"><div align="right"><? echo number_format($total);?></td>
  </tr>
</table>