<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	$sql = 	"    SELECT sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sy.*                                                     ".
			"         , a1.s_total_money AS a1_money, a1.s_p1_money AS a1_p1_money, a1.s_p2_money AS a1_p2_money                                     ".
			"         , a2.s_total_money AS a2_money, a2.s_p1_money AS a2_p1_money, a2.s_p2_money AS a2_p2_money, a2.inherit_year AS a2_inherit_year ".
			"         , a3.s_total_money AS a3_money, a3.s_p1_money AS a3_p1_money                                                                   ".
			"         , a4.s_total_money AS a4_money, a4.s_p1_money AS a4_p1_money, a4.s_p2_money AS a4_p2_money, a4.inherit_year AS a4_inherit_year ".
			"         , a5.s_total_money AS a5_money, a5.s_money    AS a5_p1_money                                                                   ".
			"         , a6.s_total_money AS a6_money, a6.s_p1_money AS a6_p1_money                                                                   ".
			"      FROM schooldata               AS sd                                                                                               ".
			" LEFT JOIN schooldata_year          AS sy ON sd.account = sy.account                                                                    ".
			" LEFT JOIN alc_parenting_education  AS a1 ON sy.seq_no  = a1.sy_seq                                                                     ".
			" LEFT JOIN alc_education_features   AS a2 ON sy.seq_no  = a2.sy_seq                                                                     ".
			" LEFT JOIN alc_teaching_equipment   AS a3 ON sy.seq_no  = a3.sy_seq                                                                     ".
			" LEFT JOIN alc_aboriginal_education AS a4 ON sy.seq_no  = a4.sy_seq                                                                     ".
			" LEFT JOIN alc_transport_car        AS a5 ON sy.seq_no  = a5.sy_seq                                                                     ".
			" LEFT JOIN alc_school_activity      AS a6 ON sy.seq_no  = a6.sy_seq                                                                     ".
			"     WHERE sy.school_year = '$school_year'                                                                                              ".
			"       AND sd.account     = '$username'                                                                                                 ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account    = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   = $row['cityname'];
		$district   = $row['district'];
		$schoolname = $row['schoolname'];

		$student = $row['student'];

		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving'];
		$page3_warning    =  $row['page3_warning'];

		$sy_seq = $row['seq_no'];  // school_year 的 seq_no

		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money'];  // NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];

		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money'];
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money'];

		$a2_p1_money = ($row['a2_p1_money'] == '')?0:$row['a2_p1_money'];
		$a2_p2_money = ($row['a2_p2_money'] == '')?0:$row['a2_p2_money'];

		$a4_p1_money = ($row['a4_p1_money'] == '')?0:$row['a4_p1_money'];
		$a4_p2_money = ($row['a4_p2_money'] == '')?0:$row['a4_p2_money'];

		$a2_inherit_year = $row['a2_inherit_year'];
		$a4_inherit_year = $row['a4_inherit_year'];

		$keep = $row['keep'];

		$applied = $row['applied'];             // 已申請
		$applied_ary = explode(",", $applied);  // 已申請的補助
	}

	$sql =  " SELECT *                  ".
			"   FROM school_upload_name ".
			"  WHERE sy_seq = '$sy_seq' ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
		$a2_1 = $row['a2_1'];
		$a2_2 = $row['a2_2'];
		$a3_1 = $row['a3_1'];
		$a3_2 = $row['a3_2'];
		$a4_1 = $row['a4_1'];
		$a4_2 = $row['a4_2'];
		$a5_1 = $row['a5_1'];
		$a5_2 = $row['a5_2'];
		$a5_3 = $row['a5_3'];
		$a6_1 = $row['a6_1'];
		$final_1 = $row['final_1'];
		$final_2 = $row['final_2'];
	}

	$checkfinish = 1;  // 是否已上傳應上傳檔案

    /* 區分公開路徑$file_path及可能含個資$file_path2 */
	$file_path  = '/epa_uploads/'.$school_year.'/pub/'.$username.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$username.'/';
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

<b><?=$school_year;?>年度 填報申請狀態</b>

<p>
<hr>
<p>

