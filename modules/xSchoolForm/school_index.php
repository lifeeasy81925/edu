<?php
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')){}
	
	include "../../mainfile.php";
	include "../../header.php";
	include "../function/connect_school.php";
	include "../function/config_for_106.php";

	$sql = " SELECT * FROM schooldata_year where account = '$username' and school_year = '$school_year' ";
	
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		$keep = $row['keep'];  // keep：1為沿用，0為新建，104年(含)以前無此欄位
	}
?>

<p>
<noscript>
	<p style="color: Red">抱歉，您的瀏覽器不支援javascript語法！將無法正確使用本系統的功能。請啟用Javascript語法。</p>
	<p>
		<a href="js_open.html" target="_blank"><strong>(IE啟用Javascript方法)</strong></a> 或
		<a href="https://www.google.com/intl/zh-TW/chrome/browser/" target="_blank"><strong>使用自由軟體Google Chrome瀏覽器</strong></a>
	</p>
</noscript>

<p>
<hr>
<p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#D1F1F1;">
			<font size="+1">106年度 學校填報申請區</font>
		</td>
	</tr>
</table>
<p>

● 填報申請3步驟：<p>
<img src="/edu/images/edit.png"   align="absmiddle" /><a href="106/schooldata_1_new.php"        target="_self"> 1.填寫學校資料</a><p>
<img src="/edu/images/edit.png"   align="absmiddle" /><a href="106/school_select_allowance.php" target="_self"> 2.申請補助經費</a><p>
<img src="/edu/images/upload.png" align="absmiddle" /><a href="106/school_upload_file.php"      target="_self"> 3.上傳檢附資料</a><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#D1F1F1;">
			<font size="+1">106年度 審核狀態查詢區</font>
		</td>
	</tr>
</table>
<p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="106/school_view_status.php"  target="_self" > 106年度 填報申請狀態</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_city_examined.php" target="_blank"> 106年度 檢視初審結果</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_edu_examined.php"  target="_blank"> 106年度 檢視複審結果</a><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#D1F1F1;">
			<font size="+1">成效評估區</font>
		</td>
	</tr>
</table>
<p>

<img src="/edu/images/assignment.png" align="absmiddle" /><a href="106/effect_school_list.php" target="_self"> 106年度 執行成效與修正後計畫</a>（105.12.25開放）<p>
<img src="/edu/images/assignment.png" align="absmiddle" /><a href="105/effect_school_list.php" target="_self"> 105年度 執行成效與修正後計畫</a>（可持續更新）<p>
<img src="/edu/images/assignment.png" align="absmiddle" /><a href="104/effect_school_list.php" target="_self"> 104年度 執行成效與修正後計畫</a>（可持續更新）<p>
<img src="/edu/images/assignment.png" align="absmiddle" /><a href="103/effect_school_list.php" target="_self"> 103年度 執行成效與修正後計畫</a>（可持續更新）<p>

<p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#D1F1F1;">
			<font size="+1">歷史查詢區</font>
		</td>
	</tr>
</table>
<p>

<img src="/edu/images/history.png" align="absmiddle" /><a href="106/history_data.php" target="_self"> 歷史資料查詢區</a><p>

<?php include "../../footer.php"; ?>

<?
/*
<!-- 可用色碼 FFCDFE FFCDE5	FFCECD FFE7CD FEFFCD E5FFCD CDFFCE CDFFE7 CDFEFF CDE5FF CECDFF E7CDFF -->
<!-- <img src="/edu/images/view01.png" align="absmiddle" /><a href="105/print_city_examined.php" target="_new">105年度 檢視縣市初審結果</a>（104.11.18開放）<p> -->
<!-- <img src="/edu/images/view01.png" align="absmiddle" /><a href="104/print_city_examined.php" target="_new">檢視縣市初審結果</a><p> -->
<!-- <img src="/edu/images/view01.png" align="absmiddle" /><a href="103/print_city_examined.php" target="_new">檢視縣市初審結果</a><p> -->
<!-- <img src="/edu/images/view01.png" align="absmiddle" /><a href="102print_city_examined.php" target="_new">檢視縣市初審結果</a><p> -->
<!-- <img src="/edu/images/view01.png" align="absmiddle" /><a href="102_school_surplus.php" target="_new">檢視與填報結餘款調查表</a><p> -->
<!-- 1040519修改，不開放102年度 -->
<!-- <img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="effect_102_school_list.php" target="_self">102年度 執行進度與成果填報</a><font color="#FF0000"> (填報時間：已開始，<mark>可持續更新</mark>)</font><p> -->
<!-- 103年度以前的問卷 -->
<!-- <img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="103/questionnaire.php" target="_self">103年度 推動教育優先區計畫調查問卷</a><p> -->
<!-- <img src="/edu/images/view01.png" align="absmiddle" /><a href="101school_survey_01.php" target="_self">101年度推動教育優先區計畫執行情形調查問卷──學校<font color="#FF0000"> (101/4/10 - 4/30)</font><img src="../../images/↑問卷填寫由此進.gif" width="401" height="31" /></a><p>-->
*/
?>