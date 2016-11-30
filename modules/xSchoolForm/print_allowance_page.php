<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?
//學校名稱
if($class == '1' ){
			$basedata="100element_basedata";
	}
	else{
			$basedata="100junior_basedata";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
            $school = $row[1];//學校名稱
			//$schoolfullname = $row[13].str_replace("市立","",str_replace("縣立","",$row[1]));//學校全名				 
}
echo "申請補助彙整表";
?>
<?
//申請金額
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
<style type="text/css">
<!--
.style1 {
	font-family: "標楷體";
	font-size: 30px;
	width: 882;
	text-align: center;
}
.style3 {font-family: "標楷體"}
.style5 {
	font-size: 18
}
.style6 {
	font-family: "標楷體";
	font-size: 18;
}
.style8 {font-family: "標楷體"; font-size: 36; }
-->
</style>

<div align="left" class="style1">教育部101年度教育優先區計畫補助項目經費需求彙整表</div>
<table width="882" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td height="48" colspan="4" class="style3">學校名稱</td>
    <td width="204" class="style3"><div align="center"><? echo $school;?></div></td>
  </tr>
  <tr>
    <td height="35" colspan="4" class="style3">補助項目、名稱</td>
    <td class="style3"><div align="center">金額</div></td>
  </tr>
  <tr>
    <td width="28" rowspan="2" class="style3"><div align="center">1.</div></td>
    <td width="316" rowspan="2" class="style3">推展親職教育活動</td>
    <td height="30" colspan="2" class="style3">親職教育活動</td>
    <td class="style3"><div align="right"><? echo number_format($a1_1);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">目標學生家庭訪視輔導</td>
    <td class="style3"><div align="right"><? echo number_format($a1_2);?></div></td>
  </tr>
  <tr>
    <td rowspan="3" class="style3"><div align="center">2.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="3" class="style3">原住民及離島地區學校辦理學習輔導</td>
    <td height="30" colspan="2" class="style3">課後學習輔導</td>
    <td class="style3"><div align="right"><? echo number_format($a2_1);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">寒暑假學習輔導</td>
    <td class="style3"><div align="right"><? echo number_format($a2_2);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">住校生夜間學校輔導</td>
    <td class="style3"><div align="right"><? echo number_format($a2_3);?></div></td>
  </tr>
  <tr>
    <td rowspan="2" class="style3"><div align="center">3.</div>      <div align="center"></div></td>
    <td rowspan="2" class="style3">補助學校發展教育特色</td>
    <td height="30" colspan="2" class="style3">經常門</td>
    <td class="style3"><div align="right"><? echo number_format($a3_1);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">資本門</td>
    <td class="style3"><div align="right"><? echo number_format($a3_2);?></div></td>
  </tr>
  
  <tr>
    <td rowspan="4" class="style3"><div align="center">4.</div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="4" class="style3">修繕離島或偏遠地區師生宿舍</td>
    <td width="122" rowspan="2" class="style3 ">學生宿舍</td>
    <td height="30" class="style3">經常門</td>
    <td class="style3"><div align="right"><? echo number_format($a4_1);?></div></td>
  </tr>
  <tr>
    <td height="30" class="style3">資本門</td>
    <td class="style3"><div align="right"><? echo number_format($a4_2);?></div></td>
  </tr>
  <tr>
    <td width="122" rowspan="2" class="style3 ">教師宿舍    </td>
    <td width="178" height="30" class="style3">經常門</td>
    <td class="style3"><div align="right"><? echo number_format($a4_2_1);?></div></td>
  </tr>
  
  <tr>
    <td height="30" class="style3">資本門</td>
    <td class="style3"><div align="right"><? echo number_format($a4_2_2);?></div></td>
  </tr>
  
  <tr>
    <td height="33" rowspan="2" class="style3"><div align="center">5.</div></td>
    <td rowspan="2" class="style3">充實學校基本教學設備</td>
    <td height="30" colspan="2" class="style3">經常門</td>
    <td class="style3"><div align="right"><? echo number_format($a5_1);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">資本門</td>
    <td class="style3"><div align="right"><? echo number_format($a5_2);?></div></td>
  </tr>
  <tr>
    <td height="38" rowspan="2" class="style3"><div align="center">6.</div>      <div align="center"></div></td>
    <td rowspan="2" class="style3">發展原住民教育文化特色及充實設備器材</td>
    <td height="30" colspan="2" class="style3">經常門</td>
    <td class="style3"><div align="right"><? echo number_format($a6_1);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">資本門</td>
    <td class="style3"><div align="right"><? echo number_format($a6_2);?></div></td>
  </tr>
  
  <tr>
    <td rowspan="3" class="style3"><div align="center">7.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="3" class="style3">補助交通不便學校交通車</td>
    <td height="30" colspan="2" class="style3">租車費</td>
    <td class="style3"><div align="right"><? echo number_format($a7_1);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">交通費</td>
    <td class="style3"><div align="right"><? echo number_format($a7_2);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">購交通車費</td>
    <td class="style3"><div align="right"><? echo number_format($a7_3);?></div></td>
  </tr>
  <tr>
    <td rowspan="3" class="style3"><div align="center">8.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td rowspan="3" class="style3">整修學校社區化活動場所</td>
    <td height="30" colspan="2" class="style3">綜合球場</td>
    <td class="style3"><div align="right"><? echo number_format($a8_1);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">小型集會風雨教室</td>
    <td class="style3"><div align="right"><? echo number_format($a8_2);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">運動場</td>
    <td class="style3"><div align="right"><? echo number_format($a8_3);?></div></td>
  </tr>
  <tr>
    <td height="40" colspan="4" class="style3"><div align="center">總計</div></td>
    <td class="style3"><div align="right"><? echo number_format($total);?></div></td>
  </tr>
</table>
<br>
<table width="882" border="3" bordercolor="#000000">
  <tr>
    <td height="43" class="style3">
      　承辦人：　　　　　　　　　　主任：　　　　　　　　　　校長：</td>
  </tr>
</table>

