<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	$school_year = 103; //為學年度
	
?>
<?//<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">?>
<br />
「<?=$cityname;?>」學校名冊
<table width="500px" border="1">
	<tr>
		<td align="center">序號</td>
		<td align="center">學校代碼</td>
		<td align="center">學校名稱</td>
		<td align="center">詳細</td>
	</tr>
<?
	$school_year = 103; //為學年度

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.enabled = 'Y' ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.account ";
		   
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];

		$serial++;
		
		?>
			<tr>
				<td align='center'><?=$serial;?></td>
				<td align='center'><?=$account; //學校代碼?></td>
				<td align='left'><?=$schoolname; //學校名稱?></td>
				<td align='center'><a href="print_edu_examined.php?id=<?=$account;?>" target="_blank">連結</a></td>
			</tr>
		<?
			
	}
	
?> 
</table>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>