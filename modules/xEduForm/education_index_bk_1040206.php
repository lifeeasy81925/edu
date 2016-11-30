<?php
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE') == true || strpos($_SERVER['HTTP_USER_AGENT'],'11.') )
	{
		//echo $_SERVER['HTTP_USER_AGENT'];
		?>
			<SCRIPT LANGUAGE="JavaScript">
				<!-- http://www.culturemark.com/redirectURL/
				window.location="/edu/modules/xEduForm/dlbrowser.php";
				// -->
			</script>
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
<INPUT TYPE="button" VALUE="回首頁" onClick="location='/edu'">
<table border="0">
	<tr>
		<td style="text-align:center; background-color:#FC9;">104年度 審查區</td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/allowance_examine.php" target="_self">審核補助項目</a></td>
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
<p>
<table border="0">
	<tr>
		<td style="text-align:center; background-color:#FC9;">104年度 報表資料列印區(全國性報表輸出時間約1分鐘)</td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_city_examine3.php" target="_blank">1.縣市申請金額列表</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_city_examine.php" target="_blank">2.縣市初審結果列表</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_city_examine2.php" target="_blank">3.各校指標資料查詢(全國)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_edu_examine1.php" target="_blank">4.教育部審核結果(各縣市)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_edu_examine2.php" target="_blank">5.教育部審核結果(各學校)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_edu_examine5.php" target="_blank">6.申請金額縣市列表(依資本門/經常門劃分)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_edu_examine4.php" target="_blank">7.初審結果縣市列表(依資本門/經常門劃分)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_edu_examine3.php" target="_blank">8.複審結果縣市列表(依資本門/經常門劃分)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" />9.依補助項目查詢初審結果列表
			<Select id="opt_104_3" name="opt_104_3" Size=1>
				<option value="104/print_suggest_city.php?id=1">補助項目一</option>
				<option value="104/print_suggest_city.php?id=2">補助項目二</option>
				<option value="104/print_suggest_city.php?id=3">補助項目三</option>
				<option value="104/print_suggest_city.php?id=4">補助項目四</option>
				<option value="104/print_suggest_city.php?id=5">補助項目五</option>
				<option value="104/print_suggest_city.php?id=6">補助項目六</option>
				<option value="104/print_suggest_city.php?id=7">補助項目七</option>
			</Select>
			<input Type="Button" id="btn_104_3" name="btn_104_3" value="查詢" OnClick="window.open(document.getElementById('opt_104_3').value)"></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" />10.依補助項目查詢複審結果列表
			<Select id="opt_104_2" name="opt_104_2" Size=1>
				<option value="104/print_suggest.php?id=1">補助項目一</option>
				<option value="104/print_suggest.php?id=2">補助項目二</option>
				<option value="104/print_suggest.php?id=3">補助項目三</option>
				<option value="104/print_suggest.php?id=4">補助項目四</option>
				<option value="104/print_suggest.php?id=5">補助項目五</option>
				<option value="104/print_suggest.php?id=6">補助項目六</option>
				<option value="104/print_suggest.php?id=7">補助項目七</option>
			</Select>
			<input Type="Button" id="btn_104_2" name="btn_104_2" value="查詢" OnClick="window.open(document.getElementById('opt_104_2').value)"></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/school_update.php" target="_self">11.各校填報及審查狀態查詢</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" />12.縣市審核狀態及上傳檔案
			<Select id="nopost104" name="nopost104" Size=1>
				<option value="104/print_city_finish.php?mod=Y">已審核完成縣市名單</option>
				<option value="104/print_city_finish.php?mod=N">未審核完成縣市名單</option>
			</Select><input Type="Button" id="btn_nopost104" name="btn_nopost104" value="查詢" OnClick="self.location.href=document.getElementById('nopost104').value">
		</td>
	</tr>
					
	<!---<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="102_edu_search_mulit.php" target="_self">複合式報表列印 (102年度)</a> (開發中)<br />--->
</table>
<p>
<div align="center" style="background-color:#FC9">執行成效及其他查詢區</div>
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="print_schoolman.php" target="_self">各校業務承辦人通訊錄一覽表</a><br />
<img src="/edu/images/dot_03.gif" align="absmiddle" /><a href="effect_report_city.php" target="_self">檢視縣市執行成果報表 (104、103、102、101、100年度)</a><br />

<img src="/edu/images/dot_03.gif" align="absmiddle" />104年度各校執行成果填報狀況
<Select id="op104_list" name="op104_list" Size=1>
	<option value="104/effect_list.php?ct=新北市">新北市</option>
	<option value="104/effect_list.php?ct=臺北市">臺北市</option>
	<option value="104/effect_list.php?ct=臺中市">臺中市</option>
    <option value="104/effect_list.php?ct=臺南市">臺南市</option>
    <option value="104/effect_list.php?ct=高雄市">高雄市</option>
    <option value="104/effect_list.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="104/effect_list.php?ct=桃園縣">桃園縣</option>
    <option value="104/effect_list.php?ct=新竹縣">新竹縣</option>
    <option value="104/effect_list.php?ct=苗栗縣">苗栗縣</option>
    <option value="104/effect_list.php?ct=彰化縣">彰化縣</option>
    <option value="104/effect_list.php?ct=南投縣">南投縣</option>
    <option value="104/effect_list.php?ct=雲林縣">雲林縣</option>
    <option value="104/effect_list.php?ct=嘉義縣">嘉義縣</option>
    <option value="104/effect_list.php?ct=屏東縣">屏東縣</option>
    <option value="104/effect_list.php?ct=臺東縣">臺東縣</option>
    <option value="104/effect_list.php?ct=花蓮縣">花蓮縣</option>
    <option value="104/effect_list.php?ct=澎湖縣">澎湖縣</option>
    <option value="104/effect_list.php?ct=基隆市">基隆市</option>
    <option value="104/effect_list.php?ct=新竹市">新竹市</option>
    <option value="104/effect_list.php?ct=嘉義市">嘉義市</option>
    <option value="104/effect_list.php?ct=金門縣">金門縣</option>
    <option value="104/effect_list.php?ct=連江縣">連江縣</option>
    <option value="104/effect_list.php?ct=全國">全國(需1分鐘)</option>
</Select>
<input Type="Button" id="op104_list" name="op104_list" value="查詢" OnClick="window.open(document.getElementById('op104_list').value)"><br />
<img src="/edu/images/dot_03.gif" align="absmiddle" />103年度各校執行成果填報狀況
<Select id="op103_list" name="op103_list" Size=1>
	<option value="103/effect_list.php?ct=新北市">新北市</option>
	<option value="103/effect_list.php?ct=臺北市">臺北市</option>
	<option value="103/effect_list.php?ct=臺中市">臺中市</option>
    <option value="103/effect_list.php?ct=臺南市">臺南市</option>
    <option value="103/effect_list.php?ct=高雄市">高雄市</option>
    <option value="103/effect_list.php?ct=宜蘭縣">宜蘭縣</option>
    <option value="103/effect_list.php?ct=桃園縣">桃園縣</option>
    <option value="103/effect_list.php?ct=新竹縣">新竹縣</option>
    <option value="103/effect_list.php?ct=苗栗縣">苗栗縣</option>
    <option value="103/effect_list.php?ct=彰化縣">彰化縣</option>
    <option value="103/effect_list.php?ct=南投縣">南投縣</option>
    <option value="103/effect_list.php?ct=雲林縣">雲林縣</option>
    <option value="103/effect_list.php?ct=嘉義縣">嘉義縣</option>
    <option value="103/effect_list.php?ct=屏東縣">屏東縣</option>
    <option value="103/effect_list.php?ct=臺東縣">臺東縣</option>
    <option value="103/effect_list.php?ct=花蓮縣">花蓮縣</option>
    <option value="103/effect_list.php?ct=澎湖縣">澎湖縣</option>
    <option value="103/effect_list.php?ct=基隆市">基隆市</option>
    <option value="103/effect_list.php?ct=新竹市">新竹市</option>
    <option value="103/effect_list.php?ct=嘉義市">嘉義市</option>
    <option value="103/effect_list.php?ct=金門縣">金門縣</option>
    <option value="103/effect_list.php?ct=連江縣">連江縣</option>
    <option value="103/effect_list.php?ct=全國">全國(需1分鐘)</option>
</Select>
<input Type="Button" id="op103_list" name="op103_list" value="查詢" OnClick="window.open(document.getElementById('op103_list').value)"><br />
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
<p>
<table border="0">
	<tr>
		<td><div align="center" style="background-color:#FC9">歷史資料查詢區</div>
		<!--可用色碼FFCDFE	FFCDE5	FFCECD	FFE7CD	FEFFCD	E5FFCD	CDFFCE	CDFFE7	CDFEFF	CDE5FF	CECDFF	E7CDFF-->
		</td>
	</tr>
	<tr>
		<td>
			<div style="background-color:#FFCDFE">103年度<br />
				<table border="0">
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_city_examine3.php" target="_blank">1.縣市申請金額列表</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_city_examine.php" target="_blank">2.縣市初審結果列表</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_city_examine2.php" target="_blank">3.各校指標資料查詢(全國)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_edu_examine1.php" target="_blank">4.教育部審核結果(各縣市)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_edu_examine2.php" target="_blank">5.教育部審核結果(各學校)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_edu_examine5.php" target="_blank">6.申請金額縣市列表(依資本門/經常門劃分)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_edu_examine4.php" target="_blank">7.初審結果縣市列表(依資本門/經常門劃分)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_edu_examine3.php" target="_blank">8.複審結果縣市列表(依資本門/經常門劃分)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />9.依補助項目查詢初審結果列表
							<Select id="opt_103_3" name="opt_103_3" Size=1>
								<option value="103/print_suggest_city.php?id=1">補助項目一</option>
								<option value="103/print_suggest_city.php?id=2">補助項目二</option>
								<option value="103/print_suggest_city.php?id=3">補助項目三</option>
								<option value="103/print_suggest_city.php?id=4">補助項目四</option>
								<option value="103/print_suggest_city.php?id=5">補助項目五</option>
								<option value="103/print_suggest_city.php?id=6">補助項目六</option>
								<option value="103/print_suggest_city.php?id=7">補助項目七</option>
							</Select>
							<input Type="Button" id="btn_103_3" name="btn_103_3" value="查詢" OnClick="window.open(document.getElementById('opt_103_3').value)"></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />10.依補助項目查詢複審結果列表
							<Select id="opt_103_2" name="opt_103_2" Size=1>
								<option value="103/print_suggest.php?id=1">補助項目一</option>
								<option value="103/print_suggest.php?id=2">補助項目二</option>
								<option value="103/print_suggest.php?id=3">補助項目三</option>
								<option value="103/print_suggest.php?id=4">補助項目四</option>
								<option value="103/print_suggest.php?id=5">補助項目五</option>
								<option value="103/print_suggest.php?id=6">補助項目六</option>
								<option value="103/print_suggest.php?id=7">補助項目七</option>
							</Select>
							<input Type="Button" id="btn_103_2" name="btn_103_2" value="查詢" OnClick="window.open(document.getElementById('opt_103_2').value)"></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/school_update.php" target="_self">11.各校填報及審查狀態查詢</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />12.縣市審核狀態及上傳檔案
							<Select id="nopost103" name="nopost103" Size=1>
								<option value="103/print_city_finish.php?mod=Y">已審核完成縣市名單</option>
								<option value="103/print_city_finish.php?mod=N">未審核完成縣市名單</option>
							</Select><input Type="Button" id="btn_nopost103" name="btn_nopost103" value="查詢" OnClick="self.location.href=document.getElementById('nopost103').value">
						</td>
					</tr>
					<!---<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="102_edu_search_mulit.php" target="_self">複合式報表列印 (102年度)</a> (開發中)<br />--->
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="background-color:#FFCDE5">102年度<br />
				<table border="0">
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_print_city_examine.php" target="_self">1.縣市初審結果列表</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_print_city_examine2.php" target="_self">2.各校指標資料查詢(全國)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_print_edu_examine1.php" target="_self">3.教育部審核結果(各縣市)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_print_edu_examine2.php" target="_self">4.教育部審核結果(各學校)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_print_edu_examine3.php" target="_self">5.複審結果縣市列表</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_print_edu_examine4.php" target="_self">6.教育優先區項目別補助金額統計表</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />7.依補助項目查詢複審結果列表
							<Select id="op4" name="op4" Size=1>
								<option value="102_print_suggest.php?id=1">補助項目一</option>
								<option value="102_print_suggest.php?id=2">補助項目二</option>
								<option value="102_print_suggest.php?id=3">補助項目三</option>
								<option value="102_print_suggest.php?id=4">補助項目四</option>
								<option value="102_print_suggest.php?id=5">補助項目五</option>
								<option value="102_print_suggest.php?id=6">補助項目六</option>
								<option value="102_print_suggest.php?id=7">補助項目七</option>
							</Select>
							<input Type="Button" id="op4" name="op4" value="查詢" OnClick="window.open(document.getElementById('op4').value)"></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_surplus_report_edu.php" target="_blank">8.學校結餘款列表</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_school_update.php" target="_self">9.各校填報及審查狀態查詢</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />10.縣市審核狀態及上傳檔案
							<Select id="nopost102" name="nopost102" Size=1>
								<option value="102_print_city_finish_1.php">已審核完成縣市名單</option>
								<option value="102_print_city_finish_2.php">未審核完成縣市名單</option>
							</Select>
							<input Type="Button" id="nopost102" name="nopost102" value="查詢" OnClick="self.location.href=document.getElementById('nopost102').value">
						</td>
					</tr>
					<tr>
						<td><form action="102_edu_search_school.php" method="post" name="form">
							<img src="/edu/images/dot_02.gif" align="absmiddle" />11.學校需求彙整表 (填入學校名稱)：
							<input type="text" name="tbxname" >
									<input type="submit" value="送出" name="submit">
								<input type="reset" value="清除" name="reset">
							</form>
						</td>
					</tr>
					<!---<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="102_edu_search_mulit.php" target="_self">複合式報表列印 (102年度)</a> (開發中)<br />--->
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
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
				<!---<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="edu_search_mulit.php" target="_self">複合式報表列印</a><br />--->
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
		</td>
	</tr>
	<tr>
		<td>
		</td>
	</tr>
	<tr>
		<td>
		</td>
	</tr>
</table>
<p>
<?
//教育部特殊權限1
if($username == 'edu0099' || $username == 'edu0001' || $username == 'edu0098')
{	
echo '<div align="center" style="background-color:#FC9">特殊查詢區--(須具特殊權限才能使用)</div>';
//echo '<img src="/edu/images/dot_03.gif" align="absmiddle" /><a href="print_money_reexamined.php" target="_self">經費審核退回縣市修正清單</a><br />';
//echo '<img src="/edu/images/dot_03.gif" align="absmiddle" /><a href="allmoney_adjust.php" target="_self">審查後總經費調整(教育部主管專用)</a><br />';
echo '<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="examine_setting_check.php" target="_self">審查權限設定(教育部主管專用)</a>';
}
if($username == 'edu0099' || $username == 'edu0098')
{
//教育部特殊權限2
echo '<form action=103/open_school.php method=post name=form>';
echo '<hr><img src="/edu/images/dot_03.gif" align="absmiddle" />單一學校延長填報期限：';
echo "請輸入學校代碼：<input type="."text"." name="."schoolid"." >";
echo "<input type="."submit"." value="."送出"." name="."submit".">";
echo "<input type="."reset"." value="."清除"." name="."reset".">";
echo '</form>';
}
?>
<?php
include "../../footer.php";
?>
