<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="tabmenu">
<?php include template('layout/submenu');?>
<a href="<?php echo urlShop('store_lotnumber', 'lotnumber_add');?>" style="right:100px" class="ncsc-btn ncsc-btn-green" title="<?php echo $lang['groupbuy_index_new_group'];?>"><i class="icon-plus-sign"></i><?php echo $lang['groupbuy_index_new_group'];?></a>
</div>

<table class="search-form">
  <form method="get">
    <input type="hidden" name="act" value="store_lotnumber" />
    <tr>
      <td>&nbsp;</td>
      <th><?php echo $lang['groupbuy_index_activity_state'];?></th>
      <td class="w100"><select name="groupbuy_state" class="w90">
          <?php if(is_array($output['groupbuy_state_array'])) { ?>
          <?php foreach($output['groupbuy_state_array'] as $key=>$val) { ?>
          <option value="<?php echo $key;?>" <?php if($key == $_GET['groupbuy_state']) { echo 'selected';}?>><?php echo $val;?></option>
          <?php } ?>
          <?php } ?>
        </select></td>
      <th><?php echo $lang['group_name'];?></th>
      <td class="w160"><input class="text" type="text" name="groupbuy_name" value="<?php echo $_GET['groupbuy_name'];?>"/></td>
      <td class="w70 tc"><label class="submit-border"><input type="submit" class="submit" value="<?php echo $lang['nc_search'];?>" /></label></td>
    </tr>
  </form>
</table>
<table class="ncsc-default-table">
  <thead>
    <tr>
      <th class="w50">商品图片</th>
      <th class="w50"></th>
      <th class="w130"><?php echo $lang['group_name'];?></th>
      <th class="w130">开始时间</th>
      <th class="w130">结束时间</th>
      <th class="w90">已报名</th>
      <th class="w110"><?php echo $lang['groupbuy_index_activity_state'];?></th>
      <th class="w90">操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($output['group']) && is_array($output['group'])){?>
    <?php foreach($output['group'] as $key=>$group){?>
    <tr class="bd-line">
      <td><div class="pic-thumb"><img src="<?php echo lthumb($group['lotnumber_image'], 'small');?>"/></a></div></td>
      <td></td>
      <td>
        <?php echo $group['lotnumber_name'];?>
      </td>
      <td><?php echo date('Y-m-d H:i:s', $group['start_time']); ?></td>
      <td><?php echo date('Y-m-d H:i:s', $group['end_time']); ?></td>
      <td><?php echo $group['apply_count'];?></td>
      <td><?php echo $output['groupbuy_state_array'][$group['state']]; ?></td>
      <td><a href="<?php echo urlShop('store_lotnumber', 'get_memberlist', array('lotnumber_id' => $group['lotnumber_id'],'rule_id' => $group['rule_id']));?>">查看报名人数</a></td>
    </tr>
    <?php }?>
    <?php }else{?>
    <tr>
      <td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
    </tr>
    <?php }?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="20"><div class="pagination"><?php echo $output['show_page']; ?></div></td>
    </tr>
  </tfoot>
</table>
