<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_104.php"; //本年度基本設定
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	$edu_money     = $_POST['edu_money'];
	$execute_money = $_POST['execute_money'];
	
	echo $execute_money ;
	
	$update_sql =   " UPDATE city_update_effect              ".
					"    SET edu_money     = '$edu_money'     ".
					"      , execute_money = '$execute_money' ".
					"      , update_user   = '$username'      ".
					"      , update_time   = NOW()            ".
					"  WHERE cityname      = '$cityname'      ".
					"    AND schoolyear    = '$school_year'    ";
			
	// 新增資料進資料庫語法  
	if(mysql_query($update_sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=effect_for_city.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=effect_for_city.php>';
	}	
?>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>