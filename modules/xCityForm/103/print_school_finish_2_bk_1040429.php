<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<form style="margin:0px; display:inline;">
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<p>
<div id="show_all" onClick="js:tb_control(this);" style="display:inline;">
	●<font color="#436EEE" style="cursor:pointer;">顯示全部</font>
</div>
<div id="show_e" onClick="js:tb_control(this);" style="display:inline;">
	●<font color="#436EEE" style="cursor:pointer;">顯示國小列表</font>
</div>
<div id="show_j" onClick="js:tb_control(this);" style="display:inline;">
	●<font color="#436EEE" style="cursor:pointer;">顯示國中列表</font>
</div>
<p>
<div id="list_e">
<table border="0">
	<tr>
		<td><font color="blue"><?=$cityname;?></font> 未填報完成國小學校列表</td>
	</tr>
</table> 
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標彙整表</td>
		<td>申請補助彙整表</td>
	</tr>
<?
	$school_year = 103; //為學年度
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , su.final_1, su.final_2 ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_upload_name as su on sy.seq_no = su.sy_seq ".
		   " where (sy.school_year = '$school_year' or sy.school_year is null) ". 
		   "   and sd.enabled = 'Y' ".
		   "   and sd.cityname = '$cityname' ".
		   "   and sd.schooltype = '1' ".
		   " order by sd.account ";
		   
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial_e = 0;
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
		
		if($final_1 == '' || $final_2 == '')
		{
			$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
			//echo $file_path;
	
			$serial_e++;
			echo "<tr>";
			echo "<td align='center'>$serial_e</td>";
			echo "<td>$account</td>";
			echo "<td>";
			echo $cityname.$district.$schoolname;//學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='".$file_path.$final_1."' target='_new'>$final_1</a>";//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='".$file_path.$final_2."' target='_new'>$final_2</a>";//檔案二
			echo "</td>";
			echo "</tr>";
			
		}
				
	}
	
?>
</table>
國小校數：<font color=blue><?=$serial_e;?></font>校
<p>
</div>
<div id="list_j">
<table border="0">
	<tr>
		<td><font color="blue"><?=$cityname;?></font> 未填報完成國中學校列表</td>
	</tr>
</table> 
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td>序號</td>
		<td>學校代碼</td>
		<td>學校名稱</td>
		<td>指標彙整表</td>
		<td>申請補助彙整表</td>
	</tr>
<?
	$school_year = 103; //為學年度
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , su.final_1, su.final_2 ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_upload_name as su on sy.seq_no = su.sy_seq ".
		   " where (sy.school_year = '$school_year' or sy.school_year is null) ". 
		   "   and sd.enabled = 'Y' ".
		   "   and sd.cityname = '$cityname' ".
		   "   and sd.schooltype = '2' ".
		   " order by sd.account ";
		   
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial_j = 0;
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
		
		if($final_1 == '' || $final_2 == '')
		{
			$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
			//echo $file_path;
	
			$serial_j++;
			echo "<tr>";
			echo "<td align='center'>$serial_j</td>";
			echo "<td>$account</td>";
			echo "<td>";
			echo $cityname.$district.$schoolname;//學校名稱
			echo "</td>";
			echo "<td>";
			echo "<a href='".$file_path.$final_1."' target='_new'>$final_1</a>";//檔案一
			echo "</td>";
			echo "<td>";
			echo "<a href='".$file_path.$final_2."' target='_new'>$final_2</a>";//檔案二
			echo "</td>";
			echo "</tr>";
			
		}
				
	}
	
?>
</table>
國中校數：<font color=blue><?=$serial_j;?></font>校
<p>
</div>
合計校數：<font color=blue><?=$serial_e+$serial_j;?></font>校<p>
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