<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: main.php,v 1.4 2008/06/25 06:40:17 tad Exp $
// ------------------------------------------------------------------------- //

define("_MD_TADNEW_NAME","本站消息");
define("_MD_TADNEW_TO_MOD","回模組首頁");
define("_MD_TADNEW_TO_ADMIN","管理介面");
define("_MD_TADNEW_SURE_DEL","確定要刪除此資料？");
define("_MD_TADNEW_EDIT","修改");
define("_MD_TADNEW_DEL","刪除");
define("_MD_TADNEW_ADD","新增文章");
define("_MD_TADNEW_MORE","觀看完整文章");
define("_MD_TADNEW_HOT","人氣");
define("_MD_TADNEW_ADD_FIRST","目前沒有任何文章，立即新增第一篇文章！");
define("_MD_TADNEW_NO_NEWS","目前沒有任何文章！");
define("_MD_TADNEW_HIDDEN","本文已不開放！");
define("_MD_TADNEW_OVERDUE","本文已過期！");
define("_MD_TADNEW_NOT_GROUP","您所屬的群組沒有權限閱讀本文！");
define("_MD_TADNEW_NEWS_NEED_PASSWD","本文為加密文章，請輸入密碼觀看：");
define("_MD_TADNEW_ALL_CATE","所有分類");
define("_MD_TADNEW_FILES","附檔");
define("_MD_TADNEWS_NO_TITLE","無標題");
define("_MD_TADNEWS_NO_CATE","不分類");
define("_MD_TADNEW_POSTER","發佈者");
define("_MD_TADNEW_FOR","：");
define("_TAD_NEED_TADTOOLS"," 需要 modules/tadtools，可至<a href='http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50' target='_blank'>Tad教材網</a>下載。");
define("_MA_TADNEW_NEWS_PIC","上傳文章封面圖");

define("_MA_TADNEW_DEL","刪除");

define("_MA_TADNEW_ORDER_SUCCESS","訂閱「%s」完成！");
define("_MA_TADNEW_ORDER_ERROR","訂閱「%s」失敗！");
define("_MA_TADNEW_DEL_SUCCESS","取消訂閱「%s」完成！");
define("_MA_TADNEW_DEL_ERROR","取消訂閱「%s」失敗！");
define("_MA_TADNEW_NP_TITLE","第 %s 期");
define("_MA_TADNEW_FILE_DL_NUM","（已被下載 %s 次）");
define("_MA_TADNEW_ERROR_EMAIL","%s 不是合法的Email");

define("_TADNEWS_BLOCK_NEXT","下 %s 則");
define("_TADNEWS_BLOCK_BACK","上 %s 則");
define("_TADNEWS_BLOCK_NEW","較新文章");
define("_TADNEWS_BLOCK_OLD","較舊文章");
define("_MD_TADNEW_POST","發佈文章");
define("_MD_TADNEW_SIGN_OK","已於 %s 簽收完畢");
define("_MD_TADNEW_I_HAVE_READ","我已閱讀完畢！");
define("_MD_TADNEW_HAVE_READ_NUM","已有 %s 人簽收");
define("_MD_TADNEW_UID_NAME","用戶名稱");
define("_MD_TADNEW_SIGN_TIME","簽收時間");
define("_MD_TADNEW_SIGN_LOG","「%s」簽收紀錄");
define("_MD_TADNEW_DOWNLOAD_AFTER_READ","您必須簽收後才能下載本文附檔。");

