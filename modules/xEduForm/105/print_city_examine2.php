<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	include "../../function/config_for_105.php"; //本年度基本設定
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">
<? 
	include "../../function/button_print.php"; 
	include "../../function/button_excel.php"; 
?>
<p>
<div id="print_content">
【<?=$cityname?> 政府辦理教育部<?=($school_year);?>年度推動教育優先區計畫指標界定調查結果彙整表 (表Ⅱ-3)】
<table border="1" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="3" nowrap="nowrap">學校編號</td>
		<td rowspan="3" nowrap="nowrap">　　學　校　名　稱　　</td>
		<td rowspan="3" align='center'>班級數</td>
		<td rowspan="3" align='center'>全校學生總數</td>
		<td colspan="3" rowspan="2" align="left">教師編制人數</td>
		<td colspan="4" rowspan="2" align="left">學校所處地區</td>
		<td colspan="6" align="left">指標一：原住民學生比例偏高之學校</td>
		<td colspan="10" align="left">指標二：低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大、新移民子女學生比例偏高之學校</td>
		<td colspan="4" align="left">指標三：國中學習弱勢學生比例偏高之學校</td>
		<td colspan="4" align="left">指標四：中途輟學率偏高之學校</td>
		<td colspan="6" align="left">指標五：離島或偏遠交通不便之學校</td>
		<td colspan="13" align="left">指標六：教師流動率及代理教師比例偏高之學校</td>
		<td rowspan="3" align="center">符合指標條件總數</td>
	</tr>
	<tr>
		<td rowspan="2" align="center">原住民學生數</td>
		<td rowspan="2" align="center">佔全校學生比例 %</td>
		<td colspan="4" align="center">指標界定</td>
		<td colspan="6" align="center">目標學生人數(含僅原住民)</td>
		<td rowspan="2" align="center">佔全校學生比例(含僅原住民)</td>
		<td colspan="3" align="center">指標界定</td>
		<td rowspan="2" align="center"><?=($school_year-2);?> 學年畢業生人數</td>
		<td rowspan="2" align="center"><?=($school_year-2);?> 學年度參加教育會考學生人數</td>
		<td rowspan="2" align="center">待加強人數佔參加學生人數超過50%之科目數(科)</td>
		<td align="center">指標界定</td>
		<td rowspan="2" align="center"><?=($school_year-2);?>/9/1 - <?=($school_year-1);?>/6/30 中輟學生人數</td>
		<td rowspan="2" align="center"><?=($school_year-1);?>/9/30 在籍學生人數</td>
		<td rowspan="2" align="center">中輟學生佔全校學生之百分比</td>
		<td align="center">指標界定</td>
		<!-- <td colspan="4">離島</td> -->
		<td colspan="1" rowspan="2" align="center">離島</td>
		<td colspan="4" align="center">特偏、偏遠地區</td>
		<td rowspan="2" align="center">91學年前因裁倂校學區遼闊需交通車接送</td>
		<td rowspan="2" align="center">教師編制總人數 <?=($school_year-3);?> + <?=($school_year-2);?> + <?=($school_year-1);?> 年</td>
		<td colspan="4" align="center">教師異動人數</td>
		<td rowspan="2" align="center">最近三學年教師流動率</td>
		<td colspan="4" align="center">代理教師人數</td>
		<td rowspan="2" align="center"> 最近三學年代理教師比例</td>
		<td colspan="2" align="center">指標界定</td>
	</tr>
	<tr>
		<td align="center"><?=($school_year-3);?> 學年</td>
		<td align="center"><?=($school_year-2);?> 學年</td>
		<td align="center"><?=($school_year-1);?> 學年</td>
		<td align="center">離島</td>
		<td align="center">特偏偏遠</td>
		<td align="center">一般地區</td>
		<td align="center">都會地區</td>
		<td align="center">一 ~ (一) 40% 以上</td>
		<td align="center">一 ~ (二) 20% 以上</td>
		<td align="center">一 ~ (三) 15% 以上</td>
		<td align="center">一~ (四) 35 人以上</td>
		<td align="center">低收入戶子女</td>
		<td align="center">隔代教養</td>
		<td align="center">親子年齡差距45歲以上</td>
		<td align="center">新移民子女</td>
		<td align="center">單寄親家庭</td>
		<td align="center">目標學生合計人數</td>
		<td align="center">二 ~ (一) 20% 以上</td>
		<td align="center">二 ~ (二) 60 人以上</td>
		<td align="center">二 ~ (三) 含原住民學生30%以上</td>
		<td align="center">待加強人數佔參加學生人數超過50%之科目數 ≧ 2</td>
		<td align="center">指標四( 3% 以上)</td>
		<!--<td>一級</td> -->
		<!--<td>二級</td> -->
		<!--<td>三級</td> -->
		<!--<td>四級</td> -->
		<td align="center">無公共交通工具可達</td>
		<td align="center">學校距站牌 5 km 以上</td>
		<td align="center">距社區 5 km 無公車</td>
		<td align="center">公共交通工具每天少於 4 班</td>
		<td align="center"><?=($school_year-3);?> 學年</td>
		<td align="center"><?=($school_year-2);?> 學年</td>
		<td align="center"><?=($school_year-1);?> 學年</td>
		<td align="center">教師異動總人數 <?=($school_year-3);?> + <?=($school_year-2);?> + <?=($school_year-1);?> 年=</td>
		<td align="center"><?=($school_year-3);?> 學年</td>
		<td align="center"><?=($school_year-2);?> 學年</td>
		<td align="center"><?=($school_year-1);?> 學年</td>
		<td align="center">代理教師總人數 <?=($school_year-3);?> + <?=($school_year-2);?> + <?=($school_year-1);?> 年=</td>
		<td align="center">六 - (一)教師流動率平均 ≧ 30%</td>
		<td align="center">六 - (二) 代理教師比例平均 ≧ 30%</td>
	</tr>
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   
		   //考試成績
		   "	  , se.student_exam, se.chinese, se.math, se.english, se.nature, se.social ".
		   "	  , se.chinese_missing, se.math_missing, se.english_missing, se.nature_missing, se.social_missing ".
		   
		   "	  , sy_ly.student as student_ly ". //去年資料
		   "	  , sy_ly.teacher as teacher_ly ". 
		   
		   "      , sd102.a135, sd102.a138, sd102.a141, sd102.a144 ". //101年編制、調入、實缺、其他
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join school_examdata as se on sd.account = se.account and se.school_year = '$school_year' ". 
		   
		   //去年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ". 
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
		   
		   " where ". 
		   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   " order by sd.cityname, sd.account ";
	//echo "<br />".$sql."<br />";
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
		
		$teacher_3years_total = $row['teacher_3years_total'];
		$teacher = $row['teacher'];
		$teacher_change_total = $row['teacher_change_total']; 
		$teacher_agent_total = $row['teacher_agent_total'];
		$teacher_change_rate = $row['teacher_change_rate'];
		$teacher_agent_rate = $row['teacher_agent_rate'];
		$teacher_change_in = $row['teacher_change_in'];
		$teacher_change_lack = $row['teacher_change_lack'];
		$teacher_change_other = $row['teacher_change_other']; 
		$teacher_change = $teacher_change_in + $teacher_change_lack; //異動人數 調入+實缺
		$teacher_agent = $teacher_change_lack + $teacher_change_other; //代理人數 實缺+其他
		
		$teacher_last = ($row['teacher_ly'] == "")?"0":$row['teacher_ly']; //去年教師編制
		$teacher_change_in_last = $row['teacher_change_in_last'];
		$teacher_change_lack_last = $row['teacher_change_lack_last'];
		$teacher_change_other_last = $row['teacher_change_other_last']; 
		$teacher_change_last = $teacher_change_in_last + $teacher_change_lack_last; //異動人數 調入+實缺
		$teacher_agent_last = $teacher_change_lack_last + $teacher_change_other_last; //代理人數 實缺+其他
		
		$teacher_last2 = ($row['a135'] == "")?"0":$row['a135']; //前年教師編制
		$teacher_change_in_last2 = ($row['a138'] == "")?"0":$row['a138'];
		$teacher_change_lack_last2 = ($row['a141'] == "")?"0":$row['a141'];
		$teacher_change_other_last2 = ($row['a144'] == "")?"0":$row['a144'];
		$teacher_change_last2 = $teacher_change_in_last2 + $teacher_change_lack_last2; //異動人數 調入+實缺
		$teacher_agent_last2 = $teacher_change_lack_last2 + $teacher_change_other_last2; //代理人數 實缺+其他
		
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$low_income = $row['low_income'];
		$grandparenting = $row['grandparenting'];
		$over45years = $row['over45years'];
		$immigrant = $row['immigrant'];
		$single_parent = $row['single_parent'];
		$aboriginal = $row['aboriginal'];
		$lastyear_leaving = $row['lastyear_leaving'];
		$lastyear_graduate = $row['lastyear_graduate'];
		$lastyear_pr25 = $row['lastyear_pr25'];
		
		$accord_point = $row['accord_point'];
		
		$accord_point_ary = explode(",", $accord_point); //符合的指標
		$traffic_ary = explode(",", $traffic_status);
		
		$area1 = ($area == 1)?"1":" ";
		$area2 = ($area == 2)?"1":" ";
		$area3 = ($area == 3)?"1":" ";
		$area4 = ($area == 4)?"1":" ";
		
		$traffic1 = in_array('1',$traffic_ary)?'1':' ';
		$traffic2 = in_array('2',$traffic_ary)?'1':' ';
		$traffic3 = in_array('3',$traffic_ary)?'1':' ';
		$traffic4 = in_array('4',$traffic_ary)?'1':' ';
		$traffic5 = in_array('5',$traffic_ary)?'1':' ';
		$traffic6 = in_array('6',$traffic_ary)?'1':' ';
		
		$p1_1 = in_array('p1_1',$accord_point_ary)?'1':' ';
		$p1_2 = in_array('p1_2',$accord_point_ary)?'1':' ';
		$p1_3 = in_array('p1_3',$accord_point_ary)?'1':' ';
		$p1_4 = in_array('p1_4',$accord_point_ary)?'1':' ';
		$p2_1 = in_array('p2_1',$accord_point_ary)?'1':' ';
		$p2_2 = in_array('p2_2',$accord_point_ary)?'1':' ';
		$p2_3 = in_array('p2_3',$accord_point_ary)?'1':' ';
		$p3_1 = in_array('p3_1',$accord_point_ary)?'1':' ';
		$p4_1 = in_array('p4_1',$accord_point_ary)?'1':' ';
		$p5_1 = in_array('p5_1',$accord_point_ary)?'1':' ';
		$p5_2 = in_array('p5_2',$accord_point_ary)?'1':' ';				
		$p5_3 = in_array('p5_3',$accord_point_ary)?'1':' ';
		$p6_1 = in_array('p6_1',$accord_point_ary)?'1':' ';
		$p6_2 = in_array('p6_2',$accord_point_ary)?'1':' ';	

		//指標一~指標六的符合指標總數不能超過 6 
		//就算符合指標下的多個小項目也只能算一個
		//用 or，只要其中一個符合就會回傳1
		//用trim是因為有一格空白
		$p1 = trim($p1_1) || trim($p1_2) || trim($p1_3) || trim($p1_4);
		$p2 = trim($p2_1) || trim($p2_2) || trim($p2_3); 
		$p3 = trim($p3_1); 
		$p4 = trim($p4_1); 
		$p5 = trim($p5_1) || trim($p5_2) || trim($p5_3);
		$p6 = trim($p6_1) || trim($p6_2);
		
		$point_total = $p1+$p2+$p3+$p4+$p5+$p6;
		
		//待加強超過50%
		$count_p3 = 0;
		$count_p3 += ($chinese / ($student_exam-$chinese_missing) >= 0.5);
		$count_p3 += ($math / ($student_exam-$math_missing) >= 0.5);
		$count_p3 += ($english / ($student_exam-$english_missing) >= 0.5);
		$count_p3 += ($nature / ($student_exam-$nature_missing) >= 0.5);
		$count_p3 += ($social / ($student_exam-$social_missing) >= 0.5);
		
		?>
			<tr>
				<td style="text-align:center"><?=$account;?></td>
				<td style="text-align:center"><?=$cityname.$district.$schoolname; //學校名稱?></td>
				<td style="text-align:right"><?=$class_total; //全校班級數?></td>
				<td style="text-align:right"><?=$student; //全校學生人數?></td>
				
				<td style="text-align:right"><?=$teacher_last2; //前年度編制教師數?></td>
				<td style="text-align:right"><?=$teacher_last; //去年度編制教師數?></td>
				<td style="text-align:right"><?=$teacher; //本年度編制教師數?></td>
				
				<td style="text-align:center"><?=$area1; //離島?></td>
				<td style="text-align:center"><?=$area2; //偏遠及特偏?></td>
				<td style="text-align:center"><?=$area3; //一般地區?></td>
				<td style="text-align:center"><?=$area4; //都會地區?></td>
				
				<td style="text-align:right"><?=$aboriginal; //原住民學生數?></td>
				<td style="text-align:right"><?=number_format($aboriginal/$student*100,2); //原住民學生數百分比?></td>
				<td style="text-align:center"><?=$p1_1; //指標1-1?></td>
				<td style="text-align:center"><?=$p1_2; //指標1-2?></td>
				<td style="text-align:center"><?=$p1_3; //指標1-3?></td>
				<td style="text-align:center"><?=$p1_4; //指標1-4?></td>
				
				<td style="text-align:right"><?=$low_income; //低收入戶?></td>
				<td style="text-align:right"><?=$grandparenting; //隔代教養?></td>
				<td style="text-align:right"><?=$over45years; //親子年齡差距45歲以上?></td>
				<td style="text-align:right"><?=$immigrant; //新移民子女?></td>
				<td style="text-align:right"><?=$single_parent; //單寄親家庭?></td>
				<td style="text-align:right"><?=$target_aboriginal; //目標學生合計人數?></td>
				<td style="text-align:right"><?=number_format($target_aboriginal/$student*100,2); //目標學生佔全校學生比例?></td>
				<td style="text-align:center"><?=$p2_1; //指標2-1?></td>
				<td style="text-align:center"><?=$p2_2; //指標2-2?></td>
				<td style="text-align:center"><?=$p2_3; //指標2-3?></td>
				
				<td style="text-align:right"><?=$lastyear_graduate; //國中學年度畢業生人數?></td>
				<td style="text-align:right"><?=$student_exam; //參加教育會考學生人數?></td>
				<td style="text-align:right"><?=$count_p3; //待加強人數佔參加學生人數超過50%之科目數?></td>
				<td style="text-align:center"><?=$p3_1; //指標3-1?></td>
				
				<td style="text-align:right"><?=$lastyear_leaving; //去年度中輟學生人數?></td>
				<td style="text-align:right"><?=$laststudent; //去年度在籍學生人數?></td>
				<td style="text-align:right"><?=number_format($lastyear_leaving/$laststudent*100,2); //中輟學生佔在籍學生人數比例?></td>
				<td style="text-align:center"><?=$p4_1; //指標4-1?></td>
				
				<td style="text-align:center"><?=$traffic1; //離島?></td>
				<td style="text-align:center"><?=$traffic2; //無公共交通工具?></td>
				<td style="text-align:center"><?=$traffic3; //學校距站牌5km以上?></td>
				<td style="text-align:center"><?=$traffic4; //社區5km無公車?></td>
				<td style="text-align:center"><?=$traffic5; //每天少於4班?></td>
				<td style="text-align:center"><?=$traffic6; //因裁併校需交通車?></td>
				
				<td style="text-align:right"><?=$teacher_3years_total; //最近三學年度教師編制合計?></td>
				<td style="text-align:right"><?=$teacher_change_last2; //前年度 教師異動人數?></td>
				<td style="text-align:right"><?=$teacher_change_last; //去年度 教師異動人數?></td>
				<td style="text-align:right"><?=$teacher_change; //今年度 教師異動人數?></td>
				<td style="text-align:right"><?=$teacher_change_total; //最近三學年度教師異動合計?></td>
				<td style="text-align:right"><?=number_format($teacher_change_rate,2); //最近三學年度教師流動率?></td>
				<td style="text-align:right"><?=$teacher_agent_last2; //前年度 代理教師人數?></td>
				<td style="text-align:right"><?=$teacher_agent_last; //去年度 代理教師人數?></td>
				<td style="text-align:right"><?=$teacher_agent; //今年度 代理教師人數?></td>
				<td style="text-align:right"><?=$teacher_agent_total; //最近三學年度代理教師合計?></td>
				<td style="text-align:right"><?=number_format($teacher_agent_rate,2); //最近三年教師代理率?></td>
				<td style="text-align:center"><?=$p6_1; //指標6-1?></td>
				<td style="text-align:center"><?=$p6_2; //指標6-2?></td>
				
				<td style="text-align:center"><?=$point_total; //該校符合指標總數?></td>
			</tr>
		<?
		
		//計算合計
		if($schooltype == '國小')
		{
			$sum_e++; //學校數
						
			$sum_e_class_total += $class_total; //全校班級數
			$sum_e_student += $student; //全校學生人數
			
			$sum_e_teacher_last2 += $teacher_last2; //前年度編制教師數
			$sum_e_teacher_last += $teacher_last; //去年度編制教師數
			$sum_e_teacher += $teacher; //本年度編制教師數
			
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
			$sum_e_target_aboriginal += $target_aboriginal; //目標學生合計人數
			$sum_e_target_aboriginal_percent = number_format($sum_e_target_aboriginal/$sum_e_student*100,2); //目標學生佔全校學生比例
			$sum_e_p2_1 += $p2_1; //指標2-1
			$sum_e_p2_2 += $p2_2; //指標2-2
			$sum_e_p2_3 += $p2_3; //指標2-3
			
			$sum_e_lastyear_graduate += $lastyear_graduate; //國中學年度畢業生人數
			$sum_e_lastyear_pr25 += $lastyear_pr25; //國中第一次學測PR<=25人數
			$sum_e_pr25_percent = number_format($sum_e_lastyear_pr25/$sum_e_lastyear_graduate*100,2); //國中第一次學測PR<=25人數比例
			$sum_e_p3_1 += $p3_1; //指標3-1
			
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
			
			$sum_e_teacher_3years_total += $teacher_3years_total; //最近三學年度教師編制合計
			$sum_e_teacher_change_last2 += $teacher_change_last2; //前年度 教師異動人數
			$sum_e_teacher_change_last += $teacher_change_last; //去年度 教師異動人數
			$sum_e_teacher_change += $teacher_change; //今年度 教師異動人數
			$sum_e_teacher_change_total += $teacher_change_total; //最近三學年度教師異動合計
			$sum_e_teacher_change_rate += $teacher_change_rate; //最近三學年度教師流動率
			
			$sum_e_teacher_agent_last2 += $teacher_agent_last2; //前年度 代理教師人數
			$sum_e_teacher_agent_last += $teacher_agent_last; //去年度 代理教師人數
			$sum_e_teacher_agent += $teacher_agent; //今年度 代理教師人數
			$sum_e_teacher_agent_total += $teacher_agent_total; //最近三學年度代理教師合計
			$sum_e_teacher_agent_rate += $teacher_agent_rate; //最近三年教師代理率
			
			$sum_e_p6_1 += $p6_1; //指標6-1
			$sum_e_p6_2 += $p6_2; //指標6-2
			
			$sum_e_point_total += $point_total; //該校符合指標總數
		}
		if($schooltype == '國中')
		{
			$sum_j++; //學校數
						
			$sum_j_class_total += $class_total; //全校班級數
			$sum_j_student += $student; //全校學生人數
			
			$sum_j_teacher_last2 += $teacher_last2; //前年度編制教師數
			$sum_j_teacher_last += $teacher_last; //去年度編制教師數
			$sum_j_teacher += $teacher; //本年度編制教師數
			
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
			$sum_j_target_aboriginal += $target_aboriginal; //目標學生合計人數
			$sum_j_target_aboriginal_percent = number_format($sum_j_target_aboriginal/$sum_j_student*100,2); //目標學生佔全校學生比例
			$sum_j_p2_1 += $p2_1; //指標2-1
			$sum_j_p2_2 += $p2_2; //指標2-2
			$sum_j_p2_3 += $p2_3; //指標2-3
			
			$sum_j_lastyear_graduate += $lastyear_graduate; //國中學年度畢業生人數
			$sum_j_lastyear_pr25 += $lastyear_pr25; //國中第一次學測PR<=25人數
			$sum_j_pr25_percent = number_format($sum_j_lastyear_pr25/$sum_j_lastyear_graduate*100,2); //國中第一次學測PR<=25人數比例
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
			
			$sum_j_teacher_3years_total += $teacher_3years_total; //最近三學年度教師編制合計
			$sum_j_teacher_change_last2 += $teacher_change_last2; //前年度 教師異動人數
			$sum_j_teacher_change_last += $teacher_change_last; //去年度 教師異動人數
			$sum_j_teacher_change += $teacher_change; //今年度 教師異動人數
			$sum_j_teacher_change_total += $teacher_change_total; //最近三學年度教師異動合計
			$sum_j_teacher_change_rate += $teacher_change_rate; //最近三學年度教師流動率
			
			$sum_j_teacher_agent_last2 += $teacher_agent_last2; //前年度 代理教師人數
			$sum_j_teacher_agent_last += $teacher_agent_last; //去年度 代理教師人數
			$sum_j_teacher_agent += $teacher_agent; //今年度 代理教師人數
			$sum_j_teacher_agent_total += $teacher_agent_total; //最近三學年度代理教師合計
			$sum_j_teacher_agent_rate += $teacher_agent_rate; //最近三年教師代理率
			
			$sum_j_p6_1 += $p6_1; //指標6-1
			$sum_j_p6_2 += $p6_2; //指標6-2
			
			$sum_j_point_total += $point_total; //該校符合指標總數
		}
		
	}

