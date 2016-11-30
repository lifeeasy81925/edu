<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_106.php"; //本年度基本設定
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">
<?
	include "../../function/button_print.php";
	include "../../function/button_excel.php";
?>
<p>
<div id="print_content">

<table align="center">
	<tr>
		<td width="100%" align="center">
			<font face="標楷體" size="+2">
			教育部<?=($school_year);?>年度推動教育優先區計畫<p>
			學校指標界定調查結果彙整表<p>
			</font>
		</td>
	</tr>
</table><p>

<table border="1" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3" align='center' nowrap="nowrap">學校編號</td>
		<td rowspan="3" align='center' nowrap="nowrap">學校名稱</td>
		<td rowspan="3" align='center'>班級數</td>
		<td rowspan="3" align='center'>全校學生總數</td>
		<td colspan="4" rowspan="2" align="center">學校所處地區</td>
		<td colspan="6">指標一：原住民學生比例偏高之學校</td>
		<td colspan="12">指標二：低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大、新移民子女學生比例偏高之學校</td>
		<td colspan="3">指標三：國中學習弱勢學生比例偏高之學校</td>
		<td colspan="4">指標四：中途輟學率偏高之學校</td>
		<td colspan="6">指標五：離島或偏遠交通不便之學校</td>
		<td rowspan="3" align="center">符合指標條件總數</td>
	</tr>
	<tr>
		<td rowspan="2" align="center">原住民學生數</td>
		<td rowspan="2" align="center">原住民學生比例</td>
		<td colspan="4" align="center">指標界定</td>
		<td colspan="7" align="center">目標學生人數</td>
		<td rowspan="2" align="center">目標學生比例不含僅具原住民身分</td>
		<td rowspan="2" align="center">目標學生比例含僅具原住民身分</td>
		<td colspan="3" align="center">指標界定</td>
		<td rowspan="2" align="center"><?=($school_year-1);?>年度參加教育會考學生人數</td>
		<td rowspan="2" align="center">待加強人數占參加人數達50%以上之科目數</td>
		<td align="center">指標界定</td>
		<td rowspan="2" align="center"><?=($school_year-2);?>/9/1 ~ <?=($school_year-1);?>/6/30中輟學生人數</td>
		<td rowspan="2" align="center"><?=($school_year-1);?>/9/30在籍學生人數</td>
		<td rowspan="2" align="center">中輟學生比例</td>
		<td align="center">指標界定</td>
		<td colspan="1" rowspan="2" align="center">離島</td>
		<td colspan="4" align="center">特偏、偏遠地區</td>
		<td rowspan="2" align="center">91學年前因裁倂校學區遼闊需交通車接送</td>
	</tr>
	<tr>
		<td align="center">離島</td>
		<td align="center">特偏偏遠</td>
		<td align="center">一般地區</td>
		<td align="center">都會地區</td>
		<td align="center">一~(一) 40%以上</td>
		<td align="center">一~(二) 一般20%以上</td>
		<td align="center">一~(三) 都會15%以上</td>
		<td align="center">一~(四) 35人以上</td>
		<td align="center">低收入戶子女</td>
		<td align="center">隔代教養</td>
		<td align="center">親子年齡差距45歲以上</td>
		<td align="center">新移民子女</td>
		<td align="center">單寄親家庭</td>
		<td align="center">目標學生人數不含僅具原住民身分</td>
		<td align="center">目標學生人數含僅具原住民身分</td>
		<td align="center">二~(一) 不含僅原20%以上</td>
		<td align="center">二~(二) 不含僅原60人以上</td>
		<td align="center">二~(三) 含僅原30%以上</td>
		<td align="center">待加強人數占參加人數達50%以上之科目大於2</td>
		<td align="center">3%以上</td>
		<td align="center">無公共交通工具可達</td>
		<td align="center">學校距站牌 5 km 以上</td>
		<td align="center">距社區 5 km 無公車</td>
		<td align="center">公共交通工具每天少於 4 班</td>
	</tr>
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //考試成績
		   "	  , se.student_exam, se.chinese, se.math, se.english, se.nature, se.social ".
		   "	  , se.chinese_missing, se.math_missing, se.english_missing, se.nature_missing, se.social_missing ".
		   //去年資料
		   "	  , sy_ly.student as student_ly ".
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join school_examdata as se on sd.account = se.account and se.school_year = '$school_year' ".
		   //去年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ".
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
		   " where ".
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   " order by sd.account ";

	$result = mysql_query($sql);
	$sum_e = 0;
	$sum_j = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];

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

		$student = $row['student'];
		$class_total = $row['class_total'];
		$getmoney_85to91 = $row['getmoney_85to91'];
		$traffic_status = $row['traffic_status'];

		$laststudent = ($row['student_ly'] == "")?0:$row['student_ly']; //去年學生數

		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$low_income = $row['low_income'];
		$grandparenting = $row['grandparenting'];
		$over45years = $row['over45years'];
		$immigrant = $row['immigrant'];
		$single_parent = $row['single_parent'];
		$aboriginal = $row['aboriginal'];
		$lastyear_leaving = $row['lastyear_leaving'];

		$accord_point = $row['accord_point'];

		$accord_point_ary = explode(",", $accord_point); //符合的指標
		$traffic_ary = explode(",", $traffic_status);

		$area1 = ($area == 1)?"1":"0";
		$area2 = ($area == 2)?"1":"0";
		$area3 = ($area == 3)?"1":"0";
		$area4 = ($area == 4)?"1":"0";

		$traffic1 = in_array('1',$traffic_ary)?'1':'0';
		$traffic2 = in_array('2',$traffic_ary)?'1':'0';
		$traffic3 = in_array('3',$traffic_ary)?'1':'0';
		$traffic4 = in_array('4',$traffic_ary)?'1':'0';
		$traffic5 = in_array('5',$traffic_ary)?'1':'0';
		$traffic6 = in_array('6',$traffic_ary)?'1':'0';

		$p1_1 = in_array('p1_1',$accord_point_ary)?'1':'0';
		$p1_2 = in_array('p1_2',$accord_point_ary)?'1':'0';
		$p1_3 = in_array('p1_3',$accord_point_ary)?'1':'0';
		$p1_4 = in_array('p1_4',$accord_point_ary)?'1':'0';
		$p2_1 = in_array('p2_1',$accord_point_ary)?'1':'0';
		$p2_2 = in_array('p2_2',$accord_point_ary)?'1':'0';
		$p2_3 = in_array('p2_3',$accord_point_ary)?'1':'0';
		$p3_1 = in_array('p3_1',$accord_point_ary)?'1':'0';
		$p4_1 = in_array('p4_1',$accord_point_ary)?'1':'0';
		$p5_1 = in_array('p5_1',$accord_point_ary)?'1':'0';
		$p5_2 = in_array('p5_2',$accord_point_ary)?'1':'0';
		$p5_3 = in_array('p5_3',$accord_point_ary)?'1':'0';

		//指標一~指標六的符合指標總數不能超過 6
		//就算符合指標下的多個小項目也只能算一個
		//用 or，只要其中一個符合就會回傳1
		//用trim是因為有一格空白
		$p1 = trim($p1_1) || trim($p1_2) || trim($p1_3) || trim($p1_4);
		$p2 = trim($p2_1) || trim($p2_2) || trim($p2_3);
		$p3 = trim($p3_1);
		$p4 = trim($p4_1);
		$p5 = trim($p5_1) || trim($p5_2) || trim($p5_3);

		$point_total = $p1+$p2+$p3+$p4+$p5;

		//待加強超過50%
		$count_p3 = 0;
		$count_p3 += ($chinese / ($student_exam - $chinese_missing) >= 0.5);
		$count_p3 += ($math    / ($student_exam - $math_missing)    >= 0.5);
		$count_p3 += ($english / ($student_exam - $english_missing) >= 0.5);
		$count_p3 += ($nature  / ($student_exam - $nature_missing)  >= 0.5);
		$count_p3 += ($social  / ($student_exam - $social_missing)  >= 0.5);
		
		?>
			<tr height="30px">
				<td style="text-align:center"><?=$account;?></td>
				<td style="text-align:center"><?=$cityname.$district.$schoolname; //學校名稱?></td>
				<td style="text-align:right"><?=$class_total; //全校班級數?></td>
				<td style="text-align:right"><?=$student; //全校學生人數?></td>

				<td style="text-align:center"><?=print_check($area1); //離島?></td>
				<td style="text-align:center"><?=print_check($area2); //偏遠及特偏?></td>
				<td style="text-align:center"><?=print_check($area3); //一般地區?></td>
				<td style="text-align:center"><?=print_check($area4); //都會地區?></td>

				<td style="text-align:right"><?=$aboriginal; //原住民學生數?></td>
				<td style="text-align:right"><?=number_format($aboriginal/$student*100,2); //原住民學生數百分比?>%</td>
				<td style="text-align:center"><?=print_check($p1_1); //指標1-1?></td>
				<td style="text-align:center"><?=print_check($p1_2); //指標1-2?></td>
				<td style="text-align:center"><?=print_check($p1_3); //指標1-3?></td>
				<td style="text-align:center"><?=print_check($p1_4); //指標1-4?></td>

				<td style="text-align:right"><?=$low_income; //低收入戶?></td>
				<td style="text-align:right"><?=$grandparenting; //隔代教養?></td>
				<td style="text-align:right"><?=$over45years; //親子年齡差距45歲以上?></td>
				<td style="text-align:right"><?=$immigrant; //新移民子女?></td>
				<td style="text-align:right"><?=$single_parent; //單寄親家庭?></td>
				<td style="text-align:right"><?=$target_no_aboriginal; //目標學生合計人數(不含僅具原住民身分)?></td>
				<td style="text-align:right"><?=$target_aboriginal; //目標學生合計人數(含僅具原住民身分)?></td>
				<td style="text-align:right"><?=number_format($target_no_aboriginal/$student*100,2); //目標學生佔全校學生比例(含僅具原住民身分)?>%</td>
				<td style="text-align:right"><?=number_format($target_aboriginal/$student*100,2); //目標學生佔全校學生比例(不含僅具原住民身分)?>%</td>
				<td style="text-align:center"><?=print_check($p2_1); //指標2-1?></td>
				<td style="text-align:center"><?=print_check($p2_2); //指標2-2?></td>
				<td style="text-align:center"><?=print_check($p2_3); //指標2-3?></td>

		<?
				if($schooltype == '國小')
				{
		?>
					<td style="text-align:right">-</td>
					<td style="text-align:right">-</td>
					<td style="text-align:center">-</td>
		<?
				;}
				else
				{
		?>
					<td style="text-align:right"><?=$student_exam; //參加教育會考學生人數?></td>
					<td style="text-align:right"><?=$count_p3; //待加強人數佔參加學生人數超過50%之科目數?></td>
					<td style="text-align:center"><?=print_check($p3_1); //指標3-1?></td>
		<?
				;}
		?>

				<td style="text-align:right"><?=$lastyear_leaving; //去年度中輟學生人數?></td>
				<td style="text-align:right"><?=$laststudent; //去年度在籍學生人數?></td>
				<td style="text-align:right"><?=number_format($lastyear_leaving/$laststudent*100,2); //中輟學生佔在籍學生人數比例?>%</td>
				<td style="text-align:center"><?=print_check($p4_1); //指標4-1?></td>

				<td style="text-align:center"><?=print_check($traffic1); //離島?></td>
				<td style="text-align:center"><?=print_check($traffic2); //無公共交通工具?></td>
				<td style="text-align:center"><?=print_check($traffic3); //學校距站牌5km以上?></td>
				<td style="text-align:center"><?=print_check($traffic4); //社區5km無公車?></td>
				<td style="text-align:center"><?=print_check($traffic5); //每天少於4班?></td>
				<td style="text-align:center"><?=print_check($traffic6); //因裁併校需交通車?></td>

				<td style="text-align:center"><?=$point_total; //該校符合指標總數?></td>
			</tr>
		<?

		//計算合計
		if($schooltype == '國小')
		{
			$sum_e++; //學校數

			$sum_e_class_total += $class_total; //全校班級數
			$sum_e_student += $student; //全校學生人數

			$sum_e_area1 += $area1; //離島
			$sum_e_area2 += $area2; //偏遠及特偏
			$sum_e_area3 += $area3; //一般地區
			$sum_e_area4 += $area4; //都會地區

			$sum_e_aboriginal += $aboriginal; //原住民學生數
			$sum_e_aboriginal_percent = number_format($sum_e_aboriginal/$sum_e_student*100,2); //原住民學生數百分比
			$sum_e_p1_1 += $p1_1; //指標1-1
			$sum_e_p1_2 += $p1_2; //指標1-2
			$sum_e_p1_3 += $p1_3; //指標1-3
			$sum_e_p1_4 += $p1_4; //指標1-4

			$sum_e_low_income += $low_income; //低收入戶
			$sum_e_grandparenting += $grandparenting; //隔代教養
			$sum_e_over45years += $over45years; //親子年齡差距45歲以上
			$sum_e_immigrant += $immigrant; //新移民子女
			$sum_e_single_parent += $single_parent; //單寄親家庭
			$sum_e_target_no_aboriginal += $target_no_aboriginal; //目標學生合計人數(不含僅具原住民身分)
			$sum_e_target_aboriginal += $target_aboriginal; //目標學生合計人數(含僅具原住民身分)
			$sum_e_target_no_aboriginal_percent = number_format($sum_e_target_no_aboriginal/$sum_e_student*100,2); //目標學生佔全校學生比例(不含僅具原住民身分)
			$sum_e_target_aboriginal_percent = number_format($sum_e_target_aboriginal/$sum_e_student*100,2); //目標學生佔全校學生比例(含僅具原住民身分)
			$sum_e_p2_1 += $p2_1; //指標2-1
			$sum_e_p2_2 += $p2_2; //指標2-2
			$sum_e_p2_3 += $p2_3; //指標2-3

			// 國小沒有指標3

			$sum_e_lastyear_leaving += $lastyear_leaving; //去年度中輟學生人數
			$sum_e_laststudent += $laststudent; //去年度在籍學生人數
			$sum_e_lastyear_leaving_percent = number_format($sum_e_lastyear_leaving/$sum_e_laststudent*100,2); //中輟學生佔在籍學生人數比例
			$sum_e_p4_1 += $p4_1; //指標4-1

			$sum_e_traffic1 += $traffic1; //離島
			$sum_e_traffic2 += $traffic2; //無公共交通工具
			$sum_e_traffic3 += $traffic3; //學校距站牌5km以上
			$sum_e_traffic4 += $traffic4; //社區5km無公車
			$sum_e_traffic5 += $traffic5; //每天少於4班
			$sum_e_traffic6 += $traffic6; //因裁併校需交通車

			$sum_e_point_total += $point_total; //該校符合指標總數
		}
		if($schooltype == '國中')
		{
			$sum_j++; //學校數

			$sum_j_class_total += $class_total; //全校班級數
			$sum_j_student += $student; //全校學生人數

			$sum_j_area1 += $area1; //離島
			$sum_j_area2 += $area2; //偏遠及特偏
			$sum_j_area3 += $area3; //一般地區
			$sum_j_area4 += $area4; //都會地區

			$sum_j_aboriginal += $aboriginal; //原住民學生數
			$sum_j_aboriginal_percent = number_format($sum_j_aboriginal/$sum_j_student*100,2); //原住民學生數百分比
			$sum_j_p1_1 += $p1_1; //指標1-1
			$sum_j_p1_2 += $p1_2; //指標1-2
			$sum_j_p1_3 += $p1_3; //指標1-3
			$sum_j_p1_4 += $p1_4; //指標1-4

			$sum_j_low_income += $low_income; //低收入戶
			$sum_j_grandparenting += $grandparenting; //隔代教養
			$sum_j_over45years += $over45years; //親子年齡差距45歲以上
			$sum_j_immigrant += $immigrant; //新移民子女
			$sum_j_single_parent += $single_parent; //單寄親家庭
			$sum_j_target_no_aboriginal += $target_no_aboriginal; //目標學生合計人數(不含僅具原住民身分)
			$sum_j_target_aboriginal += $target_aboriginal; //目標學生合計人數(含僅具原住民身分)
			$sum_j_target_no_aboriginal_percent = number_format($sum_j_target_no_aboriginal/$sum_j_student*100,2); //目標學生佔全校學生比例(不含僅具原住民身分)
			$sum_j_target_aboriginal_percent = number_format($sum_j_target_aboriginal/$sum_j_student*100,2); //目標學生佔全校學生比例(含僅具原住民身分)
			$sum_j_p2_1 += $p2_1; //指標2-1
			$sum_j_p2_2 += $p2_2; //指標2-2
			$sum_j_p2_3 += $p2_3; //指標2-3

			$sum_j_student_exam += $student_exam; //參加教育會考學生人數
			$sum_j_count_p3 += $count_p3; //待加強人數佔參加學生人數超過50%之科目數
			$sum_j_p3_1 += $p3_1; //指標3-1

			$sum_j_lastyear_leaving += $lastyear_leaving; //去年度中輟學生人數
			$sum_j_laststudent += $laststudent; //去年度在籍學生人數
			$sum_j_lastyear_leaving_percent = number_format($sum_j_lastyear_leaving/$sum_j_laststudent*100,2); //中輟學生佔在籍學生人數比例
			$sum_j_p4_1 += $p4_1; //指標4-1

			$sum_j_traffic1 += $traffic1; //離島
			$sum_j_traffic2 += $traffic2; //無公共交通工具
			$sum_j_traffic3 += $traffic3; //學校距站牌5km以上
			$sum_j_traffic4 += $traffic4; //社區5km無公車
			$sum_j_traffic5 += $traffic5; //每天少於4班
			$sum_j_traffic6 += $traffic6; //因裁併校需交通車

			$sum_j_point_total += $point_total; //該校符合指標總數
		}
	}
