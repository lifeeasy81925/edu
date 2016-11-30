<?php
function xoops_module_update_tad_form(&$module, $old_version) {
    GLOBAL $xoopsDB;
    
		if(!chk_chk1()) go_update1();
		if(!chk_chk2()) go_update2();
		if(!chk_chk3()) go_update3();
		if(!chk_chk4()) go_update4();
		if(!chk_chk5()) go_update5();
		if(!chk_chk6()) go_update6();
		if(!chk_chk7()) go_update7();
		if(!chk_chk8()) go_update8();

		$old_fckeditor=XOOPS_ROOT_PATH."/modules/tad_form/fckeditor";
		if(is_dir($old_fckeditor)){
			delete_directory($old_fckeditor);
		}
    return true;
}

function chk_chk1(){
	global $xoopsDB;
	$sql="select count(`kind`) from ".$xoopsDB->prefix("tad_form_main");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update1(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_main")." ADD `kind` varchar(255) NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


function chk_chk2(){
	global $xoopsDB;
	$sql="select count(`result_col`) from ".$xoopsDB->prefix("tad_form_fill");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update2(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_fill")." ADD `result_col` varchar(255) NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


function chk_chk3(){
	global $xoopsDB;
	$sql="select count(`adm_email`) from ".$xoopsDB->prefix("tad_form_main");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update3(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_main")." ADD `adm_email` varchar(255) NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


function chk_chk4(){
	global $xoopsDB;
	$sql="select count(`captcha`) from ".$xoopsDB->prefix("tad_form_main");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update4(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_main")." ADD `captcha` enum('1','0') NOT NULL default '1'";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


function chk_chk5(){
	global $xoopsDB;
	$sql="select count(`show_result`) from ".$xoopsDB->prefix("tad_form_main");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update5(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_main")." ADD `show_result` enum('1','0') NOT NULL default '1'";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


function chk_chk6(){
	global $xoopsDB;
	$sql="select count(`view_result_group`) from ".$xoopsDB->prefix("tad_form_main");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update6(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_main")." ADD `view_result_group` varchar(255) NOT NULL default ''";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


function chk_chk7(){
	global $xoopsDB;
	$sql="select count(`multi_sign`) from ".$xoopsDB->prefix("tad_form_main");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update7(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_main")." ADD `multi_sign` enum('0','1') NOT NULL default '0'";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


function chk_chk8(){
	global $xoopsDB;
	$sql="select count(`public`) from ".$xoopsDB->prefix("tad_form_col");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}


function go_update8(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_form_col")." ADD `public`  enum('0','1') NOT NULL default '0'";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL,3,  mysql_error());
	return true;
}


//�إߥؿ�
function mk_dir($dir=""){
    //�Y�L�ؿ��W�٨q�Xĵ�i�T��
    if(empty($dir))return;
    //�Y�ؿ����s�b���ܫإߥؿ�
    if (!is_dir($dir)) {
        umask(000);
        //�Y�إߥ��Ѩq�Xĵ�i�T��
        mkdir($dir, 0777);
    }
}

//�����ؿ�
function full_copy( $source="", $target=""){
	if ( is_dir( $source ) ){
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ){
			if ( $entry == '.' || $entry == '..' ){
				continue;
			}

			$Entry = $source . '/' . $entry;
			if ( is_dir( $Entry ) )	{
				full_copy( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}
		$d->close();
	}else{
		copy( $source, $target );
	}
}


function rename_win($oldfile,$newfile) {
   if (!rename($oldfile,$newfile)) {
      if (copy ($oldfile,$newfile)) {
         unlink($oldfile);
         return TRUE;
      }
      return FALSE;
   }
   return TRUE;
}

function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}



//���Y��
function thumbnail($filename="",$thumb_name="",$type="image/jpeg",$width="120"){

	ini_set('memory_limit', '50M');
	// Get new sizes
	list($old_width, $old_height) = getimagesize($filename);

	$percent=($old_width>$old_height)?round($width/$old_width,2):round($width/$old_height,2);

	$newwidth = ($old_width>$old_height)?$width:$old_width * $percent;
	$newheight = ($old_width>$old_height)?$old_height * $percent:$width;

	// Load
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	if($type=="image/jpeg" or $type=="image/jpg" or $type=="image/pjpg" or $type=="image/pjpeg"){
		$source = imagecreatefromjpeg($filename);
		$type="image/jpeg";
	}elseif($type=="image/png"){
		$source = imagecreatefrompng($filename);
		$type="image/png";
	}elseif($type=="image/gif"){
		$source = imagecreatefromgif($filename);
		$type="image/gif";
	}

	// Resize
	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $old_width, $old_height);

  header("Content-type: image/png");
	imagepng($thumb,$thumb_name);

	return;
	exit;
}
?>
