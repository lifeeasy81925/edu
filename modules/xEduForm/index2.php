<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_city.php";
?>
<style type="text/css">
<!--
.font {
	color: #C00;
	font-weight: bold;
	text-decoration: underline;
}
-->
</style>
<p class="font">
<?
echo $city;
echo "教育部,";
echo $cityman;
echo ",您好,歡迎使用本系統!";
?>
</p>
--教育單位：<h1><a href="/edu/modules/xEduForm/education_index.php">教育部入口<font color=red>←由此進入</font></a></h1>
<br/>
<a href="/edu/modules/xEduForm/edu_download.php">--資料下載區：下載參考資料</a><br>
<?php
include "../../footer.php";
?>
