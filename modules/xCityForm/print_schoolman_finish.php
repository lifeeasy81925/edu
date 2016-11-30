<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<a href="print_schoolman.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/telphone.png" align="absmiddle" /> 各校業務承辦人聯絡資料 / <b>送出查詢</b>

<p>
<hr>
<p>

<?
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	list($cityid , $city ) = $xoopsDB->fetchRow($result);

	$class = $_POST["class"];  // 傳回國小或國中的值

	echo "<font color=blue>" . $city . "</font> ";

	if($class == '1')
	{
		echo "各國小";
	}
	elseif($class == '2')
	{
		echo "各國中";
	}
	else
	{
		echo "全部學校";
	}

	echo "業務承辦人通訊資料";
?>

<p>

<?
	if($class == '1' )
	{
		$sql = 	"    SELECT uname, name, user_occ, user_from ".
				"         , email, user_icq, user_yim        ".
				"         , sd.district, sd.schoolname       ".
				"      FROM edu_users  AS users              ".
				" LEFT JOIN schooldata AS sd                 ".
				"        ON users.uname = sd.account         ".
				"     WHERE users.name       LIKE '%$city%'  ".
				"       AND sd.schooltype LIKE '1'           ";
		$result = mysql_query($sql);
	}
	elseif($class == '2' )
	{
		$sql = 	"    SELECT uname, name, user_occ, user_from ".
				"         , email, user_icq, user_yim        ".
				"         , sd.district, sd.schoolname       ".
				"      FROM edu_users  AS users              ".
				" LEFT JOIN schooldata AS sd                 ".
				"        ON users.uname = sd.account         ".
				"     WHERE users.name       LIKE '%$city%'  ".
				"       AND sd.schooltype LIKE '2'           ";
		$result = mysql_query($sql);
	}
	else
	{
		$sql = 	"    SELECT uname, name, user_occ, user_from  ".
				"         , email, user_icq, user_yim         ".
				"         , sd.district, sd.schoolname        ".
				"      FROM edu_users  AS users               ".
				" LEFT JOIN schooldata AS sd                  ".
				"        ON users.uname = sd.account          ".
				"     WHERE   users.name       LIKE '%$city%' ".
				"       AND ( sd.schooltype LIKE '1'          ".
				"       OR    sd.schooltype LIKE '2' )        ";
		$result = mysql_query($sql);
	}
?>

<table style="word-break:break-all" border="1">
	<tr height="40px">
		<td align="center" nowrap="nowrap">序號</td>
		<td align="center" nowrap="nowrap">學校代碼</td>
		<td align="center" nowrap="nowrap">學校名稱</td>
		<td align="center" nowrap="nowrap">職稱</td>
		<td align="center" nowrap="nowrap">承辦人</td>
		<td align="center" nowrap="nowrap">E-Mail</td>
		<td align="center" nowrap="nowrap">聯絡電話</td>
		<td align="center" nowrap="nowrap">行動電話</td>
	</tr>
	<?
		while($row = mysql_fetch_row($result))
		{
			/* 
				SQL 查詢結果陣列
				
				0:uname         學校代號
				1:name          學校名稱
				2:user_occ      職稱      
				3:user_from     承辦人
				4:email           
				5:user_icq      電話
				6:user_yim      行動電話
				7:sd.district   鄉鎮市區
				8:sd.schoolname 學校名稱
			*/
			
			$count_e ++;
			echo "<tr height='50px'>";
			echo "<td align='center'>" . $count_e . "</td>";
			echo "<td align='center'>" . $row[0]  . "</td>";
			echo "<td>" . $row[7] . $row[8] . "</td>";
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

<?
/*
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print.php";
*/
?>