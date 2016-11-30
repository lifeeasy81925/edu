<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	// 這一份程式的作用是，將部分含有個資的檔案上傳到FTP的pri資料夾，而不上傳到pub資料夾，避免資料外洩。
	// 這點很重要，聽前工程師說，曾發生過資料外洩，含個資的檔案在google被搜尋到，讓當事人來電抱怨。
	// 為避免資料外洩，故將上傳功能分列file_up與file_up2。
	// file_up.php將檔案上傳到pub資料夾，而file_up2是將檔案上傳到pri資料夾。
	// 另外，在寫程式的時候也要注意，含個資的檔案僅能上傳，不得下載，避免其他資安風險。
	// 以上寫於105.01.13 by 小江
	
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	$school_year = $_GET['school_year'];
	$sy_seq = $_GET['sy_seq'];
	
	$column_name = $_POST['column_name']; //對應的資料庫欄位名稱
	
	//上傳路徑
	$upload_path = $_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pri/'.$username.'/';
	
	//建立epa_uploads 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads'))
	{		
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads', 0777);
	}
	
	//建立school_year 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year)) 
	{	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year, 0777);
	}

	//建立pri資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pri')) 
	{	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pri', 0777);
	}
	
	//建立account 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pri/'.$username)) 
	{	
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pri/'.$username, 0777);
	}
	
	$is_success = false; // 上傳是否成功
	
	// 來源檔案判斷與寫入

	$ext_name = strtolower(strrchr($_FILES["myfile"]["name"], "."));  // 副檔名也轉小寫
		
	if ($_FILES["myfile"]["error"] > 0)
	{
		switch ($_FILES["myfile"]["error"])  // Error messge
		{
			case 1:
				$msg[3] = "上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。（錯誤代碼：1）。";
				break;  
			case 2:
				$msg[3] = "上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項值。（錯誤代碼：2）。";
				break;
			case 3:
				$msg[3] = "文件只有部分被上傳。（錯誤代碼：3）。";
				break;
			case 4:
				$msg[3] = "請先選擇檔案，再點選上傳。（錯誤代碼：4）。";  // 來源檔案有誤。
				break;
			case 5:
				$msg[3] = "上傳文件大小 = 0 Byte。（錯誤代碼：5）。";
				break;
			default:
				$msg[3] = "Invalid file or over size.（錯誤代碼：6）。";
		}
	}
	elseif($_FILES["myfile"]["size"] == null) // 沒有Error Code，但是檔案大小是Null，就是超過檔案大小限制了。
	{
		$msg[3] = "您上傳的文件超過 10 MB。";
	}
	elseif(strrpos($ext_name, "docx") == false && strrpos($ext_name, "doc") == false && strrpos($ext_name, "xls") == false && strrpos($ext_name, "xlsx") == false && strrpos($ext_name, "pdf") == false && strrpos($ext_name, "jpg") == false)
	{
		$msg[3] = "您上傳的檔案不是Word、Excel、JPG或是PDF檔。";
	}
	else  // 沒有例外，即是上傳檔案成功。
	{
		// 檔名加亂數避免重複
		
		$s = date("s").rand(1000,9999);  // 秒
			
		$filename = $school_year . "_" . $s . "_" . $username . "_" . $column_name . $ext_name;
			
		$_FILES["myfile"]["name"] = $filename;
			
		if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_path . $_FILES["myfile"]["name"]))
		{
			$msg[7] = "【檔案上傳成功！】" . '\n\n';

			chmod($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/'.$username.'/pri/'.$filename, 0777);  // chmod 在 windows 下沒用
				
			$is_success = true;
		}
		else
		{
			$msg[7] = "上傳失敗！請確認來源檔案是否有誤。".'\n\n';
		}
	}
		
	// 輸出上傳資訊及該目錄現有檔案數

	$file_list = scandir($upload_path);  // 上傳目錄內容
	
	$list_len = count($file_list);  // 上傳目錄內容個數

	if($is_success == true)  // 上傳成功寫入資料庫
	{
		// 一開始沒資料，先新增
		$cnt_sql = " SELECT sy_seq FROM school_upload_name where sy_seq = '$sy_seq' ";
		$result = mysql_query($cnt_sql);
		$num_rows = mysql_num_rows($result);
		
		if($num_rows == 0)  // 沒資料
		{
			$insert_sql = "insert into school_upload_name (sy_seq, account, school_year) ".
						  "                     values ('$sy_seq', '$username', '$school_year') ";
			mysql_query($insert_sql);
		}
		
		// 刪除舊檔案
		$sql = " select $column_name from school_upload_name where sy_seq = '$sy_seq' ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_row($result))
		{
			$old_file = $row[0];
			$old_path = $upload_path.$old_file;

			if($old_file != "")  // 有檔案才刪除
			{
				unlink($old_path);
			}
		}
		
		$sql = "update school_upload_name set $column_name = '$filename' where sy_seq = '$sy_seq' ";
		mysql_query($sql);
	}

	// 把訊息串起來，javascript要用
	$msgbox = "";
	foreach($msg as $key => $value)
	{
		$msgbox = $msgbox . $value;
	}
	
	echo "<script langusge=\"javaScript\">";
	echo "window.alert(\"" . $msgbox . "\");";  // 從這邊秀文字
	echo "window.top.history.back();";  // 直接回上一頁網頁不會reload
	echo "</script>";
?>