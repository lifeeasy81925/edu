<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$search_school = $_GET["id"];
//username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('school') . " where `account` = '$search_school'";
$result = $xoopsDB -> query($sql) or die($sql);
list($account , $city , $school , $class) = $xoopsDB->fetchRow($result);
echo $search_school;

//學校名稱
if($class == '1' ){
	$basedata="100element_basedata";
}else{
	$basedata="100junior_basedata";
}			
$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school = $row[1];//學校名稱
	$schoolfullname = $row[13].str_replace("市立","",str_replace("縣立","",$row[1]));//學校全名
}

//申請金額
if($class == '1' ){
	$basedata="100element_money";
}else{
	$basedata="100junior_money";
}			
$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
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
<!--<p>教育部複審中...
<p>待複審完成將於首頁公告，並恢復此功能。
<p>
-->
<style type="text/css">
.style1 {
	font-family: "標楷體";
	font-size: 30px;
}
.style3 {font-family: "標楷體"}
.style4 {
	font-size: 22px;
	font-family: "標楷體";
}
.style7 {font-size: 36}
.style8 {font-family: "標楷體"; font-size: 36; }
</style>

<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<!--<input type="button" value="友善列印" onclick="window.open('government_exmained_print.php')" /> -->

<br />
<span class="style4">教育部101年度教育優先區計畫補助項目經費需求彙整表</span><span class="style3"><br>

<table width="1390" bordercolor="#000000"  border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td height="76" colspan="4" class="style3">學校名稱</td>
    <td colspan="5" class="style3"><div align="center"><span class="style7"></span><? echo $school;?></div></td>
  </tr>
<?
  	if($class == '1' ){
			$basedata=" 100element_examine_a1";
	}
	else{
			$basedata=" 100junior_examine_a1";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$lec_money = $row[1];
			$fam_money = $row[2];
			$other = $row[3];
			$lec_money_1 = $row[4];
			$fam_money_1 = $row[5];
			$other_1 = $row[6];
			
        }
  ?>
  <? 
  		$total_examine = 0; 
  		$total_examine = $total_examine+$lec_money+$fam_money;
  		$total_examine_1 = 0; 
  		$total_examine_1 = $total_examine_1+$lec_money_1+$fam_money_1;		
  ?>
  <tr>
    <td height="35" colspan="4" class="style3">補助項目、金額</td>
    <td width="147" class="style3"><div align="center" class="style3">申請金額</div></td>
    <td class="style3"><div align="center">縣市審核金額</div></td>
    <td class="style3"><div align="center">說明</div></td>
    <td class="style3"><div align="center">教育部審核金額</div></td>
    <td width="128" class="style3"><div align="center">說明</div></td>
  </tr>
  <tr>
    <td width="26" rowspan="2" class="style3"><div align="center">1.</div></td>
    <td width="310" rowspan="2" class="style3">推展親職教育活動</td>
    <td height="35" colspan="2" class="style3">親職教育活動</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a1_1);?></div></td>
    <td width="140" class="style3"><div align="right"><? echo number_format($lec_money);?></div></td>
    <td rowspan="2" class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($lec_money_1);?></div></td>
    <td rowspan="2" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">目標學生家庭訪視輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a1_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($fam_money);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($fam_money_1);?></div></td>
  </tr>
<? //補助二
  	if($class == '1' ){
			$basedata=" 100element_examine_a2";
	}
	else{
			$basedata=" 100junior_examine_a2";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$assist = $row[1];
			$holidayassist = $row[2];
			$nightassist = $row[3];
			$other = $row[4];
			$assist_1 = $row[5];
			$holidayassist_1 = $row[6];
			$nightassist_1 = $row[7];
			$other_1 = $row[8];
        }
?>
<? 
	$total_examine = $total_examine+$assist+$nightassist+$holidayassist;
	$total_examine_1 = $total_examine_1+$assist_1+$nightassist_1+$holidayassist_1;
