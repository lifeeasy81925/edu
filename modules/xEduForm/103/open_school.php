<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "../../function/checkdate_edu.php";
	
	$school_year = 103; //為學年度
	
  //判斷是否有權限
	if($username == 'edu0025' || $username == 'edu0098' || $username == 'edu0099')
	{			
	}
	else
	{
		echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'您沒有設定權限!'.'"'.')'.'</script>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=education_index.php>';
	}
	
	$id = $_POST["schoolid"];//宣告變數
    //取回縣市使用者資料
	$sql = "select edu_users.uname ,edu_users.name ,edu_users.email ,edu_users.user_from ,edu_users.user_occ ,edu_users.user_aim ,edu_users.user_yim ,time_limit.end_date 
			from edu_users left JOIN time_limit ON edu_users.uname = time_limit.account where uname like '$id' and time_limit.school_year = '$school_year' ";	
		
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
	{
		$name = $row[1]; //單位
		$mail = $row[2]; //mail
		$man = $row[3]; //承辦人姓名
		$work = $row[4]; //職稱
		$tel = $row[5]; //承辦人電話
		$fax = $row[6]; //傳真
		$enddate = date("Y-m-d", strtotime($row[7]));//結束日期
	}
	
	$limit = "2013-11-15"
?>
<script type="text/javascript" src="../datepicker/jquery.js"></script>
<link rel="stylesheet" href="../datepicker/ui.datepicker.css" type="text/css" media="screen"/>
<script src="../datepicker/jquery.js"></script>
<script src="../datepicker/ui.datepicker.js" type="text/javascript" charset="utf-8"></script>	
<script type="text/javascript" charset="utf-8">
	jQuery(function($){
      	$('#textfield').datepicker({dateFormat: 'yy-mm-dd', showOn: 'both', 
      		buttonImageOnly: true, buttonImage: '../datepicker/calendar.gif'});
			});
</script>
管理員：<? echo $username; ?>
 <hr>
 <form action="open_school_finish.php" method="post" name="form">
 <table width="500" border="1">
 審核學校：<? echo $id.$name; ?><br>
 承辦人：<? echo $man; ?><br>
 職稱：<? echo $work; ?><br>
 電子信箱：<? echo $mail; ?><br>
 電話：<? echo $tel; ?><br>
 傳真：<? echo $fax; ?><br>
 原填報截止日期：<? echo $enddate ?> <br>
 延長填報日期：<input name="textfield" type="text" size="12" maxlegth="12" id="textfield" value="<? echo $enddate;?>"><管理者自填>(限<?=$limit;?>前)
  </table>
  <br>
  	<input type="submit" value="送出" name="submit">
	<input type="reset" value="清除" name="reset">
	<input name="id" type="hidden"  value="<? echo $id;?>">
	<input name="school" type="hidden"  value="<? echo $name;?>">
<script language="JavaScript">
  function toCheck() {
    if ( document.form.enddate.value > "<?=$limit;?>" ) {
      alert('填報期限不得晚於<?=$limit;?>');
      document.form.abcd.focus();
      return false;
    return true;
	}
  }
</script>  
	</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>