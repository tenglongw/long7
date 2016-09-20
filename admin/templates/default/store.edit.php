
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>创智凌云B2B2C多用户商城系统</title>
<script type="text/javascript" src="/long7/data/resource/js/jquery.js"></script>
<script type="text/javascript" src="/long7/data/resource/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="/long7/data/resource/js/admincp.js"></script>
<script type="text/javascript" src="/long7/data/resource/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/long7/data/resource/js/common.js" charset="utf-8"></script>
<link href="/long7/admin/templates/default/css/skin_0.css" rel="stylesheet" type="text/css" id="cssfile2" />
<link href="/long7/data/resource/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<link href="/long7/admin/templates/default/css/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/admin/templates/default/css/font/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<script type="text/javascript" src="/long7/data/resource/js/perfect-scrollbar.min.js"></script>

<script type="text/javascript">
SITEURL = '/shop';
RESOURCE_SITE_URL = '/data/resource';
MICROSHOP_SITE_URL = '/microshop';
CIRCLE_SITE_URL = '/circle';
ADMIN_TEMPLATES_URL = '/admin/templates/default';
LOADING_IMAGE = "/admin/templates/default/images/loading.gif";
//换肤
cookie_skin = $.cookie("MyCssSkin");
if (cookie_skin) {
	$('#cssfile2').attr("href","/admin/templates/default/css/"+ cookie_skin +".css");
}
</script>
</head>
<body>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<style type="text/css">
.d_inline {
      display:inline;
}
</style>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>店铺</h3>
      <ul class="tab-base">
        <li><a href="index.php?act=store&op=store"><span>管理</span></a></li>
        <li><a href="index.php?act=store&op=store_joinin"><span>开店申请</span></a></li>
        <!-- <li><a href="index.php?act=store&op=reopen_list" ><span>续签申请</span></a></li> -->
        <li><a href="index.php?act=store&op=store_bind_class_applay_list" ><span>经营类目申请</span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span>编辑</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <div class="homepage-focus" nctype="editStoreContent">
    <ul class="tab-menu">
      <li class="current">店铺信息</li>
     <!-- <li>注册信息</li> --> 
    </ul>
    <form id="store_form" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="store_id" value="<?php echo $output['store_array']['store_id']?>" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label>店主账号:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['store_array']['seller_name']?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="store_name">店铺名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['store_array']['store_name']?>" id="store_name" name="store_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
       <!-- //zmr>v95-->
        
        <!--  <tr>
          <td colspan="2" class="required"><label class="validation" for="store_company_name">公司名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="北京创智凌云信息科技有限公司" id="store_company_name" name="store_company_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
         -->
        
        
         <tr>
          <td colspan="3" class="required"><label class="validation" for="store_name">店铺所在地区:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          
          <span id="region" class="w400">
          
            <input type="hidden" value="289" name="province_id" id="province_id" class="area_ids" />
            <input type="hidden" value="<?php echo $output['store_array']['area_info']?>" name="area_info" id="area_info" class="area_names" />
                        <span><?php echo $output['store_array']['area_info']?></span>
                        </span>
            </td>
          
        </tr>
        
         <tr>
          <td colspan="2" class="required"><label class="validation" for="store_address">店铺详细地址:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input style="width:700px" type="text" value="<?php echo $output['store_array']['store_address']?>" id="store_address" name="store_address" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
        <tr>
          <td colspan="2" class="required"><label for="store_name">开店时间:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo  date('Y-m-d H:i',$output['store_array']['store_time'])?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>所属分类:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <select name="sc_id">
             <option value="0">请选择...</option>
          	<?php foreach ($output['class_list'] as $key=>$val){?>
            	<option  value="<?php echo $val['sc_id']?>" <?php if($val['sc_id'] == $output['store_array']['sc_id']){?>selected<?php }?>><?php echo $val['sc_name']?></option>
          	<?php }?>
           </select></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td colspan="2" class="required"><label>
            <label for="grade_id"> 所属等级: </label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <select id="grade_id" name="grade_id">
             <option value="0">请选择...</option>
          	<?php foreach ($output['grade_list'] as $key=>$val){?>
            	<option  value="<?php echo $val['sg_id']?>" <?php if($val['sg_id'] == $output['store_array']['grade_id']){?>selected<?php }?>><?php echo $val['sg_name']?></option>
          	<?php }?>
           </select></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required">有效期至:</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="end_time" name="end_time" class="txt date"></td>
          <td class="vatop tips"></td>
        </tr>
        
        
        <tr>
          <td colspan="2" class="required">店铺横坐标:</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['store_array']['store_x']?>" id="store_x" name="store_x" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
        <tr>
          <td colspan="2" class="required">店铺纵坐标:</td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['store_array']['store_y']?>" id="store_y" name="store_y" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
