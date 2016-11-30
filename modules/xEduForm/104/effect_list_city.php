<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$serial = 0;
	$city_ary = array("基隆市", "新北市", "臺北市", "桃園市", "新竹市", "新竹縣", "苗栗縣", "臺中市", "南投縣", "彰化縣", "雲林縣"
					, "嘉義市", "嘉義縣", "臺南市", "高雄市", "屏東縣", "宜蘭縣", "花蓮縣", "臺東縣", "澎湖縣", "金門縣", "連江縣");
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

各縣市補助執行成效與填報率列表<p>

<p>
<hr>
<p>

<table border="1">
<tr height="30px" align="center">
<td nowrap="nowrap">縣市名稱</td>
<td nowrap="nowrap">縣市核定金額</td>
<td nowrap="nowrap">縣市執行金額</td>
<td nowrap="nowrap">縣市執行成效</td>
<td nowrap="nowrap">縣市核定校數</td>
<td nowrap="nowrap">縣市填報校數</td>
<td nowrap="nowrap">縣市填報率</td>
</tr>
<?
	//教育部核定金額
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname                                                                     ".
		   "      , sy.*                                                                                                                                   ".		   
		   "      , a1.edu_total_money as a1_edu_total_money                                                                                               ".// 核定金額
		   "      , a2.edu_total_money as a2_edu_total_money                                                                                               ".
		   "      , a3.edu_total_money as a3_edu_total_money                                                                                               ".
		   "      , a4.edu_total_money as a4_edu_total_money                                                                                               ".
		   "      , a5.edu_total_money as a5_edu_total_money                                                                                               ".
		   "      , a6.edu_total_money as a6_edu_total_money                                                                                               ".
		   "      , a7.edu_total_money as a7_edu_total_money                                                                                               ".		   
		   "      , a1_e.update_date as a1_e_update_date                                                                                                   ".//成果填報上傳時間
		   "      , a2_e.update_date as a2_e_update_date                                                                                                   ".
		   "      , a3_e.update_date as a3_e_update_date                                                                                                   ".
		   "      , a4_e.update_date as a4_e_update_date                                                                                                   ".
		   "      , a5_e.update_date as a5_e_update_date                                                                                                   ".
		   "      , a6_e.update_date as a6_e_update_date                                                                                                   ".
		   "      , a7_e.update_date as a7_e_update_date                                                                                                   ".		   
		   "      , a1_e.execute_money as a1_e_execute_money                                                                                               ".//執行金額
		   "      , a2_e.execute_money as a2_e_execute_money                                                                                               ".
		   "      , a3_e.execute_money as a3_e_execute_money                                                                                               ".
		   "      , a4_e.execute_money as a4_e_execute_money                                                                                               ".
		   "      , a5_e.execute_money as a5_e_execute_money                                                                                               ".
		   "      , a6_e.execute_money as a6_e_execute_money                                                                                               ".
		   "      , a7_e.execute_money as a7_e_execute_money                                                                                               ".		    
		   " from schooldata as sd left join schooldata_year                 as sy on sd.account = sy.account and sy.school_year = '$school_year'          ".
		   "                       left join alc_parenting_education         as a1 on sy.seq_no = a1.sy_seq                                                ".
		   "                       left join alc_education_features          as a2 on sy.seq_no = a2.sy_seq                                                ".
		   "                       left join alc_repair_dormitory            as a3 on sy.seq_no = a3.sy_seq                                                ".
		   "                       left join alc_teaching_equipment          as a4 on sy.seq_no = a4.sy_seq                                                ".
		   "                       left join alc_aboriginal_education        as a5 on sy.seq_no = a5.sy_seq                                                ".
		   "                       left join alc_transport_car               as a6 on sy.seq_no = a6.sy_seq                                                ".
		   "                       left join alc_school_activity             as a7 on sy.seq_no = a7.sy_seq                                                ".
		   "                       left join alc_parenting_education_effect  as a1_e on sy.seq_no = a1_e.sy_seq                                            ". //成果填報資料表
		   "                       left join alc_education_features_effect   as a2_e on sy.seq_no = a2_e.sy_seq                                            ".
		   "                       left join alc_repair_dormitory_effect     as a3_e on sy.seq_no = a3_e.sy_seq                                            ".
		   "                       left join alc_teaching_equipment_effect   as a4_e on sy.seq_no = a4_e.sy_seq                                            ".
		   "                       left join alc_aboriginal_education_effect as a5_e on sy.seq_no = a5_e.sy_seq                                            ".
		   "                       left join alc_transport_car_effect        as a6_e on sy.seq_no = a6_e.sy_seq                                            ".
		   "                       left join alc_school_activity_effect      as a7_e on sy.seq_no = a7_e.sy_seq                                            ".		   
		   "    where (sd.enabled = 'Y' and sd.create_year <= $school_year)                                                                                ".
		   "       or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)                                             ".
		   " order by sd.cityname, sd.account                                                                                                              ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$cityname = $row['cityname'];
		
		//最填寫日期
		$a1_e_update_date = $row['a1_e_update_date'];
		$a2_e_update_date = $row['a2_e_update_date'];
		$a3_e_update_date = $row['a3_e_update_date'];
		$a4_e_update_date = $row['a4_e_update_date'];
		$a5_e_update_date = $row['a5_e_update_date'];
		$a6_e_update_date = $row['a6_e_update_date'];
		$a7_e_update_date = $row['a7_e_update_date'];
				
		//核定金額
		$a1_edu_total_money = ($row['a1_edu_total_money'] == '')?0:$row['a1_edu_total_money']; //NULL則填入0
		$a2_edu_total_money = ($row['a2_edu_total_money'] == '')?0:$row['a2_edu_total_money'];
		$a3_edu_total_money = ($row['a3_edu_total_money'] == '')?0:$row['a3_edu_total_money'];
		$a4_edu_total_money = ($row['a4_edu_total_money'] == '')?0:$row['a4_edu_total_money'];
		$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money'];
		$a6_edu_total_money = ($row['a6_edu_total_money'] == '')?0:$row['a6_edu_total_money'];
		$a7_edu_total_money = ($row['a7_edu_total_money'] == '')?0:$row['a7_edu_total_money'];

		$sum_edu_total_money = $a1_edu_total_money + $a2_edu_total_money 
							 + $a3_edu_total_money + $a4_edu_total_money 
							 + $a5_edu_total_money + $a6_edu_total_money 
							 + $a7_edu_total_money;
		
		//執行金額
		$a1_execute_money = ($row['a1_e_execute_money'] == '')?0:$row['a1_e_execute_money']; //NULL則填入0
		$a2_execute_money = ($row['a2_e_execute_money'] == '')?0:$row['a2_e_execute_money'];
		$a3_execute_money = ($row['a3_e_execute_money'] == '')?0:$row['a3_e_execute_money'];
		$a4_execute_money = ($row['a4_e_execute_money'] == '')?0:$row['a4_e_execute_money'];
		$a5_execute_money = ($row['a5_e_execute_money'] == '')?0:$row['a5_e_execute_money'];
		$a6_execute_money = ($row['a6_e_execute_money'] == '')?0:$row['a6_e_execute_money'];
		$a7_execute_money = ($row['a7_e_execute_money'] == '')?0:$row['a7_e_execute_money'];
		$sum_execute_money = $a1_execute_money + $a2_execute_money 
						  + $a3_execute_money + $a4_execute_money 
						  + $a5_execute_money + $a6_execute_money 
						  + $a7_execute_money;

		// 找尋對應的縣市加總
		for($i = 0; $i < count($city_ary); $i++)
		{
			if($cityname == $city_ary[$i])
			{
				$city_sum_edu_total_money[$i] = $city_sum_edu_total_money[$i] + $sum_edu_total_money;
				$city_sum_execute_money[$i]   = $city_sum_execute_money[$i]   + $sum_execute_money;
				
				if($sum_edu_total_money > 0)		
				{
					$city_count[$i] = $city_count[$i] + 1;  // 獲補助學校數

					// 拿錢卻沒填
					
					if($show_allowance == "")
					{
						if(($a1_edu_total_money > 0 && $a1_e_update_date == "") || ($a2_edu_total_money > 0 && $a2_e_update_date == "")
						|| ($a3_edu_total_money > 0 && $a3_e_update_date == "") || ($a4_edu_total_money > 0 && $a4_e_update_date == "")
						|| ($a5_edu_total_money > 0 && $a5_e_update_date == "") || ($a6_edu_total_money > 0 && $a6_e_update_date == "")
						|| ($a7_edu_total_money > 0 && $a7_e_update_date == ""))
						{
							$city_not_filled[$i]++;
						}
					}
				}
			}
		}		
	}
	
	for($i = 0; $i < count($city_ary); $i++)
	{		
		echo "<tr height=30px>";
		echo "<td align=center>$city_ary[$i]</td>";
		echo "<td align=right>".number_format($city_sum_edu_total_money[$i])."</td>";
		echo "<td align=right>".number_format($city_sum_execute_money[$i])."</td>";
		echo "<td align=right>".number_format($city_sum_execute_money[$i] / $city_sum_edu_total_money[$i] * 100, 2).'%'."</td>";
		echo "<td align=right>".$city_count[$i]."</td>";
		echo "<td align=right>".($city_count[$i] - $city_not_filled[$i])."</td>";
		echo "<td align=right>".number_format(($city_count[$i] - $city_not_filled[$i]) / $city_count[$i] * 100, 2).'%'."</td>";	
		echo "</tr>";
	}
?>
</table>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>