<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
?>

<p>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/history.png" align="absmiddle" height="20px"> <b>歷史資料查詢區</b>

<p>
<hr>
<p>

<font color="blue" size="+1"><b>105年度</b></font><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="../105/school_update.php" target="_self"> 1.學校指標與經費查詢</a><p>

<img src="/edu/images/view01.png" align="absmiddle" /> 2.縣市檔案上傳狀態
<Select id="nopost105" name="nopost105" Size=1>
	<option value="../105/print_city_finish.php?mod=Y">已審核完成縣市名單</option>
	<option value="../105/print_city_finish.php?mod=N">未審核完成縣市名單</option>
</Select>
<input Type="Button" id="btn_nopost105" name="btn_nopost105" value="查詢" OnClick="self.location.href=document.getElementById('nopost105').value"><p>

<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_city_examine2.php" target="_blank"> 3.學校指標界定調查結果彙整表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_edu_examine2.php"  target="_blank"> 4.學校補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_city_examine3.php" target="_blank"> 5.縣市補助項目經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_city_examine.php"  target="_blank"> 6.縣市補助項目經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_edu_examine1.php"  target="_blank"> 7.縣市補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_edu_examine5.php"  target="_blank"> 8.經常門與資本門經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_edu_examine4.php"  target="_blank"> 9.經常門與資本門經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../105/print_edu_examine3.php"  target="_blank"> 10.經常門與資本門經費彙整表（教育部複審）</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 11.依補助項目查詢初審結果列表
<Select id="opt_105_3" name="opt_105_3" Size=1>
	<option value="../105/print_suggest_city.php?id=1">補助項目一</option>
	<option value="../105/print_suggest_city.php?id=2">補助項目二</option>
	<option value="../105/print_suggest_city.php?id=3">補助項目三</option>
	<option value="../105/print_suggest_city.php?id=4">補助項目四</option>
	<option value="../105/print_suggest_city.php?id=5">補助項目五</option>
	<option value="../105/print_suggest_city.php?id=6">補助項目六</option>
	<option value="../105/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_105_3" name="btn_105_3" value="查詢" OnClick="window.open(document.getElementById('opt_105_3').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" /> 12.依補助項目查詢複審結果列表
<Select id="opt_105_2" name="opt_105_2" Size=1>
	<option value="../105/print_suggest.php?id=1">補助項目一</option>
	<option value="../105/print_suggest.php?id=2">補助項目二</option>
	<option value="../105/print_suggest.php?id=3">補助項目三</option>
	<option value="../105/print_suggest.php?id=4">補助項目四</option>
	<option value="../105/print_suggest.php?id=5">補助項目五</option>
	<option value="../105/print_suggest.php?id=6">補助項目六</option>
	<option value="../105/print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_105_2" name="btn_105_2" value="查詢" OnClick="window.open(document.getElementById('opt_105_2').value)"><p>

<p>
<hr>
<p>

<font color="blue" size="+1"><b>104年度</b></font><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="../104/school_update.php" target="_self"> 1.學校指標與經費查詢</a><p>

<img src="/edu/images/view01.png" align="absmiddle" /> 2.縣市檔案上傳狀態
<Select id="nopost104" name="nopost104" Size=1>
	<option value="../104/print_city_finish.php?mod=Y">已審核完成縣市名單</option>
	<option value="../104/print_city_finish.php?mod=N">未審核完成縣市名單</option>
</Select>
<input Type="Button" id="btn_nopost104" name="btn_nopost104" value="查詢" OnClick="self.location.href=document.getElementById('nopost104').value"><p>

<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_city_examine2.php" target="_blank"> 3.學校指標界定調查結果彙整表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_edu_examine2.php"  target="_blank"> 4.學校補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_city_examine3.php" target="_blank"> 5.縣市補助項目經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_city_examine.php"  target="_blank"> 6.縣市補助項目經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_edu_examine1.php"  target="_blank"> 7.縣市補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_edu_examine5.php"  target="_blank"> 8.經常門與資本門經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_edu_examine4.php"  target="_blank"> 9.經常門與資本門經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../104/print_edu_examine3.php"  target="_blank"> 10.經常門與資本門經費彙整表（教育部複審）</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 11.依補助項目查詢初審結果列表
<Select id="opt_104_3" name="opt_104_3" Size=1>
	<option value="../104/print_suggest_city.php?id=1">補助項目一</option>
	<option value="../104/print_suggest_city.php?id=2">補助項目二</option>
	<option value="../104/print_suggest_city.php?id=3">補助項目三</option>
	<option value="../104/print_suggest_city.php?id=4">補助項目四</option>
	<option value="../104/print_suggest_city.php?id=5">補助項目五</option>
	<option value="../104/print_suggest_city.php?id=6">補助項目六</option>
	<option value="../104/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_104_3" name="btn_104_3" value="查詢" OnClick="window.open(document.getElementById('opt_104_3').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" /> 12.依補助項目查詢複審結果列表
