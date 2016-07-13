
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
SITEURL = '/long7/shop';
RESOURCE_SITE_URL = '/long7/data/resource';
MICROSHOP_SITE_URL = '/long7/microshop';
CIRCLE_SITE_URL = '/long7/circle';
ADMIN_TEMPLATES_URL = '/long7/admin/templates/default';
LOADING_IMAGE = "/long7/admin/templates/default/images/loading.gif";
//换肤
cookie_skin = $.cookie("MyCssSkin");
if (cookie_skin) {
	$('#cssfile2').attr("href","/long7/admin/templates/default/css/"+ cookie_skin +".css");
}
</script>
</head>
<body>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>商品分类</h3>
      <ul class="tab-base"><li><a href="index.php?act=goods_class&op=goods_class" ><span>管理</span></a></li><li><a href="index.php?act=goods_class&op=goods_class_add" ><span>新增</span></a></li><li><a href="index.php?act=goods_class&op=goods_class_export" ><span>导出</span></a></li><li><a href="index.php?act=goods_class&op=goods_class_import" ><span>导入</span></a></li><li><a href="index.php?act=goods_class&op=tag" ><span>TAG管理</span></a></li><li><a  class="current"><span>编辑</span></a></li></ul> </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th class="nobg" colspan="12"><div class="title">
            <h5>操作提示</h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li>"类型"关系到商品发布时商品规格的添加，没有类型的商品分类的将不能添加规格。</li>
            <li>默认勾选"关联到子分类"将商品类型附加到子分类，如子分类不同于上级分类的类型，可以取消勾选并单独对子分类的特定类型进行编辑选择。</li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form id="goods_class_form" name="goodsClassForm" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="gc_id" value="<?php echo $output['class_array']['gc_id']?>" />
    <input type="hidden" name="gc_parent_id" id="gc_parent_id" value="<?php echo $output['class_array']['gc_parent_id']?>" />
    <input type="hidden" name="old_type_id" value="">
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="gc_name validation" for="gc_name">分类名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" maxlength="20" value="<?php echo $output['class_array']['gc_name']?>" name="gc_name" id="gc_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
                <tr>
          <td colspan="2" class="required"><label>发布虚拟商品:</label>
            <span>
            <label for="t_gc_virtual">
              <input id="t_gc_virtual" type="checkbox" class="checkbox" checked="checked" value="1" name="t_gc_virtual">
              关联到子分类</label>
            </span></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><label><input type="checkbox" name="gc_virtual" id="gc_virtual" value="1" >允许</label></td>
          <td class="vatop tips">勾选允许发布虚拟商品后，在发布该分类的商品时可选择交易类型为“虚拟兑换码”形式。</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation">分佣比例:</label>
            <span>
            <label for="t_commis_rate">
              <input id="t_commis_rate" class="checkbox" type="checkbox" checked="checked" value="1" name="t_commis_rate">
              关联到子分类</label>
            </span></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="commis_rate" class="w60" type="text" value="0" name="commis_rate">
            % </td>
          <td class="vatop tips">必须为0-100的整数</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation">类型:</label>
            <span>
            <label for="t_associated">
              <input class="checkbox" type="checkbox" name="t_associated" value="1" checked="checked" id="t_associated" />
              关联到子分类</label>
            </span></td>
        </tr>
       <!--  <tr class="noborder">
          <td colspan="2" id="gcategory">
            <select class="class-select">
              <option value="0">请选择...</option>
                                                        <option value="308">家用电器</option>
                                                        <option value="1">服饰鞋帽</option>
                                                        <option value="2">礼品箱包</option>
                                                        <option value="3">家居家装</option>
                                                        <option value="256">数码办公</option>
                                                        <option value="470">个护化妆</option>
                                                        <option value="530">珠宝手表</option>
                                                        <option value="593">食品饮料</option>
                                                        <option value="662">运动健康</option>
                                                        <option value="730">汽车用品</option>
                                                        <option value="825">玩具乐器</option>
                                                        <option value="888">厨房餐饮</option>
                                                        <option value="959">母婴用品</option>
                                                        <option value="1037">生活服务</option>
                                                      </select>（快捷定位）</td>
        </tr> -->
        <tr class="noborder">
          <td class="vatop rowform"><input type="hidden" name="t_name" id="t_name" value="" />
            <input type="hidden" name="t_sign" id="t_sign" value="" />
            <div id="type_div" class="goods-sort-type">
              <div class="container">
                <dl>
			        <dd>
			            <input type="radio" name="t_id" value="0" />
			            无类型
			        </dd>
			    </dl>
             <?php foreach ($output['type_list'] as $value){?>
             	<dl>
			        <dt id="type_dt_14">
			        <?php echo $value['name']?>
			        </dt>
			        <dd>
			        <?php if($output['class_array']['type_id']== $value['type']['type_id']){?>
			        	<input type="radio" checked="checked" class="radio" name="t_id" value="<?php echo $value['type']['type_id']?>" />
			        <?php }else{?>
			        <input type="radio" class="radio" name="t_id" value="<?php echo $value['type']['type_id']?>" />
			        <?php }?>
			            <span>
			            <?php echo $value['type']['type_name']?>
			            </span>
			        </dd>
			    </dl>
              <?php }?>
                                                              </div>
            </div></td>
          <td class="vatop tips">如果当前下拉选项中没有适合的类型，可以去<a onclick="window.parent.openItem('type,type,goods')" href="JavaScript:void(0);">类型管理</a>功能中添加新的类型</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="gc_sort">排序:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="255" name="gc_sort" id="gc_sort" class="txt"></td>
          <td class="vatop tips">数字范围为0~255，数字越小越靠前</td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span>提交</span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>  <style type="text/css">
