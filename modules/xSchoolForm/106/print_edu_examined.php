<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	include "../../function/config_for_106.php"; //本年度基本設定

	$get_id = $_GET['acc'];

	if($get_id != "")
		$username = $get_id;


	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一資料
		   "      , a1.s_total_money as a1_money ".
		   "      , a1.s_p1_money as a1_s_p1_money, a1.s_p2_money as a1_s_p2_money ".
		   //補一縣市資料
		   "      , a1.city_p1_money as a1_city_p1_money, a1.city_p2_money as a1_city_p2_money ".
		   "      , a1.city_desc as a1_city_desc ".
		   //補一教育部資料
		   "      , a1.edu_p1_money as a1_edu_p1_money, a1.edu_p2_money as a1_edu_p2_money ".
		   "      , a1.edu_desc as a1_edu_desc ".

		   //補二資料
		   "      , a2.p1_name as a2_p1_name, a2.p2_name as a2_p2_name ".
		   "      , a2.s_total_money as a2_money ".
		   "      , a2.s_p1_money as a2_s_p1_money, a2.s_p2_money as a2_s_p2_money ".
		   "      , a2.s_p1_current_money as a2_s_p1_current_money ".
		   "      , a2.s_p1_capital_money as a2_s_p1_capital_money ".
		   "      , a2.s_p2_current_money as a2_s_p2_current_money ".
		   "      , a2.s_p2_capital_money as a2_s_p2_capital_money ".

		   "      , a2.s_total_money_ny1 as a2_money_ny1 ".
		   "      , a2.s_p1_money_ny1 as a2_s_p1_money_ny1, a2.s_p2_money_ny1 as a2_s_p2_money_ny1 ".
		   "      , a2.s_p1_current_money_ny1 as a2_s_p1_current_money_ny1 ".
		   "      , a2.s_p1_capital_money_ny1 as a2_s_p1_capital_money_ny1 ".
		   "      , a2.s_p2_current_money_ny1 as a2_s_p2_current_money_ny1 ".
		   "      , a2.s_p2_capital_money_ny1 as a2_s_p2_capital_money_ny1 ".

		   "      , a2.s_total_money_ny2 as a2_money_ny2 ".
		   "      , a2.s_p1_money_ny2 as a2_s_p1_money_ny2, a2.s_p2_money_ny2 as a2_s_p2_money_ny2 ".
		   "      , a2.s_p1_current_money_ny2 as a2_s_p1_current_money_ny2 ".
		   "      , a2.s_p1_capital_money_ny2 as a2_s_p1_capital_money_ny2 ".
		   "      , a2.s_p2_current_money_ny2 as a2_s_p2_current_money_ny2 ".
		   "      , a2.s_p2_capital_money_ny2 as a2_s_p2_capital_money_ny2 ".
		   //補二縣市資料
		   "      , a2.city_total_money as a2_city_money ".
		   "      , a2.city_p1_money as a2_city_p1_money, a2.city_p2_money as a2_city_p2_money ".
		   "      , a2.city_p1_current_money as a2_city_p1_current_money ".
		   "      , a2.city_p1_capital_money as a2_city_p1_capital_money ".
		   "      , a2.city_p2_current_money as a2_city_p2_current_money ".
		   "      , a2.city_p2_capital_money as a2_city_p2_capital_money ".
		   "      , a2.city_desc as a2_city_desc, a2.city_desc_p2 as a2_city_desc_p2 ".

		   "      , a2.city_total_money_ny1 as a2_city_money_ny1 ".
		   "      , a2.city_p1_money_ny1 as a2_city_p1_money_ny1, a2.city_p2_money_ny1 as a2_city_p2_money_ny1 ".
		   "      , a2.city_p1_current_money_ny1 as a2_city_p1_current_money_ny1 ".
		   "      , a2.city_p1_capital_money_ny1 as a2_city_p1_capital_money_ny1 ".
		   "      , a2.city_p2_current_money_ny1 as a2_city_p2_current_money_ny1 ".
		   "      , a2.city_p2_capital_money_ny1 as a2_city_p2_capital_money_ny1 ".
		   "      , a2.city_desc_ny1 as a2_city_desc_ny1, a2.city_desc_ny1_p2 as a2_city_desc_ny1_p2 ".

		   "      , a2.city_total_money_ny2 as a2_city_money_ny2 ".
		   "      , a2.city_p1_money_ny2 as a2_city_p1_money_ny2, a2.city_p2_money_ny2 as a2_city_p2_money_ny2 ".
		   "      , a2.city_p1_current_money_ny2 as a2_city_p1_current_money_ny2 ".
		   "      , a2.city_p1_capital_money_ny2 as a2_city_p1_capital_money_ny2 ".
		   "      , a2.city_p2_current_money_ny2 as a2_city_p2_current_money_ny2 ".
		   "      , a2.city_p2_capital_money_ny2 as a2_city_p2_capital_money_ny2 ".
		   "      , a2.city_desc_ny2 as a2_city_desc_ny2, a2.city_desc_ny2_p2 as a2_city_desc_ny2_p2 ".
		   //補二教育部資料
		   "      , a2.edu_total_money as a2_edu_money ".
		   "      , a2.edu_p1_money as a2_edu_p1_money, a2.edu_p2_money as a2_edu_p2_money ".
		   "      , a2.edu_p1_current_money as a2_edu_p1_current_money ".
		   "      , a2.edu_p1_capital_money as a2_edu_p1_capital_money ".
		   "      , a2.edu_p2_current_money as a2_edu_p2_current_money ".
		   "      , a2.edu_p2_capital_money as a2_edu_p2_capital_money ".
		   "      , a2.edu_desc as a2_edu_desc, a2.edu_desc_p2 as a2_edu_desc_p2 ".

		   "      , a2.edu_total_money_ny1 as a2_edu_money_ny1 ".
		   "      , a2.edu_p1_money_ny1 as a2_edu_p1_money_ny1, a2.edu_p2_money_ny1 as a2_edu_p2_money_ny1 ".
		   "      , a2.edu_p1_current_money_ny1 as a2_edu_p1_current_money_ny1 ".
		   "      , a2.edu_p1_capital_money_ny1 as a2_edu_p1_capital_money_ny1 ".
		   "      , a2.edu_p2_current_money_ny1 as a2_edu_p2_current_money_ny1 ".
		   "      , a2.edu_p2_capital_money_ny1 as a2_edu_p2_capital_money_ny1 ".
		   "      , a2.edu_desc_ny1 as a2_edu_desc_ny1, a2.edu_desc_ny1_p2 as a2_edu_desc_ny1_p2 ".

		   "      , a2.edu_total_money_ny2 as a2_edu_money_ny2 ".
		   "      , a2.edu_p1_money_ny2 as a2_edu_p1_money_ny2, a2.edu_p2_money_ny2 as a2_edu_p2_money_ny2 ".
		   "      , a2.edu_p1_current_money_ny2 as a2_edu_p1_current_money_ny2 ".
		   "      , a2.edu_p1_capital_money_ny2 as a2_edu_p1_capital_money_ny2 ".
		   "      , a2.edu_p2_current_money_ny2 as a2_edu_p2_current_money_ny2 ".
		   "      , a2.edu_p2_capital_money_ny2 as a2_edu_p2_capital_money_ny2 ".
		   "      , a2.edu_desc_ny2 as a2_edu_desc_ny2, a2.edu_desc_ny2_p2 as a2_edu_desc_ny2_p2 ".

		   //補三資料
		   "      , a3.s_total_money as a3_money ".
		   "      , a3.s_p1_money as a3_s_p1_money ".
		   "      , a3.s_p1_current_money as a3_s_p1_current_money ".
		   "      , a3.s_p1_capital_money as a3_s_p1_capital_money ".
		   //補三縣市資料
		   "      , a3.city_p1_money as a3_city_p1_money ".
		   "      , a3.city_p1_current_money as a3_city_p1_current_money ".
		   "      , a3.city_p1_capital_money as a3_city_p1_capital_money ".
		   "      , a3.city_desc as a3_city_desc ".
		   //補三教育部資料
		   "      , a3.edu_p1_money as a3_edu_p1_money ".
		   "      , a3.edu_p1_current_money as a3_edu_p1_current_money ".
		   "      , a3.edu_p1_capital_money as a3_edu_p1_capital_money ".
		   "      , a3.edu_desc as a3_edu_desc ".

		   //補四資料
		   "      , a4.s_total_money as a4_money ".
		   "      , a4.p1_name as a4_p1_name, a4.p2_name as a4_p2_name ".
		   "      , a4.s_p1_money as a4_s_p1_money, a4.s_p2_money as a4_s_p2_money ".
		   "      , a4.s_p1_current_money as a4_s_p1_current_money ".
		   "      , a4.s_p1_capital_money as a4_s_p1_capital_money ".
		   "      , a4.s_p2_current_money as a4_s_p2_current_money ".
		   "      , a4.s_p2_capital_money as a4_s_p2_capital_money ".

		   "      , a4.s_total_money_ny1 as a4_money_ny1 ".
		   "      , a4.s_p1_money_ny1 as a4_s_p1_money_ny1, a4.s_p2_money_ny1 as a4_s_p2_money_ny1 ".
		   "      , a4.s_p1_current_money_ny1 as a4_s_p1_current_money_ny1 ".
		   "      , a4.s_p1_capital_money_ny1 as a4_s_p1_capital_money_ny1 ".
		   "      , a4.s_p2_current_money_ny1 as a4_s_p2_current_money_ny1 ".
		   "      , a4.s_p2_capital_money_ny1 as a4_s_p2_capital_money_ny1 ".

		   "      , a4.s_total_money_ny2 as a4_money_ny2 ".
		   "      , a4.s_p1_money_ny2 as a4_s_p1_money_ny2, a4.s_p2_money_ny2 as a4_s_p2_money_ny2 ".
		   "      , a4.s_p1_current_money_ny2 as a4_s_p1_current_money_ny2 ".
		   "      , a4.s_p1_capital_money_ny2 as a4_s_p1_capital_money_ny2 ".
		   "      , a4.s_p2_current_money_ny2 as a4_s_p2_current_money_ny2 ".
		   "      , a4.s_p2_capital_money_ny2 as a4_s_p2_capital_money_ny2 ".

		   //補四縣市資料
		   "      , a4.city_total_money as a4_city_money ".
		   "      , a4.city_p1_money as a4_city_p1_money, a4.city_p2_money as a4_city_p2_money ".
		   "      , a4.city_p1_current_money as a4_city_p1_current_money ".
		   "      , a4.city_p1_capital_money as a4_city_p1_capital_money ".
		   "      , a4.city_p2_current_money as a4_city_p2_current_money ".
		   "      , a4.city_p2_capital_money as a4_city_p2_capital_money ".
		   "      , a4.city_desc as a4_city_desc, a4.city_desc_p2 as a4_city_desc_p2 ".

		   "      , a4.city_total_money_ny1 as a4_city_money_ny1 ".
		   "      , a4.city_p1_money_ny1 as a4_city_p1_money_ny1, a4.city_p2_money_ny1 as a4_city_p2_money_ny1 ".
		   "      , a4.city_p1_current_money_ny1 as a4_city_p1_current_money_ny1 ".
		   "      , a4.city_p1_capital_money_ny1 as a4_city_p1_capital_money_ny1 ".
		   "      , a4.city_p2_current_money_ny1 as a4_city_p2_current_money_ny1 ".
		   "      , a4.city_p2_capital_money_ny1 as a4_city_p2_capital_money_ny1 ".
		   "      , a4.city_desc_ny1 as a4_city_desc_ny1, a4.city_desc_ny1_p2 as a4_city_desc_ny1_p2 ".

		   "      , a4.city_total_money_ny2 as a4_city_money_ny2 ".
		   "      , a4.city_p1_money_ny2 as a4_city_p1_money_ny2, a4.city_p2_money_ny2 as a4_city_p2_money_ny2 ".
		   "      , a4.city_p1_current_money_ny2 as a4_city_p1_current_money_ny2 ".
		   "      , a4.city_p1_capital_money_ny2 as a4_city_p1_capital_money_ny2 ".
		   "      , a4.city_p2_current_money_ny2 as a4_city_p2_current_money_ny2 ".
		   "      , a4.city_p2_capital_money_ny2 as a4_city_p2_capital_money_ny2 ".
		   "      , a4.city_desc_ny2 as a4_city_desc_ny2, a4.city_desc_ny2_p2 as a4_city_desc_ny2_p2 ".
		   //補四教育部資料
		   "      , a4.edu_total_money as a4_edu_money ".
		   "      , a4.edu_p1_money as a4_edu_p1_money, a4.edu_p2_money as a4_edu_p2_money ".
		   "      , a4.edu_p1_current_money as a4_edu_p1_current_money ".
		   "      , a4.edu_p1_capital_money as a4_edu_p1_capital_money ".
		   "      , a4.edu_p2_current_money as a4_edu_p2_current_money ".
		   "      , a4.edu_p2_capital_money as a4_edu_p2_capital_money ".
		   "      , a4.edu_desc as a4_edu_desc, a4.edu_desc_p2 as a4_edu_desc_p2 ".

		   "      , a4.edu_total_money_ny1 as a4_edu_money_ny1 ".
		   "      , a4.edu_p1_money_ny1 as a4_edu_p1_money_ny1, a4.edu_p2_money_ny1 as a4_edu_p2_money_ny1 ".
		   "      , a4.edu_p1_current_money_ny1 as a4_edu_p1_current_money_ny1 ".
		   "      , a4.edu_p1_capital_money_ny1 as a4_edu_p1_capital_money_ny1 ".
		   "      , a4.edu_p2_current_money_ny1 as a4_edu_p2_current_money_ny1 ".
		   "      , a4.edu_p2_capital_money_ny1 as a4_edu_p2_capital_money_ny1 ".
		   "      , a4.edu_desc_ny1 as a4_edu_desc_ny1, a4.edu_desc_ny1_p2 as a4_edu_desc_ny1_p2 ".

		   "      , a4.edu_total_money_ny2 as a4_edu_money_ny2 ".
		   "      , a4.edu_p1_money_ny2 as a4_edu_p1_money_ny2, a4.edu_p2_money_ny2 as a4_edu_p2_money_ny2 ".
		   "      , a4.edu_p1_current_money_ny2 as a4_edu_p1_current_money_ny2 ".
		   "      , a4.edu_p1_capital_money_ny2 as a4_edu_p1_capital_money_ny2 ".
		   "      , a4.edu_p2_current_money_ny2 as a4_edu_p2_current_money_ny2 ".
		   "      , a4.edu_p2_capital_money_ny2 as a4_edu_p2_capital_money_ny2 ".
		   "      , a4.edu_desc_ny2 as a4_edu_desc_ny2, a4.edu_desc_ny2_p2 as a4_edu_desc_ny2_p2 ".

		   //補五資料
		   "      , a5.s_total_money as a5_money ".
		   "      , a5.s_money as a5_s_money ".
		   //補五縣市資料
		   "      , a5.city_total_money as a5_city_money, a5.item as a5_item ".
		   "      , a5.city_desc as a5_city_desc ".
		   //補五教育部資料
		   "      , a5.edu_total_money as a5_edu_money, a5.item as a5_item ".
		   "      , a5.edu_desc as a5_edu_desc ".

		   //補六資料
		   "      , a6.s_total_money as a6_money ".
		   "      , a6.s_p1_money as a6_s_p1_money ".
		   "      , a6.s_p1_current_money as a6_s_p1_current_money ".
		   "      , a6.s_p1_capital_money as a6_s_p1_capital_money ".
		   //補六縣市資料
		   "      , a6.city_p1_money as a6_city_p1_money ".
		   "      , a6.city_p1_current_money as a6_city_p1_current_money ".
		   "      , a6.city_p1_capital_money as a6_city_p1_capital_money ".
		   "      , a6.city_desc as a6_city_desc ".
		   //補六教育部資料
		   "      , a6.edu_p1_money as a6_edu_p1_money ".
		   "      , a6.edu_p1_current_money as a6_edu_p1_current_money ".
		   "      , a6.edu_p1_capital_money as a6_edu_p1_capital_money ".
		   "      , a6.edu_desc as a6_edu_desc ".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_teaching_equipment as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_aboriginal_education as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_transport_car as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_school_activity as a6 on sy.seq_no = a6.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ";

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

		//總金額
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

		$a2_city_money_ny1 = ($row['a2_city_money_ny1'] == '')?0:$row['a2_city_money_ny1'];
		$a2_city_money_ny2 = ($row['a2_city_money_ny2'] == '')?0:$row['a2_city_money_ny2'];
		$a4_city_money_ny1 = ($row['a4_city_money_ny1'] == '')?0:$row['a4_city_money_ny1'];
		$a4_city_money_ny2 = ($row['a4_city_money_ny2'] == '')?0:$row['a4_city_money_ny2'];

		$a2_edu_money_ny1 = ($row['a2_edu_money_ny1'] == '')?0:$row['a2_edu_money_ny1'];
		$a2_edu_money_ny2 = ($row['a2_edu_money_ny2'] == '')?0:$row['a2_edu_money_ny2'];
		$a4_edu_money_ny1 = ($row['a4_edu_money_ny1'] == '')?0:$row['a4_edu_money_ny1'];
		$a4_edu_money_ny2 = ($row['a4_edu_money_ny2'] == '')?0:$row['a4_edu_money_ny2'];

		//縣市審核意見
		$a1_city_desc = $row['a1_city_desc'];
		$a2_city_desc = $row['a2_city_desc'];
		$a2_city_desc_p2 = $row['a2_city_desc_p2'];
		$a2_city_desc_ny1 = $row['a2_city_desc_ny1'];
		$a2_city_desc_ny1_p2 = $row['a2_city_desc_ny1_p2'];
		$a2_city_desc_ny2 = $row['a2_city_desc_ny2'];
		$a2_city_desc_ny2_p2 = $row['a2_city_desc_ny2_p2'];
		$a3_city_desc = $row['a3_city_desc'];
		$a4_city_desc = $row['a4_city_desc'];
		$a4_city_desc_p2 = $row['a4_city_desc_p2'];
		$a4_city_desc_ny1 = $row['a4_city_desc_ny1'];
		$a4_city_desc_ny1_p2 = $row['a4_city_desc_ny1_p2'];
		$a4_city_desc_ny2 = $row['a4_city_desc_ny2'];
		$a4_city_desc_ny2_p2 = $row['a4_city_desc_ny2_p2'];
		$a5_city_desc = $row['a5_city_desc'];
		$a6_city_desc = $row['a6_city_desc'];

		//教育部審核意見
		$a1_edu_desc = $row['a1_edu_desc'];
		$a2_edu_desc = $row['a2_edu_desc'];
		$a2_edu_desc_p2 = $row['a2_edu_desc_p2'];
		$a2_edu_desc_ny1 = $row['a2_edu_desc_ny1'];
		$a2_edu_desc_ny1_p2 = $row['a2_edu_desc_ny1_p2'];
		$a2_edu_desc_ny2 = $row['a2_edu_desc_ny2'];
		$a2_edu_desc_ny2_p2 = $row['a2_edu_desc_ny2_p2'];
		$a3_edu_desc = $row['a3_edu_desc'];
		$a4_edu_desc = $row['a4_edu_desc'];
		$a4_edu_desc_p2 = $row['a4_edu_desc_p2'];
		$a4_edu_desc_ny1 = $row['a4_edu_desc_ny1'];
		$a4_edu_desc_ny1_p2 = $row['a4_edu_desc_ny1_p2'];
		$a4_edu_desc_ny2 = $row['a4_edu_desc_ny2'];
		$a4_edu_desc_ny2_p2 = $row['a4_edu_desc_ny2_p2'];
		$a5_edu_desc = $row['a5_edu_desc'];
		$a6_edu_desc = $row['a6_edu_desc'];

		//補一
		$a1_s_p1_money = ($row['a1_s_p1_money'] == '')?0:$row['a1_s_p1_money'];
		$a1_s_p2_money = ($row['a1_s_p2_money'] == '')?0:$row['a1_s_p2_money'];

		$a1_city_p1_money = ($row['a1_city_p1_money'] == '')?0:$row['a1_city_p1_money'];
		$a1_city_p2_money = ($row['a1_city_p2_money'] == '')?0:$row['a1_city_p2_money'];

		$a1_edu_p1_money = ($row['a1_edu_p1_money'] == '')?0:$row['a1_edu_p1_money'];
		$a1_edu_p2_money = ($row['a1_edu_p2_money'] == '')?0:$row['a1_edu_p2_money'];

		//補二
		$a2_p1_name = $row['a2_p1_name'];
		$a2_p2_name = $row['a2_p2_name'];
		$a2_s_p1_money = ($row['a2_s_p1_money'] == '')?0:$row['a2_s_p1_money']; //NULL則填入0
		$a2_s_p1_current_money = ($row['a2_s_p1_current_money'] == '')?0:$row['a2_s_p1_current_money'];
		$a2_s_p1_capital_money = ($row['a2_s_p1_capital_money'] == '')?0:$row['a2_s_p1_capital_money'];
		$a2_s_p2_money = ($row['a2_s_p2_money'] == '')?0:$row['a2_s_p2_money'];
		$a2_s_p2_current_money = ($row['a2_s_p2_current_money'] == '')?0:$row['a2_s_p2_current_money'];
		$a2_s_p2_capital_money = ($row['a2_s_p2_capital_money'] == '')?0:$row['a2_s_p2_capital_money'];

		$a2_s_p1_money_ny1 = ($row['a2_s_p1_money_ny1'] == '')?0:$row['a2_s_p1_money_ny1']; //NULL則填入0
		$a2_s_p1_current_money_ny1 = ($row['a2_s_p1_current_money_ny1'] == '')?0:$row['a2_s_p1_current_money_ny1'];
		$a2_s_p1_capital_money_ny1 = ($row['a2_s_p1_capital_money_ny1'] == '')?0:$row['a2_s_p1_capital_money_ny1'];
		$a2_s_p2_money_ny1 = ($row['a2_s_p2_money_ny1'] == '')?0:$row['a2_s_p2_money_ny1'];
		$a2_s_p2_current_money_ny1 = ($row['a2_s_p2_current_money_ny1'] == '')?0:$row['a2_s_p2_current_money_ny1'];
		$a2_s_p2_capital_money_ny1 = ($row['a2_s_p2_capital_money_ny1'] == '')?0:$row['a2_s_p2_capital_money_ny1'];

		$a2_s_p1_money_ny2 = ($row['a2_s_p1_money_ny2'] == '')?0:$row['a2_s_p1_money_ny2']; //NULL則填入0
		$a2_s_p1_current_money_ny2 = ($row['a2_s_p1_current_money_ny2'] == '')?0:$row['a2_s_p1_current_money_ny2'];
		$a2_s_p1_capital_money_ny2 = ($row['a2_s_p1_capital_money_ny2'] == '')?0:$row['a2_s_p1_capital_money_ny2'];
		$a2_s_p2_money_ny2 = ($row['a2_s_p2_money_ny2'] == '')?0:$row['a2_s_p2_money_ny2'];
		$a2_s_p2_current_money_ny2 = ($row['a2_s_p2_current_money_ny2'] == '')?0:$row['a2_s_p2_current_money_ny2'];
		$a2_s_p2_capital_money_ny2 = ($row['a2_s_p2_capital_money_ny2'] == '')?0:$row['a2_s_p2_capital_money_ny2'];

		$a2_city_p1_money = ($row['a2_city_p1_money'] == '')?0:$row['a2_city_p1_money']; //NULL則填入0
		$a2_city_p1_current_money = ($row['a2_city_p1_current_money'] == '')?0:$row['a2_city_p1_current_money'];
		$a2_city_p1_capital_money = ($row['a2_city_p1_capital_money'] == '')?0:$row['a2_city_p1_capital_money'];
		$a2_city_p2_money = ($row['a2_city_p2_money'] == '')?0:$row['a2_city_p2_money'];
		$a2_city_p2_current_money = ($row['a2_city_p2_current_money'] == '')?0:$row['a2_city_p2_current_money'];
		$a2_city_p2_capital_money = ($row['a2_city_p2_capital_money'] == '')?0:$row['a2_city_p2_capital_money'];

		$a2_city_p1_money_ny1 = ($row['a2_city_p1_money_ny1'] == '')?0:$row['a2_city_p1_money_ny1']; //NULL則填入0
		$a2_city_p1_current_money_ny1 = ($row['a2_city_p1_current_money_ny1'] == '')?0:$row['a2_city_p1_current_money_ny1'];
		$a2_city_p1_capital_money_ny1 = ($row['a2_city_p1_capital_money_ny1'] == '')?0:$row['a2_city_p1_capital_money_ny1'];
		$a2_city_p2_money_ny1 = ($row['a2_city_p2_money_ny1'] == '')?0:$row['a2_city_p2_money_ny1'];
		$a2_city_p2_current_money_ny1 = ($row['a2_city_p2_current_money_ny1'] == '')?0:$row['a2_city_p2_current_money_ny1'];
		$a2_city_p2_capital_money_ny1 = ($row['a2_city_p2_capital_money_ny1'] == '')?0:$row['a2_city_p2_capital_money_ny1'];

		$a2_city_p1_money_ny2 = ($row['a2_city_p1_money_ny2'] == '')?0:$row['a2_city_p1_money_ny2']; //NULL則填入0
		$a2_city_p1_current_money_ny2 = ($row['a2_city_p1_current_money_ny2'] == '')?0:$row['a2_city_p1_current_money_ny2'];
		$a2_city_p1_capital_money_ny2 = ($row['a2_city_p1_capital_money_ny2'] == '')?0:$row['a2_city_p1_capital_money_ny2'];
		$a2_city_p2_money_ny2 = ($row['a2_city_p2_money_ny2'] == '')?0:$row['a2_city_p2_money_ny2'];
		$a2_city_p2_current_money_ny2 = ($row['a2_city_p2_current_money_ny2'] == '')?0:$row['a2_city_p2_current_money_ny2'];
		$a2_city_p2_capital_money_ny2 = ($row['a2_city_p2_capital_money_ny2'] == '')?0:$row['a2_city_p2_capital_money_ny2'];

		$a2_edu_p1_money = ($row['a2_edu_p1_money'] == '')?0:$row['a2_edu_p1_money']; //NULL則填入0
		$a2_edu_p1_current_money = ($row['a2_edu_p1_current_money'] == '')?0:$row['a2_edu_p1_current_money'];
		$a2_edu_p1_capital_money = ($row['a2_edu_p1_capital_money'] == '')?0:$row['a2_edu_p1_capital_money'];
		$a2_edu_p2_money = ($row['a2_edu_p2_money'] == '')?0:$row['a2_edu_p2_money'];
		$a2_edu_p2_current_money = ($row['a2_edu_p2_current_money'] == '')?0:$row['a2_edu_p2_current_money'];
		$a2_edu_p2_capital_money = ($row['a2_edu_p2_capital_money'] == '')?0:$row['a2_edu_p2_capital_money'];

		$a2_edu_p1_money_ny1 = ($row['a2_edu_p1_money_ny1'] == '')?0:$row['a2_edu_p1_money_ny1']; //NULL則填入0
		$a2_edu_p1_current_money_ny1 = ($row['a2_edu_p1_current_money_ny1'] == '')?0:$row['a2_edu_p1_current_money_ny1'];
		$a2_edu_p1_capital_money_ny1 = ($row['a2_edu_p1_capital_money_ny1'] == '')?0:$row['a2_edu_p1_capital_money_ny1'];
		$a2_edu_p2_money_ny1 = ($row['a2_edu_p2_money_ny1'] == '')?0:$row['a2_edu_p2_money_ny1'];
		$a2_edu_p2_current_money_ny1 = ($row['a2_edu_p2_current_money_ny1'] == '')?0:$row['a2_edu_p2_current_money_ny1'];
		$a2_edu_p2_capital_money_ny1 = ($row['a2_edu_p2_capital_money_ny1'] == '')?0:$row['a2_edu_p2_capital_money_ny1'];

		$a2_edu_p1_money_ny2 = ($row['a2_edu_p1_money_ny2'] == '')?0:$row['a2_edu_p1_money_ny2']; //NULL則填入0
		$a2_edu_p1_current_money_ny2 = ($row['a2_edu_p1_current_money_ny2'] == '')?0:$row['a2_edu_p1_current_money_ny2'];
		$a2_edu_p1_capital_money_ny2 = ($row['a2_edu_p1_capital_money_ny2'] == '')?0:$row['a2_edu_p1_capital_money_ny2'];
		$a2_edu_p2_money_ny2 = ($row['a2_edu_p2_money_ny2'] == '')?0:$row['a2_edu_p2_money_ny2'];
		$a2_edu_p2_current_money_ny2 = ($row['a2_edu_p2_current_money_ny2'] == '')?0:$row['a2_edu_p2_current_money_ny2'];
		$a2_edu_p2_capital_money_ny2 = ($row['a2_edu_p2_capital_money_ny2'] == '')?0:$row['a2_edu_p2_capital_money_ny2'];

		//補三
		$a3_s_p1_money = ($row['a3_s_p1_money'] == '')?0:$row['a3_s_p1_money']; //NULL則填入0
		$a3_s_p1_current_money = ($row['a3_s_p1_current_money'] == '')?0:$row['a3_s_p1_current_money'];
		$a3_s_p1_capital_money = ($row['a3_s_p1_capital_money'] == '')?0:$row['a3_s_p1_capital_money'];

		$a3_city_p1_money = ($row['a3_city_p1_money'] == '')?0:$row['a3_city_p1_money']; //NULL則填入0
		$a3_city_p1_current_money = ($row['a3_city_p1_current_money'] == '')?0:$row['a3_city_p1_current_money'];
		$a3_city_p1_capital_money = ($row['a3_city_p1_capital_money'] == '')?0:$row['a3_city_p1_capital_money'];

		$a3_edu_p1_money = ($row['a3_edu_p1_money'] == '')?0:$row['a3_edu_p1_money']; //NULL則填入0
		$a3_edu_p1_current_money = ($row['a3_edu_p1_current_money'] == '')?0:$row['a3_edu_p1_current_money'];
		$a3_edu_p1_capital_money = ($row['a3_edu_p1_capital_money'] == '')?0:$row['a3_edu_p1_capital_money'];

		//補四
		$a4_p1_name = $row['a4_p1_name'];
		$a4_p2_name = $row['a4_p2_name'];
		$a4_s_p1_money = ($row['a4_s_p1_money'] == '')?0:$row['a4_s_p1_money']; //NULL則填入0
		$a4_s_p1_current_money = ($row['a4_s_p1_current_money'] == '')?0:$row['a4_s_p1_current_money'];
		$a4_s_p1_capital_money = ($row['a4_s_p1_capital_money'] == '')?0:$row['a4_s_p1_capital_money'];
		$a4_s_p2_money = ($row['a4_s_p2_money'] == '')?0:$row['a4_s_p2_money'];
		$a4_s_p2_current_money = ($row['a4_s_p2_current_money'] == '')?0:$row['a4_s_p2_current_money'];
		$a4_s_p2_capital_money = ($row['a4_s_p2_capital_money'] == '')?0:$row['a4_s_p2_capital_money'];

		$a4_s_p1_money_ny1 = ($row['a4_s_p1_money_ny1'] == '')?0:$row['a4_s_p1_money_ny1']; //NULL則填入0
		$a4_s_p1_current_money_ny1 = ($row['a4_s_p1_current_money_ny1'] == '')?0:$row['a4_s_p1_current_money_ny1'];
		$a4_s_p1_capital_money_ny1 = ($row['a4_s_p1_capital_money_ny1'] == '')?0:$row['a4_s_p1_capital_money_ny1'];
		$a4_s_p2_money_ny1 = ($row['a4_s_p2_money_ny1'] == '')?0:$row['a4_s_p2_money_ny1'];
		$a4_s_p2_current_money_ny1 = ($row['a4_s_p2_current_money_ny1'] == '')?0:$row['a4_s_p2_current_money_ny1'];
		$a4_s_p2_capital_money_ny1 = ($row['a4_s_p2_capital_money_ny1'] == '')?0:$row['a4_s_p2_capital_money_ny1'];

		$a4_s_p1_money_ny2 = ($row['a4_s_p1_money_ny2'] == '')?0:$row['a4_s_p1_money_ny2']; //NULL則填入0
		$a4_s_p1_current_money_ny2 = ($row['a4_s_p1_current_money_ny2'] == '')?0:$row['a4_s_p1_current_money_ny2'];
		$a4_s_p1_capital_money_ny2 = ($row['a4_s_p1_capital_money_ny2'] == '')?0:$row['a4_s_p1_capital_money_ny2'];
		$a4_s_p2_money_ny2 = ($row['a4_s_p2_money_ny2'] == '')?0:$row['a4_s_p2_money_ny2'];
		$a4_s_p2_current_money_ny2 = ($row['a4_s_p2_current_money_ny2'] == '')?0:$row['a4_s_p2_current_money_ny2'];
		$a4_s_p2_capital_money_ny2 = ($row['a4_s_p2_capital_money_ny2'] == '')?0:$row['a4_s_p2_capital_money_ny2'];

		$a4_city_p1_money = ($row['a4_city_p1_money'] == '')?0:$row['a4_city_p1_money']; //NULL則填入0
		$a4_city_p1_current_money = ($row['a4_city_p1_current_money'] == '')?0:$row['a4_city_p1_current_money'];
		$a4_city_p1_capital_money = ($row['a4_city_p1_capital_money'] == '')?0:$row['a4_city_p1_capital_money'];
		$a4_city_p2_money = ($row['a4_city_p2_money'] == '')?0:$row['a4_city_p2_money'];
		$a4_city_p2_current_money = ($row['a4_city_p2_current_money'] == '')?0:$row['a4_city_p2_current_money'];
		$a4_city_p2_capital_money = ($row['a4_city_p2_capital_money'] == '')?0:$row['a4_city_p2_capital_money'];

		$a4_city_p1_money_ny1 = ($row['a4_city_p1_money_ny1'] == '')?0:$row['a4_city_p1_money_ny1']; //NULL則填入0
		$a4_city_p1_current_money_ny1 = ($row['a4_city_p1_current_money_ny1'] == '')?0:$row['a4_city_p1_current_money_ny1'];
		$a4_city_p1_capital_money_ny1 = ($row['a4_city_p1_capital_money_ny1'] == '')?0:$row['a4_city_p1_capital_money_ny1'];
		$a4_city_p2_money_ny1 = ($row['a4_city_p2_money_ny1'] == '')?0:$row['a4_city_p2_money_ny1'];
		$a4_city_p2_current_money_ny1 = ($row['a4_city_p2_current_money_ny1'] == '')?0:$row['a4_city_p2_current_money_ny1'];
		$a4_city_p2_capital_money_ny1 = ($row['a4_city_p2_capital_money_ny1'] == '')?0:$row['a4_city_p2_capital_money_ny1'];

		$a4_city_p1_money_ny2 = ($row['a4_city_p1_money_ny2'] == '')?0:$row['a4_city_p1_money_ny2']; //NULL則填入0
		$a4_city_p1_current_money_ny2 = ($row['a4_city_p1_current_money_ny2'] == '')?0:$row['a4_city_p1_current_money_ny2'];
		$a4_city_p1_capital_money_ny2 = ($row['a4_city_p1_capital_money_ny2'] == '')?0:$row['a4_city_p1_capital_money_ny2'];
		$a4_city_p2_money_ny2 = ($row['a4_city_p2_money_ny2'] == '')?0:$row['a4_city_p2_money_ny2'];
		$a4_city_p2_current_money_ny2 = ($row['a4_city_p2_current_money_ny2'] == '')?0:$row['a4_city_p2_current_money_ny2'];
		$a4_city_p2_capital_money_ny2 = ($row['a4_city_p2_capital_money_ny2'] == '')?0:$row['a4_city_p2_capital_money_ny2'];

		$a4_edu_p1_money = ($row['a4_edu_p1_money'] == '')?0:$row['a4_edu_p1_money']; //NULL則填入0
		$a4_edu_p1_current_money = ($row['a4_edu_p1_current_money'] == '')?0:$row['a4_edu_p1_current_money'];
		$a4_edu_p1_capital_money = ($row['a4_edu_p1_capital_money'] == '')?0:$row['a4_edu_p1_capital_money'];
		$a4_edu_p2_money = ($row['a4_edu_p2_money'] == '')?0:$row['a4_edu_p2_money'];
		$a4_edu_p2_current_money = ($row['a4_edu_p2_current_money'] == '')?0:$row['a4_edu_p2_current_money'];
		$a4_edu_p2_capital_money = ($row['a4_edu_p2_capital_money'] == '')?0:$row['a4_edu_p2_capital_money'];

		$a4_edu_p1_money_ny1 = ($row['a4_edu_p1_money_ny1'] == '')?0:$row['a4_edu_p1_money_ny1']; //NULL則填入0
		$a4_edu_p1_current_money_ny1 = ($row['a4_edu_p1_current_money_ny1'] == '')?0:$row['a4_edu_p1_current_money_ny1'];
		$a4_edu_p1_capital_money_ny1 = ($row['a4_edu_p1_capital_money_ny1'] == '')?0:$row['a4_edu_p1_capital_money_ny1'];
		$a4_edu_p2_money_ny1 = ($row['a4_edu_p2_money_ny1'] == '')?0:$row['a4_edu_p2_money_ny1'];
		$a4_edu_p2_current_money_ny1 = ($row['a4_edu_p2_current_money_ny1'] == '')?0:$row['a4_edu_p2_current_money_ny1'];
		$a4_edu_p2_capital_money_ny1 = ($row['a4_edu_p2_capital_money_ny1'] == '')?0:$row['a4_edu_p2_capital_money_ny1'];

		$a4_edu_p1_money_ny2 = ($row['a4_edu_p1_money_ny2'] == '')?0:$row['a4_edu_p1_money_ny2']; //NULL則填入0
		$a4_edu_p1_current_money_ny2 = ($row['a4_edu_p1_current_money_ny2'] == '')?0:$row['a4_edu_p1_current_money_ny2'];
		$a4_edu_p1_capital_money_ny2 = ($row['a4_edu_p1_capital_money_ny2'] == '')?0:$row['a4_edu_p1_capital_money_ny2'];
		$a4_edu_p2_money_ny2 = ($row['a4_edu_p2_money_ny2'] == '')?0:$row['a4_edu_p2_money_ny2'];
		$a4_edu_p2_current_money_ny2 = ($row['a4_edu_p2_current_money_ny2'] == '')?0:$row['a4_edu_p2_current_money_ny2'];
		$a4_edu_p2_capital_money_ny2 = ($row['a4_edu_p2_capital_money_ny2'] == '')?0:$row['a4_edu_p2_capital_money_ny2'];

		//補五
		$a5_item = $row['a5_item'];
		$a5_s_money = ($row['a5_s_money'] == '')?0:$row['a5_s_money'];

		$a5_city_money = ($row['a5_city_money'] == '')?0:$row['a5_city_money'];

		$a5_edu_money = ($row['a5_edu_money'] == '')?0:$row['a5_edu_money'];

		//補六
		$a6_s_p1_money = ($row['a6_s_p1_money'] == '')?0:$row['a6_s_p1_money']; //NULL則填入0
		$a6_s_p1_current_money = ($row['a6_s_p1_current_money'] == '')?0:$row['a6_s_p1_current_money'];
		$a6_s_p1_capital_money = ($row['a6_s_p1_capital_money'] == '')?0:$row['a6_s_p1_capital_money'];

		$a6_city_p1_money = ($row['a6_city_p1_money'] == '')?0:$row['a6_city_p1_money']; //NULL則填入0
		$a6_city_p1_current_money = ($row['a6_city_p1_current_money'] == '')?0:$row['a6_city_p1_current_money'];
		$a6_city_p1_capital_money = ($row['a6_city_p1_capital_money'] == '')?0:$row['a6_city_p1_capital_money'];

		$a6_edu_p1_money = ($row['a6_edu_p1_money'] == '')?0:$row['a6_edu_p1_money']; //NULL則填入0
		$a6_edu_p1_current_money = ($row['a6_edu_p1_current_money'] == '')?0:$row['a6_edu_p1_current_money'];
		$a6_edu_p1_capital_money = ($row['a6_edu_p1_capital_money'] == '')?0:$row['a6_edu_p1_capital_money'];
	}

	//學校申請總合
	$total_money = $a1_money + $a2_money + $a3_money + $a4_money + $a5_money + $a6_money;
	$total_money_ny = $a2_money_ny1 + $a2_money_ny2 + $a4_money_ny1 + $a4_money_ny2;

	//縣市審核總和
	$city_total_money = $a1_city_p1_money + $a1_city_p2_money
				+ $a2_city_p1_money + $a2_city_p2_money
				+ $a3_city_p1_money
				+ $a4_city_p1_money + $a4_city_p2_money
				+ $a5_city_money
				+ $a6_city_p1_money;

	$city_total_money_ny = $a2_city_money_ny1 + $a2_city_money_ny2 + $a4_city_money_ny1 + $a4_city_money_ny2;

	//教育部審核總和
	$edu_total_money = $a1_edu_p1_money + $a1_edu_p2_money
				+ $a2_edu_p1_money + $a2_edu_p2_money
				+ $a3_edu_p1_money
				+ $a4_edu_p1_money + $a4_edu_p2_money
				+ $a5_edu_money
				+ $a6_edu_p1_money;

	$edu_total_money_ny = $a2_edu_money_ny1 + $a2_edu_money_ny2 + $a4_edu_money_ny1 + $a4_edu_money_ny2;
