<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	$id      = $_POST["id"];
	$school  = $_POST["school"];
	$enddate = $_POST["textfield"];

	$sql_date = " UPDATE time_limit                        ".  // 更新截止日期
				"	 SET end_date    = '$enddate 23:59:59' ".
				"  WHERE account     = '$id'               ".
				"    AND school_year = '$school_year'      ";

	mysql_query($sql_date);
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

<img src="/edu/images/lock.png" align="absmiddle" height="20px"> 延長學校填報期限 / <b>送出</b>

<p>
<hr>
<p>

<? echo $id . " " . $school; ?> 更新資料截止日期為 <?=$enddate;?>。<p>
資料更新成功。<p>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>