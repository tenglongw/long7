<?php defined('InWrzcNet') or exit('Access Invalid!');?>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"/>
<div class="page">
  <form id="link_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_catetory"> <?php echo $lang['link_sell_index_title'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
			<input type="text" name="link_name" id="link_name">
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="link_pic"><?php echo $lang['link_index_pic_sign'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-box">
            <input type="file" name="link_pic" id="link_pic" class="type-file-file" size="30" >
          </span>
            </td>
          <td class="vatop tips">展示图片，建议大小500px*220px</td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="link_date"> <?php echo $lang['link_sell_index_date'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
			<input id="link_date" name="link_date" type="text" class="txt date" value="<?php echo @date('Y-m-d',time());?>" readonly>
          </td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
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
			error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
        success: function(label){
            label.addClass('valid');
        },
        rules : {
            link_category  : {
                required : true,
            },
            link_pic  : {
                required : true,
            }
        },
        messages : {
            link_category  : {
                required : '<?php echo $lang['link_add_category_null'];?>',
            },
            link_pic  : {
                required : '<?php echo $lang['link_add_pic_null'];?>',
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
