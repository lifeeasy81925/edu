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
  echo $username;
  echo $city;
  echo $cityman;
?>
補助項目二,學生學習輔導<br>
<? /*
	$sql_element_allowance = "SELECT * FROM 100element_allowance where  pointer2='1' and a2_1='0' and a2_2='0' anda2_3='0';";//符合有補助項目1的國小
    $result_element_allowance= mysql_query($sql_element_allowance);
	while($row = mysql_fetch_row($result_element_allowance)){
		$p1 = $row[2];
	}
	$sql_junior_allowance = "SELECT * FROM 100junior_allowance where  pointer2='1' and a2_1='0' and a2_2='0' anda2_3='0';";//符合有補助項目1的國中
    $result_junior_allowance = mysql_query($sql_junior_allowance);
	while($row = mysql_fetch_row($result_junior_allowance)){
		$p2 = $row[2];
	}  
	*/
	echo "國小學校名冊";
?>

<table width="500" border="1">
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請經費</td>
    <td>申請條件</td>
<?
	$sql_element = "SELECT * FROM 100element_money where  pointer2='1' and a2_1='0' and a2_2='0' and a2_3='0';";//國小資料  
	$result_element = mysql_query($sql_element);
	$total_1=$xoopsDB -> getRowsNum($result_element);
 while($row = mysql_fetch_row($result_element))
        {
		
		//$total = $row[3]+$row[4]+$row[5];
		//if ($total == '0'){
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[17]";//學校名稱
		echo "</td>";
		echo "<td>";
		echo "未申請經費";	//預算總合	
		echo "</td>";
		echo "<td>";
		 	echo "符合";//預算審核
		echo "</td>";	
  		echo "</tr>";
	//	}
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
    <td>申請經費</td>
    <td>申請條件</td>
<?
	$sql_junior = "SELECT * FROM 100junior_money where  pointer2='1' and a2_1='0' and a2_2='0' anda 2_3='0';";
    $result_junior = mysql_query($sql_junior);
	$total_2=$xoopsDB -> getRowsNum($result_junior);
 while($row = mysql_fetch_row($result_junior))
        {
		//$total = $row[3]+$row[4]+$row[5];
		//if ($total == '0'){
		
		echo "<tr>";
		echo "<td>";
			echo "$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[17]";//學校名稱
		echo "</td>";
		echo "<td>";
		echo "未申請經費";	//預算總合		
		echo "</td>";
		echo "<td>";
		 	echo "符合";//預算審核
		echo "</td>";	
  		echo "</tr>";
	//	}
		}
?> 
</table>
合計校數：<? echo $total_2; ?>校<p>
<?php
include "../../footer.php";
?>