<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?> 
<? 
include "allowance_set.php";

//判斷補助項目三
if($a_3 == 1){
	if($class == '1' ){
		$sql = "update  100element_money set pointer3='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_money set pointer3='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	if($class == '1' ){
		$sql = "update  100element_examine_money set pointer3='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_examine_money set pointer3='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}

	echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance3.php>';
}else{
if($class == '1' ){
		$sql = "update  100element_money set pointer3='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_money set pointer3='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
if($class == '1' ){
		$sql = "update  100element_examine_money set pointer3='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_examine_money set pointer3='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a4.php>';
}
?>
<?php
include "../../footer.php";
?>