<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
if($username == 'edu0001' || $username == 'edu0025'|| $username == 'edu0099'){			
	}
else{
	echo "<script Language="."Javascript"." FOR="."window"." EVENT="."onLoad"."> window.alert("."您沒有設定權限!".")</script>";
	echo "<meta http-equiv=REFRESH CONTENT=0;url=education_index.php>";
}
// 補助金額			
	$sql = "select  *  from 100education_money ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
                 $a1_1=$row[2];
				 $a1_2=$row[3];
				 $a2_1=$row[4];
				 $a2_2=$row[5];
				 $a2_3=$row[6];
				 $a3=$row[7];
				 $a4_1=$row[8];
				 $a4_2=$row[9];
				 $a5=$row[10];
				 $a6=$row[11];
				 $a7_1=$row[12];
				 $a7_2=$row[13];
				 $a7_3=$row[14];
				 $a8_1=$row[15];
				 $a8_2=$row[16];
 				 $a8_3=$row[17];
				 $total = $row[18];
				 $a3_1=$row[19];
				 $a3_2=$row[20];
				 $a3_1_1=$row[21];
				 $a3_1_2=$row[22];
				 $a3_2_1=$row[23];
				 $a3_2_2=$row[24];
				 $a4_1_1=$row[25];
				 $a4_1_2=$row[26];
				 $a4_2_1=$row[27];
				 $a4_2_2=$row[28];
				 $a5_1=$row[29];
				 $a5_2=$row[30];
				 $a6_1=$row[31];
				 $a6_2=$row[32];
				 $rate = $row[33];
		}
	//計算總合
				$p1_1=$p1_1+$a1_1;
				$p1_2=$p1_2+$a1_2;
				$p2_1=$p2_1+$a2_1;
				$p2_2=$p2_2+$a2_1;
				$p2_3=$p2_3+$a2_1;
				$p3=$p3+$a3;
				$p3_1=$p3_1+$a3_1;
				$p3_2=$p3_2+$a3_2;
				$p3_1_1=$p3_1_1+$a3_1_1;
				$p3_1_2=$p3_1_2+$a3_1_2;
				$p3_2_1=$p3_2_1+$a3_2_1;
				$p3_2_2=$p3_2_2+$a3_2_2;
				$p4_1=$p4_1+$a4_1;
				$p4_2=$p4_2+$a4_2;
				$p4_1_1=$p4_1_1+$a4_1_1;
				$p4_1_2=$p4_1_2+$a4_1_2;
				$p4_2_1=$p4_2_1+$a4_2_1;
				$p4_2_2=$p4_2_2+$a4_2_2;
				$p5=$p5+$a5;
				$p5_1=$p5_1+$a5_1;
				$p5_2=$p5_2+$a5_2;
				$p6=$p6+$a6;
				$p6_1=$p6_1+$a6_1;
				$p6_2=$p6_2+$a6_2;
				$p7_1=$p7_1+$a7_1;
				$p7_2=$p7_2+$a7_2;
				$p7_3=$p7_3+$a7_3;
				$p8_1=$p8_1+$a8_1;
				$p8_2=$p8_2+$a8_2;
 				$p8_3=$p8_3+$a8_3;
$a1="2000000";
$a2="3000000";
$a3="4000000";
$a4="5000000";
$a5="6000000";
$a6="7000000";
$a7="8000000";
$a8="9000000";
$a9="9000000";

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
教育部核定經費調整控制(功能展示版--測試)

