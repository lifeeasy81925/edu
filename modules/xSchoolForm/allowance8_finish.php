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

//$lastgym = $_POST['lastgym'];
//$lastgymMon = $_POST['lastgymMon'];
//$lastgymExe = $_POST['lastgymExe'];
//$lastgymPer = $_POST['lastgymPer'];

//$lastclass = $_POST['lastclass'];
//$lastclassMon = $_POST['lastclassMon'];
//$lastclassExe = $_POST['lastclassExe'];
//$lastclassPer = $_POST['lastclassPer'];

//$lastground = $_POST['lastground'];
//$lastgroundMon = $_POST['lastgroundMon'];
//$lastgroundExe = $_POST['lastgroundExe'];
//$lastgroundPer = $_POST['lastgroundPer'];

//$thisMon= $_POST['thisMon'];

//$thisgym= $_POST['thisgym'];
//$thisgymMon = $_POST['thisgymMon'];
//$thisgymExe = $_POST['thisgymExe'];
//$thisgymPer = $_POST['thisgymPer'];

//$thisclass = $_POST['thisclass'];
//$thisclassMon = $_POST['thisclassMon'];
//$thisclassExe = $_POST['thisclassExe'];
//$thisclassPer = $_POST['thisclassPer'];

//$thisground = $_POST['thisground'];
//$thisgroundMon = $_POST['thisgroundMon'];
//$thisgroundExe = $_POST['thisgroundExe'];
//$thisgroundPer = $_POST['thisgroundPer'];

$money = $_POST['money'];

$afterGym = $_POST['afterGym'];
$aftergymMon = $_POST['aftergymMon'];
$aftergymExe = $_POST['aftergymExe'];
$aftergymPer = $_POST['aftergymPer'];

$afterclass = $_POST['afterclass'];
$afterclassMon = $_POST['afterclassMon'];
$afterclassExe = $_POST['afterclassExe'];
$afterclassPer = $_POST['afterclassPer'];

$afterground= $_POST['afterground'];
$aftergroundMon = $_POST['aftergroundMon'];
$aftergroundExe = $_POST['aftergroundExe'];
$aftergroundPer = $_POST['aftergroundPer'];
$aftergroundsize = $_POST['aftergroundsize'];

//在money table記錄下來申請經費
if($class == '1' ){
			$sql = "update 100element_money set  a8_1 = '$aftergymMon'+'$aftergymExe',a8_2 = '$afterclassMon',a8_3 = '$aftergroundMon' where account='$username'";
			mysql_query($sql);
}
	else{
			$sql = "update 100junior_money set   a8_1 = '$aftergymMon'+'$aftergymExe',a8_2 = '$afterclassMon',a8_3 = '$aftergroundMon' where account='$username'";
			mysql_query($sql);
	}


        //新增資料進資料庫語法  
if($class == '1' ){
$sql = "update 100element_allowance8 set money='$money',afterGym='$afterGym',aftergymMon='$aftergymMon',aftergymExe='$aftergymExe',aftergymPer='$aftergymPer',afterclass='$afterclass',afterclassMon='$afterclassMon',afterclassMon='$afterclassMon',afterclassExe='$afterclassExe',afterclassPer='$afterclassPer',afterground='$afterground',aftergroundMon='$aftergroundMon',aftergroundMon='$aftergroundMon',aftergroundExe='$aftergroundExe',aftergroundPer='$aftergroundPer',aftergroundsize='$aftergroundsize' where account='$username'";			
	}
else{
$sql = "update 100junior_allowance8 set money='$money',afterGym='$afterGym',aftergymMon='$aftergymMon',aftergymExe='$aftergymExe',aftergymPer='$aftergymPer',afterclass='$afterclass',afterclassMon='$afterclassMon',afterclassMon='$afterclassMon',afterclassExe='$afterclassExe',afterclassPer='$afterclassPer',afterground='$afterground',aftergroundMon='$aftergroundMon',aftergroundMon='$aftergroundMon',aftergroundExe='$aftergroundExe',aftergroundPer='$aftergroundPer',aftergroundsize='$aftergroundsize' where account='$username'";
				
		} 
		
		
        if(mysql_query($sql))
        {
                echo '新增成功!';
                //echo '<meta http-equiv=REFRESH CONTENT=0;url=print_allowance.php>';
				echo '<meta http-equiv=REFRESH CONTENT=0;url=allowance_result.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=allowance8.php>';
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