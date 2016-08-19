/*
 * 表情处理
 */

var smilies_array = new Array();
//smilies_array[1] = [['1', ':smile:', 'smile.gif', '28', '28', '28','微笑'], ['2', ':sad:', 'sad.gif', '28', '28', '28','难过'], ['3', ':biggrin:', 'biggrin.gif', '28', '28', '28','呲牙'], ['4', ':cry:', 'cry.gif', '28', '28', '28','大哭'], ['5', ':huffy:', 'huffy.gif', '28', '28', '28','发怒'], ['6', ':shocked:', 'shocked.gif', '28', '28', '28','惊讶'], ['7', ':tongue:', 'tongue.gif', '28', '28', '28','调皮'], ['8', ':shy:', 'shy.gif', '28', '28', '28','害羞'], ['9', ':titter:', 'titter.gif', '28', '28', '28','偷笑'], ['10', ':sweat:', 'sweat.gif', '28', '28', '28','流汗'], ['11', ':mad:', 'mad.gif', '28', '28', '28','抓狂'], ['12', ':lol:', 'lol.gif', '28', '28', '28','阴险'], ['13', ':loveliness:', 'loveliness.gif', '28', '28', '28','可爱'], ['14', ':funk:', 'funk.gif', '28', '28', '28','惊恐'], ['15', ':curse:', 'curse.gif', '28', '28', '28','咒骂'], ['16', ':dizzy:', 'dizzy.gif', '28', '28', '28','晕'], ['17', ':shutup:', 'shutup.gif', '28', '28', '28','闭嘴'], ['18', ':sleepy:', 'sleepy.gif', '28', '28', '28','睡'], ['19', ':hug:', 'hug.gif', '28', '28', '28','拥抱'], ['20', ':victory:', 'victory.gif', '28', '28', '28','胜利'], ['21', ':sun:', 'sun.gif', '28', '28', '28','太阳'],['22', ':moon:', 'moon.gif', '28', '28', '28','月亮'], ['23', ':kiss:', 'kiss.gif', '28', '28', '28','示爱'], ['24', ':handshake:', 'handshake.gif', '28', '28', '28','握手']];
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
(function($) {
    $.fn.smilies = function(options) {
        var settings = $.extend({}, {smilies_id: '_message'}, options);
        settings.smilies_div = "#"+settings.smilies_id+"_smilies_div";
        $(document).click(function(){
            $(settings.smilies_div).html(''); 
            $(settings.smilies_div).hide();
        });
        $(this).after('<div id="'+settings.smilies_id+'_smilies_div" class="smilies-module"></div>');
        $(settings.smilies_div).position({
            of: $("body"),
            at: "left bottom",
            offset: "10 10"
        });
        
        $(this).live('click',function(){
            //光标处插入代码功能
            smiliesshowdiv(this);        
            return false;
        });
        //显示和隐藏表情模块
        function smiliesshowdiv(btnobj){
            if($(settings.smilies_div).css("display")=='none'){
                if($(settings.smilies_div).html() == ''){
                    smilies_show( 8, 'e_'+settings.smilies_id+'_');
                }
                $(settings.smilies_div).show();
                smiliesposition(btnobj);
            }else{
                $(settings.smilies_div).hide();
            }
        }
        //弹出层位置控制
        function smiliesposition(btnobj){
            $(settings.smilies_div).position({
                of: btnobj,
                at: "left bottom",
                offset: "110 57"
            });
        }
        function smilies_show(smcols, seditorkey) {
            if(seditorkey && !$("#"+seditorkey + 'sml_menu')[0]) {
                var div = document.createElement("div");
                div.id = seditorkey + 'sml_menu';
                div.className = 'sllt';
                $(settings.smilies_div).append(div);
                div = document.createElement("div");
                div.id = ''+settings.smilies_id+'_smilies_content';
                    div.style.overflow = 'hidden';
                $("#"+seditorkey + 'sml_menu').append(div);
            }
            smilies_onload(smcols, seditorkey);
            //image绑定操作函数
            $('#'+settings.smilies_id+'_smilies_content').find("td").bind('click',function(){
                insertsmilie(this);
            });
        }

        function insertsmilie(smilieone){
            var code = $(smilieone).attr('codetext');
            insertAtCaret(code);
            $('#'+settings.smilies_id).focus();
            $(settings.smilies_div).html('');
            $(settings.smilies_div).hide();
        }

        function insertAtCaret(textFeildValue){  
            var textObj = $('#'+settings.smilies_id).get(0);  
            if(document.all && textObj.createTextRange && textObj.caretPos){  
                var caretPos=textObj.caretPos;  
                caretPos.text = caretPos.text.charAt(caretPos.text.length-1) == '' ?  
                    textFeildValue+'' : textFeildValue;  
            }  
            else if(textObj.setSelectionRange){  
                var rangeStart=textObj.selectionStart;  
                var rangeEnd=textObj.selectionEnd;  
                var tempStr1=textObj.value.substring(0,rangeStart);  
                var tempStr2=textObj.value.substring(rangeEnd);  
                textObj.value=tempStr1+textFeildValue+tempStr2;  
                textObj.focus();  
                var len=textFeildValue.length;  
                textObj.setSelectionRange(rangeStart+len,rangeStart+len);  
                textObj.blur();  
            }  
            else {  
                textObj.value+=textFeildValue;  
            }  
        }  

        function smilies_onload(smcols, seditorkey) {
            seditorkey = !seditorkey ? '' : seditorkey;
            $('#'+settings.smilies_id+'_smilies_content').html('<div id="'+settings.smilies_id+'_smilies_content_data"></div><div class="sllt-p" id="'+settings.smilies_id+'_smilies_content_page"></div>');
            smilies_switch(smcols, seditorkey);
        }

        function smilies_switch(smcols, seditorkey) {
            var page = 1;
            if(!smilies_array || !smilies_array[page]) return;
            smiliesdata = '<table id="'+settings.smilies_id+'_smilies_content_table" cellpadding="0" cellspacing="0"><tr>';
            j = k = 0;
            img = [];
            for(i in smilies_array[page]) {
                if(j >= smcols) {
                    smiliesdata += '<tr>';
                    j = 0;
                }
                var s = smilies_array[page][i];
                smilieimg = RESOURCE_SITE_URL + '/js/smilies/images/' + s[2];
                img[k] = new Image();
                img[k].src = smilieimg;
                smiliesdata += s && s[0] ? '<td id="' + seditorkey + 'smilie_' + s[0] + '_td" codetext="'+s[1]+'"><img id="'+seditorkey+'smilie_' + s[0] + '" width="' + s[3] +'" height="' + s[4] +'" src="' + smilieimg + '" alt="' + s[1] + '" title="'+s[6]+'" />' : '<td>';
                j++; k++;
            }
            smiliesdata += '</table>';
            $('#'+settings.smilies_id+'_smilies_content_data').html(smiliesdata);
        }

    }
})(jQuery);
