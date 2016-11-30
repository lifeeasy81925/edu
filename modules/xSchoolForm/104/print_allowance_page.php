<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
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
		   "      , a3.s_p1_money as a3_s_p1_money, a3.s_p2_money as a3_s_p2_money ".
		   "      , a3.s_p1_current_cnt as a3_s_p1_current_cnt, a3.s_p1_current_money as a3_s_p1_current_money ".
		   "      , a3.s_p1_capital_cnt as a3_s_p1_capital_cnt, a3.s_p1_capital_money as a3_s_p1_capital_money ".
		   "      , a3.s_p2_current_cnt as a3_s_p2_current_cnt, a3.s_p2_current_money as a3_s_p2_current_money ".
		   "      , a3.s_p2_capital_cnt as a3_s_p2_capital_cnt, a3.s_p2_capital_money as a3_s_p2_capital_money ".
		   
		   //補四資料
		   "      , a4.s_total_money as a4_money ".
		   "      , a4.s_p1_money as a4_s_p1_money ".
		   "      , a4.s_p1_current_cnt as a4_s_p1_current_cnt, a4.s_p1_current_money as a4_s_p1_current_money ".
		   "      , a4.s_p1_capital_cnt as a4_s_p1_capital_cnt, a4.s_p1_capital_money as a4_s_p1_capital_money ".
		   
		   //補五資料
		   "      , a5.p1_name as a5_p1_name, a5.p2_name as a5_p2_name ".
		   "      , a5.s_total_money as a5_money ".
		   "      , a5.s_p1_money as a5_s_p1_money, a5.s_p2_money as a5_s_p2_money ".
		   "      , a5.s_p1_current_cnt as a5_s_p1_current_cnt, a5.s_p1_current_money as a5_s_p1_current_money ".
		   "      , a5.s_p1_capital_cnt as a5_s_p1_capital_cnt, a5.s_p1_capital_money as a5_s_p1_capital_money ".
		   "      , a5.s_p2_current_cnt as a5_s_p2_current_cnt, a5.s_p2_current_money as a5_s_p2_current_money ".
		   "      , a5.s_p2_capital_cnt as a5_s_p2_capital_cnt, a5.s_p2_capital_money as a5_s_p2_capital_money ".
		     
		   "      , a5.s_total_money_ny1 as a5_money_ny1 ".
		   "      , a5.s_p1_money_ny1 as a5_s_p1_money_ny1, a5.s_p2_money_ny1 as a5_s_p2_money_ny1 ".
		   "      , a5.s_p1_current_cnt_ny1 as a5_s_p1_current_cnt_ny1, a5.s_p1_current_money_ny1 as a5_s_p1_current_money_ny1 ".
		   "      , a5.s_p1_capital_cnt_ny1 as a5_s_p1_capital_cnt_ny1, a5.s_p1_capital_money_ny1 as a5_s_p1_capital_money_ny1 ".
		   "      , a5.s_p2_current_cnt_ny1 as a5_s_p2_current_cnt_ny1, a5.s_p2_current_money_ny1 as a5_s_p2_current_money_ny1 ".
		   "      , a5.s_p2_capital_cnt_ny1 as a5_s_p2_capital_cnt_ny1, a5.s_p2_capital_money_ny1 as a5_s_p2_capital_money_ny1 ".
		   		   
		   "      , a5.s_total_money_ny2 as a5_money_ny2 ".
		   "      , a5.s_p1_money_ny2 as a5_s_p1_money_ny2, a5.s_p2_money_ny2 as a5_s_p2_money_ny2 ".
		   "      , a5.s_p1_current_cnt_ny2 as a5_s_p1_current_cnt_ny2, a5.s_p1_current_money_ny2 as a5_s_p1_current_money_ny2 ".
		   "      , a5.s_p1_capital_cnt_ny2 as a5_s_p1_capital_cnt_ny2, a5.s_p1_capital_money_ny2 as a5_s_p1_capital_money_ny2 ".
		   "      , a5.s_p2_current_cnt_ny2 as a5_s_p2_current_cnt_ny2, a5.s_p2_current_money_ny2 as a5_s_p2_current_money_ny2 ".
		   "      , a5.s_p2_capital_cnt_ny2 as a5_s_p2_capital_cnt_ny2, a5.s_p2_capital_money_ny2 as a5_s_p2_capital_money_ny2 ".
		   
		   //補六資料
		   "      , a6.s_total_money as a6_money, a6.item as a6_item, a6.s_people as a6_s_people ".
		   //補七資料
		   "      , a7.s_total_money as a7_money ".
		   "      , a7.s_p1_money as a7_s_p1_money ".
		   "      , a7.s_p1_current_cnt as a7_s_p1_current_cnt, a7.s_p1_current_money as a7_s_p1_current_money ".
		   "      , a7.s_p1_capital_cnt as a7_s_p1_capital_cnt, a7.s_p1_capital_money as a7_s_p1_capital_money ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ";
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
		$class_total = $row['class_total'];
		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];
		$a7_money = ($row['a7_money'] == '')?0:$row['a7_money'];
		
		$a2_money_ny1 = ($row['a2_money_ny1'] == '')?0:$row['a2_money_ny1'];
		$a2_money_ny2 = ($row['a2_money_ny2'] == '')?0:$row['a2_money_ny2'];
		$a5_money_ny1 = ($row['a5_money_ny1'] == '')?0:$row['a5_money_ny1'];
		$a5_money_ny2 = ($row['a5_money_ny2'] == '')?0:$row['a5_money_ny2'];
		
		$total_money = $a1_money + $a2_money + $a3_money + $a4_money + $a5_money + $a6_money + $a7_money;
		
		$total_money_ny = $a2_money_ny1 + $a2_money_ny2 + $a5_money_ny1 + $a5_money_ny2;
		
		$a1_s_p1_times = ($row['a1_s_p1_times'] == '')?0:$row['a1_s_p1_times']; //NULL則填入0
		$a1_s_p1_money = ($row['a1_s_p1_money'] == '')?0:$row['a1_s_p1_money'];
		$a1_s_p2_people = ($row['a1_s_p2_people'] == '')?0:$row['a1_s_p2_people'];
		$a1_s_p2_money = ($row['a1_s_p2_money'] == '')?0:$row['a1_s_p2_money'];
		
		$a2_p1_name = $row['a2_p1_name'];
		$a2_p2_name = $row['a2_p2_name'];
		$a2_s_p1_money = ($row['a2_s_p1_money'] == '')?0:$row['a2_s_p1_money']; //NULL則填入0
		$a2_s_p1_current_cnt = ($row['a2_s_p1_current_cnt'] == '')?0:$row['a2_s_p1_current_cnt'];
		$a2_s_p1_current_money = ($row['a2_s_p1_current_money'] == '')?0:$row['a2_s_p1_current_money'];
		$a2_s_p1_capital_cnt = ($row['a2_s_p1_capital_cnt'] == '')?0:$row['a2_s_p1_capital_cnt'];
		$a2_s_p1_capital_money = ($row['a2_s_p1_capital_money'] == '')?0:$row['a2_s_p1_capital_money'];
		$a2_s_p2_money = ($row['a2_s_p2_money'] == '')?0:$row['a2_s_p2_money'];
		$a2_s_p2_current_cnt = ($row['a2_s_p2_current_cnt'] == '')?0:$row['a2_s_p2_current_cnt'];
		$a2_s_p2_current_money = ($row['a2_s_p2_current_money'] == '')?0:$row['a2_s_p2_current_money'];
		$a2_s_p2_capital_cnt = ($row['a2_s_p2_capital_cnt'] == '')?0:$row['a2_s_p2_capital_cnt'];
		$a2_s_p2_capital_money = ($row['a2_s_p2_capital_money'] == '')?0:$row['a2_s_p2_capital_money'];
		
		$a2_s_p1_money_ny1 = ($row['a2_s_p1_money_ny1'] == '')?0:$row['a2_s_p1_money_ny1']; //NULL則填入0
		$a2_s_p1_current_cnt_ny1 = ($row['a2_s_p1_current_cnt_ny1'] == '')?0:$row['a2_s_p1_current_cnt_ny1'];
		$a2_s_p1_current_money_ny1 = ($row['a2_s_p1_current_money_ny1'] == '')?0:$row['a2_s_p1_current_money_ny1'];
		$a2_s_p1_capital_cnt_ny1 = ($row['a2_s_p1_capital_cnt_ny1'] == '')?0:$row['a2_s_p1_capital_cnt_ny1'];
		$a2_s_p1_capital_money_ny1 = ($row['a2_s_p1_capital_money_ny1'] == '')?0:$row['a2_s_p1_capital_money_ny1'];
		$a2_s_p2_money_ny1 = ($row['a2_s_p2_money_ny1'] == '')?0:$row['a2_s_p2_money_ny1'];
		$a2_s_p2_current_cnt_ny1 = ($row['a2_s_p2_current_cnt_ny1'] == '')?0:$row['a2_s_p2_current_cnt_ny1'];
		$a2_s_p2_current_money_ny1 = ($row['a2_s_p2_current_money_ny1'] == '')?0:$row['a2_s_p2_current_money_ny1'];
		$a2_s_p2_capital_cnt_ny1 = ($row['a2_s_p2_capital_cnt_ny1'] == '')?0:$row['a2_s_p2_capital_cnt_ny1'];
		$a2_s_p2_capital_money_ny1 = ($row['a2_s_p2_capital_money_ny1'] == '')?0:$row['a2_s_p2_capital_money_ny1'];
		
		$a2_s_p1_money_ny2 = ($row['a2_s_p1_money_ny2'] == '')?0:$row['a2_s_p1_money_ny2']; //NULL則填入0
		$a2_s_p1_current_cnt_ny2 = ($row['a2_s_p1_current_cnt_ny2'] == '')?0:$row['a2_s_p1_current_cnt_ny2'];
		$a2_s_p1_current_money_ny2 = ($row['a2_s_p1_current_money_ny2'] == '')?0:$row['a2_s_p1_current_money_ny2'];
		$a2_s_p1_capital_cnt_ny2 = ($row['a2_s_p1_capital_cnt_ny2'] == '')?0:$row['a2_s_p1_capital_cnt_ny2'];
		$a2_s_p1_capital_money_ny2 = ($row['a2_s_p1_capital_money_ny2'] == '')?0:$row['a2_s_p1_capital_money_ny2'];
		$a2_s_p2_money_ny2 = ($row['a2_s_p2_money_ny2'] == '')?0:$row['a2_s_p2_money_ny2'];
		$a2_s_p2_current_cnt_ny2 = ($row['a2_s_p2_current_cnt_ny2'] == '')?0:$row['a2_s_p2_current_cnt_ny2'];
		$a2_s_p2_current_money_ny2 = ($row['a2_s_p2_current_money_ny2'] == '')?0:$row['a2_s_p2_current_money_ny2'];
		$a2_s_p2_capital_cnt_ny2 = ($row['a2_s_p2_capital_cnt_ny2'] == '')?0:$row['a2_s_p2_capital_cnt_ny2'];
		$a2_s_p2_capital_money_ny2 = ($row['a2_s_p2_capital_money_ny2'] == '')?0:$row['a2_s_p2_capital_money_ny2'];
		
		$a3_s_p1_money = ($row['a3_s_p1_money'] == '')?0:$row['a3_s_p1_money']; //NULL則填入0
		$a3_s_p1_current_cnt = ($row['a3_s_p1_current_cnt'] == '')?0:$row['a3_s_p1_current_cnt'];
		$a3_s_p1_current_money = ($row['a3_s_p1_current_money'] == '')?0:$row['a3_s_p1_current_money'];
		$a3_s_p1_capital_cnt = ($row['a3_s_p1_capital_cnt'] == '')?0:$row['a3_s_p1_capital_cnt'];
		$a3_s_p1_capital_money = ($row['a3_s_p1_capital_money'] == '')?0:$row['a3_s_p1_capital_money'];
		$a3_s_p2_money = ($row['a3_s_p2_money'] == '')?0:$row['a3_s_p2_money'];
		$a3_s_p2_current_cnt = ($row['a3_s_p2_current_cnt'] == '')?0:$row['a3_s_p2_current_cnt'];
		$a3_s_p2_current_money = ($row['a3_s_p2_current_money'] == '')?0:$row['a3_s_p2_current_money'];
		$a3_s_p2_capital_cnt = ($row['a3_s_p2_capital_cnt'] == '')?0:$row['a3_s_p2_capital_cnt'];
		$a3_s_p2_capital_money = ($row['a3_s_p2_capital_money'] == '')?0:$row['a3_s_p2_capital_money'];

		$a4_s_p1_money = ($row['a4_s_p1_money'] == '')?0:$row['a4_s_p1_money']; //NULL則填入0
		$a4_s_p1_current_cnt = ($row['a4_s_p1_current_cnt'] == '')?0:$row['a4_s_p1_current_cnt'];
		$a4_s_p1_current_money = ($row['a4_s_p1_current_money'] == '')?0:$row['a4_s_p1_current_money'];
		$a4_s_p1_capital_cnt = ($row['a4_s_p1_capital_cnt'] == '')?0:$row['a4_s_p1_capital_cnt'];
		$a4_s_p1_capital_money = ($row['a4_s_p1_capital_money'] == '')?0:$row['a4_s_p1_capital_money'];

		$a5_p1_name = $row['a5_p1_name'];
		$a5_p2_name = $row['a5_p2_name'];
		$a5_s_p1_money = ($row['a5_s_p1_money'] == '')?0:$row['a5_s_p1_money']; //NULL則填入0
		$a5_s_p1_current_cnt = ($row['a5_s_p1_current_cnt'] == '')?0:$row['a5_s_p1_current_cnt'];
		$a5_s_p1_current_money = ($row['a5_s_p1_current_money'] == '')?0:$row['a5_s_p1_current_money'];
		$a5_s_p1_capital_cnt = ($row['a5_s_p1_capital_cnt'] == '')?0:$row['a5_s_p1_capital_cnt'];
		$a5_s_p1_capital_money = ($row['a5_s_p1_capital_money'] == '')?0:$row['a5_s_p1_capital_money'];
		$a5_s_p2_money = ($row['a5_s_p2_money'] == '')?0:$row['a5_s_p2_money'];
		$a5_s_p2_current_cnt = ($row['a5_s_p2_current_cnt'] == '')?0:$row['a5_s_p2_current_cnt'];
		$a5_s_p2_current_money = ($row['a5_s_p2_current_money'] == '')?0:$row['a5_s_p2_current_money'];
		$a5_s_p2_capital_cnt = ($row['a5_s_p2_capital_cnt'] == '')?0:$row['a5_s_p2_capital_cnt'];
		$a5_s_p2_capital_money = ($row['a5_s_p2_capital_money'] == '')?0:$row['a5_s_p2_capital_money'];
		
		$a5_s_p1_money_ny1 = ($row['a5_s_p1_money_ny1'] == '')?0:$row['a5_s_p1_money_ny1']; //NULL則填入0
		$a5_s_p1_current_cnt_ny1 = ($row['a5_s_p1_current_cnt_ny1'] == '')?0:$row['a5_s_p1_current_cnt_ny1'];
		$a5_s_p1_current_money_ny1 = ($row['a5_s_p1_current_money_ny1'] == '')?0:$row['a5_s_p1_current_money_ny1'];
		$a5_s_p1_capital_cnt_ny1 = ($row['a5_s_p1_capital_cnt_ny1'] == '')?0:$row['a5_s_p1_capital_cnt_ny1'];
		$a5_s_p1_capital_money_ny1 = ($row['a5_s_p1_capital_money_ny1'] == '')?0:$row['a5_s_p1_capital_money_ny1'];
		$a5_s_p2_money_ny1 = ($row['a5_s_p2_money_ny1'] == '')?0:$row['a5_s_p2_money_ny1'];
		$a5_s_p2_current_cnt_ny1 = ($row['a5_s_p2_current_cnt_ny1'] == '')?0:$row['a5_s_p2_current_cnt_ny1'];
		$a5_s_p2_current_money_ny1 = ($row['a5_s_p2_current_money_ny1'] == '')?0:$row['a5_s_p2_current_money_ny1'];
		$a5_s_p2_capital_cnt_ny1 = ($row['a5_s_p2_capital_cnt_ny1'] == '')?0:$row['a5_s_p2_capital_cnt_ny1'];
		$a5_s_p2_capital_money_ny1 = ($row['a5_s_p2_capital_money_ny1'] == '')?0:$row['a5_s_p2_capital_money_ny1'];
		
		$a5_s_p1_money_ny2 = ($row['a5_s_p1_money_ny2'] == '')?0:$row['a5_s_p1_money_ny2']; //NULL則填入0
		$a5_s_p1_current_cnt_ny2 = ($row['a5_s_p1_current_cnt_ny2'] == '')?0:$row['a5_s_p1_current_cnt_ny2'];
		$a5_s_p1_current_money_ny2 = ($row['a5_s_p1_current_money_ny2'] == '')?0:$row['a5_s_p1_current_money_ny2'];
		$a5_s_p1_capital_cnt_ny2 = ($row['a5_s_p1_capital_cnt_ny2'] == '')?0:$row['a5_s_p1_capital_cnt_ny2'];
		$a5_s_p1_capital_money_ny2 = ($row['a5_s_p1_capital_money_ny2'] == '')?0:$row['a5_s_p1_capital_money_ny2'];
		$a5_s_p2_money_ny2 = ($row['a5_s_p2_money_ny2'] == '')?0:$row['a5_s_p2_money_ny2'];
		$a5_s_p2_current_cnt_ny2 = ($row['a5_s_p2_current_cnt_ny2'] == '')?0:$row['a5_s_p2_current_cnt_ny2'];
		$a5_s_p2_current_money_ny2 = ($row['a5_s_p2_current_money_ny2'] == '')?0:$row['a5_s_p2_current_money_ny2'];
		$a5_s_p2_capital_cnt_ny2 = ($row['a5_s_p2_capital_cnt_ny2'] == '')?0:$row['a5_s_p2_capital_cnt_ny2'];
		$a5_s_p2_capital_money_ny2 = ($row['a5_s_p2_capital_money_ny2'] == '')?0:$row['a5_s_p2_capital_money_ny2'];
		
		$a6_s_people = ($row['a6_s_people'] == '')?0:$row['a6_s_people']; //NULL則填入0
		$a6_item = ($row['a6_item'] == '')?0:$row['a6_item'];
		
		$a7_s_p1_money = ($row['a7_s_p1_money'] == '')?0:$row['a7_s_p1_money']; //NULL則填入0
		$a7_s_p1_current_cnt = ($row['a7_s_p1_current_cnt'] == '')?0:$row['a7_s_p1_current_cnt'];
		$a7_s_p1_current_money = ($row['a7_s_p1_current_money'] == '')?0:$row['a7_s_p1_current_money'];
		$a7_s_p1_capital_cnt = ($row['a7_s_p1_capital_cnt'] == '')?0:$row['a7_s_p1_capital_cnt'];
		$a7_s_p1_capital_money = ($row['a7_s_p1_capital_money'] == '')?0:$row['a7_s_p1_capital_money'];
		
	}
	
