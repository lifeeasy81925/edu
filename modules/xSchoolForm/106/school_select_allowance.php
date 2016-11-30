<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";

	$username = ($_GET['id'] != '')?$_GET['id']:$username;  // get為測試用

	include "../../function/config_for_106.php";  // 本年度基本設定

	$sql =	"    SELECT sd.account                                                                                                    ".
			"         , sd.schooltype                                                                                                 ".
			"         , sd.cityname                                                                                                   ".
			"         , sd.district                                                                                                   ".
			"         , sd.schoolname                                                                                                 ".
			"         , sd.area                                                                                                       ".
			"         , sd.getmoney_85to91                                                                                            ".
			"         , sd.traffic_status                                                                                             ".
			"         , sy.seq_no                                                                                                     ".
			"         , sy.student                                                                                                    ".
			"         , sy.class_total                                                                                                ".
			"         , sy.target_aboriginal                                                                                          ".
			"         , sy.target_no_aboriginal                                                                                       ".
			"         , sy.low_income                                                                                                 ".
			"         , sy.grandparenting                                                                                             ".
			"         , sy.over45years                                                                                                ".
			"         , sy.immigrant                                                                                                  ".
			"         , sy.single_parent                                                                                              ".
			"         , sy.aboriginal                                                                                                 ".
			"         , sy.lastyear_leaving                                                                                           ".
			"         , sy.applied                                                                                                    ".
			"         , sy_ly.student                                                               AS student_ly                     ".  // 去年學生
			"         , sy_l2y.student                                                              AS student_l2y                    ".  // 前年學生
			"   	  , se.student_exam                                                                                               ".  // ┌------┐
			"         , se.chinese                                                                                                    ".  // │      │
			"         , se.math                                                                                                       ".  // │  會  │
			"         , se.english                                                                                                    ".  // │      │
			"         , se.nature                                                                                                     ".  // │  考  │
			"         , se.social                                                                                                     ".  // │      │
			"         , se.chinese_missing                                                                                            ".  // │  成  │
			"         , se.math_missing                                                                                               ".  // │      │
			"         , se.english_missing                                                                                            ".  // │  績  │
			"         , se.nature_missing                                                                                             ".  // │      │
			"         , se.social_missing                                                                                             ".  // └------┘
			"         , a2_ly.edu_total_money_ny1                                                   AS a2_ly_money_ny1                ".  // 補助二
			"         , a4_ly.edu_total_money_ny1                                                   AS a4_ly_money_ny1                ".  // 補助四
			"         , a3_ly.edu_total_money                                                       AS a3_ly_money                    ".  // ┌-----------------------------------------┐
			"         , a3_l2y.edu_total_money                                                      AS a3_l2y_money                   ".  // │補助三：充實學校基本教學設備(前1~3年資料)│
			"         , a3_l3y.edu_total_money                                                      AS a3_l3y_money                   ".  // └-----------------------------------------┘
			"         , CASE WHEN a5_ly.item  = '購置交通車' THEN a5_ly.edu_total_money  ELSE 0 END AS a5_ly_money                    ".  // ┌---------------------------------------------------------------------┐
			"         , CASE WHEN a5_l2y.item = '購置交通車' THEN a5_l2y.edu_total_money ELSE 0 END AS a5_l2y_money                   ".  // │補助五：補助交通不便地區學校交通車(只算購買交通車的金額)(前1~3年資料)│
			"         , CASE WHEN a5_l3y.item = '購置交通車' THEN a5_l3y.edu_total_money ELSE 0 END AS a5_l3y_money                   ".  // └---------------------------------------------------------------------┘
			"      FROM schooldata      AS sd                                                                                         ".
			" LEFT JOIN schooldata_year AS sy     ON sd.account    = sy.account                                                       ".
			" LEFT JOIN school_examdata AS se     ON sd.account    = se.account     AND se.school_year     = '$school_year'           ".
			" LEFT JOIN school_location AS sl     ON sd.account    = sl.account                                                       ".			
			" LEFT JOIN schooldata_year AS sy_ly  ON sd.account    = sy_ly.account  AND sy_ly.school_year  = '".($school_year - 1)."' ".  // ┌------------------┐
			" LEFT JOIN $a2_table_name  AS a2_ly  ON sy_ly.seq_no  = a2_ly.sy_seq                                                     ".
			" LEFT JOIN $a3_table_name  AS a3_ly  ON sy_ly.seq_no  = a3_ly.sy_seq                                                     ".  // │前一年資料的資料表│
			" LEFT JOIN $a4_table_name  AS a4_ly  ON sy_ly.seq_no  = a4_ly.sy_seq                                                     ".
			" LEFT JOIN $a5_table_name  AS a5_ly  ON sy_ly.seq_no  = a5_ly.sy_seq                                                     ".  // └------------------┘
			" LEFT JOIN schooldata_year AS sy_l2y ON sd.account    = sy_l2y.account AND sy_l2y.school_year = '".($school_year - 2)."' ".  // ┌------------------┐
			" LEFT JOIN $a3_table_name  AS a3_l2y ON sy_l2y.seq_no = a3_l2y.sy_seq                                                    ".  // │前二年資料的資料表│
			" LEFT JOIN $a5_table_name  AS a5_l2y ON sy_l2y.seq_no = a5_l2y.sy_seq                                                    ".  // └------------------┘
			" LEFT JOIN schooldata_year AS sy_l3y ON sd.account    = sy_l3y.account AND sy_l3y.school_year = '".($school_year - 3)."' ".  // ┌------------------┐
			" LEFT JOIN $a3_table_name  AS a3_l3y ON sy_l3y.seq_no = a3_l3y.sy_seq                                                    ".  // │前三年資料的資料表│
			" LEFT JOIN $a5_table_name  AS a5_l3y ON sy_l3y.seq_no = a5_l3y.sy_seq                                                    ".  // └------------------┘
			"     WHERE sy.school_year = '$school_year'                                                                               ".
			"       AND sd.account     = '$username'                                                                                  ";
	
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account         = $row['account'];
		$schooltype      = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname        = $row['cityname'];
		$district        = $row['district'];
		$schoolname      = $row['schoolname'];
		$area            = $row['area'];
		$getmoney_85to91 = $row['getmoney_85to91'];
		$traffic_status  = $row['traffic_status'];

		// 會考成績
		$student_exam    = $row['student_exam'];
		$chinese         = $row['chinese'];
		$math            = $row['math'];
		$english         = $row['english'];
		$nature          = $row['nature'];
		$social          = $row['social'];
		$chinese_missing = $row['chinese_missing'];
		$math_missing    = $row['math_missing'];
		$english_missing = $row['english_missing'];
		$nature_missing  = $row['nature_missing'];
		$social_missing  = $row['social_missing'];

		$student              = $row['student'];
		$class_total          = $row['class_total'];
		$target_aboriginal    = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$low_income           = $row['low_income'];
		$grandparenting       = $row['grandparenting'];
		$over45years          = $row['over45years'];
		$immigrant            = $row['immigrant'];
		$single_parent        = $row['single_parent'];
		$aboriginal           = $row['aboriginal'];
		$lastyear_leaving     = $row['lastyear_leaving'];

		$laststudent     = ($row['student_ly']  == "")?0:$row['student_ly'];   // 去年學生數
		$laststudent_l2y = ($row['student_l2y'] == "")?0:$row['student_l2y'];  // 前年學生數

		$a2_ly_money_ny1  = ($row['a2_ly_money_ny1']  == '')?0:$row['a2_ly_money_ny1'];   // 前一年有經費可沿用
		$a4_ly_money_ny1  = ($row['a4_ly_money_ny1']  == '')?0:$row['a4_ly_money_ny1'];   // 前一年有經費可沿用
		
		// 補助三：充實學校基本教學設備
		$a3_ly_money  = ($row['a3_ly_money']  == '')?0:$row['a3_ly_money'];   // 前一年
		$a3_l2y_money = ($row['a3_l2y_money'] == '')?0:$row['a3_l2y_money'];  // 前二年
		$a3_l3y_money = ($row['a3_l3y_money'] == '')?0:$row['a3_l3y_money'];  // 前三年

		// 補助三，前三年補助金額，注意不是申請金額，是複審補助金額
		$money_last  = $a3_ly_money;   // 前一年
		$money_last2 = $a3_l2y_money;  // 前二年
		$money_last3 = $a3_l3y_money;  // 前三年

		$main_seq = $row['seq_no'];  // 補助細項
		$applied  = $row['applied']; // 已申請
	}
		
	
	// 交通狀況有多個，用逗號分開
	$traffic = explode(",", $traffic_status);

	/* ================== */
	/* ==== 指標計算 ==== */
	/* ================== */

	// 判斷是否符合指標1
	$per  = $aboriginal / $student;
	$p1_1 = ($per >= 0.4);	                 // 判斷是否符合指標1-1
	$p1_2 = ($area == '3' && $per >= 0.2);	 // 判斷是否符合指標1-2
	$p1_3 = ($area == '4' && $per >= 0.15);  // 判斷是否符合指標1-3
	$p1_4 = ($aboriginal >= 35);             // 判斷是否符合指標1-4

	// 判斷是否符合指標2
	$per   = $target_no_aboriginal / $student;
	$p2_1  = ($per >= 0.2);                                                                                // 判斷是否符合指標2-1
	$p2_2  = ($target_no_aboriginal >= 60 );                                                               // 判斷是否符合指標2-2
	$p2_3  = (($target_aboriginal / $student >= 0.3) && !($p1_1 == '1' || $p1_2 == '1' || $p1_3 == '1'));  // 判斷是否符合指標2-3

	// 判斷是否符合指標3（任兩科待加強超過50%）
	$count_p3 = 0;
	$count_p3 += ($chinese / ($student_exam-$chinese_missing) >= 0.5);
	$count_p3 += ($math    / ($student_exam-$math_missing)    >= 0.5);
	$count_p3 += ($english / ($student_exam-$english_missing) >= 0.5);
	$count_p3 += ($nature  / ($student_exam-$nature_missing)  >= 0.5);
	$count_p3 += ($social  / ($student_exam-$social_missing)  >= 0.5);
	$p3_1 = ($count_p3 >= 2);

	// 判斷是否符合指標4
	$per  = $lastyear_leaving / $student;
	$p4_1 = ($per >= 0.03);

	// 判斷是否符合指標5
	$p5_1 = 0;
	$p5_2 = 0;
	$p5_3 = 0;
	for($i = 0; $i < count($traffic); $i++)
	{
		switch($traffic[$i])
		{
			case "1":
				$p5_1 = 1;
				break;
				
			// case 2~5 共用指標5-2
			case "2":
			case "3":
			case "4":
			case "5":
				$p5_2 = 1;
				break;

			case "6":
				$p5_3 = 1;
				break;
		}
	}
	// 交通狀況後面說明


	/* ================== */
	/* == 補助項目計算 == */
	/* ================== */

	// 補助項目計算
	$a1 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p1_4==1 || $p2_1==1 || $p2_2==1 || $p3_1==1 ||$p4_1==1 || $p5_1==1 || $p5_2==1);
	$a2 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p2_3==1 || $p4_1==1 || $p5_1==1 || $p5_2==1);
	$a3 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p3_1==1 || $p5_1==1 || $p5_2==1);
	$a4 = ($p1_1==1 || $p1_2==1 || $p1_3==1);
	$a5 = ($p5_1==1 || $p5_2==1 || $p5_3==1);
	$a6 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p2_1==1 || $p4_1==1 );

	/* 例外狀況排除 */

	// 補助二：有沿用計畫不受指標變動影響
	if($a2_ly_money_ny1 > 0)
	{
		$a2 = 1;
	}
	
	// 補助三：充實學校基本教學設備，三年內有補助過的學校不能再申請
	if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0)
	{
		$a3 = 0;
	}
	
	// 補助四：有沿用計畫不受指標變動影響
	if($a4_ly_money_ny1 > 0)
	{
		$a4 = 1;
	}

	// 補助六：整修學校社區化活動場所，若未曾於85-91年度獲補助興建學校社區化活動場所，不得申請修繕經費
	if($getmoney_85to91 == "N")
	{
		$a6 = 0;
	}

	// 成功專案學校，不可申請所有補助
	if(in_array($username, $success_project_ary))
	{
		$a1 = 0;
		$a2 = 0;
		$a3 = 0;
		$a4 = 0;
		$a5 = 0;
		$a6 = 0;
	}

	/* ================== */
	/* == 上傳到資料庫 == */
	/* ================== */

	$accord_point = "";
	$can_apply    = "";

	$p_ary = array("p1_1", "p1_2", "p1_3", "p1_4", "p2_1", "p2_2", "p2_3", "p3_1", "p4_1", "p5_1", "p5_2", "p5_3");
	for($i = 0; $i < count($p_ary); $i++)
	{
		if(${$p_ary[$i]} == 1)  // 動態變數，取得$p_1,$p_2...等變數的值
		{
			$accord_point .= ($accord_point == '')?$p_ary[$i]:",".$p_ary[$i];
		}
	}

	$a_ary = array("a1", "a2", "a3", "a4", "a5", "a6");
	for($i = 0; $i < count($a_ary); $i++)
	{
		if(${$a_ary[$i]} == 1)  // 動態變數，取得$a1,$a2...等變數的值
		{
			$can_apply .= ($can_apply == '')?$a_ary[$i]:",".$a_ary[$i];  // 將可申請的項目串成字串用逗號隔開
		}
	}

	$sql = " UPDATE schooldata_year                ".
	       "    SET accord_point = '$accord_point' ".
		   "      , can_apply    = '$can_apply'    ".
		   "  WHERE account      = '$username'     ".
		   "    AND school_year  = '$school_year'  ";

	mysql_query($sql);

	// 把字串分割成array
	$accord_point_ary = explode(",", $accord_point);  // 符合的指標
	$can_apply_ary    = explode(",", $can_apply);     // 可申請的補助
	$applied_ary      = explode(",", $applied);       // 已申請的補助
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../school_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b><?=$school_year;?>年度 申請補助經費</b>

