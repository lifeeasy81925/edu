<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$get_id = $_GET['ct'];
	
	if($get_id != "")
		$cityname = $get_id;
		
	$show_allowance = $_GET['op']; //op = 1 ~ 7
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<p>
您搜尋的縣市為「<?=$cityname; ?>」
<p>
<font color="blue"><strong>教育部推動教育優先區計畫<?=$school_year;?>年度 成效評估填報狀況一覽表</strong></font>
<p><b>僅顯示：</b>
	<a href="effect_list.php">全部顯示</a>&nbsp;
	<a href="effect_list.php?op=1">補助一</a>&nbsp;
	<a href="effect_list.php?op=2">補助二</a>&nbsp;
	<a href="effect_list.php?op=3">補助三</a>&nbsp;
	<a href="effect_list.php?op=4">補助四</a>&nbsp;
	<a href="effect_list.php?op=5">補助五</a>&nbsp;
	<a href="effect_list.php?op=6">補助六</a>&nbsp;
	<a href="effect_list.php?op=7">補助七</a>&nbsp;
	<a href="effect_list_simple.php" target="_blank">簡表</a>&nbsp;
</p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td width="150" height="60" align="center" bgcolor="#99CCCC">補助項目</td>
		<td width="90" height="30" align="center" bgcolor="#99CCCC">核定金額</td>
		<td width="90" height="30"align="center" bgcolor="#99CCCC"><p>執行金額</p></td>
		<td width="90" height="30"align="center" bgcolor="#99CCCC">剩餘金額</td>
		<td width="90" height="30"align="center" bgcolor="#99CCCC">執行進度</td>
		<td width="90" height="30"align="center" bgcolor="#99CCCC"><font color="red">執行情形</font></td>
	</tr>
	
