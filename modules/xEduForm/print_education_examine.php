<?php
include "../../mainfile.php";
include "../../header.php";
//include "./connect_link.php";
//$cityname = $_post['id'];
$cityname = $_GET["id"];
echo $cityname;
echo "<p>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<?
/*
//學校名稱
 if($class == '1' ){
			$basedata="100element_basedata";
	}
	else{
			$basedata="100junior_basedata";
		}
		
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))
        {
                 $school = $row[1];//學校名稱
        }
*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="1200" border="1">
  <tr>
    <td width="99" rowspan="3"><div align="center">學校名稱</div></td>
    <td colspan="2"> 1.推展親職教育活動 </td>
    <td colspan="3"> 2.原住民及離島地區學校辦理學習輔導 </td>
    <td width="70" colspan="2"> 3.補助學校發展教育特色 </td>
    <td colspan="2"> 4.修繕離島或偏遠地區師生宿舍 </td>
    <td width="61" rowspan="3"> 5.充實學校基本教學設備 </td>
    <td width="60" colspan="2"> 6.發展原住民教育文化特色及充實設備器材 </td>
    <td colspan="3"> 7.補助交通不便學校交通車 </td>
    <td colspan="3"> 8.整修學校社區化活動場所 </td>
    <td width="79"><div align="center">各校總合</div></td>
  </tr>
  <tr>
    <td width="58" rowspan="2"> 親職教育活動 </td>
    <td width="65" rowspan="2"> 目標學生家庭訪視輔導 </td>
    <td width="65" rowspan="2"> 課後學習輔導 </td>
    <td width="51" rowspan="2"> 寒暑假學習輔導 </td>
    <td width="53" rowspan="2"> 住校生夜間學校輔導 </td>
    <td colspan="2"> 設備、其他經費 </td>
    <td height="65" colspan="2"> 教師、學生宿舍 </td>
    <td colspan="2"> 設備器材其他經費 </td>
    <td width="59" rowspan="2"> 租車費 </td>
    <td width="54" rowspan="2"> 交通費 </td>
    <td width="48" rowspan="2"> 購交通車費 </td>
    <td width="49" rowspan="2"> 綜合球場 </td>
    <td width="47" rowspan="2"> 小型集會風雨教室 </td>
    <td width="48" rowspan="2"> 運動場 </td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td style="height: 41px"> 經常門</td>
    <td style="height: 41px"> 資本門</td>
    <td width="61" style="height: 41px"> <div align="center">修繕 </div></td>
    <td width="61" style="height: 41px"> <div align="center">充實設備 </div></td>
    <td style="height: 41px"> 經常門</td>
    <td style="height: 41px"> 資本門</td>
  </tr>
  <?
  //補助金額-國小			
	$sql_element = "select  *  from 100element_examine_education where school like '%$cityname%';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element))
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
				 $a5=$row[9];
				 $a6_1=$row[28];
				 $a6_2=$row[29];
				 $a7_1=$row[11];
				 $a7_2=$row[12];
				 $a7_3=$row[13];
				 $a8_1=$row[14];
				 $a8_2=$row[15];
 				 $a8_3=$row[16];
				 $shool = $row[17];
				 $total = $a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_1+$a4_2+$a5+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3;

				 
				echo "<tr width='187' height='46'>";
				 		echo "<td>";
				echo "$row[17]";//學校名稱
						echo "</td>";
				 		echo "<td>"."<div align='right'>";
				echo "$row[1]";//a1_1
						echo "</td>";
						
						echo "<td>"."<div align='right'>";
				echo "$row[2]";//a1_2
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[3]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[4]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[5]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[26]";
						echo "</td>";
						echo "<td>"."<div align='right'>";
				echo "$row[27]";
						echo "</td>";			
						
						echo "<td>"."<div align='right'>";
				echo "$row[7]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[8]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[9]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[28]";
						echo "</td>";
						echo "<td>"."<div align='right'>";
				echo "$row[29]";
						echo "</td>";			
						
						echo "<td>"."<div align='right'>";
				echo "$row[11]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[12]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[13]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[14]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[15]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[16]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[1]"+"$row[2]"+"$row[3]"+"$row[4]"+"$row[5]"+"$row[26]"+"$row[27]"+"$row[7]"+"$row[8]"+"$row[9]"+"$row[28]"+"$row[29]"+"$row[11]"+"$row[12]"+"$row[13]"+"$row[14]"+"$row[15]"+"$row[16]"+"$row[18]"+"$row[19]";
						echo "</td>";
						
				 $p1_1=$p1_1+$row[1];
				 $p1_2=$p1_2+$row[2];
				 $p2_1=$p2_1+$row[3];
				 $p2_2=$p2_2+$row[4];
				 $p2_3=$p2_3+$row[5];
				 $p3_1=$p3_1+$row[26];
				 $p3_2=$p3_2+$row[27];
				 $p4_1=$p4_1+$row[7];
				 $p4_2=$p4_2+$row[8];
				 $p5=$p5+$row[9];
				 $p6_1=$p6_1+$row[28];
				 $p6_2=$p6_2+$row[29];
				 $p7_1=$p7_1+$row[11];
				 $p7_2=$p7_2+$row[12];
				 $p7_3=$p7_3+$row[13];
				 $p8_1=$p8_1+$row[14];
				 $p8_2=$p8_2+$row[15];
 				 $p8_3=$p8_3+$row[16];
				}
  ?>
    <?
  //補助金額-國中			
	$sql_junior = "select  *  from 100junior_examine_education where school like '%$cityname%';";
	$result_junior = mysql_query($sql_junior);
	while($row = mysql_fetch_row($result_junior))
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
				 $a5=$row[9];
				 $a6_1=$row[28];
				 $a6_2=$row[29];
				 $a7_1=$row[11];
				 $a7_2=$row[12];
				 $a7_3=$row[13];
				 $a8_1=$row[14];
				 $a8_2=$row[15];
 				 $a8_3=$row[16];
				 $shool = $row[17];
				 $total = $a1_1+$a1_2+$a2_1+$a2_2+$a2_3+$a3_1+$a3_2+$a4_1+$a4_2+$a5+$a6_1+$a6_2+$a7_1+$a7_2+$a7_3+$a8_1+$a8_2+$a8_3;
				 
				echo "<tr width='187' height='46'>";
				 		echo "<td>";
				echo "$row[17]";//學校名稱
						echo "</td>";
				 		echo "<td>"."<div align='right'>";
				echo "$row[1]";//a1_1
						echo "</td>";
						
						echo "<td>"."<div align='right'>";
				echo "$row[2]";//a1_2
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[3]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[4]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[5]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[26]";
						echo "</td>";
						echo "<td>"."<div align='right'>";
				echo "$row[27]";
						echo "</td>";			
						
						echo "<td>"."<div align='right'>";
				echo "$row[7]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[8]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[9]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[28]";
						echo "</td>";
						echo "<td>"."<div align='right'>";
				echo "$row[29]";
						echo "</td>";			
						
						echo "<td>"."<div align='right'>";
				echo "$row[11]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[12]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[13]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[14]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[15]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[16]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[1]"+"$row[2]"+"$row[3]"+"$row[4]"+"$row[5]"+"$row[26]"+"$row[27]"+"$row[7]"+"$row[8]"+"$row[9]"+"$row[28]"+"$row[29]"+"$row[11]"+"$row[12]"+"$row[13]"+"$row[14]"+			"$row[15]"+"$row[16]";
						echo "</td>";

				 $p1_1=$p1_1+$row[1];
				 $p1_2=$p1_2+$row[2];
				 $p2_1=$p2_1+$row[3];
				 $p2_2=$p2_2+$row[4];
				 $p2_3=$p2_3+$row[5];
				 $p3_1=$p3_1+$row[26];
				 $p3_2=$p3_2+$row[27];
				 $p4_1=$p4_1+$row[7];
				 $p4_2=$p4_2+$row[8];
				 $p5=$p5+$row[9];
				 $p6_1=$p6_1+$row[28];
				 $p6_2=$p6_2+$row[29];
				 $p7_1=$p7_1+$row[11];
				 $p7_2=$p7_2+$row[12];
				 $p7_3=$p7_3+$row[13];
				 $p8_1=$p8_1+$row[14];
				 $p8_2=$p8_2+$row[15];
 				 $p8_3=$p8_3+$row[16];						
				}
				$total = $p1_1+$p1_2+$p1_3+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1+$p4_2+$p5+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;
  ?>
  <tr>
    <td width="99" height="46">補助項目總合</td>
    <td><div align="right"><? echo $p1_1;?></div></td>
    <td><div align="right"><? echo $p1_2;?></div></td>
    <td><div align="right"><? echo $p2_1;?></div></td>
    <td><div align="right"><? echo $p2_2;?></div></td>
    <td><div align="right"><? echo $p2_3;?></div></td>
    <td><div align="right"><? echo $p3_1;?></div></td>
    <td><div align="right"><? echo $p3_2;?></div></td>
    <td><div align="right"><? echo $p4_1;?></div></td>
    <td><div align="right"><? echo $p4_2;?></div></td>
    <td><div align="right"><? echo $p5;?></div></td>
    <td><div align="right"><? echo $p6_1;?></div></td>
    <td><div align="right"><? echo $p6_2;?></div></td>
    <td><div align="right"><? echo $p7_1;?></div></td>
    <td><div align="right"><? echo $p7_2;?></div></td>
    <td><div align="right"><? echo $p7_3;?></div></td>
    <td><div align="right"><? echo $p8_1;?></div></td>
    <td><div align="right"><? echo $p8_2;?></div></td>
    <td><div align="right"><? echo $p8_3;?></div></td>
    <td><div align="right"><? echo $total;?></div></td>
  </tr>
  	<? 		
	//	$sql = "update 100education_money set a1_1 ='$p1_1',a1_2 ='$p1_2',a2_1='$p2_1',a2_2='$p2_2',a2_3='$p2_3',a3_1 ='$p3_1',a3_2 ='$p3_2',a4_1='$p4_1',a4_2='$p4_2',a5 ='$p5',a6_1 ='$p6_1',a6_2 ='$p6_2',a7_1 ='$p7_1',a7_2 ='$p7_2',a7_3='$p7_3',a8_1 ='$p8_1',a8_2 ='$p8_3',a8_3 ='$p8_3' ,total = '$total' where id = '07'";
	//	mysql_query($sql);
	?>  
</table>
<!--SCRIPT 開始--> <!--webbot bot="HTMLMarkup" StartSpan --> 
<SCRIPT Language="Javascript"> 
/* 
This script is written by Eric (Webcrawl@usa.net) 
For full source code, installation instructions, 
100's more DHTML scripts, and Terms Of 
Use, visit dynamicdrive.com 
*/ 

function printit(){ 
if (NS) { 
window.print() ; 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 
</script> 
<SCRIPT Language="Javascript"> 
var NS = (navigator.appName == "Netscape"); 
var VERSION = parseInt(navigator.appVersion); 
if (VERSION > 3) { 
document.write('<form><input type=button value="列印本頁" name="Print" onClick="printit()"></form>'); 
} 
</script> 
<!--webbot BOT="HTMLMarkup" endspan --> <!--SCRIPT結束-->