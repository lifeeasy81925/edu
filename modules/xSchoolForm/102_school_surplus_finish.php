<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	
	$a1_surplus = $_POST['a1_surplus'];
	$a2_surplus = $_POST['a2_surplus'];
	$a3_surplus = $_POST['a3_surplus'];
	$a4_surplus = $_POST['a4_surplus'];
	$a5_surplus = $_POST['a5_surplus'];
	$a6_surplus = $_POST['a6_surplus'];
	$a7_surplus = $_POST['a7_surplus'];
	
	$a1_surplus_1 = $_POST['a1_surplus_1'];
	$a2_surplus_1 = $_POST['a2_surplus_1'];
	$a3_surplus_1 = $_POST['a3_surplus_1'];
	$a4_surplus_1 = $_POST['a4_surplus_1'];
	$a5_surplus_1 = $_POST['a5_surplus_1'];
	$a6_surplus_1 = $_POST['a6_surplus_1'];
	$a7_surplus_1 = $_POST['a7_surplus_1'];
	
	$a1_surplus_2 = $_POST['a1_surplus_2'];
	$a2_surplus_2 = $_POST['a2_surplus_2'];
	$a3_surplus_2 = $_POST['a3_surplus_2'];
	$a4_surplus_2 = $_POST['a4_surplus_2'];
	$a5_surplus_2 = $_POST['a5_surplus_2'];
	$a6_surplus_2 = $_POST['a6_surplus_2'];
	$a7_surplus_2 = $_POST['a7_surplus_2'];
	
	$sql = " update 102surplus set ".
		   "                        a1_current='$a1_surplus_1' ".
		   "                      , a1_capital='$a1_surplus_2' ".
		   "                      , a1_total='$a1_surplus' ".
		   
		   "                      , a2_current='$a2_surplus_1' ".
		   "                      , a2_capital='$a2_surplus_2' ".
		   "                      , a2_total='$a2_surplus' ".
		   
		   "                      , a3_current='$a3_surplus_1' ".
		   "                      , a3_capital='$a3_surplus_2' ".
		   "                      , a3_total='$a3_surplus' ".
		   
		   "                      , a4_current='$a4_surplus_1' ".
		   "                      , a4_capital='$a4_surplus_2' ".
		   "                      , a4_total='$a4_surplus' ".
		   
		   "                      , a5_current='$a5_surplus_1' ".
		   "                      , a5_capital='$a5_surplus_2' ".
		   "                      , a5_total='$a5_surplus' ".
		   
		   "                      , a6_current='$a6_surplus_1' ".
		   "                      , a6_capital='$a6_surplus_2' ".
		   "                      , a6_total='$a6_surplus' ".
		   
		   "                      , a7_current='$a7_surplus_1' ".
		   "                      , a7_capital='$a7_surplus_2' ".
		   "                      , a7_total='$a7_surplus' ".
		   "                      , update_date = NOW() ".
		   " where account = '$username'; ";
	
	//echo $sql;
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=school_index.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=102_school_surplus.php>';
	}

?>
<?php
include "../../footer.php";
?>