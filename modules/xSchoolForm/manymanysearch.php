<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
		
	$get_id = $_GET['acc'];
	
	if($get_id != "")
		$username = $get_id;
	
	
			
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="上一頁" onClick="location='../edu_index.php'"><br />
<table border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td width="500px" align="center" bgcolor="#99CCCC">查詢功能
		</td>
	</tr>
	<tr>
		<td width="500px" align="left" bgcolor="#DDDD99">
		校名：<input type="text" size="20" name="schoolname" />(輸入校名or代碼)<br />
	</tr>
	<tr>
		<td width="500px" align="left" bgcolor="#DDDD99">
		縣市：<br />
		<input type="checkbox" name="city_1" id="city_1" value="1"/>基隆市
		<input type="checkbox" name="city_2" id="city_2" value="1"/>新北市
		<input type="checkbox" name="city_3" id="city_3" value="1"/>臺北市
		<input type="checkbox" name="city_4" id="city_4" value="1"/>桃園縣
		<input type="checkbox" name="city_5" id="city_5" value="1"/>新竹縣
		<input type="checkbox" name="city_6" id="city_6" value="1"/>新竹市
		<input type="checkbox" name="city_7" id="city_7" value="1"/>苗栗縣
		<br />
		<input type="checkbox" name="city_8" id="city_8" value="1"/>臺中市
		<input type="checkbox" name="city_9" id="city_9" value="1"/>南投縣
		<input type="checkbox" name="city_10" id="city_10" value="1"/>彰化縣
		<input type="checkbox" name="city_11" id="city_11" value="1"/>雲林縣
		<input type="checkbox" name="city_12" id="city_12" value="1"/>嘉義縣
		<input type="checkbox" name="city_13" id="city_13" value="1"/>嘉義市 
		<input type="checkbox" name="city_14" id="city_14" value="1"/>臺南市
		<br />
		<input type="checkbox" name="city_15" id="city_15" value="1"/>高雄市
		<input type="checkbox" name="city_16" id="city_16" value="1"/>屏東縣
		<input type="checkbox" name="city_17" id="city_17" value="1"/>臺東縣
		<input type="checkbox" name="city_18" id="city_18" value="1"/>花蓮縣
		<input type="checkbox" name="city_19" id="city_19" value="1"/>宜蘭縣
		<input type="checkbox" name="city_20" id="city_20" value="1"/>澎湖縣
		<input type="checkbox" name="city_21" id="city_21" value="1"/>金門縣
		<br />
		<input type="checkbox" name="city_22" id="city_22" value="1"/>連江縣
		<br />
		</td>
	</tr>
	<tr>
		<td width="500px" align="center" bgcolor="#99CCCC">設定顯示欄位
		</td>
	</tr>
	<tr>
		<td width="500px" align="left" bgcolor="#DDDD99">
		<input type="checkbox" name="" value="1"/>基本資料<br />
		<input type="checkbox" name="" value="1"/>補助一<br />
		<input type="checkbox" name="" value="1"/>補助二<br />
		<input type="checkbox" name="" value="1"/>補助三<br />
		<input type="checkbox" name="" value="1"/>補助四<br />
		<input type="checkbox" name="" value="1"/>補助五<br />
		<input type="checkbox" name="" value="1"/>補助六<br />
		<input type="checkbox" name="" value="1"/>補助七<br />
		</td>
	</tr>
