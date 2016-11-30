<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";

//學校名稱
if($class == '1' ){
			$basedata="100element_basedata";
	}
	else{
			$basedata="100junior_basedata";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))
        {
                 $school = $row[1];//學校名稱
        }

$suggestion = $_POST['suggestion'];

		
$sql = "INSERT INTO `100suggestion` (`id`, `school_name`, `school_suggestion`) VALUES ('$username', '$school', '$suggestion')";	
mysql_query($sql);

//將session清空
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=../../user.php?op=logout>';
?>