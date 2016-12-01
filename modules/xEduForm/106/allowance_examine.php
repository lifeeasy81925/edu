<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "../../function/config_for_106.php"; //本年度基本設定

	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);

	while($row = mysql_fetch_row($result))
	{
		$edu     = $row[1];  //cityid,帳號
		$eduman  = $row[2];	 //縣市名稱
		$examine = $row[3];	 //身分別, 1縣市, 2教育部
		$eduno   = $row[4];	 //縣市編號
		
		//補助審核權
		$exam_1  = $row[5];	 //補助項目一
		$exam_2  = $row[6];	 //補助項目二
		$exam_3  = $row[7];	 //補助項目三
		$exam_4  = $row[8];  //補助項目四
		$exam_5  = $row[9];	 //補助項目五
		$exam_6  = $row[10]; //補助項目六

		//縣市審核權
		$city_1  = $row[13];//基隆市
		$city_2  = $row[14];//新北市
		$city_3  = $row[15];//臺北市
		$city_4  = $row[16];//桃園縣
		$city_5  = $row[17];//新竹縣
		$city_6  = $row[18];//新竹市
		$city_7  = $row[19];//苗栗縣
		$city_8  = $row[20];//臺中市
		$city_9  = $row[21];//南投縣
		$city_10 = $row[22];//彰化縣
		$city_11 = $row[23];//雲林縣
		$city_12 = $row[24];//嘉義縣
		$city_13 = $row[25];//嘉義市
		$city_14 = $row[26];//臺南市
		$city_15 = $row[27];//高雄市
		$city_16 = $row[28];//屏東縣
		$city_17 = $row[29];//臺東縣
		$city_18 = $row[30];//花蓮縣
		$city_19 = $row[31];//宜蘭縣
		$city_20 = $row[32];//澎湖縣
		$city_21 = $row[33];//金門縣
		$city_22 = $row[34];//連江縣

		for($i = 0; $i < 6; $i++)
		{
			$exam_audit[$i] = $row[$i+5]; //從row[5~10]抓對該補助審核權，1為可審核。
		}

		for($i = 0; $i < 22; $i++)
		{
			$city_audit[$i] = $row[$i+13]; //從row[13~34]抓對該縣市審核權，1為可審核。
		}
	}

	$city_ary=array(
						"基隆市" 
						,"臺北市" 
						,"新北市" 
						,"桃園市" 
						,"新竹市" 
						,"新竹縣" 
						,"苗栗縣" 
						,"臺中市" 
						,"彰化縣" 
						,"南投縣" 
						,"雲林縣" 
						,"嘉義市" 
						,"嘉義縣" 
						,"臺南市" 
						,"高雄市" 
						,"屏東縣" 
						,"宜蘭縣" 
						,"花蓮縣" 
						,"臺東縣" 
						,"澎湖縣" 
						,"金門縣" 
						,"連江縣"
					);
?>

<p>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><p>

<a href="../education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b>審核補助項目</b>

<p>
<hr>
<p>

選擇審核的補助項目：<p>
<?
	//切換用文字
	$num_ary =  array(""
					, "補助項目一：推展親職教育活動"
					, "補助項目二：補助學校發展教育特色"
					, "補助項目三：充實學校基本教學設備"
					, "補助項目四：發展原住民教育文化特色及充實設備器材"
					, "補助項目五：補助交通不便學校交通車"
					, "補助項目六：整修學校社區化活動場所");

	for($i = 1; $i <= 6; $i++)
	{
		$exam = ${'exam_'.$i};
		if($exam == '1')
		{
			?>
				<div id="show_a<?=$i;?>" onClick="js:tb_control(<?=$i;?>);" style="display:inline;">
					● <a href="allowance_examine.php?a=<?=$i;?>" target="_self"><?=$num_ary[$i];?></a>
					<p>
				</div>
			<?
		}
	}
