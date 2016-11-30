<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/config_for_106.php"; //本年度基本設定

	//table name
	$table_name = "alc_aboriginal_education";
	$table_name_effect = $table_name."_effect";

	$main_seq = $_POST['main_seq'];

	//如果沒資料，先新增
	if($main_seq != "" && $main_seq != 0)
	{
		$cnt_sql = " SELECT sy_seq FROM $table_name_effect WHERE sy_seq = '$main_seq' ";

		$result = mysql_query($cnt_sql);

		$num_rows = mysql_num_rows($result);

		if($num_rows == 0) //沒資料
		{
			$insert_sql = " INSERT INTO $table_name_effect (sy_seq, account, school_year) ".
						  "      VALUES ('$main_seq', '$username', '$school_year')        ";
			mysql_query($insert_sql);
		}
	}

	//教育部核定金額
	$sql =  "    SELECT a4.edu_total_money         ".
			"         , a4.edu_p1_current_money    ".
			"         , a4.edu_p1_capital_money    ".
			"         , a4.edu_p2_current_money    ".
			"         , a4.edu_p2_capital_money    ".
			"         , a4.p1_name                 ".
			"         , a4.p2_name                 ".
			"         , a4_e.*                     ".
			"      FROM $table_name        AS a4   ".
			" LEFT JOIN $table_name_effect AS a4_e ".
			"        ON a4.sy_seq = a4_e.sy_seq    ".
			"     WHERE a4.sy_seq = '$main_seq'    ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$edu_total_money      = ($row['edu_total_money']      == '')?0:$row['edu_total_money']; //NULL則填入0
		$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
		$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
		$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
		$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];

		$p1_name = $row['p1_name'];
		$p2_name = $row['p2_name'];

		$edu_current_money = $edu_p1_current_money + $edu_p2_current_money;
		$edu_capital_money = $edu_p1_capital_money + $edu_p2_capital_money;

		$edu_p1_total_money = $edu_p1_current_money + $edu_p1_capital_money;
		$edu_p2_total_money = $edu_p2_current_money + $edu_p2_capital_money;

		$execute_money         = ($row['execute_money']         == '')?0:$row['execute_money'];
		$execute_current_money = ($row['execute_current_money'] == '')?0:$row['execute_current_money'];
		$execute_capital_money = ($row['execute_capital_money'] == '')?0:$row['execute_capital_money'];

		$p1_students        = $row['p1_students'];
		$p1_target_students = $row['p1_target_students'];
		$p1_used_money      = ($row['p1_used_money']    == '')?0:$row['p1_used_money'];
		$p1_current_money   = ($row['p1_current_money'] == '')?0:$row['p1_current_money'];
		$p1_capital_money   = ($row['p1_capital_money'] == '')?0:$row['p1_capital_money'];

		$p2_students        = $row['p2_students'];
		$p2_target_students = $row['p2_target_students'];
		$p2_used_money      = ($row['p2_used_money']    == '')?0:$row['p2_used_money'];
		$p2_current_money   = ($row['p2_current_money'] == '')?0:$row['p2_current_money'];
		$p2_capital_money   = ($row['p2_capital_money'] == '')?0:$row['p2_capital_money'];

		$effect_desc = $row['effect_desc'];
		$remark      = $row['remark'];
		$update_date = $row['update_date'];
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="effect_school_list.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<?=$school_year;?>年度 執行成效與修正後計畫 / <p><b>補助項目四：發展原住民教育文化特色及充實設備器材 執行情形</b>

<p>
<hr>
<p>

