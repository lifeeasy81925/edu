<?php
//  ------------------------------------------------------------------------ //
// Editor: tad 
// Datetime:2007-11-04
// $Id: admin.php,v 1.4 2008/06/25 06:40:09 tad Exp $
// ------------------------------------------------------------------------- //

define("_MD_TADNEW_TO_MOD","Back to Module");
define("_MD_TADNEW_TO_ADMIN","Admin");
define("_MD_TADNEW_SURE_DEL","Delete this data?");
define("_MA_TADNEW_SAVE_CATE","Save");
define("_MA_TADNEW_FUNCTION","Function");
define("_MA_TADNEW_EDIT","Edit");
define("_MA_TADNEW_DEL","Delete");
define("_MA_TADNEW_MOVE","Move");
define("_MA_TADNEW_MOVE_TO","Submit");
define("_MA_TADNEW_MOVE_TO_WHERE","Move news from \"%s\" to?");
define("_MA_TADNEW_ADD","Post");
define("_MA_TADNEW_STATUS","Status");
define("_MA_TADNEW_OUT_DATE","Overdue");
define("_MA_TADNEW_ALL_OK","All");
define("_TAD_NEED_TADTOOLS","Need modules/tadtools. You can download tadtools from <a href='http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50' target='_blank'>Tad's web</a>.");

//define("_MA_TADNEW_NO_DIRNAME","No Directory Name");
//define("_MA_TADNEW_MKDIR_ERROR","Can't make %s directory. Please make directory manually, and set network access permission(777)");
define("_MI_TADNEW_ADMENU1", "News");
define("_MI_TADNEW_ADMENU2", "Post");
define("_MI_TADNEW_ADMENU3", "Categories");
define("_MI_TADNEW_ADMENU4", "Data Transfer");
define("_MI_TADNEW_ADMENU5", "Newspaper");
define("_MI_TADNEW_ADMENU6", "Upgrade");
define("_MI_TADNEW_ADMENU7", "Customized Page");
define("_MI_TADNEW_ADMENU8", "Tags");


//index.php
define("_MA_TADNEW_SAVE_NEWS_SN","Serial Number");
define("_MA_TADNEW_NEWS_UID","Poster");
define("_MA_TADNEW_LIST","The List of Published News");

define("_MB_TADNEW_ALWAYS_TOP","Sticky");
define("_MB_TADNEW_TODAY_NEWS","Today");
define("_MB_TADNEW_BATCH_TOOLS","Batch tools");


