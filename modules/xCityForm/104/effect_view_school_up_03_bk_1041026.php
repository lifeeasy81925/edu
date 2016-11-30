<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$username = $_POST['account'];
	
	$get_id = $_GET['acc'];
	
	if($get_id != "")
		$username = $get_id;
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<font color="blue"><strong><?=$school_year;?>年度 執行成果填報</strong></font><br />
<strong>項目：三、修繕離島或偏遠地區師生宿舍  </strong><a href="/edu/modules/xSchoolForm/download/allowance-03.htm" target="_blank">(補助項目說明)</a>
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
	$sql = " select effect_a3_1, effect_a3_2, effect_a3_3, effect_a3_4 ".
		   " from school_upload_name ".
		   " where account like '$username' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$file_1 = $row['effect_a3_1'];
		$file_2 = $row['effect_a3_2'];
		$file_3 = $row['effect_a3_3'];
		$file_4 = $row['effect_a3_4'];
	}
	
	$file_path = '/edu_upload/'.$school_year.'/'.$username.'/';
?>
<p>
學校名稱：<?=$account?> <?=$cityname.$district.$schoolname;?>
<p>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<strong>※上傳核定後執行計畫</strong> <br />
			核定後執行計畫：
			<? 
				if ($file_1 == '')
					echo "<font color='red'>未上傳</font> ";
				else 
					echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_1."' target='_new'>".$file_1."</a>";

			?>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※上傳核定後執行經費概算表</strong> <br />
			核定後執行經費概算表：
			<? 
				if ($file_2 == '')
					echo "<font color='red'>未上傳</font> ";
				else 
					echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_2."' target='_new'>".$file_2."</a>";

			?>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※上傳執行成果與照片</strong><br />
			上傳執行成果與照片：
			<? 
				if ($file_3 == '')
					echo "<font color='red'>未上傳</font> ";
				else 
					echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_3."' target='_new'>".$file_3."</a>";

			?>
			<p>
		</td>
	</tr>
</table>
<input type="button" value="返回補助項目列表" onClick="location='effect_list.php'">
<p>
<font color="blue"><strong>※ 注意事項：</strong></font><br />
1. <strong>每個上傳檔案請勿超過10MB。</strong>請適當壓縮圖片適合於螢幕呈現即可。<br />
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>