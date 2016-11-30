<?php
	include "../../../mainfile.php";
	include "../../../header.php";

	session_start();
	$id = $xoopsUser->getVar('uname');

	$sql = 	" SELECT schooldata_year.applied_activity ".
			"   FROM schooldata_year                  ".
			"  WHERE account     = '$id'              ".
			"    AND school_year = '106'              ";

    $result = mysql_query($sql) or die('MySQL query error');

	while($row = mysql_fetch_row($result))
	{
		$applied_activity = $row[0];
	}

	$CanApply = null;  // 教育行動區申請資格 N=不合 Y=符合
	
	$CanApply = "Y";  // 預設符合資格(之後要改)

	if($CanApply == "Y")
	{
		UpdateCanApply("Y", $id);

		if($applied_activity == "Y")  // 已回覆要申請情況
		{			
			GoToPage("Y");
		}
		elseif($applied_activity == "N")  // 已回覆不申請情況
		{
			echo "<script>alert('貴校已選擇不參加教育行動區，系統將為您轉至教育優先區首頁。');</script>";
			GoToPage("N");
		}
		else
		{
			// NULL情形=未回覆=不轉址
		}
	}
	else
	{
		UpdateCanApply("N", $id);
		echo "<script>alert('貴校不符合教育行動區資格，系統將為您轉至教育優先區首頁。');</script>";
		GoToPage("N");
	}

	function UpdateCanApply($state, $id)
	{
		$sql = 	" UPDATE schooldata_year                               ".
				"    SET schooldata_year.can_apply_activity = '$state' ".
				"  WHERE account     = '$id'                           ".
				"    AND school_year = '106'                           ";

		$result = mysql_query($sql) or die('MySQL query error');
	}

	function GoToPage($state)  // 跳頁 state: Y=教育行動區 N=教育優先區
	{
		if($state == "Y")
		{
			echo "<script>document.location.href='act_school_index.php';</script>";
		}
		if($state == "N")
		{
			echo "<script>document.location.href='../school_index.php';</script>";
		}
	}
?>

貴校符合教育行動區申請資格，請問是否要提出申請？<p>

<form name="form" method="post" action="act_decide_finish.php" onSubmit="ready()">
	<table cellspacing="0" cellpadding="0" align="center">
		<tr align="center">
			<td align="center"><img src='/edu/images/yes.png' height="40px"/><br><font color="green">是</font></td>
			<td align="center"><img src='/edu/images/no.png' height="40px"/><br><font color="red">否</font></td>
		</tr>
		<tr align="center">
			<td align="center"><input type="radio" name="radio01" value="Y" checked /></td>
			<td align="center"><input type="radio" name="radio01" value="N"         /></td>
		</tr>
		<tr height="100px" align="center">
			<td colspan="2"><input type="submit" name="button" value="　確 認　"></td>
		</tr>
	</table>
</form>

<script>
	function ready()
	{
		var str01 = form.radio01.value;
		var str02 = "";
		
		if(str01 == "Y")
		{
			str01 = "要參加";
		}
		else
		{
			str01 = "「不參加」";
			str02 = "（系統將為您轉至教育優先區首頁。）"
		}

		if(confirm("貴校確定" + str01 + "教育行動區？" + str02))
		{
			// html的form會自動轉頁
		}
		else
		{
			window.event.returnValue = false;
		}
	}
</script>

<?php include "../../../footer.php"; ?>
