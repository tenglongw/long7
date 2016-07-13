
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>创智凌云B2B2C多用户商城系统</title>
<script type="text/javascript" src="/data/resource/js/jquery.js"></script>
<script type="text/javascript" src="/data/resource/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="/data/resource/js/admincp.js"></script>
<script type="text/javascript" src="/data/resource/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/data/resource/js/common.js" charset="utf-8"></script>
<link href="/admin/templates/default/css/skin_0.css" rel="stylesheet" type="text/css" id="cssfile2" />
<link href="/data/resource/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<link href="/admin/templates/default/css/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/admin/templates/default/css/font/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<script type="text/javascript" src="/data/resource/js/perfect-scrollbar.min.js"></script>

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
<script type="text/javascript">
$(document).ready(function(){

    //文件上传
    var textButton1="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />";
    $(textButton1).insertBefore("#microshop_logo");
    $("#microshop_logo").change(function(){
        $("#textfield1").val($("#microshop_logo").val());
    });
    var textButton2="<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='' class='type-file-button' />";
    $(textButton2).insertBefore("#microshop_header_pic");
    $("#microshop_header_pic").change(function(){
        $("#textfield2").val($("#microshop_header_pic").val());
    });
    var textButton3="<input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button3' value='' class='type-file-button' />";
    $(textButton3).insertBefore("#microshop_store_banner");
    $("#microshop_store_banner").change(function(){
        $("#textfield3").val($("#microshop_store_banner").val());
    });
    $("input[nc_type='microshop_image']").live("change", function(){
		var src = getFullPath($(this)[0]);
		$(this).parent().prev().find('.low_source').attr('src',src);
		$(this).parent().find('input[class="type-file-text"]').val($(this).val());
	});

    $("#submit").click(function(){
        $("#add_form").submit();
    });

});
</script>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>微商城管理</h3>
      <ul class="tab-base">
                <li><a href="index.php?act=microshop&op=manage" class="current"><span>管理</span></a></li>
              </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post" enctype="multipart/form-data" action="index.php?act=microshop&op=manage_save">
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label for="microshop_isuse">微商城开关：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="isuse_1" class="cb-enable selected" title="开启"><span>开启</span></label>
            <label for="isuse_0" class="cb-disable " title="关闭"><span>关闭</span></label>
            <input type="radio" id="isuse_1" name="microshop_isuse" value="1" checked=checked>
            <input type="radio" id="isuse_0" name="microshop_isuse" value="0" ></td>
          <td class="vatop tips">关闭后微商城前台将无法访问</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="microshop_style">微商城主题：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="default" name="microshop_style" class="txt"></td>
          <td class="vatop tips">设置微商城主题，默认为default</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="class_image">微商城LOGO：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"> <img class="show_image" src="/admin/templates/default/images/preview.png">
            <div class="type-file-preview">
                            <img src="/data/upload/microshop/default_logo_image.png">
                          </div>
            </span> <span class="type-file-box">
            <input name="microshop_logo" type="file" class="type-file-file" id="microshop_logo" size="30" hidefocus="true" nc_type="microshop_image">
            </span></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="class_image">微商城头部图片：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"> <img class="show_image" src="/admin/templates/default/images/preview.png">
            <div class="type-file-preview">
                            <img src="/data/upload/microshop/default_header_pic_image.png">
                          </div>
            </span> <span class="type-file-box">
            <input name="microshop_header_pic" type="file" class="type-file-file" id="microshop_header_pic" size="30" hidefocus="true" nc_type="microshop_image">
            </span></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="microshop_personal_limit">个人秀数量限制：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="50" name="microshop_personal_limit" class="txt"></td>
          <td class="vatop tips">会员发布个人秀的数量限制，0为不限制</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>淘宝接口开关：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="isuse_1" class="cb-enable " title="开启"><span>开启</span></label>
            <label for="isuse_0" class="cb-disable selected" title="关闭"><span>关闭</span></label>
            <input type="radio" id="isuse_1" name="taobao_api_isuse" value="1" >
            <input type="radio" id="isuse_0" name="taobao_api_isuse" value="0" checked=checked></td>
          <td class="vatop tips">开启并填写正确的接口参数后，发布个人秀时购买链接支持淘宝和天猫</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="taobao_app_key">淘宝应用标识(APP KEY)：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="taobao_app_key" class="txt"></td>
          <td class="vatop tips"><a style="color:#ffffff; font-weight:bold;" target="_blank" href="http://open.taobao.com">立即在线申请</a></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="taobao_secret_key">淘宝应用密钥(APP SECRET)：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="taobao_secret_key" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
            <td colspan="2" class="required"><label for="microshop_seo_keywords">微商城SEO关键字：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="创智凌云B2B2C多用户商城系统,微商城,随心看,个人秀,店铺街,网上购物" name="microshop_seo_keywords" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="microshop_seo_description">微商城SEO描述：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="创智凌云B2B2C多用户商城系统,微商城,随心看,个人秀,店铺街" name="microshop_seo_description" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>

      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a id="submit" href="javascript:void(0)" class="btn"><span>提交</span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>  <style type="text/css">
<!--
.back_southidc {BACKGROUND-IMAGE:url('image/titlebg.gif');COLOR:000000;}
.table_southidc {BACKGROUND-COLOR: A4B6D7;}
.tit {font-size: 14px;
}
.tr_southidc {BACKGROUND-COLOR: ECF5FF;}
-->
</style>
<div align="center">
  
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
 
</div>
</div>
</body>
</html>
