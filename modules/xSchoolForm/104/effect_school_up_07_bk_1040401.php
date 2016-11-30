<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<font color="blue"><strong><?=$school_year;?>年度 執行成果填報</strong></font><br />
<strong>項目：七、整修學校社區化活動場所  </strong><a href="/edu/modules/xSchoolForm/download/allowance-07.htm" target="_blank">(補助項目說明)</a>
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".		   
		   		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
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
	}

	//讀取上傳檔案資料
	$sql = " select effect_a7_1, effect_a7_2, effect_a7_3, effect_a7_4 ".
		   " from school_upload_name ".
		   " where account like '$username' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$file_1 = $row['effect_a7_1'];
		$file_2 = $row['effect_a7_2'];
		$file_3 = $row['effect_a7_3'];
		$file_4 = $row['effect_a7_4'];
	}
	
	$file_path = '/edu_upload/'.$school_year.'/'.$username.'/';
?>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳核定後執行計畫</strong> <font color=red>(必填)</font>
				<br />註：請彙整於於Word檔。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a7_1">
				<input type="file" name="myfile">
				<input type="submit" value="上傳核定後執行計畫"><br />
				核定後執行計畫：
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
	<tr>
		<td>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳核定後執行經費概算表</strong> <font color=red>(必填)</font>
				<br />註：請彙整於於Excel檔，若各縣市政府教育局處若有特殊檔案格式要求，請以各縣市要求檔案格式為準。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a7_2">
				<input type="file" name="myfile">
				<input type="submit" value="上傳核定後執行經費概算表"><br />
				核定後執行經費概算表：
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
	<tr>
		<td>
			<form action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳執行成果與照片</strong>
				<br />註：請彙整於Word檔，並填寫執行成果與圖片說明後上傳，勿超過10MB。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a7_3">
				<input type="file" name="myfile">
				<input type="submit" value="上傳執行成果與照片"><br />
				上傳執行成果與照片：
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
</table>
<input type="button" value="返回補助項目列表" onClick="location='effect_school_list.php'">
<p>
<font color="blue"><strong>※ 注意事項：</strong></font><br />
1. <strong>每個上傳檔案請勿超過10MB。</strong>請適當壓縮圖片適合於螢幕呈現即可。<br />
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>