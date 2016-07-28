
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
      <h3>类型管理</h3>
      <ul class="tab-base">
        <li><a href="index.php?act=type&op=type"><span>列表</span></a></li>
        <li><a href="index.php?act=type&op=type_add"><span>新增</span></a></li>
        <li><a class="current" href="JavaScript:void(0);"><span>编辑</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="type_form" method="post">
    <table id="prompt" class="table tb-type2">
      <tbody>
        <tr class="space odd">
          <th colspan="12"> <div class="title">
              <h5>操作提示</h5>
              <span class="arrow"></span> </div>
          </th>
        </tr>
        <tr class="odd">
          <td><ul>
              <li>关联规格不是必选项，它会影响商品发布时的规格及价格的录入。不选为没有规格。</li>
              <li>关联品牌不是必选项，它会影响商品发布时的品牌选择。</li>
              <li>属性值可以添加多个，每个属性值之间需要使用逗号隔开。</li>
              <li>选中属性的“显示”选项，该属性将会在商品列表页显示。</li>
            </ul></td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="t_id" value="46" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td class="required" colspan="2"><label class="validation" for="t_mane">类型：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="txt" name="t_mane" id="t_mane" value="" /></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td class="required" colspan="2"><label class="" for="s_sort">所属分类：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" id="gcategory">
            <input type="hidden" value="320" class="mls_id" name="class_id" />
            <input type="hidden" value="" class="mls_name" name="class_name" />
                       <select class="class-select">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['gc_list'])){ ?>
              <?php foreach($output['gc_list'] as $k => $v){ ?>
              <?php if ($v['gc_parent_id'] == 0) {?>
              <option value="<?php echo $v['gc_id'];?>"><?php echo $v['gc_name'];?></option>
              <?php } ?>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips">选择分类，可关联大分类或更具体的下级分类。（只在后台快捷定位中起作用）</td>
        </tr>
        <tr>
          <td class="required" colspan="2"><label class="validation" for="t_sort">排序：</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" class="txt" name="t_sort" id="t_sort" value="0" /></td>
          <td class="vatop tips">请填写自然数。类型列表将会根据排序进行由小到大排列显示。</td>
        </tr>
      </tbody>
    </table>
    <div style="width: 49%; float: left; margin: 10px 0; border: solid #DEEFFB; border-width: 0 0 1px 0;">
      <table class="table tb-type2">
        <thead class="thead">
          <tr class="space">
            <th class="required" colspan="15"><label style=" float: left; margin-right: 10px;">选择关联规格：</label>
              <input type="hidden" name="spec_checkbox" id="spec_checkbox" value="" />
              <div id="speccategory" style=" float: left;">
                <select class="class-select">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['gc_list'])){ ?>
              <?php foreach($output['gc_list'] as $k => $v){ ?>
              <?php if ($v['gc_parent_id'] == 0) {?>
              <option value="<?php echo $v['gc_id'];?>"><?php echo $v['gc_name'];?></option>
              <?php } ?>
              <?php } ?>
              <?php } ?>
            </select>
              </div>（快捷定位）            </th>
          </tr>
          <tr>
            <th style="text-align: right;" colspan="15"><a class="btns" nctype="spec_hide" href="javascript:void(0);"><span>隐藏未选项</span></a></th>
          </tr>
        </thead>
      </table>
      <div style="position:relative; max-height:240px; overflow: hidden;" id="spec_div">
        <table class="table tb-type2" id="spec_table">
          <input type="hidden" value="" name="spec[form_submit]" nc_type="submit_value" />
                    <tbody>
                        <tr class="hover edit">
              <td colspan="15"><h6 class="clear" id="spec_h6_0">默认</h6>
                            <ul class="nofloat">
                             <?php foreach ($output['spec_list']['107']['spec'] as $value){
                            		?>
                            		<li class="left w33pre h36"><input class="checkitem"
									nc_type="change_default_spec_value" type="checkbox" value="<?php echo $value['sp_id']?>"
									name="spec_id[]"> <?php echo $value['sp_name']?> </li>
                            		<?php 
                            	}?>
                            </ul>
                            </td></tr>
                      </tbody>
                  </table>
      </div>
    </div>
    <div style="width: 49%; float: right; margin: 10px 0; border: solid #DEEFFB; border-width: 0 0 1px 0;">
      <table class="table tb-type2">
        <thead class="thead">
          <tr class="space">
            <th colspan="15"> <label for="member_name" style=" float: left; margin-right: 10px;">选择关联品牌：</label>
              <div id="brandcategory" style=" float: left;">
                <select class="class-select">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['gc_list'])){ ?>
              <?php foreach($output['gc_list'] as $k => $v){ ?>
              <?php if ($v['gc_parent_id'] == 0) {?>
              <option value="<?php echo $v['gc_id'];?>"><?php echo $v['gc_name'];?></option>
              <?php } ?>
              <?php } ?>
              <?php } ?>
            </select>
              </div>（快捷定位）            </th>
          </tr>
          <tr>
            <th style="text-align: right;" colspan="15"><a class="btns" nctype="brand_hide" href="javascript:void(0);"><span>隐藏未选项</span></a></th>
          </tr>
        </thead>
      </table>
      <div style="position:relative; max-height:240px; overflow: hidden;" id="brand_div">
        <table class="table tb-type2" id="brand_table">
                    <tbody>
          <input type="hidden" value="" name="brand[form_submit]" nc_type="submit_value" />
                    <tr class="hover edit">
            <td><h6 class="clear" id="brand_h6_0">默认</h6>
              <ul class="nofloat">
                                                 <?php foreach ($output['brand_list']['107']['brand'] as $value){
                            		?>
										<li class="left w33pre h36"><input type="checkbox"
											name="brand_id[]" class="brand_change_default_submit_value"
											value="<?php echo $value['brand_id']?>" id="brand_345" /> <label for="brand_345"><?php echo $value['brand_name']?></label>
										</li>
									<?php 
                            	}?>
                                              </ul></td>
          </tr>
                    </tbody>
                  </table>
      </div>
    </div>
    <table class="table tb-type2">
      <thead class="thead">
        <tr class="space">
          <th colspan="15">添加属性：</th>
        </tr>
        <tr>
          <th>删除</th>
          <th>排序</th>
          <th>属性名称</th>
          <th>属性可选值</th>
          <th class="align-center">显示</th>
          <th class="align-center">操作</th>
        </tr>
      </thead>
      <tbody id="tr_model">
        <tr></tr>
                      </tbody>
      <tbody>
        <tr>
          <td colspan="15"><a id="add_type" class="btn-add marginleft" href="JavaScript:void(0);"> <span>添加一个属性</span> </a></td>
        </tr>
      </tbody>
    </table>
    <table class="table tb-type2">
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a id="submitBtn" class="btn" href="JavaScript:void(0);"> <span>提交</span> </a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="/long7/data/resource/js/common_select.js" charset="utf-8"></script> 
<script type="text/javascript" src="/long7/data/resource/js/jquery.mousewheel.js"></script>
<script>
$(function(){
    // 编辑分类时清除分类信息
    $('.edit_gcategory').click(function(){
        $('input[name="class_id"]').val('');
        $('input[name="class_name"]').val('');
    });

    $('#spec_div').perfectScrollbar();
    $('#brand_div').perfectScrollbar();
	
	var i = 0;
	var tr_model = '<tr class="hover edit"><td></td>'+
		'<td class="w48 sort"><input type="text" name="at_value[key][sort]" value="0" /></td>'+
		'<td class="w25pre name"><input type="text" name="at_value[key][name]" value="" /></td>'+
		'<td class="w50pre name"><textarea rows="10" cols="80" name="at_value[key][value]"></textarea></td>'+
		'<td class="align-center power-onoff"><input type="checkbox" checked="checked" nc_type="checked_show" /><input type="hidden" name="at_value[key][show]" value="1" /></td>'+
		'<td class="w60 align-center"><a onclick="remove_tr($(this));" href="JavaScript:void(0);">删除</a></td>'+
	'</tr>';
	$("#add_type").click(function(){
		$('#tr_model > tr:last').after(tr_model.replace(/key/g, 's_' + i));
		$.getScript(RESOURCE_SITE_URL+"/js/admincp.js");
		i++;
	});

	$('input[nc_type="checked_show"]').live('click', function(){
		var o = $(this).next();
		//alert(o.val());
		if(o.val() == '1'){
			o.val('0');
		}else if(o.val() == '0'){
			o.val('1');
		}
	});


	//表单验证
    $('#type_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },

        rules : {
        	t_mane: {
        		required : true,
                maxlength: 20,
                minlength: 1
            },
            t_sort: {
				required : true,
				digits	 : true
            }
        },
        messages : {
        	t_mane : {
        		required : '请填写类型名称',
        		maxlength: '类型名称长度应在1-20个字符之间',
        		minlength: '类型名称长度应在1-20个字符之间' 
            },
            t_sort: {
            	required : '请填写类型排序',
            	digits : '请填写整数' 
            }
        }
    });

    //按钮先执行验证再提交表单
    $("#submitBtn").click(function(){
    	spec_check();
        if($("#type_form").valid()){
        	$("#type_form").submit();
    	}
    });

    $('input[nc_type="change_default_spec_value"]').click(function(){
		$(this).parents('table:first').find("input[nc_type='submit_value']").val('ok');
    });

    $('input[class="change_default_submit_value"]').change(function(){
		$(this).parents('tr:first').find("input[nc_type='submit_value']").val('ok');
    });

    $('input[class="brand_change_default_submit_value"]').change(function(){
    	$(this).parents('tbody:first').find("input[nc_type='submit_value']").val('ok');
    });

	// 所属分类
    $("#gcategory > select").live('change',function(){
    	spec_scroll($(this));
    	brand_scroll($(this));
    });

	// 规格搜索
    $("#speccategory > select").live('change',function(){
    	spec_scroll($(this));
    });
	// 品牌搜索
    $("#brandcategory > select").live('change',function(){
    	brand_scroll($(this));
    });

    // 规格隐藏未选项
    $('a[nctype="spec_hide"]').live('click',function(){
    	checked_hide('spec');
    });
	// 规格全部显示
	$('a[nctype="spec_show"]').live('click',function(){
		checked_show('spec');
	});
	// 品牌隐藏未选项
	$('a[nctype="brand_hide"]').live('click',function(){
    	checked_hide('brand');
	});
	// 品牌全部显示
	$('a[nctype="brand_show"]').live('click',function(){
		checked_show('brand');
	});
});
var specScroll = 0;
function spec_scroll(o){
	var id = o.val();
	if(!$('#spec_h6_'+id).is('h6')){
		return false;
	}
	$('#spec_div').scrollTop(-specScroll);
	var sp_top = $('#spec_h6_'+id).offset().top;
	var div_top = $('#spec_div').offset().top;
	$('#spec_div').scrollTop(sp_top-div_top);
	specScroll = sp_top-div_top;
}

