<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<?php
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
                echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance8.php>';
        }
?>
<?php
include "../../footer.php";
?>
