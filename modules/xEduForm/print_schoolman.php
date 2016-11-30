<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
?>

<p>

<a href="education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/telphone.png" align="absmiddle" height="20px"> <b>查詢各校承辦人通訊錄</b>

<p>
<hr>
<p>

<script language="JavaScript">
	function CheckAll()
	{
		for (var i=0;i<document.form.elements.length;i++)
		{
			var e = document.form.elements[i];
			if (e.name != 'allbox')
			e.checked = !e.checked;
		}
	}
</script>

<form action="print_schoolman_finish.php" method="post" name="form">
	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>1. 選擇縣市</b></font><p>
				<input type="radio" name="city" value="全國" checked="true"/>全國<p>
				<input type="radio" name="city" value="基隆市"/>基隆市　
				<input type="radio" name="city" value="臺北市"/>臺北市　
				<input type="radio" name="city" value="新北市"/>新北市　
				<input type="radio" name="city" value="桃園市"/>桃園市　
				<input type="radio" name="city" value="新竹市"/>新竹市　
				<input type="radio" name="city" value="新竹縣"/>新竹縣　<p>
				<input type="radio" name="city" value="苗栗縣"/>苗栗縣　
				<input type="radio" name="city" value="臺中市"/>臺中市　
				<input type="radio" name="city" value="彰化縣"/>彰化縣　
				<input type="radio" name="city" value="南投縣"/>南投縣　
				<input type="radio" name="city" value="雲林縣"/>雲林縣　
				<input type="radio" name="city" value="嘉義市"/>嘉義市　<p>
				<input type="radio" name="city" value="嘉義縣"/>嘉義縣　
				<input type="radio" name="city" value="臺南市"/>臺南市　
				<input type="radio" name="city" value="高雄市"/>高雄市　
				<input type="radio" name="city" value="屏東縣"/>屏東縣　
				<input type="radio" name="city" value="宜蘭縣"/>宜蘭縣　
				<input type="radio" name="city" value="花蓮縣"/>花蓮縣　<p>
				<input type="radio" name="city" value="臺東縣"/>臺東縣　
				<input type="radio" name="city" value="澎湖縣"/>澎湖縣　
				<input type="radio" name="city" value="金門縣"/>金門縣　
				<input type="radio" name="city" value="連江縣"/>連江縣　
			</td>
		</tr>
	</table>
	<p>
	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>2. 選擇學校組別</b></font><p>
				<input type="radio" name="class" value="0" checked="true"/>全部　
				<input type="radio" name="class" value="1" />僅顯示國小　
				<input type="radio" name="class" value="2" />僅顯示國中　
			</td>
		</tr>
	</table>
	<p>
	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>3. 送出查詢</b></font><p>
				<input type="submit" value="送出查詢" name="submit">
			</td>
		</tr>
	</table>
	<p>
</form>

<? include "../../footer.php"; ?>

<?/*<input type="reset" value="清除" name="reset">*/?>