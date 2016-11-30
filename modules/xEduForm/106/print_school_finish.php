<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "../../function/config_for_106.php"; //本年度基本設定
?>
<p>

<a href="school_update.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

學校指標、經費與檔案查詢 / <b>送出查詢</b>

<p>
<hr>
<p>

<font color="blue">
	<?
		$class = $_POST["class"];//傳回填報與未填報的值

		//縣市是否勾選，把勾選的串成SQL要用的字串
		$str_sql = "";
		for($i = 1; $i <= 22; $i++)
		{
			$chk = $_POST["checkbox_city".$i];

			if($chk != "")
			{
				if($str_sql != "")  // 非第一個顯示的縣市，前加上頓號
				{
					echo "、";
				}
				echo $chk;

				$str_sql .= ", '".$chk."'";  // 完成後變成 , '縣市', '縣市', '縣市'
			}
		}
	?>
</font>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
學校列表
<div id="print_content">
	<table border="1">
		<tr height="30px" align="center">
			<td nowrap="nowrap">序號</td>
			<td nowrap="nowrap">學校代碼</td>
			<td>學校名稱</td>
			<td nowrap="nowrap">指標界定表<br>（已核章）</td>
			<td nowrap="nowrap">經費需求表<br>（已核章）</td>
			<td nowrap="nowrap">補助經費<br>審核狀況</td>
			<td nowrap="nowrap">學校上傳<br>計畫檔案</td>
		</tr>
		<?
			$sql =	" SELECT sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sun.final_1, sun.final_2, sy.keep, su_ly.final_1 AS final_1_ly ".
					" FROM schooldata AS sd LEFT JOIN schooldata_year    AS sy    ON sd.account   = sy.account AND sy.school_year = '$school_year' 						 ".
					" 						LEFT JOIN school_upload_name AS sun   ON sy.seq_no    = sun.sy_seq 															 ".
					" 						LEFT JOIN schooldata_year    AS sy_ly ON sd.account   = sy_ly.account AND sy_ly.school_year = '".($school_year - 1)."' 		 ".
					"						LEFT JOIN school_upload_name AS su_ly ON sy_ly.seq_no = su_ly.sy_seq  														 ".
					" WHERE sd.cityname IN ('' $str_sql)".
					"   AND ((sd.enabled = 'Y' AND sd.create_year <= $school_year)  ".
					"	 OR  (sd.enabled = 'N' AND sd.create_year <= $school_year   ".
					"						   AND sd.delete_year >= $school_year)) ".
					" ORDER BY sd.cityname, sd.district, sd.account ";

			$result = mysql_query($sql);
			$serial = 0;
			while($row = mysql_fetch_array($result))
			{
				$account    = $row['account'];
				$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
				$cityname   = $row['cityname'];
				$district   = $row['district'];
				$schoolname = $row['schoolname'];
				$area       = $row['area'];

				$final_1 = $row['final_1'];  // 指標界定調查紀錄表
				$final_2 = $row['final_2'];  // 補助項目經費需求彙整表

				// $keep = $row['keep']; 106年度重填資料不用管keep了！

				$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
				$serial++;
				echo "<tr height='40px'>";
				echo "<td align='center'>".$serial."</td>";
				echo "<td align='center'>".$account."</td>";
				echo "<td>".$cityname.$district.$schoolname."</td>";

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
				echo "<td align='center'><a href='school_upload_file.php?id=".$account."' target='_self'>計畫檔案</a></td>";
				echo "</tr>";
			}
		?>
	</table><p>
校數：<font color=blue><? echo $serial; ?></font>校<br /><br />
</div>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
<?
	if($class == '1') echo ' 全部學校列表<p>';
	if($class == '2') echo ' 已填報完成學校<p>';
	if($class == '3') echo ' 未填報完成學校<p>';
?>
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標界定調查表</td>
		<td>申請補助彙整表</td>
<?

	$count_e = 0;
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area ".
		   " 	  , sun.final_1, sun.final_2 ".


		   "      ,sy.keep ".
		   "      , su_ly.final_1 as final_1_ly ".


		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".
		   "                       left join school_upload_name as sun on sy.seq_no = sun.sy_seq ".

		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year =  '".($school_year - 1)."' ".
		   "                       left join school_upload_name as su_ly on sy_ly.seq_no = su_ly.sy_seq  ".

		   " where sd.cityname in ('' $str_sql)".
		   "   and ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year >= $school_year)) ".
		   " order by sd.cityname ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];

		$final_1 = $row['final_1'];
		$final_2 = $row['final_2'];


		$keep = $row['keep'];  //j10410
		$final_3 = $row['final_1_ly'];

		$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
		$file_path3 = '/epa_uploads/'.($school_year-1).'/pub/'.$account.'/';

		if($class == '2')
		  {
	   	   	   if($keep ==1)
	   	   	       {
					   	if($final_2 != "")
								{
									$count_e ++;

									echo "<tr>";
									echo "<td align='center'>";
									echo $count_e;//序號
									echo "</td>";
									echo "<td>";
									echo "<a href='print_edu_examined.php?id=$account' target='_blank'>$account</a>";//連結
									echo "</td>";
									echo "<td>";
									echo $cityname.$district.$schoolname;//學校名稱
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path3.$final_3."' target='_new'>下載檔案</a>";//檔案一$final_1
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path.$final_2."' target='_new'>下載檔案</a>";//檔案一$final_2
									echo "</td>";
									echo "</tr>";
								}
	   	     		   }else{

					if($final_1 != "" && $final_2 != "")
								{
									$count_e ++;

									echo "<tr>";
									echo "<td align='center'>";
									echo $count_e;//序號
									echo "</td>";
									echo "<td>";
									echo "<a href='print_edu_examined.php?id=$account' target='_blank'>$account</a>";//連結
									echo "</td>";
									echo "<td>";
									echo $cityname.$district.$schoolname;//學校名稱
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path.$final_1."' target='_new'>下載檔案</a>";//檔案一$final_1
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path.$final_2."' target='_new'>下載檔案</a>";//檔案一$final_2
									echo "</td>";
									echo "</tr>";
								}
					   }
		}

		if($class == '3')
	  		{
				if($keep ==1)
	   	   	         {
						if($final_2 == "")
								{
									$count_e ++;

									echo "<tr>";
									echo "<td align='center'>";
									echo $count_e;//序號
									echo "</td>";
									echo "<td>";
									echo "<a href='print_edu_examined.php?id=$account' target='_blank'>$account</a>";//連結
									echo "</td>";
									echo "<td>";
									echo $cityname.$district.$schoolname;//學校名稱
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path3.$final_3."' target='_new'>下載檔案</a>";//檔案一$final_1
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path.$final_2."' target='_new'>下載檔案</a>";//檔案一$final_2
									echo "</td>";
									echo "</tr>";
								}
			      }else{
						if ($final_1 == "" || $final_2 == "")
								{
									$count_e ++;

									echo "<tr>";
									echo "<td align='center'>";
									echo $count_e;//序號
									echo "</td>";
									echo "<td>";
									echo "<a href='print_edu_examined.php?id=$account' target='_blank'>$account</a>";//連結
									echo "</td>";
									echo "<td>";
									echo $cityname.$district.$schoolname;//學校名稱
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path.$final_1."' target='_new'>下載檔案</a>";//檔案一$final_1
									echo "</td>";
									echo "<td>";
									echo "<a href='".$file_path.$final_2."' target='_new'>下載檔案</a>";//檔案一$final_2
									echo "</td>";
									echo "</tr>";
								}
				  }

	     	}
	}
?>
</table>
*/
?>