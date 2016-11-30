<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
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
//    $result_element= mysql_query('select edu_school.*, ".$basedata1.".* from edu_school INNER JOIN ".$basedata1." ON edu_school.account=".$basedata1.".account ;');
$result_element= mysql_query('select edu_school.*, 100element_point12.* from edu_school INNER JOIN 100element_point12 ON edu_school.account=100element_point12.account ;');
//	$total_1 = $xoopsDB -> getRowsNum($result_element);
	echo "國小學校名冊";
?>
<?
/*for ($row = 0; $row < mysql_num_rows($result_element); $row++)
{
	echo "<tr>";
	for ($column = 0; $column < mysql_num_fields($result_element); $column++)
		echo "<td style='border: 1px solid #030; padding: 2px 6px;'>"  . mysql_result($result_element, $row, $column) . "</td>";	
	echo "</tr>";
}
echo "</table>";
  mysql_free_result($result_element);*/
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>指標檢視</td>
    <td>指標檢視</td>
	
<?
	while($row = mysql_fetch_row($result_element)) {
if($row[1] == "$city"){
		if($row[6] == "0" || $row[7] == "0" || $row[8] == "0" || $row[9] == "0" || $row[10] == "0" || $row[11] == "0" || $row[12] == "0" || $row[13] == "0" ){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
		if($row[6] == '0' ){
		 	echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."檢視"."</a>";//指標一審核
			}
		echo "</td>";
		echo "<td>";
		if($row[11] == "0" || $row[12] == "0"){
		echo "<a href="."print_point2.php?id="."$row[0]"." target="."_self".">"."檢視"."</a>";//指標二審核
			}
		echo "</td>";
  echo "</tr>";
 }
 }
 }
?>

</table>
<!--合計校數：<? //echo $total_1; ?>校<p> -->
<?      
	if($point == '1' ){
			$basedata2="100junior_point12";
	}
	elseif($point == '2' ){
			$basedata2="100junior_point345";
		}	
	else{
			$basedata2="100junior_point6";
		}
    $result_junior= mysql_query('select edu_school.*, ".$basedata2.".* from edu_school INNER JOIN ".$basedata2." ON edu_school.account=".$basedata2.".account ;');
	$total_2 = $xoopsDB -> getRowsNum($result_junior);
	echo "<br>"."國中學校名冊";   
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>指標檢視</td>
    <td>指標檢視</td>
<?	
//查指標12.345.6
 while($row = mysql_fetch_row($result_junior))
        {
if($row[1] == "$city"){
	if($point=='1'){
		if($row[6] == "0" || $row[7] == "0" || $row[8] == "0" || $row[9] == "0" || $row[10] == "0" || $row[11] == "0" || $row[12] == "0" || $row[13] == "0" ){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
		if($row[6] == '0' ){
		 	echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."檢視"."</a>";//指標一審核
			}
		echo "</td>";
		echo "<td>";
		if($row[7] == "0" || $row[8] == "0" || $row[9] == "0" || $row[10] == "0" || $row[11] == "0" || $row[12] == "0" || $row[13] == "0"){
			echo "<a href="."print_point2.php?id="."$row[0]"." target="."_self".">"."檢視"."</a>";//指標二審核
			}
		echo "</td>";
  echo "</tr>";
  }
  }
  }
  }
?> 
</table>
<!--合計校數：<? echo $total_2; ?>校<p> -->

<?
include "../../footer.php";
?>