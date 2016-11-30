<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
$table = $_GET["id"];
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='102_allowance_examine_1.php'">
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
echo $username."_";
echo $edu."_";
echo $eduman."_補助項目".$table;
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
            $city = $row[1];
			$cityman = $row[2];
			$examine = $row[3];
			$eduno = $row[4];
			$city_1 = $row[13];//基隆市審核權
			$city_2 = $row[14];//新北市
			$city_3 = $row[15];//臺北市
			$city_4 = $row[16];//桃園縣
			$city_5 = $row[17];//新竹縣
			$city_6 = $row[18];//新竹市
			$city_7 = $row[19];//苗栗縣
			$city_8 = $row[20];//臺中市
			$city_9 = $row[21];//南投縣
			$city_10 = $row[22];//彰化縣
			$city_11 = $row[23];//雲林縣
			$city_12 = $row[24];//嘉義縣
			$city_13 = $row[25];//嘉義市			
			$city_14 = $row[26];//臺南市
			$city_15 = $row[27];//高雄市
			$city_16 = $row[28];//屏東縣
			$city_17 = $row[29];//臺東縣
			$city_18 = $row[30];//花蓮縣
			$city_19 = $row[31];//宜蘭縣
			$city_20 = $row[32];//澎湖縣
			$city_21 = $row[33];//金門縣
			$city_22 = $row[34];//連江縣
			$serial = 0; //序號變數
			$sn_1 = 0; //待審核數
			$sn_2 = 0; //退件數
			$sn_3 = 0; //已審畢數
			$sn_1T = 0; //待審核總數
			$sn_2T = 0; //退件總數
			$sn_3T = 0; //已審畢總數
}

//echo "<a href="."examine_allowance1.php?id=$row[0]"." target="."_self".">"."審核"."</a>";//預算審核
?>
<table border="1">
	<tr>
		<td width="40"><div align="center">序號</div></td>
		<td width="60"><div align="center">縣市</div></td>
		<td><div align="center">進入審核</div></td>
		<td width="50"><div align="center">待審核</div></td>
		<td width="50"><div align="center">不通過</div></td>
		<td width="50"><div align="center">已審畢</div></td>
	</tr>

<?
//
// C01 基隆市
//
if($city_1 == '1'){
	$cityname = '基隆市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//
//補助項目八
//
/*
	if($table == '8') {
		$sql_e = "select * from 100element_examine_money ,100element_examine_education  where 100element_examine_money.account=100element_examine_education.account and 100element_examine_money.school like '%$cityname%' order by 100element_examine_money.account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$total_city = $row_e[42] + $row_e[43];
			$pointer = $row_e[83];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		$sql_j = "select * from 100junior_examine_money ,100junior_examine_education  where 100junior_examine_money.account=100junior_examine_education.account and 100junior_examine_money.school like '%$cityname%' order by 100junior_examine_money.account";		
		$result_j = mysql_query($sql_j);
		while($row_j = mysql_fetch_row($result_j)) {
			$total_city = $row_j[42] + $row_j[43];
			$pointer = $row_j[83];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."a8_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";
	}
*/
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
//
// C02 新北市
//
if($city_2 == '1'){
	$cityname = '新北市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
//
// C03 臺北市
//
if($city_3 == '1'){
	$cityname = '臺北市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}

if($city_4 == '1'){
	$cityname = '桃園縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_5 == '1'){
	$cityname = '新竹縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}

if($city_6 == '1'){
	$cityname = '新竹市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}

if($city_7 == '1'){
	$cityname = '苗栗縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
//
// C08 臺中市
//
if($city_8 == '1'){
	$cityname = '臺中市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_9 == '1'){
	$cityname = '南投縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_10 == '1'){
	$cityname = '彰化縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_11 == '1'){
	$cityname = '雲林縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_12 == '1'){
	$cityname = '嘉義縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_13 == '1'){
	$cityname = '嘉義市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_14 == '1'){
	$cityname = '臺南市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_15 == '1'){
	$cityname = '高雄市';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_16 == '1'){
	$cityname = '屏東縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_17 == '1'){
	$cityname = '臺東縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_18 == '1'){
	$cityname = '花蓮縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_19 == '1'){
	$cityname = '宜蘭縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_20 == '1'){
	$cityname = '澎湖縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_21 == '1'){
	$cityname = '金門縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}
  
if($city_22 == '1'){
	$cityname = '連江縣';
	$sn_1 = 0; //待審核數
	$sn_2 = 0; //退件數
	$sn_3 = 0; //已審核數
	echo "<tr>";
	echo "<td align=center>".++$serial."</td>"."<td align=center>".$cityname."</td>";
	echo "<td align=center>";
//補助項目一
	if($table == '1') {
		$sql_e = "select * from 102allowance1 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a1_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	} // if($table == '1')
//補助項目二
	if($table == '2') {
		$sql_e = "select * from 102allowance2 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a2_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目三
	if($table == '3') {
		$sql_e = "select * from 102allowance3 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a3_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目四
	if($table == '4') {
		$sql_e = "select * from 102allowance4 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a4_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目五
	if($table == '5') {
		$sql_e = "select * from 102allowance5 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a5_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目六
	if($table == '6') {
		$sql_e = "select * from 102allowance6 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a6_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
//補助項目七
	if($table == '7') {
		$sql_e = "select * from 102allowance7 where cityname like '%$cityname%' order by account";
		$result_e = mysql_query($sql_e);
		while($row_e = mysql_fetch_row($result_e)) {
			$city_pass = $row_e[130];
			$city_total = $row_e[132];
			$pointer = $row_e[190];
			if ($city_total > 0 && $city_pass == 1){
				switch($pointer){
					case 0:
						$sn_1++;
						break;
					case 1:
						$sn_3++;
						break;
					case 2:
						$sn_2++;
						break;
					default:
						echo "Out of Expected!";
				} //switch
			} // if
		} // while
		echo "<a href="."102_a7_examine_table.php?id=".$cityname." target="."_self".">"."審核"."</a>";	
	}
	echo "</td>";
	echo "<td align=right>".$sn_1."</td>";
	echo "<td align=right>".$sn_2."</td>";
	echo "<td align=right>".$sn_3."</td>";
	$sn_1T = $sn_1T + $sn_1;
	$sn_2T = $sn_2T + $sn_2;
	$sn_3T = $sn_3T + $sn_3;
	echo "</tr>";
}

?>
 	<tr>
		<td colspan="3"><div align="center">合計</div></td>
		<td><div align="center"><? echo number_format($sn_1T); ?></div></td>
		<td><div align="center"><? echo number_format($sn_2T); ?></div></td>
		<td><div align="center"><? echo number_format($sn_3T); ?></div></td>
	</tr>
</table>
<?php
include "../../footer.php";
?>