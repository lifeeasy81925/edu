<?php
	include "../../mainfile.php";
	include "../../header.php";
	include "./connect_edu.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	echo $username."_";
	echo $edu."_";
	echo $eduman."您好！歡迎使用本系統。";
?>

<?
	$city_array = array( "基隆市", "臺北市", "新北市", "桃園市", "新竹市", "新竹縣", "苗栗縣", "臺中市", "彰化縣", "南投縣", "雲林縣"
					   , "嘉義市", "嘉義縣", "臺南市", "高雄市", "屏東縣", "宜蘭縣", "花蓮縣", "臺東縣", "澎湖縣", "金門縣", "連江縣", "全國" );

	$city_array_old = array( "基隆市", "臺北市", "新北市", "桃園縣", "新竹市", "新竹縣", "苗栗縣", "臺中市", "彰化縣", "南投縣", "雲林縣"
						   , "嘉義市", "嘉義縣", "臺南市", "高雄市", "屏東縣", "宜蘭縣", "花蓮縣", "臺東縣", "澎湖縣", "金門縣", "連江縣", "全國" );
?>

<p>

<a href="education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/assignment.png" align="absmiddle" height="20px"> <b>縣市及學校執行成效資料</b>

<p>
<hr>
<p>

<font color="green" size="+1"><b>106年度</b></font>
<p>

<img src="/edu/images/view01.png" align="absmiddle" />
<Select id="op106_list" name="op106_list">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='106/effect_list.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校執行成效填報狀況查詢 ---------------
<input Type="Button" id="op106_list" name="op106_list" value=" 查 詢 " OnClick="location.href=document.getElementById('op106_list').value"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op106_all" name="op106_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='106/effect_report_city_all.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
執行成效總表 ---------------------------------
<input Type="Button" id="op106_all" name="op106_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op106_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op106_city" name="op106_city">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校
<Select id="opt_106_report" name="opt_106_report">
	<option value="106/effect_report_city_school.php?ct=">全部補助項目</option>
	<option value="106/effect_report_city_01.php?ct=">補助一：親職教育</option>
	<option value="106/effect_report_city_02.php?ct=">補助二：教育特色</option>
	<option value="106/effect_report_city_03.php?ct=">補助三：教學設備</option>
	<option value="106/effect_report_city_04.php?ct=">補助四：原民特色</option>
	<option value="106/effect_report_city_05.php?ct=">補助五：補助交通</option>
	<option value="106/effect_report_city_06.php?ct=">補助六：整修場所</option>
</Select>
執行成效列表 --
<input Type="Button" id="opt_106_report_and_city" name="opt_106_report_and_city" value=" 查 詢 " OnClick="window.open(document.getElementById('opt_106_report').value + document.getElementById('op106_city').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>105年度</b></font>
<p>

<img src="/edu/images/view01.png" align="absmiddle" />
<Select id="op105_list" name="op105_list">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='105/effect_list.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校執行成效填報狀況查詢 ---------------
<input Type="Button" id="op105_list" name="op105_list" value=" 查 詢 " OnClick="location.href=document.getElementById('op105_list').value"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op105_all" name="op105_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='105/effect_report_city_all.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
執行成效總表 ---------------------------------
<input Type="Button" id="op105_all" name="op105_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op105_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op105_city" name="op105_city">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校
<Select id="opt_105_report" name="opt_105_report">
	<option value="105/effect_report_city_school.php?ct=">全部補助項目</option>
	<option value="105/effect_report_city_01.php?ct=">補助一：親職教育</option>
	<option value="105/effect_report_city_02.php?ct=">補助二：教育特色</option>
	<option value="105/effect_report_city_03.php?ct=">補助三：師生宿舍</option>
	<option value="105/effect_report_city_04.php?ct=">補助四：教學設備</option>
	<option value="105/effect_report_city_05.php?ct=">補助五：原民特色</option>
	<option value="105/effect_report_city_06.php?ct=">補助六：補助交通</option>
	<option value="105/effect_report_city_07.php?ct=">補助七：整修場所</option>
