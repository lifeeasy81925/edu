<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: blocks.php,v 1.4 2008/06/25 06:40:09 tad Exp $
// ------------------------------------------------------------------------- //

define("_MB_TADNEW_EXPAND_ALL","全部展開");
define("_MB_TADNEW_CONTACT_ALL","全部收合");

define("_MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM0","文章數");
define("_MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM1","寬度");
define("_MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM2","顯示模式");
define("_MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM6","標題字數");
define("_MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM3","摘要字數");
define("_MB_TADNEW_CONTENT_BLOCK_EDIT_BITEM2_VAL1","直排");
define("_MB_TADNEW_CONTENT_BLOCK_EDIT_BITEM2_VAL2","橫排");
define("_MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM4","摘要文字樣式");
define("_MB_TADNEW_TADNEWS_CONTENT_BLOCK_EDIT_BITEM5","封面圖樣式");

define("_MB_TADNEW_TADNEWS_RE_EDIT_BITEM0","列出回應數");
define("_MB_TADNEW_TADNEWS_RE_EDIT_BITEM1","秀出回應內容長度");

define("_MB_TADNEWS_CATE_NEWS_EDIT_BITEM0","選擇要秀出的類別");
define("_MB_TADNEWS_CATE_NEWS_EDIT_BITEM1","列出文章數");
define("_MB_TADNEWS_CATE_NEWS_EDIT_BITEM2","是否秀出分類縮圖？");
define("_MB_TADNEWS_CATE_NEWS_EDIT_BITEM3","是否秀出分隔線？");

define("_MB_TADNEW_TADNEWS_NP_EDIT_BITEM0","秀出電子報數");
define("_MB_TADNEW_TADNEWS_FOCUS_EDIT_BITEM0","請選擇要秀出的新聞");
define("_MB_TADNEW_TADNEWS_FOCUS_EDIT_BITEM1","是否秀出外框？");
define("_MB_TADNEW_TADNEWS_YES","是");
define("_MB_TADNEW_TADNEWS_NO","否");

define("_MB_TADNEW_NEWS_TITLE","文章標題");
define("_MB_TADNEW_START_DATE","發佈時間");
define("_MB_TADNEW_POSTER","發佈者");
define("_MB_TADNEW_NEWS_CATE","所屬分類");
define("_MB_TADNEW_COUNTER","人氣");
define("_MB_TADNEW_MORE","觀看完整文章");
define("_MB_TADNEW_LESS","摘要顯示");
define("_MB_TADNEW_NEWS_NEED_PASSWD","本文為加密文章，請輸入密碼觀看：");
define("_MB_TADNEW_SURE_DEL","確定要刪除此資料？");
define("_MB_TADNEW_SHOW_TABLE","表格佈告欄式");
define("_MB_TADNEW_SHOW_LIST","文章標題條列式");
define("_MB_TADNEW_SHOW_ALL","全文");
define("_MB_TADNEW_EDIT","修改");
define("_MB_TADNEW_DEL","刪除");
define("_MB_TADNEW_ADD","新增文章");
define("_MB_TADNEW_HOT","人氣：");

define("_MB_TADNEW_SUBMIT","送出");
define("_MB_TADNEW_TITLE","電子報：");
define("_MB_TADNEW_NO_NEWSPAPER","尚未建立電子報，無法提供訂閱。");
define("_MB_TADNEW_EMAIL","Email ：");
define("_MB_TADNEW_ORDER","訂閱：");
define("_MB_TADNEW_CANCEL","取消：");
define("_MB_TADNEW_ORDER_COUNT","目前訂閱人數： %s 人");

define("_MB_TADNEW_NP_TITLE","第 %s 期");

define("_TADNEWS_BLOCK_NEXT","下 %s 則");
define("_TADNEWS_BLOCK_BACK","上 %s 則");

define("_MB_TADNEW_ALWAYS_TOP","置頂文章");
define("_MB_TADNEW_TODAY_NEWS","今日文章");

define("_MB_TADNEWS_PAGE_EDIT_BITEM0","選擇要秀出哪一個分類的所有文章");
define("_MB_TADNEWS_PAGE_EDIT_BITEM1","標題長度限制");

//tadnews 1.3.1
define("_MB_TADNEW_TADNEWS_MY_PAGE","請輸入文章編號，可用「,」隔開");
define("_MB_TADNEWS_NO_CATE","不分類");
define("_MB_TADNEWS_NO_TITLE","無標題");

//tadnews 2.0
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM0","列出文章數");
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM1","摘要字數");
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM1_DESC","（設0，代表不秀出摘要。設60代表：只秀出60個英文字元或20個UTF8中文字或30個Big5中文字）");
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM2","摘要CSS設定");
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM3","標題字數");
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM3_DESC","（設0，代表完整出現標題。設60代表：只秀出60個英文字元或20個UTF8中文字或30個Big5中文字）");
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM4","是否秀出文章縮圖？");
define("_MB_TADNEWS_LIST_CONTENT_BLOCK_EDIT_BITEM5","縮圖CSS設定");

define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM0","列出文章數");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM1","秀出換頁按鈕");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM2","第一欄");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM3","第二欄");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM4","第三欄");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM5","第四欄");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM6","第五欄");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_1","發佈時間");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_2","文章標題");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_3","發佈者");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_4","所屬分類");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_5","人氣");

define("_MB_TADNEW_TADNEWS_START_FROM","從第幾篇文章開始顯示？");
define("_MB_TADNEW_TADNEWS_HIDE","不顯示");


define("_MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM0","顯示區寬度");
define("_MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM1","顯示區高度");
define("_MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM2","列出文章數");
define("_MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM3","文章摘要字數");
define("_MB_TADNEWS_SLIDERNEWS_BLOCK_EDIT_BITEM4","使用的滑動圖文外掛");
?>
