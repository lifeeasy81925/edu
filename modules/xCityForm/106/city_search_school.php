<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";	
	include "../../function/config_for_106.php"; //本年度基本設定	
?>

<p>

<INPUT TYPE="button" VALUE="回前頁" onClick="location='../city_index.php'"><p>

<b><?=$cityname;?>學校列表</b><p>

<table border="1">
	<tr height="30px">
		<td align="center">序號</td>
		<td align="center">學校代碼</td>
		<td align="center">學校名稱</td>
		<td align="center">經費需求彙整表</td>
		<td align="center">學校上傳檔案</td>
	</tr>
<?

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.account ";

	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account    = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   = $row['cityname'];
		$district   = $row['district'];
		$schoolname = $row['schoolname'];
		$area       = $row['area'];

		$serial++;
		
		?>
			<tr height="30px">
				<td align='center'><?=$serial;?></td>
				<td align='center'><?=$account;?></td>   <? // 學校代碼 ?>
				<td align='left'><? echo $district.$schoolname; ?></td>  <? // 學校名稱 ?>
				<td align='center'><a href="print_edu_examined.php?acc=<?=$account;?>" target="_blank">進入</a></td>
				<td align='center'><a href="school_upload_file.php?id=<?=$account;?>" target="_self">進入</a></td>
			</tr>
		<?			
	}	
?> 
</table>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>