
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商家中心</title>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/seller_center.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_RESOURCE_SITE_URL;?>/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/shop/resource/font/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<script>
var COOKIE_PRE = '53C0_';var _CHARSET = 'utf-8';var SITEURL = '/long7/shop';var RESOURCE_SITE_URL = '/long7/data/resource';var SHOP_RESOURCE_SITE_URL = '/long7/shop/resource';var SHOP_TEMPLATES_URL = '/long7/shop/templates/default';</script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/seller.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/waypoints.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/member.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="/data/resource/js/html5shiv.js"></script>
      <script src="/data/resource/js/respond.min.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="/data/resource/js/IE6_MAXMIX.js"></script>
<script src="/data/resource/js/IE6_PNG.js"></script>
<script>
DD_belatedPNG.fix('.pngFix');
</script>
<script>
// <![CDATA[
if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand))
try{
document.execCommand("BackgroundImageCache", false, true);
   }
catch(e){}
// ]]>
</script>
<![endif]-->

</head>

<body>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ToolTip.js"></script>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="ncsc-layout wrapper">
  <div id="layoutRight" class="ncsc-layout-rightgood">
    <div class="main-content" id="mainContent">
      <script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.ajaxContent.pack.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/common_select.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.poshytip.min.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.charCount.js"></script>
<!--[if lt IE 8]>
  <script src="/data/resource/js/json2.js"></script>
<![endif]-->
<script src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/store_goods_add.step2.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<style type="text/css">
#fixedNavBar { filter:progid:DXImageTransform.Microsoft.gradient(enabled='true',startColorstr='#CCFFFFFF', endColorstr='#CCFFFFFF');background:rgba(255,255,255,0.8); width: 90px; margin-left: 510px; border-radius: 4px; position: fixed; z-index: 999; top: 172px; left: 50%;}
#fixedNavBar h3 { font-size: 12px; line-height: 24px; text-align: center; margin-top: 4px;}
#fixedNavBar ul { width: 80px; margin: 0 auto 5px auto;}
#fixedNavBar li { margin-top: 5px;}
#fixedNavBar li a { font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 20px; background-color: #F5F5F5; color: #999; text-align: center; display: block;  height: 20px; border-radius: 10px;}
#fixedNavBar li a:hover { color: #FFF; text-decoration: none; background-color: #27a9e3;}
</style>

