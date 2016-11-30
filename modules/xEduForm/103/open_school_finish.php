<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	$school_year = 103; //為學年度
	$id = $_POST["id"];
	$school = $_POST["school"];
	$enddate = $_POST["textfield"];
	//更新截止日期
	$sql_date = "update time_limit set  end_date = '$enddate 23:59:59' where account='$id' and school_year = '$school_year'";
	mysql_query($sql_date);
	echo "變更".$school."更新資料截止日期為：".$enddate.",異動成功!!";
 ?>
  <br><br><a href="../education_index.php">回教育部首頁</a>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>