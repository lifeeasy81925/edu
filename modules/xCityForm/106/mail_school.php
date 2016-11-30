<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	date_default_timezone_set('Asia/Taipei');  // 台北時區

	include "../../function/config_for_106.php";  // 本年度基本設定

	$final_date = "2016-12-31";  // 學校填報的最後期限，選擇的日期不可比這個晚

	$id = $_GET["id"];

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

	/* 學校資料 */

	$sql = 	"    SELECT sd.account                                                                                                                                                            ".
			"         , sd.schooltype                                                                                                                                                         ".
			"         , sd.cityname                                                                                                                                                           ".
			"         , sd.district                                                                                                                                                           ".
			"         , sd.schoolname                                                                                                                                                         ".
			"         , sy.seq_no                                                                                                                                                             ".
			"         , u.user_from, u.email, u.user_occ, u.user_icq, u.user_aim, u.user_yim                                                                                                  ".
			"         , a1.city_approved AS a1_city_approved, a1.city_approved_id AS a1_city_approved_id, (SELECT u.email FROM edu_users AS u WHERE u.uname = a1.city_approved_id) AS a1_mail ".
			"         , a2.city_approved AS a2_city_approved, a2.city_approved_id AS a2_city_approved_id, (SELECT u.email FROM edu_users AS u WHERE u.uname = a2.city_approved_id) AS a2_mail ".
			"         , a3.city_approved AS a3_city_approved, a3.city_approved_id AS a3_city_approved_id, (SELECT u.email FROM edu_users AS u WHERE u.uname = a3.city_approved_id) AS a3_mail ".
			"         , a4.city_approved AS a4_city_approved, a4.city_approved_id AS a4_city_approved_id, (SELECT u.email FROM edu_users AS u WHERE u.uname = a4.city_approved_id) AS a4_mail ".
			"         , a5.city_approved AS a5_city_approved, a5.city_approved_id AS a5_city_approved_id, (SELECT u.email FROM edu_users AS u WHERE u.uname = a5.city_approved_id) AS a5_mail ".
			"         , a6.city_approved AS a6_city_approved, a6.city_approved_id AS a6_city_approved_id, (SELECT u.email FROM edu_users AS u WHERE u.uname = a6.city_approved_id) AS a6_mail ".
			"         , tl.start_date                                                                                                                                                         ".
			"         , tl.end_date                                                                                                                                                           ".  // 學校填報期限
			"         , a1.city_desc             AS a1_city_desc                                                                                                                              ".  // 縣市審核意見
			"         , a2.city_desc             AS a2_city_desc                                                                                                                              ".
			"         , a2.city_desc_ny1         AS a2_city_desc_ny1                                                                                                                          ".
			"         , a2.city_desc_ny2         AS a2_city_desc_ny2                                                                                                                          ".
			"         , a2.city_desc_p2          AS a2_city_desc_p2                                                                                                                           ".
			"         , a2.city_desc_ny1_p2      AS a2_city_desc_ny1_p2                                                                                                                       ".
			"         , a2.city_desc_ny2_p2      AS a2_city_desc_ny2_p2                                                                                                                       ".
			"         , a3.city_desc             AS a3_city_desc                                                                                                                              ".
			"         , a4.city_desc             AS a4_city_desc                                                                                                                              ".
			"         , a4.city_desc_ny1         AS a4_city_desc_ny1                                                                                                                          ".
			"         , a4.city_desc_ny2         AS a4_city_desc_ny2                                                                                                                          ".
			"         , a4.city_desc_p2          AS a4_city_desc_p2                                                                                                                           ".
			"         , a4.city_desc_ny1_p2      AS a4_city_desc_ny1_p2                                                                                                                       ".
			"         , a4.city_desc_ny2_p2      AS a4_city_desc_ny2_p2                                                                                                                       ".
			"         , a5.city_desc             AS a5_city_desc                                                                                                                              ".
			"         , a6.city_desc             AS a6_city_desc                                                                                                                              ".
			"      FROM schooldata               AS sd                                                                                                                                        ".
			" LEFT JOIN schooldata_year          AS sy ON sd.account = sy.account                                                                                                             ".
			" LEFT JOIN alc_parenting_education  AS a1 ON sy.seq_no  = a1.sy_seq                                                                                                              ".
			" LEFT JOIN alc_education_features   AS a2 ON sy.seq_no  = a2.sy_seq                                                                                                              ".
			" LEFT JOIN alc_teaching_equipment   AS a3 ON sy.seq_no  = a3.sy_seq                                                                                                              ".
			" LEFT JOIN alc_aboriginal_education AS a4 ON sy.seq_no  = a4.sy_seq                                                                                                              ".
			" LEFT JOIN alc_transport_car        AS a5 ON sy.seq_no  = a5.sy_seq                                                                                                              ".
			" LEFT JOIN alc_school_activity      AS a6 ON sy.seq_no  = a6.sy_seq                                                                                                              ".
			" LEFT JOIN time_limit               AS tl ON sd.account = tl.account AND tl.school_year = '$school_year'                                                                         ".
			" LEFT JOIN edu_users                AS u  ON sd.account = u.uname                                                                                                                ".
			"     WHERE sy.school_year = '$school_year'                                                                                                                                       ".
			"       AND sd.account     = '$id'                                                                                                                                                ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$account    =  $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   =  $row['cityname'];
		$district   =  $row['district'];
		$schoolname =  $row['schoolname'];

		$main_seq = $row['seq_no']; //sy.seq_no

		$user_from  = $row['user_from'];  // 學校承辦人姓名
		$user_email = $row['email'];      // E-mail
		$user_occ   = $row['user_occ'];   // 單位及職稱
		$user_icq   = $row['user_icq'];   // 聯絡電話
		$user_aim   = $row['user_aim'];   // 傳真/備用
		$user_yim   = $row['user_yim'];   // 行動電話

		$a1_city_approved = $row['a1_city_approved'];
		$a2_city_approved = $row['a2_city_approved'];
		$a3_city_approved = $row['a3_city_approved'];
		$a4_city_approved = $row['a4_city_approved'];
		$a5_city_approved = $row['a5_city_approved'];
		$a6_city_approved = $row['a6_city_approved'];

		$a1_city_approved_id = $row['a1_city_approved_id']; //審核者帳號
		$a2_city_approved_id = $row['a2_city_approved_id'];
		$a3_city_approved_id = $row['a3_city_approved_id'];
		$a4_city_approved_id = $row['a4_city_approved_id'];
		$a5_city_approved_id = $row['a5_city_approved_id'];
		$a6_city_approved_id = $row['a6_city_approved_id'];

		$a1_mail = $row['a1_mail']; //審核者E-mail
		$a2_mail = $row['a2_mail'];
		$a3_mail = $row['a3_mail'];
		$a4_mail = $row['a4_mail'];
		$a5_mail = $row['a5_mail'];
		$a6_mail = $row['a6_mail'];

		/* 縣市審核意見 */

		$a1_city_desc        = $row['a1_city_desc'];
		$a2_city_desc        = $row['a2_city_desc'];
		$a2_city_desc_ny1    = $row['a2_city_desc_ny1'];
		$a2_city_desc_ny2    = $row['a2_city_desc_ny2'];
		$a2_city_desc_p2     = $row['a2_city_desc_p2'];
		$a2_city_desc_ny1_p2 = $row['a2_city_desc_ny1_p2'];
		$a2_city_desc_ny2_p2 = $row['a2_city_desc_ny2_p2'];
		$a3_city_desc        = $row['a3_city_desc'];
		$a4_city_desc        = $row['a4_city_desc'];
		$a4_city_desc_ny1    = $row['a4_city_desc_ny1'];
		$a4_city_desc_ny2    = $row['a4_city_desc_ny2'];
		$a4_city_desc_p2     = $row['a4_city_desc_p2'];
		$a4_city_desc_ny1_p2 = $row['a4_city_desc_ny1_p2'];
		$a4_city_desc_ny2_p2 = $row['a4_city_desc_ny2_p2'];
		$a5_city_desc        = $row['a5_city_desc'];
		$a6_city_desc        = $row['a6_city_desc'];

  		$start_date = $row['start_date'];
		$end_date = date("Y-m-d", strtotime($row['end_date']));//結束日期
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

