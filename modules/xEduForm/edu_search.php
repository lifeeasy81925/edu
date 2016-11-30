<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='education_index.php'">
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$edu = $row[1];
	$eduman = $row[2];
	$examine = $row[3];
	$eduno = $row[4];
}
echo $username;
echo $edu;
echo $eduman;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
進階查詢<br />
<hr>
<div align="left" style="background-color:#FC9">※ 查詢縣市審核狀態名單 (以審核結果總表《表II-2、表II-3》上傳為依據)</div>
<Select id="nopost" name="nopost" Size=1>
	<option value="print_city_finish_1.php">已審核完成縣市名單</option>
	<option value="print_city_finish_2.php">未審核完成縣市名單</option>
</Select>
<input Type="Button" id="nopost" name="nopost" value="查詢"
OnClick="self.location.href=document.getElementById('nopost').value">
<hr>

<!--
<div align="left" style="background-color:#FC9">※ 符合各指標項目學校總數</div>
<?
  //指標一-1校數統計
	$sql_e_p1_1 = "select * from 100element_point  where point1_1 = '1'";//國小
	$result_e_p1_1 = $xoopsDB -> query($sql_e_p1_1);
	$e_p1_1 = $xoopsDB -> getRowsNum($result_e_p1_1);
	$sql_j_p1_1 = "select * from 100junior_point  where point1_1 = '1'";//國中
	$result_j_p1_1 = $xoopsDB -> query($sql_j_p1_1);
	$j_p1_1 = $xoopsDB -> getRowsNum($result_j_p1_1);
	$to_p1_1=$e_p1_1 + $j_p1_1;//合計
	
  //指標一-2校數統計
	$sql_e_p1_2 = "select * from 100element_point  where point1_2 = '1'";//國小
	$result_e_p1_2 = $xoopsDB -> query($sql_e_p1_2);
	$e_p1_2 = $xoopsDB -> getRowsNum($result_e_p1_2);
	$sql_j_p1_2 = "select * from 100junior_point  where point1_2 = '1'";//國中
	$result_j_p1_2 = $xoopsDB -> query($sql_j_p1_2);
	$j_p1_2 = $xoopsDB -> getRowsNum($result_j_p1_2);
	$to_p1_2=$e_p1_2 + $j_p1_2;//合計	
	
	//指標一-3校數統計
	$sql_e_p1_3 = "select * from 100element_point  where point1_3 = '1'";//國小
	$result_e_p1_3 = $xoopsDB -> query($sql_e_p1_3);
	$e_p1_3 = $xoopsDB -> getRowsNum($result_e_p1_3);
	$sql_j_p1_3 = "select * from 100junior_point  where point1_3 = '1'";//國中
	$result_j_p1_3 = $xoopsDB -> query($sql_j_p1_3);
	$j_p1_3 = $xoopsDB -> getRowsNum($result_j_p1_3);
	$to_p1_3=$e_p1_3 + $j_p1_3;//合計
	
	//指標一-4校數統計
	//mysql_num_rows(mysql_query("select * from _table where sec='girl' ")); 
	$sql_e_p1_4 = "select * from 100element_point  where point1_4 = '1'";//國小
	$result_e_p1_4 = $xoopsDB -> query($sql_e_p1_4);
	$e_p1_4 = $xoopsDB -> getRowsNum($result_e_p1_4);
	
	$sql_j_p1_4 = "select * from 100junior_point  where point1_4 = '1'";//國中
	$result_j_p1_4 = $xoopsDB -> query($sql_j_p1_4);
	$j_p1_4 = $xoopsDB -> getRowsNum($result_j_p1_4);
	$to_p1_4=$e_p1_4 + $j_p1_4;//合計
	
	//指標二-1校數統計
	$sql_e_p2_1 = "select * from 100element_point  where point2_1 = '1'";//國小
	$result_e_p2_1 = $xoopsDB -> query($sql_e_p2_1);
	$e_p2_1 = $xoopsDB -> getRowsNum($result_e_p2_1);
	$sql_j_p2_1 = "select * from 100junior_point  where point2_1 = '1'";//國中
	$result_j_p2_1 = $xoopsDB -> query($sql_j_p2_1);
	$j_p1_1 = $xoopsDB -> getRowsNum($result_j_p2_1);
	$to_p2_1=$e_p2_1 + $j_p2_1;//合計
	
	//指標二-2校數統計
	$sql_e_p2_2 = "select * from 100element_point  where point2_2 = '1'";//國小
	$result_e_p2_2 = $xoopsDB -> query($sql_e_p2_2);
	$e_p2_2 = $xoopsDB -> getRowsNum($result_e_p2_2);
	$sql_j_p2_2 = "select * from 100junior_point  where point2_2 = '1'";//國中
	$result_j_p2_2 = $xoopsDB -> query($sql_j_p2_2);
	$j_p2_2 = $xoopsDB -> getRowsNum($result_j_p2_2);
	$to_p2_2=$e_p2_2 + $j_p2_2;//合計
	
	//指標二-3校數統計
	$sql_e_p2_3 = "select * from 100element_point  where point2_3 = '1'";//國小
	$result_e_p2_3 = $xoopsDB -> query($sql_e_p2_3);
	$e_p2_3 = $xoopsDB -> getRowsNum($result_e_p2_3);
	$sql_j_p2_3 = "select * from 100junior_point  where point2_3 = '1'";//國中
	$result_j_p2_3 = $xoopsDB -> query($sql_j_p2_3);
	$j_p2_3 = $xoopsDB -> getRowsNum($result_j_p2_3);
	$to_p2_3=$e_p2_3 + $j_p2_3;//合計
	
	//指標三校數統計
	$sql_e_p3 = "select * from 100element_point  where point3 = '1'";//國小
	$result_e_p3 = $xoopsDB -> query($sql_e_p3);
	$e_p3 = $xoopsDB -> getRowsNum($result_e_p3);
	$sql_j_p3 = "select * from 100junior_point  where point3 = '1'";//國中
	$result_j_p3 = $xoopsDB -> query($sql_j_p3);
	$j_p3 = $xoopsDB -> getRowsNum($result_j_p3);
	$to_p3=$e_p3 + $j_p3;//合計
	
	//指標四校數統計
	$sql_e_p4 = "select * from 100element_point  where point4 = '1'";//國小
	$result_e_p4 = $xoopsDB -> query($sql_e_p4);
	$e_p4 = $xoopsDB -> getRowsNum($result_e_p4);
	$sql_j_p4 = "select * from 100junior_point  where point4 = '1'";//國中
	$result_j_p4 = $xoopsDB -> query($sql_j_p4);
	$j_p4 = $xoopsDB -> getRowsNum($result_j_p4);
	$to_p4=$e_p4 + $j_p4;//合計
	
	//指標五校數統計
	$sql_e_p5 = "select * from 100element_point  where point5 = '1'";//國小
	$result_e_p5 = $xoopsDB -> query($sql_e_p5);
	$e_p5 = $xoopsDB -> getRowsNum($result_e_p5);
	$sql_j_p5 = "select * from 100junior_point  where point5 = '1'";//國中
	$result_j_p5 = $xoopsDB -> query($sql_j_p5);
	$j_p5 = $xoopsDB -> getRowsNum($result_j_p5);
	$to_p5=$e_p5 + $j_p5;//合計
	
	//指標六校數統計
	$sql_e_p6 = "select * from 100element_point  where point6 = '1'";//國小
	$result_e_p6 = $xoopsDB -> query($sql_e_p6);
	$e_p6 = $xoopsDB -> getRowsNum($result_e_p6);
	$sql_j_p6 = "select * from 100junior_point  where point6 = '1'";//國中
	$result_j_p6 = $xoopsDB -> query($sql_j_p6);
	$j_p6 = $xoopsDB -> getRowsNum($result_j_p6);
	$to_p6=$e_p6 + $j_p6;//合計
	
	//計算總申請校數
	$sql_e_all = "select allstudent from 100element_basedata  where allstudent > '1'";//國小
	$result_e_all = $xoopsDB -> query($sql_e_all);
	$e_all = $xoopsDB -> getRowsNum($result_e_all);
	$sql_j_all = "select allstudent from 100junior_basedata  where allstudent > '1'";//國中
	$result_j_all = $xoopsDB -> query($sql_j_all);
	$j_all = $xoopsDB -> getRowsNum($result_j_all);
	$to_all=$e_all + $j_all;//合計
