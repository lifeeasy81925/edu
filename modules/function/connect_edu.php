<?php
	$username = $xoopsUser->getVar('uname');
	$email = $xoopsUser->getVar('email');
	$user_from = $xoopsUser->getVar('user_from');
	
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_city = $xoopsDB -> query($sql) or die($sql);
	
	while($row = mysql_fetch_row($result_city)) 
	{
		$cityname = $row[1];//縣市名
		$cityman = $row[2];//承辦人姓名
		$examine = $row[3];//區分教育部2/縣市1審核權限
	}
	echo $username."--".$email."--".$cityname.$cityman;

?>