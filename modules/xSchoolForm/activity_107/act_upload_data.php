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

<font size="+2">上傳計畫檔案</font><p>

<? echo  "[" . $schooltype . "] ". $id . " " . $cityname . $district . $schoolname . "，" . $username . " " . $position . "，您好。" ?><p>

<p>
<hr>
<p>

總計畫　　　：<input id="file" name="file" type="file"> <input id="submit" name="submit" type="submit" value="上傳檔案"><p>
子計畫（一）：<input id="file" name="file" type="file"> <input id="submit" name="submit" type="submit" value="上傳檔案"><p>
子計畫（二）：<input id="file" name="file" type="file"> <input id="submit" name="submit" type="submit" value="上傳檔案"><p>
子計畫（三）：<input id="file" name="file" type="file"> <input id="submit" name="submit" type="submit" value="上傳檔案"><p>
子計畫（四）：<input id="file" name="file" type="file"> <input id="submit" name="submit" type="submit" value="上傳檔案"><p>
子計畫（五）：<input id="file" name="file" type="file"> <input id="submit" name="submit" type="submit" value="上傳檔案"><p>

<a href="act_finish.php"><input type="submit" name="submit" value="　下一步　"></a>

<?php include "../../../footer.php"; ?>
