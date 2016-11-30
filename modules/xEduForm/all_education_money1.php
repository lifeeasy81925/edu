<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
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
  echo $username;
  echo $edu;
  echo $eduman;
  echo "<br>";
?>
<?
	$school[0] = '新北市%';
	$school[1] = '臺北市%';
	$school[2] = '臺中市%';
	$school[3] = '臺南市%';
	$school[4] = '高雄市%';
	$school[5] = '宜蘭縣%';
	$school[6] = '桃園縣%';
	$school[7] = '新竹縣%';
	$school[8] = '苗栗縣%';
	$school[9] = '彰化縣%';
	$school[10] = '南投縣%';
	$school[11] = '雲林縣%';
	$school[12] = '嘉義縣%';
	$school[13] = '屏東縣%';
	$school[14] = '臺東縣%';
	$school[15] = '花蓮縣%';
	$school[16] = '澎湖縣%';
	$school[17] = '基隆市%';
	$school[18] = '新竹市%';
	$school[19] = '嘉義市%';
	$school[20] = '金門縣%';
	$school[21] = '連江縣%';

//1.推展親職教育活動	
	for($i = 0;$i <22; $i++){
		$a1_1 = 0;
		$a1_2 = 0;
		$sql_school = "select  account from 100element_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a1 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a1_1 = $a1_1 + $row_money[4];
				$a1_2 = $a1_2 + $row_money[5];
			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a1 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a1_1 = $a1_1 + $row_money[4];
				$a1_2 = $a1_2 + $row_money[5];

			}//while
		}//while
		$sql = "update 100education_money set  a1_1 = '$a1_1', a1_2 = '$a1_2' where city like '$school[$i]'";
		mysql_query($sql);
	}//for
	
//2.原住民及離島地區學校辦理學習輔導	
	for($i = 0;$i <22; $i++){
		$a2_1 = 0;
		$a2_2 = 0;
		$a2_3 = 0;
		$sql_school = "select  account from 100element_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a2 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a2_1 =$a2_1+ $row_money[5];
				$a2_2 =$a2_2+$row_money[6];
				$a2_3 =$a2_3+$row_money[7];
			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a2 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a2_1 =$a2_1+ $row_money[5];
				$a2_2 =$a2_2+$row_money[6];
				$a2_3 =$a2_3+$row_money[7];
			}//while
		}//while
		$sql = "update 100education_money set  a2_1 = '$a2_1', a2_2 = '$a2_2', a2_3 = '$a2_3' where city like '$school[$i]'";
		mysql_query($sql);
	}//for	
	
//3.補助學校發展教育特色
	for($i = 0;$i <22; $i++){
		$a3_1 = 0;
		$a3_2 = 0;

		$sql_school = "select  account from edu_school  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a3 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
/*				$test = $row_money[15]+ $row_money[17];
				$test2 =  $row_money[16]+ $row_money[18];
				echo $row_school[0]."__". $test."<br>";	
				echo $row_school[0]."__". $test2."<br>";	*/
				$a3_1 =$a3_1+ $row_money[15]+ $row_money[17];
				$a3_2 =$a3_2+ $row_money[16]+ $row_money[18];

			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a3 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
/*				$test = $row_money[15]+ $row_money[17];
				$test2 =  $row_money[16]+ $row_money[18];
				echo $row_school[0]."__". $test."<br>";	
				echo $row_school[0]."__". $test2."<br>";*/
				$a3_1 =$a3_1+ $row_money[15]+ $row_money[17];
				$a3_2 =$a3_2+ $row_money[16]+ $row_money[18];

			}//while
		}//while
		$sql = "update 100education_money set  a3_1 = '$a3_1', a3_2 = '$a3_2' where city like '$school[$i]'";
		mysql_query($sql);
	}//for
	
