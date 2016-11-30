<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$get_id = $_GET['acc'];
	
	if($get_id != "")
		$username = $get_id;
	
	//教育部核定金額
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一教育部資料
		   "      , a1.edu_total_money as a1_edu_total_money ".
		   "      , a1_e.execute_money as a1_execute_money ".
		   
		   //補二教育部資料
		   "      , a2.edu_total_money as a2_edu_total_money ".
		   "      , a2_e.execute_money as a2_execute_money ".
		   
		   //補三教育部資料
		   "      , a3.edu_total_money as a3_edu_total_money ".
		   "      , a3_e.execute_money as a3_execute_money ".
		   
		   //補四教育部資料
		   "      , a4.edu_total_money as a4_edu_total_money ".
		   "      , a4_e.execute_money as a4_execute_money ".
		   
		   //補五教育部資料
		   "      , a5.edu_total_money as a5_edu_total_money ".
		   "      , a5_e.execute_money as a5_execute_money ".
		   
		   //補六教育部資料
		   "      , a6.edu_total_money as a6_edu_total_money ".
		   "      , a6_e.execute_money as a6_execute_money ".
		   
		   //補七教育部資料
		   "      , a7.edu_total_money as a7_edu_total_money ".
		   "      , a7_e.execute_money as a7_execute_money ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   
		   "                       left join alc_parenting_education_effect as a1_e on sy.seq_no = a1_e.sy_seq ".
		   "                       left join alc_education_features_effect as a2_e on sy.seq_no = a2_e.sy_seq ".
		   "                       left join alc_repair_dormitory_effect as a3_e on sy.seq_no = a3_e.sy_seq ".
		   "                       left join alc_teaching_equipment_effect as a4_e on sy.seq_no = a4_e.sy_seq ".
		   "                       left join alc_aboriginal_education_effect as a5_e on sy.seq_no = a5_e.sy_seq ".
		   "                       left join alc_transport_car_effect as a6_e on sy.seq_no = a6_e.sy_seq ".
		   "                       left join alc_school_activity_effect as a7_e on sy.seq_no = a7_e.sy_seq ".
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
		
		$main_seq = $row['seq_no']; //school_year的seq_no
		
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
		
		$a1_execute_money = ($row['a1_execute_money'] == '')?0:$row['a1_execute_money']; //NULL則填入0
		$a2_execute_money = ($row['a2_execute_money'] == '')?0:$row['a2_execute_money'];
		$a3_execute_money = ($row['a3_execute_money'] == '')?0:$row['a3_execute_money'];
		$a4_execute_money = ($row['a4_execute_money'] == '')?0:$row['a4_execute_money'];
		$a5_execute_money = ($row['a5_execute_money'] == '')?0:$row['a5_execute_money'];
		$a6_execute_money = ($row['a6_execute_money'] == '')?0:$row['a6_execute_money'];
		$a7_execute_money = ($row['a7_execute_money'] == '')?0:$row['a7_execute_money'];
		$sum_execute_money = $a1_execute_money + $a2_execute_money 
						   + $a3_execute_money + $a4_execute_money 
						   + $a5_execute_money + $a6_execute_money 
						   + $a7_execute_money;
		
		$a1_percnet = number_format($a1_execute_money / $a1_edu_total_money * 100,2);
		$a2_percnet = number_format($a2_execute_money / $a2_edu_total_money * 100,2);
		$a3_percnet = number_format($a3_execute_money / $a3_edu_total_money * 100,2);
		$a4_percnet = number_format($a4_execute_money / $a4_edu_total_money * 100,2);
		$a5_percnet = number_format($a5_execute_money / $a5_edu_total_money * 100,2);
		$a6_percnet = number_format($a6_execute_money / $a6_edu_total_money * 100,2);
		$a7_percnet = number_format($a7_execute_money / $a7_edu_total_money * 100,2);
		$sum_percnet = number_format($sum_execute_money / $sum_edu_total_money * 100,2);
	}
			
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../school_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b><?=$school_year;?>年度 執行成效與修正後計畫</b>

<p>
<hr>
<p>

