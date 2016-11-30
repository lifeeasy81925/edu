<?php
	include "../../../mainfile.php";
	include "../../../header.php";
	
	session_start();
	$id = $xoopsUser->getVar('uname');
	
	$radio01 = $_POST['radio01']; 
	
	
	/* 更新資料庫 */
	$sql = 	" UPDATE schooldata_year                               ".
			"    SET schooldata_year.applied_activity = '$radio01' ".
			"  WHERE account     = '$id'                           ".
			"    AND school_year = '106'                           ";

	$result = mysql_query($sql) or die('MySQL query error');
	
	/* 轉址 */
	if($radio01 == "Y")
	{
		header('Location:act_school_index.php');
		exit;
	}
	if($radio01 == "N")
	{
		header('Location:../school_index.php');
		exit;
	}
?>

<?php include "../../../footer.php"; ?>