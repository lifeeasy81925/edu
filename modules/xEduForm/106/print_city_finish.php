<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "../../function/config_for_106.php"; //本年度基本設定
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="../education_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<b>縣市上傳檔案列表</b>

<p>
<hr>
<p>

<table border="1">
	<tr height="60px" align="center" bgcolor="#EDA6A6">
		<td>序號</td>
		<td>縣市名稱</td>
		<td>補助經費彙整表<br>(表Ⅱ-2)</td>
		<td>指標界定調查表<br>(表Ⅱ-3)</td>
		<td>交通車調查表</td>
		<td>交通車編列<br>相關文件</td>
	<?
		$sql = " SELECT cn.idx, cn.cityname, cun.account, cun.city_1, cun.city_2, cun.city_3, cun.city_4, cun.city_5 ".
			   " FROM cityname AS cn LEFT JOIN  `city_upload_name` AS cun ON cn.cityname_eng = REPLACE( cun.account,  '001',  '' ) and cun.school_year = '$school_year' ".
			   " WHERE cn.school_year = '$school_year' ".
			   " order by cn.idx";

		$result = mysql_query($sql);

		$count_city = 0;

		while($row = mysql_fetch_array($result))
		{
			$cityname = $row['cityname'];
			$account = $row['account'];
			$city_1 = $row['city_1'];
			$city_2 = $row['city_2'];
			$city_3 = $row['city_3'];
			$city_4 = $row['city_4'];
			$city_5 = $row['city_5'];

			$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';

			$count_city ++;
			?>
				<tr height="40px">
					<td align='center'>
						<?=$count_city; //序號?>
					</td>
					<td align='center'>
						<?=$cityname; //縣市名稱?>
					</td>
					<td align='center'>
						<? echo ($city_2 == "")?"<font color='red'>未上傳</font>":"<a href='".$file_path.$city_2."' target='_new'>".$cityname."_表II-2</a>"; //II-2,縣市核定總表 ?>
					</td>
					<td align='center'>
						<? echo ($city_3 == "")?"<font color='red'>未上傳</font>":"<a href='".$file_path.$city_3."' target='_new'>".$cityname."_表II-3</a>"; //II-3,指標彙整表 ?>
					</td>
					<td align='center'>
						<? echo ($city_4 == "")?"無":"<a href='".$file_path.$city_4."' target='_new'>".$cityname."_交通1</a>"; //交通車調查表 ?>
					</td>
					<td align='center'>
						<? echo ($city_5 == "")?"無":"<a href='".$file_path.$city_5."' target='_new'>".$cityname."_交通2</a>"; //交通車編列相關文件 ?>
					</td>
				</tr>
			<?
		}
	?>
</table>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
$mod = $_GET['mod']; //Y=已上傳完成 N=未上傳完成 皆大寫
$title = ($mod == "Y")?"已完成上傳檔案縣市列表":"未完成上傳檔案縣市列表";
$footer = ($mod == "Y")?"已完成上傳檔案縣市數":"未完成上傳檔案縣市數";
<?=$title; //顯示哪種表?>
if($mod == "Y") //顯示完成的縣市，兩個檔案都上傳才顯示
{
$is_show = ($city_2 != "" && $city_3 != "")?"Y":"N";
}
else //顯示未完成的縣市，一個檔案沒上傳就顯示
{
$is_show = ($city_2 == "" || $city_3 == "")?"Y":"N";
}
if($is_show == "Y")
<?=$footer;?>
<p><font color=blue><?=$count_city;?></font><br />
*/
?>