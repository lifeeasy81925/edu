<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	include "../../function/config_for_105.php"; //本年度基本設定
	
	//補三table name
	$table_name = "alc_repair_dormitory";
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
	$sql = " select a3.edu_total_money, a3.edu_p1_current_money, a3.edu_p1_capital_money, a3.edu_p2_current_money, a3.edu_p2_capital_money ".
		   "      , a3.edu_p1_current_cnt, a3.edu_p1_capital_cnt, a3.edu_p2_current_cnt, a3.edu_p2_capital_cnt  ".
		   "      , a3_e.* ".
		   " from $table_name as a3 left join $table_name_effect as a3_e on a3.sy_seq = a3_e.sy_seq ".
		   " where a3.sy_seq = '$main_seq' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入0
		$edu_p1_current_cnt = ($row['edu_p1_current_cnt'] == '')?0:$row['edu_p1_current_cnt'];
		$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
		$edu_p1_capital_cnt = ($row['edu_p1_capital_cnt'] == '')?0:$row['edu_p1_capital_cnt'];
		$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
		$edu_p2_current_cnt = ($row['edu_p2_current_cnt'] == '')?0:$row['edu_p2_current_cnt'];
		$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
		$edu_p2_capital_cnt = ($row['edu_p2_capital_cnt'] == '')?0:$row['edu_p2_capital_cnt'];
		$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];
				
		$execute_money = ($row['execute_money'] == '')?0:$row['execute_money'];
		$execute_current_cnt = ($row['execute_current_cnt'] == '')?0:$row['execute_current_cnt'];
		$execute_current_money = ($row['execute_current_money'] == '')?0:$row['execute_current_money'];
		$execute_capital_cnt = ($row['execute_capital_cnt'] == '')?0:$row['execute_capital_cnt'];
		$execute_capital_money = ($row['execute_capital_money'] == '')?0:$row['execute_capital_money']; 
		
		$p1_used_money = ($row['p1_used_money'] == '')?0:$row['p1_used_money'];
		$p1_current_cnt = ($row['p1_current_cnt'] == '')?0:$row['p1_current_cnt'];
		$p1_current_money = ($row['p1_current_money'] == '')?0:$row['p1_current_money'];
		$p1_capital_cnt = ($row['p1_capital_cnt'] == '')?0:$row['p1_capital_cnt'];
		$p1_capital_money = ($row['p1_capital_money'] == '')?0:$row['p1_capital_money'];
		
		$p2_used_money = ($row['p2_used_money'] == '')?0:$row['p2_used_money'];
		$p2_current_cnt = ($row['p2_current_cnt'] == '')?0:$row['p2_current_cnt'];
		$p2_current_money = ($row['p2_current_money'] == '')?0:$row['p2_current_money'];
		$p2_capital_cnt = ($row['p2_capital_cnt'] == '')?0:$row['p2_capital_cnt'];
		$p2_capital_money = ($row['p2_capital_money'] == '')?0:$row['p2_capital_money'];
				
		$effect_desc = $row['effect_desc'];
		$remark = $row['remark'];
		$update_date = $row['update_date'];
		
	}
	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="effect_school_03_finish.php" onSubmit="return toCheck();">
<p>
<font color="blue"><strong><?=$school_year;?>年度執行成果填報</strong></font><p>
<strong>項目三、修繕離島或偏遠地區師生宿舍</strong><a href="allowance-03.htm" target="_blank">（補助項目說明）</a>
<p>
<table border="0">
	<tr>
		<td>
			<font color="blue">● 核定經費：<input type="text" size="6" name="edu_total_money" id="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元。<p>
			教師宿舍：經常門<input type="text" size="2" name="edu_p1_current_cnt" id="edu_p1_current_cnt" value="<?=$edu_p1_current_cnt;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly> 項，<input type="text" size="5" name="edu_p1_current_money" id="edu_p1_current_money" value="<?=$edu_p1_current_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元；資本門<input type="text" size="2" name="edu_p1_capital_cnt" id="edu_p1_capital_cnt" value="<?=$edu_p1_capital_cnt;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 式，<input type="text" size="5" name="edu_p1_capital_money" id="edu_p1_capital_money" value="<?=$edu_p1_capital_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元。<p>
			學生宿舍：經常門<input type="text" size="2" name="edu_p2_current_cnt" id="edu_p2_current_cnt" value="<?=$edu_p2_current_cnt;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 項，<input type="text" size="5" name="edu_p2_current_money" id="edu_p2_current_money" value="<?=$edu_p2_current_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元；資本門<input type="text" size="2" name="edu_p2_capital_cnt" id="edu_p2_capital_cnt" value="<?=$edu_p2_capital_cnt;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 式，<input type="text" size="5" name="edu_p2_capital_money" id="edu_p2_capital_money" value="<?=$edu_p2_capital_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元。</font>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<font color="blue">● <strong>執行金額</strong>：<input size="6" name="execute_money" type="text" id="execute_money" value="<?=$execute_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元。<p>
			經常門<input type="text" size="2" name="execute_current_cnt" id="execute_current_cnt" value="<?=$execute_current_cnt;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 項，<input type="text" size="5" name="execute_current_money" id="execute_current_money" value="<?=$execute_current_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元；資本門<input type="text" size="2" name="execute_capital_cnt" id="execute_capital_cnt" value="<?=$execute_capital_cnt;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 式，<input type="text" size="5" name="execute_capital_money" id="execute_capital_money" value="<?=$execute_capital_money;?>" style="border:0px; text-align: right; background-color:aliceblue;" readonly > 元。</font><p>（執行進度依據，由下方資料自動加總）<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>● 教師宿舍：</strong><p>
			已執行經費：經常門<input type="text" size="3" name="p1_current_cnt" id="p1_current_cnt" value="<?=$p1_current_cnt;?>" onChange="sum(this)" style="text-align:center">項，<input type="text" size="5" name="p1_current_money" id="p1_current_money" value="<?=$p1_current_money;?>" onChange="sum(this)" style="text-align:right">元；資本門<input type="text" size="3" name="p1_capital_cnt" id ="p1_capital_cnt" value="<?=$p1_capital_cnt;?>" onChange="sum(this)" style="text-align:center">式，<input type="text" size="5" name="p1_capital_money" id ="p1_capital_money" value="<?=$p1_capital_money;?>" onChange="sum(this)" style="text-align:right">元。
			<input type="hidden" name="p1_used_money" id="p1_used_money" value="<?=$p1_used_money;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<strong>● 學生宿舍：</strong><p>
			已執行經費：經常門<input type="text" size="3" name="p2_current_cnt" id="p2_current_cnt" value="<?=$p2_current_cnt;?>" onChange="sum(this)" style="text-align:center">項，<input type="text" size="5" name="p2_current_money" id="p2_current_money" value="<?=$p2_current_money;?>" onChange="sum(this)" style="text-align:right">元；資本門<input type="text" size="3" name="p2_capital_cnt" id ="p2_capital_cnt" value="<?=$p2_capital_cnt;?>" onChange="sum(this)" style="text-align:center">式，<input type="text" size="5" name="p2_capital_money" id ="p2_capital_money" value="<?=$p2_capital_money;?>" onChange="sum(this)" style="text-align:right">元。
			<input type="hidden" name="p2_used_money" id="p2_used_money" value="<?=$p2_used_money;?>">
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

