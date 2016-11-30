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


<style>
@import url(https://fonts.googleapis.com/css?family=Khula:300,400,600,700,800);

afom {
	background-image: url(../image/1463019648843.jpg);
	font-family:'Khula', '微軟正黑體', sans-serif;
}
.area01{
	width:60%;
	text-align:center;
	font-size:14px;
	}
</style>
<form class="afom" name="form" method="post" action="Junior_choose_1.php" onSubmit="ready()">
  <table width="80%" border="0" align="center">
  <tr></tr>
  <tr>
    <td height="60" colspan="2" align="left">貴校符合教育行動區申請資格，請問是否要提出申請？</td>
  </tr>
  <tr>
    <td align="center"><img src="http://210.240.190.100/edu2/image/yes.png" width="60%" /></td>
    <td align="center"><img src="http://210.240.190.100/edu2/image/no.png" width="60%" /></td>
  </tr>
  <tr>
    <td align="center"><input type="radio" name="radio01" value="Y" checked /></td>
    <td align="center"><input type="radio" name="radio01" value="N"         /></td>
  </tr>
  <tr>
    <td height="60" colspan="2" align="center"><input type="submit" name="button" value="　確 認　"></td>
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
