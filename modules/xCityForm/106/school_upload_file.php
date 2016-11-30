<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_106.php"; //本年度基本設定

	$username = $_GET['id'];
	$page     = $_GET['page'];

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , su.* ".

		   //補一資料
		   "      , a1.s_total_money as a1_money, a1.s_p1_money as a1_p1_money, a1.s_p2_money as a1_p2_money ".

		   //補二資料
		   "      , a2.s_total_money as a1_money, a2.s_p1_money as a2_p1_money, a2.s_p2_money as a2_p2_money, a2.inherit_year as a2_inherit_year ".

		   //補四資料
		   "      , a4.s_total_money as a1_money, a4.s_p1_money as a4_p1_money, a4.s_p2_money as a4_p2_money, a4.inherit_year as a4_inherit_year ".

		   "      , sun_ly.a2_1  as a2_1_ly,  sun_ly.a2_2  as a2_2_ly,  sun_ly.a5_1  as a4_1_ly,  sun_ly.a5_2  as a4_2_ly  ".	// 去年(105)、前年(104)的補助五是今年(106)的補助四
		   "      , sun_l2y.a2_1 as a2_1_l2y, sun_l2y.a2_2 as a2_2_l2y, sun_l2y.a5_1 as a4_1_l2y, sun_l2y.a5_2 as a4_2_l2y ".	// 去年(105)、前年(104)的補助五是今年(106)的補助四

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_upload_name as su on sy.seq_no = su.sy_seq ".
		   "                       left join $a1_table_name as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join $a2_table_name as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join $a4_table_name as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join schooldata_year as sy_ly  on sd.account = sy_ly.account  and sy_ly.school_year  =  '".($school_year - 1)."' ".
		   "                       left join schooldata_year as sy_l2y on sd.account = sy_l2y.account and sy_l2y.school_year =  '".($school_year - 2)."' ".
		   "                       left join school_upload_name as sun_ly  on sy_ly.seq_no  = sun_ly.sy_seq  ".
		   "                       left join school_upload_name as sun_l2y on sy_l2y.seq_no = sun_l2y.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ".
		   " order by sd.account ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];

		$student = $row['student'];
		$page3_warning = $row['page3_warning'];
		$sy_seq = $row['seq_no']; //school_year 的 seq_no

		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money'];
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money'];

		$a2_p1_money = ($row['a2_p1_money'] == '')?0:$row['a2_p1_money'];
		$a2_p2_money = ($row['a2_p2_money'] == '')?0:$row['a2_p2_money'];

		$a4_p1_money = ($row['a4_p1_money'] == '')?0:$row['a4_p1_money'];
		$a4_p2_money = ($row['a4_p2_money'] == '')?0:$row['a4_p2_money'];

		$applied = $row['applied']; //已申請
		$applied_ary = explode(",", $applied); //已申請的補助

		$point2 = $row['point2'];
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

		$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
		$file_path_pri = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';

		$a2_inherit_year = $row['a2_inherit_year'];
		$a4_inherit_year = $row['a4_inherit_year'];

		$a2_1_ly  = $row['a2_1_ly'];
		$a2_2_ly  = $row['a2_2_ly'];
		$a2_1_l2y = $row['a2_1_l2y'];
		$a2_2_l2y = $row['a2_2_l2y'];

		$a4_1_ly  = $row['a4_1_ly'];
		$a4_2_ly  = $row['a4_2_ly'];
		$a4_1_l2y = $row['a4_1_l2y'];
		$a4_2_l2y = $row['a4_2_l2y'];

		$file_path3 = '/epa_uploads/'.($school_year-1).'/pub/'.$account.'/';
		$file_path4 = '/epa_uploads/'.($school_year-2).'/pub/'.$account.'/';
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<?
	$go_url = "";
	if    ($page == "1"){$go_url = "print_school_finish_1.php";}
	elseif($page == "2"){$go_url = "print_school_finish_2.php";}
	elseif($page == "3"){$go_url = "print_school_finish_3.php";}
?>


<a href="<?=$go_url;?>">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

學校指標、經費與檔案 / <b>學校上傳計畫檔案</b>

<p>
<hr>
<p>

<table bgcolor="lavender">
	<tr height="30px">
		<td>
			<b><?=$account;?> <?=$cityname.$district.$schoolname;?></b>
		</td>
	</tr>
</table><p>

