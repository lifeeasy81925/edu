<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	$school_year = 103; //為學年度
	
	$get_id = $_GET['ct'];
	
	if($get_id != "")
		$cityname = $get_id;
	
	//補六table name
	$table_name = "alc_school_activity";
	$table_name_effect = $table_name."_effect";
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<div id="print_content">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td height="60" colspan="11" align="center"><strong><font color=blue>教育部 <?=$school_year;?> 年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />
		縣市別：<?=$cityname;?>　　　　　　　　補助項目：七、整修學校社區化活動場所</font></strong></td>
	</tr>
	<tr>
		<td rowspan="2" align="center" bgcolor="#FFFFCC" width="30">序號</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC" width="75">縣市</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC" width="80">學校編號</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC" width="200">學校名稱</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">教育部核定項目、數量及金額</td>
		<td colspan="3" align="center" bgcolor="#FFFFCC">學校執行成果</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">執行成效百分比 (%)</td>
	</tr>
	<tr>
		<td width="40" align="center" bgcolor="#FFFFCC">座</td>
		<td width="120" align="center" bgcolor="#FFFFCC">修建</td>
		<td width="120" align="center" bgcolor="#FFFFCC">設備</td>
		<td width="40" align="center" bgcolor="#FFFFCC">座</td>
		<td width="120" align="center" bgcolor="#FFFFCC">修建</td>
		<td width="120" align="center" bgcolor="#FFFFCC">設備</td>
		<td width="120" align="center" bgcolor="#FFFFCC">金額</td>
	</tr>
<?
	//教育部核定金額
	$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , a7.edu_total_money, a7.edu_p1_current_money, a7.edu_p1_capital_money, a7.p_num as a7_p_num ".
		   "      , a7_e.* ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as a7 on sy.seq_no = a7.sy_seq ".
		   "                       left join $table_name_effect as a7_e on a7.sy_seq = a7_e.sy_seq ".
		   
		   " where sy.school_year = '$school_year' ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.cityname, sd.account ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['sd_account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		
		$a7_p_num = $row['a7_p_num'];
		$a7_e_p_num = $row['p_num'];
		
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0
		$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
		$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
		
		$execute_money = ($row['execute_money'] == '')?0:$row['execute_money'];
		$execute_current_money = ($row['execute_current_money'] == '')?0:$row['execute_current_money'];
		$execute_capital_money = ($row['execute_capital_money'] == '')?0:$row['execute_capital_money'];
			
		//有拿錢才顯示
		if($edu_total_money > 0)
		{
			$serial++;
			?>
				<tr>
					<td height="30" align="center"><?=$serial;?></td>
					<td height="30" align="center"><?=$cityname;?></td>
					<td height="30" align="left"><?=$account;?></td> 
					<td height="30" align="left"><?=$schoolname;?></td>
					
					<td align="right"><?=number_format($a7_p_num);?></td>
					<td align="right"><?=number_format($edu_p1_current_money);?></td>
					<td align="right"><?=number_format($edu_p1_capital_money);?></td>
					
					<td align="right"><?=number_format($a7_e_p_num);?></td>
					<td align="right"><?=number_format($execute_current_money);?></td>
					<td align="right"><?=number_format($execute_capital_money);?></td>
					
					<td align="right"><?=number_format($execute_money / $edu_total_money * 100,2);?></td>
				</tr>
			<?
		}
	}
	
?>
	<tr>
		<td height="40" colspan="11">承辦人：　　　　　　　　　　　　　　　　　　　　主管科長：　　　　　　　　　　　　　　　　　　　　局 (處) 長：</td>
	</tr>
</table>
</div>
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>