<?
	//教育部核定金額
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   
		   //補一教育部資料
		   "      , a1.edu_p1_money as a1_p1_money, a1.edu_p2_money as a1_p2_money ".
		   "      , a1.edu_total_money as a1_edu_total_money ".
		   "      , a1.edu_desc as a1_edu_desc ".
		   
		   //補二教育部資料
		   "      , a2.s_p1_money as a2_s_p1_money ".
		   "      , a2.s_p2_money as a2_s_p2_money ".
		   "      , a2.edu_total_money as a2_edu_total_money ".
		   "      , a2.edu_desc as a2_edu_desc ".
		   "      , a2.edu_desc_p2 as a2_edu_desc_p2 ".
		   "      , a2.edu_desc_ny1 as a2_edu_desc_ny1 ".
		   "      , a2.edu_desc_ny1_p2 as a2_edu_desc_ny1_ny1_p2 ".
		   "      , a2.edu_desc_ny2 as a2_edu_desc_ny2 ".
		   "      , a2.edu_desc_ny2_p2 as a2_edu_desc_ny2_p2 ".
		   
		   //補三教育部資料
		   "      , a3.edu_total_money as a3_edu_total_money ".
		   "      , a3.edu_desc as a3_edu_desc ".
		   
		   //補四教育部資料
		   "      , a4.edu_total_money as a4_edu_total_money ".
		   "      , a4.edu_desc as a4_edu_desc ".
		   
		   //補五教育部資料
		   "      , a5.s_p1_money as a5_s_p1_money ".
		   "      , a5.s_p2_money as a5_s_p2_money ".
		   "      , a5.edu_total_money as a5_edu_total_money ".
		   "      , a5.edu_desc as a5_edu_desc ".
		   "      , a5.edu_desc_p2 as a5_edu_desc_p2 ".
		   "      , a5.edu_desc_ny1 as a5_edu_desc_ny1 ".
		   "      , a5.edu_desc_ny1_p2 as a5_edu_desc_ny1_ny1_p2 ".
		   "      , a5.edu_desc_ny2 as a5_edu_desc_ny2 ".
		   "      , a5.edu_desc_ny2_p2 as a5_edu_desc_ny2_p2 ".
		   
		   //補六教育部資料
		   "      , a6.edu_total_money as a6_edu_total_money ".
		   "      , a6.edu_desc as a6_edu_desc ".
		   
		   //補七教育部資料
		   "      , a7.edu_total_money as a7_edu_total_money ".
		   "      , a7.edu_desc as a7_edu_desc ".
		   
		   //成果填報上傳時間
		   "      , a1_e.update_date as a1_e_update_date ".
		   "      , a2_e.update_date as a2_e_update_date ".
		   "      , a3_e.update_date as a3_e_update_date ".
		   "      , a4_e.update_date as a4_e_update_date ".
		   "      , a5_e.update_date as a5_e_update_date ".
		   "      , a6_e.update_date as a6_e_update_date ".
		   "      , a7_e.update_date as a7_e_update_date ".
		   
		   //執行金額
		   "      , a1_e.execute_money as a1_e_execute_money ".
		   "      , a2_e.execute_money as a2_e_execute_money ".
		   "      , a3_e.execute_money as a3_e_execute_money ".
		   "      , a4_e.execute_money as a4_e_execute_money ".
		   "      , a5_e.execute_money as a5_e_execute_money ".
		   "      , a6_e.execute_money as a6_e_execute_money ".
		   "      , a7_e.execute_money as a7_e_execute_money ".
		   
		   //上傳的檔案
		   "      , sun.a1_1, sun.a1_2, sun.a2_1, sun.a2_2, sun.a3_1, sun.a4_1, sun.a5_1, sun.a5_2, sun.a6_1, sun.a7_1 ".
		   "      , sun.effect_a1_1, sun.effect_a1_2, sun.effect_a1_3, sun.effect_a1_4 ".
		   "      , sun.effect_a2_1, sun.effect_a2_2, sun.effect_a2_3 ".
		   "      , sun.effect_a3_1, sun.effect_a3_2, sun.effect_a3_3 ".
		   "      , sun.effect_a4_1, sun.effect_a4_2, sun.effect_a4_3 ".
		   "      , sun.effect_a5_1, sun.effect_a5_2, sun.effect_a5_3 ".
		   "      , sun.effect_a6_1, sun.effect_a6_2, sun.effect_a6_3 ".
		   "      , sun.effect_a7_1, sun.effect_a7_2, sun.effect_a7_3 ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   "                       left join school_upload_name as sun on sy.seq_no = sun.sy_seq ".
		   //成果填報資料表
		   "                       left join alc_parenting_education_effect as a1_e on sy.seq_no = a1_e.sy_seq ".
		   "                       left join alc_education_features_effect as a2_e on sy.seq_no = a2_e.sy_seq ".
		   "                       left join alc_repair_dormitory_effect as a3_e on sy.seq_no = a3_e.sy_seq ".
		   "                       left join alc_teaching_equipment_effect as a4_e on sy.seq_no = a4_e.sy_seq ".
		   "                       left join alc_aboriginal_education_effect as a5_e on sy.seq_no = a5_e.sy_seq ".
		   "                       left join alc_transport_car_effect as a6_e on sy.seq_no = a6_e.sy_seq ".
		   "                       left join alc_school_activity_effect as a7_e on sy.seq_no = a7_e.sy_seq ".
		   
		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.cityname, sd.account ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial = 0;
	$not_filled = 0; //尚未填寫
	$selected_execute_money = 0;
	$selected_edu_total_money = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$main_seq = $row['seq_no']; //school_year的seq_no
		
		$a1_edu_desc = ($row['a1_edu_desc'] == '')?"-":$row['a1_edu_desc'];
		$a2_edu_desc = ($row['a2_edu_desc'] == '')?"-":$row['a2_edu_desc'];
		$a2_edu_desc_p2 = ($row['a2_edu_desc_p2'] == '')?"-":$row['a2_edu_desc_p2'];
		$a2_edu_desc_ny1 = ($row['a2_edu_desc_ny1'] == '')?"-":$row['a2_edu_desc_ny1'];
		$a2_edu_desc_ny1_p2 = ($row['a2_edu_desc_ny1_p2'] == '')?"-":$row['a2_edu_desc_ny1_p2'];
		$a2_edu_desc_ny2 = ($row['a2_edu_desc_ny2'] == '')?"-":$row['a2_edu_desc_ny2'];
		$a2_edu_desc_ny2_p2 = ($row['a2_edu_desc_ny2_p2'] == '')?"-":$row['a2_edu_desc_ny2_p2'];
		$a3_edu_desc = ($row['a3_edu_desc'] == '')?"-":$row['a3_edu_desc'];
		$a4_edu_desc = ($row['a4_edu_desc'] == '')?"-":$row['a4_edu_desc'];
		$a5_edu_desc = ($row['a5_edu_desc'] == '')?"-":$row['a5_edu_desc'];
		$a5_edu_desc_p2 = ($row['a5_edu_desc_p2'] == '')?"-":$row['a5_edu_desc_p2'];
		$a5_edu_desc_ny1 = ($row['a5_edu_desc_ny1'] == '')?"-":$row['a5_edu_desc_ny1'];
		$a5_edu_desc_ny1_p2 = ($row['a5_edu_desc_ny1_p2'] == '')?"-":$row['a5_edu_desc_ny1_p2'];
		$a5_edu_desc_ny2 = ($row['a5_edu_desc_ny2'] == '')?"-":$row['a5_edu_desc_ny2'];
		$a5_edu_desc_ny2_p2 = ($row['a5_edu_desc_ny2_p2'] == '')?"-":$row['a5_edu_desc_ny2_p2'];
		$a6_edu_desc = ($row['a6_edu_desc'] == '')?"-":$row['a6_edu_desc'];
		$a7_edu_desc = ($row['a7_edu_desc'] == '')?"-":$row['a7_edu_desc'];
		
		//最填寫日期
		$a1_e_update_date = $row['a1_e_update_date'];
		$a2_e_update_date = $row['a2_e_update_date'];
		$a3_e_update_date = $row['a3_e_update_date'];
		$a4_e_update_date = $row['a4_e_update_date'];
		$a5_e_update_date = $row['a5_e_update_date'];
		$a6_e_update_date = $row['a6_e_update_date'];
		$a7_e_update_date = $row['a7_e_update_date'];
		
		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money']; 
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money']; 
		
		$a2_s_p1_money = ($row['a2_s_p1_money'] == '')?0:$row['a2_s_p1_money']; 
		$a2_s_p2_money = ($row['a2_s_p2_money'] == '')?0:$row['a2_s_p2_money']; 
				
		$a5_s_p1_money = ($row['a5_s_p1_money'] == '')?0:$row['a5_s_p1_money']; 
		$a5_s_p2_money = ($row['a5_s_p2_money'] == '')?0:$row['a5_s_p2_money']; 
		
		//核定金額
		$a1_edu_total_money = ($row['a1_edu_total_money'] == '')?0:$row['a1_edu_total_money']; //NULL則填入0
		$a2_edu_total_money = ($row['a2_edu_total_money'] == '')?0:$row['a2_edu_total_money'];
		$a3_edu_total_money = ($row['a3_edu_total_money'] == '')?0:$row['a3_edu_total_money'];
		$a4_edu_total_money = ($row['a4_edu_total_money'] == '')?0:$row['a4_edu_total_money'];
		$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money'];
		$a6_edu_total_money = ($row['a6_edu_total_money'] == '')?0:$row['a6_edu_total_money'];
		$a7_edu_total_money = ($row['a7_edu_total_money'] == '')?0:$row['a7_edu_total_money'];
		
		$sum_edu_total_money = $a1_edu_total_money + $a2_edu_total_money 
							 + $a3_edu_total_money + $a4_edu_total_money 
							 + $a5_edu_total_money + $a6_edu_total_money 
							 + $a7_edu_total_money;
		
		//執行金額
		$a1_execute_money = ($row['a1_e_execute_money'] == '')?0:$row['a1_e_execute_money']; //NULL則填入0
		$a2_execute_money = ($row['a2_e_execute_money'] == '')?0:$row['a2_e_execute_money'];
		$a3_execute_money = ($row['a3_e_execute_money'] == '')?0:$row['a3_e_execute_money'];
		$a4_execute_money = ($row['a4_e_execute_money'] == '')?0:$row['a4_e_execute_money'];
		$a5_execute_money = ($row['a5_e_execute_money'] == '')?0:$row['a5_e_execute_money'];
		$a6_execute_money = ($row['a6_e_execute_money'] == '')?0:$row['a6_e_execute_money'];
		$a7_execute_money = ($row['a7_e_execute_money'] == '')?0:$row['a7_e_execute_money'];
		$sum_execute_money = $a1_execute_money + $a2_execute_money 
						  + $a3_execute_money + $a4_execute_money 
						  + $a5_execute_money + $a6_execute_money 
						  + $a7_execute_money;
		
		$a1_percnet = number_format($a1_execute_money / $a1_edu_total_money * 100,2);
		$a2_percnet = number_format($a2_execute_money / $a2_edu_total_money * 100,2);
		$a3_percnet = number_format($a3_execute_money / $a3_edu_total_money * 100,2);
		$a4_percnet = number_format($a4_execute_money / $a4_edu_total_money * 100,2);
		$a5_percnet = number_format($a5_execute_money / $a5_edu_total_money * 100,2);
		$a6_percnet = number_format($a6_execute_money / $a6_edu_total_money * 100,2);
		$a7_percnet = number_format($a7_execute_money / $a7_edu_total_money * 100,2);
		$sum_percnet = number_format($sum_execute_money / $sum_edu_total_money * 100,2);
				
		//依選擇的補助計算總金額
		switch ($show_allowance)
		{
			case "1":
				$selected_execute_money += $a1_execute_money;
				$selected_edu_total_money += $a1_edu_total_money;
				break;
			case "2":
				$selected_execute_money += $a2_execute_money;
				$selected_edu_total_money += $a2_edu_total_money;
				break;
			case "3":
				$selected_execute_money += $a3_execute_money;
				$selected_edu_total_money += $a3_edu_total_money;
				break;
			case "4":
				$selected_execute_money += $a4_execute_money;
				$selected_edu_total_money += $a4_edu_total_money;
				break;
			case "5":
				$selected_execute_money += $a5_execute_money;
				$selected_edu_total_money += $a5_edu_total_money;
				break;
			case "6":
				$selected_execute_money += $a6_execute_money;
				$selected_edu_total_money += $a6_edu_total_money;
				break;
			case "7":
				$selected_execute_money += $a7_execute_money;
				$selected_edu_total_money += $a7_edu_total_money;
				break;
			case "":
				$selected_execute_money += $sum_execute_money;
				$selected_edu_total_money += $sum_edu_total_money;
				break;
		}
		
		//原上傳檔案
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
		$a2_1 = $row['a2_1'];
		$a2_2 = $row['a2_2'];
		$a3_1 = $row['a3_1'];
		$a4_1 = $row['a4_1'];
		$a5_1 = $row['a5_1'];
		$a5_2 = $row['a5_2'];
		$a6_1 = $row['a6_1'];
		$a7_1 = $row['a7_1'];
		
		//核定後後計畫檔案
		$effect_a1_1 = $row['effect_a1_1'];
		$effect_a1_2 = $row['effect_a1_2'];
		$effect_a1_3 = $row['effect_a1_3'];
		$effect_a1_4 = $row['effect_a1_4'];
		$effect_a2_1 = $row['effect_a2_1'];
		$effect_a2_2 = $row['effect_a2_2'];
		$effect_a2_3 = $row['effect_a2_3'];
		$effect_a3_1 = $row['effect_a3_1'];
		$effect_a3_2 = $row['effect_a3_2'];
		$effect_a3_3 = $row['effect_a3_3'];
		$effect_a4_1 = $row['effect_a4_1'];
		$effect_a4_2 = $row['effect_a4_2'];
		$effect_a4_3 = $row['effect_a4_3'];
		$effect_a5_1 = $row['effect_a5_1'];
		$effect_a5_2 = $row['effect_a5_2'];
		$effect_a5_3 = $row['effect_a5_3'];
		$effect_a6_1 = $row['effect_a6_1'];
		$effect_a6_2 = $row['effect_a6_2'];
		$effect_a6_3 = $row['effect_a6_3'];
		$effect_a7_1 = $row['effect_a7_1'];
		$effect_a7_2 = $row['effect_a7_2'];
		$effect_a7_3 = $row['effect_a7_3'];
		
		//$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
		//echo $file_path;
		
		//1040427修改，區分公開路徑$file_path及可能含個資$file_path2
	     $file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
	     $file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
		
		
		if($sum_edu_total_money > 0)
		{			
			//選擇的補助有拿錢才顯示
			if($show_allowance == "" || ($a1_edu_total_money > 0 && $show_allowance == 1) || ($a2_edu_total_money > 0 && $show_allowance == 2)
									 || ($a3_edu_total_money > 0 && $show_allowance == 3) || ($a4_edu_total_money > 0 && $show_allowance == 4)
									 || ($a5_edu_total_money > 0 && $show_allowance == 5) || ($a6_edu_total_money > 0 && $show_allowance == 6) 
									 || ($a7_edu_total_money > 0 && $show_allowance == 7))
			{
				$serial++;
				?>
					<tr>
						<td colspan="6" bgcolor="#DDDD99">
							序號：<?=$serial;?> -- 學校代碼：<?=$account;?> -- 校名：<?=$cityname.$district.$schoolname;?>
						</td>
					</tr>
				<?
			}
			
			//計算選擇的項目還沒填校數
			//1.沒選項目時，某項目有拿錢卻沒填
			//2.有選項目時，該項目有拿錢卻沒填
			if($show_allowance == "")
			{
				if(($a1_edu_total_money > 0 && $a1_e_update_date == "") || ($a2_edu_total_money > 0 && $a2_e_update_date == "")
				|| ($a3_edu_total_money > 0 && $a3_e_update_date == "") || ($a4_edu_total_money > 0 && $a4_e_update_date == "")
				|| ($a5_edu_total_money > 0 && $a5_e_update_date == "") || ($a6_edu_total_money > 0 && $a6_e_update_date == "")
				|| ($a7_edu_total_money > 0 && $a7_e_update_date == ""))
				{
					$not_filled++;
				}
			}
			else
			{
				if(($a1_edu_total_money > 0 && $a1_e_update_date == "" && $show_allowance == 1) 
				|| ($a2_edu_total_money > 0 && $a2_e_update_date == "" && $show_allowance == 2)
				|| ($a3_edu_total_money > 0 && $a3_e_update_date == "" && $show_allowance == 3) 
				|| ($a4_edu_total_money > 0 && $a4_e_update_date == "" && $show_allowance == 4)
				|| ($a5_edu_total_money > 0 && $a5_e_update_date == "" && $show_allowance == 5) 
				|| ($a6_edu_total_money > 0 && $a6_e_update_date == "" && $show_allowance == 6)
				|| ($a7_edu_total_money > 0 && $a7_e_update_date == "" && $show_allowance == 7))
				{
					$not_filled++;
				}
			}
			
			if($a1_edu_total_money > 0 && ($show_allowance == 1 || $show_allowance == "")) //選擇補助1或全部才顯示
			{
				?>
					<tr>
						<td rowspan="4" width="150" height="50">
							1.推展親職教育活動<br /><br /><br />
							最後填寫時間：<br />
							<?
								if($a1_e_update_date == "")
									echo "<font color='red'>尚未填寫</font>";
								else
									echo $a1_e_update_date;
							?>
						</td>
						<td align="right"><?=number_format($a1_edu_total_money); ?></td>
						<td align="right"><?=number_format($a1_execute_money); ?></td>
						<td align="right"><?=number_format($a1_edu_total_money - $a1_execute_money); ?></td>
						<td align="center"><?=$a1_percnet."%"; ?></td>
						<td align="center" rowspan="3">
							<form action='effect_school_01.php' method='post' style='margin:0px; display:inline;'>
								<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
								<input type='submit' name='button' id='button' value='執行情形'>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">原計畫：</font><br />
							<? 
								if($a1_p1_money > 0) //有錢才顯示
								{
									echo get_url($a1_1, $file_path, "親職教育講座實施計畫")."<br />";
								} 
								
								if($a1_p2_money > 0) //有錢才顯示
								{ 
									echo get_url($a1_2, $file_path, "家庭訪視實施計畫")."<br />";
								}
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">修正後計畫：</font><br />
							<?  
								if($a1_p1_money > 0) //有錢才顯示
								{
									echo get_url($effect_a1_1, $file_path, "親職教育講座核定後計畫")."<br />";
								} 
								
								if($a1_p2_money > 0) //有錢才顯示
								{ 
									echo get_url($effect_a1_2, $file_path, "家庭訪視核定後計畫")."<br />";
								}
								
								echo get_url($effect_a1_3, $file_path, "核定後經費概算表")."<br />";
								echo get_url($effect_a1_4, $file_path, "成果照片")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="left">
							<font color="#8000FA">複審意見：</font><br />
							<?=$a1_edu_desc;?>
						</td>
					</tr>
				<?
			}
			if($a2_edu_total_money > 0 && ($show_allowance == 2 || $show_allowance == "")) //選擇補助2或全部才顯示
			{
				?>
					<tr>
						<td rowspan="4" width="150" height="50">
							2.學校發展教育特色<br /><br /><br />
							最後填寫時間：<br />
							<?
								if($a2_e_update_date == "")
									echo "<font color='red'>尚未填寫</font>";
								else
									echo $a2_e_update_date;
							?>
						</td>
						<td align="right"><?=number_format($a2_edu_total_money); ?></td>
						<td align="right"><?=number_format($a2_execute_money); ?></td>
						<td align="right"><?=number_format($a2_edu_total_money - $a2_execute_money); ?></td>
						<td align="center"><?=$a2_percnet."%"; ?></td>
						<td align="center" rowspan="3">
							<form action='effect_school_02.php' method='post' style='margin:0px; display:inline;'>
								<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
								<input type='submit' name='button' id='button' value='執行情形'>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">原計畫：</font><br />
							<?  
								echo get_url($a2_1, $file_path, "特色一實施計畫")."<br />";
								echo get_url($a2_2, $file_path, "特色二實施計畫")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">修正後計畫：</font><br />
							<? 
								echo get_url($effect_a2_1, $file_path, "核定後計畫")."<br />";
								echo get_url($effect_a2_2, $file_path, "核定後經費概算表")."<br />";
								echo get_url($effect_a2_3, $file_path, "成果照片")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="left">
							<font color="#8000FA">複審意見：</font><br />
							<?
								if($a2_s_p1_money > 0) //有錢才顯示
								{
									echo "特色一：".$a2_edu_desc."<br />";
								} 
								if($a2_s_p2_money > 0) //有錢才顯示
								{
									echo "特色二：".$a2_edu_desc_p2."<br />";
								} 
							?>
						</td>
					</tr>
				<?
			}
			if($a3_edu_total_money > 0 && ($show_allowance == 3 || $show_allowance == "")) //選擇補助3或全部才顯示
			{
				?>
					<tr>
						<td rowspan="4" width="150" height="50">
							3.修繕離島或偏遠地區師生宿舍<br /><br /><br />
							最後填寫時間：<br />
							<?
								if($a3_e_update_date == "")
									echo "<font color='red'>尚未填寫</font>";
								else
									echo $a3_e_update_date;
							?>
						</td>
						<td align="right"><?=number_format($a3_edu_total_money); ?></td>
						<td align="right"><?=number_format($a3_execute_money); ?></td>
						<td align="right"><?=number_format($a3_edu_total_money - $a3_execute_money); ?></td>
						<td align="center"><?=$a3_percnet."%"; ?></td>
						<td align="center" rowspan="3">
							<form action='effect_school_03.php' method='post' style='margin:0px; display:inline;'>
								<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
								<input type='submit' name='button' id='button' value='執行情形'>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">原計畫：</font><br />
							<? 
								echo get_url($a3_1, $file_path, "實施計畫")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">修正後計畫：</font><br />
							<?  
								echo get_url($effect_a3_1, $file_path, "核定後計畫")."<br />";
								echo get_url($effect_a3_2, $file_path, "核定後經費概算表")."<br />";
								echo get_url($effect_a3_3, $file_path, "成果照片")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="left">
							<font color="#8000FA">複審意見：</font><br />
							<?=$a3_edu_desc;?>
						</td>
					</tr>
				<?
			}
			if($a4_edu_total_money > 0 && ($show_allowance == 4 || $show_allowance == "")) //選擇補助4或全部才顯示
			{
				?>
					<tr>
						<td rowspan="4" width="150" height="50">
							4.充實學校基本教學設備<br /><br /><br />
							最後填寫時間：<br />
							<?
								if($a4_e_update_date == "")
									echo "<font color='red'>尚未填寫</font>";
								else
									echo $a4_e_update_date;
							?>
						</td>
						<td align="right"><?=number_format($a4_edu_total_money); ?></td>
						<td align="right"><?=number_format($a4_execute_money); ?></td>
						<td align="right"><?=number_format($a4_edu_total_money - $a4_execute_money); ?></td>
						<td align="center"><?=$a4_percnet."%"; ?></td>
						<td align="center" rowspan="3">
							<form action='effect_school_04.php' method='post' style='margin:0px; display:inline;'>
								<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
								<input type='submit' name='button' id='button' value='執行情形'>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">原計畫：</font><br />
							<? 
								echo get_url($a4_1, $file_path, "實施計畫")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">修正後計畫：</font><br />
							<? 
								echo get_url($effect_a4_1, $file_path, "核定後計畫")."<br />";
								echo get_url($effect_a4_2, $file_path, "核定後經費概算表")."<br />";
								echo get_url($effect_a4_3, $file_path, "成果照片")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="left">
							<font color="#8000FA">複審意見：</font><br />
							<?=$a4_edu_desc;?>
						</td>
					</tr>
				<?
			}
			if($a5_edu_total_money > 0 && ($show_allowance == 5 || $show_allowance == "")) //選擇補助5或全部才顯示
			{
				?>
					<tr>
						<td rowspan="4" width="150" height="50">
							5.發展原住民教育文化特色及充實設備器材<br /><br /><br />
							最後填寫時間：<br />
							<?
								if($a5_e_update_date == "")
									echo "<font color='red'>尚未填寫</font>";
								else
									echo $a5_e_update_date;
							?>
						</td>
						<td align="right"><?=number_format($a5_edu_total_money); ?></td>
						<td align="right"><?=number_format($a5_execute_money); ?></td>
						<td align="right"><?=number_format($a5_edu_total_money - $a5_execute_money); ?></td>
						<td align="center"><?=$a5_percnet."%"; ?></td>
						<td align="center" rowspan="3">
							<form action='effect_school_05.php' method='post' style='margin:0px; display:inline;'>
								<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
								<input type='submit' name='button' id='button' value='執行情形'>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">原計畫：</font><br />
							<? 
								echo get_url($a5_1, $file_path, "特色一實施計畫")."<br />";
								echo get_url($a5_2, $file_path, "特色二實施計畫")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">修正後計畫：</font><br />
							<? 
								echo get_url($effect_a5_1, $file_path, "核定後計畫")."<br />";
								echo get_url($effect_a5_2, $file_path, "核定後經費概算表")."<br />";
								echo get_url($effect_a5_3, $file_path, "成果照片")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="left">
							<font color="#8000FA">複審意見：</font><br />
							<?
								if($a5_s_p1_money > 0) //有錢才顯示
								{
									echo "特色一：".$a5_edu_desc."<br />";
								} 
								if($a5_s_p2_money > 0) //有錢才顯示
								{
									echo "特色二：".$a5_edu_desc_p2."<br />";
								} 
							?>
						</td>
					</tr>
				<?
			}
			if($a6_edu_total_money > 0 && ($show_allowance == 6 || $show_allowance == "")) //選擇補助6或全部才顯示
			{
				?>
					<tr>
						<td rowspan="4" width="150" height="50">
							6.補助交通不便地區學校交通車<br /><br /><br />
							最後填寫時間：<br />
							<?
								if($a6_e_update_date == "")
									echo "<font color='red'>尚未填寫</font>";
								else
									echo $a6_e_update_date;
							?>
						</td>
						<td align="right"><?=number_format($a6_edu_total_money); ?></td>
						<td align="right"><?=number_format($a6_execute_money); ?></td>
						<td align="right"><?=number_format($a6_edu_total_money - $a6_execute_money); ?></td>
						<td align="center"><?=$a6_percnet."%"; ?></td>
						<td align="center" rowspan="3">
							<form action='effect_school_06.php' method='post' style='margin:0px; display:inline;'>
								<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
								<input type='submit' name='button' id='button' value='執行情形'>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">原計畫：</font><br />
							<? 
								echo get_url($a6_1, $file_path, "實施計畫")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">修正後計畫：</font><br />
							<?  
								echo get_url($effect_a6_1, $file_path, "核定後計畫")."<br />";
								echo get_url($effect_a6_2, $file_path, "核定後經費概算表")."<br />";
								echo get_url($effect_a6_3, $file_path, "成果照片")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="left">
							<font color="#8000FA">複審意見：</font><br />
							<?=$a6_edu_desc;?>
						</td>
					</tr>
				<?
			}
			if($a7_edu_total_money > 0 && ($show_allowance == 7 || $show_allowance == "")) //選擇補助7或全部才顯示
			{
				?>
					<tr>
						<td rowspan="4" width="150" height="50">
							7.整修學校社區化活動場所<br /><br /><br />
							最後填寫時間：<br />
							<?
								if($a7_e_update_date == "")
									echo "<font color='red'>尚未填寫</font>";
								else
									echo $a7_e_update_date;
							?>
						</td>
						<td align="right"><?=number_format($a7_edu_total_money); ?></td>
						<td align="right"><?=number_format($a7_execute_money); ?></td>
						<td align="right"><?=number_format($a7_edu_total_money - $a7_execute_money); ?></td>
						<td align="center"><?=$a7_percnet."%"; ?></td>
						<td align="center" rowspan="3">
							<form action='effect_school_07.php' method='post' style='margin:0px; display:inline;'>
								<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
								<input type='submit' name='button' id='button' value='執行情形'>
							</form>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">原計畫：</font><br />
							<? 
								echo get_url($a7_1, $file_path, "實施計畫")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="left">
							<font color="#8000FA">修正後計畫：</font><br />
							<? 
								echo get_url($effect_a7_1, $file_path, "核定後計畫")."<br />";
								echo get_url($effect_a7_2, $file_path, "核定後經費概算表")."<br />";
								echo get_url($effect_a7_3, $file_path, "成果照片")."<br />";
								
							?>
						</td>
					</tr>
					<tr>
						<td colspan="5" align="left">
							<font color="#8000FA">複審意見：</font><br />
							<?=$a7_edu_desc;?>
						</td>
					</tr>
				<?
			}
		}
	}
	
	function get_url($filename, $file_path, $str)
	{	
		if($filename == "")
			$url = $str."(<font color='red'>未上傳</font>)";
		else
			$url = "<a href='".$file_path.$filename."' target='_new'>".$str."</a>";
			
		return $url;
	}
	
?>
	<tr>
		<td width="150" height="30" align="center" bgcolor="#99CCCC">縣市合計</td>
		<td align="right" bgcolor="#99CCCC"><?=number_format($selected_edu_total_money); ?></td>
		<td align="right" bgcolor="#99CCCC"><?=number_format($selected_execute_money); ?></td>
		<td align="right" bgcolor="#99CCCC"><?=number_format($selected_edu_total_money - $selected_execute_money); ?></td>
		<td align="center" bgcolor="#99CCCC"><?=number_format($selected_execute_money / $selected_edu_total_money * 100,2);?>%</td>
		<td align="center" bgcolor="#99CCCC"> </td>
		<td align="center" bgcolor="#99CCCC"> </td>
	</tr>
</table>
已填寫：<?=($serial-$not_filled);?><br />
未填寫：<?=$not_filled;?><br />
總校數：<?=$serial;?><br />
填報率：<?=number_format(($serial-$not_filled) / $serial * 100,2);?>%<br />
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>