</table>
<p>
<table border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td width="50px" height="50" align="center" bgcolor="#99CCCC">序號</td>
		<td align="center" bgcolor="#99CCCC">校名</td>
		<td align="center" bgcolor="#99CCCC">填寫計畫年度</td>
		<td align="center" bgcolor="#99CCCC">班級數</td>
		<td align="center" bgcolor="#99CCCC">學校所在地區</td>
		<td align="center" bgcolor="#99CCCC">交通狀況</td>
		<td align="center" bgcolor="#99CCCC">符合指標</td>
		<td align="center" bgcolor="#99CCCC">全校學生數</td>
		<td align="center" bgcolor="#99CCCC">低收入戶子女</td>
		<td align="center" bgcolor="#99CCCC">隔代教養</td>
		<td align="center" bgcolor="#99CCCC">親子年齡差距45歲以上</td>
		<td align="center" bgcolor="#99CCCC">新移民子女</td>
		<td align="center" bgcolor="#99CCCC">單寄親家庭</td>
		<td align="center" bgcolor="#99CCCC">目標學生合計人數</td>
		<td align="center" bgcolor="#99CCCC">教師編制數</td>
		<td align="center" bgcolor="#99CCCC">親職講座申請金額</td>
		<td align="center" bgcolor="#99CCCC">家庭訪視申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助一申請金額</td>
		<td align="center" bgcolor="#99CCCC">親職講座初審金額</td>
		<td align="center" bgcolor="#99CCCC">家庭訪視初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助一初審金額</td>
		<td align="center" bgcolor="#99CCCC">親職講座複審金額</td>
		<td align="center" bgcolor="#99CCCC">家庭訪視複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助一複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助二特色一申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助二特色二申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助二申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助二特色一初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助二特色二初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助二初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助二特色一複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助二特色二複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助二複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助三學生宿舍申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助三教師宿數申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助三申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助三學生宿舍初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助三教師宿數初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助三初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助三學生宿舍複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助三教師宿數複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助三複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助四申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助四初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助四複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助五特色一申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助五特色二申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助五申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助五特色一初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助五特色二初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助五初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助五特色一複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助五特色二複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助五複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助六申請項目</td>
		<td align="center" bgcolor="#99CCCC">補助六申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助六初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助六複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助七修建申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助七設備申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助七申請金額</td>
		<td align="center" bgcolor="#99CCCC">補助七修建初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助七設備初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助七初審金額</td>
		<td align="center" bgcolor="#99CCCC">補助七修建複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助七設備複審金額</td>
		<td align="center" bgcolor="#99CCCC">補助七複審金額</td>
		<td align="center" bgcolor="#99CCCC"></td>
		<td align="center" bgcolor="#99CCCC"></td>
		<td align="center" bgcolor="#99CCCC"></td>
		<td align="center" bgcolor="#99CCCC"></td>
		<td align="center" bgcolor="#99CCCC"></td>
		<td align="center" bgcolor="#99CCCC"></td>
		<td align="center" bgcolor="#99CCCC"></td>
		<td align="center" bgcolor="#99CCCC"></td>
	</tr>
