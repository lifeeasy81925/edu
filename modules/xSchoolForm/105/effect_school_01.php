<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	include "../../function/config_for_105.php"; //本年度基本設定

	//補一table name
	$table_name = "alc_parenting_education";
	$table_name_effect = $table_name."_effect";

	$main_seq = $_POST['main_seq'];

	//如果沒資料，先新增
	if($main_seq != "" && $main_seq != 0)
	{
		$cnt_sql = " SELECT sy_seq FROM $table_name_effect where sy_seq = '$main_seq' ";
		$result = mysql_query($cnt_sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0) //沒資料
		{
			$insert_sql = "insert into $table_name_effect (sy_seq, account, school_year) ".
						  "                     values ('$main_seq', '$username', '$school_year'); ";
			mysql_query($insert_sql);
		}
	}

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
<!---<form name="form" method="post" action="effect_101_school_01_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">--->
<form name="form" method="post" action="effect_school_01_finish.php" onSubmit="return toCheck();">
<p>
<font color="blue"><strong><?=$school_year;?>年度執行成果填報</strong></font>
<p>
<strong>項目一、推展親職教育活動  </strong><a href="allowance-01.htm" target="_blank">（補助項目說明）</a>
<table border="0">
	<tr>
		<td>
			<font color="blue">● 核定經費：<input type="text" size="6" name="edu_total_money" id="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly>
            元（親職教育：<input type="text" size="4" name="edu_p1_money" id="edu_p1_money" value="<?=$edu_p1_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly>
            元，家庭輔導：<input type="text" size="4" name="edu_p2_money" id="edu_p2_money" value="<?=$edu_p2_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly>
            元）。</font>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<font color="blue">● <strong>執行金額</strong>：<input size="6" name="execute_money" type="text" id="execute_money" style="border:0px; text-align: right; background-color:aliceblue;" readonly value="<?=$execute_money;?>">
            元。</font>（執行金額與進度，依據下方資料自動加總）。
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>● 親職教育活動：</strong><p>
			已辦理場次<input name="p1_times" type="text" id="p1_times" size="4" value="<?=$p1_times;?>" style="text-align:center">場，已使用經費<input name="p1_used_money" type="text" id="p1_used_money" size="4" value="<?=$p1_used_money;?>" onChange="sum()" style="text-align:right">元。<p>
			參與家長人數<input name="p1_parents" type="text" id="p1_parents" size="4" value="<?=$p1_parents;?>" style="text-align:center">人，其中目標學生家長<input name="p1_target_parents" type="text" id="p1_target_parents" size="4" value="<?=$p1_target_parents;?>" style="text-align:center">人。
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>● 目標學生個案家庭輔導：</strong><p>
			已輔導學生數<input name="p2_people" type="text" id="p2_people" size="4" value="<?=$p2_people;?>" style="text-align:center;<?if ($edu_p2_money==0) echo "border:0px; background-color:aliceblue;"?>" <?if ($edu_p2_money==0) echo "readonly";?>>次，已使用經費<input name="p2_used_money" type="text" id="p2_used_money" size="4" value="<?=$p2_used_money;?>" onChange="sum()" style="text-align:right;<?if ($edu_p2_money==0) echo "border:0px; background-color:aliceblue;"?>" <?if ($edu_p2_money==0) echo "readonly";?>>元。;
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>● 成效或執行成果說明</strong>（目前為執行期間，若無免填）：<p>
			<textarea name="effect_desc" cols="70" rows="5" id="effect_desc"><?=$effect_desc;?></textarea>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>● 困難或建議事項</strong>（若無免填）：請於其他文件編輯完成後，再複製貼上。<p>
			<textarea name="remark" cols="70" rows="5" id="remark"><?=$remark;?></textarea>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			最後填報時間：<?=$update_date;?><p>
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
<input type="submit" name="button" value="儲存送出 (Enter)" />

<!-- 檢查空值 與 數值檢核 -->
<script language="JavaScript">
	function toCheck()
	{
		var flag = 1;
		var errmsg = "";

		if ( parseInt(document.getElementById("p1_used_money").value) > parseInt(document.getElementById("edu_p1_money").value) )
		{
			errmsg += "「親職教育活動」的「執行金額」不得大於「核定金額」！\n";
			flag = 0;
		}

		if ( parseInt(document.getElementById("p2_used_money").value) > parseInt(document.getElementById("edu_p2_money").value) )
		{
			errmsg += "「家庭輔導訪視」的「執行金額」不得大於「核定金額」！\n";
			flag = 0;
		}

		if ( parseInt(document.getElementById("execute_money").value) > parseInt(document.getElementById("edu_total_money").value) )
		{
			errmsg += "「執行金額」不得大於「核定金額」！\n";
			flag = 0;
		}

		if (flag == 0)
		{
			alert(errmsg);
			return false;
		}
		else
		{
			return true;
		}

	}

	function sum()
	{
		var flag = 1;
		var errmsg = "";

		//驗證輸入的資料是否為數字
		var regex = /^[0-9]*$/;
		if (!(regex.test(document.getElementById("p1_used_money").value)))
		{
			errmsg += '「親職教育活動」已使用經費須為正整數\n';
			document.getElementById("p1_used_money").value = 0;
			flag = 0;
		}
		if (!(regex.test(document.getElementById("p2_used_money").value)))
		{
			errmsg += '「目標學生個案家庭輔導」已使用經費須為正整數\n';
			document.getElementById("p2_used_money").value = 0;
			flag = 0;
		}
		if(document.getElementById("p1_used_money").value == "")
		{
			errmsg += '「親職教育活動」已使用經費不可為空白\n';
			document.getElementById("p1_used_money").value = 0;
			flag = 0;
		}
		if(document.getElementById("p2_used_money").value == "")
		{
			errmsg += '「目標學生個案家庭輔導」已使用經費不可為空白\n';
			document.getElementById("p2_used_money").value = 0;
			flag = 0;
		}

		document.getElementById("execute_money").value = parseInt(document.getElementById("p1_used_money").value) + parseInt(document.getElementById("p2_used_money").value);

		if (flag == 0)
		{
			alert(errmsg);
		}
	}

</script>
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>