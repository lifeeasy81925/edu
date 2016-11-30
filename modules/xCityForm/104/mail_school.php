<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$date = date("Y-m-d");
	
	include "../../function/config_for_104.php"; //本年度基本設定
	$final_date = "2014-11-18"; //學校填報的最後期限，選擇的日期不可比這個晚

	$id = $_GET["id"];
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.seq_no, u.user_from, u.email, u.user_occ, u.user_aim, u.user_yim ".
		   "      , a1.city_approved as a1_city_approved, a1.city_approved_id as a1_city_approved_id, (select u.email from edu_users as u where u.uname = a1.city_approved_id) as a1_mail ".
		   "      , a2.city_approved as a2_city_approved, a2.city_approved_id as a2_city_approved_id, (select u.email from edu_users as u where u.uname = a2.city_approved_id) as a2_mail ".
		   "      , a3.city_approved as a3_city_approved, a3.city_approved_id as a3_city_approved_id, (select u.email from edu_users as u where u.uname = a3.city_approved_id) as a3_mail ".
		   "      , a4.city_approved as a4_city_approved, a4.city_approved_id as a4_city_approved_id, (select u.email from edu_users as u where u.uname = a4.city_approved_id) as a4_mail ".
		   "      , a5.city_approved as a5_city_approved, a5.city_approved_id as a5_city_approved_id, (select u.email from edu_users as u where u.uname = a5.city_approved_id) as a5_mail ".
		   "      , a6.city_approved as a6_city_approved, a6.city_approved_id as a6_city_approved_id, (select u.email from edu_users as u where u.uname = a6.city_approved_id) as a6_mail ".
		   "      , a7.city_approved as a7_city_approved, a7.city_approved_id as a7_city_approved_id, (select u.email from edu_users as u where u.uname = a7.city_approved_id) as a7_mail ".
		   "      , tl.start_date , tl.end_date ". //學校填報期限
		   "      , a1.city_desc as a1_city_desc ". //縣市審核意見
		   "      , a2.city_desc as a2_city_desc ".
		   "      , a3.city_desc as a3_city_desc ".
		   "      , a4.city_desc as a4_city_desc ".
		   "      , a5.city_desc as a5_city_desc ".
		   "      , a6.city_desc as a6_city_desc ".
		   "      , a7.city_desc as a7_city_desc ".
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   "                       left join time_limit as tl on sd.account = tl.account and tl.school_year = '$school_year' ".
		   "                       left join edu_users as u on sd.account = u.uname ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$id' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
				
		$main_seq = $row['seq_no']; //sy.seq_no
		
		$user_from = $row['user_from']; //學校承辦人姓名
		$user_email = $row['email']; //E-mail
		$user_occ = $row['user_occ']; //職稱
		$user_aim = $row['user_aim']; //電話
		$user_yim = $row['user_yim']; //傳真
				
		$a1_city_approved = $row['a1_city_approved'];
		$a2_city_approved = $row['a2_city_approved'];
		$a3_city_approved = $row['a3_city_approved'];
		$a4_city_approved = $row['a4_city_approved'];
		$a5_city_approved = $row['a5_city_approved'];
		$a6_city_approved = $row['a6_city_approved'];
		$a7_city_approved = $row['a7_city_approved'];
		
		$a1_city_approved_id = $row['a1_city_approved_id']; //審核者帳號
		$a2_city_approved_id = $row['a2_city_approved_id'];
		$a3_city_approved_id = $row['a3_city_approved_id'];
		$a4_city_approved_id = $row['a4_city_approved_id'];
		$a5_city_approved_id = $row['a5_city_approved_id'];
		$a6_city_approved_id = $row['a6_city_approved_id'];
		$a7_city_approved_id = $row['a7_city_approved_id'];
		
		$a1_mail = $row['a1_mail']; //審核者E-mail
		$a2_mail = $row['a2_mail'];
		$a3_mail = $row['a3_mail'];
		$a4_mail = $row['a4_mail'];
		$a5_mail = $row['a5_mail'];
		$a6_mail = $row['a6_mail'];
		$a7_mail = $row['a7_mail'];
		
		$a1_city_desc = $row['a1_city_desc']; //縣市審核意見
		$a2_city_desc = $row['a2_city_desc'];
		$a3_city_desc = $row['a3_city_desc'];
		$a4_city_desc = $row['a4_city_desc'];
		$a5_city_desc = $row['a5_city_desc'];
		$a6_city_desc = $row['a6_city_desc'];
		$a7_city_desc = $row['a7_city_desc'];
		
  		$start_date = $row['start_date'];
		$end_date = date("Y-m-d", strtotime($row['end_date']));//結束日期
		
	}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<hr>
