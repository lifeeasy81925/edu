<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定
	
	// 以防學校不填學校資料先上傳檔案
	// 新學年度一開始沒資料，在進網頁的時候先新增

	$cnt_sql = " SELECT account FROM schooldata_year WHERE account = '$username' AND school_year = '$school_year' ";

	$result = mysql_query($cnt_sql);

	$num_rows = mysql_num_rows($result);

	if($num_rows == 0)  // 沒資料
	{
		$insert_sql = "INSERT INTO schooldata_year (account, school_year) VALUES ('$username', '$school_year') ";
		mysql_query($insert_sql);
	}

	$sql = 	"    SELECT sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sy.*                                                     ".
			"         , a1.s_total_money AS a1_money, a1.s_p1_money AS a1_p1_money, a1.s_p2_money AS a1_p2_money                                     ".
			"         , a2.s_total_money AS a2_money, a2.s_p1_money AS a2_p1_money, a2.s_p2_money AS a2_p2_money, a2.inherit_year AS a2_inherit_year ".
			"         , a3.s_total_money AS a3_money, a3.s_p1_money AS a3_p1_money                                                                   ".
			"         , a4.s_total_money AS a4_money, a4.s_p1_money AS a4_p1_money, a4.s_p2_money AS a4_p2_money, a4.inherit_year AS a4_inherit_year ".
			"         , a5.s_total_money AS a5_money, a5.s_money    AS a5_p1_money                                                                   ".
			"         , a6.s_total_money AS a6_money, a6.s_p1_money AS a6_p1_money                                                                   ".
			"      FROM schooldata      AS sd                                                                                                        ".
			" LEFT JOIN schooldata_year AS sy ON sd.account = sy.account                                                                             ".
			" LEFT JOIN $a1_table_name  AS a1 ON sy.seq_no  = a1.sy_seq                                                                              ".
			" LEFT JOIN $a2_table_name  AS a2 ON sy.seq_no  = a2.sy_seq                                                                              ".
			" LEFT JOIN $a3_table_name  AS a3 ON sy.seq_no  = a3.sy_seq                                                                              ".
			" LEFT JOIN $a4_table_name  AS a4 ON sy.seq_no  = a4.sy_seq                                                                              ".
			" LEFT JOIN $a5_table_name  AS a5 ON sy.seq_no  = a5.sy_seq                                                                              ".
			" LEFT JOIN $a6_table_name  AS a6 ON sy.seq_no  = a6.sy_seq                                                                              ".
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

		$sy_seq = $row['seq_no'];  // school_year 的 seq_no

		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money'];
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money'];

		$a2_p1_money = ($row['a2_p1_money'] == '')?0:$row['a2_p1_money'];
		$a2_p2_money = ($row['a2_p2_money'] == '')?0:$row['a2_p2_money'];

		$a3_p1_money = ($row['a3_p1_money'] == '')?0:$row['a3_p1_money'];

		$a4_p1_money = ($row['a4_p1_money'] == '')?0:$row['a4_p1_money'];
		$a4_p2_money = ($row['a4_p2_money'] == '')?0:$row['a4_p2_money'];

		$a5_p1_money = ($row['a5_p1_money'] == '')?0:$row['a5_p1_money'];

		$a6_p1_money = ($row['a6_p1_money'] == '')?0:$row['a6_p1_money'];

		/* 補助二、四有沿用情形 */
		$a2_inherit_year = $row['a2_inherit_year'];
		$a4_inherit_year = $row['a4_inherit_year'];

		$applied     = $row['applied'];         // 已申請
		$applied_ary = explode(",", $applied);  // 已申請(陣列)
	}

	$sql = " SELECT * FROM school_upload_name WHERE sy_seq = '$sy_seq' ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
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

	/* 區分公開路徑 $file_path 及可能含個資 $file_path2 */
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

<b><?=$school_year;?>年度 上傳檢附資料</b>

<p>
<hr>
<p>

