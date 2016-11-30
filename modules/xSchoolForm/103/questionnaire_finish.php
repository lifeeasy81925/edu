<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$table_name = "questionnaire_103";
	
	$school_year = $_POST['school_year'];
		
	//讀取網頁資料
	$q1_1 = $_POST['q1_1'];
	$q2_1 = $_POST['q2_1'];
	$q3_1 = $_POST['q3_1'];
	$q4_1 = $_POST['q4_1'];
	
	$q5_1 = "";
	for($i = 1;$i <= 7;$i++)
	{
		$str = $_POST['q5_'.$i];
		if($str != "")
		{
			$q5_1 .= ($q5_1 == "")?$str:",".$str;//空的不先加逗號
		}
	}
	
	$q6_1 = $_POST['q6_1'];
	$q6_2 = $_POST['q6_2'];
	$q6_3 = $_POST['q6_3'];
	$q6_4 = $_POST['q6_4'];
	$q6_5 = $_POST['q6_5'];
	
	$q7_1 = $_POST['q7_1'];
	$q7_2 = $_POST['q7_2'];
	$q7_3 = $_POST['q7_3'];
	$q7_4 = $_POST['q7_4'];
	$q7_2_other = ($_POST['q7_2'] == 5)?$_POST['q7_2_other']:'';
	$q7_3_other = ($_POST['q7_3'] == 5)?$_POST['q7_3_other']:'';
	
	$q8_1 = $_POST['q8_1'];
	$q8_2 = $_POST['q8_2'];
	$q8_3 = $_POST['q8_3'];
	$q8_4 = $_POST['q8_4'];
	$q8_2_other = ($_POST['q8_2'] == 5)?$_POST['q8_2_other']:'';
	$q8_3_other = ($_POST['q8_3'] == 5)?$_POST['q8_3_other']:'';
	
	$q9_1 = $_POST['q9_1'];
	$q9_2 = $_POST['q9_2'];
	$q9_3 = $_POST['q9_3'];
	$q9_4 = $_POST['q9_4'];
	$q9_2_other = ($_POST['q9_2'] == 5)?$_POST['q9_2_other']:'';
	$q9_3_other = ($_POST['q9_3'] == 4)?$_POST['q9_3_other']:'';
	
	$q10_1 = $_POST['q10_1'];
	$q10_2 = $_POST['q10_2'];
	$q10_3 = $_POST['q10_3'];
	$q10_4 = $_POST['q10_4'];
	$q10_2_other = ($_POST['q10_2'] == 5)?$_POST['q10_2_other']:'';
	$q10_3_other = ($_POST['q10_3'] == 5)?$_POST['q10_3_other']:'';
	
	$q11_1 = $_POST['q11_1'];
	$q11_2 = $_POST['q11_2'];
	$q11_3 = $_POST['q11_3'];
	$q11_4 = $_POST['q11_4'];
	$q11_5 = $_POST['q11_5'];
	$q11_3_other = ($_POST['q11_3'] == 6)?$_POST['q11_3_other']:'';
	$q11_4_other = ($_POST['q11_4'] == 6)?$_POST['q11_4_other']:'';
	
	$q12_1 = $_POST['q12_1'];
	$q12_2 = $_POST['q12_2'];
	$q12_3 = $_POST['q12_3'];
	$q12_2_other = ($_POST['q12_2'] == 5)?$_POST['q12_2_other']:'';
	$q12_3_other = ($_POST['q12_3'] == 5)?$_POST['q12_3_other']:'';
	
	$q13_1 = $_POST['q13_1'];
	$q14_1 = $_POST['q14_1'];
	$q15_1 = $_POST['q15_1'];
	
		
	$sql = " update $table_name set q1_1='$q1_1' ".
		   "                      , q2_1='$q2_1' ".
		   "                      , q3_1='$q3_1' ".
		   "                      , q4_1='$q4_1' ".
		   "                      , q5_1='$q5_1' ".
		   
		   "                      , q6_1='$q6_1' ".
		   "                      , q6_2='$q6_2' ".
		   "                      , q6_3='$q6_3' ".
		   "                      , q6_4='$q6_4' ".
		   "                      , q6_5='$q6_5' ".
		   
		   "                      , q7_1='$q7_1' ".
		   "                      , q7_2='$q7_2' ".
		   "                      , q7_3='$q7_3' ".
		   "                      , q7_4='$q7_4' ".
		   "                      , q7_2_other='$q7_2_other' ".
		   "                      , q7_3_other='$q7_3_other' ".		   
		   
		   "                      , q8_1='$q8_1' ".
		   "                      , q8_2='$q8_2' ".
		   "                      , q8_3='$q8_3' ".
		   "                      , q8_4='$q8_4' ".
		   "                      , q8_2_other='$q8_2_other' ".
		   "                      , q8_3_other='$q8_3_other' ".		
		   
		   "                      , q9_1='$q9_1' ".
		   "                      , q9_2='$q9_2' ".
		   "                      , q9_3='$q9_3' ".
		   "                      , q9_4='$q9_4' ".
		   "                      , q9_2_other='$q9_2_other' ".
		   "                      , q9_3_other='$q9_3_other' ".		
		   
		   "                      , q10_1='$q10_1' ".
		   "                      , q10_2='$q10_2' ".
		   "                      , q10_3='$q10_3' ".
		   "                      , q10_4='$q10_4' ".
		   "                      , q10_2_other='$q10_2_other' ".
		   "                      , q10_3_other='$q10_3_other' ".		
		   
		   "                      , q11_1='$q11_1' ".
		   "                      , q11_2='$q11_2' ".
		   "                      , q11_3='$q11_3' ".
		   "                      , q11_4='$q11_4' ".
		   "                      , q11_5='$q11_5' ".
		   "                      , q11_3_other='$q11_3_other' ".
		   "                      , q11_4_other='$q11_4_other' ".		
		   
		   "                      , q12_1='$q12_1' ".
		   "                      , q12_2='$q12_2' ".
		   "                      , q12_3='$q12_3' ".
		   "                      , q12_2_other='$q12_2_other' ".
		   "                      , q12_3_other='$q12_3_other' ".		
		   
		   "                      , q13_1='$q13_1' ".
		   "                      , q14_1='$q14_1' ".
		   "                      , q15_1='$q15_1' ".
		   
		   "                      , fill_date=now() ".
	   " where account = '$username'; ";
	
	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../school_index.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../school_index.php>';
		echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>