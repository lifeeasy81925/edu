<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	$school_year = 103; //為學年度

	$serial = 0;
	$city_ary = array("基隆市", "新北市", "臺北市", "桃園縣", "新竹縣", "新竹市", "苗栗縣", "臺中市", "南投縣", "彰化縣", "雲林縣"
					, "嘉義縣", "嘉義市", "臺南市", "高雄市", "屏東縣", "臺東縣", "花蓮縣", "宜蘭縣", "澎湖縣", "金門縣", "連江縣");
					
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">
<? 
	include "../../function/button_print.php"; 
	include "../../function/button_excel.php"; 
?>
<p>
<div id="print_content">
【<?=($school_year);?>年度教育部推動教育優先區計畫複審結果縣市列表】
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td nowrap="nowrap" align="center">縣市名稱</td>
		<td nowrap="nowrap" align="center" bgcolor="#FFFFCC">經常門</td>
		<td nowrap="nowrap" align="center" bgcolor="#CCFFCC">資本門</td>
		<td nowrap="nowrap" align="center" bgcolor="#FFFFCC">合計</td>
	</tr>
  
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   
		   //補一複審資料
		   "      , a1.edu_p1_money as a1_edu_p1_money, a1.edu_p2_money as a1_edu_p2_money ".
		   
		   //補二複審資料
		   "      , a2.edu_p1_current_money as a2_edu_p1_current_money ".
		   "      , a2.edu_p1_capital_money as a2_edu_p1_capital_money ".
		   "      , a2.edu_p2_current_money as a2_edu_p2_current_money ".
		   "      , a2.edu_p2_capital_money as a2_edu_p2_capital_money ".
		   
		   //補三複審資料
		   "      , a3.edu_p1_current_money as a3_edu_p1_current_money ".
		   "      , a3.edu_p1_capital_money as a3_edu_p1_capital_money ".
		   "      , a3.edu_p2_current_money as a3_edu_p2_current_money ".
		   "      , a3.edu_p2_capital_money as a3_edu_p2_capital_money ".
		   
		   //補四複審資料
		   "      , a4.edu_p1_current_money as a4_edu_p1_current_money ".
		   "      , a4.edu_p1_capital_money as a4_edu_p1_capital_money ".
		   
		   //補五複審資料
		   "      , a5.edu_p1_current_money as a5_edu_p1_current_money ".
		   "      , a5.edu_p1_capital_money as a5_edu_p1_capital_money ".
		   "      , a5.edu_p2_current_money as a5_edu_p2_current_money ".
		   "      , a5.edu_p2_capital_money as a5_edu_p2_capital_money ".
		   
		   //補六複審資料
		   "      , a6.edu_total_money as a6_edu_money, a6.item as a6_item ".
		   
		   //補七複審資料
		   "      , a7.edu_p1_current_money as a7_edu_p1_current_money ".
		   "      , a7.edu_p1_capital_money as a7_edu_p1_capital_money ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year > $school_year)) ".
		   " order by sd.cityname, sd.account ";
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
						
		$a1_edu_p1_money = $row['a1_edu_p1_money'];
		$a1_edu_p2_money = $row['a1_edu_p2_money'];

		$a2_edu_p1_current_money = $row['a2_edu_p1_current_money'];
		$a2_edu_p1_capital_money = $row['a2_edu_p1_capital_money'];
		$a2_edu_p2_current_money = $row['a2_edu_p2_current_money'];
		$a2_edu_p2_capital_money = $row['a2_edu_p2_capital_money'];
				
		$a3_edu_p1_current_money = $row['a3_edu_p1_current_money'];
		$a3_edu_p1_capital_money = $row['a3_edu_p1_capital_money'];
		$a3_edu_p2_current_money = $row['a3_edu_p2_current_money'];
		$a3_edu_p2_capital_money = $row['a3_edu_p2_capital_money'];

		$a4_edu_p1_current_money = $row['a4_edu_p1_current_money'];
		$a4_edu_p1_capital_money = $row['a4_edu_p1_capital_money'];
		
		$a5_edu_p1_current_money = $row['a5_edu_p1_current_money'];
		$a5_edu_p1_capital_money = $row['a5_edu_p1_capital_money'];
		$a5_edu_p2_current_money = $row['a5_edu_p2_current_money'];
		$a5_edu_p2_capital_money = $row['a5_edu_p2_capital_money'];

		$a6_item = $row['a6_item'];		
		$a6_edu_money = $row['a6_edu_money'];
		$a6_edu_money_1 = ($a6_item == '租車費')?$a6_edu_money:0;
		$a6_edu_money_2 = ($a6_item == '交通費')?$a6_edu_money:0;
		$a6_edu_money_3 = ($a6_item == '購置交通車')?$a6_edu_money:0;
				
		$a7_edu_p1_current_money = $row['a7_edu_p1_current_money'];
		$a7_edu_p1_capital_money = $row['a7_edu_p1_capital_money'];
		
		for($i = 0;$i < count($city_ary);$i++)
		{
			if($cityname == $city_ary[$i])
			{
				//經常門
				//補一 親職教育活動	目標學生家庭訪視輔導	
				//補二 經常門
				//補三 經常門
				//補四 經常門
				//補五 經常門
				//補六 租車費 交通費
				//補七 -
				
				//資本門
				//補一 -
				//補二 資本門
				//補三 資本門
				//補四 資本門
				//補五 資本門
				//補六 購交通車費
				//補七 綜合球場	
				$current[$i] += $a1_edu_p1_money + $a1_edu_p2_money 
							  + $a2_edu_p1_current_money + $a2_edu_p2_current_money 
							  + $a3_edu_p1_current_money + $a3_edu_p2_current_money 
							  + $a4_edu_p1_current_money 
							  + $a5_edu_p1_current_money + $a5_edu_p2_current_money
							  + $a6_edu_money_1 + $a6_edu_money_2;
							  
				$capital[$i] += $a2_edu_p1_capital_money + $a2_edu_p2_capital_money 
							  + $a3_edu_p1_capital_money + $a3_edu_p2_capital_money 
							  + $a4_edu_p1_capital_money 
							  + $a5_edu_p1_capital_money + $a5_edu_p2_capital_money
							  + $a6_edu_money_3 
							  + $a7_edu_p1_current_money + $a7_edu_p1_capital_money;
							  
				$city_total[$i] = $current[$i] + $capital[$i];
				
			}
			
		}
	}
	
	for($i = 0;$i < count($city_ary);$i++)
	{
		echo "<tr>";
		echo "<td nowrap='nowrap' align='center'>$city_ary[$i]</td>";
		echo "<td nowrap='nowrap' align='right' width='120px' bgcolor='#FFFFCC'>".number_format($current[$i])."</td>";
		echo "<td nowrap='nowrap' align='right' width='120px' bgcolor='#CCFFCC'>".number_format($capital[$i])."</td>";
		echo "<td nowrap='nowrap' align='right' width='120px' bgcolor='#FFFFCC'>".number_format($city_total[$i])."</td>";
		echo "</tr>";
		
		//合計
		$current_total += $current[$i];
		$capital_total += $capital[$i];
		
	}
	
?>
	<tr>
		<td align="center">合計</td>
		<td align="right" ><?=number_format($current_total);?></td>
		<td align="right"><?=number_format($capital_total);?></td>
		<td align="right"><?=number_format($current_total + $capital_total);?></td>
	</tr>
</table>
</div>
<br />
※若要進行文書格式編修，建議複製到Excel編輯。<br />
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
