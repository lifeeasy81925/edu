<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$afterMon = $_POST['afterMon'];
$afterLec = $_POST['afterLec'];
$afterNum = $_POST['afterNum'];

$afterFamMon = $_POST['afterFamMon'];
$afterFamMonLec = $_POST['afterFamMonLec'];

//在money table記錄下來申請經費
if($class == '1' ){
			$sql = "update 100element_money set  a1_1 = '$afterMon', a1_2 = '$afterFamMon' where account='$username'";
			mysql_query($sql);
	}
	else{
			$sql = "update 100junior_money set  a1_1 = '$afterMon', a1_2 = '$afterFamMon' where account='$username'";
			mysql_query($sql);
		}

if($class == '1' ){
			$sql = "update 100element_allowance1 set afterMon ='$afterMon',afterLec='$afterLec',afterNum='$afterNum',afterFamMon='$afterFamMon',afterFamMonLec='$afterFamMonLec' where account='$username'";
	}
	else{
			$sql = "update 100junior_allowance1 set afterMon ='$afterMon',afterLec='$afterLec',afterNum='$afterNum',afterFamMon='$afterFamMon',afterFamMonLec='$afterFamMonLec' where account='$username'";
		}
        //新增資料進資料庫語法  

        if(mysql_query($sql))
        {
                echo '新增成功!';
	//判斷後面是否還有可申請項目，若有→到下一個項目，若無→到申請結果頁面。
	
include "allowance_set.php";

	//開始判斷下一步進哪個網頁
	if ($a_2 == 1 || $a_3 == 1 || $a_4 == 1 || $a_5 == 1 || $a_6 == 1 || $a_7 == 1 || $a_8 == 1) {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=check_a2.php>';
	} else {
		echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance_result.php>';
	}
	//判斷結束
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance1.php>';
        }

?>
<?php
include "../../footer.php";
?>