<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql_edu = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_edu = $xoopsDB -> query($sql_edu) or die($sql_edu);

	if($username == 'edu0001' || $username == 'edu0099'  )
	{
		echo '權限設定中...請稍待...';
	}
	else
	{
		echo "您沒有設定權限";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=education_index.php>';
	}

    // 取得session

	$name = $_POST['name'];//審查委員

	$exam_1  = $_POST['exam_1'];//補助項目一
	$exam_2  = $_POST['exam_2'];//補助項目二
	$exam_3  = $_POST['exam_3'];//補助項目三
	$exam_4  = $_POST['exam_4'];//補助項目四
	$exam_5  = $_POST['exam_5'];//補助項目五
	$exam_6  = $_POST['exam_6'];//補助項目六

	/*
	$exam_7  = $_POST['exam_7'];//補助項目七
	$exam_8  = $_POST['exam_8'];//補助項目八
	*/

	$city_1  = $_POST['city_1'];   // 基隆市
	$city_2  = $_POST['city_2'];   // 臺北市
	$city_3  = $_POST['city_3'];   // 新北市
	$city_4  = $_POST['city_4'];   // 桃園市
	$city_5  = $_POST['city_5'];   // 新竹市
	$city_6  = $_POST['city_6'];   // 新竹縣
	$city_7  = $_POST['city_7'];   // 苗栗縣
	$city_8  = $_POST['city_8'];   // 臺中市
	$city_9  = $_POST['city_9'];   // 彰化縣
	$city_10 = $_POST['city_10'];  // 南投縣
	$city_11 = $_POST['city_11'];  // 雲林縣
	$city_12 = $_POST['city_12'];  // 嘉義市
	$city_13 = $_POST['city_13'];  // 嘉義縣
	$city_14 = $_POST['city_14'];  // 臺南市
	$city_15 = $_POST['city_15'];  // 高雄市
	$city_16 = $_POST['city_16'];  // 屏東縣
	$city_17 = $_POST['city_17'];  // 宜蘭縣
	$city_18 = $_POST['city_18'];  // 花蓮縣
	$city_19 = $_POST['city_19'];  // 臺東縣
	$city_20 = $_POST['city_20'];  // 澎湖縣
	$city_21 = $_POST['city_21'];  // 金門縣
	$city_22 = $_POST['city_22'];  // 連江縣

	$city_list_old      = $_POST['city_list_old'];
	$allowance_list_old = $_POST['allowance_list_old'];

	$city_list      = "";
	$allowance_list = "";

	$a_ary = array("","補助項目一,", "補助項目二,", "補助項目三,", "補助項目四,", "補助項目五,", "補助項目六,");

	$c_ary = array("", "基隆市,", "臺北市,", "新北市,", "桃園市,", "新竹市,", "新竹縣,", "苗栗縣,", "臺中市,", "彰化縣,", "南投縣,", "雲林縣,"
					 , "嘉義市,", "嘉義縣,", "臺南市,", "高雄市,", "屏東縣,", "宜蘭縣,", "花蓮縣,", "臺東縣,", "澎湖縣,", "金門縣,", "連江縣,");

	for($i = 1; $i <= 7; $i++)
	{
		if($_POST['exam_'.$i] == '1')
			$allowance_list .= $a_ary[$i];
	}

	for($i = 1; $i <= 22; $i++)
	{
		if($_POST['city_'.$i] == '1')
			$city_list .= $c_ary[$i];
	}

	// 更新資料庫
	$sql_edu2 = "UPDATE edu_city                                                           ".
				"	SET exam_1  = '$exam_1'  , exam_2  = '$exam_2'  , exam_3  = '$exam_3'  ".
				"	  , exam_4  = '$exam_4'  , exam_5  = '$exam_5'  , exam_6  = '$exam_6'  ".
				"	  , city_1  = '$city_1'  , city_2  = '$city_2'  , city_3  = '$city_3'  ".
				"	  , city_4  = '$city_4'  , city_5  = '$city_5'  , city_6  = '$city_6'  ".
				"	  , city_7  = '$city_7'  , city_8  = '$city_8'  , city_9  = '$city_9'  ".
				"	  , city_10 = '$city_10' , city_11 = '$city_11' , city_12 = '$city_12' ".
				"	  , city_13 = '$city_13' , city_14 = '$city_14' , city_15 = '$city_15' ".
				"	  , city_16 = '$city_16' , city_17 = '$city_17' , city_18 = '$city_18' ".
				"	  , city_19 = '$city_19' , city_20 = '$city_20' , city_21 = '$city_21' ".
				"	  , city_22 = '$city_22' 			                                   ".
				" WHERE cityid  = '$name'                                                  ";

	// 新增資料進資料庫語法
	if(mysql_query($sql_edu2))
	{
		// 記錄log
		$sql = " insert into audit_log ".
			   " (account, set_account, city_list, city_list_old, allowance_list, allowance_list_old, update_date) ".
			   " values ".
			   " ('$username', '$name', '$city_list', '$city_list_old', '$allowance_list', '$allowance_list_old', now()) ";
		mysql_query($sql);

		echo '設定成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=examine_setting_check.php>';
	}
	else
	{
		echo '設定失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=education_index.php>';
	}

	include "../../footer.php";
?>