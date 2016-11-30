<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/config_for_106.php"; //本年度基本設定

	//table name
	$table_name        = "alc_transport_car";
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
	$sql = "    SELECT a5.edu_total_money, a5.item as a5_item, a5_e.* ".
		   "      FROM $table_name        as a5                       ".
		   " LEFT JOIN $table_name_effect as a5_e                     ".
		   "        ON a5.sy_seq = a5_e.sy_seq                        ".
		   "     WHERE a5.sy_seq = '$main_seq'                        ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0

		$item = $row['a5_item'];

		$execute_money = ($row['execute_money'] == '')?0:$row['execute_money'];
		$students      =  $row['students'];
		$cars          =  $row['cars'];
		$used_money    = ($row['used_money'] == '')?0:$row['used_money'];

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

<?=$school_year;?>年度 執行成效與修正後計畫 / <p><b>補助項目五：補助交通不便地區學校交通車 執行情形</b>

<p>
<hr>
<p>

<form name="form" method="post" action="effect_school_05_finish.php" onSubmit="return toCheck();">

	<a href="allowance-05.htm" target="_blank">● 補助項目說明</a><p>

	● 核定經費：<?=$item;?>
	<input type="text" size="4" name="edu_total_money" id="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly > 元。<p>

	<p>
	<hr>
	<p>

	● 執行金額：
	<input size="4" name="execute_money" type="text" id="execute_money" value="<?=$execute_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元。<p>

	<?
		echo "　● " . $item . "：<p>";

		if($item == '租車費')
		{
			echo "　　　已補助人數 ";
			echo "<input type='text' size='1' name='students' id='students' value='$students' style='text-align:center'> 人，租用";
			echo "<input type='text' size='1' name='cars'     id='cars'     value='$cars'     style='text-align:center'> 輛。";
		}
		if($item == '交通費')
		{
			echo "　　　已補助人數 ";
			echo "<input type='text' size='1' name='students' id='students' value='$students' style='text-align:center'> 人。";
		}
		if($item == '購置交通車')
		{
			echo "　　　已購買交通車，座位 ";
			echo "<input type='text' size='1' name='students' id='students' value='$students' style='text-align:center'> 人座。";
		}
	?>
	<p>	　　　已使用經費
	<input type="text" size="4" name="used_money" id="used_money" value="<?=$used_money;?>" onChange="sum()" style="text-align:right"> 元。<p>


	● 成效或執行成果說明（若無免填）：<p>
	<textarea name="effect_desc" cols="70" rows="5" id="effect_desc"><?=$effect_desc;?></textarea><p>

	● 困難或建議事項（若無免填）：<p>
	<textarea name="remark" cols="70" rows="5" id="remark"><?=$remark;?></textarea><p>

	最後填報時間：<?=$update_date;?><p>

	<input type="hidden" name="item"        value="<?=$item;?>">
	<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
	<input type="hidden" name="school_year" value="<?=$school_year;?>">
	<input type="submit" name="button"      value=" 儲存送出 " />

	<!-- 檢查空值 與 數值檢核-->
	<script language="JavaScript">
		function toCheck()
		{
			var flag = 1;
			var errmsg = "";

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
			if (!(regex.test(document.getElementById("used_money").value)))
			{
				errmsg += '已使用經費須為正整數\n';
				document.getElementById("used_money").value = 0;
				flag = 0;
			}
			if(document.getElementById("used_money").value == "")
			{
				errmsg += '已使用經費不可為空白\n';
				document.getElementById("used_money").value = 0;
				flag = 0;
			}

			document.getElementById("execute_money").value = parseInt(document.getElementById("used_money").value);

			if (flag == 0)
			{
				alert(errmsg);
			}
		}
	</script>
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>