?>
  <tr>
    <td rowspan="3" class="style3"><div align="center">2.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="3" class="style3">原住民及離島地區學校辦理學習輔導</td>
    <td height="35" colspan="2" class="style3">課後學習輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($assist);?></div></td>
    <td width="150" rowspan="3" class="style3"><? echo $other;?></td>
    <td width="133" class="style3"><div align="right"><? echo number_format($assist_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">寒暑假學習輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($nightassist);?></div></td>
    <td width="133" class="style3"><div align="right"><? echo number_format($nightassist_1);?></div></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">住校生夜間學校輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($holidayassist);?></div></td>
    <td width="133" class="style3"><div align="right"><? echo number_format($holidayassist_1);?></div></td>
  </tr>

<? //補助項目三
if($class == '1' ){
	$basedata=" 100element_examine_a3";
}else{
	$basedata=" 100junior_examine_a3";
}			
$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$money1 = $row[1];	//縣市審核總金額
	$money1_1 = $row[2];	//縣市審核特色一金額
	$money1_1_1 = $row[11];	//縣市審核特色一經常門金額
	$money1_1_2 = $row[12];	//縣市審核特色一資本門金額
	$money1_2 = $row[3];	//縣市審核特色二金額
	$money1_2_1 = $row[13];	//縣市審核特色二經常門金額
	$money1_2_2 = $row[14];	//縣市審核特色二資本門金額
	$other1 = $row[4];		//縣市審核意見
    $money2 = $row[5];	//教育部審核總金額
	$money2_1 = $row[6];	//教育部審核特色一金額
	$money2_1_1 = $row[15];	//教育部審核特色一經常門金額
	$money2_1_2 = $row[16];	//教育部審核特色一資本門金額
	$money2_2 = $row[7];	//教育部審核特色二金額
	$money2_2_1 = $row[17];	//教育部審核特色二經常門金額
	$money2_2_2 = $row[18];	//教育部審核特色二資本門金額
	$other2 = $row[8];		//教育部審核意見
}
//取學校補助項目三細項
if($class == '1' ){
	$basedata="100element_allowance3";
}else{
	$basedata="100junior_allowance3";
}			
$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$char1a = $row[13];	//學校申請特色一經常門金額
	$char1b = $row[14];	//學校申請特色一資本門金額
	$char2a = $row[17];	//學校申請特色二經常門金額
	$char2b = $row[18];	//學校申請特色二資本門金額
}
$total_examine = $total_examine+$money1_1+$money1_2;
$total_examine_1 = $total_examine_1+$money2_1+$money2_2;
?>
  <tr>
    <td height="43" rowspan="4" class="style3"><div align="center">3.</div>      <div align="center"></div></td>
    <td rowspan="4" class="style3">補助學校發展教育特色</td>
    <td width="140" height="35" rowspan="2" class="style3">特色一</td>
    <td width="140" height="35" class="style3">經常門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($char1a);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money1_1_1);?></div></td>
    <td rowspan="4" class="style3"><? echo $other1;?></td>
    <td class="style3"><div align="right"><? echo number_format($money2_1_1);?></div></td>
    <td rowspan="4" class="style3"><? echo $other2;?></td>
  </tr>
  <tr>
    <td height="35" class="style3">資本門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($char1b);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money1_1_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money2_1_2);?></div></td>
  </tr>
  <tr>
    <td height="35" rowspan="2" class="style3">特色二</td>
    <td height="35" class="style3">經常門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($char2a);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money1_2_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money2_2_1);?></div></td>
  </tr>
  <tr>
    <td height="35" class="style3">資本門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($char2b);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money1_2_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money2_2_2);?></div></td>
  </tr>
<? //補助四
  	if($class == '1' ){
			$basedata=" 100element_examine_a4";
	}
	else{
			$basedata=" 100junior_examine_a4";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money1_1 = $row[1];
			$money1_2 = $row[2];
			$Tmoney1_1 = $row[7];
			$Tmoney1_2 = $row[8];
			$other1 = $row[3];
			
			$money2_1 = $row[4];
			$money2_2 = $row[5];
			$Tmoney2_1 = $row[9];
			$Tmoney2_2 = $row[10];
			$other2 = $row[6];
        }
?>
<? 
  	$total_examine = $total_examine+$money1_1+$money1_2+$Tmoney1_1+$Tmoney1_2;
 	$total_examine_1 = $total_examine_1+$money2_1+$money2_2+$Tmoney2_1+$Tmoney2_2;
?>
<tr>
  <td rowspan="4" class="style3"><div align="center">4.</div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div></td>
  <td rowspan="4" class="style3">修繕離島或偏遠地區師生宿舍</td>
  <td width="119" rowspan="2" class="style3">學生宿舍</td>
  <td height="35" class="style3">經常門</td>
  <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_1);?></div></td>
  <td class="style3"><div align="right"><? echo number_format($money1_1);?></div></td>
  <td rowspan="4" class="style3"><? echo $other1;?></td>
  <td class="style3"><div align="right"><? echo number_format($money2_1);?></div></td>
  <td rowspan="4" class="style3"><? echo $other2;?></td>
</tr>
<tr>
  <td height="35" class="style3">資本門</td>
  <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_2);?></div></td>
  <td class="style3"><div align="right"><? echo number_format($money1_2);?></div></td>
  <td class="style3"><div align="right"><? echo number_format($money2_2);?></div></td>
  </tr>
