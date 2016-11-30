<?php
include "../../mainfile.php";
include "../../header.php";
include "../xSchoolForm/button_print02.php";
$allowance = $_GET["id"];

$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result)) {
	$cityid= $row[0];//ID
	$city = $row[1];//縣市名稱
	$cityman = $row[2];//身分名稱
	$cityno = $row[4];//縣市編號
}
?>
<input type="button" value="關閉本頁" onClick="window.close()">
<div id="print_content">
<?
//echo $allowance;
switch ($allowance)
{
	case "1":
?>
複審結果列表：補助項目一【推展親職教育活動】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="36" rowspan="2" align="center">序號</td>
    <td width="65" rowspan="2" align="center">學校編號</td>
    <td width="120" rowspan="2" align="center">學校名稱</td>
    <td colspan="3" align="center" bgcolor="#66FF99">縣市初審結果</td>
    <td colspan="3" align="center" bgcolor="#FFCC66">複審與初審差額</td>
    <td colspan="4" align="center" bgcolor="#FF9933">複審結果</td>
</tr>
<tr>
    <td bgcolor="#66FF99">親職教育活動 </td>
    <td bgcolor="#66FF99">家庭訪視輔導</td>
    <td align="center" bgcolor="#66FF99">合計</td>
    <td bgcolor="#FFCC66">親職教育活動</td>
    <td bgcolor="#FFCC66">家庭訪視輔導</td>
    <td align="center" bgcolor="#FFCC66">合計</td>
    <td bgcolor="#FF9933">親職教育活動</td>
    <td bgcolor="#FF9933">家庭訪視輔導</td>
    <td align="center" bgcolor="#FF9933">合計</td>
    <td align="center" bgcolor="#FF9933">複審意見</td>
</tr>
<?
$serial = 0;
$sql = "select  *  from 102schooldata where cityname = '$city' order by 102schooldata.account;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
	$school_no = $row_all[0];
	$school_name = $row_all[2].$row_all[4].$row_all[5];
	//載入審核資訊
	$sql_element = "select  *  from 102allowance1 where account like '$school_no';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element)){
		$city1 = $row[135];		//縣市審核金額一
		$city2 = $row[138];		//縣市審核金額二
		$city3 = $row[131];		//縣市審核意見
		$total_city = $row[132];
		$city_status = $row[130];	//縣市審核狀態
		$edu1 = $row[195];
		$edu2 = $row[198];
		$edu3 = $row[191];
		$total_edu = $row[192];
		$change1 = $edu1 - $city1;	//差額一
		$change2 = $edu2 - $city2;	//差額二
		$total_change = $total_edu - $total_city;
		if ($total_city > 0 && $city_status == '1'){
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $serial;
			echo "</td>";
			echo "<td align='center'>";
			echo $school_no;
			echo "</td>";
			echo "<td>";
			echo $school_name;
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city2);
			echo "</td>";
			echo "<td align='right' bgcolor='#66FF99'>";
			echo number_format($total_city);
			echo "</td>";
			echo "<td align='right'>";
			if($change1 > 0){
				echo '<font color=red>'.number_format($change1).'</font>';
			}else{
				echo number_format($change1);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change2 > 0){
				echo '<font color=red>'.number_format($change2).'</font>';
			}else{
				echo number_format($change2);
			}
			echo "</td>";
			echo "<td align='right' bgcolor='#FFCC66'>";
			if($total_change > 0){
				echo '<font color=red>'.number_format($total_change).'</font>';
			}else{
				echo number_format($total_change);
			}
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu2);
			echo "</td>";
			echo "<td align='right' bgcolor='#FF9933'>";
			echo number_format($total_edu);
			echo "</td>";
			echo "<td>";
			if($edu3 == "") {echo "　";} else {echo $edu3;}
			echo "</td>";
			$p_city1 = $p_city1 + $city1;
			$p_city2 = $p_city2 + $city2;
			$p_total_city = $p_total_city + $total_city;
			$p_edu1 = $p_edu1 + $edu1;
			$p_edu2 = $p_edu2 + $edu2;
			$p_total_edu = $p_total_edu + $total_edu;
			$p_change1 = $p_change1 + $change1;
			$p_change2 = $p_change2 + $change2;
			$p_total_change = $p_total_change + $total_change;
		}
	}
}
?>
<tr>
	<td colspan="2" align="center">合計</td>
	<td align="center"><? echo $serial; ?>校</td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city1); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city2); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_total_city); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change1); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change2); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_total_change); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu1); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu2); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_total_edu); ?></td>
	<td bgcolor="#FF9933">&nbsp;</td>
