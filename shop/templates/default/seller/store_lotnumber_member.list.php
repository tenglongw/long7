<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<table class="ncsc-default-table">
  <thead>
    <tr>
      <th class="w130">姓名</th>
      <th class="w130">手机号</th>
      <th class="w130">时间</th>
      <th class="w130">状态</th>
      <th class="w130">操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($output['member_list']) && is_array($output['member_list'])){?>
    <?php foreach($output['member_list'] as $key=>$member){?>
    <tr class="bd-line">
      <td>
        <?php echo $member['member_name'];?>
      </td>
      <td><?php echo $member['member_phone']?></td>
      <td><?php echo date('Y-m-d H:i:s', $member['add_time']); ?></td>
      <td><?php echo $member['state_msg']?></td>
      <td><?php if($member['state']=='1'){?><a href="<?php echo urlShop('store_lotnumber', 'get_prize', array('ml_id' => $member['ml_id'],'lotnumber_id'=>$output['lotnumber_id']));?>">领取</a><?php }else {?>领取<?php }?></td>
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
