<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_edu.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回前頁" onClick="location='education_index.php'">
<?
echo $username."_";
echo $edu."_";
echo $eduman."您好！歡迎使用本系統。";
?>

<div align="center" style="background-color:#FC9">104年度執行成果報表</div>
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各補助項目執行成果一覽表
<Select id="op104_all" name="op104_all" Size=1>
	<option value="104/effect_report_city_all.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_all.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_all.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_all.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_all.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_all.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_all.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_all.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_all.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_all.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_all.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_all.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_all.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_all.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_all.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_all.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_all.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_all.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_all.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_all.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_all.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_all.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_all.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_all" name="op104_all" value="查詢" OnClick="window.open(document.getElementById('op104_all').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各校各補助項目執行成果列表
<Select id="op104_school" name="op104_school" Size=1>
	<option value="104/effect_report_city_school.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_school.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_school.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_school.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_school.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_school.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_school.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_school.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_school.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_school.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_school.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_school.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_school.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_school.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_school.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_school.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_school.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_school.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_school.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_school.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_school.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_school.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_school.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_school" name="op104_school" value="查詢" OnClick="window.open(document.getElementById('op104_school').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目一
<Select id="op104_1" name="op104_1" Size=1>
	<option value="104/effect_report_city_01.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_01.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_01.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_01.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_01.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_01.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_01.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_01.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_01.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_01.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_01.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_01.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_01.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_01.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_01.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_01.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_01.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_01.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_01.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_01.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_01.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_01.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_01.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_1" name="op104_1" value="查詢" OnClick="window.open(document.getElementById('op104_1').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目二
<Select id="op104_2" name="op104_2" Size=1>
	<option value="104/effect_report_city_02.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_02.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_02.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_02.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_02.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_02.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_02.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_02.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_02.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_02.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_02.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_02.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_02.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_02.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_02.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_02.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_02.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_02.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_02.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_02.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_02.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_02.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_02.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_2" name="op104_2" value="查詢" OnClick="window.open(document.getElementById('op104_2').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目三
<Select id="op104_3" name="op104_3" Size=1>
	<option value="104/effect_report_city_03.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_03.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_03.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_03.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_03.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_03.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_03.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_03.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_03.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_03.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_03.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_03.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_03.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_03.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_03.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_03.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_03.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_03.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_03.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_03.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_03.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_03.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_03.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_3" name="op104_3" value="查詢" OnClick="window.open(document.getElementById('op104_3').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目四
<Select id="op104_4" name="op104_4" Size=1>
	<option value="104/effect_report_city_04.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_04.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_04.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_04.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_04.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_04.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_04.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_04.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_04.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_04.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_04.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_04.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_04.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_04.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_04.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_04.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_04.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_04.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_04.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_04.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_04.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_04.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_04.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_4" name="op104_4" value="查詢" OnClick="window.open(document.getElementById('op104_4').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目五
<Select id="op104_5" name="op104_5" Size=1>
	<option value="104/effect_report_city_05.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_05.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_05.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_05.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_05.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_05.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_05.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_05.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_05.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_05.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_05.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_05.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_05.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_05.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_05.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_05.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_05.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_05.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_05.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_05.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_05.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_05.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_05.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_5" name="op104_5" value="查詢" OnClick="window.open(document.getElementById('op104_5').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目六
<Select id="op104_6" name="op104_6" Size=1>
	<option value="104/effect_report_city_06.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_06.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_06.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_06.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_06.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_06.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_06.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_06.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_06.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_06.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_06.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_06.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_06.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_06.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_06.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_06.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_06.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_06.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_06.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_06.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_06.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_06.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_06.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_6" name="op104_6" value="查詢" OnClick="window.open(document.getElementById('op104_6').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目七
