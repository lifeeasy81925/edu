<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用

	$table_name = $a4_table_name;
	$table_name_item = $table_name.'_item';
	$a_num = 'a4';

	$keyClasses = '13'; // 設定可申請特色二的最少班級數

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補四資料
		   "      , $a_num.* ".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$account' ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];

		$student = $row['student'];
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total = $row['class_total'];

		$main_seq = $row['seq_no']; //school_year的seq_no
		$p1_name = $row['p1_name'];
		$p2_name = $row['p2_name'];
		$p1_IsContinue = $row['p1_IsContinue'];
		$p2_IsContinue = $row['p2_IsContinue'];
		$p1_ContinueYear = $row['p1_ContinueYear'];
		$p2_ContinueYear = $row['p2_ContinueYear'];
		$s_p1_student = $row['s_p1_student'];
		$s_p2_student = $row['s_p2_student'];
		$s_p1_target = $row['s_p1_target'];
		$s_p2_target = $row['s_p2_target'];
		$p_num = $row['p_num'];

		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];

		$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1']; //NULL則填入0
		$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1']; //NULL則填入0
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];

		$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2']; //NULL則填入0
		$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2']; //NULL則填入0
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];

		$city_total_money = $row['city_total_money']; //NULL則填入學校資料,原本的
		$city_p1_money = ($row['city_p1_money'] == '')?$s_p1_money:$row['city_p1_money'];
		$city_p1_current_money = ($row['city_p1_current_money'] == '')?$s_p1_current_money:$row['city_p1_current_money'];
		$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?$s_p1_capital_money:$row['city_p1_capital_money'];
		$city_p2_money = ($row['city_p2_money'] == '')?$s_p2_money:$row['city_p2_money'];
		$city_p2_current_money = ($row['city_p2_current_money'] == '')?$s_p2_current_money:$row['city_p2_current_money'];
		$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?$s_p2_capital_money:$row['city_p2_capital_money'];

		$city_total_money_ny1 = ($row['city_total_money_ny1'] == '')?$s_total_money_ny1:$row['city_total_money_ny1']; //NULL則填入學校資料


		$city_p1_money_ny1 = ($row['city_p1_money_ny1'] == '')?$s_p1_money_ny1:$row['city_p1_money_ny1'];
		$city_p1_current_money_ny1 = ($row['city_p1_current_money_ny1'] == '')?$s_p1_current_money_ny1:$row['city_p1_current_money_ny1'];
		$city_p1_capital_money_ny1 = ($row['city_p1_capital_money_ny1'] == '')?$s_p1_capital_money_ny1:$row['city_p1_capital_money_ny1'];
		$city_p2_money_ny1 = ($row['city_p2_money_ny1'] == '')?$s_p2_money_ny1:$row['city_p2_money_ny1'];
		$city_p2_current_money_ny1 = ($row['city_p2_current_money_ny1'] == '')?$s_p2_current_money_ny1:$row['city_p2_current_money_ny1'];
		$city_p2_capital_money_ny1 = ($row['city_p2_capital_money_ny1'] == '')?$s_p2_capital_money_ny1:$row['city_p2_capital_money_ny1'];

		$city_total_money_ny2 = ($row['city_total_money_ny2'] == '')?$s_total_money_ny2:$row['city_total_money_ny2']; //NULL則填入學校資料
		$city_p1_money_ny2 = ($row['city_p1_money_ny2'] == '')?$s_p1_money_ny2:$row['city_p1_money_ny2'];
		$city_p1_current_money_ny2 = ($row['city_p1_current_money_ny2'] == '')?$s_p1_current_money_ny2:$row['city_p1_current_money_ny2'];
		$city_p1_capital_money_ny2 = ($row['city_p1_capital_money_ny2'] == '')?$s_p1_capital_money_ny2:$row['city_p1_capital_money_ny2'];
		$city_p2_money_ny2 = ($row['city_p2_money_ny2'] == '')?$s_p2_money_ny2:$row['city_p2_money_ny2'];
		$city_p2_current_money_ny2 = ($row['city_p2_current_money_ny2'] == '')?$s_p2_current_money_ny2:$row['city_p2_current_money_ny2'];
		$city_p2_capital_money_ny2 = ($row['city_p2_capital_money_ny2'] == '')?$s_p2_capital_money_ny2:$row['city_p2_capital_money_ny2'];

		$city_desc = $row['city_desc'];
		$city_desc_ny1 = $row['city_desc_ny1'];
		$city_desc_ny2 = $row['city_desc_ny2'];
		$city_desc_p2 = $row['city_desc_p2'];
		$city_desc_ny1_p2 = $row['city_desc_ny1_p2'];
		$city_desc_ny2_p2 = $row['city_desc_ny2_p2'];
		$city_approved = $row['city_approved'];

		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving'];
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];

		$accord_point = $row['accord_point']; //符合的指標
		$accord_point_ary = explode(",",$accord_point);

		$inherit_year = $row['inherit_year'];

		//計算目標學生百分比
		if($s_p1_student != '' && $s_p1_target != '')
		{
			$s_p1_per = number_format($s_p1_target / $s_p1_student * 100, 2);
		}
		if($s_p2_student != '' && $s_p2_target != '')
		{
			$s_p2_per = number_format($s_p2_target / $s_p2_student * 100, 2);
		}
	}

	//顯示填寫的資料
	//allowance_table_name => 各補助細項的 table name ex.alc_education_features_item
	//p => 特色 ex.p1 p2
	//main_seq => 各補助的 seq_no，ex.alc_education_features 的 seq_no (注意!!不是 _item 的 seq_no)
	function print_item($allowance_table_name, $p, $main_seq)
	{
		$sql = " select * ".
			   " from $allowance_table_name ".
			   " where main_seq = '$main_seq' ".
			   "   and section = '$p' ". //特色1
			   " order by seq_no asc ";

		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result); //列數

		$has_outlay = 0; //有無雜支項目
		$idx = 0;

		//順序：顯示已填資料 -> 補滿9項(未滿9時補上空值) -> 顯示雜支
		while($row = mysql_fetch_array($result))
		{
			$seq_no = $row['seq_no'];
			$subject = $row['subject'];
			$category = $row['category'];
			$item = $row['item'];
			$unit = $row['unit'];
			$price = $row['price'];
			$amount = $row['amount'];
			$s_money = $row['s_money'];
			$s_desc = $row['s_desc'];
			$city_money = $row['city_money'];
			$city_delete = $row['city_delete'];
			$edu_money = $row['edu_money'];
			$edu_delete = $row['edu_delete'];

			if($category != '雜支')
			{
				$idx++;

				echo "<tr height='30px' style='font-size:13px;'>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx</td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$subject</td>";   // 科目
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$category</td>";  // 類別
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$item</td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$unit</td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$price</td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$amount</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$s_money</td>";
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$s_desc</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='cornsilk'>$city_money</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='cornsilk'>$city_delete</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='mistyrose'>$edu_money</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='mistyrose'>$edu_delete</td>";
				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;

				$outlay_subject = $row['subject'];
				$outlay_category = $row['category'];
				$outlay_s_money = $row['s_money'];
				$outlay_s_desc = $row['s_desc'];
				$outlay_city_money = $row['city_money'];
				$outlay_city_delete = $row['city_delete'];
				$outlay_edu_money = $row['edu_money'];
				$outlay_edu_delete = $row['edu_delete'];
			}
		}
		$idx++;
		if($has_outlay == 1) //顯示雜支
		{
			echo "<tr height='30px' style='font-size:13px;'>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx</td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$outlay_subject</td>";
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$outlay_category</td>";
			echo "<td bgcolor='aliceblue'></td>";
			echo "<td bgcolor='aliceblue'></td>";
			echo "<td bgcolor='aliceblue'></td>";
			echo "<td bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$outlay_s_money</td>";
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$outlay_s_desc</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='cornsilk'>$outlay_city_money</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='cornsilk'>$outlay_city_delete</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='mistyrose'>$outlay_edu_money</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='mistyrose'>$outlay_edu_delete</td>";
		}
	}

	if($inherit_year == "104")  // 沿用104年
	{
		$sql = 	" SELECT * FROM school_upload_name ".
				" WHERE account = '$account' AND school_year = '".($school_year - 2)."' ";

		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$a5_1 = $row['a5_1'];  // 106年的補助四 = 104年的補助五
			$a5_2 = $row['a5_2'];
		}

		$file_path = '/epa_uploads/'.($school_year - 2).'/pub/'.$account.'/';
	}
	else if($inherit_year == "105")  // 沿用105年
	{
		$sql = " select * from school_upload_name ".
		" where account = '$account' and  school_year = '".($school_year - 1)."' ";

		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$a5_1 = $row['a5_1'];  // 106年的補助四 = 105年的補助五
			$a5_2 = $row['a5_2'];
		}
		$file_path = '/epa_uploads/'.($school_year - 1).'/pub/'.$account.'/';
	}