<table border="2" cellpadding="10">
	<tr height="50px" bgcolor="D1F1F1">
		<td align="center">
			<font size="+1">經校長用印後，掃描上傳</font>
		</td>
	</tr>
	<tr>
		<td>
			<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<?
					if ($final_1 == '')
						echo "1. <font color=red>[未上傳] 指標界定調查紀錄表（表 I～1）</font>";
					else
						echo "1. <font color='blue'>[已上傳]</font> <a href='".$file_path.$final_1."' target='_new'><b>指標界定調查紀錄表（表 I～1）</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
				?>
				<p>
				<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="final_1">
				<input type="file" name="myfile">
				<input type="submit" value="　上 傳　">
				<p>
			</form>
			<hr>
			<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<?
					if ($final_2 == '')
						echo "2. <font color=red>[未上傳] 補助項目經費需求彙整表（表 I～2）</font>";
					else
						echo "2. <font color='blue'>[已上傳]</font> <a href='".$file_path.$final_2."' target='_new'><b>補助項目經費需求彙整表（表 I～2）</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
				?>
				<p>
				<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="final_2">
				<input type="file" name="myfile">
				<input type="submit" value="　上 傳　">
				<p>
			</form>
		</td>
	</tr>
</table>
<p>

<table border="2" cellpadding="10">
	<tr height="50px" bgcolor="D1F1F1">
		<td align="center">
			<font size="+1">上傳未經校長核章之電子檔</font>（已核章之書面資料留校備查）
		</td>
	</tr>

	<tr style="display:<?=(in_array('a1', $applied_ary))?'':'none';?>">
		<td>
			● 補助項目一：推展親職教育活動<p>
			<div style="display:<? if($a1_p1_money <= 0) echo "none"; ?>">
				<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a1_1 == '')
							echo "　1. <font color=red>[未上傳] 親職教育講座實施計畫</font>";
						else
							echo "　1. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a1_1."' target='_new'><b>親職教育講座實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a1_1">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
			</div>
			<div style="display:<? if($a1_p2_money <= 0) echo "none"; ?>">
				<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a1_2 == '')
							echo "　2. <font color=red>[未上傳] 家庭訪視實施計畫</font>";
						else
							echo "　2. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a1_2."' target='_new'><b>家庭訪視實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a1_2">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
			</div>
		</td>
	</tr>

	<tr style="display:<?=(in_array('a2', $applied_ary))?'':'none';?>;">
		<td>
			● 補助項目二：學校發展教育特色<p>
			<div style="display:<? if($a2_p1_money <= 0) echo "none";  // 特色一 ?>">
				<?
					if($a2_inherit_year == '104' || $a2_inherit_year == '105')  // 如果沿用計畫，給提示說不必上傳
					{
						echo "　1. 特色一實施計畫：<font color=blue>沿用" . $a2_inherit_year . "年度計畫，無需上傳。</font> <img src='/edu/images/yes.png' align='absmiddle'/><p>";
					}
					else  // 沒有沿用計畫，就要上傳
					{
				?>
						<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
							<?
								if ($a2_1 == '')
									echo "　1. <font color=red>[未上傳] 特色一實施計畫</font>";
								else
									echo "　1. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a2_1."' target='_new'><b>特色一實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
							?>
							<p>
							<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
							<input type="hidden" name="max_file_size" value="102400000">
							<input type="hidden" name="column_name" value="a2_1">　
							<input type="file" name="myfile">
							<input type="submit" value="　上 傳　">
							<p>
						</form>
				<?
					}
				?>
			</div>
			<div style="display:<? if($a2_p2_money <= 0) echo "none";  // 特色二 ?>">
				<?
					if($a2_inherit_year == '104' || $a2_inherit_year == '105')  // 如果沿用計畫，給提示說不必上傳
					{
						echo "　2. 特色二實施計畫：<font color=blue>沿用" . $a2_inherit_year . "年度計畫，無需上傳。</font> <img src='/edu/images/yes.png' align='absmiddle'/><p>";
					}
					else  // 沒有沿用計畫，就要上傳
					{
				?>
						<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
							<?
								if ($a2_2 == '')
									echo "　2. <font color=red>[未上傳] 特色二實施計畫</font>";
								else
									echo "　2. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a2_2."' target='_new'><b>特色二實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
							?>
							<p>
							<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
							<input type="hidden" name="max_file_size" value="102400000">
							<input type="hidden" name="column_name" value="a2_2">　
							<input type="file" name="myfile">
							<input type="submit" value="　上 傳　">
							<p>
						</form>
				<?
					}
				?>
			</div>
		</td>
	</tr>

	<tr style="display:<?=(in_array('a3', $applied_ary))?'':'none';?>;">
		<td>
			● 補助項目三：充實學校基本教學設備<p>
			<div style="display:<? if($a3_p1_money <= 0) echo "none"; ?>">
				<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a3_1 == '')
							echo "　1. <font color=red>[未上傳] 實施計畫</font>";
						else
							echo "　1. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a3_1."' target='_new'><b>實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a3_1">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
				<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a3_2 == '')
							echo "　2. <font color=red>[未上傳] 領域小組會議紀錄</font>";
						else
							echo "　2. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a3_2."' target='_new'><b>領域小組會議紀錄</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a3_2">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
			</div>
		</td>
	</tr>

	<tr style="display:<?=(in_array('a4', $applied_ary))?'':'none';?>;">
		<td>
			● 補助項目四：發展原住民教育文化特色及充實設備器材<p>
			<div style="display:<? if($a4_p1_money <= 0) echo "none";  // 特色一 ?>">
				<?
					if($a4_inherit_year == '104' || $a4_inherit_year == '105')  // 如果沿用計畫，給提示說不必上傳
					{
						echo "　1. 特色一實施計畫：<font color=blue>沿用" . $a4_inherit_year . "年度計畫，無需上傳。</font> <img src='/edu/images/yes.png' align='absmiddle'/><p>";
					}
					else  // 沒有沿用計畫，就要上傳
					{
				?>
						<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
							<?
								if ($a4_1 == '')
									echo "　1. <font color=red>[未上傳] 特色一實施計畫</font>";
								else
									echo "　1. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a4_1."' target='_new'><b>特色一實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
							?>
							<p>
							<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
							<input type="hidden" name="max_file_size" value="102400000">
							<input type="hidden" name="column_name" value="a4_1">　
							<input type="file" name="myfile">
							<input type="submit" value="　上 傳　">
							<p>
						</form>
				<?
					}
				?>
			</div>
			<div style="display:<? if($a4_p2_money <= 0) echo "none";  // 特色二 ?>">
				<?
					if($a4_inherit_year == '104' || $a4_inherit_year == '105')  // 如果沿用計畫，給提示說不必上傳
					{
						echo "　2. 特色二實施計畫：<font color=blue>沿用" . $a4_inherit_year . "年度計畫，無需上傳。</font> <img src='/edu/images/yes.png' align='absmiddle'/><p>";
					}
					else  // 沒有沿用計畫，就要上傳
					{
				?>
						<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
							<?
								if ($a4_2 == '')
									echo "　2. <font color=red>[未上傳] 特色二實施計畫</font>";
								else
									echo "　2. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a4_2."' target='_new'><b>特色二實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
							?>
							<p>
							<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
							<input type="hidden" name="max_file_size" value="102400000">
							<input type="hidden" name="column_name" value="a4_2">　
							<input type="file" name="myfile">
							<input type="submit" value="　上 傳　">
							<p>
						</form>
				<?
					}
				?>
			</div>
		</td>
	</tr>

	<tr style="display:<?=(in_array('a5',$applied_ary))?'':'none';?>;">
		<td>
			● 補助項目五：交通不便地區學校交通車<p>
			<div style="display:<? if($a5_p1_money <= 0) echo "none"; ?>">
				<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a5_1 == '')
							echo "　1. <font color=red>[未上傳] 實施計畫</font>";
						else
							echo "　1. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a5_1."' target='_new'><b>實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a5_1">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
				<form onSubmit="return check()" action="file_up2.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a5_2 == '')
							echo "　2. <font color=red>[未上傳] 各搭車路線學生名冊</font>";
						else
							echo "　2. <font color='blue'>[已上傳]</font> 各搭車路線學生名冊 <img src='/edu/images/yes.png' align='absmiddle'/></a><font size='-2'>（文件內含個資，上傳後即可，不提供下載。）</font>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a5_2">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
				<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a5_3 == '')
							echo "　3. <font color=red>[未上傳] 學校現有交通車調查表</font>";
						else
							echo "　3. <font color='blue'>[已上傳]</font> <a href='".$file_path.$a5_3."' target='_new'><b>學校現有交通車調查表</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a5_3">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
			</div>
		</td>
	</tr>

	<tr style="display:<?=(in_array('a6',$applied_ary))?'':'none';?>;">
		<td>
			● 補助項目六：整修學校社區化活動場所<p>
			<div style="display:<? if($a6_p1_money <= 0) echo "none"; ?>">
				<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
					<?
						if ($a6_1 == '')
							echo "　　<font color=red>[未上傳] 實施計畫</font>";
						else
							echo "　　<font color='blue'>[已上傳]</font> <a href='".$file_path.$a6_1."' target='_new'><b>實施計畫</b> <img src='/edu/images/yes.png' align='absmiddle'/></a>";
					?>
					<p>
					<input type="hidden" name="come_from_page" value="<?=pathinfo($_SERVER[PHP_SELF])['basename'];?>">
					<input type="hidden" name="max_file_size" value="102400000">
					<input type="hidden" name="column_name" value="a6_1">　
					<input type="file" name="myfile">
					<input type="submit" value="　上 傳　">
					<p>
				</form>
			</div>
		</td>
	</tr>