<Select id="op104_7" name="op104_7" Size=1>
	<option value="104/effect_report_city_07.php?ct=新北市">新北市</option>
	<option value="104/effect_report_city_07.php?ct=臺北市">臺北市</option>
	<option value="104/effect_report_city_07.php?ct=臺中市">臺中市</option>
    <option value="104/effect_report_city_07.php?ct=臺南市">臺南市</option>
    <option value="104/effect_report_city_07.php?ct=高雄市">高雄市</option>
    <option value="104/effect_report_city_07.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_report_city_07.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_report_city_07.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_report_city_07.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_report_city_07.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_report_city_07.php?ct=南投縣">南投縣</option>
    <option value="104/effect_report_city_07.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_report_city_07.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_report_city_07.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_report_city_07.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_report_city_07.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_report_city_07.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_report_city_07.php?ct=基隆市">基隆市</option>
    <option value="104/effect_report_city_07.php?ct=新竹市">新竹市</option>
    <option value="104/effect_report_city_07.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_report_city_07.php?ct=金門縣">金門縣</option>
    <option value="104/effect_report_city_07.php?ct=連江縣">連江縣</option>
    <option value="104/effect_report_city_07.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op104_7" name="op104_7" value="查詢" OnClick="window.open(document.getElementById('op104_7').value)"><br />
<p>
<div align="center" style="background-color:#FC9">103年度執行成果報表</div>
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各補助項目執行成果一覽表
<Select id="op103_all" name="op103_all" Size=1>
	<option value="103/effect_report_city_all.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_all.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_all.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_all.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_all.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_all.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_all.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_all.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_all.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_all.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_all.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_all.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_all.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_all.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_all.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_all.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_all.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_all.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_all.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_all.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_all.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_all.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_all.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_all" name="op103_all" value="查詢" OnClick="window.open(document.getElementById('op103_all').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各校各補助項目執行成果列表
<Select id="op103_school" name="op103_school" Size=1>
	<option value="103/effect_report_city_school.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_school.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_school.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_school.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_school.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_school.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_school.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_school.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_school.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_school.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_school.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_school.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_school.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_school.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_school.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_school.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_school.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_school.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_school.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_school.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_school.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_school.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_school.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_school" name="op103_school" value="查詢" OnClick="window.open(document.getElementById('op103_school').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目一
<Select id="op103_1" name="op103_1" Size=1>
	<option value="103/effect_report_city_01.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_01.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_01.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_01.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_01.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_01.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_01.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_01.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_01.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_01.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_01.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_01.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_01.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_01.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_01.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_01.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_01.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_01.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_01.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_01.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_01.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_01.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_01.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_1" name="op103_1" value="查詢" OnClick="window.open(document.getElementById('op103_1').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目二
<Select id="op103_2" name="op103_2" Size=1>
	<option value="103/effect_report_city_02.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_02.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_02.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_02.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_02.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_02.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_02.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_02.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_02.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_02.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_02.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_02.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_02.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_02.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_02.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_02.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_02.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_02.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_02.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_02.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_02.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_02.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_02.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_2" name="op103_2" value="查詢" OnClick="window.open(document.getElementById('op103_2').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目三
<Select id="op103_3" name="op103_3" Size=1>
	<option value="103/effect_report_city_03.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_03.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_03.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_03.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_03.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_03.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_03.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_03.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_03.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_03.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_03.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_03.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_03.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_03.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_03.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_03.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_03.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_03.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_03.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_03.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_03.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_03.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_03.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_3" name="op103_3" value="查詢" OnClick="window.open(document.getElementById('op103_3').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目四
<Select id="op103_4" name="op103_4" Size=1>
	<option value="103/effect_report_city_04.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_04.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_04.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_04.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_04.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_04.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_04.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_04.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_04.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_04.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_04.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_04.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_04.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_04.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_04.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_04.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_04.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_04.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_04.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_04.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_04.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_04.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_04.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_4" name="op103_4" value="查詢" OnClick="window.open(document.getElementById('op103_4').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目五
<Select id="op103_5" name="op103_5" Size=1>
	<option value="103/effect_report_city_05.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_05.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_05.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_05.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_05.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_05.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_05.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_05.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_05.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_05.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_05.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_05.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_05.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_05.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_05.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_05.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_05.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_05.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_05.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_05.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_05.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_05.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_05.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_5" name="op103_5" value="查詢" OnClick="window.open(document.getElementById('op103_5').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目六
