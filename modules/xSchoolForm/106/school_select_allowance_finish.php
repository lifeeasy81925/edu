<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$a1 = $_POST['a1'];  // 申請補1
	$a2 = $_POST['a2'];  // 申請補2
	$a3 = $_POST['a3'];  // 申請補3
	$a4 = $_POST['a4'];  // 申請補4
	$a5 = $_POST['a5'];  // 申請補5
	$a6 = $_POST['a6'];  // 申請補6

	$school_year = $_POST['school_year'];
	$main_seq    = $_POST['main_seq'];

	$applied = "";
	$strSQL  = "";

	$a_ary = array("a1", "a2", "a3", "a4", "a5", "a6");
	for($i = 0;$i < count($a_ary);$i++)
	{
		if(${$a_ary[$i]} == 1)  // 動態變數，取得$a1, $a2...等變數的值
		{
			$applied .= ($applied == '')?$a_ary[$i]:",".$a_ary[$i];
		}
		else  // 沒申請的項目刪除資料庫資料
		{
			switch ($a_ary[$i])
			{
				case "a1":
					$strSQL = " delete from alc_parenting_education where sy_seq = '$main_seq'; "; //刪除主要資料
					mysql_query($strSQL);
					$strSQL = " delete from alc_parenting_education_item where main_seq = '$main_seq'; "; //刪除細項
					mysql_query($strSQL);
					break;

				case "a2":
					$strSQL = " delete from alc_education_features where sy_seq = '$main_seq'; "; //刪除主要資料
					mysql_query($strSQL);
					$strSQL = " delete from alc_education_features_item where main_seq = '$main_seq'; "; //刪除細項
					mysql_query($strSQL);
					break;

				case "a3":
					$strSQL = " delete from alc_teaching_equipment where sy_seq = '$main_seq'; "; //刪除主要資料
					mysql_query($strSQL);
					$strSQL = " delete from alc_teaching_equipment_item where main_seq = '$main_seq'; "; //刪除細項
					mysql_query($strSQL);
					break;

				case "a4":
					$strSQL = " delete from alc_aboriginal_education where sy_seq = '$main_seq'; "; //刪除主要資料
					mysql_query($strSQL);
					$strSQL = " delete from alc_aboriginal_education_item where main_seq = '$main_seq'; "; //刪除細項
					mysql_query($strSQL);
					break;

				case "a5":
					$strSQL = " delete from alc_transport_car where sy_seq = '$main_seq'; "; //刪除主要資料
					mysql_query($strSQL);
					break;

				case "a6":
					$strSQL = " delete from alc_school_activity where sy_seq = '$main_seq'; "; //刪除主要資料
					mysql_query($strSQL);
					$strSQL = " delete from alc_school_activity_item where main_seq = '$main_seq'; "; //刪除細項
					mysql_query($strSQL);
					break;
			}
			// 清空上傳的檔案資料庫欄位
			delete_file($main_seq, $a_ary[$i]);
		}
	}

	/* 若沒有點選任何申請，紀錄他放棄申請，用以區分使用者是未填寫或自願放棄 */
	if($applied == "")
	{
		$applied = "waiver";
	}

	$sql = " update schooldata_year set applied='$applied' ".
		   " where account='$username' and school_year = '$school_year' ";

	if(mysql_query($sql))
	{
		echo '<br>新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=school_write_allowance.php>';
	}
	else
	{
		echo '<br>新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../../../user.php?op=login>';
	}

	function delete_file($main_seq, $a)
	{
		// $a = a1、a2 …… a5
		// 清空上傳的檔案資料庫欄位
		$cnt_sql  = " update school_upload_name set ";
		$cnt_sql .= "   ".$a."_1 = NULL ";  // ex: a1_1 = ''
		$cnt_sql .= " , ".$a."_2 = NULL ";  // ex: a3_2 = ''
		$cnt_sql .= " , ".$a."_3 = NULL ";
		$cnt_sql .= " , ".$a."_4 = NULL ";
		$cnt_sql .= " where sy_seq = '$main_seq' ";

		$result = mysql_query($cnt_sql);
	}

?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>
