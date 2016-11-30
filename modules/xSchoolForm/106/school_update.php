
<? 
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
    include "../../function/config_for_106.php"; //本年度基本設定

	//$school_year = $_GET['school_year'];
	$sy_seq = $_GET['sy_seq'];
	
	//echo "<p>".$school_year."<p>";
	//echo $sy_seq."<p>";
	//echo $username."<p>";
	
	
    $sql = " select * from schooldata_year where school_year = '$school_year' and account = '$username' ";
	
	$result = mysql_query($sql);
    while($row = mysql_fetch_array($result))
	{
		$new_build_desc = $row['new_build_desc'];
	}
?>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<form name="form" method="post" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">  <!--action="schooldata_1_finish.php" -->
<p><b>※請填寫申請新年度原因：</b>
<p>※若您不選用貴校前一年度填寫之指標資料，請述明採用填報新年度指標資料之原因。
如：學校資料異動，新指標較有利於學校申請補助項目。

<form method="post">  <!--  action=""  -->
<table border="0">
	<tr>
		<td>
		<!--<input type="text" size="50" name="new_build_desc" value="<?=$new_build_desc;?>"/>-->
		<textarea name="new_build_desc" value="<?=$new_build_desc;?>" rows=5 cols=75></textarea>
		</td>
	</tr>
	<tr>
	  <td><p>
	     <input type="button" value="取消" onclick="location.href='print_point_page.php'">		 
		 <input type="button" value="送出" onclick="location.href='update.php'">
		<!--
		<input name="action" type="hidden" value="update">		
		<input type="button" value="送出" onclick="location.href='update.php'">
		 		 
        <input type="submit" name="button" id="button" value="送出">
		-->
	  </td>
    </tr>
</table>
</form>

<?
/*
if(isset($_POST["action"])&&($_POST["action"]=="update")){
	$new_build_desc = $_POST['new_build_desc'];
	$sql_update = "UPDATE `schooldata_year` SET 
  `student`=NULL,
  `class_total`=NULL,
  `class_grade1`=NULL,
  `class_grade2`=NULL,
  `class_grade3`=NULL,
  `class_grade4`=NULL,
  `class_grade5`=NULL,
  `class_grade6`=NULL,
  `class_special`=NULL,
  `teacher_3years_total`=NULL,
  `teacher`=NULL,
  `teacher_change_total`=NULL,
  `teacher_agent_total`=NULL,
  `teacher_change_rate`=NULL,
  `teacher_agent_rate`=NULL,
  `teacher_change_in`=NULL,
  `teacher_change_lack`=NULL,
  `teacher_change_other`=NULL,
  `teacher_change_in_last`=NULL,
  `teacher_change_lack_last`=NULL,
  `teacher_change_other_last`=NULL,
  `target_aboriginal`=NULL,
  `target_no_aboriginal`=NULL,
  `low_income`=NULL,
  `grandparenting`=NULL,
  `over45years`=NULL,
  `immigrant`=NULL,
  `single_parent`=NULL,
  `aboriginal`=NULL,
  `lastyear_leaving`=NULL,
  `lastyear_graduate`=NULL,
  `lastyear_test`=NULL,
  `lastyear_pr25`=NULL,
  `accord_point`=NULL,
  `can_apply`=NULL,
  `applied`=NULL,
  `page1_warning`=NULL,
  `page1_desc`=NULL,
  `page2_warning`=NULL,`page2_desc`=NULL,`page3_warning`=NULL,`page3_desc`=NULL, `keep`= 0 ,`new_build_desc` = $new_build_desc
 
 Where school_year = '$school_year' and account = '$username' ";

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

// ?>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>