</Select>
執行成效列表 --
<input Type="Button" id="opt_105_report_and_city" name="opt_105_report_and_city" value=" 查 詢 " OnClick="window.open(document.getElementById('opt_105_report').value + document.getElementById('op105_city').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>104年度</b></font>
<p>

<img src="/edu/images/view01.png" align="absmiddle" />
<Select id="op104_list" name="op104_list">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='104/effect_list.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校執行成效填報狀況查詢 ---------------
<input Type="Button" id="op104_list" name="op104_list" value=" 查 詢 " OnClick="location.href=document.getElementById('op104_list').value"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op104_all" name="op104_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='104/effect_report_city_all.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
執行成效總表 ---------------------------------
<input Type="Button" id="op104_all" name="op104_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op104_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op104_city" name="op104_city">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校
<Select id="opt_104_report" name="opt_104_report">
	<option value="104/effect_report_city_school.php?ct=">全部補助項目</option>
	<option value="104/effect_report_city_01.php?ct=">補助一：親職教育</option>
	<option value="104/effect_report_city_02.php?ct=">補助二：教育特色</option>
	<option value="104/effect_report_city_03.php?ct=">補助三：師生宿舍</option>
	<option value="104/effect_report_city_04.php?ct=">補助四：教學設備</option>
	<option value="104/effect_report_city_05.php?ct=">補助五：原民特色</option>
	<option value="104/effect_report_city_06.php?ct=">補助六：補助交通</option>
	<option value="104/effect_report_city_07.php?ct=">補助七：整修場所</option>
</Select>
執行成效列表 --
<input Type="Button" id="opt_104_report_and_city" name="opt_104_report_and_city" value=" 查 詢 " OnClick="window.open(document.getElementById('opt_104_report').value + document.getElementById('op104_city').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>103年度</b></font>
<p>

<img src="/edu/images/view01.png" align="absmiddle" />
<Select id="op103_list" name="op103_list">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='103/effect_list.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校執行成效填報狀況查詢 ---------------
<input Type="Button" id="op103_list" name="op103_list" value=" 查 詢 " OnClick="location.href=document.getElementById('op103_list').value"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op103_all" name="op103_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='103/effect_report_city_all.php?ct=" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
執行成效總表 ---------------------------------
<input Type="Button" id="op103_all" name="op103_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op103_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op103_city" name="op103_city">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='" . $city_array[$i] . "'>" . $city_array[$i] . "</option>";
		}
	?>
</Select>
學校
<Select id="opt_103_report" name="opt_103_report">
	<option value="103/effect_report_city_school.php?ct=">全部補助項目</option>
	<option value="103/effect_report_city_01.php?ct=">補助一：親職教育</option>
	<option value="103/effect_report_city_02.php?ct=">補助二：教育特色</option>
	<option value="103/effect_report_city_03.php?ct=">補助三：師生宿舍</option>
	<option value="103/effect_report_city_04.php?ct=">補助四：教學設備</option>
	<option value="103/effect_report_city_05.php?ct=">補助五：原民特色</option>
	<option value="103/effect_report_city_06.php?ct=">補助六：補助交通</option>
	<option value="103/effect_report_city_07.php?ct=">補助七：整修場所</option>
</Select>
執行成效列表 --
<input Type="Button" id="opt_103_report_and_city" name="opt_103_report_and_city" value=" 查 詢 " OnClick="window.open(document.getElementById('opt_103_report').value + document.getElementById('op103_city').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>102年度</b></font>
<p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op102_all" name="op102_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='effect_102_city_01.php?cityname=" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
執行成效自評表 -------------------------
<input Type="Button" id="op102_all" name="op102_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op102_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op102_all" name="op102_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='effect_102_report_city_school.php?cityname=" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
執行成效總表 ----------------------------
<input Type="Button" id="op102_all" name="op102_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op102_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op102_city" name="op102_city">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
學校
<Select id="opt_102_report" name="opt_102_report">
	<option value="effect_102_report_city_all.php?cityname=">全部補助項目</option>
	<option value="effect_102_report_city_01.php?cityname=">補助項目一</option>
	<option value="effect_102_report_city_02.php?cityname=">補助項目二</option>
	<option value="effect_102_report_city_03.php?cityname=">補助項目三</option>
	<option value="effect_102_report_city_04.php?cityname=">補助項目四</option>
	<option value="effect_102_report_city_05.php?cityname=">補助項目五</option>
	<option value="effect_102_report_city_06.php?cityname=">補助項目六</option>
	<option value="effect_102_report_city_07.php?cityname=">補助項目七</option>
