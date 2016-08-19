<?php
defined('InWrzcNet') or exit('Access Invalid!');
$smilies_array = array ();
/* $smilies_array['searcharray'] = array(1=>'/'.preg_quote(htmlspecialchars(":smile:"),'/').'/',
									  2=>'/'.preg_quote(htmlspecialchars(":sad:"),'/').'/',
									  3=>'/'.preg_quote(htmlspecialchars(":biggrin:"),'/').'/',
									  4=>'/'.preg_quote(htmlspecialchars(":cry:"),'/').'/',
									  5=>'/'.preg_quote(htmlspecialchars(":huffy:"),'/').'/',
									  6=>'/'.preg_quote(htmlspecialchars(":shocked:"),'/').'/',
									  7=>'/'.preg_quote(htmlspecialchars(":tongue:"),'/').'/',
									  8=>'/'.preg_quote(htmlspecialchars(":shy:"),'/').'/',
									  9=>'/'.preg_quote(htmlspecialchars(":titter:"),'/').'/',
									  10=>'/'.preg_quote(htmlspecialchars(":sweat:"),'/').'/',
									  11=>'/'.preg_quote(htmlspecialchars(":mad:"),'/').'/',
									  12=>'/'.preg_quote(htmlspecialchars(":lol:"),'/').'/',
									  13=>'/'.preg_quote(htmlspecialchars(":loveliness:"),'/').'/',
									  14=>'/'.preg_quote(htmlspecialchars(":funk:"),'/').'/',
									  15=>'/'.preg_quote(htmlspecialchars(":curse:"),'/').'/',
									  16=>'/'.preg_quote(htmlspecialchars(":dizzy:"),'/').'/',
									  17=>'/'.preg_quote(htmlspecialchars(":shutup:"),'/').'/',
									  18=>'/'.preg_quote(htmlspecialchars(":sleepy:"),'/').'/',
									  19=>'/'.preg_quote(htmlspecialchars(":hug:"),'/').'/',
									  20=>'/'.preg_quote(htmlspecialchars(":victory:"),'/').'/',
									  21=>'/'.preg_quote(htmlspecialchars(":sun:"),'/').'/',
									  22=>'/'.preg_quote(htmlspecialchars(":moon:"),'/').'/',
									  23=>'/'.preg_quote(htmlspecialchars(":kiss:"),'/').'/',
									  24=>'/'.preg_quote(htmlspecialchars(":handshake:"),'/').'/'
									  ); */
