<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$get_id = $_GET['ct'];

	if($get_id != "")
		$cityname = $get_id;

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="print_content">

<?
		$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".

				//細項
				"      , a1.edu_p1_money as a1_edu_p1_money, a1.edu_p2_money as a1_edu_p2_money ".
				"      , a1_e.p1_used_money as a1_p1_used_money, a1_e.p2_used_money as a1_p2_used_money ".

				"      , a2.edu_p1_current_money as a2_edu_p1_current_money ".
				"      , a2.edu_p1_capital_money as a2_edu_p1_capital_money ".
				"      , a2.edu_p2_current_money as a2_edu_p2_current_money ".
				"      , a2.edu_p2_capital_money as a2_edu_p2_capital_money ".
				"      , a2_e.p1_current_money as a2_p1_current_money ".
				"      , a2_e.p1_capital_money as a2_p1_capital_money ".
				"      , a2_e.p2_current_money as a2_p2_current_money ".
				"      , a2_e.p2_capital_money as a2_p2_capital_money ".

				"      , a3.edu_p1_current_money as a3_edu_p1_current_money ".
				"      , a3.edu_p1_capital_money as a3_edu_p1_capital_money ".
				"      , a3_e.execute_current_money as a3_execute_current_money ".
				"      , a3_e.execute_capital_money as a3_execute_capital_money ".

				"      , a4.edu_p1_current_money as a4_edu_p1_current_money ".
				"      , a4.edu_p1_capital_money as a4_edu_p1_capital_money ".
				"      , a4.edu_p2_current_money as a4_edu_p2_current_money ".
				"      , a4.edu_p2_capital_money as a4_edu_p2_capital_money ".
				"      , a4_e.p1_current_money as a4_p1_current_money ".
				"      , a4_e.p1_capital_money as a4_p1_capital_money ".
				"      , a4_e.p2_current_money as a4_p2_current_money ".
				"      , a4_e.p2_capital_money as a4_p2_capital_money ".

				"      , a5.edu_total_money as a5_edu_total_money, a5.item as a5_item ".
				"      , a5_e.execute_money as a5_execute_money ".

				"      , a6.edu_total_money as a6_edu_total_money ".
				"      , a6.edu_p1_money as a6_edu_p1_money ".
				"      , a6.edu_p1_current_money as a6_edu_p1_current_money ".
				"      , a6.edu_p1_capital_money as a6_edu_p1_capital_money ".
				"      , a6_e.execute_money as a6_execute_money ".

				//總金額
				"      , a1.edu_total_money as a1_edu_total_money ".
				"      , a1_e.execute_money as a1_execute_money ".

				"      , a2.edu_total_money as a2_edu_total_money ".
				"      , a2_e.execute_money as a2_execute_money ".

				"      , a3.edu_total_money as a3_edu_total_money ".
				"      , a3_e.execute_money as a3_execute_money ".

				"      , a4.edu_total_money as a4_edu_total_money ".
				"      , a4_e.execute_money as a4_execute_money ".

				"      , a5.edu_total_money as a5_edu_total_money ".
				"      , a5_e.execute_money as a5_execute_money ".

				"      , a6.edu_total_money as a6_edu_total_money ".
				"      , a6_e.execute_money as a6_execute_money ".

				" from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
				"                       left join $a1_table_name as a1 on sy.seq_no = a1.sy_seq ".
				"                       left join $a2_table_name as a2 on sy.seq_no = a2.sy_seq ".
				"                       left join $a3_table_name as a3 on sy.seq_no = a3.sy_seq ".
				"                       left join $a4_table_name as a4 on sy.seq_no = a4.sy_seq ".
				"                       left join $a5_table_name as a5 on sy.seq_no = a5.sy_seq ".
				"                       left join $a6_table_name as a6 on sy.seq_no = a6.sy_seq ".

				"                       left join $a1_table_name_effect as a1_e on sy.seq_no = a1_e.sy_seq ".
				"                       left join $a2_table_name_effect as a2_e on sy.seq_no = a2_e.sy_seq ".
				"                       left join $a3_table_name_effect as a3_e on sy.seq_no = a3_e.sy_seq ".
				"                       left join $a4_table_name_effect as a4_e on sy.seq_no = a4_e.sy_seq ".
				"                       left join $a5_table_name_effect as a5_e on sy.seq_no = a5_e.sy_seq ".
				"                       left join $a6_table_name_effect as a6_e on sy.seq_no = a6_e.sy_seq ".

				" where ".
				"   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ";

		if($cityname != "全國")	$sql .= "   and sd.cityname = '$cityname' ";

		$sql .= " order by sd.cityname, sd.account ";

	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		//補助一
		$a1_edu_p1_money = ($row['a1_edu_p1_money'] == '')?0:$row['a1_edu_p1_money'];
		$a1_edu_p2_money = ($row['a1_edu_p2_money'] == '')?0:$row['a1_edu_p2_money'];
		$a1_p1_used_money = ($row['a1_p1_used_money'] == '')?0:$row['a1_p1_used_money'];
		$a1_p2_used_money = ($row['a1_p2_used_money'] == '')?0:$row['a1_p2_used_money'];

		$sum_a1_edu_p1 += $a1_edu_p1_money;
		$sum_a1_edu_p2 += $a1_edu_p2_money;
		if($a1_edu_p1_money > 0) $cnt_a1_edu_p1++;
		if($a1_edu_p2_money > 0) $cnt_a1_edu_p2++;

		$sum_a1_p1_used += $a1_p1_used_money;
		$sum_a1_p2_used += $a1_p2_used_money;
		if($a1_p1_used_money > 0) $cnt_a1_p1_used++;
		if($a1_p2_used_money > 0) $cnt_a1_p2_used++;

		//補助二
		$a2_edu_p1_current_money = ($row['a2_edu_p1_current_money'] == '')?0:$row['a2_edu_p1_current_money'];
		$a2_edu_p1_capital_money = ($row['a2_edu_p1_capital_money'] == '')?0:$row['a2_edu_p1_capital_money'];
		$a2_edu_p2_current_money = ($row['a2_edu_p2_current_money'] == '')?0:$row['a2_edu_p2_current_money'];
		$a2_edu_p2_capital_money = ($row['a2_edu_p2_capital_money'] == '')?0:$row['a2_edu_p2_capital_money'];
		$a2_p1_current_money = ($row['a2_p1_current_money'] == '')?0:$row['a2_p1_current_money'];
		$a2_p1_capital_money = ($row['a2_p1_capital_money'] == '')?0:$row['a2_p1_capital_money'];
		$a2_p2_current_money = ($row['a2_p2_current_money'] == '')?0:$row['a2_p2_current_money'];
		$a2_p2_capital_money = ($row['a2_p2_capital_money'] == '')?0:$row['a2_p2_capital_money'];

		$a2_edu_current_money = $a2_edu_p1_current_money + $a2_edu_p2_current_money;
		$a2_edu_capital_money = $a2_edu_p1_capital_money + $a2_edu_p2_capital_money;
		$a2_current_money = $a2_p1_current_money + $a2_p2_current_money;
		$a2_capital_money = $a2_p1_capital_money + $a2_p2_capital_money;

		$sum_a2_edu_current += $a2_edu_current_money;
		$sum_a2_edu_capital += $a2_edu_capital_money;
		if($a2_edu_current_money > 0) $cnt_a2_edu_current++;
		if($a2_edu_capital_money > 0) $cnt_a2_edu_capital++;

		$sum_a2_current += $a2_current_money;
		$sum_a2_capital += $a2_capital_money;
		if($a2_current_money > 0) $cnt_a2_current++;
		if($a2_capital_money > 0) $cnt_a2_capital++;

		//補助四
		$a3_edu_p1_current_money = ($row['a3_edu_p1_current_money'] == '')?0:$row['a3_edu_p1_current_money'];
		$a3_edu_p1_capital_money = ($row['a3_edu_p1_capital_money'] == '')?0:$row['a3_edu_p1_capital_money'];
		$a3_execute_current_money = ($row['a3_execute_current_money'] == '')?0:$row['a3_execute_current_money'];
		$a3_execute_capital_money = ($row['a3_execute_capital_money'] == '')?0:$row['a3_execute_capital_money'];

		$sum_a3_edu_current += $a3_edu_p1_current_money;
		$sum_a3_edu_capital += $a3_edu_p1_capital_money;
		if($a3_edu_p1_current_money > 0) $cnt_a3_edu_current++;
		if($a3_edu_p1_capital_money > 0) $cnt_a3_edu_capital++;

		$sum_a3_current += $a3_execute_current_money;
		$sum_a3_capital += $a3_execute_capital_money;
		if($a3_execute_current_money > 0) $cnt_a3_current++;
		if($a3_execute_capital_money > 0) $cnt_a3_capital++;

		//補助五
		$a4_edu_p1_current_money = ($row['a4_edu_p1_current_money'] == '')?0:$row['a4_edu_p1_current_money'];
		$a4_edu_p1_capital_money = ($row['a4_edu_p1_capital_money'] == '')?0:$row['a4_edu_p1_capital_money'];
		$a4_edu_p2_current_money = ($row['a4_edu_p2_current_money'] == '')?0:$row['a4_edu_p2_current_money'];
		$a4_edu_p2_capital_money = ($row['a4_edu_p2_capital_money'] == '')?0:$row['a4_edu_p2_capital_money'];
		$a4_p1_current_money = ($row['a4_p1_current_money'] == '')?0:$row['a4_p1_current_money'];
		$a4_p1_capital_money = ($row['a4_p1_capital_money'] == '')?0:$row['a4_p1_capital_money'];
		$a4_p2_current_money = ($row['a4_p2_current_money'] == '')?0:$row['a4_p2_current_money'];
		$a4_p2_capital_money = ($row['a4_p2_capital_money'] == '')?0:$row['a4_p2_capital_money'];

		$a4_edu_current_money = $a4_edu_p1_current_money + $a4_edu_p2_current_money;
		$a4_edu_capital_money = $a4_edu_p1_capital_money + $a4_edu_p2_capital_money;
		$a4_current_money = $a4_p1_current_money + $a4_p2_current_money;
		$a4_capital_money = $a4_p1_capital_money + $a4_p2_capital_money;

		$sum_a4_edu_current += $a4_edu_current_money;
		$sum_a4_edu_capital += $a4_edu_capital_money;
		if($a4_edu_current_money > 0) $cnt_a4_edu_current++;
		if($a4_edu_capital_money > 0) $cnt_a4_edu_capital++;

		$sum_a4_current += $a4_current_money;
		$sum_a4_capital += $a4_capital_money;
		if($a4_current_money > 0) $cnt_a4_current++;
		if($a4_capital_money > 0) $cnt_a4_capital++;

		//補助六
		$a5_item = $row['a5_item'];
		$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money']; //NULL則填入0
		$a5_execute_money = ($row['a5_execute_money'] == '')?0:$row['a5_execute_money'];

		if($a5_item == '租車費')
		{
			$sum_a5_edu_1 += $a5_edu_total_money;
			if($a5_edu_total_money > 0) $cnt_a5_edu_1++;

			$sum_a5_1 += $a5_execute_money;
			if($a5_execute_money > 0) $cnt_a5_1++;
		}
		if($a5_item == '交通費')
		{
			$sum_a5_edu_2 += $a5_edu_total_money;
			if($a5_edu_total_money > 0) $cnt_a5_edu_2++;

			$sum_a5_2 += $a5_execute_money;
			if($a5_execute_money > 0) $cnt_a5_2++;
		}
		if($a5_item == '購置交通車')
		{
			$sum_a5_edu_3 += $a5_edu_total_money;
			if($a5_edu_total_money > 0) $cnt_a5_edu_3++;

			$sum_a5_3 += $a5_execute_money;
			if($a5_execute_money > 0) $cnt_a5_3++;
		}

		//補助七
		$a6_edu_p1_current_money = ($row['a6_edu_p1_current_money'] == '')?0:$row['a6_edu_p1_current_money'];
		$a6_edu_p1_capital_money = ($row['a6_edu_p1_capital_money'] == '')?0:$row['a6_edu_p1_capital_money'];
		$a6_execute_current_money = ($row['a6_execute_current_money'] == '')?0:$row['a6_execute_current_money'];
		$a6_execute_capital_money = ($row['a6_execute_capital_money'] == '')?0:$row['a6_execute_capital_money'];

		$sum_a6_edu_current += $a6_edu_p1_current_money;
		$sum_a6_edu_capital += $a6_edu_p1_capital_money;
		if($a6_edu_p1_current_money > 0) $cnt_a6_edu_current++;
		if($a6_edu_p1_capital_money > 0) $cnt_a6_edu_capital++;

		$sum_a6_current += $a6_execute_current_money;
		$sum_a6_capital += $a6_execute_capital_money;
		if($a6_execute_current_money > 0) $cnt_a6_current++;
		if($a6_execute_capital_money > 0) $cnt_a6_capital++;

		//總金額
		$a1_edu_total_money = ($row['a1_edu_total_money'] == '')?0:$row['a1_edu_total_money']; //NULL則填入0
		$a1_execute_money = ($row['a1_execute_money'] == '')?0:$row['a1_execute_money'];

		$a2_edu_total_money = ($row['a2_edu_total_money'] == '')?0:$row['a2_edu_total_money']; //NULL則填入0
		$a2_execute_money = ($row['a2_execute_money'] == '')?0:$row['a2_execute_money'];

		$a3_edu_total_money = ($row['a3_edu_total_money'] == '')?0:$row['a3_edu_total_money']; //NULL則填入0
		$a3_execute_money = ($row['a3_execute_money'] == '')?0:$row['a3_execute_money'];

		$a4_edu_total_money = ($row['a4_edu_total_money'] == '')?0:$row['a4_edu_total_money']; //NULL則填入0
		$a4_execute_money = ($row['a4_execute_money'] == '')?0:$row['a4_execute_money'];

		$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money']; //NULL則填入0
		$a5_execute_money = ($row['a5_execute_money'] == '')?0:$row['a5_execute_money'];

		$a6_edu_total_money = ($row['a6_edu_total_money'] == '')?0:$row['a6_edu_total_money']; //NULL則填入0
		$a6_execute_money = ($row['a6_execute_money'] == '')?0:$row['a6_execute_money'];

		$sum_edu_total_money += $a1_edu_total_money + $a2_edu_total_money 
							 + $a3_edu_total_money + $a4_edu_total_money + $a5_edu_total_money
							 + $a6_edu_total_money;

		$sum_execute_money += $a1_execute_money + $a2_execute_money 
							 + $a3_execute_money + $a4_execute_money + $a5_execute_money
							 + $a6_execute_money;

	}