?>

表Ｉ～２ 經費需求彙整表
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<? include "../../function/button_print.php"; ?>
<input type="button" name="Submit" value="列印完畢回主選單" onclick="location.href='../school_index.php'">
<input type="button" name="Submit" value="列印完畢前往檔案上傳區" onclick="location.href='school_upload_file.php'">
<br />
<div id="print_content">
<div style="font-family:標楷體;font-size:20px;text-align:center"><strong>教育部<?=$school_year;?>年度教育優先區計畫補助項目經費需求彙整表<br /><?=$cityname.$district.$schoolname;?></strong><br />
學校所在區域：
<? 
	switch($area) 
	{ 
		case "1":
			echo "離島";
			break;
		case "2":
			echo "偏遠及特偏";
			break;
		case "3":
			echo "一般地區";
			break;
		case "4":
			echo "都會地區";
			break;
		default:
			echo "無貴校所在區域資料，請聯繫教育局(處)承辦人更新資料，謝謝。";
	}
?>　　班級數：<?=$class_total;?>班　　在籍學生數：<?=$student;?>人<br />
<?
	//烈印顯示用
	echo "學校代碼：".$account;
	echo "　　承辦人：".$user_from;
	echo "　　E-mail：".$email;
?>
</div>
<table width="900px" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:標楷體">
	<tr>
		<td width="40" rowspan="2" align="center" nowrap="nowrap">項次</td>
		<td colspan="3" rowspan="2" align="center" nowrap="nowrap">補        助        項        目</td>
		<td height="30" colspan="4" align="center" nowrap="nowrap">申   請   補   助   數   量   、   金   額</td>
	</tr>
	<tr>
		<td height="30" align="center" nowrap="nowrap">數    量</td>
		<td height="30" align="center" nowrap="nowrap"> 金額 (元)</td>
		<td height="30" align="center" nowrap="nowrap">小 計</td>
		<td height="30" align="center" nowrap="nowrap">合    計</td>
	</tr>
	<tr>
		<td rowspan="2" align="center" nowrap="nowrap">一</td>
		<td rowspan="2" nowrap="nowrap">推展親職教育活動</td>
		<td height="30" colspan="2" nowrap="nowrap">親職教育活動(場次)</td>
		<td height="30" align="center" nowrap="nowrap"><?=number_format($a1_s_p1_times);?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a1_s_p1_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a1_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a1_money);?></td>
	</tr>
	<tr>
		<td height="30" colspan="2" nowrap="nowrap">目標學生個案家庭輔導(人次)</td>
		<td height="30" align="center" nowrap="nowrap"><?=number_format($a1_s_p2_people);?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a1_s_p2_money);?></td>
	</tr>
	<tr>
		<td rowspan="4" align="center" nowrap="nowrap">二</td>
		<td rowspan="4" nowrap="nowrap">補助學校發展教育特色</td>
		<td rowspan="2">發展特色一：<br /><?=$a2_p1_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_money);?></td>
		<td rowspan="4" align="right" nowrap="nowrap"><?=number_format($a2_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_capital_money);?></td>
	</tr>
	<tr>
		<td rowspan="2">發展特色二：<br /><?=$a2_p2_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_capital_money);?></td>
	</tr>
	<tr>
		<td rowspan="4" align="center" nowrap="nowrap">三</td>
		<td rowspan="4" nowrap="nowrap">修繕離島或偏遠地區師生宿舍</td>
		<td rowspan="2" nowrap="nowrap">教師宿舍</td>
		<td height="30" nowrap="nowrap">經常門(項)</td>
		<td height="30" align="center" nowrap="nowrap"><?=number_format($a3_s_p1_current_cnt);?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a3_s_p1_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a3_s_p1_money);?></td>
		<td rowspan="4" align="right" nowrap="nowrap"><?=number_format($a3_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門(項)</td>
		<td height="30" align="center" nowrap="nowrap"><?=number_format($a3_s_p1_capital_cnt);?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a3_s_p1_capital_money);?></td>
	</tr>
	<tr>
		<td rowspan="2" nowrap="nowrap">學生宿舍</td>
		<td height="30" nowrap="nowrap">經常門(項)</td>
		<td height="30" align="center" nowrap="nowrap"><?=number_format($a3_s_p2_current_cnt);?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a3_s_p2_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a3_s_p2_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門(項)</td>
		<td height="30" align="center" nowrap="nowrap"><?=number_format($a3_s_p2_capital_cnt);?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a3_s_p2_capital_money);?></td>
	</tr>
	<tr>
		<td rowspan="2" align="center" nowrap="nowrap">四</td>
		<td colspan="2" rowspan="2" nowrap="nowrap">充實學校基本教學設備</td>
		<td height="30" nowrap="nowrap">經常門 </td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a4_s_p1_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a4_s_p1_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a4_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a4_s_p1_capital_money);?></td>
	</tr>
	<tr>
		<td rowspan="4" align="center" nowrap="nowrap">五</td>
		<td rowspan="4" nowrap="nowrap">發展原住民教育文化特色及<br />充實設備器材</td>
		<td rowspan="2">發展特色一：<br /><?=$a5_p1_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_money);?></td>
		<td rowspan="4" align="right" nowrap="nowrap"><?=number_format($a5_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_capital_money);?></td>
	</tr>
	<tr>
		<td rowspan="2">發展特色二：<br /><?=$a5_p2_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_capital_money);?></td>
	</tr>
	<tr>
		<td rowspan="3" align="center" nowrap="nowrap">六</td>
		<td colspan="2" rowspan="3" nowrap="nowrap">補助交通不便地區學校交通車</td>
		<td height="30" nowrap="nowrap">補助租車費(人)</td>
		<td height="30" align="center" nowrap="nowrap"><?=($a6_item == '租車費')?$a6_s_people:0;?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format(($a6_item == '租車費')?$a6_money:0);?></td>
		<td rowspan="3" align="right" nowrap="nowrap"><?=number_format($a6_money);?></td>
		<td rowspan="3" align="right" nowrap="nowrap"><?=number_format($a6_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">補助交通費(人)</td>
		<td height="30" align="center" nowrap="nowrap"><?=($a6_item == '交通費')?$a6_s_people:0;?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format(($a6_item == '交通費')?$a6_money:0);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">購置交通車(人座)</td>
		<td height="30" align="center" nowrap="nowrap"><?=($a6_item == '購置交通車')?$a6_s_people:0;?></td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format(($a6_item == '購置交通車')?$a6_money:0);?></td>
	</tr>
	<tr>
		<td rowspan="2" align="center" nowrap="nowrap">七</td>
		<td rowspan="2" nowrap="nowrap">整修學校社區化活動場所</td>
		<td rowspan="2" nowrap="nowrap">綜合球場</td>
		<td height="30" nowrap="nowrap">修繕</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a7_s_p1_current_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a7_s_p1_money);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a7_money);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">設備</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a7_s_p1_capital_money);?></td>
	</tr>
	<tr>
		<td height="40" colspan="7" align="center" nowrap="nowrap"><p style="font-size:18px">總　　　　計</p></td>
		<td height="40" align="right" nowrap="nowrap"><?=number_format($total_money);?></td>
	</tr>
		<tr>
		<td height="50" colspan="8" nowrap="nowrap"><p style="font-size:18px">承辦人：　　　　　　　　　主任：　　　　　　　　　校長： </p></td>
	</tr>
