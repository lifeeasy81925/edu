<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期: 2007-11-04
// $Id: modinfo.php,v 1.4 2008/06/25 06:40:09 tad Exp $
// ------------------------------------------------------------------------- //

define("_MI_TADNEW_NAME","Tadnews");
define("_MI_TADNEW_DESC","An easy News module");
define("_MI_TADNEW_ADMENU1", "Admin");
define("_MI_TADNEW_ADMENU2", "Post");
define("_MI_TADNEW_ADMENU3", "Categories");
define("_MI_TADNEW_ADMENU4", "Data Transfer");
define("_MI_TADNEW_ADMENU5", "Newspaper");
define("_MI_TADNEW_ADMENU6", "Upgrade");
define("_MI_TADNEW_ADMENU7", "Customized Page");
define("_MI_TADNEW_ADMENU8", "Tags");
define("_MD_TADNEW_NEWSPAPER","Newspaper List");
define("_MD_TADNEW_ARCHIVE","Archive");

define("_MI_TADNEW_TEMPLATE_DESC1", "Template of Index");
define("_MI_TADNEW_TEMPLATE_DESC2", "Template of news content");
define("_MI_TADNEW_TEMPLATE_DESC3", "Template of RSS");
define("_MI_TADNEW_TEMPLATE_DESC4", "Template of Post Page");
define("_MI_TADNEW_TEMPLATE_DESC5", "Template of Archive");
define("_MI_TADNEW_TEMPLATE_DESC6", "Template of Customized Page");

define("_MI_TADNEW_BNAME1","Categories");
define("_MI_TADNEW_BDESC1","Show All Categories");
define("_MI_TADNEW_BNAME2","Last News");
define("_MI_TADNEW_BDESC2","Show News Content");
define("_MI_TADNEW_BNAME3","Last Replies");
define("_MI_TADNEW_BDESC3","List the Last Comments");
define("_MI_TADNEW_BNAME4","Subscribe / Cancel Nnewspaper");
define("_MI_TADNEW_BDESC4","The Block of Subscription");
define("_MI_TADNEW_BNAME5","Newspaper List");
define("_MI_TADNEW_BDESC5","Show the Last Newspaper");
define("_MI_TADNEW_BNAME6","The block of News Categories");
define("_MI_TADNEW_BDESC6","Show Last News from Selected Category");
define("_MI_TADNEW_BNAME7","Customized Page");
define("_MI_TADNEW_BDESC7","Show All News Titles from Appointed Customized Page Categories");
define("_MI_TADNEW_BNAME8","Headlines");
define("_MI_TADNEW_BDESC8","Content could be appointed");

define("_MI_TADNEW_TITLE1","<b>News numbers in each page?</b>");
define("_MI_TADNEW_DESC1","Set the news numbers in each page");
define("_MI_TADNEW_TITLE2","<b>Downloading method of attachment</b>");
define("_MI_TADNEW_DESC2","Method 1: Common; Method 2: (More memories required. Not appropriate for big files, but Chinese is working.(default)");
define("_MI_TADNEW_DL_METHOD1","Method 1: Use \"SN_original.XXX\" as filename");
define("_MI_TADNEW_DL_METHOD2","Method 2: System makes up attachments");

define("_MI_TADNEW_SHOW_MODE","<b>Performing method of Index</b>");
define("_MI_TADNEW_SHOW_MODE_DESC","Digest(Default) or news titles (faster, clear)");
define("_MI_TADNEW_SHOW_MODE_OPT1","Digests or Full Content");
define("_MI_TADNEW_SHOW_MODE_OPT2","List of Titles (Double news numbers automatically in each page)");
define("_MI_TADNEW_SHOW_MODE_OPT3","News titles of each category");

define("_MI_TADNEW_CATE_SHOW_MODE","<b>Performing method in single category</b>");
define("_MI_TADNEW_CATE_SHOW_MODE_DESC","Digest(Default) or news titles (faster, clear)");

