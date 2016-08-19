var smilies_array = new Array();
smilies_array[1] = [
                    ['1', '[爱你]', 'd_aini.png', '28', '28', '28','爱你'],
                    ['2', '[拜拜]', 'd_baibai.png', '28', '28', '28','拜拜'],
                    ['3', '[悲伤]', 'd_beishang.png', '28', '28', '28','悲伤'],
                    ['4', '[鄙视]', 'd_bishi.png', '28', '28', '28','鄙视'],
                    ['5', '[闭嘴]', 'd_bizui.png', '28', '28', '28','闭嘴'],
                    ['6', '[馋嘴]', 'd_chanzui.png', '28', '28', '28','馋嘴'],
                    ['7', '[吃惊]', 'd_chijing.png', '28', '28', '28','吃惊'],
                    ['8', '[打哈气]', 'd_dahaqi.png', '28', '28', '28','打哈气'],
                    ['9', '[打脸]', 'd_dalian.png', '28', '28', '28','打脸'],
                    ['10', '[钉]', 'd_ding.png', '28', '28', '28','钉'],
                    ['11', '[感冒]', 'd_ganmao.png', '28', '28', '28','感冒'],
                    ['12', '[鼓掌]', 'd_guzhang.png', '28', '28', '28','鼓掌'],
                    ['13', '[哈哈]', 'd_haha.png', '28', '28', '28','哈哈'], 
                    ['14', '[害羞]', 'd_haixiu.png', '28', '28', '28','害羞'],
                    ['15', '[汗]', 'd_han.png', '28', '28', '28','汗'],
                    ['16', '[呵呵]', 'd_hehe.png', '28', '28', '28','呵呵'],
                    ['17', '[黑线]', 'd_heixian.png', '28', '28', '28','黑线'],
                    ['18', '[哼]', 'd_heng.png', '28', '28', '28','哼'],
                    ['19', '[花心]', 'd_huaxin.png', '28', '28', '28','花心'],
                    ['20', '[挤眼]', 'd_jiyan.png', '28', '28', '28','挤眼'],
                    ['21', '[可爱]', 'd_keai.png', '28', '28', '28','可爱'],
                    ['22', '[可怜]', 'd_kelian.png', '28', '28', '28','可怜'],
                    ['23', '[酷]', 'd_ku.png', '28', '28', '28','酷'],
                    ['24', '[困]', 'd_kun.png', '28', '28', '28','困'],
                    ['25', '[懒得理你]', 'd_landelini.png', '28', '28', '28','懒得理你'],
                    ['26', '[泪]', 'd_lei.png', '28', '28', '28','泪'],
                    ['27', '[怒]', 'd_nu.png', '28', '28', '28','怒'],
                    ['28', '[怒骂]', 'd_numa.png', '28', '28', '28','怒骂'],
                    ['29', '[钱]', 'd_qian.png', '28', '28', '28','钱'],
                    ['30', '[亲亲]', 'd_qinqin.png', '28', '28', '28','亲亲'],
                    ['31', '[傻眼]', 'd_shayan.png', '28', '28', '28','傻眼'],
                    ['32', '[生病]', 'd_shengbing.png', '28', '28', '28','生病'],
                    ['33', '[失望]', 'd_shiwang.png', '28', '28', '28','失望'],
                    ['34', '[衰]', 'd_shuai.png', '28', '28', '28','衰'],
                    ['35', '[睡觉]', 'd_shuijiao.png', '28', '28', '28','睡觉'],
                    ['36', '[思考]', 'd_sikao.png', '28', '28', '28','思考'],
                    ['38', '[太开心]', 'd_taikaixin.png', '28', '28', '28','太开心'], 
                    ['39', '[偷笑]', 'd_touxiao.png', '28', '28', '28','偷笑'],
                    ['40', '[吐]', 'd_tu.png', '28', '28', '28','吐'],
                    ['41', '[挖鼻屎]', 'd_wabishi.png', '28', '28', '28','挖鼻屎'],
                    ['42', '[委屈]', 'd_weiqu.png', '28', '28', '28','委屈'],
                    ['43', '[笑哭]', 'd_xiaoku.png', '28', '28', '28','笑哭'],
                    ['44', '[嘻嘻]', 'd_xixi.png', '28', '28', '28','嘻嘻'],
                    ['45', '[嘘]', 'd_xu.png', '28', '28', '28','嘘'],
                    ['46', '[阴险]', 'd_yinxian.png', '28', '28', '28','阴险'],
                    ['47', '[疑问]', 'd_yiwen.png', '28', '28', '28','疑问'],
                    ['48', '[左哼哼]', 'd_zuohengheng.png', '28', '28', '28','左哼哼'], 
                    ['49', '[晕]', 'd_yun.png', '28', '28', '28','晕'],
                    ['50', '[抓狂]', 'd_zhuakuang.png', '28', '28', '28','抓狂'],
                    ['51', '[男孩儿]', 'd_nanhaier.png', '28', '28', '28','男孩儿'],
                    ['52', '[女孩儿]', 'd_nvhaier.png', '28', '28', '28','女孩儿'],
                    ['53', '[猪头]', 'd_zhutou.png', '28', '28', '28','猪头'],
                    ['54', '[兔子]', 'd_tuzi.png', '28', '28', '28','兔子'],
                    ['55', '[狗]', 'd_doge.png', '28', '28', '28','狗'],
                    ['56', '[肥皂]', 'd_feizao.png', '28', '28', '28','肥皂'],
                    ['57', '[删除]', 'h_del.png', '28', '28', '28','删除']];