<br />
<form action="" method="post" name="form" id="form" onsubmit="return toCheck();">
<input type="hidden" name="a1" value="<? echo $a1; ?>" >
<input type="hidden" name="a2" value="<? echo $a2; ?>" >
<input type="hidden" name="a3" value="<? echo $a3; ?>" >
<input type="hidden" name="a4" value="<? echo $a4; ?>" >
<input type="hidden" name="a5" value="<? echo $a5; ?>" >
<input type="hidden" name="a6" value="<? echo $a6; ?>" >
<input type="hidden" name="a7" value="<? echo $a7; ?>" >
<input type="hidden" name="a8" value="<? echo $a8; ?>" >
<input type="hidden" name="a9" value="<? echo $a9; ?>" >

  <table border="1" width="758">
    <tbody>
      <tr>
        <td width="79" align="center">類型</td>
        <td width="328" align="center">補助經費</td>
        <td align="center">已核定經費(元)</td>
        <td align="center">調整經費比率(%)</td>
        <td align="center">試算小計</td>
      </tr>
      <tr>
        <td rowspan="16" align="center" valign="middle">經常門<br /></td>
        <td valign="top">1-1【親職教育活動】<br />
          </td>
        <td valign="top"><?echo number_format($a1);?></td>
        <td valign="top"><select name="s1" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td1"></td>
      </tr>
      <tr>
        <td valign="top">1-2【目標學生家庭訪視輔導】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td1"></td>
      </tr>
      <tr>
        <td valign="top">2-1【課後學習輔導】<br />
          </td>
        <td valign="top"><?echo number_format($a2);?></td>
        <td valign="top"><select name="s2" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td2"></td>
      </tr>
      <tr>
        <td valign="top">2-2【寒暑假學習輔導】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td2"></td>
      </tr>
      <tr>
        <td valign="top">2-3【住校生夜間學校輔導】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td2"></td>
      </tr>
      <tr>
        <td valign="top">3-1【學校發展教育特色】</td>
        <td valign="top"><?echo number_format($a3);?></td>
        <td valign="top"><select name="s3" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td3"></td>
      </tr>
      <tr>
        <td valign="top">4-1【修繕學生宿舍】<br />
          </td>
        <td valign="top"><?echo number_format($a4);?></td>
        <td valign="top"><select name="s4" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td4"></td>
      </tr>
      <tr>
        <td valign="top">4-3【修繕教師宿舍】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td4"></td>
      </tr>
      <tr>
        <td valign="top">5-1【充實學校基本教學設備】</td>
        <td valign="top"><?echo number_format($a5);?></td>
        <td valign="top"><select name="s5" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td5"></td>
      </tr>
      <tr>
        <td valign="top">6-1【發展原住民特色及充實設備】</td>
        <td valign="top"><?echo number_format($a6);?></td>
        <td valign="top"><select name="s6" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td6"></td>
      </tr>
      <tr>
        <td valign="top">7-1【交通不便學校-租車費】<br />
          </td>
        <td valign="top"><?echo number_format($a7);?></td>
        <td valign="top"><select name="s7" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td7"></td>
      </tr>
      <tr>
        <td valign="top">7-2【交通不便學校-交通費】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td7"></td>
      </tr>
      <tr>
        <td valign="top">7-3【交通不便學校-購交通車費】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td7"></td>
      </tr>
      <tr>
        <td valign="top">8-1【整修綜合球場】<br />
          </td>
        <td valign="top"><?echo number_format($a8);?></td>
        <td valign="top"><select name="s8" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td id="td8"></td>
      </tr>
      <tr>
        <td valign="top">8-2【整修小型集會風雨教室】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td8"></td>
      </tr>
      <tr>
        <td valign="top">8-3【整修運動場】</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td id="td8"></td>
      </tr>
      <tr>
        <td align="center" valign="middle" rowspan="5">資本門</td>
        <td valign="top">3-2【學校發展教育特色】<br />
          </td>
        <td width="173" valign="top"><?echo number_format($a9);?></td>
        <td width="150" valign="top"><select name="s9" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
		<option value=1>100%</option>
		<option value=0.9>90%</option>
		<option value=0.8>80%</option>
		<option value=0.7>70%</option>
		<option value=0.6>60%</option>
		<option value=0.5>50%</option>
		<option value=0.4>40%</option>
		<option value=0.3>30%</option>
		<option value=0.2>20%</option>
		<option value=0.1>10%</option>
</select></td>
        <td width="150" id="td9"></td>
      </tr>
      <tr>
        <td valign="top">4-2【修繕學生宿舍】</td>
        <td width="173" valign="top">&nbsp;</td>
        <td width="150" valign="top">&nbsp;</td>
        <td width="150" id="td9"></td>
      </tr>
      <tr>
        <td valign="top">4-4【修繕教師宿舍】</td>
        <td width="173" valign="top">&nbsp;</td>
        <td width="150" valign="top">&nbsp;</td>
        <td width="150" id="td9"></td>
      </tr>
      <tr>
        <td valign="top">5-2【充實學校基本教學設備】</td>
        <td width="173" valign="top">&nbsp;</td>
        <td width="150" valign="top">&nbsp;</td>
        <td width="150" id="td9"></td>
      </tr>
      <tr>
        <td valign="top">6-2【發展原住民特色及充實設備】</td>
        <td width="173" valign="top">&nbsp;</td>
        <td width="150" valign="top">&nbsp;</td>
        <td width="150" id="td9"></td>
      </tr>
    </tbody>
	<tr>
