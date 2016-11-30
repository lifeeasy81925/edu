<?php
	include "../../../mainfile.php";
	include "../../../header.php";
	
	session_start();
	$id = $xoopsUser->getVar('uname');
	
	$sql = 	"    SELECT edu_users.user_from                        ".
			"         , edu_users.user_occ                         ".
			"         , schooldata.cityname                        ".
			"         , schooldata.district                        ".
			"         , schooldata.schoolname                      ".
			"         , schooldata.schooltype                      ".
			"      FROM edu_users                                  ".
			" LEFT JOIN schooldata                                 ".
			"        ON edu_users.uname       = schooldata.account ".
			"     WHERE edu_users.uname       = '$id'              ";

    $result = mysql_query($sql) or die('MySQL query error');

	while($row = mysql_fetch_row($result))
	{
		$username   = $row[0];
		$position   = $row[1];
		$cityname   = $row[2];
		$district   = $row[3];
		$schoolname = $row[4];
		$schooltype = $row[5];
		
		if($schooltype == "1")
		{
			$schooltype = "國小";
		}
		elseif($schooltype == "2")
		{
			$schooltype = "國中";
		}		
	}
?>

<font size="+2">確認統籌經費</font><p>

<? echo  "[" . $schooltype . "] ". $id . " " . $cityname . $district . $schoolname . "，" . $username . " " . $position . "，您好。" ?><p>

<p>
<hr>
<p>

教育優先區名單：<?=$schoolname;?>、三民國小、民族國小、民權國小、民生國小。<p>
教育行動區學校之 105～106 年獲教育優先區補助之平均數：<p>
　<?=$schoolname;?>：35,000 元<p>
　三民國小：25,000 元<p>
　民族國小：20,000 元<p>
　民權國小：23,000 元<p>
　民生國小：17,000 元<p>
<hr>
試算結果：<p>
（A）教育行動區學校 105～106 年或補助之平均數各校總合：<p>
　　　35,000 + 25,000 + 20,000 + 23,000 + 17,000 = 300,000 元。<p>
（B）每所國中補助 200,000 元。<p>
（C）每所國小補助 100,000 × 4（所） = 400,000 元<p>

統籌經費（A + B + C）：300,000 + 200,000 + 400,000 = <font size="+1" color="blue">700,000</font> 元<p>

<a href="act_upload_data.php"><input type="submit" name="submit" value="　下一步　"></a>

<?php include "../../../footer.php"; ?>
