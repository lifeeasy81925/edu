<?php
include_once XOOPS_ROOT_PATH."/modules/tadtools/language/{$xoopsConfig['language']}/modinfo_common.php";

define("_MI_TADGAL_NAME","Digital photo album");
define("_MI_TADGAL_AUTHOR","Tad");
define("_MI_TADGAL_CREDITS","tad");
define("_MI_TADGAL_DESC","This module is an easy to use digital photo album");
define("_MI_TADGAL_ADMENU1", "Photo management");
define("_MI_TADGAL_ADMENU2", "Category management");
define("_MI_TADGAL_ADMENU5", "Generate media RSS");

define("_MI_TADGAL_BNAME1","Photo scrollbar");
define("_MI_TADGAL_BDESC1","A block that scrolls photos up or down");
define("_MI_TADGAL_BNAME2","Switch photo");
define("_MI_TADGAL_BDESC2","Switchable photos");
define("_MI_TADGAL_BNAME3","Photo slideshow");
define("_MI_TADGAL_BDESC3","One by one slide show");
define("_MI_TADGAL_BNAME4","3D wall");
define("_MI_TADGAL_BDESC4","3D wall");
define("_MI_TADGAL_BNAME5","Image marquee");
define("_MI_TADGAL_BDESC5","Display image in the marquee");
define("_MI_TADGAL_BNAME6","Latest responses");
define("_MI_TADGAL_BDESC6","Show comments on the selected photo");
define("_MI_TADGAL_BNAME7","Flash photo show");
define("_MI_TADGAL_BDESC7","Playback by using Flash(include auto start function)");
define("_MI_TADGAL_BNAME8","Thumbnails list");
define("_MI_TADGAL_BDESC8","Traditional thumbnails list displaying block");

define("_MI_TADGAL_THUMBNAIL_S_WIDTH","<b>Length in the long side of the small thumbnails</b>");
define("_MI_TADGAL_THUMBNAIL_S_WIDTH_DESC","Set length of the longest width or height of the small thumbnails");
define("_MI_TADGAL_THUMBNAIL_M_WIDTH","<b>Length in the long side of the medium thumbnails</b>");
define("_MI_TADGAL_THUMBNAIL_M_WIDTH_DESC","Set length of the longest width or height of the medium thumbnails");
define("_MI_TADGAL_THUMBNAIL_B_WIDTH","<b>Force the image to shrink to the specified width?</b>");
define("_MI_TADGAL_THUMBNAIL_B_WIDTH_DESC","For example:\"1024\"indicates that images with long side longer than 1024 will be forced to shrink the lengh to 1024. This can reduce the waste of space by large photos.<br />The setting \"0\" indicates to keep the original photo size.");
define("_MI_TADGAL_THUMBNAIL_NUMBER","<b>Number of images to show in a thumbnails page</b>");
define("_MI_TADGAL_THUMBNAIL_NUMBER_DESC","Number of photos to show in the home page and management page");



define("_MI_TADGAL_SHOW_COPY_PIC","<b>Show quick-copy button</b>");
define("_MI_TADGAL_SHOW_COPY_PIC_DESC","Easy to get the full directories of the small thumbnails,medium thumbnails and origin photos");

define("_MI_TADGAL_ONLY_THUMB","<b>Only Thumbs</b>");
define("_MI_TADGAL_ONLY_THUMB_DESC"," ");

define("_MI_TADGAL_USE_PIC_TOOLBAR","<b>Image toolbar?</b>");
define("_MI_TADGAL_USE_PIC_TOOLBAR_DESC","Use images in toolbar.");

define("_MI_TADGAL_UPLOAD_MODE","<b>Upload mode</b>");
define("_MI_TADGAL_UPLOAD_MODE_DESC","Use Upload mode in uploads.php.");
define("_MI_INPUT_FORM","Upload single photo");
define("_MI_TADGAL_MUTI_INPUT_FORM","Upload photos");
define("_MI_TADGAL_JAVA_UPLOAD", "Large upload");
define("_MI_MD_TADGAL_ZIP_IMPORT_FORM","Upload Zip");
define("_MI_TADGAL_XP_IMPORT_FORM","XP upload wizard");

define("_MI_TADGAL_INDEX_MODE","Thumbnails Display Mode");
define("_MI_TADGAL_INDEX_MODE_DESC","Thumbnails Display Mode");
define("_MI_TADGAL_NORMAL","Normal Mode");
define("_MI_TADGAL_FLICKR","Flickr Mode");
define("_MI_TADGAL_WATERFALL","Water Fall Mode");
?>