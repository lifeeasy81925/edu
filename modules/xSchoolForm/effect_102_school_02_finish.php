<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$last = date("Y-m-d H:i:s");
	$ef_1 = $_POST['ef_1'];
	$ef_2 = $_POST['ef_2'];
	$ef_3 = $_POST['ef_3'];
	$ef_4 = $_POST['ef_4'];
	$ef_5 = $_POST['ef_5'];
	$ef_6 = $_POST['ef_6'];
	$ef_7 = $_POST['ef_7'];
	$ef_8 = $_POST['ef_8'];
	$ef_9 = $_POST['ef_9'];
	$ef_10 = $_POST['ef_10'];
	$ef_11 = $_POST['ef_11'];
	$ef_12 = $_POST['ef_12'];
	$ef_13 = $_POST['ef_13'];
	$ef_14 = $_POST['ef_14'];
	$ef_15 = $_POST['ef_15'];

	//在102school_effect記錄下來填報資料
	//找102school_effect有無資料，有用UPDATE沒有用INSERT
	$effect_sql = " SELECT account FROM 102school_effect where account = '$username' ";
	$result = mysql_query($effect_sql);
	$num_rows = mysql_num_rows($result);
	
	if($num_rows == 0) //沒資料
	{
		$data_sql = " SELECT account, TYPE, cityname, district, school FROM 102schooldata where account = '$username' ";
		$result = mysql_query($data_sql);
		while($row = mysql_fetch_row($result))
		{
			$school_account = $row[0]; //帳號
			$school_type = $row[1]; //
			$school_city = $row[2]; //縣市
			$school_discrict = $row[3]; //區
			$school_name = $row[4]; //校名
		}
		
		$sql = "insert 102school_effect (account, type, city, district, name, last, a2_1, a2_2, a2_3, a2_4, a2_5, a2_6, a2_7, a2_8 " . 
		                                 ", a2_9, a2_10, a2_11, a2_12, a2_13, a2_14, a2_15)" . 
								" values ('$school_account', '$school_type', '$school_city', '$school_discrict', '$school_name', '$last', '$ef_1' " . 
								         ", '$ef_2', '$ef_3', '$ef_4', '$ef_5', '$ef_6', '$ef_7', '$ef_8', '$ef_9', '$ef_10', '$ef_11', '$ef_12', '$ef_13' " .
										 ", '$ef_14', '$ef_15' )";
	}
	else
	{
		$sql = "update 102school_effect set  last = '$last', a2_1 = '$ef_1', a2_2 = '$ef_2', a2_3 = '$ef_3', a2_4 = '$ef_4', a2_5 = '$ef_5', a2_6 = '$ef_6', a2_7 = '$ef_7', a2_8 = '$ef_8', a2_9 = '$ef_9', a2_10 = '$ef_10', a2_11 = '$ef_11', a2_12 = '$ef_12', a2_13 = '$ef_13', a2_14 = '$ef_14', a2_15 = '$ef_15' where account = '$username'";
	}

	if(mysql_query($sql)){
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=effect_102_school_list.php>';
	}else{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=effect_102_school_02.php>';
	}

?>
<?php
include "../../footer.php";
?>