<form action="mail_send.php" method="post" name="form" onSubmit="return toCheck();">
	<table width="100%" border="0">
		<tr>
			<td style="width:20%; text-align:right;">審核學校：</td>
			<td style="width:80%;"><?=$cityname.$district.$schoolname;?></td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">收件人姓名：</td>
			<td><?=$user_from;?></td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">職　　稱：</td>
			<td><?=$user_occ;?></td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">電子信箱：</td>
			<td><?=$user_email;?></td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">電　　話：</td>
			<td><?=$user_aim;?></td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">傳　　真：</td>
			<td><?=$user_yim;?></td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">原填報截止日期：</td>
			<td><?=$end_date;?></td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">延長填報日期：</td>
			<td><input name="new_end_date" type="text" size="12" id="new_end_date" value="<?=$end_date;?>"><font color=blue>【縣市自選日期】</font>(限<?=$final_date;?>前)</td>
		</tr>
		<tr>
			<td style="width:20%; text-align:right;">E-Mail通知內容：</td>
			<td>(內容可自行修改，如加列審核結果或聯繫方式...等；編輯時請按Enter鍵換行</td>
		</tr>
		<tr>
			<td colspan="2">
<textarea name="mail_content" cols="80" rows="20">
貴校申請教育優先區補助資料初審未通過，請於期限內至教育優先區填報網站修正申請文件。
				
貴校須補件或修正項目:

<?
	$newLine = chr(13).chr(10); //textarea換行符號
	echo ($a1_city_approved == 'N')?"＊補助項目一：$a1_city_desc$newLine	(審查委員：$a1_city_approved_id  聯絡信箱：$a1_mail)$newLine$newLine":"";
	echo ($a2_city_approved == 'N')?"＊補助項目二：$a2_city_desc$newLine	(審查委員：$a2_city_approved_id  聯絡信箱：$a2_mail)$newLine$newLine":"";
	echo ($a3_city_approved == 'N')?"＊補助項目三：$a3_city_desc$newLine	(審查委員：$a3_city_approved_id  聯絡信箱：$a3_mail)$newLine$newLine":"";
	echo ($a4_city_approved == 'N')?"＊補助項目四：$a4_city_desc$newLine	(審查委員：$a4_city_approved_id  聯絡信箱：$a4_mail)$newLine$newLine":"";
	echo ($a5_city_approved == 'N')?"＊補助項目五：$a5_city_desc$newLine	(審查委員：$a5_city_approved_id  聯絡信箱：$a5_mail)$newLine$newLine":"";
	echo ($a6_city_approved == 'N')?"＊補助項目六：$a6_city_desc$newLine	(審查委員：$a6_city_approved_id  聯絡信箱：$a6_mail)$newLine$newLine":"";
	echo ($a7_city_approved == 'N')?"＊補助項目七：$a7_city_desc$newLine	(審查委員：$a7_city_approved_id  聯絡信箱：$a7_mail)$newLine$newLine":"";
?>
政府教育局教育優先區初審小組
聯絡人:<?=$username;?>(<?=$cityman;?>)
信箱:<?=$email;?> 
教育優先區填報網站：http://210.240.190.99
退件日期:<?=$date;?>
</textarea>
			</td>
		</tr>
	</table>
<input type="submit" value="送出" name="submit">
<input type="reset" value="清除" name="reset">
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