?>

<div id="print_content">

<table align="center">
	<tr>
		<td width="100%" align="center">
			<font face="標楷體" size="+2">
				<? if($cityname == "全國"){echo "";} else{echo $cityname . "政府執行";} ?>教育部<?=$school_year;?>年度推動教育優先區計畫<p>
				執行成效列表<? if($cityname == "全國"){echo "";} else{echo $cityname . "（縣市總表）";} ?>
			</font>
		</td>
	</tr>
</table>
<p>

<table align="center" border="1" cellspacing="0" cellpadding="0">
	<tr height="30px">
		<td rowspan="2" align="center">項次</td>
		<td colspan="3" rowspan="2" align="center">補助項目</td>
		<td colspan="2" align="center" bgcolor="#FCE4D6">教育部核定數量及金額</td>
		<td colspan="2" align="center" bgcolor="#E2EFDA">學校執行數量及金額</td>
		<td align="center" bgcolor="#FFF2CC">執行成效百分比 (%)</td>
	</tr>
	<tr height="30px">
		<td align="center" bgcolor="#FCE4D6">校數</td>
		<td align="center" bgcolor="#FCE4D6">金額(元)</td>
		<td align="center" bgcolor="#E2EFDA">校數</td>
		<td align="center" bgcolor="#E2EFDA">金額(元)</td>
		<td align="center" bgcolor="#FFF2CC">金額</td>
	</tr>
	<tr height="30px">
		<td rowspan="2" align="center">一</td>
		<td rowspan="2">推展親職教育活動</td>
		<td colspan="2">親職教育活動(場)</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a1_edu_p1); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a1_edu_p1); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a1_p1_used); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a1_p1_used); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a1_p1_used / $sum_a1_edu_p1 * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td colspan="2">目標學生家庭訪視輔導(人)</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a1_edu_p2); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a1_edu_p2); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a1_p2_used); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a1_p2_used); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a1_p2_used / $sum_a1_edu_p2 * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td rowspan="2" align="center">二</td>
		<td colspan="2" rowspan="2">補助學校發展教育特色(項)</td>
		<td>經常門</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a2_edu_current); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a2_edu_current); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a2_current); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a2_current); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a2_current / $sum_a2_edu_current * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td>資本門</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a2_edu_capital); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a2_edu_capital); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a2_capital); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a2_capital); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a2_capital / $sum_a2_edu_capital * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td rowspan="2" align="center">三</td>
		<td colspan="2" rowspan="2">充實學校基本教學設備</td>
		<td>經常門</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a3_edu_current); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a3_edu_current); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a3_current); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a3_current); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a3_current / $sum_a3_edu_current * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td>資本門</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a3_edu_capital); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a3_edu_capital); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a3_capital); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a3_capital); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a3_capital / $sum_a3_edu_capital * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td rowspan="2" align="center">四</td>
		<td colspan="2" rowspan="2">發展原住民教育文化特色及充實設備器材</td>
		<td>經常門(項)</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a4_edu_current); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a4_edu_current); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a4_current); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a4_current); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a4_current / $sum_a4_edu_current * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td>資本門(式)</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a4_edu_capital); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a4_edu_capital); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a4_capital); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a4_capital); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a4_capital / $sum_a4_edu_capital * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td rowspan="3" align="center">五</td>
		<td rowspan="3">補助交通不便地區學校交通車</td>
		<td colspan="2">補助租車費(輛)</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a5_edu_1); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a5_edu_1); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a5_1); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a5_1); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a5_1 / $sum_a5_edu_1 * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td colspan="2">補助交通費(人)</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a5_edu_2); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a5_edu_2); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a5_2); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a5_2); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a5_2 / $sum_a5_edu_2 * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td colspan="2">補助購買交通車(輛)</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a5_edu_3); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a5_edu_3); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a5_3); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a5_3); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a5_3 / $sum_a5_edu_3 * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td rowspan="2" align="center">六</td>
		<td rowspan="2">整修學校社區化活動場所</td>
		<td rowspan="2">綜合球場</td>
		<td>修建</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a6_edu_current); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a6_edu_current); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a6_current); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a6_current); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a6_current / $sum_a6_edu_current * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td>設備</td>
		<td align="center" bgcolor="#FCE4D6"><? echo number_format($cnt_a6_edu_capital); ?></td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_a6_edu_capital); ?></td>
		<td align="center" bgcolor="#E2EFDA"><? echo number_format($cnt_a6_capital); ?></td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_a6_capital); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_a6_capital / $sum_a6_edu_capital * 100,2).'%'; ?></td>
	</tr>
	<tr height="30px">
		<td colspan="4" align="center">總計</td>
		<td align="center" bgcolor="#FCE4D6">-</td>
		<td align="right"  bgcolor="#FCE4D6"><? echo number_format($sum_edu_total_money); ?></td>
		<td align="center" bgcolor="#E2EFDA">-</td>
		<td align="right"  bgcolor="#E2EFDA"><? echo number_format($sum_execute_money); ?></td>
		<td align="right"  bgcolor="#FFF2CC"><? echo number_format($sum_execute_money / $sum_edu_total_money * 100 , 2).'%'; ?></td>
	</tr>
	<tr height="60px">
		<td align="center" colspan="10">
			<font face="標楷體" size="+1">
				承辦人：　　　　　　　科長：　　　　　　　局（處）長：　　　　　　　
			</font>
		</td>
	</tr>
</table>
<p>
</div>

<?
/*
※若要進行文書格式編修，建議複製到Excel編輯。<p>
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
*/
?>