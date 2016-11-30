<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";

	include "../../function/config_for_104.php"; //本年度基本設定
	//echo "<br />根目錄：".$_SERVER['DOCUMENT_ROOT'];
	
	//新學年度一開始沒資料，在進網頁的時候先新增
	$cnt_sql = " SELECT account FROM schooldata_year where account = '$username' and school_year = '$school_year' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) //沒資料
	{
		$insert_sql = "insert into schooldata_year (account, school_year) ".
					  "                     values ('$username', '$school_year') ";
		mysql_query($insert_sql);
	}
	
	//新學年度一開始沒資料，在進網頁的時候先新增
	$cnt_sql3 = " SELECT account FROM school_location where account = '$username' ";
	$result3 = mysql_query($cnt_sql3);
	$num_rows3 = mysql_num_rows($result3);
	if($num_rows3 == 0) //沒資料
	{
		$insert_sql3 = "insert into school_location (account) ".
					  "                     values ('$username') ";
		mysql_query($insert_sql3);
	}
	
	//ly = last year
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area ".
		   
		   " 	  , sy.student, sy.class_total, sy.class_grade1, sy.class_grade2, sy.class_grade3, sy.class_grade4 ".
		   " 	  , sy.class_grade5, sy.class_grade6, sy.class_special, sd.getmoney_85to91, sy.lastyear_graduate ".
		   " 	  , sd.traffic_status, sy.page1_warning, sy.page1_desc ".
		   
		   "      , sy_ly.student as student_ly ".
		   
		   //考試成績
		   "	  , se.student_exam, se.chinese, se.math, se.english, se.nature, se.social ".
		   "	  , se.chinese_missing, se.math_missing, se.english_missing, se.nature_missing, se.social_missing ".
		   
		   //補三歷史資料
		   "      , sf101.a4 ". //101補4 助金額(101的補助4=現在的補助3)
		   "      , sd102.a168 ". //102補助3 金額
		   "      , a3_ly.edu_total_money as a3_ly_money ".
		   
		   //補四歷史資料
		   "      , sf101.a5 ". //101補助5 金額(101的補助5=現在的補助4)
		   "      , sd102.a169 ". //102補助4 金額
		   "      , a4_ly.edu_total_money as a4_ly_money ".
		   
		   //補六歷史資料(只算購買交通車的金額)
		   "      , sf101.a7_3 ". //101補助6 購置交通車金額(101的補助7=現在的補助6)
		   "      , a6_102.a200 ". //102補助6 購置交通車金額
		   "      , case when a6_ly.item = '購置交通車' then a6_ly.edu_total_money else 0 end as a6_ly_money ".
		   
		   //學校區域資料
		   "      , sl.high, sl.bonus, sl.bonus_name, sl.bonus_money ".
		   "      , sl.cityhall, sl.localoffice, sl.localoffice_name ".
		   "      , sl.nearest_localoffice, sl.nearest_localoffice_name, sl.bus_stop ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_examdata as se on sd.account = se.account and se.school_year = '$school_year' ". 
		   "                       left join school_location as sl on sd.account = sl.account ". 
		   
		   //去年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ". 
		   "                       left join $a3_table_name as a3_ly on sy_ly.seq_no = a3_ly.sy_seq ".
		   "                       left join $a4_table_name as a4_ly on sy_ly.seq_no = a4_ly.sy_seq ".
		   "                       left join $a6_table_name as a6_ly on sy_ly.seq_no = a6_ly.sy_seq ".
		   
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
		   "                       left join 101school_final as sf101 on sd.account = sf101.account ". //101school_final
		   "                       left join 102allowance6 as a6_102 on sd.account = a6_102.account ". //102allowance6 補六只有購置交通車才算所以不能從 102schooldata 抓
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
		$bonus_name = $row['bonus_name'];
		$bonus_money = $row['bonus_money'];
		$cityhall = $row['cityhall'];
		$localoffice_name = $row['localoffice_name'];
		$localoffice = $row['localoffice'];
		$nearest_localoffice_name = $row['nearest_localoffice_name'];
		$nearest_localoffice = $row['nearest_localoffice'];
		$bus_stop = $row['bus_stop'];
		
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
		$lastyear_graduate = $row['lastyear_graduate'];
		$traffic_status = $row['traffic_status'];
		$laststudent = ($row['student_ly'] == '')?0:$row['student_ly']; //去年學生數
		
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
		
		$a3_ly_money = ($row['a3_ly_money'] == '')?0:$row['a3_ly_money'];
		$a4_ly_money = ($row['a4_ly_money'] == '')?0:$row['a4_ly_money'];
		$a6_ly_money = ($row['a6_ly_money'] == '')?0:$row['a6_ly_money'];
		
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		/*= $row[''];*/
		
		//交通狀況有多個，用逗號分開
		$traffic = explode(",", $traffic_status);
				
		//補三，前五年補助金額，注意不是申請金額，是複審補助金額
		$money_last5 = 0; //目前沒資料
		$money_last4 = 0; //目前沒資料
		$money_last3 = ($row['a4'] == '')?0:$row['a4']; //目前沒資料
		$money_last2 = ($row['a168'] == '')?0:$row['a168'];
		$money_last = $a3_ly_money;
		
		$strmsg_a3 = "";
		//echo "<br />".$money_last5."/".$money_last4."/".$money_last3."/".$money_last2."/".$money_last."<br />";
		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0 || $money_last4 > 0 || $money_last5 > 0) 
		{
			$strmsg_a3 .= "※五年內曾獲本計畫補助修繕離島或偏遠地區師生宿舍：";
			$strmsg_a3 .= ($money_last > 0)?($school_year - 1)." 年度 <font color='red'>".$money_last."</font> 元。":"";
			$strmsg_a3 .= ($money_last2 > 0)?($school_year - 2)." 年度 <font color='red'>".$money_last2."</font> 元。":"";
			$strmsg_a3 .= ($money_last3 > 0)?($school_year - 3)." 年度 <font color='red'>".$money_last3."</font> 元。":"";
			$strmsg_a3 .= ($money_last4 > 0)?($school_year - 4)." 年度 <font color='red'>".$money_last4."</font> 元。":"";
			$strmsg_a3 .= ($money_last5 > 0)?($school_year - 5)." 年度 <font color='red'>".$money_last5."</font> 元。":"";
			$strmsg_a3 .= "<br />";
		}
		
		//補四，前三年補助金額，注意不是申請金額，是複審補助金額
		$money_last3 = ($row['a5'] == '')?0:$row['a5'];
		$money_last2 = ($row['a169'] == '')?0:$row['a169'];
		$money_last = $a4_ly_money;

		$strmsg_a4 = "";
		//echo "<br />".$money_last3 . "/" . $money_last2 . "/" .$money_last."<br />";
		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0) 
		{
			$strmsg_a4 .= "※三年內曾獲本計畫補助充實學校基本教學設備：";
			$strmsg_a4 .= ($money_last > 0)?($school_year - 1)." 年度 <font color='red'>".$money_last."</font> 元。":"";
			$strmsg_a4 .= ($money_last2 > 0)?($school_year - 2)." 年度 <font color='red'>".$money_last2."</font> 元。":"";
			$strmsg_a4 .= ($money_last3 > 0)?($school_year - 3)." 年度 <font color='red'>".$money_last3."</font> 元。":"";
			$strmsg_a4 .= "<br />";
		}
		
		//補六，前十年補助金額，注意不是申請金額，是複審補助金額
		$money_last3 = ($row['a7_3'] == '')?0:$row['a7_3'];
		$money_last2 = ($row['a200'] == '')?0:$row['a200'];
		$money_last = $a6_ly_money;

		$strmsg_a6 = "";
		//echo "<br />".$money_last3 . "/" . $money_last2 . "/" .$money_last."<br />";
		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0) 
		{
			$strmsg_a6 .= "※十年內曾獲本計畫補助購置交通車：";
			$strmsg_a6 .= ($money_last > 0)?($school_year - 1)." 年度 <font color='red'>".$money_last."</font> 元。":"";
			$strmsg_a6 .= ($money_last2 > 0)?($school_year - 2)." 年度 <font color='red'>".$money_last2."</font> 元。":"";
			$strmsg_a6 .= ($money_last3 > 0)?($school_year - 3)." 年度 <font color='red'>".$money_last3."</font> 元。":"";
			$strmsg_a6 .= "<br />";
		}
		
		$isSurvey_1 = "Y";
		//不顯示海拔等調查選項
		//金門縣、連江縣、澎湖縣及台東縣的蘭嶼鄉、綠島鄉、屏東縣琉球鄉之學校
		if($cityname == '金門縣' || $cityname == '連江縣' || $cityname == '澎湖縣' 
			|| ($cityname == '臺東縣' && ($district = '蘭嶼鄉' || $district = '綠島鄉'))  
			|| ($cityname == '屏東縣' && $district = '琉球鄉')  
			)
		{
			$isSurvey_1 = "N";
		}
		
		$isSurvey_2 = "Y";
		//如學校所在地係為 合併後行政區-不含鄉)中之區、鎮市學校者，無需調查距離最近之區市鎮公所
		$cnt_sql2 = " SELECT localoffice_name FROM school_localoffice_list where cityname = '$cityname' and district = '$district' ";
		$result2 = mysql_query($cnt_sql2);
		$num_rows2 = mysql_num_rows($result2);
		if($num_rows2 != 0) //有資料
		{
			$isSurvey_2 = "N";
		}
		
		if($username == "014558")
		{
			$laststudent = 1656;
		}
		
	}
	