$smilies_array['searcharray'] = array(1=>'/'.preg_quote(htmlspecialchars("[爱你]"),'/').'/',
		2=>'/'.preg_quote(htmlspecialchars("[拜拜]"),'/').'/',
		3=>'/'.preg_quote(htmlspecialchars("[悲伤]"),'/').'/',
		4=>'/'.preg_quote(htmlspecialchars("[鄙视]"),'/').'/',
		5=>'/'.preg_quote(htmlspecialchars("[闭嘴]"),'/').'/',
		6=>'/'.preg_quote(htmlspecialchars("[馋嘴]"),'/').'/',
		7=>'/'.preg_quote(htmlspecialchars("[吃惊]"),'/').'/',
		8=>'/'.preg_quote(htmlspecialchars("[打哈气]"),'/').'/',
		9=>'/'.preg_quote(htmlspecialchars("[打脸]"),'/').'/',
		10=>'/'.preg_quote(htmlspecialchars("[钉]"),'/').'/',
		11=>'/'.preg_quote(htmlspecialchars("[感冒]"),'/').'/',
		12=>'/'.preg_quote(htmlspecialchars("[鼓掌]"),'/').'/',
		13=>'/'.preg_quote(htmlspecialchars("[哈哈]"),'/').'/',
		14=>'/'.preg_quote(htmlspecialchars("[害羞]"),'/').'/',
		15=>'/'.preg_quote(htmlspecialchars("[汗]"),'/').'/',
		16=>'/'.preg_quote(htmlspecialchars("[呵呵]"),'/').'/',
		17=>'/'.preg_quote(htmlspecialchars("[黑线]"),'/').'/',
		18=>'/'.preg_quote(htmlspecialchars("[哼]"),'/').'/',
		19=>'/'.preg_quote(htmlspecialchars("[花心]"),'/').'/',
		20=>'/'.preg_quote(htmlspecialchars("[挤眼]"),'/').'/',
		21=>'/'.preg_quote(htmlspecialchars("[可爱]"),'/').'/',
		22=>'/'.preg_quote(htmlspecialchars("[可怜]"),'/').'/',
		23=>'/'.preg_quote(htmlspecialchars("[酷]"),'/').'/',
		24=>'/'.preg_quote(htmlspecialchars("[困]"),'/').'/',
		25=>'/'.preg_quote(htmlspecialchars("[懒得理你]"),'/').'/',
		26=>'/'.preg_quote(htmlspecialchars("[泪]"),'/').'/',
		27=>'/'.preg_quote(htmlspecialchars("[怒]"),'/').'/',
		28=>'/'.preg_quote(htmlspecialchars("[怒骂]"),'/').'/',
		29=>'/'.preg_quote(htmlspecialchars("[钱]"),'/').'/',
		30=>'/'.preg_quote(htmlspecialchars("[亲亲]"),'/').'/',
		31=>'/'.preg_quote(htmlspecialchars("[傻眼]"),'/').'/',
		32=>'/'.preg_quote(htmlspecialchars("[生病]"),'/').'/',
		33=>'/'.preg_quote(htmlspecialchars("[失望]"),'/').'/',
		34=>'/'.preg_quote(htmlspecialchars("[衰]"),'/').'/',
		35=>'/'.preg_quote(htmlspecialchars("[睡觉]"),'/').'/',
		36=>'/'.preg_quote(htmlspecialchars("[思考]"),'/').'/',
		37=>'/'.preg_quote(htmlspecialchars("[太开心]"),'/').'/',
		38=>'/'.preg_quote(htmlspecialchars("[偷笑]"),'/').'/',
		39=>'/'.preg_quote(htmlspecialchars("[吐]"),'/').'/',
		40=>'/'.preg_quote(htmlspecialchars("[挖鼻屎]"),'/').'/',
		41=>'/'.preg_quote(htmlspecialchars("[委屈]"),'/').'/',
		42=>'/'.preg_quote(htmlspecialchars("[笑哭]"),'/').'/',
		43=>'/'.preg_quote(htmlspecialchars("[嘻嘻]"),'/').'/',
		44=>'/'.preg_quote(htmlspecialchars("[嘘]"),'/').'/',
		45=>'/'.preg_quote(htmlspecialchars("[阴险]"),'/').'/',
		46=>'/'.preg_quote(htmlspecialchars("[疑问]"),'/').'/',
		47=>'/'.preg_quote(htmlspecialchars("[左哼哼]"),'/').'/',
		48=>'/'.preg_quote(htmlspecialchars("[右哼哼]"),'/').'/',
		49=>'/'.preg_quote(htmlspecialchars("[晕]"),'/').'/',
		50=>'/'.preg_quote(htmlspecialchars("[抓狂]"),'/').'/',
		51=>'/'.preg_quote(htmlspecialchars("[男孩儿]"),'/').'/',
		52=>'/'.preg_quote(htmlspecialchars("[女孩儿]"),'/').'/',
		53=>'/'.preg_quote(htmlspecialchars("[猪头]"),'/').'/',
		54=>'/'.preg_quote(htmlspecialchars("[兔子]"),'/').'/',
		55=>'/'.preg_quote(htmlspecialchars("[狗]"),'/').'/',
		56=>'/'.preg_quote(htmlspecialchars("[肥皂]"),'/').'/',
		57=>'/'.preg_quote(htmlspecialchars("[删除]"),'/').'/'
);
/* $smilies_array['replacearray'] = array(1=>array('imagename'=>'smile.gif','desc'=>'微笑'),
									   2=>array('imagename'=>'sad.gif','desc'=>'难过'),
									   3=>array('imagename'=>'biggrin.gif','desc'=>'呲牙'),
									   4=>array('imagename'=>'cry.gif','desc'=>'大哭'),
									   5=>array('imagename'=>'huffy.gif','desc'=>'发怒'),
									   6=>array('imagename'=>'shocked.gif','desc'=>'惊讶'),
									   7=>array('imagename'=>'tongue.gif','desc'=>'调皮'),
									   8=>array('imagename'=>'shy.gif','desc'=>'害羞'),
									   9=>array('imagename'=>'titter.gif','desc'=>'偷笑'),
									   10=>array('imagename'=>'sweat.gif','desc'=>'流汗'),
									   11=>array('imagename'=>'mad.gif','desc'=>'抓狂'),
									   12=>array('imagename'=>'lol.gif','desc'=>'阴险'),
									   13=>array('imagename'=>'loveliness.gif','desc'=>'可爱'),
									   14=>array('imagename'=>'funk.gif','desc'=>'惊恐'),
									   15=>array('imagename'=>'curse.gif','desc'=>'咒骂'),
									   16=>array('imagename'=>'dizzy.gif','desc'=>'晕'),
									   17=>array('imagename'=>'shutup.gif','desc'=>'闭嘴'),
									   18=>array('imagename'=>'sleepy.gif','desc'=>'睡'),
									   19=>array('imagename'=>'hug.gif','desc'=>'拥抱'),
									   20=>array('imagename'=>'victory.gif','desc'=>'胜利'),
									   21=>array('imagename'=>'sun.gif','desc'=>'太阳'),
									   22=>array('imagename'=>'moon.gif','desc'=>'月亮'),
									   23=>array('imagename'=>'kiss.gif','desc'=>'示爱'),
									   24=>array('imagename'=>'handshake.gif','desc'=>'握手')
									  ); */
