<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<hr>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='../city_index.php'">
退回【經費】修正資料之學校<br />
<table width="500" border="1">
	<tr>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>須修正項目</td>
		<td>個別通知</td>
	</tr>
<? 
	$school_year = 103; //為學年度
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.seq_no ".
		   "      , a1.city_approved as a1_city_approved, a1.city_approved_id as a1_city_approved_id ".
		   "      , a2.city_approved as a2_city_approved, a2.city_approved_id as a2_city_approved_id ".
		   "      , a3.city_approved as a3_city_approved, a3.city_approved_id as a3_city_approved_id ".
		   "      , a4.city_approved as a4_city_approved, a4.city_approved_id as a4_city_approved_id ".
		   "      , a5.city_approved as a5_city_approved, a5.city_approved_id as a5_city_approved_id ".
		   "      , a6.city_approved as a6_city_approved, a6.city_approved_id as a6_city_approved_id ".
		   "      , a7.city_approved as a7_city_approved, a7.city_approved_id as a7_city_approved_id ".
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.enabled = 'Y' ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.account asc ";
		   
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
				
		$main_seq = $row['seq_no']; //sy.seq_no
				
		$a1_city_approved = $row['a1_city_approved'];
		$a2_city_approved = $row['a2_city_approved'];
		$a3_city_approved = $row['a3_city_approved'];
		$a4_city_approved = $row['a4_city_approved'];
		$a5_city_approved = $row['a5_city_approved'];
		$a6_city_approved = $row['a6_city_approved'];
		$a7_city_approved = $row['a7_city_approved'];
		
		$a1_city_approved_id = $row['a1_city_approved_id'];
		$a2_city_approved_id = $row['a2_city_approved_id'];
		$a3_city_approved_id = $row['a3_city_approved_id'];
		$a4_city_approved_id = $row['a4_city_approved_id'];
		$a5_city_approved_id = $row['a5_city_approved_id'];
		$a6_city_approved_id = $row['a6_city_approved_id'];
		$a7_city_approved_id = $row['a7_city_approved_id'];
				
		//有補助被退件才顯示
		if($a1_city_approved == 'N' || $a2_city_approved == 'N' || $a3_city_approved == 'N' || $a4_city_approved == 'N' 
									|| $a5_city_approved == 'N' || $a6_city_approved == 'N' || $a7_city_approved == 'N' )
		{
			$str_link = "id=$account". //把連結要用的參數先串起來
						"&a1=$a1_city_approved".
						"&a2=$a2_city_approved".
						"&a3=$a3_city_approved".
						"&a4=$a4_city_approved".
						"&a5=$a5_city_approved".
						"&a6=$a6_city_approved".
						"&a7=$a7_city_approved";
			//測試其他寫法!!不用 echo html 的方式
			?>
				<tr>
					<td><?=$account;?></td>
					<td><?=$district.$schoolname;?></td>
					<td>
					<?
						echo ($a1_city_approved == 'N')?"＊補助項目一(審查委員：$a1_city_approved_id)<br />":"";
						echo ($a2_city_approved == 'N')?"＊補助項目二(審查委員：$a2_city_approved_id)<br />":"";
						echo ($a3_city_approved == 'N')?"＊補助項目三(審查委員：$a3_city_approved_id)<br />":"";
						echo ($a4_city_approved == 'N')?"＊補助項目四(審查委員：$a4_city_approved_id)<br />":"";
						echo ($a5_city_approved == 'N')?"＊補助項目五(審查委員：$a5_city_approved_id)<br />":"";
						echo ($a6_city_approved == 'N')?"＊補助項目六(審查委員：$a6_city_approved_id)<br />":"";
						echo ($a7_city_approved == 'N')?"＊補助項目七(審查委員：$a7_city_approved_id)<br />":"";
					?>
					</td>
					<td><a href="mail_school.php?<?=$str_link;?>" target="_self">開放重報及通知</a></td>
				</tr>
			<?
		}
		
	}
	
?>
</table>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 