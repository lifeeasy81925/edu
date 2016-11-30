<?php session_start(); 
$username = $_SESSION['username'];?>
<p><a href="allowance_examine.php" target="_self">依補助項目審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p>
  <!--<a href="school_list.php" target="_self">依學校審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
  <a href="print_total_school.php" target="_self">檢視學校申請結果</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p>
  <a href="print_city_examine.php" target="_self">檢視縣市審核結果</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p><a href="print_education_examine.php" target="_self">檢視教育部複核結果</a></p>
<p>&nbsp;</p>
