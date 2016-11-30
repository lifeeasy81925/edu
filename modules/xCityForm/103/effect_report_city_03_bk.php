<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	$school_year = 103; //為學年度
	
	$get_id = $_GET['ct'];
	
	if($get_id != "")
		$cityname = $get_id;
	
	//補三table name
	$table_name = "alc_repair_dormitory";
	$table_name_effect = $table_name."_effect";
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<div id="print_content">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td height="60" colspan="22" align="center"><strong><font color=blue>教育部 <?=$school_year;?> 年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />
		縣市別：<?=$cityname;?>　　　　　　　　補助項目：三、修繕偏遠或離島地區師生宿舍</font></strong></td>
	</tr>
	<tr>
		<td rowspan="4" align="center" bgcolor="#FFFFCC" width="30">序號</td>
		<td rowspan="4" align="center" bgcolor="#FFFFCC" width="75">縣市</td>
		<td rowspan="4" align="center" bgcolor="#FFFFCC" width="80">學校編號</td>
		<td rowspan="4" align="center" bgcolor="#FFFFCC" width="200">學校名稱</td>
		<td colspan="8" align="center" bgcolor="#FFFFCC">教育部核定項目、數量及金額</td>
		<td colspan="8" align="center" bgcolor="#FFFFCC">學校執行成果</td>
		<td rowspan="3" align="center" bgcolor="#FFFFCC">執行成效百分比(%)</td>
	</tr>
	<tr>
		<td colspan="4" align="center" bgcolor="#FFFFCC">教師宿舍</td>
		<td colspan="4" align="center" bgcolor="#FFFFCC">學生宿舍</td>
		<td colspan="4" align="center" bgcolor="#FFFFCC">教師宿舍</td>
		<td colspan="4" align="center" bgcolor="#FFFFCC">學生宿舍</td>
	</tr>
	<tr>
		<td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
		<td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
	</tr>
	<tr>
		<td width="40" align="center" bgcolor="#FFFFCC">棟</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">式</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">棟</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">式</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">棟</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">式</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">棟</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">式</td>
		<td width="100" align="center" bgcolor="#FFFFCC">金額</td>
		<td width="40" align="center" bgcolor="#FFFFCC">金額</td>
	</tr>
<?
	//教育部核定金額
	$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , a3.edu_total_money, a3.edu_p1_current_money, a3.edu_p1_capital_money, a3.edu_p2_current_money, a3.edu_p2_capital_money ".
		   "      , a3.edu_p1_current_cnt, a3.edu_p1_capital_cnt, a3.edu_p2_current_cnt, a3.edu_p2_capital_cnt  ".
		   "      , a3_e.* ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join $table_name_effect as a3_e on a3.sy_seq = a3_e.sy_seq ".
		   
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
		
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0
		$edu_p1_current_cnt = ($row['edu_p1_current_cnt'] == '')?0:$row['edu_p1_current_cnt'];
		$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
		$edu_p1_capital_cnt = ($row['edu_p1_capital_cnt'] == '')?0:$row['edu_p1_capital_cnt'];
		$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
		$edu_p2_current_cnt = ($row['edu_p2_current_cnt'] == '')?0:$row['edu_p2_current_cnt'];
		$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
		$edu_p2_capital_cnt = ($row['edu_p2_capital_cnt'] == '')?0:$row['edu_p2_capital_cnt'];
		$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];
		
		$execute_money = ($row['execute_money'] == '')?0:$row['execute_money'];
		
		$p1_used_money = ($row['p1_used_money'] == '')?0:$row['p1_used_money'];
		$p1_current_cnt = ($row['p1_current_cnt'] == '')?0:$row['p1_current_cnt'];
		$p1_current_money = ($row['p1_current_money'] == '')?0:$row['p1_current_money'];
		$p1_capital_cnt = ($row['p1_capital_cnt'] == '')?0:$row['p1_capital_cnt'];
		$p1_capital_money = ($row['p1_capital_money'] == '')?0:$row['p1_capital_money'];
		
		$p2_used_money = ($row['p2_used_money'] == '')?0:$row['p2_used_money'];
		$p2_current_cnt = ($row['p2_current_cnt'] == '')?0:$row['p2_current_cnt'];
		$p2_current_money = ($row['p2_current_money'] == '')?0:$row['p2_current_money'];
		$p2_capital_cnt = ($row['p2_capital_cnt'] == '')?0:$row['p2_capital_cnt'];
		$p2_capital_money = ($row['p2_capital_money'] == '')?0:$row['p2_capital_money'];
		
		$edu_cnt = $edu_p1_current_cnt + $edu_p1_capital_cnt + $edu_p2_current_cnt + $edu_p2_capital_cnt;
		$execute_cnt = $p1_current_cnt + $p1_capital_cnt + $p2_current_cnt + $p2_capital_cnt;
			
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
					<td align="right"><?=number_format($edu_p1_current_cnt);?></td>
					<td align="right"><?=number_format($edu_p1_current_money);?></td>
					<td align="right"><?=number_format($edu_p1_capital_cnt);?></td>
					<td align="right"><?=number_format($edu_p1_capital_money);?></td>
					
					<td align="right"><?=number_format($edu_p2_current_cnt);?></td>
					<td align="right"><?=number_format($edu_p2_current_money);?></td>
					<td align="right"><?=number_format($edu_p2_capital_cnt);?></td>
					<td align="right"><?=number_format($edu_p2_capital_money);?></td>
					
					<td align="right"><?=number_format($p1_current_cnt);?></td>
					<td align="right"><?=number_format($edu_capital_money);?></td>
					<td align="right"><?=number_format($p1_capital_cnt);?></td>
					<td align="right"><?=number_format($p1_capital_money);?></td>
					
					<td align="right"><?=number_format($p2_current_cnt);?></td>
					<td align="right"><?=number_format($p2_current_money);?></td>
					<td align="right"><?=number_format($p2_capital_cnt);?></td>
					<td align="right"><?=number_format($p2_capital_money);?></td>
					
					<td align="right"><?=number_format($execute_money / $edu_total_money * 100,2);?></td>
				</tr>
			<?
		}
	}
?>
	<tr>
		<td height="40" colspan="22">承辦人：　　　　　　　　　　　　　　　　　　　　主管科長：　　　　　　　　　　　　　　　　　　　　局 (處) 長：</td>
	</tr>
</table>
</div>
<?php 
	include "../../function/button_print.php";
	echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
	echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>