<table border="2" cellpadding="10">
	<tr height="50px" bgcolor="#BDE1FF">
		<td>
			經校長核章之檔案
		</td>
	</tr>
	<tr>
		<td>
			<?
				if ($final_1 == '')
				{
					echo "1. <font color=red>[未上傳] 指標界定調查紀錄表（表 I～1）</font>";
					$checkfinish = 0;
				}
				else
				{
					echo "1. <font color='blue'>[已上傳]</font> <a href='".$file_path.$final_1."' target='_new'><b>指標界定調查紀錄表（表 I～1）</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
				}
			?>
			<p>
			<hr>
			<p>
			<?
				if ($final_2 == '')
				{
					echo "2. <font color=red>[未上傳] 補助項目經費需求彙整表（表 I～2）</font>";
					$checkfinish = 0;
				}
				else
				{
					echo "2. <font color='blue'>[已上傳]</font> <a href='".$file_path.$final_2."' target='_new'><b>補助項目經費需求彙整表（表 I～2）</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
				}
			?>
		</td>
	</tr>
</table>
<p>

<table border="2" cellpadding="10">
	<tr height="50px" bgcolor="#BDE1FF">
		<td colspan="2">
			補助項目填報及檔案上傳狀態<font size="-2">（僅列出貴校有申請的補助項目）</font>
		</td>
	</tr>
	<?
		for($i = 0; $i < count($applied_ary); $i++)
		{
			switch($applied_ary[$i])
			{
				case "a1":
					{
						echo '<tr>';

							echo '<td>';

								echo '<b>● 補助項目一：推展親職教育活動</b><p>';

								if($a1_p1_money > 0)  // 沒申請的不需上傳
								{
									if($a1_1 == '')
									{
										echo "<font color=red>[未上傳] 親職教育講座實施計畫</font>";
										$checkfinish = 0;
									}
									else
									{
										echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a1_1."' target='_new'><b>親職教育講座實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
									}
									echo "<p>";
								}

								if($a1_p2_money > 0)
								{
									if($a1_2 == '')
									{
										echo "<font color=red>[未上傳] 家庭訪視實施計畫</font>";
										$checkfinish = 0;
									}
									else
									{
										echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a1_2."' target='_new'><b>家庭訪視實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
									}
									echo "<p>";
								}

							echo '</td>';

							echo '<td align="center" nowrap="nowrap">';

								if($a1_money > 0)
								{
									echo "經費已填寫 <img src='/edu/images/yes.png' align='absmiddle'/><p>";
									echo "<a href='school_funds.php?op=1' target='_blank'>列印經費表 <img src='/edu/images/print.png' align='absmiddle'/></a>";
								}
								else
								{
									echo "<font color='red'>經費未填寫</font> <img src='/edu/images/print.png' align='absmiddle'/>";
								}

							echo '</td>';

						echo '</tr>';

						if($a1_money == 0) $checkfinish = 0;

						break;
					}

				case "a2":
					{
						echo '<tr>';

							echo '<td>';

								echo '<b>● 補助項目二：學校發展教育特色</b><p>';

								if($a2_p1_money > 0)
								{
									if($a2_inherit_year == '104' || $a2_inherit_year == '105') // 判別是否沿用(不含change，change要重新上傳檔案)
									{
										echo "特色一實施計畫：<font color=blue>沿用".$a2_inherit_year."年度計畫</font> <img src='/edu/images/yes.png' align='absmiddle'/>";
									}
									elseif($a2_1 == '')
									{
										echo "<font color=red>[未上傳] 特色一實施計畫</font>";
										$checkfinish = 0;
									}
									else
									{
										echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a2_1."' target='_new'><b>特色一實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
									}
									echo "<p>";
								}

								if($a2_p2_money > 0)
								{
									if($a2_inherit_year == '104' || $a2_inherit_year == '105')
									{
										echo "特色二實施計畫：<font color=blue>沿用".$a2_inherit_year."年度計畫</font> <img src='/edu/images/yes.png' align='absmiddle'/>";
									}
									elseif($a2_2 == '')
									{
										echo "<font color=red>[未上傳] 特色二實施計畫</font>";
										$checkfinish = 0;
									}
									else
									{
										echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a2_2."' target='_new'><b>特色二實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
									}
									echo "<p>";
								}

							echo '</td>';

							echo '<td align="center" nowrap="nowrap">';

								if($a2_money > 0)
								{
									echo "經費已填寫 <img src='/edu/images/yes.png' align='absmiddle'/><p>";
									echo "<a href='school_funds.php?op=2' target='_blank'>列印經費表 <img src='/edu/images/print.png' align='absmiddle'/></a>";
								}
								else
								{
									echo "<font color='red'>經費未填寫</font> <img src='/edu/images/print.png' align='absmiddle'/>";
								}

							echo '</td>';

						echo '</tr>';

						if($a2_money == 0) $checkfinish = 0;

						break;
					}

				case "a3":
					{
						echo '<tr>';

							echo '<td>';

								echo '<b>● 補助項目三：充實學校基本教學設備</b><p>';

								if($a3_1 == '')
								{
									echo "<font color=red>[未上傳] 實施計畫</font>";
									$checkfinish = 0;
								}
								else
								{
									echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a3_1."' target='_new'><b>實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
								}
								echo "<p>";

								if($a3_2 == '')
								{
									echo "<font color=red>[未上傳] 領域小組會議紀錄</font>";
									$checkfinish = 0;
								}
								else
								{
									echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a3_2."' target='_new'><b>領域小組會議紀錄</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
								}
								echo "<p>";

							echo '</td>';

							echo '<td align="center" nowrap="nowrap">';

								if($a3_money > 0)
								{
									echo "經費已填寫 <img src='/edu/images/yes.png' align='absmiddle'/><p>";
									echo "<a href='school_funds.php?op=3' target='_blank'>列印經費表 <img src='/edu/images/print.png' align='absmiddle'/></a>";
								}
								else
								{
									echo "<font color='red'>經費未填寫</font> <img src='/edu/images/print.png' align='absmiddle'/>";
								}

							echo '</td>';

						echo '</tr>';

						if($a3_money == 0) $checkfinish = 0;

						break;
					}

				case "a4":
					{
						echo '<tr>';

							echo '<td>';

								echo '<b>● 補助項目四：發展原住民教育文化特色及充實設備器材</b><p>';

								if($a4_p1_money > 0)
								{
									if($a4_inherit_year == '104' || $a4_inherit_year == '105') // 判別是否沿用(不含change，change要重新上傳檔案)
									{
										echo "特色一實施計畫：<font color=blue>沿用".$a4_inherit_year."年度計畫</font> <img src='/edu/images/yes.png' align='absmiddle'/>";
									}
									elseif($a4_1 == '')
									{
										echo "<font color=red>[未上傳] 特色一實施計畫</font>";
										$checkfinish = 0;
									}
									else
									{
										echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a4_1."' target='_new'><b>特色一實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
									}
									echo "<p>";
								}

								if($a4_p2_money > 0)
								{
									if($a4_inherit_year == '104' || $a4_inherit_year == '105')
									{
										echo "特色二實施計畫：<font color=blue>沿用".$a4_inherit_year."年度計畫</font> <img src='/edu/images/yes.png' align='absmiddle'/>";
									}
									elseif($a4_2 == '')
									{
										echo "<font color=red>[未上傳] 特色二實施計畫</font>";
										$checkfinish = 0;
									}
									else
									{
										echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a4_2."' target='_new'><b>特色二實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
									}
									echo "<p>";
								}

							echo '</td>';

							echo '<td align="center" nowrap="nowrap">';

								if($a4_money > 0)
								{
									echo "經費已填寫 <img src='/edu/images/yes.png' align='absmiddle'/><p>";
									echo "<a href='school_funds.php?op=4' target='_blank'>列印經費表 <img src='/edu/images/print.png' align='absmiddle'/></a>";
								}
								else
								{
									echo "<font color='red'>經費未填寫</font> <img src='/edu/images/print.png' align='absmiddle'/>";
								}

							echo '</td>';

						echo '</tr>';

						if($a4_money == 0) $checkfinish = 0;

						break;
					}

				case "a5":
					{
						echo '<tr>';

							echo '<td>';

								echo '<b>● 補助項目五：交通不便地區學校交通車</b><p>';

								if($a5_1 == '')
								{
									echo "<font color=red>[未上傳] 實施計畫</font>";
									$checkfinish = 0;
								}
								else
								{
									echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a5_1."' target='_new'><b>實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
								}
								echo "<p>";

								if($a5_2 == '')
								{
									echo "<font color=red>[未上傳] 各搭車路線學生名冊</font>";
									$checkfinish = 0;
								}
								else
								{
									echo "<font color='blue'>[已上傳]</font> 各搭車路線學生名冊 <img src='/edu/images/yes.png' align='absmiddle'/><br>";
									echo "　　　　<font size='-2'>（此文件內含個資，上傳後即可，不提供下載）</font>";
								}
								echo "<p>";

								if($a5_3 == '')
								{
									echo "<font color=red>[未上傳] 學校現有交通車調查表</font>";
									$checkfinish = 0;
								}
								else
								{
									echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a5_3."' target='_new'><b>學校現有交通車調查表</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
								}
								echo "<p>";

							echo '</td>';

							echo '<td align="center" nowrap="nowrap">';

								if($a5_money > 0)
								{
									echo "經費已填寫 <img src='/edu/images/yes.png' align='absmiddle'/><p>";
									echo "<a href='school_funds.php?op=5' target='_blank'>列印經費表 <img src='/edu/images/print.png' align='absmiddle'/></a>";
								}
								else
								{
									echo "<font color='red'>經費未填寫</font> <img src='/edu/images/print.png' align='absmiddle'/>";
								}

							echo '</td>';

						echo '</tr>';

						if($a5_money == 0) $checkfinish = 0;

						break;
					}

				case "a6":
					{
						echo '<tr>';

							echo '<td>';

								echo '<b>● 補助項目六：整修學校社區化活動場所</b><p>';

								if($a6_1 == '')
								{
									echo "<font color=red>[未上傳] 實施計畫</font>";
									$checkfinish = 0;
								}
								else
								{
									echo "<font color='blue'>[已上傳]</font> <a href='".$file_path.$a6_1."' target='_new'><b>實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
								}
								echo "<p>";

							echo '</td>';

							echo '<td align="center" nowrap="nowrap">';

								if($a6_money > 0)
								{
									echo "經費已填寫 <img src='/edu/images/yes.png' align='absmiddle'/><p>";
									echo "<a href='school_funds.php?op=6' target='_blank'>列印經費表 <img src='/edu/images/print.png' align='absmiddle'/></a>";
								}
								else
								{
									echo "<font color='red'>經費未填寫</font> <img src='/edu/images/print.png' align='absmiddle'/>";
								}

							echo '</td>';

						echo '</tr>';

						if($a6_money == 0) $checkfinish = 0;

						break;
					}

				default:
					break;
			}
		}
	?>
