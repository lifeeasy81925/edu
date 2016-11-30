<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	//echo "<br />根目錄：".$_SERVER['DOCUMENT_ROOT']."<br />";
	
	include "../../function/config_for_105.php"; //本年度基本設定
	$account = $_GET['id'];
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".		   
		   "      , su.* ".
		   
		   //補一資料
		   "      , a1.s_total_money as a1_money, a1.s_p1_money as a1_p1_money, a1.s_p2_money as a1_p2_money ".
		   
		   //補二資料
		   "      , a2.s_total_money as a1_money, a2.s_p1_money as a2_p1_money, a2.s_p2_money as a2_p2_money ".
		   
		   //補五資料
		   "      , a5.s_total_money as a1_money, a5.s_p1_money as a5_p1_money, a5.s_p2_money as a5_p2_money ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_upload_name as su on sy.seq_no = su.sy_seq ".
		   "                       left join $a1_table_name as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join $a2_table_name as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join $a5_table_name as a5 on sy.seq_no = a5.sy_seq ".
		   
		   " where sy.school_year = '$school_year' ". 
		   "   and sd.account = '$account' ".
		   " order by sd.account ";
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
		$page3_warning = $row['page3_warning'];
		$sy_seq = $row['seq_no']; //school_year 的 seq_no
		
		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money']; 
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money']; 
		
		$a2_p1_money = ($row['a2_p1_money'] == '')?0:$row['a2_p1_money']; 
		$a2_p2_money = ($row['a2_p2_money'] == '')?0:$row['a2_p2_money']; 
		
		$a5_p1_money = ($row['a5_p1_money'] == '')?0:$row['a5_p1_money']; 
		$a5_p2_money = ($row['a5_p2_money'] == '')?0:$row['a5_p2_money']; 
		
		$applied = $row['applied']; //已申請
		$applied_ary = explode(",", $applied); //已申請的補助
		
		$point2 = $row['point2'];
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
		$a2_1 = $row['a2_1'];
		$a2_2 = $row['a2_2'];
		$a3_1 = $row['a3_1'];
		$a3_2 = $row['a3_2'];
		$a4_1 = $row['a4_1'];
		$a4_2 = $row['a4_2'];
		$a5_1 = $row['a5_1'];
		$a5_2 = $row['a5_2'];
		$a6_1 = $row['a6_1'];
		$a6_2 = $row['a6_2'];
		$a6_3 = $row['a6_3'];
		$a7_1 = $row['a7_1'];
		$final_1 = $row['final_1'];
		$final_2 = $row['final_2'];
		
		$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
		//echo $file_path;
	}
	
	
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<? include "../../function/button_print.php"; ?>
<input type="button" name="Submit" value="回主選單" onclick="location.href='../school_index.php'">
<p>
<div style="background-color:#9CC"><b><?=$account;?> <?=$cityname.$district.$schoolname;?></b></div>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
	<tr style="display:<?=(in_array('a1',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目一：推展親職教育活動</b>
			<br />親職教育講座實施計畫：
			<? 
				if($a1_p1_money > 0)
				{
					modPrintLink($file_path, $a1_1, "1");
				}
			?><br />
			家庭訪視實施計畫：
			<? 
				if($a1_p2_money > 0)
				{
					modPrintLink($file_path, $a1_2, "1");
				}
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a2',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目二：學校發展教育特色</b>
			<br />特色一實施計畫：
			<? 
				if($a2_p1_money > 0)
				{
					modPrintLink($file_path, $a2_1, "1");
				}
			?><br />
			特色二實施計畫：
			<? 
				if($a2_p2_money > 0)
				{
					modPrintLink($file_path, $a2_2, "1");
				}
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a3_1',$applied_ary) || in_array('a3_2',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目三：修繕離島或偏遠地區教師宿舍</b>
			<br />實施計畫：
			<? 
				modPrintLink($file_path, $a3_1, "1");
			?><br />
			近三年住宿人員資料：
			<? 
				modPrintLink($file_path, $a3_2, "1");
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a4',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目四：充實學校基本教學設備</b>
			<br />實施計畫：
			<? 
				modPrintLink($file_path, $a4_1, "1");
			?><br />
			領域小組會議紀錄：
			<? 
				modPrintLink($file_path, $a4_2, "1");
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a5',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目五：發展原住民教育文化特色及充實設備器材</b>
			<br />特色一實施計畫：
			<? 
				if ($a5_p1_money > 0)
				{
					modPrintLink($file_path, $a5_1, "1");
				}
			?><br />
			特色二實施計畫：
			<? 
				if ($a5_p2_money > 0)
				{
					modPrintLink($file_path, $a5_2, "1");
				}
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a6',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目六：交通不便地區學校交通車</b>
			<br />實施計畫：
			<? 
				modPrintLink($file_path, $a6_1, "1");
			?><br />
			各搭車路線學生名冊：
			<? 
				modPrintLink($file_path, $a6_2, "1");
			?><br />
			學校現有交通車調查表：
			<? 
				modPrintLink($file_path, $a6_3, "1");
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a7',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目七：整修學校社區化活動場所</b>
			<br />實施計畫：
			<? 
				modPrintLink($file_path, $a7_1, "1");
			?>
			<p>
		</td>
	</tr>
</table>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>