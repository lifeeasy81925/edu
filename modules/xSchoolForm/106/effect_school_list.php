<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/config_for_106.php"; //本年度基本設定

	$get_id = $_GET['acc'];

	if($get_id != "") {$username = $get_id;}

	// 教育部核定金額
	$sql = 	"    SELECT sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sy.*         ".
			"         , a1.edu_total_money AS a1_edu_total_money, a1_e.execute_money AS a1_execute_money ".
			"         , a2.edu_total_money AS a2_edu_total_money, a2_e.execute_money AS a2_execute_money ".
			"         , a3.edu_total_money AS a3_edu_total_money, a3_e.execute_money AS a3_execute_money ".
			"         , a4.edu_total_money AS a4_edu_total_money, a4_e.execute_money AS a4_execute_money ".
			"         , a5.edu_total_money AS a5_edu_total_money, a5_e.execute_money AS a5_execute_money ".
			"         , a6.edu_total_money AS a6_edu_total_money, a6_e.execute_money AS a6_execute_money ".
			"      FROM schooldata                      AS sd                                            ".
			" LEFT JOIN schooldata_year                 AS sy   ON sd.account = sy.account               ".
			" LEFT JOIN alc_parenting_education         AS a1   ON sy.seq_no  = a1.sy_seq                ".  /* 補助 */
			" LEFT JOIN alc_education_features          AS a2   ON sy.seq_no  = a2.sy_seq                ".
			" LEFT JOIN alc_teaching_equipment          AS a3   ON sy.seq_no  = a3.sy_seq                ".
			" LEFT JOIN alc_aboriginal_education        AS a4   ON sy.seq_no  = a4.sy_seq                ".
			" LEFT JOIN alc_transport_car               AS a5   ON sy.seq_no  = a5.sy_seq                ".
			" LEFT JOIN alc_school_activity             AS a6   ON sy.seq_no  = a6.sy_seq                ".
			" LEFT JOIN alc_parenting_education_effect  AS a1_e ON sy.seq_no  = a1_e.sy_seq              ".  /* 成效 */
			" LEFT JOIN alc_education_features_effect   AS a2_e ON sy.seq_no  = a2_e.sy_seq              ".
			" LEFT JOIN alc_teaching_equipment_effect   AS a3_e ON sy.seq_no  = a3_e.sy_seq              ".
			" LEFT JOIN alc_aboriginal_education_effect AS a4_e ON sy.seq_no  = a4_e.sy_seq              ".
			" LEFT JOIN alc_transport_car_effect        AS a5_e ON sy.seq_no  = a5_e.sy_seq              ".
			" LEFT JOIN alc_school_activity_effect      AS a6_e ON sy.seq_no  = a6_e.sy_seq              ".
			"     WHERE sy.school_year = '$school_year' ".
			"       AND sd.account     = '$username'    ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account    =  $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   =  $row['cityname'];
		$district   =  $row['district'];
		$schoolname =  $row['schoolname'];

		$main_seq = $row['seq_no'];  // school_year的seq_no

		$a1_edu_total_money = ($row['a1_edu_total_money'] == '')?0:$row['a1_edu_total_money']; //NULL則填入0
		$a2_edu_total_money = ($row['a2_edu_total_money'] == '')?0:$row['a2_edu_total_money'];
		$a3_edu_total_money = ($row['a3_edu_total_money'] == '')?0:$row['a3_edu_total_money'];
		$a4_edu_total_money = ($row['a4_edu_total_money'] == '')?0:$row['a4_edu_total_money'];
		$a5_edu_total_money = ($row['a5_edu_total_money'] == '')?0:$row['a5_edu_total_money'];
		$a6_edu_total_money = ($row['a6_edu_total_money'] == '')?0:$row['a6_edu_total_money'];

		$sum_edu_total_money = $a1_edu_total_money + $a2_edu_total_money + $a3_edu_total_money
							 + $a4_edu_total_money + $a5_edu_total_money + $a6_edu_total_money;

		$a1_execute_money = ($row['a1_execute_money'] == '')?0:$row['a1_execute_money']; //NULL則填入0
		$a2_execute_money = ($row['a2_execute_money'] == '')?0:$row['a2_execute_money'];
		$a3_execute_money = ($row['a3_execute_money'] == '')?0:$row['a3_execute_money'];
		$a4_execute_money = ($row['a4_execute_money'] == '')?0:$row['a4_execute_money'];
		$a5_execute_money = ($row['a5_execute_money'] == '')?0:$row['a5_execute_money'];
		$a6_execute_money = ($row['a6_execute_money'] == '')?0:$row['a6_execute_money'];

		$sum_execute_money = $a1_execute_money + $a2_execute_money + $a3_execute_money
						   + $a4_execute_money + $a5_execute_money + $a6_execute_money;

		$a1_percnet  = number_format($a1_execute_money  / $a1_edu_total_money  * 100,2);
		$a2_percnet  = number_format($a2_execute_money  / $a2_edu_total_money  * 100,2);
		$a3_percnet  = number_format($a3_execute_money  / $a3_edu_total_money  * 100,2);
		$a4_percnet  = number_format($a4_execute_money  / $a4_edu_total_money  * 100,2);
		$a5_percnet  = number_format($a5_execute_money  / $a5_edu_total_money  * 100,2);
		$a6_percnet  = number_format($a6_execute_money  / $a6_edu_total_money  * 100,2);
		$sum_percnet = number_format($sum_execute_money / $sum_edu_total_money * 100,2);
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../school_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b><?=$school_year;?>年度 執行成效與修正後計畫</b>