<!--店铺保障开-by mall.wrtx.cn-->
<td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="store_tq">店铺保障服务开关:</label></td>
        </tr>
        <tr>
			<td width="70%">
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_baozh1" class="cb-enable selected" ><span>保障</span></label>
					<label for="store_baozh0" class="cb-disable " ><span>图标</span></label>
					<input id="store_baozh1" name="store_baozh" checked="checked" value="1" type="radio">
					<input id="store_baozh0" name="store_baozh"  value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_baozhopen1" class="cb-enable selected" ><span>保证金</span></label>
					<label for="store_baozhopen0" class="cb-disable " ><span>图标</span></label>
					<input id="store_baozhopen1" name="store_baozhopen" checked="checked" value="1" type="radio">
					<input id="store_baozhopen0" name="store_baozhopen"  value="0" type="radio">
					<!--保证金-->
					&nbsp;<input type="text" value="20000" id="store_tq" name="store_baozhrmb" class="txt"  style="width: 50px;color:red;font-weight:900;">元
				</div>
			</td>
		</tr>

        <tr>
          <td colspan="2" class="required"><label for="store_tq">保障内容开关:</label></td>
        </tr>		
		<tr>
			<td width="70%">
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_zhping1" class="cb-enable selected" ><span>正品</span></label>
					<label for="store_zhping0" class="cb-disable " ><span>保障</span></label>
					<input id="store_zhping1" name="store_zhping" checked="checked" value="1" type="radio">
					<input id="store_zhping0" name="store_zhping"  value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_shiti1" class="cb-enable selected" ><span>实体</span></label>
					<label for="store_shiti0" class="cb-disable " ><span>店铺</span></label>
					<input id="store_shiti1" name="store_shiti" checked="checked" value="1" type="radio">
					<input id="store_shiti0" name="store_shiti"  value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_qtian1" class="cb-enable selected" ><span>七天</span></label>
					<label for="store_qtian0" class="cb-disable " ><span>退换</span></label>
					<input id="store_qtian1" name="store_qtian" checked="checked" value="1" type="radio">
					<input id="store_qtian0" name="store_qtian"  value="0" type="radio">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_tuihuo1" class="cb-enable selected" ><span>退换</span></label>
					<label for="store_tuihuo0" class="cb-disable " ><span>承诺</span></label>
					<input id="store_tuihuo1" name="store_tuihuo" checked="checked" value="1" type="radio">
					<input id="store_tuihuo0" name="store_tuihuo"  value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_shiyong1" class="cb-enable selected" ><span>试用</span></label>
					<label for="store_shiyong0" class="cb-disable " ><span>中心</span></label>
					<input id="store_shiyong1" name="store_shiyong" checked="checked" value="1" type="radio">
					<input id="store_shiyong0" name="store_shiyong"  value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_erxiaoshi1" class="cb-enable selected" ><span>2H</span></label>
					<label for="store_erxiaoshi0" class="cb-disable " ><span>发货</span></label>
					<input id="store_erxiaoshi1" name="store_erxiaoshi" checked="checked" value="1" type="radio">
					<input id="store_erxiaoshi0" name="store_erxiaoshi"  value="0" type="radio">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_huodaofk1" class="cb-enable selected" ><span>货到</span></label>
					<label for="store_huodaofk0" class="cb-disable " ><span>付款</span></label>
					<input id="store_huodaofk1" name="store_huodaofk" checked="checked" value="1" type="radio">
					<input id="store_huodaofk0" name="store_huodaofk"  value="0" type="radio">
				</div>
				<div class="onoff" style="float:left;margin-right:10px;">
					<label for="store_xiaoxie1" class="cb-enable selected" ><span>消费者</span></label>
					<label for="store_xiaoxie0" class="cb-disable " ><span>保障</span></label>
					<input id="store_xiaoxie1" name="store_xiaoxie" checked="checked" value="1" type="radio">
					<input id="store_xiaoxie0" name="store_xiaoxie"  value="0" type="radio">
				</div>
			</td>
		</tr>
