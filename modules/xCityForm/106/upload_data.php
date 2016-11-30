<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	while($row = mysql_fetch_row($result))
	{
		$city = $row[1];
		$cityman = $row[2];
		$examine = $row[3];
		$cityno = $row[4];
	}
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

<b><img src="/edu/images/upload.png" align="absmiddle"> 縣市上傳檔案</b>

<p>
<hr>
<p>

<? if($cityno == '0' ){echo "<!--";}?>

	<img src="/edu/images/dot_03.gif" align="absmiddle" /> 106年度 縣市應上傳檔案（上傳檔案後請按 F5 重新整理）<p>

　　<a href="../xSchoolForm/download/102縣市初審委員名單_空白.xls" target="_blank">● 初審委員聯絡資料（空白檔案）</a><p>

	<?
		//讀取上傳檔案資料
		$sql = "select  *  from   city_upload_name where cityname like '$city' and school_year = '106' ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$account_106 = $row['account'];
			$file_106_1 = $row['city_1'];
			$file_106_2 = $row['city_2'];
			$file_106_3 = $row['city_3'];
			$file_106_4 = $row['city_4'];
			$file_106_5 = $row['city_5'];
			$file_106_6 = $row['city_6'];
		}
		$file_106_1_name = '縣市初審委員聯絡資料';
		$file_106_2_name = '補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)';
		$file_106_3_name = '指標界定調查結果彙整表 (表Ⅱ-3)';
		$file_106_4_name = '縣市交通車調查表';
		$file_106_5_name = '縣市自編交通車經費文件';
		$file_106_6_name = '縣市自編彙整表';

		$file_path = '/epa_uploads/106/pub/'.$account_106.'/';
	?>
	<form action="file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
		<?
			if ($cityno!='0' && $file_106_1 == '')
			{
				echo "　(1) <font color=red>[未上傳] " . $file_106_1_name . "</font>";
			}
			elseif ($cityno!='0')
			{
				echo "　(1) <font color=blue>[已上傳]</font>  <a href='".$file_path.$file_106_1."' target='_new'><b>" . $file_106_1_name . "</b></a>";
				echo " <img src='/edu/images/yes.png' align='absmiddle' />";
			}
		?>
		<p>
		<input type="hidden" name="max_file_size" value="102400000">
		<input type="hidden" name="table" value="city_1">
	　　<input type="file" name="myfile">
		<input type="submit" value=" 上 傳 ">
	</form>

	<form action="file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
		<?
			if ($cityno!='0' && $file_106_2 == '')
			{
				echo "　(2) <font color=red>[未上傳] " . $file_106_2_name . "</font>";
			}
			elseif ($cityno!='0')
			{
				echo "　(2) <font color=blue>[已上傳]</font>  <a href='".$file_path.$file_106_2."' target='_new'><b>" . $file_106_2_name . "</b></a>";
				echo " <img src='/edu/images/yes.png' align='absmiddle' />";
			}
		?>
		<p>
		<input type="hidden" name="max_file_size" value="102400000">
		<input type="hidden" name="table" value="city_2">
	　　<input type="file" name="myfile">
		<input type="submit" value=" 上 傳 ">
	</form>

	<form action="file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
		<?
			if ($cityno!='0' && $file_106_3 == '')
			{
				echo "　(3) <font color=red>[未上傳] " . $file_106_3_name . "</font>";
			}
			elseif ($cityno!='0')
			{
				echo "　(3) <font color=blue>[已上傳]</font>  <a href='".$file_path.$file_106_3."' target='_new'><b>" . $file_106_3_name . "</b></a>";
				echo " <img src='/edu/images/yes.png' align='absmiddle' />";
			}
		?>
		<p>
		<input type="hidden" name="max_file_size" value="102400000">
		<input type="hidden" name="table" value="city_3">
	　　<input type="file" name="myfile">
		<input type="submit" value=" 上 傳 ">
	</form>

	<form action="file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
		<?
			if ($cityno!='0' && $file_106_4 == '')
			{
				echo "　(4) <font color=red>[未上傳] " . $file_106_4_name . "</font>";
			}
			elseif ($cityno!='0')
			{
				echo "　(4) <font color=blue>[已上傳]</font>  <a href='".$file_path.$file_106_4."' target='_new'><b>" . $file_106_4_name . "</b></a>";
				echo " <img src='/edu/images/yes.png' align='absmiddle' />";
			}
		?>
		<p>
		<input type="hidden" name="max_file_size" value="102400000">
		<input type="hidden" name="table" value="city_4">
	　　<input type="file" name="myfile">
		<input type="submit" value=" 上 傳 ">
	</form>

	<form action="file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
		<?
			if ($cityno!='0' && $file_106_5 == '')
			{
				echo "　(5) <font color=red>[未上傳] " . $file_106_5_name . "</font>";
			}
			elseif ($cityno!='0')
			{
				echo "　(5) <font color=blue>[已上傳]</font>  <a href='".$file_path.$file_106_5."' target='_new'><b>" . $file_106_5_name . "</b></a>";
				echo " <img src='/edu/images/yes.png' align='absmiddle' />";
			}
		?>
		<p>
		<input type="hidden" name="max_file_size" value="102400000">
		<input type="hidden" name="table" value="city_5">
	　　<input type="file" name="myfile">
		<input type="submit" value=" 上 傳 ">
	</form>
	
	<form action="file_up_city.php" method="post" enctype="multipart/form-data" target="_self">
		<?
			if ($cityno!='0' && $file_106_6 == '')
			{
				echo "　(6) <font color=red>[未上傳] " . $file_106_6_name . "</font>";
			}
			elseif ($cityno!='0')
			{
				echo "　(6) <font color=blue>[已上傳]</font>  <a href='".$file_path.$file_106_6."' target='_new'><b>" . $file_106_6_name . "</b></a>";
				echo " <img src='/edu/images/yes.png' align='absmiddle' />";
			}
		?>
		<p>
		<input type="hidden" name="max_file_size" value="102400000">
		<input type="hidden" name="table" value="city_6">
	　　<input type="file" name="myfile">
		<input type="submit" value=" 上 傳 ">
	</form>

	<hr>

	<img src="/edu/images/dot_03.gif" align="absmiddle" /> 105年度 縣市已上傳檔案<p>

	<?
		// 讀取上傳檔案資料
		$sql = "select  *  from   city_upload_name where cityname like '$city' and school_year = '105' ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$account_105 = $row['account'];
			$file_105_1 = $row['city_1'];
			$file_105_1_name = '縣市初審委員聯絡資料';
			$file_105_2 = $row['city_2'];
			$file_105_2_name = '補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)';
			$file_105_3 = $row['city_3'];
			$file_105_3_name = '指標界定調查結果彙整表 (表Ⅱ-3)';
			$file_105_4 = $row['city_4'];
			$file_105_4_name = '縣市交通車調查表';
			$file_105_5 = $row['city_5'];
			$file_105_5_name = '縣市自編交通車經費文件';
		}
		$file_path = '/epa_uploads/105/pub/'.$account_105.'/';  // 104.05.05 修改上傳路徑

		// 105-1
		if ($cityno!='0' && $file_105_1 == '')
		{
			echo "　　(1) " . $file_105_1_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(1) <font color=blue><a href='".$file_path.$file_105_1."' target='_new'>" . $file_105_1_name . "</a></font>";
		}
		echo "<p>";

		// 105-2
		if ($cityno!='0' && $file_105_2 == '')
		{
			echo "　　(2) " . $file_105_2_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(2) <font color=blue><a href='".$file_path.$file_105_2."' target='_new'>" . $file_105_2_name . "</a></font>";
		}
		echo "<p>";

		// 105-3
		if ($cityno!='0' && $file_105_3 == '')
		{
			echo "　　(3) " . $file_105_3_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(3) <font color=blue><a href='".$file_path.$file_105_3."' target='_new'>" . $file_105_3_name . "</a></font>";
		}
		echo "<p>";

		// 105-4
		if ($cityno!='0' && $file_105_4 == '')
		{
			echo "　　(4) " . $file_105_4_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(4) <font color=blue><a href='".$file_path.$file_105_4."' target='_new'>" . $file_105_4_name . "</a></font>";
		}
		echo "<p>";

		// 105-5
		if ($cityno!='0' && $file_105_5 == '')
		{
			echo "　　(5) " . $file_105_5_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(5) <font color=blue><a href='".$file_path.$file_105_5."' target='_new'>" . $file_105_5_name . "</a></font>";
		}
		echo "<p>";
	?>

	<hr>

	<img src="/edu/images/dot_03.gif" align="absmiddle" /> 104年度 縣市已上傳檔案<p>

	<?
		//讀取上傳檔案資料
		$sql = "select  *  from   city_upload_name where cityname like '$city' and school_year = '104' ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$account_104 = $row['account'];
			$file_104_1 = $row['city_1'];
			$file_104_1_name = '縣市初審委員聯絡資料';
			$file_104_2 = $row['city_2'];
			$file_104_2_name = '補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)';
			$file_104_3 = $row['city_3'];
			$file_104_3_name = '指標界定調查結果彙整表 (表Ⅱ-3)';
			$file_104_4 = $row['city_4'];
			$file_104_4_name = '縣市交通車調查表';
			$file_104_5 = $row['city_5'];
			$file_104_5_name = '縣市自編交通車經費文件';
		}
		$file_path = '/epa_uploads/104/pub/'.$account_104.'/';  // 104.05.05 修改上傳路徑

		// 104-1
		if ($cityno!='0' && $file_104_1 == '')
		{
			echo "　　(1) " . $file_104_1_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(1) <font color=blue><a href='".$file_path.$file_104_1."' target='_new'>" . $file_104_1_name . "</a></font>";
		}
		echo "<p>";

		// 104-2
		if ($cityno!='0' && $file_104_2 == '')
		{
			echo "　　(2) " . $file_104_2_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(2) <font color=blue><a href='".$file_path.$file_104_2."' target='_new'>" . $file_104_2_name . "</a></font>";
		}
		echo "<p>";

		// 104-3
		if ($cityno!='0' && $file_104_3 == '')
		{
			echo "　　(3) " . $file_104_3_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(3) <font color=blue><a href='".$file_path.$file_104_3."' target='_new'>" . $file_104_3_name . "</a></font>";
		}
		echo "<p>";

		// 104-4
		if ($cityno!='0' && $file_104_4 == '')
		{
			echo "　　(4) " . $file_104_4_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(4) <font color=blue><a href='".$file_path.$file_104_4."' target='_new'>" . $file_104_4_name . "</a></font>";
		}
		echo "<p>";

		// 104-5
		if ($cityno!='0' && $file_104_5 == '')
		{
			echo "　　(5) " . $file_104_5_name;
		}
		elseif ($cityno!='0')
		{
			echo "　　(5) <font color=blue><a href='".$file_path.$file_104_5."' target='_new'>" . $file_104_5_name . "</a></font>";
		}
		echo "<p>";
	?>

	<hr>

