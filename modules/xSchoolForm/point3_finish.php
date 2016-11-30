<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$graduate= $_POST['graduate'];
$pr = $_POST['pr'];

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
	}
	else{
			$point="100junior_point";
		}		
$per = $pr/$graduate;
if($per >= 0.4){
echo '符合指標三'.'<br>';
$sql = "update ".$point. " set point3 = '1' where account = '$username' ";
mysql_query($sql);
}else{
$sql = "update ".$point. " set point3 = '0' where account = '$username' ";
mysql_query($sql);
}

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
/*if($graduate != null && $pr!=null )
{*/

	if($class == '1' ){
		$sql = "update 100element_point345 set graduate = '$graduate',pr = '$pr' where account = '$username'";
	}
	else{
		$sql = "update 100junior_point345 set graduate = '$graduate',pr = '$pr' where account = '$username'";	
	}

        //新增資料進資料庫語法
        //$sql = "update 100element_point345 set graduate = '$graduate',pr = '$pr' where account = '$username'";
        if(mysql_query($sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=point4.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=login>';
        }
/*}
else
{
        echo '所有的空格都需要填寫!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=point3.php>';
}*/
?>
<?php
include "../../footer.php";
?>