<!--店铺保障- by mall.wrtx.cn -->	
        <tr>
          <td colspan="2" class="required"><label>
            <label for="state">状态:</label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="store_state1" class="cb-enable selected" ><span>开启</span></label>
            <label for="store_state0" class="cb-disable " ><span>关闭</span></label>
            <input id="store_state1" name="store_state" checked="checked" onclick="$('#tr_store_close_info').hide();" value="1" type="radio">
            <input id="store_state0" name="store_state"  onclick="$('#tr_store_close_info').show();" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody id="tr_store_close_info">
        <tr >
          <td colspan="2" class="required"><label for="store_close_info">关闭原因:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="store_close_info" rows="6" class="tarea" id="store_close_info"></textarea></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span>提交</span></a></td>
        </tr>
      </tfoot>
    </table>
    </form>
  <form id="joinin_form" enctype="multipart/form-data" method="post" action="index.php?act=store&op=edit_save_joinin" style="display:none;">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="member_id" value="1" />
    <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="20">公司及联系人信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">公司名称：</th>
        <td colspan="20"><input type="text" class="txt" name="company_name" value=""></td>
      </tr>
      <tr>
        <th>公司所在地：</th>
        <td colspan="20">
          <input type="hidden" name="company_address" id="company_address" value="">
        </td>
      </tr>
      <tr>
        <th>公司详细地址：</th>
        <td colspan="20"><input type="text" class="txt w300" name="company_address_detail" value=""></td>
      </tr>
      <tr>
        <th>公司电话：</th>
        <td><input type="text" class="txt" name="company_phone" value=""></td>
        <th>员工总数：</th>
        <td><input type="text" class="txt w72" name="company_employee_count" value="">&nbsp;人</td>
        <th>注册资金：</th>
        <td><input type="text" class="txt w72" name="company_registered_capital" value="">&nbsp;万元 </td>
      </tr>
      <tr>
        <th>联系人姓名：</th>
        <td><input type="text" class="txt" name="contacts_name" value=""></td>
        <th>联系人电话：</th>
        <td><input type="text" class="txt" name="contacts_phone" value=""></td>
        <th>电子邮箱：</th>
        <td><input type="text" class="txt" name="contacts_email" value=""></td>
      </tr>
    </tbody>
  </table>
  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="20">营业执照信息（副本）</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">营业执照号：</th>
        <td><input type="text" class="txt" name="business_licence_number" value=""></td></tr><tr>
      
        <th>营业执照所在地：</th>
        <td><input type="hidden" name="business_licence_address" id="business_licence_address" value=""></td></tr><tr>
      
        <th>营业执照有效期：</th>
        <td><input type="text" class="txt" name="business_licence_start" id="business_licence_start" value=""> - <input type="text" class="txt" name="business_licence_end" id="business_licence_end" value=""></td>
      </tr>
      <tr>
        <th>法定经营范围：</th>
        <td colspan="20"><input type="text" class="txt w300" name="business_sphere" value=""></td>
      </tr>
      <tr>
        <th>营业执照<br />
