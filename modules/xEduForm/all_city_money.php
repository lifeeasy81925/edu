<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_edu.php";
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

<?	//把各個縣市的金額分門別類的寫到資料庫
	//縣市分類，寫入資料庫，新北市
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
	//國小
	$sql_city = "select  *  from 100element_examine_money where school like '新北市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
		
	}	$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '新北市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
	
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
		
		/*echo $row[0];
		echo "<br>";
		*/
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	//echo $i;
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	
	//echo $total_a2_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='01'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，宜蘭縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
	//國小
	$sql_city = "select  *  from 100element_examine_money where school like '宜蘭縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
	
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '宜蘭縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
	
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}	
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='06'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，桃園縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
	//國小
	$sql_city = "select  *  from 100element_examine_money where school like '桃園縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}

	//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '桃園縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}	
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='07'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，新竹縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '新竹縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
		//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '新竹縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}	
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='08'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，苗栗縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '苗栗縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '苗栗縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='09'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，台
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '臺中市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			
		//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '臺中市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='03'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，彰化縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '彰化縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3

	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '彰化縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='10'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，南投縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '南投縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '南投縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='11'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，雲林縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '雲林縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '雲林縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='12'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，嘉義縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '嘉義縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '嘉義縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
	/*echo $row[0];
	echo "<br>";
	*/
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
		
		/*echo $row[0];
		echo "<br>";
		*/
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
/*	echo '11'."__".number_format($total_a1_1);echo "<br>";
	echo '12'."__".number_format($total_a1_2);echo "<br>";
	echo '21'."__".number_format($total_a2_1);echo "<br>";
	echo '22'."__".number_format($total_a2_2);echo "<br>";
	echo '23'."__".number_format($total_a2_3);echo "<br>";
	echo '31'."__".number_format($total_a3_1);echo "<br>";
	echo '32'."__".number_format($total_a3_2);echo "<br>";
	echo '411'."__".number_format($total_a4_1_1);echo "<br>";
	echo '412'."__".number_format($total_a4_1_2);echo "<br>";
	echo '421'."__".number_format($total_a4_2_1);echo "<br>";
	echo '422'."__".number_format($total_a4_2_2);echo "<br>";
	echo '51'."__".number_format($total_a5_1);echo "<br>";
	echo '52'."__".number_format($total_a5_2);echo "<br>";
	echo '61'."__".number_format($total_a6_1);echo "<br>";
	echo '62'."__".number_format($total_a6_2);echo "<br>";
	echo '71'."__".number_format($total_a7_1);echo "<br>";
	echo '72'."__".number_format($total_a7_2);echo "<br>";
	echo '73'."__".number_format($total_a7_3);echo "<br>";
	echo '81'."__".number_format($total_a8_1);echo "<br>";
	echo '82'."__".number_format($total_a8_2);echo "<br>";
	echo '82'."__".number_format($total_a8_3);
	echo "<br>";*/
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='13'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，台南市
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '臺南市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	//國中
		$sql_city = "select  *  from 100junior_examine_money where school like '臺南市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='04'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，高雄市
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '高雄市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '高雄市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='05'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，屏東縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '屏東縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '屏東縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='14'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，台東縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '臺東縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '臺東縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='15'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，花蓮縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '花蓮縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '花蓮縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='16'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，澎湖縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '澎湖縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '澎湖縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='17'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，基隆市
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '基隆市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '基隆市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='18'";
	mysql_query($sql);
	
		//縣市分類，寫入資料庫，新竹市
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '新竹市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '新竹市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
	
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
		
		/*echo $row[0];
		echo "<br>";
		*/
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='19'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，嘉義市
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '嘉義市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '嘉義市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='20'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，台北市
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '臺北市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '臺北市%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='02'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，金門縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '金門縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '金門縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='21'";
	mysql_query($sql);

		//縣市分類，寫入資料庫，連江縣
		$total_money = 0;
		$total_a1_1 = 0;
		$total_a1_2 = 0;
		$total_a2_1 = 0;
		$total_a2_2 = 0;
		$total_a2_3 = 0;
		$total_a3_1 = 0;
		$total_a3_2 = 0;
		$total_a4_1_1 = 0;
		$total_a4_1_2 = 0;
		$total_a4_2_1 = 0;
		$total_a4_2_2 = 0;
		$total_a5_1 = 0;
		$total_a5_2 = 0;
		$total_a6_1 = 0;
		$total_a6_2 = 0;
		$total_a7_1 = 0;
		$total_a7_2 = 0;
		$total_a7_3 = 0;
		$total_a8_1 = 0;
		$total_a8_2 = 0;
		$total_a8_3 = 0;
		//國小
	$sql_city = "select  *  from 100element_examine_money where school like '連江縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100element_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	
			//國中
	$sql_city = "select  *  from 100junior_examine_money where school like '連江縣%';";
	
	$result_city = mysql_query($sql_city);
	while($row = mysql_fetch_row($result_city)){
		//取補助項目三細項審核資料
	$sql_a3 = "select  *  from 100junior_examine_a3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($a3row = mysql_fetch_row($result_a3)){
		$a3_1_1 = $a3row[11];	//縣市審核特色一經常門金額
		$a3_1_2 = $a3row[12];	//縣市審核特色一資本門金額
		$a3_2_1 = $a3row[13];	//縣市審核特色二經常門金額
		$a3_2_2 = $a3row[14];	//縣市審核特色二資本門金額
	}
		$total_a1_1 = $total_a1_1 + $row[1]; //a1_1
		$total_a1_2 = $total_a1_2 + $row[2]; //a1_2
		$total_a2_1 = $total_a2_1 + $row[3]; //a2_1
		$total_a2_2 = $total_a2_2 + $row[4]; //a2_2
		$total_a2_3 = $total_a2_3 + $row[5]; //a2_3
		$total_a3_1 = $total_a3_1 + $a3_1_1+$a3_2_1; //a3_1
		$total_a3_2 = $total_a3_2 + $a3_1_2+$a3_2_2; //a3_2
		$total_a4_1_1 = $total_a4_1_1 + $row[7]; //a4_1_1
		$total_a4_1_2 = $total_a4_1_2 + $row[8]; //a4_1_2
		$total_a4_2_1 = $total_a4_2_1 + $row[30]; //a4_2_1
		$total_a4_2_2 = $total_a4_2_2 + $row[31]; //a4_2_2
		$total_a5_1 = $total_a5_1 + $row[40]; //a5_1
		$total_a5_2 = $total_a5_2 + $row[41]; //a5_2
		$total_a6_1 = $total_a6_1 + $row[28]; //a6_1
		$total_a6_2 = $total_a6_2 + $row[29]; //a6_2
		$total_a7_1 = $total_a7_1 + $row[11]; //a7_1
		$total_a7_2 = $total_a7_2 + $row[12]; //a7_2
		$total_a7_3 = $total_a7_3 + $row[13]; //a7_3
		$total_a8_1 = $total_a8_1 + $row[14]; //a8_1
		$total_a8_2 = $total_a8_2 + $row[15]; //a8_2
		$total_a8_3 = $total_a8_3 + $row[16]; //a8_3	
	}
	$total_money = $total_a1_1+$total_a1_2+$total_a2_1+$total_a2_2+$total_a2_3+$total_a3_1+$total_a3_2+$total_a4_1_1+$total_a4_1_2+$total_a4_2_1+$total_a4_2_2+$total_a5_1+$total_a5_2+$total_a6_1+$total_a6_2+$total_a7_1+$total_a7_2+$total_a7_3+$total_a8_1+$total_a8_2+$total_a8_3;
	//echo $city."__".number_format($total_a1_1);
	//echo "<br>";
	$sql = "update 100city_money set  a1_1 = '$total_a1_1', a1_2 = '$total_a1_2', a2_1 = '$total_a2_1', a2_2 = '$total_a2_2', a2_3 = '$total_a2_3', a3_1 = '$total_a3_1', a3_2 = '$total_a3_2', a4_1_1 = '$total_a4_1_1', a4_1_2 = '$total_a4_1_2', a4_2_1 = '$total_a4_2_1', a4_2_2 = '$total_a4_2_2', a5_1 = '$total_a5_1', a5_2 = '$total_a5_2', a6_1 = '$total_a6_1', a6_2 = '$total_a6_2', a7_1 = '$total_a7_1', a7_2 = '$total_a7_2', a7_3 = '$total_a7_3', a8_1 = '$total_a8_1', a8_2 = '$total_a8_2', a8_3 = '$total_a8_3', total = '$total_money' where id='22'";
	mysql_query($sql);
	//各縣市的申請金額寫入完畢
