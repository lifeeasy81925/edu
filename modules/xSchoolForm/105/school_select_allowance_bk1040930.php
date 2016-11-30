<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	
	$username = ($_GET['id'] != '')?$_GET['id']:$username; //get為測試用

	include "../../function/config_for_105.php"; //本年度基本設定
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   		   
		   //105年考試成績
		   "	  , se.student_exam, se.chinese, se.math, se.english, se.nature, se.social ".
		   "	  , se.chinese_missing, se.math_missing, se.english_missing, se.nature_missing, se.social_missing ".
		   
		  //j-10407,新增104年考試成績
		   "	  , se_ly.student_exam as student_exam_ly, se_ly.chinese as chinese_ly, se_ly.math as math_ly, se_ly.english as english_ly, se_ly.nature as nature_ly, se_ly.social as social_ly ".
		   "	  , se_ly.chinese_missing as chinese_missing_ly, se_ly.math_missing as math_missing_ly, se_ly.english_missing as english_missing_ly, se_ly.nature_missing as nature_missing_ly, se_ly.social_missing as social_missing_ly ".
		  
		  /* j-10407,用不到!!
		   "	  , sy_ly.student as student_ly ".     //104年學生資料
		   "	  , sy_ly.teacher as teacher_ly ".     //104年老師資料
		   "	  , sy_l2y.student as student_l2y ".   //103年學生資料
		   "	  , sy_l2y.teacher as teacher_l2y ".   //103年老師資料 */
		   		   
		   //補四歷史資料
		   "      , sf101.a5 ".                                 //101補助5 金額(101的補助5=現在的補助4)
		   "      , sd102.a169 ".                               //102補助4 金額
		   "      , a4_l2y.edu_total_money as a4_l2y_money ".   //j-10407, 新增103補助4 金額
           "      , a4_ly.edu_total_money as a4_ly_money ".     //j-10407, 新增104補助4 金額

		   "      , sl.nearest_localoffice, sl.nearest_localoffice_name, sl.bus_stop ".		                                                                        //j10407新增  
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_location as sl on sd.account = sl.account ".                                                                    //j10407新增		   
		   "                       left join school_examdata as se on sd.account = se.account and se.school_year = '$school_year' ".                                //j-10407, 105年匯入之103學年學測資料
		   "                       left join school_examdata as se_ly on sd.account = se_ly.account and se_ly.school_year = '".($school_year - 1)."' ".             //j-10407, 104年匯入之102學年學測資料 		   
		   
		   //j-10407,104年資料
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ". 		   
		   "                       left join schooldata_year as sy_l2y on sd.account = sy_l2y.account and sy_l2y.school_year = '".($school_year - 2)."' ".          //j-10407, 103年資料		   
		   
		   //j-10407,103年資料的資料表

		   "                       left join $a4_table_name as a4_ly on sy_ly.seq_no = a4_ly.sy_seq " .                                                              //j-10407, 去年資料
           "                       left join $a4_table_name as a4_l2y on sy_l2y.seq_no = a4_l2y.sy_seq " .                                                           //j-10407,	前年資料	   
		   
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
		   "                       left join 101school_final as sf101 on sd.account = sf101.account ". //101school_final
		   " where sy.school_year = '$school_year' ". 
		   "   and sd.account = '$username' ";	
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		$high = $row['high'];
		$bonus = $row['bonus'];
		$distance_cityhall = $row['distance_cityhall'];
		$distance_localoffice = $row['distance_localoffice'];
		
		$bus_stop = $row['bus_stop']; //j10407新增

		
		//105年學測資料
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

		//j-10407, 新增104(去)年學測資料
		$student_exam_ly = $row['student_exam_ly'];
		$chinese_ly = $row['chinese_ly'];
		$math_ly = $row['math_ly'];
		$english_ly = $row['english_ly'];
		$nature_ly = $row['nature_ly'];
		$social_ly = $row['social_ly'];
		$chinese_missing_ly = $row['chinese_missing_ly'];
		$math_missing_ly = $row['math_missing_ly'];
		$english_missing_ly = $row['english_missing_ly'];
		$nature_missing_ly = $row['nature_missing_ly'];
		$social_missing_ly = $row['social_missing_ly'];
		
		
		$student = $row['student'];
		$class_total = $row['class_total'];
		$getmoney_85to91 = $row['getmoney_85to91'];
		$traffic_status = $row['traffic_status'];
		
		$laststudent = ($row['student_ly'] == "")?0:$row['student_ly'];      //去年學生數
		$last2student = ($row['student_l2y'] == "")?0:$row['student_l2y'];   //j-10407, 新增前年學生數
		
		$main_seq = $row['seq_no'];
		$keep = $row['keep'];                                                //j-10407

		
		$teacher_3years_total = $row['teacher_3years_total'];
		$teacher = $row['teacher'];
		$teacher_change = $row['teacher_change']; 
		$teacher_agent = $row['teacher_agent'];
		$teacher_change_rate = $row['teacher_change_rate'];
		$teacher_agent_rate = $row['teacher_agent_rate'];
		$teacher_change_in = $row['teacher_change_in'];
		$teacher_change_lack = $row['teacher_change_lack'];
		$teacher_change_other = $row['teacher_change_other']; 
				
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
		$lastyear_test = $row['lastyear_test'];
		$lastyear_pr25 = $row['lastyear_pr25'];
		
		$applied = $row['applied']; //已申請
		
		$a4_ly_money = ($row['a4_ly_money'] == '')?0:$row['a4_ly_money'];         //去(104)年補助4資料
		$a4_l2y_money = ($row['a4_l2y_money'] == '')?0:$row['a4_l2y_money'];      //j-10407, 新增-前(103)年補助4資料
		
		//補四，前三年補助金額，注意不是申請金額，是複審補助金額
		$money_last3 = ($row['a169'] == '')?0:$row['a169'];     //j-10407, 改成102年資料，原本是101年資料，($row['a5'] == '')?0:$row['a5'];
		$money_last2 =  $a4_l2y_money;                          //j-10407, 改成103年補四資料，原本是目前是102年資料
		$money_last =   $a4_ly_money;                           //j-10407, 改成104年補四資料

	}
	
	//交通狀況有多個，用逗號分開
	$traffic = explode(",", $traffic_status);
	
	//============================================================================================
	//指標計算
		
	//判斷是否符合指標1
	$per = $aboriginal / $student; //原住民 / 全校學生數
	//判斷是否符合指標1-1
	$p1_1 = ($per >= 0.4);
	//判斷是否符合指標1-2
	$p1_2 = ($area == '3' && $per >= 0.2);
	//判斷是否符合指標1-3
	$p1_3 = ($area == '4' && $per >= 0.15);
	//判斷是否符合指標1-4
	$p1_4 = ($aboriginal >= 35);

	//判斷是否符合指標2
	$per = $target_no_aboriginal / $student;
	//判斷是否符合指標2-1
	$p2_1 = ($per >= 0.2);
	//判斷是否符合指標2-2
	$p2_2 = ($target_no_aboriginal >= 60 );
	//判斷是否符合指標2-3
	$p2_3 = (($target_aboriginal / $student >= 0.3) && !( $p1_1 == '1' || $p1_2 == '1' || $p1_3 == '1'));

	//判斷是否符合指標3，任兩科待加強超過50%
	
	//j-10407,今年匯入的103年學測資料
	$count_p3 = 0;
	$count_p3 += ($chinese / ($student_exam-$chinese_missing) >= 0.5);
	$count_p3 += ($math / ($student_exam-$math_missing) >= 0.5);
	$count_p3 += ($english / ($student_exam-$english_missing) >= 0.5);
	$count_p3 += ($nature / ($student_exam-$nature_missing) >= 0.5);
	$count_p3 += ($social / ($student_exam-$social_missing) >= 0.5);
	
	$p3_1 = ($count_p3 >= 2);
	
	//j-10407,去年匯入的102年學測資料
	/*
	$count_p3_ly = 0;
	$count_p3_ly += ($chinese_ly / ($student_exam_ly-$chinese_missing_ly) >= 0.5);
	$count_p3_ly += ($math_ly / ($student_exam_ly-$math_missing_ly) >= 0.5);
	$count_p3_ly += ($english_ly / ($student_exam_ly-$english_missing_ly) >= 0.5);
	$count_p3_ly += ($nature_ly / ($student_exam_ly-$nature_missing_ly) >= 0.5);
	$count_p3_ly += ($social_ly / ($student_exam_ly-$social_missing_ly) >= 0.5);
	
	$p3_2 = ($count_p3_ly >= 2);  //j-10407,新增$p3_2以判斷去年學測資料
	*/

	//判斷是否符合指標4
	$per = $lastyear_leaving / $student;
	$p4_1 = ($per >= 0.03);

	//判斷是否符合指標5
	$p5_1 = 0;
	$p5_2 = 0;
	$p5_3 = 0;
	for($i = 0;$i < count($traffic);$i++)
	{
		switch($traffic[$i])
		{
			case "1":
				$p5_1 = 1;
				break;
				
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
		/*規則
		$p5_1 = ($traffic_status == 1);
		$p5_2 = ($traffic_status == 2 || $traffic_status == 3 || $traffic_status == 4 || $traffic_status == 5);
		$p5_3 = ($traffic_status == 6)*/
	}
	
    //j10407新增,將公車狀況納入指標五、補助六判定
	//$p5_2 = ( $bus_stop == '1' || $bus_stop == '2');
    //-----	

	//判斷是否符合指標6
	//流動率指標寫入
	$p6_1 = ($teacher_change_rate >= 30); //30%
	//代理率指標寫入
	$p6_2 = ($teacher_agent_rate >= 30);
	
	//============================================================================================
	//補助項目計算
	$a1 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p1_4==1 || $p2_1==1 || $p2_2==1 || $p4_1==1 || $p5_1==1 || $p5_2==1);
	$a2 = ($p2_3==1 || $p4_1==1 || $p5_1==1 || $p5_2==1);
	$a3_1 = ($p5_1==1 || $p5_2==1 || $p6_1==1 || $p6_2==1); //補3教師
	$a3_2 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p5_1==1 || $p5_2==1); //補3學生
	$a4 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p3_1==1 || $p5_1==1 || $p5_2==1); 
	$a5 = ($p1_1==1 || $p1_2==1 || $p1_3==1);
	$a6 = ($p5_1==1 || $p5_2==1 || $p5_3==1);
	$a7 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p2_1==1 || $p4_1==1 );
	
	$tips = "";
	//設定：若符合補助項目五可申請，則補助項目二不符合
	if ($a5 == 1)
	{
		$a2 = 0;
		$tips .= "※貴校可申請「發展原住民教育文化特色及充實設備器材」，不可同時申請「補助學校發展教育特色」。<br />";
	}
		
	//補助4 3年內申請過不能再申請
	if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0) 
	{
		$a4 = 0;
		$tips .= "※貴校三年內曾獲得「充實學校基本教學設備」，不可再次申請。<br />";
	}

	//設定：若未曾於85-91年度獲補助興建學校社區化活動場所，不得申請修繕經費
	if ($getmoney_85to91 != "Y")
	{
		$a7 = 0;
		$tips .= "※貴校未曾於85-91年度獲補助興建學校社區化活動場所，不得申請「整修學校社區化活動場所」。<br />";
	}
	
	//成功專案學校，不可申請所有補助
	if(in_array($username, $success_project_ary))
	{
		$a1 = 0;
		$a2 = 0;
		$a3_1 = 0;
		$a3_2 = 0;
		$a4 = 0;
		$a5 = 0;
		$a6 = 0;
		$a7 = 0;
		$tips = "※貴校因參與成功專案，所以不可申請教優區所有補助<br />";
	}

	//============================================================================================
	//上傳到資料庫
	$accord_point = "";
	$can_apply = "";
	
	$p_ary = array("p1_1", "p1_2", "p1_3", "p1_4", "p2_1", "p2_2", "p2_3", "p3_1", "p4_1", "p5_1", "p5_2", "p5_3", "p6_1", "p6_2");   //j-10407,新增$p3_2
	for($i = 0;$i < count($p_ary);$i++)
	{
		if(${$p_ary[$i]} == 1) //動態變數，取得$p1_1,$p1_2...等變數的值
			$accord_point .= ($accord_point == '')?$p_ary[$i]:",".$p_ary[$i];
		
	}
	
	$a_ary = array("a1", "a2", "a3_1", "a3_2", "a4", "a5", "a6", "a7");
	for($i = 0;$i < count($a_ary);$i++)
	{
		if(${$a_ary[$i]} == 1) //動態變數，取得$a1,$a2...等變數的值
			$can_apply .= ($can_apply == '')?$a_ary[$i]:",".$a_ary[$i]; //將可申請的項目串成字串用逗號隔開
		
	}
	
	$sql = " update schooldata_year set accord_point='$accord_point' ".
		   "                          , can_apply='$can_apply' ".
		   " where account='$username' and school_year = '$school_year' ";
		   
	mysql_query($sql);
	
	/*echo $accord_point;
	echo $can_apply;*/
	
	//$can_apply = "a1,a2,a4,a5,a6,a7";
	
	//把字串分割成array
	$accord_point_ary = explode(",", $accord_point); //符合的指標
	$can_apply_ary = explode(",", $can_apply); //可申請的補助
	$applied_ary = explode(",", $applied); //已申請的補助
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回主選單" onclick="location.href='../school_index.php'">
<? 

	include "../../function/button_print.php";

	if ($student == "" or $teacher == "" or $target_aboriginal == "")
	{
		echo '<br /><br /><font color=red size="+5">請先填寫學校資料。</font><br /><br />';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../school_index.php>';
	}
