<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
?>

<p>

<a href="/edu/modules/xEduForm/106/history_data.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/history.png" align="absmiddle" height="20px"> 歷史資料查詢區 / <b>105年度 學校指標與經費查詢</b>

<p>
<hr>
<p>

<script language="JavaScript">
function CheckAll()
{
	var allbox = document.getElementsByName('allbox')[0];
	var obj;
	
	for(var i = 0;i < 22;i++)                  
	{
		obj = document.getElementsByName('checkbox_city' + i)[0];
		obj.checked = allbox.checked;
	}
}
</script> 
<form action="print_school_finish.php" method="post" name="form">
<div align="left" style="background-color:#FFF">
查詢學校完成填報狀態名單 (以填報總表上傳為依據)<br />
<table width="200" border="1">
	<tr>
		<td align="center">選擇縣市</td>
	</tr>
	<tr>
		<td>
			
			<input type="checkbox" name="allbox" onClick="CheckAll();"> 全選<br />
			<input type="checkbox" name="checkbox_city0"  value="新北市" /> 新北市 
			<input type="checkbox" name="checkbox_city1"  value="臺北市" /> 臺北市 
			<input type="checkbox" name="checkbox_city2"  value="桃園市" /> 桃園市 
			<input type="checkbox" name="checkbox_city3"  value="新竹縣" /> 新竹縣 
			<input type="checkbox" name="checkbox_city4"  value="新竹市" /> 新竹市 
			<input type="checkbox" name="checkbox_city5"  value="苗栗縣" /> 苗栗縣 
			<input type="checkbox" name="checkbox_city6"  value="臺中市" /> 臺中市 <br />
			<input type="checkbox" name="checkbox_city7"  value="南投縣" /> 南投縣 
			<input type="checkbox" name="checkbox_city8"  value="彰化縣" /> 彰化縣 
			<input type="checkbox" name="checkbox_city9"  value="雲林縣" /> 雲林縣 
			<input type="checkbox" name="checkbox_city10"  value="嘉義縣" /> 嘉義縣 
			<input type="checkbox" name="checkbox_city11"  value="嘉義市" /> 嘉義市 
			<input type="checkbox" name="checkbox_city12"  value="臺南市" /> 臺南市 
			<input type="checkbox" name="checkbox_city13"  value="高雄市" /> 高雄市 <br />
			<input type="checkbox" name="checkbox_city14"  value="屏東縣" /> 屏東縣 
			<input type="checkbox" name="checkbox_city15"  value="臺東縣" /> 臺東縣 
			<input type="checkbox" name="checkbox_city16"  value="花蓮縣" /> 花蓮縣 
			<input type="checkbox" name="checkbox_city17"  value="宜蘭縣" /> 宜蘭縣 
			<input type="checkbox" name="checkbox_city18"  value="基隆市" /> 基隆市 
			<input type="checkbox" name="checkbox_city19"  value="澎湖縣" /> 澎湖縣 
			<input type="checkbox" name="checkbox_city20"  value="金門縣" /> 金門縣 <br />
			<input type="checkbox" name="checkbox_city21"  value="連江縣" /> 連江縣 
			
		</td>
	</tr>
	<tr>
		<td align="center">填報情形</td>
	</tr>
	<tr>
		<td>
			<input type="radio" name="class"  value="1" />已填報完成學校名單<br />
			<input type="radio" name="class"  value="2" checked />未填報完成學校名單<br />
		</td>
	</tr>
</table>
<br />
<input type="submit" value="　送出查詢　" name="submit">
<input type="reset" value="　清除　" name="reset">
</form>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 
