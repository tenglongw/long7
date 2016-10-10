<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="page">
  <form id="admin_form" enctype="multipart/form-data" method="post" method="post" action='index.php?act=index&op=modifyimg' name="adminForm">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="old_pw"><?php echo $lang['index_modifypw_oldpw']; ?><!-- 原密码 -->:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-box">
            <input type="file" name="link_pic" id="link_pic" class="type-file-file" size="30" >
          </span></td>
          <td class="vatop tips">展示图片，建议大小300px*300px</td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
//按钮先执行验证再提交表单
$(function(){$("#submitBtn").click(function(){
    if($("#admin_form").valid()){
     $("#admin_form").submit();
	}
	});
});
//
$(document).ready(function(){
	$("#admin_form").validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
        	old_pw : {
        		required : true
            },
        	new_pw : {
                required : true,
				minlength: 6,
				maxlength: 20
            },
            new_pw2 : {
                required : true,
				minlength: 6,
				maxlength: 20,
				equalTo: '#new_pw'
            }
        },
        messages : {
        	old_pw : {
        		required : '<?php echo $lang['admin_add_password_null'];?>'
            },
        	new_pw : {
                required : '<?php echo $lang['admin_add_password_null'];?>',
				minlength: '<?php echo $lang['admin_add_password_max'];?>',
				maxlength: '<?php echo $lang['admin_add_password_max'];?>'
            },
            new_pw2 : {
                required : '<?php echo $lang['admin_add_password_null'];?>',
				minlength: '<?php echo $lang['admin_add_password_max'];?>',
				maxlength: '<?php echo $lang['admin_add_password_max'];?>',
				equalTo:   '<?php echo $lang['admin_edit_repeat_error'];?>'
            }
        }
	});
	    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
		$(textButton).insertBefore("#link_pic");
		$("#link_pic").change(function(){
			$("#textfield1").val($("#link_pic").val());
		});
});
</script> 