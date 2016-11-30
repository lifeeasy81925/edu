<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$city_ary = array("基隆市", "新北市", "臺北市", "桃園縣", "新竹縣", "新竹市", "苗栗縣", "臺中市", "南投縣", "彰化縣", "雲林縣"
					, "嘉義縣", "嘉義市", "臺南市", "高雄市", "屏東縣", "臺東縣", "花蓮縣", "宜蘭縣", "澎湖縣", "金門縣", "連江縣");
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">
<? 
	include "../../function/button_print.php"; 
	include "../../function/button_excel.php"; 
?>
<p>
<div id="print_content">
【<?=$cityname?> 政府申請教育部<?=($school_year);?>年度推動教育部推動教育優先區計畫縣市初審結果列表】
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3" nowrap="nowrap" align="center">序號</td>
		<td rowspan="3" nowrap="nowrap" align="center">縣市名稱</td>
		<td colspan="6" align="center">符合指標條件</td>
		<td width="10" rowspan="3" align="center" bgcolor="#99FFFF">符合指標條件總數</td>
		<td colspan="5" bgcolor="#FFFFCC">1.推展親職教育活動</td>
		<td colspan="3" bgcolor="#CCFFCC">2.補助學校發展教育特色</td>
		<td colspan="11" bgcolor="#FFFFCC">3.修繕離島或偏遠地區師生宿舍</td>
		<td colspan="3" bgcolor="#CCFFCC">4.充實學校基本教學設備</td>
		<td colspan="3" bgcolor="#FFFFCC">5.發展原住民教育文化特色及充實設備器材</td>
		<td colspan="4" bgcolor="#CCFFCC">6.補助交通不便地區學校交通車</td>
		<td colspan="3" bgcolor="#FFFFCC">7.整修學校社區化活動場所</td>
		<td rowspan="3" align="center" bgcolor="#FFCCCC">初審金額</td>
	</tr>
	<tr>
		<td align="center" nowrap="nowrap">1</td>
		<td align="center" nowrap="nowrap">2</td>
		<td align="center" nowrap="nowrap">3</td>
		<td align="center" nowrap="nowrap">4</td>
		<td align="center" nowrap="nowrap">5</td>
		<td align="center" nowrap="nowrap">6</td>
		<td colspan="2" align="center">親職教育活動</td>
		<td colspan="2" align="center">目標學生家庭訪視輔導</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計
		<div align="right"></td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center" bgcolor="#CCFFCC">經費合計</td>
		<td colspan="5" align="center">教師宿舍</td>
		<td colspan="5" align="center">學生宿舍</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center" bgcolor="#CCFFCC">經費合計</td>
		<td rowspan="2" align="center">經常門</td>
		<td rowspan="2" align="center">資本門</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td rowspan="2" align="center">租車費</td>
		<td rowspan="2" align="center">交通費</td>
		<td rowspan="2" align="center">購交通車費</td>
		<td rowspan="2" align="center" bgcolor="#CCFFCC">經費合計</td>
		<td colspan="2" align="center">綜合球場</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
	</tr>
	<tr>
		<td width="10" align="center">指標一</td>
		<td width="10" align="center">指標二</td>
		<td width="10" align="center">指標三</td>
		<td width="10" align="center">指標四</td>
		<td width="10" align="center">指標五</td>
		<td width="10" align="center">指標六</td>
		<td align="center">場次</td>
		<td align="center">經費</td>
		<td align="center">人次</td>
		<td align="center">經費</td>
		<td align="center">項</td>
		<td align="center">經常門</td>
		<td align="center">項</td>
		<td align="center">資本門</td>
		<td align="center">小計</td>
		<td align="center">項</td>
		<td align="center">經常門</td>
		<td align="center">項</td>
		<td align="center">資本門</td>
		<td align="center">小計</td>
		<td align="center">修建</td>
		<td align="center">設備</td>
	</tr>
  
