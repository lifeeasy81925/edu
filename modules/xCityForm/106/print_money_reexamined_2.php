<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_106.php"; //本年度基本設定

	$final_date = "2016-12-31";  // 學校填報的最後期限，選擇的日期不可比這個晚
	
	/* 使用者資料 */

	$sql = 	"    SELECT user_from           ".
			"         , user_occ            ".
			"         , user_icq            ".
			"         , email               ".
			"      FROM edu_users           ".
			"     WHERE uname = '$username' ";

	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		$u_user_from = $row['user_from'];
		$u_user_occ  = $row['user_occ'];
		$u_user_icq  = $row['user_icq'];
		$u_email     = $row['email'];
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="print_money_reexamined.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

查詢被退件學校名單 / <b>列表寄送系統信件</b>

<p>
<hr>
<p>

<form action="mail_send_2.php" method="post" name="form" onSubmit="return confirm('寄送信件可能需要數分鐘的作業時間，您確定要寄送信件嗎？\n');">

	<table border="1">
		<tr height="50px" align="center">
			<td>學校代碼</td>
			<td>學校名稱</td>
			<td>電子信箱</td>
		</tr>
		<?

			$sql =  "    SELECT    sd.account                                                                                    ".
					"         ,    sd.schooltype                                                                                 ".
					"         ,    sd.cityname                                                                                   ".
					"         ,    sd.district                                                                                   ".
					"         ,    sd.schoolname                                                                                 ".
					"         ,    sy.seq_no                                                                                     ".
					"         ,    ur.email                                                                                      ".
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
					" LEFT JOIN    edu_users                AS ur ON sd.account = ur.uname                                       ".
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

				$user_email = $row['email'];

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
							<td>
								<?=$account;?>
								<input type="hidden" name="account[]"  value="<?=$account;?>">
							</td>
							<td>
								<?=$district.$schoolname;?>
								<input type="hidden" name="cityname[]"  value="<?=$cityname;?>">
								<input type="hidden" name="district[]"  value="<?=$district;?>">
								<input type="hidden" name="schoolname[]"  value="<?=$schoolname;?>">
							</td>
							<td>
								<?=$user_email;?>
								<input type="hidden" name="user_email[]" value="<?=$user_email;?>">
							</td>
						</tr>
					<?
					$count++;
				}
			}
		?>
		<tr height="50px" align="center">
			<td colspan="3">
				E-Mail 通知內容：（內容可自行修改，信件一式寄發給上列所有學校。）
			</td>
		</tr>
		<tr align="center">		
			<td colspan="3">
				<textarea name="mail_content" cols="80" rows="20"><? $newLine = chr(13).chr(10);  // textarea換行符號 ?>
您好：<?=$newLine;?><?=$newLine;?>
貴校申請教育優先區補助資料初審未通過，請盡速至教育優先區填報網站修正申請文件。<?=$newLine;?><?=$newLine;?>

------------------------------<?=$newLine;?>
<?=$cityname;?>政府教育局(處) 教育優先區初審小組<?=$newLine;?>
聯絡人：<?=$u_user_from;?>（<?=$u_user_occ;?>）<?=$newLine;?>
聯絡電話：<?=$u_user_icq;?><?=$newLine;?>
電子信箱：<?=$u_email;?><?=$newLine;?>
教育優先區填報網站：https://epa.ntcu.edu.tw<?=$newLine;?>
退件通知日期：<? echo date("Y-m-d"); ?><?=$newLine;?></textarea>
			</td>
		</tr>
		<tr height="50px" align="center">
			<td colspan="3">
				<input type="submit" name="submit" value="　寄 信　" style="size:+2">
			</td>
		</tr>
	</table>
	
	<input type="hidden" name="school_year" value="<?=$school_year;?>">

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

<?
/*
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
*/
?>