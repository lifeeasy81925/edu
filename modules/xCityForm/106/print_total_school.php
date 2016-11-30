<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$school_year = $_GET['y']; //為學年度
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
			補助項目經費彙整表（學校申請列表）<p>
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
		<td colspan="3" bgcolor="#FFFFCC">一、推展親職教育活動</td>
		<td colspan="3" bgcolor="#FFFFCC">二、補助學校發展教育特色</td>
		<td colspan="3" bgcolor="#FFFFCC">三、充實學校基本教學設備</td>
		<td colspan="3" bgcolor="#FFFFCC">四、發展原住民教育文化特色及充實設備器材</td>
		<td colspan="4" bgcolor="#FFFFCC">五、補助交通不便地區學校交通車</td>
		<td colspan="3" bgcolor="#FFFFCC">六、整修學校社區化活動場所</td>
		<td rowspan="3" align="center" bgcolor="#99CCCC">學校申請金額</td>
	</tr>
	<tr>
		<td rowspan="2" align="center">親職講座</td>
		<td rowspan="2" align="center">家庭訪視</td>
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
		<td align="center">修建</td>
		<td align="center">設備</td>
	</tr>
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.seq_no ".
		   //補一資料
		   "      , a1.s_p1_money as a1_s_p1_money, a1.s_p2_money as a1_s_p2_money ".
		   
		   //補二資料
		   "      , a2.s_p1_money as a2_s_p1_money, a2.s_p2_money as a2_s_p2_money ".
		   "      , a2.s_p1_current_money as a2_s_p1_current_money ".
		   "      , a2.s_p1_capital_money as a2_s_p1_capital_money ".
		   "      , a2.s_p2_current_money as a2_s_p2_current_money ".
		   "      , a2.s_p2_capital_money as a2_s_p2_capital_money ".
		   	   
		   //補三資料
		   "      , a3.s_p1_money as a3_s_p1_money ".
		   "      , a3.s_p1_current_money as a3_s_p1_current_money ".
		   "      , a3.s_p1_capital_money as a3_s_p1_capital_money ".
		   
		   //補四資料
		   "      , a4.s_p1_money as a4_s_p1_money, a4.s_p2_money as a4_s_p2_money ".
		   "      , a4.s_p1_current_money as a4_s_p1_current_money ".
		   "      , a4.s_p1_capital_money as a4_s_p1_capital_money ".
		   "      , a4.s_p2_current_money as a4_s_p2_current_money ".
		   "      , a4.s_p2_capital_money as a4_s_p2_capital_money ".
		   
		   //補五資料
		   "      , a5.s_money as a5_s_money, a5.item as a5_item ".
		   
		   //補六資料
		   "      , a6.s_p1_money as a6_s_p1_money ".
		   "      , a6.s_p1_current_money as a6_s_p1_current_money ".
		   "      , a6.s_p1_capital_money as a6_s_p1_capital_money ".
		   
		   " from schooldata as sd left join schooldata_year          as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join alc_parenting_education  as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features   as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_teaching_equipment   as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_aboriginal_education as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_transport_car        as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_school_activity      as a6 on sy.seq_no = a6.sy_seq ".
		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.account asc ";
 
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
				
		$main_seq = $row['seq_no']; //sy.seq_no
		
		$a1_s_p1_money = ($row['a1_s_p1_money'] == '')?0:$row['a1_s_p1_money'];
		$a1_s_p2_money = ($row['a1_s_p2_money'] == '')?0:$row['a1_s_p2_money'];
		
		$a2_s_p1_money = ($row['a2_s_p1_money'] == '')?0:$row['a2_s_p1_money']; //NULL則填入0
		$a2_s_p1_current_money = ($row['a2_s_p1_current_money'] == '')?0:$row['a2_s_p1_current_money'];
		$a2_s_p1_capital_money = ($row['a2_s_p1_capital_money'] == '')?0:$row['a2_s_p1_capital_money'];
		$a2_s_p2_money = ($row['a2_s_p2_money'] == '')?0:$row['a2_s_p2_money'];
		$a2_s_p2_current_money = ($row['a2_s_p2_current_money'] == '')?0:$row['a2_s_p2_current_money'];
		$a2_s_p2_capital_money = ($row['a2_s_p2_capital_money'] == '')?0:$row['a2_s_p2_capital_money'];

		$a3_s_p1_money = ($row['a3_s_p1_money'] == '')?0:$row['a3_s_p1_money']; //NULL則填入0
		$a3_s_p1_current_money = ($row['a3_s_p1_current_money'] == '')?0:$row['a3_s_p1_current_money'];
		$a3_s_p1_capital_money = ($row['a3_s_p1_capital_money'] == '')?0:$row['a3_s_p1_capital_money'];
		
		$a4_s_p1_money = ($row['a4_s_p1_money'] == '')?0:$row['a4_s_p1_money']; //NULL則填入0
		$a4_s_p1_current_money = ($row['a4_s_p1_current_money'] == '')?0:$row['a4_s_p1_current_money'];
		$a4_s_p1_capital_money = ($row['a4_s_p1_capital_money'] == '')?0:$row['a4_s_p1_capital_money'];
		$a4_s_p2_money = ($row['a4_s_p2_money'] == '')?0:$row['a4_s_p2_money'];
		$a4_s_p2_current_money = ($row['a4_s_p2_current_money'] == '')?0:$row['a4_s_p2_current_money'];
		$a4_s_p2_capital_money = ($row['a4_s_p2_capital_money'] == '')?0:$row['a4_s_p2_capital_money'];
		
		$a5_item = $row['a5_item'];
		$a5_s_money = ($row['a5_s_money'] == '')?0:$row['a5_s_money'];
		
		$a6_s_p1_money = ($row['a6_s_p1_money'] == '')?0:$row['a6_s_p1_money']; //NULL則填入0
		$a6_s_p1_current_money = ($row['a6_s_p1_current_money'] == '')?0:$row['a6_s_p1_current_money'];
		$a6_s_p1_capital_money = ($row['a6_s_p1_capital_money'] == '')?0:$row['a6_s_p1_capital_money'];
		
		//各校所有補助加總
		$school_total_money = $a1_s_p1_money + $a1_s_p2_money
							+ $a2_s_p1_money + $a2_s_p2_money
							+ $a3_s_p1_money
							+ $a4_s_p1_money + $a4_s_p2_money
							+ $a5_s_money
							+ $a6_s_p1_money;
		
		//補二&四，要把兩種特色的經常與資本分別相加
		$a2_current_money = $a2_s_p1_current_money+$a2_s_p2_current_money;
		$a2_capital_money = $a2_s_p1_capital_money+$a2_s_p2_capital_money;
		$a4_current_money = $a4_s_p1_current_money+$a4_s_p2_current_money;
		$a4_capital_money = $a4_s_p1_capital_money+$a4_s_p2_capital_money;
		
		if($school_total_money > 0)
		{	
			$serial++;
			
			?>
				<tr height="30px">
					<td align="center"><?=$serial;                                                      // 序號     ?></td>
					<td align="center"><?=$account;                                                     // 學校帳號 ?></td>
					<td align="center"><?=$cityname.$district.$schoolname;                              // 學校名稱 ?></td>
					
					<td align="right"><?=number_format($a1_s_p1_money);                                   // 補一親職     ?></td>
					<td align="right"><?=number_format($a1_s_p2_money);                                   // 補一家庭訪視 ?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a1_s_p1_money+$a1_s_p2_money);  // 補一         ?></td>
					
					<td align="right"><?=number_format($a2_current_money);                                      // 補二經常 ?></td>
					<td align="right"><?=number_format($a2_capital_money);                                      // 補二資本 ?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a2_current_money+$a2_capital_money);  // 補二     ?></td>
					
					<td align="right"><?=number_format($a3_s_p1_current_money);                                           // 補三經常 ?></td>
					<td align="right"><?=number_format($a3_s_p1_capital_money);                                           // 補三資本 ?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a3_s_p1_current_money+$a3_s_p1_capital_money);  // 補三資本 ?></td>
					
					<td align="right"><?=number_format($a4_current_money);                                      // 補四經常 ?></td>
					<td align="right"><?=number_format($a4_capital_money);                                      // 補四資本 ?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a4_current_money+$a4_capital_money);  // 補四     ?></td>
					
					<td align="right"><?=($a5_item == '租車費')?number_format($a5_s_money):0;      // 補五租車費     ?></td>
					<td align="right"><?=($a5_item == '交通費')?number_format($a5_s_money):0;      // 補五交通費     ?></td>
					<td align="right"><?=($a5_item == '購置交通車')?number_format($a5_s_money):0;  // 補五購置交通車 ?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a5_s_money);             // 補五           ?></td>
					
					<td align="right"><?=number_format($a6_s_p1_current_money);                                           // 補六修建 ?></td>
					<td align="right"><?=number_format($a6_s_p1_capital_money);                                           // 補六設備 ?></td>
					<td align="right" bgcolor="#FFFFCC"><?=number_format($a6_s_p1_current_money+$a6_s_p1_capital_money);  // 補六     ?></td>
					
					<td align="right" bgcolor="#99CCCC"><?=number_format($school_total_money);                            // 各校加總 ?></td>
				</tr>
			<?
			
			//計算各補助總合
			$sum_a1_p1 += $a1_s_p1_money;
			$sum_a1_p2 += $a1_s_p2_money;
			$sum_a2_current += $a2_current_money;
			$sum_a2_capital += $a2_capital_money;
			$sum_a3_current += $a3_s_p1_current_money;
			$sum_a3_capital += $a3_s_p1_capital_money;
			$sum_a4_current += $a4_current_money;
			$sum_a4_capital += $a4_capital_money;
			$sum_a5_1 += ($a5_item == '租車費')?$a5_s_money:0;
			$sum_a5_2 += ($a5_item == '交通費')?$a5_s_money:0;
			$sum_a5_3 += ($a5_item == '購置交通車')?$a5_s_money:0;
			$sum_a6_current += $a6_s_p1_current_money;
			$sum_a6_capital += $a6_s_p1_capital_money;
			
			$sum_a1_to_a6 += $school_total_money;
		}
	}