电子版：</th>
        <td colspan="20">
          <a nctype="nyroModal"  href="/long7/data/upload/shop/store_joinin/"> <img src="/long7/data/upload/shop/store_joinin/" alt="" /> </a>
          <input class="w200" type="file" name="business_licence_number_electronic">
        </td>
      </tr>
    </tbody>
  </table>
  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="20">组织机构代码证</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>组织机构代码：</th>
        <td colspan="20"><input type="text" class="txt w300" name="organization_code" value=""></td>
      </tr>
      <tr>
        <th>组织机构代码证<br/>          电子版：</th>
        <td colspan="20">
          <a nctype="nyroModal"  href="/data/upload/shop/store_joinin/"> <img src="/data/upload/shop/store_joinin/" alt="" /> </a>
          <input type="file" name="organization_code_electronic">
        </td>
      </tr>
    </tbody>
  </table>
  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="20">一般纳税人证明：</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>一般纳税人证明：</th>
        <td colspan="20">
          <a nctype="nyroModal" href="/data/upload/shop/store_joinin/"> <img src="/data/upload/shop/store_joinin/" alt="" /> </a>
          <input type="file" name="general_taxpayer">
        </td>
      </tr>
    </tbody>
  </table>
  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="20">开户银行信息：</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">银行开户名：</th>
        <td><input type="text" class="txt w300" name="bank_account_name" value=""></td>
      </tr><tr>
        <th>公司银行账号：</th>
        <td><input type="text" class="txt w300" name="bank_account_number" value=""></td></tr>
      <tr>
        <th>开户银行支行名称：</th>
        <td><input type="text" class="txt w300" name="bank_name" value=""></td>
      </tr>
      <tr>
        <th>支行联行号：</th>
        <td><input type="text" class="txt w300" name="bank_code" value=""></td>
      </tr><tr>
        <th>开户银行所在地：</th>
        <td colspan="20"><input type="hidden" name="bank_address" id="bank_address" value=""></td>
      </tr>
      <tr>
        <th>开户银行许可证<br/>电子版：</th>
        <td colspan="20">
          <a nctype="nyroModal"  href="/data/upload/shop/store_joinin/"> <img src="/data/upload/shop/store_joinin/" alt="" /> </a>
          <input type="file" name="bank_licence_electronic">
        </td>
      </tr>
    </tbody>
    
  </table>
  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="20">结算账号信息：</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">银行开户名：</th>
        <td><input type="text" class="txt w300" name="settlement_bank_account_name" value=""></td>
      </tr>
      <tr>
        <th>公司银行账号：</th>
        <td><input type="text" class="txt w300" name="settlement_bank_account_number" value=""></td>
      </tr>
      <tr>
        <th>开户银行支行名称：</th>
        <td><input type="text" class="txt w300" name="settlement_bank_name" value=""></td>
      </tr>
      <tr>
        <th>支行联行号：</th>
        <td><input type="text" class="txt w300" name="settlement_bank_code" value=""></td>
      </tr>
      <tr>
        <th>开户银行所在地：</th>
        <td><input type="hidden" name="settlement_bank_address" id="settlement_bank_address" value=""></td>
      </tr>
    </tbody>
    
  </table>
  <table border="0" cellpadding="0" cellspacing="0" class="store-joinin">
    <thead>
      <tr>
        <th colspan="20">税务登记证</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="w150">税务登记证号：</th>
        <td><input type="text" class="txt w300" name="tax_registration_certificate" value=""></td>
      </tr>
      <tr>
        <th>纳税人识别号：</th>
        <td><input type="text" class="txt w300" name="taxpayer_id" value=""></td>
      </tr>
      <tr>
        <th>税务登记证号<br />
电子版：</th>
        <td>
          <a nctype="nyroModal"  href="/long7/data/upload/shop/store_joinin/"> <img src="/long7/data/upload/shop/store_joinin/" alt="" /> </a>
          <input type="file" name="tax_registration_certificate_electronic">
        </td>
      </tr>
    </tbody>
  </table>
  <div><a id="btn_fail" class="btn" href="JavaScript:void(0);"><span>提交</span></a></div>
