<?php
	include "../../mainfile.php";
	include "../../header.php";
	include "./connect_city.php";
?>
<?
	echo $city;
	echo "教育局（處），";
	echo $cityman;
	echo "，您好！";
?>

<p>

<a href="city_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/assignment.png" align="absmiddle" /> <b>縣市與學校執行成效</b>

<p>
<hr>
<p>

<font color="green" size="+1"><b>106 年度</b></font><p>
<img src="/edu/images/view01.png" align="absmiddle" /><a href="106/effect_list.php"> 學校執行成效評估填報列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/effect_report_city_all.php" target="_blank"> 縣市執行成效列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 學校執行成效列表
<Select id="opt_106" name="opt_106" Size="1">
	<option value="106/effect_report_city_school.php">全部補助項目</option>
	<option value="106/effect_report_city_01.php">補助一：親職教育</option>
	<option value="106/effect_report_city_02.php">補助二：教育特色</option>
	<option value="106/effect_report_city_03.php">補助三：教學設備</option>
	<option value="106/effect_report_city_04.php">補助四：原民特色</option>
	<option value="106/effect_report_city_05.php">補助五：補助交通</option>
	<option value="106/effect_report_city_06.php">補助六：整修場所</option>
</Select>
<input Type="button" id="btn_106" name="btn_106" value="查詢" OnClick="window.open(document.getElementById('opt_106').value)"><p>
<img src="/edu/images/edit.png" align="absmiddle" /><a href="106/effect_for_city.php"> 縣市填報執行成效<font size="-1">（自由選填）</font></a><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>105 年度</b></font><p>
<img src="/edu/images/view01.png" align="absmiddle" /><a href="105/effect_list.php"> 學校執行成效評估填報列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="105/effect_report_city_all.php" target="_blank"> 縣市執行成效列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 學校執行成效列表
<Select id="opt_105" name="opt_105" Size="1">
	<option value="105/effect_report_city_school.php">全部補助項目</option>
	<option value="105/effect_report_city_01.php">補助一：親職教育</option>
	<option value="105/effect_report_city_02.php">補助二：教育特色</option>
	<option value="105/effect_report_city_03.php">補助三：師生宿舍</option>
	<option value="105/effect_report_city_04.php">補助四：教學設備</option>
	<option value="105/effect_report_city_05.php">補助五：原民特色</option>
	<option value="105/effect_report_city_06.php">補助六：補助交通</option>
	<option value="105/effect_report_city_07.php">補助七：整修場所</option>
</Select>
<input Type="button" id="btn_105" name="btn_105" value="查詢" OnClick="window.open(document.getElementById('opt_105').value)"><p>
<img src="/edu/images/edit.png" align="absmiddle" /><a href="105/effect_for_city.php"> 縣市填報執行成效<font size="-1">（自由選填）</font></a><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>104 年度</b></font><p>
<img src="/edu/images/view01.png" align="absmiddle" /><a href="104/effect_list.php"> 學校執行成效評估填報列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="104/effect_report_city_all.php" target="_blank"> 縣市執行成效列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 學校執行成效列表
<Select id="opt_104" name="opt_104" Size="1">
	<option value="104/effect_report_city_school.php">全部補助項目</option>
	<option value="104/effect_report_city_01.php">補助一：親職教育</option>
	<option value="104/effect_report_city_02.php">補助二：教育特色</option>
	<option value="104/effect_report_city_03.php">補助三：師生宿舍</option>
	<option value="104/effect_report_city_04.php">補助四：教學設備</option>
	<option value="104/effect_report_city_05.php">補助五：原民特色</option>
	<option value="104/effect_report_city_06.php">補助六：補助交通</option>
	<option value="104/effect_report_city_07.php">補助七：整修場所</option>