<p>
<hr>
<p>

<?
	if ($student == "" or $class_total == "")
	{
		echo '<p><p><font color=red size="+4">請先填寫學校資料。</font><p><p>';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../school_index.php>';
	}
?>

<?=$tips;?> <!-- 歷年補助說明 -->

● 請點選欲申請的補助項目：<p>

<form name="form" method="post" action="school_select_allowance_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

	<table border="1" cellspacing="0" cellpadding="0" align="center">
		<tr height="50px">
			<td width="15%" align="center"><font color="green"><img src='/edu/images/yes.png'/><br><b>申請</b></font></td>
			<td width="15%" align="center"><font color="red"><img src='/edu/images/no.png'/><br><b>不申請</b></font></td>
			<td>補助項目說明</td>
		</tr>

		<?
			for($i = 0; $i < count($can_apply_ary); $i++)
			{
				switch($can_apply_ary[$i])
				{
					case "a1":
						echo '<tr height="40px">';
						creat_radio_button("a1", $applied, $applied_ary);
						echo '<td>補助項目一：推展親職教育活動</td>';
						echo '</tr>';
						break;

					case "a2":
						echo '<tr height="40px">';
						creat_radio_button("a2", $applied, $applied_ary);
						echo '<td>補助項目二：學校發展教育特色</td>';
						echo '</tr>';
						break;

					case "a3":
						echo '<tr height="40px">';
						creat_radio_button("a3", $applied, $applied_ary);
						echo '<td>補助項目三：充實學校基本教學設備</td>';
						echo '</tr>';
						break;

					case "a4":
						echo '<tr height="40px">';
						creat_radio_button("a4", $applied, $applied_ary);
						echo '<td>補助項目四：發展原住民教育文化特色及充實設備器材</td>';
						echo '</tr>';
						break;

					case "a5":
						echo '<tr height="40px">';
						creat_radio_button("a5", $applied, $applied_ary);
						echo '<td>補助項目五：交通不便地區學校交通車</td>';
						echo '</tr>';
						break;

					case "a6":
						echo '<tr height="40px">';
						creat_radio_button("a6", $applied, $applied_ary);
						echo '<td>補助項目六：整修學校社區化活動場所</td>';
						echo '</tr>';
						break;

					default:
						echo "";
				}
			}

			/* 預設 radio button 放在申請位置 */
			function creat_radio_button($a_x, $applied_x, $applied_ary_x)
			{
				if($applied_x == "")  // 預設情形
				{
					echo '<td align="center"><input type="radio" name="'.$a_x.'"  value="1" checked /></td>';
					echo '<td align="center"><input type="radio" name="'.$a_x.'"  value="0"         /></td>';
				}
				elseif(in_array($a_x, $applied_ary_x) == true)  // 已有申請補助
				{
					echo '<td align="center"><input type="radio" name="'.$a_x.'"  value="1" checked /></td>';
					echo '<td align="center"><input type="radio" name="'.$a_x.'"  value="0"         /></td>';
				}
				else  // 未符上述情況($applied == waiver)，表示使用者自願放棄申請
				{
					echo '<td align="center"><input type="radio" name="'.$a_x.'"  value="1"         /></td>';
					echo '<td align="center"><input type="radio" name="'.$a_x.'"  value="0" checked /></td>';
				}
			}
		?>
	</table>
	<p>
	
	<p>
	<hr>
	<p>

	說明：<p>
	　一、符合指標一-(一)、一(二)、一(三)可依規定申請補助項目一、二、三、四、<br>
	　　　六。惟【補助項目二：學校發展教育特色】及【補助四：發展原住民教育<br>
	　　　特色及充實設備器材】擇一申請。<p>
	
	　二、補助三、五 (購置交通車)、六，若同時符合資格，最多可申請其中二項。<p>

	<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
	<input type="hidden" name="school_year" value="<?=$school_year;?>">
	<input type="submit" name="button" value="下一步，開始填寫經費" >

	<script language="JavaScript">
		function toCheck()
		{
			/* 檢查補助二與補助四，最多申請一項 */
			var check24, a2, a4;
			check24 = 0;
			a2 = 0;
			a4 = 0;

			if(document.getElementsByName("a2")[0] != undefined)
			{
				if(document.getElementsByName("a2")[0].checked == true)
					a2 = 1;
			}

			if(document.getElementsByName("a4")[0] != undefined)
			{
				if(document.getElementsByName("a4")[0].checked == true)
					a4 = 1;
			}

			check24 = a2 + a4;

			if (check24 > 1)
			{
				alert("補助二與補助四僅能擇一申請，不得同時申請補助二與補助四。");
				return false;
			}
			
			/* 檢查補助三、五(購置交通車)、六，在下一頁檢查。 */

			return true;
		}
	</script>

</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
● 貴校符合指標：<p>
　　<a href="print_point_page_new.php"        target="_new"><img src="/edu/images/print.png" align="absmiddle"> <b>本(<?=$school_year;?>)年度指標界定調查表</b></a><p>
　　<a href="../105/print_point_page_new.php" target="_new"><img src="/edu/images/print.png" align="absmiddle"> <b>上(<?=($school_year-1);?>)年度指標界定調查表</b></a><p>
<p>
<hr>
<p>
*/
?>