?>
<div id="print_content">
<p style='margin-left: 1em; text-indent: -1em'>

<b>※貴校符合指標：

<? if($keep == 1){ ;?>
</b><INPUT TYPE="button" VALUE="查看指標界定調查表" onclick="location.href='print_point_page.php'"><br /><br />
<? }else{ ;?>
</b><INPUT TYPE="button" VALUE="查看指標界定調查表" onclick="location.href='print_point_page_new.php'"><br /><br />
<? }; ?>

 <!-- 測試用  <? echo  "count_p3=".$count_p3.";   count_p3_ly=".$count_p3_ly.";   p3_1=".$p3_1.";   p3_2=".$p3_2.";   a4=".$a4  ?><br />
  <? echo  "104=".$money_last."--103=".$money_last2."--102=".$money_last3 ?><br />    -->
<?
	for($i = 0;$i < count($accord_point_ary);$i++)
	{
		switch($accord_point_ary[$i])
		{
			case "p1_1":
				echo '<b>指標一～（一）</b>：一般地區、都會地區、特偏及偏遠地區學校，原住民學生合計佔全校學生總數40％以上者。'.'<br />';
				break;

			case "p1_2":
				echo '<b>指標一～（二）</b>：一般地區學校，原住民學生合計佔全校學生總數20％以上者。'.'<br />';
				break;
				
			case "p1_3":
				echo '<b>指標一～（三）</b>：都會地區學校，原住民學生合計佔全校學生總數15％以上者。'.'<br />';
				break;
				
			case "p1_4":
				echo '<b>指標一～（四）</b>：全校學生中，原住民學生合計達35人以上者。'.'<br />';
				break;
				
			case "p2_1":
				echo '<b>指標二～（一）</b>：低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大、新移民子女等之學生合計人數，佔全校學生總數20％以上之學校。'.'<br />';
				break;
				
			case "p2_2":
				echo '<b>指標二～（二）</b>：低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大、新移民子女等學生人數合計達60人以上之學校。'.'<br />';
				break;
				
			case "p2_3":
				echo '<b>指標二～（三）</b>：原住民學生人數未符合指標一～(一)、一～(二)、一～(三)，但併入指標二之目標學生人數後，合計人數佔全校學生總數30%以上者。'.'<br />';
				break;
				
			case "p3_1":
				echo '<b>指標三</b>：該校'.($school_year-2).'學年參加國中教育會考成績列「待加強」之學生人數佔全校參加國中教育會考總人數比率達50％以上者。'.'<br />';
				break;
				
			case "p4_1":
				echo '<b>指標四</b>：該學年度經通報有案之中途輟學學生人數，佔當學年度在籍學生人數之3%以上者'.'<br />';
				break;
				
			case "p5_1":
				echo '<b>指標五～（一）</b>：離島以政府核定有案之各級離島為準【臺灣省政府80.6.21(80)府人四字第72694號函頒布】。<br />';
				break;
				
			case "p5_2":
				echo '<b>指標五～（二）</b>：偏遠交通不便學校係指經地方政府核定有案特偏、偏遠地區學校，且符合指標界定五～（二）子項目任一條件者。<br />';
				break;
				
			case "p5_3":
				echo '<b>指標五～（三）</b>：91學年度(91年8月1日)以前，因裁併校後，學區幅員遼闊須交通車接送學生上下學之學校。<br />';
				break;
				
			case "p6_1":
				echo '<b>指標六～（一）</b>：學校最近三學年度教師(含實缺代理)流動率，平均在30％以上。'.'<br />';
				break;
				
			case "p6_2":
				echo '<b>指標六～（二）</b>：學校最近三學年度實缺教師代理比率平均在30％以上者。'.'<br />';
				break;			
				
			default:
				echo "";
				
		}
		
	}
	
