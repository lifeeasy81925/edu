<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	$mod = $_GET['mod']; //Y=已審核完成 N=未審核完成 皆大寫
	
	$title = ($mod == "Y")?"已審核完成縣市列表":"未審核完成縣市列表";
	$footer = ($mod == "Y")?"已審核完成縣市數":"未審核完成縣市數";
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<br /><br />
<?=$title; //顯示哪種表?>
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center" style="background-color:#FC9">
		<td>序號</td>
		<td>縣市名稱</td>
		<td>II-2,縣市核定總表</td>
		<td>II-3,指標彙整表</td>
		<td>交通車調查表</td>
		<td>交通車編列相關文件</td>
<?
	$sql = " SELECT cn.idx, cn.cityname, cun.account, cun.city_1, cun.city_2, cun.city_3, cun.city_4, cun.city_5 ".
		   " FROM cityname AS cn LEFT JOIN  `city_upload_name` AS cun ON cn.cityname_eng = REPLACE( cun.account,  '001',  '' ) and cun.school_year = '$school_year' ".
		   " WHERE cn.school_year = '$school_year' ".
		   " order by cn.idx";
	//echo "<br />".$sql."<br />";
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
		
		//上傳路徑
		//$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
		
		//1040429修改路徑
		$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
		
		
		if($mod == "Y") //顯示完成的縣市，兩個檔案都上傳才顯示
		{
			$is_show = ($city_2 != "" && $city_3 != "")?"Y":"N";
		}
		else //顯示未完成的縣市，一個檔案沒上傳就顯示
		{
			$is_show = ($city_2 == "" || $city_3 == "")?"Y":"N";
		}
		
		if($is_show == "Y")
		{
			$count_city ++;
			?>
				<tr>
					<td align='center'>
						<?=$count_city; //序號?>
					</td>
					<td>
						<?=$cityname; //縣市名稱?>
					</td>
					<td>
						<? echo ($city_2 == "")?"未上傳":"<a href='".$file_path.$city_2."' target='_new'>".$cityname."_表II-2</a>"; //II-2,縣市核定總表 ?>
					</td>
					<td>
						<? echo ($city_3 == "")?"未上傳":"<a href='".$file_path.$city_3."' target='_new'>".$cityname."_表II-3</a>"; //II-3,指標彙整表 ?>
					</td>
					<td>
						<? echo ($city_4 == "")?"無":"<a href='".$file_path.$city_4."' target='_new'>".$cityname."_文件3</a>"; //交通車調查表 ?>
					</td>
					<td>
						<? echo ($city_5 == "")?"無":"<a href='".$file_path.$city_5."' target='_new'>".$cityname."_文件4</a>"; //交通車編列相關文件 ?>
					</td>
				</tr>
			<?
		}
	}

?>
</table>
<p><?=$footer;?>：<font color=blue><?=$count_city;?></font><br />

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 