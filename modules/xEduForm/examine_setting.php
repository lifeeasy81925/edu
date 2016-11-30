<?php
	include "../../mainfile.php";
	include "../../header.php";
	include "../function/connect_edu.php";

	$set_id = $_GET['id']; //被設定的帳號

	if($username != 'edu0001' && $username != 'edu0099')
	{
		echo "您沒有設定權限";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=education_index.php>';
	}

	$sql = "select  *  from  edu_city where cityid like '$set_id';";
	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$exam_1 = $row[5];   // 補助項目一
		$exam_2 = $row[6];   // 補助項目二
		$exam_3 = $row[7];   // 補助項目三
		$exam_4 = $row[8];   // 補助項目四
		$exam_5 = $row[9];   // 補助項目五
		$exam_6 = $row[10];  // 補助項目六

		// $exam_7 = $row[11];  // 補助項目七
		// $exam_8 = $row[12];  // 補助項目八

		$city_1  = $row[13];  // 基隆市
		$city_2  = $row[14];  // 臺北市
		$city_3  = $row[15];  // 新北市
		$city_4  = $row[16];  // 桃園市
		$city_5  = $row[17];  // 新竹市
		$city_6  = $row[18];  // 新竹縣
		$city_7  = $row[19];  // 苗栗縣
		$city_8  = $row[20];  // 臺中市
		$city_9  = $row[21];  // 彰化縣
		$city_10 = $row[22];  // 南投縣
		$city_11 = $row[23];  // 雲林縣
		$city_12 = $row[24];  // 嘉義市
		$city_13 = $row[25];  // 嘉義縣
		$city_14 = $row[26];  // 臺南市
		$city_15 = $row[27];  // 高雄市
		$city_16 = $row[28];  // 屏東縣
		$city_17 = $row[29];  // 宜蘭縣
		$city_18 = $row[30];  // 花蓮縣
		$city_19 = $row[31];  // 臺東縣
		$city_20 = $row[32];  // 澎湖縣
		$city_21 = $row[33];  // 金門縣
		$city_22 = $row[34];  // 連江縣
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="examine_setting_name.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/lock.png" align="absmiddle" height="20px"> 審查權限設定 / <b>設定權限</b>

<p>
<hr>
<p>