</table>
<p>

說明 1：上傳完成後，請重新整理頁面，即可查閱資料。<p>
說明 2：請先填寫完經費，才會開放上傳空間。<p>
說明 3：檔案格式不限制，例如：政府文件標準格式 ODF 或 PDF。<p>
說明 4：檔案大小請勿超過 10 MB。<p>


<input type="button" name="Submit" value=" 下一步，查看「106年度 填報申請狀態」 " onclick="location.href='school_view_status.php'" style='height:30px;'><p>
<input type="hidden" name="sy_seq" value="<?=$sy_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">

<!-- 上傳檔案前，出現個資提示 -->
<script type="text/javascript">
    $('form').submit(function(e) {
        var currentForm = this;
           e.preventDefault();
	     	 bootbox.dialog({
                message: "● 為避免個人資料(個資)之外洩及保障個人隱私權，若上傳之執行計畫或成果內容涉及個資內容，<font color='red'><b>請勿顯示全名、身份證字號、電話、E-mail等個資。詳細資料請自行留存學校備查!!</b></font>",
                title: " 重要提醒!!",
                buttons: {
                      OK: {
                        label: "我已確實了解!!",
                        className: "btn-primary",
                        callback: function (result) {
						            if (result) {
                               currentForm.submit();
                             }

                        }
                    }
                }
             });
         });
</script>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<? // include "../../function/button_print.php";  // 列印本頁 ?>
<?
/* 待開會詢問後移除
<tr style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
	<td><b>● 目標學生名冊</b>
		<form onSubmit="return check()" action="file_up2.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
			<input type="hidden" name="max_file_size" value="102400000">
			<input type="hidden" name="column_name" value="point2">
			<input type="file" name="myfile">
			<input type="submit" value="上傳「目標學生名冊」">
			<table>
				<tr>
					<td width="47%">
						目標學生名冊：
						<?
							if ($point2 == '')
								echo "<font color=red>未上傳</font>（上傳後請按F5更新狀態）";
							else
								echo "<font color=blue>已上傳</font>（文件內含個資，上傳後即可，不提供下載。）";
						?>
					</td>
				</tr>
			</table>
		</form>
		<p>
	</td>
</tr>
說明 4：三年計畫請寫於同一份檔案內，再行上傳。<p>
*/
?>