?>
<p style='margin-left: 1em; text-indent: -1em'>
<b>※貴校可申請補助項目如下：</b>（依據填報資料自動列出可申請項目）<br />
<font color="red">
	<?=$tips;?>
</font>

<form name="form" method="post" action="school_select_allowance_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
請點選申請或不申請（必填、單選）<br />
<table border="1" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td style="width:50px;" align="center">申請&nbsp;</td>
		<td style="width:55px;" align="center">不申請&nbsp;</td>
		<td style="width:500px;">&nbsp;</td>
	</tr>
<?
	for($i = 0;$i < count($can_apply_ary);$i++)
	{
		switch($can_apply_ary[$i])
		{
			case "a1":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a1"  value="1" '.(in_array('a1',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a1"  value="0" '.(in_array('a1',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目一：推展親職教育活動</td>';
				echo '</tr>';
				break;
			
			case "a2":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a2"  value="1" '.(in_array('a2',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a2"  value="0" '.(in_array('a2',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目二：學校發展教育特色</td>';
				echo '</tr>';
				break;
			
			case "a3_1":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a3_1"  value="1" '.(in_array('a3_1',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a3_1"  value="0" '.(in_array('a3_1',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目三：修繕離島或偏遠地區教師宿舍</td>';
				echo '</tr>';
				break;
			
			case "a3_2":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a3_2"  value="1" '.(in_array('a3_2',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a3_2"  value="0" '.(in_array('a3_2',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目三：修繕離島或偏遠地區學生宿舍<br /></td>';
				echo '</tr>';
				break;
			
			case "a4":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a4"  value="1" '.(in_array('a4',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a4"  value="0" '.(in_array('a4',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目四：充實學校基本教學設備</td>';
				echo '</tr>';
				break;
			
			case "a5":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a5"  value="1" '.(in_array('a5',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a5"  value="0" '.(in_array('a5',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目五：發展原住民教育文化特色及充實設備器材</td>';
				echo '</tr>';
				break;
			
			case "a6":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a6"  value="1" '.(in_array('a6',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a6"  value="0" '.(in_array('a6',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目六：交通不便地區學校交通車</td>';
				echo '</tr>';
				break;
			
			case "a7":
				echo '<tr>';
				echo '<td align="center"><input type="radio" name="a7"  value="1" '.(in_array('a7',$applied_ary)?'checked':'').' /></td>';
				echo '<td align="center"><input type="radio" name="a7"  value="0" '.(in_array('a7',$applied_ary)?'':'checked').' /></td>';
				echo '<td>補助項目七：整修學校社區化活動場所</td>';
				echo '</tr>';
				break;
				
			default:
				echo "";
		}
	
	}
	
