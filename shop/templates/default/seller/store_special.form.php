<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default">
  <form method="post" action="index.php?act=store_special&op=special_save" target="_parent" name="store_special_form" id="store_special_form" enctype="multipart/form-data">
    <input type="hidden" name="ssp_id" value="<?php echo $output['sp_info']['ssp_id'];?>"/>
    <dl>
      <dt><i class="required">*</i><?php echo $lang['store_special_name'].$lang['nc_colon'];?></dt>
      <dd>
        <input type="text" class="w150 text" name="sp_title" value="<?php echo $output['sp_info']['sp_title'];?>" /><span></span>
      </dd>
    </dl>
    <dl>
      <dt><?php echo $lang['store_special_display'].$lang['nc_colon'];?></dt>
      <dd>
        <ul class="ncsc-form-radio-list">
          <li>
            <label for="sp_if_show_0"><input type="radio" class="radio" name="sp_if_show" id="sp_if_show_0" value="1"<?php if($output['sp_info']['sp_if_show'] == '1' || $output['sp_info']['sp_if_show'] == ''){?> checked="checked"<?php }?>/>
            <?php echo $lang['store_payment_yes'];?></label></li>
          <li>
            <label for="sp_if_show_1"><input type="radio" class="radio" name="sp_if_show" id="sp_if_show_1" value="0"<?php if($output['sp_info']['sp_if_show'] == '0'){?> checked="checked"<?php }?>/>
            <?php echo $lang['store_payment_no'];?></label></li>
        </ul>
      </dd>
    </dl>
    <dl>
      <dt><?php echo $lang['store_goods_class_sort'].$lang['nc_colon'];?></dt>
      <dd>
        <input type="text" class="w50 text" name="sp_sort" value="<?php if($output['sp_info']['sp_sort'] != ''){ echo $output['sp_info']['sp_sort'];}else{echo '255';}?>"/>
      </dd>
    </dl>
    <dl>
      <dt><?php echo $lang['store_special_content'].$lang['nc_colon'];?></dt>
      <dd>
        <?php showEditor('sp_content',$output['sp_info']['sp_content'],'600px','300px','','false',$output['editor_multimedia']); ?>
      </dd>
    </dl>
    <dl>
      <dt><?php echo $lang['store_special_url'].$lang['nc_colon']; ?></dt>
      <dd>
        <p>
          <input type="text" class="w300 text" name="sp_url" value="<?php echo $output['sp_info']['sp_url'];?>" />
        </p>
        <p class="hint"><?php echo $lang['store_special_url_tip']; ?></p>
        </td>
    </dl>
    <dl>
      <dt><?php echo $lang['store_special_new_open'].$lang['nc_colon']; ?></dt>
      <dd>
        <ul class="ncsc-form-radio-list">
          <li>
            <label for="sp_new_open_1"><input type="radio" class="radio" name="sp_new_open" id="sp_new_open_1" value="1" <?php if($output['sp_info']['sp_new_open'] == '1' || $output['sp_info']['sp_new_open'] == ''){?> checked="checked"<?php }?>>
            <?php echo $lang['store_special_new_open_yes']; ?></label></li>
          <li>
            <label for="sp_new_open_0"><input type="radio" class="radio" name="sp_new_open" id="sp_new_open_0" value="0" <?php if($output['sp_info']['sp_new_open'] == '0'){?> checked="checked"<?php }?>>
            <?php echo $lang['store_special_new_open_no']; ?></label></li>
        </ul>
      </dd>
    </dl>
    <div class="bottom">
      <label class="submit-border"><input type="submit" class="submit" value="<?php echo $lang['store_goods_class_submit'];?>" /></label>
    </div>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	//页面输入内容验证
	$('#store_special_form').validate({
	        errorPlacement: function(error, element){
	            var error_td = element.parent('dd').children('span');
	            error_td.append(error);
	        },
	     	submitHandler:function(form){
	    		ajaxpost('add_form', '', '', 'onerror')
	    	},
        rules: {
            sp_title: {
                required: true,
                maxlength: 10
            }
        },
        messages: {
            sp_title: {
                required: '<i class="icon-exclamation-sign"></i><?php echo $lang['store_special_name_null'];?>',
                maxlength: '<i class="icon-exclamation-sign"></i><?php echo $lang['store_special_name_max'];?>'
            }
        }
    });
});
</script> 
