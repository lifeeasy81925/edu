<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$allstudent = $_POST['allstudent'];
$class = $_POST['class'];
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$c4 = $_POST['c4'];
$c5 = $_POST['c5'];
$c6 = $_POST['c6'];
$c7 = $_POST['c7'];
$lastgrad = $_POST['lastgrad'];

$a147 = $_POST['a147'];
//$a148 = $_POST['a148'];
//$a149 = $_POST['a149'];
$a189 = $_POST['a189'];
//$a190 = $_POST['a190'];
//$a191 = $_POST['a191'];


$sql = "update 102schooldata set a100='$allstudent', a101='$class', a102='$c1', a103='$c2', a104='$c3', a105='$c4', a106='$c5', a107='$c6', a108='$c7', a122='$lastgrad', a147='$a147', a189='$a189' where account='$username'";

if(mysql_query($sql)){
	echo '新增成功!';
    echo '<meta http-equiv=REFRESH CONTENT=0;url=102schooldata_2.php>';
}
else{
	echo '新增失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}
?>