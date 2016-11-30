<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
?>
<?
//讀取上傳檔案資料
$sql = "select  *  from   102school_upload_name where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
{
	$p2 = $row[02];
	$p3 = $row[03];
	$a1_1 = $row[6];
	$a1_2 = $row[7];
	$a1_3 = $row[8];
	$a1_4 = $row[9];
	$a2_1 = $row[10];
	$a2_2 = $row[11];
	$a2_3 = $row[12];
	$a2_4 = $row[13];
	$a3_1 = $row[14];
	$a3_2 = $row[15];
	$a3_3 = $row[16];
	$a3_4 = $row[17];
	$a4_1 = $row[18];
	$a4_2 = $row[19];
	$a4_3 = $row[20];
	$a4_4 = $row[21];
	$a5_1 = $row[22];
	$a5_2 = $row[23];
	$a5_3 = $row[24];
	$a5_4 = $row[25];
	$a6_1 = $row[26];
	$a6_2 = $row[27];
	$a6_3 = $row[28];
	$a6_4 = $row[29];
	$a7_1 = $row[30];
	$a7_2 = $row[31];
	$a7_3 = $row[32];
	$a7_4 = $row[33];
	
	$a1 = $a1_1.$a1_2.$a1_3.$a1_4;
	$a2 = $a2_1.$a2_2.$a2_3.$a2_4;
	$a3 = $a3_1.$a3_2.$a3_3.$a3_4;
	$a4 = $a4_1.$a4_2.$a4_3.$a4_4;
	$a5 = $a5_1.$a5_2.$a5_3.$a5_4;
	$a6 = $a6_1.$a6_2.$a6_3.$a6_4;
	$a7 = $a7_1.$a7_2.$a7_3.$a7_4;
	$a = $a1.$a2.$a3.$a4.$a5.$a6.$a7;

}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="返回學校功能選單" onClick="location='school_index.php'"><br />
<form name="form" method="post" action="basedata_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>102年度 貴校申請補助項目已上傳原始檔案列表</strong></font>
<? if($a == "") {echo "<!---";} ?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200" height="50" align="center" bgcolor="#99CCCC">補助項目</td>
    <td height="50" align="center" bgcolor="#99CCCC">檔案一</td>
    <td height="50" align="center" bgcolor="#99CCCC">檔案二</td>
    <td height="50" align="center" bgcolor="#99CCCC">檔案三</td>
    <td height="50" align="center" bgcolor="#99CCCC">檔案四</td>
    </tr>
<? if($a == "") {echo "--->";} ?>
  <? if($a1 == "") {echo "<!---";}?>
  <tr>
    <td width="200" height="50">1.補助推展親職教育活動</td>
    <td align="center"><? if ($a1_1 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a1_1.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a1_2 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a1_2.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a1_3 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a1_3.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a1_4 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a1_4.'" target="_new">'.下載.'</a>';}?></td>
    </tr>
  <? if($a1 == "") {echo "--->";}?>
  <? if($a2 == "") {echo "<!---";}?>
  <tr>
    <td width="200" height="50">2.補助學校發展教育特色</td>
    <td align="center"><? if ($a2_1 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a2_1.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a2_2 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a2_2.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a2_3 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a2_3.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a2_4 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a2_4.'" target="_new">'.下載.'</a>';}?></td>
    </tr>
  <? if($a2 == "") {echo "--->";}?>
  <? if($a3 == "") {echo "<!---";}?>
  <tr>
    <td width="200" height="50">3.修繕離島或偏遠地區師生宿舍</td>
    <td align="center"><? if ($a3_1 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a3_1.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a3_2 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a3_2.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a3_3 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a3_3.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a3_4 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a3_4.'" target="_new">'.下載.'</a>';}?></td>
    </tr>
  <? if($a3 == "") {echo "--->";}?>
  <? if($a4 == "") {echo "<!---";}?>
  <tr>
    <td width="200" height="50">4.充實學校基本教學設備</td>
    <td align="center"><? if ($a4_1 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a4_1.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a4_2 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a4_2.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a4_3 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a4_3.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a4_4 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a4_4.'" target="_new">'.下載.'</a>';}?></td>
    </tr>
  <? if($a4 == "") {echo "--->";}?>
  <? if($a5 == "") {echo "<!---";}?>
  <tr>
    <td width="200" height="50">5.發展原住民教育文化特色及充實設備器材</td>
    <td align="center"><? if ($a5_1 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a5_1.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a5_2 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a5_2.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a5_3 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a5_3.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a5_4 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a5_4.'" target="_new">'.下載.'</a>';}?></td>
    </tr>
  <? if($a5 == "") {echo "--->";}?>
  <? if($a6 == "") {echo "<!---";}?>
  <tr>
    <td width="200" height="50">6.補助交通不便地區學校交通車</td>
    <td align="center"><? if ($a6_1 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a6_1.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a6_2 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a6_2.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a6_3 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a6_3.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a6_4 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a6_4.'" target="_new">'.下載.'</a>';}?></td>
    </tr>
  <? if($a6 == "") {echo "--->";}?>
  <? if($a7 == "") {echo "<!---";}?>
  <tr>
    <td width="200" height="50">7.整修學校社區化活動場所</td>
    <td align="center"><? if ($a7_1 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a7_1.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a7_2 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a7_2.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a7_3 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a7_3.'" target="_new">'.下載.'</a>';}?></td>
    <td align="center"><? if ($a7_4 == ''){echo "<font color=red>無</font>";} else {echo '<a href="./upload/102/'.$username.'/'.$a7_4.'" target="_new">'.下載.'</a>';}?></td>
    </tr>
  <? if($a7 == "") {echo "--->";}?>
<? if($a == "") {echo "<!---";} ?>
</table>
<? if($a == "") {
	echo "--->";
	echo "<p><font color=red>貴校無上傳補助項目申請檔案。</font><p>";
}?>
<p><font color="blue"><strong>注意事項：</strong></font><br />
1. 僅列出申請填報期間，貴校有上傳檔案的補助項目。<br />
</form>
<?php
include "../../footer.php";
?>