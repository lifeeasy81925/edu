<?php
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))// == true || strpos($_SERVER['HTTP_USER_AGENT'],'11.') )
	{
		//echo $_SERVER['HTTP_USER_AGENT'];
		?>
			<SCRIPT LANGUAGE="JavaScript">
				<!-- http://www.culturemark.com/redirectURL/
				window.location="/edu/modules/xCityForm/dlbrowser.php";
				// -->
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
while($row = mysql_fetch_row($result)) {
	$cityid= $row[0];//ID
	$city = $row[1];//縣市名稱
	$cityman = $row[2];//身分名稱
	$cityno = $row[4];//縣市編號
}
?>
<?
echo $city;
echo "教育局(處)，";
echo $cityman;
echo "，您好！歡迎使用本系統。";
?>
<? //指標及經費審查區 ?>
<!-- j10407 以下新增105年度 -->
<table border="0">
	<tr>
		<td style="text-align:center; background-color:#FC9;">105年度 指標及經費審查區</td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="105/allowance_examine.php" target="_self">審核補助項目</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="105/print_school_reason.php" target="_blank">檢視學校資料警示原因與說明列表</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="105/print_money_reexamined.php" target="_self">退回經費修正通知</a></td>
	</tr>
	<!--
		<img src="./images/dot_02.gif" align="absmiddle" /><a href="102_point_examine.php" target="_self">依符合指標審核 (開發中)</a>
		<img src="./images/dot_02.gif" align="absmiddle" /><a href="print_102point_reexamined.php" target="_self">指標審核退回修正通知 (開發中)</a>
		<a href="school_list.php" target="_blank">依學校審核</a>
	-->
</table>
<p>
<table border="0">
	<tr>
		<td style="text-align:center; background-color:#FC9;">105年度 報表資料列印區</td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="105/print_total_school.php?y=105" target="_blank">1.學校申請結果列表</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" />2.學校申請填報狀態名單
			<Select id="opt_105_1" name="opt_105_1" Size="1">
				<option value="105/print_school_finish_1.php">已填報完成學校名單</option>
				<option value="105/print_school_finish_2.php">未填報完成學校名單</option>
			</Select>
			<input Type="button" id="btn_105_1" name="btn_105_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_105_1').value">
		</td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="105/print_city_examine.php"  target="_blank">3.縣市補助項目經費彙整表(表Ⅱ-2)</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="105/print_city_examine2.php" target="_blank">4.縣市指標界定調查結果彙整表(表Ⅱ-3)</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="105/print_education_examine.php" target="_blank">5.教育部複核結果</a>
		<font color=red>(請通知學校於12月11日至12月15日上網瀏覽複審結果)</font></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="105/city_search_school.php" target="_self">6.各校需求彙整表 (含審核意見)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" />7.依補助項目查詢初審結果列表
			<Select id="opt_105_3" name="opt_105_3" Size="1">
				<option value="105/print_suggest_city.php?id=1">補助項目一</option>
				<option value="105/print_suggest_city.php?id=2">補助項目二</option>
				<option value="105/print_suggest_city.php?id=3">補助項目三</option>
				<option value="105/print_suggest_city.php?id=4">補助項目四</option>
				<option value="105/print_suggest_city.php?id=5">補助項目五</option>
				<option value="105/print_suggest_city.php?id=6">補助項目六</option>
				<option value="105/print_suggest_city.php?id=7">補助項目七</option>
			</Select>
			<input Type="button" id="btn_105_3" name="btn_105_3" value="查詢" OnClick="window.open(document.getElementById('opt_105_3').value)">
		</td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" />8.依補助項目查詢複審結果列表
			<Select id="opt_105_2" name="opt_105_2" Size="1">
				<option value="105/print_suggest.php?id=1">補助項目一</option>
				<option value="105/print_suggest.php?id=2">補助項目二</option>
				<option value="105/print_suggest.php?id=3">補助項目三</option>
				<option value="105/print_suggest.php?id=4">補助項目四</option>
				<option value="105/print_suggest.php?id=5">補助項目五</option>
				<option value="105/print_suggest.php?id=6">補助項目六</option>
				<option value="105/print_suggest.php?id=7">補助項目七</option>
			</Select>
			<input Type="button" id="btn_105_2" name="btn_105_2" value="查詢" OnClick="window.open(document.getElementById('opt_105_2').value)">
		</td>
	</tr>
	<!--1040408修改，隱藏各校實施計畫下載連結
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="105/download_file_school.php"  target="_self">9.初審階段各校實施計畫檔案下載</a></td>
	</tr>
	-->
	<tr>
		<td></td>
	</tr>
</table>
<p>
<!-- j10407 以上新增105年度
<table border="0">
	<tr>
		<td style="text-align:center; background-color:#FC9;">104年度 指標及經費審查區</td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="104/allowance_examine.php" target="_self">審核補助項目</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="104/print_school_reason.php" target="_blank">檢視學校資料警示原因與說明列表</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="104/print_money_reexamined.php" target="_self">退回經費修正通知</a></td>
	</tr>
		<img src="./images/dot_02.gif" align="absmiddle" /><a href="102_point_examine.php" target="_self">依符合指標審核 (開發中)</a>
		<img src="./images/dot_02.gif" align="absmiddle" /><a href="print_102point_reexamined.php" target="_self">指標審核退回修正通知 (開發中)</a>
		<a href="school_list.php" target="_blank">依學校審核</a>

</table>
	-->
<p>

<table border="0">
	<tr>
		<td style="text-align:center; background-color:#FC9;">執行成效及其他查詢區</td>
	</tr>
	<tr>
		<td><img src="./images/dot_01.gif" align="absmiddle" /><a href = "print_schoolman.php">查詢各校業務承辦人通訊錄</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_report_city.php" target="_self">檢視縣市及各校執行成果報表 (104、103、102年度)</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="104/effect_list.php">104年度 各校執行成果填報狀況</td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="103/effect_list.php">103年度 各校執行成果填報狀況</td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_102_list.php?cityname=<? echo $city;?>">102年度 各校執行成果填報狀況</td>
	</tr>
	<!--1040310修改
	<tr>
	   		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_101_list.php?cityname=<? echo $city;?>">101年度 各校執行成果填報狀況</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_100_list.php?cityname=<? echo $city;?>">100年度 各校執行成果填報狀況</a></td>
	</tr>
		<img src="./images/dot_01.gif" align="absmiddle" /><a href="city_search.php">進階查詢</a>
	-->
</table>
<p>
<table border="0">
	<tr>
		<td><div align="center" style="background-color:#FC9">歷史資料查詢區</div>
		<!--可用色碼FFCDFE	FFCDE5	FFCECD	FFE7CD	FEFFCD	E5FFCD	CDFFCE	CDFFE7	CDFEFF	CDE5FF	CECDFF	E7CDFF-->
		</td>
	</tr>
	<tr>
	    <td>
		<div style="background-color:#CDFFCE">104年度<br />
		<table border="0">
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="104/print_total_school.php?y=104" target="_blank">1.學校申請結果列表</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" />2.學校申請填報狀態名單
			<Select id="opt_104_1" name="opt_104_1" Size="1">
				<option value="104/print_school_finish_1.php">已填報完成學校名單</option>
				<option value="104/print_school_finish_2.php">未填報完成學校名單</option>
			</Select>
			<input Type="button" id="btn_104_1" name="btn_104_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_104_1').value">
		</td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="104/print_city_examine.php"  target="_blank">3.縣市補助項目經費彙整表(表Ⅱ-2)</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="104/print_city_examine2.php" target="_blank">4.縣市指標界定調查結果彙整表(表Ⅱ-3)</a></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="104/print_education_examine.php" target="_blank">5.教育部複核結果</a>
		<font color=red>(請通知學校於12月16日至12月25日上網瀏覽複審結果)</font></td>
	</tr>
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="104/city_search_school.php" target="_self">6.各校需求彙整表 (含審核意見)</a></td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" />7.依補助項目查詢初審結果列表
			<Select id="opt_104_3" name="opt_104_3" Size="1">
				<option value="104/print_suggest_city.php?id=1">補助項目一</option>
				<option value="104/print_suggest_city.php?id=2">補助項目二</option>
				<option value="104/print_suggest_city.php?id=3">補助項目三</option>
				<option value="104/print_suggest_city.php?id=4">補助項目四</option>
				<option value="104/print_suggest_city.php?id=5">補助項目五</option>
				<option value="104/print_suggest_city.php?id=6">補助項目六</option>
				<option value="104/print_suggest_city.php?id=7">補助項目七</option>
			</Select>
			<input Type="button" id="btn_104_3" name="btn_104_3" value="查詢" OnClick="window.open(document.getElementById('opt_104_3').value)">
		</td>
	</tr>
	<tr>
		<td><img src="/edu/images/dot_02.gif" align="absmiddle" />8.依補助項目查詢複審結果列表
			<Select id="opt_104_2" name="opt_104_2" Size="1">
				<option value="104/print_suggest.php?id=1">補助項目一</option>
				<option value="104/print_suggest.php?id=2">補助項目二</option>
				<option value="104/print_suggest.php?id=3">補助項目三</option>
				<option value="104/print_suggest.php?id=4">補助項目四</option>
				<option value="104/print_suggest.php?id=5">補助項目五</option>
				<option value="104/print_suggest.php?id=6">補助項目六</option>
				<option value="104/print_suggest.php?id=7">補助項目七</option>
			</Select>
			<input Type="button" id="btn_104_2" name="btn_104_2" value="查詢" OnClick="window.open(document.getElementById('opt_104_2').value)">
		</td>
	</tr>
	<!--1040408修改，隱藏各校實施計畫下載連結
	<tr>
		<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="104/download_file_school.php"  target="_self">9.初審階段各校實施計畫檔案下載</a></td>
	</tr>
	-->
	<tr>
		<td></td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>
			<div style="background-color:#FFCDFE">103年度<br />
				<table border="0">
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="103/print_total_school.php?y=103" target="_blank">1.學校申請結果列表</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" />2.學校申請填報狀態名單
							<Select id="opt_103_1" name="opt_103_1" Size="1">
								<option value="103/print_school_finish_1.php">已填報完成學校名單</option>
								<option value="103/print_school_finish_2.php">未填報完成學校名單</option>
							</Select>
							<input Type="button" id="btn_103_1" name="btn_103_1" value="查詢" OnClick="self.location.href=document.getElementById('opt_103_1').value">
						</td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="103/print_city_examine.php"  target="_blank">3.縣市補助項目經費彙整表(表Ⅱ-2)</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="103/print_city_examine2.php" target="_blank">4.縣市指標界定調查結果彙整表(表Ⅱ-3)</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="103/print_education_examine.php" target="_blank">5.教育部複核結果</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="103/city_search_school.php" target="_self">6.各校需求彙整表 (含審核意見)</a></td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />7.依補助項目查詢初審結果列表
							<Select id="opt_103_3" name="opt_103_3" Size="1">
								<option value="103/print_suggest_city.php?id=1">補助項目一</option>
								<option value="103/print_suggest_city.php?id=2">補助項目二</option>
								<option value="103/print_suggest_city.php?id=3">補助項目三</option>
								<option value="103/print_suggest_city.php?id=4">補助項目四</option>
								<option value="103/print_suggest_city.php?id=5">補助項目五</option>
								<option value="103/print_suggest_city.php?id=6">補助項目六</option>
								<option value="103/print_suggest_city.php?id=7">補助項目七</option>
							</Select>
							<input Type="button" id="btn_103_3" name="btn_103_3" value="查詢" OnClick="window.open(document.getElementById('opt_103_3').value)">
						</td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />8.依補助項目查詢複審結果列表
							<Select id="opt_103_2" name="opt_103_2" Size="1">
								<option value="103/print_suggest.php?id=1">補助項目一</option>
								<option value="103/print_suggest.php?id=2">補助項目二</option>
								<option value="103/print_suggest.php?id=3">補助項目三</option>
								<option value="103/print_suggest.php?id=4">補助項目四</option>
								<option value="103/print_suggest.php?id=5">補助項目五</option>
								<option value="103/print_suggest.php?id=6">補助項目六</option>
								<option value="103/print_suggest.php?id=7">補助項目七</option>
							</Select>
							<input Type="button" id="btn_103_2" name="btn_103_2" value="查詢" OnClick="window.open(document.getElementById('opt_103_2').value)">
						</td>
					</tr>
					<!--1040408修改，隱藏各校實施計畫下載連結
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="103/download_file_school.php"  target="_self">9.初審階段各校實施計畫檔案下載</a></td>
					</tr>
					-->
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="103/questionnaire_list.php"  target="_self">10.成效評估調查問卷</td>
					</tr>
					<tr>
						<td></td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="background-color:#FFCDE5">102年度<br />
				<table border="0">
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="102_surplus_report_city.php" target="_blank">1.學校結餘款列表</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="102_print_total_school.php" target="_blank">2.學校申請結果列表</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" />3.學校申請填報狀態名單
							<Select id="102op1" name="102op1" Size="1">
								<option value="102_print_school_finish_1.php">已填報完成學校名單</option>
								<option value="102_print_school_finish_2.php">未填報完成學校名單</option>
							</Select>
							<input Type="button" id="btn102op1" name="btn102op1" value="查詢" OnClick="self.location.href=document.getElementById('102op1').value">
						</td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="102_print_city_examine.php"  target="_blank">4.縣市補助項目經費彙整表(表Ⅱ-2)</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="102_print_city_examine_2.php" target="_blank">5.縣市指標界定調查結果彙整表(表Ⅱ-3)</a></td>
					</tr>
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="102_print_education_examine.php" target="_blank">6.教育部複核結果</a></td>
					</tr>
					<tr>
						<td>
							<form action="102_city_search_school.php" method="post" name="form">
								<img src="./images/dot_02.gif" align="absmiddle" />7.各校需求彙整表 (含審核意見)：
								<input type="text" name="tbxname" size=3 value="<? echo $city; ?>" readonly>
								<input type="submit" value="送出" name="submit">
							</form>
						</td>
					</tr>
					<tr>
						<td><img src="/edu/images/dot_02.gif" align="absmiddle" />8.依補助項目查詢複審結果列表
							<Select id="102op4" name="102op4" Size="1">
								<option value="102_print_suggest.php?id=1">補助項目一</option>
								<option value="102_print_suggest.php?id=2">補助項目二</option>
								<option value="102_print_suggest.php?id=3">補助項目三</option>
								<option value="102_print_suggest.php?id=4">補助項目四</option>
								<option value="102_print_suggest.php?id=5">補助項目五</option>
								<option value="102_print_suggest.php?id=6">補助項目六</option>
								<option value="102_print_suggest.php?id=7">補助項目七</option>
							</Select>
							<input Type="button" id="btn102op4" name="btn102op4" value="查詢" OnClick="window.open(document.getElementById('102op4').value)">
						</td>
					</tr>
					<!--1040408修改，隱藏各校實施計畫下載連結
					<tr>
						<td><img src="./images/dot_02.gif" align="absmiddle" /><a href="102_file_search_school.php"  target="_self">9.初審階段各校實施計畫檔案下載</a></td>
					</tr>
					-->
					<tr>
						<td></td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
		  
			<div style="background-color:#FFCECD">101年度<br />
			<!--1040310修改
				<img src="./images/dot_01.gif" align="absmiddle" /><a href="print_total_school.php" target="_blank">1.學校申請結果列表</a><br />
			-->	
				<img src="./images/dot_01.gif" align="absmiddle" /><a href="print_city_examine.php"  target="_blank">1.縣市審核補助結果(表Ⅱ-2)</a><br />
				<img src="./images/dot_01.gif" align="absmiddle" /><a href="print_city_examine_2.php" target="_blank">2.縣市審核指標結果(表Ⅱ-3)</a><br />
			<!--1040310修改	
				<img src="./images/dot_01.gif" align="absmiddle" /><a href="print_education_examine.php" target="_blank">4.教育部複核結果</a><br />
				<form action="city_search_school.php" method="post" name="form">
				<img src="./images/dot_01.gif" align="absmiddle" />5.各校需求彙整表 (含審核意見)：
					<input type="text" name="tbxname" size=3 value="<? echo $city; ?>" readonly>
					<input type="submit" value="送出" name="submit">
				</form>
				<img src="./images/dot_01.gif" align="absmiddle" />6.學校申請填報狀態名單
				<Select id="nopost" name="nopost" Size=1>
					<option value="print_school_finish_1.php">已填報完成學校名單</option>
					<option value="print_school_finish_2.php">未填報完成學校名單</option>
				</Select>
				<input Type="Button" id="nopost" name="nopost" value="查詢"	OnClick="self.location.href=document.getElementById('nopost').value"><br />
			-->
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
<? //特殊功能區(縣市承辦人) ?>
<? if($cityno == '0' ){echo "<!--";}?>
<div align="center" style="background-color:#FC9">以下為特殊功能區 (縣市主要帳號才會顯示)</div>
<img src="./images/dot_03.gif" align="absmiddle" /><a href="effect_101_city_01.php" target="_self">101年度縣市自評表</a><font color=red> (填寫期間：101/5/1~可持續更新)</font><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="101city_survey_01.php" target="_self">101年度推動教育優先區計畫執行情形調查問卷</a><font color=red> (填寫期間：101/5/1~5/20)</font><br />
<img src="./images/dot_01.gif" align="absmiddle" /><a href="effect_100_city_01.php" target="_self">100年度縣市自評表</a><font color=red> (填寫期間：101/5/1~5/20)</font><br />
<img src="./images/dot_03.gif" align="absmiddle" /><a href="examine_setting_check.php" target="_self">審查權限設定 (教育局主管專用)</a><br />
<p>

<hr>
<img src="./images/dot_03.gif" align="absmiddle" />105年度縣市應上傳檔案：初審委員聯絡資料<a href="../xSchoolForm/download/102縣市初審委員名單_空白.xls" target="_blank">(空白檔案)</a>、縣市審核結果

<?
	//讀取上傳檔案資料
	$sql = "select  *  from   city_upload_name where cityname like '$city' and school_year = '105' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account_105 = $row['account'];
		$file_105_1 = $row['city_1'];
		$file_105_1_name = ' (學校聯絡初審委員方式資料)';
		$file_105_2 = $row['city_2'];
		$file_105_2_name = ' (表II-2,經費核定表總表)';
		$file_105_3 = $row['city_3'];
		$file_105_3_name = ' (表II-3,指標彙整表)';
		$file_105_4 = $row['city_4'];
		$file_105_4_name = ' (縣市交通車調查表)';
		$file_105_5 = $row['city_5'];
		$file_105_5_name = ' (縣市自編交通車經費文件)';
	}
	
	//上傳路徑     //1040505修改上傳路徑
	$file_path = '/epa_uploads/105/pub/'.$account_105.'/';