</tr>
</table>
<?
		break;
	case "2":
?>
複審結果列表：補助項目二【補助學校發展教育特色】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="36" rowspan="2" align="center">序號</td>
    <td width="65" rowspan="2" align="center">學校編號</td>
    <td width="120" rowspan="2" align="center">學校名稱</td>
    <td colspan="3" align="center" bgcolor="#66FF99">縣市初審結果</td>
    <td colspan="3" align="center" bgcolor="#FFCC66">複審與初審差額</td>
    <td colspan="4" align="center" bgcolor="#FF9933">複審結果</td>
</tr>
<tr>
    <td bgcolor="#66FF99">經常門 </td>
    <td bgcolor="#66FF99">資本門</td>
    <td align="center" bgcolor="#66FF99">合計</td>
    <td bgcolor="#FFCC66">經常門</td>
    <td bgcolor="#FFCC66">資本門</td>
    <td align="center" bgcolor="#FFCC66">合計</td>
    <td bgcolor="#FF9933">經常門</td>
    <td bgcolor="#FF9933">資本門</td>
    <td align="center" bgcolor="#FF9933">合計</td>
    <td align="center" bgcolor="#FF9933">複審意見</td>
</tr>
<?
$serial = 0;
$sql = "select  *  from 102schooldata where cityname = '$city' order by 102schooldata.account;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
	$school_no = $row_all[0];
	$school_name = $row_all[2].$row_all[4].$row_all[5];
	//載入審核資訊
	$sql_element = "select  *  from 102allowance2 where account like '$school_no';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element)){
		$cityT1 = $row[136];	//縣市審核特色一經常門
		$cityT2 = $row[137];	//縣市審核特色一資本門
		$cityT3 = $row[139];	//縣市審核特色二經常門
		$cityT4 = $row[140];	//縣市審核特色二資本門
		$city3 = $row[131];		//縣市審核意見
		$city1 = $row[133];		//縣市審核經常門
		$city2 = $row[134];		//縣市審核資本門
		$total_city = $row[132];
		$city_status = $row[130];	//縣市審核狀態
		$eduT1 = $row[196];	//教育部審核特色一經常門
		$eduT2 = $row[197];	//教育部審核特色一資本門
		$eduT3 = $row[199];	//教育部審核特色二經常門
		$eduT4 = $row[200];	//教育部審核特色二資本門
		$edu3 = $row[191];	//教育部審核意見
		$edu1 = $row[193]; //教育部審核經常門
		$edu2 = $row[194]; //教育部審核資本門
		$total_edu = $row[192];
		$change1 = $edu1 - $city1;	//差額一
		$change2 = $edu2 - $city2;	//差額二
		$total_change = $total_edu - $total_city;
		if ($total_city > 0 && $city_status == '1'){
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $serial;
			echo "</td>";
			echo "<td align='center'>";
			echo $school_no;
			echo "</td>";
			echo "<td>";
			echo $school_name;
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city2);
			echo "</td>";
			echo "<td align='right' bgcolor='#66FF99'>";
			echo number_format($total_city);
			echo "</td>";
			echo "<td align='right'>";
			if($change1 > 0){
				echo '<font color=red>'.number_format($change1).'</font>';
			}else{
				echo number_format($change1);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change2 > 0){
				echo '<font color=red>'.number_format($change2).'</font>';
			}else{
				echo number_format($change2);
			}
			echo "</td>";
			echo "<td align='right' bgcolor='#FFCC66'>";
			if($total_change > 0){
				echo '<font color=red>'.number_format($total_change).'</font>';
			}else{
				echo number_format($total_change);
			}
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu2);
			echo "</td>";
			echo "<td align='right' bgcolor='#FF9933'>";
			echo number_format($total_edu);
			echo "</td>";
			echo "<td>";
			if($edu3 == "") {echo "　";} else {echo $edu3;}
			echo "</td>";
			$p_city1 = $p_city1 + $city1;
			$p_city2 = $p_city2 + $city2;
			$p_total_city = $p_total_city + $total_city;
			$p_edu1 = $p_edu1 + $edu1;
			$p_edu2 = $p_edu2 + $edu2;
			$p_total_edu = $p_total_edu + $total_edu;
			$p_change1 = $p_change1 + $change1;
			$p_change2 = $p_change2 + $change2;
			$p_total_change = $p_total_change + $total_change;
		}
	}
}
?>
<tr>
	<td colspan="2" align="center">合計</td>
	<td align="center"><? echo $serial; ?>校</td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city1); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city2); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_total_city); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change1); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change2); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_total_change); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu1); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu2); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_total_edu); ?></td>
	<td bgcolor="#FF9933">&nbsp;</td>
