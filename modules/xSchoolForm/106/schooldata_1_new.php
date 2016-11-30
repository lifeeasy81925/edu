<?php
	// include的順序盡量不要更改
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	/* 新學年度一開始沒資料，在進網頁的時候先新增 */
	$cnt_sql = " SELECT account FROM schooldata_year where account = '$username' and school_year = '$school_year' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);

	if($num_rows == 0)  // 沒資料
	{
		$insert_sql = "insert into schooldata_year (account, school_year)        ".
					  "                     values ('$username', '$school_year') ";
		mysql_query($insert_sql);
	}

	/* 新學年度一開始沒資料，在進網頁的時候先新增 */
	$cnt_sql3 = " SELECT account FROM school_location where account = '$username' ";
	$result3 = mysql_query($cnt_sql3);
	$num_rows3 = mysql_num_rows($result3);

	if($num_rows3 == 0)  // 沒資料
	{
		$insert_sql3 = "insert into school_location (account)     ".
					   "                     values ('$username') ";
		mysql_query($insert_sql3);
	}

	// ly = last year
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area ".
		   " 	  , sy.student, sy.class_total, sy.class_grade1, sy.class_grade2, sy.class_grade3, sy.class_grade4 ".
		   " 	  , sy.class_grade5, sy.class_grade6, sy.class_special, sd.getmoney_85to91 ".
		   " 	  , sd.traffic_status, sy.page1_warning, sy.page1_desc ".
		   "      , sy_ly.student  as student_ly  ".  // 去年學生數
		   "      , sy_l2y.student as student_l2y ".  // 前年學生數

		   // 考試成績
		   "	  , se.student_exam, se.chinese, se.math, se.english, se.nature, se.social ".
		   "	  , se.chinese_missing, se.math_missing, se.english_missing, se.nature_missing, se.social_missing ".

		   // 補助三：充實學校基本教學設備，前三年(103~105)曾獲補助，不得再提出申請
		   "      , a3_ly.edu_total_money  as a3_ly_money  ".  // 105
		   "      , a3_l2y.edu_total_money as a3_l2y_money ".  // 104
		   "      , a3_l3y.edu_total_money as a3_l3y_money ".  // 103

		   // 補助五：補助交通不便地區學校交通車，歷史資料(只算購買交通車的金額)
		   "      , case when a5_ly.item  = '購置交通車' then a5_ly.edu_total_money  else 0 end as a5_ly_money  ".  // 105
		   "      , case when a5_l2y.item = '購置交通車' then a5_l2y.edu_total_money else 0 end as a5_l2y_money ".  // 104
		   "      , case when a5_l3y.item = '購置交通車' then a5_l3y.edu_total_money else 0 end as a5_l3y_money ".  // 103

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_examdata as se on sd.account = se.account and se.school_year =  '$school_year' ".
		   "                       left join school_location as sl on sd.account = sl.account ".

		   // 前一年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ".
		   "                       left join $a3_table_name as a3_ly on sy_ly.seq_no = a3_ly.sy_seq ".
		   "                       left join $a5_table_name as a5_ly on sy_ly.seq_no = a5_ly.sy_seq ".

		   // 前二年資料的資料表
		   "                       left join schooldata_year as sy_l2y on sd.account = sy_l2y.account and sy_l2y.school_year = '".($school_year - 2)."' ".
		   "                       left join $a3_table_name as a3_l2y on sy_l2y.seq_no = a3_l2y.sy_seq ".
		   "                       left join $a5_table_name as a5_l2y on sy_l2y.seq_no = a5_l2y.sy_seq ".

		   // 前三年資料的資料表
		   "                       left join schooldata_year as sy_l3y on sd.account = sy_l3y.account and sy_l3y.school_year = '".($school_year - 3)."' ".
		   "                       left join $a3_table_name as a3_l3y on sy_l3y.seq_no = a3_l3y.sy_seq ".
		   "                       left join $a5_table_name as a5_l3y on sy_l3y.seq_no = a5_l3y.sy_seq ".

		   " where sy.school_year = '$school_year' ".
		   "   and sd.account     = '$username' ";

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
		$class_total = $row['class_total'];
		$c1 = $row['class_grade1'];
		$c2 = $row['class_grade2'];
		$c3 = $row['class_grade3'];
		$c4 = $row['class_grade4'];
		$c5 = $row['class_grade5'];
		$c6 = $row['class_grade6'];
		$cs = $row['class_special'];
		$getmoney_85to91 = ($row['getmoney_85to91'] == "N")?"未受補助":"曾受補助";
		$traffic_status = $row['traffic_status'];
		$laststudent = ($row['student_ly'] == '')?0:$row['student_ly'];     // 去年學生數
		$last2student = ($row['student_l2y'] == '')?0:$row['student_l2y'];  // 前年學生數

		$student_exam = $row['student_exam'];
		$chinese = $row['chinese'];
		$math = $row['math'];
		$english = $row['english'];
		$nature = $row['nature'];
		$social = $row['social'];
		$chinese_missing = $row['chinese_missing'];
		$math_missing = $row['math_missing'];
		$english_missing = $row['english_missing'];
		$nature_missing = $row['nature_missing'];
		$social_missing = $row['social_missing'];

		// 前一年資料的資料表
		$a3_ly_money = ($row['a3_ly_money'] == '')?0:$row['a3_ly_money'];
		$a5_ly_money = ($row['a5_ly_money'] == '')?0:$row['a5_ly_money'];

		// 前二年資料的資料表
		$a3_l2y_money = ($row['a3_l2y_money'] == '')?0:$row['a3_l2y_money'];
		$a5_l2y_money = ($row['a5_l2y_money'] == '')?0:$row['a5_l2y_money'];

		// 前二年資料的資料表
		$a3_l3y_money = ($row['a3_l3y_money'] == '')?0:$row['a3_l3y_money'];
		$a5_l3y_money = ($row['a5_l3y_money'] == '')?0:$row['a5_l3y_money'];

		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];

		// 交通狀況有多個，用逗號分開
		$traffic = explode(",", $traffic_status);

		// 補助三，前三年內補助金額，注意不是申請金額，是複審補助金額
		$money_last  = $a3_ly_money;   // 前一年資料的資料表
		$money_last2 = $a3_l2y_money;  // 前二年資料的資料表
		$money_last3 = $a3_l3y_money;  // 前三年資料的資料表

		$strmsg_a3 = "";

		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0)
		{
			$strmsg_a3 .= "● 三年內曾獲本計畫補助「充實學校基本教學設備」：";
			$strmsg_a3 .= ($money_last  > 0)?"<p>　<font color=blue>".($school_year - 1)."年度曾獲補助 ".$money_last. " 元。</font>":"";
			$strmsg_a3 .= ($money_last2 > 0)?"<p>　<font color=blue>".($school_year - 2)."年度曾獲補助 ".$money_last2." 元。</font>":"";
			$strmsg_a3 .= ($money_last3 > 0)?"<p>　<font color=blue>".($school_year - 3)."年度曾獲補助 ".$money_last3." 元。</font>":"";
			$strmsg_a3 .= "<p>";
		}

		// 補助五，前三年內購置交通車補助金額，注意不是申請金額，是複審補助金額
		$money_last  = $a5_ly_money;   // 前一年資料的資料表
		$money_last2 = $a5_l2y_money;  // 前二年資料的資料表
		$money_last3 = $a5_l3y_money;  // 前三年資料的資料表
	}
