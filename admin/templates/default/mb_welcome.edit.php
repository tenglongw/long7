<?php defined('InWrzcNet') or exit('Access Invalid!');?>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"/>
<div class="page">
  <div class="fixed-empty"></div>
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="w_id" value="<?php echo $output['link_array']['w_id'];?>" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
           <td colspan="2" class="required">页面名称</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
 			<input type="text" name="link_name" id="link_name" value="<?php echo $output['link_array']['w_name'];?>">
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for=""><?php echo $lang['link_index_pic_sign'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_MOBILE.'/welcome/'.$output['link_array']['w_image'];?>"></div>
            </span> <span class="type-file-box">
            <input name="link_pic" type="file" class="type-file-file" id="link_pic" size="30">
            </span></td>
          <td class="vatop tips">展示图片，建议大小480px*800px</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['nc_sort'];?>: 
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['link_array']['w_sort']?>" name="link_sort" id="link_sort" class="txt" ></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required">类型: 
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<select id="link_type" name="link_type">
          		<option value="0" <?php if($output['link_array']['w_type']=='0'){?>selected=true<?php }?>>引导页 </option>
          		<option value="1"<?php if($output['link_array']['w_type']=='1'){?>selected=true<?php }?>>欢迎页 </option>
          	</select>
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2"><label for="link_catetory"> 跳转URL:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
			<input type="text" name="link_url" id="link_url" value="<?php echo $output['link_array']['w_url']?>">
          </td>
          <td class="vatop tips"></td>
        </tr>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
$(function(){
	$('#link_date').datepicker({dateFormat: 'yy-mm-dd'});
});
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#link_form").valid()){
     $("#link_form").submit();
	}
	});
});
//
$(document).ready(function(){
	$('#link_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        success: function(label){
            label.addClass('valid');
        },
        rules : {
            link_title : {
                required : true
            },
            link_url  : {
                required : true,
                url      : true
            },
            link_sort : {
                number   : true
            }
        },
        messages : {
            link_title : {
                required : '<?php echo $lang['link_add_title_null'];?>'
            },
            link_url  : {
                required : '<?php echo $lang['link_add_url_null'];?>',
                url      : '<?php echo $lang['link_add_url_wrong'];?>'
            },
            link_sort  : {
                number   : '<?php echo $lang['link_add_sort_int'];?>'
            }
        }
    });
});
</script> 
<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
	$(textButton).insertBefore("#link_pic");
	$("#link_pic").change(function(){
	$("#textfield1").val($("#link_pic").val());
});
});
</script>
