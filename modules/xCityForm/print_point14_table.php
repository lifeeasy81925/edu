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
	$point = $_GET["id"];
  echo $username;
  echo $city;
  echo $cityman;
//  echo $point;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
指標一-4<br>
<? 
    $result_element= mysql_query('select edu_school.*, 100element_point.* from edu_school INNER JOIN 100element_point ON edu_school.account=100element_point.account;');
//	$result_element= mysql_query('select edu__school.account, edu__school.city, edu__school.school, edu_school.class, 100element_point.account, 100element_point.point1_1 from edu__school INNER JOIN 100element_point ON edu__school.account=100element_point.account;');

	echo "國小學校名冊";
?>

<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請指標</td>
    <td>申請結果</td>
	
<?
//  $result_element = mysql_query($sql_element);
	while($row = mysql_fetch_row($result_element))
        {
	if($row[1] == "$city"){
		if($row[9] == "$point"){
		echo "<tr>";
		echo "<td>";
			echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
		if($row[9] == '0'){
		 	echo "未符合指標一-4";
			}
			else{
			echo "符合指標一-4";//條件符合 
			}
		echo "</td>";
		echo "<td>";
		if($row[20] == '0'){
		 	echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."待審核"."</a>";//指標審核
			}
		else{
			echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."已審畢"."</a>";//指標審核
			}
		echo "</td>";
  echo "</tr>";
  }
  }
  }
?>

</table>
<!--合計校數：<? echo $total_1; ?>校<p> -->
<?      
	echo "<br>"."國中學校名冊";   
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請指標</td>
    <td>申請結果</td>
<?	
$result_junior= mysql_query('select edu_school.*, 100junior_point.* from edu_school INNER JOIN 100iunior_point ON edu_school.account=100junior_point.account;');
//	$sql_junior = "SELECT * FROM 100junior_money where school like '%$city%';";
//    $result_junior = mysql_query($sql_junior);
 while($row = mysql_fetch_row($result_junior))
        {
if($row[1] == "$city"){
		if($row[9] == "$point"){
		echo "<tr>";
		echo "<td>";
			echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."$row[0]"."</a>";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
		if($row[9] == '0'){
		 	echo "未符合指標一-4";
			}
			else{
			echo "符合指標一-4";//條件符合 
			}
		echo "</td>";
		echo "<td>";
		if($row[20] == '0'){
		 	echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."待審核"."</a>";//指標審核
			}
		else{
			echo "<a href="."print_point1.php?id="."$row[0]"." target="."_self".">"."已審畢"."</a>";//指標審核
			}
		echo "</td>";
  echo "</tr>";
  }
  }
  }
?> 
</table>
<!--合計校數：<? echo $total_2; ?>校<p> -->

<?
include "../../footer.php";
?>