?>
	<tr height="30px">
		<td style="text-align:center">國小合計</td>
		<td style="text-align:center"><?=$sum_e; //學校數?></td>
		<td style="text-align:right"><?=$sum_e_class_total; //全校班級數?></td>
		<td style="text-align:right"><?=$sum_e_student; //全校學生人數?></td>

		<td style="text-align:center"><?=$sum_e_area1; //離島?></td>
		<td style="text-align:center"><?=$sum_e_area2; //偏遠及特偏?></td>
		<td style="text-align:center"><?=$sum_e_area3; //一般地區?></td>
		<td style="text-align:center"><?=$sum_e_area4; //都會地區?></td>

		<td style="text-align:right"><?=$sum_e_aboriginal; //原住民學生數?></td>
		<td style="text-align:right"><?=$sum_e_aboriginal_percent; //原住民學生數百分比?>%</td>
		<td style="text-align:center"><?=$sum_e_p1_1; //指標1-1?></td>
		<td style="text-align:center"><?=$sum_e_p1_2; //指標1-2?></td>
		<td style="text-align:center"><?=$sum_e_p1_3; //指標1-3?></td>
		<td style="text-align:center"><?=$sum_e_p1_4; //指標1-4?></td>

		<td style="text-align:right"><?=$sum_e_low_income; //低收入戶?></td>
		<td style="text-align:right"><?=$sum_e_grandparenting; //隔代教養?></td>
		<td style="text-align:right"><?=$sum_e_over45years; //親子年齡差距45歲以上?></td>
		<td style="text-align:right"><?=$sum_e_immigrant; //新移民子女?></td>
		<td style="text-align:right"><?=$sum_e_single_parent; //單寄親家庭?></td>
		<td style="text-align:right"><?=$sum_e_target_no_aboriginal; //目標學生合計人數(不含僅具原住民身分)?></td>
		<td style="text-align:right"><?=$sum_e_target_aboriginal; //目標學生合計人數(含僅具原住民身分)?></td>
		<td style="text-align:right"><?=$sum_e_target_no_aboriginal_percent; //目標學生佔全校學生比例(不含僅具原住民身分)?>%</td>
		<td style="text-align:right"><?=$sum_e_target_aboriginal_percent; //目標學生佔全校學生比例(含僅具原住民身分)?>%</td>
		<td style="text-align:center"><?=$sum_e_p2_1; //指標2-1?></td>
		<td style="text-align:center"><?=$sum_e_p2_2; //指標2-2?></td>
		<td style="text-align:center"><?=$sum_e_p2_3; //指標2-3?></td>

		<? // 國小沒有指標3 ?>
		<td style="text-align:center">-</td>
		<td style="text-align:center">-</td>
		<td style="text-align:center">-</td>

		<td style="text-align:right"><?=$sum_e_lastyear_leaving; //去年度中輟學生人數?></td>
		<td style="text-align:right"><?=$sum_e_laststudent; //去年度在籍學生人數?></td>
		<td style="text-align:right"><?=$sum_e_lastyear_leaving_percent; //中輟學生佔在籍學生人數比例?>%</td>
		<td style="text-align:center"><?=$sum_e_p4_1; //指標4-1?></td>

		<td style="text-align:center"><?=$sum_e_traffic1; //離島?></td>
		<td style="text-align:center"><?=$sum_e_traffic2; //無公共交通工具?></td>
		<td style="text-align:center"><?=$sum_e_traffic3; //學校距站牌5km以上?></td>
		<td style="text-align:center"><?=$sum_e_traffic4; //社區5km無公車?></td>
		<td style="text-align:center"><?=$sum_e_traffic5; //每天少於4班?></td>
		<td style="text-align:center"><?=$sum_e_traffic6; //因裁併校需交通車?></td>

		<td style="text-align:center"><?=$sum_e_point_total; //該校符合指標總數?></td>
	</tr>
	<tr height="30px">
		<td style="text-align:center">國中合計</td>
		<td style="text-align:center"><?=$sum_j; //學校數?></td>
		<td style="text-align:right"><?=$sum_j_class_total; //全校班級數?></td>
		<td style="text-align:right"><?=$sum_j_student; //全校學生人數?></td>

		<td style="text-align:center"><?=$sum_j_area1; //離島?></td>
		<td style="text-align:center"><?=$sum_j_area2; //偏遠及特偏?></td>
		<td style="text-align:center"><?=$sum_j_area3; //一般地區?></td>
		<td style="text-align:center"><?=$sum_j_area4; //都會地區?></td>

		<td style="text-align:right"><?=$sum_j_aboriginal; //原住民學生數?></td>
		<td style="text-align:right"><?=$sum_j_aboriginal_percent; //原住民學生數百分比?>%</td>
		<td style="text-align:center"><?=$sum_j_p1_1; //指標1-1?></td>
		<td style="text-align:center"><?=$sum_j_p1_2; //指標1-2?></td>
		<td style="text-align:center"><?=$sum_j_p1_3; //指標1-3?></td>
		<td style="text-align:center"><?=$sum_j_p1_4; //指標1-4?></td>

		<td style="text-align:right"><?=$sum_j_low_income; //低收入戶?></td>
		<td style="text-align:right"><?=$sum_j_grandparenting; //隔代教養?></td>
		<td style="text-align:right"><?=$sum_j_over45years; //親子年齡差距45歲以上?></td>
		<td style="text-align:right"><?=$sum_j_immigrant; //新移民子女?></td>
		<td style="text-align:right"><?=$sum_j_single_parent; //單寄親家庭?></td>
		<td style="text-align:right"><?=$sum_j_target_no_aboriginal; //目標學生合計人數(不含僅具原住民身分)?></td>
		<td style="text-align:right"><?=$sum_j_target_aboriginal; //目標學生合計人數(含僅具原住民身分)?></td>
		<td style="text-align:right"><?=$sum_j_target_no_aboriginal_percent; //目標學生佔全校學生比例(不含僅具原住民身分)?>%</td>
		<td style="text-align:right"><?=$sum_j_target_aboriginal_percent; //目標學生佔全校學生比例(含僅具原住民身分)?>%</td>
		<td style="text-align:center"><?=$sum_j_p2_1; //指標2-1?></td>
		<td style="text-align:center"><?=$sum_j_p2_2; //指標2-2?></td>
		<td style="text-align:center"><?=$sum_j_p2_3; //指標2-3?></td>

		<td style="text-align:right"><?=$sum_j_student_exam; //參加教育會考學生人數?></td>
		<td style="text-align:right"><?=$sum_j_count_p3; //待加強人數佔參加學生人數超過50%之科目數?></td>
		<td style="text-align:center"><?=$sum_j_p3_1; //指標3-1?></td>

		<td style="text-align:right"><?=$sum_j_lastyear_leaving; //去年度中輟學生人數?></td>
		<td style="text-align:right"><?=$sum_j_laststudent; //去年度在籍學生人數?></td>
		<td style="text-align:right"><?=$sum_j_lastyear_leaving_percent; //中輟學生佔在籍學生人數比例?>%</td>
		<td style="text-align:center"><?=$sum_j_p4_1; //指標4-1?></td>

		<td style="text-align:center"><?=$sum_j_traffic1; //離島?></td>
		<td style="text-align:center"><?=$sum_j_traffic2; //無公共交通工具?></td>
		<td style="text-align:center"><?=$sum_j_traffic3; //學校距站牌5km以上?></td>
		<td style="text-align:center"><?=$sum_j_traffic4; //社區5km無公車?></td>
		<td style="text-align:center"><?=$sum_j_traffic5; //每天少於4班?></td>
		<td style="text-align:center"><?=$sum_j_traffic6; //因裁併校需交通車?></td>

		<td style="text-align:center"><?=$sum_j_point_total; //該校符合指標總數?></td>
	</tr>
	<tr height="30px">
		<td style="text-align:center">全部合計</td>
		<td style="text-align:center"><?=($sum_e + $sum_j); //學校數?></td>
		<td style="text-align:right"><?=($sum_e_class_total + $sum_j_class_total); //全校班級數?></td>
		<td style="text-align:right"><?=($sum_e_student + $sum_j_student); //全校學生人數?></td>

		<td style="text-align:center"><?=($sum_e_area1 + $sum_j_area1); //離島?></td>
		<td style="text-align:center"><?=($sum_e_area2 + $sum_j_area2); //偏遠及特偏?></td>
		<td style="text-align:center"><?=($sum_e_area3 + $sum_j_area3); //一般地區?></td>
		<td style="text-align:center"><?=($sum_e_area4 + $sum_j_area4); //都會地區?></td>

		<td style="text-align:right"><?=($sum_e_aboriginal + $sum_j_aboriginal); //原住民學生數?></td>
		<td style="text-align:right"><?=number_format(($sum_e_aboriginal + $sum_j_aboriginal)/($sum_e_student + $sum_j_student)*100,2); //原住民學生數百分比?>%</td>
		<td style="text-align:center"><?=($sum_e_p1_1 + $sum_j_p1_1); //指標1-1?></td>
		<td style="text-align:center"><?=($sum_e_p1_2 + $sum_j_p1_2); //指標1-2?></td>
		<td style="text-align:center"><?=($sum_e_p1_3 + $sum_j_p1_3); //指標1-3?></td>
		<td style="text-align:center"><?=($sum_e_p1_4 + $sum_j_p1_4); //指標1-4?></td>

		<td style="text-align:right"><?=($sum_e_low_income + $sum_j_low_income); //低收入戶?></td>
		<td style="text-align:right"><?=($sum_e_grandparenting + $sum_j_grandparenting); //隔代教養?></td>
		<td style="text-align:right"><?=($sum_e_over45years + $sum_j_over45years); //親子年齡差距45歲以上?></td>
		<td style="text-align:right"><?=($sum_e_immigrant + $sum_j_immigrant); //新移民子女?></td>
		<td style="text-align:right"><?=($sum_e_single_parent + $sum_j_single_parent); //單寄親家庭?></td>
		<td style="text-align:right"><?=($sum_e_target_no_aboriginal + $sum_j_target_no_aboriginal); //目標學生合計人數(不含僅具原住民身分))?></td>
		<td style="text-align:right"><?=($sum_e_target_aboriginal + $sum_j_target_aboriginal); //目標學生合計人數(含僅具原住民身分)?></td>
		<td style="text-align:right"><?=number_format(($sum_e_target_no_aboriginal + $sum_j_target_no_aboriginal)/($sum_e_student + $sum_j_student)*100,2); //目標學生佔全校學生比例(不含僅具原住民身分)?>%</td>
		<td style="text-align:right"><?=number_format(($sum_e_target_aboriginal + $sum_j_target_aboriginal)/($sum_e_student + $sum_j_student)*100,2); //目標學生佔全校學生比例(含僅具原住民身分)?>%</td>
		<td style="text-align:center"><?=($sum_e_p2_1 + $sum_j_p2_1); //指標2-1?></td>
		<td style="text-align:center"><?=($sum_e_p2_2 + $sum_j_p2_2); //指標2-2?></td>
		<td style="text-align:center"><?=($sum_e_p2_3 + $sum_j_p2_3); //指標2-3?></td>

		<td style="text-align:right"><?=($sum_j_student_exam); //參加教育會考學生人數?></td>
		<td style="text-align:right"><?=($sum_j_count_p3); //待加強人數佔參加學生人數超過50%之科目數?></td>
		<td style="text-align:center"><?=($sum_e_p3_1 + $sum_j_p3_1); //指標3-1?></td>

		<td style="text-align:right"><?=($sum_e_lastyear_leaving + $sum_j_lastyear_leaving); //去年度中輟學生人數?></td>
		<td style="text-align:right"><?=($sum_e_laststudent + $sum_j_laststudent); //去年度在籍學生人數?></td>
		<td style="text-align:right"><?=number_format(($sum_e_lastyear_leaving + $sum_j_lastyear_leaving)/($sum_e_laststudent + $sum_j_laststudent)*100,2); //中輟學生佔在籍學生人數比例?>%</td>
		<td style="text-align:center"><?=($sum_e_p4_1 + $sum_j_p4_1); //指標4-1?></td>

		<td style="text-align:center"><?=($sum_e_traffic1 + $sum_j_traffic1); //離島?></td>
		<td style="text-align:center"><?=($sum_e_traffic2 + $sum_j_traffic2); //無公共交通工具?></td>
		<td style="text-align:center"><?=($sum_e_traffic3 + $sum_j_traffic3); //學校距站牌5km以上?></td>
		<td style="text-align:center"><?=($sum_e_traffic4 + $sum_j_traffic4); //社區5km無公車?></td>
		<td style="text-align:center"><?=($sum_e_traffic5 + $sum_j_traffic5); //每天少於4班?></td>
		<td style="text-align:center"><?=($sum_e_traffic6 + $sum_j_traffic6); //因裁併校需交通車?></td>

		<td style="text-align:center"><?=($sum_e_point_total + $sum_j_point_total); //該校符合指標總數?></td>
	</tr>
</table>
</div>
<p>

<?
	function print_check($input_str)
	{
		if($input_str == "1")
		{
			return "✓";
		}
		else
		{
			return "";
		}
	}
?>

<?
/*
※若要進行文書格式編修，建議複製到Excel編輯。<br />
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
*/
?>
