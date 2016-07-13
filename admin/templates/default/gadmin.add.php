
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
      <ul class="tab-base"><li><a href="index.php?act=admin&op=admin" ><span>管理员</span></a></li><li><a href="index.php?act=admin&op=admin_add" ><span>添加管理员</span></a></li><li><a href="index.php?act=admin&op=gadmin" ><span>权限组</span></a></li><li><a  class="current"><span>添加权限组</span></a></li></ul>    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="add_form" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="admin_name">权限组:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" id="gname" maxlength="40" name="gname" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2"><table class="table tb-type2 nomargin">
              <thead>
                <tr class="space">
                  <th> <input id="limitAll" id="limitAll" value="1" type="checkbox">&nbsp;&nbsp;设置权限</th>
                </tr>
              </thead>
              <tbody>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit0" type="checkbox" onclick="selectLimit('limit0')">
                    <label for="limit0"><b>设置</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="setting">
                        站点设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="account">
                        账号同步&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="upload">
                        上传设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="setting.seo">
                        SEO设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="payment">
                        支付方式&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="message">
                        消息通知&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="express">
                        快递公司&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="waybill">
                        运单模板&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="offpay_area">
                        配送地区&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="cache">
                        清理缓存&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="perform">
                        性能优化&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="search">
                        搜索设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit0" type="checkbox" name="permission[]" value="admin_log">
                        操作日志&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit1" type="checkbox" onclick="selectLimit('limit1')">
                    <label for="limit1"><b>商品</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit1" type="checkbox" name="permission[]" value="goods">
                        商品管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit1" type="checkbox" name="permission[]" value="goods_class">
                        分类管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit1" type="checkbox" name="permission[]" value="brand">
                        品牌管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit1" type="checkbox" name="permission[]" value="type">
                        类型管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit1" type="checkbox" name="permission[]" value="spec">
                        规格管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit1" type="checkbox" name="permission[]" value="goods_album">
                        图片空间&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit2" type="checkbox" onclick="selectLimit('limit2')">
                    <label for="limit2"><b>店铺</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="store">
                        店铺管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="store_grade">
                        店铺等级&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="store_class">
                        店铺分类&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="domain">
                        二级域名&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="sns_strace">
                        店铺动态&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="help_store">
                        店铺帮助&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="store_joinin">
                        开店首页&nbsp;</label>
                                              <label><input nctype='limit' class="limit2" type="checkbox" name="permission[]" value="ownshop">
                        自营店铺&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit3" type="checkbox" onclick="selectLimit('limit3')">
                    <label for="limit3"><b>会员</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="member">
                        会员管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="member_grade">
                        会员级别&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="exppoints">
                        经验值管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="notice">
                        会员通知&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="points">
                        积分管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="sns_sharesetting">
                        分享绑定&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="sns_malbum">
                        会员相册&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="snstrace">
                        买家动态&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="sns_member">
                        会员标签&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="predeposit">
                        预存款&nbsp;</label>
                                              <label><input nctype='limit' class="limit3" type="checkbox" name="permission[]" value="chat_log">
                        聊天记录&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit4" type="checkbox" onclick="selectLimit('limit4')">
                    <label for="limit4"><b>交易</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="order">
                        实物订单&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="vr_order">
                        虚拟订单&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="refund">
                        退款管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="return">
                        退货管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="vr_refund">
                        虚拟订单退款&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="consulting">
                        咨询管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="inform">
                        举报管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="evaluate">
                        评价管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit4" type="checkbox" name="permission[]" value="complain">
                        投诉管理&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit5" type="checkbox" onclick="selectLimit('limit5')">
                    <label for="limit5"><b>网站</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="article_class">
                        文章分类&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="article">
                        文章管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="document">
                        会员协议&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="navigation">
                        页面导航&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="adv">
                        广告管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="web_config|web_api">
                        首页管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="rec_position">
                        推荐位&nbsp;</label>
                                              <label><input nctype='limit' class="limit5" type="checkbox" name="permission[]" value="web_special">
                        专题管理&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit6" type="checkbox" onclick="selectLimit('limit6')">
                    <label for="limit6"><b>运营</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="operation">
                        基本设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="groupbuy">
                        抢购管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="vr_groupbuy">
                        虚拟抢购设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="activity">
                        活动管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="promotion_xianshi">
                        限时折扣&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="promotion_mansong">
                        满即送&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="promotion_bundling">
                        优惠套装&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="promotion_bundling">
                        推荐展位&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="pointprod|pointorder">
                        兑换礼品&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="voucher">
                        代金券&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="bill">
                        结算管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="vr_bill">
                        虚拟订单结算&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="mall_consult">
                        平台客服&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="rechargecard">
                        平台充值卡&nbsp;</label>
                                              <label><input nctype='limit' class="limit6" type="checkbox" name="permission[]" value="delivery">
                        物流自提服务站&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit7" type="checkbox" onclick="selectLimit('limit7')">
                    <label for="limit7"><b>统计</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_general">
                        概述及设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_industry">
                        行业分析&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_member">
                        会员统计&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_store">
                        店铺统计&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_trade">
                        销量分析&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_goods">
                        商品分析&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_marketing">
                        营销分析&nbsp;</label>
                                              <label><input nctype='limit' class="limit7" type="checkbox" name="permission[]" value="stat_aftersale">
                        售后分析&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit8" type="checkbox" onclick="selectLimit('limit8')">
                    <label for="limit8"><b>闲置</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit8" type="checkbox" name="permission[]" value="flea_index">
                        SEO设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit8" type="checkbox" name="permission[]" value="flea_class">
                        分类管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit8" type="checkbox" name="permission[]" value="flea_class_index">
                        首页分类管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit8" type="checkbox" name="permission[]" value="flea">
                        闲置管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit8" type="checkbox" name="permission[]" value="flea_cs">
                        地区管理&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit9" type="checkbox" onclick="selectLimit('limit9')">
                    <label for="limit9"><b>手机端</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit9" type="checkbox" name="permission[]" value="mb_special">
                        首页设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit9" type="checkbox" name="permission[]" value="mb_special">
                        专题设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit9" type="checkbox" name="permission[]" value="mb_category">
                        分类图片设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit9" type="checkbox" name="permission[]" value="mb_app">
                        下载设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit9" type="checkbox" name="permission[]" value="mb_feedback">
                        意见反馈&nbsp;</label>
                                              <label><input nctype='limit' class="limit9" type="checkbox" name="permission[]" value="mb_payment">
                        手机支付&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit10" type="checkbox" onclick="selectLimit('limit10')">
                    <label for="limit10"><b>微商城</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.manage">
                        微商城管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.goods|microshop.goods_manage">
                        随心看管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.goodsclass|microshop.goodsclass_list">
                        随心看分类&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.personal|microshop.personal_manage">
                        个人秀管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.personalclass|microshop.personalclass_list">
                        个人秀分类&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.store|microshop.store_manage">
                        店铺街管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.comment|microshop.comment_manage">
                        评论管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit10" type="checkbox" name="permission[]" value="microshop.adv|microshop.adv_manage">
                        广告管理&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit11" type="checkbox" onclick="selectLimit('limit11')">
                    <label for="limit11"><b>CMS</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_manage">
                        CMS管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_index">
                        首页管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_article|cms_article_class">
                        文章管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_picture|cms_picture_class">
                        画报管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_special">
                        专题管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_navigation">
                        导航管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_tag">
                        标签管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit11" type="checkbox" name="permission[]" value="cms_comment">
                        评论管理&nbsp;</label>
                                          </td>
                </tr>
                                <tr>
                  <td>
                  <label style="width:100px">&nbsp;</label>
                  <input id="limit12" type="checkbox" onclick="selectLimit('limit12')">
                    <label for="limit12"><b>圈子</b>&nbsp;&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_setting">
                        圈子设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_memberlevel">
                        成员头衔设置&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_class">
                        圈子分类管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_manage">
                        圈子管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_theme">
                        圈子话题管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_member">
                        圈子成员管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_inform">
                        圈子举报管理&nbsp;</label>
                                              <label><input nctype='limit' class="limit12" type="checkbox" name="permission[]" value="circle_setting.adv_manage">
                        圈子首页广告&nbsp;</label>
                                          </td>
                </tr>
                              </tbody>
            </table></td>
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
function selectLimit(name){
    if($('#'+name).attr('checked')) {
        $('.'+name).attr('checked',true);
    }else {
        $('.'+name).attr('checked',false);
    }
}
$(document).ready(function(){
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#add_form").valid()){
	     $("#add_form").submit();
		}
	});

	$('#limitAll').click(function(){
		$('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
	});
	
	$("#add_form").validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            gname : {
                required : true,
				remote	: {
                    url :'index.php?act=admin&op=ajax&branch=check_gadmin_name',
                    type:'get',
                    data:{
                    	gname : function(){
                            return $('#gname').val();
                        }
                    }
                }
            }
        },
        messages : {
            gname : {
                required : '请输入',
                remote	 : '该名称已存在'
            }
        }
	});
});
</script></body>
</html>
