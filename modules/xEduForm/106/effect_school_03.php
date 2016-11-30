<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	include "../../function/config_for_106.php"; //本年度基本設定
	
	//補四table name
	$table_name = "alc_teaching_equipment";
	$table_name_effect = $table_name."_effect";
	
	$main_seq = $_POST['main_seq'];
	
	//教育部核定金額
	$sql = " select a3.edu_total_money, a3.edu_p1_current_money, a3.edu_p1_capital_money ".
		   "      , a3_e.* ".
		   " from $table_name as a3 left join $table_name_effect as a3_e on a3.sy_seq = a3_e.sy_seq ".
		   " where a3.sy_seq = '$main_seq' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0
		$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
		$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				
		$execute_money = ($row['execute_money'] == '')?0:$row['execute_money'];
		$execute_current_money = ($row['execute_current_money'] == '')?0:$row['execute_current_money'];
		$execute_capital_money = ($row['execute_capital_money'] == '')?0:$row['execute_capital_money']; 
						
		$effect_desc = $row['effect_desc'];
		$remark = $row['remark'];
		$update_date = $row['update_date'];
		
	}
	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="" onSubmit="">
<p>
<font color="blue"><strong><?=$school_year;?>年度執行成果填報</strong></font><br />
<strong>項目：三、充實學校基本教學設備  </strong><a href="/edu/modules/xSchoolForm/download/allowance-04.htm" target="_blank">(補助項目說明)</a>
<p>
<table border="0">
	<tr>
		<td>
			<font color="blue">※核定經費：<input type="text" size="6" name="edu_total_money" id="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align: right;" readonly >元。
			(經常門：<input type="text" size="5" name="edu_p1_current_money" id="edu_p1_current_money" value="<?=$edu_p1_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門：<input type="text" size="5" name="edu_p1_capital_money" id="edu_p1_capital_money" value="<?=$edu_p1_capital_money;?>" style="border:0px; text-align: right;" readonly >元)。</font>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<font color="blue"><strong>※執行金額：</strong>
			<input size="6" name="execute_money" type="text" id="execute_money" value="<?=$execute_money;?>" style="border:0px; text-align: right;" readonly >元。</font>(執行進度依據，由下方資料自動加總)<br /><br />
			經常門：<input type="text" size="5" name="execute_current_money" id="execute_current_money" value="<?=$execute_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門：<input type="text" size="5" name="execute_capital_money" id="execute_capital_money" value="<?=$execute_capital_money;?>" style="border:0px; text-align: right;" readonly >元。
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