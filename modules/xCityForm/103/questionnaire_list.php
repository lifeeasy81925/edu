<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$school_year = 103; //為學年度	
	
?>
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<br />
「<?=$cityname;?>」學校名冊
<table width="500" border="1">
    <tr>
		<td align="center">序號</td>
		<td align="center">學校代碼</td>
		<td align="center">學校名稱</td>
		<td align="center">內容</td>
		<td align="center">填寫時間</td>
	</tr>
<?
	$school_year = 103; //為學年度

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , q103.fill_date, q103.q15_1 ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join questionnaire_103 as q103 on sy.account = q103.account ".
		   
		   " where sy.school_year = '$school_year' ".
		   "   and ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year > $school_year)) ".
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
		
		$fill_date = $row['fill_date'];
		$q15_1 = $row['q15_1'];

		$serial++;
		
		?>
			<tr>
				<td align='center'><?=$serial;?></td>
				<td align='center'><?=$account; //學校代碼?></td>
				<td align='left'><?=$schoolname; //學校名稱?></td>
				<td align='center'><a href="questionnaire.php?id=<?=$account;?>" target="_self">連結</a></td>
				<td align='center'><?=(($fill_date == "")?"-":$fill_date);?></td>
			</tr>
		<?
			
	}
	
?>
</table>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 