?>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="location.href='../school_index.php'">

<form name="form" method="post" action="schooldata_1_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<div id="print_content">
<p>
<font color="blue"><strong>學校基本資料</strong></font>
<p>
<table border="0">
	<tr>
		<td>
			<table border="0">
				<tr>
					<td width="160px" nowrap="nowrap" style="text-align:right;">
						所在區域：
					</td>
					<td>
						<font color=blue>
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
									echo "無貴校所在區域資料，請聯繫教育局(處)承辦人更新資料，謝謝";
							}
						?>
						</font>
						<em><sub>(註1)</sub></em>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; text-align:right" nowrap="nowrap">
						所在地區交通狀況：
					</td>
					<td>
						<font color=blue>
						<?
							$str = "";
							for($i = 0;$i < count($traffic);$i++)
							{
								$str .= ($str != "")?"<br />":""; //已經有資料的情況下要換行
								//$str .= (i+1).". ";
								switch($traffic[$i])
								{
									case "0":
										$str .= '無特殊交通狀況';
										break;
									case "1":
										$str .= "離島";
										break;
									case "2":
										$str .= "學校所在地區無公共交通工具到達";
										break;
									case "3":
										$str .= "學校距離站牌達5公里以上";
										break;
									case "4":
										$str .= "學區內之社區距離學校5公里以上，且無公共交通工具可以達學校";
										break;
									case "5":
										$str .= "公共交通工具到學校所在地區每天少於4班次";
										break;
									case "6":
										$str .= "91學年度以前，因裁併校後學區幅員遼闊須交通車接送學生上下學";
										break;
								}
								
							}
							
							echo $str;
						?>
						</font>
						<em><sub>(註1)</sub></em>
					</td>
				</tr>
				<? if($isSurvey_1 == "N") { echo "<!--"; }?>
				<tr>
					<td style="vertical-align:top; text-align:right" nowrap="nowrap">
						海拔高度：
					</td>
					<td>
						<input type="text" size="6" name="high" value="<?=$high;?>" />公尺 <a href="/edu_dl/104/如何填寫海拔.pdf" target="_new">填寫海拔教學請點我</a>
					</td>
				</tr>
				<? if($isSurvey_1 == "N") { echo "-->"; }?>
				<tr>
					<td style="vertical-align:top; text-align:right" nowrap="nowrap">
						教職員有無地域加給：
					</td>
					<td>
						<select name="bonus" style="margin:0px; display:inline;" onChange="js:change_bonus(this);">
							<option ></option>
							<option <?=(($bonus == "有")?"selected":"");?> >有</option>
							<option <?=(($bonus == "無")?"selected":"");?> >無</option>
						</select> <a href="/edu_dl/104/各機關學校公教員工地域加給表.pdf" target="_new">查看地域加給表</a>
						<div id="divBonus" style="display:<?=(($bonus == "有")?"":"none");?>;">
							加給名稱<input type="text" size="20" name="bonus_name" value="<?=$bonus_name;?>" /><br />
							加給金額<input type="text" size="20" name="bonus_money" value="<?=$bonus_money;?>" />
						</div>
					</td>
				</tr>
				<? if($isSurvey_1 == "N") { echo "<!--"; }?>
				<tr>
					<td style="vertical-align:top; text-align:right" nowrap="nowrap">
						縣市政府：
					</td>
					<td>
						距離<input type="text" size="6" name="cityhall" value="<?=$cityhall;?>" />公里 <a href="/edu_dl/104/如何填寫距離.pdf" target="_new">填寫距離教學請點我</a>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; text-align:right" nowrap="nowrap">
						學校所在地公所：
					</td>
					<td>
						距離<font color="blue"><?=$district;?></font>公所
						<input type="text" size="6" name="localoffice" value="<?=$localoffice;?>" />公里(含鄉公所)
						<input type="hidden" name="localoffice_name" value="<?=$district;?>">
					</td>
				</tr>
				<? if($isSurvey_1 == "N") { echo "-->"; }?>
				<? if($isSurvey_1 == "N" || $isSurvey_2 == "N") { echo "<!--"; }?>
				<tr>
					<td style="vertical-align:top; text-align:right" nowrap="nowrap">
						最近之區(鎮市)公所：
					</td>
					<td>
						距離
						<select name='nearest_localoffice_name' id='nearest_localoffice_name' >
							<option></option>
							<?
								$sql = " select localoffice_name ".
									   
									   " from school_localoffice_list ".
									   " where cityname = '$cityname' ".
									   " order by localoffice_name ";
								
								//echo "<br />".$sql."<br />";
								$result = mysql_query($sql);
								while($row = mysql_fetch_array($result))
								{
									$list_localoffice_name = $row['localoffice_name'];
									$isSelected = ($list_localoffice_name == $nearest_localoffice_name)?"selected":"";
									echo "<option value='$list_localoffice_name' $isSelected>$list_localoffice_name</option>";
								}
							?>
						</select>
						<input type="text" size="6" name="nearest_localoffice" value="<?=$nearest_localoffice;?>" />公里(不含鄉公所)
					</td>
				</tr>
				<? if($isSurvey_1 == "N" || $isSurvey_2 == "N") { echo "-->"; }?>
				<tr>
					<td style="vertical-align:top; text-align:right" nowrap="nowrap">
						公共交通狀況：
					</td>
					<td>
						<input id="r1" type="radio" name="rdo_bus_stop" value="1" <?=($bus_stop == '1')?'checked':'';?> >
						1.距離學校校門五公里內無任何火車站或公共汽車站牌者<br />
						<input id="r2" type="radio" name="rdo_bus_stop" value="2" <?=($bus_stop == '2')?'checked':'';?> >
						2.距離學校校門五公里內，雖有火車站或公共汽車站牌<br />　　，但火車或公共汽車班次每天少於四班次者<br />
						<input id="r3" type="radio" name="rdo_bus_stop" value="3" <?=($bus_stop == '3')?'checked':'';?> >
						3.不符合上述兩項條件者
					</td>
				</tr>
			</table>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td width="200px" nowrap="nowrap" style="text-align:right;">
						<?=($school_year-2);?>學年度全校學生人數：
					</td>
					<td>
						<font color=blue><?=$laststudent;?></font> 人<em><sup>(註2)</sup></em>
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						<?=($school_year-1);?>學年度全校學生人數：
					</td>
					<td>
						<input type="text" size="6" name="student" value="<?=$student;?>" />人<font color=blue>(<?=($school_year-1);?>年9月30日在籍學生數為準)</font>
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						一年級：
					</td>
					<td>
						<input type="text" size="6" name="c1" value="<?=$c1;?>" onchange="js:count_class(this);">班
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						二年級：
					</td>
					<td>
						<input type="text" size="6" name="c2" value="<?=$c2;?>" onchange="js:count_class(this);">班
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						三年級：
					</td>
					<td>
						<input type="text" size="6" name="c3" value="<?=$c3;?>" onchange="js:count_class(this);">班
					</td>
				</tr>
				<? if ($schooltype == "國中") echo "<!--"; //國中沒有456?>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						四年級：
					</td>
					<td>
						<input type="text" size="6" name="c4" value="<?=$c4;?>" onchange="js:count_class(this);">班
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						五年級：
					</td>
					<td>
						<input type="text" size="6" name="c5" value="<?=$c5;?>" onchange="js:count_class(this);">班
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						六年級：
					</td>
					<td>
						<input type="text" size="6" name="c6" value="<?=$c6;?>" onchange="js:count_class(this);">班
					</td>
				</tr>
				<? if ($schooltype == "國中") echo "-->"; ?>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						集中式特殊班：
					</td>
					<td>
						<input type="text" size="6" name="cs" value="<?=$cs;?>" onchange="js:count_class(this);">班(不含資源班)
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" style="text-align:right;">
						全校班級數：
					</td>
					<td>
						<input type="text" size="6" name="class_total" value="<?=$class_total;?>" readonly="readonly" style="border:0px; text-align: left;" >班<font color="blue">(本列自動計算)</font>
					</td>
				</tr>
			</table>
			<p>
		</td>
	</tr>
	<tr>
		<td>
		</td>
	</tr>
