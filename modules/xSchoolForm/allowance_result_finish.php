<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
if($class == '1' ){
			$basedata="100element_point345";
	}
	else{
			$basedata="100junior_point345";
	}
$sql_a2 = "select  *  from ".$basedata." where account like '$username'";		
$result_a2 = mysql_query($sql_a2);
while($row = mysql_fetch_row($result_a2)){
				$tmp = $row[4];
}
if($class == '1' ){
			$basedata="100element_point";
	}
	else{
			$basedata="100junior_point";
	}			
$sql_point = "select  *  from ".$basedata." where account like '$username'";
$result_point = mysql_query($sql_point);
while($row = mysql_fetch_row($result_point))
        {
                 $a = $row[1];			//1-1
				 $b = $row[2];			//1-2
				 $c = $row[3];			//1-3
				 $d = $row[4];			//1-4
				 $e = $row[5];			//2-1
				 $f = $row[6];			//2-2
				 $g = $row[7];			//3
				 $h = $row[8];			//4
				 $i = $row[9];			//6
				 $j = $row[10];			//2-3
				 $k = $row[11];			//5
        }
//將可申請補助項目註記於資料庫
if($class == '1' ){
			$allowance="100element_allowance";
	}
	else{
			$allowance="100junior_allowance";
	}
if($a==1 || $b==1 || $c==1 || $d==1 || $e==1 || $f==1 || $h==1 || $k==1 ){ //符合補助項目一
	$sql_allowance = "update ".$allowance. " set a_1 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_1 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
}
 if($a==1 || $tmp==1 ){  //符合補助項目二
	$sql_allowance = "update ".$allowance. " set a_2 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_2 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
}
	if($e==1 || $f==1 || $j==1 || $h==1 || $k==1){  //符合補助項目三
	$sql_allowance = "update ".$allowance. " set a_3 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_3 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
}
	if($a==1 || $b==1 || $c==1 || $d==1 || $k==1 || $i ==1){   //符合補助項目四
	$sql_allowance = "update ".$allowance. " set a_4 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_4 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
 } 
	if($a==1 || $b==1 || $c==1 || $d==1 || $g ==1){   //符合補助項目五
	$sql_allowance = "update ".$allowance. " set a_5 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_5 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
}   
	if($a==1 || $b==1 || $c==1 || $d==1){   //符合補助項目六
	$sql_allowance = "update ".$allowance. " set a_6 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_6 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
}
    if($k ==1){   //符合補助項目七
	$sql_allowance = "update ".$allowance. " set a_7 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_7 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
}	
	if($a==1 || $b==1 || $c==1 || $d==1 || $e==1 || $f==1 || $h ==1 ){   //符合補助項目八
	$sql_allowance = "update ".$allowance. " set a_8 = '1' where account = '$username' ";
	mysql_query($sql_allowance);
}else{
	$sql_allowance = "update ".$allowance. " set a_8 = '0' where account = '$username' ";
	mysql_query($sql_allowance);
}
//讀allownace1的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance1 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance1 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $a = $row[9];//讀afterMon
				 $b = $row[18];//讀afterFamMon
        }
//讀allowance2的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance2 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance2 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $c = $row[11];//讀afterLearnMon
				 
        }
//讀allowance3的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance3 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance3 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $d = $row[9];//讀afterMon
				 
        }
//讀allowance4的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance4 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance4 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $e = $row[9];//讀afterEquipMon
				 
        }
//讀allowance5的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance5 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance5 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $f = $row[7];//讀afterEquipMon
				 
        }
//讀allowance6的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance6 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance6 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $g = $row[9];//讀afterEquipMon
				 
        }
//讀allowance7的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance7 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance7 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $h = $row[10];//讀afterEquipMon
				 
        }
//讀allowance8的申請經費
if($class == '1' ){
		$sql = "select  *  from  100element_allowance8 where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_allowance8 where account like '$username' ";
	}	
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $i = $row[29];//讀afterEquipMon
				 
        }
//申請經費的總合
/*echo $a.'<br>';
echo $b.'<br>';
echo $c.'<br>';
echo $d.'<br>';
echo $e.'<br>';
echo $f.'<br>';
echo $g.'<br>';
echo $h.'<br>';
echo $i.'<br>';*/
		
$total = $a + $b + $c +$d + $e + $f + $g + $h + $i;

//把$total存入DB

	if($class == '1' ){
		$sql = "update 100element_basedata set total='$total' where account like '$username' ";		
	}
	else{
		$sql = "update 100junior_basedata set total='$total' where account like '$username'";		
	}

        if(mysql_query($sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=print_allowance.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance_result.php>';
        }
?>
<?php
include "../../footer.php";
?>