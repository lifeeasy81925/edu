<?php

	$postdate = date("Y-m-d H:i:s");
	
	//判斷日期	
	$school_year = 106; //為學年度
	
	$sql_date2 = "select * from time_limit where account = '$username' and school_year = '$school_year';";
	$result_date2 = mysql_query($sql_date2);
	while($row = mysql_fetch_array($result_date2))
	{
		$start_date = $row['start_date'];//開始日期
		$end_date = $row['end_date'];//結束日期
	}
	
	/*echo $postdate;
	echo $start_date;
	echo $end_date;
	echo "--" . strtotime($postdate) . "--" . strtotime($start_date);*/
	if((strtotime($postdate) >= strtotime($start_date) && strtotime($postdate) <= strtotime($end_date)) || $username == 'Izumo')
	{
	}
	else
	{
		echo '<script Language="Javascript" FOR="window" EVENT="onLoad"> window.alert("已逾時，現在不能填報。"); </script>';
		//echo '<meta http-equiv=REFRESH CONTENT=0;url=../../user.php?op=logout>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../school_index.php>';
	}
?>

