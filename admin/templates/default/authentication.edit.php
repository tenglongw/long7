<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>抽签认证管理</h3>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="delivery_form" method="post" action="<?php echo urlAdmin('authentication', 'save_edit');?>">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="did" value="<?php echo $output['dlyp_info']['atct_id'];?>">
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="">用户名：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['dlyp_info']['atct_name'];?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="">手机号：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <?php echo $output['dlyp_info']['atct_phone'];?>
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="">身份证号码：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['dlyp_info']['atct_idcard'];?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="">身份证图片正面：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><a href="<?php echo UPLOAD_SITE_URL.DS.ATTACH_IDCARD.DS.$output['dlyp_info']['atct_idcard_image_front'];?>" target="_blank"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_IDCARD.DS.$output['dlyp_info']['atct_idcard_image_front'];?>"></a></td>
          <td class="vatop tips">点击查看大图</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="">身份证图片背面：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><a href="<?php echo UPLOAD_SITE_URL.DS.ATTACH_IDCARD.DS.$output['dlyp_info']['atct_idcard_image_back'];?>" target="_blank"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_IDCARD.DS.$output['dlyp_info']['atct_idcard_image_back'];?>"></a></td>
          <td class="vatop tips">点击查看大图</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="">申请时间：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo date('Y-m-d H:i:s', $output['dlyp_info']['atct_addtime']);?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="">状态：</label></td>
        </tr>
        <tr class="noborder">
         <td class="vatop rowform onoff"><label for="site_status1" class="cb-enable selected" ><span>通过</span></label>
            <label for="site_status20" class="cb-disable" ><span>失败</span></label>
            <input id="site_status1" name="dstate" checked="checked" value="1" type="radio">
            <input id="site_status20" name="dstate" value="2" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr style="display: none;" nctype="fail_reason">
          <td colspan="2" class="required"><label for="">审核失败原因：</label></td>
        </tr>
        <tr class="noborder" style="display: none;" nctype="fail_reason">
          <td class="vatop rowform" nctype="fail_reason">
            <textarea id="fail_reason" class="tarea" rows="6" name="fail_reason"></textarea>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
$(function(){
    $("#submitBtn").click(function(){
        $("#delivery_form").submit();
    });
    $('input[name="dstate"]').change(function(){
        _val = $('input[name="dstate"]:checked').val();
        if (_val == 2) {
            $('[nctype="fail_reason"]').show();
        } else {
            $('[nctype="fail_reason"]').hide();
        }
    });
});
</script>
