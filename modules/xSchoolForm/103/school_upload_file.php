<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	//include "../../function/checkdate.php";
	
	//echo "<br />根目錄：".$_SERVER['DOCUMENT_ROOT']."<br />";
	
	$school_year = 103; //為學年度
	
	//以防學校不填學校資料先上傳檔案
	//新學年度一開始沒資料，在進網頁的時候先新增
	$cnt_sql = " SELECT account FROM schooldata_year where account = '$username' and school_year = '$school_year'  ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) //沒資料
	{
		$insert_sql = "insert into schooldata_year (account, school_year) ".
					  "                     values ('$username', '$school_year') ";
		mysql_query($insert_sql);
	}
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".		   
		   
		   //補一資料
		   "      , a1.s_total_money as a1_money, a1.s_p1_money as a1_p1_money, a1.s_p2_money as a1_p2_money ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
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
		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving']; 
		$page3_warning = $row['page3_warning'];
		$sy_seq = $row['seq_no']; //school_year 的 seq_no
		
		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money']; 
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money']; 
		
		$applied = $row['applied']; //已申請
		$applied_ary = explode(",", $applied); //已申請的補助
	}
	
	$sql = "select * from school_upload_name where sy_seq = '$sy_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
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
	}
	
	//$file_path = '/edu_upload/'.$school_year.'/'.$username.'/';
	//echo $file_path;
	
	//1040424修改，修改路徑pub	
	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$username.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$username.'/';
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<? include "../../function/button_print.php"; ?>
<input type="button" name="Submit" value="回主選單" onclick="location.href='../school_index.php'">
<p>
<div id="print_content">
<div style="background-color:#9CC"><b>※經校長用印後，掃描上傳：</b></div>
<div style="background-color:#CFC">
<p style='margin-left: 1em; text-indent: -1em'>
<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
	<b>1.教育部<?=$school_year;?>年度推動教育優先區指標界定調查紀錄表─學校</b><br />
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="column_name" value="final_1">
	<!--<input type="file" name="myfile">
	<input type="submit" value="上傳「指標界定調查表」"><br />-->
	　指標界定調查表：
	<? 
		if ($final_1 == '')
			echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
		else 
			echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$final_1.'" target="_new">'.$final_1.'</a>';
		
	?>
</form>
</p>
</div>
<div style="background-color:#CFC">
<p style='margin-left: 1em; text-indent: -1em'>
<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
	<b>2.教育部<?=$school_year;?>年度推動教育優先區補助項目經費需求彙整表─學校</b><br />
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="column_name" value="final_2">
	<!--<input type="file" name="myfile">
	<input type="submit" value="上傳「經費需求彙整表」"><br />-->
	　經費需求彙整表：
	<? 
		if ($final_2 == '')
			echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
		else 
			echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$final_2.'" target="_new">'.$final_2.'</a>';
		
	?>
</form>
</p>
</div>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td><div style="background-color:#9CC"><b>※上傳未經校長核章之電子檔：</b>（已核章之書面資料留校備查）</div>
		</td>
	</tr>
	<tr style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
		<td><b>※目標學生名冊</b>
			<form action="file_up2.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="point2">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「目標學生名冊」"><br />-->
				　目標學生名冊：
				<? 
					if ($point2 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$point2.'" target="_new">'.$point2.'</a>';
				?>
			</form>
		</td>
	</tr>
	<tr style="display:<?=($lastyear_leaving == 0)?'none':''; //0就不顯示?>;">
		<td><b>※去學年度中途輟學學生名冊</b>
			<form action="file_up2.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="lastyear_leaving_file">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「去學年度中途輟學學生名冊」"><br />-->
				　去學年度中途輟學學生名冊：
				<? 
					if ($lastyear_leaving_file == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$lastyear_leaving_file.'" target="_new">'.$lastyear_leaving_file.'</a>';
				?>
			</form>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a1',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目一：推展親職教育活動</b>
			<?
				if($a1_p1_money > 0) //沒申請親職教育的不需上傳
				{
			?>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a1_1">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「親職教育講座實施計畫」"><br />-->
				　親職教育講座實施計畫：
				<? 
					if ($a1_1 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a1_1.'" target="_new">'.$a1_1.'</a>';
				?>
			</form>
			<?
				} //沒申請親職教育的不需上傳
				
				if($a1_p2_money > 0) //沒申請家庭訪視的不需上傳
				{
			?>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a1_2">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「家庭訪視實施計畫」"><br />-->
				　家庭訪視實施計畫：
				<? 
					if ($a1_2 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a1_2.'" target="_new">'.$a1_2.'</a>';
				?>
			</form>
			<?
				}
			?>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a2',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目二：學校發展教育特色</b>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a2_1">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「實施計畫」"><br />-->
				　實施計畫：
				<? 
					if ($a2_1 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a2_1.'" target="_new">'.$a2_1.'</a>';
				?>
			</form>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a3_1',$applied_ary) || in_array('a3_2',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目三：修繕離島或偏遠地區教師宿舍</b>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a3_1">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「實施計畫」"><br />-->
				　實施計畫：
				<? 
					if ($a3_1 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a3_1.'" target="_new">'.$a3_1.'</a>';
				?>
			</form>
			<form action="file_up2.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a3_2">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「近三年住宿人員資料」"><br />-->
				　近三年住宿人員資料：
				<? 
					if ($a3_2 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a3_2.'" target="_new">'.$a3_2.'</a>';
				?>
			</form>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a4',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目四：充實學校基本教學設備</b>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a4_1">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「實施計畫」"><br />-->
				　實施計畫：
				<? 
					if ($a4_1 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a4_1.'" target="_new">'.$a4_1.'</a>';
				?>
			</form>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a4_2">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「領域小組會議紀錄」"><br />-->
				　領域小組會議紀錄：
				<? 
					if ($a4_2 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a4_2.'" target="_new">'.$a4_2.'</a>';
				?>
			</form>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a5',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目五：發展原住民教育文化特色及充實設備器材</b>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a5_1">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「實施計畫」"><br />-->
				　實施計畫：
				<? 
					if ($a5_1 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a5_1.'" target="_new">'.$a5_1.'</a>';
				?>
			</form>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a6',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目六：交通不便地區學校交通車</b>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a6_1">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「實施計畫」"><br />-->
				　實施計畫：
				<? 
					if ($a6_1 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_1.'" target="_new">'.$a6_1.'</a>';
				?>
			</form>
			<form action="file_up2.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a6_2">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「各搭車路線學生名冊」"><br />-->
				　各搭車路線學生名冊：
				<? 
					if ($a6_2 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_2.'" target="_new">'.$a6_2.'</a>';
				?>
			</form>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a6_3">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「學校現有交通車調查表」"><br />-->
				　學校現有交通車調查表：
				<? 
					if ($a6_3 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_3.'" target="_new">'.$a6_3.'</a>';
				?>
			</form>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a7',$applied_ary))?'':'none';?>;">
		<td><b>※補助項目七：整修學校社區化活動場所</b>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="a7_1">
				<!--<input type="file" name="myfile">
				<input type="submit" value="上傳「實施計畫」"><br />-->
				　實施計畫：
				<? 
					if ($a7_1 == '')
						echo "<font color=red>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a7_1.'" target="_new">'.$a7_1.'</a>';
				?>
			</form>
		</td>
	</tr>
</table>
</div>
<input type="hidden" name="sy_seq" value="<?=$sy_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>