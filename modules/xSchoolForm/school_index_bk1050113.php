<?php 

	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')) // == true  || strpos($_SERVER['HTTP_USER_AGENT'],'11.') )
	{
		//echo $_SERVER['HTTP_USER_AGENT'];
		?>
			<SCRIPT LANGUAGE="JavaScript">
				<!-- http://www.culturemark.com/redirectURL/
				window.location="/edu/modules/xSchoolForm/dlbrowser.php";
				// -->
			</script>
		<?
	} 
	
include "../../mainfile.php";
include "../../header.php";
//include "./connect.php";                              
include "../function/connect_school.php";
include "../function/config_for_105.php";

	$sql = " SELECT * FROM schooldata_year where account = '$username' and school_year = '$school_year' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$keep = $row['keep'];
	} 

/*限制特定學校不能填105年成效
$newschool_ary = array("014546","014616","014622","014627","014631","014632","014654","014658","014665","014677","014688","014695","014703","014706","014715","014723","014728","014753","014758","014766","014767","014805");		
$z = 0;
if(in_array($username, $newschool_ary))
	{
		$z = 2;	}
*/
?>
<br />
<noscript>
<p style="color: Red">抱歉，您的瀏覽器不支援javascript語法！將無法正確使用本系統的功能。請啟用Javascript語法。</P>
<p><a href="js_open.html" target="_blank"><strong>(IE啟用Javascript方法)</strong></a>
  或
  <a href="https://www.google.com/intl/zh-TW/chrome/browser/" target="_blank"><strong>使用自由軟體Google Chrome瀏覽器</strong></a>
</p>
</noscript>
<INPUT TYPE="button" VALUE="回首頁" onClick="location='/edu'"><br /><br />

<div align="center" style="background-color:#FC9">105年度 學校資料填報及經費申請區 <font color=red></font></div>    <!-- //j10407，區分新設的學校才要填學校資料  -->
<? if($keep == 1){echo "<!--";} ?>
● 填報申請3步驟：<br />
     <img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="105/schooldata_1_new.php" target="_self">1.填寫學校資料</a>（必填）<br /> 
	 <img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="105/school_select_allowance.php" target="_self">2.申請補助項目</a><font color=blue>（須先完成：1.填寫學校資料）</font><br />
     <img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="105/school_upload_file.php" target="_self">3.上傳檔案專區</a>（上傳填報與申請相關計畫、經費及附件）<p>
<? if($keep == 1){echo "-->";} ?>
<? if($keep == 0){echo "<!--";} ?>
● 填報申請2步驟：<br />
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="105/school_select_allowance.php" target="_self">1.申請補助項目</a><font color=blue></font><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="105/school_upload_file.php" target="_self">2.上傳檔案專區</a>（上傳填報與申請相關計畫、經費及附件）<p>
<? if($keep == 0){echo "-->";} ?>

<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="105/school_view_status.php" target="_self">檢視填報與申請狀態</a><p>
<!--
<div align="center" style="background-color:#FC9">104年度 學校資料填報及經費申請區 <font color=red></font></div>
※填報申請3步驟：<br />

<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="104/schooldata_1.php" target="_self">1.填寫學校資料</a>（必填）<br />
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="104/school_select_allowance.php" target="_self">2.申請補助項目</a><font color=blue>（須先完成：1.填寫學校資料）</font><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="104/school_upload_file.php" target="_self">3.上傳檔案專區</a>（上傳填報與申請相關計畫、經費及附件）<br /><br />
<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/school_view_status.php" target="_self">檢視填報與申請狀態</a><br /><br />
-->

<div align="center" style="background-color:#FC9">105年度 審核狀態查詢區</div>
<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="105/print_city_examined.php" target="_new">105年度 檢視縣市初審結果</a><br />
<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="105/print_edu_examined.php" target="_new">105年度 檢視教育部複審結果</a><br />

<?
	//讀取上傳檔案資料
	$sql = "select  *  from  city_upload_name where cityname like '$city' and school_year = '105'";                
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$city_account = $row['account'];
		$file_105_1 = $row['city_1'];                                                                             
	}	
	
	//上傳路徑
	$file_path = '/epa_uploads/105/pub/'.$city_account.'/';                                                      
