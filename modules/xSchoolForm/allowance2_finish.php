<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

//$lastLearnMon = $_POST['lastLearnMon'];
//$lastLearn = $_POST['lastLearn'];
//$lastLearnNum = $_POST['lastLearnNum'];
//$lastLearnExe = $_POST['lastLearnExe'];
//$lastLearnPer  = $_POST['lastLearnPer '];

//$thisLearnMon = $_POST['thisLearnMon'];
//$thisLearn = $_POST['thisLearn'];
//$thisLearnNum= $_POST['thisLearnNum'];
//$thisLearnExe = $_POST['thisLearnExe'];
//$thisLearnPer = $_POST['thisLearnPer'];

$afterLearnMon = $_POST['afterLearnMon'];

$assistclass = $_POST['assistclass'];
$assiststudents = $_POST['assiststudents'];
$assistsection = $_POST['assistsection'];
$assist = $_POST['assist'];

$holidayclass = $_POST['holidayclass'];
$holidaystudents = $_POST['holidaystudents'];
$holidaysection = $_POST['holidaysection'];
$holidayassist = $_POST['holidayassist'];

$nightclass = $_POST['nightclass'];
$nightstudents = $_POST['nightstudents'];
$nightsection = $_POST['nightsection'];
$nightassist = $_POST['nightassist'];

/*//測試用，顯示收到的SESSION
echo '<br>';
echo '$assistclass = '.$assistclass.'<br>';
echo '$assistsection = '.$assistsection.'<br>';
echo '$assist = '.$assist.'<br>';
echo '$holidaysection = '.$holidayclass.'<br>';
echo '$holidaysection = '.$holidaysection.'<br>';
echo '$holidaysection = '.$holidayassist.'<br>';
echo '$nightsection = '.$nightclass.'<br>';
echo '$nightsection = '.$nightsection.'<br>';
echo '$nightsection = '.$nightassist.'<br>';
*/
//在money table記錄下來申請經費
if($class == '1' ){
			$sql = "update 100element_money set  a2_1 = '$assist', a2_2 = '$holidayassist', a2_3 = '$nightassist' where account='$username'";
			mysql_query($sql);
}
else{
			$sql = "update 100junior_money set  a2_1 = '$assist', a2_2 = '$holidayassist', a2_3 = '$nightassist' where account='$username'";
			mysql_query($sql);
}

//新增資料進資料庫語法
if($class == '1' ){
	$sql = "update 100element_allowance2 set afterLearnMon='$afterLearnMon',assistclass='$assistclass',assiststudents='$assiststudents',assist='$assist',assistsection='$assistsection',holidayassist='$holidayassist',holidayclass='$holidayclass',holidaystudents='$holidaystudents',holidaysection='$holidaysection',nightclass='$nightclass',nightstudents='$nightstudents',nightassist='$nightassist',nightsection='$nightsection' where account='$username'";
}
else{
	$sql = "update 100junior_allowance2 set afterLearnMon='$afterLearnMon',assistclass='$assistclass',assiststudents='$assiststudents',assist='$assist',assistsection='$assistsection',holidayassist='$holidayassist',holidayclass='$holidayclass',holidaystudents='$holidaystudents',holidaysection='$holidaysection',nightclass='$nightclass',nightstudents='$nightstudents',nightassist='$nightassist',nightsection='$nightsection' where account='$username'";
}

		  

if(mysql_query($sql)){
	echo '新增成功!';
	//判斷後面是否還有可申請項目，若有→到下一個項目，若無→到申請結果頁面。

include "allowance_set.php";

	//開始判斷下一步進哪個網頁
	if ($a_3 == 1 || $a_4 == 1 || $a_5 == 1 || $a_6 == 1 || $a_7 == 1 || $a_8 == 1) {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a3.php>';
	} else {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance_result.php>';
	}
	//判斷結束
}		
else{
	echo '新增失敗!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance2.php>';
}
/*}
else{
	echo '所有的欄位都需要填寫!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance1.php>';
}*/
?>
<?php
include "../../footer.php";
?>