</tr>
</table>
<?
		break;
	case "3":
?>
複審結果列表：補助項目三【修繕離島或偏遠地區師生宿舍】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="36" rowspan="2" align="center">序號</td>
    <td width="65" rowspan="2" align="center">學校編號</td>
    <td width="120" rowspan="2" align="center">學校名稱</td>
    <td colspan="3" align="center" bgcolor="#66FF99">縣市初審結果</td>
    <td colspan="3" align="center" bgcolor="#FFCC66">複審與初審差額</td>
    <td colspan="4" align="center" bgcolor="#FF9933">複審結果</td>
</tr>
<tr>
    <td align="center" bgcolor="#66FF99">經常門</td>
    <td align="center" bgcolor="#66FF99">資本門</td>
    <td align="center" bgcolor="#66FF99">合計</td>
    <td align="center" bgcolor="#FFCC66">經常門</td>
    <td align="center" bgcolor="#FFCC66">資本門</td>
    <td align="center" bgcolor="#FFCC66">合計</td>
    <td align="center" bgcolor="#FF9933">經常門</td>
    <td align="center" bgcolor="#FF9933">資本門</td>
    <td align="center" bgcolor="#FF9933">合計</td>
    <td align="center" bgcolor="#FF9933">複審意見</td>
  </tr>