<?
	//預設
	for($i = 0;$i < 22;$i++) //縣市共22個
	{
			$point1[$i] = 0;
			$point2[$i] = 0;
			$point3[$i] = 0;
			$point4[$i] = 0;
			$point5[$i] = 0;
			$point6[$i] = 0;
			$point_total[$i] = 0;
	}
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , ifnull(a1.s_total_money,0) + ifnull(a2.s_total_money,0) + ifnull(a3.s_total_money,0) ".
		   "      + ifnull(a4.s_total_money,0) + ifnull(a5.s_total_money,0) + ifnull(a6.s_total_money,0) + ifnull(a7.s_total_money,0) as apply_money ".
		   
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
		   "      , a3.city_p1_money as a3_city_p1_money, a3.city_p2_money as a3_city_p2_money ".
		   "      , a3.city_p1_current_cnt as a3_city_p1_current_cnt ".
		   "      , a3.city_p1_current_money as a3_city_p1_current_money ".
		   "      , a3.city_p1_capital_cnt as a3_city_p1_capital_cnt ".
		   "      , a3.city_p1_capital_money as a3_city_p1_capital_money ".
		   "      , a3.city_p2_current_cnt as a3_city_p2_current_cnt ".
		   "      , a3.city_p2_current_money as a3_city_p2_current_money ".
		   "      , a3.city_p2_capital_cnt as a3_city_p2_capital_cnt ".
		   "      , a3.city_p2_capital_money as a3_city_p2_capital_money ".
		   "      , a3.city_desc as a3_city_desc ".
		   
		   //補四縣市資料
		   "      , a4.city_p1_money as a4_city_p1_money ".
		   "      , a4.city_p1_current_money as a4_city_p1_current_money ".
		   "      , a4.city_p1_capital_money as a4_city_p1_capital_money ".
		   "      , a4.city_desc as a4_city_desc ".
		   
		   //補五縣市資料
		   "      , a5.city_p1_money as a5_city_p1_money, a5.city_p2_money as a5_city_p2_money ".
		   "      , a5.city_p1_current_money as a5_city_p1_current_money ".
		   "      , a5.city_p1_capital_money as a5_city_p1_capital_money ".
		   "      , a5.city_p2_current_money as a5_city_p2_current_money ".
		   "      , a5.city_p2_capital_money as a5_city_p2_capital_money ".
		   "      , a5.city_desc as a5_city_desc ".
		   
		   //補六縣市資料
		   "      , a6.city_total_money as a6_city_money, a6.item as a6_item ".
		   "      , a6.city_desc as a6_city_desc ".
		   
		   //補七縣市資料
		   "      , a7.city_p1_money as a7_city_p1_money ".
		   "      , a7.city_p1_current_money as a7_city_p1_current_money ".
		   "      , a7.city_p1_capital_money as a7_city_p1_capital_money ".
		   "      , a7.city_desc as a7_city_desc ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   " order by sd.cityname, sd.account ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$student = $row['student'];
		
		$apply_money = $row['apply_money']; //學校申請總金額 a1 + ~ a7
				
		//縣市審核意見
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
		$a3_city_p1_current_cnt = $row['a3_city_p1_current_cnt'];
		$a3_city_p1_current_money = $row['a3_city_p1_current_money'];
		$a3_city_p1_capital_cnt = $row['a3_city_p1_capital_cnt'];
		$a3_city_p1_capital_money = $row['a3_city_p1_capital_money'];
		$a3_city_p2_money = $row['a3_city_p2_money'];
		$a3_city_p2_current_cnt = $row['a3_city_p2_current_cnt'];
		$a3_city_p2_current_money = $row['a3_city_p2_current_money'];
		$a3_city_p2_capital_cnt = $row['a3_city_p2_capital_cnt'];
		$a3_city_p2_capital_money = $row['a3_city_p2_capital_money'];

		$a4_city_p1_money = $row['a4_city_p1_money']; 
		$a4_city_p1_current_money = $row['a4_city_p1_current_money'];
		$a4_city_p1_capital_money = $row['a4_city_p1_capital_money'];
		
		$a5_city_p1_money = $row['a5_city_p1_money']; 
		$a5_city_p1_current_money = $row['a5_city_p1_current_money'];
		$a5_city_p1_capital_money = $row['a5_city_p1_capital_money'];
		$a5_city_p2_money = $row['a5_city_p2_money'];
		$a5_city_p2_current_money = $row['a5_city_p2_current_money'];
		$a5_city_p2_capital_money = $row['a5_city_p2_capital_money'];

		$a6_item = $row['a6_item'];		
		$a6_city_money = $row['a6_city_money'];
				
		$a7_city_p1_money = $row['a7_city_p1_money']; 
		$a7_city_p1_current_money = $row['a7_city_p1_current_money'];
		$a7_city_p1_capital_money = $row['a7_city_p1_capital_money'];
		
		$accord_point = $row['accord_point'];		
		$accord_point_ary = explode(",", $accord_point); //符合的指標
		
		for($i = 0;$i < 22;$i++) //縣市共22個
		{
			if($apply_money > 0 && $cityname == $city_ary[$i])
			{
				$p1 = 0;
				$p2 = 0;
				$p3 = 0;
				$p4 = 0;
				$p5 = 0;
				$p6 = 0;
				for($j = 0;$j < count($accord_point_ary);$j++)
				{
					switch($accord_point_ary[$j])
					{
						case "p1_1":
						case "p1_2":
						case "p1_3":
						case "p1_4":
							$p1 = 1;
							break;
							
						case "p2_1":
						case "p2_2":				
						case "p2_3":
							$p2 = 1;
							break;
							
						case "p3_1":
							$p3 = 1;
							break;
							
						case "p4_1":
							$p4 = 1;
							break;
							
						case "p5_1":				
						case "p5_2":				
						case "p5_3":
							$p5 = 1;
							break;
							
						case "p6_1":
						case "p6_2":
							$p6 = 1;
							break;			
							
						default:
							echo "";
					}
					
				}
				
				$point1[$i] += ($p1 == 1)?1:0;
				$point2[$i] += ($p2 == 1)?1:0;
				$point3[$i] += ($p3 == 1)?1:0;
				$point4[$i] += ($p4 == 1)?1:0;
				$point5[$i] += ($p5 == 1)?1:0;
				$point6[$i] += ($p6 == 1)?1:0;
				$point_total[$i] = $point1[$i] + $point2[$i] + $point3[$i] + $point4[$i] + $point5[$i] + $point6[$i];
				
				$a1_city_p1_times_ary[$i] += $a1_city_p1_times; 
				$a1_city_p1_money_ary[$i] += $a1_city_p1_money;//補一親職 
				$a1_city_p2_people_ary[$i] += $a1_city_p2_people;
				$a1_city_p2_money_ary[$i] += $a1_city_p2_money;//補一家庭訪視
				$a1_total_money_ary[$i] = $a1_city_p1_money_ary[$i] + $a1_city_p2_money_ary[$i];
				
				$a2_current_money_ary[$i] += $a2_city_p1_current_money + $a2_city_p2_current_money;//補二經常
				$a2_capital_money_ary[$i] += $a2_city_p1_capital_money + $a2_city_p2_capital_money;//補二資本
				$a2_total_money_ary[$i] = $a2_current_money_ary[$i] + $a2_capital_money_ary[$i];
				
				$a3_city_p1_current_cnt_ary[$i] += $a3_city_p1_current_cnt;//補三-教師宿舍-經常-項
				$a3_city_p1_current_money_ary[$i] += $a3_city_p1_current_money;//補三-教師宿舍-經常-元
				$a3_city_p1_capital_cnt_ary[$i] += $a3_city_p1_capital_cnt;//補三-教師宿舍-資本-項
				$a3_city_p1_capital_money_ary[$i] += $a3_city_p1_capital_money;//補三-教師宿舍-資本-元
				$a3_p1_total_money_ary[$i] = $a3_city_p1_current_money_ary[$i] + $a3_city_p1_capital_money_ary[$i];//補三-教師宿舍-總和
				$a3_city_p2_current_cnt_ary[$i] += $a3_city_p2_current_cnt;//補三-學生宿舍-經常-項
				$a3_city_p2_current_money_ary[$i] += $a3_city_p2_current_money;//補三-學生宿舍-經常-元
				$a3_city_p2_capital_cnt_ary[$i] += $a3_city_p2_capital_cnt;//補三-學生宿舍-資本-項
				$a3_city_p2_capital_money_ary[$i] += $a3_city_p2_capital_money;//補三-學生宿舍-資本-元
				$a3_p2_total_money_ary[$i] = $a3_city_p2_current_money_ary[$i] + $a3_city_p2_capital_money_ary[$i];//補三-學生宿舍-總和
				$a3_total_money_ary[$i] = $a3_p1_total_money_ary[$i] + $a3_p2_total_money_ary[$i];//補三-總和
				
				$a4_city_p1_current_money_ary[$i] += $a4_city_p1_current_money;//補四經常
				$a4_city_p1_capital_money_ary[$i] += $a4_city_p1_capital_money;//補四資本
				$a4_total_money_ary[$i] = $a4_city_p1_current_money_ary[$i] + $a4_city_p1_capital_money_ary[$i];
				
				$a5_current_money_ary[$i] += $a5_city_p1_current_money + $a5_city_p2_current_money;//補五經常
				$a5_capital_money_ary[$i] += $a5_city_p1_capital_money + $a5_city_p2_capital_money;//補五資本
				$a5_total_money_ary[$i] = $a5_current_money_ary[$i] + $a5_capital_money_ary[$i];
				
				$a6_city_money_1[$i] += ($a6_item == '租車費')?$a6_city_money:0;
				$a6_city_money_2[$i] += ($a6_item == '交通費')?$a6_city_money:0;
				$a6_city_money_3[$i] += ($a6_item == '購置交通車')?$a6_city_money:0;
				$a6_total_money_ary[$i] = $a6_city_money_1[$i] + $a6_city_money_2[$i] + $a6_city_money_3[$i];
				
				$a7_city_p1_current_money_ary[$i] += $a7_city_p1_current_money;//補七修建
				$a7_city_p1_capital_money_ary[$i] += $a7_city_p1_capital_money;//補七設備
				$a7_total_money_ary[$i] = $a7_city_p1_current_money_ary[$i] + $a7_city_p1_capital_money_ary[$i];
				
				//縣市審核總和
				$city_total_ary[$i] += $a1_city_p1_money + $a1_city_p2_money
									+ $a2_city_p1_money + $a2_city_p2_money
									+ $a3_city_p1_money + $a3_city_p2_money
									+ $a4_city_p1_money
									+ $a5_city_p1_money + $a5_city_p2_money
									+ $a6_city_money
									+ $a7_city_p1_money;
				
			}			
		}
	
	}
	
	for($i = 0;$i < 22;$i++) //縣市共22個
	{
		?>
			<tr>
				<td align="center"><?=($i+1); //序號?></td>
				<td align="center"><?=$city_ary[$i];?></td>
				<td align="center"><?=$point1[$i]; //指標一?></td>
				<td align="center"><?=$point2[$i]; //指標二?></td>
				<td align="center"><?=$point3[$i]; //指標三?></td>
				<td align="center"><?=$point4[$i]; //指標四?></td>
				<td align="center"><?=$point5[$i]; //指標五?></td>
				<td align="center"><?=$point6[$i]; //指標六?></td>
				<td align="center" bgcolor="#99FFFF"><?=$point_total[$i]; //符合指標總數?></td>
				<td align="right"><?=number_format($a1_city_p1_times_ary[$i]);?></td>
				<td align="right"><?=number_format($a1_city_p1_money_ary[$i]); //補一親職?></td>
				<td align="right"><?=number_format($a1_city_p2_people_ary[$i]);?></td>
				<td align="right"><?=number_format($a1_city_p2_money_ary[$i]); //補一家庭訪視?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a1_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a2_current_money_ary[$i]); //補二經常?></td>
				<td align="right"><?=number_format($a2_capital_money_ary[$i]); //補二資本?></td>
				<td align="right" bgcolor="#CCFFCC"><?=number_format($a2_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a3_city_p1_current_cnt_ary[$i]); //補三-教師宿舍-經常-項?></td>
				<td align="right"><?=number_format($a3_city_p1_current_money_ary[$i]); //補三-教師宿舍-經常-元?></td>
				<td align="right"><?=number_format($a3_city_p1_capital_cnt_ary[$i]); //補三-教師宿舍-資本-項?></td>
				<td align="right"><?=number_format($a3_city_p1_capital_money_ary[$i]); //補三-教師宿舍-資本-元?></td>
				<td align="right"><?=number_format($a3_p1_total_money_ary[$i]); //補三-教師宿舍-總和?></td>
				<td align="right"><?=number_format($a3_city_p2_current_cnt_ary[$i]); //補三-學生宿舍-經常-項?></td>
				<td align="right"><?=number_format($a3_city_p2_current_money_ary[$i]); //補三-學生宿舍-經常-元?></td>
				<td align="right"><?=number_format($a3_city_p2_capital_cnt_ary[$i]); //補三-學生宿舍-資本-項?></td>
				<td align="right"><?=number_format($a3_city_p2_capital_money_ary[$i]); //補三-學生宿舍-資本-元?></td>
				<td align="right"><?=number_format($a3_p2_total_money_ary[$i]); //補三-學生宿舍-總和?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a3_total_money_ary[$i]); //補三-總和?></td>
				<td align="right"><?=number_format($a4_city_p1_current_money_ary[$i]); //補四經常?></td>
				<td align="right"><?=number_format($a4_city_p1_capital_money_ary[$i]); //補四資本?></td>
				<td align="right" bgcolor="#CCFFCC"><?=number_format($a4_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a5_current_money_ary[$i]); //補五經常?></td>
				<td align="right"><?=number_format($a5_capital_money_ary[$i]); //補五資本?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a5_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a6_city_money_1[$i]); //補六租車費?></td>
				<td align="right"><?=number_format($a6_city_money_2[$i]); //補六交通費?></td>
				<td align="right"><?=number_format($a6_city_money_3[$i]); //補六購置交通車?></td>
				<td align="right" bgcolor="#CCFFCC"><?=number_format($a6_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a7_city_p1_current_money_ary[$i]); //補七修建?></td>
				<td align="right"><?=number_format($a7_city_p1_capital_money_ary[$i]); //補七設備?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a7_total_money_ary[$i]); ?></td>
				<td align="right" bgcolor="#FFCCCC"><?=number_format($city_total_ary[$i]); //各校加總?></td>
			</tr>
		<?
	}
	
	//計算各總合
	for($i = 0;$i < 22;$i++) //縣市共22個
	{
		$sum_point1 += $point1[$i];
		$sum_point2 += $point2[$i];
		$sum_point3 += $point3[$i];
		$sum_point4 += $point4[$i];
		$sum_point5 += $point5[$i];
		$sum_point6 += $point6[$i];
		$sum_point_total += $point_total[$i];
		
		$sum_a1_city_p1_times += $a1_city_p1_times_ary[$i]; 
		$sum_a1_city_p1_money += $a1_city_p1_money_ary[$i];//補一親職 
		$sum_a1_city_p2_people += $a1_city_p2_people_ary[$i];
		$sum_a1_city_p2_money += $a1_city_p2_money_ary[$i];//補一家庭訪視
		$sum_a1_total_money = $sum_a1_city_p1_money + $sum_a1_city_p2_money;
		
		$sum_a2_current_money += $a2_current_money_ary[$i];//補二經常
		$sum_a2_capital_money += $a2_capital_money_ary[$i];//補二資本
		$sum_a2_total_money = $sum_a2_current_money + $sum_a2_capital_money;
		
		$sum_a3_city_p1_current_cnt += $a3_city_p1_current_cnt_ary[$i];//補三-教師宿舍-經常-項
		$sum_a3_city_p1_current_money += $a3_city_p1_current_money_ary[$i];//補三-教師宿舍-經常-元
		$sum_a3_city_p1_capital_cnt += $a3_city_p1_capital_cnt_ary[$i];//補三-教師宿舍-資本-項
		$sum_a3_city_p1_capital_money += $a3_city_p1_capital_money_ary[$i];//補三-教師宿舍-資本-元
		$sum_a3_p1_total_money = $sum_a3_city_p1_current_money + $sum_a3_city_p1_capital_money;//補三-教師宿舍-總和
		$sum_a3_city_p2_current_cnt += $a3_city_p2_current_cnt_ary[$i];//補三-學生宿舍-經常-項
		$sum_a3_city_p2_current_money += $a3_city_p2_current_money_ary[$i];//補三-學生宿舍-經常-元
		$sum_a3_city_p2_capital_cnt += $a3_city_p2_capital_cnt_ary[$i];//補三-學生宿舍-資本-項
		$sum_a3_city_p2_capital_money += $a3_city_p2_capital_money_ary[$i];//補三-學生宿舍-資本-元
		$sum_a3_p2_total_money = $sum_a3_city_p2_current_money + $sum_a3_city_p2_capital_money;//補三-學生宿舍-總和
		$sum_a3_total_money = $sum_a3_p1_total_money + $sum_a3_p2_total_money;//補三-總和
		
		$sum_a4_city_p1_current_money += $a4_city_p1_current_money_ary[$i];//補四經常
		$sum_a4_city_p1_capital_money += $a4_city_p1_capital_money_ary[$i];//補四資本
		$sum_a4_total_money = $sum_a4_city_p1_current_money + $sum_a4_city_p1_capital_money;
		
		$sum_a5_current_money += $a5_current_money_ary[$i];//補五經常
		$sum_a5_capital_money += $a5_capital_money_ary[$i];//補五資本
		$sum_a5_total_money = $sum_a5_current_money + $sum_a5_capital_money;
		
		$sum_a6_city_money_1 += $a6_city_money_1[$i];
		$sum_a6_city_money_2 += $a6_city_money_2[$i];
		$sum_a6_city_money_3 += $a6_city_money_3[$i];
		$sum_a6_total_money = $sum_a6_city_money_1 + $sum_a6_city_money_2 + $sum_a6_city_money_3;
		
		$sum_a7_city_p1_current_money += $a7_city_p1_current_money_ary[$i];//補七修建
		$sum_a7_city_p1_capital_money += $a7_city_p1_capital_money_ary[$i];//補七設備
		$sum_a7_total_money = $sum_a7_city_p1_current_money + $sum_a7_city_p1_capital_money;
			
		//縣市審核總和
		$sum_city_total += $city_total_ary[$i];

	}
		
	