</table>
<table border="0">
<? if ($schooltype == "國小") echo "<!--"; ?>
	<tr>
		<td nowrap="nowrap" >
			<?=($school_year-2);?>學年度國中三年級畢業生人數：<input type="text" size="6" name="lastyear_graduate" value="<?=$lastyear_graduate;?>">人</font><br />
			參加教育會考學生數： <font color=blue><?=$student_exam;?></font> 人<em><sub>(註3)</sub></em><br />
			國文科成績為待加強學生數： <font color=blue><?=$chinese;?></font> 人，缺考 <font color=blue><?=$chinese_missing;?></font> 人，待加強比例 <font color=blue><?=number_format($chinese/($student_exam-$chinese_missing)*100,2);?></font> %<br />
			英語科成績為待加強學生數： <font color=blue><?=$english;?></font> 人，缺考 <font color=blue><?=$english_missing;?></font> 人，待加強比例 <font color=blue><?=number_format($english/($student_exam-$english_missing)*100,2);?></font> %<br />
			數學科成績為待加強學生數： <font color=blue><?=$math;?></font> 人，缺考 <font color=blue><?=$math_missing;?></font> 人，待加強比例 <font color=blue><?=number_format($math/($student_exam-$math_missing)*100,2);?></font> %<br />
			社會科成績為待加強學生數： <font color=blue><?=$social;?></font> 人，缺考 <font color=blue><?=$social_missing;?></font> 人，待加強比例 <font color=blue><?=number_format($social/($student_exam-$social_missing)*100,2);?></font> %<br />
			自然科成績為待加強學生數： <font color=blue><?=$nature;?></font> 人，缺考 <font color=blue><?=$nature_missing;?></font> 人，待加強比例 <font color=blue><?=number_format($nature/($student_exam-$nature_missing)*100,2);?></font> %<br />
			
		</td>
	</tr>
