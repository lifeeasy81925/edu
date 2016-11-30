<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$school_year = 103; //為學年度
	
	$username = $_GET['id'];
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , sd102.a100 ".
		   "      , sd102.a135, sd102.a138, sd102.a141, sd102.a144 ". //101年編制、調入、實缺、其他
		   "      , sd102.a060, sd102.a137, sd102.a140, sd102.a143 ". //100年編制、調入、實缺、其他
		   "      , sd102.a113 ". //去年原住民
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
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
		
		$student = $row['student'];
		$class_total = $row['class_total'];
		$getmoney_85to91 = $row['getmoney_85to91'];
		$traffic_status = $row['traffic_status'];
		$laststudent = $row['a100']; //去年學生數
		
		$teacher_3years_total = $row['teacher_3years_total'];
		$teacher = $row['teacher'];
		$teacher_change_total = $row['teacher_change_total']; //三年合計
		$teacher_agent_total = $row['teacher_agent_total']; //三年合計
		$teacher_change_rate = $row['teacher_change_rate'];
		$teacher_agent_rate = $row['teacher_agent_rate'];
		$teacher_change_in = $row['teacher_change_in'];
		$teacher_change_lack = $row['teacher_change_lack'];
		$teacher_change_other = $row['teacher_change_other']; 
		$teacher_change = $teacher_change_in + $teacher_change_lack; //異動人數 調入+實缺
		$teacher_agent = $teacher_change_lack + $teacher_change_other; //代理人數 實缺+其他
		
		$teacher_last = $row['a135']; //去年教師編制
		$teacher_change_in_last = $row['teacher_change_in_last'];
		$teacher_change_lack_last = $row['teacher_change_lack_last'];
		$teacher_change_other_last = $row['teacher_change_other_last']; 
		$teacher_change_last = $teacher_change_in_last + $teacher_change_lack_last; //異動人數 調入+實缺
		$teacher_agent_last = $teacher_change_lack_last + $teacher_change_other_last; //代理人數 實缺+其他
		
		$teacher_last2 = $row['a060']; //前年教師編制
		$teacher_change_in_last2 = $row['a137'];
		$teacher_change_lack_last2 = $row['a140'];
		$teacher_change_other_last2 = $row['a143']; 
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
		$lastyear_test = $row['lastyear_test'];
		$lastyear_pr25 = $row['lastyear_pr25'];
		
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

	//判斷是否符合指標3
	$per = $lastyear_pr25 / $lastyear_test;
	$p3_1 = ($per >= 0.4);

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
	//設定：若符合補助項目五可申請，則補助項目二不符合
	if ($a5 == 1)
		$a2 = 0;

	// 設定：若未曾於85-91年度獲補助興建學校社區化活動場所，不得申請修繕經費
	if ($getmoney_85to91 == "Y")
		$a7 = 0;