var STATICURL = RESOURCE_SITE_URL+'/js/smilies/';
function smilies_show(id, smcols, seditorkey,textobj) {
	if(seditorkey && !$("#"+seditorkey + 'sml_menu')[0]) {
		var div = document.createElement("div");
		div.id = seditorkey + 'sml_menu';
		div.className = 'sllt';
		$('#smilies_div').append(div);
		var div = document.createElement("div");
		div.id = id;
		div.style.overflow = 'hidden';
		$("#"+seditorkey + 'sml_menu').append(div);
	}
	smilies_onload(id, smcols, seditorkey);
	//image绑定操作函数
	$("#smiliesdiv").find("[nctype='smiliecode']").bind('click',function(){
		insertsmilie(this,textobj);
	});
}
function insertsmilie(smilieone,textobj){
	var code = $(smilieone).attr('codetext');
	$(textobj).insertAtCaret(code);
	$(textobj).focus();
	$('#smilies_div').html('');
	$('#smilies_div').hide();
}
function smilies_onload(id, smcols, seditorkey) {
	seditorkey = !seditorkey ? '' : seditorkey;
	$("#"+id).html('<div id="' + id + '_data"></div><div class="sllt-p" id="' + id + '_page"></div>');
	smilies_switch(id, smcols, 1, seditorkey);
}

function smilies_switch(id, smcols, page, seditorkey) {
	//page = page ? page : 1;
	page = 1;
	if(!smilies_array || !smilies_array[page]) return;
	smiliesdata = '<table id="' + id + '_table" cellpadding="0" cellspacing="0"><tr>';
	j = k = 0;
	img = [];
	for(i in smilies_array[page]) {
		if(j >= smcols) {
			smiliesdata += '<tr>';
			j = 0;
		}
		var s = smilies_array[page][i];
		smilieimg = STATICURL + 'images/' + s[2];
		img[k] = new Image();
		img[k].src = smilieimg;
		smiliesdata += s && s[0] ? '<td id="' + seditorkey + 'smilie_' + s[0] + '_td" nctype="smiliecode" codetext="'+s[1]+'"><img id="smilie_' + s[0] + '" width="' + s[3] +'" height="' + s[4] +'" src="' + smilieimg + '" alt="' + s[1] + '" title="'+s[6]+'" />' : '<td>';
		j++; k++;
	}
	smiliesdata += '</table>';
	/* smiliespage = '';
	if(smilies_array.length > 2) {
		prevpage = ((prevpage = parseInt(page) - 1) < 1) ? smilies_array.length - 1 : prevpage;
		nextpage = ((nextpage = parseInt(page) + 1) == smilies_array.length) ? 1 : nextpage;
		smiliespage = '<div class="z"><a href="javascript:void(0)" onclick="smilies_switch(\'' + id + '\', \'' + smcols + '\', ' + prevpage + ', \'' + seditorkey + '\');">上页</a>' +
			'<a href="javascript:void(0)" onclick="smilies_switch(\'' + id + '\', \'' + smcols + '\', ' + nextpage + ', \'' + seditorkey + '\');">下页</a></div>' +
			page + '/' + (smilies_array.length - 1);
	} 
	$('#'+ id + '_page').html(smiliespage);	*/
	$('#'+ id + '_data').html(smiliesdata);
}