//post.php
define("_MD_TADNEW_NO_POST_POWER","Please login first for posting news.");
define("_MA_TADNEW_ADD_NEWS","Post");
define("_MA_TADNEW_NEWS_TITLE","Title");
define("_MA_TADNEW_PREFIX_TAG","Prefix");
define("_MA_TADNEW_ALWAYS_TOP","Sticky");
define("_MA_TADNEW_NEWS_CONTENT","Content");
define("_MA_TADNEW_START_DATE","Start Date");
define("_MA_TADNEW_END_DATE","End Date");
define("_MA_TADNEW_NEWS_PASSWD","Password");
define("_MA_TADNEW_ADV_SETUP","Advance Settings");
define("_MA_TADNEW_SAVE_NEWS","Save");
define("_MA_TADNEW_CAN_READ_NEWS_GROUP","Available Groups");
define("_MA_TADNEW_DB_ADD_ERROR2","Failed to add data to tad_news");
define("_MA_TADNEW_DB_SELECT_ERROR2","Failed to get data from tad_news");
define("_MA_TADNEW_DB_UPDATE_ERROR2","Failed to update data of tad_news");
define("_MA_TADNEW_DB_DELETE_ERROR2","Failed to delete data from tad_news");
define("_MA_TADNEW_NEWS_CATE_TEXT","Choose a category.<br>Red means ¡uCustomized Category¡v");
define("_MA_TADNEW_NEWS_TITLE_TEXT","Input News Title");
define("_MA_TADNEW_START_DATE_TEXT","Publish date of news,<br>News will be published on appointed date;<br>Non-select for publishing immediatelly.");
define("_MA_TADNEW_END_DATE_TEXT","End date of news;<br>Non-select for forever visible.");
define("_MA_TADNEW_NEWS_PASSWD_TEXT","Passowrd will be required to read this news if you input password here.");
define("_MA_TADNEW_CAN_READ_NEWS_GROUP_TEXT","Non-select or 'All' means everyone can read this news<br>you can press 'Ctrl' and select the available groups to read too.");
define("_MA_TADNEW_NEWS_CATE","Category");
define("_MA_TADNEW_NEWS_ENABLE","Save as");
define("_MA_TADNEW_NEWS_ENABLE1_TEXT","'Public' for publishing immediatelly.");
define("_MA_TADNEW_NEWS_ENABLE0_TEXT","'Draft' for saving as a draft without showing in newslist.");
define("_MA_TADNEW_NEWS_ENABLE_OK","Public");
define("_MA_TADNEW_NEWS_UNABLE","Draft");
define("_MA_TADNEW_NEWS_FILES","Upload files:");
define("_MA_TADNEW_NEWS_FILES_LIST","Attachments");
define("_MD_CAT_CANT_FIND_FILE","Can't download the file");
define("_MA_TADNEW_MON","(Month)");
define("_MA_TADNEW_1","Mon");
define("_MA_TADNEW_2","Tue");
define("_MA_TADNEW_3","Wed");
define("_MA_TADNEW_4","Thu");
define("_MA_TADNEW_5","Fri");
define("_MA_TADNEW_6","Sat");
define("_MA_TADNEW_7","Sun");
define("_MA_TADNEW_WEEK","Week");
define("_MA_TADNEW_TODAY","Today");
define("_MA_TADNEW_ALL_OK","All");
define("_MA_TADNEW_ALL_NO","None");
define("_MA_TADNEW_NO_ADMIN_POWER","You aren't authorized to manage this news.");
define("_MA_TADNEW_NEWS_HAVE_READ","Must read Groups");
define("_MA_NEED_TADTOOLS","Need modules/tadtools. You can download tadtools from <a href='http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50' target='_blank'>Tad's web</a>.");
define("_MA_TADNEW_CREAT_NEWS_CATE","Creat a sub-category from left category:");



//cate.php
define("_MA_TADNEW_ADD_CATE","Add Category");
define("_MA_TADNEW_PARENT_CATE","Parent Category:");
define("_MA_TADNEW_CATE_TITLE","Title");
define("_MA_TADNEW_CAN_READ_CATE_GROUP","Available groups to <font color='blue'>read</font> this category");
define("_MA_TADNEW_CAN_POST_CATE_GROUP","Available groups to <font color='red'>post</font> news in this category.");
define("_MA_TADNEW_CAN_READ_CATE_GROUP_TXT","Non-select = All Free");
define("_MA_TADNEW_CAN_POST_CATE_GROUP_TXT","Non-select = Administrator Only");
define("_MA_TADNEW_CATE_SN","Serial Number");
define("_MA_TADNEW_DB_ADD_ERROR1","Failed to add data to tad_news_cate");
define("_MA_TADNEW_DB_SELECT_ERROR1","Failed to get data from tad_news_cate");
define("_MA_TADNEW_DB_UPDATE_ERROR1","Failed to update data of tad_news_cate");
define("_MA_TADNEW_DB_DEL_ERROR1","can't delete tad_news_cate's news");
define("_MA_TADNEW_CATE_SORT","Sort");
define("_MA_TADNEW_CATE_COUNTER","Total: ");
define("_MA_TADNEW_CATE_LIST","Category List");
define("_MA_TADNEW_PAGECATE_LIST","Customized Page List");
define("_MA_TADNEW_ONLY_ROOT","Administrator");
define("_MA_TADNEW_CAN_READ_CATE_GROUP_S","Read");
define("_MA_TADNEW_CAN_POST_CATE_GROUP_S","Post");
define("_MA_TADNEW_SHOW_FP","Is it A Category?");
define("_MA_TADNEW_YES","Yes(default)");
define("_MA_TADNEW_NO","No(for customized pages with blocks.)");
define("_MA_TADNEW_CATE_PIC","Icon");
define("_MA_TADNEW_CATE_ADV","Advance Settings");
define("_MA_TADNEW_CHANGE_TO_NEWS","Set as news category");
define("_MA_TADNEW_CHANGE_TO_PAGE","Set as customized pages category");
define("_MA_TADNEW_SHOW_CATE_NEWS","Show news of selected category:");
define("_MA_TADNEW_SHOW_AUTHOR_NEWS","Show news of selected author:");