$smilies_array['replacearray'] = array(
		1=>array('imagename'=>'d_aini.png','desc'=>'爱你'),
		2=>array('imagename'=>'d_baibai.png','desc'=>'拜拜'),
		3=>array('imagename'=>'d_beishang.png','desc'=>'悲伤'),
		4=>array('imagename'=>'d_bishi.png','desc'=>'鄙视'),
		5=>array('imagename'=>'d_bizui.png','desc'=>'闭嘴'),
		6=>array('imagename'=>'d_chanzui.png','desc'=>'馋嘴'),
		7=>array('imagename'=>'d_chijing.png','desc'=>'吃惊'),
		8=>array('imagename'=>'d_dahaqi.png','desc'=>'打哈气'),
		9=>array('imagename'=>'d_dalian.png','desc'=>'打脸'),
		10=>array('imagename'=>'d_ding.png','desc'=>'钉'),
		11=>array('imagename'=>'d_ganmao.png','desc'=>'感冒'),
		12=>array('imagename'=>'d_guzhang.png','desc'=>'鼓掌'),
		13=>array('imagename'=>'d_haha.png','desc'=>'哈哈'),
		14=>array('imagename'=>'d_haixiu.png','desc'=>'害羞'),
		15=>array('imagename'=>'d_han.png','desc'=>'汗'),
		16=>array('imagename'=>'d_hehe.png','desc'=>'呵呵'),
		17=>array('imagename'=>'d_heixian.png','desc'=>'黑线'),
		18=>array('imagename'=>'d_heng.png','desc'=>'哼'),
		19=>array('imagename'=>'d_huaxin.png','desc'=>'花心'),
		20=>array('imagename'=>'d_jiyan.png','desc'=>'挤眼'),
		21=>array('imagename'=>'d_keai.png','desc'=>'可爱'),
		22=>array('imagename'=>'d_kelian.png','desc'=>'可怜'),
		23=>array('imagename'=>'d_ku.png','desc'=>'酷'),
		24=>array('imagename'=>'d_kun.png','desc'=>'困'),
		25=>array('imagename'=>'d_landelini.png','desc'=>'懒得理你'),
		26=>array('imagename'=>'d_lei.png','desc'=>'泪'),
		27=>array('imagename'=>'d_nu.png','desc'=>'怒'),
		28=>array('imagename'=>'d_numa.png','desc'=>'怒骂'),
		29=>array('imagename'=>'d_qian.png','desc'=>'钱'),
		30=>array('imagename'=>'d_qinqin.png','desc'=>'亲亲'),
		31=>array('imagename'=>'d_shayan.png','desc'=>'傻眼'),
		32=>array('imagename'=>'d_shengbing.png','desc'=>'生病'),
		33=>array('imagename'=>'d_shiwang.png','desc'=>'失望'),
		34=>array('imagename'=>'d_shuai.png','desc'=>'衰'),
		35=>array('imagename'=>'d_shuijiao.png','desc'=>'睡觉'),
		36=>array('imagename'=>'d_sikao.png','desc'=>'思考'),
		37=>array('imagename'=>'d_taikaixin.png','desc'=>'太开心'),
		38=>array('imagename'=>'d_touxiao.png','desc'=>'偷笑'),
		39=>array('imagename'=>'d_tu.png','desc'=>'吐'),
		40=>array('imagename'=>'d_wabishi.png','desc'=>'挖鼻屎'),
		41=>array('imagename'=>'d_weiqu.png','desc'=>'委屈'),
		42=>array('imagename'=>'d_xiaoku.png','desc'=>'笑哭'),
		43=>array('imagename'=>'d_xixi.png','desc'=>'嘻嘻'),
		44=>array('imagename'=>'d_xu.png','desc'=>'嘘'),
		45=>array('imagename'=>'d_yinxian.png','desc'=>'阴险'),
		46=>array('imagename'=>'d_yiwen.png','desc'=>'疑问'),
		47=>array('imagename'=>'d_zuohengheng.png','desc'=>'左哼哼'),
		48=>array('imagename'=>'d_youhengheng.png','desc'=>'右哼哼'),
		49=>array('imagename'=>'d_yun.png','desc'=>'晕'),
		50=>array('imagename'=>'d_zhuakuang.png','desc'=>'抓狂'),
		51=>array('imagename'=>'d_nanhaier.png','desc'=>'男孩儿'),
		52=>array('imagename'=>'d_nvhaier.png','desc'=>'女孩儿'),
		53=>array('imagename'=>'d_zhutou.png','desc'=>'猪头'),
		54=>array('imagename'=>'d_tuzi.png','desc'=>'兔子'),
		55=>array('imagename'=>'d_doge.png','desc'=>'狗'),
		56=>array('imagename'=>'d_feizao.png','desc'=>'肥皂'),
		57=>array('imagename'=>'h_del.png','desc'=>'删除')
);