<th colspan=2 align=left>總計</td>
<td></td>
<td></td>
<td id="td10"> </td>
</tr>
  </table>

<script type="text/javascript">
function cal(f){ 
	var i = document.forms[0];
	
  v1 = i.a1.value * f.s1.value
  v2 = i.a2.value * f.s2.value
  v3 = i.a3.value * f.s3.value
  v4 = i.a4.value * f.s4.value
  v5 = i.a5.value * f.s5.value
  v6 = i.a6.value * f.s6.value
  v7 = i.a7.value * f.s7.value
  v8 = i.a8.value * f.s8.value
  v9 = i.a9.value * f.s9.value
  
  document.getElementById("td1").innerHTML = v1
  document.getElementById("td2").innerHTML = v2
  document.getElementById("td3").innerHTML = v3
  document.getElementById("td4").innerHTML = v4
  document.getElementById("td5").innerHTML = v5
  document.getElementById("td6").innerHTML = v6
  document.getElementById("td7").innerHTML = v7
  document.getElementById("td8").innerHTML = v8
  document.getElementById("td9").innerHTML = v9
  document.getElementById("td10").innerHTML = v1+v2+v3+v4+v5+v6+v7+v8+v9
}
</script>
<!--
<form>
<table border=0 cellspacing=0>

<tr>
<th>已核定經費</th>
<th>比率</th>
<th>小計</th>
</tr>

<tr>
<td>100</td>
<td>
<select name="s1" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
<option value=0.9>90%</option>
<option value=0.8>80%</option>
<option value=0.7>70%</option>
<option value=0.6>60%</option>
<option value=0.5>50%</option>
<option value=0.4>40%</option>
</select>
</td>
<td id="td1"> </td>
</tr>

<tr>
<td>50</td>
<td>
<select name="s2" style="width:100px; border:1px solid red;" onchange="cal(this.form)">
<option value=0.9>90%</option>
<option value=0.8>80%</option>
<option value=0.7>70%</option>
<option value=0.6>60%</option>
<option value=0.5>50%</option>
<option value=0.4>40%</option>
</select>
</td>
<td id="td2"> </td>
</tr>
-->
<input type="submit" name="button" value="確認並列印各縣市經費分配表" />
</form>
<?
/*
$p1_1=($p1_1+$row[2])*$_post["a1_1"];
*/
?>
<!--
  <tr>
    <td width="187" height="46">補助項目總合</td>
    <td><div align="right"><? //echo $p1_1;?></div></td>
    <td><div align="right"><? //echo $p1_2;?></td>
    <td><div align="right"><? //echo $p2_1;?></td>
    <td><div align="right"><? //echo $p2_2;?></td>
    <td><div align="right"><? //echo $p2_3;?></td>
    <td><div align="right"><? //echo $p3_1;?></td>
    <td><div align="right"><? //echo $p3_2;?></td>
    <td><div align="right"><? //echo $p4_1;?></td>
    <td><div align="right"><? //echo $p4_2;?></td>
    <td><div align="right"><?// echo $p5;?></td>
    <td><div align="right"><? //echo $p6_1;?></td>
    <td><div align="right"><? //echo $p6_2;?></td>
    <td><div align="right"><? //echo $p7_1;?></td>
    <td><div align="right"><? //echo $p7_2;?></td>
    <td><div align="right"><? //echo $p7_3;?></td>
    <td><div align="right"><? //echo $p8_1;?></td>
    <td><div align="right"><? //echo $p8_2;?></td>
    <td><div align="right"><? //echo $p8_3;?></td>
    <td><div align="right"><? //echo $p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1+$p4_2+$p5+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;?></td>
  </tr>
 -->
<?
include "../../footer.php";
?>