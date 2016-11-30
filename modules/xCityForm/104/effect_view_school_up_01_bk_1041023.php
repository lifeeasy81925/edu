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
		   " where account like '$username' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$file_1 = $row['effect_a1_1'];
		$file_2 = $row['effect_a1_2'];
		$file_3 = $row['effect_a1_3'];
		$file_4 = $row['effect_a1_4'];
	}
	
	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$username.'/';
	
?>
<p>
學校名稱：<?=$account?> <?=$cityname.$district.$schoolname;?>
<p>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
<? if($a1_p1_money < 1) {echo "<!--";} ?>
	<tr>
		<td>
			<strong>※上傳「親職教育講座」核定後執行計畫</strong> <br />
			親職教育講座：
			<? 
				if ($file_1 == '')
					echo "<font color='red'>未上傳</font> ";
				else 
					echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_1."' target='_new'>".$file_1."</a>";

			?>
			<p>
		</td>
	</tr>
<? if($a1_p1_money < 1) {echo "-->";} ?>
<? if($a1_p2_money < 1) {echo "<!--";} ?>
	<tr>
		<td>
			<strong>※上傳「家庭訪視」核定後執行計畫</strong> <br />
			家庭訪視：
			<? 
				if ($file_2 == '')
					echo "<font color='red'>未上傳</font> ";
				else 
					echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_2."' target='_new'>".$file_2."</a>";

			?>
			<p>
		</td>
	</tr>
<? if($a1_p2_money < 1) {echo "-->";} ?>
	<tr>
		<td>
			<strong>※上傳核定後執行經費概算表</strong> <br />
			核定後執行經費概算表：
			<? 
				if ($file_3 == '')
					echo "<font color='red'>未上傳</font> ";
				else 
					echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_3."' target='_new'>".$file_3."</a>";

			?>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※上傳執行成果與照片</strong><br />
			上傳執行成果與照片：
			<? 
				if ($file_4 == '')
					echo "<font color='red'>未上傳</font> ";
				else 
					echo "<font color='blue'>已上傳</font>，檔名："."<a href='".$file_path.$file_4."' target='_new'>".$file_4."</a>";

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