//4.修繕離島或偏遠地區師生宿舍
	for($i = 0;$i <22; $i++){
		$a4_1_1 = 0;
		$a4_1_2 = 0;
		$a4_2_1 = 0;
		$a4_2_2 = 0;

		$sql_school = "select  account from 100element_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a4 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a4_1_1 =$a4_1_1+ $row_money[4];
				$a4_1_2 =$a4_1_2+$row_money[5];
				$a4_2_1 =$a4_2_1+$row_money[9];
				$a4_2_2 =$a4_2_2+$row_money[10];

			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a4 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a4_1_1 =$a4_1_1+ $row_money[4];
				$a4_1_2 =$a4_1_2+$row_money[5];
				$a4_2_1 =$a4_2_1+$row_money[9];
				$a4_2_2 =$a4_2_2+$row_money[10];

			}//while
		}//while
		$sql = "update 100education_money set  a4_1_1 = '$a4_1_1', a4_1_2 = '$a4_1_2', a4_2_1 = '$a4_2_1', a4_2_2 = '$a4_2_2' where city like '$school[$i]'";
		mysql_query($sql);
	}//for				

//5.充實學校基本教學設備
	for($i = 0;$i <22; $i++){
		$a5_1 = 0;
		$a5_2 = 0;

		$sql_school = "select  account from 100element_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a5 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a5_1 =$a5_1+ $row_money[9];
				$a5_2 =$a5_2+$row_money[10];

			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a5 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a5_1 =$a5_1+ $row_money[9];
				$a5_2 =$a5_2+$row_money[10];

			}//while
		}//while
		$sql = "update 100education_money set  a5_1 = '$a5_1', a5_2 = '$a5_2' where city like '$school[$i]'";
		mysql_query($sql);
	}//for
	
//6.發展原住民教育文化特色及充實設備器材
	for($i = 0;$i <22; $i++){
		$a6_1 = 0;
		$a6_2 = 0;

		$sql_school = "select  account from 100element_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a6 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a6_1 =$a6_1+ $row_money[9];
				$a6_2 =$a6_2+$row_money[10];

			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a6 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a6_1 =$a6_1+ $row_money[9];
				$a6_2 =$a6_2+$row_money[10];

			}//while
		}//while
		$sql = "update 100education_money set  a6_1 = '$a6_1', a6_2 = '$a6_2' where city like '$school[$i]'";
		mysql_query($sql);
	}//for
	
//7.補助交通不便學校交通車
	for($i = 0;$i <22; $i++){
		$a7_1 = 0;
		$a7_2 = 0;
		$a7_3 = 0;
		$sql_school = "select  account from 100element_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a7 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a7_1 =$a7_1+ $row_money[5];
				$a7_2 =$a7_2+$row_money[6];
				$a7_3 =$a7_3+$row_money[7];
			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a7 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a7_1 =$a7_1+ $row_money[5];
				$a7_2 =$a7_2+$row_money[6];
				$a7_3 =$a7_3+$row_money[7];

			}//while
		}//while
		$sql = "update 100education_money set  a7_1 = '$a7_1', a7_2 = '$a7_2', a7_3 = '$a7_3' where city like '$school[$i]'";
		mysql_query($sql);
	}//for
//8.整修學校社區化活動場所
	for($i = 0;$i <22; $i++){
		$a8_1 = 0;
		$a8_2 = 0;
		$a8_3 = 0;
		$sql_school = "select  account from 100element_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100element_examine_a8 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a8_1 =$a8_1+ $row_money[13]+$row_money[14];
				$a8_2 =$a8_2+$row_money[6];
				$a8_3 =$a8_3+$row_money[7];

			}//while
		}//while
		
		$sql_school = "select  account from 100junior_examine_money  where school like '$school[$i]';";
		$result_school = mysql_query($sql_school);
		while($row_school = mysql_fetch_row($result_school)){
		
			$sql_money = "select  *  from 100junior_examine_a8 where account like '".$row_school[0]."';";
			$result_money = mysql_query($sql_money);
			while($row_money = mysql_fetch_row($result_money)){
				$a8_1 =$a8_1+ $row_money[13]+$row_money[14];
				$a8_2 =$a8_2+$row_money[6];
				$a8_3 =$a8_3+$row_money[7];
				
			}//while
		}//while
		$sql = "update 100education_money set  a8_1 = '$a8_1', a8_2 = '$a8_2', a8_3 = '$a8_3' where city like '$school[$i]'";
		mysql_query($sql);
	}//for	
