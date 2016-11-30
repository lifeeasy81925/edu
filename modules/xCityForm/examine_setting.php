<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();

	$username = $xoopsUser->getVar('uname');

	global $xoopsDB;

	$name = $_GET["id"];
	$city_own = $GET["city"];
?>

<a href="examine_setting_name.php">
<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
	 onmouseout="this.src='/edu/images/button/b_back1.png'"
	 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/lock.png" align="absmiddle" /> 審查權限設定 / <b>設定權限</b>

<p>
<hr>
<p>

<?
	$sql_city = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_city = $xoopsDB -> query($sql_city) or die($sql_city);

	while($row = mysql_fetch_row($result_city))
	{
		$cityid  = $row[0];//ID
		$city    = $row[1];//單位
		$cityman = $row[2];//承辦人
		$cityno  = $row[4];
	}
	if($cityno >= '1' )
	{
		echo "您的身分是：";
		echo $username . " ";
		echo $city . " ";
		echo $cityman;
		echo "<p>";
		echo "您要設定的委員為：".$name;
	}
	else
	{
		echo "您沒有設定權限！";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=city_index.php>';
	}

	echo $city_own;

	$sql = "select  *  from  edu_city where cityid like '%$name%';";
	$result = mysql_query($sql);

	while($row = mysql_fetch_row($result))
	{
		$exam_1 = $row[5];  // 補助項目一
		$exam_2 = $row[6];  // 補助項目二
		$exam_3 = $row[7];  // 補助項目三
		$exam_4 = $row[8];  // 補助項目四
		$exam_5 = $row[9];  // 補助項目五
		$exam_6 = $row[10]; // 補助項目六

		/*
		$exam_7 = $row[11];//補助項目七
		$exam_8 = $row[12];//補助項目八
		*/

		/*
		$city_1 = $row[13];//基隆市
		$city_2 = $row[14];//新北市
		$city_3 = $row[15];//臺北市
		$city_4 = $row[16];//桃園縣
		$city_5 = $row[17];//新竹縣
		$city_6 = $row[18];//新竹市
		$city_7 = $row[19];//苗栗縣
		$city_8 = $row[20];//臺中市
		$city_9 = $row[21];//南投縣
		$city_10 = $row[22];//彰化縣
		$city_11 = $row[23];//雲林縣
		$city_12 = $row[24];//嘉義縣
		$city_13 = $row[25];//嘉義市
		$city_14 = $row[26];//臺南市
		$city_15 = $row[27];//高雄市
		$city_16 = $row[28];//屏東縣
		$city_17 = $row[29];//臺東縣
		$city_18 = $row[30];//花蓮縣
		$city_19 = $row[31];//宜蘭縣
		$city_20 = $row[32];//澎湖縣
		$city_21 = $row[33];//金門縣
		$city_22 = $row[34];//連江縣
		*/
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form id="form" name="form" method="post" action="examine_setting_finish.php" onSubmit="return toCheck();">

	<input type="hidden" name="name" value="<? echo $name;?>">

	　<input type="checkbox" name="exam_1" id="exam_1" value="1" <? if ($exam_1 == '1') echo 'checked';?>/> 補助項目一：推展親職教育活動<p>
	　<input type="checkbox" name="exam_2" id="exam_2" value="1" <? if ($exam_2 == '1') echo 'checked';?>/> 補助項目二：補助學校教育特色<p>
	　<input type="checkbox" name="exam_3" id="exam_3" value="1" <? if ($exam_3 == '1') echo 'checked';?>/> 補助項目三：充實學校基本設備<p>
	　<input type="checkbox" name="exam_4" id="exam_4" value="1" <? if ($exam_4 == '1') echo 'checked';?>/> 補助項目四：發展原民文化特色<p>
	　<input type="checkbox" name="exam_5" id="exam_5" value="1" <? if ($exam_5 == '1') echo 'checked';?>/> 補助項目五：補助交通不便學校<p>
	　<input type="checkbox" name="exam_6" id="exam_6" value="1" <? if ($exam_6 == '1') echo 'checked';?>/> 補助項目六：整修學校社區場所<p>

	<input type="submit" name="button" id="button" value="　確 定　" />

</form>

<? include "../../footer.php"; ?>

<?/*
<?
	echo $name;
	echo '委員之權限如下：';
?>

<p>

<? if($exam_1 == '1'){echo '　補助項目一'.'<p>';}?>
<? if($exam_2 == '1'){echo '　補助項目二'.'<p>';}?>
<? if($exam_3 == '1'){echo '　補助項目三'.'<p>';}?>
<? if($exam_4 == '1'){echo '　補助項目四'.'<p>';}?>
<? if($exam_5 == '1'){echo '　補助項目五'.'<p>';}?>
<? if($exam_6 == '1'){echo '　補助項目六'.'<p>';}?>
*/
?>