?>

	<tr>
		<td align="center">合計</td>
		<td align="center">&nbsp;</td>
		<td align="center"><?=number_format($sum_point1);?></td>
		<td align="center"><?=number_format($sum_point2);?></td>
		<td align="center"><?=number_format($sum_point3);?></td>
		<td align="center"><?=number_format($sum_point4);?></td>
		<td align="center"><?=number_format($sum_point5);?></td>
		<td align="center"><?=number_format($sum_point6);?></td>
		<td align="center" bgcolor="#99FFFF"><?=number_format($sum_point_total);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_city_p1_times);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_city_p1_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_city_p2_people);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_city_p2_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a1_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_capital_money);?></td>
		<td align="right" bgcolor="#CCFFCC"><div align="right"><?=number_format($sum_a2_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_city_p1_current_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_city_p1_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_city_p1_capital_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_city_p1_capital_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p1_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_city_p2_current_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_city_p2_current_money);?></td>

		<td align="right"><div align="right"><?=number_format($sum_a3_city_p2_capital_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_city_p2_capital_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p2_total_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a3_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_city_p1_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_city_p1_capital_money);?></td>
		<td align="right" bgcolor="#CCFFCC"><div align="right"><?=number_format($sum_a4_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_capital_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a5_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_city_money_1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_city_money_2);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_city_money_3);?></td>
		<td align="right" bgcolor="#CCFFCC"><div align="right"><?=number_format($sum_a6_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a7_city_p1_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a7_city_p1_capital_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a7_total_money);?></td>
		<td align="right" bgcolor="#FFCCCC"><div align="right"><?=number_format($sum_city_total);?></td>
	</tr>
</table>
</div>
<p>
※若要進行文書格式編修，建議複製到Excel編輯。<br />
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