?>
	<tr height="30px">
		<td colspan="3" align="center">合計</td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a1_p2);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a1_p1+$sum_a1_p2);?></td>
		
		<td align="right"><div align="right"><?=number_format($sum_a2_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a2_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a2_current+$sum_a2_capital);?></td>
		
		<td align="right"><div align="right"><?=number_format($sum_a3_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a3_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a3_current+$sum_a3_capital);?></td>
		
		<td align="right"><div align="right"><?=number_format($sum_a4_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a4_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a4_current+$sum_a4_capital);?></td>
		
		<td align="right"><div align="right"><?=number_format($sum_a5_1);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_2);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a5_3);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a5_1+$sum_a5_2+$sum_a5_3);?></td>
		
		<td align="right"><div align="right"><?=number_format($sum_a6_current);?></td>
		<td align="right"><div align="right"><?=number_format($sum_a6_capital);?></td>
		<td align="right" bgcolor="#FFFFCC"><div align="right"><?=number_format($sum_a6_current+$sum_a6_capital);?></td>
		
		<td align="right" bgcolor="#99CCCC"><div align="right"><?=number_format($sum_a1_to_a6);?></td>
	</tr>
</table>
</div>
<p>

<?
/*
● 若要進行文書格式編修，建議複製到Excel編輯。<br />
● 操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
*/
?>