
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
      <h3>圈子管理</h3>
      <ul class="tab-base">
        <li><a href="index.php?act=circle_manage&op=circle_list"><span>管理</span></a></li>
        <li><a href="index.php?act=circle_manage&op=circle_verify"><span>待审核</span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span>新增</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="circle_form" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="c_name">圈子名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" name="c_name" id="c_name" class="txt" /></td>
          <td class="vatop tips">圈子名称不能找过8个字符</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="mastername">圈主:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="mastername" id="mastername" readonly="readonly" class="txt" />
            <input type="hidden" name="masterid" id="masterid" />
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="" for="classid">圈子分类:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <select name="classid">
              <option value="0">请选择...</option>
                          </select>
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="c_desc">圈子简介:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <textarea class="tarea" rows="6" name="c_desc" id="c_desc"></textarea>
          </td>
          <td class="vatop tips">圈子简介不能超过240个字符</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="c_tag">圈子标签:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <input type="text" name="c_tag" class="txt" />
          </td>
          <td class="vatop tips">最多可输入50字，请用","进行分隔，例如”手机,发烧友”</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="c_notice">圈子公告:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <textarea class="tarea" rows="6" name="c_notice" id="c_notice"></textarea>
          </td>
          <td class="vatop tips">圈子公告不能超过240个字符</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label>圈子图片:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
			<span class="type-file-show">
			<img class="show_image" src="/admin/templates/default/images/preview.png">
			<div class="type-file-preview" style="display: none;"><img id="view_img"></div>
			</span>          
            <span class="type-file-box">
              <input type='text' name='c_img' id='c_img' class='type-file-text' />
              <input type='button' name='button' id='button' value='' class='type-file-button' />
              <input name="_pic" type="file" class="type-file-file" id="_pic" size="30" hidefocus="true" />
            </span>
          </td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="c_status">圈子状态:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
            <label for="c_status1" class="cb-enable selected" ><span>开启</span></label>
            <label for="c_status0" class="cb-disable" ><span>关闭</span></label>
            <input id="c_status1" name="c_status" checked="checked" value="1" type="radio">
            <input id="c_status0" name="c_status" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="c_recommend">是否推荐:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff">
            <label for="c_recommend1" class="cb-enable selected" ><span>是</span></label>
            <label for="c_recommend0" class="cb-disable" ><span>否</span></label>
            <input id="c_recommend1" name="c_recommend" checked="checked" value="1" type="radio">
            <input id="c_recommend0" name="c_recommend" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
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
<script type="text/javascript" src="/data/resource/js/jquery.edit.js" charset="utf-8"></script>
<script type="text/javascript" src="/data/resource/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<script type="text/javascript" src="/data/resource/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="/data/resource/js/ajaxfileupload/ajaxfileupload.js"></script>
<script type="text/javascript" src="/data/resource/js/jquery.Jcrop/jquery.Jcrop.js"></script>
<link href="/data/resource/js/jquery.Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script>
//裁剪图片后返回接收函数
function call_back(picname){
	$('#c_img').val(picname);
	$('#view_img').attr('src','/data/upload/circle/group/'+picname);
}
// 选择圈主
function chooseReturn(data) {
    $('#mastername').val(data.name);$('#masterid').val(data.id);
}
$(function(){
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
				url:'index.php?act=common&op=pic_upload&form_submit=ok&uploadpath=circle/group',
				secureuri:false,
				fileElementId:'_pic',
				dataType: 'json',
				success: function (data, status)
				{
					if (data.status == 1){
						ajax_form('cutpic','裁剪','index.php?act=common&op=pic_cut&type=circle&x=120&y=120&resize=1&ratio=1&url='+data.url,690);
					}else{
						alert(data.msg);
					}$('input[class="type-file-file"]').bind('change',uploadChange);
				},
				error: function (data, status, e)
				{
					alert('上传失败');$('input[class="type-file-file"]').bind('change',uploadChange);
				}
			}
		)
	}
	// 选择圈主弹出框
	$('#mastername').focus(function(){
		ajax_form('choose_master', '选择圈主', 'index.php?act=circle_manage&op=choose_master', 320);
	});
	$("#submitBtn").click(function(){
		if($("#circle_form").valid()){
			$("#circle_form").submit();
		}
	});
	$('#circle_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
        	c_name : {
        		required : true,
                minlength : 4,
        		maxlength : 12,
            	remote : {
            		url : 'index.php?act=circle_manage&op=check_circle_name',
                    type: 'get',
                    data:{
                    	name : function(){
                            return $('#c_name').val();
                        }
                    }
            	}
            },
            mastername : {
            	required : true,
                remote   : {
                    url :'index.php?act=circle_manage&op=check_member&branch=ok',
                    type:'get',
                    data:{
                        name : function(){
                            return $('#mastername').val();
                        },
                        id : function(){
                            return $('#masterid').val();
                        }
                    }
                }
            },
            c_desc : {
            	maxlength : 240
            },
            c_tag : {
                maxlength : 50
            },
            c_notice : {
                maxlength : 240
            },
            c_sort : {
            	digits : true,
            	max : 255
            }
        },
        messages : {
            c_name : {
                required : '请填写圈子名称',
                minlength : '圈子名字4到12个字符',
                maxlength : '圈子名字4到12个字符',
            	remote : '该名称已存在，请更换一个名称'
            },
            mastername : {
            	required : '请选择圈主',
            	remote : '用户不存在或者已经超出允许建立、加入圈子数'
            },
            c_desc : {
            	maxlength : '圈子简介长度不能超过240个字符'
            },
            c_tag : {
                maxlength : '圈子标签长度不能超过50个字符'
            },
            c_notice : {
                maxlength : '圈子公告长度不能超过240个字符'
            },
            c_sort : {
            	digits : '请填写数字',
            	max : '排序不能大于255'
            }
        }
    });
});
</script>
</body>
</html>