?>

<input type="button" value="關閉本頁" onClick="window.close()">
<?
	include "../../function/button_print.php";
	include "../../function/button_excel.php";
?>
<p>

<div id="print_content">

	<table align="center" style="font-family:標楷體; font-size:26px;">
		<tr>
			<td>
				<b><?=$school_year;?>年度教育部推動教育優先區計畫 補助項目經費需求審查現況</b>
			</td>
		</tr>
	</table>
	<p>

	<table width="900px" align="center" border="1" cellpadding="5" cellspacing="0">
		<tr height="60px" align="center" bgcolor="honeydew" style="font-family:標楷體; font-size:20px;">
			<td nowrap="nowrap" colspan="4">學校名稱</td>
			<td nowrap="nowrap" colspan="5"><?=$username.' '.$cityname.$district.$schoolname;?></td>
		</tr>
		<tr height="40px" align="center">
			<td nowrap="nowrap" colspan="4" bgcolor="whitesmoke">補助項目、金額</td>
			<td nowrap="nowrap" bgcolor="#DAEEFF">學校申請金額</td>
			<td nowrap="nowrap" bgcolor="#FFE1A4">縣市初審金額</td>
			<td nowrap="nowrap" bgcolor="#FFE1A4">縣市初審說明</td>
			<td nowrap="nowrap" bgcolor="#FFCCCC">教育部複審金額</td>
			<td nowrap="nowrap" bgcolor="#FFCCCC">教育部複審說明</td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" rowspan="2">一</td>
			<td rowspan="2">推展親職教育活動<br><?=($a1_money > 0)?"<a href='edu_funds.php?op=1' target='_blank'>(開啟審核經費表)</a>":"";?></td>
			<td nowrap="nowrap" colspan="2" align="center">親職教育活動</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a1_s_p1_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a1_city_p1_money);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a1_city_desc;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a1_edu_p1_money);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a1_edu_desc;?></td>
		</tr>
		<tr height="40px">
			<td colspan="2" align="center">目標學生家庭訪視輔導</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a1_s_p2_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a1_city_p2_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a1_edu_p2_money);?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" rowspan="4">二</td>
			<td rowspan="4">補助學校發展教育特色<br><?=($a2_money > 0)?"<a href='edu_funds.php?op=2' target='_blank'>(開啟審核經費表)</a>":"";?></td>
			<td rowspan="2">發展特色一：<?=$a2_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p1_current_money);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a2_city_desc;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p1_current_money);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a2_edu_desc;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p1_capital_money);?></td>
		</tr>
		<tr height="40px">
			<td rowspan="2">發展特色二：<?=$a2_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p2_current_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p2_current_money);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a2_city_desc_p2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p2_current_money);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a2_edu_desc_p2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p2_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p2_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p2_capital_money);?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" rowspan="2">三</td>
			<td rowspan="2">充實學校基本教學設備<br><?=($a3_money > 0)?"<a href='edu_funds.php?op=3' target='_blank'>(開啟審核經費表)</a>":"";?></td>
			<td nowrap="nowrap" colspan="2" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a3_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a3_city_p1_current_money);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a3_city_desc;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a3_edu_p1_current_money);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a3_edu_desc;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" colspan="2" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a3_s_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a3_city_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a3_edu_p1_capital_money);?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" rowspan="4">四</td>
			<td rowspan="4">發展原住民教育文化特色及充實設備器材<br><?=($a4_money > 0)?"<a href='edu_funds.php?op=4' target='_blank'>(開啟審核經費表)</a>":"";?></td>
			<td rowspan="2">發展特色一：<?=$a4_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p1_current_money);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a4_city_desc;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p1_current_money);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a4_edu_desc;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p1_capital_money);?></td>
		</tr>
		<tr height="40px">
			<td rowspan="2">發展特色二：<?=$a4_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p2_current_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p2_current_money);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a4_city_desc_p2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p2_current_money);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a4_edu_desc_p2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p2_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p2_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p2_capital_money);?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap"rowspan="3">五</td>
			<td rowspan="3">補助交通不便學校交通車<br><?=($a5_money > 0)?"<a href='edu_funds.php?op=5' target='_blank'>(開啟審核經費表)</a>":"";?></td>
			<td nowrap="nowrap" colspan="2" align="center">補助租車費</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=($a5_item == '租車費')?number_format($a5_s_money):"0";?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=($a5_item == '租車費')?number_format($a5_city_money):"0";?></td>
			<td rowspan="3" bgcolor="cornsilk"><?=$a5_city_desc;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=($a5_item == '租車費')?number_format($a5_edu_money):"0";?></td>
			<td rowspan="3" bgcolor="mistyrose"><?=$a5_edu_desc;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" colspan="2" align="center">補助交通費</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=($a5_item == '交通費')?number_format($a5_s_money):"0";?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=($a5_item == '交通費')?number_format($a5_city_money):"0";?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=($a5_item == '交通費')?number_format($a5_edu_money):"0";?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" colspan="2" align="center">購置交通車</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=($a5_item == '購置交通車')?number_format($a5_s_money):"0";?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=($a5_item == '購置交通車')?number_format($a5_city_money):"0";?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=($a5_item == '購置交通車')?number_format($a5_edu_money):"0";?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" rowspan="2">六</td>
			<td rowspan="2">整修學校社區化活動場所<br><?=($a6_money > 0)?"<a href='edu_funds.php?op=6' target='_blank'>(開啟審核經費表)</a>":"";?></td>
			<td rowspan="2" align="center">綜合球場</td>
			<td nowrap="nowrap" align="center">修建</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a6_s_p1_current_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a6_city_p1_current_money);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a6_city_desc;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a6_edu_p1_current_money);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a6_edu_desc;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">設備</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a6_s_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a6_city_p1_capital_money);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a6_edu_p1_capital_money);?></td>
		</tr>
		<tr height="50px">
			<td nowrap="nowrap" colspan="4" align="center" bgcolor="whitesmoke">總計</td>
			<td nowrap="nowrap" align="right" bgcolor="#DAEEFF"><b><?=number_format($total_money);?></b></td>
			<td nowrap="nowrap" align="right" bgcolor="#FFE1A4"><b><?=number_format($city_total_money);?></b></td>
			<td align="center" bgcolor="#FFE1A4">-</td>
			<td nowrap="nowrap" align="right" bgcolor="#FFCCCC"><b><?=number_format($edu_total_money);?></b></td>
			<td align="center" bgcolor="#FFCCCC">-</td>
		</tr>
	</table>

	<? if($total_money_ny <= 0) { echo "<!--"; } ?>

	<p style='page-break-after:always'></p>

	<table width="900px" align="center" border="1" cellpadding="5" cellspacing="0">
		<tr height="40px" align="center">
			<td nowrap="nowrap" colspan="3" bgcolor="whitesmoke">補助項目、金額</td>
			<td nowrap="nowrap" bgcolor="#DAEEFF">學校申請金額</td>
			<td nowrap="nowrap" bgcolor="#FFE1A4">縣市初審金額</td>
			<td nowrap="nowrap" bgcolor="#FFE1A4">縣市初審說明</td>
			<td nowrap="nowrap" bgcolor="#FFCCCC">教育部複審金額</td>
			<td nowrap="nowrap" bgcolor="#FFCCCC">教育部複審說明</td>
		</tr>
	<? if($total_money_ny <= 0) { echo "-->"; } ?>

	<? if($a2_money_ny1 <= 0) { echo "<!--"; } ?>
		<tr height="40px">
			<td rowspan="4"><?=($school_year+1);?>年度<br>補助學校發展教育特色</td>
			<td rowspan="2">發展特色一：<?=$a2_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p1_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p1_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a2_city_desc_ny1;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p1_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a2_edu_desc_ny1;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p1_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p1_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p1_capital_money_ny1);?></td>
		</tr>
		<tr height="40px">
			<td rowspan="2" >發展特色二：<?=$a2_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p2_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p2_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a2_city_desc_ny1_p2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p2_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a2_edu_desc_ny1_p2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p2_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p2_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p2_capital_money_ny1);?></td>
		</tr>
	<? if($a2_money_ny1 <= 0) { echo "-->"; } ?>

	<? if($a2_money_ny2 <= 0) { echo "<!--"; } ?>
		<tr height="40px">
			<td rowspan="4"><?=($school_year+2);?>年度<br>補助學校發展教育特色</td>
			<td rowspan="2">發展特色一：<?=$a2_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p1_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p1_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a2_city_desc_ny2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p1_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a2_edu_desc_ny2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p1_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p1_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p1_capital_money_ny2);?></td>
		</tr>
		<tr height="40px">
			<td rowspan="2" >發展特色二：<?=$a2_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p2_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p2_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a2_city_desc_ny2_p2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p2_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a2_edu_desc_ny2_p2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a2_s_p2_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a2_city_p2_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a2_edu_p2_capital_money_ny2);?></td>
		</tr>
	<? if($a2_money_ny2 <= 0) { echo "-->"; } ?>

	<? if($a4_money_ny1 <= 0) { echo "<!--"; } ?>
		<tr height="40px">
			<td rowspan="4"><?=($school_year+1);?>年度<br>發展原住民教育文化特色及充實設備器材</td>
			<td rowspan="2">發展特色一：<?=$a4_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p1_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p1_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a4_city_desc_ny1;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p1_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a4_edu_desc_ny1;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p1_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p1_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p1_capital_money_ny1);?></td>
		</tr>
		<tr height="40px">
			<td rowspan="2" >發展特色二：<?=$a4_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p2_current_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p2_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a4_city_desc_ny1_p2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p2_current_money_ny1);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a4_edu_desc_ny1_p2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p2_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p2_capital_money_ny1);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p2_capital_money_ny1);?></td>
		</tr>
	<? if($a4_money_ny1 <= 0) { echo "-->"; } ?>

	<? if($a4_money_ny2 <= 0) { echo "<!--"; } ?>
		<tr height="40px">
			<td rowspan="4"><?=($school_year+2);?>年度<br>發展原住民教育文化特色及充實設備器材</td>
			<td rowspan="2">發展特色一：<?=$a4_p1_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p1_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p1_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a4_city_desc_ny2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p1_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a4_edu_desc_ny2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p1_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p1_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p1_capital_money_ny2);?></td>
		</tr>
		<tr height="40px">
			<td rowspan="2" >發展特色二：<?=$a4_p2_name;?></td>
			<td nowrap="nowrap" align="center">經常門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p2_current_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p2_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="cornsilk"><?=$a4_city_desc_ny2_p2;?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p2_current_money_ny2);?></td>
			<td rowspan="2" bgcolor="mistyrose"><?=$a4_edu_desc_ny2_p2;?></td>
		</tr>
		<tr height="40px">
			<td nowrap="nowrap" align="center">資本門</td>
			<td nowrap="nowrap" align="right" bgcolor="aliceblue"><?=number_format($a4_s_p2_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="cornsilk"><?=number_format($a4_city_p2_capital_money_ny2);?></td>
			<td nowrap="nowrap" align="right" bgcolor="mistyrose"><?=number_format($a4_edu_p2_capital_money_ny2);?></td>
		</tr>
	<? if($a4_money_ny2 <= 0) { echo "-->"; } ?>

	<? if($total_money_ny <= 0) { echo "<!--"; } ?>
		<tr height="50px">
			<td nowrap="nowrap" colspan="3" align="center" bgcolor="whitesmoke">總計</td>
			<td nowrap="nowrap" align="right" bgcolor="#DAEEFF"><b><?=number_format($total_money);?></b></td>
			<td nowrap="nowrap" align="right" bgcolor="#FFE1A4"><b><?=number_format($city_total_money);?></b></td>
			<td align="center" bgcolor="#FFE1A4">-</td>
			<td nowrap="nowrap" align="right" bgcolor="#FFCCCC"><b><?=number_format($edu_total_money);?></b></td>
			<td align="center" bgcolor="#FFCCCC">-</td>
		</tr>
	</table>
	<? if($total_money_ny <= 0) { echo "-->"; } ?>

</div>