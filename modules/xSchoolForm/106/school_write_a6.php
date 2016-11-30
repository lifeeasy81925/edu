<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	$sql = 	"    SELECT sd.account                                           ".
			"         , sd.schooltype                                        ".
			"         , sd.cityname                                          ".
			"         , sd.district                                          ".
			"         , sd.schoolname                                        ".
			"         , sy.*                                                 ".
			"         , a6.p_num                                             ".
			"         , a6.s_total_money                                     ".
			"         , a6.s_p1_money                                        ".
			"         , a6.s_p1_current_cnt                                  ".
			"         , a6.s_p1_current_money                                ".
			"         , a6.s_p1_capital_cnt                                  ".
			"         , a6.s_p1_capital_money                                ".
			"         , a6.year_85to91                                       ".
			"         , a6.money_85to91                                      ".
			"      FROM schooldata          AS sd                            ".
			" LEFT JOIN schooldata_year     AS sy ON sd.account = sy.account ".
			" LEFT JOIN alc_school_activity AS a6 ON sy.seq_no  = a6.sy_seq  ".
			"     WHERE sy.school_year = '$school_year'                      ".
			"       AND sd.account     = '$username'                         ";

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

		$main_seq      = $row['seq_no'];  // school_year的seq_no
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money'];  // NULL則填入0

		$p_num = $row['p_num'];

		/*
			補助六沒有經常門，但是資本門分 修建 和 設備
			所以資料庫欄位
			原本的 經常門總合 = 修建總合
				   資本門     = 設備總合
		*/

		$s_p1_money         = ($row['s_p1_money']         == '')?0:$row['s_p1_money'];  // NULL則填入0
		$s_p1_current_cnt   = ($row['s_p1_current_cnt']   == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt   = ($row['s_p1_capital_cnt']   == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];

		$year_85to91  = $row['year_85to91'];   // 85~91的哪一年獲得補助，填寫年分，可不填
		$money_85to91 = $row['money_85to91'];  // 補助多少錢，可不填
	}

	/* 顯示填寫的資料 */
	function print_item($allowance_table_name, $p, $main_seq)
	{
		$sql = "   SELECT *                      ".
		       "     FROM $allowance_table_name  ".
		       "    WHERE main_seq = '$main_seq' ".
		       "      AND section  = '$p'        ".  // 特色1
		       " ORDER BY seq_no ASC             ";

		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);  // 列數

		$has_outlay = 0;  // 有無雜支項目
		$idx = 0;

		// 順序：顯示已填資料 → 補滿9項(未滿9時補上空值) → 顯示雜支
		// 補助三沒有雜支選項！
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

			// 補助六沒有經常門
			$s1 = array("", "資本門");
			$s3 = array("" => array(""), "資本門" => array("", "設備購置", "場地修繕", "工程管理", "學校管理", "其他"));

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
				echo "<td>";
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

		// 補滿10項
		for($i = ($num_rows + 1); $i <= 10; $i++)
		{
			echo "<tr align='center'>";
			echo "<td nowrap='nowrap'>$i<input type='hidden' name='".$p."_seq_no_$i' value=''></td>";
			echo "<td>";
			echo "<select name='".$p."_subject_$i' id='".$p."_opt_subject_$i' size='1' onChange='js:change_subject(this,$i,1);'>";
			echo "<option selected></option>";
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

申請補助經費 / 填寫經費 / <b>補助項目六：整修學校社區化活動場所</b>

<p>
<hr>
<p>

<body>

	<form name="form" method="post" action="school_write_a6_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

		● <a href="/edu_dl/106/allowance-06.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		<img src='/edu/images/calculator.png' align="absmiddle">
		<font color="blue">
			申請補助經費：
			<input type="text" size="5" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元。<p>
		</font>

		<p>
		<hr>
		<p>

		● 申請補助綜合球場 <input type="text" size="1" name="p_num" value="<?=$p_num;?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 座。<p>

		<input type="hidden" name="s_p1_money" value="<?=$s_p1_money;?>"> <? // s_p1_money 等於 s_total_money，不重複顯示，留 hidden ?>

		　● 其中包含修建經費
		<input type="text" size="5" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，設備經費
		<input type="text" size="5" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元。<p>

		　● 補助整修學校社區化活動場所經費概算：
		<table border="2" rules="rows" cellspacing="0" cellpadding="0" bgcolor="aliceblue">
			<tr height="30px" align="center" bgcolor="#DAEEFF">
				<td nowrap="nowrap">項次</td>
				<td nowrap="nowrap">科目</td>
				<td nowrap="nowrap">類別</td>
				<td nowrap="nowrap">項目</td>
				<td nowrap="nowrap">單位</td>
				<td nowrap="nowrap">單價</td>
				<td nowrap="nowrap">數量</td>
				<td nowrap="nowrap">金額</td>
				<td nowrap="nowrap">說明</td>
			</tr>
			<? print_item('alc_school_activity_item', 'p1', $main_seq);  // 顯示細項 ?>
		</table>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
		<input type="submit" name="button"      value="　儲 存　" >

		<script language="JavaScript">
			function toCheck()
			{
				if ( document.form.p_num.value == "" )
				{
					alert("請填寫申請補助幾座綜合球場。");
					document.form.p_num.focus();
					return false;
				}

				// 數值檢核
				if ( document.form.s_p1_current_money.value > 400000 )
				{
					alert("綜合球場補助申請「修建」不得超過 40 萬元。");
					document.form.s_p1_current_money.focus();
					return false;
				}
				if ( document.form.s_p1_capital_money.value > 200000 )
				{
					alert("綜合球場補助申請「設備」不得超過 20 萬元。");
					document.form.s_p1_capital_money.focus();
					return false;
				}
				return true;
			}

			// 計算單一項目的金額
			function Count(obj, item_idx)
			{
				// 取得控制項
				var p = left(obj.name, 2);
				var opt_subject  = document.getElementById(p + '_opt_subject_'  + item_idx);     // 科目
				var opt_category = document.getElementById(p + '_opt_category_' + item_idx);     // 類別
				var item      = document.getElementsByName(p + '_item_'         + item_idx)[0];  // 項目
				var unit      = document.getElementsByName(p + '_unit_'         + item_idx)[0];  // 單位
				var price     = document.getElementsByName(p + '_price_'        + item_idx)[0];  // 單價
				var amount    = document.getElementsByName(p + '_amount_'       + item_idx)[0];  // 數量
				var s_money   = document.getElementsByName(p + '_s_money_'      + item_idx)[0];  // 金額

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
							alert('「單價」未逾 1 萬元。');
							price.value = '';
							s_money.value = '';
							flag = 0;
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
							alert('「單價」未逾 1 萬元。');
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
					s_money.value = parseInt(price.value) * parseInt(amount.value);  // 單價 * 數量
				}

				count_all()  // 計算總金額
			}


			// 計算總金額
			function count_all()
			{
				var s_total_money = document.getElementsByName('s_total_money')[0]; //總金額
				var i;

				s_total_money.value = 0;

				for(i = 1;i < 10;i++)
				{
					var s_p_money         = document.getElementsByName('s_p' + i + '_money')[0];         //ex.s_p1_money ,s_p2_money
					var s_p_current_money = document.getElementsByName('s_p' + i + '_current_money')[0]; //ex.s_p1_current_money
					var s_p_capital_money = document.getElementsByName('s_p' + i + '_capital_money')[0]; //ex.s_p1_capital_money

					if(s_p_money != null)
					{
						var current_money = 0;
						var capital_money = 0;

						for(j = 1; j <= 10; j++) //計算各特色經常 & 資本
						{
							var opt_subject  = document.getElementById('p' + i + '_opt_subject_' + j);    // 科目
							var opt_category = document.getElementById('p' + i + '_opt_category_' + j);   // 類別
							var s_money      = document.getElementsByName('p' + i + '_s_money_' + j)[0];  // 金額

							if(s_money.value != '' && opt_category.value != '設備購置') //修建 = current = 其他補助的經常門欄位
							{
								current_money += parseInt(s_money.value);
							}

							if(s_money.value != '' && opt_category.value == '設備購置') //設備 = capital = 其他補助的資本門欄位
							{
								capital_money += parseInt(s_money.value);
							}
						}

						s_p_money.value = parseInt(current_money) + parseInt(capital_money); //修建 + 設備
						s_p_current_money.value = current_money; //各特色的修建
						s_p_capital_money.value = capital_money; //各特色的設備

						s_total_money.value = parseInt(s_total_money.value) + parseInt(s_p_money.value); //所有特色的總和
					}
				}
			}

			// 設定下拉選單
			function change_subject(obj, idx, YN)
			{
				var selectName=obj.options[obj.selectedIndex].text;
				NewOpt = new Array;

				if (selectName == "")
				{
					NewOpt[0] = new Option("");
				}

				if (selectName == "資本門")
				{
					NewOpt[0] = new Option("");
					NewOpt[1] = new Option("設備購置");
					NewOpt[2] = new Option("場地修繕");
					NewOpt[3] = new Option("工程管理");
					NewOpt[4] = new Option("學校管理");
					NewOpt[5] = new Option("其他");
				}

				newnum = NewOpt.length;

				var p = left(obj.id,3);  // 取得 p1_ or p2_

				var opt_category = document.getElementById(p + 'opt_category_' + idx)

				// 清除之前下拉選單中的項目
				opt_category.options.length = 0;

				// 加入新選類別的項目
				for (i = 0; i < newnum; i++) opt_category.options[i] = NewOpt[i];

				opt_category.options[0].selected = true;

				// page load 時不計算總金額
				if(YN == '1')
					Count(obj, idx);  // 變換項目後計算總金額
			}

			// 取得左N位
			function left(mainStr,n)
			{
				return mainStr.substring(0,n);
			}

			// 左邊補0
			function padLeft(str,lenght)
			{
				if(str.length >= lenght)
					return str;
				else
					return padLeft("0" + str,lenght);
			}
		</script>
	</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
說明：經費填寫完成後，請上傳計畫檔案。<p>
　　　計畫範本供參考，可修改標題使用。<p>
<a href="/edu/modules/xSchoolForm/download/A1-1.推展親職教育活動實施計畫範本.doc" target="_new">（下載修整學校社區化活動場所計畫範本）</a><p>
*/
?>