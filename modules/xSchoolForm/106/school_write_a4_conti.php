<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	$keyStudent = 100;  // 設定可申請特色二的最少學生數
	
	$supplementary_premium_rate = 1.0191; // 宣告補充保費費率為1.91%
	
	/*
	  ┌──────────────────────────────────────────────────────────────────┐
	  │	全民健康保險法施行細則（修正日期：民國104年12月15日）            │
	  │	第52條 第1款：保險費及滯納金之繳納，以元為單位，角以下四捨五入。 │
	  │                                                                  │
	  │	衛生福利部 公告                                                  │
	  │	發文日期：中華民國104年12月31日                                  │
	  │	發文字號：衛部保字第1041260973號                                 │
	  │	公告事項：                                                       │
	  │		二、修正補充保險費費率為1.91%	                             │
	  └──────────────────────────────────────────────────────────────────┘
	*/

	$sql = 	"    SELECT sd.account                                                ".
			"         , sd.schooltype                                             ".
			"         , sd.cityname                                               ".
			"         , sd.district                                               ".
			"         , sd.schoolname                                             ".
			"         , sy.*                                                      ".
			"         , a4.p1_name                                                ".
			"         , a4.p2_name                                                ".
			"         , a4.s_p1_student                                           ".
			"         , a4.s_p2_student                                           ".
			"         , a4.s_p1_target                                            ".
			"         , a4.s_p2_target                                            ".
			"         , a4.s_total_money                                          ".
			"         , a4.s_p1_money                                             ".
			"         , a4.s_p2_money                                             ".
			"         , a4.s_p1_current_cnt , a4.s_p1_current_money               ".
			"         , a4.s_p1_capital_cnt , a4.s_p1_capital_money               ".
			"         , a4.s_p2_current_cnt , a4.s_p2_current_money               ".
			"         , a4.s_p2_capital_cnt , a4.s_p2_capital_money               ".
			"         , a4.p1_IsContinue                                          ".
			"         , a4.p2_IsContinue                                          ".
			"         , a4.p_num                                                  ".
			"         , a4.p1_ContinueYear                                        ".
			"         , a4.p2_ContinueYear                                        ".
			"         , a4.s_total_money_ny1                                      ".  // 去年資料
			"         , a4.s_p1_money_ny1                                         ".
			"         , a4.s_p2_money_ny1                                         ".
			"         , a4.s_p1_current_cnt_ny1 , a4.s_p1_current_money_ny1       ".
			"         , a4.s_p1_capital_cnt_ny1 , a4.s_p1_capital_money_ny1       ".
			"         , a4.s_p2_current_cnt_ny1 , a4.s_p2_current_money_ny1       ".
			"         , a4.s_p2_capital_cnt_ny1 , a4.s_p2_capital_money_ny1       ".
			"         , a4.s_total_money_ny2                                      ".  // 前年資料
			"         , a4.s_p1_money_ny2                                         ".
			"         , a4.s_p2_money_ny2                                         ".
			"         , a4.s_p1_current_cnt_ny2 , a4.s_p1_current_money_ny2       ".
			"         , a4.s_p1_capital_cnt_ny2 , a4.s_p1_capital_money_ny2       ".
			"         , a4.s_p2_current_cnt_ny2 , a4.s_p2_current_money_ny2       ".
			"         , a4.s_p2_capital_cnt_ny2 , a4.s_p2_capital_money_ny2       ".			
			"         , a4.inherit_year                                           ".
			"      FROM schooldata               AS sd                            ".
			" LEFT JOIN schooldata_year          AS sy ON sd.account = sy.account ".
			" LEFT JOIN alc_aboriginal_education AS a4 ON sy.seq_no  = a4.sy_seq  ".
			"     WHERE sy.school_year = '$school_year'                           ".
			"       AND sd.account     = '$username'                              ";

	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		$account    = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   = $row['cityname'];
		$district   = $row['district'];
		$schoolname = $row['schoolname'];

		$student              = $row['student'];
		$target_aboriginal    = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total          = $row['class_total'];

		$main_seq        = $row['seq_no'];  // school_year的seq_no
		$p1_name         = $row['p1_name'];
		$p2_name         = $row['p2_name'];
		$p1_IsContinue   = $row['p1_IsContinue'];
		$p2_IsContinue   = $row['p2_IsContinue'];
		$p1_ContinueYear = $row['p1_ContinueYear'];
		$p2_ContinueYear = $row['p2_ContinueYear'];
		$s_p1_student    = $row['s_p1_student'];
		$s_p2_student    = $row['s_p2_student'];
		$s_p1_target     = $row['s_p1_target'];
		$s_p2_target     = $row['s_p2_target'];
		$p_num           = $row['p_num'];

		$s_total_money      = ($row['s_total_money']      == '')?0:$row['s_total_money'];  // NULL則填入0
		$s_p1_money         = ($row['s_p1_money']         == '')?0:$row['s_p1_money'];
		$s_p1_current_cnt   = ($row['s_p1_current_cnt']   == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt   = ($row['s_p1_capital_cnt']   == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money         = ($row['s_p2_money']         == '')?0:$row['s_p2_money'];
		$s_p2_current_cnt   = ($row['s_p2_current_cnt']   == '')?0:$row['s_p2_current_cnt'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_cnt   = ($row['s_p2_capital_cnt']   == '')?0:$row['s_p2_capital_cnt'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];

		$s_total_money_ny1      = ($row['s_total_money_ny1']      == '')?0:$row['s_total_money_ny1'];
		$s_p1_money_ny1         = ($row['s_p1_money_ny1']         == '')?0:$row['s_p1_money_ny1'];
		$s_p1_current_cnt_ny1   = ($row['s_p1_current_cnt_ny1']   == '')?0:$row['s_p1_current_cnt_ny1'];
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_cnt_ny1   = ($row['s_p1_capital_cnt_ny1']   == '')?0:$row['s_p1_capital_cnt_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1         = ($row['s_p2_money_ny1']         == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_cnt_ny1   = ($row['s_p2_current_cnt_ny1']   == '')?0:$row['s_p2_current_cnt_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_cnt_ny1   = ($row['s_p2_capital_cnt_ny1']   == '')?0:$row['s_p2_capital_cnt_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];

		$s_total_money_ny2      = ($row['s_total_money_ny2']      == '')?0:$row['s_total_money_ny2'];
		$s_p1_money_ny2         = ($row['s_p1_money_ny2']         == '')?0:$row['s_p1_money_ny2'];
		$s_p1_current_cnt_ny2   = ($row['s_p1_current_cnt_ny2']   == '')?0:$row['s_p1_current_cnt_ny2'];
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_cnt_ny2   = ($row['s_p1_capital_cnt_ny2']   == '')?0:$row['s_p1_capital_cnt_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2         = ($row['s_p2_money_ny2']         == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_cnt_ny2   = ($row['s_p2_current_cnt_ny2']   == '')?0:$row['s_p2_current_cnt_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_cnt_ny2   = ($row['s_p2_capital_cnt_ny2']   == '')?0:$row['s_p2_capital_cnt_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];
		
		$inherit_year = $row['inherit_year'];

		// 計算目標學生百分比
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
	//allowance_table_name => 各補助細項的 table name ex.alc_aboriginal_education_item
	//p => 特色 ex.p1 p2
	//main_seq => 各補助的 seq_no，ex.alc_aboriginal_education 的 seq_no (注意!!不是 _item 的 seq_no)
	
	function print_item($allowance_table_name, $p, $main_seq)
	{
		$sql = "   SELECT *                      ".
			   "     FROM $allowance_table_name  ".
			   "    WHERE main_seq = '$main_seq' ".
			   "      AND section  = '$p'        ".  // 特色1
			   " ORDER BY seq_no ASC             ";

		$result   = mysql_query($sql);
		$num_rows = mysql_num_rows($result);  // 列數
			
		$has_outlay = 0;  // 有無雜支項目
		$idx = 0;

		// 順序：顯示已填資料 -> 補滿9項(未滿9時補上空值) -> 顯示雜支
		while($row = mysql_fetch_array($result))
		{
			$seq_no      = $row['seq_no'];
			$subject     = $row['subject'];
			$category    = $row['category'];
			$item        = $row['item'];
			$unit        = $row['unit'];
			$price       = $row['price'];
			$amount      = $row['amount'];
			$s_money     = $row['s_money'];
			$s_desc      = $row['s_desc'];
			$city_money  = $row['city_money'];
			$city_delete = $row['city_delete'];
			$edu_money   = $row['edu_money'];
			$edu_delete  = $row['edu_delete'];

			if($category != '雜支')
			{
				$idx++;

				echo "<tr height='30px' style='font-size:12px;'>";
				echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx</td>";
				echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$subject</td>";   // 科目
				echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$category</td>";  // 類別
				echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$item</td>";      // 項目
				echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$unit</td>";      // 單位
				echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$price</td>";
				echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$amount</td>";
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

				$outlay_subject     = $row['subject'];
				$outlay_category    = $row['category'];
				$outlay_s_money     = $row['s_money'];
				$outlay_s_desc      = $row['s_desc'];
				$outlay_city_money  = $row['city_money'];
				$outlay_city_delete = $row['city_delete'];
				$outlay_edu_money   = $row['edu_money'];
				$outlay_edu_delete  = $row['edu_delete'];
			}
		}
		
		$idx++;
		
		if($has_outlay == 1)  // 顯示雜支
		{
			echo "<tr height='30px' style='font-size:12px;'>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx.</td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$outlay_subject</td>";   // 科目
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$outlay_category</td>";  // 類別
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$outlay_s_money</td>";
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$outlay_s_desc</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='cornsilk'>$outlay_city_money</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='cornsilk'>$outlay_city_delete</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='mistyrose'>$outlay_edu_money</td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='mistyrose'>$outlay_edu_delete</td>";
			echo "</tr>";
		}
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="school_write_allowance.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

申請補助經費 / 填寫經費 / <b>補助項目四：發展原住民文化特色及充實設備器材</b>

<p>
<hr>
<p>

<body>
	<form name="form" method="post" action="school_write_a4_finish.php" onKeyDown="if(event.keyCode == 13) return false;">

		● <a href="/edu_dl/106/allowance-04.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>
		
		<font color=red>
			● 沿用<?=$inherit_year;?>年度計畫。<p>
		</font>
		
		<font color=blue>
			<img src='/edu/images/calculator.png' align="absmiddle"> 申請補助經費：<p>			
		　　	<?=$school_year;    ?>年度：<input type="text" size="5" name="s_total_money"     value="<?=$s_total_money;?>"     style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元<p>
			<div <? if ($s_total_money_ny1 == 0) echo "style='display:none'"; ?>>
		　　	<?=($school_year+1);?>年度：<input type="text" size="5" name="s_total_money_ny1" value="<?=$s_total_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元<p>
			</div>
		</font>
		
		<p>
		● 貴校班級數為
		<b><?=$class_total;?></b> 班，全校學生人數
		<b><?=$student;?></b> 人，目標學生人數
		<b><?=$target_aboriginal;?></b> 人。<p>
		
		<p>
		● 申請 <input type="text" size="1" name="p_num" value="<?=$p_num;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> 項特色。<p>

		<p>
		<hr>
		<p>

		● 特色一<p>

		　特色名稱：
		<input type="text" size="20" name="p1_name" value="<?=$p1_name;?>" style="border:0px; background-color:aliceblue;" readonly><p>

		　參加學生人數：
		<input type="text" size="2" name="s_p1_student" value="<?=$s_p1_student;?>" onChange="js:target_per('p1',this);" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人，其中含目標學生
		<input type="text" size="2" name="s_p1_target"  value="<?=$s_p1_target;?>"  onChange="js:target_per('p1',this);" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人。<p>

		　目標學生佔參加學生
		<input type="text" size="3" name="s_p1_per" value="<?=$s_p1_per;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> %。<p>

		　<input type="checkbox" name="p1_IsContinue" value="Y" <?=($p1_IsContinue == "Y")?"checked":"";?> onClick="return false;">本特色為延續性辦理，本年度為第
		  <input type="text" size="1" name="p1_ContinueYear" value="<?=$p1_ContinueYear;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> 年辦理。<p>

		<font color="blue"><b><?=$school_year;?>年度：</b></font>
		<input type="text" size="5" name="s_p1_money"         value="<?=$s_p1_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（含經常門經費
		<input type="text" size="5" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門經費
		<input type="text" size="5" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）<p>
	
		<table border="2" rules="rows" cellspacing="2" cellpadding="2">
			<tr height="30px" align="center">
				<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
				<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
				<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
			</tr>
			<tr height="30px" align="center" style='font-size:12px;'>
				<td nowrap="nowrap" bgcolor="#DAEEFF">項次</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">科目</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">類別</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">項目</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">單位</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">單價</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">數量</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">金額</td>
				<td nowrap="nowrap" bgcolor="#DAEEFF">說明</td>
				<td nowrap="nowrap" bgcolor="#FFE1A4">初審</td>
				<td nowrap="nowrap" bgcolor="#FFE1A4">刪減</td>
				<td nowrap="nowrap" bgcolor="#FFCCCC">複審</td>
				<td nowrap="nowrap" bgcolor="#FFCCCC">刪減</td>
			</tr>
			<? print_item($a4_table_name_item, 'p1_'.$school_year, $main_seq);  // 顯示細項 ?>
		</table>
		<p>

		<div <? if ($s_total_money_ny1 == 0) echo "style='display:none'"; ?>>

			<font color="blue"><b><?=($school_year+1);?>年度：</b></font>
			<input type="text" size="5" name="s_p1_money_ny1"         value="<?=$s_p1_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（含經常門經費
			<input type="text" size="5" name="s_p1_current_money_ny1" value="<?=$s_p1_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門經費
			<input type="text" size="5" name="s_p1_capital_money_ny1" value="<?=$s_p1_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）<p>

			<table border="2" rules="rows" cellspacing="2" cellpadding="2">
				<tr height="30px" align="center">
					<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
				</tr>
				<tr height="30px" align="center" style='font-size:12px;'>
					<td nowrap="nowrap" bgcolor="#DAEEFF">項次</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">科目</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">類別</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">項目</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">單位</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">單價</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">數量</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">金額</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">說明</td>
					<td nowrap="nowrap" bgcolor="#FFE1A4">初審</td>
					<td nowrap="nowrap" bgcolor="#FFE1A4">刪減</td>
					<td nowrap="nowrap" bgcolor="#FFCCCC">複審</td>
					<td nowrap="nowrap" bgcolor="#FFCCCC">刪減</td>
				</tr>
				<? print_item($a4_table_name_item, 'p1_'.($school_year+1), $main_seq); ?>
			</table>
			<p>
		</div>

		<!-- 這是特色一和特色二的程式碼分隔線 -->

		<div <? if ($class_total < $keyClasses) echo "style='display:none'"; ?>>
			
			<p>
			<hr>
			<p>

			● 特色二<p>

			　特色名稱：
			<input type="text" size="20" name="p2_name" value="<?=$p2_name;?>" style="border:0px; background-color:aliceblue;" readonly><p>

			　參加學生人數：
			<input type="text" size="2" name="s_p2_student" value="<?=$s_p2_student;?>" onChange="js:target_per('p2',this);" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人，其中含目標學生
			<input type="text" size="2" name="s_p2_target"  value="<?=$s_p2_target;?>"  onChange="js:target_per('p2',this);" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人。<p>

			　目標學生佔參加學生
			<input type="text" size="3" name="s_p2_per" value="<?=$s_p2_per;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> %。<p>

			　<input type="checkbox" name="p2_IsContinue" value="Y" <?=($p2_IsContinue == "Y")?"checked":"";?> onClick="return false;">本特色為延續性辦理，本年度為第
			  <input type="text" size="1" name="p2_ContinueYear" value="<?=$p2_ContinueYear;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> 年辦理。<p>

			<font color="blue"><b><?=$school_year;?>年度：</b></font>
			<input type="text" size="5" name="s_p2_money"         value="<?=$s_p2_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（含經常門經費
			<input type="text" size="5" name="s_p2_current_money" value="<?=$s_p2_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門經費
			<input type="text" size="5" name="s_p2_capital_money" value="<?=$s_p2_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）<p>
						
			<table border="2" rules="rows" cellspacing="2" cellpadding="2">
				<tr height="30px" align="center">
					<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
				</tr>
				<tr height="30px" align="center" style='font-size:12px;'>
					<td nowrap="nowrap" bgcolor="#DAEEFF">項次</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">科目</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">類別</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">項目</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">單位</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">單價</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">數量</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">金額</td>
					<td nowrap="nowrap" bgcolor="#DAEEFF">說明</td>
					<td nowrap="nowrap" bgcolor="#FFE1A4">初審</td>
					<td nowrap="nowrap" bgcolor="#FFE1A4">刪減</td>
					<td nowrap="nowrap" bgcolor="#FFCCCC">複審</td>
					<td nowrap="nowrap" bgcolor="#FFCCCC">刪減</td>
				</tr>
			<? print_item($a4_table_name_item, 'p2_'.$school_year, $main_seq); ?>
			</table>
			<p>

			<div <? if ($s_total_money_ny1 == 0) echo "style='display:none'"; ?>>
			
				<font color="blue"><b><?=($school_year+1);?>年度：</b></font>
				<input type="text" size="5" name="s_p2_money_ny1"         value="<?=$s_p2_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（含經常門經費
				<input type="text" size="5" name="s_p2_current_money_ny1" value="<?=$s_p2_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門經費
				<input type="text" size="5" name="s_p2_capital_money_ny1" value="<?=$s_p2_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）<p>

				<table border="2" rules="rows" cellspacing="2" cellpadding="2">
					<tr height="30px" align="center">
						<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
						<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
						<td colspan="2" nowrap="nowrap" bgcolor="#FFBDBD">教育部複審</td>
					</tr>
					<tr height="30px" align="center" style='font-size:12px;'>
						<td nowrap="nowrap" bgcolor="#DAEEFF">項次</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">科目</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">類別</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">項目</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">單位</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">單價</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">數量</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">金額</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">說明</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">初審</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">刪減</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">複審</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">刪減</td>
					</tr>
					<? print_item($a4_table_name_item, 'p2_'.($school_year+1), $main_seq); ?>
				</table>
				<p>
			</div>
		</div>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
		
		<table>
			<tr>
				<td>
					<input type="submit" name="button" value="　儲 存　">
				</td>
				<td align="right">
					<input type="button" value="修改經費內容" onclick="if(confirm('● 重要提醒！\n您目前是沿用已審核的經費概算表，今年度免初審。\n若要修改，只能修改經費，不得修改特色名稱，而且必須放棄先前已審核的經費，並重新進入初審及複審作業，您確定要修改內容嗎？')){location.href='school_write_a4_change.php'}">
				</td>
			</tr>
		</table>
		
		<script language="JavaScript">			
			function target_per(p, obj)  // 計算目標學生佔參加學生百分比
			{
				var student = document.getElementsByName('s_' + p + '_student')[0];
				var target  = document.getElementsByName('s_' + p + '_target')[0];
				var per     = document.getElementsByName('s_' + p + '_per')[0];

				var str;
				
				if(p == 'p1'){str = "特色一";}
				else         {str = "特色二";}

				var errmsg = "";

				if(student != '' && target != '')
				{
					if(parseInt(student.value) < parseInt(target.value))
					{
						obj.value = '';
						per.value = '';
						alert(str + '的「參加學生人數」不可小於「目標學生人數」');
					}
					if(parseInt(student.value) > parseInt(target.value) * 2)
					{
						obj.value = '';
						per.value = '';
						alert(str + '目標學生參與率需達 50 %');
					}
					else
					{
						var x;
						x = target.value / student.value * 100;
						per.value = x.toFixed(2);
					}
				}
			}
		</script>
	</form>
</body>
<? include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>