<?
$serial = 0;
$sql = "select  *  from 102schooldata where cityname = '$city' order by 102schooldata.account;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
	$school_no = $row_all[0];
	$school_name = $row_all[2].$row_all[4].$row_all[5];
	//載入審核資訊
	$sql_element = "select  *  from 102allowance3 where account like '$school_no';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element)){
		$cityT1 = $row[136];	//縣市審核金額一(教師宿舍經常門)
		$cityT2 = $row[137];	//縣市審核金額二(教師宿舍資本門)
		$cityT3 = $row[139];	//縣市審核金額三(學生宿舍經常門)
		$cityT4 = $row[140];	//縣市審核金額四(學生宿舍資本門)
		$city3 = $row[131];		//縣市審核意見
		$city1 = $row[133];		//縣市審核經常門
		$city2 = $row[134];		//縣市審核資本門
		$total_city = $row[132];
		$city_status = $row[130];	//縣市審核狀態
		$eduT1 = $row[196];		//教育部審金額一(教師宿舍經常門)
		$eduT2 = $row[197];		//教育部審金額二(教師宿舍資本門)
		$eduT3 = $row[199];		//教育部審金額三(學生宿舍經常門)
		$eduT4 = $row[200];		//教育部審金額四(學生宿舍資本門)
		$edu3 = $row[191];		//教育部審核意見
		$edu1 = $row[193];		//教育部審核經常門
		$edu2 = $row[194];		//教育部審核資本門
		$total_edu = $row[192];
		$change1 = $edu1 - $city1;	//差額一
		$change2 = $edu2 - $city2;	//差額二
		$total_change = $total_edu - $total_city;
		if ($total_city > 0 && $city_status == '1'){
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $serial;
			echo "</td>";
			echo "<td align='center'>";
			echo $school_no;
			echo "</td>";
			echo "<td>";
			echo $school_name;
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city2);
			echo "</td>";
			echo "<td align='right' bgcolor='#66FF99'>";
			echo number_format($total_city);
			echo "</td>";
			echo "<td align='right'>";
			if($change1 > 0){
				echo '<font color=red>'.number_format($change1).'</font>';
			}else{
				echo number_format($change1);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change2 > 0){
				echo '<font color=red>'.number_format($change2).'</font>';
			}else{
				echo number_format($change2);
			}
			echo "</td>";
			echo "<td align='right' bgcolor='#FFCC66'>";
			if($total_change > 0){
				echo '<font color=red>'.number_format($total_change).'</font>';
			}else{
				echo number_format($total_change);
			}
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu2);
			echo "</td>";
			echo "<td align='right' bgcolor='#FF9933'>";
			echo number_format($total_edu);
			echo "</td>";
			echo "<td>";
			if($edu3 == "") {echo "　";} else {echo $edu3;}
			echo "</td>";
			$p_city1 = $p_city1 + $city1;
			$p_city2 = $p_city2 + $city2;
			$p_total_city = $p_total_city + $total_city;
			$p_edu1 = $p_edu1 + $edu1;
			$p_edu2 = $p_edu2 + $edu2;
			$p_total_edu = $p_total_edu + $total_edu;
			$p_change1 = $p_change1 + $change1;
			$p_change2 = $p_change2 + $change2;
			$p_total_change = $p_total_change + $total_change;
		}
	}
}
?>
<tr>
	<td colspan="2" align="center">合計</td>
	<td align="center"><? echo $serial; ?>校</td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city1); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city2); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_total_city); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change1); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change2); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_total_change); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu1); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu2); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_total_edu); ?></td>
	<td bgcolor="#FF9933">&nbsp;</td>
</tr>
</table>
<?
		break;
	case "4":
?>
複審結果列表：補助項目四【充實學校基本教學設備】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="36" rowspan="2" align="center">序號</td>
    <td width="65" rowspan="2" align="center">學校編號</td>
    <td width="120" rowspan="2" align="center">學校名稱</td>
    <td colspan="3" align="center" bgcolor="#66FF99">縣市初審結果</td>
    <td colspan="3" align="center" bgcolor="#FFCC66">複審與初審差額</td>
    <td colspan="4" align="center" bgcolor="#FF9933">複審結果</td>
</tr>
<tr>
  <td align="center" bgcolor="#66FF99">經常門</td>
  <td align="center" bgcolor="#66FF99">資本門</td>
  <td align="center" bgcolor="#66FF99">合計</td>
  <td align="center" bgcolor="#FFCC66">經常門</td>
  <td align="center" bgcolor="#FFCC66">資本門</td>
  <td align="center" bgcolor="#FFCC66">合計</td>
  <td align="center" bgcolor="#FF9933">經常門</td>
  <td align="center" bgcolor="#FF9933">資本門</td>
  <td align="center" bgcolor="#FF9933">合計</td>
  <td align="center" bgcolor="#FF9933">複審意見</td>
  </tr>