//寫入總合
	for($i = 0;$i <22; $i++){
		$city_total = 0;
		$sql_city = "select  * from 100education_money  where city like '$school[$i]';";
		$result_city = mysql_query($sql_city);
		while($row = mysql_fetch_row($result_city)){
			$city_total = $row[2]+$row[3]+$row[4]+$row[5]+$row[6]+$row[8]+$row[9]+$row[11]+$row[12]+$row[13]+$row[14]+$row[15]+$row[16]+$row[17]+$row[19]+$row[20]+$row[21]+$row[22]+$row[23]+$row[24]+$row[25]+$row[26]+$row[27]+$row[28]+$row[29]+$row[30]+$row[31]+$row[32];
		}//while
		$sql = "update 100education_money set  total = '$city_total' where city like '$school[$i]'";
		mysql_query($sql);
	}//for						
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		
		<td rowspan="3" nowrap="nowrap" align="center">縣市別</td>
		<td colspan="2">1.推展親職教育活動</td>
		<td colspan="3">2.原住民及離島地區學校辦理學習輔導</td>
		<td colspan="2">3.補助學校發展教育特色</td>
		<td colspan="4">4.修繕離島或偏遠地區師生宿舍</td>
		<td colspan="2">5.充實學校基本教學設備</td>
		<td colspan="2">6.發展原住民教育文化特色及充實設備器材</td>
		<td colspan="3">7.補助交通不便學校交通車</td>
		<td colspan="3">8.整修學校社區化活動場所</td>
		<td rowspan="3" align="center">複審金額</td>
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
	$sql = "select  *  from 100education_money order by id asc";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
                 $a1_1=$row[2];
				 $a1_2=$row[3];
				 $a2_1=$row[4];
				 $a2_2=$row[6];
				 $a2_3=$row[5];
				 $a3_1=$row[19];
				 $a3_2=$row[20];
				 $a4_1_1=$row[27];
				 $a4_1_2=$row[28];
				 $a4_2_1=$row[25];
				 $a4_2_2=$row[26];
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
				// $a3_1=$row[19];
				// $a3_2=$row[20];
				 //$a6_1=$row[21];
				 //$a6_2=$row[22];
				 
				echo "<tr width='110' height='30'>";
				 		echo "<td>";
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
	echo number_format($row[6]);//a2_2
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($row[5]);//a2_3
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
						
			/*			echo "<td>"."<div align='right'>";
				echo "$row[19]";
						echo "</td>";
						echo "<td>"."<div align='right'>";
				echo "$row[20]";
						echo "</td>";
						echo "<td>"."<div align='right'>";
				echo "$row[21]";
						echo "</td>";
						echo "<td>"."<div align='right'>";
				echo "$row[22]";
						echo "</td>";*/
		
				 $p1_1=$p1_1+$row[2];
				 $p1_2=$p1_2+$row[3];
				 $p2_1=$p2_1+$row[4];
				 $p2_2=$p2_2+$row[6];
				 $p2_3=$p2_3+$row[5];
				 $p3_1=$p3_1+$row[19];
				 $p3_2=$p3_2+$row[20];
				 $p4_1_1=$p4_1_1+$row[27];
				 $p4_1_2=$p4_1_2+$row[28];
				 $p4_2_1=$p4_2_1+$row[25];
				 $p4_2_2=$p4_2_2+$row[26];				 
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
    <td width="60" height="46">合計</td>
		<td><div align="right"><? echo number_format($p1_1);?></div></td>
		<td><div align="right"><? echo number_format($p1_2);?></div></td>
		<td><div align="right"><? echo number_format($p2_1);?></div></td>
		<td><div align="right"><? echo number_format($p2_2);?></div></td>
		<td><div align="right"><? echo number_format($p2_3);?></div></td>
		<td><div align="right"><? echo number_format($p3_1);?></div></td>
		<td><div align="right"><? echo number_format($p3_2);?></div></td>
		<td><div align="right"><? echo number_format($p4_1_1);?></div></td>
		<td><div align="right"><? echo number_format($p4_1_2);?></div></td>
        <td><div align="right"><? echo number_format($p4_2_1);?></div></td>
        <td><div align="right"><? echo number_format($p4_2_2);?></div></td>
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
    <td><div align="right"><? echo number_format($p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1_1+$p4_1_2+$p4_2_1+$p4_2_2+$p5_1+$p5_2+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3);?></div></td>
  </tr>
</table>
<?php include "../xSchoolForm/print_button.php"; ?>