<? if($cityno == '0' ){echo "-->";}?>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
  <p>
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_2">
<input type="file" name="myfile">
<input type="submit" value="上傳表II-2縣市審核結果(經費核定總表)">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_3">
<input type="file" name="myfile">
<input type="submit" value="上傳表II-3縣市審核結果(指標彙整表)">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_4">
<input type="file" name="myfile">
<input type="submit" value="上傳縣市現有交通車調查表">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_5">
<input type="file" name="myfile">
<input type="submit" value="上傳縣市自行編列交通車相關經費同意書">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_1">
<input type="file" name="myfile">
<input type="submit" value="上傳學校聯絡初審委員方式資料">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_2">
<input type="file" name="myfile">
<input type="submit" value="上傳表II-2縣市審核結果(經費核定總表)">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_3">
<input type="file" name="myfile">
<input type="submit" value="上傳表II-3縣市審核結果(指標彙整表)">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_4">
<input type="file" name="myfile">
<input type="submit" value="上傳縣市現有交通車調查表">
<input type="hidden" name="max_file_size" value="102400000">
<input type="hidden" name="table" value="city_5">
<input type="file" name="myfile">
<input type="submit" value="上傳縣市自行編列交通車相關經費同意書">
*/

// 初審委員聯絡資料<a href="../xSchoolForm/download/102縣市初審委員名單_空白.xls" target="_blank">(空白檔案)</a>