?>
<Select id="exam_1" name="exam_1" Size=1>
	<Option>看詳細學校名單
		<option value="print_point11_table.php?id=1">符合指標一-1項目學校之詳細名單</option>
		<option value="print_point12_table.php?id=1">符合指標一-2項目學校之詳細名單</option>
		<option value="print_point13_table.php?id=1">符合指標一-3項目學校之詳細名單</option>
		<option value="print_point14_table.php?id=1">符合指標一-4項目學校之詳細名單</option>
		<option value="print_point21_table.php?id=1">符合指標二-1項目學校之詳細名單</option>
		<option value="print_point22_table.php?id=1">符合指標二-2項目學校之詳細名單</option>
		<option value="print_point23_table.php?id=1">符合指標二-3項目學校之詳細名單</option>
		<option value="print_point3_table.php?id=1">符合指標三項目學校之詳細名單</option>
		<option value="print_point4_table.php?id=1">符合指標四項目學校之詳細名單</option>
		<option value="print_point5_table.php?id=1">符合指標五項目學校之詳細名單</option>
		<option value="print_point6_table.php?id=1">符合指標六項目學校之詳細名單</option>
</Select>
<input Type="Button" id="exam_1" name="exam_1" value="查詢"
OnClick="window.open(document.getElementById('exam_1').value)">
<table width="460" border="1">
  <tr>
    <td style="width: 299px">
	    符合指標一-1之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p1_1; ?></font>校,</td>
    <td style="width: 303px"><span style="width: 299px">符合指標一-2之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p1_2; ?></font>校,</span>
	    </td>
  </tr>
  <tr>
    <td style="width: 299px">符合指標一-3之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p1_3; ?></font>校,</td>
    <td style="width: 303px"><span style="width: 299px">符合指標一-4之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p1_4; ?></font>校,</span></td>
  </tr>
  <tr>
    <td style="width: 299px">符合指標二-1之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p2_1; ?></font>校,</td>
    <td style="width: 303px"><span style="width: 299px">符合指標二-2之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p2_2; ?></font>校,</span></td>
  </tr>
  <tr>
    <td style="width: 299px">符合指標二-3之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p2_3; ?></font>校,</td>
    <td style="width: 303px"><span style="width: 299px">符合指標三之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p3; ?></font>校,</span></td>
  </tr>
  <tr>
    <td style="width: 299px">符合指標四之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p4; ?></font>校,</td>
    <td style="width: 303px"><span style="width: 299px">符合指標五之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p5; ?></font>校,</span></td>
  </tr>
  <tr>
    <td style="width: 299px">符合指標六之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_p6; ?></font>校,</td>
    <td style="width: 303px">&nbsp; </td>
  </tr>
