<?php
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
	{
		?>
			<SCRIPT LANGUAGE="JavaScript"></script>
		<?
	}
	include "../../mainfile.php";
	include "../../header.php";

	session_start();
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
?>

<?
	while($row = mysql_fetch_row($result))
	{
		$cityid  = $row[0];  // ID
		$city    = $row[1];  // 縣市名稱或教育部
		$cityman = $row[2];  // 身分名稱
		$cityno  = $row[4];  // 身分編號
	}
?>

<? echo $city . "委員(" . $cityid . ")，" . $cityman . "，您好，歡迎使用本系統。"; ?>

<p>
<hr>
<p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFCCCC;">
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
		<td style="text-align:center; background-color:#FFCCCC;">
			<font size="+1">106年度 資料查詢區</font>
		</td>
	</tr>
</table><p>

<img src="/edu/images/view01.png" align="absmiddle" /><a href="106/school_update.php"     target="_self"> 2.學校指標、經費與檔案查詢</a><p>
<img src="/edu/images/view01.png" align="absmiddle" /><a href="106/print_city_finish.php" target="_self"> 3.縣市檔案上傳狀態查詢</a><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFCCCC;">
			<font size="+1">106年度 報表列印區</font>
		</td>
	</tr>
</table><p>

<b>全部學校列表：</b><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_city_examine2.php" target="_blank"> 4.指標界定調查結果彙整表</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_edu_examine2.php"  target="_blank"> 5.補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /> 6.經費申請與審核意見表（依補助項目）
<Select id="opt_106_2" name="opt_106_2" Size=1>
	<option value="106/print_suggest.php?id=1">補助一：親職教育</option>
	<option value="106/print_suggest.php?id=2">補助二：學校特色</option>
	<option value="106/print_suggest.php?id=3">補助三：充實設備</option>
	<option value="106/print_suggest.php?id=4">補助四：原民特色</option>
	<option value="106/print_suggest.php?id=5">補助五：補助交通</option>
	<option value="106/print_suggest.php?id=6">補助六：整修場所</option>
</Select>
<input Type="Button" id="btn_106_2" name="btn_106_2" value="查詢" OnClick="window.open(document.getElementById('opt_106_2').value)"><p>

<hr>

<b>依縣市列表：</b><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_city_examine3.php" target="_blank"> 7.補助項目經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_city_examine.php"  target="_blank"> 8.補助項目經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_edu_examine1.php"  target="_blank"> 9.補助項目經費彙整表（教育部複審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_edu_examine5.php"  target="_blank"> 10.經常門與資本門經費彙整表（學校申請）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_edu_examine4.php"  target="_blank"> 11.經常門與資本門經費彙整表（縣市初審）</a><p>
<img src="/edu/images/print.png" align="absmiddle" /><a href="106/print_edu_examine3.php"  target="_blank"> 12.經常門與資本門經費彙整表（教育部複審）</a><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFCCCC;">
			<font size="+1">執行成效及其他查詢區</font>
		</td>
	</tr>
</table><p>

<img src="/edu/images/assignment.png" align="absmiddle" /><a href="effect_report_city.php" target="_self"> 13.縣市及學校執行成效資料</a><p>
<img src="/edu/images/history.png"    align="absmiddle" /><a href="106/history_data.php"   target="_self"> 14.歷史資料查詢區</a><p>
<img src="/edu/images/telphone.png"   align="absmiddle" /><a href="print_schoolman.php"    target="_self"> 15.各校業務承辦人聯絡資料</a><p>

<table border="0">
	<tr height="30px">
		<td style="text-align:center; background-color:#FFCCCC;">
			<font size="+1">教育部主管專區</font>
		</td>
	</tr>
</table><p>

<? //教育部特殊權限1 ?>
<div <? if($username != 'edu0001' && $username != 'edu0098' && $username != 'edu0099'){echo "style='display:none'";} ?>>
	<img src="/edu/images/lock.png" align="absmiddle" /><a href="examine_setting_check.php" target="_self"> 16.審查權限設定</a><p>
</div>

<? //教育部特殊權限2 ?>
<div <? if($username != 'edu0098' && $username != 'edu0099'){echo "style='display:none'";} ?>>
	<form action="106/open_school.php" method=post name=form>
		<img src="/edu/images/lock.png" align="absmiddle" /> 17.延長學校填報期限，請輸入學校代碼：
		<input type="text" name="schoolid" size="10">
		<input type="submit" value="送出" name="submit"><p>
	</form>
</div>

<?php include "../../footer.php"; ?>

