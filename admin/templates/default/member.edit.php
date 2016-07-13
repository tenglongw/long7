
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

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>会员管理</h3>
      <ul class="tab-base">
        <li><a href="index.php?act=member&op=member" ><span>管理</span></a></li>
        <li><a href="index.php?act=member&op=member_add" ><span>新增</span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span>编辑</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="user_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="member_id" value="1" />
    <input type="hidden" name="old_member_avatar" value="" />
    <input type="hidden" name="member_name" value="admin" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label>会员:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">admin</td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="member_passwd">密码:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" id="member_passwd" name="member_passwd" class="txt"></td>
          <td class="vatop tips">留空表示不修改密码</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_email">电子邮箱:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="38306293@qq.com" id="member_email" name="member_email" class="txt"></td>
          <td class="vatop tips">电子邮箱</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="member_truename">真实姓名:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="member_truename" name="member_truename" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>性别:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><ul>
              <li>
                <input type="radio" checked="checked" value="0" name="member_sex" id="member_sex0">
                <label for="member_sex0">保密</label>
              </li>
              <li>
                <input type="radio"  value="1" name="member_sex" id="member_sex1">
                <label for="member_sex1">男</label>
              </li>
              <li>
                <input type="radio"  value="2" name="member_sex" id="member_sex2">
                <label for="member_sex2">女</label>
              </li>
            </ul></td>
          <td class="vatop tips"></td>
        </tr>
        <!--//zmr>v30-->
         <tr>
          <td colspan="2" class="required"><label class="member_areainfo">所在地区:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"  colspan="2">
        <span id="region" class="w400">
            <input type="hidden" value="14" name="province_id" id="province_id">
            <input type="hidden" value="219" name="city_id" id="city_id">
            <input type="hidden" value="2475" name="area_id" id="area_id" class="area_ids" />
            <input type="hidden" value="广东省	广州市	天河区" name="area_info" id="area_info" class="area_names" />
                        <span>广东省	广州市	天河区</span>
            <input type="button" value="编辑" style="background-color: #F5F5F5; width: 60px; height: 32px; border: solid 1px #E7E7E7; cursor: pointer" class="edit_region" />
            <select style="display:none;">
            </select>
            </span>
        </td>
         
        </tr>
        
        
          <tr>
          <td colspan="2" class="required"><label class="member_mobile">手机号码:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="13527894748" id="member_mobile" name="member_mobile" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        
        <tr>
          <td colspan="2" class="required"><label class="member_qq">QQ:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="member_qq" name="member_qq" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="member_ww">阿里旺旺:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="member_ww" name="member_ww" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>头像:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
			<span class="type-file-show">
			<img class="show_image" src="/admin/templates/default/images/preview.png">
			<div class="type-file-preview" style="display: none;"><img src="/data/upload/shop/avatar/" id="view_img"></div>
			</span>
            <span class="type-file-box">
              <input type='text' name='member_avatar' id='member_avatar' class='type-file-text' />
              <input type='button' name='button' id='button' value='' class='type-file-button' />
              <input name="_pic" type="file" class="type-file-file" id="_pic" size="30" hidefocus="true" />
            </span>            
          </td>
          <td class="vatop tips">支持格式gif,jpg,jpeg,png</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>举报商品:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="inform_allow1" class="cb-enable selected" ><span>允许</span></label>
            <label for="inform_allow2" class="cb-disable " ><span>禁止</span></label>
            <input id="inform_allow1" name="inform_allow" checked="checked"  value="1" type="radio">
            <input id="inform_allow2" name="inform_allow"  value="2" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>允许购买商品:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="isbuy_1" class="cb-enable selected" ><span>允许</span></label>
            <label for="isbuy_2" class="cb-disable " ><span>禁止</span></label>
            <input id="isbuy_1" name="isbuy" checked="checked"  value="1" type="radio">
            <input id="isbuy_2" name="isbuy"  value="0" type="radio"></td>
          <td class="vatop tips">如果禁止该项则会员不能在前台进行下单操作</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>允许发表言论:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="allowtalk_1" class="cb-enable selected" ><span>允许</span></label>
            <label for="allowtalk_2" class="cb-disable " ><span>禁止</span></label>
            <input id="allowtalk_1" name="allowtalk" checked="checked"  value="1" type="radio">
            <input id="allowtalk_2" name="allowtalk"  value="0" type="radio"></td>
          <td class="vatop tips">如果禁止该项则会员不能发表咨询和发送站内信</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>允许登录:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="memberstate_1" class="cb-enable selected" ><span>允许</span></label>
            <label for="memberstate_2" class="cb-disable " ><span>禁止</span></label>
            <input id="memberstate_1" name="memberstate" checked="checked"  value="1" type="radio">
            <input id="memberstate_2" name="memberstate"  value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
        
        
        
        <!--zmr>v30-->
          <tr>
          <td colspan="2" class="required"><label>手机号码验证:</label></td>
        </tr>
         <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="membermobilebind_1" class="cb-enable selected" ><span>已验证</span></label>
            <label for="membermobilebind_2" class="cb-disable " ><span>未验证</span></label>
            <input id="membermobilebind_1" name="membermobilebind" checked="checked"  value="1" type="radio">
            <input id="membermobilebind_2" name="membermobilebind"  value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
        
        
        
        
        
         <!--zmr>v30-->
          <tr>
          <td colspan="2" class="required"><label>邮箱验证:</label></td>
        </tr>
         <tr class="noborder">
          <td class="vatop rowform onoff">
          	<label for="memberemailbind_1" class="cb-enable " ><span>已验证</span></label>
            <label for="memberemailbind_2" class="cb-disable selected" ><span>未验证</span></label>
            <input id="memberemailbind_1" name="memberemailbind"   value="1" type="radio">
            <input id="memberemailbind_2" name="memberemailbind" checked="checked" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
        
        
        
        
        
        
        <tr>
          <td colspan="2" class="required"><label>积分:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">积分&nbsp;<strong class="red">60</strong>&nbsp;</td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>经验值:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">经验值&nbsp;<strong class="red">10</strong>&nbsp;</td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>可用预存款:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">可用&nbsp;<strong class="red">0.00</strong>&nbsp;元</td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>冻结预存款:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">冻结&nbsp;<strong class="red">0.00</strong>&nbsp;元</td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span>提交</span></a></td>
        </tr>
      </tfoot>
    </table>
  <style type="text/css">
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
  </form>