</form>
</div>
</div>
<script type="text/javascript" src="/long7/data/resource/js/common_select.js" charset="utf-8"></script>
<script type="text/javascript" src="/long7/data/resource/js/jquery-ui/jquery.ui.js"></script>
<script src="/long7/data/resource/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="/long7/data/resource/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script type="text/javascript" src="/long7/data/resource/js/jquery.nyroModal/custom.min.js" charset="utf-8"></script>
<link href="/long7/data/resource/js/jquery.nyroModal/styles/nyroModal.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript">
var SHOP_SITE_URL = '/shop';
$(function(){
	//zmr>>>
	regionInit("region");
	//zmr<<<
	
    $("#company_address").nc_region();
    $("#business_licence_address").nc_region();
    $("#bank_address").nc_region();
    $("#settlement_bank_address").nc_region();
    $('#end_time').datepicker();
    $('#business_licence_start').datepicker();
    $('#business_licence_end').datepicker();
    $('a[nctype="nyroModal"]').nyroModal();
    $('input[name=store_state][value=1]').trigger('click');

    //按钮先执行验证再提交表单
    $("#submitBtn").click(function(){
        if($("#store_form").valid()){
            $("#store_form").submit();
        }
    });

    $("#btn_fail").click(function(){
        $("#joinin_form").submit();
    });

    $('#store_form').validate({
        errorPlacement: function(error, element){
            error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },
		ignore:"#end_time",
        rules : {
             store_name: {
                 required : true,
                 remote : '/long7/admin/index.php?act=store&op=ckeck_store_name'
              }
        },
        messages : {
            store_name: {
                required: '请输入店铺名称',
                remote : '店铺名称已存在'
            }
        }
    });

    $('div[nctype="editStoreContent"] > ul').find('li').click(function(){
        $(this).addClass('current').siblings().removeClass('current');
        var _index = $(this).index();
        var _form = $('div[nctype="editStoreContent"]').find('form');
        _form.hide();
        _form.eq(_index).show();
    });
});
</script>  <style type="text/css">
<!--
.back_southidc {BACKGROUND-IMAGE:url('image/titlebg.gif');COLOR:000000;}
.table_southidc {BACKGROUND-COLOR: A4B6D7;}
.tit {font-size: 14px;
}
.tr_southidc {BACKGROUND-COLOR: ECF5FF;}
-->
</style>
<div align="center">
  <!-- 
  <table width="816" border="0" align="center" cellpadding="2" cellspacing="1" class="table_southidc">
    <tr>
      <td height="25" colspan="2" class="back_southidc"><div align="center"><span style="font-weight: bold">免费版不能保存！需要请联系注册正式版！</span></div></td>
    </tr>
    <tr class="tr_southidc">
    
        <td width="650"><div align="left"><span class="tit"><span class="style6">欢迎注册《创智凌云B2B2C多用户商城网站系统 V2030》每套5800元<br>
          
          联系QQ：<span class="style11">38306293<a target=blank href=tencent://message/?uin=38306293&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/qq_online.gif alt="创智凌云客服为你服务"></a>417586492</span><FONT face=Verdana><a target=blank href=tencent://message/?uin=417586492&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/qq_online.gif alt="创智凌云客服为你服务"></a></FONT><span class="style11">657248708</span><FONT face=Verdana><FONT face=Verdana><a target=blank href=tencent://message/?uin=657248708&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/qq_online.gif alt="创智凌云客服为你服务"></a></FONT><br>
          </FONT><span class="style11">电话：020-34506590,34700400,34709708 34700400,13527894748<br>
          此版演示：<a href="http://b2b2c.wrtx.cn">http://b2b2c.wrtx.cn</a><br>
          </span></span></span>
        官方网址: <a href="http://www.wrzc.net">http://www.wrzc.net </a><br>
        <br>
        </div></td>
        <td width="127"><div align="center"></div></td>
   
    </tr>
  </table>
  -->
</div></body>
</html>