<?
/*
<input type="reset" value="清除" name="reset">
<!-- http://www.culturemark.com/redirectURL/
window.location="/edu/modules/xEduForm/dlbrowser.php";
// -->
<!-- 1040310修改，隱藏101-102年查詢功能
<img src="/edu/images/dot_03.gif" align="absmiddle" />102年度各校執行成果填報狀況
<Select id="op102_list" name="op102_list" Size=1>
	<option value="effect_102_list.php?cityname=新北市">新北市</option>
	<option value="effect_102_list.php?cityname=臺北市">臺北市</option>
	<option value="effect_102_list.php?cityname=臺中市">臺中市</option>
    <option value="effect_102_list.php?cityname=臺南市">臺南市</option>
    <option value="effect_102_list.php?cityname=高雄市">高雄市</option>
    <option value="effect_102_list.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_102_list.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_102_list.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_102_list.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_102_list.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_102_list.php?cityname=南投縣">南投縣</option>
    <option value="effect_102_list.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_102_list.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_102_list.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_102_list.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_102_list.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_102_list.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_102_list.php?cityname=基隆市">基隆市</option>
    <option value="effect_102_list.php?cityname=新竹市">新竹市</option>
    <option value="effect_102_list.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_102_list.php?cityname=金門縣">金門縣</option>
    <option value="effect_102_list.php?cityname=連江縣">連江縣</option>
    <option value="effect_102_list.php?cityname=全國">全國(需1分鐘)</option>
</Select>
<input Type="Button" id="op102_list" name="op102_list" value="查詢" OnClick="window.open(document.getElementById('op102_list').value)"><br />

<img src="/edu/images/dot_03.gif" align="absmiddle" />101年度各校執行成果填報狀況
<Select id="op3" name="op3" Size=1>
	<option value="effect_101_list.php?cityname=新北市">新北市</option>
	<option value="effect_101_list.php?cityname=臺北市">臺北市</option>
	<option value="effect_101_list.php?cityname=臺中市">臺中市</option>
    <option value="effect_101_list.php?cityname=臺南市">臺南市</option>
    <option value="effect_101_list.php?cityname=高雄市">高雄市</option>
    <option value="effect_101_list.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_101_list.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_101_list.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_101_list.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_101_list.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_101_list.php?cityname=南投縣">南投縣</option>
    <option value="effect_101_list.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_101_list.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_101_list.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_101_list.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_101_list.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_101_list.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_101_list.php?cityname=基隆市">基隆市</option>
    <option value="effect_101_list.php?cityname=新竹市">新竹市</option>
    <option value="effect_101_list.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_101_list.php?cityname=金門縣">金門縣</option>
    <option value="effect_101_list.php?cityname=連江縣">連江縣</option>
    <option value="effect_101_list.php?cityname=全國">全國(需1分鐘)</option>
</Select>
<input Type="Button" id="op3" name="op3" value="查詢" OnClick="window.open(document.getElementById('op3').value)"><br />
<img src="/edu/images/dot_03.gif" align="absmiddle" />100年度各校執行成果填報狀況
<Select id="op2" name="op2" Size=1>
	<option value="effect_100_list.php?cityname=新北市">新北市</option>
	<option value="effect_100_list.php?cityname=臺北市">臺北市</option>
	<option value="effect_100_list.php?cityname=臺中市">臺中市</option>
    <option value="effect_100_list.php?cityname=臺南市">臺南市</option>
    <option value="effect_100_list.php?cityname=高雄市">高雄市</option>
    <option value="effect_100_list.php?cityname=宜蘭縣">宜蘭縣</option>
    <option value="effect_100_list.php?cityname=桃園縣">桃園縣</option>
    <option value="effect_100_list.php?cityname=新竹縣">新竹縣</option>
    <option value="effect_100_list.php?cityname=苗栗縣">苗栗縣</option>
    <option value="effect_100_list.php?cityname=彰化縣">彰化縣</option>
    <option value="effect_100_list.php?cityname=南投縣">南投縣</option>
    <option value="effect_100_list.php?cityname=雲林縣">雲林縣</option>
    <option value="effect_100_list.php?cityname=嘉義縣">嘉義縣</option>
    <option value="effect_100_list.php?cityname=屏東縣">屏東縣</option>
    <option value="effect_100_list.php?cityname=臺東縣">臺東縣</option>
    <option value="effect_100_list.php?cityname=花蓮縣">花蓮縣</option>
    <option value="effect_100_list.php?cityname=澎湖縣">澎湖縣</option>
    <option value="effect_100_list.php?cityname=基隆市">基隆市</option>
    <option value="effect_100_list.php?cityname=新竹市">新竹市</option>
    <option value="effect_100_list.php?cityname=嘉義市">嘉義市</option>
    <option value="effect_100_list.php?cityname=金門縣">金門縣</option>
    <option value="effect_100_list.php?cityname=連江縣">連江縣</option>
    <option value="effect_100_list.php?cityname=全國">全國(需1分鐘)</option>
</Select>
<input Type="Button" id="op2" name="op2" value="查詢" OnClick="window.open(document.getElementById('op2').value)"><br />
 -->
//echo '<img src="/edu/images/dot_03.gif" align="absmiddle" /><a href="print_money_reexamined.php" target="_self">經費審核退回縣市修正清單</a><br />';
//echo '<img src="/edu/images/dot_03.gif" align="absmiddle" /><a href="allmoney_adjust.php" target="_self">審查後總經費調整(教育部主管專用)</a><br />';
<!---<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="102_edu_search_mulit.php" target="_self">複合式報表列印 (102年度)</a> (開發中)<br />--->
<Select id="nopost106" name="nopost106" Size=1>
	<option value="106/print_city_finish.php?mod=Y">已審核完成縣市名單</option>
	<option value="106/print_city_finish.php?mod=N">未審核完成縣市名單</option>
</Select>
<input Type="Button" id="btn_nopost106" name="btn_nopost106" value="查詢" OnClick="self.location.href=document.getElementById('nopost106').value"><p>
<img src="/edu/images/print.png" align="absmiddle" /> 12.縣市初審經費與初審意見表（依補助項目）
<Select id="opt_106_3" name="opt_106_3" Size=1>
	<option value="106/print_suggest_city.php?id=1">補助項目一</option>
	<option value="106/print_suggest_city.php?id=2">補助項目二</option>
	<option value="106/print_suggest_city.php?id=3">補助項目三</option>
	<option value="106/print_suggest_city.php?id=4">補助項目四</option>
	<option value="106/print_suggest_city.php?id=5">補助項目五</option>
	<option value="106/print_suggest_city.php?id=6">補助項目六</option>
	<option value="106/print_suggest_city.php?id=7">補助項目七</option>
</Select>
<input Type="Button" id="btn_106_3" name="btn_106_3" value="查詢" OnClick="window.open(document.getElementById('opt_106_3').value)"><p>
*/
?>