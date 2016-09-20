<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['article_index_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=article&op=article"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="article_form" method="post" name="articleForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
      	<tr class="noborder">
          <td colspan="2" class="required"><label class="validation">操作类型:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<select name = "jpush_operation">
          		<option value="">请选择...</option>
          		<option value="keyword">关键字</option>
          		<option value="goods">平台货号</option>
          		<option value="special">专题编号</option>
          		<option value="article">文章编号</option>
          		<option value="lotnumber">抽签</option>
          	</select>
          </td>
          <td class="vatop rowform">
          	<input type="text" value="" name="jpush_operation_value" id="jpush_operation_value" class="txt">
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation">推送内容:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="jpush_content" id="jpush_content" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>是否立即推送:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="article_show1" class="cb-enable selected" ><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="article_show0" class="cb-disable" ><span><?php echo $lang['nc_no'];?></span></label>
            <input id="article_show1" name="jpush_type" checked="checked" value="0" type="radio">
            <input id="article_show0" name="jpush_type" value="1" type="radio">
            <input id="link_date" name="link_date" type="text" value="<?php echo @date('Y-m-d',time());?>" readonly>
            </td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"/>
<script>
//按钮先执行验证再提交表单
$(function(){
	$("#link_date").hide();
	$('#link_date').datepicker({dateFormat: 'yy-mm-dd'});
	$("#submitBtn").click(function(){
    if($("#article_form").valid()){
     $("#article_form").submit();
	}
	});
	$("#article_show0").click(function(){
		$("#link_date").show();
	});
	$("#article_show1").click(function(){
		$("#link_date").hide();
	});
});
//
$(document).ready(function(){
	$('#article_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            article_title : {
                required   : true
            },
			ac_id : {
                required   : true
            },
			article_url : {
				url : true
            },
			article_content : {
                required   : true
            },
            article_sort : {
                number   : true
            }
        },
        messages : {
            article_title : {
                required   : '<?php echo $lang['article_add_title_null'];?>'
            },
			ac_id : {
                required   : '<?php echo $lang['article_add_class_null'];?>'
            },
			article_url : {
				url : '<?php echo $lang['article_add_url_wrong'];?>'
            },
			article_content : {
                required   : '<?php echo $lang['article_add_content_null'];?>'
            },
            article_sort  : {
                number   : '<?php echo $lang['article_add_sort_int'];?>'
            }
        }
    });
    // 图片上传
    $('#fileupload').each(function(){
        $(this).fileupload({
            dataType: 'json',
            url: 'index.php?act=article&op=article_pic_upload',
            done: function (e,data) {
                if(data != 'error'){
                	add_uploadedfile(data.result);
                }
            }
        });
    });
});


function add_uploadedfile(file_data)
{
    var newImg = '<li id="' + file_data.file_id + '" class="picture"><input type="hidden" name="file_id[]" value="' + file_data.file_id + '" /><div class="size-64x64"><span class="thumb"><i></i><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/';?>' + file_data.file_name + '" alt="' + file_data.file_name + '" width="64px" height="64px"/></span></div><p><span><a href="javascript:insert_editor(\'<?php echo UPLOAD_SITE_URL.'/'.ATTACH_ARTICLE.'/';?>' + file_data.file_name + '\');"><?php echo $lang['article_add_insert'];?></a></span><span><a href="javascript:del_file_upload(' + file_data.file_id + ');"><?php echo $lang['nc_del'];?></a></span></p></li>';
    $('#thumbnails').prepend(newImg);
}
function insert_editor(file_path){
	KE.appendHtml('article_content', '<img src="'+ file_path + '" alt="'+ file_path + '">');
}
function del_file_upload(file_id)
{
    if(!window.confirm('<?php echo $lang['nc_ensure_del'];?>')){
        return;
    }
    $.getJSON('index.php?act=article&op=ajax&branch=del_file_upload&file_id=' + file_id, function(result){
        if(result){
            $('#' + file_id).remove();
        }else{
            alert('<?php echo $lang['article_add_del_fail'];?>');
        }
    });
}


</script>