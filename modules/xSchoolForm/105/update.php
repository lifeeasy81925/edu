
<? 
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
    include "../../function/config_for_105.php"; //本年度基本設定

	//$school_year = $_GET['school_year'];
	//$sy_seq = $_GET['sy_seq'];
	
	//echo "<p>".$school_year."<p>";
	//echo $sy_seq."<p>";
	//echo $username."<p>";
	
	
    $sql = " select * from schooldata_year where school_year = '$school_year' and account = '$username' ";
    
	$result = mysql_query($sql);

 //if(isset($_POST["action"])&&($_POST["action"]=="update")){
 //if(isset($_POST["action"])&&($_POST["value"]=="送出")){
	 
//	$new_build_desc = $_POST['new_build_desc'];
	
	$sql_update = "UPDATE `schooldata_year` SET ".
 " `student`=NULL,           ".
 " `class_total`=NULL, ".
 " `class_grade1`=NULL,".
 " `class_grade2`=NULL,".
 " `class_grade3`=NULL,".
 " `class_grade4`=NULL,".
 " `class_grade5`=NULL,".
 " `class_grade6`=NULL,".
 " `class_special`=NULL,".
 " `teacher_3years_total`=NULL,".
 " `teacher`=NULL,".
 " `teacher_change_total`=NULL,".
 " `teacher_agent_total`=NULL,".
 " `teacher_change_rate`=NULL, ".
 " `teacher_agent_rate`=NULL, ".
 " `teacher_change_in`=NULL, ".
 " `teacher_change_lack`=NULL,".
 " `teacher_change_other`=NULL,".
 " `teacher_change_in_last`=NULL,".
 " `teacher_change_lack_last`=NULL,".
 " `teacher_change_other_last`=NULL,".
 " `target_aboriginal`=NULL,".
 " `target_no_aboriginal`=NULL,".
 " `low_income`=NULL,".
 " `grandparenting`=NULL,".
 " `over45years`=NULL,".
 " `immigrant`=NULL,".
 "`single_parent`=NULL,".
 " `aboriginal`=NULL, ".
 " `lastyear_leaving`=NULL,".
 " `lastyear_graduate`=NULL,".
 " `lastyear_test`=NULL,".
 " `lastyear_pr25`=NULL,".
 " `accord_point`=NULL,".
 " `can_apply`=NULL,".
 " `applied`=NULL,".
 " `page1_warning`=NULL,".
 " `page1_desc`=NULL,".
 " `page2_warning`=NULL,`page2_desc`=NULL,`page3_warning`=NULL,`page3_desc`=NULL, `keep`= 0 ".  //,`new_build_desc` = $new_build_desc ".
 
 "  where school_year = '$school_year' and account = '$username' ";

  mysql_query($sql_update);
 
   echo '<meta http-equiv=REFRESH CONTENT=0;url=schooldata_1_new.php>';
 	/*
	if(mysql_query($sql_update)){
		echo '更新成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=schooldata_1_new.php>';
	}else{
		echo '更新失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../../../user.php?op=login>';
	}
	*/
     //   header("Location:data.php");
 //}

 ?>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>