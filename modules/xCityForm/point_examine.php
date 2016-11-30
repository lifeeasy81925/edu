<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_index.php'">
<font color=blue><strong>※依符合指標審查</strong></font>
<p>
<?
//if($exam_1 == '1'){echo "<a href="."print_point11_table.php?id=1"." target="."_self".">"."符合【指標一-1】"."</a>".'<br>';}
	echo "<img src='./images/a1.gif' /><a href="."print_point1_table.php?id=1"." target="."_self".">"."審查學校：符合【指標一】"."</a>".'<p>';
	echo "<img src='./images/a1.gif' /><a href="."print_point2_table.php?id=1"." target="."_self".">"."審查學校：符合【指標二】"."</a>".'<p>';
	echo "<img src='./images/a1.gif' /><a href="."print_point3_table.php?id=1"." target="."_self".">"."審查學校：符合【指標三】"."</a>".'<p>';
	echo "<img src='./images/a1.gif' /><a href="."print_point4_table.php?id=1"." target="."_self".">"."審查學校：符合【指標四】"."</a>".'<p>';
	echo "<img src='./images/a1.gif' /><a href="."print_point5_table.php?id=1"." target="."_self".">"."審查學校：符合【指標五】"."</a>".'<p>';
	echo "<img src='./images/a1.gif' /><a href="."print_point6_table.php?id=1"." target="."_self".">"."審查學校：符合【指標六】"."</a>".'<p>';

include "../../footer.php";
?>