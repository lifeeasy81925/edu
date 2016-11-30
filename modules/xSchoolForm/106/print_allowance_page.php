<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include "../../function/config_for_106.php"; //本年度基本設定

	$sql = " SELECT sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sy.* ".

		   //補一資料
		   "      , a1.s_total_money as a1_money ".
		   "      , a1.s_p1_times as a1_s_p1_times, a1.s_p1_money as a1_s_p1_money, a1.s_p2_people as a1_s_p2_people, a1.s_p2_money as a1_s_p2_money ".

		   //補二資料
		   "      , a2.p1_name as a2_p1_name, a2.p2_name as a2_p2_name ".
		   "      , a2.s_total_money as a2_money ".
		   "      , a2.s_p1_money as a2_s_p1_money, a2.s_p2_money as a2_s_p2_money ".
		   "      , a2.s_p1_current_cnt as a2_s_p1_current_cnt, a2.s_p1_current_money as a2_s_p1_current_money ".
		   "      , a2.s_p1_capital_cnt as a2_s_p1_capital_cnt, a2.s_p1_capital_money as a2_s_p1_capital_money ".
		   "      , a2.s_p2_current_cnt as a2_s_p2_current_cnt, a2.s_p2_current_money as a2_s_p2_current_money ".
		   "      , a2.s_p2_capital_cnt as a2_s_p2_capital_cnt, a2.s_p2_capital_money as a2_s_p2_capital_money ".

		   "      , a2.s_total_money_ny1 as a2_money_ny1 ".
		   "      , a2.s_p1_money_ny1 as a2_s_p1_money_ny1, a2.s_p2_money_ny1 as a2_s_p2_money_ny1 ".
		   "      , a2.s_p1_current_cnt_ny1 as a2_s_p1_current_cnt_ny1, a2.s_p1_current_money_ny1 as a2_s_p1_current_money_ny1 ".
		   "      , a2.s_p1_capital_cnt_ny1 as a2_s_p1_capital_cnt_ny1, a2.s_p1_capital_money_ny1 as a2_s_p1_capital_money_ny1 ".
		   "      , a2.s_p2_current_cnt_ny1 as a2_s_p2_current_cnt_ny1, a2.s_p2_current_money_ny1 as a2_s_p2_current_money_ny1 ".
		   "      , a2.s_p2_capital_cnt_ny1 as a2_s_p2_capital_cnt_ny1, a2.s_p2_capital_money_ny1 as a2_s_p2_capital_money_ny1 ".

		   "      , a2.s_total_money_ny2 as a2_money_ny2 ".
		   "      , a2.s_p1_money_ny2 as a2_s_p1_money_ny2, a2.s_p2_money_ny2 as a2_s_p2_money_ny2 ".
		   "      , a2.s_p1_current_cnt_ny2 as a2_s_p1_current_cnt_ny2, a2.s_p1_current_money_ny2 as a2_s_p1_current_money_ny2 ".
		   "      , a2.s_p1_capital_cnt_ny2 as a2_s_p1_capital_cnt_ny2, a2.s_p1_capital_money_ny2 as a2_s_p1_capital_money_ny2 ".
		   "      , a2.s_p2_current_cnt_ny2 as a2_s_p2_current_cnt_ny2, a2.s_p2_current_money_ny2 as a2_s_p2_current_money_ny2 ".
		   "      , a2.s_p2_capital_cnt_ny2 as a2_s_p2_capital_cnt_ny2, a2.s_p2_capital_money_ny2 as a2_s_p2_capital_money_ny2 ".

		   //補三資料
		   "      , a3.s_total_money as a3_money ".
		   "      , a3.s_p1_money as a3_s_p1_money ".
		   "      , a3.s_p1_current_cnt as a3_s_p1_current_cnt, a3.s_p1_current_money as a3_s_p1_current_money ".
		   "      , a3.s_p1_capital_cnt as a3_s_p1_capital_cnt, a3.s_p1_capital_money as a3_s_p1_capital_money ".

		   //補四資料
		   "      , a4.p1_name as a4_p1_name, a4.p2_name as a4_p2_name ".
		   "      , a4.s_total_money as a4_money ".
		   "      , a4.s_p1_money as a4_s_p1_money, a4.s_p2_money as a4_s_p2_money ".
		   "      , a4.s_p1_current_cnt as a4_s_p1_current_cnt, a4.s_p1_current_money as a4_s_p1_current_money ".
		   "      , a4.s_p1_capital_cnt as a4_s_p1_capital_cnt, a4.s_p1_capital_money as a4_s_p1_capital_money ".
		   "      , a4.s_p2_current_cnt as a4_s_p2_current_cnt, a4.s_p2_current_money as a4_s_p2_current_money ".
		   "      , a4.s_p2_capital_cnt as a4_s_p2_capital_cnt, a4.s_p2_capital_money as a4_s_p2_capital_money ".

		   "      , a4.s_total_money_ny1 as a4_money_ny1 ".
		   "      , a4.s_p1_money_ny1 as a4_s_p1_money_ny1, a4.s_p2_money_ny1 as a4_s_p2_money_ny1 ".
		   "      , a4.s_p1_current_cnt_ny1 as a4_s_p1_current_cnt_ny1, a4.s_p1_current_money_ny1 as a4_s_p1_current_money_ny1 ".
		   "      , a4.s_p1_capital_cnt_ny1 as a4_s_p1_capital_cnt_ny1, a4.s_p1_capital_money_ny1 as a4_s_p1_capital_money_ny1 ".
		   "      , a4.s_p2_current_cnt_ny1 as a4_s_p2_current_cnt_ny1, a4.s_p2_current_money_ny1 as a4_s_p2_current_money_ny1 ".
		   "      , a4.s_p2_capital_cnt_ny1 as a4_s_p2_capital_cnt_ny1, a4.s_p2_capital_money_ny1 as a4_s_p2_capital_money_ny1 ".

		   "      , a4.s_total_money_ny2 as a4_money_ny2 ".
		   "      , a4.s_p1_money_ny2 as a4_s_p1_money_ny2, a4.s_p2_money_ny2 as a4_s_p2_money_ny2 ".
		   "      , a4.s_p1_current_cnt_ny2 as a4_s_p1_current_cnt_ny2, a4.s_p1_current_money_ny2 as a4_s_p1_current_money_ny2 ".
		   "      , a4.s_p1_capital_cnt_ny2 as a4_s_p1_capital_cnt_ny2, a4.s_p1_capital_money_ny2 as a4_s_p1_capital_money_ny2 ".
		   "      , a4.s_p2_current_cnt_ny2 as a4_s_p2_current_cnt_ny2, a4.s_p2_current_money_ny2 as a4_s_p2_current_money_ny2 ".
		   "      , a4.s_p2_capital_cnt_ny2 as a4_s_p2_capital_cnt_ny2, a4.s_p2_capital_money_ny2 as a4_s_p2_capital_money_ny2 ".

		   //補五資料
		   "      , a5.s_total_money as a5_money, a5.item as a5_item, a5.s_people as a5_s_people ".

		   //補六資料
		   "      , a6.s_total_money as a6_money ".
		   "      , a6.s_p1_money as a6_s_p1_money ".
		   "      , a6.s_p1_current_cnt as a6_s_p1_current_cnt, a6.s_p1_current_money as a6_s_p1_current_money ".
		   "      , a6.s_p1_capital_cnt as a6_s_p1_capital_cnt, a6.s_p1_capital_money as a6_s_p1_capital_money ".

		   "      FROM schooldata               AS sd                            ".
		   " LEFT JOIN schooldata_year          AS sy ON sd.account = sy.account ".
		   " LEFT JOIN alc_parenting_education  AS a1 ON sy.seq_no  = a1.sy_seq  ".
		   " LEFT JOIN alc_education_features   AS a2 ON sy.seq_no  = a2.sy_seq  ".
		   " LEFT JOIN alc_teaching_equipment   AS a3 ON sy.seq_no  = a3.sy_seq  ".
		   " LEFT JOIN alc_aboriginal_education AS a4 ON sy.seq_no  = a4.sy_seq  ".
		   " LEFT JOIN alc_transport_car        AS a5 ON sy.seq_no  = a5.sy_seq  ".
		   " LEFT JOIN alc_school_activity      AS a6 ON sy.seq_no  = a6.sy_seq  ".
		   "     WHERE sy.school_year = '$school_year'                           ".
		   "       AND sd.account     = '$username'                              ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account    = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   = $row['cityname'];
		$district   = $row['district'];
		$schoolname = $row['schoolname'];
		$area       = $row['area'];

		$student     = $row['student'];
		$class_total = $row['class_total'];

		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];

		$a2_money_ny1 = ($row['a2_money_ny1'] == '')?0:$row['a2_money_ny1'];
		$a2_money_ny2 = ($row['a2_money_ny2'] == '')?0:$row['a2_money_ny2'];
		$a4_money_ny1 = ($row['a4_money_ny1'] == '')?0:$row['a4_money_ny1'];
		$a4_money_ny2 = ($row['a4_money_ny2'] == '')?0:$row['a4_money_ny2'];

		$total_money = $a1_money + $a2_money + $a3_money + $a4_money + $a5_money + $a6_money;

		$total_money_ny = $a2_money_ny1 + $a2_money_ny2 + $a4_money_ny1 + $a4_money_ny2;

		$a1_s_p1_times  = ($row['a1_s_p1_times']  == '')?0:$row['a1_s_p1_times']; //NULL則填入0
		$a1_s_p1_money  = ($row['a1_s_p1_money']  == '')?0:$row['a1_s_p1_money'];
		$a1_s_p2_people = ($row['a1_s_p2_people'] == '')?0:$row['a1_s_p2_people'];
		$a1_s_p2_money  = ($row['a1_s_p2_money']  == '')?0:$row['a1_s_p2_money'];

		$a2_p1_name            =  $row['a2_p1_name'];
		$a2_p2_name            =  $row['a2_p2_name'];
		$a2_s_p1_money         = ($row['a2_s_p1_money']         == '')?0:$row['a2_s_p1_money']; //NULL則填入0
		$a2_s_p1_current_cnt   = ($row['a2_s_p1_current_cnt']   == '')?0:$row['a2_s_p1_current_cnt'];
		$a2_s_p1_current_money = ($row['a2_s_p1_current_money'] == '')?0:$row['a2_s_p1_current_money'];
		$a2_s_p1_capital_cnt   = ($row['a2_s_p1_capital_cnt']   == '')?0:$row['a2_s_p1_capital_cnt'];
		$a2_s_p1_capital_money = ($row['a2_s_p1_capital_money'] == '')?0:$row['a2_s_p1_capital_money'];
		$a2_s_p2_money         = ($row['a2_s_p2_money']         == '')?0:$row['a2_s_p2_money'];
		$a2_s_p2_current_cnt   = ($row['a2_s_p2_current_cnt']   == '')?0:$row['a2_s_p2_current_cnt'];
		$a2_s_p2_current_money = ($row['a2_s_p2_current_money'] == '')?0:$row['a2_s_p2_current_money'];
		$a2_s_p2_capital_cnt   = ($row['a2_s_p2_capital_cnt']   == '')?0:$row['a2_s_p2_capital_cnt'];
		$a2_s_p2_capital_money = ($row['a2_s_p2_capital_money'] == '')?0:$row['a2_s_p2_capital_money'];

		$a2_s_p1_money_ny1         = ($row['a2_s_p1_money_ny1']         == '')?0:$row['a2_s_p1_money_ny1']; //NULL則填入0
		$a2_s_p1_current_cnt_ny1   = ($row['a2_s_p1_current_cnt_ny1']   == '')?0:$row['a2_s_p1_current_cnt_ny1'];
		$a2_s_p1_current_money_ny1 = ($row['a2_s_p1_current_money_ny1'] == '')?0:$row['a2_s_p1_current_money_ny1'];
		$a2_s_p1_capital_cnt_ny1   = ($row['a2_s_p1_capital_cnt_ny1']   == '')?0:$row['a2_s_p1_capital_cnt_ny1'];
		$a2_s_p1_capital_money_ny1 = ($row['a2_s_p1_capital_money_ny1'] == '')?0:$row['a2_s_p1_capital_money_ny1'];
		$a2_s_p2_money_ny1         = ($row['a2_s_p2_money_ny1']         == '')?0:$row['a2_s_p2_money_ny1'];
		$a2_s_p2_current_cnt_ny1   = ($row['a2_s_p2_current_cnt_ny1']   == '')?0:$row['a2_s_p2_current_cnt_ny1'];
		$a2_s_p2_current_money_ny1 = ($row['a2_s_p2_current_money_ny1'] == '')?0:$row['a2_s_p2_current_money_ny1'];
		$a2_s_p2_capital_cnt_ny1   = ($row['a2_s_p2_capital_cnt_ny1']   == '')?0:$row['a2_s_p2_capital_cnt_ny1'];
		$a2_s_p2_capital_money_ny1 = ($row['a2_s_p2_capital_money_ny1'] == '')?0:$row['a2_s_p2_capital_money_ny1'];

		$a2_s_p1_money_ny2         = ($row['a2_s_p1_money_ny2']         == '')?0:$row['a2_s_p1_money_ny2']; //NULL則填入0
		$a2_s_p1_current_cnt_ny2   = ($row['a2_s_p1_current_cnt_ny2']   == '')?0:$row['a2_s_p1_current_cnt_ny2'];
		$a2_s_p1_current_money_ny2 = ($row['a2_s_p1_current_money_ny2'] == '')?0:$row['a2_s_p1_current_money_ny2'];
		$a2_s_p1_capital_cnt_ny2   = ($row['a2_s_p1_capital_cnt_ny2']   == '')?0:$row['a2_s_p1_capital_cnt_ny2'];
		$a2_s_p1_capital_money_ny2 = ($row['a2_s_p1_capital_money_ny2'] == '')?0:$row['a2_s_p1_capital_money_ny2'];
		$a2_s_p2_money_ny2         = ($row['a2_s_p2_money_ny2']         == '')?0:$row['a2_s_p2_money_ny2'];
		$a2_s_p2_current_cnt_ny2   = ($row['a2_s_p2_current_cnt_ny2']   == '')?0:$row['a2_s_p2_current_cnt_ny2'];
		$a2_s_p2_current_money_ny2 = ($row['a2_s_p2_current_money_ny2'] == '')?0:$row['a2_s_p2_current_money_ny2'];
		$a2_s_p2_capital_cnt_ny2   = ($row['a2_s_p2_capital_cnt_ny2']   == '')?0:$row['a2_s_p2_capital_cnt_ny2'];
		$a2_s_p2_capital_money_ny2 = ($row['a2_s_p2_capital_money_ny2'] == '')?0:$row['a2_s_p2_capital_money_ny2'];

		$a3_s_p1_money         = ($row['a3_s_p1_money']         == '')?0:$row['a3_s_p1_money']; //NULL則填入0
		$a3_s_p1_current_cnt   = ($row['a3_s_p1_current_cnt']   == '')?0:$row['a3_s_p1_current_cnt'];
		$a3_s_p1_current_money = ($row['a3_s_p1_current_money'] == '')?0:$row['a3_s_p1_current_money'];
		$a3_s_p1_capital_cnt   = ($row['a3_s_p1_capital_cnt']   == '')?0:$row['a3_s_p1_capital_cnt'];
		$a3_s_p1_capital_money = ($row['a3_s_p1_capital_money'] == '')?0:$row['a3_s_p1_capital_money'];

		$a4_p1_name            =  $row['a4_p1_name'];
		$a4_p2_name            =  $row['a4_p2_name'];
		$a4_s_p1_money         = ($row['a4_s_p1_money']         == '')?0:$row['a4_s_p1_money']; //NULL則填入0
		$a4_s_p1_current_cnt   = ($row['a4_s_p1_current_cnt']   == '')?0:$row['a4_s_p1_current_cnt'];
		$a4_s_p1_current_money = ($row['a4_s_p1_current_money'] == '')?0:$row['a4_s_p1_current_money'];
		$a4_s_p1_capital_cnt   = ($row['a4_s_p1_capital_cnt']   == '')?0:$row['a4_s_p1_capital_cnt'];
		$a4_s_p1_capital_money = ($row['a4_s_p1_capital_money'] == '')?0:$row['a4_s_p1_capital_money'];
		$a4_s_p2_money         = ($row['a4_s_p2_money']         == '')?0:$row['a4_s_p2_money'];
		$a4_s_p2_current_cnt   = ($row['a4_s_p2_current_cnt']   == '')?0:$row['a4_s_p2_current_cnt'];
		$a4_s_p2_current_money = ($row['a4_s_p2_current_money'] == '')?0:$row['a4_s_p2_current_money'];
		$a4_s_p2_capital_cnt   = ($row['a4_s_p2_capital_cnt']   == '')?0:$row['a4_s_p2_capital_cnt'];
		$a4_s_p2_capital_money = ($row['a4_s_p2_capital_money'] == '')?0:$row['a4_s_p2_capital_money'];

		$a4_s_p1_money_ny1         = ($row['a4_s_p1_money_ny1']         == '')?0:$row['a4_s_p1_money_ny1']; //NULL則填入0
		$a4_s_p1_current_cnt_ny1   = ($row['a4_s_p1_current_cnt_ny1']   == '')?0:$row['a4_s_p1_current_cnt_ny1'];
		$a4_s_p1_current_money_ny1 = ($row['a4_s_p1_current_money_ny1'] == '')?0:$row['a4_s_p1_current_money_ny1'];
		$a4_s_p1_capital_cnt_ny1   = ($row['a4_s_p1_capital_cnt_ny1']   == '')?0:$row['a4_s_p1_capital_cnt_ny1'];
		$a4_s_p1_capital_money_ny1 = ($row['a4_s_p1_capital_money_ny1'] == '')?0:$row['a4_s_p1_capital_money_ny1'];
		$a4_s_p2_money_ny1         = ($row['a4_s_p2_money_ny1']         == '')?0:$row['a4_s_p2_money_ny1'];
		$a4_s_p2_current_cnt_ny1   = ($row['a4_s_p2_current_cnt_ny1']   == '')?0:$row['a4_s_p2_current_cnt_ny1'];
		$a4_s_p2_current_money_ny1 = ($row['a4_s_p2_current_money_ny1'] == '')?0:$row['a4_s_p2_current_money_ny1'];
		$a4_s_p2_capital_cnt_ny1   = ($row['a4_s_p2_capital_cnt_ny1']   == '')?0:$row['a4_s_p2_capital_cnt_ny1'];
		$a4_s_p2_capital_money_ny1 = ($row['a4_s_p2_capital_money_ny1'] == '')?0:$row['a4_s_p2_capital_money_ny1'];

		$a4_s_p1_money_ny2         = ($row['a4_s_p1_money_ny2']         == '')?0:$row['a4_s_p1_money_ny2']; //NULL則填入0
		$a4_s_p1_current_cnt_ny2   = ($row['a4_s_p1_current_cnt_ny2']   == '')?0:$row['a4_s_p1_current_cnt_ny2'];
		$a4_s_p1_current_money_ny2 = ($row['a4_s_p1_current_money_ny2'] == '')?0:$row['a4_s_p1_current_money_ny2'];
		$a4_s_p1_capital_cnt_ny2   = ($row['a4_s_p1_capital_cnt_ny2']   == '')?0:$row['a4_s_p1_capital_cnt_ny2'];
		$a4_s_p1_capital_money_ny2 = ($row['a4_s_p1_capital_money_ny2'] == '')?0:$row['a4_s_p1_capital_money_ny2'];
		$a4_s_p2_money_ny2         = ($row['a4_s_p2_money_ny2']         == '')?0:$row['a4_s_p2_money_ny2'];
		$a4_s_p2_current_cnt_ny2   = ($row['a4_s_p2_current_cnt_ny2']   == '')?0:$row['a4_s_p2_current_cnt_ny2'];
		$a4_s_p2_current_money_ny2 = ($row['a4_s_p2_current_money_ny2'] == '')?0:$row['a4_s_p2_current_money_ny2'];
		$a4_s_p2_capital_cnt_ny2   = ($row['a4_s_p2_capital_cnt_ny2']   == '')?0:$row['a4_s_p2_capital_cnt_ny2'];
		$a4_s_p2_capital_money_ny2 = ($row['a4_s_p2_capital_money_ny2'] == '')?0:$row['a4_s_p2_capital_money_ny2'];

		$a5_s_people = ($row['a5_s_people'] == '')?0:$row['a5_s_people']; //NULL則填入0
		$a5_item     = ($row['a5_item']     == '')?0:$row['a5_item'];

		$a6_s_p1_money         = ($row['a6_s_p1_money']         == '')?0:$row['a6_s_p1_money']; //NULL則填入0
		$a6_s_p1_current_cnt   = ($row['a6_s_p1_current_cnt']   == '')?0:$row['a6_s_p1_current_cnt'];
		$a6_s_p1_current_money = ($row['a6_s_p1_current_money'] == '')?0:$row['a6_s_p1_current_money'];
		$a6_s_p1_capital_cnt   = ($row['a6_s_p1_capital_cnt']   == '')?0:$row['a6_s_p1_capital_cnt'];
		$a6_s_p1_capital_money = ($row['a6_s_p1_capital_money'] == '')?0:$row['a6_s_p1_capital_money'];
	}
