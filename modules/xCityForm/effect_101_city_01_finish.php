<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
  while($row = mysql_fetch_row($result_city)) {
            $city = $row[1];
			$cityman = $row[2];
			$examine = $row[3];
			$cityno = $row[4];
			}
//$a = $_SESSION['ary'];
//echo "TEST Array:<br>";
//foreach($a as $value){
//	echo $value;
//}
//echo "<br>";
$last = date("Y-m-d H:i:s");
$a1=$_POST['a1'];
$a2=$_POST['a2'];
$a3=$_POST['a3'];
$a4=$_POST['a4'];
$a5=$_POST['a5'];
$a6=$_POST['a6'];
$a7=$_POST['a7'];
$a8=$_POST['a8'];
$a9=$_POST['a9'];
$a10=$_POST['a10'];
$a11=$_POST['a11'];
$a12=$_POST['a12'];
$a13=$_POST['a13'];
$a14=$_POST['a14'];
$a15=$_POST['a15'];
$a16=$_POST['a16'];
$a17=$_POST['a17'];
$a18=$_POST['a18'];
$a19=$_POST['a19'];
$a20=$_POST['a20'];
$a21=$_POST['a21'];
$a22=$_POST['a22'];
$a23=$_POST['a23'];
$a24=$_POST['a24'];
$a25=$_POST['a25'];
$a26=$_POST['a26'];
$a27=$_POST['a27'];
$a28=$_POST['a28'];
$a29=$_POST['a29'];
$a30=$_POST['a30'];
$a31=$_POST['a31'];
$a32=$_POST['a32'];
$a33=$_POST['a33'];
$a34=$_POST['a34'];
$a35=$_POST['a35'];
$a36=$_POST['a36'];
$a37=$_POST['a37'];


$sql = "update 101city_effect set a1='$a1', a2='$a2', a3='$a3', a4='$a4', a5='$a5', a6='$a6', a7='$a7', a8='$a8', a9='$a9', a10='$a10', a11='$a11', a12='$a12', a13='$a13', a14='$a14', a15='$a15', a16='$a16', a17='$a17', a18='$a18', a19='$a19', a20='$a20', a21='$a21', a22='$a22', a23='$a23', a24='$a24', a25='$a25', a26='$a26', a27='$a27', a28='$a28', a29='$a29', a30='$a30', a31='$a31', a32='$a32', a33='$a33', a34='$a34', a35='$a35', a36='$a36', a37='$a37', last = '$last' where city='$city'";
if(mysql_query($sql)){
	echo '新增成功！<br>';
	//echo '<meta http-equiv=REFRESH CONTENT=2;url=effect_101_city_01.php>';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=city_index.php>';
}else{
	echo '新增失敗！<br>';
	//echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}



/*
foreach($row as $key => $value){
	if($key < 2) continue;
	$col = 'a' . ($key-1) ;
	$sql = "update 100city_effect set $col ='$value' where city='$city'";
	echo $key.$value.$col."<br>";
	mysql_query($sql);
	if(mysql_query($sql)){
		//echo '新增成功！<br>';
		//echo '<meta http-equiv=REFRESH CONTENT=2;url=city_index.php>';
	}else{
		echo '新增失敗！<br>';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
	}
}
echo '新增成功！<br>';
echo '<meta http-equiv=REFRESH CONTENT=2;url=city_index.php>';
*/
include "../../footer.php";
?>