?>
</table>
<p>
<font color=blue>註：若同時符合補助項目三、四、六、七，最多可申請其中兩項</font>
<p>
</div>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="button" value="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" >

<script language="JavaScript">
	
	function toCheck() 
	{
		var check3467, a3, a4, a6, a7;
		check3467 = 0;
		a3 = 0;
		a4 = 0;
		a6 = 0;
		a7 = 0;
		
		if(document.getElementsByName("a3_1")[0] != undefined)
		{
			if(document.getElementsByName("a3_1")[0].checked == true)
				a3 = 1;
		}
		
		if(document.getElementsByName("a3_2")[0] != undefined)
		{
			if(document.getElementsByName("a3_2")[0].checked == true)
				a3 = 1;
		}	
		
		if(document.getElementsByName("a4")[0] != undefined)
		{
			if(document.getElementsByName("a4")[0].checked == true)
				a4 = 1;
		}

		if(document.getElementsByName("a6")[0] != undefined)
		{
			if(document.getElementsByName("a6")[0].checked == true)
				a6 = 1;
		}
		
		if(document.getElementsByName("a7")[0] != undefined)
		{
			if(document.getElementsByName("a7")[0].checked == true)
				a7 = 1;
		}
		
		check3467 = a3 + a4 + a6 +a7;
		
		if (check3467 > 2) 
		{
			alert("硬體項目（補助項目三、四、六、七）最多可申請兩項！");
			return false;
		}
		
		return true;
	}
</script>

</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

