<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>抽签认证管理</h3>
      <ul class="tab-base">
        <li><a href="<?php echo urlAdmin('authentication', 'index');?>" <?php if ($output['sign'] != 'verify') {?>class="current"<?php }?>><span><?php echo $lang['nc_manage'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch">
    <input type="hidden" value="authentication" name="act">
    <input type="hidden" value="index" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="search_title">真实姓名</label></th>
          <td><input type="text" value="<?php echo $output['search_name'];?>" name="search_name" id="search_name" class="txt"></td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['search_name'] != ''){?>
            <a href="index.php?act=authentication&op=index" class="btns " title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
            <?php }?></td>
        </tr>
      </tbody>
    </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form method="post" id="form_article">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th>用户名</th>
          <th>手机号</th>
          <th>身份证号</th>
          <th class="align-center">状态</th>
          <th class="align-center">申请时间</th>
          <th class="w96 align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['dp_list'])){ ?>
        <?php foreach($output['dp_list'] as $k => $v){ ?>
        <tr class="hover">
          <td><?php echo $v['atct_name']; ?></td>
          <td><?php echo $v['atct_phone']; ?></td>
          <td>
            <?php echo $v['atct_idcard'];?>
          </td>
          <td class="align-center"><?php echo $output['delivery_state'][$v['atct_state']]; ?></td>
          <td class="nowrap align-center"><?php echo date('Y-m-d H:i:s', $v['atct_addtime']); ?></td>
          <td class="align-center"><?php if($v['atct_state']==0){?><a href="<?php echo urlAdmin('authentication', 'edit_authentication', array('atct_id' => $v['atct_id']));?>">审批</a><?php }?></td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['dp_list'])){ ?>
        <tr class="tfoot">
          <td colspan="16">
            <div class="pagination"> <?php echo $output['show_page'];?> </div></td>
        </tr>
        <?php } ?>
      </tfoot>
    </table>
  </form>
</div>
