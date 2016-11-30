<?php
	$username = $xoopsUser->getVar('uname');
	$email = $xoopsUser->getVar('email');
	$user_icq = $xoopsUser->getVar('user_icq');
	$user_from = $xoopsUser->getVar('user_from');
	
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('school') . " where `account` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	
	list($account , $city , $school , $class) = $xoopsDB->fetchRow($result);
		
	$sql_school = "select cityname, district, schoolname, schooltype from schooldata where `account` = '$username'";
	$result = mysql_query($sql_school);
	while($row = mysql_fetch_row($result))
	{
		$class = $row[3];
		$city = $row[0];
		$school = $row[0].$row[1].$row[2];//學校全名
	}

	echo $username.'--'.$user_from.'--'.$email;	//Account & E-Mail
	echo "--"; 
	echo $school;
	echo "--";
	switch($class) 
	{ 
		case "1":
			echo "國小組";
			break;
		case "2":
			echo "國中組";
			break;
		default:
			echo "非學校單位";
	}
	
?>