<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_106.php"; //本年度基本設定
?>

<input type="button" value="關閉本頁" onClick="window.close()">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<? include "../../function/button_print.php"; ?>

<p>

<div id="print_content">
	<table align="center">
		<tr>
			<td width="100%" align="center">
				<font face="標楷體" size="+2">
				<?=$cityname?>政府辦理教育部<?=($school_year);?>年度推動教育優先區計畫<p>
				學校指標資料異常檢核原因與學校說明列表<p>				
				</font>
			</td>
		</tr>
	</table>
	<p>
	<table border="1" cellpadding="0" cellspacing="0" width="100%">
		<tr height="30px">
			<td align="center" width="50px">序號</td>
			<td align="center" width="80px">學校代碼</td>
			<td align="center" width="200px">學校名稱</td>
			<td align="center" bgcolor="#E8CCFF">學校資料警示原因</td>
			<td align="center" bgcolor="#E8CCFF">學校資料學校說明</td>
			<td align="center" bgcolor="#E6E6FA">學生資料警示原因</td>
			<td align="center" bgcolor="#E6E6FA">學生資料學校說明</td>
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
				
				if($page1_warning != '' || $page2_warning != '')
				{
					$serial++;
					echo "<tr height='30px'>";
						echo "<td align='center'>$serial</td>"; //序號
						echo "<td align='center'>$account</td>";  //學校代碼
						echo "<td align='center'>".$cityname.$district.$schoolname."</td>";
						echo "<td bgcolor='#E8CCFF'>$page1_warning</td>";
						echo "<td bgcolor='#E8CCFF'>$page1_desc</td>";
						echo "<td bgcolor='#E6E6FA'>$page2_warning</td>";
						echo "<td bgcolor='#E6E6FA'>$page2_desc</td>";
					echo "</tr>";
				}
			}
		?>
	</table>
	<p>
	共計 <font color=blue><?=$serial;?></font> 校
</div>