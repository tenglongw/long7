
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
  <table class="table tb-type2 order">
    <tbody>
      <tr class="space">
        <th colspan="2">订单详情</th>
      </tr>
      <tr>
        <th>订单信息</th>
      </tr>
      <tr>
        <td colspan="2"><ul>
            <li>
            <strong>订单号:</strong><?php echo $output['order_info']['order_sn']?>            ( 支付单号 ： <?php echo $output['order_info']['pay_sn']?> )
            </li>
            <li><strong>订单状态:</strong><?php echo $output['order_info']['state_desc']?></li>
            <li><strong>订单总额:</strong><span class="red_common">￥<?php echo $output['order_info']['order_amount']?> </span>
             <!--//zmr>v80-->
                                          
              
            	</li>
            <li><strong>运费:</strong>￥<?php echo $output['order_info']['shipping_fee']?></li>
          </ul></td>
      </tr>
      <tr>
        <td><ul>
            <li><strong>买家：</strong><?php echo $output['order_info']['buyer_name']?></li>
            <li><strong>店铺：</strong><?php echo $output['order_info']['store_name']?></li>
            <li><strong>支付方式：</strong><?php echo $output['order_info']['payment_name']?></li>
            <li><strong>下单时间：</strong><?php echo date('Y-m-d H:i:s',$output['order_info']['payment_time'])?></li>
                                                          </ul></td>
      </tr>
      <tr>
        <th>收货人信息</th>
      </tr>
      <tr>
        <td><ul>
            <li><strong>收货人姓名：</strong><?php echo $output['order_info']['extend_order_common']['reciver_name']?></li>
            <li><strong>电话号码：</strong><?php echo $output['order_info']['extend_order_common']['reciver_info']['phone']?></li>
            <li><strong>详细地址：</strong><?php echo $output['order_info']['extend_order_common']['reciver_info']['address']?></li>
                      </ul></td>
          </tr>
            <!--   <tr>
      	<th>发票信息</th>
      </tr>
      <tr>
      <td><ul>
          <li><strong>类型：</strong>普通发票 </li>
          <li><strong>抬头：</strong>个人</li>
          <li><strong>内容：</strong>明细</li>
              </ul></td>
      </tr> -->
          <tr>
        <th>商品信息</th>
      </tr>
      <tr>
        <td><table class="table tb-type2 goods ">
            <tbody>
              <tr>
                <th></th>
                <th>商品信息</th>
                <th class="align-center">单价</th>
                <th class="align-center">实际支付额</th>
                <th class="align-center">数量</th>
                <th class="align-center">佣金比例</th>
                <th class="align-center">收取佣金</th>
              </tr>
              <?php foreach ($output['order_info']['extend_order_goods'] as $key=>$val){?>
	              <tr>
	                <td class="w60 picture"><div class="size-56x56"><span class="thumb size-56x56"><i></i><a href="/shop/index.php?act=goods&goods_id=<?php echo $val['goods_id']?>" target="_blank"><img style="width: 56px" alt="" src="/long7/data/upload/shop/store/goods/<?php echo $val['store_id']?>/<?php echo $val['goods_image']?>" /> </a></span></div></td>
	                <td class="w50pre"><p><a href="/long7/shop/index.php?act=goods&goods_id=<?php echo $val['goods_id']?>" target="_blank"><?php echo $val['goods_name']?></a></p><p></p></td>
	                <td class="w96 align-center"><span class="red_common">￥<?php echo $val['goods_price']?></span></td>
	                <td class="w96 align-center"><span class="red_common">￥<?php echo $val['goods_pay_price']?></span></td>
	                <td class="w96 align-center"><?php echo $val['goods_num']?></td>
	                <td class="w96 align-center">0%</td>
	                <td class="w96 align-center">0.00</td>
	              </tr>
              <?php }?>
                          </tbody>
          </table></td>
      </tr>
    <!-- S 促销信息 -->
          <!-- E 促销信息 -->

                </tbody>
    <tfoot>
      <tr class="tfoot">
        <td><a href="JavaScript:void(0);" class="btn" onclick="history.go(-1)"><span>返回</span></a></td>
      </tr>
    </tfoot>
  </table>
</div>  <style type="text/css">
<!--
.back_southidc {BACKGROUND-IMAGE:url('image/titlebg.gif');COLOR:000000;}
.table_southidc {BACKGROUND-COLOR: A4B6D7;}
.tit {font-size: 14px;
}
.tr_southidc {BACKGROUND-COLOR: ECF5FF;}
-->
</style>
<div align="center">
  
 
</div>
</body>
</html>
