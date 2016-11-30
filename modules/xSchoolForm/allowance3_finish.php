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
$afterMon= $_POST['afterMon'];
$develop= $_POST['develop'];
$char1 = $_POST['char1'];
$char1Mon = $_POST['char1Mon'];
$char1a = $_POST['char1a'];
$char1b = $_POST['char1b'];
$char2= $_POST['char2'];
$char2Mon = $_POST['char2Mon'];
$char2a = $_POST['char2a'];
$char2b = $_POST['char2b'];
$char_a = $char1a +$char2a;
$char_b = $char1b +$char2b;


//在money table記錄下來申請經費
if($class == '1' ){
			$sql = "update 100element_money set  a3 = '$afterMon',a3_1 = '$char_a',a3_2 = '$char_b' where account='$username'";
			mysql_query($sql);
	}
	else{
			$sql = "update 100junior_money set  a3 = '$afterMon',a3_1 = '$char_a',a3_2 = '$char_b' where account='$username'";
			mysql_query($sql);
		}


        //新增資料進資料庫語法
		if($class == '1' ){
			$sql = "update 100element_allowance3 set afterMon='$afterMon',develop='$develop',char1='$char1',char1Mon='$char1Mon',char1a='$char1a',char1b='$char1b',char2='$char2',char2Mon='$char2Mon',char2a='$char2a',char2b='$char2b'  where account='$username'";
	}
	else{
			$sql = "update 100junior_allowance3 set afterMon='$afterMon',develop='$develop',char1='$char1',char1Mon='$char1Mon',char1a='$char1a',char1b='$char1b',char2='$char2',char2Mon='$char2Mon',char2a='$char2a',char2b='$char2b'  where account='$username'";
		}  
        if(mysql_query($sql))
        {
                echo '新增成功!';
	//判斷後面是否還有可申請項目，若有→到下一個項目，若無→到申請結果頁面。

include "allowance_set.php";


	//開始判斷下一步進哪個網頁
	if ($a_4 == 1 || $a_5 == 1 || $a_6 == 1 || $a_7 == 1 || $a_8 == 1) {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a4.php>';
	} else {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance_result.php>';
	}
	//判斷結束
}else{
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance1.php>';
}
/*}
else
{
        echo '所有的欄位都需要填寫!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance1.php>';
}*/
?>
<?php
include "../../footer.php";
?>