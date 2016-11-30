<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?
$id = $_GET["id"];
$sql = "select  *  from edu_school where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$class = $row[3];//學校名稱
	}
//學校名稱
if($class == '1' ){
			$basedata="100element_basedata";
	}
	else{
			$basedata="100junior_basedata";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$id'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school = $row[1];//學校名稱
	$schoolfullname = $row[13].str_replace("市立","",str_replace("縣立","",$row[1]));//學校全名
}
?>
<?
//申請金額
if($class == '1' ){
			$basedata="100element_money";
	}
	else{
			$basedata="100junior_money";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$id'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))
        {
                 $a1_1=$row[1];
				 $a1_2=$row[2];
				 $a2_1=$row[3];
				 $a2_2=$row[4];
				 $a2_3=$row[5];
				 $a3=$row[6];
				 $a4_1=$row[7];
				 $a4_2=$row[8];
				 $a4_2_1=$row[30];
				 $a4_2_2=$row[31];
				 $a5=$row[9];
				 $a6=$row[10];
				 $a7_1=$row[11];
				 $a7_2=$row[12];
				 $a7_3=$row[13];
				 $a8_1=$row[14];
				 $a8_2=$row[15];
 				 $a8_3=$row[16];
        }
		$total = $a1_1+$a1_2+$a2_1+$a2_2+$a3+$a4_1+$a4_2+$a4_2_1+$a4_2_2+$a5+$a6+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3;
?>

<style type="text/css">
<!--
.style1 {
	font-family: "標楷體";
	font-size: 30px;
}
.style3 {font-family: "標楷體"}
.style4 {font-size: 24px}
.style7 {font-size: 36}
.style8 {font-family: "標楷體"; font-size: 36; }
-->
</style>
<div align="left"><span class="style1">教育部101年度教育優先區計畫補助項目經費需求彙整表</span><span class="style3"><br>
<table width="1390" border="3" bordercolor="#000000">
  <tr>
    <td height="48" colspan="4" class="style3">學校名稱</td>
    <td colspan="5" class="style3"><div align="center" class="style4"><span class="style7"></span><? echo $school;?></div></td>
  </tr>
  <?
  	if($class == '1' ){
			$basedata=" 100element_examine_a1";
	}
	else{
			$basedata=" 100junior_examine_a1";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
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
    <td width="147" class="style3"><div align="center" class="style3">金額</div></td>
    <td class="style3"><div align="center">縣市審核金額</div></td>
    <td class="style3"><div align="center">說明</div></td>
    <td class="style3"><div align="center">教育部審核金額</div></td>
    <td width="128" class="style3"><div align="center">說明</div></td>
  </tr>
  <tr>
    <td width="26" rowspan="2" class="style3"><div align="center">1.</div></td>
    <td width="310" rowspan="2" class="style3">推展親職教育活動</td>
    <td height="36" colspan="2" class="style3">親職教育活動</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a1_1);?></div></td>
    <td width="140" class="style3"><div align="right"><? echo number_format($lec_money);?></div></td>
    <td rowspan="2" class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($lec_money_1);?></div></td>
    <td rowspan="2" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="36" colspan="2" class="style3">目標學生家庭訪視輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a1_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($fam_money);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($fam_money_1);?></div></td>
  </tr>
    <?
  	if($class == '1' ){
			$basedata=" 100element_examine_a2";
	}
	else{
			$basedata=" 100junior_examine_a2";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$assist = $row[1];
			$nightassist = $row[2];
			$holidayassist = $row[3];
			$other = $row[4];
			$assist_1 = $row[5];
			$nightassist_1 = $row[6];
			$holidayassist_1 = $row[7];
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
    <td height="41" colspan="2" class="style3">課後學習輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($assist);?></div></td>
    <td width="150" rowspan="3" class="style3"><? echo $other;?></td>
    <td width="133" class="style3"><div align="right"><? echo number_format($assist_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="37" colspan="2" class="style3">寒暑假學習輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($nightassist);?></div></td>
    <td width="133" class="style3"><div align="right"><? echo number_format($nightassist_1);?></div></td>
  </tr>
  <tr>
    <td height="43" colspan="2" class="style3">住校生夜間學校輔導</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($holidayassist);?></div></td>
    <td width="133" class="style3"><div align="right"><? echo number_format($holidayassist_1);?></div></td>
  </tr>
      <?
  	if($class == '1' ){
			$basedata=" 100element_examine_a3";
	}
	else{
			$basedata=" 100junior_examine_a3";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money = $row[1];
			$money_1 = $row[2];
			$money_2 = $row[3];
			$other = $row[4];
     		$money_1 = $row[5];
			$money_1_1 = $row[6];
			$money_2_1 = $row[7];
			$other_1 = $row[8];
		}
  ?>
   <? 
  	$total_examine = $total_examine+$money+$money_1+$money_2;
  	$total_examine_1 = $total_examine_1+$money_1+$money_1_1+$money_2_1;
  ?>
  <tr>
    <td height="43" class="style3"><div align="center">3.</div>      <div align="center"></div></td>
    <td class="style3">補助學校發展教育特色</td>
    <td colspan="2" class="style3">設備、其他經費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money+$money_1+$money_2);?></div></td>
    <td class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money_1+$money_1_1+$money_2_1);?></div></td>
    <td class="style3"><? echo $other_1;?></td>
  </tr>
<? //補助四
  	if($class == '1' ){
			$basedata=" 100element_examine_a4";
	}
	else{
			$basedata=" 100junior_examine_a4";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
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
     <td height="35" class="style3">修繕</td>
     <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_1);?></div></td>
     <td class="style3"><div align="right"><? echo number_format($money1_1);?></div></td>
    <td rowspan="4" class="style3"><? echo $other1;?></td>
     <td class="style3"><div align="right"><? echo number_format($money2_1);?></div></td>
    <td rowspan="4" class="style3"><? echo $other2;?></td>
  </tr>
  <tr>
    <td height="35" class="style3">充實設備</td>
     <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_2);?></div></td>
     <td class="style3"><div align="right"><? echo number_format($money1_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money2_2);?></div></td>
  </tr>
  <tr>
    <td width="119" rowspan="2" class="style3">教師宿舍</td>
    <td width="175" height="35" class="style3">修繕</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_2_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney1_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney2_1);?></div></td>
  </tr>
  