<? if ($schooltype == "國小") echo "-->"; ?>
</table>
<p>
<!--0827新增以下二行-->
<p>
<?=$strmsg_a3;?>
<?=$strmsg_a4;?>
<?=$strmsg_a6;?>
※85~91年度是否曾獲本計畫補助興建學校社區化活動場所經費：<font color=blue><?=$getmoney_85to91;?></font> <em><sup>(註2)</sup></em>
<p>
<sup><em>註1：資料為縣市政府提供</em></sup><br />
<sup><em>註2：資料為貴校去年填報</em></sup><br />
<sup><em>註3：資料為心測中心提供</em></sup>
<!--
※div style display 屬性選項：none隱藏、空白顯示
javascript呼叫:
　　document.getElementById("alert").style.display="none";//隱藏
　　document.getElementById("alert").style.display="";//顯示
※當按下「儲存並到下一頁」按鈕，若a189有內容，但a147無內容，「警示：請填寫異動過大說明」
-->
<div id="alert" style="display:<? if($page1_desc=="") echo 'none';?>;">
	<table width="100%" border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center" style="background-color:#FC9">資料檢核警示訊息視窗</td>
		</tr>
		<tr>
			<td>
				<font color="#FF0000">警示訊息：<INPUT type="text" name="page1_warning" value="<?=$page1_warning;?>" style="border:0px; text-align: left;" readonly /></font><p>
				※若確定填寫無誤，請說明異動過大原因：(若未填寫，無法「儲存並到下一頁」)
				<textarea name="page1_desc" cols="70%" rows="3"><?=$page1_desc;?></textarea>
			</td>
		</tr>
	</table>