</table>

<p>
<p>

<?
	if($checkfinish == 1)
	{
		echo "<font color=blue>● 貴校已完成填報。</font>";
		echo "<img src='/edu/images/yes.png' align='absmiddle'/>";
	}
	else
	{
		echo "<font color=red>";
		echo "● 貴校尚未完成填報，請檢視是否有未填經費或未上傳檔案。";
		echo "</font>";
	}
?>

<p>

<input type="button" name="Submit" value=" 完成，回主選單 " onclick="location.href='../school_index.php'" style='height:30px;'><p>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
<!-- <input TYPE="button" VALUE="回上一頁" onclick="history.go(-1)"> -->
<table bgcolor=#BDE1FF">
	<? if($page3_warning == ''){echo "<!--";} ?>
	<tr>
		<td style="background-color:#BDE1FF">
			<p><p><b>● 目標學生名冊</b>
		</td>
	</tr>
	<tr>
		<td>
			<p><p>
			<?
			if($point2 == '' && $page3_warning != '')
			{
				echo "目標學生名冊：<font color=red>未上傳</font>";
				$checkfinish = 0;
			}
			else
			{
				echo "目標學生名冊：<font color=blue>已上傳</font>（此文件內含個資，上傳後即可，不提供下載）";
			}
			?>
		</td>
	</tr>
	<? if($page3_warning == ''){echo "-->";} ?>
</table>
*/
?>