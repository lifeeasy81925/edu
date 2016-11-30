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

if($class == '1' ){
		$sql = "select  *  from  100element_basedata where account like '$username' ";
	}
	else{
		$sql = "select  *  from  100junior_basedata where account like '$username' ";
	}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
                 $a = $row[2];//讀allstudent
        }

if($class == '1' ){
	$point="100element_point";
	$pointsql="select  *  from ".$point." where account like '$username' ";
}else{
	$point="100junior_point";
	$pointsql="select  *  from ".$point." where account like '$username' ";
}
$result = mysql_query($pointsql);
while($row = mysql_fetch_row($result)){
	$p1_1 = $row[1]; //指標1-1值
    $p1_2 = $row[2]; //指標1-2值
    $p1_3 = $row[3]; //指標1-3值	
    $p1_4 = $row[4]; //指標1-4值
}

//判斷是否符合指標二-1	
$per = $abcd/$a;
if($per >= 0.2){
	echo '符合指標二-1'.'<br>';
	$sql = "update ".$point. " set point2_1 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point2_1 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷是否符合指標二-2
if($abcd >= 60 ){
	echo '符合指標二-2'.'<br>';
	$sql = "update ".$point. " set point2_2 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point2_2 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷是否符合指標二-3

if(($abcde/$a >= 0.3) && !( $p1_1 == '1' || $p1_2 == '1' || $p1_3 == '1')){
	echo '符合指標二-3'.'<br>';
	$sql = "update ".$point. " set point2_3 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point2_3 = '0' where account = '$username' ";
	mysql_query($sql);
}

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
/*if($lowincome != null && $single != null && $difference != null && $target != null)
{*/

	if($class == '1' ){
		$sql = "update 100element_point12 set lowincome='$lowincome',single='$single',difference='$difference',immigrant='$immigrant',abcd='$abcd' ,abcde='$abcde' ,noparent = '$noparent'	where account = '$username'";		
	}
	else{
		$sql = "update 100junior_point12 set lowincome='$lowincome',single='$single',difference='$difference',immigrant='$immigrant',abcd='$abcd',abcde='$abcde' ,noparent = '$noparent' where account = '$username'";		
	}



        if(mysql_query($sql))
        {
                echo '新增成功!';
				if($class == '1'){
                echo '<meta http-equiv=REFRESH CONTENT=0;url=point4.php>';
				}
				else{
				echo '<meta http-equiv=REFRESH CONTENT=0;url=point3.php>';
				}
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=login>';
        }

?>
<?php
include "../../footer.php";
?>