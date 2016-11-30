<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	
	$school_year = 103; 
	
	$tablename = $_POST['tablename'];
	$tablename_item = $tablename."_item";
	$seq_no = $_POST['seq_no'];
	
?>
<form name="form" method="post" action="test_double_money.php">
找概算表重複的項目<br />
table name ：<input type="text" size="20" name="tablename" value="<?=$tablename;?>"><br />
seq no：<input type="text" size="20" name="seq_no" value="<?=$seq_no;?>">
<input type="submit" name="button" value="GO" />
<p>
<?
	
	if($tablename != "" && $seq_no != "")
	{
		$sql = "SELECT main_seq FROM  $tablename_item WHERE seq_no = '$seq_no' ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$main_seq = $row['main_seq'];
			echo "seq：".$main_seq."<br />";
		}
		
		//顯示學校資料
		$sql = "SELECT a.cityname, a.account, a.schoolname, b.s_total_money, (
				SELECT SUM( s_money ) 
				FROM $tablename_item AS c
				WHERE c.main_seq = b.sy_seq
				) AS summm, b.city_total_money
				FROM schooldata AS a
				LEFT JOIN $tablename AS b ON a.account = b.account
				WHERE sy_seq = '$main_seq'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$account = $row['account'];
			$cityname = $row['cityname'];
			$schoolname = $row['schoolname'];
			$s_total_money = $row['s_total_money'];
			$city_total_money = $row['city_total_money'];
			$summm = $row['summm'];
			
			echo "$account - $cityname - $schoolname<br />";
			echo "申請：".$s_total_money."<br />";
			echo "初審：".$city_total_money."<br />";
			echo "各自加：".$summm."<br />";
		}
		
		//顯示欄位名稱
		echo "<table border='1'>";
		echo "<tr>";
		$sql = "SELECT * FROM  $tablename_item ";
		$result = mysql_query($sql);
		$cnt = 0;
		while($row = mysql_fetch_field($result))
		{
			echo "<td>$row->name</td>"; 
			$cnt++;
		}
		
		//顯示概算表資料
		$sql = "SELECT * FROM  $tablename_item WHERE main_seq = '$main_seq' order by section, subject, category, item, s_money";
		$result = mysql_query($sql);
		$sum_money = 0;
		while($row = mysql_fetch_array($result))
		{
			$main_seq = $row['main_seq'];
			$sum_money += $row['s_money'];
			echo "<tr>";
			for($i = 0;$i < $cnt;$i++)
			{
				echo "<td>$row[$i]</td>";
			}
			echo "</tr>";
					
		}
		echo "</tr>";
		echo "</table>";
		echo "各自加：".$sum_money."<br />";
	}
	else
	{
		echo "資料沒填";
	}
	
?>
</form>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>