<?
	
	//教育部核定金額
	$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一資料
		   "      , a1.s_total_money as a1_money ".
		   "      , a1.s_p1_money as a1_s_p1_money, a1.s_p2_money as a1_s_p2_money ".
		   //補一縣市資料
		   "      , a1.city_total_money as a1_city_money ".
		   "      , a1.city_p1_money as a1_city_p1_money, a1.city_p2_money as a1_city_p2_money ".
		   "      , a1.city_desc as a1_city_desc ".
		   //補一教育部資料
		   "      , a1.edu_total_money as a1_edu_money ".
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
		   //補二縣市資料
		   "      , a2.city_total_money as a2_city_money ".
		   "      , a2.city_p1_money as a2_city_p1_money, a2.city_p2_money as a2_city_p2_money ".
		   "      , a2.city_p1_current_money as a2_city_p1_current_money ".
		   "      , a2.city_p1_capital_money as a2_city_p1_capital_money ".
		   "      , a2.city_p2_current_money as a2_city_p2_current_money ".
		   "      , a2.city_p2_capital_money as a2_city_p2_capital_money ".
		   "      , a2.city_desc as a2_city_desc, a2.city_desc_p2 as a2_city_desc_p2 ".
		   //補二教育部資料
		   "      , a2.edu_total_money as a2_edu_money ".
		   "      , a2.edu_p1_money as a2_edu_p1_money, a2.edu_p2_money as a2_edu_p2_money ".
		   "      , a2.edu_p1_current_money as a2_edu_p1_current_money ".
		   "      , a2.edu_p1_capital_money as a2_edu_p1_capital_money ".
		   "      , a2.edu_p2_current_money as a2_edu_p2_current_money ".
		   "      , a2.edu_p2_capital_money as a2_edu_p2_capital_money ".
		   "      , a2.edu_desc as a2_edu_desc, a2.edu_desc_p2 as a2_edu_desc_p2 ".
		   
		   //補三資料
		   "      , a3.s_total_money as a3_money ".
		   "      , a3.s_p1_money as a3_s_p1_money, a3.s_p2_money as a3_s_p2_money ".
		   "      , a3.s_p1_current_money as a3_s_p1_current_money ".
		   "      , a3.s_p1_capital_money as a3_s_p1_capital_money ".
		   "      , a3.s_p2_current_money as a3_s_p2_current_money ".
		   "      , a3.s_p2_capital_money as a3_s_p2_capital_money ".
		   //補三縣市資料
		   "      , a3.city_total_money as a3_city_money ".
		   "      , a3.city_p1_money as a3_city_p1_money, a3.city_p2_money as a3_city_p2_money ".
		   "      , a3.city_p1_current_money as a3_city_p1_current_money ".
		   "      , a3.city_p1_capital_money as a3_city_p1_capital_money ".
		   "      , a3.city_p2_current_money as a3_city_p2_current_money ".
		   "      , a3.city_p2_capital_money as a3_city_p2_capital_money ".
		   "      , a3.city_desc as a3_city_desc ".
		   //補三教育部資料
		   "      , a3.edu_total_money as a3_edu_money ".
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
		   "      , a4.city_total_money as a4_city_money ".
		   "      , a4.city_p1_money as a4_city_p1_money ".
		   "      , a4.city_p1_current_money as a4_city_p1_current_money ".
		   "      , a4.city_p1_capital_money as a4_city_p1_capital_money ".
		   "      , a4.city_desc as a4_city_desc ".
		   //補四教育部資料
		   "      , a4.edu_total_money as a4_edu_money ".
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
		   "      , a5.city_total_money as a5_city_money ".
		   "      , a5.city_p1_money as a5_city_p1_money, a5.city_p2_money as a5_city_p2_money ".
		   "      , a5.city_p1_current_money as a5_city_p1_current_money ".
		   "      , a5.city_p1_capital_money as a5_city_p1_capital_money ".
		   "      , a5.city_p2_current_money as a5_city_p2_current_money ".
		   "      , a5.city_p2_capital_money as a5_city_p2_capital_money ".
		   "      , a5.city_desc as a5_city_desc, a5.city_desc_p2 as a5_city_desc_p2 ".
		   //補五教育部資料
		   "      , a5.edu_total_money as a5_edu_money ".
		   "      , a5.edu_total_money as a5_edu_money ".
		   "      , a5.edu_p1_money as a5_edu_p1_money, a5.edu_p2_money as a5_edu_p2_money ".
		   "      , a5.edu_p1_current_money as a5_edu_p1_current_money ".
		   "      , a5.edu_p1_capital_money as a5_edu_p1_capital_money ".
		   "      , a5.edu_p2_current_money as a5_edu_p2_current_money ".
		   "      , a5.edu_p2_capital_money as a5_edu_p2_capital_money ".
		   "      , a5.edu_desc as a5_edu_desc, a5.edu_desc_p2 as a5_edu_desc_p2 ".
		   
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
		   "      , a7.city_total_money as a7_city_money ".
		   "      , a7.city_p1_money as a7_city_p1_money ".
		   "      , a7.city_p1_current_money as a7_city_p1_current_money ".
		   "      , a7.city_p1_capital_money as a7_city_p1_capital_money ".
		   "      , a7.city_desc as a7_city_desc ".
		   //補七教育部資料
		   "      , a7.edu_total_money as a7_edu_money ".
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
		   " where sy.school_year = '103' ".
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['sd_account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$main_seq = $row['seq_no']; //school_year的seq_no
		
		$student = $row['student'];
		$class_total = $row['class_total'];
		$getmoney_85to91 = $row['getmoney_85to91'];
		$traffic_status = $row['traffic_status'];
		
		//申請總金額
		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];
		$a7_money = ($row['a7_money'] == '')?0:$row['a7_money'];
				
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
				
		//補三
		$a3_s_p1_money = ($row['a3_s_p1_money'] == '')?0:$row['a3_s_p1_money']; //NULL則填入0
		$a3_s_p1_current_money = ($row['a3_s_p1_current_money'] == '')?0:$row['a3_s_p1_current_money'];
		$a3_s_p1_capital_money = ($row['a3_s_p1_capital_money'] == '')?0:$row['a3_s_p1_capital_money'];
		$a3_s_p2_money = ($row['a3_s_p2_money'] == '')?0:$row['a3_s_p2_money'];
		$a3_s_p2_current_