?><p>

<a href="a4_examine_table.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

審核補助項目 / 補助項目四：發展原住民文化特色及充實設備器材 / <b>審核</b>

<p>
<hr>
<p>

<body>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<form name="form" method="post" action="examine_allowance_a4_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

		● <a href="/edu_dl/<?=$school_year;?>/allowance-04.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		● 學校名稱：<font color=blue><?=($account.' '.$district.$schoolname);?></font><p>

		<font color=red>
			● 沿用 <?=$inherit_year;?> 年度計畫，今年度免初審。<p>
		</font>

		● 經費合計<p>
		<table>
			<tr height="40px">
				<td width="45%" align=right>
					● <?=$school_year;?>年度 學校申請金額：
					<input type="text" size="3" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
				<td>
					　　<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	<?=$school_year;?>年度 縣市初審金額</font>：
					<input type="text" size="3" name="city_total_money" value="<?=$city_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
			</tr>
			<tr height="40px" style="display:<?=($s_total_money_ny1 == 0 || $s_total_money_ny1 == '')?"none":"";?>;">
				<td  width="45%" align=right>
					● <?=$school_year+1;?>年度 學校申請金額：
					<input type="text" size="3" name="s_total_money_ny1" value="<?=$s_total_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
				<td>
					　　<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	<?=$school_year+1;?>年度 縣市初審金額</font>：
					<input type="text" size="3" name="city_total_money_ny1" value="<?=$city_total_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
			</tr>
		</table><p>

				● 全校學生數：<?=$student;?> 班，申請 <?=$p_num;?> 項特色。<p>

		<p>
		<hr>
		<p>

		<? // 特色一 ================================================================================================ ?>

		● 特色一<p>

		　特色名稱：<?=$p1_name;?><?=($p1_IsContinue == "Y")?"（本年度為第 ".$p1_ContinueYear." 年辦理）":"";?><p>

		　參加學生人數
		<?=$s_p1_student;?> 人，其中含目標學生
		<?=$s_p1_target;?> 人，目標學生佔參加學生
		<?=$s_p1_per;?>%。<p>

		　<font color="blue"><?=$school_year;?>年度：</font><p>

		　　學校申請：共計
		<input type="text" size="3" name="s_p1_money"         value="<?=$s_p1_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
		<input type="text" size="3" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
		<input type="text" size="3" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

		　　縣市初審：共計
		<input type="text" size="3" name="city_p1_money"         value="<?=$city_p1_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
		<input type="text" size="3" name="city_p1_current_money" value="<?=$city_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
		<input type="text" size="3" name="city_p1_capital_money" value="<?=$city_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

		　　經費概算表：<p>
		<table border="2" rules="rows" cellspacing="0" cellpadding="5">
			<tr height="30px" align="center">
				<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
				<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
				<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
			</tr>
			<tr height="30px" align="center">
				<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
				<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
				<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
				<td nowrap="nowrap" bgcolor="FFCCCC">複審</td>
				<td nowrap="nowrap" bgcolor="FFCCCC">刪減</td>
			</tr>
			<? print_item($table_name_item, 'p1_'.$school_year, $main_seq);  // 顯示細項 ?>
		</table><p>

		　　<?=$school_year;?>年度 縣市初審意見：<p>
		　　<textarea name="city_desc" cols="55" rows="4" style="background-color:cornsilk" readonly><?=$city_desc;?></textarea><p>

		　　<?=$school_year;?>年度 教育部複審意見：<p>
		　　<textarea name="edu_desc" cols="55" rows="4" style="background-color:mistyrose" readonly><?=$edu_desc;?></textarea><p>

		<? if($s_p1_money_ny1 == 0 || $s_p1_money_ny1 == '') echo "<!-- "; ?>

			　<font color="blue"><?=($school_year+1);?>年度：</font><p>

			　　學校申請：共計
			<input type="text" size="3" name="s_p1_money_ny1"         value="<?=$s_p1_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="s_p1_current_money_ny1" value="<?=$s_p1_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="s_p1_capital_money_ny1" value="<?=$s_p1_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　縣市初審：共計
			<input type="text" size="3" name="city_p1_money_ny1"         value="<?=$city_p1_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="city_p1_current_money_ny1" value="<?=$city_p1_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="city_p1_capital_money_ny1" value="<?=$city_p1_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　經費概算表：<p>

			<table border="2" rules="rows" cellspacing="0" cellpadding="5">
				<tr height="30px" align="center">
					<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
				</tr>
				<tr height="30px" align="center">
					<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
					<td nowrap="nowrap" bgcolor="FFCCCC">複審</td>
					<td nowrap="nowrap" bgcolor="FFCCCC">刪減</td>
				</tr>
				<? print_item($table_name_item, 'p1_'.($school_year+1), $main_seq);  // 顯示細項 ?>
			</table><p>

			　　<?=$school_year+1;?>年度 縣市初審意見：<p>
			　　<textarea name="city_desc_ny1" cols="55" rows="4" style="background-color:cornsilk" readonly><?=$city_desc_ny1;?></textarea><p>

			　　<?=$school_year+1;?>年度 教育部複審意見：<p>
			　　<textarea name="edu_desc_ny1" cols="55" rows="4" style="background-color:mistyrose" readonly><?=$edu_desc_ny1;?></textarea><p>

		<? if($s_p1_money_ny1 == 0 || $s_p1_money_ny1 == '') echo " -->"; ?>

		<? // 特色二 ================================================================================================ ?>

		<? if($s_p2_money == 0) echo "<div style='display:none'>"; ?>

			● 特色二<p>

			　特色名稱：<?=$p2_name;?><?=($p2_IsContinue == "Y")?"（本年度為第 ".$p2_ContinueYear." 年辦理）":"";?><p>

			　參加學生人數
			<?=$s_p2_student;?> 人，其中含目標學生
			<?=$s_p2_target;?> 人，目標學生佔參加學生
			<?=$s_p2_per;?>%。<p>

			　<font color="blue"><?=$school_year;?>年度：</font><p>

			　　學校申請：共計
			<input type="text" size="3" name="s_p2_money"         value="<?=$s_p2_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="s_p2_current_money" value="<?=$s_p2_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="s_p2_capital_money" value="<?=$s_p2_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　縣市初審：共計
			<input type="text" size="3" name="city_p2_money"         value="<?=$city_p2_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="city_p2_current_money" value="<?=$city_p2_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="city_p2_capital_money" value="<?=$city_p2_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　經費概算表：<p>

			<table border="2" rules="rows" cellspacing="0" cellpadding="5">
				<tr height="30px" align="center">
					<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
				</tr>
				<tr height="30px" align="center">
					<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
					<td nowrap="nowrap" bgcolor="FFCCCC">複審</td>
					<td nowrap="nowrap" bgcolor="FFCCCC">刪減</td>
				</tr>
				<? print_item($table_name_item, 'p2_'.$school_year, $main_seq);  // 顯示細項 ?>
			</table><p>

			　　<?=$school_year;?>年度 縣市初審意見：<p>
			　　<textarea name="city_desc_p2" cols="55" rows="4" style="background-color:cornsilk" readonly><?=$city_desc_p2;?></textarea><p>

			　　<?=$school_year;?>年度 教育部複審意見：<p>
			　　<textarea name="edu_desc_p2" cols="55" rows="4" style="background-color:mistyrose" readonly><?=$edu_desc_p2;?></textarea><p>

			<? if($s_p2_money_ny1 == 0 || $s_p2_money_ny1 == '') echo "<!-- "; ?>

				　　<font color="blue"><?=($school_year+1);?>年度：</font><p>

				　　學校申請：共計
				<input type="text" size="3" name="s_p2_money_ny1"         value="<?=$s_p2_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
				<input type="text" size="3" name="s_p2_current_money_ny1" value="<?=$s_p2_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
				<input type="text" size="3" name="s_p2_capital_money_ny1" value="<?=$s_p2_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

				　　縣市初審：共計
				<input type="text" size="3" name="city_p2_money_ny1"         value="<?=$city_p2_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
				<input type="text" size="3" name="city_p2_current_money_ny1" value="<?=$city_p2_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
				<input type="text" size="3" name="city_p2_capital_money_ny1" value="<?=$city_p2_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

				　　經費概算表：<p>

				<table border="2" rules="rows" cellspacing="0" cellpadding="5">
					<tr height="30px" align="center">
						<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
						<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
						<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
					</tr>
					<tr height="30px" align="center">
						<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
						<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
						<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
						<td nowrap="nowrap" bgcolor="FFCCCC">複審</td>
						<td nowrap="nowrap" bgcolor="FFCCCC">刪減</td>
					</tr>
					<? print_item($table_name_item, 'p2_'.($school_year+1), $main_seq);  // 顯示細項 ?>
				</table><p>

				　　<?=$school_year+1;?>年度 縣市初審意見：<p>
				　　<textarea name="city_desc_ny1_p2" cols="55" rows="4" style="background-color:cornsilk" readonly><?=$city_desc_ny1_p2;?></textarea><p>

				　　<?=$school_year+1;?>年度 教育部複審意見：<p>
				　　<textarea name="edu_desc_ny1_p2" cols="55" rows="4" style="background-color:mistyrose" readonly><?=$edu_desc_ny1_p2;?></textarea><p>

			<? if($s_p2_money_ny1 == 0 || $s_p2_money_ny1 == '') echo " -->"; ?>

		<? if($s_p2_money == 0) echo "</div>"; ?>

		<b>● 相關資料</b><p>

		　● <a href="print_point_page.php?id=<?=$account;?>" target="_blank">指標界定調查紀錄表</a><p>

		　● 歷史資料：<p>  <?  // 106年的補助四 = 105、104年的補助五 ?>
		　　<a href="../105/effect_view_school_up_05.php?id=<?=$account;?>" target="_blank"><?=($school_year-1);?>年度 核定後資料與執行成果</a><p>
		　　<a href="../104/effect_view_school_up_05.php?id=<?=$account;?>" target="_blank"><?=($school_year-2);?>年度 核定後資料與執行成果</a><p>

		　● 應上傳檔案：<p>  <?  // 106年的補助四 = 105、104年的補助五 ?>

		　　特色一實施計畫：<? echo ($a5_1 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a5_1."' target='_new'>$a5_1</a>");?><p>

			<div style="display:<?=($a5_2 == '')?'none':''; //空白就不顯示?>;">
		　　特色二實施計畫：<? echo ($a5_2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a5_2."' target='_new'>$a5_2</a>");?><p>
			</div>

		<table>
			<? if($page1_warning == '') {echo "<!-- ";} ?>
				<tr>
					<td nowrap="nowrap">● 學校資料警示原因：</td>
					<td><?=$page1_warning;?></td>
				</tr>
				<tr>
					<td nowrap="nowrap">● 學校資料學校說明：</td>
					<td><?=$page1_desc;?></td>
				</tr>
			<? if($page1_warning == '') {echo " -->";} ?>

			<? if($page2_warning == '') {echo "<!-- ";} ?>
				<tr>
					<td nowrap="nowrap">● 目標學生警示原因：</td>
					<td><?=$page2_warning;?></td>
				</tr>
				<tr>
					<td nowrap="nowrap">● 目標學生學校說明：</td>
					<td><?=$page2_desc;?></td>
				</tr>
			<? if($page2_warning == '') {echo " -->";} ?>
		</table>

		<p>
		<hr>
		<p>

		<b>● 初審結果：</b><p>
		　<input type="radio" name="city_approved" value="Y" id="city_approved_1" <?=(($city_approved == 'Y')?'checked':"");?>> <img src="/edu/images/yes.png" align="absmiddle"/> 審核通過<p>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
	</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>