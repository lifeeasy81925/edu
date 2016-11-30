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
    $result_element= mysql_query('select edu_school.*, 100element_point.point3 from edu_school INNER JOIN 100element_point ON edu_school.account=100element_point.account;');
//	$result_element= mysql_query('select edu_school.account, edu_school.city, edu_school.school, edu_school.class, 100element_point.account, 100element_point.point1_1 from edu_school INNER JOIN 100element_point ON edu_school.account=100element_point.account;');

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
		if($row[12] == "$point"){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
			echo "指標三";	//指標項目
		echo "</td>";
		echo "<td>";
			if($row[12] == '0'){
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
$result_junior= mysql_query('select edu_school.*, 100junior_point.point3 from edu_school INNER JOIN 100iunior_point ON edu_school.account=100junior_point.account;');
//	$sql_junior = "SELECT * FROM 100junior_money where school like '%$city%';";
//    $result_junior = mysql_query($sql_junior);
 while($row = mysql_fetch_row($result_junior))

        {
		if($row[1] == "$city"){
		if($row[12] == "$point"){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[2]";//學校名稱
		echo "</td>";
		echo "<td>";
			echo "指標三";	//申請錢
		echo "</td>";
		echo "<td>";
		 	if($row[12] == '0'){
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