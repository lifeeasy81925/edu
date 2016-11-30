<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<?php
$allstudent = $_POST['allstudent'];
$classes = $_POST['classes'];
$FirstGrade = $_POST['FirstGrade'];
$TwoGrade = $_POST['TwoGrade'];
$ThirdGrade = $_POST['ThirdGrade'];
$FourGrade = $_POST['FourGrade'];
$FiveGrade = $_POST['FiveGrade'];
$SixGrade = $_POST['SixGrade'];
$special = $_POST['special'];
$area = $_POST['area'];
$for_a8r1_1 = $_POST['for_a8r1_1'];
$for_a8r1_2 = $_POST['for_a8r1_2'];
$for_a8r1_3 = $_POST['for_a8r1_3'];

//echo $allstudent.$classes.$FirstGrade.$TwoGrade.$ThirdGrade.$FourGrade.$FiveGrade.$SixGrade.$area;

/*if($allstudent != null && $classes != null && $FirstGrade != null && $TwoGrade != null && $FourGrade != null &&$FiveGrade != null && $SixGrade != null && $area != null)
{*/

if($class == '1' ){
	$sql = "update 100element_basedata set allstudent='$allstudent',classes='$classes',FirstGrade='$FirstGrade',TwoGrade='$TwoGrade',ThirdGrade='$ThirdGrade',FourGrade='$FourGrade',FiveGrade='$FiveGrade',SixGrade='$SixGrade' ,special = '$special',area = '$area',for_a8r1_1 = '$for_a8r1_1',for_a8r1_2 = '$for_a8r1_2',for_a8r1_3 = '$for_a8r1_3' where account='$username'";
	
}
else{
	$sql = "update 100junior_basedata set allstudent='$allstudent',classes='$classes',FirstGrade='$FirstGrade',TwoGrade='$TwoGrade',ThirdGrade='$ThirdGrade',special = '$special',area = '$area',for_a8r1_1 = '$for_a8r1_1',for_a8r1_2 = '$for_a8r1_2',for_a8r1_3 = '$for_a8r1_3' where account='$username'";
}

if(mysql_query($sql)){
	echo '新增成功!';
    echo '<meta http-equiv=REFRESH CONTENT=0;url=point1.php>';
}
else{
	echo '新增失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}
?>