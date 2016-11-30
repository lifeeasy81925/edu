<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	include "../../function/config_for_104.php"; //本年度基本設定
	
	// 檢查指標項目  
	// $point = $_POST["point"];  //upload_post.php 的 Ratio button 指標號
	$table = $_POST['table'];

	switch ($table)
	{
		case "city_1":
			$point = "city_1";
			break;
		case "city_2":
			$point = "city_2";
			break;
		case "city_3":
			$point = "city_3";
			break;
		case "city_4":
			$point = "city_4";
			break;
		case "city_5":
			$point = "city_5";
			break;
		default:
			$point = "000";
	}
	
	//上傳路徑，1040505修改上傳路徑
	$upload_path = $_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub/'.$username.'/';
	
	//建立epa_uploads 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads'))
	{	
		//echo "<br />建立目錄:".$_SERVER['DOCUMENT_ROOT'].'/epa_uploads<br />';
		//$msg[0] = "建立目錄:".$_SERVER['DOCUMENT_ROOT']."/epa_uploads \n";	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads', 0777);
	}
	//建立school_year 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year)) 
	{	
		//echo "<br />建立目錄:".$_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'<br />';
		//$msg[0] = "建立目錄:".$_SERVER['DOCUMENT_ROOT']."/epa_uploads/".$school_year." \n";	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year, 0777);
	
	}
	//建立pub資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub')) 
	{	
		//echo "<br />建立目錄:".$_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub<br />';
		//$msg[0] = "建立目錄:".$_SERVER['DOCUMENT_ROOT']."/epa_uploads/".$school_year."/pub \n";	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub', 0777);
	}
	//建立account 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub/'.$username)) 
	{	
		//echo "<br />建立目錄:".$_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub/'.$username.'<br />';
		//$msg[0] = "建立目錄:".$_SERVER['DOCUMENT_ROOT']."/epa_uploads/".$school_year.'/pub/'.$username." \n";	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub/'.$username, 0777);
	}
	
	$is_success = false; //上傳是否成功
	
	// 來源檔案判斷與寫入
	if ($_FILES["myfile"]["size"] < 104857600) //檢查檔案大小
	{
		if ($_FILES["myfile"]["error"] > 0)
		{
			switch ($_FILES["myfile"]["error"])  //error messge
			{
				case 1:
					//echo "<font color=red>上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。</font><br><br>";
					$msg[3] = "上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。".'\n\n';
					break;  
				case 2:
					//echo "<font color=red>上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指定的值。</font><br><br>";
					$msg[3] = "上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指。".'\n\n';
					break;
				case 3:
					//echo "<font color=red>文件只有部分被上傳。</font><br><br>";
					$msg[3] = "文件只有部分被上傳 (Error Code: 3)。".'\n\n';
					break;
				case 4:
					//echo "<font color=red>沒有文件被上傳。</font><br><br>";
					$msg[3] = "上傳失敗！請確認來源檔案是否有誤 (Error Code: 4)。".'\n\n';
					break;
				case 5:
					//echo "<font color=red>上傳文件大小=0 byte。</font><br><br>";
					$msg[3] = "上傳文件大小=0 byte。".'\n\n';
					break;
				default:
					//echo "<font color=red>Invalid file or over size.</font><br><br>";
					$msg[3] = "Invalid file or over size.".'\n\n';
			}
		}
		else
		{
			//$msg[4] = "原始上傳檔案：" . iconv("utf-8", "utf-8", $_FILES["myfile"]["name"]) . '\n';
			
			//$msg[5] = "格式：" . $_FILES["myfile"]["type"] . '\n';
			
			//$msg[6] = "大小：" . round(($_FILES["myfile"]["size"] ) / 1024) . " KB" . '\n\n';
			
			$ext_name = strtolower(strrchr($_FILES["myfile"]["name"], "."));  // 副檔名也轉小寫
			
			//檔名加時間避免重複
			//$s = date("s"); //秒
			//1040505修改，增加成6位數
			$s = date("s").rand(1000,9999);
			
			$filename = $school_year . "_" . $s . "_" . $username . "_" . $point . $ext_name;
			
			$_FILES["myfile"]["name"] = $filename;
			
			if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_path . $_FILES["myfile"]["name"]))
			{
				
				$msg[7] = "【檔案上傳成功！】" . '\n\n';
				
				//$msg[8] = "指標編號：" . $point . '\n';
				
				//$msg[9] = "儲存檔名：" . $_FILES["myfile"]["name"] . '\n\n';
				
				chmod($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/'.$username.'/'.$filename, 0777); //chmod 在 windows 下沒用
				
				$is_success = true;
			}
			else
			{
				$msg[7] = "上傳失敗！請確認來源檔案是否有誤。".'\n\n';
			}
		}
	}
	else
	{
		switch ($_FILES["myfile"]["error"])  //error messge
		{
			case 1:
				//echo "<font color=red>上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。</font><br><br>";
				$msg[3] = "上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。".'\n\n';
				break;  
			case 2:
					//echo "<font color=red>上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指定的值。</font><br><br>";
				$msg[3] = "上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指。".'\n\n';
				break;
			case 3:
				//echo "<font color=red>文件只有部分被上傳。</font><br><br>";
				$msg[3] = "文件只有部分被上傳 (Error Code: 3)。".'\n\n';
				break;
			case 4:
				//echo "<font color=red>沒有文件被上傳。</font><br><br>";
				$msg[3] = "上傳失敗！請確認來源檔案是否有誤 (Error Code: 4)。".'\n\n';
				break;
			case 5:
				//echo "<font color=red>上傳文件大小=0 byte。</font><br><br>";
				$msg[3] = "上傳文件大小=0 byte。".'\n\n';
				break;
			default:
				//echo "<font color=red>Invalid file or over size.</font><br><br>";
				$msg[3] = "Invalid file or over size.".'\n\n';
		}
	}
	
	// 輸出上傳資訊及該目錄現有檔案數
	//$msg[10] = "上傳目錄內容：";
	$file_list = scandir($upload_path); //上傳目錄內容
	
	$list_len = count($file_list); //上傳目錄內容個數
	
	//$msg[11] = $list_len - 2 . " 個檔案。" . '\n';

	if($is_success == true) //上傳成功寫入資料庫
	{
		//一開始沒資料，先新增
		$cnt_sql = " SELECT seq_no FROM city_upload_name where account = '$username' and school_year = '$school_year' ";
		$result = mysql_query($cnt_sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0) //沒資料
		{
			$insert_sql = "insert into city_upload_name (account, school_year, cityname) ".
						  "                     values ('$username', '$school_year', '$cityname') ";
			mysql_query($insert_sql);
		}
		
		//刪除舊檔案
		$sql = " select $point from city_upload_name where account = '$username' and school_year = '$school_year' ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_row($result))
		{
			$old_file = $row[0];
			$old_path = $upload_path.$old_file;
			//echo $old_path;
			if($old_file != "") //有檔案才刪除
			{
				unlink($old_path);
			}
		}
		
		$sql = "update city_upload_name set $point = '$filename' where account = '$username' and school_year = '$school_year' ";
		mysql_query($sql);

	}
	
	//把訊息串起來，javascript要用
	$msgbox = "";
	foreach($msg as $key => $value){
		$msgbox = $msgbox . $value;
	}
	
	echo "<script langusge=\"javaScript\">";
	echo "window.alert(\"" . $msgbox . "\");";
	//echo "location.href = document.referrer;"; //document.referrer 上一頁的網址
	echo "window.top.history.back();"; //直接回上一頁網頁不會reload
	echo "</script>";

?>