?>
<form action="105/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳學校聯絡初審委員方式資料">
<br />
<? 
	if ($cityno!='0' && $file_105_1 == '')
	{
		echo "　(1)狀態：<font color=red>未上傳".$file_105_1_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(1)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_105_1."' target='_new'>下載".$file_105_1_name."</a>";
	}
?>
</form>

<form action="105/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳表II-2縣市審核結果(經費核定總表)">
<br />
<? 
	if ($cityno!='0' && $file_105_2 == '')
	{
		echo "　(2)狀態：<font color=red>未上傳".$file_105_2_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(2)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_105_2."' target='_new'>下載".$file_105_2_name."</a>";
	}
?>
</form>

<form action="105/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_3">
	<input type="file" name="myfile">
	<input type="submit" value="上傳表II-3縣市審核結果(指標彙整表)">
<br />
<? 
	if ($cityno!='0' && $file_105_3 == '')
	{
		echo "　(3)狀態：<font color=red>未上傳".$file_105_3_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(3)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_105_3."' target='_new'>下載".$file_105_3_name."</a>";
	}
?>
</form>

<form action="105/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_4">
	<input type="file" name="myfile">
	<input type="submit" value="上傳縣市現有交通車調查表">
<br />
<? 
	if ($cityno!='0' && $file_105_4 == '')
	{
		echo "　(4)狀態：<font color=red>未上傳".$file_105_4_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(4)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_105_4."' target='_new'>下載".$file_105_4_name."</a>";
	}
