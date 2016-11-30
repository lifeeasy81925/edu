<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	$school_year  = $_POST["school_year"];   // 學年度
	$new_end_date = $_POST["new_end_date"];  // 新的截止日
	$account_ary  = $_POST["account"];       // 要更新的學校帳號陣列

	if($school_year != "" && $new_end_date != "" && $account_ary != "")
	{
		for($i = 0; $i < count($account_ary); $i++)
		{
			$account = $account_ary[$i];

			$sql =  " UPDATE time_limit                             ".
					"    set end_date    = '$new_end_date 23:59:59' ".
					"  where account     = '$account'               ".
					"    and school_year = '$school_year';          ";
					mysql_query($sql);
		}
	}
?>

<p>

<table>
	<tr>
		<td>
			<font face='標楷體' size='+2'>延長填報期限</font><p>
			<font face='標楷體' size='+1'>資料更新中，請稍候．．．</font><p>
			<img src='/edu/images/loading02.gif'><p>			
		</td>
	</tr>
</table>

<script>
	document.location.href="print_money_reexamined.php";
</script>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>