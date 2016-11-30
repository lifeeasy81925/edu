<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	while($row = mysql_fetch_row($result))
	{
		$city    = $row[1];
		$cityman = $row[2];
		$examine = $row[3];
		$cityno  = $row[4];
		$exam_1  = $row[5];	 //負責初審補助項目一
		$exam_2  = $row[6];	 //負責初審補助項目二
		$exam_3  = $row[7];	 //負責初審補助項目三
		$exam_4  = $row[8];	 //負責初審補助項目四
		$exam_5  = $row[9];	 //負責初審補助項目五
		$exam_6  = $row[10]; //負責初審補助項目六
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../city_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px" 
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b>審核補助項目</b>

<p>
<hr>
<p>

● 依補助項目審查：<p>
<?
	if($exam_1 == '1'){echo "　<img src='/edu/images/dot_02.gif' /> <a href='a1_examine_table.php' target=_self onclick='wait_page()'>補助項目一：推展親職教育活動</a><p>";}
	if($exam_2 == '1'){echo "　<img src='/edu/images/dot_02.gif' /> <a href='a2_examine_table.php' target=_self onclick='wait_page()'>補助項目二：補助學校發展教育特色</a><p>";}
	if($exam_3 == '1'){echo "　<img src='/edu/images/dot_02.gif' /> <a href='a3_examine_table.php' target=_self onclick='wait_page()'>補助項目三：充實學校基本教學設備</a><p>";}
	if($exam_4 == '1'){echo "　<img src='/edu/images/dot_02.gif' /> <a href='a4_examine_table.php' target=_self onclick='wait_page()'>補助項目四：發展原住民教育文化特色及充實設備器材</a><p>";}
	if($exam_5 == '1'){echo "　<img src='/edu/images/dot_02.gif' /> <a href='a5_examine_table.php' target=_self onclick='wait_page()'>補助項目五：補助交通不便地區學校交通車</a><p>";}
	if($exam_6 == '1'){echo "　<img src='/edu/images/dot_02.gif' /> <a href='a6_examine_table.php' target=_self onclick='wait_page()'>補助項目六：整修學校社區化活動場所</a><p>";}
?>

<script language="JavaScript">
	function wait_page()
	{
		document.write("<table align='center'>");
		document.write("<tr height='200px'>");
		document.write("<td align='center' valign='bottom'>");
		document.write("<font face='標楷體' size='+5'>");
		document.write("<img src='/edu/images/epa_logo.jpg' height='150px'><p>");
		document.write("資料讀取中，請稍候．．．<p>");
		document.write("</font>");
		document.write("<font size='+2'>Now Loading... Please Wait...</font><p>");
		document.write("<img src='/edu/images/progress.gif' height='200px'><p>");		
		document.write("</td>");
		document.write("</tr>");
		document.write("</table>");
	}

	function tb_control(obj)
	{
		var tb_e = document.getElementById("list_e");
		var tb_j = document.getElementById("list_j");

		switch(obj.id)
		{
			case "show_all":
				tb_e.style.display = "";
				tb_j.style.display = "";
				break;

			case "show_e":
				tb_e.style.display = "";
				tb_j.style.display = "none";
				break;

			case "show_j":
				tb_e.style.display = "none";
				tb_j.style.display = "";
				break;
		}
	}
</script>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>