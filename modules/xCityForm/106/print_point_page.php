<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
?>

<? include "../../function/connect_city.php"; ?><p>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$username = ($_GET['id'] != '')?$_GET['id']:$username;  // get為測試用

	include "../../function/config_for_106.php";  // 本年度基本設定

	$sql =	" select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
			" 	   , sy.student, sy.class_total, sy.lastyear_graduate, sy.target_aboriginal, sy.target_no_aboriginal, sy.low_income     ".
			" 	   , sy.grandparenting, sy.over45years, sy.immigrant, sy.single_parent, sy.aboriginal, sy.lastyear_leaving              ".
			"      , sy.lastyear_graduate                                                                                               ".
			"      , sy_ly.student  as student_ly                                                                                       ".  // 去年學生
			"      , sy_l2y.student as student_l2y                                                                                      ".  // 前年學生

			// 會考成績
			"	   , se.student_exam".
			"      , se.chinese,         se.math,         se.english,         se.nature,         se.social         ".
			"	   , se.chinese_missing, se.math_missing, se.english_missing, se.nature_missing, se.social_missing ".

			// 補助三：充實學校基本教學設備(歷史資料)
			"      , a3_ly.edu_total_money  as a3_ly_money  ".  // 前一年
			"      , a3_l2y.edu_total_money as a3_l2y_money ".  // 前二年
			"      , a3_l2y.edu_total_money as a3_l2y_money ".  // 前三年

			// 補助五：補助交通不便地區學校交通車(歷史資料)(只算購買交通車的金額)
			"      , case when a5_ly.item  = '購置交通車' then a5_ly.edu_total_money else 0 end as a5_ly_money  ".   // 前一年
			"      , case when a5_l2y.item = '購置交通車' then a5_l2y.edu_total_money else 0 end as a5_l2y_money ".  // 前二年
			"      , case when a5_l3y.item = '購置交通車' then a5_l3y.edu_total_money else 0 end as a5_l3y_money ".  // 前三年

			" from schooldata as sd left join schooldata_year as sy on sd.account = sy.account                                     ".
			"                       left join school_examdata as se on sd.account = se.account and se.school_year = '$school_year' ".
			"                       left join school_location as sl on sd.account = sl.account                                     ".

			// 前一年資料的資料表
			"                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ".
			"                       left join $a3_table_name as a3_ly on sy_ly.seq_no = a3_ly.sy_seq                                                  ".
			"                       left join $a5_table_name as a5_ly on sy_ly.seq_no = a5_ly.sy_seq                                                  ".

			// 前二年資料的資料表
			"                       left join schooldata_year as sy_l2y on sd.account = sy_l2y.account and sy_l2y.school_year = '".($school_year - 2)."' ".
			"                       left join $a3_table_name as a3_l2y on sy_l2y.seq_no = a3_l2y.sy_seq                                                  ".
			"                       left join $a5_table_name as a5_l2y on sy_l2y.seq_no = a5_l2y.sy_seq                                                  ".

			// 前三年資料的資料表
			"                       left join schooldata_year as sy_l3y on sd.account = sy_l3y.account and sy_l3y.school_year = '".($school_year - 3)."' ".
			"                       left join $a3_table_name as a3_l3y on sy_l3y.seq_no = a3_l3y.sy_seq                                                  ".
			"                       left join $a5_table_name as a5_l3y on sy_l3y.seq_no = a5_l3y.sy_seq                                                  ".

			" where sy.school_year = '$school_year' ".
			"   and sd.account     = '$username'    ";

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
		$lastyear_graduate    = $row['lastyear_graduate'];

		$laststudent     = ($row['student_ly']  == "")?0:$row['student_ly'];   // 去年學生數
		$laststudent_l2y = ($row['student_l2y'] == "")?0:$row['student_l2y'];  // 前年學生數

		// 補助三：充實學校基本教學設備
		$a3_ly_money  = ($row['a3_ly_money']  == '')?0:$row['a3_ly_money'];   // 前一年
		$a3_l2y_money = ($row['a3_l2y_money'] == '')?0:$row['a3_l2y_money'];  // 前二年
		$a3_l3y_money = ($row['a3_l3y_money'] == '')?0:$row['a3_l3y_money'];  // 前三年

		// 補助三，前三年補助金額，注意不是申請金額，是複審補助金額
		$money_last  = $a3_ly_money;   // 前一年
		$money_last2 = $a3_l2y_money;  // 前二年
		$money_last3 = $a3_l3y_money;  // 前三年
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
	$p2_1  = ($per >= 0.2);                                      //判斷是否符合指標2-1
	$p2_2  = ($target_no_aboriginal >= 60 );                     //判斷是否符合指標2-2
	$p2_3  =  (($target_aboriginal / $student >= 0.3)
		   && !($p1_1 == '1' || $p1_2 == '1' || $p1_3 == '1'));  //判斷是否符合指標2-3

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
	$a2 = ($p2_3==1 || $p4_1==1 || $p5_1==1 || $p5_2==1);
	$a3 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p3_1==1 || $p5_1==1 || $p5_2==1);
	$a4 = ($p1_1==1 || $p1_2==1 || $p1_3==1);
	$a5 = ($p5_1==1 || $p5_2==1 || $p5_3==1);
	$a6 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p2_1==1 || $p4_1==1 );

	// 補助三：充實學校基本教學設備，三年內有補助過的學校不能再申請
	if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0)
	{
		$a3 = 0;
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

	$sql = " update schooldata_year                ".
	       "    set accord_point = '$accord_point' ".
		   "      , can_apply    = '$can_apply'    ".
		   "  where account      = '$username'     ".
		   "    and school_year  = '$school_year'  ";

	mysql_query($sql);
?>

<p>表Ｉ～１ 學校指標界定調查紀錄表

<?
	include "../../function/button_print.php";
?>
<p>
<div id="print_content">
	<table align="center" style="font-family:標楷體;">
		<tr>
			<td align="center">
				<font size="+2">
					<b>
						教育部<?=$school_year;?>年度教育優先區計畫 學校指標界定調查紀錄表<p>
						<? echo $account." ".$cityname.$district.$schoolname; ?>
					</b>
				</font>
			</td>
		</tr>
	</table>
	<p>
	<p>
	<table align="center" width="800px" border="1" cellspacing="0" cellpadding="0" style="font-family:標楷體; font-size:16px;">
		<tr height="42px">
			<td nowrap="nowrap" align="center">項次</td>
			<td nowrap="nowrap" align="center" colspan="2">指標界定學校相關資料</td>
			<td nowrap="nowrap" align="center">數量/內容</td>
			<td nowrap="nowrap" align="center">符合指標</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap" rowspan="4" align="center">一</td>
			<td nowrap="nowrap" rowspan="4">學校基本資料</td>
			<td nowrap="nowrap">學校所處地區</td>
			<td nowrap="nowrap" align="center">
				<?
					switch($area)
					{
						case "1":
							echo "離島";
							break;
						case "2":
							echo "偏遠及特偏";
							break;
						case "3":
							echo "一般地區";
							break;
						case "4":
							echo "都會地區";
							break;
						default:
							echo "無貴校所在區域資料。";
					}
				?>
			</td>
			<td rowspan="4" align="center"></td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">全校班級數</td>
			<td nowrap="nowrap" align="right"><?=$class_total;?>(班)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">全校學生總人數</td>
			<td nowrap="nowrap" align="right"><?=$student;?>(人)</td>
		</tr>
		<tr height="42px">
			<td>85～91年度是否曾獲本計畫補助興建學校社區化活動場所經費</td>
			<td nowrap="nowrap" align="center"><?=(($getmoney_85to91 == "N")?"未受補助":"曾受補助");?></td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap" rowspan="2" align="center">二</td>
			<td rowspan="2">指標一：<br>原住民學生比率偏高之學校</td>
			<td nowrap="nowrap">原住民學生人數</td>
			<td nowrap="nowrap" align="right"><?=$aboriginal;?>(人)</td>
			<td nowrap="nowrap" rowspan="2" align="center">
				<?
					echo ($p1_1 == 1)?'符合指標一-（一）'.'<br>':'';
					echo ($p1_2 == 1)?'符合指標一-（二）'.'<br>':'';
					echo ($p1_3 == 1)?'符合指標一-（三）'.'<br>':'';
					echo ($p1_4 == 1)?'符合指標一-（四）'.'<br>':'';
				?>
			</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">佔全校學生比率</td>
			<td nowrap="nowrap" align="right"><? echo number_format($aboriginal/$student*100,2); ?>(%)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap" rowspan="7" align="center">三</td>
			<td rowspan="7">指標二：<br>目標學生比率偏高之學校</td>
			<td nowrap="nowrap">低收入戶子女學生人數</td>
			<td nowrap="nowrap" align="right"><?=$low_income;?>(人)</td>
			<td nowrap="nowrap" rowspan="7" align="center">
				<?
					echo ($p2_1 == 1)?'符合指標二-（一）'.'<br>':'';
					echo ($p2_2 == 1)?'符合指標二-（二）'.'<br>':'';
					echo ($p2_3 == 1)?'符合指標二-（三）'.'<br>':'';
				?>
			</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">隔代教養學生人數</td>
			<td nowrap="nowrap" align="right"><?=$grandparenting;?>(人)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">親子年齡差距45歲以上學生人數</td>
			<td nowrap="nowrap" align="right"><?=$over45years;?>(人)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">新住民子女學生人數</td>
			<td nowrap="nowrap" align="right"><?=$immigrant;?>(人)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">單(寄)親家庭學生人數</td>
			<td nowrap="nowrap" align="right"><?=$single_parent;?>(人)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">目標學生人數</td>
			<td nowrap="nowrap" align="right"><?=$target_aboriginal;?>(人)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">目標學生佔全校學生比率</td>
			<td nowrap="nowrap" align="right"><? echo number_format($target_aboriginal/$student*100,2); ?>(%)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap" rowspan="5" align="center">四</td>
			<td rowspan="5">指標三：<br>國中學習弱勢學生比率偏高之學校</td>
			<td nowrap="nowrap">國文成績待加強人數佔參加會考人數比率</td>
			<td nowrap="nowrap" align="right"><? if($student_exam == 0 || $student_exam == null){echo "無資料";} else{echo number_format($chinese/($student_exam-$chinese_missing)*100,2)."(%)";}?></td>
			<td nowrap="nowrap" rowspan="5" align="center">
				<? echo ($p3_1 == 1)?'符合指標三'.'<br>':'';	?>
			</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">英文成績待加強人數佔參加會考人數比率</td>
			<td nowrap="nowrap" align="right"><? if($student_exam == 0 || $student_exam == null){echo "無資料";} else{echo number_format($english/($student_exam-$english_missing)*100,2)."(%)";}?></td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">數學成績待加強人數佔參加會考人數比率</td>
			<td nowrap="nowrap" align="right"><? if($student_exam == 0 || $student_exam == null){echo "無資料";} else{echo number_format($math/($student_exam-$math_missing)*100,2)."(%)";}?></td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">社會成績待加強人數佔參加會考人數比率</td>
			<td nowrap="nowrap" align="right"><? if($student_exam == 0 || $student_exam == null){echo "無資料";} else{echo number_format($social/($student_exam-$social_missing)*100,2)."(%)";}?></td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">自然成績待加強人數佔參加會考人數比率</td>
			<td nowrap="nowrap" align="right"><? if($student_exam == 0 || $student_exam == null){echo "無資料";} else{echo number_format($nature/($student_exam-$nature_missing)*100,2)."(%)";}?></td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap" rowspan="3" align="center">五</td>
			<td rowspan="3">指標四：<br>中途輟學率偏高之學校 </td>
			<td nowrap="nowrap">從<?=($school_year-2);?>年9月1日至<?=($school_year-1);?>年6月30日之中輟生人數</td>
			<td nowrap="nowrap" align="right"><?=$lastyear_leaving;?>(人)</td>
			<td nowrap="nowrap" rowspan="3" align="center">
				<? echo ($p4_1 == 1)?'符合指標四'.'<br>':''; ?>
			</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap"><?=($school_year-2);?>學年度在籍學生人數</td>
			<td nowrap="nowrap" align="right"><?=$laststudent;?>(人)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap">中輟生人數佔在籍學生人數比率</td>
			<td nowrap="nowrap" align="right"><? echo number_format($lastyear_leaving/$laststudent*100,2); ?>(%)</td>
		</tr>
		<tr height="42px">
			<td nowrap="nowrap" align="center">六</td>
			<td>指標五：<br>離島或偏遠交通不便之學校</td>
			<td nowrap="nowrap">學校所在地區交通狀況</td>
			<td>
				<?
					for($i = 0; $i < count($traffic); $i++)
					{
						echo ($i+1)."、";
						switch($traffic[$i])  // 交通狀況的說明在這裡
						{
							case "0":
								echo '無特殊交通狀況。'.'<br>';
								break;
							case "1":
								echo "離島。".'<br>';
								break;
							case "2":
								echo "學校所在地區無公共交通工具到達。".'<br>';
								break;
							case "3":
								echo "學校距離站牌達 5 公里以上。".'<br>';
								break;
							case "4":
								echo "學區內之社區距離學校 5 公里以上，且無公共交通工具可以達學校。".'<br>';
								break;
							case "5":
								echo "公共交通工具到學校所在地區每天少於 4 班次。".'<br>';
								break;
							case "6":
								echo "91 學年度以前，因裁併校後學區幅員遼闊須交通車接送學生上下學。".'<br>';
								break;
						}
					}
				?>
			</td>
			<td nowrap="nowrap" align="center">
				<?
					echo ($p5_1 == 1)?'符合指標五-（一）'.'<br>':'';
					echo ($p5_2 == 1)?'符合指標五-（二）'.'<br>':'';
					echo ($p5_3 == 1)?'符合指標五-（三）'.'<br>':'';
				?>
			</td>
		</tr>
		<tr height="80px">
			<td nowrap="nowrap" colspan="5" align="center">
				<font size="+2">
					承辦人：　　　　　　　　<? // 8個全形空白 ?>
					主　任：　　　　　　　　<? // 8個全形空白 ?>
					校　長：　　　　　　　　<? // 8個全形空白 ?>
				</font>
			</td>
		</tr>
	</table>
	<input type="hidden" name="school_year" value="<?=$school_year;?>">
	<p>
</div>

<?  // <INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)"> ?>
<?  // include "../../function/button_print.php"; ?>
<?  // include "../../function/button_excel.php"; ?>