<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	while($row = mysql_fetch_row($result))
	{
		$city = $row[1];
		$cityman = $row[2];
		$examine = $row[3];
		$cityno = $row[4];
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="city_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/history.png" align="absmiddle" /> <b>歷史資料查詢區</b>

<p>
<hr>
<p>

<font color=blue size="+1"><b>105 年度</b></font><p>

<img src="/edu/images/view01.png" align="absmiddle" /> 1.學校指標與經費
<Select id="opt_105_1" name="opt_105_1" Size="1">
	<option value="105/print_school_finish_1.php">已填報完成學校</option>
	<option value="105/print_school_finish_2.php">未填報完成學校</option>
</Select>
<input Type="button" id="btn_105_1" name="btn_105_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_105_1').value"><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="105/city_search_school.php"       target="_self" > 2.學校補助經費與審查現況</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="105/print_total_school.php?y=105" target="_blank"> 3.補助項目經費彙整表（學校申請列表）</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="105/print_city_examine.php"       target="_blank"> 4.補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="105/print_education_examine.php"  target="_blank"> 5.補助項目經費彙整表（教育部複審列表）</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="105/print_city_examine2.php"      target="_blank"> 6.指標界定調查結果彙整表 (表Ⅱ-3)</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 7.依補助項目查詢初審結果列表
<Select id="opt_105_3" name="opt_105_3" Size="1">
	<option value="105/print_suggest_city.php?id=1">補助項目一</option>
	<option value="105/print_suggest_city.php?id=2">補助項目二</option>
	<option value="105/print_suggest_city.php?id=3">補助項目三</option>
	<option value="105/print_suggest_city.php?id=4">補助項目四</option>
	<option value="105/print_suggest_city.php?id=5">補助項目五</option>
	<option value="105/print_suggest_city.php?id=6">補助項目六</option>
	<option value="105/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_105_3" name="btn_105_3" value="查詢" OnClick="window.open(document.getElementById('opt_105_3').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" /> 8.依補助項目查詢複審結果列表
<Select id="opt_105_2" name="opt_105_2" Size="1">
	<option value="105/print_suggest.php?id=1">補助項目一</option>
	<option value="105/print_suggest.php?id=2">補助項目二</option>
	<option value="105/print_suggest.php?id=3">補助項目三</option>
	<option value="105/print_suggest.php?id=4">補助項目四</option>
	<option value="105/print_suggest.php?id=5">補助項目五</option>
	<option value="105/print_suggest.php?id=6">補助項目六</option>
	<option value="105/print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_105_2" name="btn_105_2" value="查詢" OnClick="window.open(document.getElementById('opt_105_2').value)"><p>

<p>
<hr>
<p>

<font color=blue size="+1"><b>104 年度</b></font><p>

<img src="/edu/images/view01.png" align="absmiddle" /> 1.學校指標與經費
<Select id="opt_104_1" name="opt_104_1" Size="1">
	<option value="104/print_school_finish_1.php">已填報完成學校</option>
	<option value="104/print_school_finish_2.php">未填報完成學校</option>
</Select>
<input Type="button" id="btn_104_1" name="btn_104_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_104_1').value"><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="104/city_search_school.php"       target="_self" > 2.學校補助經費與審查現況</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="104/print_total_school.php?y=104" target="_blank"> 3.補助項目經費彙整表（學校申請列表）</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="104/print_city_examine.php"       target="_blank"> 4.補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="104/print_education_examine.php"  target="_blank"> 5.補助項目經費彙整表（教育部複審列表）</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="104/print_city_examine2.php"      target="_blank"> 6.指標界定調查結果彙整表 (表Ⅱ-3)</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 7.依補助項目查詢初審結果列表
<Select id="opt_104_3" name="opt_104_3" Size="1">
	<option value="104/print_suggest_city.php?id=1">補助項目一</option>
	<option value="104/print_suggest_city.php?id=2">補助項目二</option>
	<option value="104/print_suggest_city.php?id=3">補助項目三</option>
	<option value="104/print_suggest_city.php?id=4">補助項目四</option>
	<option value="104/print_suggest_city.php?id=5">補助項目五</option>
	<option value="104/print_suggest_city.php?id=6">補助項目六</option>
	<option value="104/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_104_3" name="btn_104_3" value="查詢" OnClick="window.open(document.getElementById('opt_104_3').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" /> 8.依補助項目查詢複審結果列表
<Select id="opt_104_2" name="opt_104_2" Size="1">
	<option value="104/print_suggest.php?id=1">補助項目一</option>
	<option value="104/print_suggest.php?id=2">補助項目二</option>
	<option value="104/print_suggest.php?id=3">補助項目三</option>
	<option value="104/print_suggest.php?id=4">補助項目四</option>
	<option value="104/print_suggest.php?id=5">補助項目五</option>
	<option value="104/print_suggest.php?id=6">補助項目六</option>
	<option value="104/print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_104_2" name="btn_104_2" value="查詢" OnClick="window.open(document.getElementById('opt_104_2').value)"><p>

<p>
<hr>
<p>

<font color=blue size="+1"><b>103 年度</b></font><p>

<img src="/edu/images/view01.png" align="absmiddle" /> 1.學校指標與經費
<Select id="opt_103_1" name="opt_103_1" Size="1">
	<option value="103/print_school_finish_1.php">已填報完成學校</option>
	<option value="103/print_school_finish_2.php">未填報完成學校</option>
</Select>
<input Type="button" id="btn_103_1" name="btn_103_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_103_1').value"><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="103/city_search_school.php"       target="_self" > 2.學校補助經費與審查現況</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="103/print_total_school.php?y=103" target="_blank"> 3.補助項目經費彙整表（學校申請列表）</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="103/print_city_examine.php"       target="_blank"> 4.補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="103/print_education_examine.php"  target="_blank"> 5.補助項目經費彙整表（教育部複審列表）</a><p>
<img src="/edu/images/print.png"  align="absmiddle" /><a href="103/print_city_examine2.php"      target="_blank"> 6.指標界定調查結果彙整表 (表Ⅱ-3)</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 7.依補助項目查詢初審結果列表
<Select id="opt_103_3" name="opt_103_3" Size="1">
	<option value="103/print_suggest_city.php?id=1">補助項目一</option>
	<option value="103/print_suggest_city.php?id=2">補助項目二</option>
	<option value="103/print_suggest_city.php?id=3">補助項目三</option>
	<option value="103/print_suggest_city.php?id=4">補助項目四</option>
	<option value="103/print_suggest_city.php?id=5">補助項目五</option>
	<option value="103/print_suggest_city.php?id=6">補助項目六</option>
	<option value="103/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_103_3" name="btn_103_3" value="查詢" OnClick="window.open(document.getElementById('opt_103_3').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" /> 8.依補助項目查詢複審結果列表
<Select id="opt_103_2" name="opt_103_2" Size="1">
	<option value="103/print_suggest.php?id=1">補助項目一</option>
	<option value="103/print_suggest.php?id=2">補助項目二</option>
	<option value="103/print_suggest.php?id=3">補助項目三</option>
	<option value="103/print_suggest.php?id=4">補助項目四</option>
	<option value="103/print_suggest.php?id=5">補助項目五</option>
	<option value="103/print_suggest.php?id=6">補助項目六</option>
	<option value="103/print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn_103_2" name="btn_103_2" value="查詢" OnClick="window.open(document.getElementById('opt_103_2').value)"><p>

<p>
<hr>
<p>

<font color=blue size="+1"><b>102 年度</b></font><p>

<form action="102_city_search_school.php" method="post" name="form">
	<img src="/edu/images/view01.png" align="absmiddle" /> 1.學校補助經費與審查現況：
	<input type="text" name="tbxname" size="3" value="<? echo $city; ?>" style="border:0px; background-color:aliceblue;" readonly>
	<input type="submit" value="送出" name="submit"><p>
</form>
<img src="/edu/images/print.png" align="absmiddle" /><a href="102_surplus_report_city.php"     target="_blank"> 2.學校結餘款列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="102_print_total_school.php"      target="_blank"> 3.補助項目經費彙整表（學校申請列表）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="102_print_city_examine.php"      target="_blank"> 4.補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="102_print_education_examine.php" target="_blank"> 5.補助項目經費彙整表（教育部複審列表）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="102_print_city_examine_2.php"    target="_blank"> 6.指標界定調查結果彙整表 (表Ⅱ-3)</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 7.依補助項目查詢複審結果列表
<Select id="102op4" name="102op4" Size="1">
	<option value="102_print_suggest.php?id=1">補助項目一</option>
	<option value="102_print_suggest.php?id=2">補助項目二</option>
	<option value="102_print_suggest.php?id=3">補助項目三</option>
	<option value="102_print_suggest.php?id=4">補助項目四</option>
	<option value="102_print_suggest.php?id=5">補助項目五</option>
	<option value="102_print_suggest.php?id=6">補助項目六</option>
	<option value="102_print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="button" id="btn102op4" name="btn102op4" value="查詢" OnClick="window.open(document.getElementById('102op4').value)"><p>

<p>
<hr>
<p>

<font color=blue size="+1"><b>101 年度</b></font><p>

<img src="/edu/images/print.png" align="absmiddle" /><a href="print_city_examine.php"   target="_blank"> 1.補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="print_city_examine_2.php" target="_blank"> 2.指標界定調查結果彙整表 (表Ⅱ-3)</a><p>

<p>
<hr>
<p>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<!-- 可用色碼FFCDFE	FFCDE5	FFCECD	FFE7CD	FEFFCD	E5FFCD	CDFFCE	CDFFE7	CDFEFF	CDE5FF	CECDFF	E7CDFF -->
<?
/*
<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/questionnaire_list.php" target="_self">10.成效評估調查問卷</a><p>
<img src="/edu/images/view01.png" align="absmiddle" /> 1.學校指標與經費
<Select id="102op1" name="102op1" Size="1">
	<option value="102_print_school_finish_1.php">已填報完成學校名單</option>
	<option value="102_print_school_finish_2.php">未填報完成學校名單</option>
</Select>
<input Type="button" id="btn102op1" name="btn102op1" value="查詢" OnClick="self.location.href=document.getElementById('102op1').value"><p>
*/
?>
