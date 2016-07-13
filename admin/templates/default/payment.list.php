
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
      <h3>支付方式</h3>
      <ul class="tab-base"><li><a class="current"><span>支付方式</span></a></li></ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title"><h5>操作提示</h5><span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td>
        <ul>
            <li>此处列出了系统支持的支付方式，点击编辑可以设置支付参数及开关状态</li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <table class="table tb-type2">
    <thead>
      <tr class="thead">
        <th>支付方式</th>
        <th class="align-center">启用</th>
        <th class="align-center">操作</th>
      </tr>
    </thead>
    <tbody>
            <tr class="hover">
        <td>货到付款</td>
        <td class="w25pre align-center">
          开启中        </td>
        <td class="w156 align-center"><a href="index.php?act=payment&op=edit&payment_id=1">编辑</a></td>
      </tr>
            <tr class="hover">
        <td>支付宝</td>
        <td class="w25pre align-center">
          开启中        </td>
        <td class="w156 align-center"><a href="index.php?act=payment&op=edit&payment_id=2">编辑</a></td>
      </tr>
            <tr class="hover">
        <td>财付通</td>
        <td class="w25pre align-center">
          开启中        </td>
        <td class="w156 align-center"><a href="index.php?act=payment&op=edit&payment_id=3">编辑</a></td>
      </tr>
            <tr class="hover">
        <td>网银在线</td>
        <td class="w25pre align-center">
          开启中        </td>
        <td class="w156 align-center"><a href="index.php?act=payment&op=edit&payment_id=4">编辑</a></td>
      </tr>
          </tbody>
    <tfoot>
      <tr class="tfoot">
        <td colspan="15"></td>
      </tr>
    </tfoot>
  </table>  <style type="text/css">
<!--
.back_southidc {BACKGROUND-IMAGE:url('image/titlebg.gif');COLOR:000000;}
.table_southidc {BACKGROUND-COLOR: A4B6D7;}
.tit {font-size: 14px;
}
.tr_southidc {BACKGROUND-COLOR: ECF5FF;}
-->
</style>
<!-- 
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
 -->
</div></body>
</html>