define("_MI_TADNEW_PREFIX_TAG","<b>Prefix Tags</b>");
define("_MI_TADNEW_PREFIX_TAG_DESC","Add prefix tags to show the news type. (items divided by \";\")");
define("_MI_TADNEW_PREFIX_TAG_VAL","<font color='red'>[emergency]</font>;<font color='blue'>[announcement]</font>;<font color='#CC33CC'>[investigate]</font>;<font color='#00CC33'>[good news]</font>");

define("_MI_TADNEW_SHOW_BB","<b>\"BB Code\" available?</b>");
define("_MI_TADNEW_SHOW_BB_DESC","\"No\" in default. Old news modules use BB Code to set the font style.<br/>For example: color, size. Choose \"yes\" if you have news content from old modules.");


define("_MI_TADNEW_CATE_PIC_WIDTH","<b>Width of Category icon</b>");
define("_MI_TADNEW_CATE_PIC_WIDTH_DESC","Default width of uploaded category icons.");

define("_MI_TADNEW_PIC_WIDTH","<b>Width of attachment image</b>");
define("_MI_TADNEW_PIC_WIDTH_DESC","Default width of the image files as attachment (pixels)");

define("_MI_TADNEW_THUMB_WIDTH","<b>Width of attachment thumbnail</b>");
define("_MI_TADNEW_THUMB_WIDTH_DESC","Default width of the thumbnail image files as attachment (pixels)");


//tadnew 1.4
define("_MI_TADNEW_BNAME9","Optional articles");
define("_MI_TADNEW_BDESC9","can choice of articles to display");
define("_MI_TADNEW_USE_NEWSPAPER","Hide NewsPaper");
define("_MI_TADNEW_USE_NEWSPAPER_DESC","Hide NewsPaper");
define("_MI_TADNEW_USE_USE_ARCHIVE","Hide Archive");
define("_MI_TADNEW_USE_USE_ARCHIVE_DESC","Hide Archive");
define("_MI_TADNEW_SHOW_SUBMENU","Show Sub Menu?");
define("_MI_TADNEW_SHOW_SUBMENU_DESC","Show Sub Menu and Toolbar?");

//tadnews 2.0
define("_MI_TADNEW_DOWNLOAD_AFTER_READ","Download attachments after read.");
define("_MI_TADNEW_DOWNLOAD_AFTER_READ_DESC","Download attachments after read.");
define("_MI_TADNEW_CREAT_CATE_GROUP","The groups can add categories.");
define("_MI_TADNEW_CREAT_CATE_GROUP_DESC","Settong the group can add categories when in a news release");
//define("_MI_TADNEW_USE_KCFINDER","Use KCFinder?");
//define("_MI_TADNEW_USE_KCFINDER_DESC","KCFinder needs PHP5.");
define("_MI_TADNEW_BNAME10","List News");
define("_MI_TADNEW_BDESC10","List news");
define("_MI_TADNEW_BNAME11","Table News");
define("_MI_TADNEW_BDESC11","List news in a table");
define("_MI_TADNEW_SUMMARY_LENGTHS","News summary lengths");
define("_MI_TADNEW_SUMMARY_LENGTHS_DESC","News summary lengths");

define("_MI_TADNEW_BNAME12","QR Code");
define("_MI_TADNEW_BDESC12","QR Code for mobile device");

define("_MI_TADNEW_BNAME13","Slider News");
define("_MI_TADNEW_BDESC13","Slider News");
define("_MI_TADNEW_BNAME14","Responsive Slider News");
define("_MI_TADNEW_BDESC14","Responsive Slider News");

define("_MI_FBCOMMENT_TITLE","Does use facebook comment box?");
define("_MI_FBCOMMENT_TITLE_DESC","");
define("_MI_SOCIALTOOLS_TITLE","Does use social tools?");
define("_MI_SOCIALTOOLS_TITLE_DESC","");
define("_MI_USE_PDA_TITLE","Does use pda.php ?");
define("_MI_USE_PDA_TITLE_DESC","if yes, web will use pda.php for mobile device.");
define("_MI_STAR_RATING_TITLE","Does use star rating?");
define("_MI_STAR_RATING_DESC","");

define("_MI_TADNEW_USE_EMBED","Does enable embed ?");
define("_MI_TADNEW_USE_EMBED_DESC","");
?>