?>
	<tr>
		<td style="text-align:center">國小合計</td>
		<td style="text-align:center"><?=$sum_e; //學校數?></td>
		<td style="text-align:right"><?=$sum_e_class_total; //全校班級數?></td>
		<td style="text-align:right"><?=$sum_e_student; //全校學生人數?></td>
		
		<td style="text-align:right"><?=$sum_e_teacher_last2; //前年度編制教師數?></td>
		<td style="text-align:right"><?=$sum_e_teacher_last; //去年度編制教師數?></td>
		<td style="text-align:right"><?=$sum_e_teacher; //本年度編制教師數?></td>
		
		<td style="text-align:center"><?=$sum_e_area1; //離島?></td>
		<td style="text-align:center"><?=$sum_e_area2; //偏遠及特偏?></td>
		<td style="text-align:center"><?=$sum_e_area3; //一般地區?></td>
		<td style="text-align:center"><?=$sum_e_area4; //都會地區?></td>
		
		<td style="text-align:right"><?=$sum_e_aboriginal; //原住民學生數?></td>
		<td style="text-align:right"><?=$sum_e_aboriginal_percent; //原住民學生數百分比?></td>
		<td style="text-align:center"><?=$sum_e_p1_1; //指標1-1?></td>
		<td style="text-align:center"><?=$sum_e_p1_2; //指標1-2?></td>
		<td style="text-align:center"><?=$sum_e_p1_3; //指標1-3?></td>
		<td style="text-align:center"><?=$sum_e_p1_4; //指標1-4?></td>
		
		<td style="text-align:right"><?=$sum_e_low_income; //低收入戶?></td>
		<td style="text-align:right"><?=$sum_e_grandparenting; //隔代教養?></td>
		<td style="text-align:right"><?=$sum_e_over45years; //親子年齡差距45歲以上?></td>
		<td style="text-align:right"><?=$sum_e_immigrant; //新移民子女?></td>
		<td style="text-align:right"><?=$sum_e_single_parent; //單寄親家庭?></td>
		<td style="text-align:right"><?=$sum_e_target_aboriginal; //目標學生合計人數?></td>
		<td style="text-align:right"><?=$sum_e_target_aboriginal_percent; //目標學生佔全校學生比例?></td>
		<td style="text-align:center"><?=$sum_e_p2_1; //指標2-1?></td>
		<td style="text-align:center"><?=$sum_e_p2_2; //指標2-2?></td>
		<td style="text-align:center"><?=$sum_e_p2_3; //指標2-3?></td>
		
		<td style="text-align:right"><?=$sum_e_lastyear_graduate; //國中學年度畢業生人數?></td>
		<td style="text-align:right"><?=$sum_e_lastyear_pr25; //國中第一次學測PR<=25人數?></td>
		<td style="text-align:right"><?=$sum_e_pr25_percent; //國中第一次學測PR<=25人數比例?></td>
		<td style="text-align:center"><?=$sum_e_p3_1; //指標3-1?></td>
		
		<td style="text-align:right"><?=$sum_e_lastyear_leaving; //去年度中輟學生人數?></td>
		<td style="text-align:right"><?=$sum_e_laststudent; //去年度在籍學生人數?></td>
		<td style="text-align:right"><?=$sum_e_lastyear_leaving_percent; //中輟學生佔在籍學生人數比例?></td>
		<td style="text-align:center"><?=$sum_e_p4_1; //指標4-1?></td>
		
		<td style="text-align:center"><?=$sum_e_traffic1; //離島?></td>
		<td style="text-align:center"><?=$sum_e_traffic2; //無公共交通工具?></td>
		<td style="text-align:center"><?=$sum_e_traffic3; //學校距站牌5km以上?></td>
		<td style="text-align:center"><?=$sum_e_traffic4; //社區5km無公車?></td>
		<td style="text-align:center"><?=$sum_e_traffic5; //每天少於4班?></td>
		<td style="text-align:center"><?=$sum_e_traffic6; //因裁併校需交通車?></td>
		
		<td style="text-align:right"><?=$sum_e_teacher_3years_total; //最近三學年度教師編制合計?></td>
		<td style="text-align:right"><?=$sum_e_teacher_change_last2; //前年度 教師異動人數?></td>
		<td style="text-align:right"><?=$sum_e_teacher_change_last; //去年度 教師異動人數?></td>
		<td style="text-align:right"><?=$sum_e_teacher_change; //今年度 教師異動人數?></td>
		<td style="text-align:right"><?=$sum_e_teacher_change_total; //最近三學年度教師異動合計?></td>
		<td style="text-align:right"><?=number_format($sum_e_teacher_change_total/$sum_e_teacher_3years_total*100,2); //最近三學年度教師流動率?></td>
		<td style="text-align:right"><?=$sum_e_teacher_agent_last2; //前年度 代理教師人數?></td>
		<td style="text-align:right"><?=$sum_e_teacher_agent_last; //去年度 代理教師人數?></td>
		<td style="text-align:right"><?=$sum_e_teacher_agent; //今年度 代理教師人數?></td>
		<td style="text-align:right"><?=$sum_e_teacher_agent_total; //最近三學年度代理教師合計?></td>
		<td style="text-align:right"><?=number_format($sum_e_teacher_agent_total/$sum_e_teacher_3years_total*100,2); //最近三年教師代理率?></td>
		<td style="text-align:center"><?=$sum_e_p6_1; //指標6-1?></td>
		<td style="text-align:center"><?=$sum_e_p6_2; //指標6-2?></td>
		
		<td style="text-align:center"><?=$sum_e_point_total; //該校符合指標總數?></td>
	</tr>
	<tr>
		<td style="text-align:center">國中合計</td>
		<td style="text-align:center"><?=$sum_j; //學校數?></td>
		<td style="text-align:right"><?=$sum_j_class_total; //全校班級數?></td>
		<td style="text-align:right"><?=$sum_j_student; //全校學生人數?></td>
		
		<td style="text-align:right"><?=$sum_j_teacher_last2; //前年度編制教師數?></td>
		<td style="text-align:right"><?=$sum_j_teacher_last; //去年度編制教師數?></td>
		<td style="text-align:right"><?=$sum_j_teacher; //本年度編制教師數?></td>
		
		<td style="text-align:center"><?=$sum_j_area1; //離島?></td>
		<td style="text-align:center"><?=$sum_j_area2; //偏遠及特偏?></td>
		<td style="text-align:center"><?=$sum_j_area3; //一般地區?></td>
		<td style="text-align:center"><?=$sum_j_area4; //都會地區?></td>
		
		<td style="text-align:right"><?=$sum_j_aboriginal; //原住民學生數?></td>
		<td style="text-align:right"><?=$sum_j_aboriginal_percent; //原住民學生數百分比?></td>
		<td style="text-align:center"><?=$sum_j_p1_1; //指標1-1?></td>
		<td style="text-align:center"><?=$sum_j_p1_2; //指標1-2?></td>
		<td style="text-align:center"><?=$sum_j_p1_3; //指標1-3?></td>
		<td style="text-align:center"><?=$sum_j_p1_4; //指標1-4?></td>
		
		<td style="text-align:right"><?=$sum_j_low_income; //低收入戶?></td>
		<td style="text-align:right"><?=$sum_j_grandparenting; //隔代教養?></td>
		<td style="text-align:right"><?=$sum_j_over45years; //親子年齡差距45歲以上?></td>
		<td style="text-align:right"><?=$sum_j_immigrant; //新移民子女?></td>
		<td style="text-align:right"><?=$sum_j_single_parent; //單寄親家庭?></td>
		<td style="text-align:right"><?=$sum_j_target_aboriginal; //目標學生合計人數?></td>
		<td style="text-align:right"><?=$sum_j_target_aboriginal_percent; //目標學生佔全校學生比例?></td>
		<td style="text-align:center"><?=$sum_j_p2_1; //指標2-1?></td>
		<td style="text-align:center"><?=$sum_j_p2_2; //指標2-2?></td>
		<td style="text-align:center"><?=$sum_j_p2_3; //指標2-3?></td>
		
		<td style="text-align:right"><?=$sum_j_lastyear_graduate; //國中學年度畢業生人數?></td>
		<td style="text-align:right"><?=$sum_j_lastyear_pr25; //國中第一次學測PR<=25人數?></td>
		<td style="text-align:right"><?=$sum_j_pr25_percent; //國中第一次學測PR<=25人數比例?></td>
		<td style="text-align:center"><?=$sum_j_p3_1; //指標3-1?></td>
		
		<td style="text-align:right"><?=$sum_j_lastyear_leaving; //去年度中輟學生人數?></td>
		<td style="text-align:right"><?=$sum_j_laststudent; //去年度在籍學生人數?></td>
		<td style="text-align:right"><?=$sum_j_lastyear_leaving_percent; //中輟學生佔在籍學生人數比例?></td>
		<td style="text-align:center"><?=$sum_j_p4_1; //指標4-1?></td>
		
		<td style="text-align:center"><?=$sum_j_traffic1; //離島?></td>
		<td style="text-align:center"><?=$sum_j_traffic2; //無公共交通工具?></td>
		<td style="text-align:center"><?=$sum_j_traffic3; //學校距站牌5km以上?></td>
		<td style="text-align:center"><?=$sum_j_traffic4; //社區5km無公車?></td>
		<td style="text-align:center"><?=$sum_j_traffic5; //每天少於4班?></td>
		<td style="text-align:center"><?=$sum_j_traffic6; //因裁併校需交通車?></td>
		
		<td style="text-align:right"><?=$sum_j_teacher_3years_total; //最近三學年度教師編制合計?></td>
		<td style="text-align:right"><?=$sum_j_teacher_change_last2; //前年度 教師異動人數?></td>
		<td style="text-align:right"><?=$sum_j_teacher_change_last; //去年度 教師異動人數?></td>
		<td style="text-align:right"><?=$sum_j_teacher_change; //今年度 教師異動人數?></td>
		<td style="text-align:right"><?=$sum_j_teacher_change_total; //最近三學年度教師異動合計?></td>
		<td style="text-align:right"><?=number_format($sum_j_teacher_change_total/$sum_j_teacher_3years_total*100,2); //最近三學年度教師流動率?></td>
		<td style="text-align:right"><?=$sum_j_teacher_agent_last2; //前年度 代理教師人數?></td>
		<td style="text-align:right"><?=$sum_j_teacher_agent_last; //去年度 代理教師人數?></td>
		<td style="text-align:right"><?=$sum_j_teacher_agent; //今年度 代理教師人數?></td>
		<td style="text-align:right"><?=$sum_j_teacher_agent_total; //最近三學年度代理教師合計?></td>
		<td style="text-align:right"><?=number_format($sum_j_teacher_agent_total/$sum_j_teacher_3years_total*100,2); //最近三年教師代理率?></td>
		<td style="text-align:center"><?=$sum_j_p6_1; //指標6-1?></td>
		<td style="text-align:center"><?=$sum_j_p6_2; //指標6-2?></td>
		
		<td style="text-align:center"><?=$sum_j_point_total; //該校符合指標總數?></td>
	</tr>
	<tr>
		<td style="text-align:center">全部合計</td>
		<td style="text-align:center"><?=($sum_e + $sum_j); //學校數?></td>
		<td style="text-align:right"><?=($sum_e_class_total + $sum_j_class_total); //全校班級數?></td>
		<td style="text-align:right"><?=($sum_e_student + $sum_j_student); //全校學生人數?></td>
		
		<td style="text-align:right"><?=($sum_e_teacher_last2 + $sum_j_teacher_last2); //前年度編制教師數?></td>
		<td style="text-align:right"><?=($sum_e_teacher_last + $sum_j_teacher_last); //去年度編制教師數?></td>
		<td style="text-align:right"><?=($sum_e_teacher + $sum_j_teacher); //本年度編制教師數?></td>
		
		<td style="text-align:center"><?=($sum_e_area1 + $sum_j_area1); //離島?></td>
		<td style="text-align:center"><?=($sum_e_area2 + $sum_j_area2); //偏遠及特偏?></td>
		<td style="text-align:center"><?=($sum_e_area3 + $sum_j_area3); //一般地區?></td>
		<td style="text-align:center"><?=($sum_e_area4 + $sum_j_area4); //都會地區?></td>
		
		<td style="text-align:right"><?=($sum_e_aboriginal + $sum_j_aboriginal); //原住民學生數?></td>
		<td style="text-align:right"><?=number_format(($sum_e_aboriginal + $sum_j_aboriginal)/($sum_e_student + $sum_j_student)*100,2); //原住民學生數百分比?></td>
		<td style="text-align:center"><?=($sum_e_p1_1 + $sum_j_p1_1); //指標1-1?></td>
		<td style="text-align:center"><?=($sum_e_p1_2 + $sum_j_p1_2); //指標1-2?></td>
		<td style="text-align:center"><?=($sum_e_p1_3 + $sum_j_p1_3); //指標1-3?></td>
		<td style="text-align:center"><?=($sum_e_p1_4 + $sum_j_p1_4); //指標1-4?></td>

		<td style="text-align:right"><?=($sum_e_low_income + $sum_j_low_income); //低收入戶?></td>
		<td style="text-align:right"><?=($sum_e_grandparenting + $sum_j_grandparenting); //隔代教養?></td>
		<td style="text-align:right"><?=($sum_e_over45years + $sum_j_over45years); //親子年齡差距45歲以上?></td>
		<td style="text-align:right"><?=($sum_e_immigrant + $sum_j_immigrant); //新移民子女?></td>
		<td style="text-align:right"><?=($sum_e_single_parent + $sum_j_single_parent); //單寄親家庭?></td>
		<td style="text-align:right"><?=($sum_e_target_aboriginal + $sum_j_target_aboriginal); //目標學生合計人數?></td>
		<td style="text-align:right"><?=number_format(($sum_e_target_aboriginal + $sum_j_target_aboriginal)/($sum_e_student + $sum_j_student)*100,2); //目標學生佔全校學生比例?></td>
		<td style="text-align:center"><?=($sum_e_p2_1 + $sum_j_p2_1); //指標2-1?></td>
		<td style="text-align:center"><?=($sum_e_p2_2 + $sum_j_p2_2); //指標2-2?></td>
		<td style="text-align:center"><?=($sum_e_p2_3 + $sum_j_p2_3); //指標2-3?></td>
		
		<td style="text-align:right"><?=($sum_e_lastyear_graduate + $sum_j_lastyear_graduate); //國中學年度畢業生人數?></td>
		<td style="text-align:right"><?=($sum_e_lastyear_pr25 + $sum_j_lastyear_pr25); //國中第一次學測PR<=25人數?></td>
		<td style="text-align:right"><?=number_format(($sum_e_lastyear_pr25 + $sum_j_lastyear_pr25)/($sum_e_lastyear_graduate + $sum_j_lastyear_graduate)*100,2); //國中第一次學測PR<=25人數比例?></td>
		<td style="text-align:center"><?=($sum_e_p3_1 + $sum_j_p3_1); //指標3-1?></td>
		
		<td style="text-align:right"><?=($sum_e_lastyear_leaving + $sum_j_lastyear_leaving); //去年度中輟學生人數?></td>
		<td style="text-align:right"><?=($sum_e_laststudent + $sum_j_laststudent); //去年度在籍學生人數?></td>
		<td style="text-align:right"><?=number_format(($sum_e_lastyear_leaving + $sum_j_lastyear_leaving)/($sum_e_laststudent + $sum_j_laststudent)*100,2); //中輟學生佔在籍學生人數比例?></td>
		<td style="text-align:center"><?=($sum_e_p4_1 + $sum_j_p4_1); //指標4-1?></td>
		
		<td style="text-align:center"><?=($sum_e_traffic1 + $sum_j_traffic1); //離島?></td>
		<td style="text-align:center"><?=($sum_e_traffic2 + $sum_j_traffic2); //無公共交通工具?></td>
		<td style="text-align:center"><?=($sum_e_traffic3 + $sum_j_traffic3); //學校距站牌5km以上?></td>
		<td style="text-align:center"><?=($sum_e_traffic4 + $sum_j_traffic4); //社區5km無公車?></td>
		<td style="text-align:center"><?=($sum_e_traffic5 + $sum_j_traffic5); //每天少於4班?></td>
		<td style="text-align:center"><?=($sum_e_traffic6 + $sum_j_traffic6); //因裁併校需交通車?></td>
		
		<td style="text-align:right"><?=($sum_e_teacher_3years_total + $sum_j_teacher_3years_total); //最近三學年度教師編制合計?></td>
		<td style="text-align:right"><?=($sum_e_teacher_change_last2 + $sum_j_teacher_change_last2); //前年度 教師異動人數?></td>
		<td style="text-align:right"><?=($sum_e_teacher_change_last + $sum_j_teacher_change_last); //去年度 教師異動人數?></td>
		<td style="text-align:right"><?=($sum_e_teacher_change + $sum_j_teacher_change); //今年度 教師異動人數?></td>
		<td style="text-align:right"><?=($sum_e_teacher_change_total + $sum_j_teacher_change_total); //最近三學年度教師異動合計?></td>
		<td style="text-align:right"><?=number_format(($sum_e_teacher_change_total + $sum_j_teacher_change_total)/($sum_e_teacher_3years_total + $sum_j_teacher_3years_total)*100,2); //最近三學年度教師流動率?></td>
		<td style="text-align:right"><?=($sum_e_teacher_agent_last2 + $sum_j_teacher_agent_last2); //前年度 代理教師人數?></td>
		<td style="text-align:right"><?=($sum_e_teacher_agent_last + $sum_j_teacher_agent_last); //去年度 代理教師人數?></td>
		<td style="text-align:right"><?=($sum_e_teacher_agent + $sum_j_teacher_agent); //今年度 代理教師人數?></td>
		<td style="text-align:right"><?=($sum_e_teacher_agent_total + $sum_j_teacher_agent_total); //最近三學年度代理教師合計?></td>
		<td style="text-align:right"><?=number_format(($sum_e_teacher_agent_total + $sum_j_teacher_agent_total)/($sum_e_teacher_3years_total + $sum_j_teacher_3years_total)*100,2); //最近三年教師代理率?></td>
		<td style="text-align:center"><?=($sum_e_p6_1 + $sum_j_p6_1); //指標6-1?></td>
		<td style="text-align:center"><?=($sum_e_p6_2 + $sum_j_p6_2); //指標6-2?></td>
		
		<td style="text-align:center"><?=($sum_e_point_total + $sum_j_point_total); //該校符合指標總數?></td>
	</tr>
</table>
</div>
<p>
※若要進行文書格式編修，建議複製到Excel編輯。<br />
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