?>
</form>

<form action="105/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_5">
	<input type="file" name="myfile">
	<input type="submit" value="上傳縣市自行編列交通車相關經費同意書">
<br />
<? 
	if ($cityno!='0' && $file_105_5 == '')
	{
		echo "　(5)狀態：<font color=red>未上傳".$file_105_5_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(5)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_105_5."' target='_new'>下載".$file_105_5_name."</a>";
	}
?>
</form>
<hr>

<img src="./images/dot_03.gif" align="absmiddle" />104年度縣市應上傳檔案：初審委員聯絡資料<a href="../xSchoolForm/download/102縣市初審委員名單_空白.xls" target="_blank">(空白檔案)</a>、縣市審核結果

<?
	//讀取上傳檔案資料
	$sql = "select  *  from   city_upload_name where cityname like '$city' and school_year = '104' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account_104 = $row['account'];
		$file_104_1 = $row['city_1'];
		$file_104_1_name = ' (學校聯絡初審委員方式資料)';
		$file_104_2 = $row['city_2'];
		$file_104_2_name = ' (表II-2,經費核定表總表)';
		$file_104_3 = $row['city_3'];
		$file_104_3_name = ' (表II-3,指標彙整表)';
		$file_104_4 = $row['city_4'];
		$file_104_4_name = ' (縣市交通車調查表)';
		$file_104_5 = $row['city_5'];
		$file_104_5_name = ' (縣市自編交通車經費文件)';
	}
	
	//上傳路徑     //1040505修改上傳路徑
	$file_path = '/epa_uploads/104/pub/'.$account_104.'/';
