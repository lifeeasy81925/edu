<?php

function xoops_module_update_tadgallery(&$module, $old_version) {
    GLOBAL $xoopsDB;

		if(!chk_chk9()) go_update9();
		go_update10();
	  //mk_dir(XOOPS_ROOT_PATH."/uploads/tadgallery/small/fb");
		
    return true;
}


//�s�W�Ƨ����
function chk_chk9(){
	global $xoopsDB;
	$sql="select count(`photo_sort`) from ".$xoopsDB->prefix("tad_gallery");
	$result=$xoopsDB->query($sql);
	if(empty($result)) return false;
	return true;
}

function go_update9(){
	global $xoopsDB;
	$sql="ALTER TABLE ".$xoopsDB->prefix("tad_gallery")." ADD `photo_sort` smallint(5) unsigned NOT NULL";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL."/modules/system/admin.php?fct=modulesadmin",30,  mysql_error());
}

//�s�W�Ƨ����
function go_update10(){
	global $xoopsDB;
	$sql="update ".$xoopsDB->prefix("tad_gallery_cate")." set show_mode='normal' where show_mode='thubm' or show_mode='slideshow' or show_mode='3d'";
	$xoopsDB->queryF($sql) or redirect_header(XOOPS_URL."/modules/system/admin.php?fct=modulesadmin",30,  mysql_error());
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
?>
