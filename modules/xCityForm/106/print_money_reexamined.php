<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_106.php"; //本年度基本設定

	$final_date = "2016-12-31";  // 學校填報的最後期限，選擇的日期不可比這個晚
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../city_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b>查詢被退件學校名單</b>

<p>
<hr>
<p>

<form action="new_end_date.php" method="post" name="form" onSubmit="return toCheck();">

	<table border="1">
		<tr height="50px" align="center">
			<td nowrap="nowrap">學校代碼</td>
			<td nowrap="nowrap">學校名稱</td>
			<td nowrap="nowrap">退件項目 / 審核委員</td>
			<td nowrap="nowrap">填報截止日期</td>
			<td nowrap="nowrap">個別延長填報期限</td>
		</tr>
		<?

			$sql =  "    SELECT    sd.account                                                                                    ".
					"         ,    sd.schooltype                                                                                 ".
					"         ,    sd.cityname                                                                                   ".
					"         ,    sd.district                                                                                   ".
					"         ,    sd.schoolname                                                                                 ".
					"         ,    sy.seq_no                                                                                     ".
					"         ,    a1.city_approved         AS a1_city_approved                                                  ".
					"         ,    a1.city_approved_id      AS a1_city_approved_id                                               ".
					"         ,    a2.city_approved         AS a2_city_approved                                                  ".
					"         ,    a2.city_approved_id      AS a2_city_approved_id                                               ".
					"         ,    a3.city_approved         AS a3_city_approved                                                  ".
					"         ,    a3.city_approved_id      AS a3_city_approved_id                                               ".
					"         ,    a4.city_approved         AS a4_city_approved                                                  ".
					"         ,    a4.city_approved_id      AS a4_city_approved_id                                               ".
					"         ,    a5.city_approved         AS a5_city_approved                                                  ".
					"         ,    a5.city_approved_id      AS a5_city_approved_id                                               ".
					"         ,    a6.city_approved         AS a6_city_approved                                                  ".
					"         ,    a6.city_approved_id      AS a6_city_approved_id                                               ".
					"         ,    tl.end_date                                                                                   ".
					"      FROM    schooldata               AS sd                                                                ".
					" LEFT JOIN    schooldata_year          AS sy ON sd.account = sy.account AND sy.school_year = '$school_year' ".
					" LEFT JOIN    alc_parenting_education  AS a1 ON sy.seq_no  = a1.sy_seq                                      ".
					" LEFT JOIN    alc_education_features   AS a2 ON sy.seq_no  = a2.sy_seq                                      ".
					" LEFT JOIN    alc_teaching_equipment   AS a3 ON sy.seq_no  = a3.sy_seq                                      ".
					" LEFT JOIN    alc_aboriginal_education AS a4 ON sy.seq_no  = a4.sy_seq                                      ".
					" LEFT JOIN    alc_transport_car        AS a5 ON sy.seq_no  = a5.sy_seq                                      ".
					" LEFT JOIN    alc_school_activity      AS a6 ON sy.seq_no  = a6.sy_seq                                      ".
					" LEFT JOIN    time_limit               AS tl ON sd.account = tl.account                                     ".
					"     WHERE (( sd.enabled      = 'Y'                                                                         ".
					"       AND    sd.create_year <= $school_year )                                                              ".
					"        OR  ( sd.enabled      = 'N'                                                                         ".
					"       AND    sd.create_year <= $school_year                                                                ".
					"       AND    sd.delete_year >= $school_year ))                                                             ".
					"       AND    sd.cityname     = '$cityname'                                                                 ".
					"       AND    tl.school_year  = $school_year                                                                ".
					"  ORDER BY    sd.account ASC                                                                                ";

			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result))
			{
				$account    = $row['account'];
				$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
				$cityname   = $row['cityname'];
				$district   = $row['district'];
				$schoolname = $row['schoolname'];

				$main_seq = $row['seq_no']; //sy.seq_no

				$a1_city_approved = $row['a1_city_approved'];
				$a2_city_approved = $row['a2_city_approved'];
				$a3_city_approved = $row['a3_city_approved'];
				$a4_city_approved = $row['a4_city_approved'];
				$a5_city_approved = $row['a5_city_approved'];
				$a6_city_approved = $row['a6_city_approved'];

				$a1_city_approved_id = $row['a1_city_approved_id'];
				$a2_city_approved_id = $row['a2_city_approved_id'];
				$a3_city_approved_id = $row['a3_city_approved_id'];
				$a4_city_approved_id = $row['a4_city_approved_id'];
				$a5_city_approved_id = $row['a5_city_approved_id'];
				$a6_city_approved_id = $row['a6_city_approved_id'];

				$end_date = $row['end_date'];

				// 有補助被退件才顯示
				if($a1_city_approved == 'N' || $a2_city_approved == 'N' || $a3_city_approved == 'N'
				|| $a4_city_approved == 'N'	|| $a5_city_approved == 'N' || $a6_city_approved == 'N' )
				{
					$str_link = "id=$account". //把連結要用的參數先串起來
								"&a1=$a1_city_approved".
								"&a2=$a2_city_approved".
								"&a3=$a3_city_approved".
								"&a4=$a4_city_approved".
								"&a5=$a5_city_approved".
								"&a6=$a6_city_approved";

					?>
						<tr height="50px" align="center">
							<td><?=$account;?><input type="hidden" name="account[]" value="<?=$account;?>"></td>
							<td><?=$district.$schoolname;?></td>
							<td>
							<?
								echo ($a1_city_approved == 'N') ? "<p>● 補助一 / ".$a1_city_approved_id : "";
								echo ($a2_city_approved == 'N') ? "<p>● 補助二 / ".$a2_city_approved_id : "";
								echo ($a3_city_approved == 'N') ? "<p>● 補助三 / ".$a3_city_approved_id : "";
								echo ($a4_city_approved == 'N') ? "<p>● 補助四 / ".$a4_city_approved_id : "";
								echo ($a5_city_approved == 'N') ? "<p>● 補助五 / ".$a5_city_approved_id : "";
								echo ($a6_city_approved == 'N') ? "<p>● 補助六 / ".$a6_city_approved_id : "";
							?>
							</td>
							<td><? echo date("Y-m-d", strtotime($end_date)); ?></td>
							<td><input type="button" name="button" value="個別延長填報期限" onClick="location.href='mail_school.php?<?=$str_link;?>'"></td>
						</tr>
					<?
					$count++;
				}
			}
		?>
		<tr height="50px" align="center">
			<td colspan="5">
				共計 <?=$count;?> 校，全部延長填報期限至
				<input type="text" name="new_end_date" size="12" id="new_end_date" value="<?=$all_end_date;?>">
				　<input type="submit" name="submit" value="　送 出　">
				<input type="hidden" name="school_year" value="<?=$school_year;?>">
			</td>
		</tr>
	</table><p>

	● <a href="print_money_reexamined_2.php" target="_self">列表寄送系統信件</a><p>

	<script language="JavaScript">
		function toCheck()
		{
			if ( document.form.new_end_date.value > "<?=$final_date;?>" )
			{
				alert("填報期限不得晚於<?=$final_date;?>");
				document.form.new_end_date.focus();
				return false;
			}
			return true;
		}
	</script>

	<script type="text/javascript" src="../datepicker/jquery.js"></script>
	<link rel="stylesheet" href="../datepicker/ui.datepicker.css" type="text/css" media="screen"/>
	<script src="../datepicker/jquery.js"></script>
	<script src="../datepicker/ui.datepicker.js" type="text/javascript" charset="utf-8"></script>

	<script type="text/javascript" charset="utf-8">
		//日曆
		jQuery
		(
			function($)
			{
				$('#new_end_date').datepicker({dateFormat: 'yy-mm-dd', showOn: 'both',
					buttonImageOnly: true, buttonImage: '../datepicker/calendar.gif'});
			}
		);
	</script>
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>