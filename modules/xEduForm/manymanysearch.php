<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
		
	$get_id = $_GET['acc'];
	
	if($get_id != "")
		$username = $get_id;
	
	//<!--可用色碼 FFCDFE	FFCDE5	FFCECD	FFE7CD	FEFFCD	E5FFCD	CDFFCE	CDFFE7	CDFEFF	CDE5FF	CECDFF	E7CDFF-->
	
	$inputSY = $_POST['inputSY']; //school_year
	$inputSN = $_POST['inputSN']; //schoolname
	
	//有選的縣市
	$cntCT = 0;
	$strCT = "";
	for($i = 1;$i <= 22;$i++)
	{
		${'inputCity_'.$i} = $_POST['inputCity_'.$i]; //inputCity_i
		//echo ${'inputCity_'.$i};
		if(${'inputCity_'.$i} != "")
		{
			$strCT .= (($strCT != "")?",":"")."'".${'inputCity_'.$i}."'"; //SQL要用的語法，格式'縣市','縣市','縣市','縣市'
			$cntCT++;
		}
	}
	//echo $strCT;
	
	$inputSD = $_POST['inputSD']; //schooldata
	
	//有選的補助
	for($i = 1;$i <= 7;$i++)
	{
		${'inputa'.$i} = $_POST['inputa'.$i]; //inputai
		//echo ${'inputa'.$i};
	}
	//設定顯示哪些東西
	$showSD = ($inputSD != '')?"Y":""; //基本資料
	$show_a1 = ($inputa1 != '')?"Y":"";; //a1
	$show_a2 = ($inputa2 != '')?"Y":"";; //a2
	$show_a3 = ($inputa3 != '')?"Y":"";; //a3
	$show_a4 = ($inputa4 != '')?"Y":"";; //a4
	$show_a5 = ($inputa5 != '')?"Y":"";; //a5
	$show_a6 = ($inputa6 != '')?"Y":"";; //a6
	$show_a7 = ($inputa7 != '')?"Y":"";; //a7
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>補助項目：一、推展親職教育活動</title>
<style>
.tr01 
{
	background-color: #E7CDFF;
}

.tr02
{
	background-color: #CDFFCE;
}

.tr03
{
	background-color: #7BB3FD;
}

.tr04
{
	background-color: #D2E9FF;
}

.tr05
{
	background-color: #E7FFD2;
}

</style>

</head>

<INPUT TYPE="button" VALUE="上一頁" onClick="location='education_index.php'"><p>
<!--<a href="manymanysearch.php">回到初始狀態(測試用)</a>-->
<form action="manymanysearch.php" method="post">
<table border="0" cellspacing="0" cellpadding="0">
	<tr class="tr01">
		<td width="500px" width="50px" align="center">查詢功能
		</td>
	</tr>
	<tr class="tr02">
		<td width="500px" align="left">
		年度：<Select id="inputSY" name="inputSY">
				<option value="103">103</option>
				<option value="104">104</option>
				<option value="105">105</option>
			</Select>
		</td>
	</tr>
	<tr class="tr02">
		<td width="500px" align="left">
		校名：<input type="text" size="20" name="inputSN" value="<?=$inputSN;?>" />(輸入校名or代碼)<br /></td>
	</tr>
	<tr class="tr02">
		<td width="500px" align="left">
		縣市：<br />
		<input type="checkbox" name="inputCity_1" id="city_1" value="基隆市" <?=($inputCity_1 != '')?"checked":"";?>/>基隆市
		<input type="checkbox" name="inputCity_2" id="city_2" value="新北市" <?=($inputCity_2 != '')?"checked":"";?>/>新北市
		<input type="checkbox" name="inputCity_3" id="city_3" value="臺北市" <?=($inputCity_3 != '')?"checked":"";?>/>臺北市
		<input type="checkbox" name="inputCity_4" id="city_4" value="桃園縣" <?=($inputCity_4 != '')?"checked":"";?>/>桃園縣
		<input type="checkbox" name="inputCity_5" id="city_5" value="新竹縣" <?=($inputCity_5 != '')?"checked":"";?>/>新竹縣
		<input type="checkbox" name="inputCity_6" id="city_6" value="新竹市" <?=($inputCity_6 != '')?"checked":"";?>/>新竹市
		<input type="checkbox" name="inputCity_7" id="city_7" value="苗栗縣" <?=($inputCity_7 != '')?"checked":"";?>/>苗栗縣
		<br />
		<input type="checkbox" name="inputCity_8" id="city_8" value="臺中市" <?=($inputCity_8 != '')?"checked":"";?>/>臺中市
		<input type="checkbox" name="inputCity_9" id="city_9" value="南投縣" <?=($inputCity_9 != '')?"checked":"";?>/>南投縣
		<input type="checkbox" name="inputCity_10" id="city_10" value="彰化縣" <?=($inputCity_10 != '')?"checked":"";?>/>彰化縣
		<input type="checkbox" name="inputCity_11" id="city_11" value="雲林縣" <?=($inputCity_11 != '')?"checked":"";?>/>雲林縣
		<input type="checkbox" name="inputCity_12" id="city_12" value="嘉義縣" <?=($inputCity_12 != '')?"checked":"";?>/>嘉義縣
		<input type="checkbox" name="inputCity_13" id="city_13" value="嘉義市" <?=($inputCity_13 != '')?"checked":"";?>/>嘉義市 
		<input type="checkbox" name="inputCity_14" id="city_14" value="臺南市" <?=($inputCity_14 != '')?"checked":"";?>/>臺南市
		<br />
		<input type="checkbox" name="inputCity_15" id="city_15" value="高雄市" <?=($inputCity_15 != '')?"checked":"";?>/>高雄市
		<input type="checkbox" name="inputCity_16" id="city_16" value="屏東縣" <?=($inputCity_16 != '')?"checked":"";?>/>屏東縣
		<input type="checkbox" name="inputCity_17" id="city_17" value="臺東縣" <?=($inputCity_17 != '')?"checked":"";?>/>臺東縣
		<input type="checkbox" name="inputCity_18" id="city_18" value="花蓮縣" <?=($inputCity_18 != '')?"checked":"";?>/>花蓮縣
		<input type="checkbox" name="inputCity_19" id="city_19" value="宜蘭縣" <?=($inputCity_19 != '')?"checked":"";?>/>宜蘭縣
		<input type="checkbox" name="inputCity_20" id="city_20" value="澎湖縣" <?=($inputCity_20 != '')?"checked":"";?>/>澎湖縣
		<input type="checkbox" name="inputCity_21" id="city_21" value="金門縣" <?=($inputCity_21 != '')?"checked":"";?>/>金門縣
		<br />
		<input type="checkbox" name="inputCity_22" id="city_22" value="連江縣" <?=($inputCity_22 != '')?"checked":"";?>/>連江縣
		<br />
		</td>
	</tr>
	<tr class="tr01">
		<td width="500px" width="50px" align="center">設定顯示欄位
		</td>
	</tr>
	<tr class="tr02">
		<td width="500px" align="left">
		<input type="checkbox" name="inputSD" value="bd" <?=($inputSD != '')?"checked":"";?>/>基本資料<br />
		<input type="checkbox" name="inputa1" value="a1" <?=($inputa1 != '')?"checked":"";?>/>補助一<br />
		<input type="checkbox" name="inputa2" value="a2" <?=($inputa2 != '')?"checked":"";?>/>補助二<br />
		<input type="checkbox" name="inputa3" value="a3" <?=($inputa3 != '')?"checked":"";?>/>補助三<br />
		<input type="checkbox" name="inputa4" value="a4" <?=($inputa4 != '')?"checked":"";?>/>補助四<br />
		<input type="checkbox" name="inputa5" value="a5" <?=($inputa5 != '')?"checked":"";?>/>補助五<br />
		<input type="checkbox" name="inputa6" value="a6" <?=($inputa6 != '')?"checked":"";?>/>補助六<br />
		<input type="checkbox" name="inputa7" value="a7" <?=($inputa7 != '')?"checked":"";?>/>補助七<br />
		</td>
	</tr>
	<tr class="tr05">
		<td width="500px" width="50px" align="center"><input type="submit" value="查詢">
		</td>
	</tr>
