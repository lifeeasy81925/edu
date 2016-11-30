<?php
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
	{
?>
		<SCRIPT LANGUAGE="JavaScript">
		</script>
<?
	}
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
?>
<INPUT TYPE="button" VALUE="回首頁" onClick="location='/edu'">
<?
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
?>
<p>
<?
	echo $city;
	echo "教育局(處)，";
	echo $cityman;
	echo "，您好！歡迎使用本系統。";
?>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FC9;">
			106年度 指標及經費審查區
		</td>
	</tr>
</table><p>

<img src="/edu/images/edit.png"   align="absmiddle" /> <a href="106/allowance_examine.php" target="_self"> 審核補助項目</a><p>
<img src="../../../images/view01.png" align="absmiddle" > <a href="106/print_money_reexamined.php" target="_self"> 審核不通過且列入退件名單</a><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FC9;">106年度 報表資料列印區</td>
	</tr>
</table><p>

<img src="./images/dot_02.gif" align="absmiddle" /><a href="106/print_total_school.php?y=106" target="_blank">1.學校申請結果列表</a><p>
<img src="./images/dot_02.gif" align="absmiddle" />2.學校申請填報狀態名單
<Select id="opt_106_1" name="opt_106_1" Size="1">
	<option value="106/print_school_finish_1.php">已填報完成學校名單</option>
	<option value="106/print_school_finish_2.php">未填報完成學校名單</option>
</Select>
<input Type="button" id="btn_106_1" name="btn_106_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_106_1').value"><p>
<img src="./images/dot_02.gif" align="absmiddle" /><a href="106/print_city_examine.php"  target="_blank">3.縣市補助項目經費彙整表(表Ⅱ-2)</a><p>
<img src="./images/dot_02.gif" align="absmiddle" /><a href="106/print_city_examine2.php" target="_blank">4.縣市指標界定調查結果彙整表(表Ⅱ-3)</a><p>
<img src="./images/dot_02.gif" align="absmiddle" /><a href="106/print_education_examine.php" target="_blank">5.教育部複核結果</a>
<font color=red>(請通知學校於12月11日至12月15日上網瀏覽複審結果)</font><p>
<img src="./images/dot_02.gif" align="absmiddle" /><a href="106/city_search_school.php" target="_self">6.各校需求彙整表 (含審核意見)</a><p>
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

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FC9;">執行成效及其他查詢區</td>
	</tr>
</table><p>

<img src="./images/dot_01.gif" align="absmiddle" /><a href = "print_schoolman.php">查詢各校業務承辦人通訊錄</a><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_report_city.php" target="_self">檢視縣市及各校執行成果報表 (104、103、102年度)</a><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="105/effect_list.php">105年度 各校執行成果填報狀況</a><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="104/effect_list.php">104年度 各校執行成果填報狀況</a><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="103/effect_list.php">103年度 各校執行成果填報狀況</a><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_102_list.php?cityname=<? echo $city;?>">102年度 各校執行成果填報狀況</a><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="106/print_school_reason.php" target="_blank">檢視學校資料警示原因與說明列表</a><p>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="106/history_data.php" target="_self">歷史資料區</a><p>

<? if($cityno == '0' ){echo "<!--";}  // 特殊功能區(縣市承辦人) ?>
	<table border="0">
		<tr height="30px">
			<td style="text-align:center; background-color:#FC9;">
				以下為特殊功能區(縣市主要帳號才會顯示)
			</td>
		</tr>
	</table>
	<p>	
	<img src="./images/dot_03.gif" align="absmiddle" /><a href="examine_setting_check.php" target="_self">審查權限設定 (教育局主管專用)</a><p>
	<img src="./images/dot_03.gif" align="absmiddle" /><a href="106/upload_data.php" target="_self">縣市上傳檔案</a><p>
<? if($cityno == '0' ){echo "-->";} ?>

<? include "../../footer.php"; ?>

<?
/*
<img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_101_city_01.php" target="_self">101年度縣市自評表</a><font color=red> (填寫期間：101/5/1~可持續更新)</font><p>
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="101city_survey_01.php" target="_self">101年度推動教育優先區計畫執行情形調查問卷</a><font color=red> (填寫期間：101/5/1~5/20)</font><p>
<img src="./images/dot_01.gif" align="absmiddle" /><a href="effect_100_city_01.php" target="_self">100年度縣市自評表</a><font color=red> (填寫期間：101/5/1~5/20)</font><p>
*/
?>