?>
<div id="print_content">
<div style="font-family:標楷體;font-size:20px;text-align:left"><strong>教育部<?=$school_year;?>年度教育優先區指標界定調查紀錄表─<? echo $cityname.$district.$schoolname; ?></strong></div>
<table border="1" cellspacing="0" cellpadding="0" align="left" style="font-family:標楷體; width:950px">
	<tr>
		<td width="50" height="30" nowrap="nowrap"><p align="center">項次 </p></td>
		<td height="30" colspan="3" nowrap="nowrap"><p align="center">指標界定學校相關資料 </p></td>
		<td width="100" height="30" nowrap="nowrap"><p align="center">數量／內容 </p></td>
		<td width="100%" height="30" nowrap="nowrap"><p align="center">符合指標 </p></td>
	</tr>
	<tr>
		<td height="30" rowspan="7"><p align="center">一 </p></td>
		<td width="150" height="30" rowspan="7" nowrap="nowrap"><p>學校基本資料 </p></td>
		<td height="30" colspan="2"><p>學校所處地區 </p></td>
		<td height="30" nowrap="nowrap">
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
		?></td>
		<td height="30" rowspan="7" align="left" nowrap="nowrap"><p align="left">&nbsp;</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>全校班級數</p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $class_total; ?>(班)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>全校學生總人數</p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $student; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>教師編制人數<?=($school_year-3)?>學年</p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $teacher_last2; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>教師編制人數<?=($school_year-2)?>學年</p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $teacher_last; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2">教師編制人數<?=($school_year-1)?>學年</td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $teacher; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p align="left">85~91年度是否曾獲本計畫補助興建學校社區化活動場所經費</p></td>
		<td height="30" nowrap="nowrap"><?=(($getmoney_85to91 == "N")?"未受補助":"曾受補助");?></td>
	</tr>
	<tr>
		<td height="30" rowspan="2" nowrap="nowrap"><p align="center">二 </p></td>
		<td height="30" rowspan="2" nowrap="nowrap"><p>指標一：<br />原住民學生比例偏高之學校</p></td>
		<td height="30" colspan="2"><p>原住民學生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $aboriginal; ?>(人)</p></td>
		<td height="30" rowspan="2" align="left" nowrap="nowrap">
		<p align="left">
		<?
			echo ($p1_1 == 1)?'符合指標一～（一）'.'<br />':'';
			echo ($p1_2 == 1)?'符合指標一～（二）'.'<br />':'';
			echo ($p1_3 == 1)?'符合指標一～（三）'.'<br />':'';
			echo ($p1_4 == 1)?'符合指標一～（四）'.'<br />':'';
		?>&nbsp;
		</p>
		</td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>佔全校學生比率 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo number_format($aboriginal/$student*100,2); ?>(％)</p></td>
	</tr>
	<tr>
		<td height="30" rowspan="9" nowrap="nowrap"><p align="center">三 </p></td>
		<td height="30" rowspan="9" nowrap="nowrap"><p>指標二：<br />目標學生比例偏高之學校</p></td>
		<td height="30" colspan="2"><p>低收入戶子女學生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $low_income; ?>(人)</p></td>
		<td height="30" rowspan="9" align="left" nowrap="nowrap">
		<p align="left">
		<?
			echo ($p2_1 == 1)?'符合指標二～（一）'.'<br />':'';
			echo ($p2_2 == 1)?'符合指標二～（二）'.'<br />':'';
			echo ($p2_3 == 1)?'符合指標二～（三）'.'<br />':'';
		?>&nbsp;
		</p></td>
		</tr>
	<tr>
		<td height="30" colspan="2"><p>隔代教養學生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $grandparenting; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>親子年齡差距45歲以上學生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $over45years; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>新移民子女學生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $immigrant; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>單(寄)親家庭學生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $single_parent; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2">目標學生人數 (不含僅原住民)</td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $target_no_aboriginal; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>目標學生人數 (含原住民)</p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $target_aboriginal; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2">目標學生(不含僅原住民)佔全校學生比率 </td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo number_format($target_no_aboriginal/$student*100,2); ?>(％)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>目標學生(含原住民)佔全校學生比率 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo number_format($target_aboriginal/$student*100,2); ?>(％)</p></td>
	</tr>
	<tr>
		<td height="30" rowspan="3" nowrap="nowrap"><p align="center">四 </p></td>
		<td height="30" rowspan="3" nowrap="nowrap"><p>指標三：<br />國中學習弱勢學生比例偏高之學校</p></td>
		<td height="30" colspan="2"><p><?=($school_year-2)?>學年度國中畢業生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $lastyear_graduate; ?>(人)</p></td>
		<td height="30" rowspan="3" align="left" nowrap="nowrap">
		<p align="left">
		<?
			echo ($p3_1 == 1)?'符合指標三'.'<br />':'';
		?>&nbsp;
		</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>第一次國中學測成績PR值≦25人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $lastyear_pr25; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>第一次學測成績PR值≦25人數佔參加學生人數比例 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo number_format($lastyear_pr25/$lastyear_test*100,2); ?>(％)</p></td>
	</tr>
	<tr>
		<td height="30" rowspan="3" nowrap="nowrap"><p align="center">五 </p></td>
		<td height="30" rowspan="3" nowrap="nowrap"><p>指標四：<br />中途輟學率偏高之學校</p></td>
		<td height="30" colspan="2"><p><?=($school_year-2)."學年(".($school_year-2)."/9/1至".($school_year-1)."/6/30)中途輟學學生人數"?></p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $lastyear_leaving; ?>(人)</p></td>
		<td height="30" rowspan="3" align="left" nowrap="nowrap">
		<p align="left">
		<?
			echo ($p4_1 == 1)?'符合指標四'.'<br />':'';
		?>&nbsp;
		</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p><?=($school_year-2)?>學年在籍學生人數 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo $laststudent; ?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" colspan="2"><p>中輟生佔全校學生百分比 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><? echo number_format($lastyear_leaving/$laststudent*100,2); ?>(％)</p></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap"><p align="center">六 </p></td>
		<td height="30" nowrap="nowrap"><p>指標五：<br />離島或偏遠交通不便之學校</p></td>
		<td height="30" colspan="2"><p>學校所在地區交通狀況</p></td>
		<td height="30">
		<p align="left">
		<?
			for($i = 0;$i < count($traffic);$i++)
			{
				echo ($i+1).".";
				switch($traffic[$i])
				{
					case "0":
						echo '無特殊交通狀況。'.'<br />';
						break;
					case "1":
						echo "離島。".'<br />';
						break;
					case "2":
						echo "學校所在地區無公共交通工具到達。".'<br />';
						break;
					case "3":
						echo "學校距離站牌達5公里以上。".'<br />';
						break;
					case "4":
						echo "學區內之社區距離學校5公里以上，且無公共交通工具可以達學校。".'<br />';
						break;
					case "5":
						echo "公共交通工具到學校所在地區每天少於4班次。".'<br />';
						break;
					case "6":
						echo "91學年度以前，因裁併校後學區幅員遼闊須交通車接送學生上下學。".'<br />';
						break;
				}
				
			}
		?>
		</p></td>
		<td height="30" align="left" nowrap="nowrap">
		<p>
		<?
			echo ($p5_1 == 1)?'符合指標五～（一）'.'<br />':'';
			echo ($p5_2 == 1)?'符合指標五～（二）'.'<br />':'';
			echo ($p5_3 == 1)?'符合指標五～（三）'.'<br />':'';
		?>&nbsp;
		</p>
		</td>
	</tr>
	<tr>
		<td height="30" rowspan="9" nowrap="nowrap"><p align="center">七 </p></td>
		<td height="30" rowspan="9" nowrap="nowrap"><p>指標六：<br />教師流動率及代理比例偏高之學校</p></td>
		<td height="30" colspan="2"><p><?=($school_year-3);?>至<?=($school_year-1);?>學年教師編制人數</p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_3years_total;?>(人)</p></td>
		<td height="30" rowspan="9" align="left" nowrap="nowrap">
		<p align="left">
		<?
			echo ($p6_1 == 1)?'符合指標六～（一）'.'<br />':'';
			echo ($p6_2 == 1)?'符合指標六～（二）'.'<br />':'';
		?>&nbsp;
		</p></td>
	</tr>
	<tr>
		<td height="30" rowspan="4" nowrap="nowrap"><p align="center">教師異動人數 </p></td>
		<td height="30" nowrap="nowrap"><p>教師異動人數<?=($school_year-3);?>學年度 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_change_last2?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap"><p>教師異動人數<?=($school_year-2);?>學年度 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_change_last?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap"><p>教師異動人數<?=($school_year-1);?>學年度 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_change?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap"><p>教師異動人數<?=($school_year-3);?>至<?=($school_year-1);?>學年合計 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_change_total;?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" rowspan="4" nowrap="nowrap"><p align="center">代理教師人數 </p></td>
		<td height="30" nowrap="nowrap"><p>教師代理人數<?=($school_year-3);?>學年度 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_agent_last2?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap"><p>教師代理人數<?=($school_year-2);?>學年度 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_agent_last?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap"><p>教師代理人數<?=($school_year-1);?>學年度 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_agent?>(人)</p></td>
	</tr>
	<tr>
		<td height="30" nowrap="nowrap"><p>教師代理人數<?=($school_year-3);?>至<?=($school_year-1);?>學年合計 </p></td>
		<td height="30" nowrap="nowrap"><p align="right"><?=$teacher_agent_total;?>(人)</p></td>
	</tr>
</table>
<input type="hidden" name="school_year" value="<?=$school_year;?>">
</div>
<p>