?>
<form action="104/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳學校聯絡初審委員方式資料">
<br />
<? 
	if ($cityno!='0' && $file_104_1 == '')
	{
		echo "　(1)狀態：<font color=red>未上傳".$file_104_1_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(1)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_104_1."' target='_new'>下載".$file_104_1_name."</a>";
	}
?>
</form>

<form action="104/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳表II-2縣市審核結果(經費核定總表)">
<br />
<? 
	if ($cityno!='0' && $file_104_2 == '')
	{
		echo "　(2)狀態：<font color=red>未上傳".$file_104_2_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(2)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_104_2."' target='_new'>下載".$file_104_2_name."</a>";
	}
?>
</form>

<form action="104/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_3">
	<input type="file" name="myfile">
	<input type="submit" value="上傳表II-3縣市審核結果(指標彙整表)">
<br />
<? 
	if ($cityno!='0' && $file_104_3 == '')
	{
		echo "　(3)狀態：<font color=red>未上傳".$file_104_3_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(3)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_104_3."' target='_new'>下載".$file_104_3_name."</a>";
	}
?>
</form>

<form action="104/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_4">
	<input type="file" name="myfile">
	<input type="submit" value="上傳縣市現有交通車調查表">
<br />
<? 
	if ($cityno!='0' && $file_104_4 == '')
	{
		echo "　(4)狀態：<font color=red>未上傳".$file_104_4_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(4)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_104_4."' target='_new'>下載".$file_104_4_name."</a>";
	}
