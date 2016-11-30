<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	include "../../function/config_for_104.php"; //本年度基本設定

	$get_id = $_GET['ct'];

	if($get_id != "")
	{
		$cityname = $get_id;
	}
?>

<? include "../../function/button_print.php"; ?><p>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div id="print_content">

<table width="100%" align="center">
	<tr>
		<td align="center">
			<font face="標楷體" size="+2">
				<?=$cityname;?>政府執行教育部<?=$school_year;?>年度推動教育優先區計畫<p>
				執行成效列表（學校列表）
			</font>
		</td>
	</tr>
</table>
<p>

<table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:13px">
	<tr>
		<td nowrap="nowrap" rowspan="2" align="center" bgcolor="#FFCC99">序號</td>
		<td nowrap="nowrap" rowspan="2" align="center" bgcolor="#FFCC99">學校編號</td>
		<td nowrap="nowrap" rowspan="2" align="center" bgcolor="#FFCC99">學校名稱</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">一、推展親職教育活動</td>
		<td colspan="3" align="center" bgcolor="#CCFFFF">二、補助學校發展教育特色</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">三、修繕離島或偏遠地區師生宿舍</td>
		<td colspan="3" align="center" bgcolor="#CCFFFF">四、充實學校基本教學設備</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">五、發展原住民教育文化特色及充實設備器材</td>
		<td colspan="3" align="center" bgcolor="#CCFFFF">六、補助交通不便地區學校交通車</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">七、整修學校社區化活動場所</td>
		<td colspan="3" align="center" bgcolor="#FFCC99">學校合計</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#FFFFCC">核定金額</td>
		<td align="center" bgcolor="#FFFFCC">執行金額</td>
		<td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
		<td align="center" bgcolor="#CCFFFF">核定金額</td>
		<td align="center" bgcolor="#CCFFFF">執行金額</td>
		<td align="center" bgcolor="#CCFFFF">執行成效(%)</td>
		<td align="center" bgcolor="#FFFFCC">核定金額</td>
		<td align="center" bgcolor="#FFFFCC">執行金額</td>
		<td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
		<td align="center" bgcolor="#CCFFFF">核定金額</td>
		<td align="center" bgcolor="#CCFFFF">執行金額</td>
		<td align="center" bgcolor="#CCFFFF">執行成效(%)</td>
		<td align="center" bgcolor="#FFFFCC">核定金額</td>
		<td align="center" bgcolor="#FFFFCC">執行金額</td>
		<td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
		<td align="center" bgcolor="#CCFFFF">核定金額</td>
		<td align="center" bgcolor="#CCFFFF">執行金額</td>
		<td align="center" bgcolor="#CCFFFF">執行成效(%)</td>
		<td align="center" bgcolor="#FFFFCC">核定金額</td>
		<td align="center" bgcolor="#FFFFCC">執行金額</td>
		<td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
		<td align="center" bgcolor="#FFCC99">核定金額</td>
		<td align="center" bgcolor="#FFCC99">執行金額</td>
		<td align="center" bgcolor="#FFCC99">執行成效(%)</td>
	</tr>
