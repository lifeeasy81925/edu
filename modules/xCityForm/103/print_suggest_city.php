<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$school_year = 103; //為學年度
	$table_name_ary = array("", "alc_parenting_education", "alc_education_features", "alc_repair_dormitory", "alc_teaching_equipment"
							  , "alc_aboriginal_education", "alc_transport_car", "alc_school_activity");
	
	$num = $_GET["id"]; //補助1~7
	$table_name = $table_name_ary[$num];
	$table_name_item = $table_name.'_item';
	$a_num = "a".$num;
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">
<? 
	include "../../function/button_print.php"; 
	include "../../function/button_excel.php"; 
?>
<p>
<div id="print_content">
<?
	//====================================================================================================
	//顯示補助項目的表格表頭
	switch($a_num)
	{
		case "a1":
			?>
				初審結果列表：補助項目一【推展親職教育活動】
				<table border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td width="36" rowspan="2" align="center">序號</td>
						<td width="65" rowspan="2" align="center">學校編號</td>
						<td width="120" rowspan="2" align="center">學校名稱</td>
						<td colspan="3" align="center" bgcolor="#66FF99">學校申請金額</td>
						<td colspan="3" align="center" bgcolor="#FFCC66">申請與初審差額</td>
						<td colspan="4" align="center" bgcolor="#FF9933">縣市初審結果</td>
					</tr>
					<tr>
						<td bgcolor="#66FF99">親職教育活動 </td>
						<td bgcolor="#66FF99">家庭訪視輔導</td>
						<td align="center" bgcolor="#66FF99">合計</td>
						<td bgcolor="#FFCC66">親職教育活動</td>
						<td bgcolor="#FFCC66">家庭訪視輔導</td>
						<td align="center" bgcolor="#FFCC66">合計</td>
						<td bgcolor="#FF9933">親職教育活動</td>
						<td bgcolor="#FF9933">家庭訪視輔導</td>
						<td align="center" bgcolor="#FF9933">合計</td>
						<td align="center" bgcolor="#FF9933">初審意見</td>
					</tr>
			<?
			break;
		case "a2":
			?>
				初審結果列表：補助項目二【補助學校發展教育特色】
				<table border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td width="36" rowspan="2" align="center">序號</td>
						<td width="65" rowspan="2" align="center">學校編號</td>
						<td width="120" rowspan="2" align="center">學校名稱</td>
						<td colspan="3" align="center" bgcolor="#66FF99">學校申請金額</td>
						<td colspan="3" align="center" bgcolor="#FFCC66">申請與初審差額</td>
						<td colspan="4" align="center" bgcolor="#FF9933">縣市初審結果</td>
					</tr>
					<tr>
						<td bgcolor="#66FF99">經常門 </td>
						<td bgcolor="#66FF99">資本門</td>
						<td align="center" bgcolor="#66FF99">合計</td>
						<td bgcolor="#FFCC66">經常門</td>
						<td bgcolor="#FFCC66">資本門</td>
						<td align="center" bgcolor="#FFCC66">合計</td>
						<td bgcolor="#FF9933">經常門</td>
						<td bgcolor="#FF9933">資本門</td>
						<td align="center" bgcolor="#FF9933">合計</td>
						<td align="center" bgcolor="#FF9933">初審意見</td>
					</tr>
			<?
			break;
		case "a3":
			?>
				初審結果列表：補助項目三【修繕離島或偏遠地區師生宿舍】
				<table border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td width="36" rowspan="2" align="center">序號</td>
						<td width="65" rowspan="2" align="center">學校編號</td>
						<td width="120" rowspan="2" align="center">學校名稱</td>
						<td colspan="3" align="center" bgcolor="#66FF99">學校申請金額</td>
						<td colspan="3" align="center" bgcolor="#FFCC66">申請與初審差額</td>
						<td colspan="4" align="center" bgcolor="#FF9933">縣市初審結果</td>
					</tr>
					<tr>
						<td align="center" bgcolor="#66FF99">經常門</td>
						<td align="center" bgcolor="#66FF99">資本門</td>
						<td align="center" bgcolor="#66FF99">合計</td>
						<td align="center" bgcolor="#FFCC66">經常門</td>
						<td align="center" bgcolor="#FFCC66">資本門</td>
						<td align="center" bgcolor="#FFCC66">合計</td>
						<td align="center" bgcolor="#FF9933">經常門</td>
						<td align="center" bgcolor="#FF9933">資本門</td>
						<td align="center" bgcolor="#FF9933">合計</td>
						<td align="center" bgcolor="#FF9933">初審意見</td>
					</tr>
			<?
			break;
		case "a4":
			?>
				初審結果列表：補助項目四【充實學校基本教學設備】
				<table border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td width="36" rowspan="2" align="center">序號</td>
						<td width="65" rowspan="2" align="center">學校編號</td>
						<td width="120" rowspan="2" align="center">學校名稱</td>
						<td colspan="3" align="center" bgcolor="#66FF99">學校申請金額</td>
						<td colspan="3" align="center" bgcolor="#FFCC66">申請與初審差額</td>
						<td colspan="4" align="center" bgcolor="#FF9933">縣市初審結果</td>
					</tr>
					<tr>
						<td align="center" bgcolor="#66FF99">經常門</td>
						<td align="center" bgcolor="#66FF99">資本門</td>
						<td align="center" bgcolor="#66FF99">合計</td>
						<td align="center" bgcolor="#FFCC66">經常門</td>
						<td align="center" bgcolor="#FFCC66">資本門</td>
						<td align="center" bgcolor="#FFCC66">合計</td>
						<td align="center" bgcolor="#FF9933">經常門</td>
						<td align="center" bgcolor="#FF9933">資本門</td>
						<td align="center" bgcolor="#FF9933">合計</td>
						<td align="center" bgcolor="#FF9933">初審意見</td>
					</tr>
			<?
			break;
		case "a5":
			?>
				初審結果列表：補助項目五【發展原住民教育文化特色及充實設備器材】
				<table border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td width="36" rowspan="2" align="center">序號</td>
						<td width="65" rowspan="2" align="center">學校編號</td>
						<td width="120" rowspan="2" align="center">學校名稱</td>
						<td colspan="3" align="center" bgcolor="#66FF99">學校申請金額</td>
						<td colspan="3" align="center" bgcolor="#FFCC66">申請與初審差額</td>
						<td colspan="4" align="center" bgcolor="#FF9933">縣市初審結果</td>
					</tr>
					<tr>
						<td align="center" bgcolor="#66FF99">經常門</td>
						<td align="center" bgcolor="#66FF99">資本門</td>
						<td align="center" bgcolor="#66FF99">合計</td>
						<td align="center" bgcolor="#FFCC66">經常門</td>
						<td align="center" bgcolor="#FFCC66">資本門</td>
						<td align="center" bgcolor="#FFCC66">合計</td>
						<td align="center" bgcolor="#FF9933">經常門</td>
						<td align="center" bgcolor="#FF9933">資本門</td>
						<td align="center" bgcolor="#FF9933">合計</td>
						<td align="center" bgcolor="#FF9933">初審意見</td>
					</tr>
			<?
			break;
		case "a6":
			?>
				初審結果列表：補助項目六【補助交通不便地區學校交通車】
				<table border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td width="36" rowspan="2" align="center">序號</td>
						<td width="65" rowspan="2" align="center">學校編號</td>
						<td width="120" rowspan="2" align="center">學校名稱</td>
						<td colspan="4" align="center" bgcolor="#66FF99">學校申請金額</td>
						<td colspan="4" align="center" bgcolor="#FFCC66">申請與初審差額</td>
						<td colspan="5" align="center" bgcolor="#FF9933">縣市初審結果</td>
					</tr>
					<tr>
						<td align="center" bgcolor="#66FF99">租車費</td>
						<td align="center" bgcolor="#66FF99">交通費</td>
						<td align="center" bgcolor="#66FF99">交通車</td>
						<td align="center" bgcolor="#66FF99">合計</td>
						<td align="center" bgcolor="#FFCC66">租車費</td>
						<td align="center" bgcolor="#FFCC66">交通費</td>
						<td align="center" bgcolor="#FFCC66">交通車</td>
						<td align="center" bgcolor="#FFCC66">合計</td>
						<td align="center" bgcolor="#FF9933">租車費</td>
						<td align="center" bgcolor="#FF9933">交通費</td>
						<td align="center" bgcolor="#FF9933">交通車</td>
						<td align="center" bgcolor="#FF9933">合計</td>
						<td align="center" bgcolor="#FF9933">初審意見</td>
					</tr>
			<?
			break;
		case "a7":
			?>
				初審結果列表：補助項目七【整修學校社區化活動場所】
				<table border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td width="36" rowspan="2" align="center">序號</td>
						<td width="65" rowspan="2" align="center">學校編號</td>
						<td width="120" rowspan="2" align="center">學校名稱</td>
						<td colspan="3" align="center" bgcolor="#66FF99">學校申請金額</td>
						<td colspan="3" align="center" bgcolor="#FFCC66">申請與初審差額</td>
						<td colspan="4" align="center" bgcolor="#FF9933">縣市初審結果</td>
					</tr>
					<tr>
						<td align="center" bgcolor="#66FF99">修建</td>
						<td align="center" bgcolor="#66FF99">設備</td>
						<td align="center" bgcolor="#66FF99">合計</td>
						<td align="center" bgcolor="#FFCC66">修建</td>
						<td align="center" bgcolor="#FFCC66">設備</td>
						<td align="center" bgcolor="#FFCC66">合計</td>
						<td align="center" bgcolor="#FF9933">修建</td>
						<td align="center" bgcolor="#FF9933">設備</td>
						<td align="center" bgcolor="#FF9933">合計</td>
						<td align="center" bgcolor="#FF9933">初審意見</td>
					</tr>
			<?
			break;
		default:
			echo "初審結果列表：查無所選項目";
	}
	
	//====================================================================================================
	//顯示學校資料
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補助資料
		   "      , $a_num.* ".
		   		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
		   " where sy.school_year = '$school_year' ". 
		   "   and sd.enabled = 'Y' ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.cityname, sd.account ";
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
		
		$student = $row['student'];
		
		//總金額
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money'];
		$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money'];
		
		//差額
		$diff_total_money = $city_total_money - $s_total_money;
		
		//縣市審核意見
		$city_desc = $row['city_desc'];
		
		switch($a_num)
		{
			case "a1":
				//============================================================
				//補一資料
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
				$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
				
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				
				//差額
				$diff_p1_money = $city_p1_money - $s_p1_money;
				$diff_p2_money = $city_p2_money - $s_p2_money;
				
				//總計
				$sum_s_total_money += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_diff_total_money += $diff_total_money;
				
				$sum_s_p1_money += $s_p1_money;
				$sum_s_p2_money += $s_p2_money;
								
				$sum_city_p1_money += $city_p1_money;
				$sum_city_p2_money += $city_p2_money;
				
				$sum_diff_p1_money += $diff_p1_money;
				$sum_diff_p2_money += $diff_p2_money;
				
				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr>
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$cityname.$district.$schoolname;?></td>
							<td align='right'><?=number_format($s_p1_money);?></td>
							<td align='right'><?=number_format($s_p2_money);?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($s_total_money);?></td>
							<td align='right'><?=number_format($diff_p1_money);?></td>
							<td align='right'><?=number_format($diff_p2_money);?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($diff_total_money);?></td>
							<td align='right'><?=number_format($city_p1_money);?></td>
							<td align='right'><?=number_format($city_p2_money);?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($city_total_money);?></td>
							<td align='left'><?=$city_desc;?></td>
						</tr>
					<?
				}
				//補一資料
				//============================================================
				break;
				
			case "a2":
				//============================================================
				//補二資料
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
				$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];
				
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];
				
				//差額
				$diff_p1_current_money = $city_p1_current_money - $s_p1_current_money;
				$diff_p1_capital_money = $city_p1_capital_money - $s_p1_capital_money;
				$diff_p2_current_money = $city_p2_current_money - $s_p2_current_money;
				$diff_p2_capital_money = $city_p2_capital_money - $s_p2_capital_money;
				
				//資本經常，各自加總
				$s_current_money = $s_p1_current_money + $s_p2_current_money;
				$s_capital_money = $s_p1_capital_money + $s_p2_capital_money;
				
				$city_current_money = $city_p1_current_money + $city_p2_current_money;
				$city_capital_money = $city_p1_capital_money + $city_p2_capital_money;
				
				$diff_current_money = $diff_p1_current_money + $diff_p2_current_money;
				$diff_capital_money = $diff_p1_capital_money + $diff_p2_capital_money;
				
				//總計
				$sum_s_total_money += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_diff_total_money += $diff_total_money;
				
				$sum_s_current_money += $s_current_money;
				$sum_s_capital_money += $s_capital_money;
				
				$sum_city_current_money += $city_current_money;
				$sum_city_capital_money += $city_capital_money;
				
				$sum_diff_current_money += $diff_current_money;
				$sum_diff_capital_money += $diff_capital_money;
								
				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr>
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$cityname.$district.$schoolname;?></td>
							<td align='right'><?=number_format($s_current_money);?></td>
							<td align='right'><?=number_format($s_capital_money);?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($s_total_money);?></td>
							<td align='right'><?=number_format($diff_current_money);?></td>
							<td align='right'><?=number_format($diff_capital_money);?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($diff_total_money);?></td>
							<td align='right'><?=number_format($city_current_money);?></td>
							<td align='right'><?=number_format($city_capital_money);?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($city_total_money);?></td>
							<td align='left'><?=$city_desc;?></td>
						</tr>
					<?
				}
				//補二資料
				//============================================================
				break;
				
			case "a3":
				//============================================================
				//補三資料
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
				$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];
				
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];
				
				//差額
				$diff_p1_current_money = $city_p1_current_money - $s_p1_current_money;
				$diff_p1_capital_money = $city_p1_capital_money - $s_p1_capital_money;
				$diff_p2_current_money = $city_p2_current_money - $s_p2_current_money;
				$diff_p2_capital_money = $city_p2_capital_money - $s_p2_capital_money;
				
				//資本經常，各自加總
				$s_current_money = $s_p1_current_money + $s_p2_current_money;
				$s_capital_money = $s_p1_capital_money + $s_p2_capital_money;
				
				$city_current_money = $city_p1_current_money + $city_p2_current_money;
				$city_capital_money = $city_p1_capital_money + $city_p2_capital_money;
				
				$diff_current_money = $diff_p1_current_money + $diff_p2_current_money;
				$diff_capital_money = $diff_p1_capital_money + $diff_p2_capital_money;
				
				//總計
				$sum_s_total_money += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_diff_total_money += $diff_total_money;
				
				$sum_s_current_money += $s_current_money;
				$sum_s_capital_money += $s_capital_money;
				
				$sum_city_current_money += $city_current_money;
				$sum_city_capital_money += $city_capital_money;
				
				$sum_diff_current_money += $diff_current_money;
				$sum_diff_capital_money += $diff_capital_money;
								
				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr>
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$cityname.$district.$schoolname;?></td>
							<td align='right'><?=number_format($s_current_money);?></td>
							<td align='right'><?=number_format($s_capital_money);?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($s_total_money);?></td>
							<td align='right'><?=number_format($diff_current_money);?></td>
							<td align='right'><?=number_format($diff_capital_money);?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($diff_total_money);?></td>
							<td align='right'><?=number_format($city_current_money);?></td>
							<td align='right'><?=number_format($city_capital_money);?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($city_total_money);?></td>
							<td align='left'><?=$city_desc;?></td>
						</tr>
					<?
				}
				//補三資料
				//============================================================
				break;
				
			case "a4":
				//============================================================
				//補四資料
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				
				//差額
				$diff_p1_current_money = $city_p1_current_money - $s_p1_current_money;
				$diff_p1_capital_money = $city_p1_capital_money - $s_p1_capital_money;
				
				//總計
				$sum_s_total_money += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_diff_total_money += $diff_total_money;
				
				$sum_s_current_money += $s_p1_current_money;
				$sum_s_capital_money += $s_p1_capital_money;
				
				$sum_city_current_money += $city_p1_current_money;
				$sum_city_capital_money += $city_p1_capital_money;
				
				$sum_diff_current_money += $diff_p1_current_money;
				$sum_diff_capital_money += $diff_p1_capital_money;
								
				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr>
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$cityname.$district.$schoolname;?></td>
							<td align='right'><?=number_format($s_p1_current_money);?></td>
							<td align='right'><?=number_format($s_p1_capital_money);?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($s_total_money);?></td>
							<td align='right'><?=number_format($diff_p1_current_money);?></td>
							<td align='right'><?=number_format($diff_p1_capital_money);?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($diff_total_money);?></td>
							<td align='right'><?=number_format($city_p1_current_money);?></td>
							<td align='right'><?=number_format($city_p1_capital_money);?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($city_total_money);?></td>
							<td align='left'><?=$city_desc;?></td>
						</tr>
					<?
				}
				//補四資料
				//============================================================
				break;
				
			case "a5":
				//============================================================
				//補五資料
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
				$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];
				
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];
				
				//差額
				$diff_p1_current_money = $city_p1_current_money - $s_p1_current_money;
				$diff_p1_capital_money = $city_p1_capital_money - $s_p1_capital_money;
				$diff_p2_current_money = $city_p2_current_money - $s_p2_current_money;
				$diff_p2_capital_money = $city_p2_capital_money - $s_p2_capital_money;
				
				//資本經常，各自加總
				$s_current_money = $s_p1_current_money + $s_p2_current_money;
				$s_capital_money = $s_p1_capital_money + $s_p2_capital_money;
				
				$city_current_money = $city_p1_current_money + $city_p2_current_money;
				$city_capital_money = $city_p1_capital_money + $city_p2_capital_money;
				
				$diff_current_money = $diff_p1_current_money + $diff_p2_current_money;
				$diff_capital_money = $diff_p1_capital_money + $diff_p2_capital_money;
				
				//總計
				$sum_s_total_money += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_diff_total_money += $diff_total_money;
				
				$sum_s_current_money += $s_current_money;
				$sum_s_capital_money += $s_capital_money;
				
				$sum_city_current_money += $city_current_money;
				$sum_city_capital_money += $city_capital_money;
				
				$sum_diff_current_money += $diff_current_money;
				$sum_diff_capital_money += $diff_capital_money;
								
				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr>
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$cityname.$district.$schoolname;?></td>
							<td align='right'><?=number_format($s_current_money);?></td>
							<td align='right'><?=number_format($s_capital_money);?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($s_total_money);?></td>
							<td align='right'><?=number_format($diff_current_money);?></td>
							<td align='right'><?=number_format($diff_capital_money);?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($diff_total_money);?></td>
							<td align='right'><?=number_format($city_current_money);?></td>
							<td align='right'><?=number_format($city_capital_money);?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($city_total_money);?></td>
							<td align='left'><?=$city_desc;?></td>
						</tr>
					<?
				}
				//補五資料
				//============================================================
				break;
				
			case "a6":
				//============================================================
				//補六資料
				$item = $row['item'];
				$s_money = ($row['s_money'] == '')?0:$row['s_money'];
				
				$city_money = ($row['city_money'] == '')?0:$row['city_money'];
				
				$diff_money = $city_money - $s_money;
				
				//總計
				$sum_s_total_money += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_diff_total_money += $diff_total_money;
				
				$sum_s_money_1 += ($item == '租車費')?$s_money:0;
				$sum_s_money_2 += ($item == '交通費')?$s_money:0;
				$sum_s_money_3 += ($item == '購置交通車')?$s_money:0;
				
				$sum_city_money_1 += ($item == '租車費')?$city_money:0;
				$sum_city_money_2 += ($item == '交通費')?$city_money:0;
				$sum_city_money_3 += ($item == '購置交通車')?$city_money:0;
				
				$sum_diff_money_1 += $sum_city_money_1 - $sum_s_money_1;
				$sum_diff_money_2 += $sum_city_money_2 - $sum_s_money_2;
				$sum_diff_money_3 += $sum_city_money_3 - $sum_s_money_3;
								
				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr>
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$cityname.$district.$schoolname;?></td>
							<td align='right'><?=($item == '租車費')?number_format($s_money):0;?></td>
							<td align='right'><?=($item == '交通費')?number_format($s_money):0;?></td>
							<td align='right'><?=($item == '購置交通車')?number_format($s_money):0;?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($s_total_money);?></td>
							<td align='right'><?=($item == '租車費')?number_format($diff_money):0;?></td>
							<td align='right'><?=($item == '交通費')?number_format($diff_money):0;?></td>
							<td align='right'><?=($item == '購置交通車')?number_format($diff_money):0;?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($diff_total_money);?></td>
							<td align='right'><?=($item == '租車費')?number_format($city_money):0;?></td>
							<td align='right'><?=($item == '交通費')?number_format($city_money):0;?></td>
							<td align='right'><?=($item == '購置交通車')?number_format($city_money):0;?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($city_total_money);?></td>
							<td align='left'><?=$city_desc;?></td>
						</tr>
					<?
				}
				//補六資料
				//============================================================
				break;
				
			case "a7":
				//============================================================
				//補七資料
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				
				//差額
				$diff_p1_current_money = $city_p1_current_money - $s_p1_current_money;
				$diff_p1_capital_money = $city_p1_capital_money - $s_p1_capital_money;
				
				//總計
				$sum_s_total_money += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_diff_total_money += $diff_total_money;
				
				$sum_s_current_money += $s_p1_current_money;
				$sum_s_capital_money += $s_p1_capital_money;
				
				$sum_city_current_money += $city_p1_current_money;
				$sum_city_capital_money += $city_p1_capital_money;
				
				$sum_diff_current_money += $diff_p1_current_money;
				$sum_diff_capital_money += $diff_p1_capital_money;
								
				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr>
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$cityname.$district.$schoolname;?></td>
							<td align='right'><?=number_format($s_p1_current_money);?></td>
							<td align='right'><?=number_format($s_p1_capital_money);?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($s_total_money);?></td>
							<td align='right'><?=number_format($diff_p1_current_money);?></td>
							<td align='right'><?=number_format($diff_p1_capital_money);?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($diff_total_money);?></td>
							<td align='right'><?=number_format($city_p1_current_money);?></td>
							<td align='right'><?=number_format($city_p1_capital_money);?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($city_total_money);?></td>
							<td align='left'><?=$city_desc;?></td>
						</tr>
					<?
				}
				//補七資料
				//============================================================
				break;
				
			default:
				break;
		}
		
	} //while的右括號
	
	//====================================================================================================
	//顯示表尾的總計
	switch($a_num)
	{
		case "a1":
			?>
					<tr>
						<td colspan="2" align="center">合計</td>
						<td align="center"><?=$serial;?>校</td>
						<td align='right' bgcolor="#66FF99"><?=number_format($sum_s_p1_money);?></td>
						<td align='right' bgcolor="#66FF99"><?=number_format($sum_s_p2_money);?></td>
						<td align='right' bgcolor="#66FF99"><?=number_format($sum_s_total_money);?></td>
						<td align='right' bgcolor="#FFCC66"><?=number_format($sum_diff_p1_money);?></td>
						<td align='right' bgcolor="#FFCC66"><?=number_format($sum_diff_p2_money);?></td>
						<td align='right' bgcolor="#FFCC66"><?=number_format($sum_diff_total_money);?></td>
						<td align='right' bgcolor="#FF9933"><?=number_format($sum_city_p1_money);?></td>
						<td align='right' bgcolor="#FF9933"><?=number_format($sum_city_p2_money);?></td>
						<td align='right' bgcolor="#FF9933"><?=number_format($sum_city_total_money);?></td>
						<td bgcolor="#FF9933">&nbsp;</td>
					</tr>
				</table>
			<?
			break;
			
		case "a2":
			?>
					<tr>
						<td colspan="2" align="center">合計</td>
						<td align="center"><?=$serial;?>校</td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_current_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_capital_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_total_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_current_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_capital_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_total_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_current_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_capital_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_total_money); ?></td>
						<td bgcolor="#FF9933">&nbsp;</td>
					</tr>
				</table>
			<?
			break;
			
		case "a3":
			?>
					<tr>
						<td colspan="2" align="center">合計</td>
						<td align="center"><?=$serial;?>校</td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_current_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_capital_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_total_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_current_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_capital_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_total_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_current_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_capital_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_total_money); ?></td>
						<td bgcolor="#FF9933">&nbsp;</td>
					</tr>
				</table>
			<?
			break;
			
		case "a4":
			?>
					<tr>
						<td colspan="2" align="center">合計</td>
						<td align="center"><?=$serial;?>校</td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_current_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_capital_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_total_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_current_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_capital_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_total_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_current_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_capital_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_total_money); ?></td>
						<td bgcolor="#FF9933">&nbsp;</td>
					</tr>
				</table>
			<?
			break;
			
		case "a5":
			?>
					<tr>
						<td colspan="2" align="center">合計</td>
						<td align="center"><?=$serial;?>校</td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_current_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_capital_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_total_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_current_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_capital_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_total_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_current_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_capital_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_total_money); ?></td>
						<td bgcolor="#FF9933">&nbsp;</td>
					</tr>
				</table>
			<?
			break;
			
		case "a6":
			?>
					<tr>
						<td colspan="2" align="center">合計</td>
						<td align="center"><?=$serial;?>校</td>
							<td align='right' bgcolor="#66FF99"><?=($item == '租車費')?number_format($sum_s_money_1):0;?></td>
							<td align='right' bgcolor="#66FF99"><?=($item == '交通費')?number_format($sum_s_money_2):0;?></td>
							<td align='right' bgcolor="#66FF99"><?=($item == '購置交通車')?number_format($sum_s_money_3):0;?></td>
							<td align='right' bgcolor="#66FF99"><?=number_format($sum_s_total_money);?></td>
							<td align='right' bgcolor="#FFCC66"><?=($item == '租車費')?number_format($sum_diff_money_1):0;?></td>
							<td align='right' bgcolor="#FFCC66"><?=($item == '交通費')?number_format($sum_diff_money_2):0;?></td>
							<td align='right' bgcolor="#FFCC66"><?=($item == '購置交通車')?number_format($sum_diff_money_3):0;?></td>
							<td align='right' bgcolor="#FFCC66"><?=number_format($sum_diff_total_money);?></td>
							<td align='right' bgcolor="#FF9933"><?=($item == '租車費')?number_format($sum_city_money_1):0;?></td>
							<td align='right' bgcolor="#FF9933"><?=($item == '交通費')?number_format($sum_city_money_2):0;?></td>
							<td align='right' bgcolor="#FF9933"><?=($item == '購置交通車')?number_format($sum_city_money_3):0;?></td>
							<td align='right' bgcolor="#FF9933"><?=number_format($sum_city_total_money);?></td>
						<td bgcolor="#FF9933">&nbsp;</td>
					</tr>
				</table>
			<?
			break;
			
		case "a7":
			?>
					<tr>
						<td colspan="2" align="center">合計</td>
						<td align="center"><?=$serial;?>校</td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_current_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_capital_money); ?></td>
						<td align="right" bgcolor="#66FF99"><? echo number_format($sum_s_total_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_current_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_capital_money); ?></td>
						<td align="right" bgcolor="#FFCC66"><? echo number_format($sum_diff_total_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_current_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_capital_money); ?></td>
						<td align="right" bgcolor="#FF9933"><? echo number_format($sum_city_total_money); ?></td>
						<td bgcolor="#FF9933">&nbsp;</td>
					</tr>
				</table>
			<?
			break;
			
		default:
			break;
	}
	
?>
</div>
<p>
若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br />
操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
<p>
<b>前往其他頁面：</b>
<?
	$str = array("","一","二","三","四","五","六","七");
	for($i = 1;$i <= 7;$i++)
	{
		echo "<a href='print_suggest_city.php?id=$i'>補助".$str[$i]."</a>&nbsp;";
	}
?>