<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "checkdate_edu.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$a = $_GET['a'];
	$audit_city = $_GET['id'];
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="allowance_examine.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

審核補助項目 / <b>補助項目四：發展原住民教育文化特色及充實設備器材</b>

<p>
<hr>
<p>

<body onload="set_default()"><p>

	選擇縣市：<?=$audit_city;?><p>
	複審/初審金額百分比：<input type="text" size="3" name="persent" value="" style="border:0px; text-align:right; background-color:aliceblue" readonly >%（僅計算已審畢之學校）<p>

	<table border="1">
		<tr height='40px'>
			<td align="center" nowrap="nowrap">序號</td>
			<td align="center" nowrap="nowrap">學校代碼</td>
			<td align="center" nowrap="nowrap">學校名稱</td>
			<td align="center" nowrap="nowrap">申請金額</td>
			<td align="center" nowrap="nowrap">初審金額</td>
			<td align="center" nowrap="nowrap">複審金額</td>
			<td align="center" nowrap="nowrap">結果</td>
			<td align="center" nowrap="nowrap">審核</td>
			<td align="center" nowrap="nowrap">備註</td>
		</tr>
		<?

			$table_name = 'alc_aboriginal_education';
			$a_num = 'a4';

			$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
				   "      , sy.* ".
				   //補四資料
				   "      , $a_num.* ".
				   //j10407，新增
				   "      , sun_ly.effect_a4_1 as effect_a4_1_ly, sun_ly.effect_a4_2 as effect_a4_2_ly  ".

				   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
				   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
				   //j10407，新增
				   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year =  '".($school_year - 1)."' ".
				   "                       left join school_upload_name as sun_ly on sy_ly.seq_no = sun_ly.sy_seq  ".
				   " where ".
				   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
				   "   and sd.cityname = '$audit_city' ".
				   " order by sd.account ";

			$result = mysql_query($sql);
			$serial = 0;
			$sum_city_total_money = 0;
			$sum_edu_total_money = 0;
			while($row = mysql_fetch_array($result))
			{
				$account = $row['account'];
				$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
				$cityname = $row['cityname'];
				$district = $row['district'];
				$schoolname = $row['schoolname'];
				$area = $row['area'];

				$applied = $row['applied'];
				$applied_ary = explode(",", $applied); //已申請的補助
				$can_apply = $row['can_apply'];
				$can_apply_ary = explode(",", $can_apply); //可申請的補助

				$main_seq = $row['seq_no']; //sy.seq_no
				$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0

				$city_approved = $row['city_approved'];
				$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money']; //NULL則填入0

				$sum_city_total_money += $city_total_money;

				$edu_approved = $row['edu_approved'];
				$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0

				//j10407，新增，判別是否沿用，若為104，則為沿用
				$inherit_year = $row['inherit_year'];

				//j10407，新增
				$effect_a4_1 = $row['effect_a4_1_ly'];
				$effect_a4_2 = $row['effect_a4_2_ly'];
				$file_path = '/epa_uploads/'.($school_year-1).'/pub/'.$account.'/';


				if($s_total_money > 0 && in_array($a_num,$applied_ary) && in_array($a_num,$can_apply_ary) && $city_approved == 'Y')
				{
					$serial++;
					echo "<tr height='40px'>";
						echo "<td align='center'>".$serial."</td>";   // 序號
						echo "<td align='center'>".$account."</td>";  // 學校代碼
						echo "<td>".$district.$schoolname."</td>";    // 學校名稱
						echo "<td align='right' nowrap='nowrap'>"."$ ".number_format($s_total_money)."</td>";     // 申請金額
						echo "<td align='right' nowrap='nowrap'>"."$ ".number_format($city_total_money)."</td>";  // 初審金額
						echo "<td align='right' nowrap='nowrap'>"."$ ".number_format($edu_total_money)."</td>";   // 複審金額

						echo "<td align='center' nowrap='nowrap'>";
							if($edu_approved == '') //若複審 審核狀態=''
							{
								echo "<font color=blue>待審核</font>";
							}
							elseif($edu_total_money >= 0 && $edu_approved == 'Y') //若複審核金額>0 且 審核狀態=1
							{
								echo "<font color=green>審畢</font>";
								echo ' <img src="/edu/images/yes.png" height="14px" width="14px" />';  // 顯示已審畢圖示
								$sum_edu_total_money += $edu_total_money;
							}
							else //非待審核 且 非已審畢 作為退件處理
							{
								echo "<font color=red>退件</font>";
								echo ' <img src="/edu/images/no.png" height="12px" width="12px" />';
							}
						echo "</td>";

						echo "<td align='center'>";
							echo "<form action='examine_allowance_$a_num.php?a=$a' method='post' style='margin:0px; display:inline;'>";
								echo "<input type='hidden' name='account' id='account' value='$account'>";
								echo "<input type='hidden' name='city' id='city' value='$audit_city'>";
								echo "<input type='submit' name='button' id='button' value='審核'>";
							echo "</form>";
						echo "</td>";

						echo "<td align='center'>";  // 備註
							echo ($inherit_year == '104' || $inherit_year == '105')?"<font color=green>免審</font>":"";
						echo "</td>";
					echo "</tr>";
				}
			}
		?>
	</table>
</body>

<script language="JavaScript">
	//設定預設值
	function set_default()
	{
		var sum_city_total_money = '<?=$sum_city_total_money;?>';
		var sum_edu_total_money = '<?=$sum_edu_total_money;?>';

		//計算百分比
		var persent = document.getElementsByName('persent')[0];
		var x;

		if(sum_city_total_money != 0)
			x = parseInt(sum_edu_total_money) * 100 / parseInt(sum_city_total_money);
		else
			x = 0;

		persent.value = x.toFixed(2);
	}
</script>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
function get_url($filename, $file_path, $str)
{
	if($filename == "")
		$url = $str."<font size=1 color='red'>(未上傳)</font>";
	else
		$url = "<a href='".$file_path.$filename."' target='_new'>".$str."</a>";

	return $url;
}
*/
?>