</table>
<? if($total_money_ny <= 0) { echo "<!--"; } ?>
<p style='page-break-after:always'></p>
<table width="900px" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:標楷體">
	<tr>
		<td width="40" rowspan="2" align="center" nowrap="nowrap">項次</td>
		<td colspan="3" rowspan="2" align="center" nowrap="nowrap">補        助        項        目</td>
		<td height="30" colspan="4" align="center" nowrap="nowrap">申   請   補   助   數   量   、   金   額</td>
	</tr>
	<tr>
		<td height="30" align="center" nowrap="nowrap">數    量</td>
		<td height="30" align="center" nowrap="nowrap"> 金額 (元)</td>
		<td height="30" align="center" nowrap="nowrap">小 計</td>
		<td height="30" align="center" nowrap="nowrap">合    計</td>
	</tr>
<? if($total_money_ny <= 0) { echo "-->"; } ?>
<? if($a2_money_ny1 <= 0) { echo "<!--"; } ?>
	<tr>
		<td rowspan="4" align="center" nowrap="nowrap">二</td>
		<td rowspan="4" nowrap="nowrap">補助學校發展教育特色<br /><?=($school_year+1);?>年度</td>
		<td rowspan="2">發展特色一：<br /><?=$a2_p1_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_current_money_ny1);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_money_ny1);?></td>
		<td rowspan="4" align="right" nowrap="nowrap"><?=number_format($a2_money_ny1);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_capital_money_ny1);?></td>
	</tr>
	<tr>
		<td rowspan="2">發展特色二：<br /><?=$a2_p2_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_current_money_ny1);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_money_ny1);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_capital_money_ny1);?></td>
	</tr>
