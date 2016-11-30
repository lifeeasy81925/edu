<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
$lowincome= $_POST['lowincome'];
$single = $_POST['single'];
$difference = $_POST['difference'];
$immigrant = $_POST['immigrant'];
$abcd = $_POST['abcd'];
$abcde = $_POST['abcde'];
$noparent = $_POST['noparent'];
$aborigine = $_POST['aborigine'];
$leaving = $_POST['leaving'];
$graduate = $_POST['graduate'];
$pr = $_POST['pr'];

//$a147 = $_POST['a147'];
//$a148 = $_POST['a148'];
$a149 = $_POST['a149'];
//$a189 = $_POST['a189'];
//$a190 = $_POST['a190'];
$a191 = $_POST['a191'];

$sql = "update 102schooldata set a113='$aborigine', a114='$lowincome', a115='$single', a116='$difference', a117='$immigrant', a118='$noparent', a119='$abcd', a120='$abcde', a122='$graduate', a123='$pr', a124='$leaving', a125='$a', a149='$a149', a191='$a191' where account = '$username'";
if(mysql_query($sql)){
	echo '新增成功!';
	sleep(1);
   	echo '<meta http-equiv=REFRESH CONTENT=0;url=102print_point_page.php>';
}else{
	echo '新增失敗!';
	sleep(1);
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=login>';
}

?>

<?php
include "../../footer.php";
?>