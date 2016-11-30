<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? 
include "allowance_set.php";

//離島
if($class == '1' ){
	$sql = "SELECT * FROM  100element_point345 where account = '$username'";
   	$result = mysql_query($sql); 	
}else{
	$sql = "SELECT * FROM  100junior_point345 where account = '$username'";
   	$result = mysql_query($sql); 	
}
while($row = mysql_fetch_row($result)){
	$isolation = $row[4];
}		
//判斷補助項目二		
if($a_2 == 1){
	if($class == '1' ){
		$sql = "update  100element_money set pointer2='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_money set pointer2='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	if($class == '1' ){
		$sql = "update  100element_examine_money set pointer2='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_examine_money set pointer2='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}

	echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance2.php>';
}else{
if($class == '1' ){
		$sql = "update  100element_money set pointer2='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_money set pointer2='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
if($class == '1' ){
		$sql = "update  100element_examine_money set pointer2='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_examine_money set pointer2='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}

	echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a3.php>';
}
?>
<?php
include "../../footer.php";
?>