<?php defined('InWrzcNet') or exit('Access Invalid!');?>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"/>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_voucher_price_manage'];?></h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post" action=<?php if($output['ttype']=='coupon'){?>"index.php?act=voucher&op=couponTemplateadd"<?php }else{?>"index.php?act=voucher&op=templateadd"<?php }?>>
    <input type="hidden" id="form_submit" name="form_submit" value="ok"/>
    <table class="table tb-type2">
      <tbody>
      	<!-- <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_storename'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="  txt" value="<?php echo $output['t_info']['voucher_t_storename'];?>"  ></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label>所属店铺分类<?php echo $lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="  txt" value="<?php echo $output['store_class'][$output['t_info']['voucher_t_sc_id']]['sc_name'];?>"  ></td>
          <td class="vatop tips"></td>
        </tr> -->
        <tr class="noborder">
        	<?php if($output['ttype']=='coupon'){?>
        	 <td colspan="2" class="required"><label><?php echo 优惠码.$lang['nc_colon'];?></label></td>
        	<?php }else{?>
	          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_title'].$lang['nc_colon'];?></label></td>
        	<?php }?>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="txt_template_title" class="required txt" value=""  ></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_enddate'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="txt_template_enddate" name="txt_template_enddate" type="text" class="txt date" value="<?php echo @date('Y-m-d',time());?>" readonly></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_price'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <select id="select_template_price" name="select_template_price" class="required">
	          <?php if(!empty($output['pricelist'])) { ?>
	          	<?php foreach($output['pricelist'] as $voucher_price) {?>
	          	<option value="<?php echo $voucher_price['voucher_price'];?>"><?php echo $voucher_price['voucher_price'];?></option>
	          <?php } } ?>
	        </select><em class="add-on"><i class="icon-renminbi"></i></em>
          </td>
          <td class="vatop tips"></td>
        </tr>
        <!-- <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_total'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="  txt" value="<?php echo $output['t_info']['voucher_t_total'];?>"  ></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_eachlimit'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="  txt" value="<?php echo $output['t_info']['voucher_t_eachlimit'];?>"  ></td>
          <td class="vatop tips"></td>
        </tr>-->
        <?php if($output['ttype']=='coupon'){?>
        	<?php }else{?>
	          <tr class="noborder">
		          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_orderpricelimit'].$lang['nc_colon'];?></label></td>
		        </tr>
		        <tr class="noborder">
		          <td class="vatop rowform"><input name="txt_template_limit" id = "txt_template_limit" type="text" class="required  txt" value=""  ></td>
		          <td class="vatop tips"></td>
		        </tr>
        	<?php }?>
       
        <tr class="noborder">
        <?php if($output['ttype']=='coupon'){?>
        	<td colspan="2" class="required"><label><?php echo 优惠码描述.$lang['nc_colon'];?></label></td>
        	<?php }else{?>
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_describe'].$lang['nc_colon'];?></label></td>
        	<?php }?>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea rows="6"  name="txt_template_describe" id = "txt_template_describe" class="required  tarea"><?php echo $output['t_info']['voucher_t_desc'];?></textarea></td>
          <td class="vatop tips"></td>
        </tr>
       <!-- <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_image'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<?php if ($output['t_info']['voucher_t_customimg']){?>
	      		<img onload="javascript:DrawImage(this,160,160);" src="<?php echo $output['t_info']['voucher_t_customimg'];?>"/>
	      	<?php }?>
          </td>
          <td class="vatop tips"></td>
        </tr>
        
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_giveoutnum'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="  txt" value="<?php echo $output['t_info']['voucher_t_giveout'];?>"  ></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_usednum'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="  txt" value="<?php echo $output['t_info']['voucher_t_used'];?>"  ></td>
          <td class="vatop tips"></td>
        </tr>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['admin_voucher_template_points'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="txt" id="points" name="points" value="<?php echo $output['t_info']['voucher_t_points'];?>"></td>
          <td class="vatop tips"></td>
        </tr> -->
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['nc_status'].$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          	<?php foreach ($output['templatestate_arr'] as $k=>$v){?>
          		<input type="radio" value="<?php echo $v[0];?>" id="tstate_<?php echo $v[0];?>" name="tstate" <?php echo $v[0] == $output['t_info']['voucher_t_state']?'checked="checked"':'';?>><?php echo $v[1];?>
          	<?php }?>
          </td>
          <td class="vatop tips"></td>
        </tr>
        	<?php if($output['ttype']=='coupon'){?>
        		<input type="hidden" value="1" id="type" name="type" >
        	<?php }else{?>
        	<input type="hidden" value="0" id="type" name="type">
        	<?php }?>
        <!-- 
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo '是否推荐'.$lang['nc_colon'];?></label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
            <label title="<?php echo $lang['nc_yes'];?>" class="cb-enable <?php if($output['t_info']['voucher_t_recommend'] == '1'){ ?>selected<?php } ?>" for="recommend1"><span><?php echo $lang['nc_yes'];?></span></label>
            <label title="<?php echo $lang['nc_no'];?>" class="cb-disable <?php if($output['t_info']['voucher_t_recommend'] == '0'){ ?>selected<?php } ?>" for="recommend0"><span><?php echo $lang['nc_no'];?></span></label>
            <input type="radio" value="1" <?php if($output['t_info']['voucher_t_recommend'] == '1'){ ?>checked="checked"<?php } ?> name="recommend" id="recommend1">
            <input type="radio" value="0" <?php if($output['t_info']['voucher_t_recommend'] == '0'){ ?>checked="checked"<?php } ?> name="recommend" id="recommend0"></td>
          <td class="vatop tips"></td>
        </tr> -->
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
	$('#txt_template_enddate').datepicker({dateFormat: 'yy-mm-dd'});
});
//按钮先执行验证再提交表单
$(function(){
	$("#submitBtn").click(function(){
		$("#add_form").submit();
	});
	//页面输入内容验证
	$("#add_form").validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
	    },
	    rules : {
	    	points: {
	    		required : true,
	            digits : true
	        }
	    },
	    messages : {
	    	points: {
	    		required : '<?php echo $lang['admin_voucher_template_points_error'];?>',
		    	digits : '<?php echo $lang['admin_voucher_template_points_error'];?>'
	        }
	    }
	});
});
</script> 