</Select>
執行成效列表 --
<input Type="Button" id="opt_102_report_and_city" name="opt_102_report_and_city" value=" 查 詢 " OnClick="window.open(document.getElementById('opt_102_report').value + document.getElementById('op102_city').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>101年度</b></font>
<p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op101_all" name="op101_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='effect_101_city_01.php?cityname=" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
執行成效自評表 -------------------------
<input Type="Button" id="op101_all" name="op101_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op101_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op101_all" name="op101_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='effect_101_report_city_school.php?cityname=" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
執行成效總表 ----------------------------
<input Type="Button" id="op101_all" name="op101_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op101_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op101_city" name="op101_city">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
學校
<Select id="opt_101_report" name="opt_101_report">
	<option value="effect_101_report_city_all.php?cityname=">全部補助項目</option>
	<option value="effect_101_report_city_01.php?cityname=">補助項目一</option>
	<option value="effect_101_report_city_02.php?cityname=">補助項目二</option>
	<option value="effect_101_report_city_03.php?cityname=">補助項目三</option>
	<option value="effect_101_report_city_04.php?cityname=">補助項目四</option>
	<option value="effect_101_report_city_05.php?cityname=">補助項目五</option>
	<option value="effect_101_report_city_06.php?cityname=">補助項目六</option>
	<option value="effect_101_report_city_07.php?cityname=">補助項目七</option>
</Select>
執行成效列表 --
<input Type="Button" id="opt_101_report_and_city" name="opt_101_report_and_city" value=" 查 詢 " OnClick="window.open(document.getElementById('opt_101_report').value + document.getElementById('op101_city').value)"><p>

<p>
<hr>
<p>

<font color="green" size="+1"><b>100年度</b></font>
<p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op100_all" name="op100_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='effect_100_city_01.php?cityname=" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
執行成效自評表 -------------------------
<input Type="Button" id="op100_all" name="op100_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op100_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op100_all" name="op100_all">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='effect_100_report_city_school.php?cityname=" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
執行成效總表 ----------------------------
<input Type="Button" id="op100_all" name="op100_all" value=" 查 詢 " OnClick="window.open(document.getElementById('op100_all').value)"><p>

<img src="/edu/images/print.png" align="absmiddle" />
<Select id="op100_city" name="op100_city">
	<?
		for($i = 0; $i <= 22; $i++)
		{
			echo "<option value='" . $city_array_old[$i] . "'>" . $city_array_old[$i] . "</option>";
		}
	?>
</Select>
學校
<Select id="opt_100_report" name="opt_100_report">
	<option value="effect_100_report_city_all.php?cityname=">全部補助項目</option>
	<option value="effect_100_report_city_01.php?cityname=">補助項目一</option>
	<option value="effect_100_report_city_02.php?cityname=">補助項目二</option>
	<option value="effect_100_report_city_03.php?cityname=">補助項目三</option>
	<option value="effect_100_report_city_04.php?cityname=">補助項目四</option>
	<option value="effect_100_report_city_05.php?cityname=">補助項目五</option>
	<option value="effect_100_report_city_06.php?cityname=">補助項目六</option>
	<option value="effect_100_report_city_07.php?cityname=">補助項目七</option>
</Select>
執行成效列表 --
<input Type="Button" id="opt_100_report_and_city" name="opt_100_report_and_city" value=" 查 詢 " OnClick="window.open(document.getElementById('opt_100_report').value + document.getElementById('op100_city').value)"><p>

<p>
<hr>
<p>

<?php include "../../footer.php"; ?>