<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , a1.s_total_money as a1_money        ".
		   "      , a2.s_total_money as a2_money        ".
		   "      , a3.s_total_money as a3_money        ".
		   "      , a4.s_total_money as a4_money        ".
		   "      , a5.s_total_money as a5_money        ".
		   "      , a6.s_total_money as a6_money        ".
		   "      , a2.inherit_year  as a2_inherit_year ".
	       "      , a4.inherit_year  as a4_inherit_year ".
		   "      , a2.s_p1_student  as a2_p1_student   ".
		   "      , a4.s_p1_student  as a4_p1_student   ".

		   // 去年資料的資料表
		   "      , a2_ly.edu_total_money     as a2_money_ly     ".
		   "      , a2_ly.edu_total_money_ny1 as a2_money_ny1_ly ".
		   "      , a2_ly.edu_total_money_ny2 as a2_money_ny2_ly ".
		   "      , a4_ly.edu_total_money     as a4_money_ly     ".
		   "      , a4_ly.edu_total_money_ny1 as a4_money_ny1_ly ".
		   "      , a4_ly.edu_total_money_ny2 as a4_money_ny2_ly ".

		   " from schooldata as sd left join schooldata_year           as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education   as a1 on sy.seq_no  = a1.sy_seq  ".
		   "                       left join alc_education_features    as a2 on sy.seq_no  = a2.sy_seq  ".
		   "                       left join alc_teaching_equipment    as a3 on sy.seq_no  = a3.sy_seq  ".
		   "                       left join alc_aboriginal_education  as a4 on sy.seq_no  = a4.sy_seq  ".
		   "                       left join alc_transport_car         as a5 on sy.seq_no  = a5.sy_seq  ".
		   "                       left join alc_school_activity       as a6 on sy.seq_no  = a6.sy_seq  ".

		   // 去年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ".
		   "                       left join $a2_table_name as a2_ly on sy_ly.seq_no = a2_ly.sy_seq ".
		   "                       left join $a4_table_name as a4_ly on sy_ly.seq_no = a4_ly.sy_seq ".

		   " where sy.school_year = '$school_year' ".
		   "   and sd.account     = '$username'    ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account    = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   = $row['cityname'];
		$district   = $row['district'];
		$schoolname = $row['schoolname'];
		$area       = $row['area'];

		$student = $row['student'];
		$applied = $row['applied'];
		$applied_ary = explode(",", $applied);  // 已申請的補助

		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money'];  // NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];

		$a2_p1_student   = $row['a2_p1_student'];
		$a4_p1_student   = $row['a4_p1_student'];
		$a2_inherit_year = $row['a2_inherit_year'];
		$a4_inherit_year = $row['a4_inherit_year'];

		$a2_money_ly     = $row['a2_money_ly'];
		$a2_money_ny1_ly = $row['a2_money_ny1_ly'];
		$a2_money_ny2_ly = $row['a2_money_ny2_ly'];

		$a4_money_ly     = $row['a4_money_ly'];
		$a4_money_ny1_ly = $row['a4_money_ny1_ly'];
		$a4_money_ny2_ly = $row['a4_money_ny2_ly'];
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="school_select_allowance.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

申請補助經費 / <b>填寫經費</b>

<p>
<hr>
<p>

● 欲申請的補助項目：<p>

<table border="1" cellspacing="0" cellpadding="0">

  <tr height="50px">
    <td align="center" bgcolor="skyblue" style="width:70%;">項目名稱</td>
    <td align="center" bgcolor="skyblue" style="width:15%;;">填寫狀態</td>
	<td align="center" bgcolor="skyblue" style="width:15%;;">填寫經費</td>
  </tr>