<?
$serial = 0;
$sql = "select  *  from 102schooldata where cityname = '$city' order by 102schooldata.account;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
	$school_no = $row_all[0];
	$school_name = $row_all[2].$row_all[4].$row_all[5];
	//載入審核資訊
	$sql_element = "select  *  from 102allowance4 where account like '$school_no';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element)){
		$city1 = $row[133];	//縣市審核金額一
		$city2 = $row[134];	//縣市審核金額二
		$city3 = $row[131];	//縣市審核意見
		$total_city = $row[132];
		$city_status = $row[130];	//縣市審核狀態
		$edu1 = $row[193];
		$edu2 = $row[194];
		$edu3 = $row[191];
		$total_edu = $row[192];
		$change1 = $edu1 - $city1;	//差額一
		$change2 = $edu2 - $city2;	//差額二
		$total_change = $total_edu - $total_city;
		if ($total_city > 0 && $city_status == '1'){
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $serial;
			echo "</td>";
			echo "<td align='center'>";
			echo $school_no;
			echo "</td>";
			echo "<td>";
			echo $school_name;
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city2);
			echo "</td>";
			echo "<td align='right' bgcolor='#66FF99'>";
			echo number_format($total_city);
			echo "</td>";
			echo "<td align='right'>";
			if($change1 > 0){
				echo '<font color=red>'.number_format($change1).'</font>';
			}else{
				echo number_format($change1);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change2 > 0){
				echo '<font color=red>'.number_format($change2).'</font>';
			}else{
				echo number_format($change2);
			}
			echo "</td>";
			echo "<td align='right' bgcolor='#FFCC66'>";
			if($total_change > 0){
				echo '<font color=red>'.number_format($total_change).'</font>';
			}else{
				echo number_format($total_change);
			}
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu2);
			echo "</td>";
			echo "<td align='right' bgcolor='#FF9933'>";
			echo number_format($total_edu);
			echo "</td>";
			echo "<td>";
			if($edu3 == "") {echo "　";} else {echo $edu3;}
			echo "</td>";
			$p_city1 = $p_city1 + $city1;
			$p_city2 = $p_city2 + $city2;
			$p_total_city = $p_total_city + $total_city;
			$p_edu1 = $p_edu1 + $edu1;
			$p_edu2 = $p_edu2 + $edu2;
			$p_total_edu = $p_total_edu + $total_edu;
			$p_change1 = $p_change1 + $change1;
			$p_change2 = $p_change2 + $change2;
			$p_total_change = $p_total_change + $total_change;
		}
	}
}
?>
<tr>
	<td colspan="2" align="center">合計</td>
	<td align="center"><? echo $serial; ?>校</td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city1); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city2); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_total_city); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change1); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change2); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_total_change); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu1); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu2); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_total_edu); ?></td>
	<td bgcolor="#FF9933">&nbsp;</td>
</tr>
</table>
<?
		break;
	case "5":
?>
複審結果列表：補助項目五【發展原住民教育文化特色及充實設備器材】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="36" rowspan="2" align="center">序號</td>
    <td width="65" rowspan="2" align="center">學校編號</td>
    <td width="120" rowspan="2" align="center">學校名稱</td>
    <td colspan="3" align="center" bgcolor="#66FF99">縣市初審結果</td>
    <td colspan="3" align="center" bgcolor="#FFCC66">複審與初審差額</td>
    <td colspan="4" align="center" bgcolor="#FF9933">複審結果</td>
</tr>
<tr>
  <td align="center" bgcolor="#66FF99">經常門</td>
  <td align="center" bgcolor="#66FF99">資本門</td>
  <td align="center" bgcolor="#66FF99">合計</td>
  <td align="center" bgcolor="#FFCC66">經常門</td>
  <td align="center" bgcolor="#FFCC66">資本門</td>
  <td align="center" bgcolor="#FFCC66">合計</td>
  <td align="center" bgcolor="#FF9933">經常門</td>
  <td align="center" bgcolor="#FF9933">資本門</td>
  <td align="center" bgcolor="#FF9933">合計</td>
  <td align="center" bgcolor="#FF9933">複審意見</td>
  </tr>
