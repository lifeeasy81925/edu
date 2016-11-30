<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	include "../../function/config_for_104.php"; //本年度基本設定

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
			<?=$cityname?>政府辦理教育部<?=($school_year);?>年度推動教育優先區計畫<p>
			指標界定及補助項目經費彙整表（教育部複審核定列表）<p>
			</font>
		</td>
	</tr>
</table>
<p>
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="font-size:12px;">
	<tr>
		<td rowspan="3" nowrap="nowrap" align="center">序號</td>
		<td rowspan="3" nowrap="nowrap" align="center">學校編號</td>
		<td rowspan="3" nowrap="nowrap" align="center">學校名稱</td>
		<td colspan="6" align="center">符合指標條件</td>
		<td rowspan="3" align="center" bgcolor="#99FFFF">符合指標條件總數</td>
		<td colspan="5" align="center" bgcolor="#FFFFCC">一、推展親職教育活動</td>
		<td colspan="3" align="center" bgcolor="#CCFFCC">二、補助學校發展教育特色</td>
		<td colspan="11" align="center" bgcolor="#FFFFCC">三、修繕離島或偏遠地區師生宿舍</td>
		<td colspan="3" align="center" bgcolor="#CCFFCC">四、充實學校基本教學設備</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">五、發展原住民教育文化特色及充實設備器材</td>
		<td colspan="4" align="center" bgcolor="#CCFFCC">六、補助交通不便地區學校交通車</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">七、整修學校社區化活動場所</td>
		<td rowspan="3" align="center" bgcolor="#FFCCCC">複審金額</td>
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
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
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
		<td align="center">指標一</td>
		<td align="center">指標二</td>
		<td align="center">指標三</td>
		<td align="center">指標四</td>
		<td align="center">指標五</td>
		<td align="center">指標六</td>
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
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , ifnull(a1.s_total_money,0) + ifnull(a2.s_total_money,0) + ifnull(a3.s_total_money,0) ".
		   "      + ifnull(a4.s_total_money,0) + ifnull(a5.s_total_money,0) + ifnull(a6.s_total_money,0) + ifnull(a7.s_total_money,0) as apply_money ".

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
		   "      , a3.edu_p1_money as a3_edu_p1_money, a3.edu_p2_money as a3_edu_p2_money ".
		   "      , a3.edu_p1_current_cnt as a3_edu_p1_current_cnt ".
		   "      , a3.edu_p1_current_money as a3_edu_p1_current_money ".
		   "      , a3.edu_p1_capital_cnt as a3_edu_p1_capital_cnt ".
		   "      , a3.edu_p1_capital_money as a3_edu_p1_capital_money ".
		   "      , a3.edu_p2_current_cnt as a3_edu_p2_current_cnt ".
		   "      , a3.edu_p2_current_money as a3_edu_p2_current_money ".
		   "      , a3.edu_p2_capital_cnt as a3_edu_p2_capital_cnt ".
		   "      , a3.edu_p2_capital_money as a3_edu_p2_capital_money ".
		   "      , a3.edu_desc as a3_edu_desc ".

		   //補四複審資料
		   "      , a4.edu_p1_money as a4_edu_p1_money ".
		   "      , a4.edu_p1_current_money as a4_edu_p1_current_money ".
		   "      , a4.edu_p1_capital_money as a4_edu_p1_capital_money ".
		   "      , a4.edu_desc as a4_edu_desc ".

		   //補五複審資料
		   "      , a5.edu_p1_money as a5_edu_p1_money, a5.edu_p2_money as a5_edu_p2_money ".
		   "      , a5.edu_p1_current_money as a5_edu_p1_current_money ".
		   "      , a5.edu_p1_capital_money as a5_edu_p1_capital_money ".
		   "      , a5.edu_p2_current_money as a5_edu_p2_current_money ".
		   "      , a5.edu_p2_capital_money as a5_edu_p2_capital_money ".
		   "      , a5.edu_desc as a5_edu_desc ".

		   //補六複審資料
		   "      , a6.edu_total_money as a6_edu_money, a6.item as a6_item ".
		   "      , a6.edu_desc as a6_edu_desc ".

		   //補七複審資料
		   "      , a7.edu_p1_money as a7_edu_p1_money ".
		   "      , a7.edu_p1_current_money as a7_edu_p1_current_money ".
		   "      , a7.edu_p1_capital_money as a7_edu_p1_capital_money ".
		   "      , a7.edu_desc as a7_edu_desc ".

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
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.account ";

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

		$apply_money = $row['apply_money']; //學校申請總金額 a1 + ~ a7

		//縣市審核意見
		$a1_edu_desc = $row['a1_edu_desc'];
		$a2_edu_desc = $row['a2_edu_desc'];
		$a3_edu_desc = $row['a3_edu_desc'];
		$a4_edu_desc = $row['a4_edu_desc'];
		$a5_edu_desc = $row['a5_edu_desc'];
		$a6_edu_desc = $row['a6_edu_desc'];
		$a7_edu_desc = $row['a7_edu_desc'];

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

		$a3_edu_p1_money = ($row['a3_edu_p1_money'] == '')?0:$row['a3_edu_p1_money'];
		$a3_edu_p1_current_cnt = ($row['a3_edu_p1_current_cnt'] == '')?0:$row['a3_edu_p1_current_cnt'];
		$a3_edu_p1_current_money = ($row['a3_edu_p1_current_money'] == '')?0:$row['a3_edu_p1_current_money'];
		$a3_edu_p1_capital_cnt = ($row['a3_edu_p1_capital_cnt'] == '')?0:$row['a3_edu_p1_capital_cnt'];
		$a3_edu_p1_capital_money = ($row['a3_edu_p1_capital_money'] == '')?0:$row['a3_edu_p1_capital_money'];
		$a3_edu_p2_money = ($row['a3_edu_p2_money'] == '')?0:$row['a3_edu_p2_money'];
		$a3_edu_p2_current_cnt = ($row['a3_edu_p2_current_cnt'] == '')?0:$row['a3_edu_p2_current_cnt'];
		$a3_edu_p2_current_money = ($row['a3_edu_p2_current_money'] == '')?0:$row['a3_edu_p2_current_money'];
		$a3_edu_p2_capital_cnt = ($row['a3_edu_p2_capital_cnt'] == '')?0:$row['a3_edu_p2_capital_cnt'];
		$a3_edu_p2_capital_money = ($row['a3_edu_p2_capital_money'] == '')?0:$row['a3_edu_p2_capital_money'];

		$a4_edu_p1_money = $row['a4_edu_p1_money'];
		$a4_edu_p1_current_money = $row['a4_edu_p1_current_money'];
		$a4_edu_p1_capital_money = $row['a4_edu_p1_capital_money'];

		$a5_edu_p1_money = $row['a5_edu_p1_money'];
		$a5_edu_p1_current_money = $row['a5_edu_p1_current_money'];
		$a5_edu_p1_capital_money = $row['a5_edu_p1_capital_money'];
		$a5_edu_p2_money = $row['a5_edu_p2_money'];
		$a5_edu_p2_current_money = $row['a5_edu_p2_current_money'];
		$a5_edu_p2_capital_money = $row['a5_edu_p2_capital_money'];

		$a6_item = $row['a6_item'];
		$a6_edu_money = $row['a6_edu_money'];

		$a7_edu_p1_money = $row['a7_edu_p1_money'];
		$a7_edu_p1_current_money = $row['a7_edu_p1_current_money'];
		$a7_edu_p1_capital_money = $row['a7_edu_p1_capital_money'];

		$accord_point = $row['accord_point'];
		$accord_point_ary = explode(",", $accord_point); //符合的指標

		//指標計算
		$point1 = 0;
		$point2 = 0;
		$point3 = 0;
		$point4 = 0;
		$point5 = 0;
		$point6 = 0;
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

				case "p6_1":
				case "p6_2":
					$point6 = 1;
					break;

				default:
					echo "";
			}

		}

		$point_total = $point1 + $point2 + $point3 + $point4 + $point5 + $point6;

		//縣市審核總和
		$edu_total = $a1_edu_p1_money + $a1_edu_p2_money
					+ $a2_edu_p1_money + $a2_edu_p2_money
					+ $a3_edu_p1_money + $a3_edu_p2_money
					+ $a4_edu_p1_money
					+ $a5_edu_p1_money + $a5_edu_p2_money
					+ $a6_edu_money
					+ $a7_edu_p1_money;

		//補二&五，要把兩種特色的經常與資本分別相加
		$a2_current_money = $a2_edu_p1_current_money+$a2_edu_p2_current_money;
		$a2_capital_money = $a2_edu_p1_capital_money+$a2_edu_p2_capital_money;
		$a5_current_money = $a5_edu_p1_current_money+$a5_edu_p2_current_money;
		$a5_capital_money = $a5_edu_p1_capital_money+$a5_edu_p2_capital_money;

		if($apply_money > 0)
		{
			$serial++;
			?>
				<tr height="25px">
					<td align="center"><?=$serial; //序號?></td>
					<td align="center"><?=$account; //學校帳號?></td>
					<td align="center" nowrap="nowrap"><?=$district.$schoolname; //學校名稱?></td>

					<td align="center"><? if($point1 == "1"){echo "✓";} //指標一?></td>
					<td align="center"><? if($point2 == "1"){echo "✓";} //指標二?></td>
					<td align="center"><? if($point3 == "1"){echo "✓";} //指標三?></td>
					<td align="center"><? if($point4 == "1"){echo "✓";} //指標四?></td>
					<td align="center"><? if($point5 == "1"){echo "✓";} //指標五?></td>
					<td align="center"><? if($point6 == "1"){echo "✓";} //指標六?></td>
					<td align="center" bgcolor="#99FFFF"><?=$point_total; //符合指標總數?></td>

					<? $a_small_count = $a1_edu_p1_money + $a1_edu_p2_money;  // 合計補助一 ?>
					<td align="center"                                                          ><? if($a1_edu_p1_times  > 0){echo number_format($a1_edu_p1_times);}  else{echo "-";} ?></td>
					<td align=<? if($a1_edu_p1_money > 0){echo "right";} else{echo "center";} ?>><? if($a1_edu_p1_money  > 0){echo number_format($a1_edu_p1_money);}  else{echo "-";} ?></td>
					<td align="center"                                                          ><? if($a1_edu_p2_people > 0){echo number_format($a1_edu_p2_people);} else{echo "-";} ?></td>
					<td align=<? if($a1_edu_p2_money > 0){echo "right";} else{echo "center";} ?>><? if($a1_edu_p2_money  > 0){echo number_format($a1_edu_p2_money);}  else{echo "-";} ?></td>
					<td align=<? if($a_small_count   > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a_small_count > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a2_current_money + $a2_capital_money;  // 合計補助二 ?>
					<td align=<? if($a2_current_money  > 0){echo "right";} else{echo "center";} ?>><? if($a2_current_money > 0){echo number_format($a2_current_money);}  else{echo "-";} ?></td>
					<td align=<? if($a2_capital_money  > 0){echo "right";} else{echo "center";} ?>><? if($a2_capital_money > 0){echo number_format($a2_capital_money);}  else{echo "-";} ?></td>
					<td align=<? if($a_small_count     > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFCC"><? if($a_small_count > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a3_edu_p1_current_money + $a3_edu_p1_capital_money;  // 小計補助三教師宿舍 ?>
					<td align="center"                                                                  ><? if($a3_edu_p1_current_cnt   > 0){echo number_format($a3_edu_p1_current_cnt);}   else{echo "-";} ?></td>
					<td align=<? if($a3_edu_p1_current_money > 0){echo "right";} else{echo "center";} ?>><? if($a3_edu_p1_current_money > 0){echo number_format($a3_edu_p1_current_money);} else{echo "-";} ?></td>
					<td align="center"                                                                  ><? if($a3_edu_p1_capital_cnt   > 0){echo number_format($a3_edu_p1_capital_cnt);}   else{echo "-";} ?></td>
					<td align=<? if($a3_edu_p1_capital_money > 0){echo "right";} else{echo "center";} ?>><? if($a3_edu_p1_capital_money > 0){echo number_format($a3_edu_p1_capital_money);} else{echo "-";} ?></td>
					<td align=<? if($a_small_count           > 0){echo "right";} else{echo "center";} ?>><? if($a_small_count           > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a3_edu_p2_current_money + $a3_edu_p2_capital_money;  // 小計補助三學生宿舍 ?>
					<td align="center"                                                                  ><? if($a3_edu_p2_current_cnt   > 0){echo number_format($a3_edu_p2_current_cnt);}   else{echo "-";} ?></td>
					<td align=<? if($a3_edu_p2_current_money > 0){echo "right";} else{echo "center";} ?>><? if($a3_edu_p2_current_money > 0){echo number_format($a3_edu_p2_current_money);} else{echo "-";} ?></td>
					<td align="center"                                                                  ><? if($a3_edu_p2_capital_cnt   > 0){echo number_format($a3_edu_p2_capital_cnt);}   else{echo "-";} ?></td>
					<td align=<? if($a3_edu_p2_capital_money > 0){echo "right";} else{echo "center";} ?>><? if($a3_edu_p2_capital_money > 0){echo number_format($a3_edu_p2_capital_money);} else{echo "-";} ?></td>
					<td align=<? if($a_small_count           > 0){echo "right";} else{echo "center";} ?>><? if($a_small_count           > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a3_edu_p1_current_money + $a3_edu_p1_capital_money + $a3_edu_p2_current_money + $a3_edu_p2_capital_money;  // 合計補助三 ?>
					<td align=<? if($a_small_count    > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a_small_count > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a4_edu_p1_current_money + $a4_edu_p1_capital_money;  // 合計補助四 ?>
					<td align=<? if($a4_edu_p1_current_money > 0){echo "right";} else{echo "center";} ?>><? if($a4_edu_p1_current_money > 0){echo number_format($a4_edu_p1_current_money);}  else{echo "-";} ?></td>
					<td align=<? if($a4_edu_p1_capital_money > 0){echo "right";} else{echo "center";} ?>><? if($a4_edu_p1_capital_money > 0){echo number_format($a4_edu_p1_capital_money);}  else{echo "-";} ?></td>
					<td align=<? if($a_small_count           > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFCC"><? if($a_small_count > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a5_current_money + $a5_capital_money;  // 合計補助五 ?>
					<td align=<? if($a5_current_money  > 0){echo "right";} else{echo "center";} ?>><? if($a5_current_money > 0){echo number_format($a5_current_money);}  else{echo "-";} ?></td>
					<td align=<? if($a5_capital_money  > 0){echo "right";} else{echo "center";} ?>><? if($a5_capital_money > 0){echo number_format($a5_capital_money);}  else{echo "-";} ?></td>
					<td align=<? if($a_small_count     > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a_small_count > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a6_edu_money;  // 合計補助六 ?>
					<td align=<? if($a6_edu_money  > 0 && $a6_item == '租車費')    {echo "right";} else{echo "center";} ?>><? if($a6_edu_money > 0 && $a6_item == '租車費')    {echo number_format($a6_edu_money);} else{echo "-";} ?></td>
					<td align=<? if($a6_edu_money  > 0 && $a6_item == '交通費')    {echo "right";} else{echo "center";} ?>><? if($a6_edu_money > 0 && $a6_item == '交通費')    {echo number_format($a6_edu_money);} else{echo "-";} ?></td>
					<td align=<? if($a6_edu_money  > 0 && $a6_item == '購置交通車'){echo "right";} else{echo "center";} ?>><? if($a6_edu_money > 0 && $a6_item == '購置交通車'){echo number_format($a6_edu_money);} else{echo "-";} ?></td>
					<td align=<? if($a_small_count > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFCC"><? if($a_small_count > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<? $a_small_count = $a7_edu_p1_current_money + $a7_edu_p1_capital_money;  // 合計補助七 ?>
					<td align=<? if($a7_edu_p1_current_money  > 0){echo "right";} else{echo "center";} ?>><? if($a7_edu_p1_current_money > 0){echo number_format($a7_edu_p1_current_money);}  else{echo "-";} ?></td>
					<td align=<? if($a7_edu_p1_capital_money  > 0){echo "right";} else{echo "center";} ?>><? if($a7_edu_p1_capital_money > 0){echo number_format($a7_edu_p1_capital_money);}  else{echo "-";} ?></td>
					<td align=<? if($a_small_count     > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a_small_count > 0){echo number_format($a_small_count);} else{echo "-";} ?></td>

					<td align="right" bgcolor="#FFCCCC"><?=number_format($edu_total); //各校加總?></td>
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

			$sum_a1_p1_times += $a1_edu_p1_times;
			$sum_a1_p1 += $a1_edu_p1_money;
			$sum_a1_p2_people += $a1_edu_p2_people;
			$sum_a1_p2 += $a1_edu_p2_money;
			$sum_a1 += $a1_edu_p1_money+$a1_edu_p2_money;

			$sum_a2_current += $a2_current_money;
			$sum_a2_capital += $a2_capital_money;
			$sum_a2 += $a2_current_money+$a2_capital_money;

			$sum_a3_p1_current_cnt += $a3_edu_p1_current_cnt;
			$sum_a3_p1_current_money += $a3_edu_p1_current_money;
			$sum_a3_p1_capital_cnt += $a3_edu_p1_capital_cnt;
			$sum_a3_p1_capital_money += $a3_edu_p1_capital_money;
			$sum_a3_p1 += $a3_edu_p1_current_money+$a3_edu_p1_capital_money;
			$sum_a3_p2_current_cnt += $a3_edu_p2_current_cnt;
			$sum_a3_p2_current_money += $a3_edu_p2_current_money;
			$sum_a3_p2_capital_cnt += $a3_edu_p2_capital_cnt;
			$sum_a3_p2_capital_money += $a3_edu_p2_capital_money;
			$sum_a3_p2 += $a3_edu_p2_current_money+$a3_edu_p2_capital_money;
			$sum_a3 = $sum_a3_p1 + $sum_a3_p2;

			$sum_a4_current += $a4_edu_p1_current_money;
			$sum_a4_capital += $a4_edu_p1_capital_money;
			$sum_a4 += $a4_edu_p1_current_money + $a4_edu_p1_capital_money;

			$sum_a5_current += $a5_current_money;
			$sum_a5_capital += $a5_capital_money;
			$sum_a5 += $a5_current_money + $a5_capital_money;

			$sum_a6_1 += ($a6_item == '租車費')?$a6_edu_money:0;
			$sum_a6_2 += ($a6_item == '交通費')?$a6_edu_money:0;
			$sum_a6_3 += ($a6_item == '購置交通車')?$a6_edu_money:0;
			$sum_a6 += $a6_edu_money;

			$sum_a7_current += $a7_edu_p1_current_money;
			$sum_a7_capital += $a7_edu_p1_capital_money;
			$sum_a7 += $a7_edu_p1_current_money + $a7_edu_p1_capital_money;

			$sum_a1_to_a7 += $edu_total;

		}

	}

?>
	<tr height="40px">
		<td colspan="3" align="center">合計</td>
		<td align="center"><?=number_format($sum_point1);?></td>
		<td align="center"><?=number_format($sum_point2);?></td>
		<td align="center"><?=number_format($sum_point3);?></td>
		<td align="center"><?=number_format($sum_point4);?></td>
		<td align="center"><?=number_format($sum_point5);?></td>
		<td align="center"><?=number_format($sum_point6);?></td>
		<td align="center" bgcolor="#99FFFF"><?=number_format($sum_point_total);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p1_times);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p2_people);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p2);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_capital);?></td>
		<td align="right" bgcolor="#CCFFCC"><div align="right"><?=number_format($sum_a2);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p1_current_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p1_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p1_capital_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p1_capital_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p2_current_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p2_current_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p2_capital_cnt);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p2_capital_money);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_p2);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a3);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_capital);?></td>
		<td align="right" bgcolor="#CCFFCC"><div align="right"><?=number_format($sum_a4);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a5);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_2);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_3);?></td>
		<td align="right" bgcolor="#CCFFCC"><div align="right"><?=number_format($sum_a6);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a7_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a7_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a7);?></td>
		<td align="right" bgcolor="#FFCCCC"><div align="right"><?=number_format($sum_a1_to_a7);?></td>
	</tr>
</table>
</div>
<p>
※若要進行文書格式編修，建議複製到Excel編輯。<br />
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
