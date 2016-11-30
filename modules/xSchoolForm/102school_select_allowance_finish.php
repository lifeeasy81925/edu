<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$a158 = $_POST['a158']; //申請補1
$a159 = $_POST['a159']; //申請補2
$a160 = $_POST['a160']; //申請補3-1
$a161 = $_POST['a161']; //申請補3-2
$a162 = $_POST['a162']; //申請補4
$a163 = $_POST['a163']; //申請補5
$a164 = $_POST['a164']; //申請補6
$a165 = $_POST['a165']; //申請補7

$check3467=0;

$sql = "update 102schooldata set a158='$a158', a159='$a159', a160='$a160', a161='$a161', a162='$a162', a163='$a163', a164='$a164', a165='$a165' where account='$username'";

if(mysql_query($sql)){

	//檢查硬體項目不超過2項
	if( ($a160+$a162+$a164+$a165)>2 || ($a161+$a162+$a164+$a165)>2 ) $check3467=1;
	if($check3467==1){
		echo '<br><font color=red>硬體項目（補助項目三、四、六、七）最多可申請兩項！</font>';
		echo '<br>(自動回前頁)';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=102school_select_allowance.php>';
	}else{
		echo '<br>新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=102school_write_allowance.php>';
	}
}else{
	echo '<br>新增失敗!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=login>';
}

?>
<?php
include "../../footer.php";
?>