</table>
<hr>
<div align="left" style="background-color:#FC9">※ 不符合各指標項目學校總數</div>
<?
	$nto_p1_1 = $to_all - $to_p1_1;
	$nto_p1_2 = $to_all - $to_p1_2;
	$nto_p1_3 = $to_all - $to_p1_3;
	$nto_p1_4 = $to_all - $to_p1_4;
	$nto_p2_1 = $to_all - $to_p2_1;
	$nto_p2_2 = $to_all - $to_p2_2;
	$nto_p2_3 = $to_all - $to_p2_3;
	$nto_p3 = $to_all - $to_p3;
	$nto_p4 = $to_all - $to_p4;
	$nto_p5 = $to_all - $to_p5;
	$nto_p6 = $to_all - $to_p6;
?>

<Select id="exam_2" name="exam_2" Size=1>
	<Option>看詳細學校名單
		<option value="print_point11_table.php?id=0">不符合指標一-1項目學校之詳細名單</option>
		<option value="print_point12_table.php?id=0">不符合指標一-2項目學校之詳細名單</option>
		<option value="print_point13_table.php?id=0">不符合指標一-3項目學校之詳細名單</option>
		<option value="print_point14_table.php?id=0">不符合指標一-4項目學校之詳細名單</option>
		<option value="print_point21_table.php?id=0">不符合指標二-1項目學校之詳細名單</option>
		<option value="print_point22_table.php?id=0">不符合指標二-2項目學校之詳細名單</option>
		<option value="print_point23_table.php?id=0">不符合指標二-3項目學校之詳細名單</option>
		<option value="print_point3_table.php?id=0">不符合指標三項目學校之詳細名單</option>
		<option value="print_point4_table.php?id=0">不符合指標四項目學校之詳細名單</option>
		<option value="print_point5_table.php?id=0">不符合指標五項目學校之詳細名單</option>
		<option value="print_point6_table.php?id=0">不符合指標六項目學校之詳細名單</option>
