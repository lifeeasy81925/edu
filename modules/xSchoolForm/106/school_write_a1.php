<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

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

	$sql = 	"    SELECT sd.account                                               ".
			"         , sd.schooltype                                            ".
			"         , sd.cityname                                              ".
			"         , sd.district                                              ".
			"         , sd.schoolname                                            ".
			"         , sy.*                                                     ".
			"         , a1.s_total_money                                         ".
			"         , a1.s_p1_times                                            ".
			"         , a1.s_p1_people                                           ".
			"         , a1.s_p1_money                                            ".
			"         , a1.s_p2_people                                           ".
			"         , a1.s_p2_money                                            ".
			"         , a1.s_p2_student                                          ".
			"      FROM schooldata              AS sd                            ".
			" LEFT JOIN schooldata_year         AS sy ON sd.account = sy.account ".
			" LEFT JOIN alc_parenting_education AS a1 ON sy.seq_no  = a1.sy_seq  ".
			"     WHERE sy.school_year = '$school_year'                          ".
			"       AND sd.account     = '$username'                             ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$account    =  $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   =  $row['cityname'];
		$district   =  $row['district'];
		$schoolname =  $row['schoolname'];

		$student = $row['student'];

		$main_seq = $row['seq_no'];  // school_year的seq_no

		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money'];  // NULL則填入0
		$s_p1_times    =  $row['s_p1_times'];
		$s_p1_people   =  $row['s_p1_people'];
		$s_p1_money    = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
		$s_p2_people   =  $row['s_p2_people'];
		$s_p2_money    = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_student  =  $row['s_p2_student'];
	}

	/*
		顯示填寫的資料
		allowance_table_name => 各補助細項的 table name ex.alc_education_features_item
		p => 特色 ex.p1 p2
		main_seq => 各補助的 sy_seq.alc_education_features 的 sy_seq (注意!!不是 _item 的 seq_no)
	*/

	function print_item($allowance_table_name, $p, $main_seq)
	{
		$sql =	"   SELECT *                      ".
				"     FROM $allowance_table_name  ".
				"    WHERE main_seq = '$main_seq' ".
				"      AND section  = '$p'        ".
				" ORDER BY seq_no ASC             ";

		$result = mysql_query($sql);

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

			// 製作下拉選單的內容

			$s1 = array("", "經常門");
			$s3 = array( ""       => array("")
					   , "經常門" => array("", "鐘點費", "鐘點費(含補充保費)", "場地費", "誤餐費", "講義文件費", "加班費", "其他")
					   , "資本門" => array("")); // 補助一沒有資本門

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

		// 補滿9項
		for($i = ($num_rows + 1 - $has_outlay); $i < 10; $i++)
		{
			echo "<tr align='center'>";
			echo "<td nowrap='nowrap'>$i<input type='hidden' name='".$p."_seq_no_$i' value=''></td>";
			echo "<td>";
			echo "<select name='".$p."_subject_$i' id='".$p."_opt_subject_$i' size='1' onChange='js:change_subject(this,$i,1);'>";
			echo "<option selected></option>";
			echo "<option>經常門</option>";
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

		if($has_outlay != 1)  // 如果沒有雜支，把項目清空
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
		echo "<td nowrap='nowrap'>10<input type='hidden' name='".$p."_seq_no_10' value='$outlay_seq_no'></td>";
		echo "<td>";
		echo "<select name='".$p."_subject_10' id='".$p."_opt_subject_10' size='1' >";
		echo "<option selected>$outlay_subject</option>";
		echo "</select>";
		echo "</td>";
		echo "<td align='left'>";
		echo "<select name='".$p."_category_10' id='".$p."_opt_category_10' size='1' >";
		echo "<option selected>$outlay_category</option>";
		echo "</select>";
		echo "</td>";
		echo "<td><input type='checkbox'      name='".$p."_item_10'    value='Y' onclick='js:chkbox(this);' ".(($outlay_item == 'Y')?"checked":"")." >申請雜支</td>";
		echo "<td><input type='text' size='2' name='".$p."_unit_10'    value='' style='border:0px; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='4' name='".$p."_price_10'   value='' style='border:0px; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='2' name='".$p."_amount_10'  value='' style='border:0px; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='3' name='".$p."_s_money_10' value='$outlay_s_money' style='text-align:right; background-color:aliceblue;' readonly></td>";
		echo "<td><input type='text' size='6' name='".$p."_s_desc_10'  value='$outlay_s_desc'></td>";
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

申請補助經費 / 填寫經費 / <b>補助項目一：推展親職教育活動</b>

<p>
<hr>
<p>

<body onload="set_default()">

	<form name="form" method="post" action="school_write_a1_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

		● <a href="/edu_dl/106/allowance-01.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		<img src='/edu/images/calculator.png' align="absmiddle">
		<font color="blue">
			申請補助經費：
			<input type="text" size="5" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元。
		</font>
		<p>

		<p>
		<hr>
		<p>

		● 親職教育活動：<input type="text" size="5" name="s_p1_money" value="<?=$s_p1_money;?>" style="border:0px; text-align:right; background-color:aliceblue" readonly> 元。<p>

		　● 預計辦理親職教育活動
		<input type="text" size="1" name="s_p1_times"  value="<?=$s_p1_times;?>"  style="text-align:center" onkeyup="value=value.replace(/[^\d]/g,'')"> 場，參加人數
		<input type="text" size="1" name="s_p1_people" value="<?=$s_p1_people;?>" style="text-align:center" onkeyup="value=value.replace(/[^\d]/g,'')"> 人。<p>

		　● 親職教育活動經費概算：<p>
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
			<? print_item('alc_parenting_education_item', 'p1', $main_seq);  // 顯示細項 ?>
		</table>

		<p>
		<hr>
		<p>

		● 個案家庭輔導：<input type="text" size="5" name="s_p2_money" value="<?=$s_p2_money;?>" style="border:0px; text-align:right; background-color:aliceblue" readonly> 元。<p>

		　● 預計個案家庭輔導
		<input type="text" size="1" name="s_p2_student" onchange="js:Count_family(this);" value="<?=$s_p2_student;?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人，每人訪視 2 至 4 次，共
		<input type="text" size="1" name="s_p2_people"  onchange="js:Count_family(this);" value="<?=$s_p2_people;?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人次。<p>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
		<input type="submit" name="button"      value="　儲 存　" />

		<script language="JavaScript">

			/* 檢查 */
			function toCheck()
			{
				// 空值
				if ( document.form.s_p1_times.value == "" )
				{
					alert("請填寫「親職教育活動預計辦理場次」！");
					document.form.s_p1_times.focus();
					return false;
				}
				if ( document.form.s_p1_people.value == "" )
				{
					alert("請填寫「親職教育活動預計參加人數」！");
					document.form.s_p1_people.focus();
					return false;
				}
				if ( document.form.s_p2_student.value == "" )
				{
					alert("請填寫「個案家庭輔導預計訪視人數」，不申請經費請填「0」。");
					document.form.s_p2_student.focus();
					return false;
				}
				if ( document.form.s_p2_people.value == "" )
				{
					alert("請填寫「個案家庭輔導預計訪視人次」，不申請經費請填「0」。");
					document.form.s_p2_people.focus();
					return false;
				}

				// 有經費，但未填場次人數
				if ( document.form.s_p1_money.value > 0)
				{
					if( document.form.s_p1_times.value == 0 || document.form.s_p1_people.value == 0 )
					{
						alert("親職教育活動預計辦理場次與參加人數不可為 0");
						document.form.s_p1_times.focus();
						return false;
					}
				}

				/* 數值檢核 */
				
				// 親職活動不超過2萬
				if ( document.form.s_p1_money.value > 20000 )
				{
					alert("親職教育活動最高補助金額 2 萬元！");
					return false;
				}
				
				// 親職活動單場不超過1萬
				if ( document.form.s_p1_times.value == 1 && document.form.s_p1_money.value > 10000 )
				{
					alert("親職教育活動最高補助金額為每場 1 萬元！");
					return false;
				}
				
				// 個案輔導不超過5萬
				if ( document.form.s_p2_money.value > 50000 )
				{
					alert("個案家庭輔導最高補助金額 5 萬元！");
					return false;
				}
				
				// 兩者相加必然不超過7萬，不必多寫。
				
				/* 
					1. 場地布置費每場次最高補助 3,000 元
					2. 誤餐費、加班費應擇一編列
						(1) 誤餐費每場次最高補助 800 元
						(2) 加班費不能超過親職教育活動的金額 10%
					3. 講義文件費不超過【親職教育活動的金額 20%】或【參與人數每人 100 元】取其高
				*/
				
				var s_p1_money = document.getElementsByName('s_p1_money')[0];

				var place_pay = 0;  // 場地費
				var meal      = 0;  // 誤餐費
				var overtime  = 0;  // 加班費
				var paper     = 0;  // 講義文件費
				
				for(j = 1; j <= 10; j++)
				{
					var s_money      = document.getElementsByName('p1_s_money_'   + j)[0];  // 金額
					var opt_category = document.getElementById('p1_opt_category_' + j);     // 類別
					
					if(opt_category.value == '場地費' && s_money.value != '')
					{
						place_pay = parseInt(place_pay) + parseInt(s_money.value);
					}
					if(opt_category.value == '誤餐費' && s_money.value != '')
					{
						meal = parseInt(meal) + parseInt(s_money.value);
					}
					if(opt_category.value == '加班費' && s_money.value != '')
					{
						overtime = parseInt(overtime) + parseInt(s_money.value);
					}
					if(opt_category.value == '講義文件費' && s_money.value != '')
					{
						paper = parseInt(paper) + parseInt(s_money.value);
					}
				}
				
				if (place_pay > parseInt(document.form.s_p1_times.value) * 3000)
				{
					alert("場地費每場次最高補助 3,000 元。");
					return false;
				}
				
				if (meal > 0 && overtime > 0)
				{
					alert("誤餐費、加班費應擇一編列。");
					return false;
				}
				else
				{
					if (meal > parseInt(document.form.s_p1_times.value) * 800)
					{
						alert("誤餐費每場次最高補助 800 元。");
						return false;
					}
					if (overtime > parseInt(s_p1_money.value) * 0.1)
					{
						alert("加班費不得超過親職教育活動經費的 10 %。");
						return false;
					}
				}
								
				var paper_limit = Math.max(parseInt(s_p1_money.value) * 0.2, parseInt(document.form.s_p1_people.value) * 100);

				if (paper > parseInt(paper_limit))
				{
					alert("講義文件費不得超過親職教育活動經費的 20% 或參與人數每人 100 元。");
					return false;
				}
				
				return true;
			}

			/* 計算：單一項目的金額 */
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

				var flag = 1; // 1=正確無誤 0=有錯

				var regex = /^[0-9]*$/;  // 驗證數字功能(其實已經沒用了，就當作雙重保護好了)

				/*
					驗證分成兩部分
					1.填寫 科目、類別、項目、單位(文字)
					2.填寫 單價、數量(數值)
				*/

				switch (obj.name)
				{
					// 科目、類別、項目、單位
					case opt_subject.name:
					case opt_category.name:
					case item.name:
					case unit.name:
					{
						if(item.value.match("雜支") != null)
						{
							alert('不可直接填寫雜支，請在表單下方勾選。');
							item.value = "";
							flag = 0;
						}

						// 6個欄位有一個為空值就不計算
						if(opt_subject.value == '' || opt_category.value == '' || item.value == '' || unit.value == '' || amount.value == '' || price.value == '')
						{
							s_money.value = '';  // 清空金額欄位
							flag = 0;
						}

						break;
					}

					// 單價、數量
					case price.name:
					case amount.name:
					{
						// 經常門驗證
						if(opt_subject.value == '經常門' && regex.test(price.value) && price.value >= 10000 && price.value != '')
						{
							alert('經常門的「單價」不得超過 1 萬元。');
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
							s_money.value = '';  // 清空金額欄位
							flag = 0;

							if(price.value != '' && amount.value != '')  // 單價 數量 都有填才顯示警告訊息
							{
								alert('「科目」、「類別」、「項目」、「單位」不能為空白。');
							}
						}

						break;
					}
				}

				if(flag == 1)
				{
					s_money.value = parseInt(price.value) * parseInt(amount.value);  // 單價 * 數量

					if(opt_category.value == '鐘點費(含補充保費)')
					{
						s_money.value = Math.round(parseInt(s_money.value) * <?=$supplementary_premium_rate;?>)  // 四捨五入（105年03月21日 開會決議）
					}
				}

				chkbox(document.getElementsByName(p + '_item_10')[0]);  // 計算雜支
			}

			/* 計算：雜支 */
			function chkbox(obj)
			{
				var p = left(obj.name, 2);
				
				var s_money_10 = document.getElementsByName(p + '_s_money_10')[0];  // 第10項的金額控制項

				if (obj.checked == false)
				{
					s_money_10.value = "";  // 沒選就清空金額
				}
				else
				{
					var opt_subject, s_money;
					var i;
					var total = 0;

					// 把1~9項金額加總
					for(i = 1; i < 10; i++)
					{
						opt_subject  = document.getElementById(    p + '_opt_subject_'  + i );     // 科目
						opt_category = document.getElementById(    p + '_opt_category_' + i );     // 類別
						s_money      = document.getElementsByName( p + '_s_money_'      + i )[0];  // 金額
						
						if(opt_subject.value == '經常門' && s_money.value != '')  // 雜支僅計經常門
						{
							total += parseInt(s_money.value);
						}

					}
					s_money_10.value = Math.round(total * 0.06);  // 四捨五入（105年03月21日 開會決議）
				}
				count_all();
			}

			/* 計算個案家庭輔導金額 */
			function Count_family(obj)
			{
				var s_p2_people  = document.getElementsByName("s_p2_people")[0];
				var s_p2_student = document.getElementsByName("s_p2_student")[0];
				var s_p2_money   = document.getElementsByName("s_p2_money")[0];

				var flag   = 1;
				var errmsg = "";

				if(s_p2_people.value != '' && s_p2_student.value != '')
				{
					if(parseInt(s_p2_people.value) > parseInt(s_p2_student.value) * 4)
					{
						errmsg += '每人最多訪視4次\n';
						flag = 0;
					}
					if(parseInt(s_p2_people.value) < parseInt(s_p2_student.value) * 2)
					{
						errmsg += '每人最少訪視2次\n';
						flag = 0;
					}
				}
				if (flag == 0)
				{
					alert(errmsg);
					s_p2_money.value = "0";
					s_p2_people.value = "";
					return false;
				}
				document.getElementsByName("s_p2_money")[0].value = parseInt(s_p2_people.value) * 200;
				count_all();
			}

			/* 計算總金額 */
			function count_all()
			{
				var s_total_money = document.getElementsByName('s_total_money')[0];  // 總金額			
				
				var s_p1_money    = document.getElementsByName('s_p1_money')[0];     // 親職金額
								
				s_p1_money.value = 0;
				
				for(j = 1; j <= 10; j++)  // 計算各特色經常 & 資本，
				{
					var s_money = document.getElementsByName('p1_s_money_' + j)[0];  // 金額

					if(s_money.value != '')
					{
						s_p1_money.value = parseInt(s_p1_money.value) + parseInt(s_money.value);
					}
				}
				
				var s_p2_money    = document.getElementsByName('s_p2_money')[0];  // 個案金額
				
				s_total_money.value = parseInt(s_p1_money.value) + parseInt(s_p2_money.value);
			}

			/* 設定下拉選單 */
			function change_subject(obj, idx, YN)
			{
				var selectName=obj.options[obj.selectedIndex].text;
				
				NewOpt = new Array;

				if (selectName == "")
				{
					NewOpt[0] = new Option("");
				}

				if (selectName == "經常門")
				{
					NewOpt[0] = new Option("");
					NewOpt[1] = new Option("鐘點費");
					NewOpt[2] = new Option("鐘點費(含補充保費)");
					NewOpt[3] = new Option("場地費");
					NewOpt[4] = new Option("誤餐費");
					NewOpt[5] = new Option("講義文件費");
					NewOpt[6] = new Option("加班費");
					NewOpt[7] = new Option("其他");
				}

				newnum = NewOpt.length;

				var p = left(obj.id,3);  // 取得p1_ or p2_

				var opt_category = document.getElementById(p + 'opt_category_' + idx)
				
				opt_category.options.length = 0;  // 清除之前下拉選單中的項目
			
				for (i = 0; i < newnum; i++)  // 加入新選類別的項目
				{
					opt_category.options[i] = NewOpt[i];
				}

				opt_category.options[0].selected = true;
				
				if(YN == '1')  // page load 時不計算總金額
				{
					Count(obj, idx);  // 變換項目後計算總金額
				}
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

			/* 設定預設值 */
			function set_default()
			{
				var i;
				for(i = 1; i < 10; i++)
				{
					var obj_subject  = document.getElementById('p1_opt_subject_' + i);   // 科目
					var obj_category = document.getElementById('p1_opt_category_' + i);  // 類別
					var obj_item     = document.getElementsByName('p1_item_'  + i)[0];   // 項目
					var obj_unit     = document.getElementsByName('p1_unit_'  + i)[0];   // 單位
					var obj_price    = document.getElementsByName('p1_price_' + i)[0];   // 單價

					if(document.getElementsByName("p1_seq_no_" + i)[0].value == '')
					{
						// 設定科目，補一預設都是經常門
						obj_subject.options[1].selected = true; //[1] = 經常門

						// 產生科目對應的類別下拉選單
						change_subject(obj_subject, i, 0);

						switch(i)
						{
							case 1:
								obj_category.options[1].selected = true; // 設定類別=鐘點費
								obj_item.value = '內聘講師';
								obj_unit.value = '時';
								obj_price.value = '800';
								break;
							case 2:
								obj_category.options[2].selected = true; // 設定類別=鐘點費(含補充保費)
								obj_item.value = '外聘講師';
								obj_unit.value = '時';
								obj_price.value = '1200';
								break;
							case 3:
								obj_category.options[2].selected = true; // 設定類別=鐘點費(含補充保費)
								obj_item.value = '外聘講師';
								obj_unit.value = '時';
								obj_price.value = '1600';
								break;
							case 4:
								obj_category.options[3].selected = true; // 設定類別=場地費
								obj_item.value = '場地布置費';
								obj_unit.value = '次';
								break;
							case 5:
								obj_category.options[4].selected = true; // 設定類別=誤餐費
								obj_item.value = '誤餐費';
								obj_unit.value = '人';
								break;
							case 6:
								obj_category.options[5].selected = true; // 設定類別=講義文件費
								break;
							case 7:
								obj_category.options[7].selected = true; // 設定類別=其他
								break;
							case 8:
								obj_category.options[7].selected = true; // 設定類別=其他
								break
							case 9:
								obj_category.options[7].selected = true; // 設定類別=其他
								break;
						}
					}
				}
			}
		</script>
	</form>
</body>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>
