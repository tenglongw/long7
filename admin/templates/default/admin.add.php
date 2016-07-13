
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

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>权限设置</h3>
      <ul class="tab-base"><li><a href="index.php?act=admin&op=admin" ><span>管理员</span></a></li><li><a  class="current"><span>添加管理员</span></a></li><li><a href="index.php?act=admin&op=gadmin" ><span>权限组</span></a></li><li><a href="index.php?act=admin&op=gadmin_add" ><span>添加权限组</span></a></li></ul>    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="admin_name">登录名:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" id="admin_name" name="admin_name" class="txt"></td>
          <td class="vatop tips">请输入登录名</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="admin_password">密码:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="password" id="admin_password" name="admin_password" class="txt"></td>
          <td class="vatop tips">请输入密码</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="admin_password">确认密码:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="password" id="admin_rpassword" name="admin_rpassword" class="txt"></td>
          <td class="vatop tips">请输入密码</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="gadmin_name">权限组:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <select name="gid">
                    <option value="1">财务管理</option>
                    </select>
          </td>
          <td class="vatop tips">请选择一个权限组，如果还未设置，请马上设置</td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span>提交</span></a></td>
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
<script>
//按钮先执行验证再提交表
$(document).ready(function(){
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#add_form").valid()){
	     $("#add_form").submit();
		}
	});
	
	$("#add_form").validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            admin_name : {
                required : true,
				minlength: 3,
				maxlength: 20,
				remote	: {
                    url :'index.php?act=admin&op=ajax&branch=check_admin_name',
                    type:'get',
                    data:{
                    	admin_name : function(){
                            return $('#admin_name').val();
                        }
                    }
                }
            },
            admin_password : {
                required : true,
				minlength: 6,
				maxlength: 20
            },
            admin_rpassword : {
                required : true,
                equalTo  : '#admin_password'
            },
            gid : {
                required : true
            }        
        },
        messages : {
            admin_name : {
                required : '登录名不能为空',
				minlength: '登录名长度为3-20',
				maxlength: '登录名长度为3-20',
				remote	 : '该名称已存在'
            },
            admin_password : {
                required : '密码不能为空',
				minlength: '密码长度为6-20',
				maxlength: '密码长度为6-20'
            },
            admin_rpassword : {
                required : '密码不能为空',
                equalTo  : '两次输入的密码不一致，请重新输入'
            },
            gid : {
                required : '请选择一个权限组',
            }
        }
	});
});
</script>
</body>
</html>