<table border="1">
	<tr style="display:<?=(in_array('a1',$applied_ary))?'':'none';?>;">
		<td>
			<p>
			<b>● 補助項目一：推展親職教育活動</b>
			<p>
			親職教育講座實施計畫：
			<?
				if($a1_p1_money > 0)
				{
					modPrintLink($file_path, $a1_1, "1");
				}
				else
				{
					echo "[未申請，無需上傳]";
				}
			?>
			<p>
			家庭訪視實施計畫：
			<?
				if($a1_p2_money > 0)
				{
					modPrintLink($file_path, $a1_2, "1");
				}
				else
				{
					echo "[未申請，無需上傳]";
				}
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a2',$applied_ary))?'':'none';?>;">
		<td>
			<p>
			<b>● 補助項目二：學校發展教育特色</b>
			<p>
			特色一實施計畫：
			<?
				if($a2_p1_money > 0)
				{
					if($a2_inherit_year == "105")
					{
					    modPrintLink($file_path3, $a2_1_ly, "1");
						echo "<font size='-1' color='blue'> (沿用105年度計畫，無須修改)</font>";
					}
					else if($a2_inherit_year == "104")
					{
					    modPrintLink($file_path4, $a2_1_l2y, "1");
						echo "<font size='-1' color='blue'> (沿用104年度計畫，無須修改)</font>";
					}
					else
					{
				    	modPrintLink($file_path, $a2_1, "1");
					}
				}
				else
				{
					echo "[未申請，無需上傳]";
				}
			?>
			<p>
			特色二實施計畫：
			<?
				if($a2_p2_money > 0)
				{
					if($a2_inherit_year == "105")
					{
					    modPrintLink($file_path3, $a2_2_ly, "1");
						echo "<font size='-1' color='blue'> (沿用105年度計畫，無須修改)</font>";
					}
					else if($a2_inherit_year == "104")
					{
					    modPrintLink($file_path4, $a2_2_l2y, "1");
						echo "<font size='-1' color='blue'> (沿用104年度計畫，無須修改)</font>";
					}
					else
					{
				    	modPrintLink($file_path, $a2_2, "1");
					}
				}
				else
				{
					echo "[未申請，無需上傳]";
				}
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a3',$applied_ary))?'':'none';?>;">
		<td>
			<p>
			<b>● 補助項目三：充實學校基本教學設備</b>
			<p>
			實施計畫：
			<?
				modPrintLink($file_path, $a3_1, "1");
			?>
			<p>
			領域小組會議紀錄：
			<?
				modPrintLink($file_path, $a3_2, "1");
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a4',$applied_ary))?'':'none';?>;">
		<td>
			<p>
			<b>● 補助項目四：發展原住民教育文化特色及充實設備器材</b>
			<p>
			特色一實施計畫：
			<?
				if($a4_p1_money > 0)
				{
					if($a4_inherit_year == "105")
					{
					    modPrintLink($file_path3, $a4_1_ly, "1");
						echo "<font size='-1' color='blue'> (沿用105年度計畫，無須修改)</font>";
					}
					else if($a4_inherit_year == "104")
					{
					    modPrintLink($file_path4, $a4_1_l2y, "1");
						echo "<font size='-1' color='blue'> (沿用104年度計畫，無須修改)</font>";
					}
					else
					{
				    	modPrintLink($file_path, $a4_1, "1");
					}
				}
				else
				{
					echo "[未申請，無需上傳]";
				}
			?>
			<p>
			特色二實施計畫：
			<?
				if($a4_p2_money > 0)
				{
					if($a4_inherit_year == "105")
					{
					    modPrintLink($file_path3, $a4_2_ly, "1");
						echo "<font size='-1' color='blue'> (沿用105年度計畫，無須修改)</font>";
					}
					else if($a4_inherit_year == "104")
					{
					    modPrintLink($file_path4, $a4_2_l2y, "1");
						echo "<font size='-1' color='blue'> (沿用104年度計畫，無須修改)</font>";
					}
					else
					{
				    	modPrintLink($file_path, $a4_2, "1");
					}
				}
				else
				{
					echo "[未申請，無需上傳]";
				}
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a5',$applied_ary))?'':'none';?>;">
		<td>
			<p>
			<b>● 補助項目五：交通不便地區學校交通車</b>
			<p>
			實施計畫：
			<?
				modPrintLink($file_path, $a5_1, "1");
			?>
			<p>
			各搭車路線學生名冊：
			<?
				modPrintLink($file_path_pri, $a5_2, "1");
			?>
			<p>
			學校現有交通車調查表：
			<?
				modPrintLink($file_path, $a5_3, "1");
			?>
			<p>
		</td>
	</tr>
	<tr style="display:<?=(in_array('a6',$applied_ary))?'':'none';?>;">
		<td>
			<p>
			<b>● 補助項目六：整修學校社區化活動場所</b>
			<p>
			實施計畫：
			<?
				modPrintLink($file_path, $a6_1, "1");
			?>
			<p>
		</td>
	</tr>
</table>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
<? include "../../function/button_print.php"; ?>
<input type="button" name="Submit" value="回主選單" onclick="location.href='../school_index.php'">
*/
?>