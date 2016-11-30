<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="allowance_examine.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

審核補助項目 / <b>補助項目三：充實學校基本教學設備</b>

<p>
<hr>
<p>

已申請學校列表：<p>

<table border='1'>
	<tr height='40px'>
		<td align="center">序號</td>
		<td align="center">學校代碼</td>
		<td align="center">學校名稱</td>
		<td align="center">申請金額</td>
		<td align="center">初審金額</td>
		<td align="center">結果</td>
		<td align="center">審核</td>
	</tr>
	<?
		include "../../function/config_for_106.php"; //本年度基本設定

		$table_name = $a3_table_name;
		$a_num = 'a3';

		$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
			   "      , sy.* ".
			   //補三資料
			   "      , $a_num.* ".
			   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
			   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
			   " where ".
			   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
			   "   and sd.cityname = '$cityname' ".
			   " order by sd.account ";

		$result = mysql_query($sql);
		$serial = 0;
		while($row = mysql_fetch_array($result))
		{
			$account = $row['sd_account'];
			$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
			$cityname = $row['cityname'];
			$district = $row['district'];
			$schoolname = $row['schoolname'];
			$area = $row['area'];

			$applied = $row['applied'];
			$applied_ary = explode(",", $applied); //已申請的補助
			$can_apply = $row['can_apply'];
			$can_apply_ary = explode(",", $can_apply); //可申請的補助

			$main_seq = $row['seq_no']; //sy.seq_no
			$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0

			$city_approved = $row['city_approved'];
			$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money']; //NULL則填入0

			if($s_total_money > 0 && in_array($a_num,$applied_ary) && in_array($a_num,$can_apply_ary))
			{
				$serial++;
				echo "<tr height='40px'>";
					echo "<td align='center'>".$serial."</td>";   // 序列號
					echo "<td align='center'>".$account."</td>";  // 學校代碼
					echo "<td>".$district.$schoolname."</td>";    // 學校名稱
					echo "<td align='right'>"."$ ".number_format($s_total_money)."</td>";     // 申請金額
					echo "<td align='right'>"."$ ".number_format($city_total_money)."</td>";  // 縣市初審金額

					echo "<td align='center'>";  // 審核狀態
						if($city_approved == '')  // 若縣市審核狀態空值
						{
							echo "<font color=blue>待審核</font>";
						}
						elseif($city_total_money >= 0 && $city_approved == 'Y')  // 若縣市審核金額>0 且 審核狀態是Y
						{
							echo "<font color=green>審畢</font>";
							echo ' <img src="/edu/images/yes.png" height="14px" width="14px" />';  // 顯示已審畢圖示
						}
						else  // 非待審核 且 非已審畢 作為退件處理（city_approved = N）
						{
							echo "<font color=red>退件</font>";
							echo ' <img src="/edu/images/no.png" height="12px" width="12px" />';
						}
					echo "</td>";

					echo "<td align='center'>";  // 審核按鈕
						echo "<form action='examine_allowance_$a_num.php' method='post' style='margin:0px; display:inline;'>";
							echo "<input type='hidden' name='account' id='account' value='$account'>";
							echo "<input type='submit' name='button' id='button' value=' 審核 '>";
						echo "</form>";
					echo "</td>";
				echo "</tr>";
			}
		}
	?>
</table>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>