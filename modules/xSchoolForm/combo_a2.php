<script>
function combo_s2_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // �M���U�Կ�椤�����ؼƥ�,���̤j
	var selectName=document.form.s2_1.options[document.form.s2_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == "�g�`��")	{
		NewOpt[0] = new Option("���I�O");		NewOpt[0].value ='';
		NewOpt[1] = new Option("�����ʸm");	NewOpt[1].value ='';
		NewOpt[2] = new Option("�������@");	NewOpt[2].value ='';
		NewOpt[3] = new Option("�A��");		NewOpt[3].value ='';
		NewOpt[4] = new Option("�D��");		NewOpt[4].value ='';
		NewOpt[5] = new Option("�w��]��");	NewOpt[5].value ='';
		NewOpt[6] = new Option("�Ч�");		NewOpt[6].value ='';
		NewOpt[7] = new Option("��L");		NewOpt[7].value ='';
	}

	if (selectName == "�ꥻ��"){
		NewOpt[0] = new Option("�����ʸm");	NewOpt[0].value ='';
		NewOpt[1] = new Option("�������@");	NewOpt[1].value ='';
		NewOpt[2] = new Option("�w��]��");	NewOpt[2].value ='';
		NewOpt[3] = new Option("��L");		NewOpt[3].value ='';
	}

	newnum = NewOpt.length;
	lst = document.form.s2_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// �M�����e�U�Կ�椤������
	for (i = 0; i < clsnum; i++) document.form.s2_2.options[i] = null;
	
	// �[�J�s�����O������
	for (i = 0; i < newnum; i++) document.form.s2_2.options[i] = NewOpt[i];

	document.form.s2_2.options[0].selected = true;
}
</script>