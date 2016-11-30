<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_city.php";
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_index.php'">
<?
echo $city;
echo "教育局,";
echo $cityman;
echo ",您好,歡迎使用本系統!";
?>
</p>
進階查詢：<? echo $city; ?><br />
<div align="center" style="background-color:#FC9">申請資料</div>
<img src="./images/dot_01.gif" align="absmiddle" />查詢學校申請填報狀態名單 (以填報總表上傳為依據) (101年度)
<Select id="nopost" name="nopost" Size=1>
	<option value="print_school_finish_1.php">已填報完成學校名單</option>
	<option value="print_school_finish_2.php">未填報完成學校名單</option>
</Select>
<input Type="Button" id="nopost" name="nopost" value="查詢"
OnClick="self.location.href=document.getElementById('nopost').value">
<p>
<div align="center" style="background-color:#FC9">成效評估資料</div>
<img src="./images/dot_01.gif" align="absmiddle" />
<p>
<div align="center" style="background-color:#FC9">其他資料</div>
<img src="./images/dot_01.gif" align="absmiddle" /><a href = "print_schoolman.php">列印各校業務承辦人通訊錄</a>
<!--
<div align="left" style="background-color:#FFF">
查詢未填報指標項目之校數及學校名單<br>
<Select id="nopost" name="nopost" Size=1>
	<Option>請選擇項目
		<option value="print_nopost_table1.php">未填報【指標一】校數及學校名單</option>
		<option value="print_nopost_table2.php">未填報【指標二】校數及學校名單</option>
		<option value="print_nopost_table3.php">未填報【指標三】校數及學校名單</option>
		<option value="print_nopost_table4.php">未填報【指標四】校數及學校名單</option>
		<option value="print_nopost_table5.php">未填報【指標五】校數及學校名單</option>
		<option value="print_nopost_table6.php">未填報【指標六】校數及學校名單</option>
</Select>
<input Type="Button" id="nopost" name="nopost" value="查詢"
OnClick="self.location.href=document.getElementById('nopost').value">
</div>
<hr>
<div align="left" style="background-color:#FFF">
查詢不符合指標項目之校數及學校名單<br>
<Select id="allowance1" name="allowance1" Size=1>
	<Option>請選擇指標
		<option value="print_point11_table.php?id=0">不符合【指標一-1】校數及學校名單</option>
		<option value="print_point12_table.php?id=0">不符合【指標一-2】校數及學校名單</option>
		<option value="print_point13_table.php?id=0">不符合【指標一-3】校數及學校名單</option>
		<option value="print_point14_table.php?id=0">不符合【指標一-4】校數及學校名單單</option>
		<option value="print_point21_table.php?id=0">不符合【指標二-1】校數及學校名單</option>
		<option value="print_point22_table.php?id=0">不符合【指標二-2】校數及學校名單</option>
		<option value="print_point23_table.php?id=0">不符合【指標二-3】校數及學校名單</option>
		<option value="print_point3_table.php?id=0">不符合【指標三】校數及學校名單</option>
		<option value="print_point4_table.php?id=0">不符合【指標四】校數及學校名單</option>
		<option value="print_point5_table.php?id=0">不符合【指標五】校數及學校名單</option>
		<option value="print_point6_table.php?id=0">不符合【指標六】校數及學校名單</option>
</Select>
<input Type="Button" id="allowance1" name="allowance1" value="查詢"
OnClick="self.location.href=document.getElementById('allowance1').value">
</div>
<hr>
<div align="left" style="background-color:#FFF">
查詢符合指標項目之校數及學校名單<br>
<Select id="allowance2" name="allowance2" Size=1>
	<Option>請選擇指標
		<option value="print_point11_table.php?id=1">符合【指標一-1】校數及學校名單</option>
		<option value="print_point12_table.php?id=1">符合【指標一-2】校數及學校名單</option>
		<option value="print_point13_table.php?id=1">符合【指標一-3】校數及學校名單</option>
		<option value="print_point14_table.php?id=1">符合【指標一-4】校數及學校名單單</option>
		<option value="print_point21_table.php?id=1">符合【指標二-1】校數及學校名單</option>
		<option value="print_point22_table.php?id=1">符合【指標二-2】校數及學校名單</option>
		<option value="print_point23_table.php?id=1">符合【指標二-3】校數及學校名單</option>
		<option value="print_point3_table.php?id=1">符合【指標三】校數及學校名單</option>
		<option value="print_point4_table.php?id=1">符合【指標四】校數及學校名單</option>
		<option value="print_point5_table.php?id=1">符合【指標五】校數及學校名單</option>
		<option value="print_point6_table.php?id=1">符合【指標六】校數及學校名單</option>
</Select>
<input Type="Button" id="allowance2" name="allowance2" value="查詢"
OnClick="self.location.href=document.getElementById('allowance2').value">
</div>
<hr>
<div align="left" style="background-color:#FFF">
查詢符合申請項目,但未申請補助經費校數及學校名單<br>
	<Select id="allowance3" name="allowance3" Size=1>
	<Option>請選擇指標
		<option value="print_a1_table.php">符合申請項目一但未申請補助經費校數及學校名單</option>
		<option value="print_a2_table.php">符合申請項目二但未申請補助經費校數及學校名單</option>
		<option value="print_a3_table.php">符合申請項目三但未申請補助經費校數及學校名單</option>
		<option value="print_a4_table.php">符合申請項目四但未申請補助經費校數及學校名單</option>
		<option value="print_a5_table.php">符合申請項目五但未申請補助經費校數及學校名單</option>
		<option value="print_a6_table.php">符合申請項目六但未申請補助經費校數及學校名單</option>
		<option value="print_a7_table.php">符合申請項目七但未申請補助經費校數及學校名單</option>
		<option value="print_a8_table.php">符合申請項目八但未申請補助經費校數及學校名單</option>
</Select>
<input Type="Button" id="allowance3" name="allowance3" value="查詢"
OnClick="self.location.href=document.getElementById('allowance3').value">
</div>
<hr>
-->

</body>
<?php
include "../../footer.php";
?>
</html>