<form id="form" name="form" method="post" action="examine_setting_finish.php" onSubmit="return toCheck();">

	您要設定的委員為：<font color="blue"><?=$set_id;?></font><p>

	<input type="hidden" name="name" value="<? echo $set_id;?>">

	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>1. 審查補助權限</b></font><p>
				<label><input type="checkbox" name="exam_1" id="exam_1" value="1" <? if ($exam_1 == '1') echo 'checked';?>/>補助項目一　</label>
				<label><input type="checkbox" name="exam_2" id="exam_2" value="1" <? if ($exam_2 == '1') echo 'checked';?>/>補助項目二　</label>
				<label><input type="checkbox" name="exam_3" id="exam_3" value="1" <? if ($exam_3 == '1') echo 'checked';?>/>補助項目三　</label><p>
				<label><input type="checkbox" name="exam_4" id="exam_4" value="1" <? if ($exam_4 == '1') echo 'checked';?>/>補助項目四　</label>
				<label><input type="checkbox" name="exam_5" id="exam_5" value="1" <? if ($exam_5 == '1') echo 'checked';?>/>補助項目五　</label>
				<label><input type="checkbox" name="exam_6" id="exam_6" value="1" <? if ($exam_6 == '1') echo 'checked';?>/>補助項目六　</label>
			</td>
		</tr>
	</table>
	<p>
	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>2. 審查縣市權限</b></font><p>
				<input type="button" name="button1" value="全　選" onClick="all_select();">　
				<input type="button" name="button2" value="全不選" onClick="all_clear();"><p>
				<label><input type="checkbox" name="city_1"  id="city_1"  value="1" <? if ($city_1  == '1') echo 'checked';?>/>基隆市　</label>
				<label><input type="checkbox" name="city_2"  id="city_2"  value="1" <? if ($city_2  == '1') echo 'checked';?>/>臺北市　</label>
				<label><input type="checkbox" name="city_3"  id="city_3"  value="1" <? if ($city_3  == '1') echo 'checked';?>/>新北市　</label>
				<label><input type="checkbox" name="city_4"  id="city_4"  value="1" <? if ($city_4  == '1') echo 'checked';?>/>桃園市　</label>
				<label><input type="checkbox" name="city_5"  id="city_5"  value="1" <? if ($city_5  == '1') echo 'checked';?>/>新竹市　</label>
				<label><input type="checkbox" name="city_6"  id="city_6"  value="1" <? if ($city_6  == '1') echo 'checked';?>/>新竹縣　</label><p>
				<label><input type="checkbox" name="city_7"  id="city_7"  value="1" <? if ($city_7  == '1') echo 'checked';?>/>苗栗縣　</label>
				<label><input type="checkbox" name="city_8"  id="city_8"  value="1" <? if ($city_8  == '1') echo 'checked';?>/>臺中市　</label>
				<label><input type="checkbox" name="city_9"  id="city_9"  value="1" <? if ($city_9  == '1') echo 'checked';?>/>彰化縣　</label>
				<label><input type="checkbox" name="city_10" id="city_10" value="1" <? if ($city_10 == '1') echo 'checked';?>/>南投縣　</label>
				<label><input type="checkbox" name="city_11" id="city_11" value="1" <? if ($city_11 == '1') echo 'checked';?>/>雲林縣　</label>
				<label><input type="checkbox" name="city_12" id="city_12" value="1" <? if ($city_12 == '1') echo 'checked';?>/>嘉義市　</label><p>
				<label><input type="checkbox" name="city_13" id="city_13" value="1" <? if ($city_13 == '1') echo 'checked';?>/>嘉義縣　</label>
				<label><input type="checkbox" name="city_14" id="city_14" value="1" <? if ($city_14 == '1') echo 'checked';?>/>臺南市　</label>
				<label><input type="checkbox" name="city_15" id="city_15" value="1" <? if ($city_15 == '1') echo 'checked';?>/>高雄市　</label>
				<label><input type="checkbox" name="city_16" id="city_16" value="1" <? if ($city_16 == '1') echo 'checked';?>/>屏東縣　</label>
				<label><input type="checkbox" name="city_17" id="city_17" value="1" <? if ($city_17 == '1') echo 'checked';?>/>宜蘭縣　</label>
				<label><input type="checkbox" name="city_18" id="city_18" value="1" <? if ($city_18 == '1') echo 'checked';?>/>花蓮縣　</label><p>
				<label><input type="checkbox" name="city_19" id="city_19" value="1" <? if ($city_19 == '1') echo 'checked';?>/>臺東縣　</label>
				<label><input type="checkbox" name="city_20" id="city_20" value="1" <? if ($city_20 == '1') echo 'checked';?>/>澎湖縣　</label>
				<label><input type="checkbox" name="city_21" id="city_21" value="1" <? if ($city_21 == '1') echo 'checked';?>/>金門縣　</label>
				<label><input type="checkbox" name="city_22" id="city_22" value="1" <? if ($city_22 == '1') echo 'checked';?>/>連江縣　</label><p>

			</td>
		</tr>
	</table>
	<p>
	<table border="1px">
		<tr>
			<td align="center">
				<p>
				<font size="+1"><b>3. 確認送出</b></font><p>
				<input type="submit" name="button" id="button" value="　確認送出　" />
			</td>
		</tr>
	</table>
	<input type="hidden" name="city_list_old" value="<?=$city_list_old;?>">
	<input type="hidden" name="allowance_list_old" value="<?=$allowance_list_old;?>">
</form>

<? include "../../footer.php"; ?>

