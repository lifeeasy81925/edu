<?php
$date = date("Y-m-d");
echo '<br>'."【今天日期：";
echo $date."】<br />";
$sql_date = "update school_checkdate set  post_date = '$date' where account='$username'";
mysql_query($sql_date);
//判斷日期	
$sql_date2 = "select  *  from  school_checkdate where account = '$username';";
$result_date2 = mysql_query($sql_date2);
while($row = mysql_fetch_row($result_date2)){
	$startdate = $row[1];//開始日期
	$enddate = $row[2];//結束日期
	$postdate = $row[3];//填報日期
}
if($postdate >= $startdate && $postdate <= $enddate){
}else{
	echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'已逾時，現在不能填報。'.'"'.')'.'</script>';
	//echo '<meta http-equiv=REFRESH CONTENT=0;url=../../user.php?op=logout>';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=school_index.php>';
}

?>

