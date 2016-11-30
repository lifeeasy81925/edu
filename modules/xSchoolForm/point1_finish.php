<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$aborigine = $_POST['aborigine'];

//選擇資料表
if($class == '1' ){
	$basedata="100element_basedata";
	$sql = "select  *  from ".$basedata." where account like '$username'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$a = $row[2];  //讀allstudent
		$b = $row[11]; //所在地區
    }
}else{
	$basedata="100junior_basedata";
	$sql = "select  *  from ".$basedata." where account like '$username'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$a = $row[2]; //讀allstudent
		$b = $row[8]; //所在地區
	}
}			


if($class == '1' ){
	$point="100element_point";
}else{
	$point="100junior_point";
}
		
$per = $aborigine/$a;
//判斷是否符合指標一-1
if($per >= 0.4){
echo '符合指標一-1'.'<br>';
$sql = "update ".$point. " set point1_1 = '1' where account = '$username' ";
mysql_query($sql);
}else{
$sql = "update ".$point. " set point1_1 = '0' where account = '$username' ";
mysql_query($sql);
}
//判斷是否符合指標一-2
if($b == 'area_2' && $per >= 0.2){
echo '符合指標一-2'.'<br>';
$sql = "update ".$point. " set point1_2 = '1' where account = '$username' ";
mysql_query($sql);
}else{
$sql = "update ".$point. " set point1_2 = '0' where account = '$username' ";
mysql_query($sql);
}
//判斷是否符合指標一-3
if($b == 'area_3' && $per >= 0.15){
echo '符合指標一-3'.'<br>';
$sql = "update ".$point. " set point1_3 = '1' where account = '$username' ";
mysql_query($sql);
}else{
$sql = "update ".$point. " set point1_3 = '0' where account = '$username' ";
mysql_query($sql);
}
//判斷是否符合指標一-4
if($aborigine >= 35){
echo '符合指標一-4'.'<br>';
$sql = "update ".$point. " set point1_4 = '1' where account = '$username' ";
mysql_query($sql);
}else{
$sql = "update ".$point. " set point1_4 = '0' where account = '$username' ";
mysql_query($sql);
}

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
/*if($aborigine != null )
{*/
        //新增資料進資料庫語法
		
	if($class == '1' ){
			$sql = "update 100element_point12 set aborigine = '$aborigine' where account = '$username' ";
	}
	else{
			$sql = "update 100junior_point12 set aborigine = '$aborigine' where account = '$username' ";
		}
		
        if(mysql_query($sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=point2.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=point1.php>';
        }
/*}
else
{
        echo '所有的欄位都需要填寫!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=point1.php>';
}*/
?>
<?php
include "../../footer.php";
?>