/*
<img src="/edu/images/dot_03.gif" align="absmiddle" /> 103年度 縣市已上傳檔案<p>

<?
	//讀取上傳檔案資料
	$sql = "select  *  from   city_upload_name where cityname like '$city' and school_year = '103' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account_103 = $row['account'];
		$file_103_1 = $row['city_1'];
		$file_103_1_name = '縣市初審委員聯絡資料';
		$file_103_2 = $row['city_2'];
		$file_103_2_name = '補助項目經費彙整表（縣市初審列表） (表Ⅱ-2)';
		$file_103_3 = $row['city_3'];
		$file_103_3_name = '指標界定調查結果彙整表 (表Ⅱ-3)';
		$file_103_4 = $row['city_4'];
		$file_103_4_name = '縣市交通車調查表';
		$file_103_5 = $row['city_5'];
		$file_103_5_name = '縣市自編交通車經費文件';
	}
	$file_path = '/epa_uploads/103/pub/'.$account_103.'/';  // 103.05.05 修改上傳路徑

	// 103-1
	if ($cityno!='0' && $file_103_1 == '')
	{
		echo "　　(1) <font color=red>[未上傳]</font> " . $file_103_1_name;
	}
	elseif ($cityno!='0')
	{
		echo "　　(1) <font color=blue><a href='".$file_path.$file_103_1."' target='_new'>" . $file_103_1_name . "</a></font>";
	}
	echo "<p>";

	// 103-2
	if ($cityno!='0' && $file_103_2 == '')
	{
		echo "　　(2) <font color=red>[未上傳]</font> " . $file_103_2_name;
	}
	elseif ($cityno!='0')
	{
		echo "　　(2) <font color=blue><a href='".$file_path.$file_103_2."' target='_new'>" . $file_103_2_name . "</a></font>";
	}
	echo "<p>";

	// 103-3
	if ($cityno!='0' && $file_103_3 == '')
	{
		echo "　　(3) <font color=red>[未上傳]</font> " . $file_103_3_name;
	}
	elseif ($cityno!='0')
	{
		echo "　　(3) <font color=blue><a href='".$file_path.$file_103_3."' target='_new'>" . $file_103_3_name . "</a></font>";
	}
	echo "<p>";

	// 103-4
	if ($cityno!='0' && $file_103_4 == '')
	{
		echo "　　(4) <font color=red>[未上傳]</font> " . $file_103_4_name;
	}
	elseif ($cityno!='0')
	{
		echo "　　(4) <font color=blue><a href='".$file_path.$file_103_4."' target='_new'>" . $file_103_4_name . "</a></font>";
	}
	echo "<p>";

	// 103-5
	if ($cityno!='0' && $file_103_5 == '')
	{
		echo "　　(5) <font color=red>[未上傳]</font> " . $file_103_5_name;
	}
	elseif ($cityno!='0')
	{
		echo "　　(5) <font color=blue><a href='".$file_path.$file_103_5."' target='_new'>" . $file_103_5_name . "</a></font>";
	}
	echo "<p>";
?>

<hr>

<img src="/edu/images/dot_03.gif" align="absmiddle" /> 102年度 縣市已上傳檔案<p>

<?
	//讀取上傳檔案資料
	$sql = "select  *  from   102city_upload_name where account like '$username'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$file_1 = $row[9];
		$file_1_name = ' (學校聯絡初審委員方式資料)';
		$file_2 = $row[10];
		$file_2_name = ' (表II-2,經費核定表總表)';
		$file_3 = $row[11];
		$file_3_name = ' (表II-3,指標彙整表)';
		$file_4 = $row[12];
		$file_4_name = ' (縣市交通車調查表)';
		$file_5 = $row[13];
		$file_5_name = ' (縣市自編交通車經費文件)';
	}

	echo "<p>　(1)";
	if ($cityno!='0' && $file_1 == ''){echo "狀態：<font color=red>未上傳".$file_1_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a>';}

	echo "<p>　(2)";
	if ($cityno!='0' && $file_2 == ''){echo "狀態：<font color=red>未上傳".$file_2_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a>';}

	echo "<p>　(3)";
	if ($cityno!='0' && $file_3 == ''){echo "狀態：<font color=red>未上傳".$file_3_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_3.'" target="_new">'.$file_3.$file_3_name.'</a>';}

	echo "<p>　(4)";
	if ($cityno!='0' && $file_4 == ''){echo "狀態：<font color=red>未上傳".$file_4_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_4.'" target="_new">'.$file_4.$file_4_name.'</a>';}

	echo "<p>　(5)";
	if ($cityno!='0' && $file_5 == ''){echo "狀態：<font color=red>未上傳".$file_5_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$file_5.'" target="_new">'.$file_5.$file_5_name.'</a>';}
?>

<p>
<img src="/edu/images/dot_01.gif" align="absmiddle" />101年度縣市上傳檔案：縣市審核結果(將紙本掃描後上傳，送教育部備查)
<?
	//讀取上傳檔案資料
	$sql = "select  *  from   102city_upload_name where name_2 like '$city'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$file_1 = $row[4];
		$file_1_name = ' (表II-2,經費核定表總表)';
		$file_2 = $row[5];
		$file_2_name = ' (表II-3,指標彙整表)';
		$file_3 = $row[6];
		$file_3_name = ' (縣市交通車調查表)';
		$file_4 = $row[7];
		$file_4_name = ' (縣市自編交通車經費文件)';
	}

	echo "<p>　(1)";
	if ($cityno!='0' && $file_1 == ''){echo "狀態：<font color=red>未上傳".$file_1_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a>';}

	echo "<p>　(2)";
	if ($cityno!='0' && $file_2 == ''){echo "狀態：<font color=red>未上傳".$file_2_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a>';}

	echo "<p>　(3)";
	if ($cityno!='0' && $file_3 == ''){echo "狀態：<font color=red>未上傳".$file_3_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_3.'" target="_new">'.$file_3.$file_3_name.'</a>';}

	echo "<p>　(4)";
	if ($cityno!='0' && $file_4 == ''){echo "狀態：<font color=red>未上傳".$file_4_name."</font>";} elseif ($cityno!='0') {echo '狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_4.'" target="_new">'.$file_4.$file_4_name.'</a>';}

?>
*/
?>