?>
</form>

<form action="104/file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="city_5">
	<input type="file" name="myfile">
	<input type="submit" value="上傳縣市自行編列交通車相關經費同意書">
<br />
<? 
	if ($cityno!='0' && $file_104_5 == '')
	{
		echo "　(5)狀態：<font color=red>未上傳".$file_104_5_name."</font> (上傳後請按F5更新)";
	} 
	elseif ($cityno!='0') 
	{
		echo "　(5)狀態：<font color=blue>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$file_104_5."' target='_new'>下載".$file_104_5_name."</a>";
	}
?>
</form>

<hr>
<img src="./images/dot_03.gif" align="absmiddle" />103年度縣市應上傳檔案：初審委員聯絡資料、縣市審核結果
<?
	//讀取上傳檔案資料
	$sql = "select  *  from   city_upload_name where cityname like '$city' and school_year = '103' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account_103 = $row['account'];
		$file_103_1 = $row['city_1'];
		$file_103_1_name = ' (學校聯絡初審委員方式資料)';
		$file_103_2 = $row['city_2'];
		$file_103_2_name = ' (表II-2,經費核定表總表)';
		$file_103_3 = $row['city_3'];
		$file_103_3_name = ' (表II-3,指標彙整表)';
		$file_103_4 = $row['city_4'];
		$file_103_4_name = ' (縣市交通車調查表)';
		$file_103_5 = $row['city_5'];
		$file_103_5_name = ' (縣市自編交通車經費文件)';
	}
	
	//上傳路徑
	$file_path = '/edu_upload/103/'.$account_103.'/';
	
	echo "<br />　(1)";

	if ($cityno!='0' && $file_103_1 == '')
	{
		echo "狀態：<font color=red>未上傳".$file_103_1_name."</font>";
	} 
	elseif ($cityno!='0') 
	{
		echo "狀態：<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$file_103_1."' target='_new'>".$file_103_1.$file_103_1_name."</a>";
	}
	
	echo "<br />　(2)";
	
	if ($cityno!='0' && $file_103_2 == '')
	{
		echo "狀態：<font color=red>未上傳".$file_103_2_name."</font>";
	} 
	elseif ($cityno!='0') 
	{
		echo "狀態：<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$file_103_2."' target='_new'>".$file_103_2.$file_103_2_name."</a>";
	}
	
	echo "<br />　(3)";
	
	if ($cityno!='0' && $file_103_3 == '')
	{
		echo "狀態：<font color=red>未上傳".$file_103_3_name."</font>";
	} 
	elseif ($cityno!='0') 
	{
		echo "狀態：<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$file_103_3."' target='_new'>".$file_103_3.$file_103_3_name."</a>";
	}
	
	echo "<br />　(4)";
	
	if ($cityno!='0' && $file_103_4 == '')
	{
		echo "狀態：<font color=red>未上傳".$file_103_4_name."</font>";
	} 
	elseif ($cityno!='0') 
	{
		echo "狀態：<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$file_103_4."' target='_new'>".$file_103_4.$file_103_4_name."</a>";
	}
	
	echo "<br />　(5)";
	
	if ($cityno!='0' && $file_103_5 == '')
	{
		echo "狀態：<font color=red>未上傳".$file_103_5_name."</font>";
	} 
	elseif ($cityno!='0') 
	{
		echo "狀態：<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$file_103_5."' target='_new'>".$file_103_5.$file_103_5_name."</a>";
	}
