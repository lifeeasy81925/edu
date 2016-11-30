<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
?>

<p>

<a href="print_schoolman.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/telphone.png" align="absmiddle" height="20px"> 查詢各校承辦人通訊錄 / <b>送出查詢</b>

<p>
<hr>
<p>

<?
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_city = $xoopsDB -> query($sql) or die($sql);

	while($row = mysql_fetch_row($result_city))
	{
		$edu     = $row[1]; //縣市名稱
		$eduman  = $row[2]; //身分名稱
		$examine = $row[3]; //1:縣市帳號, 2:教育部帳號
		$eduno   = $row[4]; //縣市編號
	}

	$class = $_POST["class"];//傳回國小或國中的值
	$city = $_POST["city"];//縣市取回之變數
?>

查詢
<font color="blue">
	<?
		echo $city;

		switch($class)
		{
			case "0":
				echo " 所有學校";
				break;

			case "1":
				echo " 國小";
				break;

			case "2":
				echo " 國中";
				break;

			default:
				break;
		}
	?>
</font>
承辦人通訊錄<p>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<?
	if($city == "全國")
	{
		$city = "";
	}

	if($class == '1' )
	{
		$sql = 	"    SELECT uname, name, user_occ      ".
				"         , user_from, email, user_icq ".
				"		  , user_yim , sd.cityname     ".
				"		  , sd.district, sd.schoolname ".
				"      FROM edu_users  AS users        ".
				" LEFT JOIN schooldata AS sd           ".
				"        ON users.uname = sd.account   ".
				"     WHERE users.name LIKE '%$city%'  ".
				"       AND sd.schooltype LIKE '1'     ".
				"  ORDER BY uname                      ";
		$result = mysql_query($sql);
	}
	elseif($class == '2' )
	{
		$sql = 	"    SELECT uname, name, user_occ      ".
				"         , user_from, email, user_icq ".
				"		  , user_yim , sd.cityname     ".
				"		  , sd.district, sd.schoolname ".
				"      FROM edu_users  AS users        ".
				" LEFT JOIN schooldata AS sd           ".
				"        ON users.uname = sd.account   ".
				"     WHERE users.name LIKE '%$city%'  ".
				"       AND sd.schooltype LIKE '2'     ".
				"  ORDER BY uname                      ";
		$result = mysql_query($sql);
	}
	else
	{
		$sql = 	"    SELECT uname, name, user_occ       ".
				"         , user_from, email, user_icq  ".
				"		  , user_yim , sd.cityname      ".
				"		  , sd.district, sd.schoolname  ".
				"      FROM edu_users  AS users         ".
				" LEFT JOIN schooldata AS sd            ".
				"        ON users.uname = sd.account    ".
				"     WHERE   users.name LIKE '%$city%' ".
				"       AND ( sd.schooltype LIKE '1'    ".
				"       OR    sd.schooltype LIKE '2' )  ".
				"  ORDER BY uname                      ";
		$result = mysql_query($sql);
	}

	// schooltype: 1=國小, 2=國中.
?>

<table style="word-break:break-all" border="1">  <? /* style="word-break:break-all" 允許文字中斷換行 */ ?>
	<tr height="40px">
		<td align="center" nowrap="nowrap">序號</td>
		<td align="center" nowrap="nowrap">學校代碼</td>
		<td align="center" nowrap="nowrap">學校名稱</td>
		<td align="center" nowrap="nowrap">職稱</td>
		<td align="center" nowrap="nowrap">承辦人</td>
		<td align="center" nowrap="nowrap">E-Mail</td>
		<td align="center" nowrap="nowrap">電話</td>
		<td align="center" nowrap="nowrap">手機 / 其他</td>
	</tr>
	<?
		while($row = mysql_fetch_row($result))
		{
			$count_e ++;

			echo "<tr height='50px'>";
			echo "<td align='center'>" . $count_e . "</td>";
			echo "<td align='center'>" . $row[0]  . "</td>";
			echo "<td>" . $row[7] . $row[8] . $row[9] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[4] . "</td>";
			echo "<td>" . $row[5] . "</td>";
			echo "<td>" . $row[6] . "</td>";
			echo "</tr>";
		}
	?>
</table>

<? include "../../footer.php"; ?>