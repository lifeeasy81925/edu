<?php
	$username = $xoopsUser->getVar('uname');
	$email = $xoopsUser->getVar('email');
	$user_from = $xoopsUser->getVar('user_from');
	
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_city = $xoopsDB -> query($sql) or die($sql);
	
	while($row = mysql_fetch_row($result_city)) 
	{
		$cityname = $row[1];//�����W
		$cityman = $row[2];//�ӿ�H�m�W
		$examine = $row[3];//�Ϥ��Ш|��2/����1�f���v��
	}
	echo $username."--".$email."--".$cityname.$cityman;

?>