<? if($a2_money_ny1 <= 0) { echo "-->"; } ?>
<? if($a2_money_ny2 <= 0) { echo "<!--"; } ?>
	<tr>
		<td rowspan="4" align="center" nowrap="nowrap">二</td>
		<td rowspan="4" nowrap="nowrap">補助學校發展教育特色<br /><?=($school_year+2);?>年度</td>
		<td rowspan="2">發展特色一：<br /><?=$a2_p1_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_current_money_ny2);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_money_ny2);?></td>
		<td rowspan="4" align="right" nowrap="nowrap"><?=number_format($a2_money_ny2);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p1_capital_money_ny2);?></td>
	</tr>
	<tr>
		<td rowspan="2">發展特色二：<br /><?=$a2_p2_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_current_money_ny2);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_money_ny2);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a2_s_p2_capital_money_ny2);?></td>
	</tr>
<? if($a2_money_ny2 <= 0) { echo "-->"; } ?>
<? if($a5_money_ny1 <= 0) { echo "<!--"; } ?>
	<tr>
		<td rowspan="4" align="center" nowrap="nowrap">五</td>
		<td rowspan="4" nowrap="nowrap">發展原住民教育文化特色及<br />充實設備器材<br /><?=($school_year+1);?>年度</td>
		<td rowspan="2">發展特色一：<br /><?=$a5_p1_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_current_money_ny1);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_money_ny1);?></td>
		<td rowspan="4" align="right" nowrap="nowrap"><?=number_format($a5_money_ny1);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_capital_money_ny1);?></td>
	</tr>
	<tr>
		<td rowspan="2">發展特色二：<br /><?=$a5_p2_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_current_money_ny1);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_money_ny1);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_capital_money_ny1);?></td>
	</tr>