?>
<!-- <img src="/edu/images/dot_01.gif" align="absmiddle" />下載學校聯絡初審委員方式資料(修改中!!)： -->
<? /*
	if ($file_104_1 == '')                                                                                       
	{
		echo "<font color='red'>教育局承辦人未上傳</font>";
	} 
	elseif ($cityno!='0') 
	{
		echo "<font color='blue'>已上傳</font>"."&nbsp;&nbsp;&nbsp;&nbsp;"."<a href='".$file_path.$file_104_1."' target='_new'>下載已上傳檔案</a>";
		//，檔名：<a href='".$file_path.$file_104_1."' target='_new'>".$file_104_1."</a>";
	}
	*/
?>

<p>
<div align="center" style="background-color:#FC9"><font size="+2"><b>成效評估區（修正後計畫上傳區）</b></font></div>

<? if($z == 2){echo "<!--";} ?>
<br>
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="105/effect_school_list.php" target="_self"><font size="+2"><b>105年度 執行進度與成果填報</b></font></a><font color="#FF0000"> (填報時間：已開始，
<mark>可持續更新</mark>)</font><p>
<? if($z == 2){echo "-->";} ?>

<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="104/effect_school_list.php" target="_self">104年度 執行進度與成果填報</a><font color="#FF0000"> (填報時間：已開始，
<mark>可持續更新</mark>)</font><br />
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="103/effect_school_list.php" target="_self">103年度 執行進度與成果填報</a><font color="#FF0000"> (填報時間：已開始，
<mark>可持續更新</mark>)</font><br />
<!--1040519 修改，不開放102年度
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="effect_102_school_list.php" target="_self">102年度 執行進度與成果填報</a><font color="#FF0000"> (填報時間：已開始，
<mark>可持續更新</mark>)</font><br />
-->
<p>
<div align="center" style="background-color:#FC9">調查問卷</div>
<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="104/questionnaire.php" target="_self">104年度 教育部教育優先區計畫評估研究專案調查問卷</a>
<!--<img src="/edu/images/dot_01.gif" align="absmiddle" /><a href="103/questionnaire.php" target="_self">103年度 推動教育優先區計畫調查問卷</a><br /> -->
<!--<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="101school_survey_01.php" target="_self">101年度推動教育優先區計畫執行情形調查問卷──學校<font color="#FF0000"> (101/4/10 - 4/30)</font><img src="../../images/↑問卷填寫由此進.gif" width="401" height="31" /></a><br />-->
<p>
<table border="0">
	<tr>
		<td><div align="center" style="background-color:#FC9">歷史資料查詢區</div>
		<!--可用色碼FFCDFE	FFCDE5	FFCECD	FFE7CD	FEFFCD	E5FFCD	CDFFCE	CDFFE7	CDFEFF	CDE5FF	CECDFF	E7CDFF-->
		</td>
	</tr>
		<tr>
		<td>
			<div style="background-color:#E5FFCD">104年度<br />
               <img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_city_examined.php" target="_new">104年度 檢視縣市初審結果</a><br />
               <img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/print_edu_examined.php" target="_new">104年度 檢視教育部複審結果</a><br />
			   <img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="104/school_view_status.php" target="_new">104年度 填報與申請狀態</a><br />
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="background-color:#FFCDFE">103年度<br />
				<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_city_examined.php" target="_new">檢視縣市初審結果</a><br />
				<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/print_edu_examined.php" target="_new">檢視教育部複審結果</a><br />
                <img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="103/school_view_status.php" target="_new">填報與申請狀態</a><br />				
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="background-color:#FFCDE5">102年度<br />
				<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102print_city_examined.php" target="_self">檢視縣市初審結果</a><br />
				<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102print_edu_examined.php" target="_self">檢視教育部複審結果</a><br />
				<img src="/edu/images/dot_02.gif" align="absmiddle" /><a href="102_school_surplus.php" target="_self">檢視與填報結餘款調查表</a>
			</div>
		</td>
	</tr>
	
</table>
<?php
include "../../footer.php";
?>
