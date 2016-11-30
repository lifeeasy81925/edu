<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$student = $_POST['student'];	
	$class_total = $_POST['class_total'];
	$c1 = $_POST['c1'];
	$c2 = $_POST['c2'];
	$c3 = $_POST['c3'];
	$c4 = $_POST['c4'];
	$c5 = $_POST['c5'];
	$c6 = $_POST['c6'];
	$cs = $_POST['cs'];
	$lastyear_graduate = $_POST['lastyear_graduate'];
	$school_year       = $_POST['school_year'];
	$page1_warning     = $_POST['page1_warning'];
	$page1_desc        = $_POST['page1_desc'];
	
	$laststudent = $_POST['laststudent'];  // 105年7月27日，教優區例行會議，侯師提將上學年度學生人數開放讓學校填寫，因為105年度教優區多數學校(約80%)沿用資料。
	
	$sql = " UPDATE schooldata_year                          ".
		   "    SET student           = '$student'           ".
		   "      , class_total       = '$class_total'       ".
		   "      , class_grade1      = '$c1'                ".
		   "      , class_grade2      = '$c2'                ".
		   "      , class_grade3      = '$c3'                ".
		   "      , class_grade4      = '$c4'                ".
		   "      , class_grade5      = '$c5'                ".
		   "      , class_grade6      = '$c6'                ".
		   "      , class_special     = '$cs'                ".
		   "      , lastyear_graduate = '$lastyear_graduate' ".
		   "      , page1_warning     = '$page1_warning'     ".
		   "      , page1_desc        = '$page1_desc'        ".
		   "      , keep              = 0                    ".
		   "  WHERE account           = '$username'          ".
		   "    AND school_year       = '$school_year'       ";
		   
	$sql_ly = " UPDATE schooldata_year                        ".
		   "    SET student           = '$laststudent'     ".
		   "  WHERE account           = '$username'        ".
		   "    AND school_year       = '$school_year' - 1 ";
	
	if(mysql_query($sql) && mysql_query($sql_ly))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=schooldata_2_new.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../../../user.php?op=logout>';
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>