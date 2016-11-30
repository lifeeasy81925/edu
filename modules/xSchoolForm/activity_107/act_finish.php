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

<font size="+2">完成填報</font><p>

<? echo  "[" . $schooltype . "] ". $id . " " . $cityname . $district . $schoolname . "，" . $username . " " . $position . "，您好。" ?><p>

<p>
<hr>
<p>

貴校已完成教育行動區填報申請。<p>

<a href="act_school_index.php"><input type="submit" name="submit" value="　完 成　"></a>

<?php include "../../../footer.php"; ?>
