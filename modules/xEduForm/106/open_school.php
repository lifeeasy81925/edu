<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "checkdate_edu.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	//  判斷是否有權限
	if($username == 'edu0025' || $username == 'edu0098' || $username == 'edu0099'){}
	else
	{
		echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'您沒有設定權限!'.'"'.')'.'</script>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=education_index.php>';
	}

	$id = $_POST["schoolid"];  // 宣告變數

	//  取回縣市使用者資料
	$sql = "	SELECT edu_users.uname                         ".  // row[0]
		   "		 , edu_users.name                          ".  // row[1]
		   "		 , edu_users.email                         ".  // row[2]
		   "		 , edu_users.user_from                     ".  // row[3]
		   "		 , edu_users.user_occ                      ".  // row[4]
		   "		 , edu_users.user_icq                      ".  // row[5]
		   "		 , edu_users.user_aim                      ".  // row[6]
		   "		 , edu_users.user_yim                      ".  // row[7]
		   "		 , time_limit.end_date                     ".  // row[8]
		   " 	  FROM edu_users                               ".
		   " LEFT JOIN time_limit                              ".
		   "		ON edu_users.uname = time_limit.account    ".
		   "	 WHERE uname LIKE '$id'                        ".
		   "	   AND time_limit.school_year = '$school_year' ";
		   
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_row($result))
	{
		$name   = $row[1];  // 單位
		$mail   = $row[2];  // mail
		$man    = $row[3];  // 姓名
		$work   = $row[4];  // 職稱
		$tel    = $row[5];  // 電話		
		$fax    = $row[6];  // 傳真備用
		$mobile = $row[7];  // 手機		
		$enddate = date("Y-m-d", strtotime($row[8]));  // 結束日期
	}

	$limit = "2016-12-31"
?>

<script type="text/javascript" src="../datepicker/jquery.js"></script>

<link rel="stylesheet" href="../datepicker/ui.datepicker.css" type="text/css" media="screen"/>

<script src="../datepicker/jquery.js"></script>

<script src="../datepicker/ui.datepicker.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">jQuery(function($){$('#textfield').datepicker({dateFormat: 'yy-mm-dd', showOn: 'both', buttonImageOnly: true, buttonImage: '../datepicker/calendar.gif'});});</script>

<p>

<a href="../education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/lock.png" align="absmiddle" height="20px"> <b>延長學校填報期限</b>

<p>
<hr>
<p>

管理員：<font color="blue"><?=$username;?></font><p>

<form action="open_school_finish.php" method="post" name="form">
	<table border="1">
		<tr height="40px"><td align="center">學校代號</td><td><?=$id;?></td></tr>
		<tr height="40px"><td align="center">學校名稱</td><td><?=$name;?></td></tr>
		<tr height="40px"><td align="center">承 辦 人</td><td><?=$man;?></td></tr>
		<tr height="40px"><td align="center">職　　稱</td><td><?=$work;?></td></tr>
		<tr height="40px"><td align="center">電子信箱</td><td><?=$mail;?></td></tr>
		<tr height="40px"><td align="center">聯絡電話</td><td><?=$tel;?></td></tr>
		<tr height="40px"><td align="center">傳真/備用</td><td><?=$fax;?></td></tr>
		<tr height="40px"><td align="center">行動電話</td><td><?=$mobile;?></td></tr>
		<tr height="40px"><td align="center">原填報截止日期</td><td><?=$enddate?></td></tr>
		<tr height="40px">
			<td align="center">
				延長填報日期至
			</td>
			<td>
				<input name="textfield" type="text" size="12" maxlegth="12" id="textfield" value="<?=$enddate;?>">（限於<?=$limit;?>之前）。
			</td>
		</tr>
	</table>
	<p>

	<input type="submit" value="　送 出　" name="submit">
	<input name="id"     type="hidden"  value="<? echo $id;?>">
	<input name="school" type="hidden"  value="<? echo $name;?>">

	<script language="JavaScript">
		function toCheck()
		{
			if ( document.form.enddate.value > "<?=$limit;?>" )
			{
				alert('填報期限不得晚於<?=$limit;?>');
				document.form.abcd.focus();
				return false;
				return true;
			}
		}
	</script>
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<? /*<input type="reset" value="清除" name="reset">*/ ?>