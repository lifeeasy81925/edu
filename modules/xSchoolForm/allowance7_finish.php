<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php

//$lastMon = $_POST['lastMon'];
//$lastNum = $_POST['lastNum'];
//$lastExe = $_POST['lastExe'];
//$lastPer = $_POST['lastPer'];
//$thisMon = $_POST['thisMon'];
//$thisNum = $_POST['thisNum'];
//$thisExe = $_POST['thisExe'];
//$thisPer = $_POST['thisPer'];
$aftertotal = $_POST['aftertotal'];
$afterNum = $_POST['afterNum'];
$afterMon = $_POST['afterMon'];
$traffic= $_POST['traffic'];
$trafficMon = $_POST['trafficMon'];
$seat = $_POST['seat'];
$seatMon = $_POST['seatMon'];
$allowance = $_POST['point'];

//在money table記錄下來申請經費
if($class == '1' ){
	$sql = "update 100element_money set  a7_1 = '$afterMon',a7_2 = '$trafficMon',a7_3 = '$seatMon' where account='$username'";
	mysql_query($sql);
}else{
	$sql = "update 100junior_money set   a7_1 = '$afterMon',a7_2 = '$trafficMon',a7_3 = '$seatMon' where account='$username'";
	mysql_query($sql);
}

//新增資料進資料庫語法  
if($class == '1' ){
	$sql = "update 100element_allowance7 set afterMon='$afterMon',aftertotal='$aftertotal',afterNum='$afterNum',traffic='$traffic',trafficMon='$trafficMon',seat='$seat',seatMon='$seatMon',allowance='$allowance' where account='$username'";
}else{
	$sql = "update 100junior_allowance7 set afterMon='$afterMon',aftertotal='$aftertotal',afterNum='$afterNum',traffic='$traffic',trafficMon='$trafficMon',seat='$seat',seatMon='$seatMon',allowance='$allowance' where account='$username'";
} 
//寫入資料庫，並判斷是否寫入成功
if(mysql_query($sql)){
	echo '新增成功!';
	//判斷後面是否還有可申請項目，若有→到下一個項目，若無→到申請結果頁面。

include "allowance_set.php";


	//開始判斷下一步進哪個網頁
	if ($a_8 == 1) {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a8.php>';
	} else {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance_result.php>';
	}
	//判斷結束
}else{
	echo '新增失敗!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance7.php>'; //回到申請項目七
}

		
/*}
else
{
        echo '所有的欄位都需要填寫!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance6.php>';
}*/
?>
<?php
include "../../footer.php";
?>