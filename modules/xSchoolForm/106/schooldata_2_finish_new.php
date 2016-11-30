<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	$target_aboriginal    = $_POST['target_aboriginal'];
	$target_no_aboriginal = $_POST['target_no_aboriginal'];
	$low_income           = $_POST['low_income'];
	$grandparenting       = $_POST['grandparenting'];
	$over45years          = $_POST['over45years'];
	$immigrant            = $_POST['immigrant'];
	$single_parent        = $_POST['single_parent'];
	$aboriginal           = $_POST['aboriginal'];
	$lastyear_leaving     = $_POST['lastyear_leaving'];
	$school_year          = $_POST['school_year'];
	$page2_warning        = $_POST['page2_warning'];
	$page2_desc           = $_POST['page2_desc'];

	$sql = 	" UPDATE schooldata_year                                ".
			"    SET target_aboriginal    = '$target_aboriginal'    ".
			"      , target_no_aboriginal = '$target_no_aboriginal' ".
			"      , low_income           = '$low_income'           ".
			"      , grandparenting       = '$grandparenting'       ".
			"      , over45years          = '$over45years'          ".
			"      , immigrant            = '$immigrant'            ".
			"      , single_parent        = '$single_parent'        ".
			"      , aboriginal           = '$aboriginal'           ".
			"      , lastyear_leaving     = '$lastyear_leaving'     ".
			"      , page2_warning        = '$page2_warning'        ".
			"      , page2_desc           = '$page2_desc'           ".
			"  WHERE account              = '$username'             ".
			"    AND school_year          = '$school_year'          ";

	if(mysql_query($sql))
	{
		echo '新增成功！';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=print_point_page_new.php>';
	}
	else
	{
		echo '新增失敗！';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../../../user.php?op=login>';
	}
?>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>