<?
$serial = 0;
$sql = "select  *  from 102schooldata where cityname = '$city' order by 102schooldata.account;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
	$school_no = $row_all[0];
	$school_name = $row_all[2].$row_all[4].$row_all[5];
	//載入審核資訊
	$sql_element = "select  *  from 102allowance5 where account like '$school_no';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element)){
		$cityT1 = $row[136];	//縣市審核特色一經常門
		$cityT2 = $row[137];	//縣市審核特色一資本門
		$cityT3 = $row[139];	//縣市審核特色二經常門
		$cityT4 = $row[140];	//縣市審核特色二資本門
		$city3 = $row[131];		//縣市審核意見
		$city1 = $row[133];		//縣市審核經常門
		$city2 = $row[134];		//縣市審核資本門
		$total_city = $row[132];
		$city_status = $row[130];	//縣市審核狀態
		$eduT1 = $row[196];	//教育部審核特色一經常門
		$eduT2 = $row[197];	//教育部審核特色一資本門
		$eduT3 = $row[199];	//教育部審核特色二經常門
		$eduT4 = $row[200];	//教育部審核特色二資本門
		$edu3 = $row[191];	//教育部審核意見
		$edu1 = $row[193]; //教育部審核經常門
		$edu2 = $row[194]; //教育部審核資本門
		$total_edu = $row[192];
		$change1 = $edu1 - $city1;	//差額一
		$change2 = $edu2 - $city2;	//差額二
		$total_change = $total_edu - $total_city;
		if ($total_city > 0 && $city_status == '1'){
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $serial;
			echo "</td>";
			echo "<td align='center'>";
			echo $school_no;
			echo "</td>";
			echo "<td>";
			echo $school_name;
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city2);
			echo "</td>";
			echo "<td align='right' bgcolor='#66FF99'>";
			echo number_format($total_city);
			echo "</td>";
			echo "<td align='right'>";
			if($change1 > 0){
				echo '<font color=red>'.number_format($change1).'</font>';
			}else{
				echo number_format($change1);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change2 > 0){
				echo '<font color=red>'.number_format($change2).'</font>';
			}else{
				echo number_format($change2);
			}
			echo "</td>";
			echo "<td align='right' bgcolor='#FFCC66'>";
			if($total_change > 0){
				echo '<font color=red>'.number_format($total_change).'</font>';
			}else{
				echo number_format($total_change);
			}
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu2);
			echo "</td>";
			echo "<td align='right' bgcolor='#FF9933'>";
			echo number_format($total_edu);
			echo "</td>";
			echo "<td>";
			if($edu3 == "") {echo "　";} else {echo $edu3;}
			echo "</td>";
			$p_city1 = $p_city1 + $city1;
			$p_city2 = $p_city2 + $city2;
			$p_total_city = $p_total_city + $total_city;
			$p_edu1 = $p_edu1 + $edu1;
			$p_edu2 = $p_edu2 + $edu2;
			$p_total_edu = $p_total_edu + $total_edu;
			$p_change1 = $p_change1 + $change1;
			$p_change2 = $p_change2 + $change2;
			$p_total_change = $p_total_change + $total_change;
		}
	}
}
?>
<tr>
	<td colspan="2" align="center">合計</td>
	<td align="center"><? echo $serial; ?>校</td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city1); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city2); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_total_city); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change1); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change2); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_total_change); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu1); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu2); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_total_edu); ?></td>
	<td bgcolor="#FF9933">&nbsp;</td>
</tr>
</table>
<?
		break;
	case "6":
?>
複審結果列表：補助項目六【補助交通不便地區學校交通車】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="36" rowspan="2" align="center">序號</td>
    <td width="65" rowspan="2" align="center">學校編號</td>
    <td width="120" rowspan="2" align="center">學校名稱</td>
    <td colspan="4" align="center" bgcolor="#66FF99">縣市初審結果</td>
    <td colspan="4" align="center" bgcolor="#FFCC66">複審與初審差額</td>
    <td colspan="5" align="center" bgcolor="#FF9933">複審結果</td>
</tr>
<tr>
    <td align="center" bgcolor="#66FF99">租車費</td>
    <td align="center" bgcolor="#66FF99">交通費</td>
    <td align="center" bgcolor="#66FF99">交通車</td>
    <td align="center" bgcolor="#66FF99">合計</td>
    <td align="center" bgcolor="#FFCC66">租車費</td>
    <td align="center" bgcolor="#FFCC66">交通費</td>
    <td align="center" bgcolor="#FFCC66">交通車</td>
    <td align="center" bgcolor="#FFCC66">合計</td>
    <td align="center" bgcolor="#FF9933">租車費</td>
    <td align="center" bgcolor="#FF9933">交通費</td>
    <td align="center" bgcolor="#FF9933">交通車</td>
    <td align="center" bgcolor="#FF9933">合計</td>
    <td align="center" bgcolor="#FF9933">複審意見</td>