<p><font color="blue"><strong>教育部推動教育優先區計畫<?=$school_year;?>年度 貴校審核通過補助項目執行及成果列表</strong></font>
<? if($sum_edu_total_money < 1) {echo "<!--";} ?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td width="170" height="50" align="center" bgcolor="#99CCCC">補助項目</td>
		<td height="40" align="center" bgcolor="#99CCCC">核定金額</td>
		<td height="40" align="center" bgcolor="#99CCCC"><p>執行金額</p></td>
		<td height="40" align="center" bgcolor="#99CCCC">剩餘金額</td>
		<td height="40" align="center" bgcolor="#99CCCC">執行進度</td>
		<td align="center" bgcolor="#99CCCC">執行情形<br><font color=red>（必填）</font></td>
		<td height="40" align="center" bgcolor="#99CCCC">修正後計畫<br>與執行成果<br><font color=red>（必填）</font></td>
	</tr>
<? if($sum_edu_total_money < 1) {echo "-->";} ?>
	<? if($a1_edu_total_money < 1) {echo "<!--";}?>
	<tr>
		<td width="170" height="50">1.推展親職教育活動</td>
		<td align="right"><?=number_format($a1_edu_total_money); ?></td>
		<td align="right"><?=number_format($a1_execute_money); ?></td>
		<td align="right"><?=number_format($a1_edu_total_money - $a1_execute_money); ?></td>
		<td align="center"><?=$a1_percnet."%"; ?></td>
		<td align="center">
			<form action='effect_school_01.php' method='post' style='margin:0px; display:inline;'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button' id='button' value='填寫資料'>
			</form>
		</td>
		<td align="center"><INPUT TYPE="button" VALUE="上傳檔案" onClick="location='effect_school_up_01.php'"></td>
	</tr>
	<? if($a1_edu_total_money < 1) {echo "-->";}?>
	<? if($a2_edu_total_money < 1) {echo "<!--";}?>
	<tr>
		<td width="170" height="50">2.學校發展教育特色</td>
		<td align="right"><?=number_format($a2_edu_total_money); ?></td>
		<td align="right"><?=number_format($a2_execute_money); ?></td>
		<td align="right"><?=number_format($a2_edu_total_money - $a2_execute_money); ?></td>
		<td align="center"><?=$a2_percnet."%"; ?></td>
		<td align="center">
			<form action='effect_school_02.php' method='post' style='margin:0px; display:inline;'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button' id='button' value='填寫資料'>
			</form>
		</td>
		<td align="center"><INPUT TYPE="button" VALUE="上傳檔案" onClick="location='effect_school_up_02.php'"></td>
	</tr>
	<? if($a2_edu_total_money < 1) {echo "-->";}?>
	<? if($a3_edu_total_money < 1) {echo "<!--";}?>
	<tr>
		<td width="170" height="50">3.修繕離島或偏遠地區師生宿舍</td>
		<td align="right"><?=number_format($a3_edu_total_money); ?></td>
		<td align="right"><?=number_format($a3_execute_money); ?></td>
		<td align="right"><?=number_format($a3_edu_total_money - $a3_execute_money); ?></td>
		<td align="center"><?=$a3_percnet."%"; ?></td>
		<td align="center">
			<form action='effect_school_03.php' method='post' style='margin:0px; display:inline;'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button' id='button' value='填寫資料'>
			</form>
		</td>
		<td align="center"><INPUT TYPE="button" VALUE="上傳檔案" onClick="location='effect_school_up_03.php'"></td>
	</tr>
	<? if($a3_edu_total_money < 1) {echo "-->";}?>
	<? if($a4_edu_total_money < 1) {echo "<!--";}?>
	<tr>
		<td width="170" height="50">4.充實學校基本教學設備</td>
		<td align="right"><?=number_format($a4_edu_total_money); ?></td>
		<td align="right"><?=number_format($a4_execute_money); ?></td>
		<td align="right"><?=number_format($a4_edu_total_money - $a4_execute_money); ?></td>
		<td align="center"><?=$a4_percnet."%"; ?></td>
		<td align="center">
			<form action='effect_school_04.php' method='post' style='margin:0px; display:inline;'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button' id='button' value='填寫資料'>
			</form>
		</td>
		<td align="center"><INPUT TYPE="button" VALUE="上傳檔案" onClick="location='effect_school_up_04.php'"></td>
	</tr>
	<? if($a4_edu_total_money < 1) {echo "-->";}?>
	<? if($a5_edu_total_money < 1) {echo "<!--";}?>
	<tr>
		<td width="170" height="50">5.發展原住民教育文化特色及充實設備器材</td>
		<td align="right"><?=number_format($a5_edu_total_money); ?></td>
		<td align="right"><?=number_format($a5_execute_money); ?></td>
		<td align="right"><?=number_format($a5_edu_total_money - $a5_execute_money); ?></td>
		<td align="center"><?=$a5_percnet."%"; ?></td>
		<td align="center">
			<form action='effect_school_05.php' method='post' style='margin:0px; display:inline;'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button' id='button' value='填寫資料'>
			</form>
		</td>
		<td align="center"><INPUT TYPE="button" VALUE="上傳檔案" onClick="location='effect_school_up_05.php'"></td>
	</tr>
	<? if($a5_edu_total_money < 1) {echo "-->";}?>
	<? if($a6_edu_total_money < 1) {echo "<!--";}?>
	<tr>
		<td width="170" height="50">6.補助交通不便地區學校交通車</td>
		<td align="right"><?=number_format($a6_edu_total_money); ?></td>
		<td align="right"><?=number_format($a6_execute_money); ?></td>
		<td align="right"><?=number_format($a6_edu_total_money - $a6_execute_money); ?></td>
		<td align="center"><?=$a6_percnet."%"; ?></td>
		<td align="center">
			<form action='effect_school_06.php' method='post' style='margin:0px; display:inline;'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button' id='button' value='填寫資料'>
			</form>
		</td>
		<td align="center"><INPUT TYPE="button" VALUE="上傳檔案" onClick="location='effect_school_up_06.php'"></td>
	</tr>
	<? if($a6_edu_total_money < 1) {echo "-->";}?>
	<? if($a7_edu_total_money < 1) {echo "<!--";}?>
	<tr>
		<td width="170" height="50">7.整修學校社區化活動場所</td>
		<td align="right"><?=number_format($a7_edu_total_money); ?></td>
		<td align="right"><?=number_format($a7_execute_money); ?></td>
		<td align="right"><?=number_format($a7_edu_total_money - $a7_execute_money); ?></td>
		<td align="center"><?=$a7_percnet."%"; ?></td>
		<td align="center">
			<form action='effect_school_07.php' method='post' style='margin:0px; display:inline;'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button' id='button' value='填寫資料'>
			</form>
		</td>
		<td align="center"><INPUT TYPE="button" VALUE="上傳檔案" onClick="location='effect_school_up_07.php'"></td>
	</tr>
	<? if($a7_edu_total_money < 1) {echo "-->";}?>
