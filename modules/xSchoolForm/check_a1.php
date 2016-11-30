<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? 
include "allowance_set.php";

//判斷補助項目一
if($a_1 == 1){
	if($class == '1' ){//把element_money 的pointer1設為1
		$sql = "update  100element_money set pointer1='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_money set pointer1='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	if($class == '1' ){//把element_money 的pointer1設為1
		$sql = "update  100element_examine_money set pointer1='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_examine_money set pointer1='1' where account = '$username'";
    	$result = mysql_query($sql); 	
		}

	echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance1.php>';
}else{
	if($class == '1' ){//把element_money 的pointer1設為1
		$sql = "update  100element_money set pointer1='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_money set pointer1='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	if($class == '1' ){//把element_money 的pointer1設為1
		$sql = "update  100element_examine_money set pointer1='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}
	else{
		$sql = "update  100junior_examine_money set pointer1='0' where account = '$username'";
    	$result = mysql_query($sql); 	
		}		
	echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a2.php>';
}
?>	
<?php
include "../../footer.php";
?>