?>
<?


//查看個各縣市申請金額
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
	$a4_1_1=$row[25];
	$a4_1_2=$row[26];
	$a4_2_1=$row[27];
	$a4_2_2=$row[28];
	$a5_1=$row[29];
	$a5_2=$row[30];
	$a6_1=$row[31];
	$a6_2=$row[32];
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
	echo number_format($row[2]);//a1_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[3]);//a1_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[4]);//a2_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[5]);//a2_2
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($row[6]);//a2_3
	echo "</td>";						
	echo "<td>"."<div align='right'>";
	echo number_format($row[19]);//a3_1
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($row[20]);//a3_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[27]);//a4_1_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[28]);//a4_1_2
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($row[25]);//a4_2_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[26]);//a4_2_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[29]);//a5_1
	echo "</td>";
	
	echo "<td>"."<div align='right'>";
	echo number_format($row[30]);//a5_2
	echo "</td>";
	
	echo "<td>"."<div align='right'>";
	echo number_format($row[31]);//a6_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[32]);//a6_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[12]);//a7_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[13]);//a7_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[14]);//a7_3
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[15]);//a8_1
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[16]);//a8_2
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[17]);//a8_3
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($row[18]);
	echo "</td>";//total
	

	$p1_1=$p1_1+$row[2];
	$p1_2=$p1_2+$row[3];
	$p2_1=$p2_1+$row[4];
	$p2_2=$p2_2+$row[5];
	$p2_3=$p2_3+$row[6];
	$p3_1=$p3_1+$row[19];
	$p3_2=$p3_2+$row[20];
	$p4_1_1=$p4_1_1+$row[25];
	$p4_1_2=$p4_1_2+$row[26];
	$p4_2_1=$p4_2_1+$row[27];
	$p4_2_2=$p4_2_2+$row[28];
	$p5_1=$p5_1+$row[29];
	$p5_2=$p5_2+$row[30];
	$p6_1=$p6_1+$row[31];
	$p6_2=$p6_2+$row[32];
	$p7_1=$p7_1+$row[12];
	$p7_2=$p7_2+$row[13];
	$p7_3=$p7_3+$row[14];
	$p8_1=$p8_1+$row[15];
	$p8_2=$p8_2+$row[16];
	$p8_3=$p8_3+$row[17];													
	}
