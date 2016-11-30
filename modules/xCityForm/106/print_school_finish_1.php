<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	include "../../function/config_for_106.php"; //本年度基本設定
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

<b>學校指標、經費與檔案</b>

<p>
<hr>
<p>

<form style="margin:0px; display:inline;"><p>

	<font color="blue"><?=$cityname;?></font> 全部學校列表<p>

	<div id="show_all" onClick="js:tb_control(this);" style="display:inline;">● <font color="#436EEE" style="cursor:pointer;">全部顯示　</font></div>
	<div id="show_e"   onClick="js:tb_control(this);" style="display:inline;">● <font color="#436EEE" style="cursor:pointer;">只顯示國小　</font></div>
	<div id="show_j"   onClick="js:tb_control(this);" style="display:inline;">● <font color="#436EEE" style="cursor:pointer;">只顯示國中　</font></div>

	<p>

	<div id="list_e">
		<table border="1">
			<tr height="30px" align="center">
				<td>序號</td>
				<td>學校代碼</td>
				<td>學校名稱</td>
				<td nowrap="nowrap">指標界定表<br>（已核章）</td>
				<td nowrap="nowrap">經費需求表<br>（已核章）</td>
				<td nowrap="nowrap">補助經費<br>審核狀況</td>
				<td nowrap="nowrap">學校上傳<br>計畫檔案</td>
			</tr>
			<?
				$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
					   "      , su.final_1, su.final_2 ".
					   "      , su_ly.final_1 as final_1_ly ".
					   "      , sy.keep ".
					   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
					   "                       left join school_upload_name as su on sy.seq_no = su.sy_seq ".
					   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year =  '".($school_year - 1)."' ".
					   "                       left join school_upload_name as su_ly on sy_ly.seq_no = su_ly.sy_seq  ".
					   " where ".
					   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
					   "   and sd.cityname = '$cityname' ".
					   "   and sd.schooltype = '1' ".
					   " order by sd.account ";

				$result = mysql_query($sql);
				$serial_e = 0;
				$serial_e_all = 0;
				while($row = mysql_fetch_array($result))
				{
					$account = $row['account'];
					$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
					$cityname = $row['cityname'];
					$district = $row['district'];
					$schoolname = $row['schoolname'];
					$area = $row['area'];

					$final_1 = $row['final_1'];  // 指標界定調查紀錄表
					$final_2 = $row['final_2'];  // 補助項目經費需求彙整表

					// $keep = $row['keep']; 106年度重填資料不用管keep了！

					$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
					$serial_e++;
					echo "<tr height='40px'>";
					echo "<td align='center'>".$serial_e."</td>";
					echo "<td align='center'>".$account."</td>";
					echo "<td>".$district.$schoolname."</td>";

					if($final_1 == null)  // 檔案一  $final_1
					{
						echo "<td align='center'><font color=red>未上傳</font></td>";
					}
					else
					{
						echo "<td align='center'><a href='".$file_path.$final_1."' target='_new'>查閱</a></td>";
					}

					if($final_2 == null)  // 檔案二  $final_2
					{
						echo "<td align='center'><font color=red>未上傳</font></td>";
					}
					else
					{
						echo "<td align='center'><a href='".$file_path.$final_2."' target='_new'>查閱</a></td>";
					}

					echo "<td align='center'><a href='print_edu_examined.php?acc=".$account."' target='_blank'>審核狀況</a></td>";
					echo "<td align='center'><a href='school_upload_file.php?id=".$account."&page=1' target='_self'>計畫檔案</a></td>";
					echo "</tr>";

					$serial_e_all++;
				}
			?>
		</table><p>
		國小校數：<?=$serial_e;?> 校 / <?=$serial_e_all;?> 校
		<p>
		<hr>
		<p>
	</div>

	<div id="list_j">
		<table border="1">
			<tr height="40px" align="center">
				<td>序號</td>
				<td>學校代碼</td>
				<td>學校名稱</td>
				<td nowrap="nowrap">指標界定表<br>（已核章）</td>
				<td nowrap="nowrap">經費需求表<br>（已核章）</td>
				<td nowrap="nowrap">補助經費<br>審核狀況</td>
				<td nowrap="nowrap">學校上傳<br>計畫檔案</td>
			</tr>
			<?
				$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
					   "      , su.final_1, su.final_2 ".

					   "      , su_ly.final_1 as final_1_ly ".
					   "      , sy.keep ".

					   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
					   "                       left join school_upload_name as su on sy.seq_no = su.sy_seq ".

					   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year =  '".($school_year - 1)."' ".
					   "                       left join school_upload_name as su_ly on sy_ly.seq_no = su_ly.sy_seq  ".

					   " where ".
					   "   ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
					   "   and sd.cityname = '$cityname' ".
					   "   and sd.schooltype = '2' ".
					   " order by sd.account ";

				$result = mysql_query($sql);
				$serial_j = 0;
				$serial_j_all = 0;
				while($row = mysql_fetch_array($result))
				{
					$account = $row['account'];
					$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
					$cityname = $row['cityname'];
					$district = $row['district'];
					$schoolname = $row['schoolname'];
					$area = $row['area'];

					$final_1 = $row['final_1'];  // 指標界定調查紀錄表
					$final_2 = $row['final_2'];  // 補助項目經費需求彙整表

					// $keep = $row['keep']; 106年度重填資料不用管keep了！

					$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
					$serial_j++;
					echo "<tr height='40px'>";
					echo "<td align='center'>".$serial_j."</td>";
					echo "<td align='center'>".$account."</td>";
					echo "<td>".$district.$schoolname."</td>";

					if($final_1 == null)  // 檔案一  $final_1
					{
						echo "<td align='center'><font color=red>未上傳</font></td>";
					}
					else
					{
						echo "<td align='center'><a href='".$file_path.$final_1."' target='_new'>查閱</a></td>";
					}

					if($final_2 == null)  // 檔案二  $final_2
					{
						echo "<td align='center'><font color=red>未上傳</font></td>";
					}
					else
					{
						echo "<td align='center'><a href='".$file_path.$final_2."' target='_new'>查閱</a></td>";
					}

					echo "<td align='center'><a href='print_edu_examined.php?acc=".$account."' target='_blank'>審核狀況</a></td>";
					echo "<td align='center'><a href='school_upload_file.php?id=".$account."&page=1' target='_self'>計畫檔案</a></td>";
					echo "</tr>";

					$serial_j_all++;
				}
			?>
		</table><p>
		國中校數：<?=$serial_j;?> 校 / <?=$serial_j_all;?> 校
		<p>
		<hr>
		<p>
	</div>

	合計校數：<font color=blue><?=$serial_e+$serial_j;?></font> 校 / <?=$serial_e_all+$serial_j_all;?> 校<p>
	<p>

	<script language="JavaScript">
		function tb_control(obj)
		{
			var tb_e = document.getElementById("list_e");
			var tb_j = document.getElementById("list_j");

			switch(obj.id)
			{
				case "show_all":
					tb_e.style.display = "";
					tb_j.style.display = "";
					break;

				case "show_e":
					tb_e.style.display = "";
					tb_j.style.display = "none";
					break;

				case "show_j":
					tb_e.style.display = "none";
					tb_j.style.display = "";
					break;
			}
		}

	</script>
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<? /* 填報完成率：<?=number_format(($serial_e+$serial_j) / ($serial_e_all+$serial_j_all) * 100,2);?>% */ ?>