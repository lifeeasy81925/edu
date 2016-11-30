<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	$username = ($_GET['id'] != '')?$_GET['id']:$username;  // get為測試用

	include "../../function/config_for_106.php";  // 本年度基本設定
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../school_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/history.png" align="absmiddle" height="20px"> <b>歷史資料查詢區</b>

<p>
<hr>
<p>

<font color="blue" size="+1"><b>105 年度</b></font><p>
　<img src="/edu/images/print.png"  align="absmiddle"><a href="../105/print_edu_examined.php" target="_blank"> 檢視初複審結果</a><p>
　<img src="/edu/images/view01.png" align="absmiddle"><a href="../105/school_view_status.php" target="_self" > 填報申請狀態</a><p>

<hr>

<font color="blue" size="+1"><b>104 年度</b></font><p>
　<img src="/edu/images/print.png"  align="absmiddle"><a href="../104/print_edu_examined.php" target="_blank"> 檢視初複審結果</a><p>
　<img src="/edu/images/view01.png" align="absmiddle"><a href="../104/school_view_status.php" target="_self" > 填報申請狀態</a><p>

<hr>

<font color="blue" size="+1"><b>103 年度</b></font><p>
　<img src="/edu/images/print.png"  align="absmiddle"><a href="../103/print_edu_examined.php" target="_blank"> 檢視初複審結果</a><p>
　<img src="/edu/images/view01.png" align="absmiddle"><a href="../103/school_view_status.php" target="_self" > 填報申請狀態</a><p>

<hr>

<font color="blue" size="+1"><b>102 年度</b></font><p>
　<img src="/edu/images/print.png" align="absmiddle"><a href="../102print_edu_examined.php" target="_blank"> 檢視初複審結果</a><p>

<hr>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>