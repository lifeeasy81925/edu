<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_106.php";  // 本年度基本設定
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">

<? include "../../function/button_print.php"; ?>

<p>

<div id="print_content">


<table align="center">
	<tr>
		<td width="100%" align="center">
			<font face="標楷體" size="+2">
			<?=$cityname?>政府辦理教育部<?=($school_year);?>年度推動教育優先區計畫<p>
			學校成效評估填報狀況列表<p>
			</font>
		</td>
	</tr>
</table>
<p>
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td nowrap="nowrap" align="center">序號</td>
		<td nowrap="nowrap" align="center">學校編號</td>
		<td nowrap="nowrap" align="center">學校名稱</td>
		<td align="center" bgcolor="#FFFFCC">補助一<br><?=$a1_title;?></td>
		<td align="center" bgcolor="#CCFFCC">補助二<br><?=$a2_title;?></td>
		<td align="center" bgcolor="#FFFFCC">補助三<br><?=$a3_title;?></td>
		<td align="center" bgcolor="#CCFFCC">補助四<br><?=$a4_title;?></td>
		<td align="center" bgcolor="#FFFFCC">補助五<br><?=$a5_title;?></td>
		<td align="center" bgcolor="#CCFFCC">補助六<br><?=$a6_title;?></td>
		<td align="center">未填寫項目數</td>
	</tr>
	<?
		function getStatus($eduMoney, $fillDate)
		{
			if($eduMoney > 0)
			{
				if($fillDate != "")
					return "已填寫";
				else
					return "<font color=red>未填寫</font>";
			}
			else
			{
				return "-";
			}
		}

		function getStatusInt($eduMoney, $fillDate)
		{
			if($eduMoney > 0)
			{
				if($fillDate != "")
					return 1;  // 已填
				else
					return 2;  // 未填
			}
			else
			{
				return 0;  // 免填
			}
		}

		$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
			   "      , sy.* ".

			   //補一教育部資料
			   "      , a1.edu_total_money as a1_edu_total_money ".

			   //補二教育部資料
			   "      , a2.edu_total_money as a2_edu_total_money ".

			   //補三教育部資料
			   "      , a3.edu_total_money as a3_edu_total_money ".

			   //補四教育部資料
			   "      , a4.edu_total_money as a4_edu_total_money ".

			   //補五教育部資料
			   "      , a5.edu_total_money as a5_edu_total_money ".

			   //補六教育部資料
			   "      , a6.edu_total_money as a6_edu_total_money ".

			   //成果填報上傳時間
			   "      , a1_e.update_date as a1_e_update_date ".
			   "      , a2_e.update_date as a2_e_update_date ".
			   "      , a3_e.update_date as a3_e_update_date ".
			   "      , a4_e.update_date as a4_e_update_date ".
			   "      , a5_e.update_date as a5_e_update_date ".
			   "      , a6_e.update_date as a6_e_update_date ".

			   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
			   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
			   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
			   "                       left join alc_teaching_equipment as a3 on sy.seq_no = a3.sy_seq ".
			   "                       left join alc_aboriginal_education as a4 on sy.seq_no = a4.sy_seq ".
			   "                       left join alc_transport_car as a5 on sy.seq_no = a5.sy_seq ".
			   "                       left join alc_school_activity as a6 on sy.seq_no = a6.sy_seq ".
			   //成果填報資料表
			   "                       left join alc_parenting_education_effect as a1_e on sy.seq_no = a1_e.sy_seq ".
			   "                       left join alc_education_features_effect as a2_e on sy.seq_no = a2_e.sy_seq ".
			   "                       left join alc_teaching_equipment_effect as a3_e on sy.seq_no = a3_e.sy_seq ".
			   "                       left join alc_aboriginal_education_effect as a4_e on sy.seq_no = a4_e.sy_seq ".
			   "                       left join alc_transport_car_effect as a5_e on sy.seq_no = a5_e.sy_seq ".
			   "                       left join alc_school_activity_effect as a6_e on sy.seq_no = a6_e.sy_seq ".

			   " where ".
			   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
			   "   and sd.cityname = '$cityname' ".
			   " order by sd.cityname, sd.account ";

		$result = mysql_query($sql);
		$serial = 0;
		$count_total_n = 0;
		while($row = mysql_fetch_array($result))
		{
			$account = $row['sd_account'];
			$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
			$cityname = $row['cityname'];
			$district = $row['district'];
			$schoolname = $row['schoolname'];
			$area = $row['area'];
			$student = $row['student'];

			//最填寫日期
			$a1_e_update_date = $row['a1_e_update_date'];
			$a2_e_update_date = $row['a2_e_update_date'];
			$a3_e_update_date = $row['a3_e_update_date'];
			$a4_e_update_date = $row['a4_e_update_date'];
			$a5_e_update_date = $row['a5_e_update_date'];
			$a6_e_update_date = $row['a6_e_update_date'];

			//核定金額
			$a1_edu_total_money = ($row['a1_edu_total_money'] == '')?0:$row['a1_edu_total_money']; //NULL則填入0
			$a2_edu_total_money = ($row['a2_edu_total_money'] == '')?0:$row['a2_edu_total_money'];
			$a3_edu_total_money = ($row['a3_edu_total_money'] == '')?0:$row['a3_edu_total_money'];
			$a4_edu_total_money = ($row['a4_edu_total_money'] == '')?0:$row['a4_edu_total_money'];
			$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money'];
			$a6_edu_total_money = ($row['a6_edu_total_money'] == '')?0:$row['a6_edu_total_money'];

			$sum_edu_total_money = $a1_edu_total_money + $a2_edu_total_money
								 + $a3_edu_total_money
								 + $a4_edu_total_money + $a5_edu_total_money
								 + $a6_edu_total_money;

			if($sum_edu_total_money > 0)
			{
				$serial++;
				$count_n = 0;
				?>
					<tr height="40px">
						<td nowrap="nowrap" align="center"><?=$serial; //序號?></td>
						<td nowrap="nowrap" align="center"><?=$account; //學校帳號?></td>
						<td nowrap="nowrap" align="center"><?=$cityname.$district.$schoolname; //學校名稱?></td>
						<td align="center"><?=getStatus($a1_edu_total_money, $a1_e_update_date); //補助一是否已填?></td>
						<td align="center"><?=getStatus($a2_edu_total_money, $a2_e_update_date); //補助二是否已填?></td>
						<td align="center"><?=getStatus($a3_edu_total_money, $a3_e_update_date); //補助四是否已填?></td>
						<td align="center"><?=getStatus($a4_edu_total_money, $a4_e_update_date); //補助五是否已填?></td>
						<td align="center"><?=getStatus($a5_edu_total_money, $a5_e_update_date); //補助六是否已填?></td>
						<td align="center"><?=getStatus($a6_edu_total_money, $a6_e_update_date); //補助七是否已填?></td>
						<?
							if(getStatusInt($a1_edu_total_money, $a1_e_update_date) == 2){$count_n++;}  // getStatusInt=2:未填寫
							if(getStatusInt($a2_edu_total_money, $a2_e_update_date) == 2){$count_n++;}
							if(getStatusInt($a3_edu_total_money, $a3_e_update_date) == 2){$count_n++;}
							if(getStatusInt($a4_edu_total_money, $a4_e_update_date) == 2){$count_n++;}
							if(getStatusInt($a5_edu_total_money, $a5_e_update_date) == 2){$count_n++;}
							if(getStatusInt($a6_edu_total_money, $a6_e_update_date) == 2){$count_n++;}
							$GLOBALS['count_total_n'] = $GLOBALS['count_total_n'] + $count_n;  // 加總到總計
						?>
						<td align="center"><?=$count_n;?></td>
					</tr>
				<?
			}
		}
	?>
</table><p>
未填寫項目總計： <?=$count_total_n;?> 項
</div>
<p>

<?
/*
※顯示「-」符號的欄位表示該校不需要填寫該補助項目的執行成效。<br />
※若要進行文書格式編修，建議複製到Excel編輯。<br />
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
include "../../function/button_excel.php";
*/
?>