<!--
.back_southidc {BACKGROUND-IMAGE:url('/long7/image/titlebg.gif');COLOR:000000;}
.table_southidc {BACKGROUND-COLOR: A4B6D7;}
.tit {font-size: 14px;
}
.tr_southidc {BACKGROUND-COLOR: ECF5FF;}
-->
</style>
<!-- <div align="center">
  
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
 
</div> -->
</div>
<script type="text/javascript" src="/long7/data/resource/js/common_select.js" charset="utf-8"></script> 
<script type="text/javascript" src="/long7/data/resource/js/jquery.mousewheel.js"></script> 
<script>
$(document).ready(function(){
    $('#type_div').perfectScrollbar();
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#goods_class_form").valid()){
	     $("#goods_class_form").submit();
		}
	});

	$("#pic").change(function(){
		$("#textfield1").val($(this).val());
	});
	$('input[type="radio"][name="t_id"]').change(function(){
		// 标记类型时候修改 修改为ok
		var t_id = 40;
		if(t_id != $(this).val()){
			$('#t_sign').val('ok');
		}else{
			$('#t_sign').val('');
		}
			
		if($(this).val() == '0'){
			$('#t_name').val('');
		}else{
			$('#t_name').val($(this).next('span').html());
		}
	});
	
	$('#goods_class_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            gc_name : {
                required : true,
                remote   : {                
                url :'index.php?act=goods_class&op=ajax&branch=check_class_name',
                type:'get',
                data:{
                    gc_name : function(){
                        return $('#gc_name').val();
                    },
                    gc_parent_id : function() {
                        return $('#gc_parent_id').val();
                    },
                    gc_id : '314'
                  }
                }
            },
            commis_rate : {
            	required :true,
                max :100,
                min :0,
                digits :true
            },
            gc_sort : {
                number   : true
            }
        },
        messages : {
             gc_name : {
                required : '分类名称不能为空',
                remote   : '该分类名称已经存在了，请您换一个'
            },
            commis_rate : {
            	required : '请正确填写分佣比例',
                max :'请正确填写分佣比例',
                min :'请正确填写分佣比例',
                digits :'请正确填写分佣比例'
            },
            gc_sort  : {
                number   : '分类排序仅能为数字'
            }
        }
    });

    // 类型搜索
    /* $("#gcategory > select").live('change',function(){
    	type_scroll($(this));
    }); */
});
var typeScroll = 0;
function type_scroll(o){
	var id = o.val();
	if(!$('#type_dt_'+id).is('dt')){
		return false;
	}
	$('#type_div').scrollTop(-typeScroll);
	var sp_top = $('#type_dt_'+id).offset().top;
	var div_top = $('#type_div').offset().top;
	$('#type_div').scrollTop(sp_top-div_top);
	typeScroll = sp_top-div_top;
}
//gcategoryInit('gcategory');
</script> 
</body>
</html>
