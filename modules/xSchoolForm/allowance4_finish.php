<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

//$lastMon = $_POST['lastMon'];
//$lastExe = $_POST['lastExe'];
//$lastPer = $_POST['lastPer'];
//$thisMon = $_POST['thisMon'];
//$thisExe = $_POST['thisExe'];
//$thisPer = $_POST['thisPer'];
$afterMon = $_POST['afterMon'];
$afterEquip = $_POST['afterEquip'];
$afterEquipMon= $_POST['afterEquipMon'];
$afterMonNum = $_POST['afterMonNum'];
$afterEquipNum = $_POST['afterEquipNum'];
$thisDorm= $_POST['thisDorm'];
$lastDorm = $_POST['lastDorm'];
$beforeDorm = $_POST['beforeDorm'];
$allowance = $_POST['RadioGroup1'];
$TafterMon = $_POST['TafterMon'];
$TafterEquip = $_POST['TafterEquip'];
$TafterMonNum = $_POST['TafterMonNum'];
$TafterEquipNum = $_POST['TafterEquipNum'];
$TafterEquipMon= $_POST['TafterEquipMon'];
$TthisDorm= $_POST['TthisDorm'];
$TlastDorm = $_POST['TlastDorm'];
$TbeforeDorm = $_POST['TbeforeDorm'];

//測試 $allowance
//echo '<br> $allowance = '.$allowance.'<br>';

//在money table記錄下來申請經費
if($class == '1' ){
			$sql = "update 100element_money set  a4_1 = '$afterMon',a4_2 = '$afterEquip',a4_2_1 = '$TafterMon',a4_2_2 = '$TafterEquip' where account='$username'";
			mysql_query($sql);
	}
	else{
			$sql = "update 100junior_money set  a4_1 = '$afterMon',a4_2 = '$afterEquip',a4_2_1 = '$TafterMon',a4_2_2 = '$TafterEquip' where account='$username'";
			mysql_query($sql);
		}

 
 if($class == '1' ){

			$sql = "update 100element_allowance4 set afterMon='$afterMon',afterEquip='$afterEquip',afterEquipMon='$afterEquipMon',afterMonNum='$afterMonNum',afterEquipNum='$afterEquipNum',thisDorm='$thisDorm',lastDorm='$lastDorm',beforeDorm='$beforeDorm',allowance='$allowance',TafterMon='$TafterMon',TafterEquip='$TafterEquip',TafterMonNum='$TafterMonNum',TafterEquipNum='$TafterEquipNum',TafterEquipMon='$TafterEquipMon',TthisDorm='$TthisDorm',TlastDorm='$TlastDorm',TbeforeDorm='$TbeforeDorm'  where account='$username'";
	}
	else{

			$sql = "update 100junior_allowance4 set afterMon='$afterMon',afterEquip='$afterEquip',afterEquipMon='$afterEquipMon',afterMonNum='$afterMonNum',afterEquipNum='$afterEquipNum',thisDorm='$thisDorm',lastDorm='$lastDorm',beforeDorm='$beforeDorm',allowance='$allowance',TafterMon='$TafterMon',TafterEquip='$TafterEquip',TafterMonNum='$TafterMonNum',TafterEquipNum='$TafterEquipNum',TafterEquipMon='$TafterEquipMon',TthisDorm='$TthisDorm',TlastDorm='$TlastDorm',TbeforeDorm='$TbeforeDorm'  where account='$username'";
		}  
        if(mysql_query($sql))
        {
                echo '新增成功!';
	//判斷後面是否還有可申請項目，若有→到下一個項目，若無→到申請結果頁面。

include "allowance_set.php";


	//開始判斷下一步進哪個網頁
	if ($a_5 == 1 || $a_6 == 1 || $a_7 == 1 || $a_8 == 1) {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a5.php>';
	} else {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance_result.php>';
	}
	//判斷結束
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance4.php>';
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