<!-- 檢查空值 與 數值檢核-->
<script language="JavaScript">
	function toCheck() 
	{
		var flag = 1;
		var errmsg = "";
		
		//教師
		if ( parseInt(document.getElementById("p1_current_money").value) > parseInt(document.getElementById("edu_p1_current_money").value) ) 
		{
			errmsg += "教師宿舍-經常門的「執行金額」不得大於「核定金額」！\n";
			flag = 0;
		}
		if ( parseInt(document.getElementById("p1_capital_money").value) > parseInt(document.getElementById("edu_p1_capital_money").value) ) 
		{
			errmsg += "教師宿舍-資本門的「執行金額」不得大於「核定金額」！\n";
			flag = 0;
		}
		
		//學生
		if ( parseInt(document.getElementById("p2_current_money").value) > parseInt(document.getElementById("edu_p2_current_money").value) ) 
		{
			errmsg += "學生宿舍-經常門的「執行金額」不得大於「核定金額」！\n";
			flag = 0;
		}
		if ( parseInt(document.getElementById("p2_capital_money").value) > parseInt(document.getElementById("edu_p2_capital_money").value) ) 
		{
			errmsg += "學生宿舍-資本門的「執行金額」不得大於「核定金額」！\n";
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
		var objname = "";
		var i;
		
		//驗證輸入的資料是否為數字
		var regex = /^[0-9]*$/; 
		obj = new Array;
		obj[0] = document.getElementById("p1_current_cnt");
		obj[1] = document.getElementById("p1_current_money");
		obj[2] = document.getElementById("p1_capital_cnt");
		obj[3] = document.getElementById("p1_capital_money");
		obj[4] = document.getElementById("p2_current_cnt");
		obj[5] = document.getElementById("p2_current_money");
		obj[6] = document.getElementById("p2_capital_cnt");
		obj[7] = document.getElementById("p2_capital_money");
		
		for(i = 0;i < 8;i++)
		{
			switch (obj[i].name)
			{
				case "p1_current_cnt":
					objname = "教師宿舍-經常門-項";
					break;
				
				case "p1_current_money":
					objname = "教師宿舍-經常門";
					break;
				
				case "p1_capital_cnt":
					objname = "教師宿舍-資本門-式";
					break;
				
				case "p1_capital_money":
					objname = "教師宿舍-資本門";
					break;
				
				case "p2_current_cnt":
					objname = "學生宿舍-經常門-項";
					break;
				
				case "p2_current_money":
					objname = "學生宿舍-經常門";
					break;
				
				case "p2_capital_cnt":
					objname = "學生宿舍-資本門-式";
					break;
				
				case "p2_capital_money":
					objname = "學生宿舍-資本門";
					break;
					
			}
			if (!(regex.test(obj[i].value)))
			{
				errmsg += '「' + objname + '」須為正整數\n';
				obj[i].value = 0;
				flag = 0;
			}
			if(obj[i].value == "")
			{
				errmsg += '「' + objname + '」已使用經費不可為空白\n';
				obj[i].value = 0;
				flag = 0;
			}
		}
		
		
		document.getElementById("p1_used_money").value = parseInt(document.getElementById("p1_current_money").value) + parseInt(document.getElementById("p1_capital_money").value);
		document.getElementById("p2_used_money").value = parseInt(document.getElementById("p2_current_money").value) + parseInt(document.getElementById("p2_capital_money").value);
			
		document.getElementById("execute_current_cnt").value = parseInt(document.getElementById("p1_current_cnt").value) + parseInt(document.getElementById("p2_current_cnt").value);
		document.getElementById("execute_current_money").value = parseInt(document.getElementById("p1_current_money").value) + parseInt(document.getElementById("p2_current_money").value);
		document.getElementById("execute_capital_cnt").value = parseInt(document.getElementById("p1_capital_cnt").value) + parseInt(document.getElementById("p2_capital_cnt").value);
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