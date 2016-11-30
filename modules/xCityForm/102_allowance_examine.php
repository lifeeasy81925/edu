<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result)) {
	$city = $row[1];
	$cityman = $row[2];
	$examine = $row[3];
	$cityno = $row[4];
	$exam_1 = $row[5];	//負責初審補助項目一
	$exam_2 = $row[6];	//負責初審補助項目二
	$exam_3 = $row[7];	//負責初審補助項目三
	$exam_4 = $row[8];	//負責初審補助項目四
	$exam_5 = $row[9];	//負責初審補助項目五
	$exam_6 = $row[10];	//負責初審補助項目六
	$exam_7 = $row[11];	//負責初審補助項目七
	//$exam_8 = $row[12];	//負責初審補助項目八 (102年度原補二刪除，補三至八往前遞補，故無此項目)
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回前頁" onClick="location='city_index.php'">
<p>
<font color=blue><strong>※依補助項目審查</strong></font>
<p>
<?
if($exam_1 == '1'){echo "<img src='./images/dot_02.gif' /><a href="."102_a1_examine_table.php"." target="."_self".">"."補助項目一：推展親職教育活動"."</a>".'<p>';}
if($exam_2 == '1'){echo "<img src='./images/dot_02.gif' /><a href="."102_a2_examine_table.php"." target="."_self".">"."補助項目二：補助學校發展教育特色"."</a>".'<p>';}
if($exam_3 == '1'){echo "<img src='./images/dot_02.gif' /><a href="."102_a3_examine_table.php"." target="."_self".">"."補助項目三：修繕離島或偏遠地區師生宿舍"."</a>".'<p>';}
if($exam_4 == '1'){echo "<img src='./images/dot_02.gif' /><a href="."102_a4_examine_table.php"." target="."_self".">"."補助項目四：充實學校基本教學設備"."</a>".'<p>';}
if($exam_5 == '1'){echo "<img src='./images/dot_02.gif' /><a href="."102_a5_examine_table.php"." target="."_self".">"."補助項目五：發展原住民教育文化特色及充實設備器材"."</a>".'<p>';}
if($exam_6 == '1'){echo "<img src='./images/dot_02.gif' /><a href="."102_a6_examine_table.php"." target="."_self".">"."補助項目六：補助交通不便地區學校交通車"."</a>".'<p>';}
if($exam_7 == '1'){echo "<img src='./images/dot_02.gif' /><a href="."102_a7_examine_table.php"." target="."_self".">"."補助項目七：整修學校社區化活動場所"."</a>".'<br>';}
?>	
<?php
include "../../footer.php";
?>