?>

<p>

表Ｉ～２ 補助項目經費需求彙整表

<input type="button" value="關閉本頁" onClick="window.close()">

<? include "../../function/button_print.php"; ?>

<div id="print_content">

	<table align="center" style="font-family:標楷體;">
		<tr align="center">
			<td>
				<font size="+2">
					<b>
						教育部<?=$school_year;?>年度教育優先區計畫 補助項目經費需求彙整表<p>
						<? echo $account." ".$cityname.$district.$schoolname; ?>
					</b>
				</font>
			</td>
		</tr>
	</table>
	<p>

	<table align="center">
		<tr>
			<td>
				<?
					$area_ch = "";
					switch($area)
					{
						case "1":
							$area_ch = "離島";
							break;
						case "2":
							$area_ch = "偏遠及特偏";
							break;
						case "3":
							$area_ch = "一般地區";
							break;
						case "4":
							$area_ch = "都會地區";
							break;
						default:
							$area_ch = "無貴校所在區域資料，請聯繫教育局(處)承辦人更新資料，謝謝。";
					}
				?>

				學校所在區域：<?=$area_ch;?>　/　班級數：<?=$class_total;?>班　/　在籍學生數：<?=$student;?>人<p>

				<?
					// 列印顯示用
					echo "承辦人：".$user_from;
					echo "　　";
					echo "聯絡電話：".$user_icq;
					echo "　　";
					echo "E-mail：".$email;
				?>
			</td>
		</tr>
	</table>
	<p>

	<table align="center" width="800px" border="1" cellpadding="0" cellspacing="0" style="font-family:標楷體; font-size:18px;">
		<tr align="center" height="35px">
			<td nowrap="nowrap" rowspan="2">項次</td>
			<td nowrap="nowrap" colspan="3" rowspan="2">補助項目</td>
			<td nowrap="nowrap" colspan="4" >申請補助數量、金額</td>
		</tr>
		<tr align="center" height="35px">
			<td nowrap="nowrap">數量</td>
			<td nowrap="nowrap">金額(元)</td>
			<td nowrap="nowrap">小計(元)</td>
			<td nowrap="nowrap">合計(元)</td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="2">一</td>
			<td nowrap="nowrap" rowspan="2">推展親職教育活動</td>
			<td nowrap="nowrap" colspan="2">親職教育活動(場次)</td>
			<td nowrap="nowrap" align="center"><?=number_format($a1_s_p1_times);?></td>
			<td nowrap="nowrap" align="right"><?=number_format($a1_s_p1_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a1_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a1_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" colspan="2">目標學生個案家庭輔導(人次)</td>
			<td nowrap="nowrap" align="center"><?=number_format($a1_s_p2_people);?></td>
			<td nowrap="nowrap" align="right"><?=number_format($a1_s_p2_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="4">二</td>
			<td nowrap="nowrap" rowspan="4">補助學校發展教育特色</td>
			<td rowspan="2">特色一：<?=$a2_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a2_s_p1_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="4"><?=number_format($a2_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p1_capital_money);?></td>
		</tr>
		<tr height="35px">
			<td rowspan="2">特色二：<?=$a2_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p2_current_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a2_s_p2_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p2_capital_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="2" >三</td>
			<td nowrap="nowrap" colspan="2" rowspan="2">充實學校基本教學設備</td>
			<td nowrap="nowrap" align="center">經常門 </td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a3_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a3_s_p1_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a3_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a3_s_p1_capital_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="4">四</td>
			<td rowspan="4">發展原住民教育文化特色及充實設備器材</td>
			<td rowspan="2">特色一：<?=$a4_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a4_s_p1_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="4"><?=number_format($a4_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p1_capital_money);?></td>
		</tr>
		<tr height="35px">
			<td rowspan="2">特色二：<?=$a4_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p2_current_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a4_s_p2_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p2_capital_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" rowspan="3" align="center" >五</td>
			<td nowrap="nowrap" colspan="2" rowspan="3">補助交通不便地區學校交通車</td>
			<td nowrap="nowrap" align="center">補助租車費(人)</td>
			<td nowrap="nowrap" align="center"><?=($a5_item == '租車費')?$a5_s_people:0;?></td>
			<td nowrap="nowrap" align="right"><?=number_format(($a5_item == '租車費')?$a5_money:0);?></td>
			<td nowrap="nowrap" rowspan="3" align="right"><?=number_format($a5_money);?></td>
			<td nowrap="nowrap" rowspan="3" align="right"><?=number_format($a5_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">補助交通費(人)</td>
			<td nowrap="nowrap" align="center"><?=($a5_item == '交通費')?$a5_s_people:0;?></td>
			<td nowrap="nowrap" align="right"><?=number_format(($a5_item == '交通費')?$a5_money:0);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">購置交通車(人座)</td>
			<td nowrap="nowrap" align="center"><?=($a5_item == '購置交通車')?$a5_s_people:0;?></td>
			<td nowrap="nowrap" align="right"><?=number_format(($a5_item == '購置交通車')?$a5_money:0);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="2">六</td>
			<td nowrap="nowrap" rowspan="2">整修學校社區化活動場所</td>
			<td nowrap="nowrap" align="center" rowspan="2">綜合球場</td>
			<td nowrap="nowrap" align="center">修繕</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a6_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a6_s_p1_money);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a6_money);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">設備</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a6_s_p1_capital_money);?></td>
		</tr>
		<tr height="50px">
			<td nowrap="nowrap" align="center" colspan="7">總　　　　計</td>
			<td nowrap="nowrap" align="right"><?=number_format($total_money);?></td>
		</tr>
		<tr height="80px" style="font-size:20px;">
			<td nowrap="nowrap" align="center" colspan="8">
				承辦人：　　　　　　　　　主任：　　　　　　　　　校長：　　　　　　　　　<?/**/?>
			</td>
		</tr>
	</table>

	<? if($total_money_ny <= 0) { echo "<!--"; } ?>

	<p style='page-break-after:always'></p>

	<table align="center" width="800px" border="1" cellpadding="0" cellspacing="0" style="font-family:標楷體; font-size:18px;">
		<tr align="center" height="35px">
			<td nowrap="nowrap" rowspan="2">項次</td>
			<td nowrap="nowrap" colspan="3" rowspan="2">補助項目</td>
			<td nowrap="nowrap" colspan="4" >申請補助數量、金額</td>
		</tr>
		<tr align="center" height="35px">
			<td nowrap="nowrap">數量</td>
			<td nowrap="nowrap">金額(元)</td>
			<td nowrap="nowrap">小計(元)</td>
			<td nowrap="nowrap">合計(元)</td>
		</tr>
	<? if($total_money_ny <= 0) { echo "-->"; } ?>

	<? if($a2_money_ny1 <= 0) { echo "<!--"; } ?>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="4">二</td>
			<td rowspan="4"><?=($school_year+1);?>年度<br>補助學校發展教育特色</td>
			<td rowspan="2">發展特色一：<?=$a2_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p1_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a2_s_p1_money_ny1);?></td>
			<td nowrap="nowrap" align="right" rowspan="4"><?=number_format($a2_money_ny1);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p1_capital_money_ny1);?></td>
		</tr>
		<tr height="35px">
			<td rowspan="2">發展特色二：<?=$a2_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p2_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a2_s_p2_money_ny1);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p2_capital_money_ny1);?></td>
		</tr>
	<? if($a2_money_ny1 <= 0) { echo "-->"; } ?>

	<? if($a2_money_ny2 <= 0) { echo "<!--"; } ?>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="4">二</td>
			<td rowspan="4"><?=($school_year+2);?>年度<br>補助學校發展教育特色</td>
			<td rowspan="2">發展特色一：<?=$a2_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p1_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a2_s_p1_money_ny2);?></td>
			<td nowrap="nowrap" align="right" rowspan="4"><?=number_format($a2_money_ny2);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p1_capital_money_ny2);?></td>
		</tr>
		<tr height="35px">
			<td rowspan="2">發展特色二：<?=$a2_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p2_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a2_s_p2_money_ny2);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a2_s_p2_capital_money_ny2);?></td>
		</tr>
	<? if($a2_money_ny2 <= 0) { echo "-->"; } ?>

	<? if($a4_money_ny1 <= 0) { echo "<!--"; } ?>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="4">四</td>
			<td rowspan="4"><?=($school_year+1);?>年度<br>發展原住民教育文化特色及充實設備器材</td>
			<td rowspan="2">發展特色一：<?=$a4_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p1_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a4_s_p1_money_ny1);?></td>
			<td nowrap="nowrap" align="right" rowspan="4"><?=number_format($a4_money_ny1);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p1_capital_money_ny1);?></td>
		</tr>
		<tr height="35px">
			<td rowspan="2">發展特色二：<?=$a4_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p2_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a4_s_p2_money_ny1);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p2_capital_money_ny1);?></td>
		</tr>
	<? if($a4_money_ny1 <= 0) { echo "-->"; } ?>

	<? if($a4_money_ny2 <= 0) { echo "<!--"; } ?>
		<tr height="35px">
			<td nowrap="nowrap" align="center" rowspan="4">四</td>
			<td rowspan="4"><?=($school_year+2);?>年度<br>發展原住民教育文化特色及充實設備器材</td>
			<td rowspan="2">發展特色一：<?=$a4_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p1_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a4_s_p1_money_ny2);?></td>
			<td nowrap="nowrap" align="right" rowspan="4"><?=number_format($a4_money_ny2);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p1_capital_money_ny2);?></td>
		</tr>
		<tr height="35px">
			<td rowspan="2">發展特色二：<?=$a4_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p2_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" rowspan="2"><?=number_format($a4_s_p2_money_ny2);?></td>
		</tr>
		<tr height="35px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="center">-</td>
			<td nowrap="nowrap" align="right"><?=number_format($a4_s_p2_capital_money_ny2);?></td>
		</tr>
	<? if($a4_money_ny2 <= 0) { echo "-->"; } ?>

	<? if($total_money_ny <= 0) { echo "<!--"; } ?>
		<tr height="50px">
			<td nowrap="nowrap" align="center" colspan="7">總　　　　計</td>
			<td nowrap="nowrap" align="right"><?=number_format($total_money);?></td>
		</tr>
		<tr height="80px" style="font-size:20px;">
			<td nowrap="nowrap" align="center" colspan="8">
				承辦人：　　　　　　　　　主任：　　　　　　　　　校長：　　　　　　　　　<?/**/?>
			</td>
		</tr>
	</table>
	<? if($total_money_ny <= 0) { echo "-->"; } ?>

</div>

<input type="hidden" name="school_year" value="<?=$school_year;?>">