//post.php
define("_MD_TADNEW_NO_POST_POWER","尚未登入，無法發表文章。");
define("_MA_TADNEW_ADD_NEWS","新增一篇文章");
define("_MA_TADNEW_NEWS_TITLE","文章標題");
define("_MA_TADNEW_PREFIX_TAG","標籤");
define("_MA_TADNEW_ALWAYS_TOP","置頂");
define("_MA_TADNEW_NEWS_CONTENT","文章內容");
define("_MA_TADNEW_START_DATE","發佈時間");
define("_MA_TADNEW_END_DATE","結束時間");
define("_MA_TADNEW_NEWS_PASSWD","文章加密");
define("_MA_TADNEW_ADV_SETUP","進階設定");
define("_MA_TADNEW_SAVE_NEWS","儲存");
define("_MA_TADNEW_CAN_READ_NEWS_GROUP","可讀取群組");
define("_MA_TADNEW_DB_ADD_ERROR2","無法新增資料到tad_news中");
define("_MA_TADNEW_DB_SELECT_ERROR2","無法取得tad_news資料");
define("_MA_TADNEW_DB_UPDATE_ERROR2","無法更新tad_news中的資料");
define("_MA_TADNEW_DB_DELETE_ERROR2","無法刪除tad_news中的資料");
define("_MA_TADNEW_NEWS_CATE_TEXT","請選擇文章分類。<br>紅色是屬於「自訂頁面分類」");
define("_MA_TADNEW_NEWS_TITLE_TEXT","請輸入文章標題");
define("_MA_TADNEW_START_DATE_TEXT","設定文章發佈日期，<br>日期一到則立即發佈，<br>不設代表立即發佈。");
define("_MA_TADNEW_END_DATE_TEXT","設定文章下架日期，<br>不設代表永遠顯示");
define("_MA_TADNEW_NEWS_PASSWD_TEXT","有加密的文章<br>需輸入密碼才看得見");
define("_MA_TADNEW_CAN_READ_NEWS_GROUP_TEXT","不選，或者選「全部開放」代表所有人都可以讀取本文章<br>亦可按住 Ctrl 來挑選只開放給哪些群組觀看。");
define("_MA_TADNEW_NEWS_CATE","所屬分類");
define("_MA_TADNEW_NEWS_ENABLE","公開或草稿");
define("_MA_TADNEW_NEWS_ENABLE1_TEXT","選擇「公開」則會立即看見該文章");
define("_MA_TADNEW_NEWS_ENABLE0_TEXT","選擇「草稿」則不會在文章列表中看見該文章");
define("_MA_TADNEW_NEWS_ENABLE_OK","公開");
define("_MA_TADNEW_NEWS_UNABLE","草稿");
define("_MA_TADNEW_NEWS_FILES","上傳附檔：");
define("_MA_TADNEW_NEWS_FILES_LIST","附檔列表");
define("_MD_CAT_CANT_FIND_FILE","無法下載該檔");
define("_MA_TADNEW_MON","月");
define("_MA_TADNEW_1","一");
define("_MA_TADNEW_2","二");
define("_MA_TADNEW_3","三");
define("_MA_TADNEW_4","四");
define("_MA_TADNEW_5","五");
define("_MA_TADNEW_6","六");
define("_MA_TADNEW_7","日");
define("_MA_TADNEW_WEEK","週");
define("_MA_TADNEW_TODAY","今日");
define("_MA_TADNEW_ALL_OK","全部開放");
define("_MA_TADNEW_ALL_NO","不需簽收");
define("_MA_TADNEW_NO_ADMIN_POWER","您沒有權限管理這篇文章");
define("_MA_TADNEW_NEWS_HAVE_READ","需簽收群組");
define("_MA_NEED_TADTOOLS","需要 modules/tadtools，可至<a href='http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50' target='_blank'>Tad教材網</a>下載。");
define("_MA_TADNEW_CREAT_NEWS_CATE","在左邊分類下建立新分類");

//archive.php
define("_MD_TADNEW_ARCHIVE","分月文章");
define("_MD_TADNEW_YEAR","年");
define("_MD_TADNEW_MONTH","月");


define("_MD_TADNEW_NEWSPAPER","電子報列表");
define("_MD_TADNEW_NEWSPAPER_LIST","==== 請選擇要觀看的電子報 ====");
define("_MA_TADNEW_NP_DATE","發佈日期");
define("_MA_TADNEW_NP_NUMBER","電子報期數");


define("_MB_TADNEW_ALWAYS_TOP","置頂文章");
define("_MB_TADNEW_TODAY_NEWS","今日文章");