</div>
</div>
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<INPUT TYPE="button" VALUE="回上一頁" onClick="history.go(-1)">
<INPUT type="submit" name="button" onClick="js:return toCheck();" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">

	function toCheck() 
	{
		var flag = 1;
		var errmsg = "";
		
		if ( document.getElementsByName("high")[0].value == "" ) 
		{
			errmsg += "請填寫「學校高度」！\n";
			document.getElementsByName("high")[0].focus();
			flag = 0;
		}
		if ( document.getElementsByName("bonus")[0].value == "" ) 
		{
			errmsg += "請選擇「學校有無加給」！\n";
			document.getElementsByName("bonus")[0].focus();
			flag = 0;
		}
		if ( document.getElementsByName("bonus")[0].value == "有" ) 
		{
			if ( document.getElementsByName("bonus_name")[0].value == "" ) 
			{
				errmsg += "請填寫「加給名稱」！\n";
				document.getElementsByName("bonus_name")[0].focus();
				flag = 0;
			}
			if ( document.getElementsByName("bonus_money")[0].value == "" ) 
			{
				errmsg += "請填寫「加給金額」！\n";
				document.getElementsByName("bonus_money")[0].focus();
				flag = 0;
			}
		}
		if ( document.getElementsByName("cityhall")[0].value == "" ) 
		{
			errmsg += "請填寫「學校距離縣市政府距離」！\n";
			document.getElementsByName("cityhall")[0].focus();
			flag = 0;
		}
		if ( document.getElementsByName("localoffice")[0].value == "" ) 
		{
			errmsg += "請填寫「學校距離所在地公所距離」！\n";
			document.getElementsByName("localoffice")[0].focus();
			flag = 0;
		}
		if ( document.getElementsByName("cityhall")[0].value > 200) 
		{
			errmsg += "「學校距離縣市政府距離」超過200公里！\n";
			document.getElementsByName("cityhall")[0].focus();
			flag = 0;
		}
		if ( document.getElementsByName("localoffice")[0].value > 200 ) 
		{
			errmsg += "「學校距離所在地公所距離」超過200公里！\n";
			document.getElementsByName("localoffice")[0].focus();
			flag = 0;
		}

		if ( document.getElementsByName("student")[0].value == "" ) 
		{
			errmsg += "請填寫「全校學生人數」！\n";
			document.getElementsByName("student")[0].focus();
			flag = 0;
		}
		if ( document.form.c1.value == "" ) 
		{
			errmsg += "請填寫「一年級」班數！\n";
			document.form.c1.focus();
			flag = 0;
		}
		if ( document.form.c2.value == "" ) 
		{
			errmsg += "請填寫「二年級」班數！\n";
			document.form.c2.focus();
			flag = 0;
		}
		if ( document.form.c3.value == "" ) 
		{
			errmsg += "請填寫「三年級」班數！\n";
			document.form.c3.focus();
			flag = 0;
		}
		<? if ($schooltype == "國中") echo "/*"; ?>
		//國中沒有456
		if ( document.form.c4.value == "" ) 
		{
			errmsg += "請填寫「四年級」班數！\n";
			document.form.c4.focus();
			flag = 0;
		}
		if ( document.form.c5.value == "" ) 
		{
			errmsg += "請填寫「五年級」班數！\n";
			document.form.c5.focus();
			flag = 0;
		}
		if ( document.form.c6.value == "" ) 
		{
			errmsg += "請填寫「六年級」班數！\n";
			document.form.c6.focus();
			flag = 0;
		}			
		<? if ($schooltype == "國中") echo "*/"; ?>
		if ( document.form.cs.value == "" ) 
		{
			errmsg += "請填寫「特殊班」班數！\n";
			document.form.cs.focus();
			flag = 0;
		}	

		<? if ($schooltype == "國小") echo "/*"; ?>
		//登入者為國中才判斷
		if ( document.form.lastyear_graduate.value == "" ) 
		{
			errmsg += "請填寫「<?=($school_year-1);?>學年度國中三年級畢業生」人數\n";
			document.form.lastyear_graduate.focus();
			flag = 0;
		}	
		<? if ($schooltype == "國小") echo "*/"; ?>

		//驗證輸入的資料是否為數字
		var regex = /^[0-9]*$/;
		if (!(regex.test(document.form.student.value)))
		{
			errmsg += '「全校學生人數」班數須為正整數\n';
			document.form.student.focus();
			flag = 0;
		}
		
		var laststudent = <?=(($laststudent == "")?0:$laststudent);?>;
		<? if ($schooltype == "國小") echo "/*"; ?>
		//登入者為國中才判斷
		if (!(regex.test(document.form.lastyear_graduate.value)))
		{
			errmsg += '「<?=($school_year-1);?>學年度國中三年級畢業生」數須為正整數\n';
			document.form.lastyear_graduate.focus();
			flag = 0;
		}
		//國中三年級畢業生人數不得大於全校學生數
		if (parseInt(document.form.lastyear_graduate.value) > parseInt(laststudent))
		{
			errmsg += '「國中三年級畢業生人數」不得大於「全校學生數」\n';
			flag = 0;
		}
		<? if ($schooltype == "國小") echo "*/"; ?>
		
		// 驗證今年總人數與去年總人數誤差(±20%)
		var laststudent_min;
		var laststudent_max;
		laststudent_min = parseInt(parseInt(laststudent,10) * 0.8,10);
		laststudent_max = parseInt(parseInt(laststudent,10) * 1.2,10);
		if (document.form.student.value < laststudent_min || document.form.student.value > laststudent_max)
		{
			if	(document.form.page1_desc.value == "")
			{
				document.getElementById("alert").style.display="";//顯示
				document.form.page1_warning.value = "請填寫異動過大說明"
				errmsg += '今年去年學生數比誤差超過±20%。\n';
				flag = 0;
			}
		}
		else
		{
			document.getElementById("alert").style.display="none";//隱藏
			document.form.page1_warning.value = "";
			document.form.page1_desc.value == "";	
		}

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
	
	function change_bonus(obj)
	{
		var selectName = obj.options[obj.selectedIndex].text;
		
		if(selectName == "有")
		{
			document.getElementById("divBonus").style.display = "";
		}
		else
		{
			document.getElementsByName("bonus_money")[0].value = "";
			document.getElementsByName("bonus_name")[0].value = "";
			document.getElementById("divBonus").style.display = "none";
		}
	}
	
	function count_class(obj)
	{	
		//驗證輸入的資料是否為數字
		var regex = /^[0-9]*$/;
		var i;
		var flag = 1;
		var total = 0;
		var schooltype = <?=(($schooltype == "國小")?"6":"3");?>;
		var arygrade = ["", "一", "二", "三", "四", "五", "六"];
		var errmsg = "";
		
		for(i = 1;i <= schooltype;i++)
		{
			c = document.getElementsByName('c' + i)[0]; //1~6年級
			
			if(c != null)
			{
				if (!(regex.test(c.value)) || c.value == "")
				{
					c.value = "";
					flag = 0;
					
					//只有當前填寫的欄位出現訊息
					if(obj.name == c.name)
						alert('「' + arygrade[i] + '年級」班數須為正整數，無請填0。');
				}
				else
				{
					total = parseInt(total) + parseInt(c.value);
				}
				
			}
		}
		
		c = document.getElementsByName('cs')[0]; //特殊班
		if (!(regex.test(c.value)) || c.value == "")
		{
			c.value = "";
			flag = 0;
			
			//只有當前填寫的欄位出現訊息
			if(obj.name == c.name)
				alert('「特殊班」班數須為正整數，無請填0。');
		}
		else
		{
			total = parseInt(total) + parseInt(c.value);
		}
		
		if(flag == 0)
			total = 0;
		
		document.getElementsByName('class_total')[0].value = total;
	}

</script>
<?php include "../../function/button_print.php"; ?>
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>