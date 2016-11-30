<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
?>

<?  
	//如果沒資料，先新增
	$cnt_sql = " SELECT account FROM 102surplus where account = '$username' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) //沒資料
	{
		$insert_sql = "insert into 102surplus (account) ".
					  "                     values ('$username'); ";
		mysql_query($insert_sql);
	}
		   
	$sql = " SELECT a1.a193 AS a1_current, a1.a194 AS a1_capital, a1.a192 AS a1_total ".
		   "      , a2.a193 AS a2_current, a2.a194 AS a2_capital, a2.a192 AS a2_total ".
		   "      , a3.a193 AS a3_current, a3.a194 AS a3_capital, a3.a192 AS a3_total ".
		   "      , a4.a193 AS a4_current, a4.a194 AS a4_capital, a4.a192 AS a4_total ".
		   "      , a5.a193 AS a5_current, a5.a194 AS a5_capital, a5.a192 AS a5_total ".
		   "      , a6.a193 AS a6_current, a6.a194 AS a6_capital, a6.a192 AS a6_total ".
		   "      , a7.a193 AS a7_current, a7.a194 AS a7_capital, a7.a192 AS a7_total ".
		   "      , s.a1_current AS s_a1_current, s.a1_capital AS s_a1_capital, s.a1_total AS s_a1_total ".
		   "      , s.a2_current AS s_a2_current, s.a2_capital AS s_a2_capital, s.a2_total AS s_a2_total ".
		   "      , s.a3_current AS s_a3_current, s.a3_capital AS s_a3_capital, s.a3_total AS s_a3_total ".
		   "      , s.a4_current AS s_a4_current, s.a4_capital AS s_a4_capital, s.a4_total AS s_a4_total ".
		   "      , s.a5_current AS s_a5_current, s.a5_capital AS s_a5_capital, s.a5_total AS s_a5_total ".
		   "      , s.a6_current AS s_a6_current, s.a6_capital AS s_a6_capital, s.a6_total AS s_a6_total ".
		   "      , s.a7_current AS s_a7_current, s.a7_capital AS s_a7_capital, s.a7_total AS s_a7_total ".
		   " FROM 102allowance1 AS a1, 102allowance2 AS a2, 102allowance3 AS a3, 102allowance4 AS a4, 102allowance5 AS a5, 102allowance6 AS a6, 102allowance7 AS a7 ".
		   "	  , 102surplus AS s ".
		   " WHERE a1.account LIKE '$username' ".
		   "   AND a1.account = a2.account ".
		   "   AND a1.account = a3.account ".
		   "   AND a1.account = a4.account ".
		   "   AND a1.account = a5.account ".
		   "   AND a1.account = a6.account ".
		   "   AND a1.account = a7.account ".
		   "   AND a1.account = s.account ";
	
	//echo $sql;
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		//複審資料
		//總金額
		$total[1] = ($row['a1_total'] == '')?0:$row['a1_total']; //NULL則填入0
		$total[2] = ($row['a2_total'] == '')?0:$row['a2_total'];
		$total[3] = ($row['a3_total'] == '')?0:$row['a3_total'];
		$total[4] = ($row['a4_total'] == '')?0:$row['a4_total'];
		$total[5] = ($row['a5_total'] == '')?0:$row['a5_total'];
		$total[6] = ($row['a6_total'] == '')?0:$row['a6_total'];
		$total[7] = ($row['a7_total'] == '')?0:$row['a7_total'];
	
		//經常門金額
		$current[1] = ($row['a1_current'] == '')?0:$row['a1_current']; //NULL則填入0
		$current[2] = ($row['a2_current'] == '')?0:$row['a2_current'];
		$current[3] = ($row['a3_current'] == '')?0:$row['a3_current'];
		$current[4] = ($row['a4_current'] == '')?0:$row['a4_current'];
		$current[5] = ($row['a5_current'] == '')?0:$row['a5_current'];
		$current[6] = ($row['a3_current'] == '')?0:$row['a6_current'];
		$current[7] = ($row['a7_current'] == '')?0:$row['a7_current'];
		
		//資本門金額
		$capital[1] = ($row['a1_capital'] == '')?0:$row['a1_capital'];
		$capital[2] = ($row['a2_capital'] == '')?0:$row['a2_capital'];
		$capital[3] = ($row['a3_capital'] == '')?0:$row['a3_capital'];
		$capital[4] = ($row['a4_capital'] == '')?0:$row['a4_capital'];
		$capital[5] = ($row['a5_capital'] == '')?0:$row['a5_capital'];
		$capital[6] = ($row['a6_capital'] == '')?0:$row['a6_capital'];
		$capital[7] = ($row['a7_capital'] == '')?0:$row['a7_capital'];
		
		//結餘資料
		//總金額
		$s_total[1] = ($row['s_a1_total'] == '')?0:$row['s_a1_total']; //NULL則填入0
		$s_total[2] = ($row['s_a2_total'] == '')?0:$row['s_a2_total'];
		$s_total[3] = ($row['s_a3_total'] == '')?0:$row['s_a3_total'];
		$s_total[4] = ($row['s_a4_total'] == '')?0:$row['s_a4_total'];
		$s_total[5] = ($row['s_a5_total'] == '')?0:$row['s_a5_total'];
		$s_total[6] = ($row['s_a6_total'] == '')?0:$row['s_a6_total'];
		$s_total[7] = ($row['s_a7_total'] == '')?0:$row['s_a7_total'];
	
		//經常門金額
		$s_current[1] = ($row['s_a1_current'] == '')?0:$row['s_a1_current']; //NULL則填入0
		$s_current[2] = ($row['s_a2_current'] == '')?0:$row['s_a2_current'];
		$s_current[3] = ($row['s_a3_current'] == '')?0:$row['s_a3_current'];
		$s_current[4] = ($row['s_a4_current'] == '')?0:$row['s_a4_current'];
		$s_current[5] = ($row['s_a5_current'] == '')?0:$row['s_a5_current'];
		$s_current[6] = ($row['s_a3_current'] == '')?0:$row['s_a6_current'];
		$s_current[7] = ($row['s_a7_current'] == '')?0:$row['s_a7_current'];
		
		//資本門金額
		$s_capital[1] = ($row['s_a1_capital'] == '')?0:$row['s_a1_capital'];
		$s_capital[2] = ($row['s_a2_capital'] == '')?0:$row['s_a2_capital'];
		$s_capital[3] = ($row['s_a3_capital'] == '')?0:$row['s_a3_capital'];
		$s_capital[4] = ($row['s_a4_capital'] == '')?0:$row['s_a4_capital'];
		$s_capital[5] = ($row['s_a5_capital'] == '')?0:$row['s_a5_capital'];
		$s_capital[6] = ($row['s_a6_capital'] == '')?0:$row['s_a6_capital'];
		$s_capital[7] = ($row['s_a7_capital'] == '')?0:$row['s_a7_capital'];
		
		
	}
	
	$total_surplus = 0;
	
	$ary_allowance = array("", "1.推展親職教育活動", "2.學校發展教育特色", "3.修繕離島或偏遠地區師生宿舍"
							 , "4.充實學校基本教學設備", "5.發展原住民教育文化特色及充實設備器材"
							 , "6.補助交通不便地區學校交通車", "7.整修學校社區化活動場所");
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="返回學校功能選單" onClick="location='school_index.php'"><br />
<form name="form" method="post" action="102_school_surplus_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>教育部推動教育優先區計畫102年度 結餘款調查表</strong></font>
<p>
<font color="red"><strong>※請預估至明年(民國103)1月31日執行完畢後，會剩餘多少金額。</strong></font>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td height="50" align="center" bgcolor="#99CCCC">補助項目</td>
		<td height="40" align="center" bgcolor="#99CCCC">科目</td>
		<td height="40" align="center" bgcolor="#99CCCC">核定金額</td>
		<td height="40" align="center" bgcolor="#99CCCC">結餘金額</td>
		<td height="40" align="center" bgcolor="#99CCCC">結餘金額合計<br /><font color="blue">(自動計算)</font></td>
	</tr>
	<?
		for($i = 1;$i <= 7;$i++)
		{
			if($total[$i] > 0)
			{
				?>
					<tr>
						<td rowspan="2" nowrap="nowrap"><?=$ary_allowance[$i];?></td>
						<td align="center">經常門</td>
						<td align="center"><?=(($current[$i] == 0)?"-":$current[$i]);?></td>
						<td align="center">
							<? 	
								if($current[$i] != 0) 
								{ 
									echo "<input type='text' size='6' name='a".$i."_surplus_1' value='$s_current[$i]' onchange='js:Count(this,$i);'>";
								} 
								else
								{
									echo "-";
								}
								
							?>
						</td>
						<td align="center" rowspan="2"><input type="text" size="6" name="a<?=$i?>_surplus" value="<?=$s_total[$i]?>" style="background-color:transparent; border:0px; text-align: right;" readonly ></td>
					</tr>
					<tr>
						<td align="center">資本門</td>
						<td align="center"><?=(($capital[$i] == 0)?"-":$capital[$i]);?></td>
						<td align="center">
							<? 	
								if($capital[$i] != 0) 
								{ 
									echo "<input type='text' size='6' name='a".$i."_surplus_2' value='$s_capital[$i]' onchange='js:Count(this,$i);'>";
								} 
								else
								{
									echo "-";
								}
								
							?>
						</td>
					</tr>
				<?
				
				$total_surplus += $s_total[$i];
			}
		}
	?>
	<tr>
		<td width="170" height="50" align="center" >合計</td>
		<td height="40" align="center"> </td>
		<td height="40" align="center"> </td>
		<td height="40" align="center"> </td>
		<td height="40" align="center"><input type="text" size="6" name="total_surplus" value="<?=$total_surplus;?>" style="background-color:transparent; border:0px; text-align: right;" readonly ></td>
	</tr>