<?php defined('InWrzcNet') or exit('Access Invalid!');?>
<?php if ($output['edit_goods_sign']) {?>
<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<?php } else {?>
<ul class="add-goods-step">
  <li><i class="icon icon-list-alt"></i>
    <h6>STEP.1</h6>
    <h2>选择商品分类</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li class="current"><i class="icon icon-edit"></i>
    <h6>STEP.2</h6>
    <h2>填写商品详情</h2>
    <i class="arrow icon-angle-right"></i> </li>
 <li><i class="icon icon-camera-retro "></i>
    <h6>STEP.3</h6>
    <h2>上传商品图片</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li><i class="icon icon-ok-circle"></i>
    <h6>STEP.4</h6>
    <h2>商品发布成功</h2>
  </li>
</ul>
<?php }?>
<div class="item-publish">

  <form method="post" id="goods_form" action="http://localhost/long7/shop/index.php?<?php if ($output['goods']['goods_commonid']!='') echo 'act=store_goods_online&op=edit_save_goods'; else echo 'act=store_goods_add&op=save_goods' ?>">
    <input type="hidden" name="form_submit" value="ok" />
   <input type="hidden" name="commonid" value="<?php echo $output['goods']['goods_commonid']?>" />
    <input type="hidden" name="type_id" value="<?php echo $output['goods']['type_id']?>" />
    <input type="hidden" name="ref_url" value="" />
    <div class="ncsc-form-goods">
      <h3 id="demo1">商品基本信息</h3>
      <dl>
        <dt>商品分类：</dt>
        <dd id="gcategory"><?php echo $output['goods_class']['gc_tag_name']?> 
          <input type="hidden" id="cate_id" name="cate_id" value="<?php echo $output['goods_class']['gc_id']?>" class="text" />
          <input type="hidden" name="cate_name" value="<?php echo $output['goods_class']['gc_tag_name']?>" class="text"/>
        </dd>
      </dl>
      <dl>
        <dt><i class="required">*</i>商品名称：</dt>
        <dd>
          <input name="g_name" type="text" class="text w400" value="<?php echo $output['goods']['goods_name']?>" />
          <span></span>
          <p class="hint">商品标题名称长度至少3个字符，最长50个汉字</p>
        </dd>
      </dl>
      <dl>
        <dt>商品卖点：</dt>
        <dd>
          <textarea name="g_jingle" class="textarea h60 w400" ><?php echo $output['goods']['goods_jingle']?></textarea>
          <span></span>
          <p class="hint">商品卖点最长不能超过140个汉字</p>
        </dd>
      </dl>
      <dl>
        <dt nc_type="no_spec"><i class="required">*</i>商品价格：</dt>
        <dd nc_type="no_spec">
          <input name="g_price" value="<?php echo $output['goods']['goods_price']?>" type="text"  class="text w60" /><em class="add-on"><i class="icon-renminbi"></i></em> <span></span>
          <p class="hint">价格必须是0.01~9999999之间的数字，且不能高于市场价。<br>
            此价格为商品实际销售价格，如果商品存在规格，该价格显示最低价格。</p>
        </dd>
      </dl>
      <dl>
        <dt><i class="required">*</i>市场价：</dt>
        <dd>
          <input name="g_marketprice" value="<?php echo $output['goods']['goods_marketprice']?>" type="text" class="text w60" /><em class="add-on"><i class="icon-renminbi"></i></em> <span></span>
          <p class="hint">价格必须是0.01~9999999之间的数字，此价格仅为市场参考售价，请根据该实际情况认真填写。</p>
        </dd>
      </dl>
      <dl>
        <dt>成本价：</dt>
        <dd>
          <input name="g_costprice" value="<?php echo $output['goods']['goods_costprice']?>" type="text" class="text w60" /><em class="add-on"><i class="icon-renminbi"></i></em> <span></span>
          <p class="hint">价格必须是0.00~9999999之间的数字，此价格为商户对所销售的商品实际成本价格进行备注记录，非必填选项，不会在前台销售页面中显示。</p>
        </dd>
      </dl>
      <dl>
        <dt>折扣：</dt>
        <dd>
          <input name="g_discount" value="<?php echo $output['goods']['goods_discount']?>" type="text" class="text w60" readonly="readonly" style="background:#E7E7E7 none;" /><em class="add-on">%</em>
          <p class="hint">根据销售价与市场价比例自动生成，不需要编辑。</p>
        </dd>
      </dl>
      <?php foreach ($output['spec_list'] as $key=>$val){?>
      <dl nc_type="spec_group_dl_0" nctype="spec_group_dl" class="spec-bg" spec_img="t">
            <dt>
	          <?php echo $val['sp_name']?><input name="sp_name[<?php echo $key?>]" type="hidden" class="text w60 tip2 tr" title="自定义规格类型名称，规格值名称最多不超过4个字" value="<?php echo $val['sp_name']?>" maxlength="4" nctype="spec_name" data-param="{id:<?php $key?>,name:&#39;<?php $val['sp_name']?>&#39;}">
	          ：</dt>
	        <dd nctype="sp_group_val">
	          <ul class="spec">
	           <?php foreach ($val['value'] as $value){?>
	           	<li><span nctype="input_checkbox">
	              <input type="checkbox" <?php if(!empty($output['spec_value'])){ foreach ($output['spec_value'] as $sjkey=>$sjval){ foreach ($sjval as $sjvkey=>$sjvalue){ if($value['sp_value_id']==$sjvkey){?> checked=true<?php }}}}?> value="<?php echo $value['sp_value_name']?>" nc_type="<?php echo $value['sp_value_id']?>" class="sp_val" name="sp_val[<?php echo $key?>][<?php echo $value['sp_value_id']?>]">
	              </span><span nctype="pv_name"><?php echo $value['sp_value_name']?></span></li>
				<?php 
	              }?>
	               <li data-param="{gc_id:107,sp_id:1,url:&#39;http://localhost/shop/index.php?act=store_goods_add&amp;op=ajax_add_spec&#39;}">
	              <!-- <div nctype="specAdd1" style="display: block;"><a href="javascript:void(0);" class="ncsc-btn" nctype="specAdd"><i class="icon-plus"></i>添加规格值</a></div> -->
	              <div nctype="specAdd2" style="display: none;">
	                <input class="text w60" type="text" placeholder="规格值名称" maxlength="20">
	                <a href="javascript:void(0);" nctype="specAddSubmit" class="ncsc-btn ncsc-btn-acidblue ml5 mr5">确认</a><a href="javascript:void(0);" nctype="specAddCancel" class="ncsc-btn ncsc-btn-orange">取消</a></div>
	            </li>
	          </ul>
	                  </dd>
	      </dl>
     <?php }?>
            
                <!--   <dl nc_type="spec_group_dl_3" nctype="spec_group_dl" class="spec-bg">
        <dt>
          <input name="sp_name[27]" type="text" class="text w60 tip2 tr" title="自定义规格类型名称，规格值名称最多不超过4个字" value="材质" maxlength="4" nctype="spec_name" data-param="{id:27,name:&#39;材质&#39;}">
          ：</dt>
        <dd>
          <ul class="spec">
                                                <li data-param="{gc_id:107,sp_id:27,url:&#39;http://b2b2c.wrtx.cn/shop/index.php?act=store_goods_add&amp;op=ajax_add_spec&#39;}">
              <div nctype="specAdd1" style="display: block;"><a href="javascript:void(0);" class="ncsc-btn" nctype="specAdd"><i class="icon-plus"></i>添加规格值</a></div>
              <div nctype="specAdd2" style="display: none;">
                <input class="text w60" type="text" placeholder="规格值名称" maxlength="20">
                <a href="javascript:void(0);" nctype="specAddSubmit" class="ncsc-btn ncsc-btn-acidblue ml5 mr5">确认</a><a href="javascript:void(0);" nctype="specAddCancel" class="ncsc-btn ncsc-btn-orange">取消</a></div>
            </li>
          </ul>
                  </dd>
      </dl> -->
        <dt>库存配置：</dt>
        <dd class="spec-dd">
          <table border="0" cellpadding="0" cellspacing="0" class="spec_table">
            <thead>
                <tr>
                	<?php foreach ($output['spec_list'] as $key=>$val){?>
                		<th nctype="spec_name_<?php echo $key?>"><?php echo $val['sp_name']?></th>
                	<?php }?>
                         <!--  <th nctype="spec_name_25">套餐类型</th> -->
                          <!-- <th nctype="spec_name_27">材质</th> -->
                                          <th class="w90"><span class="red">*</span>市场价
                <div class="batch"><i class="icon-edit" title="批量操作"></i>
                  <div class="batch-input" style="display:none;">
                    <h6>批量设置价格：</h6>
                    <a href="javascript:void(0)" class="close">X</a>
                    <input name="" type="text" class="text price">
                    <a href="javascript:void(0)" class="ncsc-btn-mini" data-type="marketprice">设置</a><span class="arrow"></span></div>
                </div></th>
              <th class="w90"><span class="red">*</span>价格                <div class="batch"><i class="icon-edit" title="批量操作"></i>
                  <div class="batch-input" style="display:none;">
                    <h6>批量设置价格：</h6>
                    <a href="javascript:void(0)" class="close">X</a>
                    <input name="" type="text" class="text price">
                    <a href="javascript:void(0)" class="ncsc-btn-mini" data-type="price">设置</a><span class="arrow"></span></div>
                </div></th>
              <th class="w60"><span class="red">*</span>库存                <div class="batch"><i class="icon-edit" title="批量操作"></i>
                  <div class="batch-input" style="display:none;">
                    <h6>批量设置库存：</h6>
                    <a href="javascript:void(0)" class="close">X</a>
                    <input name="" type="text" class="text stock">
                    <a href="javascript:void(0)" class="ncsc-btn-mini" data-type="stock">设置</a><span class="arrow"></span></div>
                </div></th>
              <th class="w70">预警值
                <div class="batch"><i class="icon-edit" title="批量操作"></i>
                  <div class="batch-input" style="display:none;">
                    <h6>批量设置预警值：</h6>
                    <a href="javascript:void(0)" class="close">X</a>
                    <input name="" type="text" class="text stock">
                    <a href="javascript:void(0)" class="ncsc-btn-mini" data-type="alarm">设置</a><span class="arrow"></span></div>
                </div></th>
              <th class="w100">商家货号</th>
                </tr></thead>
            <tbody nc_type="spec_table">
            </tbody>
          </table>
          <p class="hint">点击<i class="icon-edit"></i>可批量修改所在列的值。</p>
        </dd>
      </dl>
      <dl>
        <dt nc_type="no_spec"><i class="required">*</i>商品库存：</dt>
        <dd nc_type="no_spec">
          <input name="g_storage" value="<?php echo $output['goods']['g_storage']?>" type="text" class="text w60" />
          <span></span>
          <p class="hint">商铺库存数量必须为0~999999999之间的整数<br/>若启用了库存配置，则系统自动计算商品的总数，此处无需卖家填写</p>
        </dd>
      </dl>
      <dl>
        <dt>库存预警值：</dt>
        <dd>
          <input name="g_alarm" value="<?php echo $output['goods']['goods_storage_alarm']?>" type="text" class="text w60" />
          <span></span>
          <p class="hint">设置最低库存预警值。当库存低于预警值时商家中心商品列表页库存列红字提醒。<br>
            请填写0~255的数字，0为不预警。</p>
        </dd>
      </dl>
      <dl>
        <dt nc_type="no_spec">商家货号：</dt>
        <dd nc_type="no_spec">
          <p>
            <input name="g_serial" value="" type="text"  class="text"  />
          </p>
          <p class="hint">商家货号是指商家管理商品的编号，买家不可见<br/>最多可输入20个字符，支持输入中文、字母、数字、_、/、-和小数点</p>
        </dd>
      </dl>
      <dl>
        <dt><i class="required">*</i>商品图片：</dt>
        <dd>
          <div class="ncsc-goods-default-pic">
            <div class="goodspic-uplaod">
              <div class="upload-thumb"> <img nctype="goods_image" src="<?php echo $output['goods']['goods_image_url']?>"/> </div>
              <input type="hidden" name="image_path" id="image_path" nctype="goods_image" value="<?php echo $output['goods']['goods_image']?>" />
              <span></span>
              <p class="hint">上传商品默认主图，如多规格值时将默认使用该图或分规格上传各规格主图；支持jpg、gif、png格式上传或从图片空间中选择，建议使用<font color="red">尺寸800x800像素以上、大小不超过1M的正方形图片</font>，上传后的图片将会自动保存在图片空间的默认分类中。</p>
              <div class="handle">
                <div class="ncsc-upload-btn"> <a href="javascript:void(0);"><span>
                  <input type="file" hidefocus="true" size="1" class="input-file" name="goods_image" id="goods_image">
                  </span>
                  <p><i class="icon-upload-alt"></i>图片上传</p>
                  </a> </div>
                <a class="ncsc-btn mt5" nctype="show_image" href="/shop/index.php?act=store_album&op=pic_list&item=goods"><i class="icon-picture"></i>从图片空间选择</a> <a href="javascript:void(0);" nctype="del_goods_demo" class="ncsc-btn mt5" style="display: none;"><i class="icon-circle-arrow-up"></i>关闭相册</a></div>
            </div>
          </div>
          <div id="demo"></div>
        </dd>
      </dl>
      <h3 id="demo2">商品详情描述</h3>
      <dl style="overflow: visible;">
        <dt>商品品牌：</dt>
        <dd>
          <div class="ncsc-brand-select">
            <div class="selection">
              <input name="b_name" id="b_name" type="text" class="text w180" value="<?php echo $output['goods']['brand_name']?>" readonly="readonly" />
              <input type="hidden" name="b_id" id="b_id" value="<?php echo $output['goods']['brand_id']?>" />
              <em class="add-on" nctype="add-on"><i class="icon-collapse"></i></em></div>
            <div class="ncsc-brand-select-container">
              <div class="brand-index" data-tid="44" data-url="/long7/shop/index.php?act=store_goods_add&op=ajax_get_brand">
                <div class="letter" nctype="letter">
                  <ul>
                    <li><a href="javascript:void(0);" data-letter="all">全部</a></li>
                    <li><a href="javascript:void(0);" data-letter="A">A</a></li>
                    <li><a href="javascript:void(0);" data-letter="B">B</a></li>
                    <li><a href="javascript:void(0);" data-letter="C">C</a></li>
                    <li><a href="javascript:void(0);" data-letter="D">D</a></li>
                    <li><a href="javascript:void(0);" data-letter="E">E</a></li>
                    <li><a href="javascript:void(0);" data-letter="F">F</a></li>
                    <li><a href="javascript:void(0);" data-letter="G">G</a></li>
                    <li><a href="javascript:void(0);" data-letter="H">H</a></li>
                    <li><a href="javascript:void(0);" data-letter="I">I</a></li>
                    <li><a href="javascript:void(0);" data-letter="J">J</a></li>
                    <li><a href="javascript:void(0);" data-letter="K">K</a></li>
                    <li><a href="javascript:void(0);" data-letter="L">L</a></li>
                    <li><a href="javascript:void(0);" data-letter="M">M</a></li>
                    <li><a href="javascript:void(0);" data-letter="N">N</a></li>
                    <li><a href="javascript:void(0);" data-letter="O">O</a></li>
                    <li><a href="javascript:void(0);" data-letter="P">P</a></li>
                    <li><a href="javascript:void(0);" data-letter="Q">Q</a></li>
                    <li><a href="javascript:void(0);" data-letter="R">R</a></li>
                    <li><a href="javascript:void(0);" data-letter="S">S</a></li>
                    <li><a href="javascript:void(0);" data-letter="T">T</a></li>
                    <li><a href="javascript:void(0);" data-letter="U">U</a></li>
                    <li><a href="javascript:void(0);" data-letter="V">V</a></li>
                    <li><a href="javascript:void(0);" data-letter="W">W</a></li>
                    <li><a href="javascript:void(0);" data-letter="X">X</a></li>
                    <li><a href="javascript:void(0);" data-letter="Y">Y</a></li>
                    <li><a href="javascript:void(0);" data-letter="Z">Z</a></li>
                    <li><a href="javascript:void(0);" data-letter="0-9">其他</a></li>
                    <li><a href="javascript:void(0);" data-empty="0">清空</a></li>
                  </ul>
                </div>
                <div class="search" nctype="search">
                  <input name="search_brand_keyword" id="search_brand_keyword" type="text" class="text" placeholder="品牌名称关键字查找"/><a href="javascript:void(0);" class="ncsc-btn-mini" style="vertical-align: top;">Go</a></div>
              </div>
              <div class="brand-list" nctype="brandList">
                <ul nctype="brand_list">
                      </ul>
              </div>
              <div class="no-result" nctype="noBrandList" style="display: none;">没有符合"<strong>搜索关键字</strong>"条件的品牌</div>
            </div>
          </div>
        </dd>
      </dl>
            <dl>
      </dl>
            <dl>
        <dt>商品描述：</dt>
        <dd id="ncProductDetails">
          <div class="tabs">
            <ul class="ui-tabs-nav" jquery1239647486215="2">
              <li class="ui-tabs-selected"><a href="#panel-1" jquery1239647486215="8"><i class="icon-desktop"></i> 电脑端</a></li>
               <li class="selected"><a href="#panel-2" jquery1239647486215="9"><i class="icon-mobile-phone"></i>手机端</a></li> -->
            </ul>
            <div id="panel-1" class="ui-tabs-panel" jquery1239647486215="4">
              <textarea id="g_body" name="g_body" style="width:100%;height:480px;visibility:hidden;"><?php echo $output['goods']['goods_body']?></textarea>
