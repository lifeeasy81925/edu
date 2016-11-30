<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	include "../../function/config_for_106.php"; //本年度基本設定	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">

<? 
	include "../../function/button_print.php"; 
	include "../../function/button_excel.php"; 
?>

<p>
<div id="print_content">

<table align="center">
	<tr>
		<td width="100%" align="center">
			<font face="標楷體" size="+2">
			<?=$cityname?>政府申請教育部<?=($school_year);?>年度推動教育優先區計畫<p>
			指標界定及補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)<p>
			</font>
		</td>
	</tr>
</table>
<p>

<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3" nowrap="nowrap" align="center">序號</td>
		<td rowspan="3" nowrap="nowrap" align="center">學校編號</td>
		<td rowspan="3" nowrap="nowrap" align="center">學校名稱</td>
		<td colspan="5" align="center">符合指標條件</td>
		<td width="10" rowspan="3" align="center" bgcolor="#99FFFF">符合指標條件總數</td>
		<td colspan="5" bgcolor="#FFFFCC">一、推展親職教育活動</td>
		<td colspan="3" bgcolor="#FFFFCC">二、補助學校發展教育特色</td>
		<td colspan="3" bgcolor="#FFFFCC">三、充實學校基本教學設備</td>
		<td colspan="3" bgcolor="#FFFFCC">四、發展原住民教育文化特色及充實設備器材</td>
		<td colspan="4" bgcolor="#FFFFCC">五、補助交通不便地區學校交通車</td>
		<td colspan="3" bgcolor="#FFFFCC">六、整修學校社區化活動場所</td>
		<td rowspan="3" align="center" bgcolor="#FFCC66">縣市初審金額</td>
	</tr>
	<tr>
		<td rowspan="2" width="10" align="center">指標一</td>
		<td rowspan="2" width="10" align="center">指標二</td>
		<td rowspan="2" width="10" align="center">指標三</td>
		<td rowspan="2" width="10" align="center">指標四</td>
		<td rowspan="2" width="10" align="center">指標五</td>
		<td colspan="2" align="center">親職講座</td>
		<td colspan="2" align="center">家庭訪視</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td rowspan="2" align="center">補助租車費</td>
		<td rowspan="2" align="center">補助交通費</td>
		<td rowspan="2" align="center">購置交通車</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td colspan="2" align="center">綜合球場</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
	</tr>
	<tr>
		<td align="center">場次</td>
		<td align="center">經費</td>
		<td align="center">人次</td>
		<td align="center">經費</td>
		<td align="center">修建</td>
		<td align="center">設備</td>
	</tr>
  
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , ifnull(a1.s_total_money,0) + ifnull(a2.s_total_money,0) + ifnull(a3.s_total_money,0) ".
		   "      + ifnull(a4.s_total_money,0) + ifnull(a5.s_total_money,0) + ifnull(a6.s_total_money,0) as apply_money ".
		   
		   //補一縣市資料
		   "      , a1.city_p1_times as a1_city_p1_times, a1.city_p2_people as a1_city_p2_people ".
		   "      , a1.city_p1_money as a1_city_p1_money, a1.city_p2_money as a1_city_p2_money ".
		   "      , a1.city_desc as a1_city_desc ".
		   
		   //補二縣市資料
		   "      , a2.city_p1_money as a2_city_p1_money, a2.city_p2_money as a2_city_p2_money ".
		   "      , a2.city_p1_current_money as a2_city_p1_current_money ".
		   "      , a2.city_p1_capital_money as a2_city_p1_capital_money ".
		   "      , a2.city_p2_current_money as a2_city_p2_current_money ".
		   "      , a2.city_p2_capital_money as a2_city_p2_capital_money ".
		   "      , a2.city_desc as a2_city_desc ".
		   
		   //補三縣市資料
		   "      , a3.city_p1_money as a3_city_p1_money ".
		   "      , a3.city_p1_current_money as a3_city_p1_current_money ".
		   "      , a3.city_p1_capital_money as a3_city_p1_capital_money ".
		   "      , a3.city_desc as a3_city_desc ".
		   
		   //補四縣市資料
		   "      , a4.city_p1_money as a4_city_p1_money, a4.city_p2_money as a4_city_p2_money ".
		   "      , a4.city_p1_current_money as a4_city_p1_current_money ".
		   "      , a4.city_p1_capital_money as a4_city_p1_capital_money ".
		   "      , a4.city_p2_current_money as a4_city_p2_current_money ".
		   "      , a4.city_p2_capital_money as a4_city_p2_capital_money ".
		   "      , a4.city_desc as a4_city_desc ".
		   
		   //補五縣市資料
		   "      , a5.city_total_money as a5_city_money, a5.item as a5_item ".
		   "      , a5.city_desc as a5_city_desc ".
		   
		   //補六縣市資料
		   "      , a6.city_p1_money as a6_city_p1_money ".
		   "      , a6.city_p1_current_money as a6_city_p1_current_money ".
		   "      , a6.city_p1_capital_money as a6_city_p1_capital_money ".
		   "      , a6.city_desc as a6_city_desc ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_teaching_equipment as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_aboriginal_education as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_transport_car as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_school_activity as a6 on sy.seq_no = a6.sy_seq ".
		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.account";
 
	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$student = $row['student'];
		
		$apply_money = $row['apply_money']; //學校申請總金額 a1 + ~ a6
				
		//縣市審核意見
		$a1_city_desc = $row['a1_city_desc'];
		$a2_city_desc = $row['a2_city_desc'];
		$a3_city_desc = $row['a3_city_desc'];
		$a4_city_desc = $row['a4_city_desc'];
		$a5_city_desc = $row['a5_city_desc'];
		$a6_city_desc = $row['a6_city_desc'];		

		$a1_city_p1_times = $row['a1_city_p1_times'];
		$a1_city_p1_money = $row['a1_city_p1_money'];
		$a1_city_p2_people = $row['a1_city_p2_people'];
		$a1_city_p2_money = $row['a1_city_p2_money'];

		$a2_city_p1_money = $row['a2_city_p1_money']; 
		$a2_city_p1_current_money = $row['a2_city_p1_current_money'];
		$a2_city_p1_capital_money = $row['a2_city_p1_capital_money'];
		$a2_city_p2_money = $row['a2_city_p2_money'];
		$a2_city_p2_current_money = $row['a2_city_p2_current_money'];
		$a2_city_p2_capital_money = $row['a2_city_p2_capital_money'];

		$a3_city_p1_money = $row['a3_city_p1_money']; 
		$a3_city_p1_current_money = $row['a3_city_p1_current_money'];
		$a3_city_p1_capital_money = $row['a3_city_p1_capital_money'];
		
		$a4_city_p1_money = $row['a4_city_p1_money']; 
		$a4_city_p1_current_money = $row['a4_city_p1_current_money'];
		$a4_city_p1_capital_money = $row['a4_city_p1_capital_money'];
		$a4_city_p2_money = $row['a4_city_p2_money'];
		$a4_city_p2_current_money = $row['a4_city_p2_current_money'];
		$a4_city_p2_capital_money = $row['a4_city_p2_capital_money'];

		$a5_item = $row['a5_item'];		
		$a5_city_money = $row['a5_city_money'];
				
		$a6_city_p1_money = $row['a6_city_p1_money']; 
		$a6_city_p1_current_money = $row['a6_city_p1_current_money'];
		$a6_city_p1_capital_money = $row['a6_city_p1_capital_money'];
		
		$accord_point = $row['accord_point'];		
		$accord_point_ary = explode(",", $accord_point); //符合的指標
		
		if($apply_money > 0) //有申請才顯示
		{
			$serial++;
			//指標計算
			$point1 = 0;
			$point2 = 0;
			$point3 = 0;
			$point4 = 0;
			$point5 = 0;
			for($i = 0;$i < count($accord_point_ary);$i++)
			{
				switch($accord_point_ary[$i])
				{
					case "p1_1":
					case "p1_2":
					case "p1_3":
					case "p1_4":
						$point1 = 1;
						break;
						
					case "p2_1":
					case "p2_2":				
					case "p2_3":
						$point2 = 1;
						break;
						
					case "p3_1":
						$point3 = 1;
						break;
						
					case "p4_1":
						$point4 = 1;
						break;
						
					case "p5_1":				
					case "p5_2":				
					case "p5_3":
						$point5 = 1;
						break;	
						
					default:
						echo "";
				}				
			}
			
			$point_total = $point1 + $point2 + $point3 + $point4 + $point5;
			
			//縣市審核總和
			$city_total = $a1_city_p1_money + $a1_city_p2_money
						+ $a2_city_p1_money + $a2_city_p2_money
						+ $a3_city_p1_money
						+ $a4_city_p1_money + $a4_city_p2_money
						+ $a5_city_money
						+ $a6_city_p1_money;
						
			//補二&四，要把兩種特色的經常與資本分別相加
			$a2_current_money = $a2_city_p1_current_money+$a2_city_p2_current_money;
			$a2_capital_money = $a2_city_p1_capital_money+$a2_city_p2_capital_money;
			$a4_current_money = $a4_city_p1_current_money+$a4_city_p2_current_money;
			$a4_capital_money = $a4_city_p1_capital_money+$a4_city_p2_capital_money;
		
			?>
				<tr height="30px">
					<td align="center"><?=$serial; //序號?></td>
					<td align="center"><?=$account; //學校帳號?></td>
					<td align="center"><?=$cityname.$district.$schoolname; //學校名稱?></td>
					<td align="center"><?=$point1; //指標一?></td>
					<td align="center"><?=$point2; //指標二?></td>
					<td align="center"><?=$point3; //指標三?></td>
					<td align="center"><?=$point4; //指標四?></td>
					<td align="center"><?=$point5; //指標五?></td>
					<td align="center" bgcolor="#99FFFF"><?=$point_total; //符合指標總數?></td>
					<td align="right"><?=number_format($a1_city_p1_times);?></td>
					<td align="right"><?=number_format($a1_city_p1_money); //補一親職?></td>
					<td align="right"><?=number_format($a1_city_p2_people);?></td>
					<td align="right"><?=number_format($a1_city_p2_money); //補一家庭訪視?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a1_city_p1_money+$a1_city_p2_money);?></td>
					<td align="right"><?=number_format($a2_current_money); //補二經常?></td>
					<td align="right"><?=number_format($a2_capital_money); //補二資本?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a2_current_money+$a2_capital_money);?></td>
					<td align="right"><?=number_format($a3_city_p1_current_money); //補三經常?></td>
					<td align="right"><?=number_format($a3_city_p1_capital_money); //補三資本?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a3_city_p1_current_money+$a3_city_p1_capital_money);?></td>
					<td align="right"><?=number_format($a4_current_money); //補四經常?></td>
					<td align="right"><?=number_format($a4_capital_money); //補四資本?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a4_current_money+$a4_capital_money);?></td>
					<td align="right"><?=($a5_item == '租車費')?number_format($a5_city_money):0; //補五租車費?></td>
					<td align="right"><?=($a5_item == '交通費')?number_format($a5_city_money):0; //補五交通費?></td>
					<td align="right"><?=($a5_item == '購置交通車')?number_format($a5_city_money):0; //補五購置交通車?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a5_city_money);?></td>
					<td align="right"><?=number_format($a6_city_p1_current_money); //補六修建?></td>
					<td align="right"><?=number_format($a6_city_p1_capital_money); //補六設備?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a6_city_p1_current_money+$a6_city_p1_capital_money); ?></td>
					<td align="right" bgcolor="#FFCC66"><?=number_format($city_total); //各校加總?></td>
				</tr>
			<?
			
			//計算各總合
			$sum_point1 += $point1;
			$sum_point2 += $point2;
			$sum_point3 += $point3;
			$sum_point4 += $point4;
			$sum_point5 += $point5;
			$sum_point6 += $point6;
			$sum_point_total += $point_total;
			
			$sum_a1_p1_times += $a1_city_p1_times;
			$sum_a1_p1 += $a1_city_p1_money;
			$sum_a1_p2_people += $a1_city_p2_people;
			$sum_a1_p2 += $a1_city_p2_money;
			$sum_a1 += $a1_city_p1_money+$a1_city_p2_money;
			
			$sum_a2_current += $a2_current_money;
			$sum_a2_capital += $a2_capital_money;
			$sum_a2 += $a2_current_money+$a2_capital_money;
			
			$sum_a3_current += $a3_city_p1_current_money;
			$sum_a3_capital += $a3_city_p1_capital_money;
			$sum_a3 += $a3_city_p1_current_money + $a3_city_p1_capital_money;
			
			$sum_a4_current += $a4_current_money;
			$sum_a4_capital += $a4_capital_money;
			$sum_a4 += $a4_current_money + $a4_capital_money;
			
			$sum_a5_1 += ($a5_item == '租車費')?$a5_city_money:0;
			$sum_a5_2 += ($a5_item == '交通費')?$a5_city_money:0;
			$sum_a5_3 += ($a5_item == '購置交通車')?$a5_city_money:0;
			$sum_a5 += $a5_city_money;
			
			$sum_a6_current += $a6_city_p1_current_money;
			$sum_a6_capital += $a6_city_p1_capital_money;
			$sum_a6 += $a6_city_p1_current_money + $a6_city_p1_capital_money;
			
			$sum_a1_to_a6 += $city_total;			
		}				
	}	
?>
	<tr height="30px">
		<td align="center" colspan="3">合計</td>
		<td align="center"><?=number_format($sum_point1);?></td>
		<td align="center"><?=number_format($sum_point2);?></td>
		<td align="center"><?=number_format($sum_point3);?></td>
		<td align="center"><?=number_format($sum_point4);?></td>
		<td align="center"><?=number_format($sum_point5);?></td>
		<td align="center" bgcolor="#99FFFF"><?=number_format($sum_point_total);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p1_times);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p2_people);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p2);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a2);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a3);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a4);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_2);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_3);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a5);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a6);?></td>
		<td align="right" bgcolor="#FFCC66"><div align="right"><?=number_format($sum_a1_to_a6);?></td>
	</tr>
</table>
</div>
<p>

<?
/*
※若要進行文書格式編修，建議複製到Excel編輯。<br />
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
*/
?>