<Select id="op103_6" name="op103_6" Size=1>
	<option value="103/effect_report_city_06.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_06.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_06.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_06.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_06.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_06.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_06.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_06.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_06.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_06.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_06.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_06.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_06.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_06.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_06.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_06.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_06.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_06.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_06.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_06.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_06.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_06.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_06.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_6" name="op103_6" value="查詢" OnClick="window.open(document.getElementById('op103_6').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目七
<Select id="op103_7" name="op103_7" Size=1>
	<option value="103/effect_report_city_07.php?ct=新北市">新北市</option>
	<option value="103/effect_report_city_07.php?ct=臺北市">臺北市</option>
	<option value="103/effect_report_city_07.php?ct=臺中市">臺中市</option>
    <option value="103/effect_report_city_07.php?ct=臺南市">臺南市</option>
    <option value="103/effect_report_city_07.php?ct=高雄市">高雄市</option>
    <option value="103/effect_report_city_07.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_report_city_07.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_report_city_07.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_report_city_07.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_report_city_07.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_report_city_07.php?ct=南投縣">南投縣</option>
    <option value="103/effect_report_city_07.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_report_city_07.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_report_city_07.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_report_city_07.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_report_city_07.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_report_city_07.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_report_city_07.php?ct=基隆市">基隆市</option>
    <option value="103/effect_report_city_07.php?ct=新竹市">新竹市</option>
    <option value="103/effect_report_city_07.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_report_city_07.php?ct=金門縣">金門縣</option>
    <option value="103/effect_report_city_07.php?ct=連江縣">連江縣</option>
    <option value="103/effect_report_city_07.php?ct=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op103_7" name="op103_7" value="查詢" OnClick="window.open(document.getElementById('op103_7').value)"><br />
<p>
<div align="center" style="background-color:#FC9">102年度執行成果報表</div>
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各補助項目執行成果一覽表
<Select id="op102_all" name="op102_all" Size=1>
	<option value="effect_102_report_city_all.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_all.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_all.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_all.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_all.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_all.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_all.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_all.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_all.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_all.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_all.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_all.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_all.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_all.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_all.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_all.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_all.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_all.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_all.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_all.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_all.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_all.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_all.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_all" name="op102_all" value="查詢" OnClick="window.open(document.getElementById('op102_all').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各校各補助項目執行成果列表
<Select id="op102_school" name="op102_school" Size=1>
	<option value="effect_102_report_city_school.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_school.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_school.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_school.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_school.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_school.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_school.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_school.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_school.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_school.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_school.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_school.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_school.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_school.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_school.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_school.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_school.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_school.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_school.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_school.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_school.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_school.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_school.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_school" name="op102_school" value="查詢" OnClick="window.open(document.getElementById('op102_school').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目一
<Select id="op102_1" name="op102_1" Size=1>
	<option value="effect_102_report_city_01.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_01.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_01.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_01.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_01.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_01.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_01.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_01.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_01.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_01.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_01.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_01.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_01.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_01.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_01.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_01.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_01.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_01.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_01.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_01.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_01.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_01.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_01.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_1" name="op102_1" value="查詢" OnClick="window.open(document.getElementById('op102_1').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目二
<Select id="op102_2" name="op102_2" Size=1>
	<option value="effect_102_report_city_02.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_02.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_02.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_02.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_02.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_02.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_02.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_02.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_02.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_02.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_02.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_02.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_02.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_02.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_02.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_02.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_02.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_02.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_02.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_02.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_02.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_02.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_02.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_2" name="op102_2" value="查詢" OnClick="window.open(document.getElementById('op102_2').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目三
<Select id="op102_3" name="op102_3" Size=1>
	<option value="effect_102_report_city_03.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_03.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_03.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_03.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_03.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_03.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_03.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_03.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_03.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_03.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_03.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_03.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_03.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_03.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_03.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_03.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_03.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_03.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_03.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_03.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_03.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_03.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_03.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_3" name="op102_3" value="查詢" OnClick="window.open(document.getElementById('op102_3').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目四