?>
<br />
<img src="./images/dot_03.gif" align="absmiddle" />102年度縣市應上傳檔案：初審委員聯絡資料、縣市審核結果
<?
	//讀取上傳檔案資料
	$sql = "select  *  from   102city_upload_name where account like '$username'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$file_1 = $row[9];
		$file_1_name = ' (學校聯絡初審委員方式資料)';
		$file_2 = $row[10];
		$file_2_name = ' (表II-2,經費核定表總表)';
		$file_3 = $row[11];
		$file_3_name = ' (表II-3,指標彙整表)';
		$file_4 = $row[12];
		$file_4_name = ' (縣市交通車調查表)';
		$file_5 = $row[13];
		$file_5_name = ' (縣市自編交通車經費文件)';
	}

	echo "<br />　(1)";
	if ($cityno!='0' && $file_1 == ''){echo "狀態：<font color=red>未上傳".$file_1_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a>';}
	
	echo "<br />　(2)";
	if ($cityno!='0' && $file_2 == ''){echo "狀態：<font color=red>未上傳".$file_2_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a>';}
	
	echo "<br />　(3)";
	if ($cityno!='0' && $file_3 == ''){echo "狀態：<font color=red>未上傳".$file_3_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_3.'" target="_new">'.$file_3.$file_3_name.'</a>';}
	
	echo "<br />　(4)";
	if ($cityno!='0' && $file_4 == ''){echo "狀態：<font color=red>未上傳".$file_4_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_4.'" target="_new">'.$file_4.$file_4_name.'</a>';}
	
	echo "<br />　(5)";
	if ($cityno!='0' && $file_5 == ''){echo "狀態：<font color=red>未上傳".$file_5_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$file_5.'" target="_new">'.$file_5.$file_5_name.'</a>';}
?>
<br />
<img src="./images/dot_01.gif" align="absmiddle" />101年度縣市上傳檔案：縣市審核結果(將紙本掃描後上傳，送教育部備查)
<?
	//讀取上傳檔案資料
	$sql = "select  *  from   102city_upload_name where name_2 like '$city'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$file_1 = $row[4];
		$file_1_name = ' (表II-2,經費核定表總表)';
		$file_2 = $row[5];
		$file_2_name = ' (表II-3,指標彙整表)';
		$file_3 = $row[6];
		$file_3_name = ' (縣市交通車調查表)';
		$file_4 = $row[7];
		$file_4_name = ' (縣市自編交通車經費文件)';
	}
	
	echo "<br />　(1)";
	if ($cityno!='0' && $file_1 == ''){echo "狀態：<font color=red>未上傳".$file_1_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a>';}
	
	echo "<br />　(2)";
	if ($cityno!='0' && $file_2 == ''){echo "狀態：<font color=red>未上傳".$file_2_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a>';}
	
	echo "<br />　(3)";
	if ($cityno!='0' && $file_3 == ''){echo "狀態：<font color=red>未上傳".$file_3_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_3.'" target="_new">'.$file_3.$file_3_name.'</a>';}
	
	echo "<br />　(4)";
	if ($cityno!='0' && $file_4 == ''){echo "狀態：<font color=red>未上傳".$file_4_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_4.'" target="_new">'.$file_4.$file_4_name.'</a>';}
	
?>
<? if($cityno == '0' ){echo "-->";}?>

<? include "../../footer.php"; ?>