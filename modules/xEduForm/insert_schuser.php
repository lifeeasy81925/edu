<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="insert_schuser_ok.php" >
<p><font color="blue"><strong>新增學校後端資料庫小程式</strong></font>
<p>
　　1.學校代碼(帳號)
    <input type="text" size="12" name="id"> 
    <br><br>
　　2.縣市別
   	<Select id="cityname" name="cityname" Size=1>
	<Option>請選擇縣市
		<option value="臺北市">臺北市</option>
		<option value="新北市">新北市</option>
		<option value="桃園縣">桃園縣</option>
		<option value="新竹縣">新竹縣</option>
		<option value="新竹市">新竹市</option>
		<option value="苗栗縣">苗栗縣</option>
		<option value="臺中市">臺中市</option>
		<option value="彰化縣">彰化縣</option>
		<option value="南投縣">南投縣</option>
		<option value="雲林縣">雲林縣</option>
		<option value="嘉義縣">嘉義縣</option>
		<option value="嘉義市">嘉義市</option>
		<option value="臺南市">臺南市</option>
		<option value="高雄市">高雄市</option>
		<option value="屏東縣">屏東縣</option>
		<option value="臺東縣">臺東縣</option>
		<option value="花蓮縣">花蓮縣</option>
		<option value="宜蘭縣">宜蘭縣</option>
		<option value="基隆市">基隆市</option>
		<option value="澎湖縣">澎湖縣</option>
		<option value="金門縣">金門縣</option>
		<option value="連江縣">連江縣</option>
</Select>
    <br><br>
　　3.全校全銜(如:臺北市市立東湖國小)
    <input type="text" size="24" name="schoolname"> 
    <br><br>
	4.國小或國中（單選）
    <label>
　　<input type="radio" name="class" value="1" id="1">國小</label>
    <label>
	<input type="radio" name="class" value="2" id="2">國中</label><br><br>
<INPUT TYPE="button" VALUE="取消" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存" />

</form>
<?php
include "../../footer.php";
?>