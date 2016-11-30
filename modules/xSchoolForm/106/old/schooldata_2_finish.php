<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$teacher_3years_total = $_POST['total'];
	$teacher = $_POST['tnumber1']; 
	$teacher_change_total = $_POST['different'];
	$teacher_agent_total = $_POST['different2'];
	$teacher_change_rate  = number_format($_POST['per'],2);
	$teacher_agent_rate  = number_format($_POST['per2'],2);
	$teacher_change_in = $_POST['ltnumber1'];
	$teacher_change_lack = $_POST['ltnumber4'];
	$teacher_change_other = $_POST['ltnumber7'];
	
	$teacher_change_in_last = $_POST['ltnumber2']; //去年教師異動
	$teacher_change_lack_last = $_POST['ltnumber5'];
	$teacher_change_other_last = $_POST['ltnumber8'];
		
	$school_year = $_POST['school_year'];	
	
	$page2_warning = $_POST['page2_warning'];
	$page2_desc = $_POST['page2_desc'];

	$sql = " update schooldata_year set teacher_3years_total='$teacher_3years_total' ".
		   "                          , teacher='$teacher' ".
		   "                          , teacher_change_total='$teacher_change_total' ".
		   "                          , teacher_agent_total='$teacher_agent_total' ".
		   "                          , teacher_change_rate='$teacher_change_rate' ".
		   "                          , teacher_agent_rate='$teacher_agent_rate' ".
		   "                          , teacher_change_in='$teacher_change_in' ".
		   "                          , teacher_change_lack='$teacher_change_lack' ".
		   "                          , teacher_change_other='$teacher_change_other' ".
		   "                          , teacher_change_in_last='$teacher_change_in_last' ".
		   "                          , teacher_change_lack_last='$teacher_change_lack_last' ".
		   "                          , teacher_change_other_last='$teacher_change_other_last' ".
		   "                          , page2_warning='$page2_warning' ".
		   "                          , page2_desc='$page2_desc' ".
		   " where account='$username' and school_year = '$school_year' ";
		   
	if(mysql_query($sql))
	{
		echo '<br>新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=schooldata_3.php>';
	}
	else
	{
		echo '<br>新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../../../user.php?op=login>';
	}

?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>