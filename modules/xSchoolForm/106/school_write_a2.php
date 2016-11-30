<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	$keyClasses = '13';  // 設定可申請特色二的最少班級數

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

	$sql = 	"    SELECT sd.account                                              ".
			"         , sd.schooltype                                           ".
			"         , sd.cityname                                             ".
			"         , sd.district                                             ".
			"         , sd.schoolname                                           ".
			"         , sy.*                                                    ".
			"         , a2.p1_name                                              ".  // 補助二：補助學校發展教育特色
			"         , a2.p2_name                                              ".
			"         , a2.s_p1_student                                         ".
			"         , a2.s_p2_student                                         ".
			"         , a2.s_p1_target                                          ".
			"         , a2.s_p2_target                                          ".
			"         , a2.s_total_money                                        ".
			"         , a2.s_p1_money                                           ".
			"         , a2.s_p2_money                                           ".
			"         , a2.s_p1_current_cnt , a2.s_p1_current_money             ".
			"         , a2.s_p1_capital_cnt , a2.s_p1_capital_money             ".
			"         , a2.s_p2_current_cnt , a2.s_p2_current_money             ".
			"         , a2.s_p2_capital_cnt , a2.s_p2_capital_money             ".
			"         , a2.p1_IsContinue                                        ".
			"         , a2.p2_IsContinue                                        ".
			"         , a2.p_num                                                ".
			"         , a2.p1_ContinueYear                                      ".
			"         , a2.p2_ContinueYear                                      ".
			"         , a2.s_total_money_ny1                                    ".  // 去年資料
			"         , a2.s_p1_money_ny1                                       ".
			"         , a2.s_p2_money_ny1                                       ".
			"         , a2.s_p1_current_cnt_ny1 , a2.s_p1_current_money_ny1     ".
			"         , a2.s_p1_capital_cnt_ny1 , a2.s_p1_capital_money_ny1     ".
			"         , a2.s_p2_current_cnt_ny1 , a2.s_p2_current_money_ny1     ".
			"         , a2.s_p2_capital_cnt_ny1 , a2.s_p2_capital_money_ny1     ".
			"         , a2.s_total_money_ny2                                    ".  // 前年資料
			"         , a2.s_p1_money_ny2                                       ".
			"         , a2.s_p2_money_ny2                                       ".
			"         , a2.s_p1_current_cnt_ny2 , a2.s_p1_current_money_ny2     ".
			"         , a2.s_p1_capital_cnt_ny2 , a2.s_p1_capital_money_ny2     ".
			"         , a2.s_p2_current_cnt_ny2 , a2.s_p2_current_money_ny2     ".
			"         , a2.s_p2_capital_cnt_ny2 , a2.s_p2_capital_money_ny2     ".
			"      FROM schooldata             AS sd                            ".
			" LEFT JOIN schooldata_year        AS sy ON sd.account = sy.account ".
			" LEFT JOIN alc_education_features AS a2 ON sy.seq_no  = a2.sy_seq  ".
			"     WHERE sy.school_year = '$school_year'                         ".
			"       AND sd.account     = '$username'                            ";

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
	//allowance_table_name => 各補助細項的 table name ex.alc_education_features_item
	//p => 特色 ex.p1 p2
	//main_seq => 各補助的 seq_no，ex.alc_education_features 的 seq_no (注意!!不是 _item 的 seq_no)

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
			$seq_no   = $row['seq_no'];
			$subject  = $row['subject'];
			$category = $row['category'];
			$item     = $row['item'];
			$unit     = $row['unit'];
			$price    = $row['price'];
			$amount   = $row['amount'];
			$s_money  = $row['s_money'];
			$s_desc   = $row['s_desc'];

			$s1 = array(  "", "經常門", "資本門");
			$s3 = array(  ""       => array("")
					    , "經常門" => array("", "鐘點費"  , "鐘點費(含補充保費)", "器材購置", "器材維護", "教材", "道具", "硬體設備", "其他")  // 補助二沒有加班費、旅運費
					    , "資本門" => array("",                                   "器材購置", "器材維護",                 "硬體設備", "其他")
					   );

			if($category != '雜支')
			{
				$idx++;

				// name 或 id 最後格式為 p1_xxx_1, p1=特色一(p2為二), xxx=名稱(ex.subject=科目、category=類別), 最後一位數字表示項次，每個特色有1~10

				echo "<tr align='center'>";

					// 序號
					echo "<td nowrap='nowrap'>$idx<input type='hidden' name='".$p."_seq_no_$idx' value='$seq_no'></td>";

					// 科目
					echo "<td>";
					echo "<select name='".$p."_subject_$idx' id='".$p."_opt_subject_$idx' size='1' onChange='js:change_subject(this,$idx,1);'>";
					for($j = 0; $j < count($s1); $j++) { echo "<option ".($subject == $s1[$j]?"selected":"")." >".$s1[$j]."</option>"; }
					echo "</select>";
					echo "</td>";

					// 類別
					echo "<td align='left'>";
					echo "<select name='".$p."_category_$idx' id='".$p."_opt_category_$idx' size='1' onChange='js:Count(this,$idx);'>";
					for($j = 0; $j < count($s3[$subject]); $j++) { echo "<option ".($category == $s3[$subject][$j]?"selected":"")." >".$s3[$subject][$j]."</option>"; }
					echo "</select>";
					echo "</td>";

					// 項目、單位、單價、數量、金額、說明
					echo "<td><input type='text' size='8' name='".$p."_item_$idx'    value='$item'    onchange='js:Count(this,$idx);'></td>";
					echo "<td><input type='text' size='2' name='".$p."_unit_$idx'    value='$unit'    style='text-align:center;' onchange='js:Count(this,$idx);'></td>";
					echo "<td><input type='text' size='4' name='".$p."_price_$idx'   value='$price'   style='text-align:right;'  onchange='js:Count(this,$idx);' onkeyup=value=value.replace(/[^\d]/g,'')></td>";
					echo "<td><input type='text' size='2' name='".$p."_amount_$idx'  value='$amount'  style='text-align:right;'  onchange='js:Count(this,$idx);' onkeyup=value=value.replace(/[^\d]/g,'')></td>";
					echo "<td><input type='text' size='3' name='".$p."_s_money_$idx' value='$s_money' style='border:0px; text-align:right; background-color:aliceblue;' readonly></td>";
					echo "<td><input type='text' size='6' name='".$p."_s_desc_$idx'  value='$s_desc'></td>";

				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;

				$outlay_seq_no   = $row['seq_no'];
				$outlay_subject  = $row['subject'];
				$outlay_category = $row['category'];
				$outlay_item     = $row['item'];
				$outlay_s_money  = $row['s_money'];
				$outlay_s_desc   = $row['s_desc'];
			}
		}

		// 補滿19項
		for($i = ($num_rows + 1 - $has_outlay); $i < 20; $i++)
		{
			echo "<tr align='center'>";
			echo "<td nowrap='nowrap'>$i<input type='hidden' name='".$p."_seq_no_$i' value=''></td>";
			echo "<td>";
			echo "<select name='".$p."_subject_$i' id='".$p."_opt_subject_$i' size='1' onChange='js:change_subject(this,$i,1);'>";
			echo "<option selected></option>";
			echo "<option>經常門</option>";
			echo "<option>資本門</option>";
			echo "</select>";
			echo "</td>";
			echo "<td align='left'>";
			echo "<select name='".$p."_category_$i' id='".$p."_opt_category_$i' size='1' onChange='js:Count(this,$i);'>";
			echo "<option selected></option>";
			echo "</select>";
			echo "</td>";
			echo "<td><input type='text' size='8' name='".$p."_item_$i'    value='' onchange='js:Count(this,$i);'></td>";
			echo "<td><input type='text' size='2' name='".$p."_unit_$i'    value='' style='text-align:center;' onchange='js:Count(this,$i);'></td>";
			echo "<td><input type='text' size='4' name='".$p."_price_$i'   value='' style='text-align:right;'  onchange='js:Count(this,$i);' onkeyup=value=value.replace(/[^\d]/g,'')></td>";
			echo "<td><input type='text' size='2' name='".$p."_amount_$i'  value='' style='text-align:right;'  onchange='js:Count(this,$i);' onkeyup=value=value.replace(/[^\d]/g,'')></td>";
			echo "<td><input type='text' size='3' name='".$p."_s_money_$i' value='' style='border:1px; text-align:right; background-color:aliceblue;' readonly></td>";
			echo "<td><input type='text' size='6' name='".$p."_s_desc_$i'  value=''></td>";
			echo "</tr>";
		}

		if($has_outlay != 1) //如果沒有雜支，把項目清空
		{
			$outlay_seq_no   = '';
			$outlay_subject  = '經常門';
			$outlay_category = '雜支';
			$outlay_item     = '';
			$outlay_s_money  = '';
			$outlay_s_desc   = '';
		}

		// 顯示雜支
		echo "<tr align='center'>";
		echo "<td nowrap='nowrap'>20<input type='hidden' name='".$p."_seq_no_20' value='$outlay_seq_no'></td>";
		echo "<td>";
		echo "<select name='".$p."_subject_20' id='".$p."_opt_subject_20' size='1' >";
		echo "<option selected>$outlay_subject</option>";
		echo "</select>";
		echo "</td>";
		echo "<td align='left'>";
		echo "<select name='".$p."_category_20' id='".$p."_opt_category_20' size='1' >";
		echo "<option selected>$outlay_category</option>";
		echo "</select>";
		echo "</td>";
		echo "<td><input type='checkbox'      name='".$p."_item_20'    value='Y' onclick='js:chkbox(this);' ".(($outlay_item == 'Y')?"checked":"")." >申請雜支</td>";
		echo "<td><input type='text' size='2' name='".$p."_unit_20'    value='' style='border:0px; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='4' name='".$p."_price_20'   value='' style='border:0px; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='2' name='".$p."_amount_20'  value='' style='border:0px; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='3' name='".$p."_s_money_20' value='$outlay_s_money' style='text-align:right; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='6' name='".$p."_s_desc_20'  value='$outlay_s_desc'></td>";
		echo "</tr>";
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