<p>
<hr>
<p>

<table border="2" cellpadding="5" style="display:<? if($sum_edu_total_money < 1){echo "none";} ?>">

	<tr height="50px" align="center" bgcolor="#D1F1F1">
		<td nowrap="newrap">補助項目</td>
		<td nowrap="newrap">核定金額</td>
		<td nowrap="newrap">執行金額</td>
		<td nowrap="newrap">剩餘金額</td>
		<td nowrap="newrap">執行進度</td>
		<td nowrap="newrap">執行情形</td>
		<td nowrap="newrap">修正後計畫<br>與執行成果</td>
	</tr>

	<tr height="50px" style="display:<? if($a1_edu_total_money < 1){echo "none";} ?>">
		<td><font size="-1">一、推展親職教育活動</font></td>
		<td align="right" nowrap="newrap"><?=number_format($a1_edu_total_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a1_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a1_edu_total_money - $a1_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=$a1_percnet."%";?></td>
		<td align="center">
			<form action='effect_school_01.php' method='post'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button'   id='button'   value='執行情形'>
			</form>
		</td>
		<td align="center"><input type="button" value="上傳檔案" onClick="location='effect_school_up_01.php'"></td>
	</tr>

	<tr height="50px" style="display:<? if($a2_edu_total_money < 1){echo "none";} ?>">
		<td><font size="-1">二、補助學校發展教育特色</font></td>
		<td align="right" nowrap="newrap"><?=number_format($a2_edu_total_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a2_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a2_edu_total_money - $a2_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=$a2_percnet."%";?></td>
		<td align="center">
			<form action='effect_school_02.php' method='post'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button'   id='button'   value='執行情形'>
			</form>
		</td>
		<td align="center"><input type="button" value="上傳檔案" onClick="location='effect_school_up_02.php'"></td>
	</tr>

	<tr height="50px" style="display:<? if($a3_edu_total_money < 1){echo "none";} ?>">
		<td><font size="-1">三、充實學校基本教學設備</font></td>
		<td align="right" nowrap="newrap"><?=number_format($a3_edu_total_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a3_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a3_edu_total_money - $a3_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=$a3_percnet."%";?></td>
		<td align="center">
			<form action='effect_school_03.php' method='post'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button'   id='button'   value='執行情形'>
			</form>
		</td>
		<td align="center"><input type="button" value="上傳檔案" onClick="location='effect_school_up_03.php'"></td>
	</tr>

	<tr height="50px" style="display:<? if($a4_edu_total_money < 1){echo "none";} ?>">
		<td><font size="-1">四、發展原住民教育文化特色及充實設備器材</font></td>
		<td align="right" nowrap="newrap"><?=number_format($a4_edu_total_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a4_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a4_edu_total_money - $a4_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=$a4_percnet."%";?></td>
		<td align="center">
			<form action='effect_school_04.php' method='post'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button'   id='button'   value='執行情形'>
			</form>
		</td>
		<td align="center"><input type="button" value="上傳檔案" onClick="location='effect_school_up_04.php'"></td>
	</tr>

	<tr height="50px" style="display:<? if($a5_edu_total_money < 1){echo "none";} ?>">
		<td><font size="-1">五、補助交通不便地區學校交通車</font></td>
		<td align="right" nowrap="newrap"><?=number_format($a5_edu_total_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a5_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a5_edu_total_money - $a5_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=$a5_percnet."%";?></td>
		<td align="center">
			<form action='effect_school_05.php' method='post'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button'   id='button'   value='執行情形'>
			</form>
		</td>
		<td align="center"><input type="button" value="上傳檔案" onClick="location='effect_school_up_05.php'"></td>
	</tr>

	<tr height="50px" style="display:<? if($a6_edu_total_money < 1){echo "none";} ?>">
		<td><font size="-1">六、整修學校社區化活動場所</font></td>
		<td align="right" nowrap="newrap"><?=number_format($a6_edu_total_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a6_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=number_format($a6_edu_total_money - $a6_execute_money);?></td>
		<td align="right" nowrap="newrap"><?=$a6_percnet."%";?></td>
		<td align="center">
			<form action='effect_school_06.php' method='post'>
				<input type='hidden' name='main_seq' id='main_seq' value='<?=$main_seq;?>'>
				<input type='submit' name='button'   id='button'   value='執行情形'>
			</form>
		</td>
		<td align="center"><input type="button" value="上傳檔案" onClick="location='effect_school_up_06.php'"></td>
	</tr>

	<tr height="50px" align="center" bgcolor="#ACE5E5" style="display:<? if($sum_edu_total_money < 1){echo "none";} ?>">
		<td align="center">合計</td>
		<td align="right"><?=number_format($sum_edu_total_money);?></td>
		<td align="right"><?=number_format($sum_execute_money);?></td>
		<td align="right"><?=number_format($sum_edu_total_money - $sum_execute_money);?></td>
		<td align="right"><?=$sum_percnet."%";?></td>
		<td align="center">-</td>
		<td align="center">-</td>
	</tr>

</table>
<p>

<div style="display:<? if($sum_edu_total_money >= 1){echo "none";} ?>">
	<font color="blue">
		<b>
			貴校無核定補助項目，不須填寫執行成效。
		</b>
	</font>
	<p><hr><p>
</div>

說明 1：請點選「<font color="blue">執行情形</font>」及「<font color="blue">上傳檔案</font>」按鈕，填寫或上傳資料。<p>
說明 2：系統閒置安全保護十分鐘，若需長時間輸入資料，請由其他文件複製貼上。

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>