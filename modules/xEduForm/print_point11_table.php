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
指標一-1<br>
<? 
  $result_element= mysql_query('select edu_school.*, 100element_point.point1_1 from edu_school INNER JOIN 100element_point ON edu_school.account=100element_point.account ;');
/*	$sql_element = "select * from 100element_point  where point1_1 = '1'";//國小
	$sql_school = "select account, city, school from edu_school";
	$result_element = $xoopsDB -> query($sql_element);
	$result_school = $xoopsDB -> query($sql_school);
	  while($row = mysql_fetch_row($result_school)) {
            $school_id = $row[0];
			$city = $row[1];
			$school_2 = $row[2];
			}
*/
//	$total_1 = $xoopsDB -> getRowsNum($result_element);
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
		$school_1 = $row[0];
	//	if($row[1] == "$city"){
		if($row[5] == "$point"){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
			echo "指標一-1";	//指標項目
		echo "</td>";
		echo "<td>";
			if($row[5] == '0'){
		 	echo "未符合";//條件符合
			}
			else{
			echo "符合";
			}
		echo "</td>";
  echo "</tr>";
  }
 // }
  }
?>

</table>
合計校數：<? echo $total_1; ?>校<p>
<?      
	echo "<br>"."國中學校名冊";   
?>
<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請指標</td>
    <td>申請結果</td>
<?	
$result_junior= mysql_query('select edu_school.*, 100junior_point.point1_1 from edu_school INNER JOIN 100iunior_point ON edu_school.account=100junior_point.account;');
//	$sql_junior = "SELECT * FROM 100junior_money where school like '%$city%';";
//    $result_junior = mysql_query($sql_junior);
	$total_2 = $xoopsDB -> getRowsNum($result_junior);
 while($row = mysql_fetch_row($result_junior))

        {
		if($row[1] == "$city"){
		if($row[5] == "$point"){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
			echo "指標一-1";	//申請錢
		echo "</td>";
		echo "<td>";
		 	if($row[5] == '0'){
		 	echo "未符合";//條件符合
			}
			else{
			echo "符合";
			}
		echo "</td>";
  echo "</tr>";
  }
  }
  }
?> 
</table>
合計校數：<? echo $total_2; ?>校<p>

<?
include "../../footer.php";
?>