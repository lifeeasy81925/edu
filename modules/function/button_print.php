<input type="button" name="button" id="button" value="列印本頁" onClick="js:Click_here_to_print();">
<script Language="Javascript" type="text/javascript">
	function Click_here_to_print()
	{ 
		//設定新開的視窗屬性
		/*var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
			disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25"; */ 
			
		var RightNow = new Date();
		var str_date = RightNow.getFullYear() + '/' + (RightNow.getMonth()+1) + '/' + RightNow.getDate();
			
		var content_vlue = document.getElementById("print_content").innerHTML; 
		content_vlue = content_vlue.replace("<p style=\"page-break-after:always\"></p>", '<p>列印日期：' + str_date + "<p style=\"page-break-after:always\"></p>"); 
		
		var docprint=window.open("","printPage",""); //docprint=window.open("","printPage",disp_setting);
			docprint.document.open(); 
			docprint.document.write('<html><head><title></title>'); 
			docprint.document.write('</head><body onLoad="self.print();window.close();">'); //self.print();window.close();列印本頁，完成後關閉視窗
			docprint.document.write(content_vlue);
			docprint.document.write('<p>列印日期：' + str_date); 
			docprint.document.write('</body></html>'); 
			docprint.document.close(); 
			docprint.focus();

	}

</script>
