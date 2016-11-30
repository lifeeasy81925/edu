<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$city = $row[1];
	$cityman = $row[2];
	$cityno = $row[4];
}
include "../xSchoolForm/button_print02.php";
$serial = 0;
?>
<input type="button" value="關閉本頁" onClick="window.close()">
<div id="print_content">
<br /><?echo $city;?>檢視【102年度 學校結餘款列表】
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td nowrap="nowrap" align="center">序號</td>
		<td nowrap="nowrap" align="center">學校編號</td>
		<td nowrap="nowrap" align="center">學校名稱</td>
		<td align="center">申請金額</td>
		<td align="center">結餘金額</td>
	</tr>
  
<?
	//學校列表
	$sql = " select sd102.* ".
		   "      , ifnull(sp.a1_total,0) + ifnull(sp.a2_total,0) + ifnull(sp.a3_total,0) ".
		   "      + ifnull(sp.a4_total,0) + ifnull(sp.a5_total,0) + ifnull(sp.a6_total,0) + ifnull(sp.a7_total,0) as surplus_money ".
		   "      , sp.update_date ".
		   "      , ifnull(a1.a192,0) + ifnull(a2.a192,0) + ifnull(a3.a192,0) ".
		   "      + ifnull(a4.a192,0) + ifnull(a5.a192,0) + ifnull(a6.a192,0) + ifnull(a7.a192,0) AS apply_money ".
		   
		   " from 102schooldata as sd102 left join 102surplus as sp on sd102.account = sp.account ".
		   "                             left join 102allowance1 as a1 on sd102.account = a1.account ".
		   "                             left join 102allowance2 as a2 on sd102.account = a2.account ".
		   "                             left join 102allowance3 as a3 on sd102.account = a3.account ".
		   "                             left join 102allowance4 as a4 on sd102.account = a4.account ".
		   "                             left join 102allowance5 as a5 on sd102.account = a5.account ".
		   "                             left join 102allowance6 as a6 on sd102.account = a6.account ".
		   "                             left join 102allowance7 as a7 on sd102.account = a7.account ".
		   
		   " where sd102.cityname like '%$city%' order by sd102.account; ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		
		$school_id = $row[0];	//帳號
		$type = $row[1];		//學校型態
		$city = $row[2];		//縣市
		$district = $row[4];	//區
		$school = $row[5];		//學校名稱
		$school_full_name = $row[2].$row[4].$row[5];
		
		$apply_money = $row['apply_money'];
		$surplus_money = $row['surplus_money'];
		$update_date = $row['update_date'];
		
		//沒填寫過則顯示上未填寫
		$str = ($update_date == '')?"尚未填寫":number_format($surplus_money);
		
		if($apply_money > 0)
		{
			$serial++;
			echo "<tr>";
			echo "<td align='center'>";
				echo $serial;//序號
			echo "</td>";
			echo "<td>";
				echo $school_id;//學校編號
			echo "</td>";
			echo "<td>";
				echo $school_full_name;		//學校名稱
			echo "</td>";
			echo "<td div align='right'>";
				echo number_format($apply_money);//申請金額
			echo "</td>";
			echo "<td div align='right'>";
				echo $str;//結餘金額
			echo "</td>";
			echo "</tr>";
			
			//沒填寫過則算0元
			$str = ($update_date == '')?0:$surplus_money;
			
			$apply_money_total += $apply_money;
			$surplus_money_total += $surplus_money;
		}
	}
?>
	<tr>
		<td colspan="3" align="center">合計</td>
		<td align="right"><div align="right"><? echo number_format($apply_money_total);?></td>
		<td align="right"><div align="right"><? echo number_format($surplus_money_total);?></td>
	</tr>
</table>
</div>
<br>
※若要進行文書格式編修，建議複製到Excel編輯。<br>
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