<script language="JavaScript">
	function all_select()  // 全選
	{
		<?
			for($i = 1; $i <= 22; $i++)
			{
		?>
				var c = document.form.city_<?=$i;?>;
				c.checked = true;
		<?
			}
		?>
	}
	function all_clear()  // 全不選
	{
		<?
			for($i = 1; $i <= 22; $i++)
			{
		?>
				var c = document.form.city_<?=$i;?>;
				c.checked = false;
		<?
			}
		?>
	}
</script>

<?
/*
<p>顯示已設定權限</p>
<?
	echo $name;
	echo '委員之權限得審查：'.'<br />';
	$city_list_old = "";
	$allowance_list_old = "";
?>
<? if($exam_1 == 1){echo ' 補助項目一'.';'; $allowance_list_old .= '補助項目一,';}?>
<? if($exam_2 == 1){echo ' 補助項目二'.';'; $allowance_list_old .= '補助項目二,';}?>
<? if($exam_3 == 1){echo ' 補助項目三'.';'; $allowance_list_old .= '補助項目三,';}?>
<? if($exam_4 == 1){echo ' 補助項目四'.';'; $allowance_list_old .= '補助項目四,';}?>
<? if($exam_5 == 1){echo ' 補助項目五'.';'; $allowance_list_old .= '補助項目五,';}?>
<? if($exam_6 == 1){echo ' 補助項目六'.';'; $allowance_list_old .= '補助項目六,';}?>
<br />
<? if($city_1  ==1){echo ' 基隆市'.';'; $city_list_old .= "基隆市,";}?>
<? if($city_2  ==1){echo ' 臺北市'.';'; $city_list_old .= "臺北市,";}?>
<? if($city_3  ==1){echo ' 新北市'.';'; $city_list_old .= "新北市,";}?>
<? if($city_4  ==1){echo ' 桃園市'.';'; $city_list_old .= "桃園市,";}?>
<? if($city_5  ==1){echo ' 新竹市'.';'; $city_list_old .= "新竹市,";}?>
<? if($city_6  ==1){echo ' 新竹縣'.';'; $city_list_old .= "新竹縣,";}?>
<? if($city_7  ==1){echo ' 苗栗縣'.';'; $city_list_old .= "苗栗縣,";}?>
<? if($city_8  ==1){echo ' 臺中市'.';'; $city_list_old .= "臺中市,";}?>
<? if($city_9  ==1){echo ' 彰化縣'.';'; $city_list_old .= "彰化縣,";}?>
<? if($city_10 ==1){echo ' 南投縣'.';'; $city_list_old .= "南投縣,";}?>
<? if($city_11 ==1){echo ' 雲林縣'.';'; $city_list_old .= "雲林縣,";}?>
<? if($city_12 ==1){echo ' 嘉義市'.';'; $city_list_old .= "嘉義市,";}?>
<? if($city_13 ==1){echo ' 嘉義縣'.';'; $city_list_old .= "嘉義縣,";}?>
<? if($city_14 ==1){echo ' 臺南市'.';'; $city_list_old .= "臺南市,";}?>
<? if($city_15 ==1){echo ' 高雄市'.';'; $city_list_old .= "高雄市,";}?>
<? if($city_16 ==1){echo ' 屏東縣'.';'; $city_list_old .= "屏東縣,";}?>
<? if($city_17 ==1){echo ' 宜蘭縣'.';'; $city_list_old .= "宜蘭縣,";}?>
<? if($city_18 ==1){echo ' 花蓮縣'.';'; $city_list_old .= "花蓮縣,";}?>
<? if($city_19 ==1){echo ' 臺東縣'.';'; $city_list_old .= "臺東縣,";}?>
<? if($city_20 ==1){echo ' 澎湖縣'.';'; $city_list_old .= "澎湖縣,";}?>
<? if($city_21 ==1){echo ' 金門縣'.';'; $city_list_old .= "金門縣,";}?>
<? if($city_22 ==1){echo ' 連江縣'.';'; $city_list_old .= "連江縣,";}?>
*/
?>