<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$last = date("Y-m-d H:i:s");
$ef_1 = $_POST['ef_1'];
$ef_2 = $_POST['ef_2'];
$ef_3 = $_POST['ef_3'];
$ef_4 = $_POST['ef_4'];
$ef_5 = $_POST['ef_5'];
$ef_6 = $_POST['ef_6'];
$ef_7 = $_POST['ef_7'];
$ef_8 = $_POST['ef_8'];
$ef_9 = $_POST['ef_9'];
$ef_10 = $_POST['ef_10'];
$ef_11 = $_POST['ef_11'];
$ef_12 = $_POST['ef_12'];
$ef_13 = $_POST['ef_13'];
$ef_14 = $_POST['ef_14'];
$ef_15 = $_POST['ef_15'];

//在101school_effect記錄下來填報資料
$sql = "update 101school_effect set  last = '$last', a6_1 = '$ef_1', a6_2 = '$ef_2', a6_3 = '$ef_3', a6_4 = '$ef_4', a6_5 = '$ef_5', a6_6 = '$ef_6', a6_7 = '$ef_7', a6_8 = '$ef_8', a6_9 = '$ef_9', a6_10 = '$ef_10', a6_11 = '$ef_11', a6_12 = '$ef_12', a6_13 = '$ef_13', a6_14 = '$ef_14', a6_15 = '$ef_15' where account = '$username'";
if(mysql_query($sql)){
	echo '新增成功!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=effect_101_school_list.php>';
}else{
	echo '新增失敗!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=effect_101_school_06.php>';
}

?>
<?php
include "../../footer.php";
?>