<? if($sum_edu_total_money < 1) {echo "<!--";} ?>
	<tr>
		<td width="170" height="40" align="center" bgcolor="#FFFF99">合計</td>
		<td height="40" align="right" bgcolor="#FFFF99"><?=number_format($sum_edu_total_money); ?></td>
		<td height="40" align="right" bgcolor="#FFFF99"><?=number_format($sum_execute_money); ?></td>
		<td height="40" align="right" bgcolor="#FFFF99"><?=number_format($sum_edu_total_money - $sum_execute_money); ?></td>
		<td height="40" align="center" bgcolor="#FFFF99"><?=$sum_percnet."%"; ?></td>
		<td align="center" bgcolor="#FFFF99">&nbsp;</td>
		<td height="40" align="center" bgcolor="#FFFF99">&nbsp;</td>
	</tr>
</table>
<? if($sum_edu_total_money < 1) {echo "-->";} ?>
<? 
	
	if($sum_edu_total_money < 1) 
	{
		echo "<p><font color='red'>貴校無核定補助項目，不須填寫執行成效。</font><p>";
	} 
	else
	{
		echo "<p><font color='blue'><b>注意事項：</b></font><p>";
		echo "1. 請點選「<font color=red>填寫資料</font>」及「<font color=red>上傳檔案</font>」按鈕，輸入或上傳項目資料。<p>";
		echo "2. 系統閒置安全保護十分鐘，若需長時間輸入資料，請由其他文件複製貼上。";
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>