var brandScroll = 0;
function brand_scroll(o){
	var id = o.val();
	if(!$('#brand_h6_'+id).is('h6')){
		return false;
	}
	$('#brand_div').scrollTop(-brandScroll);
	var sp_top = $('#brand_h6_'+id).offset().top;
	var div_top = $('#brand_div').offset().top;
	$('#brand_div').scrollTop(sp_top-div_top);
	brandScroll = sp_top-div_top;
}

//隐藏未选项
function checked_show(str) {
	$('#'+str+'_table').find('h6').show().end().find('li').show();
	$('#'+str+'_table').find('tr').show();
	$('a[nctype="'+str+'_show"]').attr('nctype',str+'_hide').children().html('隐藏未选项');
    $('#'+str+'_div').perfectScrollbar('destroy').perfectScrollbar();
}

// 显示全部选项
function checked_hide(str) {
	$('#'+str+'_table').find('h6').hide();
	$('#'+str+'_table').find('input[type="checkbox"]').parents('li').hide();
	$('#'+str+'_table').find('input[type="checkbox"]:checked').parents('li').show();
	$('#'+str+'_table').find('tr').each(function(){
	    if ($(this).find('input[type="checkbox"]:checked').length == 0 ) $(this).hide();
	});
	$('a[nctype="'+str+'_hide"]').attr('nctype',str+'_show').children().html('全部显示');
    $('#'+str+'_div').perfectScrollbar('destroy').perfectScrollbar();
}

function spec_check(){
	var id='';
	$('input[nc_type="change_default_spec_value"]:checked').each(function(){
		if(!isNaN($(this).val())){
			id += $(this).val();
		}
	});
	if(id != ''){
		$('#spec_checkbox').val('ok');
	}else{
		$('#spec_checkbox').val('');
	}
}

function remove_tr(o){
	o.parents('tr:first').remove();
}
// 所属分类
gcategoryInit('gcategory');
// 规格搜索
gcategoryInit('speccategory');
// 品牌搜索
gcategoryInit('brandcategory');

</script>  <style type="text/css">
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
          
          联系QQ：<span class="style11">38306293<a target=blank href=tencent://message/?uin=38306293&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/long7/qq_online.gif alt="创智凌云客服为你服务"></a>417586492</span><FONT face=Verdana><a target=blank href=tencent://message/?uin=417586492&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/qq_online.gif alt="创智凌云客服为你服务"></a></FONT><span class="style11">657248708</span><FONT face=Verdana><FONT face=Verdana><a target=blank href=tencent://message/?uin=657248708&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/qq_online.gif alt="创智凌云客服为你服务"></a></FONT><br>
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
</body>
</html>
