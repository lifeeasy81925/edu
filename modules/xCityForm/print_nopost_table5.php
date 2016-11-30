<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<?
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
  while($row = mysql_fetch_row($result_city)) {
            $city = $row[1];
			$cityman = $row[2];
			$examine = $row[3];
			$cityno = $row[4];
			}
//	$point = $_GET["id"];
  echo $username;
  echo $city;
  echo $cityman;
//  echo $point;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<br>
<? 
//查指標12.45.6
//$result_element= mysql_query('select edu_school.*, ".$basedata1.".* from edu_school INNER JOIN ".$basedata1." ON edu_school.account=".$basedata1.".account ;');
//$sql_element = "select * from 100element_examine_money ,100element_examine_education  where 100element_examine_money.account=100element_examine_education.account and 100element_examine_money.school like '%$city%'; ";
$result_element= mysql_query('select edu_school.*, 100element_point345.*  from edu_school INNER JOIN 100element_point345 ON edu_school.account=100element_point345.account ;');
	$total_1 = $xoopsDB -> getRowsNum($result_element);
	echo "國小學校名冊";
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>指標五檢視</td>

	
<?
	while($row = mysql_fetch_row($result_element)) {
if($row[1] == "$city"){
		if($row[9] == "0" || $row[10] == "0" || $row[11] == "0" || $row[12] == "0" || $row[13] == "0" || $row[14] == "0" || $row[15] == "0"){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
		 	echo "<a href="."print_point5.php?id="."$row[0]"." target="."_self".">"."檢視"."</a>";//指標五審核
		echo "</td>";
  echo "</tr>";
 }
 }
 }
?>

</table>
<!--合計校數：<? //echo $total_1; ?>校<p> -->
<?      
    $result_junior= mysql_query('select edu_school.*,100junior_point345.* from edu_school INNER JOIN 100junior_point345 ON edu_school.account=100junior_point345.account ;');
	$total_2 = $xoopsDB -> getRowsNum($result_junior);
	echo "<br>"."國中學校名冊";   
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>指標五檢視</td>

<?	
//查指標12.345.6
 while($row = mysql_fetch_row($result_junior))
        {
if($row[1] == "$city"){
		if($row[9] == "0" || $row[10] == "0" || $row[11] == "0" || $row[12] == "0" || $row[13] == "0" || $row[14] == "0" || $row[15] == "0"){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
		 	echo "<a href="."print_point5.php?id="."$row[0]"." target="."_self".">"."檢視"."</a>";//指標五審核
		echo "</td>";
  echo "</tr>";
  }
  }
  }
?> 
</table>
<!--合計校數：<? //echo $total_2; ?>校<p> -->

<?
include "../../footer.php";
?>