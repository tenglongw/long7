<?php defined('InWrzcNet') or exit('Access Invalid!');?>
<?php echo getChat($layout);?>
<div id="faq">
  <div class="faq-wrapper">
    <?php if(is_array($output['article_list']) && !empty($output['article_list'])){ ?><ul>
    <?php foreach ($output['article_list'] as $k=> $article_class){ ?>
    <?php if(!empty($article_class)){ ?>
   <li> <dl class="s<?php echo ''.$k+1;?>">
      <dt>
        <?php if(is_array($article_class['class'])) echo $article_class['class']['ac_name'];?>
      </dt>
      <?php if(is_array($article_class['list']) && !empty($article_class['list'])){ ?>
      <?php foreach ($article_class['list'] as $article){ ?>
      <dd><i></i><a href="<?php if($article['article_url'] != '')echo $article['article_url'];else echo urlShop('article', 'show',array('article_id'=> $article['article_id']));?>" title="<?php echo $article['article_title']; ?>"> <?php echo $article['article_title'];?> </a></dd>
      <?php }?>
      <?php }?>
    </dl></li>
    <?php }?>
    <?php }?>	    	
	</ul>	
<div class="help">
		<div class="w1190 clearfix">
    		<div class="contact f-l">
    			<div class="contact-border clearfix">
        			<span class="ic tel t20"><?php echo $GLOBALS['setting_config']['site_tel400']; ?></span>
        			<span class="ic mail"><?php echo $GLOBALS['setting_config']['site_email']; ?></span>
        			<div class="attention cleafix">
        				<div class="weixin f-l">						
    <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$GLOBALS['setting_config']['site_logowx']; ?>" class="f-l jImg img-error">
	   					<p class="f-l">
        						<span>扫一扫</span>
        						<span>关注我们</span>
        					</p>
        				</div>
        				<div class="weibo f-l">
        					<div class="ic qq" style="padding-left: 0px;"><?php echo rec(8);?></div>
        					<div class="ic sina" style="padding-left: 0px;"><?php echo rec(7);?></div>
        				</div>
        			</div>
    			</div>
    		</div>
		</div>
	</div>			
    <?php }?>
  </div>
</div>
<!-- <div id="footer" class="wrapper">
  <p><a href="<?php echo SHOP_SITE_URL;?>"><?php echo $lang['nc_index'];?></a>
    <?php if(!empty($output['nav_list']) && is_array($output['nav_list'])){?>
    <?php foreach($output['nav_list'] as $nav){?>
    <?php if($nav['nav_location'] == '2'){?>
    | <a  <?php if($nav['nav_new_open']){?>target="_blank" <?php }?>href="<?php switch($nav['nav_type']){
    	case '0':echo $nav['nav_url'];break;
    	case '1':echo urlShop('search', 'index', array('cate_id'=>$nav['item_id']));break;
    	case '2':echo urlShop('article', 'article',array('ac_id'=>$nav['item_id']));break;
    	case '3':echo urlShop('activity', 'index',array('activity_id'=>$nav['item_id']));break;
    }?>"><?php echo $nav['nav_title'];?></a>
    <?php }?>
    <?php }?>
    <?php }?>
  </p>
  <?php echo $output['setting_config']['WrzcNet_version'];?> <?php echo $output['setting_config']['icp_number']; ?><br />
  <?php echo html_entity_decode($output['setting_config']['statistics_code'],ENT_QUOTES); ?> <div id="footer" class="wrapper"> <table width="100%" border="0">
  <tr>
    <td width="70%"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
		<tr>
            <td align="middle" height="22"><span>网站系统售前QQ:290116505</span><a href="tencent://message/?uin=290116505&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif" /></a><span class="css2">38306293<a href="tencent://message/?uin=38306293&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif"></a>417586492</span><FONT face="Verdana"><a href="tencent://message/?uin=417586492&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif"></a></FONT><span class="css2">657248708</span><font face="Verdana"><a href="tencent://message/?uin=657248708&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif" /></a></font><br><span class="css2">网站系统售前QQ:454882888</span><font face="Verdana"><a href="tencent://message/?uin=454882888&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif" /></a></font><span class="css2">394223545</span><font face="Verdana"><a href="tencent://message/?uin=394223545&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif" /></a></font><span class="css2">469648611</span><font face="Verdana"><a href="tencent://message/?uin=469648611&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif" /></a></font><span class="css2">314730679</span><font face="Verdana"><a href="tencent://message/?uin=314730679&Site=创智凌云客服为你服务&Menu=yes" target="blank"><img alt="创智凌云客服为你服务" border="0" src="/qqonline.gif" /></a><BR>
           </td>
          </tr>
          <tr>
            <td align="middle" height="22">公司总部地址:<span class="css2">广东省广州市天河区国家软件园产业基地8栋502</span>&nbsp;&nbsp;&nbsp;联系电话：<span class="css2">020-34506590  13527894748</span></td>
          </tr>  <tr>
		  <td align="middle">企业法人营业执照注册号：440106000137161 版权证书软著登字第0830353号　登记号 2014SR161116</td>
          <tr>
		  </tr>
            <td align="middle" height="22">Copyright(c) 
              2000-2030 www.wrzc.net <span class="css2">广州创智凌云信息科技有限公司</span> 版权所有、违法必究<a 
 class="topmenu" href="/admin/index.php" target="_blank">&nbsp;网站后台管理登录入口</a>  <a 
 class="topmenu" href="/admin/index.php?act=cache&op=clear" target="_blank">&nbsp;更新站点缓存</a></td>
          </tr>
        </tbody>
      </table></td>
    <td width="30%"><img src="/weixin20151009.png" width="100" height="125" /></td>
  </tr>
</table>
</div></div> -->
  
  
<?php if (C('debug') == 1){?>
<div id="think_page_trace" class="trace">
  <fieldset id="querybox">
    <legend><?php echo $lang['nc_debug_trace_title'];?></legend>
    <div> <?php print_r(Tpl::showTrace());?> </div>
  </fieldset>
</div>
<?php }?>
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
});
</script>