<Select id="op102_4" name="op102_4" Size=1>
	<option value="effect_102_report_city_04.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_04.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_04.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_04.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_04.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_04.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_04.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_04.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_04.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_04.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_04.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_04.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_04.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_04.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_04.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_04.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_04.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_04.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_04.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_04.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_04.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_04.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_04.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_4" name="op102_4" value="查詢" OnClick="window.open(document.getElementById('op102_4').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目五
<Select id="op102_5" name="op102_5" Size=1>
	<option value="effect_102_report_city_05.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_05.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_05.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_05.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_05.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_05.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_05.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_05.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_05.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_05.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_05.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_05.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_05.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_05.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_05.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_05.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_05.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_05.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_05.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_05.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_05.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_05.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_05.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_5" name="op102_5" value="查詢" OnClick="window.open(document.getElementById('op102_5').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目六
<Select id="op102_6" name="op102_6" Size=1>
	<option value="effect_102_report_city_06.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_06.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_06.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_06.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_06.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_06.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_06.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_06.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_06.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_06.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_06.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_06.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_06.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_06.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_06.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_06.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_06.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_06.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_06.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_06.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_06.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_06.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_06.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_6" name="op102_6" value="查詢" OnClick="window.open(document.getElementById('op102_6').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目七
<Select id="op102_7" name="op102_7" Size=1>
	<option value="effect_102_report_city_07.php?cityname=新北市">新北市</option>
	<option value="effect_102_report_city_07.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_report_city_07.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_report_city_07.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_report_city_07.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_report_city_07.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_report_city_07.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_report_city_07.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_report_city_07.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_report_city_07.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_report_city_07.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_report_city_07.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_report_city_07.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_report_city_07.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_report_city_07.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_report_city_07.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_report_city_07.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_report_city_07.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_report_city_07.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_report_city_07.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_report_city_07.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_report_city_07.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_report_city_07.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op102_7" name="op102_7" value="查詢" OnClick="window.open(document.getElementById('op102_7').value)"><br />
<p>
<div align="center" style="background-color:#FC9">101年度執行成果報表</div>
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市自評表
<Select id="op22" name="op22" Size=1>
	<option value="effect_101_city_01.php?cityname=新北市">新北市</option>
	<option value="effect_101_city_01.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_city_01.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_city_01.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_city_01.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_city_01.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_city_01.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_city_01.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_city_01.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_city_01.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_city_01.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_city_01.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_city_01.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_city_01.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_city_01.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_city_01.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_city_01.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_city_01.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_city_01.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_city_01.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_city_01.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_city_01.php?cityname=連江縣">連江縣</option>
</Select>
<input Type="Button" id="op22" name="op22" value="查詢" OnClick="window.open(document.getElementById('op22').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各補助項目執行成果一覽表
<Select id="op11" name="op11" Size=1>
	<option value="effect_101_report_city_all.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_all.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_all.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_all.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_all.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_all.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_all.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_all.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_all.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_all.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_all.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_all.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_all.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_all.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_all.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_all.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_all.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_all.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_all.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_all.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_all.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_all.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_all.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op11" name="op11" value="查詢" OnClick="window.open(document.getElementById('op11').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各校各補助項目執行成果列表
<Select id="op12" name="op12" Size=1>
	<option value="effect_101_report_city_school.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_school.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_school.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_school.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_school.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_school.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_school.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_school.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_school.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_school.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_school.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_school.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_school.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_school.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_school.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_school.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_school.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_school.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_school.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_school.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_school.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_school.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_school.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op12" name="op12" value="查詢" OnClick="window.open(document.getElementById('op12').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目一
<Select id="op13" name="op13" Size=1>
	<option value="effect_101_report_city_01.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_01.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_01.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_01.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_01.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_01.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_01.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_01.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_01.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_01.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_01.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_01.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_01.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_01.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_01.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_01.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_01.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_01.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_01.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_01.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_01.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_01.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_01.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op13" name="op13" value="查詢" OnClick="window.open(document.getElementById('op13').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目二
<Select id="op14" name="op14" Size=1>
	<option value="effect_101_report_city_02.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_02.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_02.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_02.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_02.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_02.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_02.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_02.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_02.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_02.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_02.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_02.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_02.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_02.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_02.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_02.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_02.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_02.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_02.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_02.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_02.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_02.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_02.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op14" name="op14" value="查詢" OnClick="window.open(document.getElementById('op14').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目三