查詢被退件學校名單 / <b>個別延長期限</b>

<p>
<hr>
<p>

<form action="mail_send.php" method="post" name="form" onSubmit="return toCheck();">
	<table border="1" cellpadding="5">
		<tr height="40px">
			<td style="width:30%; text-align:right;">學校名稱：</td>
			<td><?=$account." ".$district.$schoolname;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">收件人姓名：</td>
			<td><?=$user_from;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">單位及職稱：</td>
			<td><?=$user_occ;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">電子信箱：</td>
			<td><?=$user_email;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">聯絡電話：</td>
			<td><?=$user_icq;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">傳真/備用：</td>
			<td><?=$user_aim;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">行動電話：</td>
			<td><?=$user_yim;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">原填報截止日期：</td>
			<td><?=$end_date;?></td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:right;">延長填報日期至：</td>
			<td><input name="new_end_date" type="text" size="12" id="new_end_date" value="<?=$end_date;?>"><font color=blue> * 縣市自選日期</font>（限 <?=$final_date;?> 前）</td>
		</tr>
		<tr height="40px">
			<td style="width:30%; text-align:center;" colspan="2">
				E-Mail 通知內容：（內容可自行修改，如加列審核結果或聯繫方式……等）
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<textarea name="mail_content" cols="80" rows="20"><? $newLine = chr(13).chr(10);  // textarea換行符號 ?>
<?=$account;?> <?=$district.$schoolname;?> <?=$user_occ;?> <?=$user_from;?> 您好：<?=$newLine;?><?=$newLine;?>
貴校申請教育優先區補助資料初審未通過，請於期限內至教育優先區填報網站修正申請文件。<?=$newLine;?><?=$newLine;?>
貴校須補件或修正項目:<?=$newLine;?><?=$newLine;?>
<?
echo ($a1_city_approved == 'N')?"● 補助項目一：" . $a1_city_desc . $newLine . "（初審委員：" . $a1_city_approved_id . "  聯絡信箱：" . $a1_mail . "）" . $newLine . $newLine:"";