<tr>
  <td width="119" rowspan="2" class="style3">教師宿舍</td>
    <td height="35" class="style3">經常門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_2_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney1_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney2_1);?></div></td>
  </tr>
  
<tr>
  <td height="35" class="style3">資本門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_2_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney1_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney2_2);?></div></td>
</tr>
<? //補助五
  	if($class == '1' ){
			$basedata=" 100element_examine_a5";
	}
	else{
			$basedata=" 100junior_examine_a5";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money1 = $row[7];
			$money2 = $row[8];
			$other = $row[2];
			
			$money2_1 = $row[9];
			$money2_2 = $row[10];
			$other_1 = $row[4];
        }

  	$total_examine = $total_examine+$money1+$money2;
  	$total_examine_1 = $total_examine_1+$money2_1+$money2_2;
  ?> 
  <tr>
    <td height="33" rowspan="2" class="style3"><div align="center">5.</div></td>
    <td rowspan="2" class="style3">充實學校基本教學設備</td>
    <td height="35" colspan="2" class="style3">經常門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a5_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money1);?></div></td>
    <td rowspan="2" class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money2_1);?></div></td>
    <td rowspan="2" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">資本門</td>
    <td align="right" class="style3"><? echo number_format($a5_2);?></td>
    <td align="right" class="style3"><? echo number_format($money2);?></td>
    <td align="right" class="style3"><? echo number_format($money2_2);?></td>
  </tr>
<? //補助六
  	if($class == '1' ){
			$basedata=" 100element_examine_a6";
	}
	else{
			$basedata=" 100junior_examine_a6";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money = $row[1];
			$other = $row[2];
			
			$money_1 = $row[3];
			$other_1 = $row[4];
        }

  	$total_examine = $total_examine+$money;
  	$total_examine_1 = $total_examine_1+$money_1;
  ?>
  <tr>
    <td height="38" class="style3"><div align="center">6.</div>      <div align="center"></div></td>
    <td class="style3">發展原住民教育文化特色及充實設備器材</td>
    <td height="35" colspan="2" class="style3">經常門、資本門</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a6_1+$a6_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money);?></div></td>
    <td class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money_1);?></div></td>
    <td class="style3"><? echo $other_1;?></td>
  </tr>
<? //補助七
  	if($class == '1' ){
			$basedata=" 100element_examine_a7";
	}
	else{
			$basedata=" 100junior_examine_a7";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money_1 = $row[1];
			$money_2 = $row[2];
			$money_3 = $row[3];
			$other = $row[4];
			
			$money_1_1 = $row[5];
			$money_2_1 = $row[6];
			$money_3_1 = $row[7];
			$other_1 = $row[8];			
        }

  	$total_examine = $total_examine+$money_1+$money_2+$money_3;
  	$total_examine_1 = $total_examine_1+$money_1_1+$money_2_1+$money_3_1;
  ?> 
  <tr>
    <td rowspan="3" class="style3"><div align="center">7.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="3" class="style3">補助交通不便學校交通車</td>
    <td height="35" colspan="2" class="style3">租車費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money_1_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">交通費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2_1);?></div></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">購交通車費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_3_1);?></div></td>
  </tr>
<? //補助八
  	if($class == '1' ){
			$basedata=" 100element_examine_a8";
	}
	else{
			$basedata=" 100junior_examine_a8";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$search_school'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money_1 = $row[1];
			$money_2 = $row[2];
			$money_3 = $row[3];
			$other = $row[4];

			$money_1_1 = $row[5];
			$money_2_1 = $row[6];
			$money_3_1 = $row[7];
			$other_1 = $row[8];
        }
  ?> 
    <? 
  	$total_examine = $total_examine+$money_1+$money_2+$money_3;
  	$total_examine_1 = $total_examine_1+$money_1_1+$money_2_1+$money_3_1;
  ?> 
  <tr>
    <td rowspan="3" class="style3"><div align="center">8.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="3" class="style3">整修學校社區化活動場所</td>
    <td height="35" colspan="2" class="style3">綜合球場</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a8_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money_1_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">小型集會風雨教室</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a8_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2_1);?></div></td>
  </tr>
  <tr>
    <td height="35" colspan="2" class="style3">運動場</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a8_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_3_1);?></div></td>
  </tr>
  <tr>
    <td height="43" colspan="4" class="style3"><div align="center">總計</div></td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($total);?></div></td>
    <td colspan="2" class="style3"><div align="right"><? echo number_format($total_examine);?></div></td>
    <td colspan="2" class="style3"><div align="right"><? echo number_format($total_examine_1);?></div></td>
  </tr>
</table>
<br>
<?php
include "../../footer.php";
?>