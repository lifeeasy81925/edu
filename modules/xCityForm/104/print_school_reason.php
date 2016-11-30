<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/button_print.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定

?>
<input type="button" value="關閉本頁" onClick="window.close()">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<p>
<div id="print_content">
<?=$cityname;?> 學校指標資料異常檢核原因與學校說明列表
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td align="left">序號</td>
		<td align="left">學校代碼</td>
		<td align="left">學校名稱</td>
		<td align="left" bgcolor="#FFCCCC">第1頁(學校資料)警示原因</td>
		<td align="left" bgcolor="#FFCCCC">第1頁(學校資料)學校說明</td>
		<td align="left" bgcolor="#99FFCC">第2頁(教師資料)警示原因</td>
		<td align="left" bgcolor="#99FFCC">第2頁(教師資料)學校說明</td>
		<td align="left" bgcolor="#FFCC99">第3頁(學生資料)警示原因</td>
		<td align="left" bgcolor="#FFCC99">第3頁(學生資料)學校說明</td>
	</tr>

<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   " where ". 
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
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
				
		$main_seq = $row['seq_no']; //sy.seq_no
		
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];
		$page3_warning = $row['page3_warning'];
		$page3_desc = $row['page3_desc'];
		
		if($page1_warning != '' || $page2_warning != '' || $page3_warning != '')
		{
			$serial++;
			echo "<tr>";
			echo "<td align='center'>$serial</td>"; //序號
			echo "<td>$account</td>";//學校代碼
			echo "<td>".$cityname.$district.$schoolname."</td>";
			echo "<td bgcolor='#FFCCDD'>$page1_warning</td>";
			echo "<td bgcolor='#FFCCDD'>$page1_desc</td>";
			echo "<td bgcolor='#99FFDD'>$pag2_warning</td>";
			echo "<td bgcolor='#99FFDD'>$page2_desc</td>";
			echo "<td bgcolor='#FFCCAA'>$page3_warning</td>";
			echo "<td bgcolor='#FFCCAA'>$page3_desc</td>";
			echo "</tr>";
		}
		
	}
?>
</table>
共計：<font color=blue><?=$serial;?></font>校<br />
</div>