</table>
</form>
<p>
<table border="1" cellspacing="0" cellpadding="0">
	<tr class="tr03">
		<td rowspan="3" width="50px" height="30px" align="center" nowrap="nowrap">序號</td>
		<td rowspan="3" width="70px" align="center" nowrap="nowrap">學校代碼</td>
		<td rowspan="3" width="250px" align="center" nowrap="nowrap">校名</td>
		<td rowspan="3" width="40px" align="center" nowrap="nowrap">填寫計畫年度</td>
	<? if($showSD == "Y") { ?>
		<td rowspan="3" width="40px" align="center" nowrap="nowrap">班級數</td>
		<td rowspan="3" width="50px" align="center" nowrap="nowrap">學校所在地區</td>
		<td rowspan="3" width="50px" align="center" nowrap="nowrap">交通狀況</td>
		<td colspan="14" align="center" nowrap="nowrap">符合指標</td>
		<td rowspan="3" width="50px" align="center" nowrap="nowrap">全校學生數</td>
		<td colspan="7" align="center" nowrap="nowrap">目標學生</td>
		<td rowspan="3" width="50px" align="center" nowrap="nowrap">教師編制數</td>
		<td rowspan="3" width="50px" align="center" nowrap="nowrap">調入教師數</td>
		<td rowspan="3" width="50px" align="center" nowrap="nowrap">實缺教師數</td>
		<td rowspan="3" width="50px" align="center" nowrap="nowrap">其他教師數</td>
	<? } ?>
	<? if($show_a1 == "Y") { ?>
		<td colspan="9" align="center" nowrap="nowrap">補助一<br />推展親職教育活動</td>
	<? } ?>
	<? if($show_a2 == "Y") { ?>
		<td colspan="9" align="center" nowrap="nowrap">補助二<br />補助學校發展教育特色</td>
	<? } ?>
	<? if($show_a3 == "Y") { ?>
		<td colspan="9" align="center" nowrap="nowrap">補助三<br />修繕離島或偏遠地區師生宿舍</td>
	<? } ?>
	<? if($show_a4 == "Y") { ?>
		<td colspan="3" align="center" nowrap="nowrap">補助四<br />充實學校基本教學設備</td>
	<? } ?>
	<? if($show_a5 == "Y") { ?>
		<td colspan="9" align="center" nowrap="nowrap">補助五<br />發展原住民教育文化特色及充實設備器材</td>
	<? } ?>
	<? if($show_a6 == "Y") { ?>
		<td colspan="4" align="center" nowrap="nowrap">補助六<br />補助交通不便地區學校交通車</td>
	<? } ?>
	<? if($show_a7 == "Y") { ?>
		<td colspan="9" align="center" nowrap="nowrap">補助七<br />整修學校社區化活動場所</td>
	<? } ?>
		<td width="1px" align="center" nowrap="nowrap"></td>
	</tr>
	<tr class="tr03">
	<? if($showSD == "Y") { ?>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">1-1</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">1-2</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">1-3</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">1-4</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">2-1</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">2-2</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">2-3</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">3-1</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">4-1</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">5-1</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">5-2</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">5-3</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">6-1</td>
		<td rowspan="2" width="30px" align="center" nowrap="nowrap">6-2</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">低收入戶子女</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">隔代教養</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">親子年齡差距45歲以上</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">新移民子女</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">單寄親家庭</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">原住民</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">目標學生合計人數</td>
	<? } ?>
	<? if($show_a1 == "Y") { ?>
		<td colspan="3" align="center" nowrap="nowrap">申請金額</td><!-- 1 -->
		<td colspan="3" align="center" nowrap="nowrap">初審金額</td>
		<td colspan="3" align="center" nowrap="nowrap">複審金額</td>
	<? } ?>
	<? if($show_a2 == "Y") { ?>
		<td colspan="3" align="center" nowrap="nowrap">申請金額</td><!-- 2 -->
		<td colspan="3" align="center" nowrap="nowrap">初審金額</td>
		<td colspan="3" align="center" nowrap="nowrap">複審金額</td>
	<? } ?>
	<? if($show_a3 == "Y") { ?>
		<td colspan="3" align="center" nowrap="nowrap">申請金額</td><!-- 3 -->
		<td colspan="3" align="center" nowrap="nowrap">初審金額</td>
		<td colspan="3" align="center" nowrap="nowrap">複審金額</td>
	<? } ?>
	<? if($show_a4 == "Y") { ?>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">申請金額</td><!-- 4 -->
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">初審金額</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">複審金額</td>
	<? } ?>
	<? if($show_a5 == "Y") { ?>
		<td colspan="3" align="center" nowrap="nowrap">申請金額</td><!-- 5 -->
		<td colspan="3" align="center" nowrap="nowrap">初審金額</td>
		<td colspan="3" align="center" nowrap="nowrap">複審金額</td>
	<? } ?>
	<? if($show_a6 == "Y") { ?>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">申請項目</td><!-- 6 -->
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">申請金額</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">初審金額</td>
		<td rowspan="2" width="50px" align="center" nowrap="nowrap">複審金額</td>
	<? } ?>
	<? if($show_a7 == "Y") { ?>
		<td colspan="3" align="center" nowrap="nowrap">申請金額</td><!-- 7 -->
		<td colspan="3" align="center" nowrap="nowrap">初審金額</td>
		<td colspan="3" align="center" nowrap="nowrap">複審金額</td>
	<? } ?>
		<td width="1px" align="center" nowrap="nowrap"></td>
	</tr>
	<tr class="tr03">
	<? if($show_a1 == "Y") { ?>
		<td width="80px" align="center" nowrap="nowrap">親職講座</td><!-- 1 -->
		<td width="80px" align="center" nowrap="nowrap">家庭訪視</td>
		<td width="80px" align="center" nowrap="nowrap">合計</td>
		<td width="80px" align="center" nowrap="nowrap">親職講座</td>
		<td width="80px" align="center" nowrap="nowrap">家庭訪視</td>
		<td width="80px" align="center" nowrap="nowrap">合計</td>
		<td width="80px" align="center" nowrap="nowrap">親職講座</td>
		<td width="80px" align="center" nowrap="nowrap">家庭訪視</td>
		<td width="80px" align="center" nowrap="nowrap">合計</td>
	<? } ?>
	<? if($show_a2 == "Y") { ?>
		<td width="50px" align="center" nowrap="nowrap">特色一</td><!-- 2 -->
		<td width="50px" align="center" nowrap="nowrap">特色二</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">特色一</td>
		<td width="50px" align="center" nowrap="nowrap">特色二</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">特色一</td>
		<td width="50px" align="center" nowrap="nowrap">特色二</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
	<? } ?>
	<? if($show_a3 == "Y") { ?>
		<td width="50px" align="center" nowrap="nowrap">教師宿數</td><!-- 3 -->
		<td width="50px" align="center" nowrap="nowrap">學生宿舍</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">教師宿數</td>
		<td width="50px" align="center" nowrap="nowrap">學生宿舍</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">教師宿數</td>
		<td width="50px" align="center" nowrap="nowrap">學生宿舍</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
	<? } ?>
	<? if($show_a5 == "Y") { ?>
		<td width="50px" align="center" nowrap="nowrap">特色一</td><!-- 5 -->
		<td width="50px" align="center" nowrap="nowrap">特色二</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">特色一</td>
		<td width="50px" align="center" nowrap="nowrap">特色二</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">特色一</td>
		<td width="50px" align="center" nowrap="nowrap">特色二</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
	<? } ?>
	<? if($show_a7 == "Y") { ?>
		<td width="50px" align="center" nowrap="nowrap">修建</td><!-- 7 -->
		<td width="50px" align="center" nowrap="nowrap">設備</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">修建</td>
		<td width="50px" align="center" nowrap="nowrap">設備</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
		<td width="50px" align="center" nowrap="nowrap">修建</td>
		<td width="50px" align="center" nowrap="nowrap">設備</td>
		<td width="50px" align="center" nowrap="nowrap">合計</td>
	<? } ?>
		<td width="1px" align="center" nowrap="nowrap"></td>
	</tr>