</table>
<p>
<INPUT TYPE="button" VALUE="上一頁(不儲存)" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並回上一頁" />

<script language="JavaScript">

	function Count(obj, idx) 
	{
		//alert(obj.name);
		//取得控制項
		var a = left(obj.name, 2);
		var surplus = document.getElementsByName(a + '_surplus')[0]; //結餘合計
		var surplus_1 = document.getElementsByName(a + '_surplus_1')[0]; //經常
		var surplus_2 = document.getElementsByName(a + '_surplus_2')[0]; //資本
			
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		
		if (!(regex.test(obj.value)))
		{
			alert('「結餘金額」請輸入整數。');
			obj.value = '';
		}
				
		//計算總金額
		count_all();
		
	}
	
	//計算總金額
	function count_all()
	{
		var total_surplus = document.getElementsByName('total_surplus')[0]; //總金額
		var i;
		
		total_surplus.value = 0;
		
		for(i = 1;i <= 7;i++)
		{
			var surplus = document.getElementsByName('a' + i + '_surplus')[0]; //結餘合計
			var surplus_1 = document.getElementsByName('a' + i + '_surplus_1')[0]; //經常
			var surplus_2 = document.getElementsByName('a' + i + '_surplus_2')[0]; //資本
			
			if(surplus != null)
			{
				surplus.value = 0;
				
				if(surplus_1 != null)
				{
					if(surplus_1.value != '')
						surplus.value = parseInt(surplus.value) + parseInt(surplus_1.value);
				}
				
				if(surplus_2 != null)
				{
					if(surplus_2.value != '')
						surplus.value = parseInt(surplus.value) + parseInt(surplus_2.value);
				}
				
				total_surplus.value = parseInt(total_surplus.value) + parseInt(surplus.value);
			}
		}
		
	}
	
	//取得左N位
	function left(mainStr,n) 
	{ 
		return mainStr.substring(0,n);
	} 
</script>
</form>
<?php
include "../../footer.php";
?>