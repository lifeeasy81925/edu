<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
//include "./checkdate.php";
//$date = date ("Y-m-d" , mktime(date('Y-m-d')));
$date = date("Y-m-d");
echo "【今天日期：";
echo $date."】";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<font color="blue"><strong>102年度執行成果填報</strong></font><br />
<strong>項目：二、補助學校發展教育特色  </strong><a href="/edu/modules/xSchoolForm/download/allowance-03.htm" target="_blank">(補助項目說明)</a>

<div>
<?
//讀取上傳檔案資料
$sql = "select effect_a2_1, effect_a2_2, effect_a2_3, effect_a2_4 from 102school_upload_name where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[0];
	$file_2 = $row[1];
	$file_3 = $row[2];
	$file_4 = $row[3];
}
?>
<strong>※上傳核定後執行計畫</strong> <font color=red>(必填)</font>：請彙整於於Word檔。
<form action="file_up_102.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="e_2_1">
    <input type="file" name="myfile">
    <input type="submit" value="上傳核定後執行計畫">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<br />
<strong>※上傳核定後執行經費概算表</strong> <font color=red>(必填)</font>：請彙整於於Excel檔，若各縣市政府教育局處若有特殊檔案格式要求，請以各縣市要求檔案格式為準。
<form action="file_up_102.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="e_2_2">
    <input type="file" name="myfile">
    <input type="submit" value="上傳核定後經費概算表">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<br />
<strong>※上傳執行成果與照片</strong>：請彙整於Word檔，並填寫執行成果與圖片說明後上傳，勿超過10MB。<br />
<form action="file_up_102.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="e_2_3">
    <input type="file" name="myfile">
    <input type="submit" value="上傳執行成果照片">
<br /><? if ($file_3 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$file_3.'" target="_new">'.$file_3.'</a>';}?>
</form>
</div>
<input type="button" value="返回補助項目列表" onClick="location='effect_102_school_list.php'">
<p>
<font color="blue"><strong>※ 注意事項：</strong></font><br />
1. <strong>請留意個人資料保護，上傳內容請勿呈現個人資料。</strong><br />
2. <strong>每個上傳檔案請勿超過10MB。</strong>請適當壓縮圖片適合於螢幕呈現即可。<br />
3. <strong>若有兩項特色，請彙整於同一檔案。</strong><br /><br />
  <?php
include "../../footer.php";
?>