<Select id="op15" name="op15" Size=1>
	<option value="effect_101_report_city_03.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_03.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_03.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_03.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_03.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_03.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_03.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_03.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_03.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_03.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_03.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_03.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_03.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_03.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_03.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_03.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_03.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_03.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_03.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_03.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_03.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_03.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_03.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op15" name="op15" value="查詢" OnClick="window.open(document.getElementById('op15').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目四
<Select id="op16" name="op16" Size=1>
	<option value="effect_101_report_city_04.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_04.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_04.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_04.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_04.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_04.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_04.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_04.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_04.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_04.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_04.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_04.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_04.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_04.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_04.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_04.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_04.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_04.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_04.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_04.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_04.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_04.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_04.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op16" name="op16" value="查詢" OnClick="window.open(document.getElementById('op16').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目五
<Select id="op17" name="op17" Size=1>
	<option value="effect_101_report_city_05.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_05.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_05.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_05.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_05.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_05.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_05.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_05.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_05.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_05.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_05.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_05.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_05.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_05.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_05.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_05.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_05.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_05.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_05.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_05.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_05.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_05.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_05.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op17" name="op17" value="查詢" OnClick="window.open(document.getElementById('op17').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目六
<Select id="op18" name="op18" Size=1>
	<option value="effect_101_report_city_06.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_06.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_06.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_06.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_06.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_06.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_06.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_06.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_06.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_06.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_06.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_06.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_06.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_06.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_06.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_06.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_06.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_06.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_06.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_06.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_06.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_06.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_06.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op18" name="op18" value="查詢" OnClick="window.open(document.getElementById('op18').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目七
<Select id="op19" name="op19" Size=1>
	<option value="effect_101_report_city_07.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_07.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_07.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_07.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_07.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_07.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_07.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_07.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_07.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_07.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_07.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_07.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_07.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_07.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_07.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_07.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_07.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_07.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_07.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_07.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_07.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_07.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_07.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op19" name="op19" value="查詢" OnClick="window.open(document.getElementById('op19').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目八
<Select id="op20" name="op20" Size=1>
	<option value="effect_101_report_city_08.php?cityname=新北市">新北市</option>
	<option value="effect_101_report_city_08.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_report_city_08.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_report_city_08.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_report_city_08.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_report_city_08.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_report_city_08.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_report_city_08.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_report_city_08.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_report_city_08.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_report_city_08.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_report_city_08.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_report_city_08.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_report_city_08.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_report_city_08.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_report_city_08.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_report_city_08.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_report_city_08.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_report_city_08.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_report_city_08.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_report_city_08.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_report_city_08.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_report_city_08.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op20" name="op20" value="查詢" OnClick="window.open(document.getElementById('op20').value)"><br />
<p>
<div align="center" style="background-color:#FC9">100年度執行成果報表</div>
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市自評表
<Select id="op21" name="op21" Size=1>
	<option value="effect_100_city_01.php?cityname=新北市">新北市</option>
	<option value="effect_100_city_01.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_city_01.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_city_01.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_city_01.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_city_01.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_city_01.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_city_01.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_city_01.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_city_01.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_city_01.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_city_01.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_city_01.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_city_01.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_city_01.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_city_01.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_city_01.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_city_01.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_city_01.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_city_01.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_city_01.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_city_01.php?cityname=連江縣">連江縣</option>
</Select>
<input Type="Button" id="op21" name="op21" value="查詢" OnClick="window.open(document.getElementById('op21').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各補助項目執行成果一覽表
<Select id="op1" name="op1" Size=1>
	<option value="effect_100_report_city_all.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_all.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_all.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_all.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_all.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_all.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_all.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_all.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_all.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_all.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_all.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_all.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_all.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_all.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_all.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_all.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_all.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_all.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_all.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_all.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_all.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_all.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_all.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op1" name="op1" value="查詢" OnClick="window.open(document.getElementById('op1').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市各校各補助項目執行成果列表
