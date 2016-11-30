<form action="../../function/download_excel.php" method="post" onSubmit='return Download_EXCEL();' style="margin:0px; display:inline;">
	<input type="submit" name="button" id="button" value="匯出 Excel">
	<input type="hidden" name="Excel_innerHtml" id="Excel_innerHtml" value="">
</form>
<script Language="Javascript" type="text/javascript">
	function Download_EXCEL()
	{
		var content_vlue = document.getElementById("print_content").innerHTML;
		document.getElementById("Excel_innerHtml").value = content_vlue;
	
		return true;
	}

</script>

