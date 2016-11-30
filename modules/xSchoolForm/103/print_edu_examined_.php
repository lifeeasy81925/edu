<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$school_year = 103; //為學年度
	
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
		   "      , a2.s_total_money as a2_money ".
		   "      , a2.p1_name as a2_p1_name, a2.p2_name as a2_p2_name ".
		   "      , a2.s_p1_money as a2_s_p1_money, a2.s_p2_money as a2_s_p2_money ".
		   "      , a2.s_p1_current_money as a2_s_p1_current_money ".
		   "      , a2.s_p1_capital_money as a2_s_p1_capital_money ".
		   "      , a2.s_p2_current_money as a2_s_p2_current_money ".
		   "      , a2.s_p2_capital_money as a2_s_p2_capital_money ".
		   //補二縣市資料
		   "      , a2.city_p1_money as a2_city_p1_money, a2.city_p2_money as a2_city_p2_money ".
		   "      , a2.city_p1_current_money as a2_city_p1_current_money ".
		   "      , a2.city_p1_capital_money as a2_city_p1_capital_money ".
		   "      , a2.city_p2_current_money as a2_city_p2_current_money ".
		   "      , a2.city_p2_capital_money as a2_city_p2_capital_money ".
		   "      , a2.city_desc as a2_city_desc ".
		   //補二教育部資料
		   "      , a2.edu_p1_money as a2_edu_p1_money, a2.edu_p2_money as a2_edu_p2_money ".
		   "      , a2.edu_p1_current_money as a2_edu_p1_current_money ".
		   "      , a2.edu_p1_capital_money as a2_edu_p1_capital_money ".
		   "      , a2.edu_p2_current_money as a2_edu_p2_current_money ".
		   "      , a2.edu_p2_capital_money as a2_edu_p2_capital_money ".
		   "      , a2.edu_desc as a2_edu_desc ".
		   
		   //補三資料
		   "      , a3.s_total_money as a3_money ".
		   "      , a3.s_p1_money as a3_s_p1_money, a3.s_p2_money as a3_s_p2_money ".
		   "      , a3.s_p1_current_money as a3_s_p1_current_money ".
		   "      , a3.s_p1_capital_money as a3_s_p1_capital_money ".
		   "      , a3.s_p2_current_money as a3_s_p2_current_money ".
		   "      , a3.s_p2_capital_money as a3_s_p2_capital_money ".
		   //補三縣市資料
		   "      , a3.city_p1_money as a3_city_p1_money, a3.city_p2_money as a3_city_p2_money ".
		   "      , a3.city_p1_current_money as a3_city_p1_current_money ".
		   "      , a3.city_p1_capital_money as a3_city_p1_capital_money ".
		   "      , a3.city_p2_current_money as a3_city_p2_current_money ".
		   "      , a3.city_p2_capital_money as a3_city_p2_capital_money ".
		   "      , a3.city_desc as a3_city_desc ".
		   //補三教育部資料
		   "      , a3.edu_p1_money as a3_edu_p1_money, a3.edu_p2_money as a3_edu_p2_money ".
		   "      , a3.edu_p1_current_money as a3_edu_p1_current_money ".
		   "      , a3.edu_p1_capital_money as a3_edu_p1_capital_money ".
		   "      , a3.edu_p2_current_money as a3_edu_p2_current_money ".
		   "      , a3.edu_p2_capital_money as a3_edu_p2_capital_money ".
		   "      , a3.edu_desc as a3_edu_desc ".
		   
		   //補四資料
		   "      , a4.s_total_money as a4_money ".
		   "      , a4.s_p1_money as a4_s_p1_money ".
		   "      , a4.s_p1_current_money as a4_s_p1_current_money ".
		   "      , a4.s_p1_capital_money as a4_s_p1_capital_money ".
		   //補四縣市資料
		   "      , a4.city_p1_money as a4_city_p1_money ".
		   "      , a4.city_p1_current_money as a4_city_p1_current_money ".
		   "      , a4.city_p1_capital_money as a4_city_p1_capital_money ".
		   "      , a4.city_desc as a4_city_desc ".
		   //補四教育部資料
		   "      , a4.edu_p1_money as a4_edu_p1_money ".
		   "      , a4.edu_p1_current_money as a4_edu_p1_current_money ".
		   "      , a4.edu_p1_capital_money as a4_edu_p1_capital_money ".
		   "      , a4.edu_desc as a4_edu_desc ".
		   
		   //補五資料
		   "      , a5.s_total_money as a5_money ".
		   "      , a5.p1_name as a5_p1_name, a5.p2_name as a5_p2_name ".
		   "      , a5.s_p1_money as a5_s_p1_money, a5.s_p2_money as a5_s_p2_money ".
		   "      , a5.s_p1_current_money as a5_s_p1_current_money ".
		   "      , a5.s_p1_capital_money as a5_s_p1_capital_money ".
		   "      , a5.s_p2_current_money as a5_s_p2_current_money ".
		   "      , a5.s_p2_capital_money as a5_s_p2_capital_money ".
		   //補五縣市資料
		   "      , a5.city_p1_money as a5_city_p1_money, a5.city_p2_money as a5_city_p2_money ".
		   "      , a5.city_p1_current_money as a5_city_p1_current_money ".
		   "      , a5.city_p1_capital_money as a5_city_p1_capital_money ".
		   "      , a5.city_p2_current_money as a5_city_p2_current_money ".
		   "      , a5.city_p2_capital_money as a5_city_p2_capital_money ".
		   "      , a5.city_desc as a5_city_desc ".
		   //補五教育部資料
		   "      , a5.edu_p1_money as a5_edu_p1_money, a5.edu_p2_money as a5_edu_p2_money ".
		   "      , a5.edu_p1_current_money as a5_edu_p1_current_money ".
		   "      , a5.edu_p1_capital_money as a5_edu_p1_capital_money ".
		   "      , a5.edu_p2_current_money as a5_edu_p2_current_money ".
		   "      , a5.edu_p2_capital_money as a5_edu_p2_capital_money ".
		   "      , a5.edu_desc as a5_edu_desc ".
		   
		   //補六資料
		   "      , a6.s_total_money as a6_money ".
		   "      , a6.s_money as a6_s_money ".
		   //補六縣市資料
		   "      , a6.city_total_money as a6_city_money, a6.item as a6_item ".
		   "      , a6.city_desc as a6_city_desc ".
		   //補六教育部資料
		   "      , a6.edu_total_money as a6_edu_money, a6.item as a6_item ".
		   "      , a6.edu_desc as a6_edu_desc ".
		   
		   //補七資料
		   "      , a7.s_total_money as a7_money ".
		   "      , a7.s_p1_money as a7_s_p1_money ".
		   "      , a7.s_p1_current_money as a7_s_p1_current_money ".
		   "      , a7.s_p1_capital_money as a7_s_p1_capital_money ".
		   //補七縣市資料
		   "      , a7.city_p1_money as a7_city_p1_money ".
		   "      , a7.city_p1_current_money as a7_city_p1_current_money ".
		   "      , a7.city_p1_capital_money as a7_city_p1_capital_money ".
		   "      , a7.city_desc as a7_city_desc ".
		   //補七教育部資料
		   "      , a7.edu_p1_money as a7_edu_p1_money ".
		   "      , a7.edu_p1_current_money as a7_edu_p1_current_money ".
		   "      , a7.edu_p1_capital_money as a7_edu_p1_capital_money ".
		   "      , a7.edu_desc as a7_edu_desc ".
		   
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
		
		//總金額
		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];
		$a7_money = ($row['a7_money'] == '')?0:$row['a7_money'];
		
		//縣市審核意見
		$a1_city_desc = $row['a1_city_desc'];
		$a2_city_desc = $row['a2_city_desc'];
		$a3_city_desc = $row['a3_city_desc'];
		$a4_city_desc = $row['a4_city_desc'];
		$a5_city_desc = $row['a5_city_desc'];
		$a6_city_desc = $row['a6_city_desc'];
		$a7_city_desc = $row['a7_city_desc'];
		
		//教育部審核意見
		$a1_edu_desc = $row['a1_edu_desc'];
		$a2_edu_desc = $row['a2_edu_desc'];
		$a3_edu_desc = $row['a3_edu_desc'];
		$a4_edu_desc = $row['a4_edu_desc'];
		$a5_edu_desc = $row['a5_edu_desc'];
		$a6_edu_desc = $row['a6_edu_desc'];
		$a7_edu_desc = $row['a7_edu_desc'];
		
		$a1_s_p1_money = ($row['a1_s_p1_money'] == '')?0:$row['a1_s_p1_money'];
		$a1_s_p2_money = ($row['a1_s_p2_money'] == '')?0:$row['a1_s_p2_money'];
		
		$a1_city_p1_money = ($row['a1_city_p1_money'] == '')?0:$row['a1_city_p1_money'];
		$a1_city_p2_money = ($row['a1_city_p2_money'] == '')?0:$row['a1_city_p2_money'];
		
		$a1_edu_p1_money = ($row['a1_edu_p1_money'] == '')?0:$row['a1_edu_p1_money'];
		$a1_edu_p2_money = ($row['a1_edu_p2_money'] == '')?0:$row['a1_edu_p2_money'];
				
		$a2_p1_name = $row['a2_p1_name'];
		$a2_p2_name = $row['a2_p2_name'];
		$a2_s_p1_money = ($row['a2_s_p1_money'] == '')?0:$row['a2_s_p1_money']; //NULL則填入0
		$a2_s_p1_current_money = ($row['a2_s_p1_current_money'] == '')?0:$row['a2_s_p1_current_money'];
		$a2_s_p1_capital_money = ($row['a2_s_p1_capital_money'] == '')?0:$row['a2_s_p1_capital_money'];
		$a2_s_p2_money = ($row['a2_s_p2_money'] == '')?0:$row['a2_s_p2_money'];
		$a2_s_p2_current_money = ($row['a2_s_p2_current_money'] == '')?0:$row['a2_s_p2_current_money'];
		$a2_s_p2_capital_money = ($row['a2_s_p2_capital_money'] == '')?0:$row['a2_s_p2_capital_money'];
		
		$a2_city_p1_money = ($row['a2_city_p1_money'] == '')?0:$row['a2_city_p1_money']; //NULL則填入0
		$a2_city_p1_current_money = ($row['a2_city_p1_current_money'] == '')?0:$row['a2_city_p1_current_money'];
		$a2_city_p1_capital_money = ($row['a2_city_p1_capital_money'] == '')?0:$row['a2_city_p1_capital_money'];
		$a2_city_p2_money = ($row['a2_city_p2_money'] == '')?0:$row['a2_city_p2_money'];
		$a2_city_p2_current_money = ($row['a2_city_p2_current_money'] == '')?0:$row['a2_city_p2_current_money'];
		$a2_city_p2_capital_money = ($row['a2_city_p2_capital_money'] == '')?0:$row['a2_city_p2_capital_money'];
		
		$a2_edu_p1_money = ($row['a2_edu_p1_money'] == '')?0:$row['a2_edu_p1_money']; //NULL則填入0
		$a2_edu_p1_current_money = ($row['a2_edu_p1_current_money'] == '')?0:$row['a2_edu_p1_current_money'];
		$a2_edu_p1_capital_money = ($row['a2_edu_p1_capital_money'] == '')?0:$row['a2_edu_p1_capital_money'];
		$a2_edu_p2_money = ($row['a2_edu_p2_money'] == '')?0:$row['a2_edu_p2_money'];
		$a2_edu_p2_current_money = ($row['a2_edu_p2_current_money'] == '')?0:$row['a2_edu_p2_current_money'];
		$a2_edu_p2_capital_money = ($row['a2_edu_p2_capital_money'] == '')?0:$row['a2_edu_p2_capital_money'];
		
		$a3_s_p1_money = ($row['a3_s_p1_money'] == '')?0:$row['a3_s_p1_money']; //NULL則填入0
		$a3_s_p1_current_money = ($row['a3_s_p1_current_money'] == '')?0:$row['a3_s_p1_current_money'];
		$a3_s_p1_capital_money = ($row['a3_s_p1_capital_money'] == '')?0:$row['a3_s_p1_capital_money'];
		$a3_s_p2_money = ($row['a3_s_p2_money'] == '')?0:$row['a3_s_p2_money'];
		$a3_s_p2_current_money = ($row['a3_s_p2_current_money'] == '')?0:$row['a3_s_p2_current_money'];
		$a3_s_p2_capital_money = ($row['a3_s_p2_capital_money'] == '')?0:$row['a3_s_p2_capital_money'];
		
		$a3_city_p1_money = ($row['a3_city_p1_money'] == '')?0:$row['a3_city_p1_money']; //NULL則填入0
		$a3_city_p1_current_money = ($row['a3_city_p1_current_money'] == '')?0:$row['a3_city_p1_current_money'];
		$a3_city_p1_capital_money = ($row['a3_city_p1_capital_money'] == '')?0:$row['a3_city_p1_capital_money'];
		$a3_city_p2_money = ($row['a3_city_p2_money'] == '')?0:$row['a3_city_p2_money'];
		$a3_city_p2_current_money = ($row['a3_city_p2_current_money'] == '')?0:$row['a3_city_p2_current_money'];
		$a3_city_p2_capital_money = ($row['a3_city_p2_capital_money'] == '')?0:$row['a3_city_p2_capital_money'];

		$a3_edu_p1_money = ($row['a3_edu_p1_money'] == '')?0:$row['a3_edu_p1_money']; //NULL則填入0
		$a3_edu_p1_current_money = ($row['a3_edu_p1_current_money'] == '')?0:$row['a3_edu_p1_current_money'];
		$a3_edu_p1_capital_money = ($row['a3_edu_p1_capital_money'] == '')?0:$row['a3_edu_p1_capital_money'];
		$a3_edu_p2_money = ($row['a3_edu_p2_money'] == '')?0:$row['a3_edu_p2_money'];
		$a3_edu_p2_current_money = ($row['a3_edu_p2_current_money'] == '')?0:$row['a3_edu_p2_current_money'];
		$a3_edu_p2_capital_money = ($row['a3_edu_p2_capital_money'] == '')?0:$row['a3_edu_p2_capital_money'];

		$a4_s_p1_money = ($row['a4_s_p1_money'] == '')?0:$row['a4_s_p1_money']; //NULL則填入0
		$a4_s_p1_current_money = ($row['a4_s_p1_current_money'] == '')?0:$row['a4_s_p1_current_money'];
		$a4_s_p1_capital_money = ($row['a4_s_p1_capital_money'] == '')?0:$row['a4_s_p1_capital_money'];

		$a4_city_p1_money = ($row['a4_city_p1_money'] == '')?0:$row['a4_city_p1_money']; //NULL則填入0
		$a4_city_p1_current_money = ($row['a4_city_p1_current_money'] == '')?0:$row['a4_city_p1_current_money'];
		$a4_city_p1_capital_money = ($row['a4_city_p1_capital_money'] == '')?0:$row['a4_city_p1_capital_money'];
		
		$a4_edu_p1_money = ($row['a4_edu_p1_money'] == '')?0:$row['a4_edu_p1_money']; //NULL則填入0
		$a4_edu_p1_current_money = ($row['a4_edu_p1_current_money'] == '')?0:$row['a4_edu_p1_current_money'];
		$a4_edu_p1_capital_money = ($row['a4_edu_p1_capital_money'] == '')?0:$row['a4_edu_p1_capital_money'];
		
		
		$a5_p1_name = $row['a5_p1_name'];
		$a5_p2_name = $row['a5_p2_name'];
		$a5_s_p1_money = ($row['a5_s_p1_money'] == '')?0:$row['a5_s_p1_money']; //NULL則填入0
		$a5_s_p1_current_money = ($row['a5_s_p1_current_money'] == '')?0:$row['a5_s_p1_current_money'];
		$a5_s_p1_capital_money = ($row['a5_s_p1_capital_money'] == '')?0:$row['a5_s_p1_capital_money'];
		$a5_s_p2_money = ($row['a5_s_p2_money'] == '')?0:$row['a5_s_p2_money'];
		$a5_s_p2_current_money = ($row['a5_s_p2_current_money'] == '')?0:$row['a5_s_p2_current_money'];
		$a5_s_p2_capital_money = ($row['a5_s_p2_capital_money'] == '')?0:$row['a5_s_p2_capital_money'];
		
		$a5_city_p1_money = ($row['a5_city_p1_money'] == '')?0:$row['a5_city_p1_money']; //NULL則填入0
		$a5_city_p1_current_money = ($row['a5_city_p1_current_money'] == '')?0:$row['a5_city_p1_current_money'];
		$a5_city_p1_capital_money = ($row['a5_city_p1_capital_money'] == '')?0:$row['a5_city_p1_capital_money'];
		$a5_city_p2_money = ($row['a5_city_p2_money'] == '')?0:$row['a5_city_p2_money'];
		$a5_city_p2_current_money = ($row['a5_city_p2_current_money'] == '')?0:$row['a5_city_p2_current_money'];
		$a5_city_p2_capital_money = ($row['a5_city_p2_capital_money'] == '')?0:$row['a5_city_p2_capital_money'];

		$a5_edu_p1_money = ($row['a5_edu_p1_money'] == '')?0:$row['a5_edu_p1_money']; //NULL則填入0
		$a5_edu_p1_current_money = ($row['a5_edu_p1_current_money'] == '')?0:$row['a5_edu_p1_current_money'];
		$a5_edu_p1_capital_money = ($row['a5_edu_p1_capital_money'] == '')?0:$row['a5_edu_p1_capital_money'];
		$a5_edu_p2_money = ($row['a5_edu_p2_money'] == '')?0:$row['a5_edu_p2_money'];
		$a5_edu_p2_current_money = ($row['a5_edu_p2_current_money'] == '')?0:$row['a5_edu_p2_current_money'];
		$a5_edu_p2_capital_money = ($row['a5_edu_p2_capital_money'] == '')?0:$row['a5_edu_p2_capital_money'];

		$a6_item = $row['a6_item'];
		$a6_s_money = ($row['a6_s_money'] == '')?0:$row['a6_s_money'];
		
		$a6_city_money = ($row['a6_city_money'] == '')?0:$row['a6_city_money'];
		
		$a6_edu_money = ($row['a6_edu_money'] == '')?0:$row['a6_edu_money'];
		
		$a7_s_p1_money = ($row['a7_s_p1_money'] == '')?0:$row['a7_s_p1_money']; //NULL則填入0
		$a7_s_p1_current_money = ($row['a7_s_p1_current_money'] == '')?0:$row['a7_s_p1_current_money'];
		$a7_s_p1_capital_money = ($row['a7_s_p1_capital_money'] == '')?0:$row['a7_s_p1_capital_money'];
		
		$a7_city_p1_money = ($row['a7_city_p1_money'] == '')?0:$row['a7_city_p1_money']; //NULL則填入0
		$a7_city_p1_current_money = ($row['a7_city_p1_current_money'] == '')?0:$row['a7_city_p1_current_money'];
		$a7_city_p1_capital_money = ($row['a7_city_p1_capital_money'] == '')?0:$row['a7_city_p1_capital_money'];
		
		$a7_edu_p1_money = ($row['a7_edu_p1_money'] == '')?0:$row['a7_edu_p1_money']; //NULL則填入0
		$a7_edu_p1_current_money = ($row['a7_edu_p1_current_money'] == '')?0:$row['a7_edu_p1_current_money'];
		$a7_edu_p1_capital_money = ($row['a7_edu_p1_capital_money'] == '')?0:$row['a7_edu_p1_capital_money'];
		
	}
	
	//學校申請總合
	$school_total = $a1_s_p1_money + $a1_s_p2_money
				  + $a2_s_p1_money + $a2_s_p2_money
				  + $a3_s_p1_money + $a3_s_p2_money
				  + $a4_s_p1_money
				  + $a5_s_p1_money + $a5_s_p2_money
				  + $a6_s_money
				  + $a7_s_p1_money;
	
	//縣市審核總和
	$city_total = $a1_city_p1_money + $a1_city_p2_money
				+ $a2_city_p1_money + $a2_city_p2_money
				+ $a3_city_p1_money + $a3_city_p2_money
				+ $a4_city_p1_money
				+ $a5_city_p1_money + $a5_city_p2_money
				+ $a6_city_money
				+ $a7_city_p1_money;
	
	//教育部審核總和
	$edu_total = $a1_edu_p1_money + $a1_edu_p2_money
				+ $a2_edu_p1_money + $a2_edu_p2_money
				+ $a3_edu_p1_money + $a3_edu_p2_money
				+ $a4_edu_p1_money
				+ $a5_edu_p1_money + $a5_edu_p2_money
				+ $a6_edu_money
				+ $a7_edu_p1_money;
				
