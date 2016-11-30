<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$city_ary = array("基隆市", "臺北市", "新北市", "桃園市", "新竹市", "新竹縣", "苗栗縣", "臺中市", "彰化縣", "南投縣", "雲林縣"
					, "嘉義市", "嘉義縣", "臺南市", "高雄市", "屏東縣", "宜蘭縣", "花蓮縣", "臺東縣", "澎湖縣", "金門縣", "連江縣");

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
			教育部<?=($school_year);?>年度推動教育優先區計畫<p>
			縣市指標界定及補助項目經費彙整表（教育部複審列表）<p>
			</font>
		</td>
	</tr>
</table><p>

<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3" nowrap="nowrap" align="center">序號</td>
		<td rowspan="3" nowrap="nowrap" align="center">縣市名稱</td>
		<td colspan="5" align="center">符合指標條件</td>
		<td rowspan="3" align="center" bgcolor="#99FFFF">符合指標條件總數</td>
		<td colspan="5" bgcolor="#FFFFCC">一、推展親職教育活動</td>
		<td colspan="3" bgcolor="#FFFFCC">二、補助學校發展教育特色</td>
		<td colspan="3" bgcolor="#FFFFCC">三、充實學校基本教學設備</td>
		<td colspan="3" bgcolor="#FFFFCC">四、發展原住民教育文化特色及充實設備器材</td>
		<td colspan="4" bgcolor="#FFFFCC">五、補助交通不便地區學校交通車</td>
		<td colspan="3" bgcolor="#FFFFCC">六、整修學校社區化活動場所</td>
		<td rowspan="3" align="center" bgcolor="#FFCCCC">教育部複審金額</td>
	</tr>
	<tr>
		<td align="center" nowrap="nowrap">1</td>
		<td align="center" nowrap="nowrap">2</td>
		<td align="center" nowrap="nowrap">3</td>
		<td align="center" nowrap="nowrap">4</td>
		<td align="center" nowrap="nowrap">5</td>
		<td colspan="2" align="center">親職教育活動</td>
		<td colspan="2" align="center">目標學生家庭訪視輔導</td>
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
		<td rowspan="2" align="center">租車費</td>
		<td rowspan="2" align="center">交通費</td>
		<td rowspan="2" align="center">購交通車費</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
		<td colspan="2" align="center">綜合球場</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
	</tr>
	<tr>
		<td width="10" align="center">指標一</td>
		<td width="10" align="center">指標二</td>
		<td width="10" align="center">指標三</td>
		<td width="10" align="center">指標四</td>
		<td width="10" align="center">指標五</td>
		<td align="center">場次</td>
		<td align="center">經費</td>
		<td align="center">人次</td>
		<td align="center">經費</td>
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
			$point_total[$i] = 0;
	}
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , ifnull(a1.s_total_money,0) + ifnull(a2.s_total_money,0)".
		   "      + ifnull(a3.s_total_money,0) + ifnull(a4.s_total_money,0) + ifnull(a5.s_total_money,0) + ifnull(a6.s_total_money,0) as apply_money ".

		   //補一複審資料
		   "      , a1.edu_p1_times as a1_edu_p1_times, a1.edu_p2_people as a1_edu_p2_people ".
		   "      , a1.edu_p1_money as a1_edu_p1_money, a1.edu_p2_money as a1_edu_p2_money ".
		   "      , a1.edu_desc as a1_edu_desc ".

		   //補二複審資料
		   "      , a2.edu_p1_money as a2_edu_p1_money, a2.edu_p2_money as a2_edu_p2_money ".
		   "      , a2.edu_p1_current_money as a2_edu_p1_current_money ".
		   "      , a2.edu_p1_capital_money as a2_edu_p1_capital_money ".
		   "      , a2.edu_p2_current_money as a2_edu_p2_current_money ".
		   "      , a2.edu_p2_capital_money as a2_edu_p2_capital_money ".
		   "      , a2.edu_desc as a2_edu_desc ".

		   //補三複審資料
		   "      , a3.edu_p1_money as a3_edu_p1_money ".
		   "      , a3.edu_p1_current_money as a3_edu_p1_current_money ".
		   "      , a3.edu_p1_capital_money as a3_edu_p1_capital_money ".
		   "      , a3.edu_desc as a3_edu_desc ".

		   //補四複審資料
		   "      , a4.edu_p1_money as a4_edu_p1_money, a4.edu_p2_money as a4_edu_p2_money ".
		   "      , a4.edu_p1_current_money as a4_edu_p1_current_money ".
		   "      , a4.edu_p1_capital_money as a4_edu_p1_capital_money ".
		   "      , a4.edu_p2_current_money as a4_edu_p2_current_money ".
		   "      , a4.edu_p2_capital_money as a4_edu_p2_capital_money ".
		   "      , a4.edu_desc as a4_edu_desc ".

		   //補五複審資料
		   "      , a5.edu_total_money as a5_edu_money, a5.item as a5_item ".
		   "      , a5.edu_desc as a5_edu_desc ".

		   //補六複審資料
		   "      , a6.edu_p1_money as a6_edu_p1_money ".
		   "      , a6.edu_p1_current_money as a6_edu_p1_current_money ".
		   "      , a6.edu_p1_capital_money as a6_edu_p1_capital_money ".
		   "      , a6.edu_desc as a6_edu_desc ".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_teaching_equipment as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_aboriginal_education as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_transport_car as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_school_activity as a6 on sy.seq_no = a6.sy_seq ".
		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   " order by sd.cityname, sd.account ";
 
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

		$apply_money = $row['apply_money']; //學校申請總金額 a1 + ~ a6

		$a1_edu_p1_times = $row['a1_edu_p1_times'];
		$a1_edu_p1_money = $row['a1_edu_p1_money'];
		$a1_edu_p2_people = $row['a1_edu_p2_people'];
		$a1_edu_p2_money = $row['a1_edu_p2_money'];

		$a2_edu_p1_money = $row['a2_edu_p1_money'];
		$a2_edu_p1_current_money = $row['a2_edu_p1_current_money'];
		$a2_edu_p1_capital_money = $row['a2_edu_p1_capital_money'];
		$a2_edu_p2_money = $row['a2_edu_p2_money'];
		$a2_edu_p2_current_money = $row['a2_edu_p2_current_money'];
		$a2_edu_p2_capital_money = $row['a2_edu_p2_capital_money'];

		$a3_edu_p1_money = $row['a3_edu_p1_money'];
		$a3_edu_p1_current_money = $row['a3_edu_p1_current_money'];
		$a3_edu_p1_capital_money = $row['a3_edu_p1_capital_money'];

		$a4_edu_p1_money = $row['a4_edu_p1_money'];
		$a4_edu_p1_current_money = $row['a4_edu_p1_current_money'];
		$a4_edu_p1_capital_money = $row['a4_edu_p1_capital_money'];
		$a4_edu_p2_money = $row['a4_edu_p2_money'];
		$a4_edu_p2_current_money = $row['a4_edu_p2_current_money'];
		$a4_edu_p2_capital_money = $row['a4_edu_p2_capital_money'];

		$a5_item = $row['a5_item'];
		$a5_edu_money = $row['a5_edu_money'];

		$a6_edu_p1_money = $row['a6_edu_p1_money'];
		$a6_edu_p1_current_money = $row['a6_edu_p1_current_money'];
		$a6_edu_p1_capital_money = $row['a6_edu_p1_capital_money'];

		$accord_point = $row['accord_point'];
		$accord_point_ary = explode(",", $accord_point); //符合的指標

		for($i = 0;$i < 22;$i++) //縣市共22個
		{
			//指標計算
			if($apply_money > 0 && $cityname == $city_ary[$i])
			{
				$p1 = 0;
				$p2 = 0;
				$p3 = 0;
				$p4 = 0;
				$p5 = 0;
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

						default:
							echo "";
					}
				}

				$point1[$i] += ($p1 == 1)?1:0;
				$point2[$i] += ($p2 == 1)?1:0;
				$point3[$i] += ($p3 == 1)?1:0;
				$point4[$i] += ($p4 == 1)?1:0;
				$point5[$i] += ($p5 == 1)?1:0;
				$point_total[$i] = $point1[$i] + $point2[$i] + $point3[$i] + $point4[$i] + $point5[$i];

				$a1_edu_p1_times_ary[$i] += $a1_edu_p1_times;
				$a1_edu_p1_money_ary[$i] += $a1_edu_p1_money;//補一親職
				$a1_edu_p2_people_ary[$i] += $a1_edu_p2_people;
				$a1_edu_p2_money_ary[$i] += $a1_edu_p2_money;//補一家庭訪視
				$a1_total_money_ary[$i] = $a1_edu_p1_money_ary[$i] + $a1_edu_p2_money_ary[$i];

				$a2_current_money_ary[$i] += $a2_edu_p1_current_money + $a2_edu_p2_current_money;//補二經常
				$a2_capital_money_ary[$i] += $a2_edu_p1_capital_money + $a2_edu_p2_capital_money;//補二資本
				$a2_total_money_ary[$i] = $a2_current_money_ary[$i] + $a2_capital_money_ary[$i];

				$a3_edu_p1_current_money_ary[$i] += $a3_edu_p1_current_money;//補三經常
				$a3_edu_p1_capital_money_ary[$i] += $a3_edu_p1_capital_money;//補三資本
				$a3_total_money_ary[$i] = $a3_edu_p1_current_money_ary[$i] + $a3_edu_p1_capital_money_ary[$i];

				$a4_current_money_ary[$i] += $a4_edu_p1_current_money + $a4_edu_p2_current_money;//補四經常
				$a4_capital_money_ary[$i] += $a4_edu_p1_capital_money + $a4_edu_p2_capital_money;//補四資本
				$a4_total_money_ary[$i] = $a4_current_money_ary[$i] + $a4_capital_money_ary[$i];

				$a5_edu_money_1[$i] += ($a5_item == '租車費')?$a5_edu_money:0;
				$a5_edu_money_2[$i] += ($a5_item == '交通費')?$a5_edu_money:0;
				$a5_edu_money_3[$i] += ($a5_item == '購置交通車')?$a5_edu_money:0;
				$a5_total_money_ary[$i] = $a5_edu_money_1[$i] + $a5_edu_money_2[$i] + $a5_edu_money_3[$i];

				$a6_edu_p1_current_money_ary[$i] += $a6_edu_p1_current_money;//補六修建
				$a6_edu_p1_capital_money_ary[$i] += $a6_edu_p1_capital_money;//補六設備
				$a6_total_money_ary[$i] = $a6_edu_p1_current_money_ary[$i] + $a6_edu_p1_capital_money_ary[$i];

				//縣市審核總和
				$edu_total_ary[$i] += $a1_edu_p1_money + $a1_edu_p2_money
									+ $a2_edu_p1_money + $a2_edu_p2_money
									+ $a3_edu_p1_money
									+ $a4_edu_p1_money + $a4_edu_p2_money
									+ $a5_edu_money
									+ $a6_edu_p1_money;

			}
		}

	}

	for($i = 0;$i < 22;$i++) //縣市共22個
	{
		?>
			<tr height="30px">
				<td align="center"><?=($i+1); //序號?></td>
				<td align="center"><?=$city_ary[$i];?></td>
				<td align="center"><?=$point1[$i]; //指標一?></td>
				<td align="center"><?=$point2[$i]; //指標二?></td>
				<td align="center"><?=$point3[$i]; //指標三?></td>
				<td align="center"><?=$point4[$i]; //指標四?></td>
				<td align="center"><?=$point5[$i]; //指標五?></td>
				<td align="center" bgcolor="#99FFFF"><?=$point_total[$i]; //符合指標總數?></td>
				<td align="right"><?=number_format($a1_edu_p1_times_ary[$i]);?></td>
				<td align="right"><?=number_format($a1_edu_p1_money_ary[$i]); //補一親職?></td>
				<td align="right"><?=number_format($a1_edu_p2_people_ary[$i]);?></td>
				<td align="right"><?=number_format($a1_edu_p2_money_ary[$i]); //補一家庭訪視?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a1_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a2_current_money_ary[$i]); //補二經常?></td>
				<td align="right"><?=number_format($a2_capital_money_ary[$i]); //補二資本?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a2_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a3_edu_p1_current_money_ary[$i]); //補三經常?></td>
				<td align="right"><?=number_format($a3_edu_p1_capital_money_ary[$i]); //補三資本?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a3_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a4_current_money_ary[$i]); //補四經常?></td>
				<td align="right"><?=number_format($a4_capital_money_ary[$i]); //補四資本?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a4_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a5_edu_money_1[$i]); //補五租車費?></td>
				<td align="right"><?=number_format($a5_edu_money_2[$i]); //補五交通費?></td>
				<td align="right"><?=number_format($a5_edu_money_3[$i]); //補五購置交通車?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a5_total_money_ary[$i]);?></td>
				<td align="right"><?=number_format($a6_edu_p1_current_money_ary[$i]); //補六修建?></td>
				<td align="right"><?=number_format($a6_edu_p1_capital_money_ary[$i]); //補六設備?></td>
				<td align="right" bgcolor="#FFFFCC"><?=number_format($a6_total_money_ary[$i]); ?></td>
				<td align="right" bgcolor="#FFCCCC"><?=number_format($edu_total_ary[$i]); //各校加總?></td>
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
		$sum_point_total += $point_total[$i];

		$sum_a1_edu_p1_times += $a1_edu_p1_times_ary[$i];
		$sum_a1_edu_p1_money += $a1_edu_p1_money_ary[$i];//補一親職
		$sum_a1_edu_p2_people += $a1_edu_p2_people_ary[$i];
		$sum_a1_edu_p2_money += $a1_edu_p2_money_ary[$i];//補一家庭訪視
		$sum_a1_total_money = $sum_a1_edu_p1_money + $sum_a1_edu_p2_money;

		$sum_a2_current_money += $a2_current_money_ary[$i];//補二經常
		$sum_a2_capital_money += $a2_capital_money_ary[$i];//補二資本
		$sum_a2_total_money = $sum_a2_current_money + $sum_a2_capital_money;

		$sum_a3_edu_p1_current_money += $a3_edu_p1_current_money_ary[$i];//補三經常
		$sum_a3_edu_p1_capital_money += $a3_edu_p1_capital_money_ary[$i];//補三資本
		$sum_a3_total_money = $sum_a3_edu_p1_current_money + $sum_a3_edu_p1_capital_money;

		$sum_a4_current_money += $a4_current_money_ary[$i];//補四經常
		$sum_a4_capital_money += $a4_capital_money_ary[$i];//補四資本
		$sum_a4_total_money = $sum_a4_current_money + $sum_a4_capital_money;

		$sum_a5_edu_money_1 += $a5_edu_money_1[$i];
		$sum_a5_edu_money_2 += $a5_edu_money_2[$i];
		$sum_a5_edu_money_3 += $a5_edu_money_3[$i];
		$sum_a5_total_money = $sum_a5_edu_money_1 + $sum_a5_edu_money_2 + $sum_a5_edu_money_3;

		$sum_a6_edu_p1_current_money += $a6_edu_p1_current_money_ary[$i];//補六修建
		$sum_a6_edu_p1_capital_money += $a6_edu_p1_capital_money_ary[$i];//補六設備
		$sum_a6_total_money = $sum_a6_edu_p1_current_money + $sum_a6_edu_p1_capital_money;

		//縣市審核總和
		$sum_edu_total += $edu_total_ary[$i];
	}
?>

	<tr height="30px">
		<td align="center" colspan="2">合計</td>
		<td align="center"><?=number_format($sum_point1);?></td>
		<td align="center"><?=number_format($sum_point2);?></td>
		<td align="center"><?=number_format($sum_point3);?></td>
		<td align="center"><?=number_format($sum_point4);?></td>
		<td align="center"><?=number_format($sum_point5);?></td>
		<td align="center" bgcolor="#99FFFF"><?=number_format($sum_point_total);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_edu_p1_times);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_edu_p1_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_edu_p2_people);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_edu_p2_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a1_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_capital_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a2_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_edu_p1_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_edu_p1_capital_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a3_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_capital_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a4_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_edu_money_1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_edu_money_2);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_edu_money_3);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a5_total_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_edu_p1_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_edu_p1_capital_money);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a6_total_money);?></td>
		<td align="right" bgcolor="#FFCCCC"><div align="right"><?=number_format($sum_edu_total);?></td>
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