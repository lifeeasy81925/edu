<script>
function combo_s2_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s2_1.options[document.form.s2_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("鐘點費");		NewOpt[0].value ='';
		NewOpt[1] = new Option("器材購置");	NewOpt[1].value ='';
		NewOpt[2] = new Option("器材維護");	NewOpt[2].value ='';
		NewOpt[3] = new Option("服裝");		NewOpt[3].value ='';
		NewOpt[4] = new Option("道具");		NewOpt[4].value ='';
		NewOpt[5] = new Option("硬體設備");	NewOpt[5].value ='';
		NewOpt[6] = new Option("教材");		NewOpt[6].value ='';
		NewOpt[7] = new Option("其他");		NewOpt[7].value ='';
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("器材購置");	NewOpt[0].value ='';
		NewOpt[1] = new Option("器材維護");	NewOpt[1].value ='';
		NewOpt[2] = new Option("硬體設備");	NewOpt[2].value ='';
		NewOpt[3] = new Option("其他");		NewOpt[3].value ='';
	}

	newnum = NewOpt.length;
	lst = document.form.s2_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s2_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s2_2.options[i] = NewOpt[i];

	document.form.s2_2.options[0].selected = true;
}
</script>