<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	
	include "../../function/config_for_106.php"; //本年度基本設定
	
	//補五table name
	$table_name = "alc_aboriginal_education";
	$table_name_effect = $table_name."_effect";
	
	$main_seq = $_POST['main_seq'];
	
	//教育部核定金額
	$sql = " select a4.edu_total_money, a4.edu_p1_current_money, a4.edu_p1_capital_money, a4.edu_p2_current_money, a4.edu_p2_capital_money ".
		   "      , a4.p1_name, a4.p2_name, a4_e.* ".
		   " from $table_name as a4 left join $table_name_effect as a4_e on a4.sy_seq = a4_e.sy_seq ".
		   " where a4.sy_seq = '$main_seq' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0
		$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
		$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
		$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
		$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];
		$p1_name = $row['p1_name'];
		$p2_name = $row['p2_name'];
		
		$edu_current_money = $edu_p1_current_money + $edu_p2_current_money;
		$edu_capital_money = $edu_p1_capital_money + $edu_p2_capital_money;
		
		$execute_money = ($row['execute_money'] == '')?0:$row['execute_money'];
		$execute_current_money = ($row['execute_current_money'] == '')?0:$row['execute_current_money'];
		$execute_capital_money = ($row['execute_capital_money'] == '')?0:$row['execute_capital_money'];
		
		$p1_students = $row['p1_students'];
		$p1_target_students = $row['p1_target_students'];
		$p1_used_money = ($row['p1_used_money'] == '')?0:$row['p1_used_money'];
		$p1_current_money = ($row['p1_current_money'] == '')?0:$row['p1_current_money'];
		$p1_capital_money = ($row['p1_capital_money'] == '')?0:$row['p1_capital_money'];
		
		$p2_students = $row['p2_students'];
		$p2_target_students = $row['p2_target_students'];
		$p2_used_money = ($row['p2_used_money'] == '')?0:$row['p2_used_money'];
		$p2_current_money = ($row['p2_current_money'] == '')?0:$row['p2_current_money'];
		$p2_capital_money = ($row['p2_capital_money'] == '')?0:$row['p2_capital_money'];
		
		$effect_desc = $row['effect_desc'];
		$remark = $row['remark'];
		$update_date = $row['update_date'];
		
	}
	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="" onSubmit="">
<p>
<font color="blue"><strong><?=$school_year;?>年度執行成果填報</strong></font><br />
<strong>項目：四、發展原住民教育文化特色及充實設備器材  </strong><a href="/edu/modules/xSchoolForm/download/allowance-05.htm" target="_blank">(補助項目說明)</a>
<p>
<table border="0">
	<tr>
		<td>
			<font color="blue">※核定經費：<input type="text" size="6" name="edu_total_money" id="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align: right;" readonly >元
			(經常門：<input type="text" size="5" name="edu_current_money" id="edu_current_money" value="<?=$edu_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門：<input type="text" size="5" name="edu_capital_money" id="edu_capital_money" value="<?=$edu_capital_money;?>" style="border:0px; text-align: right;" readonly >元)。</font>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<font color="blue"><strong>※執行金額：</strong>
			<input size="6" name="execute_money" type="text" id="execute_money" value="<?=$execute_money;?>" style="border:0px; text-align: right;" readonly >元
			(經常門：<input type="text" size="5" name="execute_current_money" id="execute_current_money" value="<?=$execute_current_money;?>" style="border:0px; text-align: right;" readonly >元
			，資本門：<input type="text" size="5" name="execute_capital_money" id="execute_capital_money" value="<?=$execute_capital_money;?>" style="border:0px; text-align: right;" readonly >元)。</font>(執行進度依據，由下方資料自動加總)
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※特色一：</strong><br />
			項目名稱：<font color="blue"><?=$p1_name;?></font>
			，經費已使用(
			經常門<input type="text" size="5" name="p1_current_money" id="p1_current_money" value="<?=$p1_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門<input type="text" size="5" name="p1_capital_money" id ="p1_capital_money" value="<?=$p1_capital_money;?>" style="border:0px; text-align: right;" readonly >元)。<br />
			參與學生<input type="text" size="5" name="p1_students" id="p1_students" value="<?=$p1_students;?>" style="border:0px; text-align: right;" readonly >人，
			其中目標學生<input type="text" size="5" name="p1_target_students" id="p1_target_students" value="<?=$p1_target_students;?>" style="border:0px; text-align: right;" readonly >人。
			<input type="hidden" name="p1_used_money" id="p1_used_money" value="<?=$p1_used_money;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>※特色二：</strong><br />
			項目名稱：<font color="blue"><?=$p2_name;?></font>
			，經費已使用(
			經常門<input type="text" size="5" name="p2_current_money" id="p2_current_money" value="<?=$p2_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門<input type="text" size="5" name="p2_capital_money" id ="p2_capital_money" value="<?=$p2_capital_money;?>" style="border:0px; text-align: right;" readonly >元)。<br />
			參與學生<input type="text" size="5" name="p2_students" id="p2_students" value="<?=$p2_students;?>" style="border:0px; text-align: right;" readonly >人，
			其中目標學生<input type="text" size="5" name="p2_target_students" id="p2_target_students" value="<?=$p2_target_students;?>" style="border:0px; text-align: right;" readonly >人。
			<input type="hidden" name="p2_used_money" id="p2_used_money" value="<?=$p2_used_money;?>">
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