echo ($a2_city_approved == 'N')?"● 補助項目二：" . $newLine .
								"　　" .  $school_year      . "年特色一：" . $a2_city_desc        . $newLine .
								"　　" . ($school_year + 1) . "年特色一：" . $a2_city_desc_ny1    . $newLine .
								"　　" . ($school_year + 2) . "年特色一：" . $a2_city_desc_ny2    . $newLine .
								"　　" .  $school_year      . "年特色二：" . $a2_city_desc_p2     . $newLine .
								"　　" . ($school_year + 1) . "年特色二：" . $a2_city_desc_ny1_p2 . $newLine .
								"　　" . ($school_year + 2) . "年特色二：" . $a2_city_desc_ny2_p2 . $newLine .
								"（初審委員：" . $a2_city_approved_id . "  聯絡信箱：" . $a2_mail . "）" . $newLine . $newLine:"";

echo ($a3_city_approved == 'N')?"● 補助項目三：" . $a3_city_desc . $newLine . "（初審委員：" . $a3_city_approved_id . "  聯絡信箱：" . $a3_mail . "）" . $newLine . $newLine:"";
echo ($a4_city_approved == 'N')?"● 補助項目四：" . $a4_city_desc . $newLine . "（初審委員：" . $a4_city_approved_id . "  聯絡信箱：" . $a4_mail . "）" . $newLine . $newLine:"";
echo ($a5_city_approved == 'N')?"● 補助項目五：" . $a5_city_desc . $newLine . "（初審委員：" . $a5_city_approved_id . "  聯絡信箱：" . $a5_mail . "）" . $newLine . $newLine:"";
echo ($a6_city_approved == 'N')?"● 補助項目六：" . $a6_city_desc . $newLine . "（初審委員：" . $a6_city_approved_id . "  聯絡信箱：" . $a6_mail . "）" . $newLine . $newLine:"";
?>
<?=$newLine;?>

------------------------------<?=$newLine;?>
<?=$cityname;?>政府教育局(處) 教育優先區初審小組<?=$newLine;?>
聯絡人：<?=$u_user_from;?>（<?=$u_user_occ;?>）<?=$newLine;?>
聯絡電話：<?=$u_user_icq;?><?=$newLine;?>
電子信箱：<?=$u_email;?><?=$newLine;?>
教育優先區填報網站：https://epa.ntcu.edu.tw<?=$newLine;?>
退件通知日期：<? echo date("Y-m-d"); ?><?=$newLine;?>
				</textarea>
			</td>
		</tr>
	</table>

	<p>

	<input type="submit" value="　送 出　" name="submit">
	<input name="account" type="hidden"  value="<?=$account;?>">
	<input type="hidden" name="school_year" value="<?=$school_year;?>">
	<input type="hidden" name="user_email" value="<?=$user_email;?>">

	<script language="JavaScript">
		function toCheck()
		{
			if ( document.form.textfield.value > "<?=$final_date;?>" )
			{
				alert("填報期限不得晚於<?=$final_date;?>");
				document.form.textfield.focus();
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

<? /* <input type="reset" value="清除" name="reset"> */ ?>