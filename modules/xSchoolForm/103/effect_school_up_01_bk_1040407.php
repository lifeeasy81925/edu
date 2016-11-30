<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	$school_year = 103; //為學年度
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<font color="blue"><strong><?=$school_year;?>年度 執行成果填報</strong></font><br />
<strong>項目：一、推展親職教育活動  </strong><a href="/edu/modules/xSchoolForm/download/allowance-01.htm" target="_blank">(補助項目說明)</a>
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".		   
		   
		   //補一資料
		   "      , a1.edu_total_money as a1_money, a1.edu_p1_money as a1_p1_money, a1.edu_p2_money as a1_p2_money ".
		   
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
		
		$sy_seq = $row['seq_no']; //school_year 的 seq_no
		
		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money']; 
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money']; 
	}

	//讀取上傳檔案資料
	$sql = " select effect_a1_1, effect_a1_2, effect_a1_3, effect_a1_4 ".
		   " from school_upload_name ".
		   " where account like '$username' and school_year = '$school_year' ";
	//echo "<br />".$sql."<br />";   
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$file_1 = $row['effect_a1_1'];
		$file_2 = $row['effect_a1_2'];
		$file_3 = $row['effect_a1_3'];
		$file_4 = $row['effect_a1_4'];
	}
	
	$file_path = '/edu_upload/'.$school_year.'/'.$username.'/';
	
?>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
<? if($a1_p1_money < 1) {echo "<!--";} ?>
	<tr>
		<td>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳「親職教育講座」核定後執行計畫</strong> <font color=red>(必填)</font>
				<br />註：請彙整於於Word檔。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a1_1">
				<input type="file" name="myfile">
				<input type="submit" value="上傳「親職教育講座」核定後執行計畫"><br />
				親職教育講座：
				<? 
					if ($file_1 == '')
						echo "<font color='red'>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_1."' target='_new'>".$file_1."</a>";

				?>
			</form>
			<p>
		</td>
	</tr>
<? if($a1_p1_money < 1) {echo "-->";} ?>
<? if($a1_p2_money < 1) {echo "<!--";} ?>
	<tr>
		<td>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳「家庭訪視」核定後執行計畫</strong> <font color=red>(必填)</font>
				<br />註：請彙整於於Word檔。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a1_2">
				<input type="file" name="myfile">
				<input type="submit" value="上傳「家庭訪視」核定後執行計畫"><br />
				家庭訪視：
				<? 
					if ($file_2 == '')
						echo "<font color='red'>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_2."' target='_new'>".$file_2."</a>";

				?>
			</form>
			<p>
		</td>
	</tr>
<? if($a1_p2_money < 1) {echo "-->";} ?>
	<tr>
		<td>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳核定後執行經費概算表</strong> <font color=red>(必填)</font>
				<br />註：請彙整於於Excel檔，若各縣市政府教育局處若有特殊檔案格式要求，請以各縣市要求檔案格式為準。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a1_3">
				<input type="file" name="myfile">
				<input type="submit" value="上傳核定後執行經費概算表"><br />
				核定後執行經費概算表：
				<? 
					if ($file_3 == '')
						echo "<font color='red'>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_3."' target='_new'>".$file_3."</a>";

				?>
			</form>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳執行成果與照片</strong>
				<br />註：請彙整於Word檔，並填寫執行成果與圖片說明後上傳，勿超過10MB。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a1_4">
				<input type="file" name="myfile">
				<input type="submit" value="上傳執行成果與照片"><br />
				上傳執行成果與照片：
				<? 
					if ($file_4 == '')
						echo "<font color='red'>未上傳</font> (上傳後請按F5更新狀態)";
					else 
						echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_4."' target='_new'>".$file_4."</a>";

				?>
			</form>
			<p>
		</td>
	</tr>
</table>
<input type="button" value="返回補助項目列表" onClick="location='effect_school_list.php'">
<p>
<font color="blue"><strong>※ 注意事項：</strong></font><br />
1. <strong>每個上傳檔案請勿超過10MB。</strong>請適當壓縮圖片適合於螢幕呈現即可。<br />
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>