</div>
<script type="text/javascript" src="/data/resource/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<script type="text/javascript" src="/data/resource/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="/data/resource/js/ajaxfileupload/ajaxfileupload.js"></script>
<script type="text/javascript" src="/data/resource/js/jquery.Jcrop/jquery.Jcrop.js"></script>
<link href="/data/resource/js/jquery.Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript" src="/data/resource/js/common_select.js" charset="utf-8"></script> 
<script type="text/javascript">
//裁剪图片后返回接收函数
function call_back(picname){
	$('#member_avatar').val(picname);
	$('#view_img').attr('src','/data/upload/shop/avatar/'+picname+'?'+Math.random());
}
$(function(){
	//zmr>v30
	regionInit("region");
	$('input[class="type-file-file"]').change(uploadChange);
	function uploadChange(){
		var filepatd=$(this).val();
		var extStart=filepatd.lastIndexOf(".");
		var ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();		
		if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
			alert("file type error");
			$(this).attr('value','');
			return false;
		}
		if ($(this).val() == '') return false;
		ajaxFileUpload();
	}
	function ajaxFileUpload()
	{
		$.ajaxFileUpload
		(
			{
				url:'index.php?act=common&op=pic_upload&form_submit=ok&uploadpath=shop/avatar',
				secureuri:false,
				fileElementId:'_pic',
				dataType: 'json',
				success: function (data, status)
				{
					if (data.status == 1){
						ajax_form('cutpic','裁剪','index.php?act=common&op=pic_cut&type=member&x=120&y=120&resize=1&ratio=1&filename=/data/upload/shop/avatar/avatar_1.jpg&url='+data.url,690);
					}else{
						alert(data.msg);
					}
					$('input[class="type-file-file"]').bind('change',uploadChange);
				},
				error: function (data, status, e)
				{
					alert('上传失败');$('input[class="type-file-file"]').bind('change',uploadChange);
				}
			}
		)
	};
$("#submitBtn").click(function(){
    if($("#user_form").valid()){
     $("#user_form").submit();
	}
	});
    $('#user_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            member_passwd: {
                maxlength: 20,
                minlength: 6
            },
            member_email   : {
                required : true,
                email : true,
				remote   : {
                    url :'index.php?act=member&op=ajax&branch=check_email',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#member_email').val();
                        },
                        member_id : '1'
                    }
                }
            }
        },
        messages : {
            member_passwd : {
                maxlength: '密码长度应在6-20个字符之间',
                minlength: '密码长度应在6-20个字符之间'
            },
            member_email  : {
                required : '电子邮箱不能为空',
                email   : '请您填写有效的电子邮箱',
				remote : '邮件地址有重复，请您换一个'
            }
        }
    });
});
</script> 
</body>
</html>