//import.php
define("_MA_TADNEW_NO_NEWSMOD","No installed News Module; No data could be transferred.");
define("_MA_TADNEW_HAVE_NEWSMOD"," News Module installed version is %s.");
define("_MA_TADNEW_IMPORT_CATE","Select Category to be transferred");
define("_MA_TADNEW_STORY_OF_CATE","News");
define("_MA_TADNEW_IMPORT","Start");

//newspaper.php
define("_MA_TADNEW_NP","Newspaper");
define("_MA_TADNEW_NP_SELECT","Create Newspaper");
define("_MA_TADNEW_NP_MODIFY","Modify Header/Footer");
define("_MA_TADNEW_NP_DEL","Delete");
define("_MA_TADNEW_NP_DEL_DESC","Still %s data exist, so failed to delete.");
define("_MA_TADNEW_NP_OPTION","Select a title");
define("_MA_TADNEW_NP_CREATE","Create a new title");
define("_MA_TADNEW_NP_TITLE","Title");
define("_MA_TADNEW_NP_DATE","Date");
define("_MA_TADNEW_NP_NUMBER","Numbers");
define("_MA_TADNEW_NP_NUMBER_INPUT","No. %s ");
define("_MA_TADNEW_NP_STEP1","[Step 1] Select or create a new title");
define("_MA_TADNEW_NP_STEP2","[Step 2] Select the news into newspaper");
define("_MA_TADNEW_NP_STEP3","[Step 3] Edit newspaper");
define("_MA_TADNEW_NP_STEP4","[Step 4] Submit");
define("_MA_TADNEW_NP_CONTENT_HEAD","<b>Header</b>
<p>Displayed on top of newspaper including words and pictures</p>
<p>{N}->\"Number.\"</p>
<p>{D}->\"Publish Date\"</p>");
define("_MA_TADNEW_NP_CONTENT","Content");
define("_MA_TADNEW_NP_CONTENT_FOOT","<b>Footer</b><p>Keep empty and click \"Next\" for default Header or Footer</p>");
define("_MA_TADNEW_NP_AVAILABLE_COUNTRIES","All News");
define("_MA_TADNEW_NP_SELECTED_COUNTRIES","Selected News");
define("_MA_TADNEW_NP_SUBMIT","Next");
define("_MD_TADNEW_MORE","Read More");
define("_MA_TADNEW_NP_TITLE_L","(");
define("_MA_TADNEW_NP_TITLE_R",")");

define("_MA_TADNEW_NP_HEAD_CONTENT","<h1>%s NO. {N} </h1><h2>* Subscribe: %s * Publish Date: {D}</h2>");

