<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
?>
<?
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$get_id = $_GET['acc'];
	
	if($get_id != "")
		$username = $get_id;
		
	$sql = "select * from school_upload_name where account = '$username' and school_year = '$school_year' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
		$a1_3 = $row['a1_3'];
		$a1_4 = $row['a1_4'];
		$a2_1 = $row['a2_1'];
		$a2_2 = $row['a2_2'];
		$a2_3 = $row['a2_3'];
		$a2_4 = $row['a2_4'];
		$a3_1 = $row['a3_1'];
		$a3_2 = $row['a3_2'];
		$a3_3 = $row['a3_3'];
		$a3_4 = $row['a3_4'];
		$a4_1 = $row['a4_1'];
		$a4_2 = $row['a4_2'];
		$a4_3 = $row['a4_3'];
		$a4_4 = $row['a4_4'];
		$a5_1 = $row['a5_1'];
		$a5_2 = $row['a5_2'];
		$a5_3 = $row['a5_3'];
		$a5_4 = $row['a5_4'];
		$a6_1 = $row['a6_1'];
		$a6_2 = $row['a6_2'];
		$a6_3 = $row['a6_3'];
		$a6_4 = $row['a6_4'];
		$a7_1 = $row['a7_1'];
		$a7_2 = $row['a7_2'];
		$a7_3 = $row['a7_3'];
		$a7_4 = $row['a7_4'];
		
		$a1 = $a1_1.$a1_2.$a1_3.$a1_4;
		$a2 = $a2_1.$a2_2.$a2_3.$a2_4;
		$a3 = $a3_1.$a3_2.$a3_3.$a3_4;
		$a4 = $a4_1.$a4_2.$a4_3.$a4_4;
		$a5 = $a5_1.$a5_2.$a5_3.$a5_4;
		$a6 = $a6_1.$a6_2.$a6_3.$a6_4;
		$a7 = $a7_1.$a7_2.$a7_3.$a7_4;
		$a = $a1.$a2.$a3.$a4.$a5.$a6.$a7;
	}
	
	$file_path = '/edu_upload/'.$school_year.'/'.$username.'/';
	//echo $file_path;
	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="返回學校功能選單" onClick="location='school_index.php'"><br />
<form name="form" method="post" action="basedata_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong><?$school_year;?> 年度 貴校申請補助項目已上傳原始檔案列表</strong></font>
<? if($a == "") {echo "<!---";} ?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td width="200" height="50" align="center" bgcolor="#99CCCC">補助項目</td>
		<td height="50" align="center" bgcolor="#99CCCC">檔案一</td>
		<td height="50" align="center" bgcolor="#99CCCC">檔案二</td>
		<td height="50" align="center" bgcolor="#99CCCC">檔案三</td>
		<td height="50" align="center" bgcolor="#99CCCC">檔案四</td>
	</tr>
<? if($a == "") {echo "--->";} ?>
<? if($a1 == "") {echo "<!---";}?>
	<tr>
		<td width="200" height="50">1.補助推展親職教育活動</td>
		<td align="center">
			<? printLink($file_path, $a1_1);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a1_2);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a1_3);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a1_4);?>
		</td>
	</tr>
<? if($a1 == "") {echo "--->";}?>
<? if($a2 == "") {echo "<!---";}?>
	<tr>
		<td width="200" height="50">2.補助學校發展教育特色</td>
		<td align="center">
			<? printLink($file_path, $a2_1);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a2_2);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a2_3);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a2_4);?>
		</td>
	</tr>
<? if($a2 == "") {echo "--->";}?>
<? if($a3 == "") {echo "<!---";}?>
	<tr>
		<td width="200" height="50">3.修繕離島或偏遠地區師生宿舍</td>
		<td align="center">
			<? printLink($file_path, $a3_1);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a3_2);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a3_3);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a3_4);?>
		</td>
	</tr>
<? if($a3 == "") {echo "--->";}?>
<? if($a4 == "") {echo "<!---";}?>
	<tr>
		<td width="200" height="50">4.充實學校基本教學設備</td>
		<td align="center">
			<? printLink($file_path, $a4_1);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a4_2);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a4_3);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a4_4);?>
		</td>
	</tr>
<? if($a4 == "") {echo "--->";}?>
<? if($a5 == "") {echo "<!---";}?>
	<tr>
		<td width="200" height="50">5.發展原住民教育文化特色及充實設備器材</td>
		<td align="center">
			<? printLink($file_path, $a5_1);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a5_2);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a5_3);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a5_4);?>
		</td>
	</tr>
<? if($a5 == "") {echo "--->";}?>
<? if($a6 == "") {echo "<!---";}?>
	<tr>
		<td width="200" height="50">6.補助交通不便地區學校交通車</td>
		<td align="center">
			<? printLink($file_path, $a6_1);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a6_2);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a6_3);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a6_4);?>
		</td>
	</tr>
<? if($a6 == "") {echo "--->";}?>
<? if($a7 == "") {echo "<!---";}?>
	<tr>
		<td width="200" height="50">7.整修學校社區化活動場所</td>
		<td align="center">
			<? printLink($file_path, $a7_1);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a7_2);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a7_3);?>
		</td>
		<td align="center">
			<? printLink($file_path, $a7_4);?>
		</td>
	</tr>
<? if($a7 == "") {echo "--->";}?>
<? if($a == "") {echo "<!---";} ?>
</table>
<? if($a == "") {
	echo "--->";
	echo "<p><font color='red'>貴校無上傳補助項目申請檔案。</font><p>";
}?>
<p><font color="blue"><strong>注意事項：</strong></font><br />
1. 僅列出申請填報期間，貴校有上傳檔案的補助項目。<br />
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>