<Select id="op2" name="op2" Size=1>
	<option value="effect_100_report_city_school.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_school.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_school.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_school.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_school.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_school.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_school.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_school.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_school.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_school.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_school.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_school.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_school.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_school.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_school.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_school.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_school.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_school.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_school.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_school.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_school.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_school.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_school.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op2" name="op2" value="查詢" OnClick="window.open(document.getElementById('op2').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目一
<Select id="op3" name="op3" Size=1>
	<option value="effect_100_report_city_01.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_01.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_01.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_01.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_01.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_01.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_01.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_01.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_01.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_01.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_01.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_01.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_01.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_01.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_01.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_01.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_01.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_01.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_01.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_01.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_01.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_01.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_01.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op3" name="op3" value="查詢" OnClick="window.open(document.getElementById('op3').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目二
<Select id="op4" name="op4" Size=1>
	<option value="effect_100_report_city_02.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_02.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_02.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_02.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_02.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_02.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_02.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_02.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_02.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_02.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_02.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_02.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_02.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_02.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_02.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_02.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_02.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_02.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_02.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_02.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_02.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_02.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_02.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op4" name="op4" value="查詢" OnClick="window.open(document.getElementById('op4').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目三
<Select id="op5" name="op5" Size=1>
	<option value="effect_100_report_city_03.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_03.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_03.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_03.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_03.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_03.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_03.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_03.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_03.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_03.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_03.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_03.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_03.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_03.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_03.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_03.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_03.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_03.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_03.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_03.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_03.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_03.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_03.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op5" name="op5" value="查詢" OnClick="window.open(document.getElementById('op5').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目四
<Select id="op6" name="op6" Size=1>
	<option value="effect_100_report_city_04.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_04.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_04.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_04.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_04.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_04.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_04.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_04.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_04.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_04.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_04.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_04.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_04.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_04.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_04.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_04.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_04.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_04.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_04.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_04.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_04.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_04.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_04.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op6" name="op6" value="查詢" OnClick="window.open(document.getElementById('op6').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目五
<Select id="op7" name="op7" Size=1>
	<option value="effect_100_report_city_05.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_05.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_05.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_05.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_05.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_05.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_05.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_05.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_05.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_05.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_05.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_05.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_05.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_05.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_05.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_05.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_05.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_05.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_05.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_05.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_05.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_05.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_05.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op7" name="op7" value="查詢" OnClick="window.open(document.getElementById('op7').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目六
<Select id="op8" name="op8" Size=1>
	<option value="effect_100_report_city_06.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_06.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_06.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_06.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_06.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_06.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_06.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_06.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_06.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_06.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_06.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_06.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_06.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_06.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_06.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_06.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_06.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_06.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_06.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_06.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_06.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_06.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_06.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op8" name="op8" value="查詢" OnClick="window.open(document.getElementById('op8').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目七
<Select id="op9" name="op9" Size=1>
	<option value="effect_100_report_city_07.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_07.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_07.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_07.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_07.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_07.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_07.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_07.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_07.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_07.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_07.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_07.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_07.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_07.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_07.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_07.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_07.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_07.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_07.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_07.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_07.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_07.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_07.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op9" name="op9" value="查詢" OnClick="window.open(document.getElementById('op9').value)"><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" />檢視縣市執行成果：補助項目八
<Select id="op10" name="op10" Size=1>
	<option value="effect_100_report_city_08.php?cityname=新北市">新北市</option>
	<option value="effect_100_report_city_08.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_report_city_08.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_report_city_08.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_report_city_08.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_report_city_08.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_report_city_08.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_report_city_08.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_report_city_08.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_report_city_08.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_report_city_08.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_report_city_08.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_report_city_08.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_report_city_08.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_report_city_08.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_report_city_08.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_report_city_08.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_report_city_08.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_report_city_08.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_report_city_08.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_report_city_08.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_report_city_08.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_report_city_08.php?cityname=全國">全國(約1分鐘)</option>
</Select>
<input Type="Button" id="op10" name="op10" value="查詢" OnClick="window.open(document.getElementById('op10').value)"><br />

<?php
include "../../footer.php";
?>