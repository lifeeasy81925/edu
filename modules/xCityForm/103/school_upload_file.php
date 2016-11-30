<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	//echo "<br />根目錄：".$_SERVER['DOCUMENT_ROOT']."<br />";
	
	$school_year = 103; //為學年度
	$account = $_GET['id'];
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".		   
		   "      , su.* ".
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_upload_name as su on sy.seq_no = su.sy_seq ".
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
		
		$applied = $row['applied']; //已申請
		$applied_ary = explode(",", $applied); //已申請的補助
		
		$point2 = $row['point2'];
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
		$a2_1 = $row['a2_1'];
		$a3_1 = $row['a3_1'];
		$a3_2 = $row['a3_2'];
		$a4_1 = $row['a4_1'];
		$a4_2 = $row['a4_2'];
		$a5_1 = $row['a5_1'];
		$a6_1 = $row['a6_1'];
		$a6_2 = $row['a6_2'];
		$a6_3 = $row['a6_3'];
		$a7_1 = $row['a7_1'];
		$final_1 = $row['final_1'];
		$final_2 = $row['final_2'];
		
		$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
		//echo $file_path;
	}
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<? include "../../function/button_print.php"; ?>
<input type="button" name="Submit" value="回主選單" onclick="location.href='../school_index.php'">
<p>
<div id="print_content">
<div style="background-color:#9CC"><b>※經校長用印後，掃描上傳：</b></div>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
	<tr style="display:<?=(in_array('a1',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目一：推展親職教育活動</b>
			<br />親職教育講座實施計畫：
			<? 
				if ($a1_1 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a1_1.'" target="_new">'.$a1_1.'</a>';
			?><br />
			家庭訪視實施計畫：
			<? 
				if ($a1_2 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a1_2.'" target="_new">'.$a1_2.'</a>';
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a2',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目二：學校發展教育特色</b>
			<br />實施計畫：
			<? 
				if ($a2_1 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a2_1.'" target="_new">'.$a2_1.'</a>';
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a3_1',$applied_ary) || in_array('a3_2',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目三：修繕離島或偏遠地區教師宿舍</b>
			<br />實施計畫：
			<? 
				if ($a3_1 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a3_1.'" target="_new">'.$a3_1.'</a>';
			?><br />
			近三年住宿人員資料：
			<? 
				if ($a3_2 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a3_2.'" target="_new">'.$a3_2.'</a>';
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a4',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目四：充實學校基本教學設備</b>
			<br />實施計畫：
			<? 
				if ($a4_1 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a4_1.'" target="_new">'.$a4_1.'</a>';
			?><br />
			領域小組會議紀錄：
			<? 
				if ($a4_2 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a4_2.'" target="_new">'.$a4_2.'</a>';
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a5',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目五：發展原住民教育文化特色及充實設備器材</b>
			<br />實施計畫：
			<? 
				if ($a5_1 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a5_1.'" target="_new">'.$a5_1.'</a>';
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a6',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目六：交通不便地區學校交通車</b>
			<br />實施計畫：
			<? 
				if ($a6_1 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_1.'" target="_new">'.$a6_1.'</a>';
			?><br />
			各搭車路線學生名冊：
			<? 
				if ($a6_2 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_2.'" target="_new">'.$a6_2.'</a>';
			?><br />
			學校現有交通車調查表：
			<? 
				if ($a6_3 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_3.'" target="_new">'.$a6_3.'</a>';
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a7',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目七：整修學校社區化活動場所</b>
			<br />實施計畫：
			<? 
				if ($a7_1 == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a7_1.'" target="_new">'.$a7_1.'</a>';
			?>
			<p>
		</td>
	</tr>
</table>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>