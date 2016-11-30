<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? 
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
		//include "checkdate.php";
	
	//echo "<br />根目錄：".$_SERVER['DOCUMENT_ROOT']."<br />";
	
	$school_year = $_GET['school_year'];
	$sy_seq = $_GET['sy_seq'];
	
	$column_name = $_POST['column_name']; //對應的資料庫欄位名稱
	
	//echo "<br />資料庫欄位名稱：".$column_name."<br />";
	
	//上傳路徑
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
	
	//1040422修改，新增可公開的pub資料夾
	//建立pub資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub')) 
	{	
		//echo "<br />建立目錄:".$_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub'.'<br />';
		//$msg[0] = "建立目錄:".$_SERVER['DOCUMENT_ROOT']."/epa_uploads/".$school_year.'/pub'." \n";	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub', 0777);
	
	}
	//1040422修改，以上為建立pub資料夾
	
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
		//$msg[4] = "原始上傳檔案：" . iconv("utf-8", "utf-8", $_FILES["myfile"]["name"]) . '\n';  //1040511修改隱藏
			
		//$msg[5] = "格式：" . $_FILES["myfile"]["type"] . '\n';                                   //1040511修改隱藏
		
		//$msg[6] = "大小：" . round(($_FILES["myfile"]["size"] ) / 1024) . " KB" . '\n\n';        //1040511修改隱藏
		
		$ext_name = strtolower(strrchr($_FILES["myfile"]["name"], "."));  // 副檔名也轉小寫
		
		if(strrpos($ext_name, "docx") == false && strrpos($ext_name, "doc") == false && strrpos($ext_name, "xls") == false && strrpos($ext_name, "xlsx") == false && strrpos($ext_name, "pdf") == false && strrpos($ext_name, "jpg") == false)
		{
			$msg[3] = "您上傳的檔案不是Word、Excel、JPG或是PDF檔。".'\n\n';
		}
		elseif ($_FILES["myfile"]["error"] > 0)
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
			//檔名加亂數避免重複
			//$s = date("s").rand(0,9); //秒
			$s = date("s").rand(1000,9999); //1040422修改，增加成6位數
			
			$filename = $school_year . "_" . $s . "_" . $username . "_" . $column_name . $ext_name;
			
			$_FILES["myfile"]["name"] = $filename;
			
			if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_path . $_FILES["myfile"]["name"]))
			{
				
				$msg[7] = "【檔案上傳成功！】" . '\n\n';
				
				//$msg[8] = "指標編號：" . $column_name . '\n';                 //1040511修改隱藏
				
				//$msg[9] = "儲存檔名：" . $_FILES["myfile"]["name"] . '\n\n';  //1040511修改隱藏
				
				chmod($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/'.$username.'/pub/'.$filename, 0777); //chmod 在 windows 下沒用
				
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
		$msg[3] = "上傳的文件超過 10 MB。".'\n\n';
	}
		
		
	// 輸出上傳資訊及該目錄現有檔案數
	//$msg[10] = "上傳目錄內容：";            //1040511修改隱藏
	$file_list = scandir($upload_path); //上傳目錄內容
	
	$list_len = count($file_list); //上傳目錄內容個數
	
	// $msg[11] = $list_len - 2 . " 個檔案。" . '\n';   //1040511修改隱藏

	if($is_success == true) //上傳成功寫入資料庫
	{
		//一開始沒資料，先新增
		$cnt_sql = " SELECT sy_seq FROM school_upload_name where sy_seq = '$sy_seq' ";
		$result = mysql_query($cnt_sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0) //沒資料
		{
			$insert_sql = "insert into school_upload_name (sy_seq, account, school_year) ".
						  "                     values ('$sy_seq', '$username', '$school_year') ";
			mysql_query($insert_sql);
		}
		
		//刪除舊檔案
		$sql = " select $column_name from school_upload_name where sy_seq = '$sy_seq' ";
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
		
		$sql = "update school_upload_name set $column_name = '$filename' where sy_seq = '$sy_seq' ";
		mysql_query($sql);

	}

	//把訊息串起來，javascript要用
	$msgbox = "";
	foreach($msg as $key => $value)
	{
		$msgbox = $msgbox . $value;
	}
	
	echo "<script langusge=\"javaScript\">";
	echo "window.alert(\"" . $msgbox . "\");";
	//echo "location.href = document.referrer;"; //document.referrer 上一頁的網址
	echo "window.top.history.back();"; //直接回上一頁網頁不會reload
	echo "</script>";
?>