?>
<p>
<hr>
<p>
<?php
	$table_name_ary = array("alc_parenting_education"
						  , "alc_education_features"
						  , "alc_teaching_equipment"
						  , "alc_aboriginal_education"
						  , "alc_transport_car"
						  , "alc_school_activity");

	$a_name = array("補助項目一：推展親職教育活動"
				  , "補助項目二：補助學校發展教育特色"
				  , "補助項目三：充實學校基本教學設備"
				  , "補助項目四：發展原住民教育文化特色及充實設備器材"
				  , "補助項目五：補助交通不便學校交通車"
				  , "補助項目六：整修學校社區化活動場所");

	for($i = 0; $i < 6; $i++)
	{
		if($exam_audit[$i] == '1') //有審核權限才顯示
		{
			$table_name = $table_name_ary[$i];
			$table_name_item = $table_name.'_item';
			$a_num = "a".($i+1);

			//計數器歸0
			for($j = 0; $j < 22; $j++)
			{
				$city_wait[$j] = 0; //待審核
				$city_N[$j] = 0; //退件
				$city_Y[$j] = 0; //已審
			}

			$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
				   //補助資料
				   "      , $a_num.edu_approved ".
				   "      , $a_num.city_approved ".
				   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
				   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
				   " where ".
				   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
				   "   and sy.applied is not null ".
				   " order by sd.cityname, sd.account ";

			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result))
			{
				$account = $row['account'];
				$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
				$cityname = $row['cityname'];
				$district = $row['district'];
				$schoolname = $row['schoolname'];
				$area = $row['area'];

				$city_approved = $row['city_approved'];
				$edu_approved = $row['edu_approved'];

				for($j = 0;$j < 22;$j++) //依照學校所屬縣市計算
				{
					if($city_audit[$j] == '1' && $cityname == $city_ary[$j] && $city_approved == 'Y') //縣市審核通過的才計算
					{
						$city_wait[$j] += ($edu_approved == '')?1:0; //待審核
						$city_N[$j] += ($edu_approved == 'N')?1:0; //退件
						$city_Y[$j] += ($edu_approved == 'Y')?1:0; //已審
					}
				}
			}

			$serial = 0;
			$now_allowance = $_GET['a'];
			$none = "none";
			if(($i+1) == $now_allowance)
				$none = "";
			?>
				<table id="tb_a<?=($i+1);?>" border="1" style="display:<?=$none;?>;">
					<tr height="40px">
						<td colspan="6" align="center">
							<font size="+1">
								<b><?=$a_name[$i];?></b>
							</font>
						</td>
					</tr>
					<tr height="30px">
						<td style="text-align:center">序號</td>
						<td style="text-align:center">縣市</td>
						<td style="text-align:center">進入審核</td>
						<td style="text-align:center">待審核</td>
						<td style="text-align:center">不通過</td>
						<td style="text-align:center">已審畢</td>
					</tr>
			<?
			for($j = 0; $j < 22; $j++) //縣市共22個
			{
				if($city_audit[$j] == '1') //有審核權限才顯示
				{
					$serial++;
					?>
						<tr height="30px">
							<td style="text-align:center"><?=$serial;?></td>
							<td style="text-align:center"><?=$city_ary[$j];?></td>
							<td style="text-align:center">
								<a href="a<?=($i+1);?>_examine_table.php?id=<?=$city_ary[$j];?>&a=<?=$now_allowance;?>" target="_self" onClick='wait_page()'>
									<img src="/edu/images/pencil.png" height="15px"/>
									進入審核頁
								</a>
							</td>
							<td style="text-align:center"><?=($city_wait[$j] == '')?0:"<font color=blue><b>".$city_wait[$j]."</b></font>";?></td>
							<td style="text-align:center"><?=($city_N[$j] == '')?0:$city_N[$j];?></td>
							<td style="text-align:center"><?=($city_Y[$j] == '')?0:$city_Y[$j];?></td>
						</tr>
					<?
				}
			}
			?>
				</table>
			<?
		}
	}
?>
<script language="JavaScript">
	function wait_page()
	{
		document.write("<table align='center'>");
		document.write("<tr height='200px'>");
		document.write("<td align='center' valign='bottom'>");
		document.write("<font face='標楷體' size='+5'>");
		document.write("<img src='/edu/images/epa_logo.jpg' height='150px'><p>");
		document.write("資料讀取中，請稍候．．．<p>");
		document.write("<img src='/edu/images/progress.gif' height='150px'><p>");
		document.write("</font>");
		document.write("</td>");
		document.write("</tr>");
		document.write("</table>");
	}

	function tb_control(idx)
	{
		for(i = 1; i <= 6; i++)
		{
			var tb_a = document.getElementById("tb_a" + i);

			if(tb_a != null)
			{
				if(i == idx)
					tb_a.style.display = "";	//顯示該審核項目的縣市
				else
					tb_a.style.display = "none";	//隱藏該審核項目的縣市
			}
		}
	}
</script>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>