</Select>
<input Type="Button" id="exam_2" name="exam_2" value="查詢"
OnClick="window.open(document.getElementById('exam_2').value)">
<table width="632" border="1">
  <tr>
    <td width="307"><span style="width: 267px">不符合指標一-1之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p1_1; ?></font>校,</span></td>
    <td width="309"><span style="width: 225px"><span style="width: 267px">不符合指標一-2之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p1_2; ?></font>校,</span></span></td>
  </tr>
  <tr>
    <td><span style="width: 267px">不符合指標一-3之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p1_3; ?></font>校,</span></td>
    <td><span style="width: 267px">不符合指標一-4之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p1_4; ?></font>校,</span></td>
  </tr>
  <tr>
    <td><span style="width: 267px">不符合指標二-1之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p2_1; ?></font>校,</span></td>
    <td><span style="width: 267px">不符合指標二-2之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p2_2; ?></font>校,</span></td>
  </tr>
  <tr>
    <td><span style="width: 267px">不符合指標二-3之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p2_3; ?></font>校,</span></td>
    <td><span style="width: 267px">不符合指標三之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p3; ?></font>校,</span></td>
  </tr>
  <tr>
    <td><span style="width: 267px">不符合指標四之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p4; ?></font>校,</span></td>
    <td><span style="width: 267px">不符合指標五之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p5; ?></font>校,</span></td>
  </tr>
  <tr>
    <td><span style="width: 267px">不符合指標六之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $nto_p6; ?></font>校,</span></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="630" border="1">
