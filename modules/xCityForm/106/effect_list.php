<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$get_id = $_GET['ct'];

	if($get_id != "")
		$cityname = $get_id;

	$show_allowance = $_GET['op']; //op = 1 ~ 7
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>
<INPUT TYPE="button" VALUE="上一頁" onClick="location.href='/edu/modules/xCityForm/effect_report_city.php'"><p>

<b><?=$school_year;?>年度 <?=$cityname;?>政府成效評估填報列表</b><p>
<img src="/edu/images/print.png" /> <a href="effect_list_simple.php?ct=<?=$cityname;?>" target="_blank"><b>查看學校填報狀況</b></a><p>

<a href="effect_list.php?ct=<?=$cityname;?>"><u>全部顯示</u></a>　
<a href="effect_list.php?ct=<?=$cityname;?>&op=1"><u>補助一</u></a>　
<a href="effect_list.php?ct=<?=$cityname;?>&op=2"><u>補助二</u></a>　
<a href="effect_list.php?ct=<?=$cityname;?>&op=3"><u>補助三</u></a>　
<a href="effect_list.php?ct=<?=$cityname;?>&op=4"><u>補助四</u></a>　
<a href="effect_list.php?ct=<?=$cityname;?>&op=5"><u>補助五</u></a>　
<a href="effect_list.php?ct=<?=$cityname;?>&op=6"><u>補助六</u></a>　
<p>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr height="50px">
		<td width="70px" align="center" bgcolor="#99CCCC">補助項目</td>
		<td align="center" bgcolor="#99CCCC">內容</td>
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

		   "      , a2.inherit_year as a2_inherit_year ".		 //j104 edu_p2_money
		   "      , a2.edu_p2_money as a2_edu_p2_money ".
		   "      , a4.edu_p2_money as a4_edu_p2_money ".

		   //補四教育部資料
		   "      , a3.edu_total_money as a3_edu_total_money ".
		   "      , a3.edu_desc as a3_edu_desc ".

		   //補五教育部資料
		   "      , a4.s_p1_money as a4_s_p1_money ".
		   "      , a4.s_p2_money as a4_s_p2_money ".
		   "      , a4.edu_total_money as a4_edu_total_money ".
		   "      , a4.edu_desc as a4_edu_desc ".
		   "      , a4.edu_desc_p2 as a4_edu_desc_p2 ".
		   "      , a4.edu_desc_ny1 as a4_edu_desc_ny1 ".
		   "      , a4.edu_desc_ny1_p2 as a4_edu_desc_ny1_ny1_p2 ".
		   "      , a4.edu_desc_ny2 as a4_edu_desc_ny2 ".
		   "      , a4.edu_desc_ny2_p2 as a4_edu_desc_ny2_p2 ".

		   "      , a4.inherit_year as a4_inherit_year ".		 //j104

		   //補六教育部資料
		   "      , a5.edu_total_money as a5_edu_total_money ".
		   "      , a5.edu_desc as a5_edu_desc ".

		   //補七教育部資料
		   "      , a6.edu_total_money as a6_edu_total_money ".
		   "      , a6.edu_desc as a6_edu_desc ".

		   //成果填報上傳時間
		   "      , a1_e.update_date as a1_e_update_date ".
		   "      , a2_e.update_date as a2_e_update_date ".
		   "      , a3_e.update_date as a3_e_update_date ".
		   "      , a4_e.update_date as a4_e_update_date ".
		   "      , a5_e.update_date as a5_e_update_date ".
		   "      , a6_e.update_date as a6_e_update_date ".

		   //執行金額
		   "      , a1_e.execute_money as a1_e_execute_money ".
		   "      , a2_e.execute_money as a2_e_execute_money ".
		   "      , a3_e.execute_money as a3_e_execute_money ".
		   "      , a4_e.execute_money as a4_e_execute_money ".
		   "      , a5_e.execute_money as a5_e_execute_money ".
		   "      , a6_e.execute_money as a6_e_execute_money ".

		   //上傳的檔案
		   "      , sun.a1_1, sun.a1_2, sun.a2_1, sun.a2_2, sun.a3_1, sun.a4_1, sun.a4_2, sun.a5_1, sun.a6_1 ".
		   "      , sun.effect_a1_1, sun.effect_a1_2, sun.effect_a1_3, sun.effect_a1_4 ".
		   "      , sun.effect_a2_1, sun.effect_a2_2, sun.effect_a2_3 ".
		   "      , sun.effect_a3_1, sun.effect_a3_2, sun.effect_a3_3 ".
		   "      , sun.effect_a4_1, sun.effect_a4_2, sun.effect_a4_3 ".
		   "      , sun.effect_a5_1, sun.effect_a5_2, sun.effect_a5_3 ".
		   "      , sun.effect_a6_1, sun.effect_a6_2, sun.effect_a6_3 ".

		   //
		   "      , sun_ly.a2_1 as a2_1_ly, sun_ly.a2_2 as a2_2_ly, sun_ly.a4_1 as a4_1_ly, sun_ly.a4_2 as a4_2_ly ".
		   "      , sun_ly.effect_a2_1 as effect_a2_1_ly, sun_ly.effect_a2_2 as effect_a2_2_ly, sun_ly.effect_a2_3 as effect_a2_3_ly".
		   "      , sun_ly.effect_a4_1 as effect_a4_1_ly, sun_ly.effect_a4_2 as effect_a4_2_ly, sun_ly.effect_a4_3 as effect_a4_3_ly".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_teaching_equipment as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_aboriginal_education as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_transport_car as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_school_activity as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join school_upload_name as sun on sy.seq_no = sun.sy_seq ".

           //
		   "                       left join school_upload_name as sun_ly on sun_ly.account = sy.account and sun_ly.school_year = '".($school_year - 1)."' ".

		   //成果填報資料表
		   "                       left join alc_parenting_education_effect as a1_e on sy.seq_no = a1_e.sy_seq ".
		   "                       left join alc_education_features_effect as a2_e on sy.seq_no = a2_e.sy_seq ".
		   "                       left join alc_teaching_equipment_effect as a3_e on sy.seq_no = a3_e.sy_seq ".
		   "                       left join alc_aboriginal_education_effect as a4_e on sy.seq_no = a4_e.sy_seq ".
		   "                       left join alc_transport_car_effect as a5_e on sy.seq_no = a5_e.sy_seq ".
		   "                       left join alc_school_activity_effect as a6_e on sy.seq_no = a6_e.sy_seq ".

		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.cityname, sd.account ";
	//echo "<p>".$sql."<p>";
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
		$a4_edu_desc_p2 = ($row['a4_edu_desc_p2'] == '')?"-":$row['a4_edu_desc_p2'];
		$a4_edu_desc_ny1 = ($row['a4_edu_desc_ny1'] == '')?"-":$row['a4_edu_desc_ny1'];
		$a4_edu_desc_ny1_p2 = ($row['a4_edu_desc_ny1_p2'] == '')?"-":$row['a4_edu_desc_ny1_p2'];
		$a4_edu_desc_ny2 = ($row['a4_edu_desc_ny2'] == '')?"-":$row['a4_edu_desc_ny2'];
		$a4_edu_desc_ny2_p2 = ($row['a4_edu_desc_ny2_p2'] == '')?"-":$row['a4_edu_desc_ny2_p2'];
		$a5_edu_desc = ($row['a5_edu_desc'] == '')?"-":$row['a5_edu_desc'];
		$a6_edu_desc = ($row['a6_edu_desc'] == '')?"-":$row['a6_edu_desc'];

		$a2_inherit_year = $row['a2_inherit_year'];
		$a4_inherit_year = $row['a4_inherit_year'];


		//最填寫日期
		$a1_e_update_date = $row['a1_e_update_date'];
		$a2_e_update_date = $row['a2_e_update_date'];
		$a3_e_update_date = $row['a3_e_update_date'];
		$a4_e_update_date = $row['a4_e_update_date'];
		$a5_e_update_date = $row['a5_e_update_date'];
		$a6_e_update_date = $row['a6_e_update_date'];

		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money'];
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money'];

		$a2_s_p1_money = ($row['a2_s_p1_money'] == '')?0:$row['a2_s_p1_money'];
		$a2_s_p2_money = ($row['a2_s_p2_money'] == '')?0:$row['a2_s_p2_money'];

		//j104
		$a2_edu_p2_money = ($row['a2_edu_p2_money'] == '')?0:$row['a2_edu_p2_money'];
		$a4_edu_p2_money = ($row['a4_edu_p2_money'] == '')?0:$row['a4_edu_p2_money'];

		$a4_s_p1_money = ($row['a4_s_p1_money'] == '')?0:$row['a4_s_p1_money'];
		$a4_s_p2_money = ($row['a4_s_p2_money'] == '')?0:$row['a4_s_p2_money'];

		//核定金額
		$a1_edu_total_money = ($row['a1_edu_total_money'] == '')?0:$row['a1_edu_total_money']; //NULL則填入0
		$a2_edu_total_money = ($row['a2_edu_total_money'] == '')?0:$row['a2_edu_total_money'];
		$a3_edu_total_money = ($row['a3_edu_total_money'] == '')?0:$row['a3_edu_total_money'];
		$a4_edu_total_money = ($row['a4_edu_total_money'] == '')?0:$row['a4_edu_total_money'];
		$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money'];
		$a6_edu_total_money = ($row['a6_edu_total_money'] == '')?0:$row['a6_edu_total_money'];



		$sum_edu_total_money = $a1_edu_total_money + $a2_edu_total_money
							 + $a3_edu_total_money
							 + $a4_edu_total_money + $a5_edu_total_money
							 + $a6_edu_total_money;

		//執行金額
		$a1_execute_money = ($row['a1_e_execute_money'] == '')?0:$row['a1_e_execute_money']; //NULL則填入0
		$a2_execute_money = ($row['a2_e_execute_money'] == '')?0:$row['a2_e_execute_money'];
		$a3_execute_money = ($row['a3_e_execute_money'] == '')?0:$row['a3_e_execute_money'];
		$a4_execute_money = ($row['a4_e_execute_money'] == '')?0:$row['a4_e_execute_money'];
		$a5_execute_money = ($row['a5_e_execute_money'] == '')?0:$row['a5_e_execute_money'];
		$a6_execute_money = ($row['a6_e_execute_money'] == '')?0:$row['a6_e_execute_money'];
		$sum_execute_money = $a1_execute_money + $a2_execute_money
						  + $a3_execute_money
						  + $a4_execute_money + $a5_execute_money
						  + $a6_execute_money;

		$a1_percnet = number_format($a1_execute_money / $a1_edu_total_money * 100,2);
		$a2_percnet = number_format($a2_execute_money / $a2_edu_total_money * 100,2);
		$a3_percnet = number_format($a3_execute_money / $a3_edu_total_money * 100,2);
		$a4_percnet = number_format($a4_execute_money / $a4_edu_total_money * 100,2);
		$a5_percnet = number_format($a5_execute_money / $a5_edu_total_money * 100,2);
		$a6_percnet = number_format($a6_execute_money / $a6_edu_total_money * 100,2);
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
		$a4_2 = $row['a4_2'];
		$a5_1 = $row['a5_1'];
		$a6_1 = $row['a6_1'];

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

		$a2_1_ly = $row['a2_1_ly'];
		$a2_2_ly = $row['a2_2_ly'];
		$a4_1_ly = $row['a4_1_ly'];
		$a4_2_ly = $row['a4_2_ly'];
		$effect_a2_1_ly = $row['effect_a2_1_ly'];
		$effect_a2_2_ly = $row['effect_a2_2_ly'];
		$effect_a2_3_ly = $row['effect_a2_3_ly'];
		$effect_a4_1_ly = $row['effect_a4_1_ly'];
		$effect_a4_2_ly = $row['effect_a4_2_ly'];
		$effect_a4_3_ly = $row['effect_a4_3_ly'];


		//$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
		//echo $file_path;
		//1040429修改路徑
		$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
		$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
	    $file_path3 = '/epa_uploads/'.($school_year-1).'/pub/'.$account.'/';

		if($sum_edu_total_money > 0)
		{
			//選擇的補助有拿錢才顯示
			if($show_allowance == "" || ($a1_edu_total_money > 0 && $show_allowance == 1) || ($a2_edu_total_money > 0 && $show_allowance == 2)
									 || ($a3_edu_total_money > 0 && $show_allowance == 4)
									 || ($a4_edu_total_money > 0 && $show_allowance == 5) || ($a5_edu_total_money > 0 && $show_allowance == 6)
									 || ($a6_edu_total_money > 0 && $show_allowance == 7))
			{
				$serial++;
				?>
					<tr height="30px">
						<td colspan="2" bgcolor="#DDDD99">
							序號：<?=$serial;?>　學校代碼：<?=$account;?>　學校名稱：<?=$cityname.$district.$schoolname;?>
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
				|| ($a3_edu_total_money > 0 && $a3_e_update_date == "")
				|| ($a4_edu_total_money > 0 && $a4_e_update_date == "") || ($a5_edu_total_money > 0 && $a5_e_update_date == "")
				|| ($a6_edu_total_money > 0 && $a6_e_update_date == ""))
				{
					$not_filled++;
				}
			}
			else
			{
				if(($a1_edu_total_money > 0 && $a1_e_update_date == "" && $show_allowance == 1)
				|| ($a2_edu_total_money > 0 && $a2_e_update_date == "" && $show_allowance == 2)
				|| ($a3_edu_total_money > 0 && $a3_e_update_date == "" && $show_allowance == 4)
				|| ($a4_edu_total_money > 0 && $a4_e_update_date == "" && $show_allowance == 5)
				|| ($a5_edu_total_money > 0 && $a5_e_update_date == "" && $show_allowance == 6)
				|| ($a6_edu_total_money > 0 && $a6_e_update_date == "" && $show_allowance == 7))
				{
					$not_filled++;
				}
			}

			if($a1_edu_total_money > 0 && ($show_allowance == 1 || $show_allowance == "")) //選擇補助1或全部才顯示
			{
				?>
					<tr>
						<td align="center">
							一<br>、<br>親<br>職<br>教<br>育<br>
						</td>
						<td>
							<table>
								<tr>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">原計畫：</font><p>
										<?
											$index_i = 0;
											if($a1_p1_money > 0) //有錢才顯示
											{
												echo get_url($a1_1, $file_path, ++$index_i.".親職講座")."<p>";
											}
											if($a1_p2_money > 0) //有錢才顯示
											{
												echo get_url($a1_2, $file_path, ++$index_i.".家庭訪視")."<p>";
											}
										?>
									</td>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">修正後計畫：</font><p>
										<?
											$index_j = 0;
											if($a1_p1_money > 0) //有錢才顯示
											{
												echo get_url($effect_a1_1, $file_path, ++$index_j.".修正後講座計畫")."<p>";
											}
											if($a1_p2_money > 0) //有錢才顯示
											{
												echo get_url($effect_a1_2, $file_path, ++$index_j.".修正後訪視計畫")."<p>";
											}
											echo get_url($effect_a1_3, $file_path, ++$index_j.".經費概算表")."<p>";
											echo get_url($effect_a1_4, $file_path, ++$index_j.".成果照片")."<p>";
										?>
									</td>
									<td valign="top">
										<p>
										<font color="#8000FA">成效評估：</font><p>
										複審金額：<?=number_format($a1_edu_total_money);?>元<p>
										執行金額：<?=number_format($a1_execute_money); ?>元<p>
										執行成效：<?=$a1_percnet."%"; ?><p>
										<form action='effect_school_01.php' method='post' style='margin:0px; display:inline;'>
											<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
											<input type='submit' name='button' id='button' value='經費執行情形'>
										</form>
										<?
											if($a1_e_update_date == "")
											{
												echo img_no();
											}
											else
											{
												echo img_yes();
												echo "<p>";
												echo $a1_e_update_date;
											}
										?>
									</td>
								</tr>
							</table>
							<hr>
							<font color="#8000FA">複審意見：</font><p>
							<? echo "　"; ?>
							<textarea style="width:80%; height:50px;" readonly><?=$a1_edu_desc;?></textarea><p>
						</td>
					</tr>
				<?
			}
			if($a2_edu_total_money > 0 && ($show_allowance == 2 || $show_allowance == "")) //選擇補助2或全部才顯示
			{
				?>
					<tr>
						<td align="center">
							二<br>、<br>學<br>校<br>發<br>展<br>教<br>育<br>特<br>色<br>
						</td>
						<td>
							<table>
								<tr>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">原計畫：</font><p>
										<?
											if($a2_inherit_year == 104)
											{
												echo "<a href='".$file_path3.$a2_1_ly."' target='_new'>沿用104年特色一</a> ".img_yes()."<p>";
												if($a2_edu_p2_money > 0)
												{
													echo "<a href='".$file_path3.$a2_2_ly."' target='_new'>沿用104年特色二</a> ".img_yes()."<p>";
												}
											}
											else
											{
												echo get_url($a2_1, $file_path, "特色一")."<p>";
												if($a2_edu_p2_money > 0)
												{
													echo get_url($a2_2, $file_path, "特色二")."<p>";
												}
											}
										?>
									</td>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">修正後計畫：</font><p>
										<?
											echo get_url($effect_a2_1, $file_path, "1.修正後計畫")."<p>";
											echo get_url($effect_a2_2, $file_path, "2.經費概算表")."<p>";
											echo get_url($effect_a2_3, $file_path, "3.成果照片")."<p>";
										?>
									</td>
									<td valign="top">
										<p>
										<font color="#8000FA">成效評估：</font><p>
										複審金額：<?=number_format($a2_edu_total_money);?>元<p>
										執行金額：<?=number_format($a2_execute_money); ?>元<p>
										執行成效：<?=$a2_percnet."%"; ?><p>
										<form action='effect_school_02.php' method='post' style='margin:0px; display:inline;'>
											<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
											<input type='submit' name='button' id='button' value='經費執行情形'>
										</form>
										<?
											if($a2_e_update_date == "")
											{
												echo img_no();
											}
											else
											{
												echo img_yes();
												echo "<p>";
												echo $a2_e_update_date;
											}
										?>
									</td>
								</tr>
							</table>
							<hr>
							<font color="#8000FA">複審意見：</font><p>
							<?
								if($a2_s_p1_money > 0) //有錢才顯示
								{
									echo "　特色一：<br>";
									echo "　<textarea style='width:80%; height:50px;' readonly>" . $a2_edu_desc . "</textarea><p>";
								}
								if($a2_s_p2_money > 0) //有錢才顯示
								{
									echo "　特色二：<br>";
									echo "　<textarea style='width:80%; height:50px;' readonly>" . $a2_edu_desc_p2 . "</textarea><p>";
								}
							?>
						</td>
					</tr>
				<?
			}
			if($a3_edu_total_money > 0 && ($show_allowance == 4 || $show_allowance == "")) //選擇補助4或全部才顯示
			{
				?>
					<tr>
						<td align="center">
							四<br>、<br>充<br>實<br>學<br>校<br>基<br>本<br>教<br>學<br>設<br>備<br>
						</td>
						<td>
							<table>
								<tr>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">原計畫：</font><p>
										<?
											echo get_url($a3_1, $file_path, "1.實施計畫")."<p>";
										?>
									</td>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">修正後計畫：</font><p>									
										<?
											echo get_url($effect_a3_1, $file_path, "1.修正後計畫")."<p>";
											echo get_url($effect_a3_2, $file_path, "2.經費概算表")."<p>";
											echo get_url($effect_a3_3, $file_path, "3.成果照片")."<p>";
										?>
									</td>
									<td valign="top">
										<p>
										<font color="#8000FA">成效評估：</font><p>
										複審金額：<?=number_format($a3_edu_total_money);?>元<p>
										執行金額：<?=number_format($a3_execute_money); ?>元<p>
										執行成效：<?=$a3_percnet."%"; ?><p>
										<form action='effect_school_04.php' method='post' style='margin:0px; display:inline;'>
											<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
											<input type='submit' name='button' id='button' value='經費執行情形'>
										</form>
										<?
											if($a3_e_update_date == "")
											{
												echo img_no();
											}
											else
											{
												echo img_yes();
												echo "<p>";
												echo $a3_e_update_date;
											}
										?>
									</td>
								</tr>
							</table>
							<hr>
							<font color="#8000FA">複審意見：</font><p>
							<? echo "　"; ?>
							<textarea style="width:80%; height:50px;" readonly><?=$a3_edu_desc;?></textarea><p>
						</td>
					</tr>
				<?
			}
			if($a4_edu_total_money > 0 && ($show_allowance == 5 || $show_allowance == "")) //選擇補助5或全部才顯示
			{
				?>
					<tr>
						<td align="center">
							五<br>、<br>發<br>展<br>原<br>住<br>民<br>教<br>育<br>文<br>化<br>特<br>色<br>及<br>充<br>實<br>設<br>備<br>器<br>材<br>
						</td>
						<td>
							<table>
								<tr>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">原計畫：</font><p>
										<?
											if($a4_inherit_year == 104)
											{
												echo "<a href='".$file_path3.$a4_1_ly."' target='_new'>沿用104年特色一</a> ".img_yes()."<p>";
												if($a4_edu_p2_money > 0)
												{
													echo "<a href='".$file_path3.$a4_2_ly."' target='_new'>沿用104年特色二</a> ".img_yes()."<p>";
												}
											}
											else
											{
												echo get_url($a4_1, $file_path, "特色一")."<p>";
												if($a4_edu_p2_money > 0)
												{
													echo get_url($a4_2, $file_path, "特色二")."<p>";
												}
											}
										?>
									</td>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">修正後計畫：</font><p>
										<?
											echo get_url($effect_a4_1, $file_path, "1.修正後計畫")."<p>";
											echo get_url($effect_a4_2, $file_path, "2.經費概算表")."<p>";
											echo get_url($effect_a4_3, $file_path, "3.成果照片")."<p>";
										?>
									</td>
									<td valign="top">
										<p>
										<font color="#8000FA">成效評估：</font><p>
										複審金額：<?=number_format($a4_edu_total_money);?>元<p>
										執行金額：<?=number_format($a4_execute_money); ?>元<p>
										執行成效：<?=$a4_percnet."%"; ?><p>
										<form action='effect_school_05.php' method='post' style='margin:0px; display:inline;'>
											<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
											<input type='submit' name='button' id='button' value='經費執行情形'>
										</form>
										<?
											if($a4_e_update_date == "")
											{
												echo img_no();
											}
											else
											{
												echo img_yes();
												echo "<p>";
												echo $a4_e_update_date;
											}
										?>
									</td>
								</tr>
							</table>
							<hr>
							<font color="#8000FA">複審意見：</font><p>
							<?
								if($a4_s_p1_money > 0) //有錢才顯示
								{
									echo "　特色一：<br>";
									echo "　<textarea style='width:80%; height:50px;' readonly>" . $a4_edu_desc . "</textarea><p>";
								}
								if($a4_s_p2_money > 0) //有錢才顯示
								{
									echo "　特色二：<br>";
									echo "　<textarea style='width:80%; height:50px;' readonly>" . $a4_edu_desc_p2 . "</textarea><p>";
								}
							?>
						</td>
					</tr>
				<?
			}
			if($a5_edu_total_money > 0 && ($show_allowance == 6 || $show_allowance == "")) //選擇補助6或全部才顯示
			{
				?>
					<tr>
						<td align="center">
							六<br>、<br>補<br>助<br>交<br>通<br>不<br>便<br>地<br>區<br>學<br>校<br>交<br>通<br>車<br>
						</td>
						<td>
							<table>
								<tr>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">原計畫：</font><p>
										<?
											echo get_url($a5_1, $file_path, "1.實施計畫")."<p>";
										?>
									</td>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">修正後計畫：</font><p>									
										<?
											echo get_url($effect_a5_1, $file_path, "1.修正後計畫")."<p>";
											echo get_url($effect_a5_2, $file_path, "2.經費概算表")."<p>";
											echo get_url($effect_a5_3, $file_path, "3.成果照片")."<p>";
										?>
									</td>
									<td valign="top">
										<p>
										<font color="#8000FA">成效評估：</font><p>
										複審金額：<?=number_format($a5_edu_total_money);?>元<p>
										執行金額：<?=number_format($a5_execute_money); ?>元<p>
										執行成效：<?=$a5_percnet."%"; ?><p>
										<form action='effect_school_06.php' method='post' style='margin:0px; display:inline;'>
											<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
											<input type='submit' name='button' id='button' value='經費執行情形'>
										</form>
										<?
											if($a5_e_update_date == "")
											{
												echo img_no();
											}
											else
											{
												echo img_yes();
												echo "<p>";
												echo $a5_e_update_date;
											}
										?>
									</td>
								</tr>
							</table>
							<hr>
							<font color="#8000FA">複審意見：</font><p>
							<? echo "　"; ?>
							<textarea style="width:80%; height:50px;" readonly><?=$a5_edu_desc;?></textarea><p>
						</td>
					</tr>
				<?
			}
			if($a6_edu_total_money > 0 && ($show_allowance == 7 || $show_allowance == "")) //選擇補助7或全部才顯示
			{
				?>				
					<tr>
						<td align="center">
							七<br>、<br>整<br>修<br>學<br>校<br>社<br>區<br>化<br>活<br>動<br>場<br>所<br>
						</td>
						<td>
							<table>
								<tr>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">原計畫：</font><p>
										<?
											echo get_url($a6_1, $file_path, "1.實施計畫")."<p>";
										?>
									</td>
									<td valign="top" width="30%">
										<p>
										<font color="#8000FA">修正後計畫：</font><p>									
										<?
											echo get_url($effect_a6_1, $file_path, "1.修正後計畫")."<p>";
											echo get_url($effect_a6_2, $file_path, "2.經費概算表")."<p>";
											echo get_url($effect_a6_3, $file_path, "3.成果照片")."<p>";
										?>
									</td>
									<td valign="top">
										<p>
										<font color="#8000FA">成效評估：</font><p>
										複審金額：<?=number_format($a6_edu_total_money);?>元<p>
										執行金額：<?=number_format($a6_execute_money); ?>元<p>
										執行成效：<?=$a6_percnet."%"; ?><p>
										<form action='effect_school_07.php' method='post' style='margin:0px; display:inline;'>
											<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
											<input type='submit' name='button' id='button' value='經費執行情形'>
										</form>
										<?
											if($a6_e_update_date == "")
											{
												echo img_no();
											}
											else
											{
												echo img_yes();
												echo "<p>";
												echo $a6_e_update_date;
											}
										?>
									</td>
								</tr>
							</table>
							<hr>
							<font color="#8000FA">複審意見：</font><p>
							<? echo "　"; ?>
							<textarea style="width:80%; height:50px;" readonly><?=$a6_edu_desc;?></textarea><p>
						</td>
					</tr>
				<?
			}
		}
	}

	function get_url($filename, $file_path, $str)
	{
		if($filename == "")
			$url = $str." ".img_no();
		else
			$url = "<a href='".$file_path.$filename."' target='_new'>".$str."</a> ".img_yes();

		return $url;
	}

	function img_no()
	{
		return "<img src='/edu/images/no.png' height='12px'' />";
	}

	function img_yes()
	{
		return "<img src='/edu/images/yes.png' height='15px' />";
	}
?>
</table>

<p>
<hr>
<p>

已填寫：<?=($serial-$not_filled);?><p>
總校數：<?=$serial;?><p>
填報率：<?=number_format(($serial-$not_filled) / $serial * 100,2);?>%<p>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
<td align="center" bgcolor="#99CCCC">縣市合計</td>
未填寫：<?=$not_filled;?><p>
<td align="right" bgcolor="#99CCCC"><?=number_format($selected_edu_total_money); ?></td>
<td align="right" bgcolor="#99CCCC"><?=number_format($selected_execute_money); ?></td>
<td align="right" bgcolor="#99CCCC"><?=number_format($selected_edu_total_money - $selected_execute_money); ?></td>
<td align="center" bgcolor="#99CCCC"><?=number_format($selected_execute_money / $selected_edu_total_money * 100,2);?>%</td>
<?=number_format($a1_edu_total_money - $a1_execute_money);?>
<td align="right"><?=number_format($a2_edu_total_money - $a2_execute_money); ?></td>
*/
?>