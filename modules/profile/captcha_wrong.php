<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
?>

<p>

<img src='/edu/images/warning.png' height='30px' align='middle' /><font size='+2'> 驗證碼輸入錯誤！</font><p>

<p><hr><p>

<font size='+2'>您可以試試：</font><p>

<a href='/edu/index.php'>
	<img src='/edu/images/epa_logo.png' height='60px' align='middle' />
	<font size='+2'>
		<b>回首頁再次登入。</b>		
	</font>
</a>
<p>

<font size='+2'>或稍候 5 秒，由系統自動跳轉至本站首頁．．．</font>

<script type="text/javascript">
	//設定倒數秒數
	var t = 5;
	
	//顯示倒數秒收
	function showTime()
	{
		t -= 1;

		if(t==0)
		{
			location.href='/edu/index.php';
		}

		// 每秒執行一次,showTime()
		setTimeout("showTime()",1000);
	}
	
	// 執行showTime()
	showTime();
</script>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>