<?
		$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".

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

		   "      , a7.edu_total_money as a7_edu_total_money ".
		   "      , a7_e.execute_money as a7_execute_money ".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join $a1_table_name as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join $a2_table_name as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join $a3_table_name as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join $a4_table_name as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join $a5_table_name as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join $a6_table_name as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join $a7_table_name as a7 on sy.seq_no = a7.sy_seq ".

		   "                       left join $a1_table_name_effect as a1_e on sy.seq_no = a1_e.sy_seq ".
		   "                       left join $a2_table_name_effect as a2_e on sy.seq_no = a2_e.sy_seq ".
		   "                       left join $a3_table_name_effect as a3_e on sy.seq_no = a3_e.sy_seq ".
		   "                       left join $a4_table_name_effect as a4_e on sy.seq_no = a4_e.sy_seq ".
		   "                       left join $a5_table_name_effect as a5_e on sy.seq_no = a5_e.sy_seq ".
		   "                       left join $a6_table_name_effect as a6_e on sy.seq_no = a6_e.sy_seq ".
		   "                       left join $a7_table_name_effect as a7_e on sy.seq_no = a7_e.sy_seq ".

		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.cityname, sd.account ";

	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['sd_account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];

		$a1_edu_total_money = ($row['a1_edu_total_money'] == '')?0:$row['a1_edu_total_money']; //NULL則填入0
		$a1_execute_money = ($row['a1_execute_money'] == '')?0:$row['a1_execute_money'];
		$a1_percent = number_format($a1_execute_money / $a1_edu_total_money * 100, 1);

		$a2_edu_total_money = ($row['a2_edu_total_money'] == '')?0:$row['a2_edu_total_money']; //NULL則填入0
		$a2_execute_money = ($row['a2_execute_money'] == '')?0:$row['a2_execute_money'];
		$a2_percent = number_format($a2_execute_money / $a2_edu_total_money * 100, 1);

		$a3_edu_total_money = ($row['a3_edu_total_money'] == '')?0:$row['a3_edu_total_money']; //NULL則填入0
		$a3_execute_money = ($row['a3_execute_money'] == '')?0:$row['a3_execute_money'];
		$a3_percent = number_format($a3_execute_money / $a3_edu_total_money * 100, 1);

		$a4_edu_total_money = ($row['a4_edu_total_money'] == '')?0:$row['a4_edu_total_money']; //NULL則填入0
		$a4_execute_money = ($row['a4_execute_money'] == '')?0:$row['a4_execute_money'];
		$a4_percent = number_format($a4_execute_money / $a4_edu_total_money * 100, 1);

		$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money']; //NULL則填入0
		$a5_execute_money = ($row['a5_execute_money'] == '')?0:$row['a5_execute_money'];
		$a5_percent = number_format($a5_execute_money / $a5_edu_total_money * 100, 1);

		$a6_edu_total_money = ($row['a6_edu_total_money'] == '')?0:$row['a6_edu_total_money']; //NULL則填入0
		$a6_execute_money = ($row['a6_execute_money'] == '')?0:$row['a6_execute_money'];
		$a6_percent = number_format($a6_execute_money / $a6_edu_total_money * 100, 1);

		$a7_edu_total_money = ($row['a7_edu_total_money'] == '')?0:$row['a7_edu_total_money']; //NULL則填入0
		$a7_execute_money = ($row['a7_execute_money'] == '')?0:$row['a7_execute_money'];
		$a7_percent = number_format($a7_execute_money / $a7_edu_total_money * 100, 1);

		$sum_edu_total_money = $a1_edu_total_money + $a2_edu_total_money + $a3_edu_total_money
							 + $a4_edu_total_money + $a5_edu_total_money + $a6_edu_total_money
							 + $a7_edu_total_money;

		$sum_execute_money = $a1_execute_money + $a2_execute_money + $a3_execute_money
							 + $a4_execute_money + $a5_execute_money + $a6_execute_money
							 + $a7_execute_money;

		$sum_percent = number_format($sum_execute_money / $sum_edu_total_money * 100, 1);

		$sum_a1_edu += $a1_edu_total_money;
		$sum_a2_edu += $a2_edu_total_money;
		$sum_a3_edu += $a3_edu_total_money;
		$sum_a4_edu += $a4_edu_total_money;
		$sum_a5_edu += $a5_edu_total_money;
		$sum_a6_edu += $a6_edu_total_money;
		$sum_a7_edu += $a7_edu_total_money;

		$sum_a1_execute += $a1_execute_money;
		$sum_a2_execute += $a2_execute_money;
		$sum_a3_execute += $a3_execute_money;
		$sum_a4_execute += $a4_execute_money;
		$sum_a5_execute += $a5_execute_money;
		$sum_a6_execute += $a6_execute_money;
		$sum_a7_execute += $a7_execute_money;

		$sum_edu_all += $sum_edu_total_money;
		$sum_all += $sum_execute_money;

		if($sum_edu_total_money > 0)
		{
			$serial++;
			?>
				<tr height="30px">
					<td align="center" bgcolor="#FFCC99" nowrap="nowrap"><?=$serial;   // 序號?></td>
					<td align="center" bgcolor="#FFCC99" nowrap="nowrap"><?=$account;  // 學校編號?></td>
					<td align="center" bgcolor="#FFCC99" nowrap="nowrap"><?=$district.$schoolname;//校名?></td>

					<td align=<? if($a1_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a1_edu_total_money > 0){echo number_format($a1_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($a1_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a1_edu_total_money > 0){echo number_format($a1_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($a1_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a1_edu_total_money > 0){echo $a1_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>

					<td align=<? if($a2_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a2_edu_total_money > 0){echo number_format($a2_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($a2_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a2_edu_total_money > 0){echo number_format($a2_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($a2_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a2_edu_total_money > 0){echo $a2_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>

					<td align=<? if($a3_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a3_edu_total_money > 0){echo number_format($a3_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($a3_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a3_edu_total_money > 0){echo number_format($a3_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($a3_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a3_edu_total_money > 0){echo $a3_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>

					<td align=<? if($a4_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a4_edu_total_money > 0){echo number_format($a4_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($a4_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a4_edu_total_money > 0){echo number_format($a4_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($a4_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a4_edu_total_money > 0){echo $a4_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>

					<td align=<? if($a5_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a5_edu_total_money > 0){echo number_format($a5_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($a5_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a5_edu_total_money > 0){echo number_format($a5_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($a5_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a5_edu_total_money > 0){echo $a5_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>

					<td align=<? if($a6_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a6_edu_total_money > 0){echo number_format($a6_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($a6_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a6_edu_total_money > 0){echo number_format($a6_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($a6_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#CCFFFF"><? if($a6_edu_total_money > 0){echo $a6_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>

					<td align=<? if($a7_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a7_edu_total_money > 0){echo number_format($a7_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($a7_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a7_edu_total_money > 0){echo number_format($a7_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($a7_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFFFCC"><? if($a7_edu_total_money > 0){echo $a7_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>

					<td align=<? if($sum_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFCC99"><? if($sum_edu_total_money > 0){echo number_format($sum_edu_total_money);} else{echo "-";}  // 核定金額 ?></td>
					<td align=<? if($sum_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFCC99"><? if($sum_edu_total_money > 0){echo number_format($sum_execute_money);}   else{echo "-";}  // 執行金額 ?></td>
					<td align=<? if($sum_edu_total_money > 0){echo "right";} else{echo "center";} ?> bgcolor="#FFCC99"><? if($sum_edu_total_money > 0){echo $sum_percent."%";}                    else{echo "-";}  // 執行成效 ?></td>
				</tr>
			<?
		}
	}
?>
	<tr height="40px">
		<td colspan="3" align='center' bgcolor="#FFCC99">總計</td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a1_edu); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a1_execute); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a1_execute / $sum_a1_edu * 100, 2)."%";?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a2_edu); ?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a2_execute); ?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a2_execute / $sum_a2_edu * 100, 2)."%";?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a3_edu); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a3_execute); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a3_execute / $sum_a3_edu * 100, 2)."%";?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a4_edu); ?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a4_execute); ?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a4_execute / $sum_a4_edu * 100, 2)."%";?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a5_edu); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a5_execute); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a5_execute / $sum_a5_edu * 100, 2)."%";?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a6_edu); ?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a6_execute); ?></td>
		<td align='right' bgcolor="#CCFFFF"><?=number_format($sum_a6_execute / $sum_a6_edu * 100, 2)."%";?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a7_edu); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a7_execute); ?></td>
		<td align='right' bgcolor="#FFFFCC"><?=number_format($sum_a7_execute / $sum_a7_edu * 100, 2)."%";?></td>
		<td align='right' bgcolor="#FFCC99"><?=number_format($sum_edu_all); ?></td>
		<td align='right' bgcolor="#FFCC99"><?=number_format($sum_all); ?></td>
		<td align='right' bgcolor="#FFCC99"><?=number_format($sum_all / $sum_edu_all * 100, 2)."%";?></td>
	</tr>
	<tr height="50px">
		<td colspan="27" align="center">
			<font face="標楷體" size="+1">
				承辦人：　　　　　　　　　　　　　　　　　　　　
				科長：　　　　　　　　　　　　　　　　　　　　
				局（處）長：　　　　　　　　　　　　　　　　　　　　
			</font>
		</td>
	</tr>
</table>
</div>

<?
/*
※若要進行文書格式編修，建議複製到Excel編輯。<p>
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
*/
?>