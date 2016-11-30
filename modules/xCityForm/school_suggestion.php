<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
?>
<table width="650" border="1">
    <td width="118">學校代碼</td>
    <td width="234">學校名稱</td>
    <td width="189">學校意見</td>
<?

$sql = "SELECT * FROM 100suggestion";//國小資料

$result = mysql_query($sql);
 while($row = mysql_fetch_row($result))
        {
		
		echo "<tr>";
		echo "<td>";
			echo "0"."$row[0]";//學校代碼
		echo "</td>";
    	echo "<td>";
      		echo "$row[1]";//學校名稱
		echo "</td>";
		echo "<td>";		
		if($row[2]==""){
		echo "無";
		}else
			echo "$row[2]";
		echo "</td>";	
 		 echo "</tr>";
  
  }
?> 
</table>
<?php
include "../../footer.php";
?>