<script src="<?php echo RESOURCE_SITE_URL;?>/kindeditor/kindeditor-min.js" charset="utf-8"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/kindeditor/lang/zh_CN.js" charset="utf-8"></script>
<script>
	var KE;
  KindEditor.ready(function(K) {
        KE = K.create("textarea[name='g_body']", {
						items : ['source', '|', 'fullscreen', 'undo', 'redo', 'print', 'cut', 'copy', 'paste',
            'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
            'superscript', '|', 'selectall', 'clearhtml','quickformat','|',
            'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
            'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'flash', 'media', 'table', 'hr', 'emoticons', 'link', 'unlink', '|', 'about'],
						cssPath : "/long7/data/resource/kindeditor/themes/default/default.css",
						allowImageUpload : false,
						allowFlashUpload : false,
						allowMediaUpload : false,
						allowFileManager : false,
						syncType:"form",
						afterCreate : function() {
							var self = this;
							self.sync();
						},
						afterChange : function() {
							var self = this;
							self.sync();
						},
						afterBlur : function() {
							var self = this;
							self.sync();
						}
        });
			KE.appendHtml = function(id,val) {
				this.html(this.html() + val);
				if (this.isCreated) {
					var cmd = this.cmd;
					cmd.range.selectNodeContents(cmd.doc.body).collapse(false);
					cmd.select();
				}
				return this;
			}
	});
</script>
	              <div class="hr8">
                <div class="ncsc-upload-btn"> <a href="javascript:void(0);"><span>
                  <input type="file" hidefocus="true" size="1" class="input-file" name="add_album" id="add_album" multiple="multiple">
                  </span>
                  <p><i class="icon-upload-alt" data_type="0" nctype="add_album_i"></i>图片上传</p>
                  </a> </div>
                <a class="ncsc-btn mt5" nctype="show_desc" href="index.php?act=store_album&op=pic_list&item=des"><i class="icon-picture"></i>插入相册图片</a> <a href="javascript:void(0);" nctype="del_desc" class="ncsc-btn mt5" style="display: none;"><i class=" icon-circle-arrow-up"></i>关闭相册</a> </div>
              <p id="des_demo"></p>
            </div>
            <div id="panel-2" class="ui-tabs-panel ui-tabs-hide" jquery1239647486215="5">
              <div class="ncsc-mobile-editor">
                <div class="pannel">
                  <div class="size-tip"><span nctype="img_count_tip">图片总数得超过<em>20</em>张</span><i>|</i><span nctype="txt_count_tip">文字不得超过<em>5000</em>字</span></div>
                  <div class="control-panel" nctype="mobile_pannel">
                        </div>
                  <div class="add-btn">
                    <ul class="btn-wrap">
                      <li><a href="javascript:void(0);" nctype="mb_add_img"><i class="icon-picture"></i>
                        <p>图片</p>
                        </a></li>
                      <li><a href="javascript:void(0);" nctype="mb_add_txt"><i class="icon-font"></i>
                        <p>文字</p>
                        </a></li>
                    </ul>
                  </div>
                </div>
                <div class="explain">
                  <dl>
                    <dt>1、基本要求：</dt>
                    <dd>（1）手机详情总体大小：图片+文字，图片不超过20张，文字不超过5000字；</dd>
                    <dd>建议：所有图片都是本宝贝相关的图片。</dd>
                  </dl><dl>
                    <dt>2、图片大小要求：</dt>
                    <dd>（1）建议使用宽度480 ~ 620像素、高度小于等于960像素的图片；</dd>
                    <dd>（2）格式为：JPG\JEPG\GIF\PNG；</dd>
                    <dd>举例：可以上传一张宽度为480，高度为960像素，格式为JPG的图片。</dd>
                  </dl><dl>
                    <dt>3、文字要求：</dt>
                    <dd>（1）每次插入文字不能超过500个字，标点、特殊字符按照一个字计算；</dd>
                    <dd>建议：不要添加太多的文字，这样看起来更清晰。</dd>
                  </dl>
                </div>
              </div>
              <div class="ncsc-mobile-edit-area" nctype="mobile_editor_area">
                <div nctype="mea_img" class="ncsc-mea-img" style="display: none;"></div>
                <div class="ncsc-mea-text" nctype="mea_txt" style="display: none;">
                  <p id="meat_content_count" class="text-tip"></p>
                  <textarea class="textarea valid" nctype="meat_content"></textarea>
                  <div class="button"><a class="ncsc-btn ncsc-btn-blue" nctype="meat_submit" href="javascript:void(0);">确认</a><a class="ncsc-btn ml10" nctype="meat_cancel" href="javascript:void(0);">取消</a></div>
                  <a class="text-close" nctype="meat_cancel" href="javascript:void(0);">X</a>
                </div>
              </div>
              <input name="m_body" autocomplete="off" type="hidden" value=''>
            </div>
          </div>
        </dd>
      </dl>
      <dl>
        <dt>关联版式：</dt>
        <dd> <span class="mr50">
          <label>顶部版式</label>
          <select name="plate_top">
            <option>请选择</option>
                </select>
          </span> <span class="mr50">
          <label>底部版式</label>
          <select name="plate_bottom">
            <option>请选择</option>
                </select>
          </span> </dd>
      </dl>
      <h3 id="demo3">特殊商品</h3>
      <!-- 只有可发布虚拟商品才会显示 S -->
            <!-- 只有可发布虚拟商品才会显示 E --> 
      <!-- F码商品专有项 S -->
      <!-- <dl class="special-02" nctype="virtual_null" >
        <dt>F码商品：</dt>
        <dd>
          <ul class="ncsc-form-radio-list">
            <li>
              <input type="radio" name="is_fc" id="is_fc_1" value="1" >
              <label for="is_fc_1">是</label>
            </li>
            <li>
              <input type="radio" name="is_fc" id="is_fc_0" value="0" checked>
              <label for="is_fc_0">否</label>
            </li>
          </ul>
          <p class="hint vital">*F码商品不能参加抢购、限时折扣和组合销售三种促销活动。也不能预售和推荐搭配。</p>
        </dd>
      </dl>
      <dl class="special-02" nctype="fcode_valid" style="display:none;">
        <dt>
                    生成F码数量：</dt>
        <dd>
          <input type="text" name="g_fccount" id="g_fccount" class="w80 text" value="">
          <span></span>
          <p class="hint">请填写100以内的数字。编辑商品时添加F码会不计算原有F码数量继续生成相应数量。</p>
        </dd>
      </dl>
      <dl class="special-02" nctype="fcode_valid" style="display:none;">
        <dt>
                    F码前缀：</dt>
        <dd>
          <input type="text" name="g_fcprefix" id="g_fcprefix" class="w80 text" value="">
          <span></span>
          <p class="hint">请填写3~5位的英文字母。建议每次生成的F码使用不同的前缀。</p>
        </dd>
      </dl>-->
            <!-- F码商品专有项 E --> 
      <!-- 预售商品 S -->
      <dl class="special-03" nctype="virtual_null" >
        <dt>预售：</dt>
        <dd>
          <ul class="ncsc-form-radio-list">
            <li>
              <input type="radio" name="is_presell" id="is_presell_1" value="1" <?php if($output['goods']['is_presell']=="1"){?>checked<?php }?> >
              <label for="is_presell_1">是</label>
            </li>
            <li>
              <input type="radio" name="is_presell" id="is_presell_0" value="0" <?php if($output['goods']['is_presell']=="0"){?>checked<?php }?> >
              <label for="is_presell_0">否</label>
            </li>
          </ul>
          <p class="hint vital">*预售商品不能参加抢购、限时折扣和组合销售三种促销活动。也不能推荐搭配。</p>
        </dd>
      </dl>
      <dl class="special-03" nctype="is_presell" style="display:none;">
        <dt><i class="required">*</i>发货日期：</dt>
        <dd>
          <input type="text" name="g_deliverdate" id="g_deliverdate" class="w80 text" value="<?php echo $output['goods']['presell_deliverdate']?>"><em class="add-on"><i class="icon-calendar"></i></em>
          <span></span>
          <p class="hint">商家发货时间。</p>
        </dd>
      </dl>
      <!-- 预售商品 E --> 
      <!-- 商品物流信息 S -->
      <h3 id="demo4">商品物流信息</h3>
      <dl>
        <dt>所在地：</dt>
        <dd>
          <p id="region">
            <select class="d_inline" name="province_id" id="province_id">
            </select>
            <input type="hidden" name="city_id" id="city_id" >
          </p>
        </dd>
      </dl>
      <dl nctype="virtual_null" >
        <dt>运费：</dt>
        <dd>
          <ul class="ncsc-form-radio-list">
            <li>
              <input id="freight_0" nctype="freight" name="freight" class="radio" type="radio" <?php if($output['goods']['transport_id']=="0"){?>checked<?php }?> value="0">
              <label for="freight_0">固定运费</label>
              <div nctype="div_freight" >
                <input id="g_freight" class="w50 text" nc_type='transport' type="text" value="<?php echo $output['goods']['goods_freight']?>" name="g_freight"><em class="add-on"><i class="icon-renminbi"></i></em> </div>
            </li>
            <li>
              <input id="freight_1" nctype="freight" name="freight" class="radio" type="radio" <?php if($output['goods']['transport_id'] != "0"){?>checked<?php }?> value="1">
              <label for="freight_1">使用运费模板</label>
              <div nctype="div_freight" style="display: none;">
                <input id="transport_id" type="hidden" value="<?php echo $output['goods']['transport_id']?>" name="transport_id">
                <input id="transport_title" type="hidden" value="<?php echo $output['goods']['transport_title']?>" name="transport_title">
                <span id="postageName" class="transport-name" <?php if($output['goods']['transport_id'] != "0"){?>style="display: inline-block;"<?php }?> ><?php echo $output['goods']['transport_title']?></span><a href="JavaScript:void(0);" onClick="window.open('index.php?act=store_transport&type=select')" class="ncsc-btn" id="postageButton"><i class="icon-truck"></i>选择运费模板</a> </div>
            </li>
          </ul>
          <p class="hint">运费设置为 0 元，前台商品将显示为免运费。</p>
        </dd>
      </dl>
      <!-- 商品物流信息 E -->
      <!-- <h3 id="demo5" nctype="virtual_null" >发票信息</h3>
      <dl nctype="virtual_null" >
        <dt>是否开增值税发票：</dt>
        <dd>
          <ul class="ncsc-form-radio-list">
            <li>
              <label>
                <input name="g_vat" value="1"  type="radio" />
                是</label>
            </li>
            <li>
              <label>
                <input name="g_vat" value="0" checked="checked"  type="radio"/>
                否</label>
            </li>
          </ul>
          <p class="hint"></p>
        </dd>
      </dl> -->
      <h3 id="demo6">其他信息</h3>
      <dl>
        <dt><?php echo $lang['store_goods_index_store_goods_class'].$lang['nc_colon'];?></dt>
      <dd><span class="new_add"><a href="javascript:void(0)" id="add_sgcategory" class="ncsc-btn"><?php echo $lang['store_goods_index_new_class'];?></a> </span>
        <?php if (!empty($output['store_class_goods'])) { ?>
        <?php foreach ($output['store_class_goods'] as $v) { ?>
        <select name="sgcate_id[]" class="sgcategory">
          <option value="0"><?php echo $lang['nc_please_choose'];?></option>
          <?php foreach ($output['store_goods_class'] as $val) { ?>
          <option value="<?php echo $val['stc_id']; ?>" <?php if ($v==$val['stc_id']) { ?>selected="selected"<?php } ?>><?php echo $val['stc_name']; ?></option>
          <?php if (is_array($val['child']) && count($val['child'])>0){?>
          <?php foreach ($val['child'] as $child_val){?>
          <option value="<?php echo $child_val['stc_id']; ?>" <?php if ($v==$child_val['stc_id']) { ?>selected="selected"<?php } ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $child_val['stc_name']; ?></option>
          <?php }?>
          <?php }?>
          <?php } ?>
        </select>
        <?php } ?>
        <?php } else { ?>
        <select name="sgcate_id[]" class="sgcategory">
          <option value="0"><?php echo $lang['nc_please_choose'];?></option>
          <?php if (!empty($output['store_goods_class'])){?>
          <?php foreach ($output['store_goods_class'] as $val) { ?>
          <option value="<?php echo $val['stc_id']; ?>"><?php echo $val['stc_name']; ?></option>
          <?php if (is_array($val['child']) && count($val['child'])>0){?>
          <?php foreach ($val['child'] as $child_val){?>
          <option value="<?php echo $child_val['stc_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $child_val['stc_name']; ?></option>
          <?php }?>
          <?php }?>
          <?php } ?>
          <?php } ?>
        </select>
        <?php } ?>
        <p class="hint"><?php echo $lang['store_goods_index_belong_multiple_store_class'];?></p>
      </dd>
      </dl>
      <dl>
        <dt>商品发布：</dt>
        <dd>
          <ul class="ncsc-form-radio-list">
            <li>
              <label>
                <input name="g_state" value="1" type="radio" <?php if($output['goods']['goods_state']=="1"){?>checked<?php }?>  />
                立即发布 </label>
            </li>
            <li>
              <label>
                <input name="g_state" value="0" type="radio" <?php if($output['goods']['goods_state']=="0"){?>checked<?php }?> nctype="auto" />
                发布时间 </label>
              <input type="text" class="w80 text" name="starttime" disabled="disabled" style="background:#E7E7E7 none;" id="starttime" value="<?php echo $output['goods']['goods_selltime']?>" />
              <select disabled="disabled" style="background:#E7E7E7 none;" name="starttime_H" id="starttime_H">
                                <option value="00" >00</option>
                                <option value="01" >01</option>
                                <option value="02" >02</option>
                                <option value="03" >03</option>
                                <option value="04" >04</option>
                                <option value="05" >05</option>
                                <option value="06" >06</option>
                                <option value="07" >07</option>
                                <option value="08" >08</option>
                                <option value="09" >09</option>
                                <option value="10" >10</option>
                                <option value="11" selected="selected">11</option>
                                <option value="12" selected="selected">12</option>
                                <option value="13" selected="selected">13</option>
                                <option value="14" selected="selected">14</option>
                                <option value="15" selected="selected">15</option>
                                <option value="16" selected="selected">16</option>
                                <option value="17" selected="selected">17</option>
                                <option value="18" selected="selected">18</option>
                                <option value="19" selected="selected">19</option>
                                <option value="20" selected="selected">20</option>
                                <option value="21" selected="selected">21</option>
                                <option value="22" selected="selected">22</option>
                                <option value="23" selected="selected">23</option>
                    </select>
              时              <select disabled="disabled" style="background:#E7E7E7 none;" name="starttime_i" id="starttime_i">
                                <option value="05" >05</option>
                                <option value="10" >10</option>
                                <option value="15" >15</option>
                                <option value="20" >20</option>
                                <option value="25" >25</option>
                                <option value="30" >30</option>
                                <option value="35" selected="selected">35</option>
                                <option value="40" selected="selected">40</option>
                                <option value="45" selected="selected">45</option>
                                <option value="50" selected="selected">50</option>
                                <option value="55" selected="selected">55</option>
                              </select>
              分 </li>
            <li>
              <label>
                <input name="g_state" value="0"  <?php if($output['goods']['goods_state']=="0"){?>checked<?php }?> type="radio"  />
                放入仓库 </label>
            </li>
          </ul>
        </dd>
      </dl>
      <dl>
        <dt>预约：</dt>
        <dd>
          <ul class="ncsc-form-radio-list">
            <li>
              <input type="radio" name="is_appoint" id="is_appoint_1" value="1" <?php if($output['goods']['is_appoint']=="1"){?>checked<?php }?> >
              <label for="is_appoint_1">是</label>
            </li>
            <li>
              <input type="radio" name="is_appoint" id="is_appoint_0" value="0"  <?php if($output['goods']['is_appoint']=="0"){?>checked<?php }?>>
              <label for="is_appoint_0">否</label>
            </li>
          </ul>
          <p class="hint">只有库存为零的商品才可以设为预约商品。商家补货后，平台自动发布消息通知已经预约的会员。</p>
        </dd>
      </dl>
      <dl nctype="is_appoint"  style="display:none;">
        <dt><i class="required">*</i>发售日期：</dt>
        <dd>
          <input type="text" name="g_saledate" id="g_saledate" class="w80 text" value="<?php echo $output['goods']['appoint_satedate']?>">
          <span></span>
          <p class="hint">预约商品的发售日期。</p>
        </dd>
      </dl>
      <dl>
        <dt>商品推荐：</dt>
        <dd>
          <ul class="ncsc-form-radio-list">
            <li>
              <label>
                <input name="g_commend" value="1" <?php if($output['goods']['goods_commend']=="1"){?>checked<?php }?>  type="radio" />
                是</label>
            </li>
            <li>
              <label>
                <input name="g_commend" value="0" <?php if($output['goods']['goods_commend']=="0"){?>checked<?php }?>  type="radio"/>
                否</label>
            </li>
          </ul>
          <p class="hint">被推荐的商品会显示在店铺首页</p>
        </dd>
      </dl>
    </div>
    <div class="bottom tc hr32">
      <label class="submit-border">
        <input type="submit" class="submit" value="提交" />
      </label>
    </div>
  </form>
</div>
<script type="text/javascript">
var SITEURL = "/long7/shop";
var DEFAULT_GOODS_IMAGE = "/data/upload/shop/common/default_goods_image_60.gif";
var SHOP_RESOURCE_SITE_URL = "/shop/resource";

$(function(){
	//电脑端手机端tab切换
	$(".tabs").tabs();
	
    $.validator.addMethod('checkPrice', function(value,element){
    	_g_price = parseFloat($('input[name="g_price"]').val());
        _g_marketprice = parseFloat($('input[name="g_marketprice"]').val());
        if (_g_price > _g_marketprice) {
            return false;
        }else {
            return true;
        }
    }, '<i class="icon-exclamation-sign"></i>商品价格不能高于市场价格');
	jQuery.validator.addMethod("checkFCodePrefix", function(value, element) {       
		return this.optional(element) || /^[a-zA-Z]+$/.test(value);       
	},'<i class="icon-exclamation-sign"></i>请填写不多于5位的英文字母');  
    $('#goods_form').validate({
        errorPlacement: function(error, element){
            $(element).nextAll('span').append(error);
        },
                submitHandler:function(form){
            ajaxpost('goods_form', '', '', 'onerror');
        },
                rules : {
            g_name : {
                required    : true,
                minlength   : 3,
                maxlength   : 50
            },
            g_jingle : {
                maxlength   : 140
            },
            g_price : {
                required    : true,
                number      : true,
                min         : 0.01,
                max         : 9999999,
                checkPrice  : true
            },
            g_marketprice : {
                required    : true,
                number      : true,
                min         : 0.01,
                max         : 9999999
            },
            g_costprice : {
                number      : true,
                min         : 0.00,
                max         : 9999999
            },
            g_storage  : {
                required    : true,
                digits      : true,
                min         : 0,
                max         : 999999999
            },
            image_path : {
                required    : true
            },
            g_vindate : {
                required    : function() {if ($("#is_gv_1").prop("checked")) {return true;} else {return false;}}
            },
			g_vlimit : {
				required	: function() {if ($("#is_gv_1").prop("checked")) {return true;} else {return false;}},
				range		: [1,10]
			},
			g_fccount : {
								range		: [1,100]
			},
			g_fcprefix : {
								checkFCodePrefix : true,
				rangelength	: [3,5]
			},
			g_saledate : {
				required	: function () {if ($('#is_appoint_1').prop("checked")) {return true;} else {return false;}}
			},
			g_deliverdate : {
				required	: function () {if ($('#is_presell_1').prop("checked")) {return true;} else {return false;}}
			}
        },
        messages : {
            g_name  : {
                required    : '<i class="icon-exclamation-sign"></i>商品名称不能为空',
                minlength   : '<i class="icon-exclamation-sign"></i>商品标题名称长度至少3个字符，最长50个汉字',
                maxlength   : '<i class="icon-exclamation-sign"></i>商品标题名称长度至少3个字符，最长50个汉字'
            },
            g_jingle : {
                maxlength   : '<i class="icon-exclamation-sign"></i>商品卖点不能超过140个字符'
            },
            g_price : {
                required    : '<i class="icon-exclamation-sign"></i>商品价格不能为空',
                number      : '<i class="icon-exclamation-sign"></i>商品价格只能是数字',
                min         : '<i class="icon-exclamation-sign"></i>商品价格必须是0.01~9999999之间的数字',
                max         : '<i class="icon-exclamation-sign"></i>商品价格必须是0.01~9999999之间的数字'
            },
            g_marketprice : {
                required    : '<i class="icon-exclamation-sign"></i>请填写市场价',
                number      : '<i class="icon-exclamation-sign"></i>请填写正确的价格',
                min         : '<i class="icon-exclamation-sign"></i>请填写0.01~9999999之间的数字',
                max         : '<i class="icon-exclamation-sign"></i>请填写0.01~9999999之间的数字'
            },
            g_costprice : {
                number      : '<i class="icon-exclamation-sign"></i>请填写正确的价格',
                min         : '<i class="icon-exclamation-sign"></i>请填写0.00~9999999之间的数字',
                max         : '<i class="icon-exclamation-sign"></i>请填写0.00~9999999之间的数字'
            },
            g_storage : {
                required    : '<i class="icon-exclamation-sign"></i>商品库存不能为空',
                digits      : '<i class="icon-exclamation-sign"></i>库存只能填写数字',
                min         : '<i class="icon-exclamation-sign"></i>商铺库存数量必须为0~999999999之间的整数',
                max         : '<i class="icon-exclamation-sign"></i>商铺库存数量必须为0~999999999之间的整数'
            },
            image_path : {
                required    : '<i class="icon-exclamation-sign"></i>请设置商品主图'
            },
            g_vindate : {
                required    : '<i class="icon-exclamation-sign"></i>请选择有效期'
            },
			g_vlimit : {
				required	: '<i class="icon-exclamation-sign"></i>请填写1~10之间的数字',
				range		: '<i class="icon-exclamation-sign"></i>请填写1~10之间的数字'
			},
			g_fccount : {
				required	: '<i class="icon-exclamation-sign"></i>请填写1~100之间的数字',
				range		: '<i class="icon-exclamation-sign"></i>请填写1~100之间的数字'
			},
			g_fcprefix : {
				required	: '<i class="icon-exclamation-sign"></i>请填写3~5位的英文字母',
				rangelength	: '<i class="icon-exclamation-sign"></i>请填写3~5位的英文字母'
			},
			g_saledate : {
				required	: '<i class="icon-exclamation-sign"></i>请选择有效期'
			},
			g_deliverdate : {
				required	: '<i class="icon-exclamation-sign"></i>请选择有效期'
			}
        }
    });
    	setTimeout("setArea(<?php echo $output['goods']['areaid_1']?>, <?php echo $output['goods']['areaid_2']?>)", 1000);
	});
// 按规格存储规格值数据
var spec_group_checked = [];
var str = '';
var V = new Array();


$(function(){
	$('dl[nctype="spec_group_dl"]').on('click', 'span[nctype="input_checkbox"] > input[type="checkbox"]',function(){
		into_array();
		goods_stock_set();
	});

	// 提交后不没有填写的价格或库存的库存配置设为默认价格和0
	// 库存配置隐藏式 里面的input加上disable属性
	$('input[type="submit"]').click(function(){
		$('input[data_type="price"]').each(function(){
			if($(this).val() == ''){
				$(this).val($('input[name="g_price"]').val());
			}
		});
		$('input[data_type="stock"]').each(function(){
			if($(this).val() == ''){
				$(this).val('0');
			}
		});
		$('input[data_type="alarm"]').each(function(){
			if($(this).val() == ''){
				$(this).val('0');
			}
		});
		if($('dl[nc_type="spec_dl"]').css('display') == 'none'){
			$('dl[nc_type="spec_dl"]').find('input').attr('disabled','disabled');
		}
	});
	
});

//将选中的规格放入数组
function into_array(){
		
		spec_group_checked_0 = new Array();
		$('dl[nc_type="spec_group_dl_0"]:first').find('input[type="checkbox"]:checked').each(function(){
			i = $(this).attr('nc_type');
			v = $(this).val();
			c = null;
			if ($(this).parents('dl:first').attr('spec_img') == 't') {
				c = 1;
			}
			spec_group_checked_0[spec_group_checked_0.length] = [v,i,c];
		});

		spec_group_checked[0] = spec_group_checked_0;

		
		/* spec_group_checked_1 = new Array();
		$('dl[nc_type="spec_group_dl_1"]').find('input[type="checkbox"]:checked').each(function(){
			i = $(this).attr('nc_type');
			v = $(this).val();
			c = null;
			if ($(this).parents('dl:first').attr('spec_img') == 't') {
				c = 1;
			}
			spec_group_checked_1[spec_group_checked_1.length] = [v,i,c];
		});

		spec_group_checked[1] = spec_group_checked_1; */

		
		 spec_group_checked_2 = new Array();
		$('dl[nc_type="spec_group_dl_0"]:last').find('input[type="checkbox"]:checked').each(function(){
			i = $(this).attr('nc_type');
			v = $(this).val();
			c = null;
			if ($(this).parents('dl:first').attr('spec_img') == 't') {
				c = 1;
			}
			spec_group_checked_2[spec_group_checked_2.length] = [v,i,c];
		});

		spec_group_checked[2] = spec_group_checked_2;
 
		
		/* spec_group_checked_3 = new Array();
		$('dl[nc_type="spec_group_dl_3"]').find('input[type="checkbox"]:checked').each(function(){
			i = $(this).attr('nc_type');
			v = $(this).val();
			c = null;
			if ($(this).parents('dl:first').attr('spec_img') == 't') {
				c = 1;
			}
			spec_group_checked_3[spec_group_checked_3.length] = [v,i,c];
		});

		spec_group_checked[3] = spec_group_checked_3; */

}

// 生成库存配置
function goods_stock_set()
{
    //  店铺价格 商品库存改为只读
    $('input[name="g_price"]').attr('readonly', 'readonly').css('background', '#E7E7E7 none');
    $('input[name="g_storage"]').attr('readonly', 'readonly').css('background', '#E7E7E7 none');
    $('dl[nc_type="spec_dl"]').show();
    str = '<tr>';
    for (var i_0 = 0; i_0 < spec_group_checked[0].length; i_0++)
    {
        td_1 = spec_group_checked[0][i_0];
        //for (var i_1 = 0; i_1 < spec_group_checked[1].length; i_1++)
        //{
           // td_2 = spec_group_checked[1][i_1];
            for (var i_2 = 0; i_2 < spec_group_checked[2].length; i_2++)
            {
                td_3 = spec_group_checked[2][i_2];
                //for (var i_3 = 0; i_3 < spec_group_checked[3].length; i_3++)
                //{
                   // td_4 = spec_group_checked[3][i_3];
                    var tmp_spec_td = new Array();
                    tmp_spec_td[0] = td_1[1];
                    //tmp_spec_td[1] = td_2[1];
                    tmp_spec_td[2] = td_3[1];
                    //tmp_spec_td[3] = td_4[1];
                    tmp_spec_td.sort(function (a, b)
                    {
                        return a - b;
                    });
                    var spec_bunch = 'i_';
                    spec_bunch += tmp_spec_td[0];
                   spec_bunch += tmp_spec_td[1];
                    //spec_bunch += tmp_spec_td[2];
                   // spec_bunch += tmp_spec_td[3];
                    str += '<input type="hidden" name="spec[' + spec_bunch + '][goods_id]" nc_type="' + spec_bunch + '|id" value="" />';
                    if (td_1[2] != null) 
                    {
                        str += '<input type="hidden" name="spec[' + spec_bunch + '][color]" value="' + td_1[1] + '" />';
                    }
                    str += '<td><input type="hidden" name="spec[' + spec_bunch + '][sp_value][' + td_1[1] + ']" value="' + td_1[0] + '" />' + td_1[0] + '</td>';
                    /* if (td_2[2] != null) 
                    {
                        str += '<input type="hidden" name="spec[' + spec_bunch + '][color]" value="' + td_2[1] + '" />';
                    } */
                   // str += '<td><input type="hidden" name="spec[' + spec_bunch + '][sp_value][' + td_2[1] + ']" value="' + td_2[0] + '" />' + td_2[0] + '</td>';
                    if (td_3[2] != null) 
                    {
                        str += '<input type="hidden" name="spec[' + spec_bunch + '][color]" value="' + td_3[1] + '" />';
                    }
                    str += '<td><input type="hidden" name="spec[' + spec_bunch + '][sp_value][' + td_3[1] + ']" value="' + td_3[0] + '" />' + td_3[0] + '</td>';
                    /* if (td_4[2] != null) 
                    {
                        str += '<input type="hidden" name="spec[' + spec_bunch + '][color]" value="' + td_4[1] + '" />';
                    } */
                    //str += '<td><input type="hidden" name="spec[' + spec_bunch + '][sp_value][' + td_4[1] + ']" value="' + td_4[0] + '" />' + td_4[0] + '</td>';
                    str += '<td><input class="text price" type="text" name="spec[' + spec_bunch + '][marketprice]" data_type="marketprice" nc_type="' + spec_bunch + '|marketprice" value="" /><em class="add-on"><i class="icon-renminbi"></i></em></td><td><input class="text price" type="text" name="spec[' + spec_bunch + '][price]" data_type="price" nc_type="' + spec_bunch + '|price" value="" /><em class="add-on"><i class="icon-renminbi"></i></em></td><td><input class="text stock" type="text" name="spec[' + spec_bunch + '][stock]" data_type="stock" nc_type="' + spec_bunch + '|stock" value="" /></td><td><input class="text stock" type="text" name="spec[' + spec_bunch + '][alarm]" data_type="alarm" nc_type="' + spec_bunch + '|alarm" value="" /></td><td><input class="text sku" type="text" name="spec[' + spec_bunch + '][sku]" nc_type="' + spec_bunch + '|sku" value="" /></td></tr>';
                //}
            }
        //}
    }
    if (str == '<tr>')
    {
        //  店铺价格 商品库存取消只读
        $('input[name="g_price"]').removeAttr('readonly').css('background', '');
        $('input[name="g_storage"]').removeAttr('readonly').css('background', '');
        $('dl[nc_type="spec_dl"]').hide();
    }
    else
    {
        console.log(str);
        $('tbody[nc_type="spec_table"]').empty().html(str) .find('input[nc_type]').each(function ()
        {
            s = $(this).attr('nc_type');
            try {
                $(this).val(V[s]);
            }
            catch (ex) {
                $(this).val('');
            };
            if ($(this).attr('data_type') == 'marketprice' && $(this).val() == '') {
                $(this).val($('input[name="g_marketprice"]').val());
            }
            if ($(this).attr('data_type') == 'price' && $(this).val() == '') {
                $(this).val($('input[name="g_price"]').val());
            }
            if ($(this).attr('data_type') == 'stock' && $(this).val() == '') {
                $(this).val($('input[name="g_storage"]').val());
            }
            if ($(this).attr('data_type') == 'alarm' && $(this).val() == '') {
                $(this).val('0');
            }
        }).end() .find('input[data_type="stock"]').change(function ()
        {
            computeStock();
            // 库存计算
        }).end() .find('input[data_type="price"]').change(function ()
        {
            computePrice();
            // 价格计算
        }).end() .find('input[nc_type]').change(function ()
        {
            s = $(this).attr('nc_type');
            V[s] = $(this).val();
        });
    }
}


</script> 
<script src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/scrolld.js"></script>
<script type="text/javascript">$("[id*='Btn']").stop(true).on('click', function (e) {e.preventDefault();$(this).scrolld();})</script>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    //添加删除快捷操作
    $('[nctype="btn_add_quicklink"]').on('click', function() {
        var $quicklink_item = $(this).parent();
        var item = $(this).attr('data-quicklink-act');
        if($quicklink_item.hasClass('selected')) {
            $.post("/shop/index.php?act=seller_center&op=quicklink_del", { item: item }, function(data) {
                $quicklink_item.removeClass('selected');
                $('#quicklink_' + item).remove();
            }, "json");
        } else {
            var count = $('#quicklink_list').find('dd.selected').length;
            if(count >= 8) {
                showError('快捷操作最多添加8个');
            } else {
                $.post("/shop/index.php?act=seller_center&op=quicklink_add", { item: item }, function(data) {
                    $quicklink_item.addClass('selected');
                                    }, "json");
            }
        }
    });
    //浮动导航  waypoints.js
    $("#sidebar,#mainContent").waypoint(function(event, direction) {
        $(this).parent().toggleClass('sticky', direction === "down");
        event.stopPropagation();
        });
    });
    // 搜索商品不能为空
    $('input[nctype="search_submit"]').click(function(){
        if ($('input[nctype="search_text"]').val() == '') {
            return false;
        }
    });
</script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.cookie.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
<!-- 对比 -->
<script src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/compare.js"></script>
<script type="text/javascript">


$(function(){
	// Membership card
	$('[nctype="mcard"]').membershipCard({type:'shop'});
	$.each($("input"),function(){
	    var fd = $(this).attr("checked");
	   
	    if(fd){
	      $(this).trigger("click");
	      $(this).trigger("click");
	    } 
	});
});
</script><style type="text/css">
<!--
.back_southidc {BACKGROUND-IMAGE:url('image/titlebg.gif');COLOR:000000;}
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
          
          联系QQ：<span class="style11">38306293<a target=blank href=tencent://message/?uin=38306293&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/long7/qq_online.gif alt="创智凌云客服为你服务"></a>417586492</span><FONT face=Verdana><a target=blank href=tencent://message/?uin=417586492&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/long7/qq_online.gif alt="创智凌云客服为你服务"></a></FONT><span class="style11">657248708</span><FONT face=Verdana><FONT face=Verdana><a target=blank href=tencent://message/?uin=657248708&Site=创智凌云客服为你服务&Menu=yes><img border="0" src=/long7/qq_online.gif alt="创智凌云客服为你服务"></a></FONT><br>
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