</tr>
<?
$serial = 0;
$sql = "select  *  from 102schooldata where cityname = '$city' order by 102schooldata.account;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
	$school_no = $row_all[0];
	$school_name = $row_all[2].$row_all[4].$row_all[5];
	//載入審核資訊
	$sql_element = "select  *  from 102allowance6 where account like '$school_no';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element)){
		$city1 = $row[136];	//縣市審核金額一
		$city2 = $row[138];	//縣市審核金額二
		$city3 = $row[140];	//縣市審核金額三
		$city4 = $row[131];	//縣市審核意見
		$total_city = $row[132];
		$city_status = $row[130];	//縣市審核狀態
		$edu1 = $row[196];
		$edu2 = $row[198];
		$edu3 = $row[200];
		$edu4 = $row[191];
		$total_edu = $edu1 + $edu2 + $edu3;
		$change1 = $edu1 - $city1;	//差額一
		$change2 = $edu2 - $city2;	//差額二
		$change3 = $edu3 - $city3;	//差額三
		$total_change = $total_edu - $total_city;
		if ($total_city > 0 && $city_status == '1'){
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $serial;
			echo "</td>";
			echo "<td align='center'>";
			echo $school_no;
			echo "</td>";
			echo "<td>";
			echo $school_name;
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city2);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city3);
			echo "</td>";
			echo "<td align='right' bgcolor='#66FF99'>";
			echo number_format($total_city);
			echo "</td>";
			echo "<td align='right'>";
			if($change1 > 0){
				echo '<font color=red>'.number_format($change1).'</font>';
			}else{
				echo number_format($change1);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change2 > 0){
				echo '<font color=red>'.number_format($change2).'</font>';
			}else{
				echo number_format($change2);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change3 > 0){
				echo '<font color=red>'.number_format($change3).'</font>';
			}else{
				echo number_format($change3);
			}
			echo "</td>";
			echo "<td align='right' bgcolor='#FFCC66'>";
			if($total_change > 0){
				echo '<font color=red>'.number_format($total_change).'</font>';
			}else{
				echo number_format($total_change);
			}
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu2);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu3);
			echo "</td>";
			echo "<td align='right' bgcolor='#FF9933'>";
			echo number_format($total_edu);
			echo "</td>";
			echo "<td>";
			if($edu4 == "") {echo "　";} else {echo $edu4;}
			echo "</td>";
			$p_city1 = $p_city1 + $city1;
			$p_city2 = $p_city2 + $city2;
			$p_city3 = $p_city3 + $city3;
			$p_total_city = $p_total_city + $total_city;
			$p_edu1 = $p_edu1 + $edu1;
			$p_edu2 = $p_edu2 + $edu2;
			$p_edu3 = $p_edu3 + $edu3;
			$p_total_edu = $p_total_edu + $total_edu;
			$p_change1 = $p_change1 + $change1;
			$p_change2 = $p_change2 + $change2;
			$p_change3 = $p_change3 + $change3;
			$p_total_change = $p_total_change + $total_change;
		}
	}
}
?>
<tr>
	<td colspan="2" align="center">合計</td>
	<td align="center"><? echo $serial; ?>校</td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city1); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city2); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city3); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_total_city); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change1); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change2); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change3); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_total_change); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu1); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu2); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu3); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_total_edu); ?></td>
	<td bgcolor="#FF9933">&nbsp;</td>
</tr>
</table>
<?
		break;
	case "7":
?>
複審結果列表：補助項目七【整修學校社區化活動場所】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td width="36" rowspan="2" align="center">序號</td>
    <td width="65" rowspan="2" align="center">學校編號</td>
    <td width="120" rowspan="2" align="center">學校名稱</td>
    <td colspan="3" align="center" bgcolor="#66FF99">縣市初審結果</td>
    <td colspan="3" align="center" bgcolor="#FFCC66">複審與初審差額</td>
    <td colspan="4" align="center" bgcolor="#FF9933">複審結果</td>