<Select id="opt_104_2" name="opt_104_2" Size=1>
	<option value="../104/print_suggest.php?id=1">補助項目一</option>
	<option value="../104/print_suggest.php?id=2">補助項目二</option>
	<option value="../104/print_suggest.php?id=3">補助項目三</option>
	<option value="../104/print_suggest.php?id=4">補助項目四</option>
	<option value="../104/print_suggest.php?id=5">補助項目五</option>
	<option value="../104/print_suggest.php?id=6">補助項目六</option>
	<option value="../104/print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_104_2" name="btn_104_2" value="查詢" OnClick="window.open(document.getElementById('opt_104_2').value)"><p>

<p>
<hr>
<p>

<font color="blue" size="+1"><b>103年度</b></font><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="../103/school_update.php" target="_self"> 1.學校指標與經費查詢</a><p>

<img src="/edu/images/view01.png" align="absmiddle" /> 2.縣市檔案上傳狀態
<Select id="nopost103" name="nopost103" Size=1>
	<option value="../103/print_city_finish.php?mod=Y">已審核完成縣市名單</option>
	<option value="../103/print_city_finish.php?mod=N">未審核完成縣市名單</option>
</Select>
<input Type="Button" id="btn_nopost103" name="btn_nopost103" value="查詢" OnClick="self.location.href=document.getElementById('nopost103').value"><p>

<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_city_examine2.php" target="_blank"> 3.學校指標界定調查結果彙整表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_edu_examine2.php"  target="_blank"> 4.學校補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_city_examine3.php" target="_blank"> 5.縣市補助項目經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_city_examine.php"  target="_blank"> 6.縣市補助項目經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_edu_examine1.php"  target="_blank"> 7.縣市補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_edu_examine5.php"  target="_blank"> 8.經常門與資本門經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_edu_examine4.php"  target="_blank"> 9.經常門與資本門經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../103/print_edu_examine3.php"  target="_blank"> 10.經常門與資本門經費彙整表（教育部複審）</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 11.依補助項目查詢初審結果列表
<Select id="opt_103_3" name="opt_103_3" Size=1>
	<option value="../103/print_suggest_city.php?id=1">補助項目一</option>
	<option value="../103/print_suggest_city.php?id=2">補助項目二</option>
	<option value="../103/print_suggest_city.php?id=3">補助項目三</option>
	<option value="../103/print_suggest_city.php?id=4">補助項目四</option>
	<option value="../103/print_suggest_city.php?id=5">補助項目五</option>
	<option value="../103/print_suggest_city.php?id=6">補助項目六</option>
	<option value="../103/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_103_3" name="btn_103_3" value="查詢" OnClick="window.open(document.getElementById('opt_103_3').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" /> 12.依補助項目查詢複審結果列表
<Select id="opt_103_2" name="opt_103_2" Size=1>
	<option value="../103/print_suggest.php?id=1">補助項目一</option>
	<option value="../103/print_suggest.php?id=2">補助項目二</option>
	<option value="../103/print_suggest.php?id=3">補助項目三</option>
	<option value="../103/print_suggest.php?id=4">補助項目四</option>
	<option value="../103/print_suggest.php?id=5">補助項目五</option>
	<option value="../103/print_suggest.php?id=6">補助項目六</option>
	<option value="../103/print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_103_2" name="btn_103_2" value="查詢" OnClick="window.open(document.getElementById('opt_103_2').value)"><p>

<p>
<hr>
<p>

<font color="blue" size="+1"><b>102年度</b></font><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="../102_school_update.php" target="_self"> 1.學校指標與經費查詢</a><p>

<form action="../102_edu_search_school.php" method="post" name="form">
	<img src="/edu/images/view01.png" align="absmiddle" /> 2.學校需求彙整表（填入學校名稱）：
	<input type="text" name="tbxname" size="10">
	<input type="submit" value="送出" name="submit">
	<input type="reset" value="清除" name="reset">
</form><p>

<img src="/edu/images/view01.png" align="absmiddle" /> 3.縣市檔案上傳狀態
<Select id="nopost102" name="nopost102" Size=1>
	<option value="../102_print_city_finish_1.php">已審核完成縣市名單</option>
	<option value="../102_print_city_finish_2.php">未審核完成縣市名單</option>
</Select>
<input Type="Button" id="btn_nopost102" name="btn_nopost102" value="查詢" OnClick="self.location.href=document.getElementById('nopost102').value"><p>