<? if($a5_money_ny1 <= 0) { echo "-->"; } ?>
<? if($a5_money_ny2 <= 0) { echo "<!--"; } ?>
	<tr>
		<td rowspan="4" align="center" nowrap="nowrap">五</td>
		<td rowspan="4" nowrap="nowrap">發展原住民教育文化特色及<br />充實設備器材<br /><?=($school_year+2);?>年度</td>
		<td rowspan="2">發展特色一：<br /><?=$a5_p1_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_current_money_ny2);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_money_ny2);?></td>
		<td rowspan="4" align="right" nowrap="nowrap"><?=number_format($a5_money_ny2);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p1_capital_money_ny2);?></td>
	</tr>
	<tr>
		<td rowspan="2">發展特色二：<br /><?=$a5_p2_name;?></td>
		<td height="30" nowrap="nowrap">經常門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_current_money_ny2);?></td>
		<td rowspan="2" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_money_ny2);?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap">資本門</td>
		<td height="30" align="center" nowrap="nowrap">&nbsp;</td>
		<td height="30" align="right" nowrap="nowrap"><?=number_format($a5_s_p2_capital_money_ny2);?></td>
	</tr>
<? if($a5_money_ny2 <= 0) { echo "-->"; } ?>
<? if($total_money_ny <= 0) { echo "<!--"; } ?>
	<tr>
		<td height="40" colspan="7" align="center" nowrap="nowrap"><p style="font-size:18px">總　　　　計</p></td>
		<td height="40" align="right" nowrap="nowrap"><?=number_format($total_money_ny);?></td>
	</tr>
	<tr>
		<td height="50" colspan="8" nowrap="nowrap"><p style="font-size:18px">承辦人：　　　　　　　　　主任：　　　　　　　　　校長： </p></td>
	</tr>
</table>
<? if($total_money_ny <= 0) { echo "-->"; } ?>
</div>
<input type="hidden" name="school_year" value="<?=$school_year;?>">
