<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
?>
<br>
<br>
<a href="
<?
		if($class == '1'){
			echo 'basedata_element.php';
		}
		else{
			echo 'basedata_junior.php';
		}
?>" target="_self">填寫申請資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="city_examined.php" target="_self">檢視縣市初審結果</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="government_exmained.php" target="_self">檢視教育部審核結果</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
include "../../footer.php";
?>
