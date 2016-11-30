<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	$school_year = 103; //為學年度
	
	//補一table name
	$table_name = "alc_parenting_education";
	$table_name_effect = $table_name."_effect";
	
	$main_seq = $_POST['main_seq'];
	
	$get_id = $_GET['acc'];
	
	if($get_id != "")
		$main_seq = $get_id;
	
	//教育部核定金額
	$sql = " select a1.edu_total_money, a1.edu_p1_money, a1.edu_p2_money ".
		   "      , a1_e.* ".
		   " from $table_name as a1 left join $table_name_effect as a1_e on a1.sy_seq = a1_e.sy_seq ".
		   " where a1.sy_seq = '$main_seq' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0
		$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money'];
		$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
		
		$execute_money = ($row['execute_money'] == '')?0:$row['execute_money'];
		$p1_times = $row['p1_times'];
		$p1_parents = $row['p1_parents'];
		$p1_target_parents = $row['p1_target_parents'];
		$p1_used_money = ($row['p1_used_money'] == '')?0:$row['p1_used_money'];
		$p2_people = $row['p2_people'];
		$p2_used_money = ($row['p2_used_money'] == '')?0:$row['p2_used_money'];
		$effect_desc = $row['effect_desc'];
		$remark = $row['remark'];
		$update_date = $row['update_date'];
		
	}
	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="" onSubmit="return toCheck();">
<p>
<font color="blue"><strong><?=$school_year;?>年度執行成果填報</strong></font><br />
<strong>項目：一、推展親職教育活動  </strong><a href="/edu/modules/xSchoolForm/download/allowance-01.htm" target="_blank">(補助項目說明)</a>
<table border="0">
	<tr>
		<td>
			<font color="blue">※核定經費：<input type="text" size="6" name="edu_total_money" id="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align: right;" readonly >元
			(親職教育：<input type="text" size="6" name="edu_p1_money" id="edu_p1_money" value="<?=$edu_p1_money;?>" style="border:0px; text-align: right;" readonly >元，
			家庭輔導：<input type="text" size="6" name="edu_p2_money" id="edu_p2_money" value="<?=$edu_p2_money;?>" style="border:0px; text-align: right;" readonly >元)。</font>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<font color="blue"><strong>※執行金額：</strong>
			<input size="6" name="execute_money" type="text" id="execute_money" style="border:0px; text-align: right;" readonly value="<?=$execute_money;?>">元。</font>(執行進度依據，由下方資料自動加總)
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※親職教育活動：</strong><br />
			已辦理場次<input name="p1_times" type="text" id="p1_times" size="6" value="<?=$p1_times;?>" style="border:0px; text-align: right;" readonly >場，
			已使用經費<input name="p1_used_money" type="text" id="p1_used_money" size="6" value="<?=$p1_used_money;?>" style="border:0px; text-align: right;" readonly >元。<br />
			參與家長人數<input name="p1_parents" type="text" id="p1_parents" size="4" value="<?=$p1_parents;?>" style="border:0px; text-align: right;" readonly >人，
			其中目標學生家長<input name="p1_target_parents" type="text" id="p1_target_parents" size="4" value="<?=$p1_target_parents;?>" style="border:0px; text-align: right;" readonly >人。
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※目標學生個案家庭輔導：</strong><br />
			已輔導學生數<input name="p2_people" type="text" id="p2_people" size="6" value="<?=$p2_people;?>" style="border:0px; text-align: right;" readonly >人，
			已使用經費<input name="p2_used_money" type="text" id="p2_used_money" size="6" value="<?=$p2_used_money;?>" style="border:0px; text-align: right;" readonly >元。
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※成效或執行成果說明</strong> <font color=black>(目前為執行期間，若無免填)</font>：<br />
			<textarea name="effect_desc" cols="70" rows="5" id="effect_desc" style="border:0px; text-align: left;" readonly ><?=$effect_desc;?></textarea>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※困難或建議事項</strong> (若無免填)：請於其他文件編輯完成後，再複製貼上。<br />
			<textarea name="remark" cols="70" rows="5" id="remark" style="border:0px; text-align: left;" readonly ><?=$remark;?></textarea>
			<p>
		</td>
	</tr>
	<tr>
		<td>
		</td>
	</tr>
</table>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<INPUT TYPE="button" VALUE="回上一頁" onClick="history.go(-1)">

</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>