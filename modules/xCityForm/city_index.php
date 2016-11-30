<?php
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')){}
	
	include "../../mainfile.php";
	include "../../header.php";
	
	session_start();

	$username = $xoopsUser->getVar('uname');
	
	global $xoopsDB;
	
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	
	$result = $xoopsDB -> query($sql) or die($sql);
		
	while($row = mysql_fetch_row($result))
	{
		$cityid  = $row[0];  // ID
		$city    = $row[1];  // 縣市名稱
		$cityman = $row[2];  // 身分名稱
		$cityno  = $row[4];  // 縣市編號
	}
	
	echo $city . "教育局（處），" . $cityman . "，您好！歡迎使用本系統。";
?>

<p>
<hr>
<p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFE1A4;">
			<font size="+1">106年度 經費審查區</font>
		</td>
	</tr>
</table><p>

1. <img src="/edu/images/button/button02.png" align="absmiddle" height="35px" 
	 onmouseout="this.src='/edu/images/button/button02.png'"
	 onmouseover="this.src='/edu/images/button/button02_on.png'"
	 onclick="location.href='106/allowance_examine.php'"><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFE1A4;">
			<font size="+1">106年度 資料查詢區</font>
		</td>
	</tr>
</table><p>

<img src="/edu/images/view01.png" align="absmiddle"/> 2.學校指標、經費與檔案
<Select id="opt_106_1" name="opt_106_1" Size="1">
	<option value="106/print_school_finish_1.php">全部學校列表</option>
	<option value="106/print_school_finish_2.php">已填報完成學校</option>
	<option value="106/print_school_finish_3.php">未填報完成學校</option>
</Select>
<input Type="button" id="btn_106_1" name="btn_106_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_106_1').value"><p>
<img src="/edu/images/view01.png" align="absmiddle"/><a href="106/print_money_reexamined.php" target="_self"> 3.查詢被退件學校名單</a><p>


<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFE1A4;">
			<font size="+1">106年度 報表列印區</font>
		</td>
	</tr>
</table><p>

<img src="/edu/images/print.png" align="absmiddle"/><a href="106/print_total_school.php?y=106" target="_blank"> 4.補助項目經費彙整表（學校申請列表）</a><p>
<img src="/edu/images/print.png" align="absmiddle"/><a href="106/print_city_examine.php"       target="_blank"> 5.補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)</a><p>
<img src="/edu/images/print.png" align="absmiddle"/><a href="106/print_education_examine.php"  target="_blank"> 6.補助項目經費彙整表（教育部複審列表）</a><p>
<img src="/edu/images/print.png" align="absmiddle"/><a href="106/print_city_examine2.php"      target="_blank"> 7.指標界定調查結果彙整表 (表Ⅱ-3)</a><p>
<img src="/edu/images/print.png" align="absmiddle"/><a href="106/print_school_reason.php"      target="_blank"> 8.學校資料異常說明列表</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 9.經費申請與審核意見表（依補助項目）
<Select id="opt_106_2" name="opt_106_2" Size="1">
	<option value="106/print_suggest.php?id=1">補助一：親職教育</option>
	<option value="106/print_suggest.php?id=2">補助二：學校特色</option>
	<option value="106/print_suggest.php?id=3">補助三：充實設備</option>
	<option value="106/print_suggest.php?id=4">補助四：原民特色</option>
	<option value="106/print_suggest.php?id=5">補助五：補助交通</option>
	<option value="106/print_suggest.php?id=6">補助六：整修場所</option>
</Select>
<input Type="button" id="btn_106_2" name="btn_106_2" value="查詢" OnClick="window.open(document.getElementById('opt_106_2').value)"><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFE1A4;">
			<font size="+1">執行成效及其他功能區</font>
		</td>
	</tr>
</table><p>

<img src="/edu/images/assignment.png" align="absmiddle"/><a href="effect_report_city.php" target="_self"> 10.縣市及學校執行成效資料</a><p>
<img src="/edu/images/history.png"    align="absmiddle"/><a href="history_data.php"       target="_self"> 11.歷史資料查詢區</a><p>
<img src="/edu/images/telphone.png"   align="absmiddle"/><a href="print_schoolman.php"    target="_self"> 12.各校業務承辦人聯絡資料</a><p>

<? if($cityno == '0' ){echo "<!--";}  // 縣市承辦人專區 ?>
	<table border="0">
		<tr height="30px">
			<td style="text-align:center; background-color:#FFE1A4;">
				<font size="+1">縣市教育局處承辦人專區</font>
			</td>
		</tr>
	</table>
	<p>
	<img src="/edu/images/lock.png"   align="absmiddle"/><a href="examine_setting_check.php" target="_self"> 13.審查權限設定</a><p>
	<img src="/edu/images/upload.png" align="absmiddle"/><a href="106/upload_data.php"       target="_self"> 14.縣市上傳檔案</a><p>
<? if($cityno == '0' ){echo "-->";} ?>

<? include "../../footer.php"; ?>

<?
/*
<img src="/edu/images/dot_02.gif" align="absmiddle" />7.依補助項目查詢初審結果列表
<Select id="opt_106_3" name="opt_106_3" Size="1">
	<option value="106/print_suggest_city.php?id=1">補助項目一</option>
	<option value="106/print_suggest_city.php?id=2">補助項目二</option>
	<option value="106/print_suggest_city.php?id=3">補助項目三</option>
	<option value="106/print_suggest_city.php?id=4">補助項目四</option>
	<option value="106/print_suggest_city.php?id=5">補助項目五</option>
	<option value="106/print_suggest_city.php?id=6">補助項目六</option>
	<option value="106/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_106_3" name="btn_106_3" value="查詢" OnClick="window.open(document.getElementById('opt_106_3').value)"><p>
<img src="/edu/images/dot_02.gif" align="absmiddle" />8.依補助項目查詢複審結果列表
<Select id="opt_106_2" name="opt_106_2" Size="1">
	<option value="106/print_suggest.php?id=1">補助項目一</option>
	<option value="106/print_suggest.php?id=2">補助項目二</option>
	<option value="106/print_suggest.php?id=3">補助項目三</option>
	<option value="106/print_suggest.php?id=4">補助項目四</option>
	<option value="106/print_suggest.php?id=5">補助項目五</option>
	<option value="106/print_suggest.php?id=6">補助項目六</option>
	<option value="106/print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_106_2" name="btn_106_2" value="查詢" OnClick="window.open(document.getElementById('opt_106_2').value)"><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_101_city_01.php" target="_self">101年度縣市自評表</a><font color=red> (填寫期間：101/5/1~可持續更新)</font><p>
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="101city_survey_01.php" target="_self">101年度推動教育優先區計畫執行情形調查問卷</a><font color=red> (填寫期間：101/5/1~5/20)</font><p>
<img src="./images/dot_01.gif" align="absmiddle" /><a href="effect_100_city_01.php" target="_self">100年度縣市自評表</a><font color=red> (填寫期間：101/5/1~5/20)</font><p>
<img src="/edu/images/view01.png" align="absmiddle"/><a href="106/city_search_school.php" target="_self"> 3.查詢各校經費需求彙整表</a><p>
*/
?>