<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_city_examine2.php" target="_blank"> 3.學校指標界定調查結果彙整表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_edu_examine2.php"  target="_blank"> 4.學校補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_city_examine3.php" target="_blank"> 5.縣市補助項目經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_city_examine.php"  target="_blank"> 6.縣市補助項目經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_edu_examine1.php"  target="_blank"> 7.縣市補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_edu_examine5.php"  target="_blank"> 8.經常門與資本門經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_edu_examine4.php"  target="_blank"> 9.經常門與資本門經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_print_edu_examine3.php"  target="_blank"> 10.經常門與資本門經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="../102_surplus_report_edu.php"  target="_blank"> 11.學校結餘款列表</a><p>

<img src="/edu/images/print.png" align="absmiddle" /> 12.依補助項目查詢初審結果列表
<Select id="opt_102_3" name="opt_102_3" Size=1>
	<option value="../102_print_suggest_city.php?id=1">補助項目一</option>
	<option value="../102_print_suggest_city.php?id=2">補助項目二</option>
	<option value="../102_print_suggest_city.php?id=3">補助項目三</option>
	<option value="../102_print_suggest_city.php?id=4">補助項目四</option>
	<option value="../102_print_suggest_city.php?id=5">補助項目五</option>
	<option value="../102_print_suggest_city.php?id=6">補助項目六</option>
	<option value="../102_print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_102_3" name="btn_102_3" value="查詢" OnClick="window.open(document.getElementById('opt_102_3').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" /> 13.依補助項目查詢複審結果列表
<Select id="opt_102_2" name="opt_102_2" Size=1>
	<option value="../102_print_suggest.php?id=1">補助項目一</option>
	<option value="../102_print_suggest.php?id=2">補助項目二</option>
	<option value="../102_print_suggest.php?id=3">補助項目三</option>
	<option value="../102_print_suggest.php?id=4">補助項目四</option>
	<option value="../102_print_suggest.php?id=5">補助項目五</option>
	<option value="../102_print_suggest.php?id=6">補助項目六</option>
	<option value="../102_print_suggest.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_102_2" name="btn_102_2" value="查詢" OnClick="window.open(document.getElementById('opt_102_2').value)"><p>

<p>
<hr>
<p>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
<!--1040429修改，隱藏101年度資料
<div style="background-color:#FFCECD">101年度<br />
	<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="all_city_money.php" target="_blank">1.縣市申請結果</a><br />
	<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="all_education_money1.php" target="_blank">2.教育部審核結果 (各縣市金額)</a><br />
	<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="all_education_money2.php" target="_blank">3.教育部審核結果 (各縣市分項資料)</a><br />
	<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="all_education_money3.php" target="_blank">4.教育優先區項目別補助金額統計表</a><br />
	<img src="/edu/images/dot_01.gif" align="absmiddle" />5.各補助項目複審結果明細表：
	<Select id="op1" name="op1" Size=1>
		<option value="print_suggest.php?id=1">補助項目一</option>
		<option value="print_suggest.php?id=2">補助項目二</option>
		<option value="print_suggest.php?id=3">補助項目三</option>
		<option value="print_suggest.php?id=4">補助項目四</option>
		<option value="print_suggest.php?id=5">補助項目五</option>
		<option value="print_suggest.php?id=6">補助項目六</option>
		<option value="print_suggest.php?id=7">補助項目七</option>
		<option value="print_suggest.php?id=8">補助項目八</option>
	</Select>
	<input Type="Button" id="op1" name="op1" value="查詢" OnClick="window.open(document.getElementById('op1').value)"><br />
	<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="edu_search_mulit.php" target="_self">複合式報表列印</a><br />   <--1040429這行原本有被隱藏!!
	<img src="/edu/images/dot_01.gif" align="absmiddle" />6.縣市審核狀態及上傳檔案
	<Select id="nopost" name="nopost" Size=1>
		<option value="print_city_finish_1.php">已審核完成縣市名單</option>
		<option value="print_city_finish_2.php">未審核完成縣市名單</option>
	</Select>
	<input Type="Button" id="nopost" name="nopost" value="查詢"
	OnClick="self.location.href=document.getElementById('nopost').value"><br />
	<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="school_update.php" target="_self">7.各校填報狀態查詢</a>
	<form action="edu_search_school.php" method="post" name="form">
	<img src="/edu/images/dot_01.gif" align="absmiddle" />8.學校需求彙整表 (填入學校名稱)：
	<input type="text" name="tbxname" >
			<input type="submit" value="送出" name="submit">
		<input type="reset" value="清除" name="reset">
	</form>
</div>
-->
*/
?>