?>
	<tr>
		<td height="46" colspan="2" align="center">合計</td>
        <td><div align="right"><? echo number_format($p1_1);?></div></td>
		<td><div align="right"><? echo number_format($p1_2);?></div></td>
		<td><div align="right"><? echo number_format($p2_1);?></div></td>
		<td><div align="right"><? echo number_format($p2_2);?></div></td>
		<td><div align="right"><? echo number_format($p2_3);?></div></td>
		<td><div align="right"><? echo number_format($p3_1);?></div></td>
		<td><div align="right"><? echo number_format($p3_2);?></div></td>
		<td><div align="right"><? echo number_format($p4_2_1);?></div></td>
		<td><div align="right"><? echo number_format($p4_2_2);?></div></td>
        <td><div align="right"><? echo number_format($p4_1_1);?></div></td>
        <td><div align="right"><? echo number_format($p4_1_2);?></div></td>
		<td><div align="right"><? echo number_format($p5_1);?></div></td>
        <td><div align="right"><? echo number_format($p5_2);?></div></td>
		<td><div align="right"><? echo number_format($p6_1);?></div></td>
		<td><div align="right"><? echo number_format($p6_2);?></div></td>
		<td><div align="right"><? echo number_format($p7_1);?></div></td>
		<td><div align="right"><? echo number_format($p7_2);?></div></td>
		<td><div align="right"><? echo number_format($p7_3);?></div></td>
		<td><div align="right"><? echo number_format($p8_1);?></div></td>
		<td><div align="right"><? echo number_format($p8_2) ;?></div></td>
		<td><div align="right"><? echo number_format($p8_3);?></div></td>
		<td><div align="right">
		<? echo number_format($p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1_1+$p4_1_2+$p4_2_1+$p4_2_2+$p5_1+$p5_2+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3);
			?>
		</div></td>
	</tr>
</table>
<?php include "../xSchoolForm/print_button.php"; ?>