</Select>
<input Type="button" id="btn_104" name="btn_104" value="查詢" OnClick="window.open(document.getElementById('opt_104').value)"><p>
<img src="/edu/images/edit.png" align="absmiddle" /><a href="104/effect_for_city.php"> 縣市填報執行成效<font size="-1">（自由選填）</font></a><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>103 年度</b></font><p>
<img src="/edu/images/view01.png" align="absmiddle" /><a href="103/effect_list.php"> 學校執行成效評估填報列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="103/effect_report_city_all.php" target="_blank"> 縣市執行成效列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 學校執行成效列表
<Select id="opt_103" name="opt_103" Size="1">
	<option value="103/effect_report_city_school.php">全部補助項目</option>
	<option value="103/effect_report_city_01.php">補助一：親職教育</option>
	<option value="103/effect_report_city_02.php">補助二：教育特色</option>
	<option value="103/effect_report_city_03.php">補助三：師生宿舍</option>
	<option value="103/effect_report_city_04.php">補助四：教學設備</option>
	<option value="103/effect_report_city_05.php">補助五：原民特色</option>
	<option value="103/effect_report_city_06.php">補助六：補助交通</option>
	<option value="103/effect_report_city_07.php">補助七：整修場所</option>
</Select>
<input Type="button" id="btn_103" name="btn_103" value="查詢" OnClick="window.open(document.getElementById('opt_103').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>102 年度</b></font><p>
<img src="/edu/images/view01.png" align="absmiddle" /><a href="effect_102_list.php?cityname=<?=$city;?>"> 學校執行成效評估填報列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="effect_102_report_city_all.php" target="_blank"> 縣市執行成效列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 學校執行成效列表
<Select id="opt_102" name="opt_102" Size="1">
	<option value="effect_102_report_city_school.php">全部補助項目</option>
	<option value="effect_102_report_city_01.php">補助一：親職教育</option>
	<option value="effect_102_report_city_02.php">補助二：教育特色</option>
	<option value="effect_102_report_city_03.php">補助三：師生宿舍</option>
	<option value="effect_102_report_city_04.php">補助四：教學設備</option>
	<option value="effect_102_report_city_05.php">補助五：原民特色</option>
	<option value="effect_102_report_city_06.php">補助六：補助交通</option>
	<option value="effect_102_report_city_07.php">補助七：整修場所</option>
</Select>
<input Type="button" id="btn_102" name="btn_102" value="查詢" OnClick="window.open(document.getElementById('opt_102').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>101 年度</b></font><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="effect_101_report_city_all.php" target="_blank"> 縣市執行成效列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 學校執行成效列表
<Select id="opt_101" name="opt_101" Size="1">
	<option value="effect_101_report_city_school.php">全部補助項目</option>
	<option value="effect_101_report_city_01.php">補助一：親職教育</option>
	<option value="effect_101_report_city_02.php">補助二：學習輔導</option>
	<option value="effect_101_report_city_03.php">補助三：教育特色</option>
	<option value="effect_101_report_city_04.php">補助四：師生宿舍</option>
	<option value="effect_101_report_city_05.php">補助五：教學設備</option>
	<option value="effect_101_report_city_06.php">補助六：原民特色</option>
	<option value="effect_101_report_city_07.php">補助七：補助交通</option>
	<option value="effect_101_report_city_08.php">補助八：整修場所</option>
</Select>
<input Type="button" id="btn_101" name="btn_101" value="查詢" OnClick="window.open(document.getElementById('opt_101').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>100 年度</b></font><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="effect_100_report_city_all.php" target="_blank"> 縣市執行成效列表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 學校執行成效列表
<Select id="opt_100" name="opt_100" Size="1">
	<option value="effect_100_report_city_school.php">全部補助項目</option>
	<option value="effect_100_report_city_01.php">補助一：親職教育</option>
	<option value="effect_100_report_city_02.php">補助二：學習輔導</option>
	<option value="effect_100_report_city_03.php">補助三：教育特色</option>
	<option value="effect_100_report_city_04.php">補助四：師生宿舍</option>
	<option value="effect_100_report_city_05.php">補助五：教學設備</option>
	<option value="effect_100_report_city_06.php">補助六：原民特色</option>
	<option value="effect_100_report_city_07.php">補助七：補助交通</option>
	<option value="effect_100_report_city_08.php">補助八：整修場所</option>
</Select>
<input Type="button" id="btn_100" name="btn_100" value="查詢" OnClick="window.open(document.getElementById('opt_100').value)"><p>

<?php include "../../footer.php"; ?>