<?php
	// 判斷日期

	$postdate = date("Y-m-d H:i:s");

	$school_year = 106;  // 為學年度

	$sql_date2 = "select * from time_limit where account = '$username' and school_year = '$school_year';";

	$result_date2 = mysql_query($sql_date2);

	while($row = mysql_fetch_array($result_date2))
	{
		$start_date = $row['start_date'];  // 開始日期
		$end_date = $row['end_date'];      // 結束日期
	}

	if((strtotime($postdate) >= strtotime($start_date) && strtotime($postdate) <= strtotime($end_date)) || $username == 'Izumo')
	{
		include "../../function/checkmail.php";
	}
	else
	{
		echo '<script Language="Javascript" FOR="window" EVENT="onLoad"> window.alert("填報時間未開始或已逾期。\n\n欲查詢作業期程，請參閱「106年度教育優先區計畫」。"); </script>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../school_index.php>';
	}
?>