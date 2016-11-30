<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<p>讀取資料...<br />
<?php

$datetime = date ("Y" , mktime(date('Y'))) ; 
$serial = 0;
		
//$sql = "select * from 102schooldata where account like '$username'";
$sql = "select * from 102schooldata where type like '2'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0];		//帳號
	$type = $row[1];	//學校型態
	$city = $row[2];	//縣市
	$district = $row[4];//區
	$school = $row[5];	//學校名稱
	$area = $row[109];	//學校所在區域
	
	$laststudent = $row[26];
	$a100 = $row[100];
	$a101 = $row[101];
	$a062 = $row[62];
	$a065 = $row[65];
	$a068 = $row[68];

	$sql_99 = "select * from 100junior_point6 where account like '$id'";
	$result_99 = mysql_query($sql_99);
	while($row_99 = mysql_fetch_row($result_99)){
		$a062_99 = $row_99[5];
		$a065_99 = $row_99[8];
		$a068_99 = $row_99[11];
	}

	if(($a062==0 && $a065==0 && $a068==0) && ($a062_99>0 || $a065_99>0 || $a065_99>0)){
		$serial=$serial+1;
		echo $serial."__".$id."__".$city.$district.$school."__學生數：".$a100."__班級數：".$a101."__調入".$a062."__實缺".$a065."__其他".$a068."__原填調入".$a062_99."__原填實缺".$a065_99."__原填其他".$a068_99."<br>";
		
		
		$sql = "update 102schooldata set a062='$a062_99', a065='$a065_99', a068='$a068_99' where account='$id'";
		if(mysql_query($sql)){
			echo '<br>新增成功!';
		}else{
			echo '<br>新增失敗!';
		}
		
	}

	
}
?>