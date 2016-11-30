<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql_edu = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_edu = $xoopsDB -> query($sql_edu) or die($sql_edu);

	while($row = mysql_fetch_row($result_edu))
	{
		$cityid  = $row[0];//ID
		$city    = $row[1];//單位
		$cityman = $row[2];//承辦人
	}
	if($username == 'edu0001' || $username == 'edu0099')
	{
		echo $username;
		echo $city;
		echo $cityman;
	}
	else
	{
		echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'您沒有設定權限!'.'"'.')'.'</script>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=education_index.php>';
	}
?>
<p>

<a href="education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/lock.png" align="absmiddle" height="20px"> <b>審查權限設定</b>

<p>
<hr>
<p>

<?
	$sql = " select  *  from  edu_city where cityid like '%edu%'; ";
	$result = mysql_query($sql);
?>

<table border="1">
	<tr height="40px">
		<td align="center" nowrap="nowrap">委員代碼</td>
		<td align="center" nowrap="nowrap">審核補助權限</td>
		<td align="center" nowrap="nowrap" colspan="2">審核縣市權限</td>
		<td align="center" nowrap="nowrap">設定權限</td>
	</tr>

	<?
		while($row = mysql_fetch_row($result))
		{
			$edu_name = $row[0]; // 各委員代號

			$exam_1 = $row[5];   // 補助項目一
			$exam_2 = $row[6];   // 補助項目二
			$exam_3 = $row[7];   // 補助項目三
			$exam_4 = $row[8];   // 補助項目四
			$exam_5 = $row[9];   // 補助項目五
			$exam_6 = $row[10];  // 補助項目六

			/*
			$exam_7 = $row[11];  // 補助項目七
			$exam_8 = $row[12];  // 補助項目八
			*/

			$city_1  = $row[13];  // 基隆市
			$city_2  = $row[14];  // 臺北市
			$city_3  = $row[15];  // 新北市
			$city_4  = $row[16];  // 桃園市
			$city_5  = $row[17];  // 新竹市
			$city_6  = $row[18];  // 新竹縣
			$city_7  = $row[19];  // 苗栗縣
			$city_8  = $row[20];  // 臺中市
			$city_9  = $row[21];  // 彰化縣
			$city_10 = $row[22];  // 南投縣
			$city_11 = $row[23];  // 雲林縣
			$city_12 = $row[24];  // 嘉義市
			$city_13 = $row[25];  // 嘉義縣
			$city_14 = $row[26];  // 臺南市
			$city_15 = $row[27];  // 高雄市
			$city_16 = $row[28];  // 屏東縣
			$city_17 = $row[29];  // 宜蘭縣
			$city_18 = $row[30];  // 花蓮縣
			$city_19 = $row[31];  // 臺東縣
			$city_20 = $row[32];  // 澎湖縣
			$city_21 = $row[33];  // 金門縣
			$city_22 = $row[34];  // 連江縣

			echo "<tr height=40px>";

			echo '<td align=center>' . $edu_name . "</td>";

			echo '<td align=center>';
				if($exam_1 == 1){echo '補助項目一<br>';}  // 親職教育
				if($exam_2 == 1){echo '補助項目二<br>';}  // 學校特色
				if($exam_3 == 1){echo '補助項目三<br>';}  // 充實設備
				if($exam_4 == 1){echo '補助項目四<br>';}  // 原民特色
				if($exam_5 == 1){echo '補助項目五<br>';}  // 補助交通
				if($exam_6 == 1){echo '補助項目六<br>';}  // 整修場所
			echo "</td>";

			echo '<td>';
				$count_city = 0;
				if($city_1  == 1) { echo '基隆市, '; $count_city++; }
				if($city_2  == 1) { echo '臺北市, '; $count_city++; }
				if($city_3  == 1) { echo '新北市, '; $count_city++; }
				if($city_4  == 1) { echo '桃園市, '; $count_city++; }
				if($city_5  == 1) { echo '新竹市, '; $count_city++; }
				if($city_6  == 1) { echo '新竹縣, '; $count_city++; }
				if($city_7  == 1) { echo '苗栗縣, '; $count_city++; }
				if($city_8  == 1) { echo '臺中市, '; $count_city++; }
				if($city_9  == 1) { echo '彰化縣, '; $count_city++; }
				if($city_10 == 1) { echo '南投縣, '; $count_city++; }
				if($city_11 == 1) { echo '雲林縣, '; $count_city++; }
				if($city_12 == 1) { echo '嘉義市, '; $count_city++; }
				if($city_13 == 1) { echo '嘉義縣, '; $count_city++; }
				if($city_14 == 1) { echo '臺南市, '; $count_city++; }
				if($city_15 == 1) { echo '高雄市, '; $count_city++; }
				if($city_16 == 1) { echo '屏東縣, '; $count_city++; }
				if($city_17 == 1) { echo '宜蘭縣, '; $count_city++; }
				if($city_18 == 1) { echo '花蓮縣, '; $count_city++; }
				if($city_19 == 1) { echo '臺東縣, '; $count_city++; }
				if($city_20 == 1) { echo '澎湖縣, '; $count_city++; }
				if($city_21 == 1) { echo '金門縣, '; $count_city++; }
				if($city_22 == 1) { echo '連江縣, '; $count_city++; }
			echo "</td>";

			echo '<td align=center nowrap=nowrap>';
				echo "共 <font><b>" . $count_city . "</b></font> 縣市";
			echo "</td>";

			echo "<td align=center>";
			echo "<INPUT TYPE="."button"." VALUE="."設權限"." onClick="."location="."'examine_setting.php?id="."$edu_name'".">";
			echo "</td>";

			echo '</tr>';
		}
	?>
</table>

<? include "../../footer.php"; ?>