<tr>
  <td height="34" class="style3">充實設備</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_2_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney1_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($Tmoney2_2);?></div></td>
</tr>
   <?
  	if($class == '1' ){
			$basedata=" 100element_examine_a5";
	}
	else{
			$basedata=" 100junior_examine_a5";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money = $row[1];
			$other = $row[2];
			
			$money_1 = $row[3];
			$other_1 = $row[4];
        }
  ?>
  <? 
  	$total_examine = $total_examine+$money;
  	$total_examine_1 = $total_examine_1+$money_1;
  ?> 
  <tr>
    <td height="33" class="style3"><div align="center">5.</div></td>
    <td colspan="3" class="style3">充實學校基本教學設備</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a5);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money);?></div></td>
    <td class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money_1);?></div></td>
    <td class="style3"><? echo $other_1;?></td>
  </tr>
    <?
  	if($class == '1' ){
			$basedata=" 100element_examine_a6";
	}
	else{
			$basedata=" 100junior_examine_a6";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_row($result_school))
        {
			$money = $row[1];
			$other = $row[2];
			
			$money_1 = $row[3];
			$other_1 = $row[4];
        }
  ?>
  <? 
  	$total_examine = $total_examine+$money;
  	$total_examine_1 = $total_examine_1+$money_1;
  ?>
  <tr>
    <td height="38" class="style3"><div align="center">6.</div>      <div align="center"></div></td>
    <td class="style3">發展原住民教育文化特色及充實設備器材</td>
    <td colspan="2" class="style3">設備器材其他經費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a6);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money);?></div></td>
    <td class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money_1);?></div></td>
    <td class="style3"><? echo $other_1;?></td>
  </tr>
    <?
  	if($class == '1' ){
			$basedata=" 100element_examine_a7";
	}
	else{
			$basedata=" 100junior_examine_a7";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
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
    <td rowspan="3" class="style3"><div align="center">7.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="3" class="style3">補助交通不便學校交通車</td>
    <td height="38" colspan="2" class="style3">租車費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_1);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other;?></td>
    <td class="style3"><div align="right"><? echo number_format($money_1_1);?></div></td>
    <td rowspan="3" class="style3"><? echo $other_1;?></td>
  </tr>
  <tr>
    <td height="34" colspan="2" class="style3">交通費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2_1);?></div></td>
  </tr>
  <tr>
    <td height="33" colspan="2" class="style3">購交通車費</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_3);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_3_1);?></div></td>
  </tr>
      <?
  	if($class == '1' ){
			$basedata=" 100element_examine_a8";
	}
	else{
			$basedata=" 100junior_examine_a8";
		}			
	$sql_school = "select  *  from ".$basedata." where account like '$id'";
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
    <td height="33" colspan="2" class="style3">小型集會風雨教室</td>
    <td class="style3"><div align="right"><span class="style7"></span><? echo number_format($a8_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2);?></div></td>
    <td class="style3"><div align="right"><? echo number_format($money_2_1);?></div></td>
  </tr>
  <tr>
    <td height="34" colspan="2" class="style3">運動場</td>
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