?>
<style type="text/css">
.style1 {
	font-family: "標楷體";
	font-size: 30px;
}
.style3 {font-family: "標楷體"}
.style4 {
	font-size: 22px;
	font-family: "標楷體";
}
.style7 {font-size: 36}
.style8 {font-family: "標楷體"; font-size: 36; }
</style>

<? 
	include "../../function/button_print.php"; 
	include "../../function/button_excel.php"; 
?>
<br />
<div id="print_content">
<div style="font-family:標楷體;font-size:20px;text-align:center"><strong>教育部<?=$school_year;?>年度教育優先區計畫補助項目經費需求審查現況<br /></strong></div>
<!--<div style="font-family:標楷體;font-size:20px;text-align:center"><p><font color="red"><b>目前仍在審核階段，待教育部審核完成後才公佈結果</b></font></div>-->

<table width="900px" align="center" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td height="50" colspan="4" class="style3">學校名稱</td>
		<td colspan="5" class="style3"><div align="center"><?=$username.'　'.$cityname.$district.$schoolname;?></div></td>
	</tr>
	<tr>
		<td height="35" colspan="4" class="style3">補助項目、金額<br />(各項目名稱下方開啟審核經費表)</td>
		<td bgcolor="#FFFFCC" class="style3"><div align="center" class="style3">學校申請金額</div></td>
		<td bgcolor="#CCFFCC" class="style3"><div align="center">縣市初審金額</div></td>
		<td bgcolor="#CCFFCC" class="style3"><div align="center">縣市初審說明</div></td>
		<td bgcolor="#FFCC99" class="style3"><div align="center">教育部複審金額</div></td>
		<td bgcolor="#FFCC99" class="style3"><div align="center">教育部複審說明</div></td>
	</tr>
	<tr>
		<td height="30" rowspan="2" class="style3"><div align="center">1.</div></td>
		<td height="30" rowspan="2" class="style3">推展親職教育活動<br /><?=($a1_money > 0)?"<a href='edu_funds.php?op=1' target='_blank'>(開啟審核經費表)</a>":"";?></td>
		<td height="30" colspan="2" class="style3">親職教育活動</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a1_s_p1_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a1_city_p1_money);?></div></td>
		<td height="30" rowspan="2" bgcolor="#CCFFCC" class="style3"><?=$a1_city_desc;?></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a1_edu_p1_money);?></div></td>
		<td height="30" rowspan="2" bgcolor="#FFCC99" class="style3"><?=$a1_edu_desc;?></td>
	</tr>
	<tr>
		<td height="30" colspan="2" class="style3">目標學生家庭訪視輔導</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a1_s_p2_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a1_city_p2_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a1_edu_p2_money);?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="4" class="style3"><div align="center">2.</div></td>
		<td height="30" rowspan="4" class="style3">補助學校發展教育特色<br /><?=($a2_money > 0)?"<a href='edu_funds.php?op=2' target='_blank'>(開啟審核經費表)</a>":"";?></td>
		<td height="30" rowspan="2" class="style3">發展特色一：<br /><?=$a2_p1_name;?></td>
		<td height="30" nowrap="nowrap" class="style3">經常門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a2_s_p1_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a2_city_p1_current_money);?></div></td>
		<td height="30" rowspan="4" bgcolor="#CCFFCC" class="style3"><?=$a2_city_desc;?></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a2_city_edu_current_money);?></div></td>
		<td height="30" rowspan="4" bgcolor="#FFCC99" class="style3"><?=$a2_edu_desc;?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap" class="style3">資本門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a2_s_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a2_city_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a2_edu_p1_capital_money);?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="2" class="style3">發展特色二：<br /><?=$a2_p2_name;?></td>
		<td height="30" nowrap="nowrap" class="style3">經常門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a2_s_p2_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a2_city_p2_current_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a2_edu_p2_current_money);?></div></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap" class="style3">資本門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a2_s_p2_capital_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a2_city_p2_capital_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a2_edu_p2_capital_money);?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="4" class="style3"><div align="center">3.</div></td>
		<td height="30" rowspan="4" class="style3">修繕離島或偏遠地區師生宿舍<br /><?=($a3_money > 0)?"<a href='edu_funds.php?op=3' target='_blank'>(開啟審核經費表)</a>":"";?></td>
		<td height="30" rowspan="2" class="style3">教師宿舍</td>
		<td height="30" nowrap="nowrap" class="style3">經常門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a3_s_p1_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a3_city_p1_current_money);?></div></td>
		<td height="30" rowspan="4" bgcolor="#CCFFCC" class="style3"><?=$a3_city_desc;?></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a3_edu_p1_current_money);?></div></td>
		<td height="30" rowspan="4" bgcolor="#FFCC99" class="style3"><?=$a3_edu_desc;?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap" class="style3">資本門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a3_s_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a3_city_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a3_edu_p1_capital_money);?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="2" class="style3">學生宿舍</td>
		<td height="30" nowrap="nowrap" class="style3">經常門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a3_s_p2_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a3_city_p2_current_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a3_edu_p2_current_money);?></div></td>
	</tr>

	<tr>
		<td height="30" nowrap="nowrap" class="style3">資本門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a3_s_p2_capital_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a3_city_p2_capital_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a3_edu_p2_capital_money);?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="2" class="style3"><div align="center">4.</div></td>
		<td height="30" rowspan="2" class="style3">充實學校基本教學設備<br /><?=($a4_money > 0)?"<a href='edu_funds.php?op=4' target='_blank'>(開啟審核經費表)</a>":"";?></td>
		<td height="30" colspan="2" class="style3">經常門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a4_s_p1_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a4_city_p1_current_money);?></div></td>
		<td height="30" rowspan="2" bgcolor="#CCFFCC" class="style3"><?=$a4_city_desc;?></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a4_edu_p1_current_money);?></div></td>
		<td height="30" rowspan="2" bgcolor="#FFCC99" class="style3"><?=$a4_edu_desc;?></td>
	</tr>
	<tr>
		<td height="30" colspan="2" class="style3">資本門</td>
		<td height="30" align="right" bgcolor="#FFFFCC" class="style3"><?=number_format($a4_s_p1_capital_money);?></td>
		<td height="30" align="right" bgcolor="#CCFFCC" class="style3"><?=number_format($a4_city_p1_capital_money);?></td>
		<td height="30" align="right" bgcolor="#FFCC99" class="style3"><?=number_format($a4_edu_p1_capital_money);?></td>
	</tr>
	<tr>
		<td height="30" rowspan="4" class="style3"><div align="center">5.</div></td>
		<td height="30" rowspan="4" class="style3">發展原住民教育文化特色及充實設備器材<br /><?=($a5_money > 0)?"<a href='edu_funds.php?op=5' target='_blank'>(開啟審核經費表)</a>":"";?></td>
		<td height="30" rowspan="2" class="style3">發展特色一：<br /><?=$a5_p1_name;?></td>
		<td height="30" nowrap="nowrap" class="style3">經常門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a5_s_p1_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a5_city_p1_current_money);?></div></td>
		<td height="30" rowspan="4" bgcolor="#CCFFCC" class="style3"><?=$a5_city_desc;?></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a5_edu_p1_current_money);?></div></td>
		<td height="30" rowspan="4" bgcolor="#FFCC99" class="style3"><?=$a5_edu_desc;?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap" class="style3">資本門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a5_s_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a5_city_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a5_edu_p1_capital_money);?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="2" class="style3">發展特色二：<br /><?=$a5_p2_name;?></td>
		<td height="30" nowrap="nowrap" class="style3">經常門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a5_s_p2_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a5_city_p2_current_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a5_edu_p2_current_money);?></div></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap" class="style3">資本門</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a5_s_p2_capital_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a5_city_p2_capital_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a5_edu_p2_capital_money);?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="3" class="style3"><div align="center">6.</div></td>
		<td height="30" rowspan="3" class="style3">補助交通不便學校交通車<br /><?=($a6_money > 0)?"<a href='edu_funds.php?op=6' target='_blank'>(開啟審核經費表)</a>":"";?></td>
		<td height="30" colspan="2" class="style3">補助租車費</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=($a6_item == '租車費')?number_format($a6_s_money):"0";?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=($a6_item == '租車費')?number_format($a6_city_money):"0";?></div></td>
		<td height="30" rowspan="3" bgcolor="#CCFFCC" class="style3"><?=$a6_city_desc;?></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=($a6_item == '租車費')?number_format($a6_edu_money):"0";?></div></td>
		<td height="30" rowspan="3" bgcolor="#FFCC99" class="style3"><?=$a6_edu_desc;?></td>
	</tr>
	<tr>
		<td height="30" colspan="2" class="style3">補助交通費</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=($a6_item == '交通費')?number_format($a6_s_money):"0";?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=($a6_item == '交通費')?number_format($a6_city_money):"0";?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=($a6_item == '交通費')?number_format($a6_edu_money):"0";?></div></td>
	</tr>
	<tr>
		<td height="30" colspan="2" class="style3">購置交通車</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=($a6_item == '購置交通車')?number_format($a6_s_money):"0";?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=($a6_item == '購置交通車')?number_format($a6_city_money):"0";?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=($a6_item == '購置交通車')?number_format($a6_edu_money):"0";?></div></td>
	</tr>
	<tr>
		<td height="30" rowspan="2" class="style3"><div align="center">7.</div></td>
		<td height="30" rowspan="2" class="style3">整修學校社區化活動場所<br /><?=($a7_money > 0)?"<a href='edu_funds.php?op=7' target='_blank'>(開啟審核經費表)</a>":"";?></td>
		<td height="30" rowspan="2" class="style3">綜合球場</td>
		<td height="30" nowrap="nowrap" class="style3">修建</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a7_s_p1_current_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a7_city_p1_current_money);?></div></td>
		<td height="30" rowspan="2" bgcolor="#CCFFCC" class="style3"><?=$a7_city_desc;?></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a7_edu_p1_current_money);?></div></td>
		<td height="30" rowspan="2" bgcolor="#FFCC99" class="style3"><?=$a7_edu_desc;?></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap" class="style3">設備</td>
		<td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($a7_s_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($a7_city_p1_capital_money);?></div></td>
		<td height="30" bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($a7_edu_p1_capital_money);?></div></td>
	</tr>
	<tr>
		<td height="43" colspan="4" class="style3"><div align="center">總計</div></td>
		<td bgcolor="#FFFFCC" class="style3"><div align="right"><?=number_format($school_total);?></div></td>
		<td bgcolor="#CCFFCC" class="style3"><div align="right"><?=number_format($city_total);?></div></td>
		<td bgcolor="#CCFFCC" class="style3">&nbsp;</td>
		<td bgcolor="#FFCC99" class="style3"><div align="right"><?=number_format($edu_total);?></div></td>
		<td bgcolor="#FFCC99" class="style3">&nbsp;</td>
	</tr>
</table>

</div>