</tr>
<tr>
  <td align="center" bgcolor="#66FF99">修建</td>
  <td align="center" bgcolor="#66FF99">設備</td>
  <td align="center" bgcolor="#66FF99">合計</td>
  <td align="center" bgcolor="#FFCC66">修建</td>
  <td align="center" bgcolor="#FFCC66">設備</td>
  <td align="center" bgcolor="#FFCC66">合計</td>
  <td align="center" bgcolor="#FF9933">修建</td>
  <td align="center" bgcolor="#FF9933">設備</td>
  <td align="center" bgcolor="#FF9933">合計</td>
  <td align="center" bgcolor="#FF9933">複審意見</td>
  </tr>
<?
$serial = 0;
$sql = "select  *  from 102schooldata where cityname = '$city' order by 102schooldata.account;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
	$school_no = $row_all[0];
	$school_name = $row_all[2].$row_all[4].$row_all[5];
	//載入審核資訊
	$sql_element = "select  *  from 102allowance7 where account like '$school_no';";
	$result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element)){
		$city1 = $row[133];	//縣市審核金額一
		$city2 = $row[134];	//縣市審核金額二
		$city3 = $row[131];	//縣市審核意見
		$total_city = $row[132];
		$city_status = $row[130];	//縣市審核狀態
		$edu1 = $row[193];
		$edu2 = $row[194];
		$edu3 = $row[191];
		$total_edu = $row[192];
		$change1 = $edu1 - $city1;	//差額一
		$change2 = $edu2 - $city2;	//差額二
		$total_change = $total_edu - $total_city;
		if ($total_city > 0 && $city_status == '1'){
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
			echo $serial;
			echo "</td>";
			echo "<td align='center'>";
			echo $school_no;
			echo "</td>";
			echo "<td>";
			echo $school_name;
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($city2);
			echo "</td>";
			echo "<td align='right' bgcolor='#66FF99'>";
			echo number_format($total_city);
			echo "</td>";
			echo "<td align='right'>";
			if($change1 > 0){
				echo '<font color=red>'.number_format($change1).'</font>';
			}else{
				echo number_format($change1);
			}
			echo "</td>";
			echo "<td align='right'>";
			if($change2 > 0){
				echo '<font color=red>'.number_format($change2).'</font>';
			}else{
				echo number_format($change2);
			}
			echo "</td>";
			echo "<td align='right' bgcolor='#FFCC66'>";
			if($total_change > 0){
				echo '<font color=red>'.number_format($total_change).'</font>';
			}else{
				echo number_format($total_change);
			}
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu1);
			echo "</td>";
			echo "<td align='right'>";
			echo number_format($edu2);
			echo "</td>";
			echo "<td align='right' bgcolor='#FF9933'>";
			echo number_format($total_edu);
			echo "</td>";
			echo "<td>";
			if($edu3 == "") {echo "　";} else {echo $edu3;}
			echo "</td>";
			$p_city1 = $p_city1 + $city1;
			$p_city2 = $p_city2 + $city2;
			$p_total_city = $p_total_city + $total_city;
			$p_edu1 = $p_edu1 + $edu1;
			$p_edu2 = $p_edu2 + $edu2;
			$p_total_edu = $p_total_edu + $total_edu;
			$p_change1 = $p_change1 + $change1;
			$p_change2 = $p_change2 + $change2;
			$p_total_change = $p_total_change + $total_change;
		}
	}
}
?>
<tr>
	<td colspan="2" align="center">合計</td>
	<td align="center"><? echo $serial; ?>校</td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city1); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_city2); ?></td>
	<td align="right" bgcolor="#66FF99"><? echo number_format($p_total_city); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change1); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_change2); ?></td>
	<td align="right" bgcolor="#FFCC66"><? echo number_format($p_total_change); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu1); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_edu2); ?></td>
	<td align="right" bgcolor="#FF9933"><? echo number_format($p_total_edu); ?></td>
	<td bgcolor="#FF9933">&nbsp;</td>
</tr>
</table>
<?
		break;
	default:
?>
複審結果列表：查無所選項目
<?
}
?>
</div>
<?
include "../xSchoolForm/button_print02.php";
?>
<input type="button" value="關閉本頁" onClick="window.close()">
<?php 
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>