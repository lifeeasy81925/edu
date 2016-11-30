

(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = {"required":{    
						"regex":"none",
						"alertText":"* 必填欄位",
						"alertTextCheckboxMultiple":"* 請至少選擇一個項目",
						"alertTextCheckboxe":"* 此核選框為必填"},
					"length":{
						"regex":"none",
						"alertText":"* 請輸入 ",
						"alertText2":" 到 ",
						"alertText3":" 個字之間"},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* 超過可選取上限"},
					"minCheckbox":{
						"regex":"none",
						"alertText":"* 至少要選",
						"alertText2":"個項目"},
					"confirm":{
						"regex":"none",
						"alertText":"* 驗證不正確，請重填"},
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* 電話號碼錯誤"},
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* Email不合法"},
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* 日期有誤，格式應為 YYYY-MM-DD"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* 只限數字"},
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"* 不允許使用特殊符號"},
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* 僅能用英文字元"},
					"ajaxUser":{
						"file":"mem_chk.php",
						"alertTextOk":"* 可使用",
						"alertTextLoad":"* 檢查中...",
						"alertText":"* 已被使用，請換一個"},
					"ajaxName":{
						"file":"mem_chk.php",
						"alertText":"* 此名稱可使用",
						"alertTextOk":"* 此名稱已被使用，請換一個",
						"alertTextLoad":"* 檢查中..."},
					"ajaxEmail":{
						"file":"email_chk.php",
						"alertTextOk":"* 可使用",
						"alertTextLoad":"* 檢查中...",
						"alertText":"* 此信箱已被使用，請換一個"}
				}	
		}
	}
})(jQuery);

$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});
