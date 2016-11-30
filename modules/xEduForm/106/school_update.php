<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
?>

<p>

<a href="../education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b>學校指標、經費與檔案查詢</b>

<p>
<hr>
<p>

<script language="JavaScript">
	function all_select()
	{
		<?
			for($i = 1; $i <= 22; $i++)
			{
		?>
				var c = document.form.checkbox_city<?=$i;?>;
				c.checked = true;
		<?
			}
		?>
	}
	function all_clear()
	{
		<?
			for($i = 1; $i <= 22; $i++)
			{
		?>
				var c = document.form.checkbox_city<?=$i;?>;
				c.checked = false;
		<?
			}
		?>
	}
</script>

<form action="print_school_finish.php" method="post" name="form">
	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>1. 選擇縣市</b></font><p>
				<input type="button" name="button1" value="全　選" onClick="all_select();">　
				<input type="button" name="button2" value="全不選" onClick="all_clear();"><p>
				<input type="checkbox" name="checkbox_city1"  value="基隆市"/>基隆市　
				<input type="checkbox" name="checkbox_city2"  value="臺北市"/>臺北市　
				<input type="checkbox" name="checkbox_city3"  value="新北市"/>新北市　
				<input type="checkbox" name="checkbox_city4"  value="桃園市"/>桃園市　
				<input type="checkbox" name="checkbox_city5"  value="新竹市"/>新竹市　
				<input type="checkbox" name="checkbox_city6"  value="新竹縣"/>新竹縣　<p>
				<input type="checkbox" name="checkbox_city7"  value="苗栗縣"/>苗栗縣　
				<input type="checkbox" name="checkbox_city8"  value="臺中市"/>臺中市　
				<input type="checkbox" name="checkbox_city9"  value="彰化縣"/>彰化縣　
				<input type="checkbox" name="checkbox_city10" value="南投縣"/>南投縣　
				<input type="checkbox" name="checkbox_city11" value="雲林縣"/>雲林縣　
				<input type="checkbox" name="checkbox_city12" value="嘉義市"/>嘉義市　<p>
				<input type="checkbox" name="checkbox_city13" value="嘉義縣"/>嘉義縣　
				<input type="checkbox" name="checkbox_city14" value="臺南市"/>臺南市　
				<input type="checkbox" name="checkbox_city15" value="高雄市"/>高雄市　
				<input type="checkbox" name="checkbox_city16" value="屏東縣"/>屏東縣　
				<input type="checkbox" name="checkbox_city17" value="宜蘭縣"/>宜蘭縣　
				<input type="checkbox" name="checkbox_city18" value="花蓮縣"/>花蓮縣　<p>
				<input type="checkbox" name="checkbox_city19" value="臺東縣"/>臺東縣　
				<input type="checkbox" name="checkbox_city20" value="澎湖縣"/>澎湖縣　
				<input type="checkbox" name="checkbox_city21" value="金門縣"/>金門縣　
				<input type="checkbox" name="checkbox_city22" value="連江縣"/>連江縣　<p>
			</td>
		</tr>
	</table>
	<p>
	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>2. 送出查詢</b></font><p>
				<input type="submit" value="　送出查詢　" name="submit" onClick="wait_page()">
			</td>
		</tr>
	</table>
	<p>
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<script language="JavaScript">
	function wait_page()
	{
		document.write("<table align='center'>");
		document.write("<tr height='200px'>");
		document.write("<td align='center' valign='bottom'>");
		document.write("<font face='標楷體' size='+5'>");
		document.write("<img src='/edu/images/epa_logo.jpg' height='150px'><p>");
		document.write("資料讀取中，請稍候．．．<p>");
		document.write("<img src='/edu/images/progress.gif' height='150px'><p>");
		document.write("</font>");
		document.write("</td>");
		document.write("</tr>");
		document.write("</table>");
	}
</script>

<?/*<input type="reset"  value="　清除　" name="reset">*/?>

<?
/*
<p>
說明：填報狀態完成與否，以填報總表上傳為依據。
<p>
<td align="center">
	<p>
	<font size="+1"><b>2. 填報情形</b></font><p>
	<input type="radio" name="class" value="1" checked />全部學校列表<p>
	<input type="radio" name="class" value="2" />已填報完成學校<p>
	<input type="radio" name="class" value="3" />未填報完成學校<p>
</td>
*/
?>