<form name="form" method="post" action="effect_school_04_finish.php" onSubmit="return toCheck();">

	<a href="allowance-04.htm" target="_blank">● 補助項目說明</a><p>

	● 核定經費：
	<input type="text" size="4" name="edu_total_money"   id="edu_total_money"   value="<?=$edu_total_money;?>"   style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門：
	<input type="text" size="4" name="edu_current_money" id="edu_current_money" value="<?=$edu_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門：
	<input type="text" size="4" name="edu_capital_money" id="edu_capital_money" value="<?=$edu_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

	　(1) 特色一：
	<input type="text" size="4" name="edu_p1_total_money"   id="edu_p1_total_money"   value="<?=$edu_p1_total_money;?>"   style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門：
	<input type="text" size="4" name="edu_p1_current_money" id="edu_p1_current_money" value="<?=$edu_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門：
	<input type="text" size="4" name="edu_p1_capital_money" id="edu_p1_capital_money" value="<?=$edu_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

	　(2) 特色二：
	<input type="text" size="4" name="edu_p2_total_money"   id="edu_p2_total_money"   value="<?=$edu_p2_total_money;?>"   style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門：
	<input type="text" size="4" name="edu_p2_current_money" id="edu_p2_current_money" value="<?=$edu_p2_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門：
	<input type="text" size="4" name="edu_p2_capital_money" id="edu_p2_capital_money" value="<?=$edu_p2_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

	<p>
	<hr>
	<p>

	● 執行金額：
	<input type="text" size="4" name="execute_money"         id="execute_money"         value="<?=$execute_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門：
	<input type="text" size="4" name="execute_current_money" id="execute_current_money" value="<?=$execute_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門：
	<input type="text" size="4" name="execute_capital_money" id="execute_capital_money" value="<?=$execute_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

	　(1) 特色一：<?=$p1_name;?><p>
	　　　已使用經費：經常門
	<input type="text" size="4" name="p1_current_money" id="p1_current_money" value="<?=$p1_current_money;?>" onChange="sum()" style="text-align:right"> 元，資本門
	<input type="text" size="4" name="p1_capital_money" id="p1_capital_money" value="<?=$p1_capital_money;?>" onChange="sum()" style="text-align:right"> 元。<p>
	　　　參與學生
	<input type="text" size="1" name="p1_students"        id="p1_students"        value="<?=$p1_students;?>"        style="text-align:center"> 人，其中目標學生
	<input type="text" size="1" name="p1_target_students" id="p1_target_students" value="<?=$p1_target_students;?>" style="text-align:center"> 人。<p>
	<input type="hidden"        name="p1_used_money"      id="p1_used_money"      value="<?=$p1_used_money;?>">

	　(2) 特色二：<?=$p2_name;?><p>
	　　　已使用經費：經常門
	<input type="text" size="4" name="p2_current_money" id="p2_current_money" value="<?=$p2_current_money;?>" onChange="sum()" style="text-align:right"> 元，資本門
	<input type="text" size="4" name="p2_capital_money" id="p2_capital_money" value="<?=$p2_capital_money;?>" onChange="sum()" style="text-align:right"> 元。<p>
	　　　參與學生
	<input type="text" size="1" name="p2_students"        id="p2_students"        value="<?=$p2_students;?>"        style="text-align:center"> 人，其中目標學生
	<input type="text" size="1" name="p2_target_students" id="p2_target_students" value="<?=$p2_target_students;?>" style="text-align:center"> 人。<p>
	<input type="hidden"        name="p2_used_money"      id="p2_used_money"      value="<?=$p2_used_money;?>">

	<p>
	<hr>
	<p>

	● 成效或執行成果說明（若無免填）：<p>
	<textarea name="effect_desc" cols="70" rows="5" id="effect_desc"><?=$effect_desc;?></textarea><p>

	● 困難或建議事項（若無免填）：<p>
	<textarea name="remark" cols="70" rows="5" id="remark"><?=$remark;?></textarea><p>

	最後填報時間：<?=$update_date;?><p>

	<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
	<input type="hidden" name="school_year" value="<?=$school_year;?>">
	<input type="submit" name="button" value=" 儲存送出 " />

	<!-- 檢查空值 與 數值檢核-->
	<script language="JavaScript">
		function toCheck()
		{
			var flag = 1;
			var errmsg = "";

			if ( parseInt(document.getElementById("execute_current_money").value) > parseInt(document.getElementById("edu_current_money").value) )
			{
				errmsg += "經常門的「執行金額」不得大於「核定金額」！\n";
				flag = 0;
			}
			if ( parseInt(document.getElementById("execute_capital_money").value) > parseInt(document.getElementById("edu_capital_money").value) )
			{
				errmsg += "資本門的「執行金額」不得大於「核定金額」！\n";
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
			if (!(regex.test(document.getElementById("p1_current_money").value)))
			{
				errmsg += '「特色一-經常門」已使用經費須為正整數\n';
				document.getElementById("p1_current_money").value = 0;
				flag = 0;
			}
			if (!(regex.test(document.getElementById("p1_capital_money").value)))
			{
				errmsg += '「特色一-資本門」已使用經費須為正整數\n';
				document.getElementById("p1_capital_money").value = 0;
				flag = 0;
			}
			if (!(regex.test(document.getElementById("p2_current_money").value)))
			{
				errmsg += '「特色二-經常門」已使用經費須為正整數\n';
				document.getElementById("p2_current_money").value = 0;
				flag = 0;
			}
			if (!(regex.test(document.getElementById("p2_capital_money").value)))
			{
				errmsg += '「特色二-資本門」已使用經費須為正整數\n';
				document.getElementById("p2_capital_money").value = 0;
				flag = 0;
			}
			if(document.getElementById("p1_current_money").value == "")
			{
				errmsg += '「特色一-經常門」已使用經費不可為空白\n';
				document.getElementById("p1_current_money").value = 0;
				flag = 0;
			}
			if(document.getElementById("p1_capital_money").value == "")
			{
				errmsg += '「特色一-資本門」已使用經費不可為空白\n';
				document.getElementById("p1_capital_money").value = 0;
				flag = 0;
			}
			if(document.getElementById("p2_current_money").value == "")
			{
				errmsg += '「特色二-經常門」已使用經費不可為空白\n';
				document.getElementById("p2_current_money").value = 0;
				flag = 0;
			}
			if(document.getElementById("p2_capital_money").value == "")
			{
				errmsg += '「特色二-資本門」已使用經費不可為空白\n';
				document.getElementById("p2_capital_money").value = 0;
				flag = 0;
			}

			document.getElementById("p1_used_money").value = parseInt(document.getElementById("p1_current_money").value) + parseInt(document.getElementById("p1_capital_money").value);
			document.getElementById("p2_used_money").value = parseInt(document.getElementById("p2_current_money").value) + parseInt(document.getElementById("p2_capital_money").value);
			document.getElementById("execute_current_money").value = parseInt(document.getElementById("p1_current_money").value) + parseInt(document.getElementById("p2_current_money").value);
			document.getElementById("execute_capital_money").value = parseInt(document.getElementById("p1_capital_money").value) + parseInt(document.getElementById("p2_capital_money").value);
			document.getElementById("execute_money").value = parseInt(document.getElementById("p1_used_money").value) + parseInt(document.getElementById("p2_used_money").value);

			if (flag == 0)
			{
				alert(errmsg);
			}
		}
	</script>
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>