define("_MA_TADNEW_NP_FOOT_CONTENT","<div class=\"foot\"><h1>[About] </h1>
<p>* Editor:%s</p>
<p>All rights reserved by \"<a href='%s' target='_blank'>%s</a>\", and published in <a href='http://creativecommons.org/licenses/by-sa/2.5/tw/deed.zh_TW' target='_blank'>Creative Common CC\"Attribution licensing-Attribution-NoDerivs-Noncommercial\"article of authority Taiwan 2.5 version </a>. <a href='http://creativecommons.org/licenses/by-sa/2.5/tw/legalcode' target='_blank'>(Full Article of Authority)</a></p>
<p>To use any content of newspaper out of authorized range, please contact \"%s\"(<a href='mailto:%s'>%s</a>) </p>
<p>To subscribe or cancel newspaper, please go to :<a href='%s' target='_blank'>%s</a></p></div>");
define("_MD_TADNEW_SEND_NOW","Submit");
define("_MD_TADNEW_SEND_OK","Submit successfully!");
define("_MD_TADNEW_SEND_ERROR","Submit failed!");
define("_MD_TADNEW_MAIL_LIST","Receiver (total: %s):");
define("_MA_TADNEW_NP_LIST","Manage Newspaper");
define("_MA_TADNEW_NP_THEMES","Theme");
define("_MA_TADNEW_NP_ADD","Add to newspaper");
define("_MA_TADNEW_NP_REMOVE","Remove from newspaper");
define("_MA_TADNEW_NP_EMAIL","Manage Email");
define("_MA_TADNEW_NP_EMAIL_NUM","total: %s");
define("_MA_TADNEW_NP_EMAIL_IMPORT","Import email");
define("_MD_TADNEW_NEVER_SEND","Has not been sent");
define("_MD_TADNEW_SEND_LOG","View log");
define("_MD_TADNEW_EMPTY_LOG","on log");

//update
define("_MA_TADNEW_AUTOUPDATE","Upgrade");
define("_MA_TADNEW_AUTOUPDATE_VER","Version");
define("_MA_TADNEW_AUTOUPDATE_DESC","Function");
define("_MA_TADNEW_AUTOUPDATE_STATUS","Status");
define("_MA_TADNEW_AUTOUPDATE_GO","Upgrade");
define("_MA_TADNEW_AUTOUPDATE1","Create tad_news_files table");
define("_MA_TADNEW_AUTOUPDATE2","Insert the 'sort' field into tad_news_cate");
define("_MA_TADNEW_AUTOUPDATE3","Create tad_news_paper_setup,tad_news_paper,and tad_news_paper_email tables");
define("_MA_TADNEW_AUTOUPDATE4","Insert the 'counter' field into tad_news_files ");
define("_MA_TADNEW_AUTOUPDATE5","Insert the 'enable_post_group' field into tad_news_cate");
define("_MA_TADNEW_AUTOUPDATE6","Insert the 'themes' field into tad_news_paper_setup ");
define("_MA_TADNEW_AUTOUPDATE7","Insert the 'prefix_tag' and 'always_top' fields into tad_news ");
define("_MA_TADNEW_AUTOUPDATE8","Insert the 'cate_pic', 'not_news' and the 'setup' fields into tad_news ");
define("_MA_TADNEW_EVN_CHK","Environment Test");
define("_MA_TADNEW_ICONV_OK","Support iconv libraries! Chinese encode is working!");
define("_MA_TADNEW_ICONV_NOT_OK","No support iconv libraries!");
define("_MA_TADNEW_ICONV_NOT_WORK","Support iconv libraries! But iconv() function is not working!");
define("_MA_TADNEW_MBSTRING_OK","support mbstring libraries! Chinese encode is working!");
define("_MA_TADNEW_MBSTRING_NOT_OK","No support mbstring libraries! Archive, RSS and news blocks will be control!");


//page
define("_MA_TADNEW_CATE_SHOW_TITLE","Show News Title");
define("_MA_TADNEW_CATE_SHOW_3D","Show the border of fillet");
define("_MA_TADNEW_CATE_SHOW_TOOL","Show Toolbar");
define("_MA_TADNEW_CATE_SHOW_COMM","Comments Available");
define("_MA_TADNEW_CATE_YES","Yes");
define("_MA_TADNEW_CATE_NO","No");

//tag.php
define('_MA_TADNEW_TAG_TITLE' , 'Tag');
define('_MA_TADNEW_TAG_COLOR' , 'Color');
define('_MA_TADNEW_TAG_SN' , 'Tag SN');
define('_MA_TADNEW_TAG_ENABLE' , 'Enable?');
define('_MA_TADNEW_TAG_DEMO' , 'Demo');
define('_MA_TADNEW_TAG_FUNC' , 'Function');
define('_MA_TADNEW_TAG_NEW' , 'New Tag');
define('_MA_TADNEW_TAG_ABLE' , 'Enable');
define('_MA_TADNEW_TAG_UNABLE' , 'Unable');
?>
