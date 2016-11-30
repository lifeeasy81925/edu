<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
if($username == 'edu0099' || $username == 'david' ){			
}
else{
	echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'您沒有設定權限!'.'"'.')'.'</script>';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=education_index.php>';
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="del_schuser_ok.php" >
<p><font color="blue"><strong>刪除學校後端資料庫小程式</strong></font>
<p>
	1.學校代碼(帳號)
    <input type="text" size="12" name="id"> 
    <br><br>
	2.國小或國中（單選）
    <label>
　　<input type="radio" name="class" value="1" id="1">國小</label>
    <label>
	<input type="radio" name="class" value="2" id="2">國中</label><br><br>
<INPUT TYPE="button" VALUE="取消" onClick="history.go(-1)">
<input type="submit" name="button" value="確定" />
</form>
<?php
include "../../footer.php";
?>