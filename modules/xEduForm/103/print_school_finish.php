<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<?
	$school_year = 103;
	
	$class = $_POST["class"];//傳回填報與未填報的值

	//縣市是否勾選，把勾選的串成SQL要用的字串
	$str_sql = "";
	for($i = 2;$i <= 23;$i++)
	{
		$chk = $_POST["checkbox".$i];
		if($chk != "")
		{
			$str_sql .= ", '".$chk."'"; //完成後變成 , '縣市', '縣市', '縣市'
		}
	}
		
	/*echo $str_sql;
	$ntpc = $_POST["checkbox2"];//新北市
	$tp = $_POST["checkbox3"];
	$tyc = $_POST["checkbox4"];
	$hcc = $_POST["checkbox5"];
	$hcs = $_POST["checkbox6"];
	$mlc = $_POST["checkbox7"];
	$tc = $_POST["checkbox8"];
	$ntct = $_POST["checkbox9"];
	$chc = $_POST["checkbox10"];
	$ylc = $_POST["checkbox11"];
	$cyc = $_POST["checkbox12"];
	$cys = $_POST["checkbox13"];
	$tn = $_POST["checkbox14"];
	$kh = $_POST["checkbox15"];
	$ptc = $_POST["checkbox16"];
	$ttct = $_POST["checkbox17"];
	$hlc = $_POST["checkbox18"];
	$ilc = $_POST["checkbox19"];
	$kl = $_POST["checkbox20"];
	$phc = $_POST["checkbox21"];
	$km = $_POST["checkbox22"];
	$matsu = $_POST["checkbox23"];//連江縣*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<br />
<? 
	if($class == '1') echo '已填報完成之學校名冊';
	if($class == '2') echo '未填報完成之學校名冊';
?>
<div id="print_content">
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

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account and sy.school_year = '$school_year' ".   //and sy.school_year = '$school_year' 
		   "                       left join school_upload_name as sun on sy.seq_no = sun.sy_seq ".
		   " where sd.cityname in ('' $str_sql)".
		   "   and ((sd.enabled = 'Y' and sd.create_year <= $school_year) or (sd.enabled = 'N' and sd.create_year <= $school_year and sd.delete_year > $school_year)) ".
		   " order by sd.cityname ";
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
		
		$final_1 = $row['final_1'];
		$final_2 = $row['final_2'];
		
		//$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
		$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
		
		if($class == '1' && $final_1 != "" && $final_2 != "")
		{
			$count_e ++;
			
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			//echo "$row[0]";//學校代碼
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
		
		if($class == '2' && ($final_1 == "" || $final_2 == ""))
		{
			$count_e ++;
			
			echo "<tr>";
			echo "<td align='center'>";
			echo $count_e;//序號
			echo "</td>";
			echo "<td>";
			//echo "$row[0]";//學校代碼
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
?>
</table>
校數：<font color=blue><? echo $count_e; ?></font>校<br /><br />
</div>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 