define("_MB_TADNEW_TIME_TAB","發布時間");
define("_MB_TADNEW_PRIVILEGE_TAB","權限");
define("_MB_TADNEW_NEWSPIC_TAB","封面圖");
define("_MB_TADNEW_FILES_TAB","附檔");
define("_MB_TADNEW_ENABLE_NEWSPIC","是否顯示");
define("_MB_TADNEW_ENABLE_NEWSPIC_NO","不要在內文中顯示封面圖");
define("_MB_TADNEW_ENABLE_NEWSPIC_YES","要在內文中顯示封面圖（當作插圖用）");
define("_MB_TADNEW_NEWSPIC_SIZE","圖片框尺寸");
define("_MB_TADNEW_NEWSPIC_WIDTH","寬：");
define("_MB_TADNEW_NEWSPIC_HEIGHT","高：");
define("_MB_TADNEW_NEWSPIC_BORDER","圖片邊框外觀");
define("_MB_TADNEW_NEWSPIC_BORDER_WIDTH","粗細：");
define("_MB_TADNEW_NEWSPIC_BORDER_STYTLE","線條：");
define("_MB_TADNEW_NEWSPIC_SOLID","實線");
define("_MB_TADNEW_NEWSPIC_DASHED","虛線");
define("_MB_TADNEW_NEWSPIC_DOUBLE","雙線");
define("_MB_TADNEW_NEWSPIC_DOTTED","點線");
define("_MB_TADNEW_NEWSPIC_GROOVE","凹線");
define("_MB_TADNEW_NEWSPIC_RIDGE","凸線");
define("_MB_TADNEW_NEWSPIC_INSET","嵌入線");
define("_MB_TADNEW_NEWSPIC_OUTSET","浮出線");
define("_MB_TADNEW_NEWSPIC_NONE","無框線");
define("_MB_TADNEW_NEWSPIC_BORDER_COLOR","顏色：");
define("_MB_TADNEW_NEWSPIC_FLOAT","圖片框位置");
define("_MB_TADNEW_NEWSPIC_FLOAT_LEFT","靠左文繞圖");
define("_MB_TADNEW_NEWSPIC_FLOAT_RIGHT","靠右文繞圖");
define("_MB_TADNEW_NEWSPIC_FLOAT_NONE","不文繞圖");
define("_MB_TADNEW_NEWSPIC_MARGIN","外邊界：");
define("_MB_TADNEW_NEWSPIC_CONTENT","圖片框內容");
define("_MB_TADNEW_NEWSPIC","圖片框");
define("_MB_TADNEW_NEWSPIC_NO_REPEAT","不重複");
define("_MB_TADNEW_NEWSPIC_REPEAT","重複");
define("_MB_TADNEW_NEWSPIC_X_REPEAT","水平重複");
define("_MB_TADNEW_NEWSPIC_Y_REPEAT","垂直重複");
define("_MB_TADNEW_NEWSPIC_SHOW","呈現封面圖的");
define("_MB_TADNEW_NEWSPIC_AND","方，並");
define("_MB_TADNEW_NEWSPIC_LEFT_TOP","左上");
define("_MB_TADNEW_NEWSPIC_LEFT_CENTER","左中");
define("_MB_TADNEW_NEWSPIC_LEFT_BOTTOM","左下");
define("_MB_TADNEW_NEWSPIC_RIGHT_TOP","右上");
define("_MB_TADNEW_NEWSPIC_RIGHT_CENTER","右中");
define("_MB_TADNEW_NEWSPIC_RIGHT_BOTTOM","右下");
define("_MB_TADNEW_NEWSPIC_CENTER_TOP","中上");
define("_MB_TADNEW_NEWSPIC_CENTER_CENTER","中中");
define("_MB_TADNEW_NEWSPIC_CENTER_BOTTOM","中下");
define("_MB_TADNEW_NEWSPIC_NO_RESIZE","不做任何縮放");
define("_MB_TADNEW_NEWSPIC_CONTAIN","縮放以看見完整封面圖");
define("_MB_TADNEW_NEWSPIC_COVER","縮放到塞滿整個圖片框長邊");
define("_MB_TADNEW_NEWSPIC_DEMO","<p>所謂「封面圖」指的就是替每一篇文章上傳一個具有代表性的圖片，此圖片會用在各個區塊上，以增加版面的活潑性。每個區塊的封面圖都可以自行去設定其大小及外觀。若是您想把封面圖也放到內文中當作插圖，那麼，您可以利用此界面來做設定。</p>
           <p>封面圖並沒有一定要多大，但由於封面圖也可以用在滑動新聞區塊上作為大張的滑動圖，因此建議您，圖的大小至少比滑動區塊大即可，預設值為 670x250，因此，建議您，封面圖盡量在這個大小範圍為佳。</p>");

define("_MD_TADNEW_EMBED","嵌入語法");

define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM0","列出文章數");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_EDIT_BITEM1","秀出換頁按鈕");
define("_MB_TADNEWS_TABLE_CONTENT_BLOCK_COL_SET","欄位設定");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_1","發佈時間");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_2","文章標題");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_3","發佈者");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_4","所屬分類");
define("_MB_TADNEWS_TABLE_CONTENT_SHOW_CELL_5","人氣");
define("_MB_TADNEW_TADNEWS_START_FROM","從第幾篇文章開始顯示？");
define("_MB_TADNEWS_CATE_NEWS_EDIT_BITEM0","選擇要秀出的類別");
define("_MB_TADNEW_TADNEWS_HIDE","不顯示");
define("_MB_TADNEWS_TABLE_CONTENT_WIDTH","呈現寬度");
?>
