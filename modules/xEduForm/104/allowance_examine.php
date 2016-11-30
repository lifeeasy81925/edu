<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	while($row = mysql_fetch_row($result)) 
	{
		$edu = $row[1];		//cityid,帳號
		$eduman = $row[2];	//縣市名稱
		$examine = $row[3];	//身分別, 1縣市, 2教育部
		$eduno = $row[4];	//縣市編號
		$exam_1 = $row[5];	//補助項目一
		$exam_2 = $row[6];	//補助項目二
		$exam_3 = $row[7];	//補助項目三
		$exam_4 = $row[8];	//補助項目四
		$exam_5 = $row[9];	//補助項目五
		$exam_6 = $row[10];	//補助項目六
		$exam_7 = $row[11];	//補助項目七	
		
		$city_1 = $row[13];//基隆市審核權
		$city_2 = $row[14];//新北市
		$city_3 = $row[15];//臺北市
		$city_4 = $row[16];//桃園縣
		$city_5 = $row[17];//新竹縣
		$city_6 = $row[18];//新竹市
		$city_7 = $row[19];//苗栗縣
		$city_8 = $row[20];//臺中市
		$city_9 = $row[21];//南投縣
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
		
		for($i = 0;$i < 7;$i++)
		{
			$exam_audit[$i] = $row[$i+5]; //可審核的補助，可審核為 1
		}
		
		for($i = 0;$i < 22;$i++)
		{
			$city_audit[$i] = $row[$i+13]; //可審核的縣市，可審核為 1
		}

		
	}
	
	$city_ary = array("基隆市", "新北市", "臺北市", "桃園縣", "新竹縣", "新竹市", "苗栗縣", "臺中市", "南投縣", "彰化縣", "雲林縣"
						, "嘉義縣", "嘉義市", "臺南市", "高雄市", "屏東縣", "臺東縣", "花蓮縣", "宜蘭縣", "澎湖縣", "金門縣", "連江縣");

	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回前頁" onClick="location='../education_index.php'">
<p><hr>
<table border="0">
	<tr>
		<td>選擇審核的補助項目</td>
	</tr>
	<tr>
		<td>
			<?
				//切換用文字
				$num_ary = array("", "一", "二", "三", "四", "五", "六", "七");
				for($i = 1;$i <= 7;$i++)
				{
					$exam = ${'exam_'.$i};
					if($exam == '1')
					{
						?>
							<div id="show_a<?=$i;?>" onClick="js:tb_control(<?=$i;?>);" style="display:inline;">
								●<!--<font color="#436EEE" style="cursor:pointer;">補助<?=$num_ary[$i];?></font>-->
								<a href="allowance_examine.php?a=<?=$i;?>" target="_self">補助<?=$num_ary[$i];?></a>
							</div>
						<?
					}
				}
			?>		
		</td>
	</tr>
</table>
<hr>
<?php
	$table_name_ary = array("alc_parenting_education", "alc_education_features", "alc_repair_dormitory", "alc_teaching_equipment"
						  , "alc_aboriginal_education", "alc_transport_car", "alc_school_activity");
							  
	$a_name = array("補助項目一：推展親職教育活動"
				  , "補助項目二：補助學校發展教育特色"
				  , "補助項目三：修繕離島或偏遠地區師生宿舍"
				  , "補助項目四：充實學校基本教學設備"
				  , "補助項目五：發展原住民教育文化特色及充實設備器材"
				  , "補助項目六：補助交通不便學校交通車"
				  , "補助項目七：整修學校社區化活動場所");

	for($i = 0;$i < 7;$i++)
	{
		if($exam_audit[$i] == '1') //有審核權限才顯示
		{
			$table_name = $table_name_ary[$i];
			$table_name_item = $table_name.'_item';
			$a_num = "a".($i+1);
			
			//計數器歸0
			for($j = 0;$j < 22;$j++)
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
					<tr>
						<td colspan="6" style="text-align:left"><?=$a_name[$i];?></td>
					</tr>
					<tr>
						<td width="40px" style="text-align:center">序號</td>
						<td width="60px" style="text-align:center">縣市</td>
						<td style="text-align:center">進入審核</td>
						<td width="50px" style="text-align:center">待審核</td>
						<td width="50px" style="text-align:center">不通過</td>
						<td width="50px" style="text-align:center">已審畢</td>
					</tr>
			<?
			for($j = 0;$j < 22;$j++) //縣市共22個
			{
				if($city_audit[$j] == '1') //有審核權限才顯示
				{
					$serial++;
					?>
						<tr>
							<td width="40px" style="text-align:center"><?=$serial;?></td>
							<td width="60px" style="text-align:center"><?=$city_ary[$j];?></td>
							<td style="text-align:center"><a href="a<?=($i+1);?>_examine_table.php?id=<?=$city_ary[$j];?>&a=<?=$now_allowance;?>" target="_self">審核</a></td>
							<td width="50px" style="text-align:center"><?=($city_wait[$j] == '')?0:$city_wait[$j];?></td>
							<td width="50px" style="text-align:center"><?=($city_N[$j] == '')?0:$city_N[$j];?></td>
							<td width="50px" style="text-align:center"><?=($city_Y[$j] == '')?0:$city_Y[$j];?></td>
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
	function tb_control(idx)
	{
		for(i = 1;i <= 7;i++)
		{
			var tb_a = document.getElementById("tb_a" + i);
			
			if(tb_a != null)
			{
				if(i == idx)
					tb_a.style.display = "";
				else
					tb_a.style.display = "none";
			}
		}

	}
	
</script>   
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>