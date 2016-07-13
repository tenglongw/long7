
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
      <h3>闲置分类</h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span>管理</span></a></li>
        <li><a href="index.php?act=flea_class&op=goods_class_add" ><span>新增</span></a></li>
        <li><a href="index.php?act=flea_class&op=goods_class_export" ><span>导出</span></a></li>
        <li><a href="index.php?act=flea_class&op=goods_class_import" ><span>导入</span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
   <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th class="nobg" colspan="12"><div class="title"><h5>操作提示</h5><span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
        <ul>
            <li>当用户添加闲置闲置信息时选择闲置分类，用户可根据分类查询闲置列表</li>
            <li>点击分类名前“+”符号，显示当前分类的下级分类</li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form method='post'>
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="submit_type" id="submit_type" value="" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th></th>
          <th>排序</th>
          <th>分类名称</th>
          <th class="align-center">显示</th>
          <th class="align-center">首页显示</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
                        <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="1" class="checkitem">
                        <img fieldid="1" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="1" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">1</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="1" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">手机</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=1"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="1" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="1" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=1">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=1';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="4" class="checkitem">
                        <img fieldid="4" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="4" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">2</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="4" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">相机/摄像机</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=4"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="4" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="4" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=4">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=4';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="11" class="checkitem">
                        <img fieldid="11" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="11" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">3</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="11" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">电脑/电脑配件</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=11"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="11" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="11" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=11">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=11';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="19" class="checkitem">
                        <img fieldid="19" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="19" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">4</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="19" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">数码3C产品</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=19"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="19" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="19" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=19">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=19';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="27" class="checkitem">
                        <img fieldid="27" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="27" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">5</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="27" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">服装/服饰</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=27"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="27" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="27" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=27">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=27';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="35" class="checkitem">
                        <img fieldid="35" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="35" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">6</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="35" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">美容/美颜/香水</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=35"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="35" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="35" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=35">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=35';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="42" class="checkitem">
                        <img fieldid="42" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="42" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">7</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="42" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">家居/日用品</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=42"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="42" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="42" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=42">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=42';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="48" class="checkitem">
                        <img fieldid="48" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="48" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">8</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="48" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">食品/保健品</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=48"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="48" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="48" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=48">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=48';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="51" class="checkitem">
                        <img fieldid="51" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="51" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">9</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="51" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">家用电器/影音设备</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=51"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="51" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="51" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=51">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=51';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="60" class="checkitem">
                        <img fieldid="60" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="60" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">10</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="60" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">母婴/儿童用品/玩具</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=60"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="60" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="60" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=60">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=60';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="67" class="checkitem">
                        <img fieldid="67" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="67" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">11</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="67" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">宠物/宠物用品</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=67"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="67" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="67" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=67">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=67';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="72" class="checkitem">
                        <img fieldid="72" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="72" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">12</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="72" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">生活服务/票务/卡券</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=72"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="72" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="72" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=72">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=72';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="80" class="checkitem">
                        <img fieldid="80" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="80" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">13</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="80" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">书刊音像/问题用品</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=80"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="80" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="80" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=80">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=80';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="88" class="checkitem">
                        <img fieldid="88" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="88" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">14</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="88" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">汽摩/电动车/自行车</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=88"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="88" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="88" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=88">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=88';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="95" class="checkitem">
                        <img fieldid="95" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="95" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">15</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="95" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">珠宝/黄金/手表</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=95"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="95" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="95" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=95">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=95';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="102" class="checkitem">
                        <img fieldid="102" status="open" nc_type="flex" src="/admin/templates/default/images/tv-expandable.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="102" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">16</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="102" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">艺术品/收藏品/古董古玩</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=102"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="102" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="102" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=102">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=102';">删除</a></td>
        </tr>
                <tr class="hover edit">
          <td class="w36"><input type="checkbox" name="check_gc_id[]" value="107" class="checkitem">
                        <img fieldid="107" status="close" nc_type="flex" src="/admin/templates/default/images/tv-item.gif">
            </td>
          <td class="w48 sort"><span title="可编辑" ajax_branch="goods_class_sort" datatype="number" fieldid="107" fieldname="gc_sort" nc_type="inline_edit" class="editable tooltip">17</span></td>
          <td class="w50pre name">
          <span title="可编辑" required="1" fieldid="107" ajax_branch="goods_class_name" fieldname="gc_name" nc_type="inline_edit" class="editable tooltip">其他闲置</span>
          <a class="btn-add-nofloat marginleft" href="index.php?act=flea_class&op=goods_class_add&gc_parent_id=107"><span>新增下级</span></a>
          </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="107" ajax_branch="goods_class_show" fieldname="gc_show" nc_type="inline_edit" title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="align-center power-onoff">            <a href="JavaScript:void(0);" class="tooltip enabled" fieldvalue="1" fieldid="107" ajax_branch="goods_class_index_show" fieldname="gc_index_show" nc_type="inline_edit"  title="可编辑"><img src="/admin/templates/default/images/transparent.gif"></a>
            </td>
          <td class="w84"><a href="index.php?act=flea_class&op=goods_class_edit&gc_id=107">编辑</a> | <a href="javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=flea_class&op=goods_class_del&gc_id=107';">删除</a></td>
        </tr>
                      </tbody>
            <tfoot>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkall_1"></td>
          <td id="batchAction" colspan="15"><span class="all_checkbox">
            <label for="checkall_2">全选</label>
            </span>&nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗')){$('#submit_type').val('del');$('form:first').submit();}"><span>删除</span></a><a href="JavaScript:void(0);" class="btn" onclick="$('#submit_type').val('brach_edit');$('form:first').submit();"><span>编辑</span></a><a href="JavaScript:void(0);" class="btn" onclick="$('#submit_type').val('index_show');$('form:first').submit();"><span>首页显示</span></a> 
            
            <!--<span>首页默认只显示到二级分类</span>--></td>
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
<script type="text/javascript" src="/data/resource/js/flea/jquery.edit.js" charset="utf-8"></script> 
<script type="text/javascript" src="/data/resource/js/flea/jquery.flea_class.js" charset="utf-8"></script> 
</body>
</html>
