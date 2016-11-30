<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/config_for_105.php"; //本年度基本設定
	
	$sql = " SELECT *                           ".		   
		   "   FROM city_update_effect          ".
		   "  WHERE cityname   = '$cityname'    ".
		   "    AND schoolyear = '$school_year' ";

	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$edu_money     = $row['edu_money'];
		$execute_money = $row['execute_money'];
		$update_user   = $row['update_user'];
		$update_time   = $row['update_time'];
	}
	
	if($edu_money  == null && $execute_money == null)  // 沒資料即新增
	{
		$insert_sql =	" INSERT INTO city_update_effect ".
						"            ( cityname          ".
						"            , schoolyear        ".
						"            , edu_money         ".
						"            , execute_money     ".
						"            , update_user       ".	
						"            , update_time     ) ".	
						"     VALUES ( '$cityname'       ".
						"            , '$school_year'    ".
						"            , '0'               ".
						"            , '0'               ".
						"            , '$username'       ".
						"            , NOW()           ) ";

		$result = mysql_query($insert_sql);
	}	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>
<a href="/edu/modules/xCityForm/effect_report_city.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

縣市與學校執行成效 / <b>縣市填報執行成效</b>

<p>
<hr>
<p>

<form name="form" method="post" action="effect_for_city_finish.php">

	<?=$school_year;?>年度 <?=$cityname;?>填報執行成效<p>

	教育部核定金額：<input type="text" size="5" name="edu_money" value="<?=$edu_money;?>" style="text-align:right" onkeyup="value=value.replace(/[^\d]/g,'')"> 元<p>

	縣市執行金額：<input type="text" size="5" name="execute_money" value="<?=$execute_money;?>" style="text-align:right" onkeyup="value=value.replace(/[^\d]/g,'')"> 元<p>

	縣市執行成效百分比：<? echo round(($execute_money / $edu_money * 100), 2); ?>%<p>

	<input type="submit" name="button" value="　儲 存　" />

</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
<td align="center" bgcolor="#99CCCC">縣市合計</td>
未填寫：<?=$not_filled;?><p>
<td align="right" bgcolor="#99CCCC"><?=number_format($selected_edu_total_money); ?></td>
<td align="right" bgcolor="#99CCCC"><?=number_format($selected_execute_money); ?></td>
<td align="right" bgcolor="#99CCCC"><?=number_format($selected_edu_total_money - $selected_execute_money); ?></td>
<td align="center" bgcolor="#99CCCC"><?=number_format($selected_execute_money / $selected_edu_total_money * 100,2);?>%</td>
<?=number_format($a1_edu_total_money - $a1_execute_money);?>
<td align="right"><?=number_format($a2_edu_total_money - $a2_execute_money); ?></td>
*/
?>