</table>
<hr>
<div align="left" style="background-color:#FC9">※ 符合申請條件但未申請經費補助學校名單</div>
 <?
      //符合申請項目一校數統計
	$sql_e_a_1 = "select * from 100element_money  where pointer1='1' and a1_1='0' and a1_2='0';";//國小資料
	$result_e_a_1 = $xoopsDB -> query($sql_e_a_1);
	$e_a_1 = $xoopsDB -> getRowsNum($result_e_a_1);
	$sql_j_a_1 = "select * from 100junior_money  where pointer1='1' and a1_1='0' and a1_2='0';";//國中資料
	$result_j_a_1 = $xoopsDB -> query($sql_j_a_1);
	$j_a_1 = $xoopsDB -> getRowsNum($result_j_a_1);
	$to_a1=$e_a_1 + $j_a_1;//合計
	//echo $e_a_1; 
	//echo "<br>";
	//echo $j_a_1;
	
	  //符合申請項目二校數統計
	$sql_e_a_2 = "select * from 100element_money  where pointer2='1' and a2_1='0' and a2_2='0' and a2_3='0';";//國小資料
	$result_e_a_2 = $xoopsDB -> query($sql_e_a_2);
	$e_a_2 = $xoopsDB -> getRowsNum($result_e_a_2);
	$sql_j_a_2 = "select * from 100junior_money  where pointer2='1' and a2_1='0' and a2_2='0' and a2_3='0';";//國中資料
	$result_j_a_2 = $xoopsDB -> query($sql_j_a_2);
	$j_a_2 = $xoopsDB -> getRowsNum($result_j_a_2);
	$to_a2=$e_a_2 + $j_a_2;//合計
	
	  //符合申請項目三校數統計
	$sql_e_a_3 = "select * from 100element_money  where pointer3='1' and a3_1='0' and a3_2='0';";//國小資料
	$result_e_a_3 = $xoopsDB -> query($sql_e_a_3);
	$e_a_3 = $xoopsDB -> getRowsNum($result_e_a_3);
	$sql_j_a_3 = "select * from 100junior_money  where pointer3='1' and a3_1='0' and a3_2='0';";//國中資料
	$result_j_a_3 = $xoopsDB -> query($sql_j_a_3);
	$j_a_3 = $xoopsDB -> getRowsNum($result_j_a_3);
	$to_a3=$e_a_3 + $j_a_3;//合計
	
	  //符合申請項目四校數統計
	$sql_e_a_4 = "select * from 100element_money  where pointer4='1' and a4_1='0' and a4_2='0';";//國小資料
	$result_e_a_4 = $xoopsDB -> query($sql_e_a_4);
	$e_a_4 = $xoopsDB -> getRowsNum($result_e_a_4);
	$sql_j_a_4 = "select * from 100junior_money  where pointer4='1' and a4_1='0' and a4_2='0';";//國中資料
	$result_j_a_4 = $xoopsDB -> query($sql_j_a_4);
	$j_a_4 = $xoopsDB -> getRowsNum($result_j_a_4);
	$to_a4=$e_a_4 + $j_a_4;//合計
	
	  //符合申請項目五校數統計
	$sql_e_a_5 = "select * from 100element_money  where pointer5='1' and a5='0';";//國小資料
	$result_e_a_5 = $xoopsDB -> query($sql_e_a_5);
	$e_a_5 = $xoopsDB -> getRowsNum($result_e_a_5);
	$sql_j_a_5 = "select * from 100junior_money  where pointer5='1' and a5='0';";//國中資料
	$result_j_a_5 = $xoopsDB -> query($sql_j_a_5);
	$j_a_5 = $xoopsDB -> getRowsNum($result_j_a_5);
	$to_a5=$e_a_5 + $j_a_5;//合計
	
	  //符合申請項目六校數統計
	$sql_e_a_6 = "select * from 100element_money  where pointer6='1' and a6_1='0' and a6_2='0';";//國小資料
	$result_e_a_6 = $xoopsDB -> query($sql_e_a_6);
	$e_a_6 = $xoopsDB -> getRowsNum($result_e_a_6);
	$sql_j_a_6 = "select * from 100junior_money  where pointer6='1' and a6_1='0' and a6_2='0';";//國中資料
	$result_j_a_6 = $xoopsDB -> query($sql_j_a_6);
	$j_a_6 = $xoopsDB -> getRowsNum($result_j_a_6);
	$to_a6=$e_a_6 + $j_a_6;//合計
	
	  //符合申請項目七校數統計
	$sql_e_a_7 = "select * from 100element_money  where pointer7='1' and a7_1='0' and a7_2='0' and a7_3='0';";//國小資料
	$result_e_a_7 = $xoopsDB -> query($sql_e_a_7);
	$e_a_7 = $xoopsDB -> getRowsNum($result_e_a_7);
	$sql_j_a_7 = "select * from 100junior_money  where pointer7='1' and a7_1='0' and a7_2='0' and a7_3='0';";//國中資料
	$result_j_a_7 = $xoopsDB -> query($sql_j_a_7);
	$j_a_7 = $xoopsDB -> getRowsNum($result_j_a_7);
	$to_a7=$e_a_7 + $j_a_7;//合計
	
	  //符合申請項目八校數統計
	$sql_e_a_8 = "select * from 100element_money  where pointer8='1' and a8_1='0' and a8_2='0' and a8_3='0';";//國小資料
	$result_e_a_8 = $xoopsDB -> query($sql_e_a_8);
	$e_a_8 = $xoopsDB -> getRowsNum($result_e_a_8);
	$sql_j_a_8 = "select * from 100junior_money  where pointer8='1' and a8_1='0' and a8_2='0' and a8_3='0';";//國中資料
	$result_j_a_8 = $xoopsDB -> query($sql_j_a_8);
	$j_a_8 = $xoopsDB -> getRowsNum($result_j_a_8);
	$to_a8=$e_a_8 + $j_a_8;//合計
	
