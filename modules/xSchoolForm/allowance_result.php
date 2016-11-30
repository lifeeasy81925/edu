<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";

//補助金額   
if($class == '1' ){
			$basedata="100element_money";
	}
	else{
			$basedata="100junior_money";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))
        {
                 $a1_1=$row[1];
				 $a1_2=$row[2];
				 $a2_1=$row[3];
				 $a2_2=$row[4];
				 $a2_3=$row[5];
				 $a3_1=$row[26];
				 $a3_2=$row[27];
				 $a4_1=$row[7];
				 $a4_2=$row[8];
				 $a4_2_1=$row[30];
				 $a4_2_2=$row[31];
				 $a5=$row[9];
				 $a5_1=$row[32];
				 $a5_2=$row[33];
				 $a6_1=$row[28];
				 $a6_2=$row[29];
				 $a7_1=$row[11];
				 $a7_2=$row[12];
				 $a7_3=$row[13];
				 $a8_1=$row[14];
				 $a8_2=$row[15];
 				 $a8_3=$row[16];
        }
		$total = $a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_1+$a4_2+$a4_2_1+$a4_2_2+$a5_1+$a5_2+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3;
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="allowance_result_finish.php" onSubmit="return toCheck();">
※經費申請結果<br>
<? if($a1_1 > '0'){
		$check1 = 1;
		echo '申請補助項目一(推展親職教育-親職教育活動),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a1_1).'元'.'</font>'.'<br>';}?>
<? if($a1_2 > '0'){
		$check2 = 1;
		echo '申請補助項目一(推展親職教育-學生家庭訪視輔導),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a1_2).'元'.'</font>'.'<br>';}?>
<? if($a2_1 > '0'){
		$check2 = 1;
		echo '申請補助項目二(原住民及離島地區學校-課後學習輔導),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a2_1).'元'.'</font>'.'<br>';}?>
<? if($a2_2 > '0'){
		$check2 = 1;
		echo '申請補助項目二(原住民及離島地區學校-寒暑假學習輔導),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a2_2).'元'.'</font>'.'<br>';}?>
<? if($a2_3 > '0'){
		$check2 = 1;
		echo '申請補助項目二(原住民及離島地區學校-住校生夜間學校輔導),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a2_3).'元'.'</font>'.'<br>';}?>
<? if($a3_1 > '0'){
		$check3 = 1;
		echo '申請補助項目三(補助學校發展教育特色-經常門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a3_1).'元'.'</font>'.'<br>';}?>
<? if($a3_2 > '0'){
		$check3 = 1;
		echo '申請補助項目三(補助學校發展教育特色-資本門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a3_2).'元'.'</font>'.'<br>';}?>
<? if($a4_1 > '0'){
		$check4 = 1;
		echo '申請補助項目四(修繕離島或偏遠地區學生宿舍-經常門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a4_1).'元'.'</font>'.'<br>';}?>
<? if($a4_2 > '0'){
		$check4 = 1;
		echo '申請補助項目四(修繕離島或偏遠地區學生宿舍-資本門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a4_2).'元'.'</font>'.'<br>';}?>
<? if($a4_2_1 > '0'){
		$check4 = 1;
		echo '申請補助項目四(修繕離島或偏遠地區教師宿舍-經常門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a4_2_1).'元'.'</font>'.'<br>';}?>
<? if($a4_2_2 > '0'){
		$check4 = 1;
		echo '申請補助項目四(修繕離島或偏遠地區教師宿舍-資本門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a4_2_2).'元'.'</font>'.'<br>';}?>
<? if($a5_1 > '0'){
		$check5 = 1;
		echo '申請補助項目五(充實學校基本教學設備-經常門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a5_1).'元'.'</font>'.'<br>';}?>
<? if($a5_2 > '0'){
		$check5 = 1;
		echo '申請補助項目五(充實學校基本教學設備-資本門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a5_2).'元'.'</font>'.'<br>';}?>
<? if($a6_1 > '0'){
		$check6 = 1;
		echo '申請補助項目六(發展原住民教育文化特色及充實設備器材-經常門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a6_1).'元'.'</font>'.'<br>';}?>
<? if($a6_2 > '0'){
		$check6 = 1;
		echo '申請補助項目六(發展原住民教育文化特色及充實設備器材-資本門),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a6_2).'元'.'</font>'.'<br>';}?>
<? if($a7_1 > '01'){
		$check7 = 1;
		echo '申請補助項目七(補助交通不便學校交通車-租車費),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a7_1).'元'.'</font>'.'<br>';}?>
<? if($a7_2 > '0'){
		$check7 = 1;
		echo '申請補助項目七(補助交通不便學校交通車-交通費),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a7_2).'元'.'</font>'.'<br>';}?>
<? if($a7_3 > '0'){
		$check7 = 1;
		echo '申請補助項目七(補助交通不便學校交通車-購交通車費),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a7_3).'元'.'</font>'.'<br>';}?>
<? if($a8_1 > '0'){
		$check8 = 1;
		echo '申請補助項目八(整修學校社區化活動場所-綜合球場),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a8_1).'元'.'</font>'.'<br>';}?>
<? if($a8_2 > '0'){
		$check8 = 1;
		echo '申請補助項目八(整修學校社區化活動場所-小型集會風雨教室),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a8_2).'元'.'</font>'.'<br>';}?>
<? if($a8_3 > '0'){
		$check8 = 1;
		echo '申請補助項目八(整修學校社區化活動場所-運動場),金額'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a8_3).'元'.'</font>'.'<br><br>';}?>
總申請經費：<? echo '<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($total); ?>元</font>整<br /><br />
<?php
//處理：硬體項目(補助項目四、五、七、八)最多以二項為原則
$check4578 = $check4 + $check5 + $check7 + $check8;
if ($check4578 > 2) {
	echo "<font color = red>※超過申請數量：硬體項目(補助項目四、五、七、八)最多以二項為原則。<br>";
	echo "※請往前頁調整申請金額，不申請項目金額請填寫「0」。</font><br><br>";
}
?>
<?php
include "allowance_set.php";

//判斷符合申請標準,但未申請經費
echo "※未申請項目<br>";	
 if($a_1 == 1){
	 if($a1_1 == '0'){echo '申請補助項目一(推展親職教育-親職教育活動)'.'<br>';}
	 if($a1_2 == '0'){echo '申請補助項目一(推展親職教育-學生家庭訪視輔導)'.'<br>';}
	 }
 if($a_2 == 1){
	 if($a2_1 == '0'){echo '申請補助項目二(原住民及離島地區學校-課後學習輔導)'.'<br>';}
	 if($a2_2 == '0'){echo '申請補助項目二(原住民及離島地區學校-寒暑假學習輔導)'.'<br>';}
	 if($a2_3 == '0'){echo '申請補助項目二(原住民及離島地區學校-住校生夜間學校輔導)'.'<br>';}
	 }
 if($a_3 == 1){
	 if($a3_1 == '0'){echo '申請補助項目三(補助學校發展教育特色-經常門)'.'<br>';}
	 if($a3_2 == '0'){echo '申請補助項目三(補助學校發展教育特色-資本門)'.'<br>';}
	 }
 if($a_4_1 == 1){
	 if($a4_1 == '0'){echo '申請補助項目四(修繕離島或偏遠地區學生宿舍-經常門)'.'<br>';}
	 if($a4_2 == '0'){echo '申請補助項目四(修繕離島或偏遠地區學生宿舍-資本門)'.'<br>';}
	 }
 if($a_4_2 == 1){
	 if($a4_2_1 == '0'){echo '申請補助項目四(修繕離島或偏遠地區教師宿舍-經常門)'.'<br>';}
	 if($a4_2_2 == '0'){echo '申請補助項目四(修繕離島或偏遠地區教師宿舍-資本門)'.'<br>';}
	 }
 if($a_5 == 1){
	 if($a5_1 == '0'){echo '申請補助項目五(充實學校基本教學設備-經常門)'.'<br>';}
	 if($a5_2 == '0'){echo '申請補助項目五(充實學校基本教學設備-資本門)'.'<br>';}
	 }
 if($a_6 == 1){
	 if($a6_1 == '0'){echo '申請補助項目六(發展原住民教育文化特色及充實設備器材-經常門)'.'<br>';}
	 if($a6_2 == '0'){echo '申請補助項目六(發展原住民教育文化特色及充實設備器材-資本門)'.'<br>';}
	 }
 if($a_7 == 1){
	 if(($a7_1 == '0') && ($a7_2 == '0') && ($a7_3 == '0')){echo '申請補助項目七(補助交通不便學校交通車-租車費)'.'<br>';}
	 if(($a7_1 == '0') && ($a7_2 == '0') && ($a7_3 == '0')){echo '申請補助項目七(補助交通不便學校交通車-交通費)'.'<br>';}
	 if(($a7_1 == '0') && ($a7_2 == '0') && ($a7_3 == '0')){echo '申請補助項目七(補助交通不便學校交通車-購交通車費)'.'<br>';}
	 }
 if($a_8 == 1){
	 if($a8_1 == '0'){echo '申請補助項目八(整修學校社區化活動場所-綜合球場)'.'<br>';}
//	 if($a8_2 == '0'){echo '申請補助項目八(整修學校社區化活動場所-小型集會風雨教室)'.'<br>';}
//	 if($a8_3 == '0'){echo '申請補助項目八(整修學校社區化活動場所-運動場)'.'<br>';}
	 }
?>
<br>
※點選「確認」進入「申請補助彙整表」列印。<br />
	  <INPUT TYPE="button" VALUE="往前一頁修改" onClick="history.go(-1)">
&nbsp;<input name="button" type="submit"  value = "確認" />
</p>

<!-- 資料驗證 -->
<script language="JavaScript">
function toCheck() {
	var check4578 = <? echo $check4578;?>;
	if ( check4578 > 2 ) {
		alert('超過申請數量：硬體項目(補助項目四、五、七、八)最多以二項為原則\n請往前頁調整申請金額，不申請項目金額請填寫「0」');
		//document.form.assistclass.focus();
		return false;
	}

    return true;
}
</script>

</form>

<?php
include "../../footer.php";
?>