?>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /><p>

<a href="../school_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<form name="form" method="post" action="schooldata_1_finish_new.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

	<b><?=$school_year?>年度 填寫學校資料</b>

	<p>
	<hr>
	<p>

	所在區域 <font size="-2">(註1)</font>：
	<font color=blue>
		<?
			switch($area)
			{
				case "1":
					echo "離島。";
					break;
				case "2":
					echo "偏遠及特偏。";
					break;
				case "3":
					echo "一般地區。";
					break;
				case "4":
					echo "都會地區。";
					break;
				default:
					echo "無貴校所在區域資料，請聯繫縣市政府教育局（處）承辦人，謝謝。";
			}
		?>
	</font>
	<p>

	交通狀況 <font size="-2">(註1)</font>：
	<font color=blue>
		<?
			$str = "";
			for($i = 0;$i < count($traffic);$i++)
			{
				switch($traffic[$i])
				{
					case "0":
						$str .= '無特殊交通狀況。<p>';
						break;
					case "1":
						$str .= "離島。<p>";
						break;
					case "2":
						$str .= "學校所在地區無公共交通工具到達。<p>";
						break;
					case "3":
						$str .= "學校距離站牌達 5 公里以上。<p>";
						break;
					case "4":
						$str .= "學區內之社區距離學校 5 公里以上，且無公共交通工具可以達學校。<p>";  // $bus_stop == '1'
						break;
					case "5":
						$str .= "公共交通工具到學校所在地區每天少於 4 班次。<p>";                    // $bus_stop == '2'
						break;
					case "6":
						$str .= "91學年度以前，因裁併校後學區幅員遼闊須交通車接送學生上下學。<p>";
						break;
				}
			}
			echo $str;
		?>
	</font>
	<p>

	<hr>

	<b>學生人數資料</b>：<p>
	　上學年度全校學生人數： <input type="text" size="2" name="laststudent" value="<?=$laststudent;?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人<p>
	　本學年度全校學生人數： <input type="text" size="2" name="student"     value="<?=$student;?>"     style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人<p>

	<hr>

	<b>班級數資料</b>：<p>
	
	<?	if ($schooltype == "國小")
		{
	?>
	
	　一年級班級數： <input type="text" size="1" name="c1" value="<?=$c1;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	　二年級班級數： <input type="text" size="1" name="c2" value="<?=$c2;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	　三年級班級數： <input type="text" size="1" name="c3" value="<?=$c3;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	　四年級班級數： <input type="text" size="1" name="c4" value="<?=$c4;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	　五年級班級數： <input type="text" size="1" name="c5" value="<?=$c5;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	　六年級班級數： <input type="text" size="1" name="c6" value="<?=$c6;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>

	<?
		} 
		elseif ($schooltype == "國中")
		{
	?>
	
	　七年級班級數： <input type="text" size="1" name="c1" value="<?=$c1;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	　八年級班級數： <input type="text" size="1" name="c2" value="<?=$c2;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	　九年級班級數： <input type="text" size="1" name="c3" value="<?=$c3;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>
	
	<?
		// 雖然上面文字寫七、八、九年級，但是寫入資料庫仍然寫c1、c2、c3，也就是國中一年級=七年級，國中二年級=八年級，國中三年級=九年級。
		}
		else
		{}
	?>

	　特殊班班級數： <input type="text" size="1" name="cs" value="<?=$cs;?>" style="text-align:center;" onchange="js:count_class(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 班<p>

	　本學年度全校班級總數： <input type="text" size="1" name="class_total" value="<?=$class_total;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> 班<p>
	
	說明：特殊班，指非普通班且集中式之班級。
	<hr>

	<? if ($schooltype == "國小") echo "<!--"; ?>  <? // 國小沒有會考資料 ?>

	<b>國中教育會考成績資料</b> <font size="-2">(註2)</font>：<p>
	　參加會考學生數：<font color=blue><?=$student_exam;?></font> 人<p>
	　國文科成績為待加強學生數：<font color=blue><?=$chinese;?></font> 人，缺考 <font color=blue><?=$chinese_missing;?></font> 人，待加強比例 <font color=blue><?=number_format($chinese/($student_exam-$chinese_missing)*100,2);?></font> %<p>
	　英語科成績為待加強學生數：<font color=blue><?=$english;?></font> 人，缺考 <font color=blue><?=$english_missing;?></font> 人，待加強比例 <font color=blue><?=number_format($english/($student_exam-$english_missing)*100,2);?></font> %<p>
	　數學科成績為待加強學生數：<font color=blue><?=$math;   ?></font> 人，缺考 <font color=blue><?=$math_missing;   ?></font> 人，待加強比例 <font color=blue><?=number_format($math/($student_exam-$math_missing)*100,2);?></font> %<p>
	　社會科成績為待加強學生數：<font color=blue><?=$social; ?></font> 人，缺考 <font color=blue><?=$social_missing; ?></font> 人，待加強比例 <font color=blue><?=number_format($social/($student_exam-$social_missing)*100,2);?></font> %<p>
	　自然科成績為待加強學生數：<font color=blue><?=$nature; ?></font> 人，缺考 <font color=blue><?=$nature_missing; ?></font> 人，待加強比例 <font color=blue><?=number_format($nature/($student_exam-$nature_missing)*100,2);?></font> %<p>

		<hr>

	<? if ($schooltype == "國小") echo "-->"; ?>

	<?=$strmsg_a3;?><p>

	● 85～91年度是否曾獲本計畫補助興建學校社區化活動場所經費：<font color=blue><?=$getmoney_85to91;?>。</font><p>

	<hr>

	<font size="-1">
		註 1：「所在區域」與「交通狀況」由各縣市政府教育局(處)提供。<br>
		<? if ($schooltype == "國小") echo "<!--"; ?>註 2：「國中教育會考成績」由國立臺灣師範大學心理與教育測驗研究發展中心提供。<br><? if ($schooltype == "國小") echo "-->"; ?>
	</font><p>

	<div id="alert" style="display:<? if($page1_desc=="") echo 'none';?>;">
		<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr height="30px">
				<td align="center" style="background-color:#FC9">資料檢核警示訊息視窗</td>
			</tr>
			<tr>
				<td>
					<font color="red">警示訊息：</font><INPUT type="text" size="30" name="page1_warning" value="<?=$page1_warning;?>" style="font-size:16px; border:0px;" readonly><p>
					● 若未填寫，無法前往下一步
					<textarea name="page1_desc" cols="80%" rows="5"><?=$page1_desc;?></textarea>
				</td>
			</tr>
		</table>
	</div>

	<INPUT type="hidden" name="school_year" value="<?=$school_year;?>">
	<INPUT type="submit" name="button" onClick="js:return toCheck();" value=" 下一步，填寫資料 " />

	<script language="JavaScript">
		function toCheck()
		{
			var flag = 1;  // 0=錯誤 1=正常
			var errmsg = "";

			/* 驗證空值 */
			
			if ( document.form.student.value == "" )
			{
				errmsg += "請填寫「全校學生人數」！\n";
				document.form.student.focus();
				flag = 0;
			}

			if (document.form.c1.value == "" )
			{
				if("<?=$schooltype?>" == "國小")
				{
					errmsg += "請填寫「一年級」班數！\n";
				}
				else if("<?=$schooltype?>" == "國中")
				{
					errmsg += "請填寫「七年級」班數！\n";
				}
				document.form.c1.focus();
				flag = 0;
			}

			if (document.form.c2.value == "" )
			{
				if("<?=$schooltype?>" == "國小")
				{
					errmsg += "請填寫「二年級」班數！\n";
				}
				else if("<?=$schooltype?>" == "國中")
				{
					errmsg += "請填寫「八年級」班數！\n";
				}
				document.form.c2.focus();
				flag = 0;
			}

			if (document.form.c3.value == "" )
			{
				if("<?=$schooltype?>" == "國小")
				{
					errmsg += "請填寫「三年級」班數！\n";
				}
				else if("<?=$schooltype?>" == "國中")
				{
					errmsg += "請填寫「九年級」班數！\n";
				}
				document.form.c3.focus();
				flag = 0;
			}
			
			if("<?=$schooltype?>" == "國小")  // 國小繼續檢查四、五、六年級
			{			
				if (document.form.c4.value == "" )
				{
					errmsg += "請填寫「四年級」班數！\n";
					document.form.c4.focus();
					flag = 0;
				}
				if (document.form.c5.value == "" )
				{
					errmsg += "請填寫「五年級」班數！\n";
					document.form.c5.focus();
					flag = 0;
				}
				if (document.form.c6.value == "" )
				{
					errmsg += "請填寫「六年級」班數！\n";
					document.form.c6.focus();
					flag = 0;
				}
			}
			
			if (document.form.cs.value == "" )
			{
				errmsg += "請填寫「特殊班」班數！\n";
				document.form.cs.focus();
				flag = 0;
			}

			/* 驗證班級人數不可以大於學生人數 */
			if ( parseInt(document.form.class_total.value) > parseInt(document.form.student.value) )
			{
				errmsg += '班級人數不可以大於學生人數。\n';
				document.form.class_total.focus();
				flag = 0;
			}

			var laststudent = document.form.laststudent.value;

			/* 驗證今年總人數與去年總人數誤差(±20%) */
			var laststudent_min;
			var laststudent_max;
			laststudent_min = parseInt(parseInt(laststudent,10) * 0.8,10);
			laststudent_max = parseInt(parseInt(laststudent,10) * 1.2,10);
			if (document.form.student.value < laststudent_min || document.form.student.value > laststudent_max)
			{
				if	(document.form.page1_desc.value == "")
				{
					document.getElementById("alert").style.display="";  // 顯示
					document.form.page1_warning.value = "請填寫學生人數異動過大說明。"
					errmsg += '本學年與上學年學生人數相比超過±20%。\n';
					flag = 0;
				}
			}
			else
			{
				document.getElementById("alert").style.display="none";  // 隱藏
				document.form.page1_warning.value = "";
				document.form.page1_desc.value == "";
			}

			/* Return 結果 */
			if (flag == 0)
			{
				alert(errmsg);
				return false;
			}
			else
			{
				return true;
			}
		}

		function count_class(obj)  /* 班級數量加總 */
		{
			var c, i;
			var flag = 1;
			var total = 0;
			var schooltype = <?=(($schooltype == "國小")?"6":"3");?>;

			for (i = 1; i <= schooltype; i++)
			{
				c = document.getElementsByName('c' + i)[0];  // 1~6年級

				if (c != null)
				{
					total = parseInt(total) + parseInt(c.value);
				}
			}

			c = document.getElementsByName('cs')[0]; // 特殊班

			total = parseInt(total) + parseInt(c.value);

			if (flag == 0)
			{
				total = 0;
			}

			document.getElementsByName('class_total')[0].value = total;
		}
	</script>
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<!-- include "../../function/button_print.php"; -->