<?
	
	//教育部核定金額
	$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ";
		   
	if($show_a1 == "Y")
	{
		$sql .=
			//補一資料
			"      , a1.s_total_money as a1_money ".
			"      , a1.s_p1_money as a1_s_p1_money, a1.s_p2_money as a1_s_p2_money ".
			//補一縣市資料
			"      , a1.city_total_money as a1_city_money ".
			"      , a1.city_p1_money as a1_city_p1_money, a1.city_p2_money as a1_city_p2_money ".
			"      , a1.city_desc as a1_city_desc ".
			//補一教育部資料
			"      , a1.edu_total_money as a1_edu_money ".
			"      , a1.edu_p1_money as a1_edu_p1_money, a1.edu_p2_money as a1_edu_p2_money ".
			"      , a1.edu_desc as a1_edu_desc ";
	}

	if($show_a2 == "Y")
	{
		$sql .=
			//補二資料
			"      , a2.p1_name as a2_p1_name, a2.p2_name as a2_p2_name ".
			"      , a2.s_total_money as a2_money ".
			"      , a2.s_p1_money as a2_s_p1_money, a2.s_p2_money as a2_s_p2_money ".
			"      , a2.s_p1_current_money as a2_s_p1_current_money ".
			"      , a2.s_p1_capital_money as a2_s_p1_capital_money ".
			"      , a2.s_p2_current_money as a2_s_p2_current_money ".
			"      , a2.s_p2_capital_money as a2_s_p2_capital_money ".
			//補二縣市資料
			"      , a2.city_total_money as a2_city_money ".
			"      , a2.city_p1_money as a2_city_p1_money, a2.city_p2_money as a2_city_p2_money ".
			"      , a2.city_p1_current_money as a2_city_p1_current_money ".
			"      , a2.city_p1_capital_money as a2_city_p1_capital_money ".
			"      , a2.city_p2_current_money as a2_city_p2_current_money ".
			"      , a2.city_p2_capital_money as a2_city_p2_capital_money ".
			"      , a2.city_desc as a2_city_desc, a2.city_desc_p2 as a2_city_desc_p2 ".
			//補二教育部資料
			"      , a2.edu_total_money as a2_edu_money ".
			"      , a2.edu_p1_money as a2_edu_p1_money, a2.edu_p2_money as a2_edu_p2_money ".
			"      , a2.edu_p1_current_money as a2_edu_p1_current_money ".
			"      , a2.edu_p1_capital_money as a2_edu_p1_capital_money ".
			"      , a2.edu_p2_current_money as a2_edu_p2_current_money ".
			"      , a2.edu_p2_capital_money as a2_edu_p2_capital_money ".
			"      , a2.edu_desc as a2_edu_desc, a2.edu_desc_p2 as a2_edu_desc_p2 ";
	}

	if($show_a3 == "Y")
	{
		$sql .=
			//補三資料
			"      , a3.s_total_money as a3_money ".
			"      , a3.s_p1_money as a3_s_p1_money, a3.s_p2_money as a3_s_p2_money ".
			"      , a3.s_p1_current_money as a3_s_p1_current_money ".
			"      , a3.s_p1_capital_money as a3_s_p1_capital_money ".
			"      , a3.s_p2_current_money as a3_s_p2_current_money ".
			"      , a3.s_p2_capital_money as a3_s_p2_capital_money ".
			//補三縣市資料
			"      , a3.city_total_money as a3_city_money ".
			"      , a3.city_p1_money as a3_city_p1_money, a3.city_p2_money as a3_city_p2_money ".
			"      , a3.city_p1_current_money as a3_city_p1_current_money ".
			"      , a3.city_p1_capital_money as a3_city_p1_capital_money ".
			"      , a3.city_p2_current_money as a3_city_p2_current_money ".
			"      , a3.city_p2_capital_money as a3_city_p2_capital_money ".
			"      , a3.city_desc as a3_city_desc ".
			//補三教育部資料
			"      , a3.edu_total_money as a3_edu_money ".
			"      , a3.edu_p1_money as a3_edu_p1_money, a3.edu_p2_money as a3_edu_p2_money ".
			"      , a3.edu_p1_current_money as a3_edu_p1_current_money ".
			"      , a3.edu_p1_capital_money as a3_edu_p1_capital_money ".
			"      , a3.edu_p2_current_money as a3_edu_p2_current_money ".
			"      , a3.edu_p2_capital_money as a3_edu_p2_capital_money ".
			"      , a3.edu_desc as a3_edu_desc ";
	}

	if($show_a4 == "Y")
	{
		$sql .=
			//補四資料
			"      , a4.s_total_money as a4_money ".
			"      , a4.s_p1_money as a4_s_p1_money ".
			"      , a4.s_p1_current_money as a4_s_p1_current_money ".
			"      , a4.s_p1_capital_money as a4_s_p1_capital_money ".
			//補四縣市資料
			"      , a4.city_total_money as a4_city_money ".
			"      , a4.city_p1_money as a4_city_p1_money ".
			"      , a4.city_p1_current_money as a4_city_p1_current_money ".
			"      , a4.city_p1_capital_money as a4_city_p1_capital_money ".
			"      , a4.city_desc as a4_city_desc ".
			//補四教育部資料
			"      , a4.edu_total_money as a4_edu_money ".
			"      , a4.edu_p1_money as a4_edu_p1_money ".
			"      , a4.edu_p1_current_money as a4_edu_p1_current_money ".
			"      , a4.edu_p1_capital_money as a4_edu_p1_capital_money ".
			"      , a4.edu_desc as a4_edu_desc ";
	}

	if($show_a5 == "Y")
	{
		$sql .=
			//補五資料
			"      , a5.s_total_money as a5_money ".
			"      , a5.p1_name as a5_p1_name, a5.p2_name as a5_p2_name ".
			"      , a5.s_p1_money as a5_s_p1_money, a5.s_p2_money as a5_s_p2_money ".
			"      , a5.s_p1_current_money as a5_s_p1_current_money ".
			"      , a5.s_p1_capital_money as a5_s_p1_capital_money ".
			"      , a5.s_p2_current_money as a5_s_p2_current_money ".
			"      , a5.s_p2_capital_money as a5_s_p2_capital_money ".
			//補五縣市資料
			"      , a5.city_total_money as a5_city_money ".
			"      , a5.city_p1_money as a5_city_p1_money, a5.city_p2_money as a5_city_p2_money ".
			"      , a5.city_p1_current_money as a5_city_p1_current_money ".
			"      , a5.city_p1_capital_money as a5_city_p1_capital_money ".
			"      , a5.city_p2_current_money as a5_city_p2_current_money ".
			"      , a5.city_p2_capital_money as a5_city_p2_capital_money ".
			"      , a5.city_desc as a5_city_desc, a5.city_desc_p2 as a5_city_desc_p2 ".
			//補五教育部資料
			"      , a5.edu_total_money as a5_edu_money ".
			"      , a5.edu_p1_money as a5_edu_p1_money, a5.edu_p2_money as a5_edu_p2_money ".
			"      , a5.edu_p1_current_money as a5_edu_p1_current_money ".
			"      , a5.edu_p1_capital_money as a5_edu_p1_capital_money ".
			"      , a5.edu_p2_current_money as a5_edu_p2_current_money ".
			"      , a5.edu_p2_capital_money as a5_edu_p2_capital_money ".
			"      , a5.edu_desc as a5_edu_desc, a5.edu_desc_p2 as a5_edu_desc_p2 ";
	}

	if($show_a6 == "Y")
	{
		$sql .=
			//補六資料
			"      , a6.s_total_money as a6_money ".
			"      , a6.s_money as a6_s_money ".
			//補六縣市資料
			"      , a6.city_total_money as a6_city_money, a6.item as a6_item ".
			"      , a6.city_desc as a6_city_desc ".
			//補六教育部資料
			"      , a6.edu_total_money as a6_edu_money, a6.item as a6_item ".
			"      , a6.edu_desc as a6_edu_desc ";
	}

	if($show_a7 == "Y")
	{
		$sql .=
			//補七資料
			"      , a7.s_total_money as a7_money ".
			"      , a7.s_p1_money as a7_s_p1_money ".
			"      , a7.s_p1_current_money as a7_s_p1_current_money ".
			"      , a7.s_p1_capital_money as a7_s_p1_capital_money ".
			//補七縣市資料
			"      , a7.city_total_money as a7_city_money ".
			"      , a7.city_p1_money as a7_city_p1_money ".
			"      , a7.city_p1_current_money as a7_city_p1_current_money ".
			"      , a7.city_p1_capital_money as a7_city_p1_capital_money ".
			"      , a7.city_desc as a7_city_desc ".
			//補七教育部資料
			"      , a7.edu_total_money as a7_edu_money ".
			"      , a7.edu_p1_money as a7_edu_p1_money ".
			"      , a7.edu_p1_current_money as a7_edu_p1_current_money ".
			"      , a7.edu_p1_capital_money as a7_edu_p1_capital_money ".
			"      , a7.edu_desc as a7_edu_desc ";
	}
	
	//from
	$sql .= " from schooldata_year as sy left join schooldata as sd on sd.account = sy.account ";
	
	//join
	$sql .= ($show_a1 == "Y")?" left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ":"";
	$sql .= ($show_a2 == "Y")?" left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ":"";
	$sql .= ($show_a3 == "Y")?" left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ":"";
	$sql .= ($show_a4 == "Y")?" left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ":"";
	$sql .= ($show_a5 == "Y")?" left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ":"";
	$sql .= ($show_a6 == "Y")?" left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ":"";
	$sql .= ($show_a7 == "Y")?" left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ":"";
	
	//where
	$sql .= " where ".
			
			//" and 0 ".
		   
		    //年度
		    " ((sd.enabled = 'Y' and sd.create_year <= $inputSY) or (sd.enabled = 'N' and sd.create_year <= $inputSY and sd.delete_year > $inputSY)) ".
		    " and sy.school_year = '$inputSY' ";
		   
	//校名
	$sql .= ($inputSN != "")?" and (sd.schoolname like '%$inputSN%' or sd.account like '%$inputSN%') ":"";
	
	//縣市
	$sql .= ($cntCT > 0)?" and sd.cityname in ($strCT) ":"";
		   
	//排序	   
	$sql .= " order by sd.cityname, sd.district, sd.account ";
	
		   
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['sd_account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		$getmoney_85to91 = $row['getmoney_85to91'];
		$traffic_status = $row['traffic_status'];
		
		$school_year = $row['school_year'];
		$main_seq = $row['seq_no']; //school_year的seq_no
		
		$student = $row['student'];
		$class_total = $row['class_total'];
		
		$teacher = $row['teacher'];
		$teacher_3years_total = $row['teacher_3years_total'];
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
		
		$accord_point = $row['accord_point'];
		
		//指標顯示
		$accord_point_ary = explode(",", $accord_point);
		$p1_1 = in_array('p1_1',$accord_point_ary)?"1":""; //1
		$p1_2 = in_array('p1_2',$accord_point_ary)?"1":""; //2
		$p1_3 = in_array('p1_3',$accord_point_ary)?"1":"";
		$p1_4 = in_array('p1_4',$accord_point_ary)?"1":"";
		$p2_1 = in_array('p2_1',$accord_point_ary)?"1":"";
		$p2_2 = in_array('p2_2',$accord_point_ary)?"1":"";
		$p2_3 = in_array('p2_3',$accord_point_ary)?"1":"";
		$p3_1 = in_array('p3_1',$accord_point_ary)?"1":"";
		$p4_1 = in_array('p4_1',$accord_point_ary)?"1":"";
		$p5_1 = in_array('p5_1',$accord_point_ary)?"1":"";
		$p5_2 = in_array('p5_2',$accord_point_ary)?"1":"";
		$p5_3 = in_array('p5_3',$accord_point_ary)?"1":"";
		$p6_1 = in_array('p6_1',$accord_point_ary)?"1":"";
		$p6_2 = in_array('p6_2',$accord_point_ary)?"1":""; //14
		
		//申請總金額
		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];
		$a7_money = ($row['a7_money'] == '')?0:$row['a7_money'];
		
		$a1_city_money = ($row['a1_city_money'] == '')?0:$row['a1_city_money'];
		$a2_city_money = ($row['a2_city_money'] == '')?0:$row['a2_city_money'];
		$a3_city_money = ($row['a3_city_money'] == '')?0:$row['a3_city_money'];
		$a4_city_money = ($row['a4_city_money'] == '')?0:$row['a4_city_money'];
		$a5_city_money = ($row['a5_city_money'] == '')?0:$row['a5_city_money'];
		$a6_city_money = ($row['a6_city_money'] == '')?0:$row['a6_city_money'];
		$a7_city_money = ($row['a7_city_money'] == '')?0:$row['a7_city_money'];
		
		$a1_edu_money = ($row['a1_edu_money'] == '')?0:$row['a1_edu_money'];
		$a2_edu_money = ($row['a2_edu_money'] == '')?0:$row['a2_edu_money'];
		$a3_edu_money = ($row['a3_edu_money'] == '')?0:$row['a3_edu_money'];
		$a4_edu_money = ($row['a4_edu_money'] == '')?0:$row['a4_edu_money'];
		$a5_edu_money = ($row['a5_edu_money'] == '')?0:$row['a5_edu_money'];
		$a6_edu_money = ($row['a6_edu_money'] == '')?0:$row['a6_edu_money'];
		$a7_edu_money = ($row['a7_edu_money'] == '')?0:$row['a7_edu_money'];
				
		//補一
		$a1_s_p1_money = ($row['a1_s_p1_money'] == '')?0:$row['a1_s_p1_money'];
		$a1_s_p2_money = ($row['a1_s_p2_money'] == '')?0:$row['a1_s_p2_money'];
		
		$a1_city_p1_money = ($row['a1_city_p1_money'] == '')?0:$row['a1_city_p1_money'];
		$a1_city_p2_money = ($row['a1_city_p2_money'] == '')?0:$row['a1_city_p2_money'];
		
		$a1_edu_p1_money = ($row['a1_edu_p1_money'] == '')?0:$row['a1_edu_p1_money'];
		$a1_edu_p2_money = ($row['a1_edu_p2_money'] == '')?0:$row['a1_edu_p2_money'];
		
		//補二		
		$a2_p1_name = $row['a2_p1_name'];
		$a2_p2_name = $row['a2_p2_name'];
		$a2_s_p1_money = ($row['a2_s_p1_money'] == '')?0:$row['a2_s_p1_money']; //NULL則填入0
		$a2_s_p1_current_money = ($row['a2_s_p1_current_money'] == '')?0:$row['a2_s_p1_current_money'];
		$a2_s_p1_capital_money = ($row['a2_s_p1_capital_money'] == '')?0:$row['a2_s_p1_capital_money'];
		$a2_s_p2_money = ($row['a2_s_p2_money'] == '')?0:$row['a2_s_p2_money'];
		$a2_s_p2_current_money = ($row['a2_s_p2_current_money'] == '')?0:$row['a2_s_p2_current_money'];
		$a2_s_p2_capital_money = ($row['a2_s_p2_capital_money'] == '')?0:$row['a2_s_p2_capital_money'];
				
		$a2_city_p1_money = ($row['a2_city_p1_money'] == '')?0:$row['a2_city_p1_money']; //NULL則填入0
		$a2_city_p1_current_money = ($row['a2_city_p1_current_money'] == '')?0:$row['a2_city_p1_current_money'];
		$a2_city_p1_capital_money = ($row['a2_city_p1_capital_money'] == '')?0:$row['a2_city_p1_capital_money'];
		$a2_city_p2_money = ($row['a2_city_p2_money'] == '')?0:$row['a2_city_p2_money'];
		$a2_city_p2_current_money = ($row['a2_city_p2_current_money'] == '')?0:$row['a2_city_p2_current_money'];
		$a2_city_p2_capital_money = ($row['a2_city_p2_capital_money'] == '')?0:$row['a2_city_p2_capital_money'];
						
		$a2_edu_p1_money = ($row['a2_edu_p1_money'] == '')?0:$row['a2_edu_p1_money']; //NULL則填入0
		$a2_edu_p1_current_money = ($row['a2_edu_p1_current_money'] == '')?0:$row['a2_edu_p1_current_money'];
		$a2_edu_p1_capital_money = ($row['a2_edu_p1_capital_money'] == '')?0:$row['a2_edu_p1_capital_money'];
		$a2_edu_p2_money = ($row['a2_edu_p2_money'] == '')?0:$row['a2_edu_p2_money'];
		$a2_edu_p2_current_money = ($row['a2_edu_p2_current_money'] == '')?0:$row['a2_edu_p2_current_money'];
		$a2_edu_p2_capital_money = ($row['a2_edu_p2_capital_money'] == '')?0:$row['a2_edu_p2_capital_money'];
				
		//補三
		$a3_s_p1_money = ($row['a3_s_p1_money'] == '')?0:$row['a3_s_p1_money']; //NULL則填入0
		$a3_s_p1_current_money = ($row['a3_s_p1_current_money'] == '')?0:$row['a3_s_p1_current_money'];
		$a3_s_p1_capital_money = ($row['a3_s_p1_capital_money'] == '')?0:$row['a3_s_p1_capital_money'];
		$a3_s_p2_money = ($row['a3_s_p2_money'] == '')?0:$row['a3_s_p2_money'];
		$a3_s_p2_current_money = ($row['a3_s_p2_current_money'] == '')?0:$row['a3_s_p2_current_money'];
		$a3_s_p2_capital_money = ($row['a3_s_p2_capital_money'] == '')?0:$row['a3_s_p2_capital_money'];
		
		$a3_city_p1_money = ($row['a3_city_p1_money'] == '')?0:$row['a3_city_p1_money']; //NULL則填入0
		$a3_city_p1_current_money = ($row['a3_city_p1_current_money'] == '')?0:$row['a3_city_p1_current_money'];
		$a3_city_p1_capital_money = ($row['a3_city_p1_capital_money'] == '')?0:$row['a3_city_p1_capital_money'];
		$a3_city_p2_money = ($row['a3_city_p2_money'] == '')?0:$row['a3_city_p2_money'];
		$a3_city_p2_current_money = ($row['a3_city_p2_current_money'] == '')?0:$row['a3_city_p2_current_money'];
		$a3_city_p2_capital_money = ($row['a3_city_p2_capital_money'] == '')?0:$row['a3_city_p2_capital_money'];

		$a3_edu_p1_money = ($row['a3_edu_p1_money'] == '')?0:$row['a3_edu_p1_money']; //NULL則填入0
		$a3_edu_p1_current_money = ($row['a3_edu_p1_current_money'] == '')?0:$row['a3_edu_p1_current_money'];
		$a3_edu_p1_capital_money = ($row['a3_edu_p1_capital_money'] == '')?0:$row['a3_edu_p1_capital_money'];
		$a3_edu_p2_money = ($row['a3_edu_p2_money'] == '')?0:$row['a3_edu_p2_money'];
		$a3_edu_p2_current_money = ($row['a3_edu_p2_current_money'] == '')?0:$row['a3_edu_p2_current_money'];
		$a3_edu_p2_capital_money = ($row['a3_edu_p2_capital_money'] == '')?0:$row['a3_edu_p2_capital_money'];

		//補四
		$a4_s_p1_money = ($row['a4_s_p1_money'] == '')?0:$row['a4_s_p1_money']; //NULL則填入0
		$a4_s_p1_current_money = ($row['a4_s_p1_current_money'] == '')?0:$row['a4_s_p1_current_money'];
		$a4_s_p1_capital_money = ($row['a4_s_p1_capital_money'] == '')?0:$row['a4_s_p1_capital_money'];

		$a4_city_p1_money = ($row['a4_city_p1_money'] == '')?0:$row['a4_city_p1_money']; //NULL則填入0
		$a4_city_p1_current_money = ($row['a4_city_p1_current_money'] == '')?0:$row['a4_city_p1_current_money'];
		$a4_city_p1_capital_money = ($row['a4_city_p1_capital_money'] == '')?0:$row['a4_city_p1_capital_money'];
		
		$a4_edu_p1_money = ($row['a4_edu_p1_money'] == '')?0:$row['a4_edu_p1_money']; //NULL則填入0
		$a4_edu_p1_current_money = ($row['a4_edu_p1_current_money'] == '')?0:$row['a4_edu_p1_current_money'];
		$a4_edu_p1_capital_money = ($row['a4_edu_p1_capital_money'] == '')?0:$row['a4_edu_p1_capital_money'];
		
		//補五
		$a5_p1_name = $row['a5_p1_name'];
		$a5_p2_name = $row['a5_p2_name'];
		$a5_s_p1_money = ($row['a5_s_p1_money'] == '')?0:$row['a5_s_p1_money']; //NULL則填入0
		$a5_s_p1_current_money = ($row['a5_s_p1_current_money'] == '')?0:$row['a5_s_p1_current_money'];
		$a5_s_p1_capital_money = ($row['a5_s_p1_capital_money'] == '')?0:$row['a5_s_p1_capital_money'];
		$a5_s_p2_money = ($row['a5_s_p2_money'] == '')?0:$row['a5_s_p2_money'];
		$a5_s_p2_current_money = ($row['a5_s_p2_current_money'] == '')?0:$row['a5_s_p2_current_money'];
		$a5_s_p2_capital_money = ($row['a5_s_p2_capital_money'] == '')?0:$row['a5_s_p2_capital_money'];
		
		$a5_city_p1_money = ($row['a5_city_p1_money'] == '')?0:$row['a5_city_p1_money']; //NULL則填入0
		$a5_city_p1_current_money = ($row['a5_city_p1_current_money'] == '')?0:$row['a5_city_p1_current_money'];
		$a5_city_p1_capital_money = ($row['a5_city_p1_capital_money'] == '')?0:$row['a5_city_p1_capital_money'];
		$a5_city_p2_money = ($row['a5_city_p2_money'] == '')?0:$row['a5_city_p2_money'];
		$a5_city_p2_current_money = ($row['a5_city_p2_current_money'] == '')?0:$row['a5_city_p2_current_money'];
		$a5_city_p2_capital_money = ($row['a5_city_p2_capital_money'] == '')?0:$row['a5_city_p2_capital_money'];

		$a5_edu_p1_money = ($row['a5_edu_p1_money'] == '')?0:$row['a5_edu_p1_money']; //NULL則填入0
		$a5_edu_p1_current_money = ($row['a5_edu_p1_current_money'] == '')?0:$row['a5_edu_p1_current_money'];
		$a5_edu_p1_capital_money = ($row['a5_edu_p1_capital_money'] == '')?0:$row['a5_edu_p1_capital_money'];
		$a5_edu_p2_money = ($row['a5_edu_p2_money'] == '')?0:$row['a5_edu_p2_money'];
		$a5_edu_p2_current_money = ($row['a5_edu_p2_current_money'] == '')?0:$row['a5_edu_p2_current_money'];
		$a5_edu_p2_capital_money = ($row['a5_edu_p2_capital_money'] == '')?0:$row['a5_edu_p2_capital_money'];
				
		//補六
		$a6_item = $row['a6_item'];
		$a6_s_money = ($row['a6_s_money'] == '')?0:$row['a6_s_money'];
		
		$a6_city_money = ($row['a6_city_money'] == '')?0:$row['a6_city_money'];
		
		$a6_edu_money = ($row['a6_edu_money'] == '')?0:$row['a6_edu_money'];
		
		//補七
		$a7_s_p1_money = ($row['a7_s_p1_money'] == '')?0:$row['a7_s_p1_money']; //NULL則填入0
		$a7_s_p1_current_money = ($row['a7_s_p1_current_money'] == '')?0:$row['a7_s_p1_current_money'];
		$a7_s_p1_capital_money = ($row['a7_s_p1_capital_money'] == '')?0:$row['a7_s_p1_capital_money'];
		
		$a7_city_p1_money = ($row['a7_city_p1_money'] == '')?0:$row['a7_city_p1_money']; //NULL則填入0
		$a7_city_p1_current_money = ($row['a7_city_p1_current_money'] == '')?0:$row['a7_city_p1_current_money'];
		$a7_city_p1_capital_money = ($row['a7_city_p1_capital_money'] == '')?0:$row['a7_city_p1_capital_money'];
		
		$a7_edu_p1_money = ($row['a7_edu_p1_money'] == '')?0:$row['a7_edu_p1_money']; //NULL則填入0
		$a7_edu_p1_current_money = ($row['a7_edu_p1_current_money'] == '')?0:$row['a7_edu_p1_current_money'];
		$a7_edu_p1_capital_money = ($row['a7_edu_p1_capital_money'] == '')?0:$row['a7_edu_p1_capital_money'];
		
		$serial++;
		$trColor = ($serial%2 == 0)?"tr04":"tr05";
		?>
		<tr class="<?=$trColor;?>">
			<td align="center"><?=$serial; //序號?></td>
			<td align="center"><?=$account; //帳號?></td>
			<td align="center"><?=$cityname.$district.$schoolname; //校名?></td>
			<td align="center"><?=$school_year; //填寫計畫年度?></td>
		<? if($showSD == "Y") { ?>
			<td align="center"><?=$class_total; //班級數?></td>
			<td align="center"><?=$area; //學校所在地區?></td>
			<td align="center"><?=$traffic_status; //交通狀況?></td>
			<td align="center"><?=$p1_1; //1-1?></td>
			<td align="center"><?=$p1_2; //1-2?></td>
			<td align="center"><?=$p1_3; //1-3?></td>
			<td align="center"><?=$p1_4; //1-4?></td>
			<td align="center"><?=$p2_1; //2-1?></td>
			<td align="center"><?=$p2_2; //2-2?></td>
			<td align="center"><?=$p2_3; //2-3?></td>
			<td align="center"><?=$p3_1; //3-1?></td>
			<td align="center"><?=$p4_1; //4-1?></td>
			<td align="center"><?=$p5_1; //5-1?></td>
			<td align="center"><?=$p5_2; //5-2?></td>
			<td align="center"><?=$p5_3; //5-3?></td>
			<td align="center"><?=$p6_1; //6-1?></td>
			<td align="center"><?=$p6_2; //6-2?></td>
			<td align="center"><?=$student; //全校學生數?></td>
			<td align="center"><?=$low_income; //低收入戶子女?></td>
			<td align="center"><?=$grandparenting; //隔代教養?></td>
			<td align="center"><?=$over45years; //親子年齡差距45歲以上?></td>
			<td align="center"><?=$immigrant; //新移民子女?></td>
			<td align="center"><?=$single_parent; //單寄親家庭?></td>
			<td align="center"><?=$aboriginal; //原住民?></td>
			<td align="center"><?=$target_aboriginal; //目標學生合計人數?></td>
			<td align="center"><?=$teacher; //教師編制數?></td>
			<td align="center"><?=$teacher_change_in; //調入教師數?></td>
			<td align="center"><?=$teacher_change_lack; //實缺教師數?></td>
			<td align="center"><?=$teacher_change_other; //其他教師數?></td>
		<? } ?>
		<? if($show_a1 == "Y") { ?>
			<td align="center"><?=$a1_s_p1_money; //親職講座申請金額?></td>
			<td align="center"><?=$a1_s_p2_money; //家庭訪視申請金額?></td>
			<td align="center"><?=$a1_money; //補助一申請金額?></td>
			<td align="center"><?=$a1_city_p1_money; //親職講座初審金額?></td>
			<td align="center"><?=$a1_city_p2_money; //家庭訪視初審金額?></td>
			<td align="center"><?=$a1_city_money; //補助一初審金額?></td>
			<td align="center"><?=$a1_edu_p1_money; //親職講座複審金額?></td>
			<td align="center"><?=$a1_edu_p2_money; //家庭訪視複審金額?></td>
			<td align="center"><?=$a1_edu_money; //補助一複審金額?></td>
		<? } ?>
		<? if($show_a2 == "Y") { ?>
			<td align="center"><?=$a2_s_p1_money; //補助二特色一申請金額?></td>
			<td align="center"><?=$a2_s_p2_money; //補助二特色二申請金額?></td>
			<td align="center"><?=$a2_money; //補助二申請金額?></td>
			<td align="center"><?=$a2_city_p1_money; //補助二特色一初審金額?></td>
			<td align="center"><?=$a2_city_p2_money; //補助二特色二初審金額?></td>
			<td align="center"><?=$a2_city_money; //補助二初審金額?></td>
			<td align="center"><?=$a2_edu_p1_money; //補助二特色一複審金額?></td>
			<td align="center"><?=$a2_edu_p2_money; //補助二特色二複審金額?></td>
			<td align="center"><?=$a2_edu_money; //補助二複審金額?></td>
		<? } ?>
		<? if($show_a3 == "Y") { ?>
			<td align="center"><?=$a3_s_p1_money; //補助三教師宿數申請金額?></td>
			<td align="center"><?=$a3_s_p2_money; //補助三學生宿舍申請金額?></td>
			<td align="center"><?=$a3_money; //補助三申請金額?></td>
			<td align="center"><?=$a3_city_p1_money; //補助三教師宿數初審金額?></td>
			<td align="center"><?=$a3_city_p2_money; //補助三學生宿舍初審金額?></td>
			<td align="center"><?=$a3_city_money; //補助三初審金額?></td>
			<td align="center"><?=$a3_edu_p1_money; //補助三教師宿數複審金額?></td>
			<td align="center"><?=$a3_edu_p2_money; //補助三學生宿舍複審金額?></td>
			<td align="center"><?=$a3_edu_money; //補助三複審金額?></td>
		<? } ?>
		<? if($show_a4 == "Y") { ?>
			<td align="center"><?=$a4_money; //補助四申請金額?></td>
			<td align="center"><?=$a4_city_money; //補助四初審金額?></td>
			<td align="center"><?=$a4_edu_money; //補助四複審金額?></td>
		<? } ?>
		<? if($show_a5 == "Y") { ?>
			<td align="center"><?=$a5_s_p1_money; //補助五特色一申請金額?></td>
			<td align="center"><?=$a5_s_p2_money; //補助五特色二申請金額?></td>
			<td align="center"><?=$a5_money; //補助五申請金額?></td>
			<td align="center"><?=$a5_city_p1_money; //補助五特色一初審金額?></td>
			<td align="center"><?=$a5_city_p2_money; //補助五特色二初審金額?></td>
			<td align="center"><?=$a5_city_money; //補助五初審金額?></td>
			<td align="center"><?=$a5_edu_p1_money; //補助五特色一複審金額?></td>
			<td align="center"><?=$a5_edu_p2_money; //補助五特色二複審金額?></td>
			<td align="center"><?=$a5_edu_money; //補助五複審金額?></td>
		<? } ?>
		<? if($show_a6 == "Y") { ?>
			<td align="center"><?=$a6_item; //補助六申請項目?></td>
			<td align="center"><?=$a6_money; //補助六申請金額?></td>
			<td align="center"><?=$a6_city_money; //補助六初審金額?></td>
			<td align="center"><?=$a6_edu_money; //補助六複審金額?></td>
		<? } ?>
		<? if($show_a7 == "Y") { ?>
			<td align="center"><?=$a7_s_p1_current_money; //補助七修建申請金額?></td>
			<td align="center"><?=$a7_s_p1_capital_money; //補助七設備申請金額?></td>
			<td align="center"><?=$a7_money; //補助七申請金額?></td>
			<td align="center"><?=$a7_city_p1_current_money; //補助七修建初審金額?></td>
			<td align="center"><?=$a7_city_p1_capital_money; //補助七設備初審金額?></td>
			<td align="center"><?=$a7_city_money; //補助七初審金額?></td>
			<td align="center"><?=$a7_edu_p1_current_money; //補助七修建複審金額?></td>
			<td align="center"><?=$a7_edu_p1_capital_money; //補助七設備複審金額?></td>
			<td align="center"><?=$a7_edu_money; //補助七複審金額?></td>
		<? } ?>
			<td align="center"></td>
		</tr>
		<?
	}

?>
</table>