?>
<Select id="exam_3" name="exam_3" Size=1>
	<Option>看詳細學校名單
		<option value="print_a1_table.php">符合補助項目一但未申請之學校詳細名單</option>
		<option value="print_a2_table.php">符合補助項目二但未申請之學校詳細名單</option>
		<option value="print_a3_table.php">符合補助項目三但未申請之學校詳細名單</option>
		<option value="print_a4_table.php">符合補助項目四但未申請之學校詳細名單</option>
		<option value="print_a5_table.php">符合補助項目五但未申請之學校詳細名單</option>
		<option value="print_a6_table.php">符合補助項目六但未申請之學校詳細名單</option>
		<option value="print_a7_table.php">符合補助項目七但未申請之學校詳細名單</option>
		<option value="print_a8_table.php">符合補助項目八但未申請之學校詳細名單</option>
</Select>
<input Type="Button" id="exam_3" name="exam_3" value="查詢"
OnClick="window.open(document.getElementById('exam_3').value)">
<table width="731" border="1">
  <tr>
    <td width="343"><span style="width: 358px">符合補助項目一但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a1; ?></font>校,</span></td>
    <td width="372"><span style="width: 225px"><span style="width: 358px">符合補助項目二但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a2; ?></font>校,</span></span></td>
  </tr>
  <tr>
    <td><span style="width: 358px">符合補助項目三但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a3; ?></font>校,</span></td>
    <td><span style="width: 358px">符合補助項目四但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a4; ?></font>校,</span></td>
  </tr>
  <tr>
    <td><span style="width: 358px">符合補助項目五但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a5; ?></font>校,</span></td>
    <td><span style="width: 358px">符合補助項目六但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a6; ?></font>校,</span></td>
  </tr>
  <tr>
    <td><span style="width: 358px">符合補助項目七但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a7; ?></font>校,</span></td>
    <td><span style="width: 358px">符合補助項目八但未申請之校數,有<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $to_a8; ?></font>校,</span></td>
  </tr>
</table>
<table width="730" border="1">
</table>


<hr>

<div align="left" style="background-color:#FC9">※ 依縣市查詢教育部核定學校補助情形</div>
	<Select id="cityname" name="cityname" Size=1>
		<option value="print_education_examine.php?id=臺北市">臺北市</option>
		<option value="print_education_examine.php?id=新北市">新北市</option>
		<option value="print_education_examine.php?id=桃園縣">桃園縣</option>
		<option value="print_education_examine.php?id=新竹縣">新竹縣</option>
		<option value="print_education_examine.php?id=新竹市">新竹市</option>
		<option value="print_education_examine.php?id=苗栗縣">苗栗縣</option>
		<option value="print_education_examine.php?id=臺中市">臺中市</option>
		<option value="print_education_examine.php?id=彰化縣">彰化縣</option>
		<option value="print_education_examine.php?id=南投縣">南投縣</option>
		<option value="print_education_examine.php?id=雲林縣">雲林縣</option>
		<option value="print_education_examine.php?id=嘉義縣">嘉義縣</option>
		<option value="print_education_examine.php?id=嘉義市">嘉義市</option>
		<option value="print_education_examine.php?id=臺南市">臺南市</option>
		<option value="print_education_examine.php?id=高雄市">高雄市</option>
		<option value="print_education_examine.php?id=屏東縣">屏東縣</option>
		<option value="print_education_examine.php?id=臺東縣">臺東縣</option>
		<option value="print_education_examine.php?id=花蓮縣">花蓮縣</option>
		<option value="print_education_examine.php?id=宜蘭縣">宜蘭縣</option>
		<option value="print_education_examine.php?id=基隆市">基隆市</option>
		<option value="print_education_examine.php?id=澎湖縣">澎湖縣</option>
		<option value="print_education_examine.php?id=金門縣">金門縣</option>
		<option value="print_education_examine.php?id=連江縣">連江縣</option>
</Select>
<input Type="Button" id="cityname" name="cityname" value="查詢"
OnClick="window.open(document.getElementById('cityname').value)">
<hr>
-->

<p>  
<?php
include "../../footer.php";
?>