<?
	for($i = 0; $i < count($applied_ary); $i++)
	{
		switch($applied_ary[$i])
		{
			case "a1":
?>
				<tr height="50px">
					<td>
						補助項目一：推展親職教育活動
					</td>
					<td align="center">
						<?
							echo ($a1_money > 0)? "<font color='blue'>已填寫</font>" : "<font color='red'>未填寫</font>" ;
						?>
					</td>
					<td align="center">
						<input type="button" value="進入" onClick="location='school_write_a1.php'">
					</td>
				</tr>
<?
				break;

			case "a2":
?>
				<tr height="50px">
					<td>
						補助項目二：學校發展教育特色
					</td>
					<td align="center">

<?
					/*
												        ┌--> a2_conti.php -----┐
					┌--> 可沿用計畫 --> a2_insert.php --|				 	   | a2_cahnge.php(修正計畫)(inherit附註change)
					|							        └--> a2_conti_3.php <--┘
					└--> 無沿用計畫 --> a2.php(標準三年)

					*/

					if(($a2_money_ly > 0) && ($a2_money_ny1_ly > 0))  // 去年複審有錢，且去年的次年度計畫複審也有錢，代表有可沿用的計畫。
					{
						if((($a2_inherit_year == '104' ) || ($a2_inherit_year == '105' ))&& ($a2_money > 0))  // 沿用計畫
						{
							echo "<font color='blue'>已填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a2_conti.php'">
							</td>
<?
						}
						elseif((($a2_inherit_year == '104_change') || ($a2_inherit_year == '105_change')) && ($a2_money > 0))  // 沿用，但修正計畫
						{
							echo "<font color='blue'>已填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a2_conti_3.php'">
							</td>
<?
						}
						elseif ($a2_money == 0 || $a2_money == null)  // 初次進來，先Insert資料
						{
							echo "<font color='red'>未填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a2_insert.php'">
							</td>
<?
						}
						else
						{
							echo "<font color='red'>錯誤！</font>";  // 例外處理，但此情況不會發生。
						}
					}
					else  // 沒有可以沿用的計畫，就重頭寫新的。
					{
					   echo ($a2_money > 0)? "<font color='blue'>已填寫</font>" : "<font color='red'>未填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a2.php'">
							</td>
<?
					}
?>
				</tr>
<?
				break;

			case "a3":
?>
				<tr height="50px">
					<td>
						補助項目三：充實學校基本教學設備
					</td>
					<td align="center">
						<?
							echo ($a3_money > 0)? "<font color='blue'>已填寫</font>" : "<font color='red'>未填寫</font>";
						?>
					</td>
					<td align="center">
							<input type="button" value="進入" onClick="location='school_write_a3.php'">
					</td>
				</tr>
<?
				break;

			case "a4":
?>
				<tr height="50px">
					<td>
						補助項目四：發展原住民教育文化特色及充實設備器材
					</td>
					<td align="center">

<?
					if(($a4_money_ly > 0) && ($a4_money_ny1_ly > 0))  // 去年複審有錢，且去年的次年度計畫複審也有錢，代表有可沿用的計畫。
					{
						if((($a4_inherit_year == '104' ) || ($a4_inherit_year == '105' ))&& ($a4_money > 0))  // 沿用計畫
						{
							echo "<font color='blue'>已填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a4_conti.php'">
							</td>
<?
						}
						elseif((($a4_inherit_year == '104_change') || ($a4_inherit_year == '105_change')) && ($a4_money > 0))  // 沿用，但修正計畫
						{
							echo "<font color='blue'>已填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a4_conti_3.php'">
							</td>
<?
						}
						elseif ($a4_money == 0 || $a4_money == null)  // 初次進來，先Insert資料
						{
							echo "<font color='red'>未填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a4_insert.php'">
							</td>
<?
						}
						else
						{
							echo "<font color='red'>錯誤！</font>";  // 例外處理，但此情況不會發生。
						}
					}
					else  // 沒有可以沿用的計畫，就重頭寫新的。
					{
					   echo ($a4_money > 0)? "<font color='blue'>已填寫</font>" : "<font color='red'>未填寫</font>";
?>
							</td>
							<td align="center">
								<input type="button" value="進入" onClick="location='school_write_a4.php'">
							</td>
<?
					}
?>
				</tr>
<?
				break;

			case "a5":
?>
				<tr height="50px">
					<td>
						補助項目五：交通不便地區學校交通車
					</td>
					<td align="center">
						<?
							echo ($a5_money > 0)? "<font color='blue'>已填寫</font>" : "<font color='red'>未填寫</font>";
						?>
					</td>
					<td align="center">
							<input type="button" value="進入" onClick="location='school_write_a5.php'">
					</td>
				</tr>
<?
				break;

			case "a6":
?>
				<tr height="50px">
					<td>
						補助項目六：整修學校社區化活動場所
					</td>
					<td align="center">
						<?
							echo ($a6_money > 0)? "<font color='blue'>已填寫</font>" : "<font color='red'>未填寫</font>";
						?>
					</td>
					<td align="center">
							<input type="button" value="進入" onClick="location='school_write_a6.php'">
					</td>
				</tr>
<?
				break;

			default:
				echo "";
		}
	}
?>

</table>
<p>

說明：按 F5 重新整理，可更新申請狀態。<p>

<input type="button" name="Submit" value="下一步，列印表單" onclick="location.href='school_write_allowance_print.php'"><p>

<input type="hidden" name="school_year" value="<?=$school_year;?>">

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
// include "../../function/button_print.php";  // 列印本頁
<!-- <input type="button" name="Submit" value="前往上傳檔案專區" onclick="location.href='school_upload_file.php'"> -->
*/
?>