申請補助經費 / 填寫經費 / <b>補助項目二：補助學校發展教育特色</b>

<p>
<hr>
<p>

<body>

	<form name="form" method="post" action="school_write_a2_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

		● <a href="/edu_dl/106/allowance-02.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		<font color=blue>
			<img src='/edu/images/calculator.png' align="absmiddle"> 申請補助經費：<p>
			　　<input type="text" size="5" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元<p>
		</font>

		<p>
		● 貴校班級數為
		<b><?=$class_total;?></b> 班，全校學生人數
		<b><?=$student;?></b> 人，目標學生人數
		<b><?=$target_aboriginal;?></b> 人。<p>

		<p>
		<hr>
		<p>

		● 特色名稱：
		<input type="text" size="30" name="p1_name" value="<?=$p1_name;?>" ><p>

		　參加學生人數：
		<input type="text" size="2" name="s_p1_student" value="<?=$s_p1_student;?>" onChange="js:target_per('p1',this);" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人，其中含目標學生
		<input type="text" size="2" name="s_p1_target"  value="<?=$s_p1_target;?>"  onChange="js:target_per('p1',this);" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人。<p>

		　（目標學生佔參加學生
		<input type="text" size="3" name="s_p1_per" value="<?=$s_p1_per;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> %）<p>

		　本特色為第
		  <input type="text" size="1" name="p1_ContinueYear" value="<?=$p1_ContinueYear;?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 年辦理。<p>

		<input type="hidden" name="s_p1_money" value="<?=$s_p1_money;?>">

		<p>
		<hr>
		<p>
		
		　● 經常門
		<input type="text" size="5" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
		<input type="text" size="5" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元<p>

		　● 學校發展教育特色經費概算
		<table border="2" rules="rows" cellspacing="0" cellpadding="0" bgcolor="aliceblue">
			<tr height="30px" bgcolor="#DAEEFF">
				<td align="center" nowrap="nowrap">項次</td>
				<td align="center" nowrap="nowrap">科目</td>
				<td align="center" nowrap="nowrap">類別</td>
				<td align="center" nowrap="nowrap">項目</td>
				<td align="center" nowrap="nowrap">單位</td>
				<td align="center" nowrap="nowrap">單價</td>
				<td align="center" nowrap="nowrap">數量</td>
				<td align="center" nowrap="nowrap">金額</td>
				<td align="center" nowrap="nowrap">說明</td>
			</tr>
			<? print_item($a2_table_name_item, 'p1_'.$school_year, $main_seq); ?>
		</table>
		<p>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
		<input type="submit" name="button"      value="　儲 存　" />

		<script language="JavaScript">

			function toCheck()
			{
				var flag   = 1;
				var errmsg = "";

				/* 空值檢查 */				
				if(document.form.p1_name.value == "")
				{
					errmsg += "請填寫「特色名稱」。\n";
					document.form.p1_name.focus();
					flag = 0;
				}
				if(document.getElementsByName('s_p1_student')[0].value == "")
				{
					errmsg += "請填寫「參加學生人數」。\n";
					document.getElementsByName('s_p1_student')[0].focus();
					flag = 0;
				}
				if(document.getElementsByName('s_p1_target')[0].value == "")
				{
					errmsg += "請填寫「目標學生參加人數」。\n";
					document.getElementsByName('s_p1_target')[0].focus();
					flag = 0;
				}
				
				/* 目標學生參與比率檢查 */
				if(document.form.s_p1_per.value < 50)
				{
					errmsg += "目標學生參與率需達 50 %。\n";
					document.form.p_num.focus();
					flag = 0;
				}

				/* 金額檢查 */
				if(("<?=$schoolname;?>".indexOf("分校") != -1) || ("<?=$schoolname;?>".indexOf("分班") != -1))
				{
					if(document.form.s_total_money.value > 60000)
					{
						errmsg += '分校分班每年最高補助 6 萬元。\n';
						flag = 0;
					}
				}
				else if(<?=$class_total;?> < <?=$keyClasses;?> && document.form.s_total_money.value > 80000)
				{
					errmsg += '12 班以下學校每校每年最高補助 8 萬元。\n';
					flag = 0;
				}
				else if(document.form.s_total_money.value > 160000)
				{
					errmsg += '本項補助每校每年最高補助 16 萬元。\n';
					flag = 0;
				}

				/* 檢核結束，送出提示訊息 */
				if(flag == 0)
				{
					alert(errmsg);
					return false;
				}
				else
				{
					return true;
				}
			}

			function Count(obj, item_idx)  // 計算單一項目的金額
			{
				// 取得控制項
				var p = left(obj.name, 6);
				var opt_subject  = document.getElementById(    p + '_opt_subject_'  + item_idx);     // 科目
				var opt_category = document.getElementById(    p + '_opt_category_' + item_idx);     // 類別
				var item         = document.getElementsByName( p + '_item_'         + item_idx)[0];  // 項目
				var unit         = document.getElementsByName( p + '_unit_'         + item_idx)[0];  // 單位
				var price        = document.getElementsByName( p + '_price_'        + item_idx)[0];  // 單價
				var amount       = document.getElementsByName( p + '_amount_'       + item_idx)[0];  // 數量
				var s_money      = document.getElementsByName( p + '_s_money_'      + item_idx)[0];  // 金額

				var flag = 1;

				/*
					驗證分成兩部分
					1.填寫 科目、類別、項目、單位(文字)
					2.填寫 單價、數量(數值)
				*/

				switch (obj.name)
				{
					/* 科目、類別、項目、單位 */
					case opt_subject.name:
					case opt_category.name:
					case item.name:
					case unit.name:
					{
						if(opt_subject.value == '資本門' && price.value < 10000 && price.value != '')  // 資本門驗證
						{
							alert('「單價」未逾 1 萬元，請列經常門。');
							price.value = '';
							s_money.value = '';
							flag = 0;
						}

						if(opt_subject.value == '經常門'  && price.value >= 10000 && price.value != '')  // 經常門驗證
						{
							alert('「單價」1 萬元以上，請列資本門。');
							price.value = '';
							s_money.value = '';
							flag = 0;
						}

						if(item.value.match("雜支") != null)
						{
							alert('不可直接填寫雜支，請在表單下方勾選。');
							item.value = "";
							flag = 0;
						}

						if(item.value.indexOf("外聘") > -1)
						{
							if(opt_subject.value == '資本門')
							{
								alert('請先選列經常門，再輸入外聘講師項目。');
								item.value = "";
								flag = 0;
							}
							price.value = 400;  // 外聘講師鐘點費一律單價每節 400 元
						}
						
						if(item.value.indexOf("內聘") > -1)
						{
							if(opt_subject.value == '資本門')
							{
								alert('請先選列經常門，再輸入內聘講師項目。');
								item.value = "";
								flag = 0;
							}
							
							if("<? echo $schooltype; ?>" == "國小")  // 國小內聘講師鐘點費 260 元
							{
								price.value = 260;
							}
							else  // 國中內聘講師鐘點費 360 元
							{
								price.value = 360;
							}
						}

						if(opt_subject.value == '' || opt_category.value == '' || item.value == '' || unit.value == '' || amount.value == '' || price.value == '')  // 六個欄位有一個為空值就不計算
						{
							s_money.value = '';  // 清空金額欄位
							flag = 0;
						}

						break;
					}

					/* 單價、數量 */
					case price.name:
					case amount.name:
					{
						if(opt_subject.value == '資本門' && price.value < 10000 && price.value != '')  // 資本門驗證
						{
							alert('「單價」未逾 1 萬元，請列經常門。');
							price.value = '';
							s_money.value = '';
							flag = 0;
						}

						if(opt_subject.value == '經常門'  && price.value >= 10000 && price.value != '')  // 經常門驗證
						{
							alert('「單價」1 萬元以上，請列資本門。');
							price.value = '';
							s_money.value = '';
							flag = 0;
						}

						if(amount.value == '' || price.value == '')  // 空白時不計算 不顯訊息
						{
							s_money.value = '';
							flag = 0;
						}

						if(opt_subject.value == '' || opt_category.value == '' || item.value == '' || unit.value == '')
						{
							s_money.value = ''; //清空金額欄位
							flag = 0;

							if(price.value != '' && amount.value != '') //單價 數量 都有填才顯示警告訊息
								alert('「科目」、「類別」、「項目」、「單位」不能為空白。');
						}
						break;
					}
				}

				if(flag == 1)
				{
					/* 系統改金額，可能不會觸發onChange，再次計算一次 */

					if(item.value.indexOf("外聘") > -1)
					{
						price.value = 400;  // 外聘講師鐘點費一律單價每節400元
					}
					if(item.value.indexOf("內聘") > -1)
					{
						if("<? echo $schooltype; ?>" == "國小")  // 國小內聘講師鐘點費 260 元
						{
							price.value = 260;
						}
						else  // 國中內聘講師鐘點費 360 元
						{
							price.value = 360;
						}
					}
					s_money.value = parseInt(price.value) * parseInt(amount.value); // 單價 * 數量

					if(opt_category.value == '鐘點費(含補充保費)')
					{
						s_money.value = Math.round(s_money.value * <?=$supplementary_premium_rate;?>)  // 四捨五入（105年03月21日 開會決議 ）
					}
				}

				chkbox(document.getElementsByName(p + '_item_20')[0]);  // 計算雜支
			}

			function chkbox(obj)  // 計算雜支
			{
				var p = left(obj.name, 6);
				var s_money_20 = document.getElementsByName(p + '_s_money_20')[0];  // 第20項的金額控制項

				if(obj.checked == false)
				{
					s_money_20.value = "";  // 沒選就清空金額
				}
				else
				{
					var opt_subject, s_money;
					var i;
					var total = 0;

					// 把 1 ~ 19 項金額加總
					for(i = 1; i < 20; i++)
					{
						opt_subject  = document.getElementById(p + '_opt_subject_' + i);   // 科目
						opt_category = document.getElementById(p + '_opt_category_' + i);  // 類別
						s_money = document.getElementsByName(p + '_s_money_' + i)[0];      // 金額

						if(opt_subject.value == '經常門' && s_money.value != '')  // 雜支
						{
							total += parseInt(s_money.value);
						}
					}

					s_money_20.value = Math.round(total * 0.06);  // 四捨五入（105年03月21日 開會決議）
				}
				count_all();
			}

			function count_all()  // 計算總金額
			{
				var s_total_money = document.getElementsByName('s_total_money')[0];  // 總金額

				s_total_money.value = 0;

				var i, j, k;
				var school_year = <?=$school_year;?>;

				for(i = 1; i < 20; i++)
				{
					for(k = school_year; k <= (school_year + 2); k++)
					{
						if(k == 106)  // 原104
						{
							var s_p_money         = document.getElementsByName('s_p' + i + '_money')[0];
							var s_p_current_money = document.getElementsByName('s_p' + i + '_current_money')[0];
							var s_p_capital_money = document.getElementsByName('s_p' + i + '_capital_money')[0];
						}

						/*
							ex. s_p1_money ,s_p2_money
							ex. s_p1_current_money
							ex. s_p1_capital_money
						*/

						if(s_p_money != null)
						{
							var current_money = 0;
							var capital_money = 0;

							for(j = 1; j <= 20; j++)  // 計算各特色經常 & 資本
							{
								var opt_subject = document.getElementById(   'p' + i + '_' + k + '_opt_subject_' + j);     // 科目
								var s_money     = document.getElementsByName('p' + i + '_' + k + '_s_money_'     + j)[0];  // 金額

								if(s_money.value != '' && opt_subject.value == '經常門') current_money += parseInt(s_money.value);
								if(s_money.value != '' && opt_subject.value == '資本門') capital_money += parseInt(s_money.value);
							}

							s_p_money.value = parseInt(current_money) + parseInt(capital_money);  // 各特色的經常 + 資本
							s_p_current_money.value = current_money;  // 各特色的經常門金額
							s_p_capital_money.value = capital_money;  // 各特色的資本門金額

							if(k == 106)  // 原104
							{
								s_total_money.value = parseInt(s_total_money.value) + parseInt(s_p_money.value);  // 所有特色的總和
							}
						}
					}
				}
			}

			function target_per(p, obj)  // 計算目標學生佔參加學生百分比
			{
				var student = document.getElementsByName('s_' + p + '_student')[0];
				var target  = document.getElementsByName('s_' + p + '_target')[0];
				var per     = document.getElementsByName('s_' + p + '_per')[0];

				if(student != '' && target != '')
				{
					if(parseInt(student.value) < parseInt(target.value))
					{
						obj.value = '';
						per.value = '';
						alert('「參加學生人數」不可小於「目標學生人數」');
					}
					else
					{
						var x;
						x = target.value / student.value * 100;
						per.value = x.toFixed(2);
					}
				}
			}
			
			function change_subject(obj, idx, YN) // 設定下拉選單
			{
				var selectName=obj.options[obj.selectedIndex].text;
				NewOpt = new Array;

				if(selectName == "")
				{
					NewOpt[0] = new Option("");
				}

				if(selectName == "經常門")
				{
					NewOpt[0] = new Option("");
					NewOpt[1] = new Option("鐘點費");
					NewOpt[2] = new Option("鐘點費(含補充保費)");
					NewOpt[3] = new Option("器材購置");
					NewOpt[4] = new Option("器材維護");
					NewOpt[5] = new Option("教材");
					NewOpt[6] = new Option("道具");
					NewOpt[7] = new Option("硬體設備");  // 補助二有硬體設備
					NewOpt[8] = new Option("其他");
				}

				if(selectName == "資本門")
				{
					NewOpt[0] = new Option("");
					NewOpt[1] = new Option("器材購置");
					NewOpt[2] = new Option("器材維護");
					NewOpt[3] = new Option("硬體設備");  // 補助二有硬體設備
					NewOpt[4] = new Option("其他");
				}

				newnum = NewOpt.length;

				var p = left(obj.id,6);  // 取得p1_XXX or p2_XXX

				var opt_category = document.getElementById(p + '_opt_category_' + idx)
				
				opt_category.options.length = 0;  // 清除之前下拉選單中的項目
				
				for (i = 0; i < newnum; i++){opt_category.options[i] = NewOpt[i];}  // 加入新選類別的項目

				opt_category.options[0].selected = true;

				if(YN == '1'){Count(obj, idx);}  // page load 時不計算總金額，變換項目後計算總金額
			}
			
			function left(mainStr, n)  // 取得左 N 位
			{
				return mainStr.substring(0,n);
			}
			
			function padLeft(str, lenght)  // 左邊補 0
			{
				if(str.length >= lenght){return str;}
				else                    {return padLeft("0" + str,lenght);}
			}
		</script>
	</form>
</body>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
	　貴校最多可以申請
	<b><? if($class_total < $keyClasses){echo "1";} else{echo "2";} ?></b> 項特色補助，要申請
	<input type="text" size="1" name="p_num" value="<?=$p_num;?>" style="text-align:center;" onkeyup="value=value.replace(/[^1-2]/g,'')" onpaste="return false"> 項特色。
<input type="checkbox" name="p1_IsContinue" value="Y" <?=($p1_IsContinue == "Y")?"checked":"";?> >本特色為延續性辦理
	if(in_array($username, $more_than_100thousand_school))  // 當年度的config裡面
	{
	 ［106年度限定款］學校位於人口超過10萬人以上的鄉鎮市區，只能申請經費至106年。 
	}
*/
?>