<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$table_name = "questionnaire_104";
	
	$school_year = $_POST['school_year'];
		
	//讀取網頁資料
	$q1_1 = $_POST['q1_1'];
	$q1_1_other = ($_POST['q1_1'] == N)?$_POST['q1_1_other']:'';
	
    $q1_2 = $_POST['q1_2'];
	$q1_2_2 = ($_POST['q1_2'] == 2)?$_POST['q1_2_2']:'';
	$q1_2_other = ($_POST['q1_2'] == 4)?$_POST['q1_2_other']:'';
	
	$q1_3 = $_POST['q1_3'];
	$q1_3_other = ($_POST['q1_3'] == 4)?$_POST['q1_3_other']:'';
	
	$q1_4 = $_POST['q1_4'];
	$q1_4_other = ($_POST['q1_4'] == 3)?$_POST['q1_4_other']:'';
	
	$q1_5 = $_POST['q1_5'];
	$q1_5_other = ($_POST['q1_5'] == 4)?$_POST['q1_5_other']:'';
	
	$q1_6 = $_POST['q1_6'];
	
	$q1_7 = $_POST['q1_7'];
	$q1_7_other = ($_POST['q1_7'] == 3)?$_POST['q1_7_other']:'';
	
	$q2_1 = $_POST['q2_1'];
	
    $q2_2 = $_POST['q2_2'];
	$q2_2_other = ($_POST['q2_2'] == 3)?$_POST['q2_2_other']:'';

	$q2_3 = "";	
	for($i = 1;$i <= 9;$i++)
	{
		$str = $_POST['q2_3_'.$i];
		if($str != "")
		{
			$q2_3 .= ($q2_3 == "")?$str:",".$str;//空的不先加逗號
		}
	}
	$q2_3_other = ($_POST['q2_3_9'] == 9)?$_POST['q2_3_other']:'';
	
	$q2_4 = $_POST['q2_4'];
	$q2_4_other = ($_POST['q2_4'] == 4)?$_POST['q2_4_other']:'';
	
	$q2_5 = "";	
	for($j = 1;$j <= 7;$j++)
	{
		$str2_5 = $_POST['q2_5_'.$j];
		if($str2_5 != "")
		{
			$q2_5 .= ($q2_5 == "")?$str2_5:",".$str2_5;//空的不先加逗號
		}
	}
	$q2_5_other = ($_POST['q2_5_7'] == 7)?$_POST['q2_5_other']:'';
	
	$q2_6 = "";	
	for($k = 1;$k <= 5;$k++)
	{
		$str2_6 = $_POST['q2_6_'.$k];
		if($str2_6 != "")
		{
			$q2_6 .= ($q2_6 == "")?$str2_6:",".$str2_6;//空的不先加逗號
		}
	}
	$q2_6_other = ($_POST['q2_6_5'] == 5)?$_POST['q2_6_other']:'';
	
	$q3_1 = $_POST['q3_1'];	
	$q3_1_r1 = ($_POST['q3_1'] == 1)?$_POST['q3_1_r1']:'';
	$q3_1_r2 = ($_POST['q3_1'] == 2)?$_POST['q3_1_r2']:'';
	$q3_1_r3 = ($_POST['q3_1'] == 3)?$_POST['q3_1_r3']:'';	
	
	$q3_2 = $_POST['q3_2'];	
	$q3_2_r1 = ($_POST['q3_2'] == 1)?$_POST['q3_2_r1']:'';
	$q3_2_r2 = ($_POST['q3_2'] == 2)?$_POST['q3_2_r2']:'';
	$q3_2_r3 = ($_POST['q3_2'] == 3)?$_POST['q3_2_r3']:'';
	
	$q3_3 = "";	
	for($l = 1;$l <= 6;$l++)
	{
		$str3_3 = $_POST['q3_3_'.$l];
		if($str3_3 != "")
		{
			$q3_3 .= ($q3_3 == "")?$str3_3:",".$str3_3;//空的不先加逗號
		}
	}
    $q3_3_other = ($_POST['q3_3_6'] == 6)?$_POST['q3_3_other']:'';	
	
	$q3_4 = $_POST['q3_4'];	
	$q3_4_r1 = ($_POST['q3_4'] == 1)?$_POST['q3_4_r1']:'';
	$q3_4_r2 = ($_POST['q3_4'] == 2)?$_POST['q3_4_r2']:'';
	$q3_4_r3 = ($_POST['q3_4'] == 3)?$_POST['q3_4_r3']:'';
	
    $q3_5 = $_POST['q3_5'];	
	$q3_5_r1 = ($_POST['q3_5'] == 1)?$_POST['q3_5_r1']:'';
	$q3_5_r2 = ($_POST['q3_5'] == 2)?$_POST['q3_5_r2']:'';
	$q3_5_r3 = ($_POST['q3_5'] == 3)?$_POST['q3_5_r3']:'';
	
	$q3_6 = "";	
	for($m = 1;$m <= 7;$m++)
	{
		$str3_6 = $_POST['q3_6_'.$m];
		if($str3_6 != "")
		{
			$q3_6 .= ($q3_6 == "")?$str3_6:",".$str3_6;//空的不先加逗號
		}
	}
    $q3_6_other = ($_POST['q3_6_7'] == 7)?$_POST['q3_6_other']:'';	
	
	$q3_7 = $_POST['q3_7'];	
	$q3_7_r1 = ($_POST['q3_7'] == 1)?$_POST['q3_7_r1']:'';
	$q3_7_r2 = ($_POST['q3_7'] == 2)?$_POST['q3_7_r2']:'';
	$q3_7_r3 = ($_POST['q3_7'] == 3)?$_POST['q3_7_r3']:'';
	
    $q3_8 = $_POST['q3_8'];	
	$q3_8_r1 = ($_POST['q3_8'] == 1)?$_POST['q3_8_r1']:'';
	$q3_8_r2 = ($_POST['q3_8'] == 2)?$_POST['q3_8_r2']:'';
	$q3_8_r3 = ($_POST['q3_8'] == 3)?$_POST['q3_8_r3']:'';
	
	$q3_9 = $_POST['q3_9'];	
	$q3_9_r1 = ($_POST['q3_9'] == 1)?$_POST['q3_9_r1']:'';
	$q3_9_r2 = ($_POST['q3_9'] == 2)?$_POST['q3_9_r2']:'';
	$q3_9_r3 = ($_POST['q3_9'] == 3)?$_POST['q3_9_r3']:'';

    $q3_10_1 = $_POST['q3_10_1'];
    $q3_10_1a = $_POST['q3_10_1a'];	
		
	$q3_10_2 = $_POST['q3_10_2'];
    $q3_10_2a = $_POST['q3_10_2a'];	
		
	$q3_10_3 = $_POST['q3_10_3'];
    $q3_10_3a = $_POST['q3_10_3a'];	
		
	$q3_10_4 = $_POST['q3_10_4'];
    $q3_10_4a = $_POST['q3_10_4a'];	
	
	$q3_11_1 = $_POST['q3_11_1'];
    $q3_11_1a = $_POST['q3_11_1a'];	
		
	$q3_11_2 = $_POST['q3_11_2'];
    $q3_11_2a = $_POST['q3_11_2a'];	
		
	$q3_11_3 = $_POST['q3_11_3'];
    $q3_11_3a = $_POST['q3_11_3a'];	
		
	$q3_11_4 = $_POST['q3_11_4'];
    $q3_11_4a = $_POST['q3_11_4a'];		
	
	
	$sql = " update $table_name set q1_1='$q1_1' ".
	       "                      , q1_1_other='$q1_1_other' ".
		   "                      , q1_2='$q1_2' ".
		   "                      , q1_2_2='$q1_2_2' ".
		   "                      , q1_2_other='$q1_2_other' ".
		   "                      , q1_3='$q1_3' ".	
		   "                      , q1_3_other='$q1_3_other' ".	
		   "                      , q1_4='$q1_4' ".	
		   "                      , q1_4_other='$q1_4_other' ".	
		   "                      , q1_5='$q1_5' ".
		   "                      , q1_5_other='$q1_5_other' ".
		   "                      , q1_6='$q1_6' ".
		   "                      , q1_7='$q1_7' ".
		   "                      , q1_7_other='$q1_7_other' ".
		   "                      , q2_1='$q2_1' ".
		   "                      , q2_2='$q2_2' ".
		   "                      , q2_2_other='$q2_2_other' ".
		   "                      , q2_3='$q2_3' ".
		   "                      , q2_3_other='$q2_3_other' ".
		   "                      , q2_4='$q2_4' ".
		   "                      , q2_4_other='$q2_4_other' ".
		   "                      , q2_5='$q2_5' ".
		   "                      , q2_5_other='$q2_5_other' ".
		   "                      , q2_6='$q2_6' ".
		   "                      , q2_6_other='$q2_6_other' ".		   
		   "                      , q3_1='$q3_1' ".	
		   "                      , q3_1_r1='$q3_1_r1' ".	
		   "                      , q3_1_r2='$q3_1_r2' ".	
		   "                      , q3_1_r3='$q3_1_r3' ".
		   "                      , q3_2='$q3_2' ".	
		   "                      , q3_2_r1='$q3_2_r1' ".	
		   "                      , q3_2_r2='$q3_2_r2' ".	
		   "                      , q3_2_r3='$q3_2_r3' ".
		   "                      , q3_3='$q3_3' ".	
		   "                      , q3_3_other='$q3_3_other' ".
		   "                      , q3_4='$q3_4' ".	
		   "                      , q3_4_r1='$q3_4_r1' ".	
		   "                      , q3_4_r2='$q3_4_r2' ".	
		   "                      , q3_4_r3='$q3_4_r3' ".
		   "                      , q3_5='$q3_5' ".	
		   "                      , q3_5_r1='$q3_5_r1' ".	
		   "                      , q3_5_r2='$q3_5_r2' ".	
		   "                      , q3_5_r3='$q3_5_r3' ".
		   "                      , q3_6='$q3_6' ".	
		   "                      , q3_6_other='$q3_6_other' ".
		   "                      , q3_7='$q3_7' ".	
		   "                      , q3_7_r1='$q3_7_r1' ".	
		   "                      , q3_7_r2='$q3_7_r2' ".	
		   "                      , q3_7_r3='$q3_7_r3' ".
		   "                      , q3_8='$q3_8' ".	
		   "                      , q3_8_r1='$q3_8_r1' ".	
		   "                      , q3_8_r2='$q3_8_r2' ".	
		   "                      , q3_8_r3='$q3_8_r3' ".
		   "                      , q3_9='$q3_9' ".	
		   "                      , q3_9_r1='$q3_9_r1' ".	
		   "                      , q3_9_r2='$q3_9_r2' ".	
		   "                      , q3_9_r3='$q3_9_r3' ".
		   "                      , q3_10_1='$q3_10_1' ".
		   "                      , q3_10_1a='$q3_10_1a' ".
		   "                      , q3_10_2='$q3_10_2' ".
		   "                      , q3_10_2a='$q3_10_2a' ".
		   "                      , q3_10_3='$q3_10_3' ".
		   "                      , q3_10_3a='$q3_10_3a' ".
		   "                      , q3_10_4='$q3_10_4' ".
		   "                      , q3_10_4a='$q3_10_4a' ".
		   "                      , q3_11_1='$q3_11_1' ".
		   "                      , q3_11_1a='$q3_11_1a' ".
		   "                      , q3_11_2='$q3_11_2' ".
		   "                      , q3_11_2a='$q3_11_2a' ".
		   "                      , q3_11_3='$q3_11_3' ".
		   "                      , q3_11_3a='$q3_11_3a' ".
		   "                      , q3_11_4='$q3_11_4' ".
		   "                      , q3_11_4a='$q3_11_4a' ".		   
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